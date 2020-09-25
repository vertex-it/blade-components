<div
    class="modal fade"
    aria-hidden="true"
    style="z-index: 2000!important;"
    role="dialog"
    tabindex="-1"
    aria-labelledby="{{ $labelId }}"
    id="{{ $id }}"
>
    <div class="modal-dialog {{ $wide ? 'modal-lg' : '' }}" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="{{ $labelId }}">
                    {{ $title }}
                </h5>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true"> &times;</span></button>
            </div>
            <div class="modal-body">
                {!! $content !!}
            </div>
        </div>
    </div>
</div>

@if (! $content)
    @push('scripts')
        <script>
            $(document).on('click', 'button[data-target="#{{ $id }}"]', function () {
                $('div#{{ $id }} div.modal-body').html(
                    $(this).data('content')
                );
            });
        </script>
    @endpush
@endif