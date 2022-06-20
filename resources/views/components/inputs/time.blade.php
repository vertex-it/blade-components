@include('blade-components::components.inputs.includes.inlinable-top', ['columns' => '2'])
@include('blade-components::components.inputs.includes.label')

<div class="relative">
    <div class="absolute left-0 top-1/2 translate-y-[-50%] p-3 rounded-bl rounded-tl">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
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
