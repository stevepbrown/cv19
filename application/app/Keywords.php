<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use lluminate\Support\Facades\DB;

class Keywords extends Model
{
    
    protected $table = 'keywords';
    
    
    
    public function getactiveAttribute(){


        $tableId = DB::table('app_tables')->select('id')->where('table_name','keywords');
        $attributeId = DB::table('attributes')->select('id')->where('attribute','active');

        return DB::table('entity_attrubute_value')->select('value')
            ->where('table_id',$tableId)
            ->where('attribute_id',$attributeId)
            ->where('key',$this->id);

            
    }
}
