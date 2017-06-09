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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/index',['as' => 'index' ,'uses' => 'IndexController@index']);
Route::get('/post',['as' => 'show.post' ,'uses' => 'IndexController@show']);
Route::group(['prefix'=>'/'], function (){
    Route::resource('admin', 'AdminController');
    Route::resource('admin/product', 'PriceController');
    Route::resource('discount', 'DiscountController');
    Route::resource('permissions', 'PermissionsController');
    Route::resource('image', 'ImageController');
});
//Route::resource('/admin','AdminController');

//Route::get('/test', function() {
//    if (DB::connection()->getDatabaseName())  {
//        dd('Есть контакт!');
//    } else {
//        return 'Соединения нет';
//    }
//    });