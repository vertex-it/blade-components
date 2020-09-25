<div class="row bc-multiple">
    {{ $slot }}
    <div class="col-lg-1 col-xs-12">
        <div class="form-group">
            <button class="btn btn-outline-danger btn-block mt-2 bc-delete-row d-block d-lg-none" type="button">
                <i class="fa fa-trash"></i>
                {{ __('blade-components::components.delete_button') }}
            </button>

            <button class="btn btn-outline-danger mt-4 bc-delete-row d-none d-lg-block" type="button">
                <i class="fa fa-trash"></i>
            </button>
        </div>
    </div>
</div>