<form method="POST" action="{{ $action }}" @if($multipart) enctype="multipart/form-data" @endif>
    @csrf
    @method($method ?? 'POST')

    {{ $slot }}

    <button type="submit" class="btn {{ config('blade_components.classes.submit_btn') }} col-md-3">{{ $buttonName ?? 'Submit' }}</button>
</form>
