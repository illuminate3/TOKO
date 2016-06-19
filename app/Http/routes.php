<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'TokoController@index');

Route::get('/product/{id}/show',['as' => 'product.show', 'uses' => 'TokoController@showItem']);

Route::get('product/cart/{id}', 'TokoController@tambahItem');

Route::get('product/cart', 'TokoController@showCart');

Route::get('cart/delete/{id}' , 'TokoController@hapusItem');

Route::get('cart/checkout', 'TokoController@checkout');

Route::post('/cart/{formid}/save',['as' => 'customer.save','uses' => 'TokoController@saveCustomer']);

Route::auth();

//Route::get('/home', 'HomeController@index');

Route::group(['prefix'=>'admin', 'middleware'=>['auth', 'role:admin']], function() {
	//route admin
	Route::resource('products', 'ProductsController');
	Route::get('laporan', 'ReportController@index');
	Route::post('laporan/periode',['as' => 'laporan.show', 'uses' => 'ReportController@getPeriode']);
});
