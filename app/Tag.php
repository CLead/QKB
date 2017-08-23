<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //

	protected $fillable = array('Name');
	public $timestamps = false;

	public function articles()
    {
    	return $this->belongsToMany('App\Article');
    }


    public function getRouteKeyName()
    {
    	return 'Name';
    }
}
