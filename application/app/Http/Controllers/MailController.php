<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EmailBatch;
use App\Organisation;



class MailController extends Controller
{
    public function create(Request $request){

// TODO(SPB): Run through auth middleware!!

    dd(EmailBatch::all());    
    
    // dd((EmailBatch::max('batch_id') >= 1? (EmailBatch::max('batch_id') + 1) : 1));

  
    // Get the highest batch_id or initialise to one 
    $insert_batch_id =   (EmailBatch::max('batch_id') >= 1? (EmailBatch::max('batch_id') + 1) : 1);


    // Get a collection of all organisations & their related people
    $organisations = Organisation::with('people')->get();

    dd($insert_batch_id);
    
    foreach($organisations as $organisation) {

      try {
        $emailBatch = new EmailBatch($organisation,$request->template_id,$insert_batch_id); 
        $emailBatch->save();  
      
        } catch (Exception $e) {
          return report($e);
          
      }  

      return 'Saved!';


     

    }    


  
   

         

    }
}
