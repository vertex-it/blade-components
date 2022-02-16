<div id="row_work_time">
    <x-multiple>
        {{ $slot }}

        @foreach(count($value) ? $value : [['from' => null, 'to' => null]] as $time)
            <x-multiple-row>
                <div class="form-inline">
                    <x-inputs.time
                        name="{{ $name }}[from][]"
                        value="{{ $time['from'] }}"
                        inline="4"
                        label="{{ $workDay }}"
                        placeholder="Od"
                    />

                    <x-inputs.time
                        name="{{ $name }}[to][]"
                        value="{{ $time['to'] }}"
                        inline="4"
                        label="&nbsp;"
                        placeholder="Do"
                    />
                </div>
            </x-multiple-row>
        @endforeach
    </x-multiple>
</div>
