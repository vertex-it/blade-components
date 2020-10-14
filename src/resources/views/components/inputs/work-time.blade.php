@include('blade-components::components.inputs.includes.inlinable-top')
@include('blade-components::components.inputs.includes.label')

<div id="{{ $name }}" class="mb-4">
    <x-inputs.work-time-day name="{{ $name }}" workDay="Ponedjeljak">
        <button
            id="apply_to_all_{{ $name }}"
            class="btn btn-primary btn-sm mb-2"
            title="Primjenite na sve dane"
            type="button"
        >
            <i class="os-icon os-icon-grid-18"></i> Primjenite na sve dane
        </button>
    </x-inputs.work-time-day>

    <x-inputs.work-time-day name="{{ $name }}" workDay="Utorak" />
    <x-inputs.work-time-day name="{{ $name }}" workDay="Srijeda" />
    <x-inputs.work-time-day name="{{ $name }}" workDay="Četvrtak" />
    <x-inputs.work-time-day name="{{ $name }}" workDay="Petak" />
    <x-inputs.work-time-day name="{{ $name }}" workDay="Subota" />
    <x-inputs.work-time-day name="{{ $name }}" workDay="Nedjelja" />
</div>

@include('blade-components::components.inputs.includes.comment')
@include('blade-components::components.inputs.includes.error')
@include('blade-components::components.inputs.includes.inlinable-bottom')

@push('scripts')
    <script>
        $(document).on('click', '#apply_to_all_{{ $name }}', function() {
            let $day = $(this).parents('#row_{{ $name }}');
            let from = $day.find('input[name$="[from][]"]').val();
            let to = $day.find('input[name$="[to][]"]').val();

            let $days = $(this).parents('#{{ $name }}');
            $days.find('input[name$="[from][]"]').val(from);
            $days.find('input[name$="[to][]"]').val(to);
        });
    </script>
@endpush