<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class ResponsibilityRole extends Model
{
    /**
     * 
     * The table corresponding to this model
     */
    protected $table = 'responsibility_roles';
    /**
     * The primary key is non-incrementing
     * 
     */
    protected $incrementing = false;
    
    
    public  function getSortIndexAttribute() {
        $sortIndex = DB::table('vwEAV')
        ->where('TABLE', $this->table)
        ->where('ATTRIBUTE','sort index' )
        ->where('FK',($this->id))->get();
        // $activeStatus returns a collection, get the individual object and get column
        $rtnVal =  $sortIndex->pluck('VALUE');

        dump($rtnVal);
        return $rtnVal;    
    }
}
