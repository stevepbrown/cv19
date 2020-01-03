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

   

      @foreach ($skills as $skill)

      {{-- If the level is below the threshold, render as header --}}
      @if ($level < 6)
      <h{{$level}} id="h{{$level}}-skill-{{$skill->id}}">{{$skill->skill}}</h{{$level}}>

         {{-- render any children of header --}}
         @if($skill->children)
            @include('partials.print.partial_print_skill_iterator',[$level,($skills = $skill->children)])
         @endif
      @else
      {{-- Level is above threshold, check to see if there are children}}
     

         {{-- Has children, render as ul --}}    
         @if ($skill->children)

            <ul id="ul-skill-{{$skill->id}}">{{$skill->skill}}>
               <li id="li-skill-{{$skill->id}}">
                  {{$skill->skill}}
                  <ul id="ul-skill-{{$skill->id}}">
                     @foreach ($skill->children as $item)
                         <li>{{$item->skill}}</li>
                     @endforeach

                     
                  </ul>
               </li>
            </ul>
      
         @else
         {{-- No children, render as li --}}
            <li id="li-skill-{{$skill->id}}">$skill->skill</li>
         @endif
      @endif
   @endforeach






  

</div>