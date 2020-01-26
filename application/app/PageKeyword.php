<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PageKeyword extends Model
{
    public function pageProps(){

        return $this->belongsTo('App\PageProps');

    }
    
    public function pageKeyword(){

        return $this->belongsTo('App\PageKeyword');

    }



}
