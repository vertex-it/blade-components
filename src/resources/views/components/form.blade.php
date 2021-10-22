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
        <button class="btn btn-primary {{ $buttonClasses }}">
            {{ $buttonText ?? 'Submit' }}
        </button>
    @endif
</form>
