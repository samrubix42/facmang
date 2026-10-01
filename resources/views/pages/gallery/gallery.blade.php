<script>
    (function() {
        const registerGalleryApp = () => {
            if (typeof Alpine !== 'undefined' && !Alpine.data('galleryApp')) {
                Alpine.data('galleryApp', () => ({
                    items: @json($this->items()),
                    category: 'all',
                    searchQuery: '',
                    active: null,
                    currentIndex: 0,
                    page: 1,
                    perPage: 6,
                    init() {
                        this.$watch('category', () => { this.page = 1; });
                        this.$watch('searchQuery', () => { this.page = 1; });
                    },
                    list() {
                        return this.items.filter(item => {
                            const matchCategory = this.category === 'all' || item.category === this.category;
                            const q = this.searchQuery.toLowerCase().trim();
                            const matchSearch = !q || item.title.toLowerCase().includes(q) || (item.category_name && item.category_name.toLowerCase().includes(q));
                            return matchCategory && matchSearch;
                        });
                    },
                    totalPages() {
                        return Math.max(1, Math.ceil(this.list().length / this.perPage));
                    },
                    paginatedList() {
                        const start = (this.page - 1) * this.perPage;
                        return this.list().slice(start, start + this.perPage);
                    },
                    goToPage(p) {
                        if (p >= 1 && p <= this.totalPages()) {
                            this.page = p;
                        }
                    },
                    open(item, index) {
                        this.active = item;
                        this.currentIndex = (this.page - 1) * this.perPage + index;
                        document.body.style.overflow = 'hidden';
                    },
                    close() {
                        this.active = null;
                        document.body.style.overflow = '';
                    },
                    next() {
                        const list = this.list();
                        if (!list.length) return;
                        this.currentIndex = (this.currentIndex + 1) % list.length;
                        this.active = list[this.currentIndex];
                    },
                    prev() {
                        const list = this.list();
                        if (!list.length) return;
                        this.currentIndex = (this.currentIndex - 1 + list.length) % list.length;
                        this.active = list[this.currentIndex];
                    }
                }));
            }
        };

        document.addEventListener('alpine:init', registerGalleryApp);
        if (window.Alpine) {
            registerGalleryApp();
        }
    })();
</script>

