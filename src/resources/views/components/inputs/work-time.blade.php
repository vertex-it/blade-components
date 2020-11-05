@include('blade-components::components.inputs.includes.inlinable-top')
@include('blade-components::components.inputs.includes.label')

<div id="{{ $name }}" class="mb-4">
    <x-inputs.work-time-day
        name="{{ $name }}[monday]"
        :value="$preparedValue['monday']"
        workDay="{{ __('blade-components::components.monday') }}"
    >
        <button
            id="apply_to_all_{{ $name }}"
            class="btn btn-primary btn-sm mb-2"
            title="Primjenite na sve dane"
            type="button"
        >
            <i class="os-icon os-icon-grid-18"></i> Primjenite na sve dane
        </button>
    </x-inputs.work-time-day>

    <x-inputs.work-time-day
        name="{{ $name }}[tuesday]"
        :value="$preparedValue['tuesday']"
        workDay="{{ __('blade-components::components.tuesday') }}"
    />
    <x-inputs.work-time-day
        name="{{ $name }}[wednesday]"
        :value="$preparedValue['wednesday']"
        workDay="{{ __('blade-components::components.wednesday') }}"
    />
    <x-inputs.work-time-day
        name="{{ $name }}[thursday]"
        :value="$preparedValue['thursday']"
        workDay="{{ __('blade-components::components.thursday') }}"
    />
    <x-inputs.work-time-day
        name="{{ $name }}[friday]"
        :value="$preparedValue['friday']"
        workDay="{{ __('blade-components::components.friday') }}"
    />
    <x-inputs.work-time-day
        name="{{ $name }}[saturday]"
        :value="$preparedValue['saturday']"
        workDay="{{ __('blade-components::components.saturday') }}"
    />
    <x-inputs.work-time-day
        name="{{ $name }}[sunday]"
        :value="$preparedValue['sunday']"
        workDay="{{ __('blade-components::components.sunday') }}"
    />
</div>

@include('blade-components::components.inputs.includes.comment')
@include('blade-components::components.inputs.includes.error')
@include('blade-components::components.inputs.includes.inlinable-bottom')

@push('scripts')
    <script>
        $(document).on('click', '#apply_to_all_{{ $name }}', function() {
            let applyDay = $(this).parents('#row_work_time');

            let fromInputSelector = 'input[name$="[from][]"]';
            let toInputSelector = 'input[name$="[to][]"]';

            let dayData = {
                from: applyDay.find(fromInputSelector).map(function (id, input) {
                    return $(input).val();
                }).get(),
                to: applyDay.find(toInputSelector).map(function (id, input) {
                    return $(input).val();
                }).get(),
                count: applyDay.find(fromInputSelector).length
            }

            $(this).parents('#{{ $name }}')
                .children('#row_work_time')
                .each(function (i, day) {
                    $(day).find('.row.bc-multiple').each(function (i, row) {
                        if (i != 0) {
                            row.remove();
                        }
                    });

                    for (let index = 1; index < dayData.count; index++) {
                        $(day).find('.bc-btn-add').click();
                    }

                    $(day).find(fromInputSelector)
                        .each(function(i, input) {
                            $(input).val(dayData.from[i]);
                        });

                    $(day).find(toInputSelector)
                        .each(function(i, input) {
                            $(input).val(dayData.to[i]);
                        });
                });
        });
    </script>
@endpush