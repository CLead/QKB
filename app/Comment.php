<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class Comment extends Model
{

	protected $fillable = ['Comment', 'article_id', 'user_id'];


    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function formattedDate()
	{
    	return $this->created_at->format('d-M-Y  H:i');
	}

	public function formattedShortDate()
	{

		   $carbon = new Carbon($this->created_at);
 
    		return $carbon->format('d/m/y H:i');
    	//return $this->created_at->format('dd/MM/YY  HH:mm');
	}
}