<div class="bg-white text-slate-800 antialiased font-sans selection:bg-red-500 selection:text-white" x-data="galleryApp">

    {{-- Page Hero --}}
    <section class="bg-[#0B1A30]">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            <nav class="border-b border-white/10 py-3.5 text-xs" aria-label="Breadcrumb">
                <ol class="flex flex-wrap items-center gap-1.5">
                    <li><a href="{{ route('home') }}" class="font-medium text-slate-400 transition hover:text-white">Home</a></li>
                    <li aria-hidden="true"><i class="ri-arrow-right-s-line text-slate-600"></i></li>
                    <li><span class="font-semibold text-white" aria-current="page">Gallery</span></li>
                </ol>
            </nav>

            <div class="py-14 sm:py-20 lg:py-24">
                <h1 class="text-4xl font-extrabold leading-[1.05] tracking-tighter text-white sm:text-5xl lg:text-6xl">
                    Gallery
                </h1>

                <p class="mt-4 max-w-2xl text-sm leading-relaxed text-slate-300 sm:text-base">
                    Photos from the sites we maintain today.
                </p>
            </div>
        </div>
    </section>

    {{-- Interactive Gallery Section --}}
    <section class="py-12 sm:py-16 lg:py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 space-y-8">

            {{-- Filter & Search Toolbar --}}
            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4 pb-2 border-b border-slate-100">
                
                {{-- Category Filter Chips --}}
                <div class="flex flex-wrap items-center gap-2">
                    @foreach ($this->categories() as $key => $label)
                        <button
                            type="button"
                            @click="category = '{{ $key }}'"
                            class="inline-flex items-center gap-2 rounded-full px-4 py-2 text-xs font-semibold transition-all cursor-pointer"
                            :class="category === '{{ $key }}'
                                ? 'bg-[#12233F] text-white border border-[#12233F] shadow-sm' 
                                : 'bg-white text-slate-700 border border-slate-200 hover:border-[#12233F]/40 hover:text-[#12233F]'"
                        >
                            <span>{{ $label }}</span>
                            <span
                                class="rounded-full px-1.5 py-0.2 text-[10px] font-bold"
                                :class="category === '{{ $key }}' ? 'bg-red-600 text-white' : 'bg-slate-100 text-slate-500'"
                            >
                                {{ $this->counts()[$key] }}
                            </span>
                        </button>
                    @endforeach
                </div>

                {{-- Instant Search Input --}}
                <div class="relative w-full sm:w-72 shrink-0">
                    <i class="ri-search-line absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-xs"></i>
                    <input
                        type="text"
                        x-model="searchQuery"
                        placeholder="Search verified sites..."
                        class="flex h-9 w-full rounded-full border border-slate-200 bg-white pl-8 pr-8 py-1 text-xs shadow-2xs transition-colors placeholder:text-slate-400 focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-[#12233F]"
                    />
                    <button
                        x-show="searchQuery.length > 0"
                        x-cloak
                        @click="searchQuery = ''"
                        type="button"
                        class="absolute right-2.5 top-1/2 -translate-y-1/2 text-slate-400 hover:text-slate-700 text-xs"
                    >
                        <i class="ri-close-line"></i>
                    </button>
                </div>

            </div>

            {{-- Live Result Count --}}
            <div class="flex items-center justify-between text-xs text-slate-500">
                <p>
                    Showing <span class="font-bold text-[#12233F]" x-text="list().length"></span> verified work captures
                </p>
                <div class="flex items-center gap-1.5 text-[11px] text-[#12233F] bg-[#12233F]/5 px-3 py-1 rounded-full border border-[#12233F]/10 font-semibold">
                    <span class="h-1.5 w-1.5 rounded-full bg-red-500"></span>
                    <span>All Photos Verified Real &amp; Active</span>
                </div>
            </div>

            {{-- Gallery Cards Grid --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5 sm:gap-6">

                <template x-for="(item, index) in paginatedList()" :key="item.id || (item.image + index)">
                    <div
                        @click="open(item, index)"
                        class="group relative aspect-[3/2] w-full overflow-hidden rounded-2xl border border-slate-200/80 bg-[#0B1A30] shadow-xs transition-all duration-300 hover:-translate-y-1 hover:shadow-xl hover:border-[#12233F]/40 cursor-pointer"
                    >
                        {{-- Photo Image with subtle hover zoom --}}
                        <img
                            :src="item.image"
                            :alt="item.title"
                            loading="lazy"
                            class="h-full w-full object-cover transition-transform duration-700 ease-out group-hover:scale-105"
                        />

                        {{-- Category Badge (Top Left) --}}
                        <div class="absolute top-3.5 left-3.5">
                            <span class="inline-flex items-center gap-1.5 rounded-full bg-white/95 px-3 py-1 text-[11px] font-bold text-[#12233F] shadow-xs border border-white/60 backdrop-blur-md">
                                <i :class="item.icon || 'ri-image-line'" class="text-xs text-red-600"></i>
                                <span x-text="item.category_name || 'Facility Care'"></span>
                            </span>
                        </div>

                        {{-- Expand Icon (Top Right) --}}
                        <div class="absolute top-3.5 right-3.5">
                            <span class="flex h-8 w-8 items-center justify-center rounded-full bg-[#12233F]/80 text-white backdrop-blur-md border border-white/20 transition-all duration-200 group-hover:bg-red-600 group-hover:text-white group-hover:scale-110">
                                <i class="ri-fullscreen-line text-sm"></i>
                            </span>
                        </div>
                    </div>
                </template>

            </div>

            {{-- Pagination Navigation Bar --}}
            <div x-show="totalPages() > 1" class="mt-8 flex flex-col sm:flex-row items-center justify-between gap-4 border-t border-slate-100 pt-6">
                <p class="text-xs text-slate-500">
                    Showing page <span class="font-bold text-[#12233F]" x-text="page"></span> of <span class="font-bold text-[#12233F]" x-text="totalPages()"></span>
                </p>

                <div class="flex items-center gap-1.5">
                    {{-- Previous Button --}}
                    <button
                        type="button"
                        @click="goToPage(page - 1)"
                        :disabled="page === 1"
                        class="inline-flex h-9 items-center justify-center gap-1 rounded-full border border-slate-200 bg-white px-3.5 text-xs font-semibold text-slate-700 transition hover:border-[#12233F]/40 hover:text-[#12233F] disabled:opacity-40 disabled:cursor-not-allowed cursor-pointer"
                    >
                        <i class="ri-arrow-left-s-line text-sm"></i>
                        <span>Prev</span>
                    </button>

                    {{-- Page Numbers --}}
                    <template x-for="p in totalPages()" :key="p">
                        <button
                            type="button"
                            @click="goToPage(p)"
                            class="inline-flex h-9 w-9 items-center justify-center rounded-full text-xs font-bold transition cursor-pointer"
                            :class="p === page 
                                ? 'bg-red-600 text-white shadow-xs' 
                                : 'bg-white border border-slate-200 text-slate-700 hover:border-[#12233F]/40 hover:text-[#12233F]'"
                            x-text="p"
                        ></button>
                    </template>

                    {{-- Next Button --}}
                    <button
                        type="button"
                        @click="goToPage(page + 1)"
                        :disabled="page === totalPages()"
                        class="inline-flex h-9 items-center justify-center gap-1 rounded-full border border-slate-200 bg-white px-3.5 text-xs font-semibold text-slate-700 transition hover:border-[#12233F]/40 hover:text-[#12233F] disabled:opacity-40 disabled:cursor-not-allowed cursor-pointer"
                    >
                        <span>Next</span>
                        <i class="ri-arrow-right-s-line text-sm"></i>
                    </button>
                </div>
            </div>

            {{-- Empty State (when search has no matches) --}}
            <div
                x-show="list().length === 0"
                x-cloak
                class="rounded-2xl border border-slate-200 bg-slate-50/50 p-8 text-center sm:p-12 space-y-4"
            >
                <div class="flex h-12 w-12 mx-auto items-center justify-center rounded-full bg-white text-slate-400 border border-slate-200">
                    <i class="ri-image-line text-xl"></i>
                </div>
                <div class="space-y-1">
                    <h3 class="text-sm font-bold text-slate-900">No projects found</h3>
                    <p class="text-xs text-slate-500">
                        No portfolio captures match your search query. Try clearing your filters.
                    </p>
                </div>
                <button
                    type="button"
                    @click="category = 'all'; searchQuery = ''"
                    class="inline-flex h-8 items-center justify-center rounded-full bg-[#12233F] px-4 text-xs font-semibold text-white shadow-xs hover:bg-[#0B1A30] transition cursor-pointer"
                >
                    Reset All Filters
                </button>
            </div>

        </div>

        {{-- Fullscreen Lightbox Modal (Deep Navy Backdrop with Red Accents) --}}
        <div
            x-show="active"
            x-cloak
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            @keydown.escape.window="close()"
            @keydown.arrow-right.window="next()"
            @keydown.arrow-left.window="prev()"
            class="fixed inset-0 z-50 flex flex-col justify-between bg-[#0B1A30]/95 p-4 sm:p-6 backdrop-blur-xl"
            role="dialog"
            aria-modal="true"
        >
            {{-- Lightbox Top Bar --}}
            <div class="flex items-center justify-between text-white border-b border-white/10 pb-4 max-w-6xl w-full mx-auto">
                <div class="flex items-center gap-3">
                    <span class="inline-flex items-center gap-1.5 rounded-full bg-white/10 px-3 py-1 text-xs font-semibold text-slate-200 border border-white/10">
                        <i :class="active ? active.icon : 'ri-image-line'" class="text-xs text-red-400"></i>
                        <span x-text="active ? active.category_name : ''"></span>
                    </span>
                    <span class="text-xs text-slate-400 font-mono" x-text="(currentIndex + 1) + ' of ' + list().length"></span>
                </div>

                <div class="flex items-center gap-2">
                    <button
                        type="button"
                        @click="close()"
                        class="inline-flex h-9 items-center justify-center gap-1.5 rounded-full border border-white/15 bg-white/10 px-4 text-xs font-medium text-white hover:bg-red-600 hover:border-red-600 transition cursor-pointer"
                    >
                        <span>Close</span>
                        <kbd class="text-[10px] text-slate-400 font-mono uppercase bg-white/10 px-1.5 py-0.5 rounded">Esc</kbd>
                    </button>
                </div>
            </div>

            {{-- Lightbox Center Stage --}}
            <div class="relative flex-1 flex items-center justify-center my-4 max-w-6xl w-full mx-auto">
                {{-- Previous Button --}}
                <button
                    type="button"
                    @click.stop="prev()"
                    aria-label="Previous capture"
                    class="absolute left-2 sm:left-4 z-10 flex h-11 w-11 items-center justify-center rounded-full border border-white/15 bg-[#12233F]/80 text-white backdrop-blur-md transition hover:bg-red-600 hover:scale-105 cursor-pointer shadow-lg"
                >
                    <i class="ri-arrow-left-s-line text-2xl"></i>
                </button>

                {{-- Image Display --}}
                <div class="relative max-h-[72vh] flex items-center justify-center">
                    <img
                        :src="active ? active.image : ''"
                        :alt="active ? active.title : ''"
                        class="max-h-[72vh] w-auto max-w-full rounded-2xl border border-white/10 object-contain shadow-2xl"
                    />
                </div>

                {{-- Next Button --}}
                <button
                    type="button"
                    @click.stop="next()"
                    aria-label="Next capture"
                    class="absolute right-2 sm:right-4 z-10 flex h-11 w-11 items-center justify-center rounded-full border border-white/15 bg-[#12233F]/80 text-white backdrop-blur-md transition hover:bg-red-600 hover:scale-105 cursor-pointer shadow-lg"
                >
                    <i class="ri-arrow-right-s-line text-2xl"></i>
                </button>
            </div>

            {{-- Lightbox Bottom Bar --}}
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 text-white border-t border-white/10 pt-4 max-w-6xl w-full mx-auto">
                <div class="space-y-0.5">
                    <h2 class="text-base font-bold text-white tracking-tight" x-text="active ? active.title : ''"></h2>
                    <p class="text-xs text-slate-300 flex items-center gap-1.5">
                        <span class="flex h-1.5 w-1.5 rounded-full bg-red-500 animate-pulse"></span>
                        <span>Real Facility Services (RFS) Verified Live Field Photographic Audit</span>
                    </p>
                </div>

                <div class="flex items-center gap-2.5">
                    <a
                        href="{{ route('contact') }}"
                        class="inline-flex h-9 items-center justify-center rounded-full bg-red-600 hover:bg-red-500 px-4 text-xs font-semibold text-white shadow-xs transition cursor-pointer gap-1.5"
                    >
                        <span>Inquire About This Service</span>
                        <i class="ri-arrow-right-line text-xs"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

   

    {{-- Call to Action Banner (Dark Navy #0B1A30 with Red Accents) --}}
    <section class="py-14 sm:py-20 lg:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="relative overflow-hidden rounded-3xl bg-[#0B1A30] px-6 py-14 sm:px-12 lg:py-16 text-center text-white border border-slate-800 shadow-xl">
                <div class="relative max-w-2xl mx-auto space-y-5">
                    <div class="inline-flex items-center gap-2 rounded-full bg-white/10 px-3.5 py-1 text-xs font-semibold text-red-400 border border-white/10">
                        <i class="ri-calendar-check-line text-xs"></i>
                        <span>Zero Commitment Walkthrough</span>
                    </div>

                    <h2 class="text-3xl font-extrabold tracking-tight text-white sm:text-4xl">
                        Ready To Inspect The Care Standard For Your Property?
                    </h2>

                    <p class="text-sm text-slate-300 leading-relaxed max-w-lg mx-auto">
                        Schedule a complimentary 30-minute on-site assessment. Receive a documented, filmed audit log with tailored service specifications within 24 hours.
                    </p>

                    <div class="pt-4 flex flex-wrap items-center justify-center gap-3">
                        <a
                            href="{{ route('contact') }}"
                            class="inline-flex items-center gap-2 rounded-full bg-red-600 hover:bg-red-500 px-7 py-3 text-xs sm:text-sm font-semibold text-white shadow-sm transition active:scale-[0.98] cursor-pointer"
                        >
                            <span>Request Facility Audit</span>
                            <i class="ri-arrow-right-line text-sm"></i>
                        </a>
                        <a
                            href="tel:{{ setting('phone', '+1 (800) 492-8820') }}"
                            class="inline-flex items-center gap-2 rounded-full border border-white/20 bg-white/10 px-6 py-3 text-xs sm:text-sm font-medium text-white backdrop-blur-md transition hover:bg-white/20 active:scale-[0.98] cursor-pointer"
                        >
                            <i class="ri-phone-line text-sm text-red-400"></i>
                            <span>{{ setting('phone', '+1 (800) 492-8820') }}</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>