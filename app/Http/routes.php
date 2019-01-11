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

Route::group(array('prefix' => 'api'), function() //, 'middleware' => 'auth0.jwt' , 'after' => 'add_token'
{
    Route::post('/hosts', ['as' => 'api', 'uses' => 'HostController@index']);
    Route::post('/hosts/{id}', ['as' => 'api', 'uses' => 'HostController@show']);


    Route::post('/stacks', ['as' => 'api', 'uses' => 'StackController@index']);
    Route::post('/stacks/{id}', ['as' => 'api', 'uses' => 'StackController@show']);
    Route::post('/stacks/{stack_id}/services', ['as' => 'api', 'uses' => 'ServiceController@index_by_stack']);
    Route::post('/stacks/{stack_id}/services/{id}', ['as' => 'api', 'uses' => 'ServiceController@show_by_stack']);


    Route::post('/services', ['as' => 'api', 'uses' => 'ServiceController@index']);
    Route::post('/services/{id}', ['as' => 'api', 'uses' => 'ServiceController@show']);
    Route::post('/services/{id}/upgrade', ['as' => 'api', 'uses' => 'ServiceController@upgrade']);
    Route::post('/services/{id}/finish_upgrade', ['as' => 'api', 'uses' => 'ServiceController@finish_upgrade']);
    Route::post('/services/{id}/scale/{scale_count}', ['as' => 'api', 'uses' => 'ServiceController@scale']);


});