<div class="modal" aria-labelledby="modal-title" role="dialog" aria-modal="true" id="modal" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-bg" aria-hidden="true"></div>

        <!-- This element is to trick the browser into centering the modal contents. -->
        <span class="modal-center" aria-hidden="true">​</span>

        <div class="modal-data">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <h3 class="modal-title"></h3>
                <div class="modal-content"></div>
            </div>
            <div class="modal-footer" style="display: none;">
                <button type="button" class="m-0 modal-action-btn btn btn-primary" id="confirm">
                    {{ __('Confirm') }}
                </button>
                <button type="button" class="btn btn-white modal-close-btn" id="cancel">
                    {{ __('Cancel') }}
                </button>
            </div>
        </div>
    </div>
</div>

@once
    @push('master-scripts')
        <script>
            $(document).on('click', '.btn-open-modal', function (e) {
                e.preventDefault();

                openModal($(this))
            });

            $(document).on('click', '.modal-close-btn', function (e) {
                e.preventDefault();

                closeModal();
            });

            $(document).click(function(e) {
                if ($("#modal").is(":visible")) {
                    if (! $(e.target).closest(".modal-data, .modal-btn").length) {
                        e.preventDefault();

                        closeModal();
                    }
                }
            });

            function openModal(modalComponent) {
                $('.modal-title').text(modalComponent.data('title'));
                $('.modal-content').html(modalComponent.data('content'));
                $('#modal').show();
            }

            function closeModal() {
                $('.modal-title').text('');
                $('.modal-content').empty();
                $('.modal-footer #confirm').removeClass().addClass('m-0 modal-action-btn');

                $('.modal-footer').hide();
                $('#modal').hide();
            }

            function openConfirmModal(modalComponent, confirmButtonClass, buttonText, buttonColor) {
                openModal(modalComponent);

                $('.modal-footer').show();

                $('#modal .modal-action-btn')
                    .text(buttonText)
                    .addClass(buttonColor)
                    .data('confirmButtonClass', confirmButtonClass)
                    .data('properties', modalComponent.attr('data-target'));
            }
        </script>
    @endpush
@endonce
