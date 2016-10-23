@extends('layouts.dashboard')
@section('page_heading')
    <a href="{{route('course',[$chapter->course->id])}}"><i class="fa fa-backward"></i></a>
    {{$chapter->title}}
@endsection
@section('section')
    <script src="//cdnjs.cloudflare.com/ajax/libs/Sortable/1.4.2/Sortable.min.js"></script>
    <div class="col-lg-12 col-md-12">
            <div class="panel">
                <div class="panel-group panel-primary col-lg-12 col-md-12">
                    <div class="panel-heading">
                        Contents <a href="{{route('contents.create',[$chapter->id])}}"><i class="fa fa-plus text-info"></i></a>
                    </div>
                    <div class="panel-body">
                        <div class="row list-group" id="contentList">
                            @foreach ($chapter->contents->sortBy('order') as $content)
                            <div class="col-sm-3 list-group-item" id="{{$content->id}}">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <div class="col-md-offset-8 text-center">
                                            <i class="fa fa-arrows text-info"></i>
                                            <a href="{{route('content.destroy', [$content->id])}}" onclick="return confirm('Are you sure you want to delete?')"><i class="fa fa-eraser text-info"></i></a>
                                            <a href="{{route('content.edit', [$content->id])}}"><i class="fa fa-edit text-info"></i></a>
                                        </div>
                                        {{$content->title}}
                                    </div>
                                    <a href="{{route('content.select', [$content->id])}}">
                                    <div class="panel-footer">
                                        content...
                                    </div>
                                    </a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                   </div>
                </div>
                @if (!empty($selected_content->id))
                <div class="panel-group panel-primary col-lg-12 col-md-12">
                    <div class="panel-heading">
                        Content
                    </div>
                    <div class="panel-body panel-collapse">
                        <div class="row">
                                <div class="col-sm-12">
                                    <div class="panel panel-primary">
                                        <div class="panel-heading">
                                            {!! $selected_content->title !!}
                                        </div>
                                        @if ($selected_content->content_type == 'ASSET')
                                            @if ( explode('/',$selected_content->asset->MimeType)[0] == 'image')
                                                 <img src="{{asset('uploads/'.$selected_content->asset->ClientOriginalName)}}" >
                                            @elseif ( explode('/',$selected_content->asset->MimeType)[0] == 'video')
                                                <video controls>
                                                    <source src="{{asset('uploads/'.$selected_content->asset->ClientOriginalName)}}" type="{{$selected_content->asset->MimeType}}">
                                                    your browser does not support HTML5 videos!
                                                </video>
                                            @else
                                                <iframe src="{{asset('uploads/'.$selected_content->asset->ClientOriginalName)}}"> </iframe>
                                            @endif

                                        @else
                                        <div class="panel-body">
                                            {!! $selected_content->content_html !!}
                                        </div>
                                        @endif
                                        <a href="{{route('content.select_next', [$selected_content->id])}}">
                                        <div class="panel-footler">
                                            Next content...
                                        </div>
                                        </a>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
    </div>
    <script>
        // Simple list
        Sortable.create(contentList, { handle: '.fa-arrows',
            animation: 150,
            onUpdate: function (evt/**Event*/){
                document.location.href="/content/reorder/"+evt.item.id+"/"+evt.oldIndex+"/"+evt.newIndex;
                //alert(item.id);
            }});
    </script>

@stop