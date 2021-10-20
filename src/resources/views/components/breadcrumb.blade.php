<div class="breadcrumbs">
    <a href="{{ route('admin.index') }}" class="item item-link">
        {{ config('app.name') }}
    </a>

    @foreach($routes as $route)
        <span class="separator">/</span>
        <a href="{{ $route['url'] }}" class="item item-link">
            {{ __(ucfirst($route['name'])) }}
        </a>
    @endforeach

    <span class="separator">/</span>
    <span class="item item-last">
        @yield('title')
    </span>
</div>
