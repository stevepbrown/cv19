@php
 
    
    // First-time initialisation of header level
    if(is_null($level)){

      $level = $initialHeaderLevel;
  
    }
    
    
@endphp
<div id="div-skill-iterator">

@php
    $level = $level+1;
@endphp

  

   <ul id="ul-skill-parent-{{$skills->first->skill_parent_id}}">
      @foreach ($skills as $skill)
      <li id="li-skill-{{$skill->id}}">   
               @if($level <= $maxLevel)
                  <h{{$level}} id="h{{$level}}-skill-{{$skill->id}}">{{$skill->skill}}</h{{$level}}>
               @else
                  {{$skill->skill}}
               @endif
               
               @if ($skill->children)
                  @include('partials.print.partial_print_skill_iterator',[$level,($skills = $skill->children)])
               @endif
         </li>
      @endforeach 
   </ul>
</div>