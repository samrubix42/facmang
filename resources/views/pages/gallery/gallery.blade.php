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
                    list() {
                        return this.items.filter(item => {
                            const matchCategory = this.category === 'all' || item.category === this.category;
                            const q = this.searchQuery.toLowerCase().trim();
                            const matchSearch = !q || item.title.toLowerCase().includes(q) || (item.category_name && item.category_name.toLowerCase().includes(q));
                            return matchCategory && matchSearch;
                        });
                    },
                    open(item, index) {
                        this.active = item;
                        this.currentIndex = index;
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

    {{-- Hero Section (Dark Blue & Red Accent Branding) --}}
    <section class="relative border-b border-slate-100 bg-gradient-to-b from-[#12233F]/[0.03] via-white to-white py-16 sm:py-24 overflow-hidden">
        {{-- Ambient decorative background orbs --}}
        <div class="absolute -top-40 left-1/2 -translate-x-1/2 h-96 w-[800px] bg-gradient-to-tr from-[#12233F]/10 via-red-500/10 to-transparent blur-3xl rounded-full pointer-events-none -z-10"></div>

        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-3xl text-center space-y-5">
                
                {{-- Eyebrow badge --}}
                <div class="inline-flex items-center gap-2 rounded-full border border-[#12233F]/15 bg-[#12233F]/5 px-3.5 py-1.5 text-xs font-semibold text-[#12233F] shadow-2xs">
                    <span class="flex h-2 w-2 rounded-full bg-red-500 animate-pulse"></span>
                    <span>Verified Project Archive</span>
                    <span class="text-slate-300">•</span>
                    <span class="text-slate-600 font-normal">Tamper-Proof Field Proof</span>
                </div>

                {{-- Headline --}}
                <h1 class="text-3xl font-extrabold tracking-tight text-slate-900 sm:text-5xl sm:leading-[1.15]">
                    Real Work. Clean Results.<br class="hidden sm:inline" /> Documented To The Minute.
                </h1>

                {{-- Subtitle --}}
                <p class="text-sm sm:text-base leading-relaxed text-slate-600 font-normal max-w-2xl mx-auto">
                    Explore high-resolution visual records from our delivered commercial contracts — precision sweeping, molecular hygiene, executive pantries, MEP care, and facade maintenance programs.
                </p>

                {{-- Key Trust Pillars --}}
                <div class="pt-4 flex flex-wrap items-center justify-center gap-2 sm:gap-4 text-xs text-slate-700 font-medium">
                    <div class="inline-flex items-center gap-1.5 rounded-lg bg-[#12233F]/5 px-3.5 py-1.5 border border-[#12233F]/10">
                        <i class="ri-qr-code-line text-red-600"></i>
                        <span>QR Time-Stamped Audits</span>
                    </div>
                    <div class="inline-flex items-center gap-1.5 rounded-lg bg-[#12233F]/5 px-3.5 py-1.5 border border-[#12233F]/10">
                        <i class="ri-shield-check-line text-[#12233F]"></i>
                        <span>100% W-2 Direct Staff</span>
                    </div>
                    <div class="inline-flex items-center gap-1.5 rounded-lg bg-[#12233F]/5 px-3.5 py-1.5 border border-[#12233F]/10">
                        <i class="ri-checkbox-circle-line text-red-600"></i>
                        <span>Zero Quality Defects</span>
                    </div>
                </div>

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
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">

                <template x-for="(item, index) in list()" :key="item.id || (item.image + index)">
                    <div
                        @click="open(item, index)"
                        class="group relative aspect-[4/3] w-full overflow-hidden rounded-2xl border border-slate-200/80 bg-[#0B1A30] shadow-xs transition-all duration-300 hover:-translate-y-1 hover:shadow-xl hover:border-[#12233F]/40 cursor-pointer"
                    >
                        {{-- Photo Image with subtle hover zoom --}}
                        <img
                            :src="item.image"
                            :alt="item.title"
                            loading="lazy"
                            class="h-full w-full object-cover transition-transform duration-700 ease-out group-hover:scale-105"
                        />

                        {{-- Dark Navy Gradient Overlay --}}
                        <div class="absolute inset-0 bg-gradient-to-t from-[#0B1A30]/95 via-[#0B1A30]/40 to-transparent"></div>

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

                        {{-- Card Bottom Info --}}
                        <div class="absolute inset-x-0 bottom-0 p-4 sm:p-5">
                            <h3 class="text-sm font-bold tracking-tight text-white line-clamp-1 leading-snug" x-text="item.title"></h3>
                            
                            <div class="mt-1 flex items-center justify-between text-[11px] text-slate-300">
                                <span class="flex items-center gap-1.5 text-red-400 font-medium">
                                    <span class="h-1.5 w-1.5 rounded-full bg-red-500 animate-pulse"></span>
                                    <span>QR Audit Verified</span>
                                </span>
                                <span class="text-xs font-semibold text-white/90 group-hover:text-red-400 transition flex items-center gap-1">
                                    <span>Inspect</span>
                                    <i class="ri-arrow-right-s-line text-sm"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </template>

                {{-- Interactive CTA Card at end of grid (Dark Blue with Red Highlights) --}}
                <a
                    href="{{ route('contact') }}"
                    class="group relative aspect-[4/3] w-full flex flex-col justify-between overflow-hidden rounded-2xl bg-[#12233F] p-6 text-white border border-[#12233F] shadow-xs hover:bg-[#0B1A30] hover:shadow-xl hover:-translate-y-1 transition-all duration-300"
                >
                    <span class="absolute -top-12 -right-12 h-36 w-36 rounded-full bg-red-600/20 blur-xl transition group-hover:bg-red-600/30"></span>

                    <div class="relative flex items-center justify-between">
                        <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-red-600 text-white shadow-sm">
                            <i class="ri-clipboard-line text-xl"></i>
                        </span>
                        <span class="rounded-full bg-red-600/20 px-2.5 py-0.5 text-[10px] font-bold text-red-400 border border-red-500/30">
                            Free Assessment
                        </span>
                    </div>

                    <div class="relative space-y-1.5">
                        <h3 class="text-base font-bold tracking-tight text-white leading-tight">
                            Request Live Site Photographic Audit
                        </h3>
                        <p class="text-xs text-slate-300 leading-relaxed">
                            Receive a filmed, time-stamped visual audit of your facilities with tailored SLA benchmarks.
                        </p>
                    </div>

                    <div class="relative flex items-center gap-1 text-xs font-semibold text-red-400 group-hover:text-red-300 transition">
                        <span>Book 30-Min Audit</span>
                        <i class="ri-arrow-right-line transition-transform group-hover:translate-x-1"></i>
                    </div>
                </a>

            </div>

            {{-- Empty State (when search has no matches) --}}
            <div
                x-show="list().length === 0"
                x-cloak
                class="rounded-2xl border border-slate-200 bg-slate-50/50 p-12 text-center space-y-4"
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
                        <span>FacilityPro Verified Live Field Photographic Audit</span>
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

    {{-- Field Telemetry & Quality Standards Bar (Brand Dark Blue & Red) --}}
    <section class="border-y border-slate-100 bg-slate-50/50 py-16">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-8">
                
                {{-- Metric 1 --}}
                <div class="space-y-2 text-center sm:text-left">
                    <div class="flex items-center justify-center sm:justify-start gap-2">
                        <i class="ri-qr-code-line text-xl text-red-600"></i>
                        <span class="text-3xl font-extrabold text-[#12233F] tracking-tight">12,400+</span>
                    </div>
                    <p class="text-xs font-bold text-slate-900">QR Checkpoints Logged</p>
                    <p class="text-[11px] text-slate-500 leading-relaxed">
                        Every shift sweep, sanitize cycle, and filter replacement recorded with timestamp.
                    </p>
                </div>

                {{-- Metric 2 --}}
                <div class="space-y-2 text-center sm:text-left">
                    <div class="flex items-center justify-center sm:justify-start gap-2">
                        <i class="ri-building-line text-xl text-[#12233F]"></i>
                        <span class="text-3xl font-extrabold text-[#12233F] tracking-tight">480+</span>
                    </div>
                    <p class="text-xs font-bold text-slate-900">Delivered Facilities</p>
                    <p class="text-[11px] text-slate-500 leading-relaxed">
                        Class-A office headquarters, logistics distribution centers, and healthcare campuses.
                    </p>
                </div>

                {{-- Metric 3 --}}
                <div class="space-y-2 text-center sm:text-left">
                    <div class="flex items-center justify-center sm:justify-start gap-2">
                        <i class="ri-user-star-line text-xl text-[#12233F]"></i>
                        <span class="text-3xl font-extrabold text-[#12233F] tracking-tight">100%</span>
                    </div>
                    <p class="text-xs font-bold text-slate-900">W-2 Certified Personnel</p>
                    <p class="text-[11px] text-slate-500 leading-relaxed">
                        Background verified, uniformed, and safety certified direct workforce.
                    </p>
                </div>

                {{-- Metric 4 --}}
                <div class="space-y-2 text-center sm:text-left">
                    <div class="flex items-center justify-center sm:justify-start gap-2">
                        <i class="ri-shield-check-line text-xl text-red-600"></i>
                        <span class="text-3xl font-extrabold text-red-600 tracking-tight">99.85%</span>
                    </div>
                    <p class="text-xs font-bold text-slate-900">SLA Adherence Rate</p>
                    <p class="text-[11px] text-slate-500 leading-relaxed">
                        Strict contracted turnaround SLA windows guaranteed with live dashboard tracking.
                    </p>
                </div>

            </div>
        </div>
    </section>

    {{-- Call to Action Banner (Dark Navy #0B1A30 with Red Accents) --}}
    <section class="py-20 sm:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="relative overflow-hidden rounded-3xl bg-[#0B1A30] px-6 py-14 sm:px-12 lg:py-16 text-center text-white border border-slate-800 shadow-xl">
                {{-- Decorative background glow --}}
                <div class="absolute -top-24 -right-24 h-80 w-80 rounded-full bg-red-600/15 blur-3xl pointer-events-none"></div>
                <div class="absolute -bottom-24 -left-24 h-80 w-80 rounded-full bg-[#12233F]/40 blur-3xl pointer-events-none"></div>

                <div class="relative max-w-2xl mx-auto space-y-5">
                    <div class="inline-flex items-center gap-2 rounded-full bg-white/10 px-3.5 py-1 text-xs font-semibold text-red-400 border border-white/10">
                        <i class="ri-calendar-check-line text-xs"></i>
                        <span>Zero Commitment Walkthrough</span>
                    </div>

                    <h2 class="text-3xl font-extrabold tracking-tight text-white sm:text-4xl">
                        Ready To Inspect The Care Standard For Your Property?
                    </h2>

                    <p class="text-sm text-slate-300 leading-relaxed max-w-lg mx-auto">
                        Schedule a complimentary 30-minute on-site assessment. Receive a documented, filmed audit log with tailored SLA specifications within 24 hours.
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