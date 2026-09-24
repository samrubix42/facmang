<div class="space-y-6">

    <!-- Flash Status Alert (shadcn Alert) -->
    @if (session()->has('status'))
        <div
            x-data="{ show: true }"
            x-show="show"
            x-transition
            class="relative w-full rounded-lg border border-emerald-200 bg-emerald-50/60 p-4 text-xs text-emerald-950 shadow-xs flex items-center justify-between"
            role="alert"
        >
            <div class="flex items-center gap-3">
                <i class="ri-checkbox-circle-line text-base text-emerald-600"></i>
                <div>
                    <h5 class="font-medium tracking-tight text-emerald-900">Success</h5>
                    <p class="text-xs text-emerald-700 mt-0.5">{{ session('status') }}</p>
                </div>
            </div>
            <button
                type="button"
                @click="show = false"
                class="rounded-sm opacity-70 transition-opacity hover:opacity-100 text-emerald-700 hover:text-emerald-950 p-1"
                aria-label="Dismiss alert"
            >
                <i class="ri-close-line text-base"></i>
            </button>
        </div>
    @endif

    <!-- Page Header (shadcn style) -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 border-b border-slate-200/80 pb-5">
        <div class="space-y-1">
            <h1 class="text-2xl font-semibold tracking-tight text-slate-950">
                Gallery Categories
            </h1>
            <p class="text-xs text-slate-500">
                Organize the public portfolio grid into filterable capability categories.
            </p>
        </div>

        <div class="flex items-center gap-2">
            <button
                type="button"
                wire:click="openCreateModal"
                class="inline-flex h-9 items-center justify-center rounded-md bg-slate-900 px-4 py-2 text-xs font-medium text-slate-50 shadow-xs transition-colors hover:bg-slate-900/90 focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-slate-950 disabled:pointer-events-none disabled:opacity-50 cursor-pointer gap-2"
            >
                <i class="ri-add-line text-sm"></i>
                <span>Add Category</span>
            </button>
        </div>
    </div>

    <!-- Filter & Search Toolbar (shadcn toolbar) -->
    <div class="flex flex-col sm:flex-row items-stretch sm:items-center justify-between gap-3">
        <!-- Search Input -->
        <div class="relative w-full sm:max-w-xs">
            <i class="ri-search-line absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-xs"></i>
            <input
                type="text"
                wire:model.live.debounce.300ms="search"
                placeholder="Filter categories..."
                class="flex h-9 w-full rounded-md border border-slate-200 bg-white pl-8 pr-8 py-1 text-xs shadow-xs transition-colors placeholder:text-slate-400 focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-slate-950"
            />
            @if($search)
                <button
                    type="button"
                    wire:click="$set('search', '')"
                    class="absolute right-2.5 top-1/2 -translate-y-1/2 text-slate-400 hover:text-slate-600 text-xs"
                >
                    <i class="ri-close-line"></i>
                </button>
            @endif
        </div>

        <!-- Filter Segmented Tabs (shadcn Tabs) -->
        <div class="inline-flex h-9 items-center justify-center rounded-lg bg-slate-100 p-1 text-slate-500 self-start sm:self-auto border border-slate-200/50">
            <button
                type="button"
                wire:click="$set('filterStatus', 'all')"
                class="inline-flex items-center justify-center whitespace-nowrap rounded-md px-3 py-1 text-xs font-medium transition-all cursor-pointer {{ $filterStatus === 'all' ? 'bg-white text-slate-950 shadow-xs font-semibold' : 'text-slate-600 hover:text-slate-900' }}"
            >
                All
            </button>
            <button
                type="button"
                wire:click="$set('filterStatus', 'active')"
                class="inline-flex items-center justify-center whitespace-nowrap rounded-md px-3 py-1 text-xs font-medium transition-all cursor-pointer {{ $filterStatus === 'active' ? 'bg-white text-slate-950 shadow-xs font-semibold' : 'text-slate-600 hover:text-slate-900' }}"
            >
                Active
            </button>
            <button
                type="button"
                wire:click="$set('filterStatus', 'inactive')"
                class="inline-flex items-center justify-center whitespace-nowrap rounded-md px-3 py-1 text-xs font-medium transition-all cursor-pointer {{ $filterStatus === 'inactive' ? 'bg-white text-slate-950 shadow-xs font-semibold' : 'text-slate-600 hover:text-slate-900' }}"
            >
                Hidden
            </button>
        </div>
    </div>

    <!-- Gallery Categories Table (shadcn Table) -->
    <div class="rounded-lg border border-slate-200 bg-white shadow-xs overflow-hidden">
        <div class="relative w-full overflow-auto">
            <table class="w-full caption-bottom text-xs">
                <thead class="[&_tr]:border-b border-slate-200 bg-slate-50/70">
                    <tr class="border-b transition-colors">
                        <th class="h-10 px-4 text-left align-middle font-medium text-slate-500 text-xs">Category</th>
                        <th class="h-10 px-4 text-left align-middle font-medium text-slate-500 text-xs hidden sm:table-cell">Slug</th>
                        <th class="h-10 px-4 text-left align-middle font-medium text-slate-500 text-xs">Status</th>
                        <th class="h-10 px-4 text-right align-middle font-medium text-slate-500 text-xs">Actions</th>
                    </tr>
                </thead>
                <tbody class="[&_tr:last-child]:border-0 divide-y divide-slate-100">
                    @forelse($this->categories as $item)
                        <tr class="transition-colors hover:bg-slate-50/60">
                            <!-- Category -->
                            <td class="p-4 align-middle">
                                <div class="flex items-center gap-3">
                                    <div class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-slate-100 text-slate-800 border border-slate-200">
                                        <i class="ri-image-2-line text-sm"></i>
                                    </div>
                                    <div class="min-w-0">
                                        <p class="font-medium text-slate-900 truncate">
                                            {{ $item->name }}
                                        </p>
                                        <p class="text-[11px] text-slate-500 truncate">
                                            Used on the public gallery filter bar
                                        </p>
                                    </div>
                                </div>
                            </td>

                            <!-- Slug -->
                            <td class="p-4 align-middle hidden sm:table-cell">
                                <code class="rounded-md bg-slate-100 px-2 py-0.5 text-[11px] font-medium text-slate-700 border border-slate-200">
                                    {{ $item->slug }}
                                </code>
                            </td>

                            <!-- Status Badge (shadcn Badge) -->
                            <td class="p-4 align-middle whitespace-nowrap">
                                <button
                                    type="button"
                                    wire:click="toggleStatus({{ $item->id }})"
                                    title="Click to toggle status"
                                    class="inline-flex items-center gap-1.5 rounded-md px-2 py-0.5 text-[11px] font-medium transition-colors cursor-pointer {{ $item->is_active ? 'border border-emerald-200 bg-emerald-50 text-emerald-800 hover:bg-emerald-100' : 'border border-slate-200 bg-slate-100 text-slate-700 hover:bg-slate-200' }}"
                                >
                                    <span class="h-1.5 w-1.5 rounded-full {{ $item->is_active ? 'bg-emerald-500' : 'bg-slate-400' }}"></span>
                                    <span>{{ $item->is_active ? 'Active' : 'Hidden' }}</span>
                                </button>
                            </td>

                            <!-- Actions (shadcn Ghost buttons) -->
                            <td class="p-4 align-middle text-right whitespace-nowrap">
                                <div class="inline-flex items-center gap-1 justify-end">
                                    <button
                                        type="button"
                                        wire:click="openEditModal({{ $item->id }})"
                                        title="Edit"
                                        class="inline-flex h-8 w-8 items-center justify-center rounded-md text-slate-500 hover:bg-slate-100 hover:text-slate-900 transition-colors cursor-pointer"
                                    >
                                        <i class="ri-edit-line text-sm"></i>
                                    </button>
                                    <button
                                        type="button"
                                        wire:click="confirmDelete({{ $item->id }})"
                                        title="Delete"
                                        class="inline-flex h-8 w-8 items-center justify-center rounded-md text-slate-400 hover:bg-rose-50 hover:text-rose-600 transition-colors cursor-pointer"
                                    >
                                        <i class="ri-delete-bin-line text-sm"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="p-8 text-center text-slate-500">
                                <div class="max-w-xs mx-auto flex flex-col items-center">
                                    <div class="h-10 w-10 rounded-full bg-slate-100 border border-slate-200 flex items-center justify-center text-slate-400 mb-2">
                                        <i class="ri-image-line text-lg"></i>
                                    </div>
                                    <p class="text-sm font-medium text-slate-900">No categories found</p>
                                    <p class="text-xs text-slate-500 mt-1 mb-4">
                                        @if($search)
                                            No categories match "{{ $search }}".
                                        @else
                                            Get started by adding your first gallery category.
                                        @endif
                                    </p>
                                    <button
                                        type="button"
                                        wire:click="openCreateModal"
                                        class="inline-flex h-8 items-center justify-center rounded-md bg-slate-900 px-3 text-xs font-medium text-slate-50 shadow-xs hover:bg-slate-900/90 transition-colors"
                                    >
                                        <i class="ri-add-line mr-1"></i>
                                        <span>Add Category</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if($this->categories->hasPages())
            <div class="p-4 border-t border-slate-200 bg-slate-50/40">
                {{ $this->categories->links() }}
            </div>
        @endif
    </div>

    <!-- Create / Edit Dialog (shadcn Dialog) -->
    <div
        x-data="{ open: @entangle('showModal') }"
        x-show="open"
        x-cloak
        class="fixed inset-0 z-50 overflow-y-auto"
        role="dialog"
        aria-modal="true"
    >
        <!-- Overlay -->
        <div
            x-show="open"
            x-transition:enter="ease-out duration-150"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="ease-in duration-100"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="fixed inset-0 bg-black/60 backdrop-blur-xs transition-opacity"
            wire:click="closeModal"
        ></div>

        <!-- Dialog Container -->
        <div class="flex min-h-full items-center justify-center p-4 text-center sm:p-0">
            <div
                x-show="open"
                x-transition:enter="ease-out duration-150"
                x-transition:enter-start="opacity-0 scale-95"
                x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="ease-in duration-100"
                x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-95"
                class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-lg transition-all w-full max-w-lg border border-slate-200 p-6 space-y-5"
            >
                <!-- Close Button -->
                <button
                    type="button"
                    wire:click="closeModal"
                    class="absolute right-4 top-4 rounded-sm opacity-70 transition-opacity hover:opacity-100 focus:outline-none p-1 text-slate-500 hover:text-slate-900 cursor-pointer"
                >
                    <i class="ri-close-line text-lg"></i>
                    <span class="sr-only">Close</span>
                </button>

                <!-- Dialog Header -->
                <div class="flex flex-col space-y-1.5 text-left">
                    <h2 class="text-base font-semibold leading-none tracking-tight text-slate-900">
                        {{ $isEditing ? 'Edit Gallery Category' : 'Create Gallery Category' }}
                    </h2>
                    <p class="text-xs text-slate-500">
                        {{ $isEditing ? 'Make changes to the category name, slug, and publish state.' : 'Add a new filter category for the public gallery grid.' }}
                    </p>
                </div>

                <!-- Form Inputs -->
                <form
                    wire:submit="save"
                    class="space-y-4"
                    x-data="{ slugTouched: false }"
                >
                    <!-- Category Name -->
                    <div class="space-y-1.5">
                        <label for="name" class="text-xs font-medium leading-none text-slate-900">
                            Category Name <span class="text-rose-500">*</span>
                        </label>
                        <input
                            type="text"
                            id="name"
                            wire:model="name"
                            placeholder="Cleaning & Sweeping"
                            @input="if (!slugTouched) { $wire.slug = $event.target.value.toLowerCase().trim().replace(/[^a-z0-9]+/g, '-').replace(/(^-|-$)/g, '') }"
                            class="flex h-9 w-full rounded-md border border-slate-200 bg-transparent px-3 py-1 text-xs shadow-xs transition-colors placeholder:text-slate-400 focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-slate-950"
                        />
                        @error('name')
                            <p class="text-[11px] text-rose-500 font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Slug -->
                    <div class="space-y-1.5">
                        <label for="slug" class="text-xs font-medium leading-none text-slate-900">
                            URL Slug
                        </label>
                        <input
                            type="text"
                            id="slug"
                            wire:model="slug"
                            placeholder="cleaning-sweeping"
                            @input="slugTouched = true"
                            class="flex h-9 w-full rounded-md border border-slate-200 bg-transparent px-3 py-1 text-xs shadow-xs transition-colors placeholder:text-slate-400 focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-slate-950"
                        />
                        <p class="text-[11px] text-slate-500">
                            Lowercase letters, numbers, and hyphens only. Leave blank to auto-generate from the name.
                        </p>
                        @error('slug')
                            <p class="text-[11px] text-rose-500 font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Is Active Switch -->
                    <div class="flex items-center justify-between rounded-md border border-slate-200 p-3 bg-slate-50/50">
                        <div class="space-y-0.5">
                            <p class="text-xs font-medium text-slate-900">Show On Website</p>
                            <p class="text-[11px] text-slate-500">Display this category in the public gallery filter bar</p>
                        </div>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input
                                type="checkbox"
                                wire:model="is_active"
                                class="sr-only peer"
                            />
                            <div class="w-8 h-4 bg-slate-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[1px] after:left-[1px] after:bg-white after:border-slate-300 after:border after:rounded-full after:h-3.5 after:w-3.5 after:transition-all peer-checked:bg-slate-900"></div>
                        </label>
                    </div>

                    <!-- Dialog Footer -->
                    <div class="flex items-center justify-end gap-2 pt-3 border-t border-slate-100">
                        <button
                            type="button"
                            wire:click="closeModal"
                            class="inline-flex h-9 items-center justify-center rounded-md border border-slate-200 bg-white px-4 py-2 text-xs font-medium text-slate-700 shadow-xs hover:bg-slate-100 hover:text-slate-900 transition-colors cursor-pointer"
                        >
                            Cancel
                        </button>
                        <button
                            type="submit"
                            wire:loading.attr="disabled"
                            class="inline-flex h-9 items-center justify-center rounded-md bg-slate-900 px-4 py-2 text-xs font-medium text-slate-50 shadow-xs hover:bg-slate-900/90 transition-colors disabled:opacity-50 cursor-pointer gap-2"
                        >
                            <span wire:loading.remove wire:target="save">
                                {{ $isEditing ? 'Save changes' : 'Create category' }}
                            </span>
                            <span wire:loading wire:target="save" class="flex items-center gap-1.5">
                                <i class="ri-loader-4-line animate-spin text-xs"></i>
                                <span>Saving...</span>
                            </span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Dialog (shadcn AlertDialog) -->
    <div
        x-data="{ open: @entangle('showDeleteModal') }"
        x-show="open"
        x-cloak
        class="fixed inset-0 z-50 overflow-y-auto"
        role="dialog"
        aria-modal="true"
    >
        <!-- Overlay -->
        <div
            x-show="open"
            x-transition:enter="ease-out duration-150"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="ease-in duration-100"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="fixed inset-0 bg-black/60 backdrop-blur-xs transition-opacity"
            wire:click="cancelDelete"
        ></div>

        <!-- Dialog Container -->
        <div class="flex min-h-full items-center justify-center p-4 text-center sm:p-0">
            <div
                x-show="open"
                x-transition:enter="ease-out duration-150"
                x-transition:enter-start="opacity-0 scale-95"
                x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="ease-in duration-100"
                x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-95"
                class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-lg transition-all w-full max-w-md border border-slate-200 p-6 space-y-4"
            >
                <div class="space-y-2">
                    <h3 class="text-base font-semibold leading-none tracking-tight text-slate-900">
                        Are you absolutely sure?
                    </h3>
                    <p class="text-xs text-slate-500 leading-relaxed">
                        This action cannot be undone. This will permanently delete this category from the database and remove it from the public gallery filter bar.
                    </p>
                </div>

                <div class="flex items-center justify-end gap-2 pt-2 border-t border-slate-100">
                    <button
                        type="button"
                        wire:click="cancelDelete"
                        class="inline-flex h-9 items-center justify-center rounded-md border border-slate-200 bg-white px-4 py-2 text-xs font-medium text-slate-700 shadow-xs hover:bg-slate-100 hover:text-slate-900 transition-colors cursor-pointer"
                    >
                        Cancel
                    </button>
                    <button
                        type="button"
                        wire:click="delete"
                        class="inline-flex h-9 items-center justify-center rounded-md bg-rose-600 px-4 py-2 text-xs font-medium text-white shadow-xs hover:bg-rose-700 transition-colors cursor-pointer"
                    >
                        Continue
                    </button>
                </div>
            </div>
        </div>
    </div>

</div>