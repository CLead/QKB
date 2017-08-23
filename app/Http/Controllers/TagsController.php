<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;

class TagsController extends Controller
{
    public function index(Tag $tag)
    {
    	//dd($tag);

    	//$articles = \App\Tag::where('id', '=', $tag->id)->articles->paginate(15);

    	//dd($tag->id);

    	//$articles = \App\Article::where()

    	$articles = $tag->articles()->paginate(10);
    	return view('articles.index', compact('articles'));
    }
}
