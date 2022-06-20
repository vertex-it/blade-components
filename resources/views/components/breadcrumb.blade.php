<div class="breadcrumbs">
    <a href="{{ route('admin.index') }}" class="item item-link">
        {{ config('app.name') }}
    </a>

    @foreach($routes as $route)
        <span class="separator">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-3" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
            </svg>
        </span>

        <a href="{{ $route['url'] }}" class="item item-link">
            {{ __(ucfirst($route['name'])) }}
        </a>
    @endforeach

    <span class="separator">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-3" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
        </svg>
    </span>
    <span class="item item-last">
        @yield('title')
    </span>
</div>
