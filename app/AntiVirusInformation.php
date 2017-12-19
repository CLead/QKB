<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AntiVirusInformation extends Model
{
	protected $connection = 'SQLTK';
	protected $table = "AntiVirusInformation";
    //

    public function computer()
    {
    	return $this->belongsTo(Company::class, 'CompanyID', 'id');
    }

    public function EnabledText()
    {
    	if ($this->Enabled)
    		return "True";
    	else
    		return "False";
    }

	public function UpToDateText()
    {
    	if ($this->UptoDate)
    		return "True";
    	else
    		return "False";
    }

    public function StateColour($ID)
    {
    	$Ret = "lighten-" . $ID;

    	if ($this->State)
    	{
    		return "green " . $Ret;
    	}
    	else
    		return "red " . $Ret;
    		
    }
}
