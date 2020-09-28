<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('admin.index') }}">
                {{ config('app.name') }}
            </a>
        </li>

        @foreach ($routes as $route)
            <li class="breadcrumb-item">
                <a href="{{ $route['url'] }}">
                    {{ __(ucfirst($route['name'])) }}
                </a>
            </li>
        @endforeach

        @if (Route::currentRouteName() !== 'admin.index')
            <li class="breadcrumb-item active">
                @yield('title')
            </li>
        @endif
    </ol>
</nav>
