<div class="js-cropper-group">
    <div class="form-group row">
        <div class="col-sm-7 col-md-6 col-lg-4">
            @include('blade-components::components.inputs.includes.label')

            <div class="custom-file">
                <input
                    class="custom-file-input"
                    data-aspect-ratio-x="{{ $aspectRatioX ?? 0 }}"
                    data-aspect-ratio-y="{{ $aspectRatioY ?? 0 }}"
                    data-name="{{ $name }}"
                    id="bc-{{ $name }}"
                    type="file"
                    {{ $outputRequired() }}
                    {{ $attributes }}
                >
                <label class="custom-file-label" for="{{ $name }}">
                    Choose image
                </label>
            </div>

            @include('blade-components::components.inputs.includes.comment')
            @include('blade-components::components.inputs.includes.error')
        </div>
    </div>

    @include ('blade-components::components.inputs.cropper.buttons')

    <input
        type="hidden"
        id="{{ $name }}_cropped"
        @if(old($name))
            name="{{ $name }}"
            value="{{ old($name) }}"
        @endif
        {{ $attributes }}
    >

    <img
        src="{{ old("{$name}") }}"
        class="old_{{ $name }}_cropped mb-3 img-thumbnail"
        @if(! old("{$name}"))
            style="display: none; max-height: 300px; max-width: 500px;"
        @endif
    >
    <div class="old_{{ $name }}_value">
        @if($value && ! old($name))
            <img
                src="{{ $value }}"
                style="max-height: 300px; max-width: 500px;"
                class="mb-3 img-thumbnail"
            >
        @endif
    </div>
</div>

@push ('scripts')
    <script>
        $(document).ready(function () {
            $('#bc-{{ $name }}').change(function() {
                let name = $(this).data('name');
                let aspectRatio = {
                    x: parseInt($(this).data('aspect-ratio-x')),
                    y: parseInt($(this).data('aspect-ratio-y')),
                };

                $('.old_' + name + '_cropped').hide();
                $('.old_' + name + '_value').hide();
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

                        $('.old_' + name + '_cropped').attr('src', image).show();

                        $('#cropper-image-' + name).cropper('destroy');
                        $('#cropper-image-' + name).removeAttr('src').hide();

                        $('.js-cropper-tools[data-name="' + name + '"]').hide();
                        $('.' + name + '_old').hide();

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

            $(this).parent().children('.font-weight-bold').removeClass('font-weight-bold');
            $(this).addClass('font-weight-bold');

            let name = $(this).parent().parent().data('name');
            let viewMode = parseInt($(this).data('value'));
            let activeAspectRatio = $(this).parent().parent().find('.aspect-ratios').find('.font-weight-bold');
            let aspectRatio = {
                x: parseInt(activeAspectRatio.data('aspect-ratio-x')),
                y: parseInt(activeAspectRatio.data('aspect-ratio-y')),
            };

            initCropper(null, name, aspectRatio, viewMode);
        });

        $('.cropper-ar').on('click', function (e) {
            e.preventDefault();

            $(this).parent().children('.font-weight-bold').removeClass('font-weight-bold');
            $(this).addClass('font-weight-bold');

            let name = $(this).parent().parent().data('name');
            let viewMode = $(this).parent().parent().find('.view-modes').find('.font-weight-bold').data('value');
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
