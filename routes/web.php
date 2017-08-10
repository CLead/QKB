<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'DashboardController@index')->name('Dashboard');


Route::get('/style', function () {
    return view('styletest');
});

Route::get('/articles', 'ArticlesController@index')->name("Articles");
Route::get('/articles/add', 'ArticlesController@create')->name("ArticlesAdd");
Route::post('/articles', 'ArticlesController@store');
Route::get('/articles/{article}', 'ArticlesController@show');

Route::get('/domain', 'DomainController@index')->name("Domains");
Route::post('/domain/check', 'DomainController@process')->name("DomainsCheck");