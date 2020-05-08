<div class="form-group">
    <label class="{{ config('blade_components.classes.label.text') }}">
        {{ ucfirst($name) }}
    </label>
    <div class="{{ config('blade_components.classes.switch.div') }} {{ $state ? config('blade_components.classes.switch.active') : config('blade_components.classes.switch.inactive') }}">
        <span></span>
    </div>
    <input type="hidden" id="switch-{{ $name }}" name="{{ $name }}" value="{{ $state ? 1 : 0 }}">
</div>

@push('scripts')
    <script>
        $('.az-toggle').on('click', function () {
            $(this).toggleClass('on');

            $('#switch-{{ $name }}').val() === '1' ?
                $('#switch-{{ $name }}').val(0) :
                $('#switch-{{ $name }}').val(1);
        })
    </script>
@endpush
