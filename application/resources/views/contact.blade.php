@extends('layouts.layout_master')


@section('main')

    {!! Form::open(['url' => '/contact']) !!}
    Laravel form here!
    {!! Form::close() !!}
@endsection
