<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        view()->composer('articles.sidebar', function($view)
        {
            $view->with('TopTags', \App\Tag::get() );
    //        $view->with('TopTags', \App\Tag::join('article_tag', 'article_tag.tag_id', '=', 'tags.id')
   // ->groupBy('tags.name')
   // ->get(['tags.name', DB::raw('count(tags.id) as tag_count')])) ;
            $view->with('LatestPosts', \App\Article::orderBy('updated_at', 'desc')->take(5)->get());




        }
        );

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
