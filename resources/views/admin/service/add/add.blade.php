<div class="space-y-6 max-w-5xl mx-auto pb-12">

    <!-- Breadcrumb & Top Bar -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 border-b border-slate-200/80 pb-5">
        <div class="space-y-1">
            <!-- Breadcrumbs -->
            <nav class="flex items-center gap-1.5 text-xs text-slate-500 mb-1">
                <a href="{{ route('admin.dashboard') }}" wire:navigate class="hover:text-slate-800 transition">Dashboard</a>
                <i class="ri-arrow-right-s-line text-slate-400 text-xs"></i>
                <a href="{{ route('admin.services.index') }}" wire:navigate class="hover:text-slate-800 transition">Services</a>
                <i class="ri-arrow-right-s-line text-slate-400 text-xs"></i>
                <span class="text-slate-900 font-medium">Add New Service</span>
            </nav>
            <h1 class="text-2xl font-bold tracking-tight text-slate-900">
                Create New Service
            </h1>
            <p class="text-xs text-slate-500">
                Define specifications, technical SLA terms, marketing assets, and SEO parameters.
            </p>
        </div>

        <div class="flex items-center gap-2">
            <a
                href="{{ route('admin.services.index') }}"
                wire:navigate
                class="inline-flex h-9 items-center justify-center rounded-md border border-slate-200 bg-white px-3.5 text-xs font-medium text-slate-700 shadow-xs hover:bg-slate-50 transition gap-1.5"
            >
                <i class="ri-arrow-left-line text-sm text-slate-400"></i>
                <span>Cancel</span>
            </a>
            <button
                type="button"
                wire:click="save(false)"
                wire:loading.attr="disabled"
                class="inline-flex h-9 items-center justify-center rounded-md bg-slate-900 px-4 text-xs font-medium text-white shadow-xs hover:bg-slate-800 transition gap-1.5 disabled:opacity-50 cursor-pointer"
            >
                <i class="ri-check-line text-sm" wire:loading.remove wire:target="save"></i>
                <span wire:loading.remove wire:target="save">Save Service</span>
                <span wire:loading wire:target="save">Saving...</span>
            </button>
        </div>
    </div>

    <!-- Main Form Grid -->
    <form wire:submit.prevent="save(false)" class="space-y-6">

        <!-- Section 1: Basic Information -->
        <div class="rounded-xl border border-slate-200/80 bg-white p-6 shadow-xs space-y-5">
            <div class="border-b border-slate-100 pb-3">
                <h2 class="text-sm font-semibold text-slate-900 flex items-center gap-2">
                    <i class="ri-information-line text-slate-500"></i>
                    <span>Service Identification & Category</span>
                </h2>
                <p class="text-xs text-slate-500 mt-0.5">Core identifiers, title, and taxonomy classification.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <!-- Title -->
                <div class="space-y-1.5">
                    <label class="text-xs font-medium text-slate-700">
                        Service Title <span class="text-rose-500">*</span>
                    </label>
                    <input
                        type="text"
                        wire:model.live.debounce.400ms="title"
                        placeholder="e.g. Commercial Sweeping & Office Cleaning"
                        class="flex h-9 w-full rounded-md border {{ $errors->has('title') ? 'border-rose-400 focus-visible:ring-rose-400' : 'border-slate-200 focus-visible:ring-slate-950' }} bg-white px-3 py-1 text-xs shadow-xs transition-colors placeholder:text-slate-400 focus-visible:outline-none focus-visible:ring-1"
                    />
                    @error('title')
                        <p class="text-[11px] text-rose-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Slug -->
                <div class="space-y-1.5">
                    <div class="flex items-center justify-between">
                        <label class="text-xs font-medium text-slate-700">
                            URL Slug <span class="text-rose-500">*</span>
                        </label>
                        <button
                            type="button"
                            wire:click="generateSlug"
                            class="text-[11px] text-blue-600 hover:underline flex items-center gap-1"
                        >
                            <i class="ri-refresh-line text-[11px]"></i>
                            <span>Sync from Title</span>
                        </button>
                    </div>
                    <div class="relative">
                        <span class="absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-xs font-mono">
                            services/
                        </span>
                        <input
                            type="text"
                            wire:model.live.debounce.300ms="slug"
                            placeholder="commercial-sweeping-office-cleaning"
                            class="flex h-9 w-full rounded-md border {{ $errors->has('slug') ? 'border-rose-400 focus-visible:ring-rose-400' : 'border-slate-200 focus-visible:ring-slate-950' }} bg-white pl-18 pr-3 py-1 text-xs shadow-xs font-mono transition-colors placeholder:text-slate-400 focus-visible:outline-none focus-visible:ring-1"
                        />
                    </div>
                    @error('slug')
                        <p class="text-[11px] text-rose-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Category -->
                <div class="space-y-1.5">
                    <div class="flex items-center justify-between">
                        <label class="text-xs font-medium text-slate-700">
                            Service Category <span class="text-rose-500">*</span>
                        </label>
                        <a
                            href="{{ route('admin.service-categories') }}"
                            target="_blank"
                            class="text-[11px] text-blue-600 hover:underline flex items-center gap-1"
                        >
                            <span>Manage Categories</span>
                            <i class="ri-external-link-line text-[10px]"></i>
                        </a>
                    </div>
                    <select
                        wire:model="service_category_id"
                        class="flex h-9 w-full rounded-md border {{ $errors->has('service_category_id') ? 'border-rose-400 focus-visible:ring-rose-400' : 'border-slate-200 focus-visible:ring-slate-950' }} bg-white px-3 py-1 text-xs shadow-xs text-slate-700 focus-visible:outline-none focus-visible:ring-1 cursor-pointer"
                    >
                        <option value="">Select a category...</option>
                        @foreach($this->categories as $category)
                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                        @endforeach
                    </select>
                    @error('service_category_id')
                        <p class="text-[11px] text-rose-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Status Switch -->
                <div class="space-y-1.5 flex flex-col justify-end">
                    <label class="text-xs font-medium text-slate-700 mb-1">
                        Publish State
                    </label>
                    <label class="relative inline-flex items-center cursor-pointer select-none">
                        <input
                            type="checkbox"
                            wire:model="is_active"
                            class="sr-only peer"
                        />
                        <div class="w-9 h-5 bg-slate-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-slate-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-emerald-600"></div>
                        <span class="ml-2.5 text-xs text-slate-700 font-medium">
                            {{ $is_active ? 'Published (Live on catalog)' : 'Draft (Hidden from public)' }}
                        </span>
                    </label>
                    <p class="text-[11px] text-slate-400">Controls whether customers can view and book this service online.</p>
                </div>
            </div>
        </div>

        <!-- Section 2: Visual Asset / Image Upload -->
        <div class="rounded-xl border border-slate-200/80 bg-white p-6 shadow-xs space-y-4">
            <div class="border-b border-slate-100 pb-3">
                <h2 class="text-sm font-semibold text-slate-900 flex items-center gap-2">
                    <i class="ri-image-2-line text-slate-500"></i>
                    <span>Featured Media Asset <span class="text-rose-500">*</span></span>
                </h2>
                <p class="text-xs text-slate-500 mt-0.5">High-resolution cover image for public service catalog and SLA proposal cards.</p>
            </div>

            <div class="space-y-3">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-5 items-start">
                    <!-- Image Preview Area -->
                    <div class="md:col-span-1">
                        <div class="aspect-4/3 rounded-lg border-2 border-dashed border-slate-200 bg-slate-50 overflow-hidden flex flex-col items-center justify-center relative group">
                            @if ($image && !is_string($image) && method_exists($image, 'temporaryUrl'))
                                <img
                                    src="{{ $image->temporaryUrl() }}"
                                    alt="Service Preview"
                                    class="h-full w-full object-cover"
                                />
                                <button
                                    type="button"
                                    wire:click="$set('image', null)"
                                    class="absolute top-2 right-2 rounded-full bg-slate-900/80 p-1 text-white hover:bg-slate-900 transition text-xs"
                                    title="Remove preview"
                                >
                                    <i class="ri-close-line"></i>
                                </button>
                            @else
                                <div class="text-center p-4 space-y-1">
                                    <i class="ri-image-add-line text-3xl text-slate-400"></i>
                                    <p class="text-[11px] text-slate-500">No image chosen</p>
                                    <p class="text-[10px] text-slate-400">Preview will appear here</p>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Upload Controls & Guidelines -->
                    <div class="md:col-span-2 space-y-3">
                        <div class="space-y-1.5">
                            <label class="text-xs font-medium text-slate-700">
                                Upload File
                            </label>
                            <input
                                type="file"
                                wire:model="image"
                                accept="image/png,image/jpeg,image/webp,image/jpg"
                                class="flex w-full text-xs text-slate-500 file:mr-3 file:py-1.5 file:px-3 file:rounded-md file:border-0 file:text-xs file:font-medium file:bg-slate-900 file:text-white hover:file:bg-slate-800 file:cursor-pointer border border-slate-200 rounded-md p-1 bg-white cursor-pointer"
                            />
                            <div wire:loading wire:target="image" class="text-xs text-blue-600 flex items-center gap-1.5 pt-1">
                                <i class="ri-loader-4-line animate-spin"></i>
                                <span>Uploading temporary preview...</span>
                            </div>
                            @error('image')
                                <p class="text-[11px] text-rose-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="rounded-lg bg-slate-50 p-3 text-[11px] text-slate-600 space-y-1 border border-slate-200/60">
                            <p class="font-medium text-slate-800 flex items-center gap-1">
                                <i class="ri-lightbulb-line text-amber-500"></i>
                                <span>Recommendation</span>
                            </p>
                            <ul class="list-disc list-inside space-y-0.5 text-slate-500">
                                <li>Recommended aspect ratio: 16:9 or 4:3 (e.g. 1200 x 800 px)</li>
                                <li>Accepted formats: WebP, PNG, JPG (maximum 5MB)</li>
                                <li>Clean commercial workspace or technical equipment photos look best</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Section 3: Descriptions & Deliverables -->
        <div class="rounded-xl border border-slate-200/80 bg-white p-6 shadow-xs space-y-5">
            <div class="border-b border-slate-100 pb-3">
                <h2 class="text-sm font-semibold text-slate-900 flex items-center gap-2">
                    <i class="ri-file-text-line text-slate-500"></i>
                    <span>Descriptions & Content Scope</span>
                </h2>
                <p class="text-xs text-slate-500 mt-0.5">Short marketing summary and comprehensive SLA service delivery terms.</p>
            </div>

            <!-- Short Description -->
            <div class="space-y-1.5">
                <div class="flex items-center justify-between">
                    <label class="text-xs font-medium text-slate-700">
                        Short Description <span class="text-rose-500">*</span>
                    </label>
                    <span class="text-[11px] text-slate-400">
                        {{ strlen($short_description) }}/1000 characters
                    </span>
                </div>
                <textarea
                    wire:model="short_description"
                    rows="3"
                    placeholder="Brief 1-2 sentence description displayed on service cards, proposal summaries, and mobile views..."
                    class="flex w-full rounded-md border {{ $errors->has('short_description') ? 'border-rose-400 focus-visible:ring-rose-400' : 'border-slate-200 focus-visible:ring-slate-950' }} bg-white px-3 py-2 text-xs shadow-xs transition-colors placeholder:text-slate-400 focus-visible:outline-none focus-visible:ring-1 leading-relaxed"
                ></textarea>
                @error('short_description')
                    <p class="text-[11px] text-rose-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Detailed Content (TinyMCE via Alpine.js) -->
            <div class="space-y-1.5">
                <div class="flex items-center justify-between">
                    <label class="text-xs font-medium text-slate-700">
                        Detailed Service Content & Scope (TinyMCE)
                    </label>
                    <span class="text-[11px] text-slate-400">
                        Rich formatting, bullet points, SLA tables, and technical specifications
                    </span>
                </div>
                <div
                    wire:ignore
                    x-data="tinymceEditor({ model: 'content', height: 380, placeholder: 'Enter comprehensive information regarding technical specs, frequency options, equipment used, and service level assurances...' })"
                    class="rounded-md border border-slate-200 overflow-hidden shadow-xs bg-white"
                >
                    <textarea
                        x-ref="textarea"
                        id="service_add_content"
                        class="w-full min-h-[300px] p-3 text-xs text-slate-800 focus:outline-none leading-relaxed font-sans"
                        placeholder="Enter comprehensive information regarding technical specs, frequency options, equipment used, and service level assurances..."
                    >{{ $content }}</textarea>
                </div>
                @error('content')
                    <p class="text-[11px] text-rose-500">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- Section 4: Search Engine Optimization (SEO) -->
        <div class="rounded-xl border border-slate-200/80 bg-white p-6 shadow-xs space-y-5">
            <div class="border-b border-slate-100 pb-3">
                <h2 class="text-sm font-semibold text-slate-900 flex items-center gap-2">
                    <i class="ri-search-eye-line text-slate-500"></i>
                    <span>SEO & Metadata (Search Engine Optimization)</span>
                </h2>
                <p class="text-xs text-slate-500 mt-0.5">Control how this service offering appears in Google search engine rankings.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <!-- Meta Title -->
                <div class="space-y-1.5 md:col-span-2">
                    <label class="text-xs font-medium text-slate-700">
                        Meta Title
                    </label>
                    <input
                        type="text"
                        wire:model="meta_title"
                        placeholder="e.g. Industrial Floor Scrubbing & Marble Care | FacilityPro"
                        class="flex h-9 w-full rounded-md border border-slate-200 bg-white px-3 py-1 text-xs shadow-xs transition-colors placeholder:text-slate-400 focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-slate-950"
                    />
                    @error('meta_title')
                        <p class="text-[11px] text-rose-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Meta Description -->
                <div class="space-y-1.5 md:col-span-2">
                    <label class="text-xs font-medium text-slate-700">
                        Meta Description
                    </label>
                    <textarea
                        wire:model="meta_description"
                        rows="2"
                        placeholder="Concise 150-160 character description shown on search engine result snippets..."
                        class="flex w-full rounded-md border border-slate-200 bg-white px-3 py-2 text-xs shadow-xs transition-colors placeholder:text-slate-400 focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-slate-950 leading-relaxed"
                    ></textarea>
                    @error('meta_description')
                        <p class="text-[11px] text-rose-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Meta Keywords -->
                <div class="space-y-1.5 md:col-span-2">
                    <label class="text-xs font-medium text-slate-700">
                        Meta Keywords
                    </label>
                    <input
                        type="text"
                        wire:model="meta_keyword"
                        placeholder="e.g. janitorial, marble buffing, corporate sweeping, SLA cleaning"
                        class="flex h-9 w-full rounded-md border border-slate-200 bg-white px-3 py-1 text-xs shadow-xs transition-colors placeholder:text-slate-400 focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-slate-950"
                    />
                    <p class="text-[10px] text-slate-400">Separate keywords with commas.</p>
                    @error('meta_keyword')
                        <p class="text-[11px] text-rose-500">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Form Actions Sticky Bar -->
        <div class="sticky bottom-4 z-20 rounded-xl border border-slate-200/90 bg-white/95 backdrop-blur-md p-4 shadow-lg flex flex-col sm:flex-row items-center justify-between gap-3">
            <div class="text-xs text-slate-500 flex items-center gap-1.5">
                <i class="ri-information-line text-blue-500"></i>
                <span>All changes will be reflected across public service catalog.</span>
            </div>

            <div class="flex items-center gap-2.5 w-full sm:w-auto justify-end">
                <a
                    href="{{ route('admin.services.index') }}"
                    wire:navigate
                    class="inline-flex h-9 items-center justify-center rounded-md border border-slate-200 bg-white px-4 text-xs font-medium text-slate-700 shadow-xs hover:bg-slate-50 transition"
                >
                    Cancel
                </a>
                <button
                    type="button"
                    wire:click="save(true)"
                    wire:loading.attr="disabled"
                    class="inline-flex h-9 items-center justify-center rounded-md border border-slate-300 bg-slate-50 px-4 text-xs font-medium text-slate-800 shadow-xs hover:bg-slate-100 transition cursor-pointer disabled:opacity-50"
                >
                    <span wire:loading.remove wire:target="save">Save & Add Another</span>
                    <span wire:loading wire:target="save">Saving...</span>
                </button>
                <button
                    type="submit"
                    wire:loading.attr="disabled"
                    class="inline-flex h-9 items-center justify-center rounded-md bg-slate-900 px-5 text-xs font-medium text-white shadow-xs hover:bg-slate-800 transition gap-1.5 cursor-pointer disabled:opacity-50"
                >
                    <i class="ri-check-line text-sm" wire:loading.remove wire:target="save"></i>
                    <span wire:loading.remove wire:target="save">Save Service</span>
                    <span wire:loading wire:target="save">Saving...</span>
                </button>
            </div>
        </div>

    </form>

</div>