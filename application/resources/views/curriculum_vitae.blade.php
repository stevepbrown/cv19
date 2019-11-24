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
</div>
@endsection