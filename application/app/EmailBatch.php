<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use App\Person;
use App\EmailLog;



class EmailBatch extends Model
{
     
    protected $batch_id;
    protected $organisation_id;
    protected $template_id;



    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['batch_id',
                           'organisation_id',
                           'template_id'
                            ];

   

    public function people(){

        return $this->hasMany('App\Person');

    }

    /**
     * function mailAlreadySent
     *
     * Identitifes a mail which has already
     * been sent by the person & template id
     * 
     * @param Person $person
     * @return boolean
     */
    public function mailAlreadySent(Person $person) {

        $person_id = $person->id;
        $template_id = $this->template_id;
          

        
        if (DB::table('email_logs')->where('person_id', $person_id)->where('template_id', $person_id)->exists() == true){

                return true;

            }
            
            else {

                return false;
            };

             

    }

   
    
    public function createEmailLogs($emails){

        
        
        foreach($emails as $email){

            $emailLog = new EmailLog;
         
            $emailLog->batch_id = $this->batch_id;
            $emailLog->person_id  = $email;
            $emailLog->template_id = $this->template_id;
            $emailLog->save();
            

        }

    }

   


   } 






 

 

