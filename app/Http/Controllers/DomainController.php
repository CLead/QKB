<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DomainController extends Controller
{
    public function index()
    {
    	return view('Domain');
    }

    public function process(Request $request)
    {
    	$Domain = $request->input('domain_name');

    	echo ('Return with ' . $Domain);
    }
}