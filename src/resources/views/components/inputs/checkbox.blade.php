<div class="form-group @error($name) has-error has-danger @enderror">
    @include('blade-components::components.inputs.includes.label')

    @foreach($getPreparedOptions as $key => $label)
        <div class="form-check">
            <label class="ckbox @if(! $loop->last) mb-2 @endif">
                <input
                    name="{{ $name }}[]"
                    type="checkbox"
                    value="{{ $key }}"
                    {{ $checkIfActive($key, ' checked ') }}
                    {{ $attributes }}
                >
                <span>
                    {{ $label }}
                </span>
            </label>
        </div>
    @endforeach

    @include('blade-components::components.inputs.includes.comment')
    @include('blade-components::components.inputs.includes.error')
</div>