@include('blade-components::components.inputs.includes.inlinable-top')
@include('blade-components::components.inputs.includes.label')

<div class="form-input">
    <label
        for="{{ $getId }}"
        class="block cursor-pointer"
    >
        <span class="text-gray-400 flex items-center">
            <svg width="16" height="16" class="mr-2" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM6.293 6.707a1 1 0 010-1.414l3-3a1 1 0 011.414 0l3 3a1 1 0 01-1.414 1.414L11 5.414V13a1 1 0 11-2 0V5.414L7.707 6.707a1 1 0 01-1.414 0z" clip-rule="evenodd" />
            </svg>
            <span id="{{ $getId }}_filename">{{ __('blade-components::components.choose_file') }}</span>
        </span>
        <input
            class="sr-only"
            id="{{ $getId }}"
            name="{{ $name }}"
            type="file"
            {{ $outputRequired() }}
            {{ $attributes }}
        >
    </label>
</div>

@include('blade-components::components.inputs.includes.comment')
@include('blade-components::components.inputs.includes.error')

@if ($value)
    <img
        src="{{ $value }}"
        class="mb-3 mt-3 img-thumbnail"
        style="max-height: 300px; max-width: 500px;"
    >
@endif

@include('blade-components::components.inputs.includes.inlinable-bottom')

@push('scripts')
    <script>
        document.getElementById("{{ $getId }}").onchange = function() {
            var fullName = this.value.split('\\').pop().split('.');
            var fileName = fullName[0];
            var extension = fullName[1];

            if (fileName.length > 0) {
                if (fileName.length > 25) {
                    fileName = fileName.substring(0, 25) + '...' + extension;
                } else {
                    fileName = fileName + '.' + extension;
                }
            } else {
                fileName = "{{ __('blade-components::components.choose_file') }}";
            }

            document.getElementById("{{ $getId }}_filename").innerHTML = fileName;
            document.getElementById("{{ $getId }}_filename").style.color='#1F2937';
        };
    </script>
@endpush
