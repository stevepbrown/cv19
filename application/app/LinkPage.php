<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LinkPage extends Model
{
    public function link() {

        return $this->belongsTo('App\Link');

    }


    public function pageProp(){

        return $this->belongsTo('App\PageProps');
    
    }

}
