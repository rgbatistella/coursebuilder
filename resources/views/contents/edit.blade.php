@extends('layouts.dashboard')
@section('page_heading','Edit content')
@section('section')
    <div class="row">
        {!! Form::model($content, ['route' => ['content.update', $content->id], 'method' => 'patch']) !!}

        @include('contents.fields')

        {!! Form::close() !!}
    </div>
        <script type="text/javascript">
            CKEDITOR.replace("content_html");
        </script>
        @stop

