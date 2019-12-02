<div id="div-skill-iterator">


{{-- @php

  dump(getType($children));
    
@endphp --}}


@foreach ($children->allChildren() as $child)
    
    {{dump($child)}}

@endforeach






        {{-- @if (count($project['children']) > 0)
        <ul>
        @foreach($project['children'] as $project)
            @include('partials.project', $project)
        @endforeach
        </ul>
    @endif --}}


  
    
</div>
