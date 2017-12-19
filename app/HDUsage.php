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
}
