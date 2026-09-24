<script>
    (function() {
        const registerScrollReveal = () => {
            if (typeof Alpine !== 'undefined' && !Alpine.data('scrollReveal')) {
                Alpine.data('scrollReveal', (delay = 0) => ({
                    shown: false,
                    init() {
                        const observer = new IntersectionObserver((entries) => {
                            entries.forEach(entry => {
                                if (entry.isIntersecting) {
                                    setTimeout(() => {
                                        this.shown = true;
                                    }, delay);
                                    observer.unobserve(entry.target);
                                }
                            });
                        }, { threshold: 0.1, rootMargin: '0px 0px -40px 0px' });
                        observer.observe(this.$el);
                    }
                }));
            }
        };
        const registerGalleryLightbox = () => {
            if (typeof Alpine !== 'undefined' && !Alpine.data('galleryLightbox')) {
                Alpine.data('galleryLightbox', () => ({
                    items: @json($this->items()),
                    category: 'all',
                    active: null,
                    currentIndex: 0,
                    list() {
                        return this.category === 'all'
                            ? this.items
                            : this.items.filter(item => item.category === this.category);
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
                        this.currentIndex = (this.currentIndex + 1) % list.length;
                        this.active = list[this.currentIndex];
                    },
                    prev() {
                        const list = this.list();
                        this.currentIndex = (this.currentIndex - 1 + list.length) % list.length;
                        this.active = list[this.currentIndex];
                    }
                }));
            }
        };
        document.addEventListener('alpine:init', () => {
            registerScrollReveal();
            registerGalleryLightbox();
        });
        if (window.Alpine) {
            registerScrollReveal();
            registerGalleryLightbox();
        }
    })();
</script>

