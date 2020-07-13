@include('blade-components::components.inputs.includes.inlinable-top')
@include('blade-components::components.inputs.includes.label')

<div class="custom-file">
    <input
        class="custom-file-input"
        id="bc-{{ $name }}"
        name="{{ $name }}"
        type="file"
        {{ $outputRequired() }}
        {{ $attributes }}
    >
    <label class="custom-file-label" for="{{ $name }}" id="bc-file-{{ $name }}-label">
        {{ __('blade-components::components.choose_file') }}
    </label>
</div>

@include('blade-components::components.inputs.includes.comment')
@include('blade-components::components.inputs.includes.error')

@if($value)
    <img
        src="{{ $value }}"
        class="mb-3 mt-3 img-thumbnail"
        style="max-height: 300px; max-width: 500px;"
    >
@endif

@include('blade-components::components.inputs.includes.inlinable-bottom')

@push('scripts')
    <script>
        document.getElementById("bc-{{ $name }}").onchange = function() {
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

            document.getElementById("bc-file-{{ $name }}-label").innerHTML = fileName;
        };
    </script>
@endpush
