<div class="js-cropper-tools mb-3" data-name="{{ $name }}" style="display: none;">
    <img id="cropper-image-{{ $name }}" style="height: 400px;">

    <div
        class="row col-12 d-flex justify-content-center mt-3 cropper-details-{{ $name }} mb-4"
        data-name="{{ $name }}"
    >
        <div class="mr-4 view-modes">
            <button class="btn btn-light cropper-vm font-weight-bold" data-value="0">
                {{ __('Expand') }}
            </button>

            <button class="btn btn-light cropper-vm" data-value="1">
                {{ __('Keep') }}
            </button>
        </div>

        <div class="aspect-ratios">
            @foreach ([[1,1], [2,3], [4,3], [16,9], [0,0]] as $ratios)
                @include('blade-components::components.inputs.cropper.button', [
                    'aspectRatioX' => $aspectRatioX,
                    'aspectRatioY' => $aspectRatioY,
                    'x' => $ratios[0],
                    'y' => $ratios[1],
                ])
            @endforeach
        </div>
    </div>

    <div class="row row-xs mb-4">
        <div class="col-md-3">
            <label class="az-content-{{ $name }} tx-11 tx-medium tx-gray-600">
                X
            </label>

            <input class="form-control cropper-input-details cropper-{{ $name }}-x" type="number">
        </div>

        <div class="col-md-3 mg-t-10 mg-md-t-0">
            <label class="az-content-{{ $name }} tx-11 tx-medium tx-gray-600">
                Y
            </label>

            <input class="form-control cropper-input-details cropper-{{ $name }}-y" type="number">
        </div>

        <div class="col-md-3 mg-t-10 mg-md-t-0">
            <label class="az-content-{{ $name }} tx-11 tx-medium tx-gray-600">
                {{ __('Height') }} (px)
            </label>

            <input class="form-control cropper-input-details cropper-{{ $name }}-height" type="number">
        </div>

        <div class="col-md-3 mg-t-10 mg-md-t-0">
            <label class="az-content-{{ $name }} tx-11 tx-medium tx-gray-600">
                {{ __('Width') }} (px)
            </label>

            <input class="form-control cropper-input-details cropper-{{ $name }}-width" type="number">
        </div>
    </div>

    <div class="row">
        <div class="col-12 text-center">
            <button
                id="btn-crop-{{ $name }}"
                class="btn btn-secondary"
                data-name="{{ $name }}"
                type="button"
            >
                <i class="fa fa-cut"></i>
                &nbsp;&nbsp;&nbsp;
                {{ __('Crop') }}
            </button>
        </div>
    </div>
</div>