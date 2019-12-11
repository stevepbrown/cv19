<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Qualification as Qualification;
// FIXME(SPB): use App\Employer as Employer;
use App\Institution as Institution;
use App\Skill as Skill;
// FIXME(SPB): use App\EmployerRole as EmployerRole;
// FIXME(SPB): use App\Job as Job;
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
     
        $jobs =  DB::table('vwJobs')->get();

        // Array of employers keyed by employer_id
        $employers = $jobs->groupBy('EMPLOYER');
        

        // Array of roles keyed by role_id
        $roles = $jobs->groupBy('ROLE');
     

       
     
        
        // Array of roles keyed by role_id
        $responsibilities = $jobs->groupBy('RESPONSIBILITY');

        

        
        
        
       
       
      
          
        // Nested Eager Loading - To eager load nested relationships, you may use "dot" syntax.
        $qualifications =  Institution::with('qualifications.modules')->get();
        return view('Curriculum_vitae',
                                        [
                                            'pageProps'=>$this->pageProps,
                                            'jobs'=>$jobs,
                                            'qualifications'=>$qualifications,
                                            'skills'=>$skills,
                                            'rootSkills'=>$skills->where('parent_skill_id',null),
                                            'jobs'=>$jobs,
                                            'employers'=>$employers,
                                            'roles'=> $roles,
                                            'responsibilities'=>$responsibilities 
                                        ]
                                    );
    }
}