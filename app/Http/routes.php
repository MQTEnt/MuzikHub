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
use Illuminate\Http\Request;
Route::get('/', function () {
	$songs = App\Song::limit(4)->orderBy('id', 'DESC')->get();
    return view('page.index', compact(['songs']));
});
Route::get('/get_artists',function(){
	$data = DB::table('artists')->select(['id', 'name'])->get();
	$artists = ['artists' => $data];
	return $artists;
});
Route::get('/get_cates',function(){
	$data = DB::table('cates')->select(['id', 'name'])->get();
	$cates = ['cates' => $data];
	return $cates;
});
Route::get('/single/{id}', ['as' => 'single.show', 'uses' => 'SongsController@getSingle']);
Route::get('/single/{id}/like', ['as' => 'single.like', 'uses' => 'SongsController@like']);
Route::get('/single/{id}/download', ['as' => 'single.download', 'uses' => 'SongsController@download']);
Route::post('/single/{id}/comment', ['as' => 'single.comment', 'uses' => 'SongsController@comment']);
Route::group(['prefix' => 'admin'], function(){
	//Songs
	Route::get('song', ['as' => 'song.index', 'uses' => 'SongsController@index']);
	Route::post('song/audio_file', ['as' => 'song.storeAudioFile', 'uses' => 'SongsController@storeAudioFile']);
	Route::post('song/image_file', ['as' => 'song.storeImageFile', 'uses' => 'SongsController@storeImageFile']);
	Route::post('song', ['as' => 'song.store', 'uses' => 'SongsController@store']);
	Route::get('song/{idSong}', ['as' => 'song.edit', 'uses' => 'SongsController@edit']);
	Route::post('song/{idSong}', ['as' => 'song.update', 'uses' => 'SongsController@update']);
	Route::get('song/delete/{idSong}', ['as' => 'song.delete', 'uses' => 'SongsController@delete']);
	Route::get('audio/delete/{idAudio}', 'SongsController@deleteAudio');
	Route::get('image/delete/{idImage}', 'SongsController@deleteImage');
	Route::post('artist', 'SongsController@insertArtist');
	Route::post('cate', 'SongsController@insertCate');
});






//Test upload file and process bar
Route::post('upload', function(Request $request){
	$fileUpload = $request->file('file');
	if ($fileUpload!=null) {

		$ext = $fileUpload->getClientOriginalExtension();
		$nameFile = str_random(15).'.'.$ext;
	}
	$publicDir = public_path().'/media';

	$request->file('file')->move($publicDir, $nameFile);
	return 'success';
});