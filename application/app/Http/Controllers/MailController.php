<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use  Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon;
use App\EmailLog;
use App\EmailTemplate;
use App\Person;
use App\mail\BatchMail as BatchMail;


class MailController extends Controller
{
    
    protected $request;
   
   
    public function __construct(Request $request)
    {
        $this->middleware('auth');
        $this->request = $request;

    }



    protected function guard()
  {
      return Auth::guard(app('VoyagerGuard'));
  }

 public function index(){


    
    return view('vendor.voyager.mailings.browse');

}   
    protected function create(){

     $this->authorize('add_email_logs');

    
    
     // Fetch the existing logged emails
    $emailLogs = EmailLog::all();

    // Fetch all people
    $people = Person::all();
    
    // Create a new batch_id based upon the highest existing batch_id
    $insBatchId =  ($emailLogs->max('batch_id')+1);
   
    // Fetch the template from the request
    $template =  EmailTemplate::where('id',$this->request->id)->first();
    

    
    foreach($people as $person) {
        
        // create a new email log instance
        $emailLog = new EmailLog;
        
        // proceed only if no existing log
        if (!$emailLog->mailAlreadyLogged($person->id,$template->id)){
            
            $emailLog->template_id = $template->id;
            $emailLog->batch_id = $insBatchId;
            $emailLog->person_id = $person->id;
            $emailLog->save();
                   
        
            echo("<p>$person->given_name $person->family_name logged for sending</p>");    
        
        }else{
            echo("<p><strong>REJECTED: $person->given_name $person->family_name</strong> has not been logged</p>");    
        }
    }

    return 'Finished';
}

protected  function send() {

    $this->authorize('browse_send_mailing');

    
    // Fetch all email logs for the batch_id
    $batchId = $this->request->query('id');
  
     
         
    $emailLogs = EmailLog::where('batch_id',$batchId)
                ->with('people')
                ->with('template')
                ->get();
    
          // Iterate batches to fetch people associated with each batch
        foreach($emailLogs as $emailLog){

            $address = $emailLog->people->email;
            $name = $emailLog->people->name;
            
            
            Mail::to($address,$name)->queue(new BatchMail($emailLog));
            
        }
     
    return 'Mails sent!';    

    }
} 
        



