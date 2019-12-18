
<div id="div-print-skills">
    <h2>Skills</h2>

    @foreach ($skills as $skill)
        <h3 id="h3-skill-{{$skill->id}}">{{$skill->skill}}</h3>
        <ul id="ul-skill-{{$skill->id}}">
            @each('partials.partial_skill_iterator', $skill->children ,'skill')
        </ul>       
    @endforeach

</div>