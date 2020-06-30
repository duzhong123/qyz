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

Route::any("/","admin\IndexController@index")->middleware("login");
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
Route::prefix('category')->middleware("login")->group(function(){
    Route::any("/category","admin\CategoryController@category");//添加展示
    Route::any("/categoryAdd","admin\CategoryController@categoryAdd");//添加执行
    Route::any("/show","admin\CategoryController@show");//列表展示
    Route::any("/del","admin\CategoryController@del");//删除
    Route::any("/upd/{id}","admin\CategoryController@upd");//修改展示
    Route::any("/updAdd","admin\CategoryController@updAdd");//修改执行
    Route::any("/ajaxname","admin\CategoryController@ajaxname");//即点即改
});
//分类下的内容
Route::prefix('content')->middleware("login")->group(function(){
    Route::any("/content","admin\ContentController@content");//添加展示
    Route::any("/contentAdd","admin\ContentController@contentAdd");//添加执行
    Route::any("/show","admin\ContentController@show");//展示
    Route::any("/del","admin\ContentController@del");//删除
    Route::any("/ajaxname","admin\ContentController@ajaxname");//即点即改
    Route::any("/upd/{id}","admin\ContentController@upd");//修改展示
    Route::any("/updAdd","admin\ContentController@updAdd");//修改执行
});
//分类图片
Route::prefix('picture')->middleware("login")->group(function(){
    Route::any("/picture","admin\PictureController@picture");//添加展示
    Route::post("/pictureAdd","admin\PictureController@pictureAdd");//添加执行
    Route::any("/pictAdd","admin\PictureController@pictAdd");//添加执行
    Route::any("/show","admin\PictureController@show");//展示
    Route::any("/del","admin\PictureController@del");//删除
    Route::any("/upd/{id}","admin\PictureController@upd");//修改展示
    Route::any("/updAdd","admin\PictureController@updAdd");//修改展示
});
//留言评论
Route::prefix('messeges')->middleware("login")->group(function(){
    Route::any("/show","admin\MessegesController@show");//展示
    Route::any("/del","admin\MessegesController@del");//删除
});

//登录注册
Route::prefix('rbac')->group(function(){
    Route::any("/reg","admin\LoginController@reg");//注册展示
    Route::any("/regAdd","admin\LoginController@regAdd");//注册执行
    Route::any("/login","admin\LoginController@login");//登录
    Route::any("/loginAdd","admin\LoginController@loginAdd");//登录执行
});
//权限管理
Route::prefix('power')->group(function(){
    Route::any("/power","admin\PowerController@power");//权限展示
    Route::any("/powerAdd","admin\PowerController@powerAdd");//权限执行
    Route::any("/show","admin\PowerController@show");//权限执行
    Route::any("/del","admin\PowerController@del");//权限执行
    Route::any("/upd/{id}","admin\PowerController@upd");//修改展示
    Route::any("/updAdd","admin\PowerController@updAdd");//修改展示
});
//角色管理
Route::prefix('role')->group(function(){
    Route::any("/role","admin\RoleController@role");//角色展示
    Route::any("/roleAdd","admin\RoleController@roleAdd");//角色执行
    Route::any("/show","admin\RoleController@show");//展示
    Route::any("/del","admin\RoleController@del");//删除
    Route::any("/upd/{id}","admin\RoleController@upd");//修改展示
    Route::any("/updAdd","admin\RoleController@updAdd");//修改执行
    Route::any("/content/{id}","admin\RoleController@content");//赋予权限
    Route::any("/contentAdd","admin\RoleController@contentAdd");//赋予权限执行
});
//用户管理
Route::prefix('user')->group(function(){
    Route::any("/show","admin\UserController@show");//用户展示
    Route::any("/content/{id}","admin\UserController@content");//赋予角色
    Route::any("/contentAdd","admin\UserController@contentAdd");//赋予角色
});
