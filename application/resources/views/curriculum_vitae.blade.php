@extends('layouts.layout_master')
@section('main')
<div>

  


    <style>
        #jobs {
            background-color: red;
        }
    </style>

 

    <div id="jobs">

  @foreach ($employers as $employer)

    <h3>{{$employer->employer}}</h3>
    <p>{{$employer->description}}</p>


    @foreach ($employer->roles as $employerRole)
  
        {{dd($employerRole)}}
   
    {{-- {{$employerRole->role_id}}</br> --}}

    {{-- {{$roles}} --}}
   
        @endforeach
        
 
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