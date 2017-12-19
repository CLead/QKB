<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function()
	{
		return view('home');
	})->name("LandingPage");
Route::get('/dashboard', 'DashboardController@index')->name('Dashboard')->middleware('auth');
Route::get('/articles', 'ArticlesController@index')->name("Articles")->middleware('auth');
Route::get('/articles/search', 'ArticlesController@index')->name("ArticlesSearch")->middleware('auth');
Route::post('/articles/search', 'ArticlesController@search')->name("ArticlePerformSearch")->middleware('auth');
Route::post('/articles/{post}/comments', 'CommentsController@store');

Route::get('/articles/add', 'ArticlesController@create')->name("ArticlesAdd")->middleware('auth');
Route::post('/articles', 'ArticlesController@store')->middleware('auth')->name("ArticleNew");
Route::get('/articles/{article}', 'ArticlesController@show')->name("ShowArticle")->middleware('auth');
Route::get('/articles/tag/{tag}', 'TagsController@index')->name("ArticlesTag")->middleware('auth');
Route::get('/articles/user/{user}', 'ArticlesController@index_users')->name("ArticlesUser")->middleware('auth');

Route::get('/domain', 'DomainController@index')->name("Domains")->middleware('auth');
//Route::post('/domain/check', 'DomainController@process')->name("DomainsCheck")->middleware('auth');

Route::get('/aldistore', function() { return view('AldiStore');})->name("aldistore")->middleware('auth');

Route::get('/logs/quad', "LogsController@index_quad")->name("QuadLog")->middleware('auth');
Route::get('/logs/aldi', "LogsController@index_aldi")->name("AldiLog")->middleware('auth');

Route::get('/mailstatus', function()
	{
		return view('mailstatus');
	})->name("MailStatus")->middleware('auth');

Route::get('/login', 'SessionsController@create')->name('login');
Route::post('/login', 'SessionsController@store');
Route::get('/logout', "SessionsController@destroy")->name("logout");

Route::get('/HW/Companies', 'CompanyController@index')->name('HWCompanies')->middleware('auth');
Route::get('/HW/Company/add', 'CompanyController@create')->name('HWCompaniesAdd')->middleware('auth');
Route::get('/HW/Company/{company}/edit', 'CompanyController@edit')->name('HWCompaniesEdit')->middleware('auth');
Route::patch('/HW/Company/{company}', 'CompanyController@update')->name('HWCompaniesUpdate')->middleware('auth');
Route::post('/HW/Companies', 'CompanyController@store')->middleware('auth')->name("CompanyNew");

Route::get('/HW/Computers', 'ComputerController@index')->name('Computers')->middleware('auth');
Route::get('/HW/Computers/Company/{company}', 'ComputerController@CompanyComputers')->name('CompanyComputers')->middleware('auth');
Route::get('/HW/Computers/{computer}', 'ComputerController@show')->name('ComputersInfo')->middleware('auth');
Route::get('/HW/Computers/{computer}/DataTransfers', 'ComputerController@showtransfers')->name('ComputerData')->middleware('auth');


Route::get('/ajax', function() { return view('welcome');});

Route::get('/NotImplemented', function() { return view('NotImplemented');})->name("missing");