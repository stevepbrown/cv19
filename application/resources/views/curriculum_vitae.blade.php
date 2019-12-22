@extends('layouts.layout_master')
@section('main')


    {{-- SKILLS --}}
    <div id="skills">
            <h2>Skills</h2>
            {{-- (Defined at top)  --}}
            @foreach ($rootSkills as $rootSkill) 
                <h3 id="h-skill-{{$rootSkill->id}}">{{$rootSkill->skill}}</h3>
                <ul id=skill-root-id-{{$rootSkill->ID}}>
                    @each('partials.partial_skill_iterator', $rootSkill->children ,'skill')
                </ul>
        @endforeach
    </div>


    {{-- JOBS --}}
    <div id="div-jobs">
        <h2>Employment History</h2>
        @foreach ($employers as $employer)
            <h3>{{$employer->EMPLOYER}}</h3>
            <p>{{$employer->EMPLOYER_DESCRIPTION}}</p>
            @foreach ($employerRoles->where('EMPLOYER_ID',($employer->EMPLOYER_ID)) as $roles)
            <h4>{{$roles->ROLE}}</h4>
                <ul id="ul-role-{{$roles->ROLE_ID}}">
                    @foreach ($roleResponsibilities->where('ROLE_ID',($roles->ROLE_ID)) as $responsibility)
                        <li id="li-responsibility-{{$responsibility->RESPONSIBILITY_ID}}">
                            {{$responsibility->RESPONSIBILITY}}
                        </li>                               
                    @endforeach
                </ul>
            @endforeach    
        @endforeach
    </div>
  
    {{-- QUALIFICATIONS --}}
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
        @endforeach
    </div>
    @endsection