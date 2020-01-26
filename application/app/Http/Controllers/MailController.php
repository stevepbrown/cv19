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
    /*
    
    A standard resource controller does not suffice here, because the uri action
    verbs eg. mail/create are not compatible with Voyager guards (admin/mail is supported, admin/mail/create)
    is not. Hence the need to utilise and verify query parameters!
    
    */
   
    public function __construct(Request $request)
    {
        $this->middleware('auth');
        $this->request = $request;

    }



    /*
index 	photos.index
GET 	/photos/create 	create 	photos.create
POST 	/photos 	store 	photos.store
GET 	/photos/{photo} 	show 	photos.show
GET 	/photos/{photo}/edit 	edit 	photos.edit
PUT/PATCH 	/photos/{photo} 	update 	photos.update
DELETE 	/photos/{photo} 	destroy

public function(index) {}
public function(create) {}
public function(store) {}
public function(show) {}
public function(edit) {}
public function(update) {}
public function(destroy) {}
public function(send) {}
public function() {}

    */

    protected function guard()
  {
      return Auth::guard(app('VoyagerGuard'));
  }

 public function index(){


    
    return view('vendor.voyager.mailings.browse');

    // // Ensure that the correct query parameters have been passed
    // if($this->request->query('action') && $this->request->query('id')){

    //     switch($this->request->query('action')){


    //         case 'create':
    //             $this->create();
    //             break;

    //         case 'send':
    //             $this->send();
    //             break;
            
    //             default:

    //         session(['alert' =>'Incorrect query parameters!']);
    //         return view('error');


    //     }
        
//     }

//     else {

//         session(['alert' =>'Incorrect query parameters!']);
//         return view('error');
   
//  }
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
        



