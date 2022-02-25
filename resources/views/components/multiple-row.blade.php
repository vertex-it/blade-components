<div class="flex flex-wrap lg:flex-nowrap gap-x-2 items-center bc-multiple">
    {{ $slot }}
    @if ($sortable)
        <div class="bc-sort-row">
            <button
                class="cursor-move btn btn-transparent font-medium hidden lg:block text-gray-700 py-3 mb-2"
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
    <div class="btn-group-delete-row">
        <button
            class="btn btn-white btn-sm text-red-500 btn-has-icon shadow-sm font-normal bc-delete-row lg:hidden mb-6"
            type="button"
        >
            <x-heroicon-o-trash height="16" width="16" /> Delete
        </button>

        <button
            class="btn btn-transparent font-medium bc-delete-row hidden lg:block text-red-500 py-3 mb-2"
            type="button"
            title="{{ __('blade-components::components.delete_row') }}"
        >
            <x-heroicon-o-x height="16" width="16" />
        </button>
    </div>
</div>
