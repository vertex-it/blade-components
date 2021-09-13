<div class="form-group">
    @include('blade-components::components.inputs.includes.label')

    <textarea
        class="{{ $richText ? 'tinymce' : 'form-input' }} bc-textarea-{{ $getId }}"
        id="{{ $getId }}"
        name="{{ $name }}"
        rows="7"
        placeholder="{{ $getPlaceholder() }}"
        {{ ! $richText ? $outputRequired() : '' }}
        {{ $attributes }}
    >{!!
        old($name, $value)
    !!}</textarea>

    @include('blade-components::components.inputs.includes.comment')
    @include('blade-components::components.inputs.includes.error')
</div>

@if ($richText)
    @once
        @push ('scripts')
            <script>
                $(document).ready(function () {
                    tinymce.init({
                        selector: '.bc-textarea-{{ $getId }}',
                        plugins: 'autoresize advlist hr charmap fullscreen insertdatetime image link preview searchreplace visualblocks wordcount help lists code',
                        toolbar: 'fullscreen | undo redo | bold italic forecolor backcolor styleselect | numlist bullist | alignleft aligncenter alignright alignjustify | link insertfile image | a11ycheck preview code visualblocks wordcount | searchreplace | help',
                        advlist_bullet_styles: "square",
                        automatic_uploads: true,
                        branding: false,
                        max_height: 600,
                        min_height: 400,
                        paste_data_images : true,
                        file_picker_types: 'image',
                        relative_urls: false,
                        document_base_url: '',
                        images_upload_handler: function (blobInfo, success, failure) {
                            let xhr, formData;

                            xhr = new XMLHttpRequest();
                            xhr.withCredentials = false;
                            xhr.open('POST', "{{ route('blade-components.images') }}");
                            xhr.setRequestHeader("X-CSRF-Token", "{{ csrf_token() }}");

                            xhr.onload = function() {
                                let json;

                                if (xhr.status != 200) {
                                    failure('HTTP Error: ' + xhr.status);
                                    return;
                                }

                                json = JSON.parse(xhr.responseText);

                                if (! json) {
                                    failure('Invalid JSON: ' + xhr.responseText);

                                    return;
                                }

                                success(json);
                            };

                            formData = new FormData();
                            formData.append('image', blobInfo.blob(), blobInfo.filename());

                            xhr.send(formData);
                        }
                    });
                })
            </script>
        @endpush
    @endonce
@endif
