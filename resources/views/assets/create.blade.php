@extends('layouts.dashboard')
@section('page_heading','Create new asset')
@section('section')
    <div class="row">
        {!! Form::open(['route' => 'myassets.store', 'files'=>'true']) !!}

        @include('assets.fields')

        {!! Form::close() !!}
    </div>
@stop

