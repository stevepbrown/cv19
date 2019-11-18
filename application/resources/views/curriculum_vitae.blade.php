@extends('layouts.layout_master')
@section('main')
<div>
    <style>
        #jobs {
            background-color: red;
        }
    </style>


    <div id="jobs">

        @foreach ($employerRoleResponsibilities as $employerRoleResponsibility)
        
            
     
     
        <h4>{{$employers->where('id',($employerRoleResponsibility->employer_id))->groupBy('employer')}}</h4>

        
        @endforeach




    </div>

  
    <ul id="skills">
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
@endsection