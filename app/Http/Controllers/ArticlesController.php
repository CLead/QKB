<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\article;
use DB;

class ArticlesController extends Controller
{

    public function __construct()       
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index()
    {
    	$articles = article::latest()->paginate(10);
    	return view('articles.index', compact('articles'));
    }


    public function index_users(\App\User $User)
    {
        dd($User);
        # code...
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
    
        $TagArray = explode('||', request('Tags'));

        $article = Article::create([
            'Title' => request('Title'),
            'ArticleText' => request('ArticleBody'),
            'user_id' => auth()->id(),
            'Excerpt' => request('Excerpt')
            ]);


        foreach ($TagArray as $tag)
        {
            if (!empty($tag))
            {
                $article->tags()->attach( \App\Tag::firstOrCreate(['Name' => $tag]));
            }
        }

        

        $articles = article::latest()->paginate(10);
        return view('articles.index', compact('articles'));
    }

    public function search()
    {
        $search = request('Search');
        //dd(request::get('Search'));
        $articles = Article::where('ArticleText', 'like', '%' . $search .'%')->orWhere('Excerpt', 'like', '%' . $search .'%')->paginate(50);

        //dd($articles);

        return view('articles.index', compact('articles'));
        # code...
    }

    public function show(article $article)
    {
        //$article = article::find($id);
        return view ('articles.show', compact('article'));
    }

}
