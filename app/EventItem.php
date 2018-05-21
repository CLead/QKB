<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\computer;

class EventItem extends Model
{
    protected $connection = 'SQLTK';
    protected $table = "EventItems";


    public function computer()
    {
    	return $this->belongsTo(Computer::class, 'PCID', 'id');
    }

    public function getAlertText()
    {
        if ($this->DisplayWarning == 1)
            return 'Yes';
        else
            return 'No';
    }


    public function getTypeHTML()
    {

        $Out = '';

        if ($this->LogSource == 1)
            $Out = "App <i class='material-icons small IconMiddle'>featured_play_list</i>";
        else if ($this->LogSource == 2)
            $Out = "Sys <i class='material-icons small IconMiddle'>settings</i>";
        else
            $Out = "???";



        if ($this->EventLevel == 4)
            $Out = $Out . '<span class="badge CLB red white-text">Critical</span>';
        else if ($this->EventLevel == 2)
            $Out = $Out . '<span class="badge CLB orange white-text">Error</span>';
        else
            $Out = $Out . '<span class="badge CLB yellow black-text">Warning</span>';

        return $Out;
    }

    public function getAlertColour()
    {
        if ($this->AlertState == 1)
            return 'clr red';
        else
            return '';
    }
}