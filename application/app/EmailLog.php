<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB; 
use App\Person;
use App\EmailTemplate;






class EmailLog extends Model
{
 


  public function person() {

    return $this->belongsTo('App\Person','person_id');

  }      
  public function template() {

    return $this->belongsTo('App\EmailTemplate','template_id');

  } 

}
