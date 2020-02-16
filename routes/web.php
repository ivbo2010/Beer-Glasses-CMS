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

/*Route::get('/', function () {
    return view('welcome');
});
*/
Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage-users')->group(function (){
    Route::resource('users', 'UsersController' , ['except'=>['show','create','store']]);
    Route::resource('settings','SettingController')->only(['index','store']);
});

//Frontend
Route::get('/', 'HomeController@index')->name('home');
Route::get('setting', 'SettingController@index')->name('setting');
Route::resource('beer', 'BeerController');
Route::resource('category', 'CategoryController');
Route::resource('country', 'CountryController');
Route::resource('tag', 'TagController');
Route::resource('pub', 'PubController');
Route::resource('pubcategory', 'PubCategoryController');
//Search
Route::get('/search', 'SearchController@index')->name('search.index');
Route::get('/search-results', 'SearchController@search')->name('search.result');
// Admin
// Trashed beers
Route::get('admin/beer/trashed',[
    'uses' => 'Admin\BeerController@trashed',
    'as' => 'beer.trashed'
]);

Route::get('admin/beer/kill/{id}',[
    'uses' => 'Admin\BeerController@kill',
    'as' => 'beer.kill'
]);

Route::get('admin/beer/restore/{id}',[
    'uses' => 'Admin\BeerController@restore',
    'as' => 'beer.restore'
]);
// Trashed Pub
Route::get('admin/pub/trashed',[
    'uses' => 'Admin\PubController@trashed',
    'as' => 'pub.trashed'
]);

Route::get('admin/pub/kill/{id}',[
    'uses' => 'Admin\PubController@kill',
    'as' => 'pub.kill'
]);

Route::get('admin/pub/restore/{id}',[
    'uses' => 'Admin\PubController@restore',
    'as' => 'pub.restore'
]);
Route::get('admin/home', 'Admin\HomeController@index');
Route::resource('admin/beer', 'Admin\BeerController');
Route::resource('admin/category', 'Admin\CategoryController');
Route::resource('admin/country', 'Admin\CountryController');
Route::resource('admin/tag', 'Admin\TagController');
Route::resource('admin/pub', 'Admin\PubController');
Route::resource('admin/pubcategory', 'Admin\PubCategoryController');

