<button
    class="btn {{ $buttonClass ?? 'btn-primary' }}"
    data-toggle="modal"
    data-content="{!! $content !!}"
    data-target="#{{ $id }}"
>
    {!! $slot !!}
</button>