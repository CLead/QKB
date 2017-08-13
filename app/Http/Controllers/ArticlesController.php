<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\article;
use DB;

class ArticlesController extends Controller
{
    public function index()
    {
    	$articles = article::latest()->get();
    	return view('articles.index', compact('articles'));
    }

    public function create()
    {
    	return view('articles.create');
    }

    public function store()
    {

        $this->validate(request(), [
                'Title' => 'required|min:4|max:50',
                'ArticleBody' => 'required'
            ]);
    
        dd(request()->all());
        $article = new article;

        $article->Title = request('Title');
        $article->ArticleText = request('ArticleText');
        $article->CreatedBy = "No one";
        $article->save();

        $articles = DB::table('articles')->get();
        return view('articles.index', compact('articles'));
    }

    public function show(article $article)
    {
        //$article = article::find($id);
        return view ('articles.show', compact('article'));
    }

}
