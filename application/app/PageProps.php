<?php

namespace App;
use Illuminate\Database\Eloquent\Model;



class PageProps extends Model
{

    public function keywords(){

    return $this->belongsToMany('App\Keywords', 'page_keywords', 'page_props_id', 'keyword_id');

    }


    public function links(){

    return $this->belongsToMany('App\Link','link_pages','page_props_page_id','link_id');

    }   

}