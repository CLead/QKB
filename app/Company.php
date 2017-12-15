<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;


//The SQL Company Model
class Company extends Model
{
    protected $connection = 'SQLTK';
    protected $table = "Company";
	
	protected $fillable = ['CompanyCode', 'CompanyName', 'AdminEmail', 'RegistrationCode', 'updated_at'];
	//protected $primaryKey = 'ID';

    public function computers()
    {
    	return $this->hasMany(computer::class, 'CompanyID', 'id');
    }

}
