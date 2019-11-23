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

        {{dump($job->roles->get())}}

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