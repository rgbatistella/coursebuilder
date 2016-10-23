@extends('layouts.dashboard')
@section('page_heading','Create new chapter')
@section('section')
    <div class="row">
        {!! Form::open(['route' => ['chapter.store',$course->id]]) !!}

        @include('chapter.fields')

        {!! Form::close() !!}
    </div>

@stop

