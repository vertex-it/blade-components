@include('blade-components::components.inputs.includes.inlinable-top', ['columns' => '2'])
@include('blade-components::components.inputs.includes.label')

<div class="relative">
    <div class="absolute left-0 top-1/2 translate-y-[-50%] p-3 rounded-bl rounded-tl">
        <x-heroicon-o-clock height="16" width="16" class="text-gray-400" />
    </div>
    <input
        class="form-input bc-time pl-9"
        name="{{ $name }}"
        placeholder="{{ $placeholder ?? '00:00' }}"
        type="text"
        value="{{ old($name, $value) }}"
        id="{{ $getId }}"
        {{ $outputRequired() }}
        {{ $attributes }}
    >
</div>

@include('blade-components::components.inputs.includes.comment')
@include('blade-components::components.inputs.includes.error')
@include('blade-components::components.inputs.includes.inlinable-bottom')

@once
    @push('master-scripts')
        <script>
            $(document).ready(function () {
                initTimePicker();
            });

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
