@extends('layouts.dashboard')
@section('page_heading','Edit asset')
@section('section')
    <div class="row">
        {!! Form::model($asset, ['route' => ['myassets.update', $asset->id], 'method' => 'patch','files'=>'true']) !!}

        @include('assets.fields')

        {!! Form::close() !!}
    </div>
@stop

