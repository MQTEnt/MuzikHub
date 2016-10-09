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
    return view('upload');
});
Route::get('/get_artists',function(){
	$data = DB::table('artists')->select(['id', 'name'])->get();
	$artists = ['artists' => $data];
	return $artists;
});
Route::group(['prefix' => 'admin'], function(){
	//Songs
	Route::get('song', ['as' => 'song.index', 'uses' => 'SongsController@index']);
	Route::post('song/audio_file', ['as' => 'song.storeAudioFile', 'uses' => 'SongsController@storeAudioFile']);
	Route::post('song/image_file', ['as' => 'song.storeImageFile', 'uses' => 'SongsController@storeImageFile']);
	Route::get('audio/delete/{idAudio}', 'SongsController@deleteAudio');
	Route::get('image/delete/{idImage}', 'SongsController@deleteImage');
	Route::post('artist', 'SongsController@insertArtist');
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