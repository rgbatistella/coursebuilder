@extends('layouts.dashboard')
@section('page_heading')
    <h1>Asset List <a href="{!! route('myassets.create') !!}" class="btn btn-primary btn-circle"><i class="fa fa-plus"></i></a></h1>

@endsection
@section('section')

            <!-- /.row -->
            <div class="col-sm-12">
            <div class="row">
                @foreach ($assets as $asset)
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-md-offset-9 text-center">
                                    <a href="{{route('myassets.destroy', [$asset->id])}}" onclick="return confirm('Are you sure you want to delete?')"><i class="fa fa-eraser text-info ">  </i></a>
                                    <a href="{{route('myassets.edit', [$asset->id])}}"><i class="fa fa-edit text-info">  </i></a>
                                </div>
                                <div class="col-xs-9 ">
                                    <div>{{$asset->name}}</div>
                                </div>
                            </div>
                        </div>

                            <div class="panel-body">
                                <a href="{{asset('uploads/'.$asset->ClientOriginalName)}}">{{$asset->ClientOriginalName}}</a>
                                <div>Size: {{$asset->Size}}</div>
                                <div>{{$asset->MimeType}}</div>
                            </div>
                        <div class="panel-footer">
                            @if ( explode('/',$asset->MimeType)[0] == 'image')
                            <div>
                                <img src="{{asset('uploads/'.$asset->ClientOriginalName)}}" width="80" height="80">
                            </div>
                            @elseif ( explode('/',$asset->MimeType)[0] == 'video')
                                <video width="80" height="80" controls>
                                    <source src="{{asset('uploads/'.$asset->ClientOriginalName)}}" type="{{$asset->MimeType}}">
                                    your browser does not support HTML5 videos!
                                </video>
                            @else
                                <iframe src="{{asset('uploads/'.$asset->ClientOriginalName)}}" width="80" height="80"> </iframe>
                            @endif
                        </div>

                    </div>
                </div>
                @endforeach

@stop