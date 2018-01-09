<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\computer;

class HDUsage extends Model
{
    protected $connection = 'SQLTK';
    protected $table = "DiskUsage";


    public function computer()
    {
    	return $this->belongsTo(Computer::class, 'PCID', 'id');
    }

    public function getPercentColour()
    {
    	if ($this->PercentageUsed >= 90)
    	{
    		return 'FF0000';
    	}
    	else
    	{
    		if ($this->PercentageUsed > 60)
    		{
    			return 'FFFF00';
    		}
    		else
    		{
    			return '00FF00';
    		}
    	}
    }
}
