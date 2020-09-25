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

    <div class="element-box">{{ $slot }}</div>

    <button
        class="btn btn-primary btn-block"
        style="height: 40px; font-weight: 700; box-shadow: 0px 2px 4px rgb(126 142 177 / 40%);"
    >

        {{ $buttonText ?? 'Submit' }}
    </button>
</form>
