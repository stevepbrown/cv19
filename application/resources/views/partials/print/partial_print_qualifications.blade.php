<div id="div-print-qualifications">
    <h2>Qualifications</h2>
    @foreach ($qualifications as $institution)
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
