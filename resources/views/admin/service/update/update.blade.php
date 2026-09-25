<div class="space-y-6 max-w-4xl mx-auto">

    <!-- Page Header (shadcn style) -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 border-b border-slate-200/80 pb-5">
        <div class="space-y-1">
            <div class="flex items-center gap-2">
                <a
                    href="{{ route('admin.services.index') }}"
                    wire:navigate
                    class="text-xs text-slate-500 hover:text-slate-900 transition flex items-center gap-1 font-medium"
                >
                    <i class="ri-arrow-left-line"></i>
                    <span>Services</span>
                </a>
            </div>
            <h1 class="text-2xl font-semibold tracking-tight text-slate-950">
                Edit: {{ $title }}
            </h1>
            <p class="text-xs text-slate-500">
                Update service parameters, media, scopes, and publish state.
            </p>
        </div>

        <div class="flex items-center gap-2">
            <a
                href="{{ route('admin.services.index') }}"
                wire:navigate
                class="inline-flex h-9 items-center justify-center rounded-md border border-slate-200 bg-white px-4 py-2 text-xs font-medium text-slate-700 shadow-xs hover:bg-slate-100 hover:text-slate-900 transition-colors cursor-pointer"
            >
                Cancel
            </a>
            <button
                type="button"
                wire:click="save"
                wire:loading.attr="disabled"
                class="inline-flex h-9 items-center justify-center rounded-md bg-slate-900 px-4 py-2 text-xs font-medium text-slate-50 shadow-xs hover:bg-slate-900/90 transition-colors cursor-pointer gap-2 disabled:pointer-events-none disabled:opacity-50"
            >
                <i class="ri-check-line text-sm" wire:loading.remove wire:target="save"></i>
                <span wire:loading.remove wire:target="save">Update Service</span>
                <span wire:loading wire:target="save">Updating...</span>
            </button>
        </div>
    </div>

    <!-- Form Container (Single clean card matching other admin forms) -->
    <div class="rounded-lg border border-slate-200 bg-white p-6 shadow-xs">
        <form
            wire:submit="save"
            class="space-y-4"
        >
            <!-- Title -->
            <div class="space-y-1.5">
                <label for="title" class="text-xs font-medium leading-none text-slate-900">
                    Title <span class="text-rose-500">*</span>
                </label>
                <input
                    type="text"
                    id="title"
                    wire:model.live.debounce.400ms="title"
                    placeholder="e.g. Commercial Sweeping & Cleaning"
                    class="flex h-9 w-full rounded-md border border-slate-200 bg-transparent px-3 py-1 text-xs shadow-xs transition-colors placeholder:text-slate-400 focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-slate-950"
                />
                @error('title')
                    <p class="text-[11px] text-rose-500 font-medium">{{ $message }}</p>
                @enderror
            </div>

            <!-- Category & Slug (2 Columns) -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <!-- Category -->
                <div class="space-y-1.5">
                    <label for="service_category_id" class="text-xs font-medium leading-none text-slate-900">
                        Category <span class="text-rose-500">*</span>
                    </label>
                    <select
                        id="service_category_id"
                        wire:model="service_category_id"
                        class="flex h-9 w-full rounded-md border border-slate-200 bg-transparent px-3 py-1 text-xs shadow-xs transition-colors text-slate-800 focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-slate-950 cursor-pointer"
                    >
                        <option value="">Select a category...</option>
                        @foreach($this->categories as $category)
                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                        @endforeach
                    </select>
                    @error('service_category_id')
                        <p class="text-[11px] text-rose-500 font-medium">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Slug -->
                <div class="space-y-1.5">
                    <div class="flex items-center justify-between">
                        <label for="slug" class="text-xs font-medium leading-none text-slate-900">
                            Slug <span class="text-rose-500">*</span>
                        </label>
                        <button
                            type="button"
                            wire:click="generateSlug"
                            class="text-[11px] text-slate-500 hover:text-slate-900 transition flex items-center gap-1 cursor-pointer"
                            title="Sync slug from title"
                        >
                            <i class="ri-refresh-line text-[10px]"></i>
                            <span>Sync</span>
                        </button>
                    </div>
                    <input
                        type="text"
                        id="slug"
                        wire:model="slug"
                        placeholder="commercial-sweeping-cleaning"
                        class="flex h-9 w-full rounded-md border border-slate-200 bg-transparent px-3 py-1 text-xs shadow-xs font-mono transition-colors placeholder:text-slate-400 focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-slate-950"
                    />
                    @error('slug')
                        <p class="text-[11px] text-rose-500 font-medium">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Short Description -->
            <div class="space-y-1.5">
                <label for="short_description" class="text-xs font-medium leading-none text-slate-900">
                    Short Description <span class="text-rose-500">*</span>
                </label>
                <textarea
                    id="short_description"
                    wire:model="short_description"
                    rows="3"
                    placeholder="Brief summary displayed on cards and search results..."
                    class="flex w-full rounded-md border border-slate-200 bg-transparent px-3 py-2 text-xs shadow-xs transition-colors placeholder:text-slate-400 focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-slate-950 resize-none leading-relaxed"
                ></textarea>
                @error('short_description')
                    <p class="text-[11px] text-rose-500 font-medium">{{ $message }}</p>
                @enderror
            </div>

            <!-- Image -->
            <div class="space-y-1.5">
                <label for="image" class="text-xs font-medium leading-none text-slate-900">
                    Featured Image <span class="text-rose-500">*</span>
                </label>
                <div
                    x-data="{ uploading: false, progress: 0 }"
                    x-on:livewire-upload-start="uploading = true; progress = 0"
                    x-on:livewire-upload-finish="uploading = false"
                    x-on:livewire-upload-error="uploading = false"
                    class="space-y-2"
                >
                    <!-- Dropzone / File Input -->
                    <div
                        class="relative flex flex-col items-center justify-center gap-2 rounded-lg border border-dashed border-slate-300 bg-slate-50/50 p-6 text-center transition-colors hover:bg-slate-50 cursor-pointer"
                        :class="{ 'opacity-70 pointer-events-none': uploading }"
                    >
                        <input
                            type="file"
                            id="image"
                            accept="image/*"
                            wire:model="image"
                            class="absolute inset-0 h-full w-full cursor-pointer opacity-0"
                        />
                        <span class="flex h-10 w-10 items-center justify-center rounded-full bg-white text-slate-700 border border-slate-200 shadow-xs">
                            <i class="ri-image-add-line text-base"></i>
                        </span>
                        <div class="space-y-0.5">
                            <p class="text-xs font-medium text-slate-900">Click to upload or drag &amp; drop</p>
                            <p class="text-[11px] text-slate-500">JPG, PNG or WEBP — up to 5MB (leave empty to keep current)</p>
                        </div>
                    </div>

                    <!-- Uploading State -->
                    <div
                        x-show="uploading"
                        x-cloak
                        class="flex items-center gap-3 rounded-md border border-slate-200 bg-white p-3"
                    >
                        <i class="ri-loader-4-line animate-spin text-base text-emerald-600"></i>
                        <div class="flex-1">
                            <p class="text-[11px] font-medium text-slate-700">Uploading image...</p>
                            <div class="mt-1.5 h-1.5 w-full overflow-hidden rounded-full bg-slate-100">
                                <div
                                    class="h-full rounded-full bg-emerald-500 transition-all duration-150"
                                    :style="`width: ${progress}%`"
                                    x-on:livewire-upload-progress="progress = $event.detail.progress"
                                ></div>
                            </div>
                        </div>
                    </div>

                    <!-- Preview -->
                    <div
                        x-show="!uploading"
                        x-cloak
                        x-transition
                        class="rounded-md border border-slate-200 overflow-hidden"
                    >
                        @if($this->imagePreview())
                            <img src="{{ $this->imagePreview() }}" alt="Image preview" class="h-44 w-full object-cover" />
                        @else
                            <div class="flex h-20 items-center justify-center text-[11px] text-slate-400">
                                No image selected
                            </div>
                        @endif
                    </div>

                    @error('image')
                        <p class="text-[11px] text-rose-500 font-medium">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Content (TinyMCE) -->
            <div class="space-y-1.5">
                <label for="service_edit_content" class="text-xs font-medium leading-none text-slate-900">
                    Content &amp; Detailed Scope
                </label>
                <div
                    wire:ignore
                    x-data="tinymceEditor({ model: 'content', height: 380, placeholder: 'Write comprehensive service scope, technical specs, shift frequencies, equipment, and SLA guarantees...' })"
                    class="rounded-md border border-slate-200 overflow-hidden shadow-xs bg-white"
                >
                    <textarea
                        x-ref="textarea"
                        id="service_edit_content"
                        class="w-full min-h-[300px] p-3 text-xs text-slate-800 focus:outline-none leading-relaxed font-sans"
                        placeholder="Write comprehensive service scope, technical specs, shift frequencies, equipment, and SLA guarantees..."
                    >{{ $content }}</textarea>
                </div>
                @error('content')
                    <p class="text-[11px] text-rose-500 font-medium">{{ $message }}</p>
                @enderror
            </div>

            <!-- SEO Metadata Section -->
            <div class="space-y-3 pt-3 border-t border-slate-100">
                <div class="space-y-0.5">
                    <h3 class="text-xs font-semibold text-slate-900">
                        SEO Metadata <span class="text-[11px] text-slate-400 font-normal">(Optional)</span>
                    </h3>
                    <p class="text-[11px] text-slate-500">
                        Configure search engine titles, keywords, and snippet descriptions.
                    </p>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <!-- Meta Title -->
                    <div class="space-y-1.5">
                        <label for="meta_title" class="text-xs font-medium leading-none text-slate-900">
                            Meta Title
                        </label>
                        <input
                            type="text"
                            id="meta_title"
                            wire:model="meta_title"
                            placeholder="e.g. Commercial Cleaning Services | FacilityPro"
                            class="flex h-9 w-full rounded-md border border-slate-200 bg-transparent px-3 py-1 text-xs shadow-xs transition-colors placeholder:text-slate-400 focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-slate-950"
                        />
                        @error('meta_title')
                            <p class="text-[11px] text-rose-500 font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Meta Keywords -->
                    <div class="space-y-1.5">
                        <label for="meta_keyword" class="text-xs font-medium leading-none text-slate-900">
                            Meta Keywords
                        </label>
                        <input
                            type="text"
                            id="meta_keyword"
                            wire:model="meta_keyword"
                            placeholder="cleaning, janitorial, maintenance"
                            class="flex h-9 w-full rounded-md border border-slate-200 bg-transparent px-3 py-1 text-xs shadow-xs transition-colors placeholder:text-slate-400 focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-slate-950"
                        />
                        @error('meta_keyword')
                            <p class="text-[11px] text-rose-500 font-medium">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Meta Description -->
                <div class="space-y-1.5">
                    <label for="meta_description" class="text-xs font-medium leading-none text-slate-900">
                        Meta Description
                    </label>
                    <textarea
                        id="meta_description"
                        wire:model="meta_description"
                        rows="2"
                        placeholder="Search engine summary snippet..."
                        class="flex w-full rounded-md border border-slate-200 bg-transparent px-3 py-2 text-xs shadow-xs transition-colors placeholder:text-slate-400 focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-slate-950 resize-none leading-relaxed"
                    ></textarea>
                    @error('meta_description')
                        <p class="text-[11px] text-rose-500 font-medium">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Is Active Switch -->
            <div class="flex items-center justify-between rounded-md border border-slate-200 p-3 bg-slate-50/50">
                <div class="space-y-0.5">
                    <p class="text-xs font-medium text-slate-900">Show On Website</p>
                    <p class="text-[11px] text-slate-500">Display this service in the public catalog and navigation</p>
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

            <!-- Form Footer -->
            <div class="flex items-center justify-end gap-2 pt-3 border-t border-slate-100">
                <a
                    href="{{ route('admin.services.index') }}"
                    wire:navigate
                    class="inline-flex h-9 items-center justify-center rounded-md border border-slate-200 bg-white px-4 py-2 text-xs font-medium text-slate-700 shadow-xs hover:bg-slate-100 hover:text-slate-900 transition-colors cursor-pointer"
                >
                    Cancel
                </a>
                <button
                    type="submit"
                    wire:loading.attr="disabled"
                    class="inline-flex h-9 items-center justify-center rounded-md bg-slate-900 px-4 py-2 text-xs font-medium text-slate-50 shadow-xs hover:bg-slate-900/90 transition-colors cursor-pointer gap-2 disabled:pointer-events-none disabled:opacity-50"
                >
                    <i class="ri-check-line text-sm" wire:loading.remove wire:target="save"></i>
                    <span wire:loading.remove wire:target="save">Update Service</span>
                    <span wire:loading wire:target="save">Updating...</span>
                </button>
            </div>
        </form>
    </div>

    <!-- Danger Zone: Delete Service -->
    <div class="rounded-lg border border-rose-200 bg-rose-50/30 p-4 shadow-xs flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div class="space-y-0.5">
            <p class="text-xs font-semibold text-rose-900">Delete Service</p>
            <p class="text-[11px] text-rose-700">Permanently remove this service and all associated data from the catalog.</p>
        </div>
        <button
            type="button"
            wire:click="confirmDelete"
            class="inline-flex h-8 items-center justify-center rounded-md border border-rose-300 bg-white px-3 text-xs font-medium text-rose-600 shadow-xs hover:bg-rose-50 transition-colors cursor-pointer self-start sm:self-auto gap-1.5"
        >
            <i class="ri-delete-bin-line text-sm"></i>
            <span>Delete Service</span>
        </button>
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
                            Are you sure you want to delete <span class="font-semibold text-slate-800">"{{ $title }}"</span>? This action cannot be undone.
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