<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReportedHardware extends Model
{
    protected $connection = 'SQLTK';
    protected $table = "ReportedHardware";

    public function computer()
    {
    	return $this->belongsTo(Computer::class, 'PCID', 'id');
    }

}
