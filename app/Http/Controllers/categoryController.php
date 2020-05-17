<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\category;
use Validator;
use Illuminate\Support\Facades\Input;
use Webpatser\Uuid\Uuid;
use DB;
use Carbon\Carbon;
use Session;

class categoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dscategory = category::all();
        // dd($dskhoa);
        return view('Admin.category.index')->with('dscategory',$dscategory);
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
        $messsages = array(
              'name.required'=>'Vui Lòng Nhập Tên Loại Truyện!',
              'name.unique'=>'Tên Loại Truyện Là Duy Nhất!'
            );

        $rules = array(
          'name'=>'required|unique:category',
        );
        $validator = Validator::make(Input::all(), $rules,$messsages);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $k = new category();
        $k->code = Uuid::generate()->string;
        $k->name = $request->name;
        $k->active = $request->active;
        $k->save();
        Session::flash('success', 'This is a message!'); 
        return redirect(route('category.index')); //trả về trang cần hiển thị
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
    public function update(Request $request)
    {
        // dd($request->K_MA);
        try{
        $k = category::findOrFail($request->id);
        // dd($k);

        $k->name = $request->name;
        $k->active = $request->active;
        $k->save();
        Session::flash('updatesuccess', 'This is a message!'); 
        return redirect(route('category.index')); //trả về trang cần hiển thị
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
    public function destroy(Request $Request)
    {
        $k = category::findOrFail($Request->id);
        $k->delete();
        Session::flash('deletesuccess', 'This is a message!');
        return redirect(route('category.index'));
    }
}
