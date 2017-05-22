<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
Route::auth();
Route::get('/home',
    function (){return view('home');
});
Route::get('/'         , ['as' => 'home.index' , 'uses' => 'HomeController@index']);
Route::get('posts'     , ['as' => 'posts.index', 'uses' => 'PostsController@index']);
Route::get('posts/{id}', ['as' => 'posts.show' , 'uses' => 'PostsController@show']);

// 後台
Route::group(['prefix' => 'admin'], function() {
    Route::get('/', ['as' => 'admin.dashboard.index', 'uses' => 'AdminDashboardController@index']);
    //
    Route::get('posts', ['as' => 'admin.posts.index', 'uses' => 'AdminPostsController@index']);
    Route::get('posts/create', ['as' => 'admin.posts.create', 'uses' => 'AdminPostsController@create']);
    Route::get('posts/{id}/edit', ['as' => 'admin.posts.edit', 'uses' => 'AdminPostsController@edit']);
    Route::patch('posts/{id}', ['as' => 'admin.posts.update', 'uses' => 'AdminPostsController@update']);
    Route::post('posts', ['as' => 'admin.posts.store', 'uses' => 'AdminPostsController@store']);
    Route::delete('posts/{id}', ['as' => 'admin.posts.destroy', 'uses' => 'AdminPostsController@destroy']);

    //資產

    Route::get('assets', ['as' => 'admin.assets.index', 'uses' => 'AssetController@index']);
    Route::get('assets/create', ['as' => 'admin.assets.create', 'uses' => 'AssetController@create']);
    Route::post('assets', ['as' => 'admin.asset.store', 'uses' => 'AssetController@store']);
    Route::get('assets/{id}/edit', ['as' => 'admin.assets.edit', 'uses' => 'AssetController@edit']);
    Route::patch('assets/{id}', ['as' => 'admin.assets.update', 'uses' => 'AssetController@update']);
    Route::delete('assets/{id}', ['as' => 'admin.assets.destroy', 'uses' => 'AssetController@destroy']);
    Route::post('assets/show'  , ['as' => 'admin.assets.show', 'uses' => 'AssetController@show']);
   
    //耗材
    Route::get('supplies'          , ['as' => 'admin.supplies.index' , 'uses' => 'SuppliesController@index']);
    Route::get('supplies/create'   , ['as' => 'admin.supplies.create' , 'uses' => 'SuppliesController@create']);
    Route::post('supplies'         , ['as' => 'admin.supplies.store'  , 'uses' => 'SuppliesController@store']);
    Route::get('supplies/{id}/edit', ['as' => 'admin.supplies.edit'   , 'uses' => 'SuppliesController@edit']);
    Route::patch('supplies/{id}'   , ['as' => 'admin.supplies.update' , 'uses' => 'SuppliesController@update']);
    Route::delete('supplies/{id}'  , ['as' => 'admin.supplies.destroy', 'uses' => 'SuppliesController@destroy']);
    Route::post('supplies/show'  , ['as' => 'admin.supplies.show', 'uses' => 'SuppliesController@show']);

    //廠商
    Route::get('vendors'          , ['as' => 'admin.vendors.index' , 'uses' => 'VendorsController@index']);
    Route::get('vendors/create'   , ['as' => 'admin.vendors.create' , 'uses' => 'VendorsController@create']);
    Route::post('vendors'         , ['as' => 'admin.svendors.store'  , 'uses' => 'VendorsController@store']);
    Route::get('vendors/{id}/edit', ['as' => 'admin.vendors.edit'   , 'uses' => 'VendorsController@edit']);
    Route::patch('vendors/{id}'   , ['as' => 'admin.vendors.update' , 'uses' => 'VendorsController@update']);
    Route::delete('vendors/{id}'  , ['as' => 'admin.vendors.destroy', 'uses' => 'VendorsController@destroy']);
    Route::post('vendors/show'  , ['as' => 'admin.vendors.show', 'uses' => 'VendorsController@show']);
    //耗材領取
   Route::get('supplies/{id}/receive/create'   , ['as' => 'admin.receive.create' , 'uses' => 'SuppliesController@receive']);
  //  Route::post('supplies/{id}/receive'   , ['as' => 'admin.receive.store' , 'uses' => 'SuppliesController@receivestore']);
    //添購跟新增合起來
   // Route::get('receive/{id}/edit', ['as' => 'admin.receive.edit'   , 'uses' => 'SuppliesController@receiveedit']);
//自動完成

});


Route::get('/tracy',function(){throw new \Exception('Tracy works');});
