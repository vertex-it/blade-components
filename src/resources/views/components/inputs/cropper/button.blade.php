@if(in_array($aspectRatioX, [0, $x]) && in_array($aspectRatioY, [0, $y]))
    <button
        class="
            btn
            btn-light
            cropper-ar
            @if($aspectRatioX === $x && $aspectRatioY === $y)
                font-weight-bold
            @endif
        "
        data-aspect-ratio-x="{{ $x }}"
        data-aspect-ratio-y="{{ $y }}"
    >
        @if($x !== 0 && $y !== 0)
            {{ $x }}/{{ $y }}
        @else
            {{ __('blade-components::components.cropper_button_free') }}
        @endif
    </button>
@endif