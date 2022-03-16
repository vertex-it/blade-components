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
                <span class="ml-2 mb-0 form-label">{{ $label }}</span>
            </label>
        </div>
    @endforeach

    @include('blade-components::components.inputs.includes.comment')
    @include('blade-components::components.inputs.includes.error')
</div>
