@extends('layouts.layout_master')
@section('main')
<div>
    <div id="div-jobs">
        <h2>Employment History</h2>
        @foreach ($jobs as $job)
        <h3>{{$job->employer}}</h3>
        @foreach ($job->roles as $role )
        <h4>{{$role->role}}</h4>
        <ul id="ul-responsibilities">
            @foreach ($role->responsibilities as $responsibility)
        <li id="li-responsibility-{{$responsibility->id}}">{{$responsibility->responsibility}}</li>
            @endforeach
        </ul>
        @endforeach
        @endforeach
    </div>
    <div id="div-skills">
        <h2>Skills</h2>

        @php
        
            $rootSkills = $skills->where('PARENT_ANTECEDENT_ID',0)
        @endphp

        @foreach ($rootSkills->groupBy('SKILL') as $rootSkill)
        
        <p>{{$rootSkill->pluck('SKILL')}}</p>
        
        @endforeach
        
             
        @php
            die();
        @endphp
        $mappedSkills = $skills->mapToGroups(function ($item,$key) {
            return [$item['SKILL'] => $item['CHILD_SKILL']];
    
        });

       
        @endphp

        @foreach($mappedSkills as $mappedSkill){

            <p>{{$mappedSkill}}</p>

        }
        @endforeach

   

      
    
    


       

        {{-- Skills with no parents --}}
        {{-- @foreach ($skillRoots as $skillRoot)
    <h3 id="h-skill-id-{{$skillRoot->id}}">{{$skillRoot->skill}}</h3>
            @foreach ( $skillInters->where('parent_skill_id',$skillRoot->id) as $skillInter)
                <h4 id="h-skill-id-{{$skillInter->id}}">{{$skillInter->skill}}</h4>
                <ul>
                    @foreach($skillChildren->where('parent_skill_id',$skillInter->id) as $skillChild)
                        <li id="li-skill-id-{{$skillChild->id}}">
                                {{$skillChild->skill}}
                        </li>
                    @endforeach
                </ul>
            @endforeach
        @endforeach
    </div>
</div>
<div id="div-qualifications">
    <h2>Qualifications</h2>
    @foreach($qualifications as $institution)
        <h3>{{$institution->institution}}</h3>
        @foreach ($institution->qualifications as $qualification)
<h4>{{$qualification->qualification}} (attained {{$qualification->year_attained}})</h4>
                <ul id="ul-modules">
                    @foreach ($qualification->modules as $module)
                <li id="li-modules-{{$module->id}}">{{$module->module}} 
                        @isset($module->grade)
                            - {{$module->grade}}
                         @endisset
                    </li>
                    @endforeach
                </ul>
            @endforeach    
    @endforeach --}}
</div>
@endsection