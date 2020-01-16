<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use \App\UserFuncs\UserFunctions as UserFuncs;
use App\EmailBatch;
use App\Organisation;
use App\EmailLog;
use App\mail\BatchMail;
use Illuminate\Support\Facades\DB;
use  Illuminate\Support\Facades\Mail;
class MailController extends Controller
{
    public function create(Request $request){


    // Create a new batch_id based upon the highest existing batch_id
    $max_batch_id =  DB::table('email_batches')->max('batch_id');
    $insert_batch_id = ($max_batch_id == null ? 1:($max_batch_id+1));
    $template_id =  $request->template_id;
    
    // Get a collection of all organisations & their related people
    $organisations = Organisation::with('people')->get();
    
    foreach($organisations as $organisation) {
        
        
        $emailBatch = new EmailBatch;      
        $emailBatch->batch_id = $insert_batch_id;
        $emailBatch->organisation_id = $organisation->id;
        $emailBatch->template_id = $request->template_id;
        
        
        // Create a an empty collection to hold the valid emails     
        $validEntries = collect();
                   
    

        foreach  ($organisation->people as $person) {
            // Check that the email has not already been sent
            
            
            
            if(!$emailBatch->mailAlreadySent($person->id,$emailBatch->template_id)){

                echo("<p>$person->given_name $person->family_name has been accepted<p>");    

              $validEntries->push(['person_id'=>$person->id,
                                    'person_email'=>$person->email,
                                    'template_id' =>$emailBatch->template_id,
                                    'batch_id'=>$emailBatch->batch_id,
                                    'dispatched'=>0
                                    ]); 
            }

              

        
          
       }
       
           // ensure that the organisation has some entries to send
            if ($validEntries->isNotEmpty()){

            // Get all recipient emails as a string (with email delimiter)

            $emailBatch->recipients = $validEntries->pluck('person_email')->flatten();
               
            // Save the batch row
            $emailBatch->save();

           // Log an an email for each of the people in the batch
           $emailBatch->createEmailLog($validEntries);
      
            }

            else {

                unset($emailBatch);
            
            }
       
      
    }

    return 'Finished';
}

public function send($batch_id) {

    

    $batches = EmailBatch::where('batch_id',$batch_id)->get();
    
   

    // Iterate the batch to send email for each organisation
    foreach($batches as $batch){

        $recipients =   Str::replaceFirst('[', '',$batch->recipients);

        

        
        // TODO(SPB): Need to parse retrieved JSON to a valid RFC string!
        return("Need to parse retrieved JSON to a valid RFC string:<br/><br/>$recipients");
        
        // TODO(SPB): Enable in production

        // Mail::to($recipients)->queue(new BatchMail($batch->recipients,$batch->template_id)); 
        
        
    } 
   

    return 'Mails have been queued.';
}

}