<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\UserFuncs\UserFunctions as UserFuncs;
use App\EmailBatch;
use App\Organisation;
use App\EmailLog;
use Illuminate\Support\Facades\DB;




class MailController extends Controller
{
    
        
    public function create(Request $request){

// TODO(SPB): Run through auth middleware!!

    // Create a new batch_id based upon the highest existing batch_id
    $max_batch_id =  DB::table('email_batches')->max('batch_id');
    $insert_batch_id = ($max_batch_id == null ? 1:($max_batch_id+1));

    
     
    // Get a collection of all organisations & their related people
    $organisations = Organisation::with('people')->get();

        
    foreach($organisations as $organisation) {

        try {

        $emailBatch = new EmailBatch;      
       
        $emailBatch->batch_id = $insert_batch_id;
        $emailBatch->organisation_id = $organisation->id;
        $emailBatch->template_id = $request->template_id;
                
       // Create a an empty collection to hold just the valid emails     
       $validEmails = collect();

       // Create an empty collection to hold email log values
       $emailLogger = collect();          
      
       foreach  ($organisation->people as $person) {
              

            // Check that the email has not already been sent
            if(!$emailBatch->mailAlreadySent($person)){
               // Add valid email to validEmails colection
               $validEmails->push(['person_id'=>$person->id,
                                    'person_email'=>$person->email]); 
               
            }

           

                      

            else {

                echo("<strong>User $person->given_name $person->family_name (id:$person->id) has already been sent to $organisation->name (id:$organisation->id)!</strong><br/>");    
                
            }
           
       }   

        
       
       // Log the batch emails in email_logs
       $emailLogger = $validEmails->pluck('person_id');

       
       $emailBatch->createEmailLogs($emailLogger);

              
       // save all the recipients as a string (with email delimiter)
       $recipients = $validEmails->pluck('person_email'); 

       $emailBatch->recipients = $recipients->implode(';');
              
       // Save the batch row
       $emailBatch->save();

        

    
      
        } catch (Exception $e) {
          return report($e);
          
      }  

 

    }    

    return 'saved';
  
          

    }


/**
 * function mailBatch
 *
 * Sends all of the mail associated
 * with the batch. One mail for each
 * organisation in the batch.
 * 
 * 
 * @param int $batch_id
 * @return void
 */
public function mailBatch($batch_id) {
    
    $batch = EmailBatch::where('batch_id',$batch_id)->get();
    
    foreach ($batch as $organisation){
            $organisation->sendOrgMail();
        }
    }
}

