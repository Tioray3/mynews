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
    return view('welcome');
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){
    Route::get('news/create', 'Admin\NewsController@add');
    Route::post('news/create', 'Admin\NewsController@create');
    Route::get('news', 'Admin\NewsController@index');
    Route::get('news/edit', 'Admin\NewsController@edit');
    Route::post('news/edit', 'Admin\NewsController@update');
    Route::get('news/delete', 'Admin\NewsController@delete');
});

//PHP/Laravel 09 Routingについて理解する
//課題3.「http://XXXXXX.jp/XXX というアクセスが来たときに、
//      AAAControllerのbbbというAction に渡すRoutingの設定」を書いてみてください
Route::get('XXX' , 'AAAController@bbb');

//課題4.
//admin/profile/create にアクセスしたら ProfileController の add Action に割り当てる
//admin/profile/edit にアクセスしたら ProfileController の edit Action に割り当てる
//Route::get('admin/profile/create' , 'Admin\ProfileController@add')->middleware('auth');
//Route::get('admin/profile/edit' , 'Admin\ProfileController@edit')->middleware('auth');
//group化した場合は次のようになる
Route::group(['prefix' => 'admin/profile', 'middleware' => 'auth'], function(){
    Route::get('create' , 'Admin\ProfileController@add');
    Route::post('create' , 'Admin\ProfileController@create');
    Route::get('edit' , 'Admin\ProfileController@edit');
    Route::post('edit' , 'Admin\ProfileController@update'); 
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
