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
        document.addEventListener('alpine:init', registerScrollReveal);
        if (window.Alpine) { registerScrollReveal(); }
    })();
</script>

<div class="bg-white text-slate-800 antialiased font-sans selection:bg-red-500 selection:text-white">

    {{-- Hero Section --}}
    <section class="border-b border-slate-100 py-16 sm:py-20 lg:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid items-center gap-12 lg:grid-cols-12 lg:gap-16">
                
                <!-- Left Text Column -->
                <div class="lg:col-span-7 space-y-6">
                    <div>
                        <span class="inline-flex items-center gap-2 rounded-full bg-[#12233F]/10 px-3.5 py-1 text-xs font-semibold text-[#12233F]">
                            <span class="h-2 w-2 rounded-full bg-red-500"></span>
                            <span>Enterprise Facility Capabilities</span>
                        </span>
                    </div>

                    <h1 class="text-3xl font-extrabold leading-[1.15] tracking-tight text-slate-900 sm:text-4xl lg:text-5xl">
                        Architectural services for corporate real estate.
                    </h1>

                    <p class="text-sm sm:text-base leading-relaxed text-slate-600 max-w-2xl font-normal">
                        Replace fragmented janitorial vendors with single-point SLA accountability. Direct-employed W-2 personnel, IoT QR-code telemetry, and hospital-grade sanitization.
                    </p>

                    <!-- Key Metrics Strip -->
                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-6 border-t border-slate-100 pt-6">
                        <div>
                            <p class="text-2xl sm:text-3xl font-bold text-slate-900 tracking-tight">99.85%</p>
                            <p class="text-[11px] font-medium text-slate-400 mt-0.5">SLA Compliance</p>
                        </div>
                        <div>
                            <p class="text-2xl sm:text-3xl font-bold text-[#12233F] tracking-tight">15-Min</p>
                            <p class="text-[11px] font-medium text-slate-400 mt-0.5">Emergency Dispatch</p>
                        </div>
                        <div>
                            <p class="text-2xl sm:text-3xl font-bold text-slate-900 tracking-tight">100%</p>
                            <p class="text-[11px] font-medium text-slate-400 mt-0.5">W-2 Direct Staff</p>
                        </div>
                        <div>
                            <p class="text-2xl sm:text-3xl font-bold text-[#12233F] tracking-tight">500+</p>
                            <p class="text-[11px] font-medium text-slate-400 mt-0.5">Active Towers</p>
                        </div>
                    </div>
                </div>

                <!-- Right Feature Hero Banner -->
                <div class="lg:col-span-5 relative">
                    <div class="relative h-[320px] sm:h-[380px] w-full overflow-hidden rounded-3xl border border-slate-100 bg-slate-100 shadow-sm">
                        <img 
                            src="{{ asset('images/office_sweeping_cleaning.jpg') }}" 
                            alt="Facility Management Professional Cleaning" 
                            class="h-full w-full object-cover"
                        />
                        <div class="absolute inset-0 bg-gradient-to-t from-[#0B1A30]/70 via-transparent to-transparent"></div>

                        <!-- Top Badges -->
                        <div class="absolute top-4 left-4 right-4 flex justify-between items-center">
                            <span class="inline-flex items-center gap-1.5 rounded-full bg-white/95 px-3 py-1 text-xs font-semibold text-slate-800 shadow-sm">
                                <i class="ri-shield-star-fill text-[#12233F]"></i> ISO 41001
                            </span>
                            <span class="inline-flex items-center gap-1.5 rounded-full bg-red-600 px-3 py-1 text-xs font-semibold text-white shadow-sm">
                                Backfill Guaranteed
                            </span>
                        </div>

                        <!-- Bottom Telemetry Card -->
                        <div class="absolute bottom-4 left-4 right-4 rounded-2xl border border-white/20 bg-white/95 p-3.5 shadow-lg backdrop-blur-md">
                            <div class="flex items-center gap-3">
                                <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-red-600 text-white">
                                    <i class="ri-qr-code-line text-lg"></i>
                                </div>
                                <div class="min-w-0">
                                    <p class="text-xs font-bold text-slate-900 truncate">IoT QR Telemetry Active</p>
                                    <p class="text-[11px] text-slate-500 truncate">Real-time digital audits for every floor zone</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- Filter & Services Portfolio Section --}}
    <section class="py-16 sm:py-20 lg:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            
            <!-- Controls Bar: Title & Search -->
            <div class="flex flex-col gap-6 lg:flex-row lg:items-center lg:justify-between border-b border-slate-100 pb-6">
                <div>
                    <h2 class="text-2xl font-bold tracking-tight text-slate-900 sm:text-3xl">
                        Operational Capabilities
                    </h2>
                    <p class="mt-1 text-xs sm:text-sm text-slate-500">
                        Filter by category or search specific workplace requirements.
                    </p>
                </div>

                <!-- Search Input (Rounded-Full) -->
                <div class="relative min-w-[260px] sm:w-80">
                    <i class="ri-search-line absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 text-sm"></i>
                    <input
                        type="text"
                        wire:model.live.debounce.200ms="search"
                        placeholder="Search services, janitorial, MEP..."
                        class="w-full rounded-full border border-slate-200 bg-white pl-10 pr-9 py-2.5 text-xs text-slate-900 placeholder:text-slate-400 focus:border-red-500 focus:outline-none focus:ring-1 focus:ring-red-500 transition"
                    />
                    @if ($search !== '')
                        <button
                            type="button"
                            wire:click="$set('search', '')"
                            class="absolute right-3.5 top-1/2 -translate-y-1/2 text-slate-400 hover:text-slate-600"
                            aria-label="Clear search"
                        >
                            <i class="ri-close-circle-fill text-sm"></i>
                        </button>
                    @endif
                </div>
            </div>

            <!-- Category Filter Tabs (Rounded-Full Pills) -->
            <div class="mt-6 flex flex-wrap items-center gap-2 overflow-x-auto pb-2">
                <button
                    type="button"
                    wire:click="setCategory('all')"
                    class="rounded-full px-5 py-2 text-xs font-semibold transition cursor-pointer {{ $category === 'all' ? 'bg-red-600 text-white shadow-xs' : 'bg-slate-50 text-slate-700 hover:bg-slate-100 border border-slate-200/80' }}"
                >
                    All Services ({{ $this->totalServicesCount }})
                </button>
                @foreach ($this->categories as $cat)
                    <button
                        type="button"
                        wire:key="category-pill-{{ $cat->id }}"
                        wire:click="setCategory('{{ $cat->slug }}')"
                        class="rounded-full px-5 py-2 text-xs font-semibold transition cursor-pointer {{ $category === $cat->slug ? 'bg-red-600 text-white shadow-xs' : 'bg-slate-50 text-slate-700 hover:bg-slate-100 border border-slate-200/80' }}"
                    >
                        <span>{{ $cat->title }}</span>
                        @if ($cat->services_count > 0)
                            <span class="ml-1 text-[11px] opacity-75">({{ $cat->services_count }})</span>
                        @endif
                    </button>
                @endforeach
            </div>

            <!-- Services Grid with Modern Rounded-3xl Cards & Rounded-Full Buttons -->
            <div class="mt-10 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                @forelse ($this->services as $service)
                    <div 
                        wire:key="service-{{ $service->id }}"
                        class="group flex flex-col rounded-3xl border border-slate-200/80 bg-white overflow-hidden shadow-xs hover:border-[#12233F]/30 hover:shadow-xl transition-all duration-300"
                    >
                        <!-- Card Image -->
                        <div class="relative h-48 overflow-hidden bg-slate-100">
                            <img
                                src="{{ asset($service->image) }}"
                                alt="{{ $service->title }}"
                                class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105"
                                onerror="this.onerror=null; this.src='https://placehold.co/600x400?text={{ urlencode($service->title) }}';"
                            />
                            <div class="absolute inset-0 bg-gradient-to-t from-[#0B1A30]/60 via-transparent to-transparent"></div>

                            <span class="absolute top-4 left-4 rounded-full bg-white/95 px-3 py-1 text-[11px] font-semibold text-slate-800 shadow-xs">
                                <i class="ri-shield-check-line text-[#12233F] mr-1"></i> {{ $service->category?->title ?? 'Facility Service' }}
                            </span>

                            <span class="absolute bottom-3 left-3 rounded-full bg-[#12233F]/90 px-3 py-1 text-[10px] font-semibold text-red-400">
                                SLA Guaranteed
                            </span>
                        </div>

                        <!-- Card Body -->
                        <div class="flex flex-1 flex-col p-6 sm:p-7 justify-between">
                            <div>
                                <h3 class="text-lg font-bold text-slate-900 group-hover:text-[#12233F] transition leading-snug">
                                    <a href="{{ route('services.show', ['slug' => $service->slug]) }}">
                                        {{ $service->title }}
                                    </a>
                                </h3>

                                <p class="mt-1 text-xs font-semibold text-[#12233F]">
                                    {{ $service->category?->title ?? 'Commercial Facility Solution' }}
                                </p>

                                <p class="mt-2 text-xs sm:text-sm text-slate-600 leading-relaxed line-clamp-3">
                                    {{ $service->short_description }}
                                </p>
                            </div>

                            <!-- Footer with Clean Rounded-Full Action Button -->
                            <div class="mt-6 pt-5 border-t border-slate-100 flex items-center justify-between gap-3">
                                <span class="text-xs font-medium text-slate-400">
                                    <i class="ri-time-line text-[11px] mr-1 text-slate-400"></i> Scheduled Care
                                </span>

                                <a
                                    href="{{ route('services.show', ['slug' => $service->slug]) }}"
                                    class="inline-flex items-center gap-1.5 rounded-full bg-[#12233F] group-hover:bg-red-600 px-5 py-2 text-xs font-semibold text-white transition-colors"
                                >
                                    <span>View Scope</span>
                                    <i class="ri-arrow-right-line text-xs"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full rounded-3xl border border-dashed border-slate-200 bg-white p-12 text-center">
                        <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-full bg-[#12233F]/10 text-[#12233F]">
                            <i class="ri-search-2-line text-2xl"></i>
                        </div>
                        <h3 class="mt-4 text-base font-bold text-slate-900">No matching facility services found</h3>
                        <p class="mt-1 text-xs text-slate-500">
                            Try adjusting your search query or reset the filter.
                        </p>
                        <button
                            type="button"
                            wire:click="$set('search', ''); $set('category', 'all');"
                            class="mt-4 inline-flex items-center gap-2 rounded-full bg-red-600 px-6 py-2.5 text-xs font-semibold text-white shadow-xs hover:bg-red-700 transition cursor-pointer"
                        >
                            Reset Filters
                        </button>
                    </div>
                @endforelse
            </div>

        </div>
    </section>

    {{-- SLA & Operational Standards Differentiator Strip --}}
    <section class="border-y border-slate-100 bg-slate-50/50 py-16 sm:py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="max-w-xl mx-auto text-center">
                <span class="inline-flex items-center gap-1.5 rounded-full bg-[#12233F]/10 px-3.5 py-1 text-xs font-semibold text-[#12233F]">
                    <i class="ri-shield-flash-line text-xs"></i> Distinction
                </span>
                <h2 class="mt-3 text-3xl font-extrabold tracking-tight text-slate-900 sm:text-4xl">
                    Why Property Managers Switch
                </h2>
                <p class="mt-3 text-sm text-slate-600 leading-relaxed">
                    Engineering operational discipline through technology and direct in-house staff.
                </p>
            </div>

            <div class="mt-12 grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
                
                <div class="rounded-3xl border border-slate-200/80 bg-white p-6 shadow-xs hover:border-[#12233F]/30 transition">
                    <span class="flex h-10 w-10 items-center justify-center rounded-full bg-[#12233F]/10 text-[#12233F] mb-4">
                        <i class="ri-contract-line text-lg"></i>
                    </span>
                    <h3 class="text-base font-bold text-slate-900">Single Master SLA</h3>
                    <p class="mt-2 text-xs sm:text-sm text-slate-600 leading-relaxed">
                        One contract and one consolidated monthly invoice. No vendor disputes between cleaning and engineering.
                    </p>
                </div>

                <div class="rounded-3xl border border-slate-200/80 bg-white p-6 shadow-xs hover:border-[#12233F]/30 transition">
                    <span class="flex h-10 w-10 items-center justify-center rounded-full bg-[#12233F] text-white mb-4">
                        <i class="ri-qr-code-line text-lg"></i>
                    </span>
                    <h3 class="text-base font-bold text-slate-900">IoT QR Telemetry</h3>
                    <p class="mt-2 text-xs sm:text-sm text-slate-600 leading-relaxed">
                        Every washroom and floor cleaning is digitally signed off via scannable QR tags with live timestamps.
                    </p>
                </div>

                <div class="rounded-3xl border border-slate-200/80 bg-white p-6 shadow-xs hover:border-[#12233F]/30 transition">
                    <span class="flex h-10 w-10 items-center justify-center rounded-full bg-[#12233F]/10 text-[#12233F] mb-4">
                        <i class="ri-user-star-line text-lg"></i>
                    </span>
                    <h3 class="text-base font-bold text-slate-900">100% W-2 Direct Staff</h3>
                    <p class="mt-2 text-xs sm:text-sm text-slate-600 leading-relaxed">
                        Zero subcontracting. All stewards and janitors undergo background checks and standardized hospitality training.
                    </p>
                </div>

                <div class="rounded-3xl border border-slate-200/80 bg-white p-6 shadow-xs hover:border-[#12233F]/30 transition">
                    <span class="flex h-10 w-10 items-center justify-center rounded-full bg-[#12233F] text-white mb-4">
                        <i class="ri-leaf-line text-lg"></i>
                    </span>
                    <h3 class="text-base font-bold text-slate-900">Green Seal Eco-Formulas</h3>
                    <p class="mt-2 text-xs sm:text-sm text-slate-600 leading-relaxed">
                        Hospital-grade virucidal solutions using non-toxic chemistries that preserve indoor air quality.
                    </p>
                </div>

            </div>
        </div>
    </section>

    {{-- Bottom High-Conversion CTA (Rounded-Full Buttons) --}}
    <section class="py-20 sm:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="relative overflow-hidden rounded-3xl bg-[#0B1A30] px-6 py-14 sm:px-12 lg:py-16 text-center text-white border border-slate-800">
                <div class="relative max-w-2xl mx-auto space-y-4">
                    <span class="inline-flex items-center gap-1.5 rounded-full bg-white/10 px-3.5 py-1 text-xs font-semibold text-red-400">
                        <i class="ri-building-4-line text-xs"></i> Enterprise Facility Partnership
                    </span>

                    <h2 class="text-3xl font-extrabold tracking-tight sm:text-4xl text-white">
                        Transform your workplace operations
                    </h2>

                    <p class="text-sm text-slate-400 leading-relaxed max-w-lg mx-auto">
                        Speak directly with an operations director for a free spatial audit and customized SLA proposal within 48 hours.
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
                            href="tel:{{ setting('phone', '+1 (800) 492-8820') }}"
                            class="inline-flex items-center gap-2 rounded-full border border-white/20 bg-white/10 px-6 py-3.5 text-xs sm:text-sm font-medium text-white backdrop-blur-md transition hover:bg-white/20 active:scale-[0.98]"
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