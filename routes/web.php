<?php

use Illuminate\Support\Facades\Route;


Route::get('/', 'PostController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('post/view/{id}','PostController@show');
Route::get('postbycategory/{id}','PostController@categoryshow');


Route::group(['prefix' => 'admin','middleware' =>'myware'], function () {

    Route::get('post/create','PostController@create');
    Route::post('post/create','PostController@store');
    Route::get('category/create','CategoryController@create');
    Route::post('category/create', 'CategoryController@store');
    Route::get('post/edit/{id}','PostController@edit');
    Route::post('post/edit/{id}','PostController@update');
    Route::get('post/delete/{id}','PostController@destroy');
    Route::post('post/comment','CommentController@store');
    // Route::get('image/delete/{id}','PostController@photodel');
    Route::get('users/all','HomeController@allusers')->middleware(['can:isAdmin']);



});