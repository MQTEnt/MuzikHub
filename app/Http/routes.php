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

Route::group(['prefix' => 'admin'], function(){
	//Songs
	Route::get('song', ['as' => 'song.index', 'uses' => 'SongsController@index']);
	Route::post('song/audio_file', ['as' => 'song.storeAudioFile', 'uses' => 'SongsController@storeAudioFile']);
	Route::post('song/image_file', ['as' => 'song.storeImageFile', 'uses' => 'SongsController@storeImageFile']);
});