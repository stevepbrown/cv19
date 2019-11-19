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

    @foreach($employer->employerRoleResponsibilities as $employerRole)

       {{$employerRole->role_id}};

        {{-- {{$roles = $roles->where('id', ($employerRole->pluck('role_id')))}}
        {{dd($roles)}} --}}
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