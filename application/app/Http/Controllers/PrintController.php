<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App;
use App\Job as Jobs;
use App\Skill as Skills;
use App\Institution as Institutions;



class PrintController extends Controller
{
    protected $vw;
    protected $employers;
    protected $roles;
    protected $roleResponsibilities;
    protected $skills;
    protected $rootSkills;
    protected $qualifications;

    public function __invoke(){
     
        
        $employersRoleSort= jobs::select('employer_id','employer','employer_description')->orderByDesc('role_sort');
        
        $employersKeyed  = $employersRoleSort->get()->keyBy('employer_id');


        $roles =  jobs::select('employer_id','role_id','role','role_sort')->orderByDesc('role_sort')->groupBy('employer_id','role_id','role','role_sort');

        $roles =  $roles->select('employer_id','role_id','role')->get();

        $responsibilities = jobs::select('responsibility_id','employer_id','role_id','responsibility')->where('role_responsibility_is_active',true)->orderBy('responsibility')->get();

      
        // return all skills
        $skills =   Skills::with('children')->get();


              
        // Return only the active skills
        $skills = $skills->where('is_active',true);
        
     
        
        // Sort the skills
        $skills = $skills->orderBy('sort_order');
       
       
    
         $qualifications =  Institutions::with('qualifications.modules')->get();
    
       
    
        $this->skills = $skills;
        $this->employers = $employersKeyed;
        $this->roles = $roles;
        $this->responsibilities = $responsibilities;
        $this->qualifications = $qualifications;
        
        
        $this->vw = view('print_cv',
                    [
                        // FIXME(SPB): 'rootSkills'=>$this->rootSkills,
                        'skills'=>$this->skills,
                        'employers'=>$this->employers,
                        'roles'=>$this->roles,
                        'responsibilities'=>$this->responsibilities,
                        'qualifications'=>$this->qualifications
                        ])->render();

                       
    

                    return $this->vw;
    // $pdf = App::make('dompdf.wrapper');
    // $pdf->loadHTML($this->vw);
    // return $pdf->stream();
    }
}
