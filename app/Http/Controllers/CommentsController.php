<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Comment;

class CommentsController extends Controller
{
    public function store (Article $post)
    {

		$this->validate(request(), ['CommentBody'=> 'required|min:5']);

    	Comment::create(
			[
				'Comment'=>request('CommentBody'),
				'article_id'=>$post->id,
				'user_id'=>auth()->id()
			]);
    	return back();
    }
}
