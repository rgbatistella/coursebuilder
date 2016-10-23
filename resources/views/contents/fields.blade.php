<!-- id Field -->
<div>
    {!! Form::hidden('id', null, ['class' => 'form-control']) !!}
</div>

<!-- title Field -->
<div class="form-group col-md-6 col-md-offset-0">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<!-- order Field
    <div class="form-group col-md-6">
        {!! Form::label('order', 'Order:') !!}
        {!! Form::text('order', null, ['class' => 'form-control']) !!}
    </div>-->

@if ( !empty($content->chapter_id) )
<!-- chapter Id Field -->
<div class="form-group col-md-6">
    {!! Form::label('chapter_id', 'Chapter:') !!}
    {!! Form::select('chapter_id', array_pluck(App\Chapters::all()->where('course_id',$chapter->course->id), 'title', 'id'), null, ['placeholder' => '', 'class'=>'form-control']) !!}
</div>
@else
    {!! Form::hidden('order', 0, ['class' => 'form-control']) !!}
@endif

<div class="form-group col-md-6">
    {!! Form::label('content_type', 'Content type:') !!}
    {!! Form::select('content_type', ['ASSET' => 'Asset', 'HTML' => 'HTML'], null, ['class' => 'form-control']) !!}
</div>
<div class="form-group col-md-6">
    {!! Form::label('asset_id', 'Asset from library:') !!}
    {!! Form::select('asset_id', array_pluck(App\Assets::all(), 'name', 'id'), null, ['placeholder' => '', 'class'=>'form-control']) !!}
</div>
    <div class="form-group col-sm-12">
        {!! Form::label('content_html', 'HTML Content:') !!}
        {!! Form::textarea('content_html', null, ['class' => 'form-control ckeditor']) !!}
    </div>

<!-- Submit Field -->
<div class="form-group col-md-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('chapter',[$chapter->id]) !!}" class="btn btn-default">Cancel</a>
</div>
