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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
    //return $request->user();
//});

  Route::get('/services/articles', [
    'uses'=>'ArticleController@getAllApi',
    'middleware'=>'cors'
  ]);
  
  Route::get('/services/stores', [
    'uses'=>'StoreController@getAllApi',
    'middleware'=>'cors'
  ]);
  
  Route::get('/services/articles/stores/{id}', [
    'uses'=>'ArticleController@showById',
    'middleware'=>'cors'
  ]);

  Route::delete('/services/articles/delete/{id}', [
    'uses'=>'ArticleController@destroy',
    'middleware'=>'cors'
  ]);

  Route::delete('/services/stores/delete/{id}', [
    'uses'=>'StoreController@destroy',
    'middleware'=>'cors'
  ]);

  Route::post('/services/articles/add', [
    'uses'=>'ArticleController@store',
    'middleware'=>'cors'
  ]);

  Route::post('/services/stores/add', [
    'uses'=>'StoreController@store',
    'middleware'=>'cors'
  ]);

  Route::put('/services/articles/update/{id}', [
    'uses'=>'ArticleController@update',
    'middleware'=>'cors'
  ]);

  Route::put('/services/stores/update/{id}', [
    'uses'=>'StoreController@update',
    'middleware'=>'cors'
  ]);