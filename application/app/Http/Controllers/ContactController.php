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

          
      return $vw;
      
  }
   
   public function store(Request $request){

      
      // Validation $rules
      $this->rules =  array(
        'given_name'=>'required|alpha_dash|min:2',
        'family_name'=>'required|alpha_dash|min:2',
         'email'=>'required|email|same:confirm_email',
         'confirm_email'=>'required|email|same:email',
         'traffic_source'=>'required|numeric',
         'traffic_source_other'=>'exclude_unless:traffic_source,99|required|alpha_dash|min:4',
         'telephone'=>'nullable|min:10',
         'message'=>'required|min:5|max:500'
      );

      // Validate
      $request->validate($this->rules);
     

   }
}
