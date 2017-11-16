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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['middleware' => ['auth:api']], function() {
     Route::post('/login', 'AdminController@login');
     Route::post('/logout', 'Admincontroller@logout');
     Route::get('/test', 'TestController@Test');
     Route::get('/post/posts', 'PostController@Posts');
     Route::post('/post/create', 'PostController@create');
     Route::post('/roll/create', 'RollController@create');
     Route::post('/post/update', 'PostController@upate');
//    Route::post('/post/update/{P_id}')
});

