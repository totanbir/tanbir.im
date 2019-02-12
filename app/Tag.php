<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = 'tag';

    public function blogs()
    {
    	return $this->belongsToMany('App\Blog');
    }
}
