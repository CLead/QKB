<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\computer;

class BackupState extends Model
{
    protected $connection = 'SQLTK';
    protected $table = "BackupStates";


    public function computer()
    {
    	return $this->belongsTo(Computer::class, 'PCID', 'id');
    }

    public function getAlertText()
    {
        if ($this->AlertState == 1)
            return 'Yes';
        else
            return 'No';
    }

    public function getAlertColour()
    {
        if ($this->AlertState == 1)
            return 'clr red';
        else
            return '';
    }
}