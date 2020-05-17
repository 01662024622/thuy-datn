<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\book;
use App\comment;
use App\chap;
use App\tag;
use App\category;
use Validator;
use Illuminate\Support\Facades\Input;
use Webpatser\Uuid\Uuid;
use DB;
use Carbon\Carbon;
use Session;
use Auth;

class commentController extends Controller
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
            $userid = Auth::user()->id;
            $comment = new comment();
            $comment->userid = $userid;
            $comment->bookid = $request->bookid;
            $comment->content = $request->content;
            $comment->createdate = Carbon::now();
            $comment->save();
            return redirect(route('home.show', ['book' => $comment->bookid])); //trả về trang cần hiển thị
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
