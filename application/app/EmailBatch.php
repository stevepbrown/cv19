<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use App\Person;
use App\EmailLog;
use App\EmailTemplate;
use App\Mail\BatchMail;




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
         * Undocumented function
         *
         * @param [type] $recipients
         * @return void
         */
        public function createEmailLog($recipients){

               
        foreach($recipients as $recipient){

       
            $emailLog = new EmailLog;
          
                                
            $emailLog->batch_id = $recipient['batch_id'];
            $emailLog->person_id  = $recipient['person_id'];
            $emailLog->template_id = $recipient['template_id'];
            $emailLog->dispatched = false;
            $emailLog->save();
            

        }

    }

    
    public function send($request){

        
        
        
        // Fetch all the logs for mail batch that have not been invoked
        $batchLogs = EmailLog::where('batch_id',$batchId)->where('invoked',!true);


    }

   


   } 






 

 

