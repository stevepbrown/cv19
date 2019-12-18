<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use App\Job as Jobs;
use App\Skill as Skills;
use App\Qualification as Qualifications;





class PrintController extends Controller
{
   
    protected $vw;
        

    public function show(Jobs $jobs,Skills $skills,Qualifications $qualifications){

     
     $jobs = $jobs->where('RESPONSIBILITY_IS_ACTIVE',true)->get()->sortByDesc('ROLE_SORT');
    
    // Return the active skills
    $skills = $skills::with('children')->get()->reject(function ($value, $key) {
            
        if ($key = 'active'){
            return $value->active == false;
        }
    }

   
);

    $skills = $skills->where('parent_skill_id',null)->sortBy('sortOrder');

            
    $qualifications = $qualifications::all();

    $this->vw = view('print_cv',['skills'=>$skills,'jobs'=>$jobs,'qualifications'=>$qualifications])->render();
     
    return $this->vw;
      
    // $pdf = App::make('dompdf.wrapper');
        
                

    // $pdf->loadHTML($this->vw);
            
  
    // return $pdf->stream();

    }
}
