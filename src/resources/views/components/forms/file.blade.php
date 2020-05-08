<div class="form-group row">
    <div class="col-sm-7 col-md-6 col-lg-4">
        <label
            class="{{ config('blade_components.classes.label.text') }}"
            for="{{ $name }}"
        >{{ $name }} @if($required)<span class="text-danger">*</span>@endif</label>
        <div class="{{ config('blade_components.classes.file.div') }}">
            <input
                type="file"
                class="{{ config('blade_components.classes.file.input') }} @error($name) {{ config('blade_components.classes.file.input_error') }} @enderror"
                id="{{ $name }}"
                name="{{ $name }}"
                @if($required) required @endif
                {{ $attributes }}
            >
            <label class="{{ config('blade_components.classes.file.custom_label') }}" for="{{ $name }}">Choose file</label>
        </div>
        @error($name)
            <p class="{{ config('blade_components.classes.error_text') }}">{{ $message }}</p>
        @enderror
    </div>
</div>
