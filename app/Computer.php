<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;


class Computer extends Model
{
    protected $connection = 'SQLTK';
    protected $table = "Computer";
    

    public function company()
    {
    	return $this->belongsTo(Company::class, 'CompanyID', 'id');
    }

    public function diskusage()
    {
    	return $this->hasMany(HDUsage::class, 'PCID', 'id');
    }

    public function datatransfers()
    {
        return $this->hasMany(DataTransfer::class, 'PCID', 'id');
    }

    public function datatransfersLatestItems()
    {
        return $this->hasMany(DataTransfer::class, 'PCID', 'id');
    }

    public function AVInfo()
    {
        return $this->hasMany(AntiVirusInformation::class, 'ComputerID', 'id');
    }

    public function LatestDiskUsage()
    {
    	$X = DB::connection('SQLTK')->select('SELECT TOP (1) ReportDate FROM [QuadToolKit].[dbo].[DiskUsage] where PCID = ? order by ReportDate desc', [$this->id]);
		//$X = $this->diskusage()->latest()->get();

    	if (count($X) > 0)
    	{
			return $this->hasMany(HDUsage::class, 'PCID', 'id')->where('ReportDate', $X[0]->ReportDate);
    	}
		else
		{
			return $this->hasMany(HDUsage::class, 'PCID', 'id');
		}
    }

    public function LatestAVInfo()
    {
        $X = DB::connection('SQLTK')->select('SELECT TOP (1) ReportDate FROM [QuadToolKit].[dbo].[AntiVirusInformation] where ComputerID = ? order by ReportDate desc', [$this->id]);
        //$X = $this->diskusage()->latest()->get();

        if (count($X) > 0)
        {
            return $this->hasMany(AntiVirusInformation::class, 'ComputerID', 'id')->where('ReportDate', $X[0]->ReportDate);
        }
        else
        {
            return $this->hasMany(AntiVirusInformation::class, 'ComputerID', 'id');
        }
    }

}
