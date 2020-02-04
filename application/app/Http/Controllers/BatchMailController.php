<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use TCG\Voyager\Facades\Voyager;
use  Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use App\EmailLog;
use App\EmailTemplate;
use App\Person;
use App\mail\BatchMail as BatchMail;



class batchMailController extends \TCG\Voyager\Http\Controllers\VoyagerBaseController

    

{



    /*

GET 	/mailings/$batch_id?} 	index 	mailings.index
GET 	/mailings/create/{template_id} 	create 	mailings.create
POST 	/mailings 	store 	mailings.store
GET 	/mailings/{} 	show 	mailings.show
GET 	/mailings/edit/ 	edit 	mailings.edit
PUT/PATCH 	/mailings/{photo} 	update 	mailings.update
DELETE 	/mailings/{photo} 	destroy 	mailings.destroy

    */


/* voyager resource methods */

public function index(Request $request)
{
    // GET THE SLUG, ex. 'posts', 'pages', etc.
    $slug = $this->getSlug($request);

    // GET THE DataType based on the slug
    $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();

    // Check permission
    $this->authorize('browse', app($dataType->model_name));

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

    // Check if BREAD is Translatable
    if (($isModelTranslatable = is_bread_translatable($model))) {
        $dataTypeContent->load('translations');
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

    $view = 'voyager::bread.browse';

    if (view()->exists("voyager::$slug.browse")) {
        $view = "voyager::$slug.browse";
    }

    return Voyager::view($view, compact(
        'actions',
        'dataType',
        'dataTypeContent',
        'isModelTranslatable',
        'search',
        'orderBy',
        'orderColumn',
        'sortOrder',
        'searchNames',
        'isServerSide',
        'defaultSearchKey',
        'usesSoftDeletes',
        'showSoftDeleted',
        'showCheckboxColumn'
    ));
}
   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        
        $slug = 'mailings';
        $this->templateId = $request->template_id;
        $this->currentRequest = $request;
  
        $this->createBatch($this->currentRequest);


      

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

   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

  


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }



/*  resource methods ENDS */



    
    protected $batchId;
    protected $templateId;
    protected $currentRequest;

    
   
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

    protected function sendBatch($batch_id){


    }

}