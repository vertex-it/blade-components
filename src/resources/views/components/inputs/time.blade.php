@include('blade-components::components.inputs.includes.inlinable-top', ['columns' => '2'])
@include('blade-components::components.inputs.includes.label')

<input
    class="form-control text-center bc-time"
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

@once
    @push('scripts')
        <script>
            initTimePicker();

            function initTimePicker(scope = '') {
                $(scope + ' .bc-time').timepicker({
                    "appendTo": $(scope + ' .bc-time').parent(),
                    timeFormat: "H:i",
                    listWidth: 1,
                    step: '{{ $attributes["data-step"] ?? "30" }}',
                    minTime: '{{ $attributes["data-min-time"] ?? "05:00" }}'
                });
            }
        </script>
    @endpush
@endonce
