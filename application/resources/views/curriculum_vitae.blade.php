@extends('layouts.layout_master')
@section('main')


    {{-- SKILLS --}}
    <div id="skills">
        <h2>Skills</h2>
            @foreach ($skills as $skill)
                <h3 id="h3-skill-{{$skill->id}}">{{$skill->skill}}</h3>
                <ul id="ul-skill-{{$skill->id}}">
                    @each('partials.partial_skill_iterator', $skill->children ,'skill')
                </ul>       
            @endforeach
    </div>


    {{-- JOBS --}}
    <div id="div-jobs">
        <h2>Employment History</h2>
    
        @foreach ($employers as $employer)
        <h3 id="h3-employer-{{$employer->employer_id}}">{{$employer->employer}}</h3>
          <p>{{$employer->employer_description}}</p>
          @foreach($roles->where('employer_id',$employer->employer_id) as $role)
              <h4 id="h4-role-{{$role->id}}">{{$role->role}}</h4>
              <ul id="ul-role-{{$role->id}}">
                  @foreach ($responsibilities->where('employer_id',$employer->employer_id)->where('role_id',$role->role_id) as $responsibility)
                      <li id="li-responsibility-{{$responsibility->responsibility_id}}">
                          {{$responsibility->responsibility}}</li>
                  @endforeach
              </ul>
           @endforeach
       @endforeach
    </div>
  
    {{-- QUALIFICATIONS --}}
    <div id="div-qualifications">
        <h2>Qualifications</h2>
        @foreach ($institutions as $institution)
        <h3 id="h3-institution-{{$institution->id}}">{{$institution->institution}}</h3>
            @foreach ($institution->qualifications as $qualification)
                <h4 id="h4-qualification-{{$qualification->id}}">{{$qualification->qualification}} ({{$qualification->year_attained}})</h4>
                <ul id="ul-qualification-{{$qualification->id}}">
                @foreach ($qualification->modules as $module)
                    <li id="li-module-{{$module->id}}">{{$module->module}}  
                        @isset($module->grade)
                        - grade - {{$module->grade}}    
                        @endisset($module->grade)
                    </li>
                @endforeach
            </ul>
            @endforeach
        @endforeach
    </div>
    @endsection