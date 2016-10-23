<!-- id Field -->
<div>
    {!! Form::hidden('id', null, ['class' => 'form-control']) !!}
</div>

<!-- nome Field -->
<div class="form-group col-md-12">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-md-12">
    {!! Form::label('subtitle', 'Subtitle:') !!}
    {!! Form::text('subtitle', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-md-12">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control ckeditor']) !!}
</div>
<div class="form-group col-md-6">
    {!! Form::label('price', 'Price:') !!}
    {!! Form::text('price', null, ['class' => 'form-control data-mask="9999999.99"']) !!}
</div>
<div class="form-group col-md-6">
    {!! Form::label('duration', 'Duration:') !!}
    {!! Form::text('duration', null, ['class' => 'form-control data-mask="99999.9"']) !!}
</div>
<div class="form-group col-md-6">
    {!! Form::label('published', 'Published:') !!}
    {!! Form::hidden('published', false, null, ['class' => 'field']) !!}
    {!! Form::checkbox('published', null, null, ['class' => 'field']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-md-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('course.index') !!}" class="btn btn-default">Cancel</a>
</div>
