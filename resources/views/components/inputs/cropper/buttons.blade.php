<div class="js-cropper-tools mt-6" data-name="{{ $name }}" style="display: none;">
    <div style="height: 500px;">
        <img id="cropper-image-{{ $name }}" style="height: 100%;">
    </div>

    <div class="flex justify-center my-6 cropper-details-{{ $name }}" data-name="{{ $name }}">
        <div class="mr-5 view-modes">
            <button class="btn btn-white shadow-sm font-bold cropper-vm" data-value="1">
                {{ __('Keep') }}
            </button>

            <button class="btn btn-white shadow-sm font-normal cropper-vm" data-value="0">
                {{ __('Expand') }}
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

    <div class="flex space-x-3 justify-center mb-6 text-gray-600 text-sm">
        <div>
            <label class="form-label az-content-{{ $name }}" for="cropper-{{ $name }}-x">
                X
            </label>

            <input class="form-input cropper-input-details cropper-{{ $name }}-x" id="cropper-{{ $name }}-x" type="number">
        </div>

        <div>
            <label class="form-label az-content-{{ $name }}" for="cropper-{{ $name }}-y">
                Y
            </label>

            <input class="form-input cropper-input-details cropper-{{ $name }}-y" id="cropper-{{ $name }}-y" type="number">
        </div>

        <div>
            <label class="form-label az-content-{{ $name }}" for="cropper-{{ $name }}-height">
                {{ __('Height') }} (px)
            </label>

            <input class="form-input cropper-input-details cropper-{{ $name }}-height" id="cropper-{{ $name }}-height" type="number">
        </div>

        <div>
            <label class="form-label az-content-{{ $name }}" for="cropper-{{ $name }}-width">
                {{ __('Width') }} (px)
            </label>

            <input class="form-input cropper-input-details cropper-{{ $name }}-width" id="cropper-{{ $name }}-width" type="number">
        </div>
    </div>

    <button
        id="btn-crop-{{ $name }}"
        class="btn btn-black mx-auto"
        data-name="{{ $name }}"
        type="button"
    >
        <x-heroicon-o-scissors height="20px" width="20px" class="float-left mr-1" />
        {{ __('Crop') }}
    </button>
</div>
