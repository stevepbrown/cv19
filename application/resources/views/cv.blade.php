@extends('layouts.layout_master')


@section('main')

    {{-- SKILLS --}}
    <div id="div-cv-skills" class="container-fluid">
        <h2 class="display-4 text-center text-center">Skills</h2>
            
        @foreach (($skills->where('parent_skill_id',null))->where('isActive','true') as $skill)
            @php        
                $level = null;
                $maxLevel = 6;
            @endphp
            {{-- Render main skills (top-level)  --}}
            <h{{$initialHeaderLevel}} id="h{{$initialHeaderLevel}}-skill-{{$skill->id}}">{{$skill->skill}}</h{{$initialHeaderLevel}}>
            
            {{-- Iterate through any children (recursive)   --}}
            @unless ($skill->children->count() == 0)
                @include('partials.partial_skill_iterator',[$level,($skills = $skill->children)])
            @endunless
        @endforeach
    </div>



    {{-- QUALIFICATIONS --}}
    <div id="div-cv-qualifications">
        <h2 class="display-4 text-center">Qualifications</h2>
        @foreach ($qualifications as $institution)
            <h3 id="h3-institution-{{$institution->id}}">{{$institution->institution}}</h3>
            @foreach ($institution->qualifications as $qualification)
                <h4 id="h4-qualification-{{$qualification->id}}">{{$qualification->qualification}}
                    ({{$qualification->year_attained}})</h4>

                 <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">View modules</a>

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
    {{-- EMPLOYMENT HISTORY --}}
    <div id="div-cv-jobs">
        <h2 class="display-4 text-center">Employment History</h2>

            @foreach ($employers as $employer)
                <div class="card my-4">
                    <div class="card-header bg-light">
                    <h3 id="h3-employer-{{$employer->employer_id}}" class="card-title">{{$employer->employer}}</h3>
                    <h4 class="card-subtitle">{{$employer->employer_description}}</h4>
                    </div>

                    <div class="card-body">
                    @foreach($roles->where('employer_id',$employer->employer_id) as $role)

                    <h4 id="h4-role-{{$role->id}}" class="d-inline">{{$role->role}}</h4><a href="#div-show-responsibilities-role-{{$role->role_id}}-target" class="badge badge-primary ml-3" data-toggle="collapse" role="button" aria-expanded="false"
                        aria-controls="div-show-responsibilities-role-{{$role->role_id}}-target">Show Responsibilities</a>  
                    <p>{{$role->tenure}}</p>
                    <div id="div-show-responsibilities-role-{{$role->role_id}}-target" class="collapse">
                        <ul id="ul-role-{{$role->id}}">
                        @foreach ($responsibilities->where('employer_id',$employer->employer_id)->where('role_id',$role->role_id) as
                        $responsibility)
                        <li  id="li-responsibility-{{$responsibility->responsibility_id}}">
                        {{$responsibility->responsibility}}</li>
                        @endforeach
                        </ul>
                    </div>
            @endforeach
                    </div>
            </div>
            @endforeach
        </div>

    @push('supplementary_scripts')
    <script>

    $("document").ready(function() {

    // Enable tooltips
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    });


    });

    </script>
    @endpush
@endsection