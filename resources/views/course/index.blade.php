@extends('layouts.dashboard')
@section('page_heading')
    <h1>Course List <a href="{!! route('course.create') !!}" class="btn btn-primary btn-circle"><i class="fa fa-plus"></i></a></h1>

@endsection
@section('section')

            <!-- /.row -->
            <div class="col-sm-12">
            <div class="row">
                @foreach ($courses as $course)
                <div class="col-lg-3 col-md-6">
                    @if($course->published)
                    <div class="panel panel-primary">
                    @else
                    <div class="panel panel-danger">
                    @endif
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-md-offset-9 text-center">
                                    <a href="{{route('course.destroy', [$course->id])}}" onclick="return confirm('Are you sure you want to delete?')"><i class="fa fa-eraser text-info ">  </i></a>
                                    <a href="{{route('course.edit', [$course->id])}}"><i class="fa fa-edit text-info">  </i></a>
                                </div>
                                <div class="col-xs-9 ">
                                    <div>{{$course->name}}</div>
                                </div>
                            </div>
                        </div>
                        <a href="{!! route('course', [$course->id]) !!}">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                @endforeach

@stop