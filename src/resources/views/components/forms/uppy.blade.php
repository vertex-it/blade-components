<div class="uppy-{{ $key }}">
    <div id="drag-drop-area-{{ $key }}"></div>
</div>

@push('scripts')
    <script>
        const uppy = Uppy()
            .use(Dashboard, {
                inline: true,
                target: '#drag-drop-area-{{ $key }}',
                height: 500,
                thumbnailWidth: 200,
                proudlyDisplayPoweredByUppy: false,
                showLinkToFileUploadResult: true,
                showProgressDetails: true,
                note: '{{ $note }}',
                // TODO
                metaFields: [
                    { id: 'name', name: 'Name', placeholder: 'file name' },
                    { id: 'caption', name: 'Caption', placeholder: 'describe what the image is about' }
                ],
            })
            .use(XHRUpload, {
                endpoint: '{{ $route }}',
                method: 'POST',
                formData: true,
                fieldName: '{{ $name }}',
                bundle: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            })

        uppy.on('upload-success', (file, response) => {
            $('.uppy-{{ $key }}').append(
                '<input name="{{ $name }}[]" type="hidden" value="' + response.body + '">'
            )
        })
    </script>
@endpush
