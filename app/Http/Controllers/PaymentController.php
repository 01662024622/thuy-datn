<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\book;
use App\chap;
use App\tag;
use App\category;
use App\Order;
use App\Bill;
use App\User;
use Validator;
use Illuminate\Support\Facades\Input;
use Webpatser\Uuid\Uuid;
use DB;
use Carbon\Carbon;
use Session;
use Auth;
use Illuminate\Pagination\Paginator;


class PaymentController extends Controller
{
	private $vnp_TmnCode = "4KK2KMJ7"; //Mã website tại VNPAY 
	private $vnp_HashSecret = "ZYJMGLJDPANENJJHQJOTQZWVIGULPHPB"; //Chuỗi bí mật
	private $vnp_Url = "http://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
	private $vnp_Returnurl = "http://localhost:8000/vnpay_return";

	public function index()
	{
		$dscate = DB::table('category')->where('active', '=', 1)->get();
		$dsbook = DB::table('book')->where('active', '=', 1)->paginate(3);
		return view('payment.index')->with('dscate', $dscate)->with('dsbook', $dsbook);
	}
	public function payment(Request $request){
		$vnp_TxnRef = $request->order_id; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
		$vnp_OrderInfo = $request->order_desc;
		$vnp_OrderType = $request->order_type;
		$vnp_Amount = $request->amount * 100;
		$vnp_Locale = $request->language;
		$vnp_BankCode = $request->bank_code;
		$vnp_IpAddr = $_SERVER['REMOTE_ADDR'];

		$inputData = array(
			"vnp_Version" => "2.0.0",
			"vnp_TmnCode" => $this->vnp_TmnCode,
			"vnp_Amount" => $vnp_Amount,
			"vnp_Command" => "pay",
			"vnp_CreateDate" => date('YmdHis'),
			"vnp_CurrCode" => "VND",
			"vnp_IpAddr" => $vnp_IpAddr,
			"vnp_Locale" => $vnp_Locale,
			"vnp_OrderInfo" => $vnp_OrderInfo,
			"vnp_OrderType" => $vnp_OrderType,
			"vnp_ReturnUrl" => $this->vnp_Returnurl,
			"vnp_TxnRef" => $vnp_TxnRef,
		);

		if (isset($vnp_BankCode) && $vnp_BankCode != "") {
			$inputData['vnp_BankCode'] = $vnp_BankCode;
		}
		ksort($inputData);
		$query = "";
		$i = 0;
		$hashdata = "";
		foreach ($inputData as $key => $value) {
			if ($i == 1) {
				$hashdata .= '&' . $key . "=" . $value;
			} else {
				$hashdata .= $key . "=" . $value;
				$i = 1;
			}
			$query .= urlencode($key) . "=" . urlencode($value) . '&';
		}

		$this->vnp_Url = $this->vnp_Url . "?" . $query;
		if (isset($this->vnp_HashSecret)) {
   // $vnpSecureHash = md5($vnp_HashSecret . $hashdata);
			$vnpSecureHash = hash('sha256', $this->vnp_HashSecret . $hashdata);
			$this->vnp_Url .= 'vnp_SecureHashType=SHA256&vnp_SecureHash=' . $vnpSecureHash;
		}
		$returnData = array('code' => '00'
			, 'message' => 'success'
			, 'data' => $this->vnp_Url);

		// echo json_encode($returnData);
		return redirect($returnData['data']);
		// header("Location: ".$returnData['data']);
	}
	public function vnpayreturn(Request $request)
	{
		$vnp_SecureHash = $request->vnp_SecureHash;
		$inputData = array();
		foreach ($request->all() as $key => $value) {
			if (substr($key, 0, 4) == "vnp_") {
				$inputData[$key] = $value;
			}
		}
		unset($inputData['vnp_SecureHashType']);
		unset($inputData['vnp_SecureHash']);
		$amount=$inputData['vnp_Amount']/100;
		ksort($inputData);
		$i = 0;
		$hashData = "";
		foreach ($inputData as $key => $value) {
			if ($i == 1) {
				$hashData = $hashData . '&' . $key . "=" . $value;
			} else {
				$hashData = $hashData . $key . "=" . $value;
				$i = 1;
			}
		}

//$secureHash = md5($vnp_HashSecret . $hashData);
		$secureHash = hash('sha256',$this->vnp_HashSecret . $hashData);
		$id=$inputData['vnp_TxnRef'].Auth::id();
		// return $id;
		$order = Bill::find($id);

		if ($secureHash == $vnp_SecureHash&&$order==null) {
			if ($request->vnp_ResponseCode== '00') {
				$inputData['responStatus']= "GD Thanh cong";
				$data['id']=$inputData['vnp_TxnRef'].Auth::id();
				$data['content']=$inputData['vnp_OrderInfo'];
				$data['bank']=$inputData['vnp_BankCode'];
				$data['transaction_no']=$inputData['vnp_TransactionNo'];
				$data['amount']=$amount;
				$data['user_id']=Auth::id();
				Bill::create($data);
				$user = User::find(Auth::id());
				$user->amount=$user->amount+$amount;
				$user->save();
			} else {
				$inputData['responStatus']= "GD Khong thanh cong";
			}
		} else {
			$inputData['responStatus']= "Chu ky khong hop le";
		}
		$dscate = DB::table('category')->where('active', '=', 1)->get();
		$dsbook = DB::table('book')->where('active', '=', 1)->paginate(3);
		return view('payment.vnpayreturn')->with('dscate', $dscate)->with('dsbook', $dsbook)->with('inputData',$inputData);
		
	}
	public function audio($audio){
		return redirect('ok');
		// return redirect('http://localhost:8000/upload/audio/'.$audio);

	}
}
