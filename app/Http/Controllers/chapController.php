<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\chap;

class chapController extends Controller
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
        
        try{
        $chap = chap::findOrFail($request->chapid);
        if($request->active == 0){
            $chap->active = $request->active;//trước giống tên cột sau giống tên input ở form nhập liệu
            $chap->save();
            return back();
        }else{
            $chap->chapnumber = $request->chapnumber;
            $chap->description = $request->chapdescription;
            // dd($request->file('audioedit'));
            if($request->hasFile('audioedit')){
                $file=$request->file('audioedit');
                $file->move('upload/audio',$file->getClientOriginalName());
                $chap->filename = $file->getClientOriginalName();
            }
            $chap->save();
            return back();
        }
        
        
        
        
        }
        catch(QueryException $ex){
            return reponse([
                'error' => true, 'message' => $ex->getMessage()], 500);
        }
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
