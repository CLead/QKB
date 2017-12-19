<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\company;
use App\computer;


class ComputerController extends Controller
{
    
    public function CompanyComputers(Company $company)
    {
    	return view('HW.ComputerIndex', compact('company'));
    }

    public function Show(Computer $computer)
    {
    	return view('HW.Computer', compact('computer'));
    }

    public function showtransfers(Computer $computer)
    {
        $Transfers = $computer->datatransfers()->orderby('TransferDate', 'desc')->paginate(20);
        return view('HW.ComputerDataTransfers', compact('Transfers', 'computer'));
    }


}
