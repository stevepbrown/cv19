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
 
   public function show(){

     parent::show();

        $request = $this->request; 

        // Add ContactForm session variables
      //  $request->session()->put('id', null);   
      //  $request->session()->put('title_id', null);
      //  $request->session()->put('given_name', null);
      //  $request->session()->put('family_name', null);
      //  $request->session()->put('telephone', null);
      //  $request->session()->put('traffic_source_code', null);
      //  $request->session()->put('traffic_source_other', null);
      //  $request->session()->put('message', null);
      

      // Obtain a list of options for traffic source types
      $trafficSourceTypes = DB::table('traffic_source_types')->select('code','text')->orderBy('code')->get()->toArray();
      
 
      // append the array to the props
      $this->props = Arr::add($this->props,'trafficSourceTypes',$trafficSourceTypes);

      
      
      $vw = view($this->props['name'],$this->props);

      
     
      return $vw;
      
  }
   
   public function store(Request $request){

      
   dd($request->input());

   }
}
