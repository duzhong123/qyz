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

// Route::get('/', function () {
//     echo 111;
// });

Route::any("/","admin\IndexController@index");
//导航栏
Route::prefix('banner')->group(function(){
    Route::any("/banner","admin\BannerController@banner");//添加展示
    Route::any("/bannerAdd","admin\BannerController@bannerAdd");//添加执行
    Route::any("/show","admin\BannerController@show");//列表展示
    Route::any("/del","admin\BannerController@del");//删除
    Route::any("/upd/{id}","admin\BannerController@upd");//修改展示
    Route::any("/updAdd","admin\BannerController@updAdd");//修改执行
    Route::any("/ajaxname","admin\BannerController@ajaxname");//修改执行
    Route::any("/ajaxshow","admin\BannerController@ajaxshow");//修改执行
});
