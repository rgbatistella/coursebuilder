<!-- id Field -->
<div>
    {!! Form::hidden('id', null, ['class' => 'form-control']) !!}
</div>

<!-- course_id Field -->
<div>
    {!! Form::hidden('course_id', null, ['class' => 'form-control']) !!}
</div>

@if ( empty($chapter->id) )
    {!! Form::hidden('order', 0, ['class' => 'form-control']) !!}
@endif
<!-- order Field
<div class="form-group col-md-6">
    {!! Form::label('order', 'Order:') !!}
    {!! Form::text('order', null, ['class' => 'form-control']) !!}
</div>-->

<!-- title Field -->
<div class="form-group col-md-6">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-md-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('course',[$course->id]) !!}" class="btn btn-default">Cancel</a>
</div>
