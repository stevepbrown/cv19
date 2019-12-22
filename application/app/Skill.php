<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB as DB;
class Skill extends Model
{
    protected $children;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'skills';
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';
    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    
    /**
     * Appended attributes
     *
     * @var array
     */
    protected $appends = array('active','sortOrder');
    
    /**
     * function children
     *
     * @return relation
     */
    public function children(){
      return $this->hasMany('app\Skill','parent_skill_id','id');
    }
    
    
    public function getactiveAttribute() {
      
            
      $activeStatus = DB::table('vwEAV')
                    ->where('TABLE', $this->table)
                    ->where('ATTRIBUTE','active' )
                    ->where('FK',($this->id))->get();

   
      // $activeStatus returns a collection, get the individual object and get column
      $rtnVal =   $activeStatus->pluck('VALUE');


       
      return $rtnVal;
    

    }

    public function getsortOrderAttribute(){

      $sortIndex = DB::table('vwEAV')
                ->where('TABLE', $this->table)
                ->where('ATTRIBUTE','sort index')
                ->where('FK',($this->id))->get();

      $rtnVal =  $sortIndex->pluck('VALUE');

      return $rtnVal;
    }
}