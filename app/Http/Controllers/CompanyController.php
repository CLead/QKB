<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

use App\company;
use DB;

class CompanyController extends Controller
{
    public function index()
    {
    	//$articles = article::latest()->paginate(10);

		//$Companies = DB::connection('SQLTK')->select('Select * from Company');

		$Companies = company::with('computers')/*->where('Active' , '=', '1')*/->orderBy('Active', 'desc')->orderBy('CompanyName', 'asc')->paginate(10);

    	return view('HW.index', compact('Companies'));
    }

    public function overview(Company $company)
    {
        $Computers =  $company->computers;

        return view('HW.CompanyOverview', compact('company'), compact('Computers'));
    }

	public function create()
    {
    	return view('HW.create');
    }

	public function store()
    {
    	if (company::where('CompanyName', '=', request('CompanyName'))->first())
    	{
    		session()->flash('flash_message', 'Company Already Exists');
    	}
    	else
    	{
	        $this->validate(request(), [
	                'CompanyName' => 'required|min:3|max:150',
	                'CompanyCode' => 'required|min:3|max:10',
	                'RegistrationCode' => 'required|min:7|max:10',
	            ]);
	    
	        $company = company::create([
	            'CompanyName' => request('CompanyName'),
	            'CompanyCode' => request('CompanyCode'),
	            'RegistrationCode' => request('RegistrationCode'),
	            'Active' => 1,
	            'AdminEmail' => request('AdminEmail')
	            ]);
	        
    	}	
		$Companies = company::with('computers')->orderBy('CompanyName', 'asc')->paginate(10);
        return view('HW.index', compact('Companies'));
    }

    public function edit(Company $company)
    {
    	return view('HW.edit', compact('company'));
    }

    public function update(Request $request, Company $company)
    {
    	//dd($request->all());
    	//dd($company);

        $this->validate(request(), [
                'CompanyName' => 'required|min:3|max:150',
                'CompanyCode' => 'required|min:3|max:10',
                'RegistrationCode' => 'required|min:7|max:10',
            ]);


    	$company->update($request->all());

    	$Companies = company::with('computers')->orderBy('CompanyName', 'asc')->paginate(10);
        return view('HW.index', compact('Companies'));
    }

}