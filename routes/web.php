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

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'IndexController@index');
Route::get('/booklist', 'BookController@booklist');
Route::get('/loanlist', function () {
    return view('layouts/loanlist');
});
Route::get('/userlist', function () {
    return view('layouts/userlist');
});
Route::get('/addbook', function () {
    return view('layouts/addbook');
});
Route::post('/savebook', 'BookController@saveBook');
Route::get('/editbook/{id}', 'BookController@editbook');
Route::post('/updatebook', 'BookController@updatebook');
Route::get('/deletebook/{id}', 'BookController@deletebook');
Route::get('/loanlist', 'BookController@loanlist');
Route::get('/loan/{id}', 'BookController@loan');
Route::get('/unloan/{id}/{time}', 'BookController@unloan');
Route::group(['middleware' => ['auth'],'namespace'=>'Auth'],function (){
    Route::get('/logout', 'LoginController@logout');
});
Route::get('/userlist', 'UserController@userlist');
Route::get('/uplevel/{id}', 'UserController@uplevel');
Route::get('/downlevel/{id}', 'UserController@downlevel');
Route::get('/userinfo', 'UserController@userinfo');
Route::post('/saveuser', 'UserController@saveuser');
Route::get('/updatedate', 'UserController@updatedate');
Route::post('/searchbook', 'BookController@searchbook');
