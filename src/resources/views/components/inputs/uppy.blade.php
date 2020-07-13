<div class="form-group">
    @include('blade-components::components.inputs.includes.label')

    <div class="uppy-{{ $key }}">
        <div id="drag-drop-area-{{ $key }}"></div>
    </div>

    @if($value)
        <hr>
        <h4 class="text-center mb-4">
            {{ $getLabel() . ' - ' . __('uploaded files') }} &nbsp;&nbsp;
            <button class="btn btn-primary btn-sm" id="uppy-modal-{{ $key }}">{{ __('Add more') }}</button>
        </h4>
        <div class="row flex" id="uppy-uploaded-{{ $key }}">
            @foreach($value as $image)
                <div class="col-lg-2 col-md-3 col-sm-4 mb-4">
                    <img class="rounded img-thumbnail img-fluid" src="{{ $image }}" />
                </div>
            @endforeach
        </div>
        <hr>
    @else
        <button class="btn btn-primary col-md-3" id="uppy-modal-{{ $key }}">
            {{ __('Add') . ' ' . $getLabel() }}
        </button>
        <div id="uppy-upload-container-{{ $key }}" style="display: none;" {{ $attributes }}>
            <hr>
            <h4 class="text-center">
                {{ $getLabel() . ' - ' . __('uploaded files') }}
            </h4>
            <div class="text-center mb-4">{{ __('Submit form to save files') }}</div>
            <div class="row flex" id="uppy-uploaded-{{ $key }}"></div>
            <hr>
        </div>
    @endif
    <div class="mb-4"></div>

    @include('blade-components::components.inputs.includes.comment')
    @include('blade-components::components.inputs.includes.error')
</div>

@push('scripts')
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
            metaFields: [
                {
                    id: 'name',
                    name: 'File name',
                    placeholder: 'Edit file name',
                },
            ],
        })
        .use(XHRUpload, {
            endpoint: '{{ $route ?? route('blade-components.images') }}',
            method: 'POST',
            formData: true,
            fieldName: '{{ $route ? $name : 'image' }}',
            bundle: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            getResponseError (responseText, response) {
                return new Error(response.statusText);
            }
        });

        uppy.on('upload-success', (file, response) => {
            $('.uppy-{{ $key }}').append(
                '<input name="{{ $name }}[]" type="hidden" value="' + response.body + '">'
            );

            $('#uppy-upload-container-{{ $key }}').show();

            $('#uppy-uploaded-{{ $key }}').append(
                '<div class="col-lg-2 col-md-3 col-sm-4 mb-4">' +
                    '<img class="rounded img-thumbnail img-fluid border-success" src="' + response.body + '" />' +
                '</div>'
            );
        });
    </script>
@endpush
