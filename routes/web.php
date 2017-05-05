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

Route::get('/'         , ['as' => 'home.index' , 'uses' => 'HomeController@index']);
Route::get('posts'     , ['as' => 'posts.index', 'uses' => 'PostsController@index']);
Route::get('posts/{id}', ['as' => 'posts.show' , 'uses' => 'PostsController@show']);

// 後台
Route::group(['prefix' => 'admin'], function() {
    Route::get('/', ['as' => 'admin.dashboard.index', 'uses' => 'AdminDashboardController@index']);
    //
    Route::get('posts'          , ['as' => 'admin.posts.index' , 'uses' => 'AdminPostsController@index']);
    Route::get('posts/create'   , ['as' => 'admin.posts.create' , 'uses' => 'AdminPostsController@create']);
    Route::get('posts/{id}/edit', ['as' => 'admin.posts.edit'   , 'uses' => 'AdminPostsController@edit']);
    Route::patch('posts/{id}'   , ['as' => 'admin.posts.update' , 'uses' => 'AdminPostsController@update']);
    Route::post('posts'         , ['as' => 'admin.posts.store'  , 'uses' => 'AdminPostsController@store']);
    Route::delete('posts/{id}'  , ['as' => 'admin.posts.destroy', 'uses' => 'AdminPostsController@destroy']);

    //資產
    Route::get('assets'          , ['as' => 'admin.assets.index' , 'uses' => 'AssetController@index']);
    Route::get('assets/create'   , ['as' => 'admin.assets.create' , 'uses' => 'AssetController@create']);
    Route::post('assets'         , ['as' => 'admin.asset.store'  , 'uses' => 'AssetController@store']);
    //未做
    Route::get('assets/{id}/edit', ['as' => 'admin.assets.edit'   , 'uses' => 'AssetController@edit']);
    Route::patch('assets/{id}'   , ['as' => 'admin.assets.update' , 'uses' => 'AssetController@update']);
    Route::delete('assets/{id}'  , ['as' => 'admin.assets.destroy', 'uses' => 'AssetController@destroy']);
});

Route::get('/tracy',function(){throw new \Exception('Tracy works');} );
