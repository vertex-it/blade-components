<div class="flex flex-wrap lg:flex-nowrap gap-x-2 items-center bc-multiple">
    {{ $slot }}
    <div class="cursor-move btn btn-transparent btn-sm py-3 shadow-none font-normal bc-sort-row hidden lg:block">
        <x-heroicon-o-menu height="16" width="16" />
    </div>
    <div>
        <button
            class="btn btn-white btn-sm text-red-500 btn-has-icon shadow-sm font-normal bc-delete-row lg:hidden mb-6"
            type="button"
        >
            <x-heroicon-o-trash height="16" width="16" /> Delete
        </button>

        <button
            class="btn btn-transparent shadow-none font-normal bc-delete-row hidden lg:block py-3 text-red-500"
            type="button"
            title="{{ __('blade-components::components.delete_row') }}"
        >
            <x-heroicon-o-x height="16" width="16" />
        </button>
    </div>
</div>
