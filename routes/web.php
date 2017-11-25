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

Route::get('/',  "IndexController@index");


Route::any('/api/git/pull',  function (\Illuminate\Http\Request $request) {
    Artisan::call('git:pull');
});
Route::post('', function() {});


// api接口
Route::get('/posts', 'PostController@Posts');
Route::get('/post/{Pid}', 'PostController@post');
Route::get('/posts/index', 'PostController@indexPosts');
Route::get('/posts/list/{page}', 'PostController@listPosts');
Route::get('/rolls', 'RollController@rolls');
Route::post('/contact', 'ContactController@send');
//test
Route::get('/test', 'TestController@Test');




