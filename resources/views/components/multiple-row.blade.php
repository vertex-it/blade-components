<div class="flex flex-wrap lg:flex-nowrap gap-x-2 items-center justify-end bc-multiple">
    {{ $slot }}
    @if ($sortable)
        <div class="-mt-6 lg:mt-0 bc-sort-row">
            <button
                class="cursor-move btn btn-transparent rounded-full hover:bg-gray-100 hidden lg:block text-gray-700 px-3 py-3 mb-2"
                type="button"
                title="{{ __('blade-components::components.sort_row') }}"
            >
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                </svg>
            </button>

            <button
                class="cursor-move btn btn-white btn-sm btn-has-icon shadow-sm font-normal lg:hidden mb-6"
                type="button"
                title="{{ __('blade-components::components.sort_row') }}"
            >
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                </svg>
                Sort
            </button>
        </div>
    @endif
    <div class="-mt-6 lg:mt-0 btn-group-delete-row">
        <button
            class="btn btn-white btn-sm text-red-500 btn-has-icon shadow-sm font-normal bc-delete-row lg:hidden mb-6"
            type="button"
        >
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
            </svg>
            Delete
        </button>

        <button
            class="btn btn-transparent rounded-full hover:bg-gray-100 bc-delete-row hidden lg:block text-red-500 px-3 py-3 mb-2"
            type="button"
            title="{{ __('blade-components::components.delete_row') }}"
        >
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
            </svg>
        </button>
    </div>
</div>
