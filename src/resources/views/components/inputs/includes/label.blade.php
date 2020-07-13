<label class="@error($name) text-danger @enderror" for="bc-{{ $name }}">
    {{ $getLabel() }}

    @if($required)
        <span class="text-danger">*</span>
    @endif
</label>