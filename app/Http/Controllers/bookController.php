<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\book;
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

class bookController extends Controller
{
/**
* Display a listing of the resource.
*
* @return \Illuminate\Http\Response
*/
public function index()
{
    if (Auth::user()->isadmin=1) {
        
    }
$dsbook = book::where('author',Auth::id())->get();
// dd($dskhoa);
return view('Admin.book.index')->with('dsbook',$dsbook);
}

/**
* Show the form for creating a new resource.
*
* @return \Illuminate\Http\Response
*/
public function create()
{
$dscate = DB::table('category')->where('active', '=', 1)->get();
return view('Admin.book.create')->with('dscate',$dscate);
}


public function check($idbook, $categoryid){
    $count = DB::table('tag')->where('tag.idbook', $idbook)
                                ->where('tag.categoryid', $categoryid)
                                ->where('tag.status', '=', 1)->count();
    return $count;

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
'name.required'=>'Vui Lòng Nhập Tên Truyện!',
'chaptotal.required'=>'Vui Lòng Nhập Tổng Số Tập!',
'author.required'=>'Vui Lòng Nhập Tên Tác Giả!'
);

$rules = array(
'name'=>'required',
'chaptotal'=>'required',
'author'=>'required',
);
$validator = Validator::make(Input::all(), $rules,$messsages);
if ($validator->fails()) {
return back()->withErrors($validator)->withInput();
}

$k = new book();
$k->code = Uuid::generate()->string;
$k->name = $request->name;
$k->chaptotal = $request->chaptotal;
$k->author = $request->author;
$k->description = $request->description;
$k->uploadby = Auth::user()->id;
$k->uploaddate = Carbon::now();
//$k->active = $request->active;


if($request->hasFile('image')){
$file=$request->file('image');
$file->move('upload/image',$file->getClientOriginalName());
$k->image = $file->getClientOriginalName();
}
else{
$k->image = "abc.jpg";
}

$k->save();

$bookId = $k->id;
// dd($bookId);

//Tag
$tags = $request->input('tags');
// dd($tags);

foreach ($tags as $tag) {
$tagdata[]=[
'idbook' => $bookId,
'categoryid' => $tag,
];

}
tag::insert($tagdata);


//chap


$files = $request->file('chap');
$chaps = $request->input('chap');
$descs = $request->input('desc');
// dd($descs, $files, $chaps);
$count = count($chaps);
// dd($count);

foreach( $chaps as $index => $chap ) {
$fileaudio = $files[$index];
$fileaudioname = $fileaudio['filename']->getClientOriginalName();
// dd($fileaudio);
$fileaudio['filename']->move('upload/audio',$fileaudioname);


$desc = $descs[$index];
    $chapdata[]=[
    'idbook' => $bookId,
    'chapnumber' => $chap['chapnumber'],
    'description' => $desc['desc'],
    'filename' => $fileaudioname,
    ];

}
chap::insert($chapdata);
Session::flash('success', 'This is a message!'); 
return redirect(route('book.index')); //trả về trang cần hiển thị
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
    $book = DB::table('book')->join('chap', 'book.id', '=', 'chap.idbook')
                              ->where('book.id', $id)->get();
    $tags = DB::table('tag')->join('book', 'book.id', '=', 'tag.idbook')
                            ->join('category', 'category.id', '=', 'tag.categoryid')
                            ->where('tag.idbook', $id)->get();
                            dd($book, $tags);
    return view('admin.book.view')->with('book', $book)->with('tags', $tags);
}

/**
* Show the form for editing the specified resource.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function edit($id)
{
    $book = book::find($id);
    $chaps = DB::table('book')->join('chap', 'book.id', '=', 'chap.idbook')
                              ->where('book.id', $id)->where('chap.active', '=', 1)->get();
    $sql = "SELECT t.id as tagid, c.* FROM tag t JOIN category c on t.categoryid = c.id WHERE t.idbook = $id AND t.status =1";
    // $tags = DB::table('tag')->join('category', 'tag.categoryid', '=', 'category.id')
    //                         ->where('tag.idbook', $id)->get();
                            $tags = DB::select($sql);
                            // dd($tags);
    $dscate = DB::table('category')->where('active', '=', 1)->get();
    return view('admin.book.edit')->with('book', $book)->with('tags', $tags)->with('dscate', $dscate)->with('chaps', $chaps);
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
    $k = book::find($id);
    $k->name = $request->name;
    $k->chaptotal = $request->chaptotal;
    $k->author = $request->author;
    $k->description = $request->description;
    $k->uploadby = Auth::user()->id;
    // $k->uploaddate = Carbon::now();
    $k->active = $request->active;


    if($request->hasFile('image')){
        $file=$request->file('image');
        $file->move('upload/image',$file->getClientOriginalName());
        $k->image = $file->getClientOriginalName();
    }
    $k->save();

    $bookId = $id;
    // dd($bookId);

    //Tag
    $tags = $request->input('tags');
    if($tags == null){

    }else{
        foreach ($tags as $tag) {
            $count = $this->check($bookId, $tag);
            if($count == 0){
                $tagdata[]=[
                    'idbook' => $bookId,
                    'categoryid' => $tag,
                ];
                tag::insert($tagdata);
            }
        }
        
    }
    //chap
    $files = $request->file('chap');
    $chaps = $request->input('chap');
    $descs = $request->input('desc');
    // dd($descs, $files, $chaps);
    //$count = count($chaps);
    // dd($count);
    if($chaps > 0){
        foreach( $chaps as $index => $chap ) {
        $fileaudio = $files[$index];
        $fileaudioname = $fileaudio['filename']->getClientOriginalName();
        // dd($fileaudio);
        $fileaudio['filename']->move('upload/audio',$fileaudioname);


        $desc = $descs[$index];
            $chapdata[]=[
            'idbook' => $bookId,
            'chapnumber' => $chap['chapnumber'],
            'description' => $desc['desc'],
            'filename' => $fileaudioname,
            ];

        }
        chap::insert($chapdata);

    }

    

    return redirect(route('book.index')); //trả về trang cần hiển thị

}

/**
* Remove the specified resource from storage.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function destroy(Request $Request)
{
    // dd($Request->idbook);
    $k = book::findOrFail($Request->idbook);
    $k->active = 0;
    $k->save();
    Session::flash('deletesuccess', 'This is a message!');
    return redirect(route('book.index')); //trả về trang cần hiển thị
}
}
