<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Computer extends Model
{
    protected $connection = 'SQLTK';
    protected $table = "Computer";


    public function company()
    {
    	return $this->belongsTo(Company::class, 'id', 'CompanyID');
    }

}
