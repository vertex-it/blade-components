<div class="form-group @error($name) has-error has-danger @enderror">
    @include('blade-components::components.inputs.includes.label')

    @foreach($getPreparedOptions as $key => $label)
        <div class="mb-1">
            <label class="@if(! $loop->last) mb-2 @endif">
                <input
                    name="{{ $name }}[]"
                    type="checkbox"
                    value="{{ $key }}"
                    {{ $checkIfActive($key, ' checked ') }}
                    {{ $attributes }}
                >
                <span class="ml-1 text-xs md:text-sm text-gray-800">
                    {{ $label }}
                </span>
            </label>
        </div>
    @endforeach

    @include('blade-components::components.inputs.includes.comment')
    @include('blade-components::components.inputs.includes.error')
</div>
