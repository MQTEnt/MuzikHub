<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';
	protected $fillable = ['id', 'content', 'song_id'];
	public $timestamps = true;
}
