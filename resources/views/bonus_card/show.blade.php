@extends('layout')

@section('title')
    Bonus cards list
@stop

@section('content')

    <p><b>Last usage:</b> @if($firstPurchase) {!! $firstPurchase->created_at !!} @endif</p>
    <p><b>Total amount:</b> {!! $card->purchases_amount !!}</p>
    <p>
        <b>Status:</b>
        {!! Form::select(
            'status',
            [0 => 'Inactive', 1 => 'Active'],
            $card->status,
            ['class' => 'js_status_toggle form-control', 'data-action' => route('bonus_cards.update_status', $card->id)]
        ) !!}
    </p>

    {!! Form::open(['route' => ['bonus_cards.destroy', $card->id], 'method' => 'delete']) !!}
    {!! Form::submit('Remove', ['class' => 'btn btn-danger']) !!}

    {!! Form::close() !!}

    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Amount</th>
            <th>Date</th>
        </tr>
        </thead>
        <tbody>
        @foreach($card->purchases as $purchase)
            <tr>
                <td>{!! $purchase->id !!}</td>
                <td>{!! $purchase->name !!}</td>
                <td>{!! $purchase->amount !!}</td>
                <td>{!! $purchase->created_at !!}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop
