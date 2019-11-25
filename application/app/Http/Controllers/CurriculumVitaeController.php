<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ParentSkill as ParentSkill;
use App\Qualification as Qualification;
use App\Employer as Employer;
use App\Institution as Institution;


class CurriculumVitaeController extends Controller
{

    protected $pageProps = [
                            'title'=>'CV',
                            'keywords'=>'Web Developer,CV,curriculum vitae,skills,work experience,qualifications',
                            'description'=>'Web developer with Laravel experience seeking an entry-level position in the North-West of England'];


    protected $skills;
    // TODO(SPB): Check if these properties need to be retained
    protected $jobs;
    protected $qualifications;
    private $vw;
    

    

/**
     * Single invocation function
     * to assemble the various models and return the 
     * data to the view
  
     
     * @return View
     */
    public function __invoke()
    {

        
        /* Eager Loading related data */
        
        $this->skills= ParentSkill::with(['childSkills'])->get();

        // Nested Eager Loading - To eager load nested relationships, you may use "dot" syntax.
        $this->jobs =  Employer::with('roles.responsibilities')->get();

        
        // Nested Eager Loading - To eager load nested relationships, you may use "dot" syntax.
        $this->qualifications =  Institution::with('qualifications.modules')->get();

              



     
        

        return view('Curriculum_vitae',
                                    [
                                        'pageProps'=>$this->pageProps,
                                        'jobs'=>$this->jobs,
                                        'skills'=>$this->skills,
                                        'qualifications'=>$this->qualifications
                                    ]

                                
                                );
                            


     
    }



}