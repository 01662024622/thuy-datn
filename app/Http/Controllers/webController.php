<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\book;
use App\chap;
use App\tag;
use App\category;
use App\Order;
use Validator;
use Illuminate\Support\Facades\Input;
use Webpatser\Uuid\Uuid;
use DB;
use Carbon\Carbon;
use Session;
use Auth;
use Illuminate\Pagination\Paginator;


class webController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sql = "SELECT * FROM book WHERE active = 1 ORDER BY followcount DESC LIMIT 4  ";
        $top4book = DB::select($sql);
        $dscate = DB::table('category')->where('active', '=', 1)->get();
        //dd($top4book);
        return view('Home.index')->with('top4book', $top4book)->with('dscate', $dscate);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    public function searchBook(){
        $dscate = DB::table('category')->where('active', '=', 1)->get();
        $dsbook = DB::table('book')->where('active', '=', 1)->paginate(3);
        // dd($dsbook);
        return view('Home.searchbook')->with('dsbook', $dsbook)->with('dscate', $dscate)->with('dscate', $dscate);
    }

    public function myBook(){
        if(Auth::check()){
            $id = Auth::user()->id;
            $dscate = DB::table('category')->where('active', '=', 1)->get();
            $dsbook = DB::table('book')->join('follow', 'follow.bookid', 'book.id')->where('follow.userid', '=', $id)->where('active', '=', 1)->paginate(3);
            // dd($dsbook);
            $count = DB::table('book')->join('follow', 'follow.bookid', 'book.id')->where('follow.userid', '=', $id)->where('active', '=', 1)->get()->count();
            return view('Home.mybook')->with('dsbook', $dsbook)->with('dscate', $dscate)->with('count', $count);
        }else{

            $dscate = DB::table('category')->where('active', '=', 1)->get();
            return view('Home.mybook')->with('dscate', $dscate);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $date = Carbon::today()->subDays(30);
        $book = book::find($id);

        $order = Order::where('book_id',$book->id)->where('orders.created_at', '>=', date($date))->first();
        $chaps = DB::table('book')->join('chap', 'book.id', '=', 'chap.idbook')
                                ->join('orders','book.id','=','orders.book_id')
                                ->where('book.id', $id)->where('orders.user_id',Auth::id())
                                ->where('orders.created_at', '>=', date($date))
                                ->get();
                                // return $chaps;
                              // return $chaps;
        $tags = DB::table('tag')->join('book', 'book.id', '=', 'tag.idbook')
                                ->join('category', 'category.id', '=', 'tag.categoryid')
                                ->where('tag.idbook', $id)->get();

        $sql = "SELECT u.name, u.email, c.content, c.createdate  FROM book b
                    JOIN Comment c ON b.id = c.bookid
                    JOIN users u ON u.id = c.userid
                    WHERE b.id = $id AND c.active = 1 ORDER BY c.createdate DESC";
        $comment = DB::select($sql);
        
            $dscate = DB::table('category')->where('active', '=', 1)->get();

        
        if(Auth::check()){
            $userid = Auth::user()->id;
            $follow = DB::table('book')->join('follow', 'follow.bookid', '=', 'book.id')
                              ->where('book.id', $id)->where('follow.userid', $userid)->count();
            
        }else{
            $follow = 0;
            
        }
        //dd($comment);
        return view('home.bookview')->with('comment', $comment)->with('dscate', $dscate)->with('follow', $follow)->with('chaps', $chaps)->with('book', $book)->with('tags', $tags)->with('order',$order);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function dsTruyen_timkiem($maLoai, $name, $author){
        try{
            
            $sql = "SELECT DISTINCT b.* FROM book b JOIN tag t on b.id = t.idbook";
            $sqlWhere = "";
            if(
                $maLoai !=0 ||                
                $name !="-" ||
                $author !="-" ){
                $sql .= " WHERE ";
                if($name != "-"){
                    if($sqlWhere != ""){
                        $sqlWhere .= " AND ";
                    }
                    $sqlWhere = " b.name like '%".$name."%'";
                }
                if($author != "-"){
                    if($sqlWhere != ""){
                        $sqlWhere .= " AND ";
                    }
                    $sqlWhere = "  b.author like '%".$author. "%'";
                }
                if($maLoai != 0){
                    if($sqlWhere != ""){
                        $sqlWhere .= " AND ";
                    }
                    $sqlWhere .= "t.categoryid = $maLoai";
                }
                
                $sql .= $sqlWhere;
            }
            
            $dsbooks = DB::select($sql);
            
           
            $dscate = DB::table('category')->where('active', '=', 1)->get();
                return view('Home.search1', [
                    'dscate' =>$dscate,
                    'dsbook' =>$dsbooks,
                    'maLoai' =>$maLoai,
                    'name' =>$name,
                    'author' =>$author
                ]);
        }
        
        catch(QueryException $ex){
            return reponse([
                'error' => true,
                'message' => $ex->getMessage()
            ], 200);
        } catch(PDOExpection $ex){
            return reponse([
                'error' => true,
                'message' => $ex->getMessage()
            ], 200);
        }
    }
}
