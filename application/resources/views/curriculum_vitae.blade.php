@extends('layouts.layout_master')
@section('main')
<div>

<h2>The view was rendered</h2>

{{$pageProps['title']}}

    {{-- <ul>
    @foreach ($skills as $skill)

        <li>{{$skill}}</li>
        
    @endforeach
    </ul> --}}

</div>
@endsection