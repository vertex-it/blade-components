<div class="form-group row">
    <div class="col-sm-12 col-md-8 col-xl-6">
        <label class="{{ config('blade_components.classes.label.text') }}" for="{{ $name }}">{{ $label ?? ucfirst(str_replace('_', ' ', $name)) }}</label>
        <input
            type="text"
            name="{{ $name }}"
            class="{{ config('blade_components.classes.input.input') }} timepicker"
            placeholder="{{ $placeholder ?? ucfirst(str_replace('_', ' ', $name)) }}"
            id="{{ $name }}"
            value="{{ old($name, $value) }}"
        >
    </div>
</div>

@push('scripts')
    <script>
        $('.timepicker').timepicker({
            timeFormat: 'HH:mm',
            interval: '{{ $interval ?? '30' }}',
            startTime: '{{ $defaultTime ?? '00:00' }}',
            dynamic: true,
            dropdown: true,
            scrollbar: true,
        }).attr("autocomplete", 'off');
    </script>
@endpush
