@extends('layout')

@section('title')
    Bonus cards list
@stop

@section('content')

    <div class="col-md-12">
        <a href="{!! route('bonus_cards.create') !!}" class="btn btn-default pull-right">Generate new</a>
    </div>

    @include('bonus_card._search')

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Series</th>
                <th>Number</th>
                <th>Issue date</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cards as $card)
                <tr>
                    <td><a href="{!! route('bonus_cards.show', [$card->id]) !!}">{!! $card->id !!}</a></td>
                    <td>{!! $card->series !!}</td>
                    <td>{!! $card->number !!}</td>
                    <td>{!! $card->created_at !!}</td>
                    <td>
                        @if($card->isExpired())
                            Expired
                        @elseif($card->active)
                            Active
                        @else
                            Inactive
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {!! $cards->render() !!}

@stop
