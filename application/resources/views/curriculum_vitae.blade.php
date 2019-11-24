@extends('layouts.layout_master')
@section('main')
<div>




    <style>
        #jobs {
            background-color: red;
        }
    </style>



    <div id="jobs">

      
        @foreach ($jobs as $job)

        <h3>{{$job->employer}}</h3>



        @foreach ($job->roles as $role )

        <h4>{{$role->role}}</h4>

        <ul>
            @foreach ($role->responsibilities as $responsibility)
            <li>{{$responsibility->responsibility}}</li>
            @endforeach
        </ul>
        @endforeach


        @endforeach


    </div>

    <div id="skills">
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
@endsection