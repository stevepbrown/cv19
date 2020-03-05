@php
// First-time initialisation of header level
if(is_null($level)){
$level = $initialHeaderLevel;
}
else{
$level = $level+1;
}
@endphp
<div>
    <ul id="ul-skill-parent-{{$skills->first->skill_parent_id}}">
        @foreach ($skills->where('isActive','true') as $skill)
        @if(($level == ($maxLevel -2) || $level == ($maxLevel -3)) && ($skill->children->count() > 0))
        <div id="div-div-skill-{{$skill->id}}-expand-invoke">
            <li id="li-skill-{{$skill->id}}">
                <h{{$level}} id="h{{$level}}-skill-{{$skill->id}}">{{$skill->skill}}
                    <a class="badge-light" data-toggle="collapse" href="#div-div-skill-{{$skill->id}}-collapse-target"
                        role="button" aria-expanded="false"
                        aria-controls="div-div-skill-{{$skill->id}}-collapse-target"><i
                            class="fas fa-caret-square-down fa-sm"></i></a>
                    @isset($skill->icon_class)
                    <i class="fas fa-{{$skill->icon_class}} fa-sm fa-fw"
                        title="It has been some time since I used this skill" data-toggle="tooltip"
                        data-placement="right"></i>
                    @endisset
                    <div id="div-div-skill-{{$skill->id}}-collapse-target" class="collapse">
                        @include('partials.partial_skill_iterator',[$level,($skills = $skill->children)])
                    </div>
            </li>
        </div>
        @else
        <li id="li-skill-{{$skill->id}}">
            <h{{$level}} id="h{{$level}}-skill-{{$skill->id}}">{{$skill->skill}}
                @isset($skill->icon_class)
                <i class="fas fa-{{$skill->icon_class}} fa-sm fa-fw"
                    title="It has been some time since I used this skill" data-toggle="tooltip"
                    data-placement="right"></i>
                @endisset
            </h{{$level}}>
            @if ($skill->children->count() > 0)
            @include('partials.partial_skill_iterator',[$level,($skills = $skill->children)])
            @endif
            @endif
        </li>
        @endforeach
    </ul>
</div>