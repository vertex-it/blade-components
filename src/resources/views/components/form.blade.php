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

    <button class="btn btn-primary">
        {{ $buttonText ?? 'Submit' }}
    </button>
</form>
