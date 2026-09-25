<div class="space-y-6">

    <!-- Page Header (shadcn style) -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 border-b border-slate-200/80 pb-5">
        <div class="space-y-1">
            <div class="flex items-center gap-2">
                <h1 class="text-2xl font-bold tracking-tight text-slate-900">
                    Services Management
                </h1>
                <span class="inline-flex items-center rounded-md bg-slate-100 px-2 py-0.5 text-xs font-medium text-slate-700 border border-slate-200">
                    {{ $this->stats['total'] }} total
                </span>
            </div>
            <p class="text-xs text-slate-500">
                Manage commercial workplace services, technical facilities maintenance, service categorizations, and SLA packages.
            </p>
        </div>

        <div class="flex items-center gap-3">
            <a
                href="{{ route('services') }}"
                target="_blank"
                class="inline-flex h-9 items-center justify-center rounded-md border border-slate-200 bg-white px-3 text-xs font-medium text-slate-700 shadow-xs transition-colors hover:bg-slate-50 hover:text-slate-900 gap-1.5"
            >
                <i class="ri-external-link-line text-sm text-slate-400"></i>
                <span>Public Catalog</span>
            </a>
            <a
                href="{{ route('admin.services.create') }}"
                wire:navigate
                class="inline-flex h-9 items-center justify-center rounded-md bg-slate-900 px-4 py-2 text-xs font-medium text-slate-50 shadow-xs transition-colors hover:bg-slate-900/90 focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-slate-950 cursor-pointer gap-2"
            >
                <i class="ri-add-line text-sm"></i>
                <span>Add Service</span>
            </a>
        </div>
    </div>

    <!-- Quick Stat KPI Cards -->
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
        <!-- Card: Total Services -->
        <div class="rounded-xl border border-slate-200/80 bg-white p-4 shadow-xs">
            <div class="flex items-center justify-between">
                <span class="text-xs font-medium text-slate-500">Total Services</span>
                <span class="flex h-8 w-8 items-center justify-center rounded-lg bg-blue-50 text-blue-600">
                    <i class="ri-service-line text-base"></i>
                </span>
            </div>
            <div class="mt-2 flex items-baseline gap-2">
                <span class="text-2xl font-bold tracking-tight text-slate-900">{{ $this->stats['total'] }}</span>
                <span class="text-[11px] text-slate-400">in catalog</span>
            </div>
        </div>

        <!-- Card: Active / Published -->
        <div class="rounded-xl border border-slate-200/80 bg-white p-4 shadow-xs">
            <div class="flex items-center justify-between">
                <span class="text-xs font-medium text-slate-500">Active / Live</span>
                <span class="flex h-8 w-8 items-center justify-center rounded-lg bg-emerald-50 text-emerald-600">
                    <i class="ri-checkbox-circle-line text-base"></i>
                </span>
            </div>
            <div class="mt-2 flex items-baseline gap-2">
                <span class="text-2xl font-bold tracking-tight text-emerald-600">{{ $this->stats['active'] }}</span>
                <span class="text-[11px] text-emerald-600/70 font-medium">visible to clients</span>
            </div>
        </div>

        <!-- Card: Inactive / Draft -->
        <div class="rounded-xl border border-slate-200/80 bg-white p-4 shadow-xs">
            <div class="flex items-center justify-between">
                <span class="text-xs font-medium text-slate-500">Inactive / Draft</span>
                <span class="flex h-8 w-8 items-center justify-center rounded-lg bg-amber-50 text-amber-600">
                    <i class="ri-eye-off-line text-base"></i>
                </span>
            </div>
            <div class="mt-2 flex items-baseline gap-2">
                <span class="text-2xl font-bold tracking-tight text-amber-600">{{ $this->stats['inactive'] }}</span>
                <span class="text-[11px] text-amber-600/70 font-medium">unpublished</span>
            </div>
        </div>

        <!-- Card: Service Categories -->
        <div class="rounded-xl border border-slate-200/80 bg-white p-4 shadow-xs">
            <div class="flex items-center justify-between">
                <span class="text-xs font-medium text-slate-500">Categories</span>
                <span class="flex h-8 w-8 items-center justify-center rounded-lg bg-purple-50 text-purple-600">
                    <i class="ri-folders-line text-base"></i>
                </span>
            </div>
            <div class="mt-2 flex items-baseline gap-2">
                <span class="text-2xl font-bold tracking-tight text-slate-900">{{ $this->stats['categories'] }}</span>
                <a href="{{ route('admin.service-categories') }}" class="text-[11px] text-purple-600 hover:underline font-medium">
                    manage categories &rarr;
                </a>
            </div>
        </div>
    </div>

    <!-- Filter & Search Toolbar (shadcn toolbar) -->
    <div class="flex flex-col md:flex-row items-stretch md:items-center justify-between gap-3">
        <!-- Search & Category Filters -->
        <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-2.5 flex-1 max-w-xl">
            <!-- Search Input -->
            <div class="relative w-full sm:w-72">
                <i class="ri-search-line absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-xs"></i>
                <input
                    type="text"
                    wire:model.live.debounce.300ms="search"
                    placeholder="Search services by title, slug..."
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

            <!-- Category Dropdown -->
            <div class="relative w-full sm:w-48">
                <select
                    wire:model.live="filterCategory"
                    class="flex h-9 w-full rounded-md border border-slate-200 bg-white px-3 py-1 text-xs shadow-xs transition-colors text-slate-700 focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-slate-950 cursor-pointer"
                >
                    <option value="all">All Categories</option>
                    @foreach($this->categories as $category)
                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <!-- Filter Segmented Tabs (All / Published / Inactive) -->
        <div class="inline-flex h-9 items-center justify-center rounded-lg bg-slate-100 p-1 text-slate-500 self-start md:self-auto border border-slate-200/50">
            <button
                type="button"
                wire:click="$set('filterStatus', 'all')"
                class="inline-flex items-center justify-center whitespace-nowrap rounded-md px-3 py-1 text-xs font-medium transition-all cursor-pointer {{ $filterStatus === 'all' ? 'bg-white text-slate-950 shadow-xs font-semibold' : 'text-slate-600 hover:text-slate-900' }}"
            >
                All ({{ $this->stats['total'] }})
            </button>
            <button
                type="button"
                wire:click="$set('filterStatus', 'active')"
                class="inline-flex items-center justify-center whitespace-nowrap rounded-md px-3 py-1 text-xs font-medium transition-all cursor-pointer {{ $filterStatus === 'active' ? 'bg-white text-slate-950 shadow-xs font-semibold' : 'text-slate-600 hover:text-slate-900' }}"
            >
                Published ({{ $this->stats['active'] }})
            </button>
            <button
                type="button"
                wire:click="$set('filterStatus', 'inactive')"
                class="inline-flex items-center justify-center whitespace-nowrap rounded-md px-3 py-1 text-xs font-medium transition-all cursor-pointer {{ $filterStatus === 'inactive' ? 'bg-white text-slate-950 shadow-xs font-semibold' : 'text-slate-600 hover:text-slate-900' }}"
            >
                Draft ({{ $this->stats['inactive'] }})
            </button>
        </div>
    </div>

    <!-- Services Table (shadcn Table) -->
    <div class="rounded-lg border border-slate-200 bg-white shadow-xs overflow-hidden">
        <div class="relative w-full overflow-auto">
            <table class="w-full caption-bottom text-xs">
                <thead class="[&_tr]:border-b border-slate-200 bg-slate-50/70">
                    <tr class="border-b transition-colors">
                        <th class="h-10 px-4 text-left align-middle font-semibold text-slate-600 text-xs w-[70px]">Image</th>
                        <th class="h-10 px-4 text-left align-middle font-semibold text-slate-600 text-xs min-w-[200px]">Service & Category</th>
                        <th class="h-10 px-4 text-left align-middle font-semibold text-slate-600 text-xs">Slug & URL</th>
                        <th class="h-10 px-4 text-left align-middle font-semibold text-slate-600 text-xs max-w-[260px]">Short Description</th>
                        <th class="h-10 px-4 text-left align-middle font-semibold text-slate-600 text-xs">Status</th>
                        <th class="h-10 px-4 text-right align-middle font-semibold text-slate-600 text-xs w-[120px]">Actions</th>
                    </tr>
                </thead>
                <tbody class="[&_tr:last-child]:border-0 divide-y divide-slate-100">
                    @forelse($this->services as $service)
                        <tr wire:key="service-row-{{ $service->id }}" class="transition-colors hover:bg-slate-50/70 group">
                            <!-- Image Thumbnail -->
                            <td class="p-4 align-middle">
                                <div class="h-11 w-14 rounded-md border border-slate-200 bg-slate-100 overflow-hidden shrink-0 flex items-center justify-center">
                                    @if($service->image)
                                        <img
                                            src="{{ asset($service->image) }}"
                                            alt="{{ $service->title }}"
                                            class="h-full w-full object-cover"
                                            onerror="this.onerror=null; this.src='https://placehold.co/120x80?text=Service';"
                                        />
                                    @else
                                        <i class="ri-image-line text-slate-400 text-base"></i>
                                    @endif
                                </div>
                            </td>

                            <!-- Title & Category -->
                            <td class="p-4 align-middle">
                                <div class="space-y-1">
                                    <a
                                        href="{{ route('admin.services.edit', $service->id) }}"
                                        wire:navigate
                                        class="font-semibold text-slate-900 hover:text-blue-600 transition truncate block max-w-xs"
                                    >
                                        {{ $service->title }}
                                    </a>
                                    <div class="flex items-center gap-1.5 flex-wrap">
                                        @if($service->category)
                                            <span class="inline-flex items-center rounded-full bg-slate-100 px-2 py-0.5 text-[10px] font-medium text-slate-600 border border-slate-200">
                                                <i class="ri-folder-line text-[10px] mr-1 text-slate-400"></i>
                                                {{ $service->category->title }}
                                            </span>
                                        @else
                                            <span class="inline-flex items-center rounded-full bg-amber-50 px-2 py-0.5 text-[10px] font-medium text-amber-700 border border-amber-200">
                                                Uncategorized
                                            </span>
                                        @endif

                                        @if($service->meta_title)
                                            <span class="inline-flex items-center rounded-full bg-blue-50 px-1.5 py-0.2 text-[9px] font-medium text-blue-700" title="SEO Title configured">
                                                SEO
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </td>

                            <!-- Slug & URL -->
                            <td class="p-4 align-middle">
                                <div class="flex items-center gap-1.5">
                                    <code class="rounded bg-slate-100 px-1.5 py-0.5 font-mono text-[11px] text-slate-600 max-w-[150px] truncate block">
                                        {{ $service->slug }}
                                    </code>
                                    <a
                                        href="{{ route('services.show', $service->slug) }}"
                                        target="_blank"
                                        title="View public service page"
                                        class="text-slate-400 hover:text-slate-700 transition"
                                    >
                                        <i class="ri-external-link-line text-xs"></i>
                                    </a>
                                </div>
                            </td>

                            <!-- Short Description -->
                            <td class="p-4 align-middle">
                                <p class="text-slate-500 text-[11px] line-clamp-2 max-w-[260px] leading-relaxed">
                                    {{ $service->short_description }}
                                </p>
                            </td>

                            <!-- Status Toggle -->
                            <td class="p-4 align-middle">
                                <button
                                    type="button"
                                    wire:click="toggleStatus({{ $service->id }})"
                                    wire:loading.attr="disabled"
                                    class="inline-flex items-center gap-1.5 rounded-full px-2.5 py-1 text-[11px] font-medium transition cursor-pointer {{ $service->is_active ? 'bg-emerald-50 text-emerald-700 border border-emerald-200 hover:bg-emerald-100' : 'bg-slate-100 text-slate-600 border border-slate-200 hover:bg-slate-200' }}"
                                    title="Click to toggle status"
                                >
                                    <span class="h-1.5 w-1.5 rounded-full {{ $service->is_active ? 'bg-emerald-500' : 'bg-slate-400' }}"></span>
                                    <span>{{ $service->is_active ? 'Published' : 'Draft' }}</span>
                                </button>
                            </td>

                            <!-- Actions -->
                            <td class="p-4 align-middle text-right">
                                <div class="flex items-center justify-end gap-1">
                                    <!-- Edit in Separate Page -->
                                    <a
                                        href="{{ route('admin.services.edit', $service->id) }}"
                                        wire:navigate
                                        class="inline-flex h-8 w-8 items-center justify-center rounded-md text-slate-500 hover:text-slate-900 hover:bg-slate-100 transition"
                                        title="Edit Service"
                                    >
                                        <i class="ri-edit-line text-sm"></i>
                                    </a>

                                    <!-- Delete Button -->
                                    <button
                                        type="button"
                                        wire:click="confirmDelete({{ $service->id }})"
                                        class="inline-flex h-8 w-8 items-center justify-center rounded-md text-slate-400 hover:text-rose-600 hover:bg-rose-50 transition cursor-pointer"
                                        title="Delete Service"
                                    >
                                        <i class="ri-delete-bin-line text-sm"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="p-8 text-center">
                                <div class="flex flex-col items-center justify-center max-w-sm mx-auto text-center space-y-3">
                                    <div class="h-12 w-12 rounded-full bg-slate-100 flex items-center justify-center text-slate-400">
                                        <i class="ri-service-line text-2xl"></i>
                                    </div>
                                    <div class="space-y-1">
                                        <h3 class="text-sm font-semibold text-slate-900">No services found</h3>
                                        <p class="text-xs text-slate-500">
                                            @if($search || $filterCategory !== 'all' || $filterStatus !== 'all')
                                                No service matches your current filter criteria. Try resetting filters.
                                            @else
                                                Get started by adding your first commercial facility service offering.
                                            @endif
                                        </p>
                                    </div>
                                    @if($search || $filterCategory !== 'all' || $filterStatus !== 'all')
                                        <button
                                            type="button"
                                            wire:click="$set('search', ''); $set('filterCategory', 'all'); $set('filterStatus', 'all');"
                                            class="inline-flex items-center gap-1.5 text-xs text-blue-600 font-semibold hover:underline"
                                        >
                                            <i class="ri-restart-line"></i>
                                            <span>Reset all filters</span>
                                        </button>
                                    @else
                                        <a
                                            href="{{ route('admin.services.create') }}"
                                            wire:navigate
                                            class="inline-flex h-8 items-center justify-center rounded-md bg-slate-900 px-3 text-xs font-medium text-white shadow-xs hover:bg-slate-800 transition"
                                        >
                                            <i class="ri-add-line mr-1 text-sm"></i>
                                            <span>Add New Service</span>
                                        </a>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($this->services->hasPages())
            <div class="border-t border-slate-200/80 px-4 py-3 bg-slate-50/50">
                {{ $this->services->links() }}
            </div>
        @endif
    </div>

    <!-- Delete Confirmation Modal (shadcn Dialog) -->
    @if($showDeleteModal)
        <div class="fixed inset-0 z-50 flex items-center justify-center overflow-y-auto p-4 sm:p-0">
            <!-- Modal Backdrop -->
            <div
                class="fixed inset-0 bg-slate-950/50 backdrop-blur-xs transition-opacity"
                wire:click="cancelDelete"
            ></div>

            <!-- Modal Content -->
            <div class="relative w-full max-w-md rounded-lg border border-slate-200 bg-white p-6 shadow-xl transition-all z-10 space-y-4">
                <div class="flex items-start gap-4">
                    <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-rose-50 text-rose-600 border border-rose-100">
                        <i class="ri-alert-line text-lg"></i>
                    </div>
                    <div class="space-y-1">
                        <h3 class="text-sm font-semibold text-slate-900">
                            Delete Service
                        </h3>
                        <p class="text-xs text-slate-500 leading-relaxed">
                            Are you sure you want to permanently delete this service offering? This action cannot be undone and will remove it from the public catalog.
                        </p>
                    </div>
                </div>

                <div class="flex items-center justify-end gap-2.5 pt-2">
                    <button
                        type="button"
                        wire:click="cancelDelete"
                        class="inline-flex h-8 items-center justify-center rounded-md border border-slate-200 bg-white px-3 text-xs font-medium text-slate-700 shadow-xs hover:bg-slate-50 transition cursor-pointer"
                    >
                        Cancel
                    </button>
                    <button
                        type="button"
                        wire:click="delete"
                        wire:loading.attr="disabled"
                        class="inline-flex h-8 items-center justify-center rounded-md bg-rose-600 px-3 text-xs font-medium text-white shadow-xs hover:bg-rose-700 transition cursor-pointer gap-1.5 disabled:opacity-50"
                    >
                        <span wire:loading.remove wire:target="delete">Delete Permanently</span>
                        <span wire:loading wire:target="delete">Deleting...</span>
                    </button>
                </div>
            </div>
        </div>
    @endif

</div>