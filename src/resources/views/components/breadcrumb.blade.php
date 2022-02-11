<div class="breadcrumbs">
    <a href="{{ route('admin.index') }}" class="item item-link">
        {{ config('app.name') }}
    </a>

    @foreach($routes as $route)
        <span class="separator">
            <x-heroicon-s-chevron-right class="h-5 w-3" />
        </span>

        <a href="{{ $route['url'] }}" class="item item-link">
            {{ __(ucfirst($route['name'])) }}
        </a>
    @endforeach

    <span class="separator">
        <x-heroicon-s-chevron-right class="h-5 w-3" />
    </span>

    <span class="item item-last">
        @yield('title')
    </span>
</div>
