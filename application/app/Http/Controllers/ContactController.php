<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ContactForm;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;

class ContactController extends GenericPageController
{

   protected $fillable = [
       'given_name',
      'family_name',
      'telephone',
      'traffic_source_code',
      'traffic_source_other',
      'message',
   ];

   protected $rules;

   public function show(){

     parent::show();

      $request = $this->request;

     

      // Obtain a list of options for traffic source types
      $trafficSourceTypes = DB::table('traffic_source_types')->select('code','text')->orderBy('code')->get()->toArray();


      // append the array to the props
      $this->props = Arr::add($this->props,'trafficSourceTypes',$trafficSourceTypes);

      $vw = view($this->props['name'],$this->props);

   
     return $vw->with('status',(app('Illuminate\Http\Response')->status()));
  
  }

   public function store(Request $request){

      
  

      // Validation $rules
      $this->rules =  array(
        'given_name'=>'required|alpha_dash|min:2',
        'family_name'=>'required|alpha_dash|min:2',
         'email'=>'required|email|same:confirm_email|unique:contact_forms,email',
         'confirm_email'=>'required|email|same:email',
         'traffic_source'=>'required|numeric',
         'traffic_source_other'=>'exclude_unless:traffic_source,99|required|alpha_dash|min:4',
         'telephone'=>'nullable|min:10',
         'message'=>'required|min:5|max:500'
      );

  
      // Validate
      $request->validate($this->rules);
      
         $contact = new ContactForm;

         $contact->given_name = $request->input('given_name');
         $contact->family_name = $request->input('family_name');
         $contact->email = $request->input('email');
         $contact->telephone = $request->input('telephone');
         $contact->traffic_source_code = $request->input('traffic_source');
         $contact->traffic_source_other = $request->input('traffic_source_other');
         $contact->message = $request->input('message');
     
         $contact->save();


         $request->session->flash('status','Thankyou, you\'re message has been sent');

         return back($status = 201, $headers = [], $fallback = false);
      
      }
         
  


   
/**
 * Render an exception into an HTTP response.
 *
 * @param  \Illuminate\Http\Request  $request
 * @param  \Exception  $exception
 * @return \Illuminate\Http\Response
 */
public function render($request, Exception $exception)
{
    if ($exception instanceof CustomException) {
        return response()->view('errors.custom', [], 500);
    }

    return parent::render($request, $exception);
}
             

   }
   

