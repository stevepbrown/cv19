<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ParentSkill as ParentSkill;
use App\Qualification as Qualifications;
use App\Employer as Employers;
use App\Role as Roles;
use App\Responsibility as Responsibilities;
use App\EmployerRoleResponsibility as EmployerRoleResponsibility;
use Illuminate\Support\Facades\DB;


class CurriculumVitaeController extends Controller
{

    protected $pageProps = [
                            'title'=>'CV',
                            'keywords'=>'Web Developer,CV,curriculum vitae,skills,work experience,qualifications',
                            'description'=>'Web developer with Laravel experience seeking an entry-level position in the North-West of England'];


    protected $skills;
    // TODO(SPB): Check if these properties need to be retained
    protected $employers;
    protected $roles;
    protected $responsibilities;    
    protected $jobs;
    protected $qualifications;
    protected $EmloyerRoleResponsibilties;
    private $vw;
    

    

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


$this->EmployerRoleResponsibilties = EmployerRoleResponsibility::with(['employers','roles','responsibilities'])->get();


$this->EmployerRoleResponsibilties->each(function($item,$key) {

   
    dump($item->roles);
    // return print_r($item->roles);

});
die();



// $this->employers = Employers::with(['employerRoleResponsibilities'])->get();

// $this->roles = Roles::with(['employerRoleResponsibilities'])->get();

// $this->responsibilities = Responsibilities::with(['employerRoleResponsibilities'])->get();


// $this->jobs = DB::table('employers')
//     ->join('employer_role_responsibilities', 'employer_role_responsibilities.employer_id', '=','employers.id')
//     ->join('roles', 'roles.id', '=','employer_role_responsibilities.role_id')
//     ->join('responsibilities', 'responsibilities.id', '=','employer_role_responsibilities.responsibility_id')
//     ->select('employers.employer','employers.description','roles.role','responsibilities.responsibility')
//     ->orderBy('employers.employer')     
//     ->get();


        
       
        

        $vw = view('Curriculum_vitae',
                                    [
                                        'pageProps'=>$this->pageProps,
                                        'skills'=>$this->skills,
                                        'employers' => $this->employers,
                                        'roles'=> $this->roles,
                                        'responsibilities'=> $this->responsibilities
                                    ]

                                
                                );
                            

        return $vw;

     
    }



}