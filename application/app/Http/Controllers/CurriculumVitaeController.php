<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Qualification as Qualification;
use App\Institution as Institution;
use App\Skill as Skill;
use Illuminate\Support\Facades\DB;

// use App\EntityAttributeValue as EntityAttributeValue;

class CurriculumVitaeController extends Controller
{
    protected $pageProps = [
                            'title'=>'CV',
                            'keywords'=>'Web Developer,CV,curriculum vitae,skills,work experience,qualifications',
                            'description'=>'Web developer with Laravel experience seeking an entry-level position in the North-West of England'];
    
/**
     * Single invocation function
     * to assemble the various models and return the 
     * data to the view
     * @return View
     */
    public function __invoke()
    {
        $skills = Skill::with('children')->get();
     
        $jobs =  DB::table('vwJobs');

        $employers= $jobs->select('EMPLOYER_ID','EMPLOYER')->orderByDesc('ROLE_SORT')->get()->unique();
        
        $employerRoles = $jobs->select('ROLE_ID','EMPLOYER_ID','ROLE')->orderBy('ROLE_SORT')->get()->unique();

        $roleResponsibilities = $jobs->select('RESPONSIBILITY_ID','ROLE_ID','RESPONSIBILITY')->where('RESPONSIBILITY_IS_ACTIVE',false)->orderBy('RESPONSIBILITY')->get()->unique();

           
 
        // Nested Eager Loading - To eager load nested relationships, you may use "dot" syntax.
        $qualifications =  Institution::with('qualifications.modules')->get();
        return view('Curriculum_vitae',
                                        [
                                            'pageProps'=>$this->pageProps,
                                            'jobs'=>$jobs,
                                            'qualifications'=>$qualifications,
                                            'skills'=>$skills,
                                            'rootSkills'=>$skills->where('parent_skill_id',null),
                                            'employers'=>$employers,
                                            'employerRoles'=> $employerRoles,
                                            'roleResponsibilities'=>$roleResponsibilities 
                                        ]
                                    );
    }
}