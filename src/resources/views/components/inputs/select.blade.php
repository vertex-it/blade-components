@include('blade-components::components.inputs.includes.inlinable-top')
@include('blade-components::components.inputs.includes.label')

<select
    class="{{ ! $selectize ? 'form-control' : '' }}"
    name="{{ $name . ($multiple ? '[]' : '') }}"
    id="bc-{{ $name }}"
    {{ $multiple ? ' multiple ' : '' }}
    {{ $outputRequired() }}
    {{ $attributes }}
>
    <option selected disabled value="">{{
        $getPlaceholder()
    }}</option>

    @foreach($getPreparedOptions as $key => $option)
        <option value="{{ $key }}" {{ $checkIfActive($key, ' selected ') }}>{{
            $option
        }}</option>
    @endforeach
</select>

@include('blade-components::components.inputs.includes.comment')
@include('blade-components::components.inputs.includes.error')
@include('blade-components::components.inputs.includes.inlinable-bottom')

@push('scripts')
    @if($selectize)
        <script>
            $('#bc-{{ $name }}').selectize({
                plugins: ['remove_button'],
                allowEmptyOption: false,
            });
        </script>
    @endif
@endpush
