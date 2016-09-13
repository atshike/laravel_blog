<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

/*
 * web
 */
Route::get('/', "web\IndexController@index");

//文章列表
Route::get('/list', "web\IndexController@listing")->where('id', '[0-9]+');

//文章详情
Route::get('/show', "web\IndexController@show");

 //登录
Route::any('/login', "Admin\LoginController@index");

//验证码
Route::get('/code', "Admin\LoginController@code");

// 后台管理
Route::group(['middleware' => ['web', 'admin.login'], 'prefix' => 'admin', 'namespace' => 'Admin'], function () {

    Route::get('/index', "IndexController@index");
    Route::get('/quite', "IndexController@quite");
    Route::get('/info', "IndexController@info");
    Route::any('/updatepwd', "IndexController@updatepwd");
    Route::any('/upload', "ApiController@upload");

    //文章 CRUD
    Route::get('/listarticle', "ArticleController@articlelist");
    Route::delete('/deltarticle/{id}', "ArticleController@destroy")->where('id', '[0-9]+');
    Route::get('/addarticle', "ArticleController@articleadd");
    Route::post('/store', "ArticleController@store");
    Route::get('/editarticle/{id}', "ArticleController@edit")->where('id', '[0-9]+');
    Route::put('/updatearticle/{id}', 'ArticleController@update')->where('id', '[0-9]+');

    //栏目CRUD
    Route::get('/listcolumn', "ColumnController@columnlist");
    Route::delete('/deltarticle/{id}', "ColumnController@destroy")->where('id', '[0-9]+');
    Route::get('/addcolumn', "ColumnController@columnadd");
    Route::post('/columnstore', "ColumnController@store");
    Route::get('/editcolumn/{id}', "ColumnController@edit")->where('id', '[0-9]+');
    Route::put('/updatecolumn/{id}', 'ColumnController@update')->where('id', '[0-9]+');
});
