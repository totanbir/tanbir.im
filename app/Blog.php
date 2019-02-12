<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{

    // protected $table = 'blog';
    public function category()
    {
    	return $this->belongsTo('App\Category');
    }

    public function tag()
    {
    	return $this->belongsToMany('App\Tag');
    }
}
