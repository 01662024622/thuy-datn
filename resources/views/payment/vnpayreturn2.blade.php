
@extends('home.app') 
@section('css')


@endsection
@section('header')
@include('home.miniheader')
@endsection  
@section('content')
<br>
<br>
<br>

<!--Begin display -->
<div class="container">
    <div class="header clearfix">
        <h3 class="text-muted">VNPAY RESPONSE</h3>
    </div>
    <br>
    <br>
    <br>
    <div class="table-responsive">
        <div class="form-group">
            <label >Mã đơn hàng:</label>

            <label>{{$inputData['vnp_TxnRef']}}</label>
        </div>    
        <div class="form-group">

            <label >Số tiền:</label>
            <label>{{$inputData['vnp_Amount']}}</label>
        </div>  
        <div class="form-group">
            <label >Nội dung thanh toán:</label>
            <label>{{$inputData['vnp_OrderInfo']}}</label>
        </div> 
        <div class="form-group">
            <label >Mã GD Tại VNPAY:</label>
            <label>{{$inputData['vnp_TransactionNo']}}</label>
        </div> 
        <div class="form-group">
            <label >Mã Ngân hàng:</label>
            <label>{{$inputData['vnp_BankCode']}}</label>
        </div> 
        <div class="form-group">
            <label >Thời gian thanh toán:</label>
            <label>{{$inputData['vnp_PayDate']}}</label>
        </div> 
        <div class="form-group">
            <label >Kết quả:</label>
            <label>
                {{$inputData['responStatus']}}
            </label>
        </div> 
    </div>
    <p>
        &nbsp;
    </p>

</div>  
<br>
<br>
<br>
@include('home.request')
@include('home.login')
@endsection


