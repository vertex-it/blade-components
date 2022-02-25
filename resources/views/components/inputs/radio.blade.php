<div class="form-group">
    @include('blade-components::components.inputs.includes.label')

    @foreach($getPreparedOptions() as $key => $label)
        <div class="mb-1">
            <label>
                <input
                    name="{{ $name }}"
                    type="radio"
                    value="{{ $key }}"
                    {{ $checkIfActive($key, ' checked ') }}
                    {{ $outputRequired() }}
                    {{ $attributes }}
                >
                <span class="ml-1 text-gray-800">{{ $label }}</span>
            </label>
        </div>
    @endforeach

    @include('blade-components::components.inputs.includes.comment')
    @include('blade-components::components.inputs.includes.error')
</div>
