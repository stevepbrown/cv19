<div id="div-print-skills" class="">
    <h2>Skills</h2>


  
    @foreach (($skills->where('parent_skill_id',null)) as $skill)
        @php        
            $level = null;
            $maxLevel = 6;
        @endphp
            {{-- Render main skills (top-level)  --}}
          <h{{$initialHeaderLevel}} id="h{{$initialHeaderLevel}}-skill-{{$skill->id}}">{{$skill->skill}}</h{{$initialHeaderLevel}}>
        
        {{-- Iterate through any children (recursive)   --}}
         @if ($skill->children)
            @include('partials.print.partial_print_skill_iterator',[$level,($skills = $skill->children)])
        @endif
    @endforeach

