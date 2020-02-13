<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ContactForm;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;

class ContactController extends GenericPageController
{
   
 
   public function show(){

      $props = $this->getPageAttributes();

      // Obtain a list of options for traffic source types
      $trafficSourceTypes = DB::table('traffic_source_types')->select('code','text')->orderBy('code')->get()->toArray();
      
 
      // append the array to the props
      $props = Arr::add($props,'trafficSourceTypes',$trafficSourceTypes);
      
      $vw = view($props['name'],$props);

      
      return $vw;
      
  }
   
   public function store(Request $request){

      dd('In store');

      // Create new instance of ContactForm
    $form = new ContactForm;




   }
}
