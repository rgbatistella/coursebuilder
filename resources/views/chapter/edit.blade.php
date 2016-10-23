@extends('layouts.dashboard')
@section('page_heading','Edit chapter')
@section('section')
    <div class="row">
        {!! Form::model($chapter, ['route' => ['chapter.update', $chapter->id], 'method' => 'patch']) !!}

        @include('chapter.fields')

        {!! Form::close() !!}
    </div>
@stop

