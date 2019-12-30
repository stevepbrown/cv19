<div id="div-skill-iterator">
    {{-- 'iteration'
   'index' 
   'remaining' 
   'count' 
   'first' 
   'last'
   'odd'
   'even' 
   'depth' 
   'parent'  --}}
    {{-- @for ($x = 0;$x < $childSkills->count(); ++$x) --}}
    {{-- render the skill  --}}
    {{-- <p>{{$childSkills[$x]->skill}}</p> --}}
    {{-- Render child skills (except skills that have no children) --}}
    {{-- @unless($childSkills[$x]->children->count() == 0) --}}
    {{-- @include('partials.partial_skill_iterator',[$childSkills =$childSkills[$x]->children]) --}}
    {{-- @endunless  --}}
    {{-- @endfor --}}
    @php
    $depth =++$depth;
    @endphp
    
    @foreach ($childSkills as $childSkill)
      @if (($depth < ($initialHeaderLevel + 1))) <h{{$depth}} id="h{{$depth}}-skill-{{$childSkill->id}}">
        {{$childSkill->skill}}</h{{$depth}}>
        @if ($childSkill->children->count() !==0)
        @foreach ($childSkill->children as $child)
        @include('partials.partial_skill_iterator',[$childSkills = $child->children])
        @endforeach
        @endif
        @elseif(($depth < ($initialHeaderLevel + 2))) <h{{$depth}} id="h{{$depth}}-skill-{{$childSkill->id}}">
            {{$childSkill->skill}}</h{{$depth}}>
            @if($childSkill->children->count() !==0)
               <ul id="h{{$depth}}-{{$childSkill->id}}">
                  @foreach($childSkill->children as $child)
                     <li id="li-skill-{{$child->id}}">{{$child->skill}}
                        @if ($childSkill->children->count() !==0)
                           @foreach ($childSkill->children as $child)
                              @include('partials.partial_skill_iterator',[$childSkills = $child->children])
                           @endforeach
                        @endif
                        <br/>
                     </li>
                  @endforeach
               </ul>
            @endif
         @else
               <ul id="ul-skill-{{$childSkill->id}}">
                  @if ($childSkill->children->count() !==0)
                     <li>{{$childSkill->skill}}
                           <ul>
                           @foreach ($childSkill->children as $item)
                             <li>{{$item->skill}}</li>
                           @endforeach
                           </ul>
                        <br/>
                     </li>
                  @else
                     <br/>
                     <li>{{$childSkill->skill}}</li>
                  @endif
               </ul>
            @endif
   @endforeach
  
</div>