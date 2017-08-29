<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Article extends Model
{
    use Searchable;
    
    protected $fillable = ['Title', 'ArticleText', 'user_id', 'Excerpt'];

    public function tags()
    {
    	return $this->belongsToMany(Tag::class);
    }

    public function comments()
    {
    	return $this->hasMany(Comment::class);
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function formattedDate()
	{
    	return $this->created_at->format('d-M-Y  H:m');
	}

}
