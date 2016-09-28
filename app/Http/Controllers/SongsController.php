<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\AudioRequest;
use App\Http\Requests\ImageRequest;
use App\Song;
use App\Lib\MimeReader;
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
	public function storeImageFile(ImageRequest $request){
		$audioFile = $request->file('imageFile');
		if ($audioFile!=null) {

            $ext = $audioFile->getClientOriginalExtension();
            $nameFile = str_random(15).'.'.$ext;
        }
		$publicDir = public_path().'/media/imgs';
		
  		$request->file('imageFile')->move($publicDir, $nameFile);
        return 'success';
	}
	public function storeAudioFile(AudioRequest $request){
		$audioFile = $request->file('audioFile');
		if ($audioFile!=null) {

            $ext = $audioFile->getClientOriginalExtension();
            $nameFile = str_random(15).'.'.$ext;
        }
		$publicDir = public_path().'/media/songs';
		
  		$request->file('audioFile')->move($publicDir, $nameFile);
        return 'success';
	}
}
