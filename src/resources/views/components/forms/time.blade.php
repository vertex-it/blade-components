<div class="form-group row">
    <div class="col-sm-12 col-md-8 col-xl-6">
        <label class="{{ config('blade_components.classes.label.text') }}" for="{{ $name }}">{{ $label ?? ucfirst(str_replace('_', ' ', $name)) }}</label>
        <input
            type="text"
            name="{{ $name }}"
            class="{{ config('blade_components.classes.input.input') }} flatpickr-time"
            placeholder="{{ $placeholder ?? ucfirst(str_replace('_', ' ', $name)) }}"
            id="{{ $name }}"
            value="{{ old($name, $value) }}"
        >
    </div>
</div>

@push('scripts')
    <script>
        flatpickr('.flatpickr-time', {
            altInput: true,
            weekNumbers: true,
            allowInput: true,
            enableTime: true,
            dateFormat: "H:i",
            altFormat: "H:i",
            time_24hr: true,
            noCalendar: true,
            defaultDate: "{{ $defaultTime ?? null }}"
        });
    </script>
@endpush
