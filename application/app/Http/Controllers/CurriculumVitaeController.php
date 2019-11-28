<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Qualification as Qualification;
use App\Employer as Employer;
use App\Institution as Institution;
use App\Skill as Skill;
class CurriculumVitaeController extends Controller
{
    private $pageProps = [
                            'title'=>'CV',
                            'keywords'=>'Web Developer,CV,curriculum vitae,skills,work experience,qualifications',
                            'description'=>'Web developer with Laravel experience seeking an entry-level position in the North-West of England'];
    private $skills;
    private $skillRoots; // Skills with no parents
    private $skillInters; // Skills that are both parents AND children
    private $skillChildren; // skills with no children
    private $jobs;
    private $qualifications;
/**
     * Single invocation function
     * to assemble the various models and return the 
     * data to the view
     * @return View
     */
    public function __invoke()
    {
        $this->skills = Skill::all();
        $this->skillRoots = $this->skills->where('IS_ROOT',1);
        $this->skillInters =  $this->skills->where('IS_ROOT',0)->where('IS_PARENT',1);
        $this->skillChildren = $this->skills->where('IS_PARENT',0)->where('IS_CHILD',1);

        
        // Nested Eager Loading - To eager load nested relationships, you may use "dot" syntax.
        $this->jobs =  Employer::with('roles.responsibilities')->get();
        
        // Nested Eager Loading - To eager load nested relationships, you may use "dot" syntax.
        $this->qualifications =  Institution::with('qualifications.modules')->get();
        
        return view('Curriculum_vitae',
                                        [
                                            'pageProps'=>$this->pageProps,
                                            'jobs'=>$this->jobs,
                                            'skillRoots'=> $this->skillRoots,
                                            'skillInters'=> $this->skillInters,
                                            'skillChildren' => $this->skillChildren,   
                                            'qualifications'=>$this->qualifications
                                        ]
                                    );
    }
}