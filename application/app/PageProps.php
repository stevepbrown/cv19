<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;



class PageProps extends Model
{

    public $appends = array('hasForm');
    
    public function keywords(){

    return $this->belongsToMany('App\Keywords', 'page_keywords', 'page_props_id', 'keyword_id');

    }


    public function links(){

    return $this->belongsToMany('App\Link','link_pages','page_props_page_id','link_id');

    }  
    
    public function gethasFormAttribute(){

        

        $qry = DB::table('entity_attribute_value')->select('value')
          ->where('app_table_id',24) // 'page_props'
          ->where('attribute_id',4) // 'has_form'
          ->where('field','page_id') // keyed on page id instead of page_props_id
          ->where('key',$this->page_id);


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