<style>
    .uploaded-container {
        height: 120px;
    }

    .uploaded-container>img {
        height: 100%;
        width: 100%;
        object-fit: cover;
    }

    .droppable-trash {
        padding: 0.5em;
    }

    .droppable-trash img {
        opacity: .2;
    }
</style>
<div class="form-group w-full @error($name) has-error has-danger @enderror">
    @include('blade-components::components.inputs.includes.label')

    <div>
        <button
            class="btn btn-white btn-has-icon shadow-sm font-normal mt-4 {{ is_array(old($name, $value)) ? 'mb-4' : '' }}"
            id="uppy-modal-{{ $key }}"
            title="{{ __('blade-components::components.add_more') }}"
             type="button"
        >
{{--                TODO: Document blade-ui-kit/blade-heroicons dependency--}}
            <x-heroicon-o-plus height="16" width="16" />
            {{ __('blade-components::components.add_more') }}
        </button>
    </div>

    <div class="uppy-{{ $key }}">
        <div id="drag-drop-area-{{ $key }}"></div>
    </div>

    <input name="{{ $name }}[]" type="hidden" value="">

    <div class="flex flex-wrap justify-start items-center -m-2" id="uppy-uploaded-{{ $key }}">
        @foreach(old($name, $value) ?? [] as $url)
            @if($url)
                <div class="flex-1 uploaded-container">
                    @if(in_array(pathinfo($url, PATHINFO_EXTENSION), ['jpg', 'jpeg']))
                        <img class="p-1 border border-green-400 rounded-md" src="{{ $url }}"  alt=""/>
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
    <div class="mb-2"></div>

    <div
        class="flex droppable-trash mt-4 border-dashed border-2 border-gray-300"
        id="uppy-removed-{{ $key }}"
        style="{{ is_array(old($name, $value)) ? '' : 'display: none;' }}"
    ></div>

    @include('blade-components::components.inputs.includes.comment')
    @include('blade-components::components.inputs.includes.error')
</div>

@push('scripts')
    <script>
        let uploaded{{ $key }} = document.getElementById("uppy-uploaded-{{ $key }}")
        let sortableUploaded{{ $key }} = Sortable.create(uploaded{{ $key }}, {
            animation: 150,
            group: '{{ $key }}',
            onAdd: function (event) {
                let item = event.item;
                $(item).find('input').attr('name', '{{ $name }}[]');
            }
        });

        let removed{{ $key }} = document.getElementById("uppy-removed-{{ $key }}");
        let sortableRemoved{{ $key }} = Sortable.create(removed{{ $key }}, {
            animation: 150,
            group: '{{ $key }}',
            onAdd: function (event) {
                let item = event.item;
                $(item).find('input').attr('name', '');
            }
        });

        // TODO: Hide/Show uppy button
    </script>
    <script>
        $(document).on('click', '#uppy-modal-{{ $key }}', function (e) {
            e.preventDefault();
        });

        const uppy{{ $key }} = new Uppy().use(Dashboard, {
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

        let imageTypes = ['png', 'tif', 'tiff', 'wbmp', 'ico', 'jng', 'bmp', 'svg', 'webp', 'jpg', 'jpeg'];
        function isImage(url) {
            let extension = url.split('.').pop();

            return imageTypes.includes(extension);
        }

        function fileName(url) {
            let name = url.split('/').pop();
            let extension = url.split('.').pop();

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

            let display
            if (isImage(response.body)) {
                display = '<img class="rounded" src="' + response.body + '" alt="" style="width: inherit;" />';
            } else {
                display = '<a href="' + response.body +
                    '" target="_blank" class="rounded border-success" rel="noopener noreferrer">' +
                    '<i class="os-icon os-icon-documents-03"></i>' +
                    // TODO: Add filename
                    // '<p>' + fileName(response.body) + '</p>'
                    '</a>';
            }

            $('#uppy-uploaded-{{ $key }}').append(
                '<div class="uploaded-container cursor-move m-2">' +
                    display +
                    '<input name="{{ $name }}[]" type="hidden" value="' + response.body + '">' +
                '</div>'
            );
        });
    </script>
@endpush
