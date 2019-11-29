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
    <div id="div-skills" style="background-color:coral">
        <h2>Skills</h2>
        @foreach ( $skills->where('PARENT_ANTECEDENT_ID',0)->groupBy('SKILL') as $skill)
            <h3>{{$skill->first()->SKILL}}</h3>
            @include('laravel-components.component_skill_iterator', ['parentID' => ($skill->first()->ID)])

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
    @endforeach
</div>
@endsection