<div id="div-skill-iterator">
   
    @php
       $depth =++$depth;
    @endphp


    


    @foreach ($childSkills as $childSkill)

    
   @unless(!$childSkill->is_active | $childSkill->suppress_on_print)
 
      @if (($depth < ($initialHeaderLevel + 1))) <h{{$depth}} id="h{{$depth}}-skill-{{$childSkill->id}}">
      {{$childSkill->skill}}</h{{$depth}}>
        @if ($childSkill->children->count() !==0)
         @foreach ($childSkill->children as $child)
            @unless(!$child->is_active)
               @include('partials.partial_skill_iterator',[$childSkills = $child->children])
            @endunless
         @endforeach
        @endif
        @elseif(($depth < ($initialHeaderLevel + 2))) <h{{$depth}} id="h{{$depth}}-skill-{{$childSkill->id}}">
            {{$childSkill->skill}}</h{{$depth}}>
            @if($childSkill->children->count() !==0)
               <ul id="h{{$depth}}-{{$childSkill->id}}">
                  @foreach($childSkill->children as $child)
                     @unless(!$child->is_active)   
                        <li id="li-skill-{{$child->id}}">{{$child->skill}}</li>
                           @if ($childSkill->children->count() !==0)
                              @foreach ($childSkill->children as $child)
                              @include('partials.partial_skill_iterator',[$childSkills = $child->children])
                              @endforeach
                           @endif
                        </li>
                     @endunless
                  @endforeach
               </ul>
    
               @endif
         @else
               <ul id="ul-skill-{{$childSkill->id}}">
                  @if ($childSkill->children->count() !==0)
                     <li>{{$childSkill->skill}}
                           <ul>
                           @foreach ($childSkill->children as $item)
                           <li>YYYY {{$item->skill}}</li>
                           @endforeach
                           </ul>
                     </li>
                  @else
                     <li>XXX {{$childSkill->skill}}</li>
                  @endif
               </ul>
            @endif
            @endunless   
            @endforeach

</div>