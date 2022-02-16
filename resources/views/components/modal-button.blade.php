@if (isset($confirmButtonClass))
    <button
        class="{{ $buttonClass . ' ' . $confirmButtonClass }} modal-btn"
        data-title="{{ $title }}"
        data-content="{{ $content }}"
        data-target="{{ $id }}"
    >
@else
    <button
        class="{{ $buttonClass . ' ' . 'btn-open-modal' }} modal-btn"
        data-title="{{ $title }}"
        data-content="{{ $content }}"
    >
@endif
    @if (isset($slot))
        {!! $slot !!}
    @else
        <x-heroicon-o-document-text class="float-left" width="20px" height="20px" />
    @endif
</button>
