<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    public function organisation(){

       return  $this->hasOne('App\person');

    } 
}
