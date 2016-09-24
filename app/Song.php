<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
	protected $table = 'songs';
	protected $fillable = ['id', 'name', 'year_composed', 'path', 'description'];
	public $timestamps = true;
}
