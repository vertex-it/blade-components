@include('blade-components::components.inputs.includes.inlinable-top')
@include('blade-components::components.inputs.includes.label')

<div class="relative">
    <div class="absolute left-0 top-1/2 translate-y-[-50%] p-3 rounded-bl rounded-tl">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
        </svg>
    </div>
    <input
        class="form-input pl-9"
        id="{{ $getId }}"
        name="{{ $name }}"
        placeholder="{{ $getPlaceholder() }}"
        type="text"
        value="{{ old($name, $value) }}"
        {{ $outputRequired() }}
        {{ $attributes }}
    >
</div>

@include('blade-components::components.inputs.includes.comment')
@include('blade-components::components.inputs.includes.error')
@include('blade-components::components.inputs.includes.inlinable-bottom')

@push('master-scripts')
    <script>
        $(document).ready(function () {
            flatpickr('#{{ $getId }}', {
                altInput: true,
                weekNumbers: true,
                allowInput: true,
                @if ($time)
                    enableTime: true,
                    dateFormat: "Y-m-d H:i",
                    altFormat: "j. F Y - H:i",
                    time_24hr: true,
                @else
                    dateFormat: "Y-m-d",
                    altFormat: "j. F Y",
                @endif
            })
        });
    </script>
@endpush
