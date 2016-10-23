@extends('layouts.dashboard')
@section('page_heading','Edit course')
@section('section')
    <div class="row">
        {!! Form::model($course, ['route' => ['course.update', $course->id], 'method' => 'patch']) !!}

        @include('course.fields')

        {!! Form::close() !!}
    </div>
        <script   src="http://code.jquery.com/jquery-3.1.1.min.js"   integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="   crossorigin="anonymous"></script>
        <script type="text/javascript" src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>

        <script type="text/javascript">
            CKEDITOR.replace("description");
        </script>
        <script type="text/javascript">
            $('#price').inputmask("numeric", {
                radixPoint: ".",
                groupSeparator: ",",
                digits: 2,
                prefix: '$ ', //Space after $, this will not truncate the first character.
                autoGroup: true,
                rightAlign: false,
                oncleared: function () { self.Value(''); }
            });

            $('#duration').inputmask("numeric", {
                radixPoint: ".",
                groupSeparator: ",",
                digits: 1,
                autoGroup: true,
                rightAlign: false,
                oncleared: function () { self.Value(''); }
            });
        </script>
        @stop

