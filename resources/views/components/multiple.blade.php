<fieldset class="bc-row mb-8">
    @if ($label)
        <legend class="mb-8 text-primary-500">
            <span>{{ $label }}</span>
        </legend>
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

    <button class="btn btn-gray btn-has-icon bc-btn-add bc-btn-add-{{ $id }} lg:-mt-4" type="button">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
        </svg>
        {{ __('blade-components::components.add_more') }}
    </button>
</fieldset>

@push('master-scripts')
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
    @push('master-scripts')
        <script>
            $(document).ready(function () {
                $(document).on('click', '.bc-btn-add', function (e) {
                    e.preventDefault()

                    let $previous = $(this).prev().find('.bc-multiple').last()

                    let element = cloneElement($previous)

                    emptyValuesFromElement(element)
                    incrementInputArrayKeys(element, $(this).parents('.bc-row').find('.bc-multiple').length)

                    $previous.after(element)

                    reinitializeSelectize()
                    initTimePicker($previous.next().selector)
                })

                $(document).on('click', '.bc-delete-row', function (e) {
                    e.preventDefault()

                    let rows = $(this).parents('.bc-row').find('.bc-multiple').length

                    if (rows < 2) {
                        return
                    }

                    rows = $(this).closest('.bc-row').find('.bc-multiple').length

                    if (rows < 3) {
                        $(this).closest('.bc-row').find('.btn-group-delete-row').addClass('hidden')
                        $(this).closest('.bc-row').find('.bc-sort-row').addClass('hidden')
                    }

                    $(this).parents('.bc-multiple').remove()
                })
            })

            function cloneElement($el) {
                $el.find('select.selectize').each(function (i) {
                    if ($(this)[0].selectize) {
                        var value = $(this).val()
                        $(this)[0].selectize.destroy()
                        $(this).val(value)
                    }
                })

                return $el.clone()
            }

            function emptyValuesFromElement(element) {
                // Todo: Add support for checkbox, etc.
                element.find('input, textarea').val('')
                element.find('option:selected').attr('selected', false)
                element.find('option:disabled').attr('selected', true)
            }

            function reinitializeSelectize() {
                $('select.selectize').each(function (i) {
                    if (! $(this)[0].selectize) {
                        $(this).selectize(selectizeDefaultConfig)
                    }
                })
            }

            function incrementInputArrayKeys(element, numberOfRows) {
                element
                    .find('select, input, textarea')
                    .not('input[type="select-one"]')
                    .attr('name', function (i, name) {
                    return name.replace(/\[[0-9](.+?)]/, function (value) {
                        return value.replace(/[0-9]+/, numberOfRows)
                    })
                })
            }
        </script>
    @endpush
@endonce
