<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

      dump($organisation->id);      try {

       $emailBatch = new EmailBatch;
     
       
       $emailBatch->batch_id = $insert_batch_id;
       $emailBatch->organisation_id = $organisation->id;
       $emailBatch->template_id = $request->template_id;
       // Convert related people (email addresses) into string with de-limiter
       $emailBatch->recipients = $organisation->people->implode('email', ';');
       
      // DEBUGONLY(SPB): 
       dump($emailBatch);
       $emailBatch->save();  

    
      
        } catch (Exception $e) {
          return report($e);
          
      }  

 

    }    

    return 'saved';
  
   

         

    }
}
