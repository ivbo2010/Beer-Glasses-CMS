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

// Books
Route::apiResource('beers', 'API\BeerController');
Route::apiResource('pubs', 'API\PubController');


    Route::get('todo', 'Api\TodoController@index');
    Route::post('todo', 'Api\TodoController@create');
    Route::delete('todo/{id}', 'Api\TodoController@destroy');

/*
Route::get('beers', 'Api\BeerController@index');
Route::post('beers', 'Api\BeerController@create');
Route::get('beers/{id}', 'Api\BeerController@show');
Route::delete('beers/{id}', 'Api\BeerController@destroy');
*/
Route::get('category', 'Api\CategoryController@index');
Route::get('category/{id}', 'Api\CategoryController@show');

Route::get('pubcategory', 'Api\PubCategoryController@index');
Route::get('pubcategory/{id}', 'Api\PubCategoryController@show');

Route::get('tag', 'Api\TagController@index');
Route::get('tag/{id}', 'Api\TagController@show');

Route::get('country', 'Api\CountryController@index');
Route::get('country/{id}', 'Api\CountryController@show');



