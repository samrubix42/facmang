<div class="space-y-6">

    <!-- Page Header (shadcn style) -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 border-b border-slate-200/80 pb-5">
        <div class="space-y-1">
            <h1 class="text-2xl font-semibold tracking-tight text-slate-950">
                Services Management
            </h1>
            <p class="text-xs text-slate-500">
                Manage commercial facility services, category assignments, and publish states.
            </p>
        </div>

        <div class="flex items-center gap-2">
            <a
                href="{{ route('admin.services.create') }}"
                wire:navigate
                class="inline-flex h-9 items-center justify-center rounded-md bg-slate-900 px-4 py-2 text-xs font-medium text-slate-50 shadow-xs transition-colors hover:bg-slate-900/90 focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-slate-950 disabled:pointer-events-none disabled:opacity-50 cursor-pointer gap-2"
            >
                <i class="ri-add-line text-sm"></i>
                <span>Add Service</span>
            </a>
        </div>
    </div>

    <!-- Filter & Search Toolbar (shadcn toolbar) -->
    <div class="flex flex-col sm:flex-row items-stretch sm:items-center justify-between gap-3">
        <!-- Search Input & Category Filter -->
        <div class="flex items-center gap-2.5 flex-1 max-w-md">
            <div class="relative flex-1">
                <i class="ri-search-line absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-xs"></i>
                <input
                    type="text"
                    wire:model.live.debounce.300ms="search"
                    placeholder="Filter services..."
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

            <select
                wire:model.live="filterCategory"
                class="flex h-9 rounded-md border border-slate-200 bg-white px-3 py-1 text-xs shadow-xs transition-colors text-slate-700 focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-slate-950 cursor-pointer"
            >
                <option value="all">All Categories</option>
                @foreach($this->categories as $category)
                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                @endforeach
            </select>
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

    <!-- Services Table (shadcn Table) -->
    <div class="rounded-lg border border-slate-200 bg-white shadow-xs overflow-hidden">
        <div class="relative w-full overflow-auto">
            <table class="w-full caption-bottom text-xs">
                <thead class="[&_tr]:border-b border-slate-200 bg-slate-50/70">
                    <tr class="border-b transition-colors">
                        <th class="h-10 px-4 text-left align-middle font-medium text-slate-500 text-xs">Service</th>
                        <th class="h-10 px-4 text-left align-middle font-medium text-slate-500 text-xs hidden md:table-cell">Category</th>
                        <th class="h-10 px-4 text-left align-middle font-medium text-slate-500 text-xs">Status</th>
                        <th class="h-10 px-4 text-right align-middle font-medium text-slate-500 text-xs">Actions</th>
                    </tr>
                </thead>
                <tbody class="[&_tr:last-child]:border-0 divide-y divide-slate-100">
                    @forelse($this->services as $service)
                        <tr wire:key="service-row-{{ $service->id }}" class="transition-colors hover:bg-slate-50/60">
                            <!-- Service Item -->
                            <td class="p-4 align-middle">
                                <div class="flex items-center gap-3">
                                    <img
                                        src="{{ asset($service->image) }}"
                                        alt="{{ $service->title }}"
                                        class="h-11 w-14 shrink-0 rounded-md border border-slate-200 object-cover"
                                        onerror="this.onerror=null; this.src='https://placehold.co/120x80?text=Service';"
                                    />
                                    <div class="min-w-0">
                                        <a
                                            href="{{ route('admin.services.edit', $service->id) }}"
                                            wire:navigate
                                            class="font-medium text-slate-900 hover:text-slate-600 transition truncate block max-w-xs sm:max-w-md"
                                        >
                                            {{ $service->title }}
                                        </a>
                                        <p class="text-[11px] text-slate-500 truncate">
                                            {{ $service->slug }}
                                        </p>
                                    </div>
                                </div>
                            </td>

                            <!-- Category -->
                            <td class="p-4 align-middle hidden md:table-cell">
                                <span class="inline-flex items-center gap-1.5 rounded-md bg-slate-100 px-2 py-0.5 text-[11px] font-medium text-slate-700 border border-slate-200">
                                    <i class="ri-price-tag-3-line text-[10px]"></i>
                                    {{ $service->category?->title ?? 'Uncategorized' }}
                                </span>
                            </td>

                            <!-- Status Badge -->
                            <td class="p-4 align-middle whitespace-nowrap">
                                <button
                                    type="button"
                                    wire:click="toggleStatus({{ $service->id }})"
                                    title="Click to toggle status"
                                    class="inline-flex items-center gap-1.5 rounded-md px-2 py-0.5 text-[11px] font-medium transition-colors cursor-pointer {{ $service->is_active ? 'border border-emerald-200 bg-emerald-50 text-emerald-800 hover:bg-emerald-100' : 'border border-slate-200 bg-slate-100 text-slate-700 hover:bg-slate-200' }}"
                                >
                                    <span class="h-1.5 w-1.5 rounded-full {{ $service->is_active ? 'bg-emerald-500' : 'bg-slate-400' }}"></span>
                                    <span>{{ $service->is_active ? 'Active' : 'Hidden' }}</span>
                                </button>
                            </td>

                            <!-- Actions -->
                            <td class="p-4 align-middle text-right whitespace-nowrap">
                                <div class="inline-flex items-center gap-1 justify-end">
                                    <a
                                        href="{{ route('admin.services.edit', $service->id) }}"
                                        wire:navigate
                                        title="Edit"
                                        class="inline-flex h-8 w-8 items-center justify-center rounded-md text-slate-500 hover:bg-slate-100 hover:text-slate-900 transition-colors cursor-pointer"
                                    >
                                        <i class="ri-edit-line text-sm"></i>
                                    </a>
                                    <button
                                        type="button"
                                        wire:click="confirmDelete({{ $service->id }})"
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
                                        <i class="ri-service-line text-lg"></i>
                                    </div>
                                    <p class="text-sm font-medium text-slate-900">No services found</p>
                                    <p class="text-xs text-slate-500 mt-1 mb-4">
                                        @if($search)
                                            No services match "{{ $search }}".
                                        @else
                                            Get started by adding your first commercial service.
                                        @endif
                                    </p>
                                    <a
                                        href="{{ route('admin.services.create') }}"
                                        wire:navigate
                                        class="inline-flex h-8 items-center justify-center rounded-md bg-slate-900 px-3 text-xs font-medium text-slate-50 shadow-xs hover:bg-slate-900/90 transition-colors"
                                    >
                                        <i class="ri-add-line mr-1"></i>
                                        <span>Add Service</span>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if($this->services->hasPages())
            <div class="p-4 border-t border-slate-200 bg-slate-50/40">
                {{ $this->services->links() }}
            </div>
        @endif
    </div>

    <!-- Delete Confirmation Modal (shadcn Dialog style matching gallery.blade.php) -->
    <div
        x-data="{ open: @entangle('showDeleteModal') }"
        x-show="open"
        x-cloak
        class="fixed inset-0 z-50 overflow-y-auto"
        role="dialog"
        aria-modal="true"
    >
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
                <div class="flex items-start gap-4">
                    <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-rose-100 text-rose-600">
                        <i class="ri-error-warning-line text-lg"></i>
                    </div>
                    <div class="space-y-1">
                        <h3 class="text-sm font-semibold text-slate-900">
                            Delete Service
                        </h3>
                        <p class="text-xs text-slate-500 leading-relaxed">
                            Are you sure you want to delete this service? This action cannot be undone.
                        </p>
                    </div>
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
                        Delete Service
                    </button>
                </div>
            </div>
        </div>
    </div>

</div>