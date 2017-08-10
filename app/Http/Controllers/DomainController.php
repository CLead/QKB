<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;

class DomainController extends Controller
{
    public function index()
    {
    	return view('Domain');
    }

    public function process(Request $request)
    {
    	$Domain = $request->input('domain_name');
    	/*Excel::create('Laravel Excel', function($excel)
    	{
    		$excel->sheet('Test', function($sheet)
    			{
    				$sheet->setOrientation('landscape');
    				$sheet->cell('A1', function($cell) {	
    					$cell->setValue('Dom Value');
					});
    			});
    	}
    	)->export('xls');
		*/

		Excel::load('O:\Support\IP AddressesV2.xlsx', function($reader)
		{

		}
			);
    	

    	echo ('Return with ' . $Domain);
    }
}