@extends('layout')

@section('title')
    Bonus cards list
@stop

@section('content')

    @foreach($errors->all() as $error)
        <div class="alert alert-danger" role="alert">{!! $error !!}</div>
    @endforeach

    {!! Form::model($card, ['route' => 'bonus_cards.store']) !!}
    <div class="form-group col-md-6">
        {!! Form::label('series', 'Series') !!}
        {!! Form::text('series', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-md-6">
        {!! Form::label('expiration', 'Expiration period') !!}
        {!! Form::select('expiration', [1 => '1 month', 6 => '6 month', 12 => 'one year'], null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-md-6">
        {!! Form::label('number', 'Number') !!}
        {!! Form::text('number', null, ['class' => 'form-control']) !!}
    </div>
    <div class="col-md-12">
        {!! Form::submit('Submit', ['class' => 'btn btn-default']) !!}
    </div>
    {!! Form::close() !!}

@stop
