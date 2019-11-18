<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ParentSkill as ParentSkill;
use App\Employer as Employer;
use App\Role as Role;
use App\Responsibility as Responsibility;
use App\EmployerRoleResponsibility as EmployerRoleResponsibility;

class CurriculumVitaeController extends Controller
{

    protected $pageProps = [
                            'title'=>'CV',
                            'keywords'=>'Web Developer,CV,curriculum vitae,skills,work experience,qualifications',
                            'description'=>'Web developer with Laravel experience seeking an entry-level position in the North-West of England'];


    protected $skills;
    protected $employers;
    protected $roles;
    protected $responsibilities;    
    protected $qualifications;
    protected $jobs;
    protected $employerRoleResponsibilities;
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
        
        
        $this->employerRoleResponsibilities = EmployerRoleResponsibility::with(['roles','responsibilities','employers']);
        $this->employers = Employer::all();
        $this->roles = Role::all();
        $this->responsibilities = Responsibility::all();
        $this->employerRoleResponsibilities = EmployerRoleResponsibility::all();

       
        

        $vw = view('Curriculum_vitae',
                                    [
                                        'pageProps'=>$this->pageProps,
                                        'skills'=>$this->skills,
                                        'employers'=>$this->employers,
                                        'roles'=>$this->roles,
                                        'responsibilities'=> $this->responsibilities,
                                        'employerRoleResponsibilities' => $this->employerRoleResponsibilities]
                                
                                );


        return $vw;

     
    }



}