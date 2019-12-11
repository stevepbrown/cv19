@extends('layouts.layout_master')
@section('main')
@php
// FIXME(SPB): 

@endphp
<div>
    {{-- JOBS --}}
    <div id="div-jobs">
        <h2>Employment History</h2>


        @foreach ($employers as $key=>$employer)
            <h3>{{$key}}</h3>
            <ul>
                <li><h4>{{$key}}</h4></li>
                   
                    @foreach ($roles as $role)
                       
                    
                    {{var_dump($role)}}
                        
                    @endforeach
                
        @endforeach

        {{die()}}

        

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