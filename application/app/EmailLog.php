<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Person;




class EmailLog extends Model
{
 

    /**
     * function mailAlreadyLogged
     *
     * Identitifes a mail which has already
     * been sent by the person & template id
     * 
     * @param Person $person
     * @return boolean
     */
    
    
 public function mailAlreadyLogged($person_id,$template_id) {
       
        // True if record already added
        return  (EmailLog::where('person_id', $person_id)->where('template_id', $template_id)->exists());
            
        }

  public function people() {

    return $this->belongsTo('App\Person','person_id');

  }      
  public function template() {

    return $this->belongsTo('App\EmailTemplate','template_id');

  } 
  


}
