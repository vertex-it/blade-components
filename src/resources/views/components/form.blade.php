<form
    method="POST"
    action="{{ $action }}"
    @if($multipart)
        enctype="multipart/form-data"
    @endif
>
    @csrf

    @if($method !== 'POST')
        @method($method)
    @endif

    {{ $slot }}

    <br>

    <button type="submit" class="btn btn-primary col-md-3">
        {{ $buttonText ?? 'Submit' }}
    </button>
</form>
