<div class="bc-row mb-8">
    @if ($label)
        <p class="mb-6 text-gray-600">
            {{ $label }}
        </p>
    @endif

    <div id="{{ $id }}">
        @if (Str::contains($slot, 'bc-multiple'))
            {{ $slot }}
        @else
            <x-multiple-row sortable>
                {{ $slot }}
            </x-multiple-row>
        @endif
    </div>

    <button class="btn btn-white shadow-sm btn-sm btn-has-icon font-normal bc-btn-add bc-btn-add-{{ $id }} lg:-mt-4" type="button">
        <x-heroicon-o-plus height="16" width="16" />
        {{ __('blade-components::components.add_more') }}
    </button>
</div>

@push('scripts')
    <script>
        if ($('#{{ $id }}').find('.bc-multiple').length === 1) {
            $('#{{ $id }}').find('.btn-group-delete-row').addClass('hidden')
            $('#{{ $id }}').find('.bc-sort-row').addClass('hidden')
        }

        $(document).on('click', '.bc-btn-add-{{ $id }}', function (e) {
            $('#{{ $id }}').find('.btn-group-delete-row').removeClass('hidden')
            $('#{{ $id }}').find('.bc-sort-row').removeClass('hidden')

            Sortable.create(document.getElementById('{{ $id }}'), {
                animation: 150,
                group: '{{ $label }}',
                direction: 'vertical',
                handle: '.bc-sort-row',
            })
        })
    </script>
@endpush

@once
    @push('scripts')
        <script>
            $(document).ready(function () {
                $(document).on('click', '.bc-btn-add', function (e) {
                    e.preventDefault();

                    let $previous = $(this).prev().find('.bc-multiple').last();

                    let element = cloneElement($previous);

                    emptyValuesFromElement(element);
                    incrementInputArrayKeys(element, $(this).parents('.bc-row').find('.bc-multiple').length);

                    $previous.after(element);

                    reinitializeSelectize();
                    initTimePicker($previous.next().selector);
                });

                $(document).on('click', '.bc-delete-row', function (e) {
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
@endonce
