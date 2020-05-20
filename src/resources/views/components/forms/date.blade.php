<div class="form-group row">
    <div class="col-sm-12 col-md-8 col-xl-6">
        <label class="{{ config('blade_components.classes.label.text') }}" for="{{ $name }}">{{ $label ?? ucfirst(str_replace('_', ' ', $name)) }}</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <i class="fa fa-calendar"></i>
                </div>
            </div>
            <input
                type="text"
                name="{{ $name }}"
                class="{{ config('blade_components.classes.input.input') }} flatpickr"
                placeholder="{{ $placeholder ?? ucfirst($name) }}"
                id="{{ $name }}"
                value="{{ old($name, $value) }}"
            >
        </div>
    </div>
</div>

@push('scripts')
    <script>
        let options = {
            altInput: true,
            weekNumbers: true,
        };

        @if($time)
            options.enableTime = true;
            options.dateFormat = "Y-m-d H:i";
            options.altFormat = "F j, Y - H:i";
            options.time_24hr = true;
        @else
            options.dateFormat = "Y-m-d";
            options.altFormat = "F j, Y";
        @endif

        flatpickr('.flatpickr', options);
    </script>
@endpush
