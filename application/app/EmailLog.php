<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Person;

class EmailLog extends Model
{
    public function people(){

        return $this->hasOne('App\Person','id','person_id');
    }
}
