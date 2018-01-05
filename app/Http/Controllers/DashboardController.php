<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\company;
use DB;

class DashboardController extends Controller
{
    public function index()
    {
    	return view('dashboard');
    }

    public function overview()
    {

    	$Companies = company::where('Active', '=', '1')->orderBy('CompanyName', 'asc')->select('id')->get();
        
    	
        return view('overview', compact('Companies'));

    }
}