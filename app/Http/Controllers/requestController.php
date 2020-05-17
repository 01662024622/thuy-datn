<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\book;
use App\chap;
use App\tag;
use App\category;
use App\requestbook;
use Validator;
use Illuminate\Support\Facades\Input;
use Webpatser\Uuid\Uuid;
use DB;
use Carbon\Carbon;
use Session;
use Auth;

class requestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dsrequest = DB::table('request')
        ->join('category', 'category.id', 'request.categoryid')
        ->join('users', 'users.id', 'request.userid')
        ->select('users.*', 'category.name as categoryname', 'request.*')->get();
        // dd($dsrequest);
        return view('Admin.request.index')->with('dsrequest', $dsrequest);
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
        $k = new requestbook();
        $k->userid = Auth::user()->id;
        $k->content = $request->content;
        $k->bookname = $request->bookname;
        $k->categoryid = $request->categoryid;
        $k->status = 0;
        $k->createdate = Carbon::now();
        $k->save();
        Session::flash('success', 'This is a message!'); 
        return back();
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
    public function update(Request $request)
    {
        $k = requestbook::findOrFail($request->id);
        // dd($k, $k1);
        $k->status = '1';
        $k->save();

        Session::flash('duyetsuccess', 'This is a message!');
        return redirect(route('request.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $Request)
    {
        $kh = requestbook::findOrFail($Request->id);
        $kh->delete();
        Session::flash('deletesuccess', 'This is a message!');
        return redirect(route('request.index'));
    }
}
