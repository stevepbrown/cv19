<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ParentSkill as ParentSkill;

class CurriculumVitaeController extends Controller
{

    protected $pageProps = [
                            'title'=>'CV',
                            'keywords'=>'Web Developer,CV,curriculum vitae,skills,work experience,qualifications',
                            'description'=>'Web developer with Laravel experience seeking an entry-level position in the North-West of England'];


    protected $skills;
    protected $jobs;
    protected $qualifications;
    

    

/**
     * Single invocation function
     * to assemble the various models and return the 
     * data to the view
     *
     * @return View
     */
    public function __invoke()
    {
        
        $this->skills= ParentSkill::with(['childSkills'])->get();
   
        
        return view('Curriculum_vitae',['pageProps'=>$this->pageProps,'skills'=>$this->skills]);

     
    }



}