<div class="form-group row">
    <div class="col-sm-12 col-md-8 col-xl-6">
        <label
            class="{{ config('blade_components.classes.label.text') }} @error($name) {{ config('blade_components.classes.label.error') }} @enderror"
            for="{{ $name }}"
        >{{ $name }} @if($required)<span class="text-danger">*</span>@endif</label>
        <select
            class="{{ $selectize ? 'selectize' : config('blade_components.classes.input.input') }}"
            name="{{ $name . $multiple ? '[]' : '' }}"
            id="{{ $name }}"
            @if($multiple) multiple @endif
            @if($required) required @endif
            {{ $attributes }}
        >
            <option selected disabled value="">{{ $placeholder ?? 'Select' }}</option>
            @foreach($options ?? [] as $key => $option)
                <option
                    value="{{ $key }}"
                    @if($isSelected($key)) selected @endif
                >{{ $option }}</option>
            @endforeach
        </select>
        @error($name)
            <p class="{{ config('blade_components.classes.error_text') }}">{{ $message }}</p>
        @enderror
    </div>
</div>

@push('scripts')
    <script>
        $('.selectize').selectize({
            plugins: ['remove_button'],
            allowEmptyOption: false,
        });
    </script>
@endpush