<div class="bg-white text-slate-800 antialiased font-sans selection:bg-red-500 selection:text-white">

    {{-- Hero Header Section --}}
    <section class="border-b border-slate-100 py-16 sm:py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-2xl text-center space-y-4">
                <div>
                    <span class="inline-flex items-center gap-2 rounded-full bg-[#12233F]/10 px-3.5 py-1 text-xs font-semibold text-[#12233F]">
                        <span class="h-2 w-2 rounded-full bg-red-500"></span>
                        <span>Verified Project Gallery</span>
                    </span>
                </div>

                <h1 class="text-3xl font-extrabold leading-[1.15] tracking-tight text-slate-900 sm:text-4xl lg:text-5xl">
                    Real Work. Documented To The Minute.
                </h1>

                <p class="text-sm sm:text-base leading-relaxed text-slate-600 font-normal">
                    A curated look at delivered sites — sweeping, restroom hygiene, pantry staffing, MEP care, and facade programs — each backed by time-stamped QR audit logs.
                </p>
            </div>
        </div>
    </section>

    {{-- Filterable Gallery Grid --}}
    <section class="py-16 sm:py-20 lg:py-24 border-b border-slate-100" x-data="galleryLightbox">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="max-w-2xl mx-auto text-center space-y-5">
                <div class="space-y-2">
                    <span class="inline-flex items-center gap-1.5 rounded-full bg-[#12233F]/10 px-3.5 py-1 text-xs font-semibold text-[#12233F]">
                        <i class="ri-gallery-fill text-xs"></i> Portfolio
                    </span>
                    <h2 class="text-3xl font-extrabold tracking-tight text-slate-900 sm:text-4xl">
                        Sites Delivered At Scale
                    </h2>
                    <p class="text-sm text-slate-600 leading-relaxed">
                        Filter the portfolio by capability and open any tile to inspect the full visual record.
                    </p>
                </div>

                <!-- Filter Chips -->
                <div class="flex flex-wrap items-center justify-center gap-2.5 pt-2">
                    @foreach ($this->categories() as $key => $label)
                        <button
                            type="button"
                            @click="category = '{{ $key }}'"
                            :class="category === '{{ $key }}' ? 'bg-[#12233F] text-white border-[#12233F] shadow-sm' : 'bg-white text-slate-700 border-slate-200 hover:border-[#12233F]/40 hover:text-[#12233F]'"
                            class="inline-flex items-center gap-2 rounded-full border px-4 py-2 text-xs font-semibold transition cursor-pointer"
                        >
                            <span>{{ $label }}</span>
                            <span class="rounded-full px-1.5 py-0.5 text-[10px] font-bold" :class="category === '{{ $key }}' ? 'bg-white/20 text-white' : 'bg-slate-100 text-slate-500'">{{ $this->counts()[$key] }}</span>
                        </button>
                    @endforeach
                </div>
            </div>

            <!-- Gallery Grid -->
            <div class="mt-12 grid grid-cols-2 gap-4 sm:gap-5 md:grid-cols-3 lg:grid-cols-4">
                <template x-for="(item, index) in list()" :key="item.image + index">
                    <button
                        type="button"
                        @click="open(item, index)"
                        class="group relative aspect-[4/3] w-full overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-xs text-left transition hover:border-[#12233F]/30 hover:shadow-md cursor-pointer"
                    >
                        <img
                            :src="item.image"
                            :alt="item.title"
                            loading="lazy"
                            class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105"
                        />
                        <div class="absolute inset-0 bg-gradient-to-t from-[#0B1A30]/85 via-[#0B1A30]/15 to-transparent"></div>

                        <span class="absolute top-3 left-3 inline-flex items-center gap-1 rounded-full bg-white/90 px-2.5 py-1 text-[9px] font-bold uppercase tracking-wider text-[#12233F] backdrop-blur-sm">
                            <i class="ri-checkbox-circle-fill text-[10px] text-red-600"></i>
                            <span x-text="item.tag"></span>
                        </span>

                        <span class="absolute top-3 right-3 flex h-8 w-8 items-center justify-center rounded-full bg-white/90 text-[#12233F] backdrop-blur-sm transition group-hover:bg-red-600 group-hover:text-white">
                            <i class="ri-zoom-in-line text-sm"></i>
                        </span>

                        <div class="absolute inset-x-0 bottom-0 p-4">
                            <p class="text-sm font-bold text-white" x-text="item.title"></p>
                            <p class="mt-0.5 flex items-center gap-1 text-[10px] text-slate-300">
                                <i class="ri-qr-code-line text-xs text-red-400"></i> QR Audit Logged Site
                            </p>
                        </div>
                    </button>
                </template>

                <!-- Navy Audit CTA Tile -->
                <a
                    href="{{ route('contact') }}"
                    class="group relative flex aspect-[4/3] w-full flex-col items-center justify-center gap-3 overflow-hidden rounded-3xl bg-[#12233F] p-6 text-center text-white transition hover:bg-[#0B1A30]"
                >
                    <span class="absolute -top-10 -right-10 h-32 w-32 rounded-full bg-red-600/20 transition group-hover:bg-red-600/30"></span>
                    <span class="flex h-11 w-11 items-center justify-center rounded-full bg-red-600 text-white shadow-sm">
                        <i class="ri-clipboard-line text-lg"></i>
                    </span>
                    <div class="relative space-y-1">
                        <p class="text-sm font-bold">Request A Live Audit</p>
                        <p class="text-[10px] text-slate-400 leading-relaxed">Get filmed, time-stamped proof of care on your site.</p>
                    </div>
                    <span class="relative inline-flex items-center gap-1 text-xs font-semibold text-red-400">
                        <span>Start Now</span>
                        <i class="ri-arrow-right-line transition-transform group-hover:translate-x-0.5"></i>
                    </span>
                </a>
            </div>
        </div>

        <!-- Lightbox Overlay -->
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
            class="fixed inset-0 z-[100] flex items-center justify-center bg-[#0B1A30]/95 p-4 backdrop-blur-sm sm:p-8"
            role="dialog"
            aria-modal="true"
            @click.self="close()"
        >
            <button
                type="button"
                @click="close()"
                aria-label="Close gallery preview"
                class="absolute top-5 right-5 z-10 flex h-10 w-10 items-center justify-center rounded-full border border-white/15 bg-white/10 text-white transition hover:bg-white/25 cursor-pointer"
            >
                <i class="ri-close-line text-lg"></i>
            </button>

            <button
                type="button"
                @click="prev()"
                aria-label="Previous image"
                class="absolute left-4 sm:left-8 z-10 flex h-11 w-11 items-center justify-center rounded-full border border-white/15 bg-white/10 text-white transition hover:bg-white/25 cursor-pointer"
            >
                <i class="ri-arrow-left-s-line text-2xl"></i>
            </button>

            <button
                type="button"
                @click="next()"
                aria-label="Next image"
                class="absolute right-4 sm:right-8 z-10 flex h-11 w-11 items-center justify-center rounded-full border border-white/15 bg-white/10 text-white transition hover:bg-white/25 cursor-pointer"
            >
                <i class="ri-arrow-right-s-line text-2xl"></i>
            </button>

            <figure x-show="active" class="max-w-4xl w-full">
                <img
                    :src="active.image"
                    :alt="active.title"
                    class="w-full max-h-[68vh] rounded-2xl border border-white/10 object-cover shadow-2xl"
                />
                <figcaption class="mt-4 flex flex-wrap items-center justify-between gap-3">
                    <div class="min-w-0">
                        <p class="text-sm font-bold text-white" x-text="active.title"></p>
                        <p class="mt-0.5 text-xs text-slate-400" x-text="active.tag"></p>
                    </div>
                    <span class="rounded-full bg-white/10 px-3 py-1 text-[10px] font-bold uppercase tracking-wider text-red-400" x-text="(currentIndex + 1) + ' / ' + list().length"></span>
                </figcaption>
            </figure>
        </div>
    </section>

    {{-- QA & Delivery Stats Band --}}
    <section
        x-data="scrollReveal(0)"
        :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8 pointer-events-none'"
        class="border-b border-slate-100 bg-slate-50/50 py-14 transition-all duration-700 ease-out"
    >
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 gap-8 lg:grid-cols-4 text-center">
                <div>
                    <p class="text-2xl sm:text-3xl font-bold text-[#12233F] tracking-tight">12,400+</p>
                    <p class="text-[11px] font-medium text-slate-400 mt-0.5">QR Audits Logged</p>
                </div>
                <div>
                    <p class="text-2xl sm:text-3xl font-bold text-[#12233F] tracking-tight">480+</p>
                    <p class="text-[11px] font-medium text-slate-400 mt-0.5">Sites Delivered</p>
                </div>
                <div>
                    <p class="text-2xl sm:text-3xl font-bold text-[#12233F] tracking-tight">2,400+</p>
                    <p class="text-[11px] font-medium text-slate-400 mt-0.5">Certified Crew</p>
                </div>
                <div>
                    <p class="text-2xl sm:text-3xl font-bold text-red-600 tracking-tight">99.85%</p>
                    <p class="text-[11px] font-medium text-slate-400 mt-0.5">SLA Adherence</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Final CTA Banner --}}
    <section
        x-data="scrollReveal(0)"
        :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8 pointer-events-none'"
        class="py-20 sm:py-24 transition-all duration-700 ease-out"
    >
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="relative overflow-hidden rounded-3xl bg-[#0B1A30] px-6 py-14 sm:px-12 lg:py-16 text-center text-white border border-slate-800">
                <div class="relative max-w-2xl mx-auto space-y-4">
                    <span class="inline-flex items-center gap-1.5 rounded-full bg-white/10 px-3.5 py-1 text-xs font-semibold text-red-400">
                        <i class="ri-camera-lens-fill text-xs"></i> Proof-First Operations
                    </span>
                    <h2 class="text-3xl font-extrabold tracking-tight text-white sm:text-4xl">
                        See it applied to your facility
                    </h2>
                    <p class="text-sm text-slate-400 leading-relaxed max-w-lg mx-auto">
                        Book a free on-site assessment and receive a documented, QR-logged pilot plan for your space.
                    </p>

                    <div class="pt-4 flex flex-wrap items-center justify-center gap-3">
                        <a
                            href="{{ route('contact') }}"
                            class="inline-flex items-center gap-2 rounded-full bg-red-500 px-7 py-3.5 text-xs sm:text-sm font-semibold text-slate-950 shadow-sm transition hover:bg-red-400 active:scale-[0.98]"
                        >
                            <span>Request Facility Audit</span>
                            <i class="ri-arrow-right-line text-sm"></i>
                        </a>
                        <a
                            href="tel:+18004928820"
                            class="inline-flex items-center gap-2 rounded-full border border-white/20 bg-white/10 px-6 py-3.5 text-xs sm:text-sm font-medium text-white backdrop-blur-md transition hover:bg-white/20 active:scale-[0.98]"
                        >
                            <i class="ri-phone-line text-sm text-red-400"></i>
                            <span>+1 (800) 492-8820</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>