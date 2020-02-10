<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use TCG\Voyager\Facades\Voyager;
use  Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Arr;
use App\EmailLog;
use App\EmailTemplate;
use App\Person;
use App\EmailBatchStatus;
use App\Mail\TemplateMailer;
use App\EmailPersonTemplate;



class batchMailController extends \TCG\Voyager\Http\Controllers\VoyagerBaseController

   

{

/**
 * function  index
 *
 * Returns a voyager browse view for
 * email_logs (mailings)
 * 
 * @param Request $request
 * @return view
 */
public function index(Request $request)
{

    // GET THE SLUG, ex. 'posts', 'pages', etc.
    $slug = $this->getSlug($request);

    // GET THE DataType based on the slug
    $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();

    // Check permission
    $this->authorize('browse', app($dataType->model_name));

    
    $view = 'voyager::bread.browse';

    if (view()->exists("voyager::$slug.browse")) {
        $view = "voyager::$slug.browse";
    }

    

    return Voyager::view($view, $this->prepareRender($request,$dataType));
  
}
   

    /**
     * function create
     * 
     * Creates a new mail batch -
     * Obtains voyager model corresponding to slug,
     * authorises and hands-off to
     * a separate internal function
     * to add to the email_log 
     *  
     * @param obj $request 
     * @return void
     */
    public function create(Request $request)
    {
     
    // GET THE SLUG, ex. 'posts', 'pages', etc.
    $slug = $this->getSlug($request);

    // GET THE DataType based on the slug
    $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();
     

    // Check permission
    $this->authorize('add', app($dataType->model_name));
     
        
    // create the batch 
    $this->createBatch($request);

    //redirect to browse page 
    return back();
         
          
    }

   
  
   /**
    * function createBatch
    *
    * Assembles a batch of emails based upon the template ID
    * passed in the request. Iterates through all of the people
    * registered for that template & adds them to the batch, but only 
    * if they have not been part of a previous batch.
    *
    * @param Request $request
    * @return boolean
    */
    protected function createBatch(Request $request){

    $countAccepted = 0 ; 
    $countRejected = 0;
   
   
    
    // Fetch the existing logged emails
    $emailLogs = EmailLog::with(['person','template'])->get();

   

    // Fetch all people with their associated email templates
    $people = Person::with('EmailPersonTemplates')->get();
    
      

    // Create a new batch_id based upon the highest existing batch_id
    $insBatchId =  ($emailLogs->max('batch_id')+1);
 
   
    
    foreach($people as $person) 

        // Check that the passed template is active for the person 
        foreach($person->EmailPersonTemplates as $template) {

            if(
                ($template->email_templates_id == $request->templateId) && ($template->IsActive === false)){

            ++$countRejected;
            
            // Bypass, move to next person
            continue;    
            }
            
            elseif($emailLogs->where('template_id',$request->templateId)->where('person_id',$person->id)->isEmpty()){

            // create a new email log instance
            $emailLog = new EmailLog;

            $emailLog->template_id = $request->templateId;
            $emailLog->batch_id = $insBatchId;
            $emailLog->person_id = $person->id;
            $emailLog->invoked = false;
            $emailLog->save();
            ++$countAccepted;
            }

            else{

                unset($emailLog);
                ++$countRejected;
            }
        }
   
   
    
        if($countAccepted > 0 ){
        // create new email batch status instance & populate with required values
        $emailBatchStatus = new EmailBatchStatus;
        $emailBatchStatus->batch_id =  $insBatchId;
        $emailBatchStatus->count_accepted = $countAccepted;
        $emailBatchStatus->count_rejected = $countRejected;
        $emailBatchStatus->created_at = today();
        $emailBatchStatus->save();

        return true;

    } else{

        return false;
    }

    //redirect to browse page 
    return back();

}
   
    


