<div>
    <label class="form-label @error($name) text-red-500 @enderror" for="{{ $getId }}">
        {!! $getLabel() ?: "&nbsp;" !!}

        @if($required)
                <span class="text-red-500">*</span>
        @endif
    </label>
</div>
