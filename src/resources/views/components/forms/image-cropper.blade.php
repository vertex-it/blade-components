<div class="js-cropper-group">
    <div class="form-group row">
        <div class="col-sm-7 col-md-6 col-lg-4">
            <label
                class="az-content-label tx-11 tx-medium tx-gray-600"
                for="{{ $name }}"
            >{{ $label ?? ucfirst(str_replace('_', ' ', $name)) }} @if($required)<span class="text-danger">*</span>@endif</label>
            <div class="custom-file">
                <input
                    type="file"
                    class="custom-file-input js-cropper @error($name) parsley-error @enderror"
{{--                    name="{{ $name }}"--}}
                    id="{{ $name }}"
                    @if($required) required @endif
                    data-name="{{ $name }}"
                    data-aspect-ratio-x="{{ $aspectRatioX ?? 0 }}"
                    data-aspect-ratio-y="{{ $aspectRatioY ?? 0 }}"
                >
                <label class="custom-file-label" for="{{ $name }}">Choose image</label>
            </div>
            @error($name)
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="js-cropper-tools" data-name="{{ $name }}" style="display: none;">
        <img id="cropper-image-{{ $name }}" style="height: 400px;">
        <div class="row col-12 d-flex justify-content-center mt-3 cropper-details-{{ $name }} mb-4" data-name="{{ $name }}">
            <div class="mr-4 view-modes">
                <button class="btn btn-light cropper-vm font-weight-bold" data-value="0">{{ __('Expand') }}</button>
                <button class="btn btn-light cropper-vm" data-value="1">{{ __('Keep') }}</button>
            </div>
            <div class="aspect-ratios">
                @if(in_array($aspectRatioX, [false, 1]) && in_array($aspectRatioY, [false, 1]))
                    <button
                        class="btn btn-light cropper-ar @if($aspectRatioX === 1 && $aspectRatioY === 1) font-weight-bold @endif"
                        data-aspect-ratio-x="1"
                        data-aspect-ratio-y="1"
                    >1/1</button>
                @endif
                @if(in_array($aspectRatioX, [false, 2]) && in_array($aspectRatioY, [false, 3]))
                    <button
                        class="btn btn-light cropper-ar @if($aspectRatioX === 2 && $aspectRatioY === 3) font-weight-bold @endif"
                        data-aspect-ratio-x="2"
                        data-aspect-ratio-y="3"
                    >2/3</button>
                @endif
                @if(in_array($aspectRatioX, [false, 4]) && in_array($aspectRatioY, [false, 3]))
                    <button
                        class="btn btn-light cropper-ar @if($aspectRatioX === 4 && $aspectRatioY === 3) font-weight-bold @endif"
                        data-aspect-ratio-x="4"
                        data-aspect-ratio-y="3"
                    >4/3</button>
                @endif
                @if(in_array($aspectRatioX, [false, 16]) && in_array($aspectRatioY, [false, 9]))
                    <button
                        class="btn btn-light cropper-ar @if($aspectRatioX === 16 && $aspectRatioY === 9) font-weight-bold @endif"
                        data-aspect-ratio-x="16"
                        data-aspect-ratio-y="9"
                    >16/9</button>
                @endif
                @if(in_array($aspectRatioX, [false]) && in_array($aspectRatioY, [false]))
                    <button
                        class="btn btn-light cropper-ar @if(in_array($aspectRatioX, [false]) && in_array($aspectRatioY, [false])) font-weight-bold @endif"
                        data-aspect-ratio-x="0"
                        data-aspect-ratio-y="0"
                    >Free</button>
                @endif
            </div>
        </div>
        <div class="row row-xs mb-4">
            <div class="col-md-3">
                <label class="az-content-{{ $name }} tx-11 tx-medium tx-gray-600">X</label>
                <input class="form-control cropper-input-details cropper-{{ $name }}-x" type="number">
            </div>
            <div class="col-md-3 mg-t-10 mg-md-t-0">
                <label class="az-content-{{ $name }} tx-11 tx-medium tx-gray-600">Y</label>
                <input class="form-control cropper-input-details cropper-{{ $name }}-y" type="number">
            </div>
            <div class="col-md-3 mg-t-10 mg-md-t-0">
                <label class="az-content-{{ $name }} tx-11 tx-medium tx-gray-600">{{ __('Height') }} (px)</label>
                <input class="form-control cropper-input-details cropper-{{ $name }}-height" type="number">
            </div>
            <div class="col-md-3 mg-t-10 mg-md-t-0">
                <label class="az-content-{{ $name }} tx-11 tx-medium tx-gray-600">{{ __('Width') }} (px)</label>
                <input class="form-control cropper-input-details cropper-{{ $name }}-width" type="number">
            </div>
        </div>
        <div class="row">
            <div class="col-12 text-center">
                <button
                    id="btn-crop-{{ $name }}"
                    class="btn btn-secondary btn-crop"
                    data-name="{{ $name }}"
                >
                    <i class="fa fa-cut"></i>&nbsp;&nbsp;&nbsp;{{ __('Crop') }}
                </button>
            </div>
        </div>
    </div>
    <input
        type="hidden"
        name="{{ $name }}"
        id="{{ $name }}_cropped"
        value="{{ old("{$name}") }}"
    >
    <img
        src="{{ old("{$name}") }}"
        width="500px"
        class="old_{{ $name }}_cropped mb-3"
        @if (! old("{$name}"))
            style="display: none;"
        @endif
    >
    <div class="old_{{ $name }}_value">
        @if($value)
            <img
                src="{{ $value }}"
                width="500px"
                class="mb-3"
            >
        @endif
    </div>
</div>

@push('scripts')
    <script>
        $(document).ready(function () {
            $('.js-cropper').change(function() {
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

                    initCropper(input, name, aspectRatio, 0);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        function initCropper(input, name, aspectRatio, viewMode) {
            let element = $('#cropper-image-' + name);
            element.cropper('destroy');

            element.cropper({
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

        $('.btn-crop').on('click', function (e) {
            e.preventDefault();

            let name = $(this).data('name');

            $('#cropper-image-' + name).cropper('getCroppedCanvas', {
                fillColor: '#fff',
            }).toBlob(function (blob) {
                let formData = new FormData();

                formData.append('image', blob);

                $.ajax({
                    method: 'POST',
                    url: '{{ route('blade-components.images') }}',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        if (! data) {
                            toastr.error('{{ __('Failure. The size of the cropped image is: ') }}' + formatBytes(blob.size, 2));

                            return;
                        }

                        let image = data;

                        $('#' + name + '_cropped').val(image);
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

        function formatBytes(a,b){
            if (0 == a) return "0 Bytes";
            let c = 1024,
                d = b || 2,
                e = ["Bytes", "KB", "MB", "GB", "TB", "PB", "EB", "ZB", "YB"],
                f = Math.floor(Math.log(a) / Math.log(c));

            return parseFloat((a / Math.pow(c, f)).toFixed(d)) + " " + e[f]
        }
    </script>
@endpush
