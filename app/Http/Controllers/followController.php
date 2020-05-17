<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\book;
use App\chap;
use App\tag;
use App\follow;
use App\category;
use Validator;
use Illuminate\Support\Facades\Input;
use Webpatser\Uuid\Uuid;
use DB;
use Carbon\Carbon;
use Session;
use Auth;

class followController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
        
        $k = new follow();
        $k->userid = Auth::user()->id;
        $k->bookid = $request->bookid;
        $k->createdate = Carbon::now();
        $k->save();

        $book = book::find( $request->bookid);
        $book->followcount = $book->followcount + 1;
        $book->save();

        Session::flash('success', 'This is a message!'); 
        return redirect(route('home.show', ['book' => $k->bookid])); //trả về trang cần hiển thị
        }
        catch(QueryException $ex){
            return reponse([
                'error' => true, 'message' => $ex->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
}
