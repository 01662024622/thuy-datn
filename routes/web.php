<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', '\App\Http\Controllers\webController@index');

// Route::get('/findbook', function () {
//     return view('Home/book');
// });
// 
Route::get('files/{pathToFile}', function($pathToFile) {
       $file = public_path() . '/upload/audio/' . $pathToFile;
    $mime_type = "audio/mpeg";
    $headers = array(
        'Accept-Ranges: 0-' . (filesize($file) -1) ,

        'Content-Length:'.filesize($file),
        'Content-Type:' . $mime_type,
        'Content-Disposition: inline; filename="'.$pathToFile.'"'

    );
    $fileContents = File::get($file);
    return Response::make($fileContents, 200, $headers);

});
Auth::routes(['verify' => true]);
Auth::routes();


Route::get('admin', ['middleware' => 'admin', function () {
    //
}]);

Route::prefix("/")->middleware(['auth'])->group(function(){
	Route::get('/payment', 'PaymentController@index');
	Route::post('/payment/request', 'PaymentController@payment');
	Route::get('/vnpay_return', 'PaymentController@vnpayreturn');
	Route::get('/upload/audio/{audio}', 'PaymentController@audio');

});


Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::resource('category', 'categoryController')->middleware(['isadmin','verified']);
Route::resource('user', 'userController')->middleware(['isadmin','verified']);
Route::resource('book', 'bookController')->middleware(['manager','verified']);
Route::resource('chap', 'chapController')->middleware(['isadmin','verified']);
Route::resource('tag', 'tagController')->middleware(['isadmin','verified']);

Route::resource('home', 'webController');
Route::resource('comment', 'commentController');
Route::resource('follow', 'followController');
Route::resource('request', 'requestController');
Route::get('/search', 'webController@searchBook')->name('search');
Route::get('/mybook', 'webController@myBook')->name('myBook');
Route::get('/search/{maLoai}/{name}/{author}', ['uses' => 'webController@dsTruyen_timkiem']);
Route::get('/', '\App\Http\Controllers\webController@index');

