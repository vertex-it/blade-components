@include('blade-components::components.inputs.includes.inlinable-top')
@include('blade-components::components.inputs.includes.label')

<input
    class="form-control"
    id="bc-{{ $name }}"
    name="{{ $name }}"
    placeholder="{{ $getPlaceholder() }}"
    type="{{ $type }}"
    value="{{ old($name, $value) }}"
    {{ $outputRequired() }}
    {{ $attributes }}
>

@include('blade-components::components.inputs.includes.comment')
@include('blade-components::components.inputs.includes.error')
@include('blade-components::components.inputs.includes.inlinable-bottom')