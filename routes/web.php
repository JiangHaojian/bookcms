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

Route::get('/', function () {
    return view('index');
});
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
