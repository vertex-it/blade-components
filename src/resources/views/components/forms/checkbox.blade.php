<div class="form-group">
    <div @error($name) class="{{ config('blade_components.classes.checkbox.error') }}" @enderror>
        @foreach($labels as $key => $label)
            <div class="{{ config('blade_components.classes.checkbox.div') }}">
                <label class="{{ config('blade_components.classes.checkbox.label') }} @if(! $loop->last) mb-2 @endif">
                    <input
                        class="{{ config('blade_components.classes.checkbox.input') }}"
                        name="{{ $name }}[]"
                        type="checkbox"
                        value="{{ $values[$key] ?? $label }}"
                        @if($selected($values[$key] ?? $label)) checked @endif
                    >
                    <span>{{ $label }}</span>
                </label>
            </div>
        @endforeach
    </div>
    @error($name)
        <p class="{{ config('blade_components.classes.error_text') }}"">{{ $message }}</p>
    @enderror
</div>

