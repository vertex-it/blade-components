<button
    class="btn {{ $buttonClass ?? 'btn-primary' }}"
    data-toggle="modal"
    data-content="{!! $content !!}"
    data-target="#{{ $id }}"
>
    @if (isset($slot))
        {!! $slot !!}
    @else
        <x-heroicon-o-document-text class="float-left" width="20px" height="20px" />
    @endif
</button>
