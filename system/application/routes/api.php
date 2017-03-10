<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

/*-- User --*/
Route::get('/admin/api/user/list','api\UserController@index');
Route::get('/admin/api/user/get/{id}','api\UserController@get');
Route::post('/admin/api/user/create','api\UserController@store');
Route::get('/admin/api/user/delete/{id}','api\UserController@destroy');
Route::post('/admin/api/user/update/{id}','api\UserController@update');
/*-- end --*/

/*-- Order --*/
Route::get('/admin/api/order/list/{item}/{page}','api\OrderController@index');
Route::get('/admin/api/order/get/{id}','api\OrderController@get');
Route::any('/admin/api/order/create','api\OrderController@store');
Route::get('/admin/api/order/delete/{id}','api\OrderController@destroy');
Route::post('/admin/api/order/update/{id}','api\OrderController@update');
/*-- end --*/
/*-- Product --*/
/*-- end --*/
/*-- Attachment --*/
/*-- end --*/
/*-- Shipping --*/
/*-- end --*/