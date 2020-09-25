<ul class="nav nav-tabs mb-3 mt-4 justify-content-center">
    @foreach ($languages as $language)
        <li class="nav-item">
            <a
                class="nav-link {{ $loop->first ? 'active' : '' }}"
                data-toggle="tab"
                href="#tab_{{ Str::lower($language) }}"
            >
                {{ Str::upper($language) }}
            </a>
        </li>
    @endforeach
</ul>
<div class="tab-content mb-4">
    @foreach (['mne', 'en'] as $language)
        <div class="tab-pane {{ $loop->first ? 'active' : '' }}" id="tab_{{ Str::lower($language) }}">
            {{ ${$language} }}
        </div>
    @endforeach
</div>