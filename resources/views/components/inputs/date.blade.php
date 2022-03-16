@include('blade-components::components.inputs.includes.inlinable-top')
@include('blade-components::components.inputs.includes.label')

<div class="relative">
    <div class="absolute left-0 top-1/2 translate-y-[-50%] p-3 rounded-bl rounded-tl">
        <x-heroicon-o-calendar height="16" width="16" class="text-gray-400" />
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
