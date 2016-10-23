<!-- id Field -->
<div>
    {!! Form::hidden('id', null, ['class' => 'form-control']) !!}
</div>

<div>
    {!! Form::file('filecontent') !!}
</div>

<!-- nome Field -->
<div class="form-group col-md-12">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-md-12">
    {!! Form::label('ClientOriginalName', 'File Name:') !!}
    {!! Form::text('ClientOriginalName', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-md-12">
    {!! Form::label('ClientOriginalExtension', 'File Extension:') !!}
    {!! Form::text('ClientOriginalExtension', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-md-6">
    {!! Form::label('Size', 'File Size:') !!}
    {!! Form::text('Size', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-md-6">
    {!! Form::label('MimeType', 'File Mime Type:') !!}
    {!! Form::text('MimeType', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-md-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('myassets.index') !!}" class="btn btn-default">Cancel</a>
</div>
