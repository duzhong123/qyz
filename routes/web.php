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
    Route::any("/ajaxname","admin\BannerController@ajaxname");//极点技改排序
    Route::any("/ajaxshow","admin\BannerController@ajaxshow");//极点技改是否展示
});
//分类
Route::prefix('category')->group(function(){
    Route::any("/category","admin\CategoryController@category");//添加展示
    Route::any("/categoryAdd","admin\CategoryController@categoryAdd");//添加执行
    Route::any("/show","admin\CategoryController@show");//列表展示
    Route::any("/del","admin\CategoryController@del");//删除
    Route::any("/upd/{id}","admin\CategoryController@upd");//修改展示
    Route::any("/updAdd","admin\CategoryController@updAdd");//修改执行
    Route::any("/ajaxname","admin\CategoryController@ajaxname");//即点即改
});
//分类下的内容
Route::prefix('content')->group(function(){
    Route::any("/content","admin\ContentController@content");//添加展示
    Route::any("/contentAdd","admin\ContentController@contentAdd");//添加执行
    Route::any("/show","admin\ContentController@show");//展示
    Route::any("/del","admin\ContentController@del");//删除
    Route::any("/ajaxname","admin\ContentController@ajaxname");//即点即改
    Route::any("/upd/{id}","admin\ContentController@upd");//修改展示
    Route::any("/updAdd","admin\ContentController@updAdd");//修改执行
});
