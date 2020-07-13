@include('blade-components::components.inputs.includes.inlinable-top')
@include('blade-components::components.inputs.includes.label')

<br>
<input
    class="form-control"
    data-toggle="toggle"
    name="{{ $name }}"
    type="checkbox"
    @if(isset($options[0], $options[1]))
        data-on="{{ $options[0] }}"
        data-off="{{ $options[1] }}"
    @endif
    {{ old($name, $value) ? ' checked ' : '' }}
    {{ $attributes }}
>

@include('blade-components::components.inputs.includes.comment')
@include('blade-components::components.inputs.includes.error')
@include('blade-components::components.inputs.includes.inlinable-bottom')