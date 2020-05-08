<div class="form-group">
    <div class="row">
        @for($i = 0; $i < count($inputs[0]); $i++)
            <div class="col-{{ 12 / count($inputs[0]) }}">
                <label class="{{ config('blade_components.classes.label.text') }} @error($name) {{ config('blade_components.classes.label.error') }} @enderror">
                    {{ $inputs[0][$i]['name'] }}
                </label>
            </div>
        @endfor
    </div>
    <div class="copy-input">
        @forelse(old($name) ?? [] as $i => $row)
            @foreach($inputs as $number => $input)
                <div class="row row-xs multi-input-group">
                    @foreach($input as $key => $values)
                        @if($loop->last)
                            <div class="col-md-{{ 12 / count($input) }} mg-t-2 mg-md-t-0">
                                <div class="input-group mb-2">
                                    <input
                                        class="{{ config('blade_components.classes.input.input') }}"
                                        name="{{ $name }}[{{ $i }}][{{ $values['name'] }}]"
                                        type="{{ $values['type'] }}"
                                        value="{{ $row[$values['name']] ?? '' }}"
                                    >
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-danger btn-delete-input" type="button">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="col-md-{{ 12 / count($input) }} mg-t-2 mg-md-t-0">
                                <input
                                    name="{{ $name }}[{{ $i }}][{{ $values['name'] }}]"
                                    type="{{ $values['type'] }}"
                                    class="{{ config('blade_components.classes.input.input') }}"
                                    value="{{ $row[$values['name']] ?? '' }}"
                                >
                            </div>
                        @endif
                    @endforeach
                </div>
            @endforeach
        @empty
            @foreach($inputs as $number => $input)
                <div class="row row-xs multi-input-group">
                    @foreach($input as $key => $values)
                        @if($loop->last)
                            <div class="col-md-{{ 12 / count($input) }} mg-t-2 mg-md-t-0">
                                <div class="input-group mb-2">
                                    <input
                                        class="{{ config('blade_components.classes.input.input') }}"
                                        name="{{ $name }}[{{ $number }}][{{ $values['name'] }}]"
                                        type="{{ $values['type'] }}"
                                        @if(isset($values['value'])) value="{{ $values['value'] }}" @endif
                                    >
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-danger btn-delete-input" type="button">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="col-md-{{ 12 / count($input) }} mg-t-2 mg-md-t-0">
                                <input
                                    name="{{ $name }}[{{ $number }}][{{ $values['name'] }}]"
                                    type="{{ $values['type'] }}"
                                    class="{{ config('blade_components.classes.input.input') }}"
                                    @if(isset($values['value'])) value="{{ $values['value'] }}" @endif
                                >
                            </div>
                        @endif
                    @endforeach
                </div>
            @endforeach
        @endforelse
    </div>
    @error($name)
        <p class="text-danger">{{ $message }}</p>
    @enderror
    <button class="btn {{ config('blade_components.classes.multi_input.add_more_btn') }} btn-add-input-{{ $name }}">
        <i class="{{ config('blade_components.classes.multi_input.add_more_icon') }}"></i> {{ config('blade_components.classes.multi_input.add_more_text') }}
    </button>
</div>

@push('scripts')
    <script>
        $(document).ready(function () {
            $('.btn-add-input-{{ $name }}').on('click', function (e) {
                e.preventDefault();

                let element = $(this).parent().find('.copy-input > div:first-child').clone();

                emptyValuesFromElement(element);
                incrementInputArrayKeys(
                    element,
                    $(this).parent().find('.copy-input > div').length
                );

                $(this).parent().find('.copy-input').append(element);
            });

            $('.copy-input').delegate('.btn-delete-input', 'click', function (e) {
                e.preventDefault();

                if ($(this).closest('.copy-input').find('> div').length < 2) {
                    return;
                }

                $(this).closest('.multi-input-group').remove();
            });
        });

        function incrementInputArrayKeys(element, numberOfRows) {
            element.find('input, textarea').attr('name', function (i, name) {
                return name.replace(/\[[0-9](.+?)]/, function (value) {
                    return value.replace(/[0-9]+/, numberOfRows)
                })
            })
        }

        function emptyValuesFromElement(element) {
            element.find('input, textarea').val('');
            element.find('option:selected').attr('selected', false);
        }
    </script>
@endpush
