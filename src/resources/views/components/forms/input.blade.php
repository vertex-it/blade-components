<div class="form-group row">
    <div class="col-sm-12 col-md-8 col-xl-6">
        <label
            class="{{ config('blade_components.classes.label.text') }} @error($name) {{ config('blade_components.classes.label.error') }} @enderror"
            for="{{ $name }}"
        >{{ ucfirst($name) }} @if($required)<span class="text-danger">*</span>@endif</label>
        <input
            class="{{ config('blade_components.classes.input.input') }} @error($name) {{ config('blade_components.classes.input.error') }} @enderror"
            type="{{ $type }}"
            id="{{ $name }}"
            name="{{ $name }}"
            placeholder="{{ $placeholder ?? ucfirst($name) }}"
            value="{{ old($name, $value) }}"
            @if($required) required @endif
            {{ $attributes }}
        >
        @error($name)
            <p class="{{ config('blade_components.classes.error_text') }}">{{ $message }}</p>
        @enderror
    </div>
</div>
