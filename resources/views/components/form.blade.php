<form
    method="POST"
    action="{{ $action }}"
    @if ($multipart)
        enctype="multipart/form-data"
    @endif
>
    @csrf

    @if ($method !== 'POST')
        @method($method)
    @endif

    <div class="form-content">{{ $slot }}</div>

    @if ($button)
        <div class="form-footer">
            <button class="btn btn-primary font-medium px-8 {{ $buttonClasses }}">
                {{ $buttonText ?? 'Submit' }}
            </button>
        </div>
    @endif
</form>
