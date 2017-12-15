<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\company;

class ComputerController extends Controller
{
    
    public function CompanyComputers(Company $company)
    {
    	//dd($company);
		$Computers = $company->computers()->paginate(10);

		//dd($Computers);

    	return view('HW.ComputerIndex', compact('Computers'));
    }
}
