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

Route::group(['prefix' => 'admin'], function(){
    Route::get('news/create', 'Admin\NewsController@add');
});

//PHP/Laravel 09 Routingについて理解する
//課題3.「http://XXXXXX.jp/XXX というアクセスが来たときに、
//      AAAControllerのbbbというAction に渡すRoutingの設定」を書いてみてください
Route::get('XXX' , 'AAAController@bbb');

//課題4.
//admin/profile/create にアクセスしたら ProfileController の add Action に割り当てる
Route::get('admin/profile/create' , 'Admin\ProfileController@add');
//admin/profile/edit にアクセスしたら ProfileController の edit Action に割り当てる
Route::get('admin/profile/edit' , 'Admin\ProfileController@edit');
//group化した場合は次のようになる
//Route::group(['prefix' => 'admin/profile'], function(){
//    Route::get('create' , 'admin\ProfileController@add');
//    Route::get('edit' , 'admin\ProfileController@edit');
//});