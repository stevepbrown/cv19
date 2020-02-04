<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Person;
use App\EmailTemplate;




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
    
    
 public function mailAlreadyLogged(Person $person,EmailTemplate $template) {
       

        // True if record already added
        return  (EmailLog::where('person_id', $person->id)->where('template_id',$template->id)->exists());
            
        }

  public function people() {

    return $this->belongsTo('App\Person','person_id');

  }      
  public function template() {

    return $this->belongsTo('App\EmailTemplate','template_id');

  } 
  


}
