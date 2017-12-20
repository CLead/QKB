<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\computer;

class DataTransfer extends Model
{
	protected $connection = 'SQLTK';
	protected $table = "DataTransfers";
	//const CREATED_AT  = "TransferDate";
    //
    public function computer()
    {
    	return $this->belongsTo(Computer::class, 'PCID', 'id');
    }

}
