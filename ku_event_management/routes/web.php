<?php

use Illuminate\Support\Facades\Route;



Route::get('/',"App\Http\Controllers\UsersController@index");
Route::get('/admin','App\Http\Controllers\AdminController@index');
Route::post('/admin','App\Http\Controllers\AdminController@auth');
Route::get('/admin/dashboard','App\Http\Controllers\AdminController@dashboard');
Route::get('/admin/logout','App\Http\Controllers\AdminController@logout');
Route::post('/admin/event/updateEvent','App\Http\Controllers\AdminController@updateEvent');
Route::post('/admin/event/deleteEvent','App\Http\Controllers\AdminController@deleteEvent');
Route::post('/admin/addEvent','App\Http\Controllers\AdminController@addEvent');
Route::get('/admin/event/{id}','App\Http\Controllers\AdminController@show');
Route::post('/admin/event/searchEvent','App\Http\Controllers\AdminController@searchEvent');

