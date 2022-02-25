<div class="form-group">
    <div class="">
        @include('blade-components::components.inputs.includes.label')
        <div class="inline-block">
            <label for="{{ $getId }}" class="block btn btn-white shadow-sm font-normal ">
                <span class="btn-has-icon">
                    <x-heroicon-o-camera height="16" width="16" />
                    <span id="{{ $getId }}_imagename">{{ __('blade-components::components.choose_image') }}</span>
                </span>
                <input
                    class="sr-only"
                    data-aspect-ratio-x="{{ $aspectRatioX ?? 0 }}"
                    data-aspect-ratio-y="{{ $aspectRatioY ?? 0 }}"
                    data-name="{{ $name }}"
                    id="{{ $getId }}"
                    type="file"
                    {{ ! old($name, $value) ? $outputRequired() : '' }}
                    {{ $attributes }}
                >
            </label>
        </div>

        <input
            type="hidden"
            id="{{ $name }}_cropped"
            @if(old($name))
                name="{{ $name }}"
                value="{{ old($name) }}"
            @endif
            {{ $attributes }}
        >

        @include('blade-components::components.inputs.includes.comment')
        @include('blade-components::components.inputs.includes.error')
    </div>

    @include('blade-components::components.inputs.cropper.buttons')

    <img
        src="{{ old($name, $value) }}"
        class="preview_{{ $name }}_cropped mt-3 rounded h-36"
        @if (! old($name, $value))
            style="display: none;"
        @endif
    >
</div>

@push ('scripts')
    <script>
        $(document).ready(function () {
            $('#{{ $getId }}').change(function() {
                var fullName = this.value.split('\\').pop().split('.');
                var fileName = fullName[0];
                var extension = fullName[1];

                if (fileName.length > 0) {
                    if (fileName.length > 25) {
                        fileName = fileName.substring(0, 25) + '...' + extension;
                    } else {
                        fileName = fileName + '.' + extension;
                    }
                } else {
                    fileName = "{{ __('blade-components::components.choose_file') }}";
                }

                document.getElementById("{{ $getId }}_imagename").innerHTML = fileName;
                document.getElementById("{{ $getId }}_imagename").style.color='#1F2937';

                let name = $(this).data('name');
                let aspectRatio = {
                    x: parseInt($(this).data('aspect-ratio-x')),
                    y: parseInt($(this).data('aspect-ratio-y')),
                };

                $('.preview_{{ $name }}_cropped').hide();
                $('.js-cropper-tools[data-name="' + name + '"]').show();

                readURL(this, name, aspectRatio);
            });
        });

        function readURL(input, name, aspectRatio) {
            if (input.files && input.files[0]) {
                let reader = new FileReader();

                reader.onload = function(e) {
                    $('#cropper-image-' + name).attr('src', e.target.result);

                    initCropper(input, name, aspectRatio, 1);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        function initCropper(input, name, aspectRatio, viewMode) {
            var $element = $('#cropper-image-' + name);
            $element.cropper('destroy');

            $element.cropper({
                aspectRatio: aspectRatio.x / aspectRatio.y,
                viewMode: viewMode,
                crop (event) {
                    $('.cropper-' + name + '-x').val(Math.round(event.detail.x));
                    $('.cropper-' + name + '-y').val(Math.round(event.detail.y));
                    $('.cropper-' + name + '-height').val(Math.round(event.detail.height));
                    $('.cropper-' + name + '-width').val(Math.round(event.detail.width));
                }
            });
        }

        $('#btn-crop-{{ $name }}').on('click', function (e) {
            e.preventDefault();

            let name = $(this).data('name');

            $('#cropper-image-' + name).cropper('getCroppedCanvas', {
                fillColor: '#fff',
            }).toBlob(function (blob) {
                let formData = new FormData();

                formData.append('image', blob);

                $.ajax({
                    method: 'POST',
                    url: '{{ route("blade-components.images") }}',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        if (! data) {
                            toastr.error('{{ __('Failure. The size of the cropped image is: ') }}' + formatBytes(blob.size, 2));

                            return;
                        }

                        let image = data;

                        $('#' + name + '_cropped')
                            .attr('name', name)
                            .val(image);

                        $('.preview_' + name + '_cropped').attr('src', image).show();

                        $('#cropper-image-' + name).cropper('destroy');
                        $('#cropper-image-' + name).removeAttr('src').hide();

                        $('.js-cropper-tools[data-name="' + name + '"]').hide();

                        toastr.success('{{ __("Image has been cropped") }}');
                    },
                    error: function (data) {
                        toastr.error('{{ __('Cropper failed') }}');
                    }
                });
            }, 'image/jpeg');
        });

        $('.cropper-vm').on('click', function (e) {
            e.preventDefault();

            $(this).parent().children('.font-bold').removeClass('font-bold').addClass('font-normal');
            $(this).addClass('font-bold');

            let name = $(this).parent().parent().data('name');
            let viewMode = parseInt($(this).data('value'));
            let activeAspectRatio = $(this).parent().parent().find('.aspect-ratios').find('.font-bold');
            let aspectRatio = {
                x: parseInt(activeAspectRatio.data('aspect-ratio-x')),
                y: parseInt(activeAspectRatio.data('aspect-ratio-y')),
            };

            initCropper(null, name, aspectRatio, viewMode);
        });

        $('.cropper-ar').on('click', function (e) {
            e.preventDefault();

            $(this).parent().children('.font-bold').removeClass('font-bold').addClass('font-normal');
            $(this).addClass('font-bold');

            let name = $(this).parent().parent().data('name');
            let viewMode = $(this).parent().parent().find('.view-modes').find('.font-bold').data('value');
            let aspectRatio = {
                x: parseInt($(this).data('aspect-ratio-x')),
                y: parseInt($(this).data('aspect-ratio-y')),
            };

            initCropper(null, name, aspectRatio, viewMode);
        });

        $('.cropper-input-details').on("change", function (e) {
            e.preventDefault();

            if (! $.isNumeric($(this).val())) {
                return;
            }

            let name = $(this).parents(':eq(2)').data('name');

            let x = parseFloat($(this).parent().parent().find('input.cropper-' + name + '-x').val());
            let y = parseFloat($(this).parent().parent().find('input.cropper-' + name + '-y').val());
            let width = parseFloat($(this).parent().parent().find('input.cropper-' + name + '-width').val());
            let height = parseFloat($(this).parent().parent().find('input.cropper-' + name + '-height').val());

            $('#cropper-image-' + name).cropper('setData', {
                x: x,
                y: y,
                height: height,
                width: width,
            });
        });

        function formatBytes(a,b) {
            if (0 == a) return "0 Bytes";
            let c = 1024,
                d = b || 2,
                e = ["Bytes", "KB", "MB", "GB", "TB", "PB", "EB", "ZB", "YB"],
                f = Math.floor(Math.log(a) / Math.log(c));

            return parseFloat((a / Math.pow(c, f)).toFixed(d)) + " " + e[f];
        }
    </script>
@endpush

{{--@push('styles')--}}
{{--    <style>--}}
{{--        .custom-file-input:lang(en) ~ .custom-file-label::after {--}}
{{--            content: none;--}}
{{--        }--}}
{{--    </style>--}}
{{--@endpush--}}
