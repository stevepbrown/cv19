@php
 
    
    // First-time initialisation of header level
    if(is_null($level)){

      $level = $initialHeaderLevel;
  
    }
    
    
@endphp
<div>

@php
    $level = $level+1;
@endphp

    <ul id="ul-skill-parent-{{$skills->first->skill_parent_id}}">
      @foreach ($skills->where('isActive','true') as $skill)
     <li id="li-skill-{{$skill->id}}"> 
               @if($level <= $maxLevel)
                 <h{{$level}} id="h{{$level}}-skill-{{$skill->id}}">{{$skill->skill}}@isset($skill->icon_class)
                  <i class="fas fa-{{$skill->icon_class}} fa-sm fa-fw" title="It has been some time since I used this skill" data-toggle="tooltip" data-placement="right"></i></h{{$level}}>
                 @endisset
                                    
                  @else
                  <span>{{$skill->skill}}
                     @isset($skill->icon_class)
                     <i class="fas fa-{{$skill->icon_class}} fa-sm fa-fw" title="It has been some time since I used this skill" data-toggle="tooltip" data-placement="right">
                     </i>
                     @endisset 
                  </span>   
               @endif
               
               @if ($skill->children)
                  @include('partials.partial_skill_iterator',[$level,($skills = $skill->children)])
               @endif
              
               
         </li>
        

      @endforeach 
   </ul>
</div>