<?php

namespace App\Http\Controllers;

use Exception;
// use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\DB;
// use TCG\Voyager\Database\Schema\SchemaManager;
// use TCG\Voyager\Events\BreadDataAdded;
// use TCG\Voyager\Events\BreadDataDeleted;
// use TCG\Voyager\Events\BreadDataRestored;
// use TCG\Voyager\Events\BreadDataUpdated;
// use TCG\Voyager\Events\BreadImagesDeleted;
use TCG\Voyager\Facades\Voyager;
// use TCG\Voyager\Http\Controllers\Traits\BreadRelationshipParser;
use  Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon;
use App\EmailLog;
use App\EmailTemplate;
use App\Person;
use App\mail\BatchMail as BatchMail;



class batchMailController extends \TCG\Voyager\Http\Controllers\VoyagerBaseController

    


{

    
    protected $batchId;
    protected $templateId;
    protected $currentRequest;

    /**
     * function create
     *
     * @param Request $request
     * @return view
     * 
     * This public function overrides that in the base class
     * 
     */
    public function create(Request $request)
    {
        
        $slug = 'mailings';
        $this->templateId = $request->template_id;
        $this->currentRequest = $request;
  
         $this->createBatch($this->currentRequest);

       return;

      

        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();

        // Check permission
        $this->authorize('add', app($dataType->model_name));

        $dataTypeContent = (strlen($dataType->model_name) != 0)
                            ? new $dataType->model_name()
                            : false;

        foreach ($dataType->addRows as $key => $row) {
            $dataType->addRows[$key]['col_width'] = $row->details->width ?? 100;
        }

        // If a column has a relationship associated with it, we do not want to show that field
        $this->removeRelationshipField($dataType, 'add');

        // Check if BREAD is Translatable
        $isModelTranslatable = is_bread_translatable($dataTypeContent);

        $view = 'voyager::bread.edit-add';

        if (view()->exists("voyager::$slug.edit-add")) {
            $view = "voyager::$slug.edit-add";
        }

        return Voyager::view($view, compact('dataType', 'dataTypeContent', 'isModelTranslatable'));
    }

    protected function createBatch($template_id){

        
     // Fetch the existing logged emails
    $emailLogs = EmailLog::all();

    // Fetch all people
    $people = Person::all();
    
    // Create a new batch_id based upon the highest existing batch_id
    $insBatchId =  ($emailLogs->max('batch_id')+1);
   
    // Fetch the template from the request
    $template =  EmailTemplate::where('id',$this->currentRequest->template_id)->first();
    

    
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
}