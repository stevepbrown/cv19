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
    protected $employers;
    protected $roles;
    protected $roleResponsibilities;
    protected $skills;
    protected $qualifications;

    public function show(){
     
        
        $employersRoleSort= jobs::select('employer_id','employer','employer_description')->orderByDesc('role_sort');
        
        $employersKeyed  = $employersRoleSort->get()->keyBy('employer_id');


        $roles =  jobs::select('employer_id','role_id','role','role_sort')->orderByDesc('role_sort')->groupBy('employer_id','role_id','role','role_sort');

        $roles =  $roles->select('employer_id','role_id','role')->get();

        $responsibilities = jobs::select('responsibility_id','employer_id','role_id','responsibility')->where('role_responsibility_is_active',true)->orderBy('responsibility')->get();

      
        // Return the active skills
        $skills = Skills::with('children')->get()->reject(function ($value, $key) {
        if ($key = 'active'){
            return $value->active == false;
        }
        });

    // TODO(SPB): Implement sorting via relationship to EAV
    $skills = $skills->where('parent_skill_id',null);
    
    $qualifications = Qualifications::all();
    
   
    $this->skills = $skills;
    $this->employers = $employersKeyed;
    $this->roles = $roles;
    $this->responsibilities = $responsibilities;
    $this->qualifications = $qualifications;
    
        
    $this->vw = view('print_cv',
                   ['skills'=>$this->skills,
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
