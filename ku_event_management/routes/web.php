<?php

use Illuminate\Support\Facades\Route;


//This is the admin routes 
Route::get('/admin','App\Http\Controllers\AdminController@index');
Route::post('/admin','App\Http\Controllers\AdminController@auth');
Route::get('/admin/dashboard','App\Http\Controllers\AdminController@dashboard');
Route::get('/admin/logout','App\Http\Controllers\AdminController@logout');
Route::post('/admin/event/updateEvent','App\Http\Controllers\AdminController@updateEvent');
Route::post('/admin/event/deleteEvent','App\Http\Controllers\AdminController@deleteEvent');
Route::post('/admin/addEvent','App\Http\Controllers\AdminController@addEvent');
Route::get('/admin/event/{id}','App\Http\Controllers\AdminController@show');
Route::post('/admin/event/searchEvent','App\Http\Controllers\AdminController@searchEvent');
Route::get('/admin/users','App\Http\Controllers\AdminController@showUsers');
Route::post('/admin/users/suspendaccount/{Id}','App\Http\Controllers\AdminController@suspendAccount');
Route::post('/admin/users/activateaccount/{Id}','App\Http\Controllers\AdminController@activateAccount');



//this are the user routes
Route::get('/',"App\Http\Controllers\UserController@index");
Route::get('/login',"App\Http\Controllers\UserController@showLogin");
Route::get('/register',"App\Http\Controllers\UserController@showRegister");
Route::post('/login',"App\Http\Controllers\UserController@login");
Route::post('/register',"App\Http\Controllers\UserController@register");
Route::post('/registerEvent',"App\Http\Controllers\UserController@registerEvent");
Route::get('/myEvents',"App\Http\Controllers\UserController@showMyEvents");
Route::post('/deregister',"App\Http\Controllers\UserController@deregister");
Route::get('/moreinfo/{id}',"App\Http\Controllers\UserController@showEvent");
Route::get('/myAccount',"App\Http\Controllers\UserController@showAccount");
Route::post('/myAccount',"App\Http\Controllers\UserController@updateAccount");


