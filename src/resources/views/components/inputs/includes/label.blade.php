<label class="@error($name) text-danger @enderror" for="{{ $getId }}">
    {!! $getLabel() ?: "&nbsp;" !!}

    @if($required)
        <span class="text-danger">*</span>
    @endif
</label>