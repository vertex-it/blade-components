<div class="row bc-multiple">
    {{ $slot }}
    <div class="col-lg-1 col-xs-12">
        <div class="form-group">
            <button class="btn btn-light btn-block mt-2 bc-delete-row d-block d-lg-none" type="button">
                <x-heroicon-o-trash height="20px" width="20px" class="float-left mr-1" />
                {{ __('blade-components::components.delete_button') }}
            </button>

            <button class="btn btn-light mt-4 bc-delete-row d-none d-lg-block" type="button">
                <x-heroicon-o-trash height="20px" width="20px" class="float-left" />
            </button>
        </div>
    </div>
</div>
