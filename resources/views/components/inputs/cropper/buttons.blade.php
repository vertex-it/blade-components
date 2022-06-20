<div class="js-cropper-tools mt-6" data-name="{{ $name }}" style="display: none;">
    <div style="height: 500px;">
        <img id="cropper-image-{{ $name }}" style="height: 100%;">
    </div>

    <div class="flex justify-center flex-wrap my-3 cropper-details-{{ $name }}" data-name="{{ $name }}">
        <div class="mr-5 view-modes mb-3">
            <button class="btn btn-white shadow-sm font-bold cropper-vm" data-value="1">
                {{ __('Keep') }}
            </button>

            <button class="btn btn-white shadow-sm font-normal cropper-vm" data-value="0">
                {{ __('Expand') }}
            </button>
        </div>

        <div class="aspect-ratios mb-3">
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
        class="block btn btn-primary mx-auto"
        data-name="{{ $name }}"
        type="button"
    >
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-flex" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M14.121 14.121L19 19m-7-7l7-7m-7 7l-2.879 2.879M12 12L9.121 9.121m0 5.758a3 3 0 10-4.243 4.243 3 3 0 004.243-4.243zm0-5.758a3 3 0 10-4.243-4.243 3 3 0 004.243 4.243z" />
        </svg>
        {{ __('Crop') }}
    </button>
</div>
