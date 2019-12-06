<div id="div-skill-iterator">
    
  
                                 
      
            


                @if($skill->active->first())
                    <li>  
                        {{$skill->skill}}
                                                    
                        @if (($skill->children->count())!==0)
                            <ul id="ul-parent-skill-{{$skill->id}}">
                                @each('partials.partial_skill_iterator', $skill->children ,'skill')
                            </ul>
                        @endif
                    </li>

                @else
                        <strong>Skipped *** child exclusion {{$skill->skill}} - {{$skill->id}}  ***</strong>
                    
                @endif
            
      
  
</div>
