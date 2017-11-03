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
    return view('home');
});
Route::prefix(config('constants.ADMIN_URL'))->group(function(){

	Route::get('/','Admin\AuthController@getlogin');
	Route::post('/','Admin\AuthController@postLogin');
	Route::get('/logout','Admin\AuthController@logout');
	Route::get('/dashboard','Admin\AuthController@dashboard');
	Route::resource('/categories','Admin\CategoriesController');

});

Route::prefix(config('constants.VENDOR_URL'))->group(function(){

	Route::get('/','Vendor\AuthController@getlogin');
	Route::post('/','Vendor\AuthController@postlogin');

	Route::get('/signup','Vendor\AuthController@getsignup');
	Route::post('/signup','Vendor\AuthController@postsignup');

	Route::get('/logout','Vendor\AuthController@logout');
	Route::get('/dashboard','Vendor\AuthController@dashboard');
	Route::resource('/categories','Vendor\CategoriesController');
	Route::resource('/products','Vendor\ProductsController');
	//Route::resource('/images/{product_id}','Vendor\ImagesController');
	Route::get('/images/create/{product_id}','Vendor\ImagesController@create');
	Route::post('/images','Vendor\ImagesController@store');
});

//Route::get('/manager','Admin\AuthController@getLogin')->name('admin');
//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
