<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ArticlesController extends Controller
{
    public function index()
    {
    	$articles = DB::table('articles')->get();
    	return view('articles.index', compact('articles'));
    }

    public function create()
    {
    	$articles = DB::table('articles')->get();
    	return view('articles.index', compact('articles'));
    }

}
