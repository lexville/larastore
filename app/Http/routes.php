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

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('/store/create', [
    'uses' => 'StoresController@getStore',
    'as' => 'store',
    'middleware' => 'auth',
]);

Route::post('/store/create', [
    'uses' => 'StoresController@postStore',
    'middleware' => 'auth'
]);

Route::get('/store/{id}/product/create', [
    'uses' => 'ProductsController@getProducts',
    'as'  => 'products',
    'middleware' => 'auth'
]);

Route::post('/store/{id}/product/create', [
    'uses' => 'ProductsController@postProduct',
    'middleware' => 'auth'
]);

Route::get('/store', [
    'uses' => 'StoresController@getAllStores',
    'as' => 'store.all',
    'middleware' => 'auth'
]);

Route::get('/store/{id}', [
    'uses' => 'StoresController@getIndividualStore',
    'as' => 'store.show',
]);
