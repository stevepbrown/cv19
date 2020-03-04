@php
 
    
    // First-time initialisation of header level
    if(is_null($level)){

      $level = $initialHeaderLevel;
  
    }
    
    
@endphp
<div>

@php
    $level = $level+1;
@endphp

    <ul id="ul-skill-parent-{{$skills->first->skill_parent_id}}">
        @foreach ($skills->where('isActive','true') as $skill)

      
        @switch($level)

        @case(($level >= $maxLevel))

        
        <li>{{$skill->skill}}</li> 

    

        @break
      
        @case($maxLevel-1)
        <li id="li-skill-{{$skill->id}}">
            <div id="div-skill-{{$skill->id}}-accordion" class="container">
                
                <div id="div-div-skill-{{$skill->id}}-collapse-invoke">
                <h{{$level}} id="h{{$level}}-skill-{{$skill->id}}">{{$skill->skill}}
                    <a class="badge-light" data-toggle="collapse" href="#div-div-skill-{{$skill->id}}-collapse-target" role="button" aria-expanded="false" aria-controls="collapseExample">
                        Link with href
                      </a>
                    @isset($skill->icon_class)
                    <i class="fas fa-{{$skill->icon_class}} fa-sm fa-fw"
                        title="It has been some time since I used this skill" data-toggle="tooltip"
                        data-placement="right"></i>
                    @endisset
                    @unless(($skill->children->count() == 0))
                        <i class="fas fa-caret-square-down"></i>
                    @endunless
                </h{{$level}}>
                </div>
                
                @unless ($skill->children->count() == 0)
                     <div id="div-div-skill-{{$skill->id}}-collapse-target">   
                        @include('partials.partial_skill_iterator',[$level,($skills = $skill->children)])
                    </div>   
                @endif
            </div>   

            @break

        @case($maxLevel-2)    

        
            <h{{$level}} id="h{{$level}}-skill-{{$skill->id}}">{{$skill->skill}}
                @isset($skill->icon_class)
                <i class="fas fa-{{$skill->icon_class}} fa-sm fa-fw"
                    title="It has been some time since I used this skill" data-toggle="tooltip"
                    data-placement="right"></i>
                @endisset               
                </h{{$level}}>
                
                
                @unless($skill->children->count() == 0)
                    @include('partials.partial_skill_iterator',[$level,($skills = $skill->children)])
                @endunless
        
        @break    
            @default

        <li id="li-skill-{{$skill->id}}">

            <h{{$level}} id="h{{$level}}-skill-{{$skill->id}}">{{$skill->skill}}
                @isset($skill->icon_class)
                <i class="fas fa-{{$skill->icon_class}} fa-sm fa-fw"
                    title="It has been some time since I used this skill" data-toggle="tooltip"
                    data-placement="right"></i>
                @endisset
            </h{{$level}}>
        </li>
        @if ($skill->children->count() > 0)
            @include('partials.partial_skill_iterator',[$level,($skills = $skill->children)])
        @endif
        @endswitch

        @endforeach
    </ul>
</div>