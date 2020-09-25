@include('blade-components::components.inputs.includes.inlinable-top')
@include('blade-components::components.inputs.includes.label')

<select
    class="{{ $selectize ? 'bc-select' : 'form-control' }}"
    name="{{ $name . ($multiple ? '[]' : '') }}"
    id="{{ $getId }}"
    {{ $multiple ? ' multiple ' : '' }}
    {{ $outputRequired() }}
    {{ $attributes }}
>
    <option value="" selected="selected">{{
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

@if ($selectize)
    @once
        @push('scripts')
            <script>
                selectizeDefaultConfig = {
                    plugins: ['remove_button']
                };

                $('select.bc-select').selectize(selectizeDefaultConfig);
            </script>
        @endpush
    @endonce
@endif
