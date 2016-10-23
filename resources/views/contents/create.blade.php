@extends('layouts.dashboard')
@section('page_heading','Create new content')
@section('section')
    <div class="row">
        {!! Form::open(['route' => ['content.store', $chapter->id]]) !!}

        @include('contents.fields')

        {!! Form::close() !!}
    </div>

    <script type="text/javascript">
        CKEDITOR.replace("description");
    </script>
@stop

