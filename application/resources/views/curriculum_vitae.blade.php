@extends('layouts.layout_master')
@section('main')
<div>




    <div id="jobs">
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

    <div id="skills">
        <h2>Skills</h2>
        <ul>
            @foreach ($skills as $skill)
            <li>{{$skill->skill}}
                <ul>
                    @foreach ($skill->childSkills as $child)
                    <li>{{$child->skill}}</li>
                    @endforeach
                </ul>
            </li>
            @endforeach
        </ul>
    </div>
</div>

<div id="qulifications">
    <h2>Qualifications</h2>
    @foreach($qualifications as $institution)
        <h3>{{$institution->institution}}</h3>
            @foreach ($institution->qualifications as $qualification)
                <h4>{{$qualification->qualification}}</h4>
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