<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
use Validator;
use DB;
use Session;
use app\user;
use Illuminate\Support\Facades\Input;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dsUser =  DB::table('users')->where('isadmin','<>',2)->get();
        return view('admin.user.index')->with('dsUser',$dsUser);
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
         $k = User::find($request->id);
        // dd($k, $k1);
        if ($k->isadmin==0) {

            $k->isadmin = 1;
            // return 'true';
        }else {

            $k->isadmin =0;

            // return 'false';
        }
        $k->save();

        Session::flash('capquyensuccess', 'This is a message!');
        return redirect(route('user.index'));
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
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $Request)
    {
        $kh = user::findOrFail($Request->id);
        $kh->delete();
        Session::flash('deletesuccess', 'This is a message!');
        return redirect(route('user.index'));
    }
}
