<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Song;

class SongsController extends Controller
{
	public function index(){
		$songs = Song::all();
		return view('admin.songs', compact('songs'));
	}
	public function store(){
		
	}
}
