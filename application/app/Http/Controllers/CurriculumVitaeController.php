<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App;
use App\Job as Jobs;
use App\Skill as Skills;
use App\Institution as Institutions;



class CurriculumVitaeController extends Controller
{

    protected $vw;
    protected $employers;
    protected $roles;
    protected $roleResponsibilities;
    protected $skills;
    protected $rootSkills;
    protected $qualifications;
    public const INIT_HEADER_LEVEL = 3; // Determines the initial header level for the skills iteration


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

      
        // return all skills with their children 
        $skills =   Skills::with('children')->get();

        // Reject any skills which are not active
        $skills = $skills->reject(function ($value,$key){

            if($key == 'is_active') {

                return $value === false;

            }

        });

        // Sort the skills by their sort order index
        $skills = $skills->sortBy('SortOrder');
        
       
       
    
         $qualifications =  Institutions::with('qualifications.modules')->get();
    
       
    
        $this->skills = $skills;
        $this->employers = $employersKeyed;
        $this->roles = $roles;
        $this->responsibilities = $responsibilities;
        $this->qualifications = $qualifications;
        


        
        $this->vw = view('curriculum_vitae',[
                        'skills'=>$this->skills,
                        'employers'=>$this->employers,
                        'roles'=>$this->roles,
                        'responsibilities'=>$this->responsibilities,
                        'qualifications'=>$this->qualifications,
                        'initialHeaderLevel'=>$this::INIT_HEADER_LEVEL,
                        'pageProps'=>$this->pageProps]);

        return $this->vw;                 

                   
    
    }
}