    /**
     * private function prepareRender
     *
     * Provides common functionality to populate the page 
     * attributes for a voyager browse / mail view. Most
     * values are simply duplicated from the standard 
     * VoyagerBaseController index method. Additional 
     * properties are appended to provide template / 
     * batch summary info
     * 
     * @param [type] $request
     * @param [type] $dataType
     * @return [array]
     */
    private function prepareRender($request,$dataType) {
       
        // NB. Query builder select from VIEW
        $batchStatusesView =   DB::table('vwEmailBatchStatuses')->orderBy('run_on')->get()->toArray();
                
        $nextBatchId = 
        
        $templates = EmailTemplate::select('id','name','subject','description')->get()->toArray();
   
        $getter = $dataType->server_side ? 'paginate' : 'get';
        
    $search = (object) ['value' => $request->get('s'), 'key' => $request->get('key'), 'filter' => $request->get('filter')];

    $searchNames = [];
    if ($dataType->server_side) {
        $searchable = SchemaManager::describeTable(app($dataType->model_name)->getTable())->pluck('name')->toArray();
        $dataRow = Voyager::model('DataRow')->whereDataTypeId($dataType->id)->get();
        foreach ($searchable as $key => $value) {
            $displayName = $dataRow->where('field', $value)->first()->getTranslatedAttribute('display_name');
            $searchNames[$value] = $displayName ?: ucwords(str_replace('_', ' ', $value));
        }
    }

    $orderBy = $request->get('order_by', $dataType->order_column);
    $sortOrder = $request->get('sort_order', null);
    $usesSoftDeletes = false;
    $showSoftDeleted = false;

    // Next Get or Paginate the actual content from the MODEL that corresponds to the slug DataType
    if (strlen($dataType->model_name) != 0) {
        $model = app($dataType->model_name);

        if ($dataType->scope && $dataType->scope != '' && method_exists($model, 'scope'.ucfirst($dataType->scope))) {
            $query = $model->{$dataType->scope}();
        } else {
            $query = $model::select('*');
        }

        // Use withTrashed() if model uses SoftDeletes and if toggle is selected
        if ($model && in_array(SoftDeletes::class, class_uses_recursive($model)) && Auth::user()->can('delete', app($dataType->model_name))) {
            $usesSoftDeletes = true;

            if ($request->get('showSoftDeleted')) {
                $showSoftDeleted = true;
                $query = $query->withTrashed();
            }
        }

        // If a column has a relationship associated with it, we do not want to show that field
        $this->removeRelationshipField($dataType, 'browse');

        if ($search->value != '' && $search->key && $search->filter) {
            $search_filter = ($search->filter == 'equals') ? '=' : 'LIKE';
            $search_value = ($search->filter == 'equals') ? $search->value : '%'.$search->value.'%';
            $query->where($search->key, $search_filter, $search_value);
        }

        if ($orderBy && in_array($orderBy, $dataType->fields())) {
            $querySortOrder = (!empty($sortOrder)) ? $sortOrder : 'desc';
            $dataTypeContent = call_user_func([
                $query->orderBy($orderBy, $querySortOrder),
                $getter,
            ]);
        } elseif ($model->timestamps) {
            $dataTypeContent = call_user_func([$query->latest($model::CREATED_AT), $getter]);
        } else {
            $dataTypeContent = call_user_func([$query->orderBy($model->getKeyName(), 'DESC'), $getter]);
        }

        // Replace relationships' keys for labels and create READ links if a slug is provided.
        $dataTypeContent = $this->resolveRelations($dataTypeContent, $dataType);
    } else {
        // If Model doesn't exist, get data from table name
        $dataTypeContent = call_user_func([DB::table($dataType->name), $getter]);
        $model = false;
    }

  
    // Check if server side pagination is enabled
    $isServerSide = isset($dataType->server_side) && $dataType->server_side;

    // Check if a default search key is set
    $defaultSearchKey = $dataType->default_search_key ?? null;

    // Actions
    $actions = [];
    if (!empty($dataTypeContent->first())) {
        foreach (Voyager::actions() as $action) {
            $action = new $action($dataType, $dataTypeContent->first());

            if ($action->shouldActionDisplayOnDataType()) {
                $actions[] = $action;
            }
        }
    }

    // Define showCheckboxColumn
    $showCheckboxColumn = false;
    if (Auth::user()->can('delete', app($dataType->model_name))) {
        $showCheckboxColumn = true;
    } else {
        foreach ($actions as $action) {
            if (method_exists($action, 'massAction')) {
                $showCheckboxColumn = true;
            }
        }
    }

    // Define orderColumn
    $orderColumn = [];
    if ($orderBy) {
        $index = $dataType->browseRows->where('field', $orderBy)->keys()->first() + ($showCheckboxColumn ? 1 : 0);
        $orderColumn = [[$index, 'desc']];
        if (!$sortOrder && isset($dataType->order_direction)) {
            $sortOrder = $dataType->order_direction;
            $orderColumn = [[$index, $dataType->order_direction]];
        } else {
            $orderColumn = [[$index, 'desc']];
        }
    }

    return compact(
        'actions',
        'dataType',
        'dataTypeContent',
        'search',
        'orderBy',
        'orderColumn',
        'sortOrder',
        'searchNames',
        'defaultSearchKey',
        'usesSoftDeletes',
        'showSoftDeleted',
        'showCheckboxColumn',
        'templates',
        'batchStatusesView'   
    );
  

    }

    
    /**
     * function send
     * 
     * Sends all of the mails in a batch 
     * that have not been sent previously
     * 
     * @param [type] $batchId
     * @return void
     */
    public function send($batchId){

        // Get the batch for the passed batch_id
        $batch = EmailLog::where('batch_id',$batchId)->with(['person','template'])->get();

                      
        // Reject any that have been invoked before
        $batch = $batch->reject(function ($value, $key='invoked') {
            return $value === true;
        });

        
        // Iterate batch to send each mail
        foreach($batch as $mail){

        // Extract email address from person associated with batch
        $emailAddress = $mail->person->email;
     


        // Send it 
        Mail::queue(new TemplateMailer($mail));       
        // Update record, flag as invoked
        $mail->invoked = true;
        $mail->save();


        }

        //redirect to browse page 
        return back();




    }
}