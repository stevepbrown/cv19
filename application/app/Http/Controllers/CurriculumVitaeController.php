<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Job as Jobs;
use App\Qualification as Qualification;
use App\Institution as Institutions;
use App\Skill as Skills;



class CurriculumVitaeController extends Controller
{
    protected $pageProps = [
                            'title'=>'CV',
                            'keywords'=>'Web Developer,CV,curriculum vitae,skills,work experience,institutions',
                            'description'=>'Web developer with Laravel experience seeking an entry-level position in the North-West of England'];
/**
     * Single invocation function
     * to assemble the various models and return the 
     * data to the view
     * @return View
     */
    public function __invoke()
    {
      
        $employersRoleSort= jobs::select('employer_id','employer','employer_description')->orderByDesc('role_sort');
        
        $employersKeyed  = $employersRoleSort->get()->keyBy('employer_id');


        $roles =  jobs::select('employer_id','role_id','role','role_sort')->orderByDesc('role_sort')->groupBy('employer_id','role_id','role','role_sort');

        $roles =  $roles->select('employer_id','role_id','role')->get();

        $responsibilities = jobs::select('responsibility_id','employer_id','role_id','responsibility')->where('role_responsibility_is_active',true)->orderBy('responsibility')->get();

        // Get skills & eager-load skills children
        $skills = Skills::with('children')->get();

      
        // Order the skills
        $skills = $skills->sortBy('sortOrder');

       

        

        // Return only skills which have no antecedents (ie. root skills)
        $rootSkills = $skills->reject(function ($value, $key) {
            if ($key = 'parent_skill_id'){
                return $value->parent_skill_id !== null;            
            }
          });

       
    
          $institutions =  Institutions::with('qualifications.modules')->get();
        
    
    
        $this->skills = $skills;
        $this->rootSkills = $rootSkills;
        $this->employers = $employersKeyed;
        $this->roles = $roles;
        $this->responsibilities = $responsibilities;
        $this->institutions = $institutions;
        
        
        $this->vw = view('curriculum_vitae',
                    [
                        'rootSkills'=>$this->rootSkills,
                        'skills'=>$this->skills,
                        'employers'=>$this->employers,
                        'roles'=>$this->roles,
                        'responsibilities'=>$this->responsibilities,
                        'institutions'=>$this->institutions,
                        'pageProps'=>$this->pageProps
                        ]);

                 

                    return $this->vw;
    }
}