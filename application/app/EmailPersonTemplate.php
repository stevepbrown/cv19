<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class EmailPersonTemplate extends Model
{
   

    protected $appends = array('is_active');
    
    /**
     * IsActive attribute (appended)
     *
     * @return boolean
     */
    public function getIsActiveAttribute(){
        $qry = DB::table('entity_attribute_value')->select('value')
          ->where('app_table_id',23) // ''email_person_templates''
          ->where('attribute_id',1) // active
          ->where('key',$this->id);
  
           switch ($qry->pluck('value')->first()) {
            case 0:
              $result = false;
              break;
            
            case 1:
              $result= true;
              break;
            
            default:
              $result = true;
              break;
          }
  
        
          return (bool) $result;
}
}