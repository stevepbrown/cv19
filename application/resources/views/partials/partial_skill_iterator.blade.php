<div id="div-skill-iterator">
@if($skill->active->first())
    <li id="li-skill-{{$skill->id}}">  
        {{$skill->skill}}
        @if (($skill->children->count())!==0)
            <ul id="ul-parent-skill-{{$skill->id}}">
                @each('partials.partial_skill_iterator', $skill->children ,'skill')
            </ul>
        @endif
    </li>
@endif
</div>
