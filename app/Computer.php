<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;
class Computer extends Model
{
    protected $connection = 'SQLTK';
    protected $table = "Computer";
    protected $fillable = ['QuadLabel', 'IgnoreNoBackupsWarning','updated_at'];

    public function company()
    {
    	return $this->belongsTo(Company::class, 'CompanyID', 'id');
    }

    public function diskusage()
    {
    	return $this->hasMany(HDUsage::class, 'PCID', 'id');
    }

    public function backupstate()
    {
        return $this->hasMany(BackupState::class, 'PCID', 'id');
    }

    public function reportedHardware()
    {
        return $this->hasOne(ReportedHardware::class, 'PCID', 'id');
    }

    public function datatransfers()
    {
        return $this->hasMany(DataTransfer::class, 'PCID', 'id');
    }

    public function datatransfersLatestItems()
    {
        return $this->hasMany(DataTransfer::class, 'PCID', 'id')->orderby('TransferDate', 'desc')->take(10);
        //
        //$Transfers = $computer->datatransfers()->orderby('TransferDate', 'desc')->paginate(20);
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

    public function LatestBackupStates()
    {
        return $this->hasMany(BackupState::class, 'PCID', 'id')->orderby('ReportDate', 'desc')->take(10);
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

    public function getComputerColour()
    {
        if ($this->LastTransfer > Carbon::now()->subDays(7))
            return 'IconColour';
        else
            return 'IconColourInactive';
    }

    public function getBackupState()
    {
        $AlertCount = DB::connection('SQLTK')->select('SELECT count(AlertState) as Total FROM [QuadToolKit].[dbo].[BackupStates] where PCID = ? AND AlertState=1', [$this->id]);

        //dd($AlertCount[0]->Total);

        if ($AlertCount[0]->Total > 0)
            return 3;  //Return has errors
        else
        {
            $AlertCount = DB::connection('SQLTK')->select('SELECT count(AlertState) as Total FROM [QuadToolKit].[dbo].[BackupStates] where PCID = ? AND ReportDate >= ?', [$this->id, Carbon::now()->subDays(7)]);


            
            if ($AlertCount[0]->Total == 0)
                if ($this->IgnoreNoBackupsWarning == 1)
                    return 1;  //No backups and thats ok.
                else
                    return 2;   //No backups, and that's an issue.
            else
                return 0;       //Has reports, all ok.
        }

        //return $this->Computers->where('LastTransfer', '>', Carbon::now()->subDays(7))->count(); 
    }

    public function getBackupStateImage()
    {
        $Val = $this->getBackupState();
        $Icon = "";

        switch($Val)
        {
            case 0:  //All ok
                $Icon =  "<i class='material-icons medium IconColour'>check</i>";
                break;
            case 1: // No backups -but ok
                $Icon = "";
                break;

            case 2: // No backups - problem
                $Icon =  "<i class='material-icons large center IconColourMissingData'>disc_full</i><br><span class='center white-text'>No Backups</span>";
                break;

            case 3: //Errors
                $Icon =  "<i class='material-icons large IconColourError'>disc_full</i><br><span class='center white-text'>ERROR</span>";
                break;
        }

        return $Icon;
    }

}
