@extends('layouts.dashboard')
@section('page_heading',$course->name)
@section('section')
    <script src="//cdnjs.cloudflare.com/ajax/libs/Sortable/1.4.2/Sortable.min.js"></script>
    <div class="col-lg-12 col-md-12">
        @if($course->published)
        <div class="panel-group panel-primary">
        @else
        <div class="panel-group panel-danger">
        @endif
            <div class="panel-heading">
                <div class="row">
                    <div class="col-md-offset-11 text-center ">
                        <a href="{{route('course.destroy', [$course->id])}}" onclick="return confirm('Are you sure you want to delete?')"><i class="fa fa-eraser text-info ">  </i></a>
                        <a href="{{route('course.edit', [$course->id])}}"><i class="fa fa-edit text-info">  </i></a>
                    </div>
                    <div class="col-xs-9">
                        <div class="huge">{{$course->subtitle}}</div>
                        <div>{!! $course->description !!}</div>
                        <div>Price: {{$course->price}}</div>
                        <div>Duration: {{$course->duration}}</div>
                        <div>Published: {{$course->published}}</div>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                @if($course->published)
                <div class="panel-group panel-primary col-lg-12 col-md-12">
                @else
                <div class="panel-group panel-danger col-lg-12 col-md-12">
                @endif
                    <div class="panel-heading">
                        Chapters <a href="{{route('chapter.create',[$course->id])}}"><i class="fa fa-plus text-info"></i></a>
                    </div>
                    <div class="panel-body">
                        <div class="row list-group list-unstyled" id="chapterList">
                            @foreach ($course->chapters->sortBy('order') as $chapter)
                            <div class="col-sm-3 list-group-item list-unstyled" id="{{$chapter->id}}">
                                @if($course->published)
                                <div class="panel panel-primary ">
                                @else
                                <div class="panel panel-danger ">
                                @endif
                                    <div class="panel-heading">
                                        <div class="col-md-offset-8 text-center">
                                            <i class="fa fa-arrows text-info"></i>
                                            <a href="{{route('chapter.destroy', [$chapter->id])}}" onclick="return confirm('Are you sure you want to delete?')"><i class="fa fa-eraser text-info"></i></a>
                                        </div>
                                        {{$chapter->title}}
                                    </div>
                                    <a href="{!! route('chapter', [$chapter->id]) !!}">
                                    <div class="panel-footer">
                                        content...
                                    </div></a>
                                </div>
                            </div>
                            <!--/div-->
                            @endforeach
                            <!--/div-->
                        </div>
                   </div>
                </div>
            </div>
        </div>
    </div>

            <script>
                // Simple list
                Sortable.create(chapterList, { handle: '.fa-arrows',
                    animation: 150,
                    onUpdate: function (evt/**Event*/){
                        document.location.href="/chapter/reorder/"+evt.item.id+"/"+evt.oldIndex+"/"+evt.newIndex;
                        //alert(item.id);
                    }});
            </script>

@stop