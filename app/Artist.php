<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    protected $table = 'artists';
	protected $fillable = ['id', 'name'];
	public $timestamps = true;
}
