<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\UserFuncs\UserFunctions as UserFuncs;
use App\EmailBatch;
use App\Organisation;
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
                 
       foreach  ($organisation->people as $person) {
      
        
            // Check that the email has not already been sent
            if(!$emailBatch->mailAlreadySent($person)){
               // Add valid email to validEmails colection
               $validEmails->push($person->email); 
            }
           
       }   

      
       // save all  the recipients as JSON
       $emailBatch->recipients = $validEmails->toJson();
       // DEBUGONLY(SPB): 
       die();
       $emailBatch->save();  

    
      
        } catch (Exception $e) {
          return report($e);
          
      }  

 

    }    

    return 'saved';
  
   

         

    }
}
