<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ParentSkill as ParentSkill;
use Illuminate\Support\Facades\DB;

// TODO(SPB): Check if these use statments are needed
// use App\Employer as Employer;
// use App\Role as Role;
// use App\Responsibility as Responsibility;
 
use App\EmployerRoleResponsibility as EmployerRoleResponsibility;

class CurriculumVitaeController extends Controller
{

    protected $pageProps = [
                            'title'=>'CV',
                            'keywords'=>'Web Developer,CV,curriculum vitae,skills,work experience,qualifications',
                            'description'=>'Web developer with Laravel experience seeking an entry-level position in the North-West of England'];


    protected $skills;
    // TODO(SPB): Check if these properties need to be retained
    // protected $employers;
    // protected $roles;
    // protected $responsibilities;    
    protected $jobs;
    protected $qualifications;
    
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
        

/*

Sub-Query Joins

You may use the joinSub, leftJoinSub, and rightJoinSub methods to join a query to a sub-query. Each of these methods receive three arguments: the sub-query, its table alias, and a Closure that defines the related columns


*/

        $this->skills= ParentSkill::with(['childSkills'])->get();
        
        // FIXME(SPB): Investigate subJoin & implement to get correct hierarchy for $jobs
        $this->jobs = DB::table('employers')
            ->joinSub

        dd($this->jobs);
       
        

        $vw = view('Curriculum_vitae',
                                    [
                                        'pageProps'=>$this->pageProps,
                                        'skills'=>$this->skills,
                                        'employerRoleResponsibilities' => $this->employerRoleResponsibilities]
                                
                                );


        return $vw;

     
    }



}