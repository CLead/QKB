<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class SessionsController extends Controller
{

	protected $redirectTo = '/dashboard';  //default location to redirect to

	public function username()  
	{
	    return 'username';	//Instead of using email to login with, use username field
	}

	public function __construct()
	{
		$this->middleware('guest', ['except' => 'destroy']);
	}

    public function create()
    {
    	return view("sessions.create");
    }

    public function destroy()
    {
    	auth()->logout();

    	return redirect()->route("Dashboard");
    }

    public function store()
    {
    	//dd(request()->all());

    	if (!auth()->attempt(request(['username', 'password'])))
    	{
    		return back()->withErrors(['message' => 'Invalid Credentials']);
    	}
    	
        return redirect()->route('Dashboard');
    }

}
