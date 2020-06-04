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
                class="{{ config('blade_components.classes.input.input') }} flatpickr-{{ $name }}"
                placeholder="{{ $placeholder ?? ucfirst(str_replace('_', ' ', $name)) }}"
                id="{{ $name }}"
                value="{{ old($name, $value) }}"
            >
        </div>
    </div>
</div>

@push('scripts')
    <script>
        flatpickr('.flatpickr-{{ $name }}', {
            altInput: true,
            weekNumbers: true,
            allowInput: true,
            @if($time)
                enableTime: true,
                dateFormat: "Y-m-d H:i",
                altFormat: "F j, Y - H:i",
                time_24hr: true,
            @else
                dateFormat: "Y-m-d",
                altFormat: "F j, Y",
            @endif
        });
    </script>
@endpush
