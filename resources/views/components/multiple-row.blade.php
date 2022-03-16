<div class="flex flex-wrap lg:flex-nowrap gap-x-2 items-center justify-end bc-multiple">
    {{ $slot }}
    @if ($sortable)
        <div class="-mt-6 lg:mt-0 bc-sort-row">
            <button
                class="cursor-move btn btn-transparent rounded-full hover:bg-gray-100 hidden lg:block text-gray-700 px-3 py-3 mb-2"
                type="button"
                title="{{ __('blade-components::components.sort_row') }}"
            >
                <x-heroicon-o-selector height="16" width="16" />
            </button>

            <button
                class="cursor-move btn btn-white btn-sm btn-has-icon shadow-sm font-normal lg:hidden mb-6"
                type="button"
                title="{{ __('blade-components::components.sort_row') }}"
            >
                <x-heroicon-o-selector height="16" width="16" /> Sort
            </button>
        </div>
    @endif
    <div class="-mt-6 lg:mt-0 btn-group-delete-row">
        <button
            class="btn btn-white btn-sm text-red-500 btn-has-icon shadow-sm font-normal bc-delete-row lg:hidden mb-6"
            type="button"
        >
            <x-heroicon-o-trash height="16" width="16" /> Delete
        </button>

        <button
            class="btn btn-transparent rounded-full hover:bg-gray-100 bc-delete-row hidden lg:block text-red-500 px-3 py-3 mb-2"
            type="button"
            title="{{ __('blade-components::components.delete_row') }}"
        >
            <x-heroicon-o-trash height="16" width="16" />
        </button>
    </div>
</div>
