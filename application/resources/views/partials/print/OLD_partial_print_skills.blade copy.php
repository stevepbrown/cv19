<div id="div-print-skills">
    <h2>Skills</h2>
    @php
        $rootSkills = $skills->where('parent_skill_id',null)
    @endphp
    
    @foreach ($rootSkills as $rootSkill)
    @php
        //  Reinitiliase the heading depth
        
        $depth = $initialHeaderLevel;
    @endphp

    
<h{{$depth}} id="h{{$depth}}-skill-{{$rootSkill->id}}">{{$rootSkill->skill}}</h{{$depth}}>
        @include('partials.partial_skill_iterator',[$childSkills = $rootSkill->children])
    @endforeach 
</div>