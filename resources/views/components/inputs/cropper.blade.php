<div class="form-group">
    <div class="">
        @include('blade-components::components.inputs.includes.label')
        <div class="form-input">
            <label
                for="{{ $getId }}"
                class="block cursor-pointer"
            >
                <span class="text-gray-400 flex items-center">
                    <svg width="16" height="16" class="mr-2" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <span id="{{ $getId }}_imagename">{{ __('blade-components::components.choose_file') }}</span>
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
{{--        <div class="custom-file">--}}
{{--            <input--}}
{{--                class="custom-file-input"--}}
{{--                data-aspect-ratio-x="{{ $aspectRatioX ?? 0 }}"--}}
{{--                data-aspect-ratio-y="{{ $aspectRatioY ?? 0 }}"--}}
{{--                data-name="{{ $name }}"--}}
{{--                id="{{ $getId }}"--}}
{{--                type="file"--}}
{{--                {{ ! old($name, $value) ? $outputRequired() : '' }}--}}
{{--                {{ $attributes }}--}}
{{--            >--}}
{{--            <label class="custom-file-label" for="{{ $name }}">--}}
{{--                <x-heroicon-o-upload height="20px" width="20px" class="float-left mr-1" />--}}
{{--                <p>{{ __('blade-components::components.choose_file') }}</p>--}}
{{--            </label>--}}
{{--        </div>--}}

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

    <div class="w-full md:w-1/2">
        <img
            src="{{ old($name, $value) }}"
            class="preview_{{ $name }}_cropped mt-3 rounded-lg border border-gray-200 p-1"
            @if (! old($name, $value))
                style="display: none;"
            @endif
        >
    </div>
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
