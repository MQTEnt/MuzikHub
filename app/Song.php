<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
	protected $table = 'songs';
	protected $fillable = ['id', 'name', 'year_composed', 'lyric', 'audio_id', 'image_id', 'cate', 'singer', 'composer', 'like', 'download'];
	public $timestamps = true;
}
