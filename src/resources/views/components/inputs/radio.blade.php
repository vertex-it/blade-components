<div class="form-group row">
    <div class="col-sm-12 col-md-8 col-xl-6">
        @include('blade-components::components.inputs.includes.label')

        @foreach($getPreparedOptions() as $key => $label)
            <div class="form-check">
                <label class="rdiobox">
                    <input
                        name="{{ $name }}"
                        type="radio"
                        value="{{ $key }}"
                        {{ $checkIfActive($key, ' checked ') }}
                        {{ $outputRequired() }}
                        {{ $attributes }}
                    >
                    <span>{{ $label }}</span>
                </label>
            </div>
        @endforeach

        @include('blade-components::components.inputs.includes.comment')
        @include('blade-components::components.inputs.includes.error')
    </div>
</div>
