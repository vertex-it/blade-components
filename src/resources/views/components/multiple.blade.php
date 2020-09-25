<div class="row bc-row mt-4">
    <div class="col-12">
        <label class="mb-3">
            {{ $label }}
        </label>

        @if (Str::contains($slot, 'bc-multiple'))
            {{ $slot }}
        @else
            <x-multiple-row>
                {{ $slot }}
            </x-multiple-row>
        @endif

        <button class="btn btn-sm btn-outline-primary bc-btn-add" type="button">
            <i class="fa fa-plus"></i> {{ __('blade-components::components.add_more') }}
        </button>
    </div>
</div>

@push('scripts')
    <script>
        $(document).ready(function () {
            $('.bc-btn-add').on('click', function (e) {
                e.preventDefault();

                let $previous = $(this).prev();

                let element = cloneElement($previous);

                emptyValuesFromElement(element);
                incrementInputArrayKeys(element, $(this).parents('.bc-row').find('.bc-multiple').length);

                $previous.after(element);

                reinitializeSelectize();
            });

            $(this).on('click', '.bc-delete-row', function (e) {
                e.preventDefault();

                let rows = $(this).parents('.bc-row').find('.bc-multiple').length;

                if (rows < 2) {
                    return;
                }

                $(this).parents('.bc-multiple').remove();
            });
        });

        function cloneElement($el) {
            $el.find('select.bc-select').each(function (i) {
                if ($(this)[0].selectize) {
                    var value = $(this).val();
                    $(this)[0].selectize.destroy();
                    $(this).val(value);
                }
            })

            return $el.clone()
        }

        function emptyValuesFromElement(element) {
            // Todo: Add support for checkbox, etc.
            element.find('input, textarea').val('');
            element.find('option:selected').attr('selected', false);
            element.find('option:disabled').attr('selected', true);
        }

        function reinitializeSelectize() {
            $('select.bc-select').each(function (i) {
                if (! $(this)[0].selectize) {
                    $(this).selectize(selectizeDefaultConfig);
                }
            });
        }

        function incrementInputArrayKeys(element, numberOfRows) {
            element.find('input, textarea').attr('name', function (i, name) {
                return name.replace(/\[[0-9](.+?)]/, function (value) {
                    return value.replace(/[0-9]+/, numberOfRows)
                })
            })
        }
    </script>
@endpush
