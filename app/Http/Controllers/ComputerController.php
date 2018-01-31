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

    public function edit(Computer $computer)
    {
        return view('HW.ComputerEdit', compact('computer'));
    }

    public function update(Request $request, Computer $computer)
    {
        //dd($request->all());
        //dd($company);

        $this->validate(request(), [
                'QuadLabel' => 'max:150',
            ]);

        $computer->update($request->all());

        if ($request->has('IgnoreNoBackupsWarning'))
            $computer->IgnoreNoBackupsWarning = true;
        else
            $computer->IgnoreNoBackupsWarning = false;

        $computer->save();
        //dd($request->all());


        $company = $computer->company;

        //$Companies = company::with('computers')->orderBy('CompanyName', 'asc')->paginate(10);
        return view('HW.ComputerIndex', compact('company'));
    }

    public function showtransfers(Computer $computer)
    {
        $Transfers = $computer->datatransfers()->orderby('TransferDate', 'desc')->paginate(20);
        return view('HW.ComputerDataTransfers', compact('Transfers', 'computer'));
    }

}
