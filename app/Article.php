<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //

    public function tags()
    {
    	return $this->belongsToMany('App\Tag');
    }

    public function formattedDate()
	{
    	return $this->created_at->format('d-M-Y  H:m');
	}
}
