<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\computer;
use App\eventitem;

class ComputerEventsController extends Controller
{

	public function ShowAll(Computer $computer)
    {
        $Events = $computer->eventitem()->orderby('EventDate', 'desc')->paginate(20);
        $Source = 0;
        $Level = 0;
        $Warn = 0;
        return view('HW.ComputerEvents', compact('Events', 'computer', 'Source', 'Level', 'Warn'));
    }

    public function filter(Computer $computer, int $Source, int $Level, int $Warn)
    {

    	$SearchMap = array();

    	if ($Source > 0)
    		$SearchMap['LogSource'] = $Source;

    	if ($Level > 0)
    		$SearchMap['EventLevel'] = $Level;

    	if ($Warn == 1)
    		$SearchMap['DisplayWarning'] = $Warn;

 	    $Events = $computer->eventitem()->where($SearchMap)->orderby('EventDate', 'desc')->paginate(20);

        return view('HW.ComputerEvents', compact('Events', 'computer', 'Source', 'Level', 'Warn'));
    }

}
