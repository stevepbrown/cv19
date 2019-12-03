<div id="div-skill-iterator">
    <li>
        {{$skill->skill}}
        @if (($skill->children->count())!==0)
            <ul id="ul-parent-skill-{{$skill->id}}">
                @each('partials.partial_skill_iterator', $skill->children ,'skill')
            </ul>
        @endif
    </li>
</div>
