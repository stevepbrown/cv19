<div id="div-print-jobs">
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