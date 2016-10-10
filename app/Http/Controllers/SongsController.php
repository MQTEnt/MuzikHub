<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\AudioRequest;
use App\Http\Requests\ImageRequest;
use App\Http\Requests\ArtistRequest;
use App\Http\Requests\CateRequest;
use App\Song;
use App\Audio;
use App\Image;
use App\Artist;
use App\Cate;
use App\Lib\MimeReader;
use File;
use Illuminate\Support\Facades\Validator;
class SongsController extends Controller
{
	public function __construct(){
		/*
		*Add custom validate (adudio file)
		*... after that, add rule and message in SongFormRequest
		*/
		Validator::extend('audio', function($attribute, $value, $parameters)
		{
			$allowed = array('audio/mpeg', 'application/ogg', 'audio/wave', 'audio/aiff');
			$mime = new MimeReader($value->getRealPath());
			return in_array($mime->get_type(), $allowed);
		});
	}
	public function index(){
		$songs = Song::all();
		return view('admin.songs', compact('songs'));
	}
	public function store(Request $request){
		Song::create([
			'name' => $request->name,
			'year_composed' => $request->year_composed,
			'lyric' => $request->lyric,
			'cate' => $request->cate,
			'singer' => $request->singer,
			'composer' => $request->composer,
			'audio_id' => $request->audio_id,
			'image_id' => $request->image_id
		]);
		return "success";
	}
	public function storeAudioFile(AudioRequest $request){
		$audioFile = $request->file('audioFile');
		if ($audioFile!=null) {

            $ext = $audioFile->getClientOriginalExtension();
            $nameFile = str_random(15).'.'.$ext;
        }
		$publicDir = public_path().'/media/songs';
		
  		$request->file('audioFile')->move($publicDir, $nameFile);

        //Save info into database
  		$audio = new Audio();
  		$audio->path = $publicDir.'/'.$nameFile;
  		$audio->save();
  		$dataResponse = ['idAudio' => $audio->id, 'success' => 'true'];
  		return $dataResponse;
	}
	public function storeImageFile(ImageRequest $request){
		$imageFile = $request->file('imageFile');
		if ($imageFile!=null) {

            $ext = $imageFile->getClientOriginalExtension();
            $nameFile = str_random(15).'.'.$ext;
        }
		$publicDir = public_path().'/media/imgs';
		
  		$request->file('imageFile')->move($publicDir, $nameFile);
        
        //Save info into database
  		$image = new Image();
  		$image->path = $publicDir.'/'.$nameFile;
  		$image->save();
  		$dataResponse = ['idImage' => $image->id, 'success' => 'true'];
  		return $dataResponse;
	}
	public function deleteAudio($idAudio){
		$audio = Audio::find($idAudio);
		File::Delete($audio->path);
		$audio->delete();
		return ['stat' => 'Deleted audio'];
	}
	public function deleteImage($idImage){
		$image = Image::find($idImage);
		File::Delete($image->path);
		$image->delete();
		return ['stat' => 'Deleted image'];
	}
	public function insertArtist(ArtistRequest $request){
		Artist::create([
			'name' => $request->name
		]);
		return 'Create a artist';
	}
	public function insertCate(CateRequest $request){
		Cate::create([
			'name' => $request->name
		]);
		return 'Create a category';
	}
}
