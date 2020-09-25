<div class="form-group">
    @include('blade-components::components.inputs.includes.label')

    <div>
        <button
            class="btn btn-success {{ count($value) > 0 ? 'mb-4' : '' }}"
            id="uppy-modal-{{ $key }}"
            title="{{ __('blade-components::components.add_more') }}"
        >
            <i class="fa fa-plus"></i>
            {{ __('blade-components::components.add_more') }}
        </button>
    </div>

    <div class="uppy-{{ $key }}">
        <div id="drag-drop-area-{{ $key }}"></div>
    </div>

    <input name="{{ $name }}[]" type="hidden" value="">

    <div class="row flex" id="uppy-uploaded-{{ $key }}">
        @foreach($value ?? [] as $image)
            <div class="col-lg-2 col-md-3 col-sm-4 mb-4 uploaded-image-container">
                <img class="rounded img-thumbnail img-fluid" src="{{ $image }}" />
                <input name="{{ $name }}[]" type="hidden" value="{{ $image }}">
            </div>
        @endforeach
    </div>

    <div
        class="row flex droppable-trash"
        id="uppy-removed-{{ $key }}"
        style="{{ count($value) > 0 ? '' : 'display: none;' }}"
    ></div>

    @include('blade-components::components.inputs.includes.comment')
    @include('blade-components::components.inputs.includes.error')
</div>

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.10.2/Sortable.js"></script>
    <script>

        var uploaded{{ $key }} = document.getElementById("uppy-uploaded-{{ $key }}");
        var sortableUploaded{{ $key }} = Sortable.create(uploaded{{ $key }}, {
            animation: 150,
            group: '{{ $key }}',
            onAdd: function (event) {
                var item = event.item;
                $(item).find('input').attr('name', '{{ $name }}[]');
            }
        });

        var removed{{ $key }} = document.getElementById("uppy-removed-{{ $key }}");
        var sortableRemoved{{ $key }} = Sortable.create(removed{{ $key }}, {
            animation: 150,
            group: '{{ $key }}',
            onAdd: function (event) {
                var item = event.item;
                $(item).find('input').attr('name', '');
            }
        });

        // TODO: Hide/Show uppy button
    </script>
    <script>
        $('#uppy-modal-{{ $key }}').on('click', function (e) {
            e.preventDefault();
        });

        const uppy = Uppy().use(Dashboard, {
            inline: false,
            target: '#drag-drop-area-{{ $key }}',
            trigger: '#uppy-modal-{{ $key }}',
            height: 500,
            thumbnailWidth: 200,
            proudlyDisplayPoweredByUppy: false,
            showLinkToFileUploadResult: true,
            showProgressDetails: true,
            note: '{{ $getLabel() }}',
            closeModalOnClickOutside: true,
            disablePageScrollWhenModalOpen: true,
            showRemoveButtonAfterComplete: true,
            restrictions: {
                maxFileSize: {{ 1024 * 1024 * $maxFileSize }}
            },
            metaFields: [
                {
                    id: 'name',
                    name: 'File name',
                    placeholder: 'Edit file name',
                },
            ],
        })
        .use(XHRUpload, {
            endpoint: '{{ $route ?? route("blade-components.images") }}',
            method: 'POST',
            formData: true,
            fieldName: '{{ $route ? $name : "image" }}',
            bundle: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            getResponseError (responseText, response) {
                return new Error(response.statusText);
            }
        });

        uppy.on('upload-success', (file, response) => {
            $('#uppy-modal-{{ $key }}').addClass('mb-4');

            $('#uppy-removed-{{ $key }}').show();

            $('#uppy-uploaded-{{ $key }}').append(
                '<div class="col-lg-2 col-md-3 col-sm-4 mb-4 uploaded-image-container">' +
                    '<img class="rounded img-thumbnail img-fluid border-success" src="' + response.body + '" />' +
                    '<input name="{{ $name }}[]" type="hidden" value="' + response.body + '">' +
                '</div>'
            );
        });
    </script>
@endpush
