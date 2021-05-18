@include('blade-components::components.inputs.includes.inlinable-top')
@include('blade-components::components.inputs.includes.label')

<div class="input-group">
    <div class="input-group-prepend">
        <div class="input-group-text">
            <x-heroicon-o-calendar height="20px" width="20px" class="float-left mr-1" />
        </div>
    </div>
    <input
        class="form-control"
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

@push('scripts')
    <script>
        $(document).ready(function () {
            flatpickr('#{{ $getId }}', {
                altInput: true,
                weekNumbers: true,
                allowInput: true,
                @if($time)
                enableTime: true,
                dateFormat: "Y-m-d H:i",
                altFormat: "F j, Y - H:i",
                time_24hr: true,
                @else
                dateFormat: "Y-m-d",
                altFormat: "F j, Y",
                @endif
            });
        });
    </script>
@endpush
