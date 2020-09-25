@include('blade-components::components.inputs.includes.inlinable-top', ['columns' => '2'])
@include('blade-components::components.inputs.includes.label')

<input
    class="form-control text-center"
    id="{{ $getId }}"
    name="{{ $name }}"
    placeholder="{{ $placeholder ?? '00:00' }}"
    type="text"
    value="{{ old($name, $value) }}"
    {{ $outputRequired() }}
    {{ $attributes }}
>

@include('blade-components::components.inputs.includes.comment')
@include('blade-components::components.inputs.includes.error')
@include('blade-components::components.inputs.includes.inlinable-bottom')

@push('scripts')
    <script>
        $('#{{ $getId }}').timepicker({
            "appendTo": $('#{{ $getId }}').parent(),
            timeFormat: "H:i",
            listWidth: 1,
            step: '{{ $attributes["data-step"] ?? "30" }}',
            minTime: '{{ $attributes["data-min-time"] ?? "05:00" }}'
        });
    </script>
@endpush
