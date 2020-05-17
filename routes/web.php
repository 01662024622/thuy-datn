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
use App\Http\Middleware\IsAdmin;
use App\Http\Middleware\CheckManager;

Route::get('/', '\App\Http\Controllers\webController@index');

// Route::get('/findbook', function () {
//     return view('Home/book');
// });

Auth::routes();


Route::get('admin', ['middleware' => 'admin', function () {
    //
}]);


Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::resource('category', 'categoryController')->middleware(IsAdmin::class);
Route::resource('user', 'userController')->middleware(IsAdmin::class);
Route::resource('book', 'bookController')->middleware(CheckManager::class);
Route::resource('chap', 'chapController')->middleware(IsAdmin::class);
Route::resource('tag', 'tagController')->middleware(IsAdmin::class);
Route::resource('home', 'webController');
Route::resource('comment', 'commentController');
Route::resource('follow', 'followController');
Route::resource('request', 'requestController');
Route::get('/search', 'webController@searchBook')->name('search');
Route::get('/mybook', 'webController@myBook')->name('myBook');
Route::get('/search/{maLoai}/{name}/{author}', ['uses' => 'webController@dsTruyen_timkiem']);