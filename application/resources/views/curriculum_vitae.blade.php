@extends('layouts.layout_master')
@section('main')

<div>
    {{-- JOBS --}}
    <div id="div-jobs">
        <h2>Employment History</h2>


        @foreach ($employers as $employer)
            <h3>{{$employer->EMPLOYER}}</h3>
            <ul id="ul-employer-{{$employer->EMPLOYER_ID}}">
            @foreach ($employerRoles->where('EMPLOYER_ID',($employer->EMPLOYER_ID)) as $roles)
                <li>
                    <h4>{{$roles->ROLE}}</h4>
                    <ul id="ul-role-{{$roles->ROLE_ID}}">
                        @foreach ($roleResponsibilities->where('ROLE_ID',($roles->ROLE_ID)) as $responsibility)
                            
                            <li id="li-responsibility-{{$responsibility->RESPONSIBILITY_ID}}">
                                {{var_dump($responsibility)}}
                                {{-- {{$responsibility->RESPONSIBILITY}} - {{$responsibility->RESPONSIBILITY_IS_ACTIVE}} --}}
                            </li>
                               
                        @endforeach
                    </ul>
                <li>
            @endforeach    
        @endforeach

  

        

        {{-- <h3>{{$employer}}</h3> --}}
        {{-- @foreach ($job->roles as $role )
                <h4>{{$role->role}}</h4>
        <ul id="ul-responsibilities">
            @foreach ($role->responsibilities as $responsibility)
            <li id="li-responsibility-{{$responsibility->id}}">{{$responsibility->responsibility}}</li>
            @endforeach
        </ul>
        @endforeach --}}

    </div>
    {{-- SKILLS --}}
    <div id="skills">
        <h2>Skills</h2>
        {{-- (Defined at top)  --}}

        @foreach ($rootSkills as $rootSkill)

        @if($rootSkill->active->first())
        <h3>{{$rootSkill->skill}}</h3>
        <ul id=skill-root-id-{{$rootSkill->id}}>
            @each('partials.partial_skill_iterator', $rootSkill->children ,'skill')
        </ul>
        @endif
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