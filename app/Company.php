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

    public function getActiveComputers()
   	{
   		//Gets computers that have transferred in past 7 days
   		return $this->Computers->where('LastTransfer', '>', Carbon::now()->subDays(7))->count(); 
   	}

   	public function getInActiveComputers()
   	{
   		//Gets computers that have transferred in past 7 days
   		return $this->Computers->where('LastTransfer', '<=', Carbon::now()->subDays(7))->count(); 
   	}

}
