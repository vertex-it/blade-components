<div class="form-group row @error($name) has-error has-danger @enderror">
    <div class="col-12">
        @include('blade-components::components.inputs.includes.label')

        <div>
            <button
                class="btn btn-light {{ is_array(old($name, $value)) ? 'mb-4' : '' }}"
                id="uppy-modal-{{ $key }}"
                title="{{ __('blade-components::components.add_more') }}"
                {{-- type="button" --}}
            >
{{--                TODO: Document blade-ui-kit/blade-heroicons dependency--}}
                <x-heroicon-o-plus height="20px" width="20px" class="float-left mr-1" />
                {{ __('blade-components::components.add_more') }}
            </button>
        </div>

        <div class="uppy-{{ $key }}">
            <div id="drag-drop-area-{{ $key }}"></div>
        </div>

        <input name="{{ $name }}[]" type="hidden" value="">

        <div class="row flex" id="uppy-uploaded-{{ $key }}">
            @foreach(old($name, $value) ?? [] as $url)
                @if($url)
                    <div class="col-lg-2 col-md-3 col-sm-4 mb-4 uploaded-container">
                        @if(in_array(pathinfo($url, PATHINFO_EXTENSION), ['jpg', 'jpeg']))
                            <img class="rounded img-thumbnail img-fluid" src="{{ $url }}" />
                        @else
                            <a href="{{ $url }}" target="_blank" class="rounded" rel="noopener noreferrer">
                                <i class="os-icon os-icon-documents-03"></i>
                            </a>
                        @endif
                        <input name="{{ $name }}[]" type="hidden" value="{{ $url }}">
                    </div>
                @endif
            @endforeach
        </div>

        <div
            class="row flex droppable-trash"
            id="uppy-removed-{{ $key }}"
            style="{{ is_array(old($name, $value)) ? '' : 'display: none;' }}"
        ></div>

        @include('blade-components::components.inputs.includes.comment')
        @include('blade-components::components.inputs.includes.error')
    </div>
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
        $(document).on('click', '#uppy-modal-{{ $key }}', function (e) {
            e.preventDefault();
        });

        const uppy{{ $key }} = Uppy().use(Dashboard, {
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
                    render ({ value, onChange, fieldCSSClasses }, h) {
                        const point = value.lastIndexOf('.')
                        const name = value.slice(0, point)
                        const ext = value.slice(point + 1)
                        return h('input', {
                            class: fieldCSSClasses.text,
                            type: 'text',
                            value: name,
                            placeholder: '{{ __("Edit file name") }}',
                            onChange: (event) => onChange(event.target.value + '.' + ext),
                            'data-uppy-super-focusable': true
                        })
                    }
                },
            ],
        })
        .use(XHRUpload, {
            // TODO: Uppy will be used for all file types, not only images...
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

        var imageTypes = ['png', 'tif', 'tiff', 'wbmp', 'ico', 'jng', 'bmp', 'svg', 'webp', 'jpg', 'jpeg'];
        function isImage(url) {
            var extension = url.split('.').pop();

            return imageTypes.includes(extension);
        }

        function fileName(url) {
            var name = url.split('/').pop();
            var extension = url.split('.').pop();

            if (name.length > 25) {
                name = name.substring(0, 25) + '...' + extension;
            } else {
                name = name + '.' + extension;
            }

            return name;
        }

        uppy{{ $key }}.on('upload-success', (file, response) => {
            $('#uppy-modal-{{ $key }}').addClass('mb-4');

            $('#uppy-removed-{{ $key }}').show();

            if (isImage(response.body)) {
                var display = '<img class="rounded img-thumbnail img-fluid border-success" src="' + response.body + '" />';
            } else {
                var display = '<a href="' + response.body +
                    '" target="_blank" class="rounded border-success" rel="noopener noreferrer">' +
                    '<i class="os-icon os-icon-documents-03"></i>' +
                    // TODO: Add filename
                    // '<p>' + fileName(response.body) + '</p>'
                    '</a>';
            }

            $('#uppy-uploaded-{{ $key }}').append(
                '<div class="col-lg-2 col-md-3 col-sm-4 mb-4 uploaded-container">' +
                    display +
                    '<input name="{{ $name }}[]" type="hidden" value="' + response.body + '">' +
                '</div>'
            );
        });
    </script>
@endpush
