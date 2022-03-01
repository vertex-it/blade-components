<div class="tab-group">
    <div class="tabs">
        @foreach ($languages as $language)
            <button class="tab-item {{ $loop->first ? 'active' : '' }}" data-href="#tab_{{ Str::lower($language) }}_{{ $id }}">
                {{ Str::upper($language) }}
            </button>
        @endforeach
    </div>

    <div class="tab-content mb-4">
        @foreach ($languages as $language)
            <div class="tab-pane {{ $loop->first ? 'active' : '' }}" id="tab_{{ Str::lower($language) }}_{{ $id }}">
                {{ ${$language} }}
            </div>
        @endforeach
    </div>
</div>

@once
    @push('master-scripts')
        <script>
            $('.tab-item').on('click', function (e) {
                e.preventDefault()

                $(this).parent().find('.active').removeClass('active')
                $(this).addClass('active')

                $(this).closest('.tab-group').find('.tab-pane.active').removeClass('active')
                $($(this).data('href')).addClass('active')
            })
        </script>
    @endpush
@endonce
