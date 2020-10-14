<div id="row_{{ $name }}">
    <x-multiple>
        {{ $slot }}
        <x-multiple-row>
            <x-inputs.time inline="4" name="{{ $name }}[from][]" label="{{ $workDay }}" placeholder="Od" />
            <x-inputs.time inline="4" name="{{ $name }}[to][]" label="&nbsp;" placeholder="Do" />
        </x-multiple-row>
    </x-multiple>
</div>