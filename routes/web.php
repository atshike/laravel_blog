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
Route::get('/list', "web\IndexController@listing")->where('id', '[0-9]+');
Route::get('/show', "web\IndexController@show");
/*
 * Admin
 */
Route::any('/login', "Admin\LoginController@index");
Route::get('/code', "Admin\LoginController@code");


Route::group(['middleware' => ['web', 'admin.login'],'prefix'=>'admin','namespace'=>'Admin'], function () {

    Route::get('/index', "IndexController@index");
    Route::get('/quite', "IndexController@quite");
    Route::get('/info', "IndexController@info");
    Route::any('/updatepwd', "IndexController@updatepwd");
    Route::any('/upload', "ApiController@upload");

    Route::get('/addarticle', "ArticleController@articleadd");
    Route::any('/store', "ArticleController@store");
    Route::get('/updatearticle', "ArticleController@updatearticle")->where('id', '[0-9]+');
    Route::get('/listarticle', "ArticleController@articlelist");
    Route::get('/deltarticle', "ArticleController@articledel");

    Route::get('/addcolumn', "ColumnController@columnadd");
    Route::get('/updatecolumn', "ColumnController@updatecolumn")->where('id', '[0-9]+');
    Route::get('/listcolumn', "ColumnController@columnlist");
    Route::get('/deltarticle', "ColumnController@articledel");
});
