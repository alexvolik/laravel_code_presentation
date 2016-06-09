<ol class="breadcrumb">
    @foreach($items as $item)
        <li class="@if($item->isActive()) active @endif">
            @if($item->getLink())
                <a href="{{ $item->getLink() }}">{{ $item->getTitle() }}</a>
            @else
                {{ $item->getTitle() }}
            @endif
        </li>
    @endforeach
</ol>