<div class="form-group">
    <div @error($name) class="{{ config('blade_components.classes.radio.error') }}" @enderror>
        @foreach($labels as $key => $label)
            <div class="{{ config('blade_components.classes.radio.div') }}">
                <label class="{{ config('blade_components.classes.radio.label') }}">
                    <input
                        class="{{ config('blade_components.classes.radio.input') }}"
                        name="{{ $name }}"
                        type="radio"
                        value="{{ $values[$key] ?? $label }}"
                        @if($selected($values[$key] ?? $label)) checked @endif
                    >
                    <span>{{ $label }}</span>
                </label>
            </div>
        @endforeach
    </div>
    @error($name)
    <p class="{{ config('blade_components.classes.error_text') }}">{{ $message }}</p>
    @enderror
</div>
