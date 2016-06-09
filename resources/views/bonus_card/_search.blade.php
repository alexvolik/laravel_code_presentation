{!! Form::open(['method' => 'GET']) !!}
<div class="form-group col-md-6">
    {!! Form::label('series', 'Series') !!}
    {!! Form::text('series', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group col-md-6">
    {!! Form::label('number', 'Number') !!}
    {!! Form::text('number', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group col-md-6">
    {!! Form::label('created_at', 'Issue date') !!}
    {!! Form::text('created_at', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group col-md-6">
    {!! Form::label('status', 'Status') !!}
    {!! Form::select('status', ['' => 'All', 0 => 'No', 1 => 'Yes'], null, ['class' => 'form-control']) !!}
</div>
<div class="col-md-12">
    {!! Form::submit('Submit', ['class' => 'btn btn-default']) !!}
</div>
{!! Form::close() !!}