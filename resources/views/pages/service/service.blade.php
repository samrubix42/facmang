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

<div class="bg-slate-50 text-slate-800 antialiased font-sans">

    {{-- Hero Section --}}
    <section class="relative overflow-hidden bg-white py-12 sm:py-16 lg:py-20 border-b border-slate-200/80">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid items-center gap-10 lg:grid-cols-12 lg:gap-12">
                
                <!-- Left Text Column -->
                <div class="lg:col-span-7 space-y-5">
                    <div>
                        <span class="inline-flex items-center gap-2 rounded-full border border-emerald-200 bg-emerald-50 px-3.5 py-1.5 text-xs font-bold uppercase tracking-wider text-emerald-800">
                            <span class="h-2 w-2 rounded-full bg-emerald-500 animate-pulse"></span>
                            <span>Enterprise Facility Solutions • SLA-Backed</span>
                        </span>
                    </div>

                    <h1 class="text-3xl font-extrabold leading-[1.18] tracking-tight text-slate-900 sm:text-4xl lg:text-5xl">
                        Architectural-Grade Services for <span class="text-emerald-600">High-Performance Workplaces</span>
                    </h1>

                    <p class="text-sm leading-relaxed text-slate-600 sm:text-base lg:text-lg max-w-2xl">
                        Replace fragmented janitorial vendors with single-point SLA accountability. We combine 100% W-2 vetted personnel, IoT QR-code telemetry, and hospital-grade eco-friendly formulas to keep your corporate environment immaculate.
                    </p>

                    <!-- Quick Metrics Strip -->
                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-3.5 border-t border-slate-100 pt-6">
                        <div class="rounded-xl border border-slate-100 bg-slate-50/70 p-3.5 min-h-[80px] flex flex-col justify-between">
                            <p class="text-2xl sm:text-3xl font-extrabold text-slate-900 leading-none">99.85%</p>
                            <p class="text-[10px] font-bold uppercase tracking-wider text-slate-500 mt-1">SLA Compliance</p>
                        </div>
                        <div class="rounded-xl border border-slate-100 bg-slate-50/70 p-3.5 min-h-[80px] flex flex-col justify-between">
                            <p class="text-2xl sm:text-3xl font-extrabold text-emerald-600 leading-none">15-Min</p>
                            <p class="text-[10px] font-bold uppercase tracking-wider text-slate-500 mt-1">Emergency Dispatch</p>
                        </div>
                        <div class="rounded-xl border border-slate-100 bg-slate-50/70 p-3.5 min-h-[80px] flex flex-col justify-between">
                            <p class="text-2xl sm:text-3xl font-extrabold text-slate-900 leading-none">100%</p>
                            <p class="text-[10px] font-bold uppercase tracking-wider text-slate-500 mt-1">W-2 Vetted Staff</p>
                        </div>
                        <div class="rounded-xl border border-slate-100 bg-slate-50/70 p-3.5 min-h-[80px] flex flex-col justify-between">
                            <p class="text-2xl sm:text-3xl font-extrabold text-emerald-600 leading-none">500+</p>
                            <p class="text-[10px] font-bold uppercase tracking-wider text-slate-500 mt-1">Active Properties</p>
                        </div>
                    </div>
                </div>

                <!-- Right Feature Hero Banner -->
                <div class="lg:col-span-5 relative">
                    <div class="relative h-[320px] sm:h-[380px] w-full overflow-hidden rounded-3xl border border-slate-100 shadow-2xl shadow-slate-200/60 bg-slate-100">
                        <img 
                            src="{{ asset('images/office_sweeping_cleaning.jpg') }}" 
                            alt="Facility Management Professional Cleaning" 
                            class="h-full w-full object-cover"
                        />
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-slate-950/20 to-transparent"></div>

                        <!-- Top Floating Badges -->
                        <div class="absolute top-4 left-4 right-4 flex justify-between items-center">
                            <span class="inline-flex items-center gap-1.5 rounded-full bg-white/95 px-3 py-1 text-xs font-bold text-slate-800 shadow-md backdrop-blur-md">
                                <i class="ri-shield-star-fill text-emerald-600"></i> ISO 41001 Certified
                            </span>
                            <span class="inline-flex items-center gap-1.5 rounded-full bg-emerald-600 px-3 py-1 text-xs font-bold text-white shadow-md">
                                <i class="ri-check-double-line"></i> Guaranteed Backfill
                            </span>
                        </div>

                        <!-- Bottom Floating Telemetry Card -->
                        <div class="absolute bottom-4 left-4 right-4 rounded-2xl border border-white/20 bg-white/95 p-3.5 shadow-xl backdrop-blur-md">
                            <div class="flex items-center gap-3">
                                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-emerald-600 text-white font-bold shadow-xs">
                                    <i class="ri-qr-code-line text-xl"></i>
                                </div>
                                <div class="min-w-0">
                                    <p class="text-xs font-bold text-slate-900 truncate">IoT QR Telemetry Verification</p>
                                    <p class="text-[11px] font-medium text-slate-600 truncate">Real-time digital audits for every floor & washroom</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- Filter & Services Portfolio Section --}}
    <section class="py-12 sm:py-16 lg:py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            
            <!-- Controls Bar: Search & Title -->
            <div class="flex flex-col gap-6 lg:flex-row lg:items-center lg:justify-between border-b border-slate-200/80 pb-6">
                <div>
                    <h2 class="text-2xl font-extrabold text-slate-900 sm:text-3xl tracking-tight">
                        Our Operational Capabilities
                    </h2>
                    <p class="mt-1 text-xs sm:text-sm text-slate-600">
                        Select a category or search specific workplace requirements to inspect full scopes of work.
                    </p>
                </div>

                <!-- Search Input -->
                <div class="relative min-w-[260px] sm:w-80">
                    <i class="ri-search-line absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400 text-base"></i>
                    <input
                        type="text"
                        wire:model.live.debounce.200ms="search"
                        placeholder="Search services, janitorial, MEP..."
                        class="w-full rounded-xl border border-slate-200 bg-white pl-10 pr-9 py-2.5 text-xs text-slate-900 placeholder:text-slate-400 focus:border-emerald-500 focus:outline-none focus:ring-2 focus:ring-emerald-500/20 transition shadow-2xs"
                    />
                    @if ($search !== '')
                        <button
                            type="button"
                            wire:click="$set('search', '')"
                            class="absolute right-3 top-1/2 -translate-y-1/2 text-slate-400 hover:text-slate-600"
                            aria-label="Clear search"
                        >
                            <i class="ri-close-circle-fill text-sm"></i>
                        </button>
                    @endif
                </div>
            </div>

            <!-- Category Filter Tabs -->
            <div class="mt-6 flex flex-wrap items-center gap-2 overflow-x-auto pb-2">
                <button
                    type="button"
                    wire:click="setCategory('all')"
                    class="rounded-xl px-4 py-2 text-xs font-bold transition shadow-2xs {{ $category === 'all' ? 'bg-emerald-600 text-white shadow-emerald-600/20' : 'bg-white text-slate-700 hover:bg-slate-100 border border-slate-200/80' }}"
                >
                    All Services ({{ count(\App\Services\ServiceCatalog::all()) }})
                </button>
                <button
                    type="button"
                    wire:click="setCategory('janitorial')"
                    class="rounded-xl px-4 py-2 text-xs font-bold transition shadow-2xs {{ $category === 'janitorial' ? 'bg-emerald-600 text-white shadow-emerald-600/20' : 'bg-white text-slate-700 hover:bg-slate-100 border border-slate-200/80' }}"
                >
                    <i class="ri-sweep-line mr-1"></i> Janitorial & Floors
                </button>
                <button
                    type="button"
                    wire:click="setCategory('hygiene')"
                    class="rounded-xl px-4 py-2 text-xs font-bold transition shadow-2xs {{ $category === 'hygiene' ? 'bg-emerald-600 text-white shadow-emerald-600/20' : 'bg-white text-slate-700 hover:bg-slate-100 border border-slate-200/80' }}"
                >
                    <i class="ri-drop-line mr-1"></i> Sanitation & Washrooms
                </button>
                <button
                    type="button"
                    wire:click="setCategory('staffing')"
                    class="rounded-xl px-4 py-2 text-xs font-bold transition shadow-2xs {{ $category === 'staffing' ? 'bg-emerald-600 text-white shadow-emerald-600/20' : 'bg-white text-slate-700 hover:bg-slate-100 border border-slate-200/80' }}"
                >
                    <i class="ri-cup-line mr-1"></i> Office Boys & Pantry
                </button>
                <button
                    type="button"
                    wire:click="setCategory('technical')"
                    class="rounded-xl px-4 py-2 text-xs font-bold transition shadow-2xs {{ $category === 'technical' ? 'bg-emerald-600 text-white shadow-emerald-600/20' : 'bg-white text-slate-700 hover:bg-slate-100 border border-slate-200/80' }}"
                >
                    <i class="ri-tools-line mr-1"></i> MEP & Technical
                </button>
            </div>

            <!-- Services Grid with Surgical Horizontal & Vertical Alignment -->
            <div class="mt-8 grid gap-6 sm:gap-8 md:grid-cols-2 lg:grid-cols-3">
                @forelse ($this->services as $service)
                    <div 
                        wire:key="service-{{ $service['slug'] }}"
                        class="group flex flex-col overflow-hidden rounded-2xl border border-slate-200/90 bg-white shadow-sm transition-all duration-300 hover:-translate-y-1 hover:border-emerald-400 hover:shadow-xl hover:shadow-emerald-900/10"
                    >
                        <!-- Card Image Header -->
                        <div class="relative h-52 overflow-hidden bg-slate-100">
                            <img
                                src="{{ asset($service['image']) }}"
                                alt="{{ $service['title'] }}"
                                class="h-full w-full object-cover transition duration-500 group-hover:scale-105"
                            />
                            <div class="absolute inset-0 bg-gradient-to-t from-slate-950/70 via-slate-950/20 to-transparent"></div>

                            <!-- Top Badges -->
                            <div class="absolute top-3 left-3 right-3 flex items-center justify-between">
                                <span class="inline-flex items-center gap-1.5 rounded-md bg-emerald-950/90 px-2.5 py-1 text-[11px] font-bold tracking-wider text-emerald-400 border border-emerald-700/50 backdrop-blur-xs">
                                    <i class="{{ $service['icon'] }}"></i> {{ $service['badge'] }}
                                </span>
                                <span class="inline-flex items-center gap-1 rounded-md bg-white/95 px-2.5 py-1 text-[10px] font-bold text-slate-800 shadow-xs">
                                    <i class="ri-shield-check-fill text-emerald-600"></i> SLA Backed
                                </span>
                            </div>

                            <!-- Bottom SLA Pill -->
                            <div class="absolute bottom-3 left-3">
                                <span class="inline-flex items-center gap-1.5 rounded-full bg-slate-900/90 px-3 py-1 text-[11px] font-semibold text-emerald-300 border border-slate-700/60 backdrop-blur-xs">
                                    <i class="ri-speed-up-line text-emerald-400"></i> {{ $service['sla_rating'] }}
                                </span>
                            </div>
                        </div>

                        <!-- Card Body with Fixed Baseline Alignment -->
                        <div class="flex flex-1 flex-col p-6">
                            
                            <!-- Title (Uniform Min Height) -->
                            <h3 class="text-lg sm:text-xl font-extrabold text-slate-900 group-hover:text-emerald-700 transition leading-snug min-h-[3.25rem] flex items-start">
                                <a href="{{ route('services.show', ['slug' => $service['slug']]) }}">
                                    {{ $service['title'] }}
                                </a>
                            </h3>

                            <!-- Tagline (Uniform Min Height) -->
                            <p class="mt-1 text-xs font-semibold text-emerald-700 min-h-[2rem] flex items-center">
                                {{ $service['tagline'] }}
                            </p>

                            <!-- Short Description (Uniform Min Height) -->
                            <p class="mt-2.5 text-xs sm:text-sm leading-relaxed text-slate-600 line-clamp-3 min-h-[4rem]">
                                {{ $service['short_description'] }}
                            </p>

                            <!-- Key Deliverables List -->
                            <div class="mt-4 space-y-2 border-t border-slate-100 pt-4 text-xs font-medium text-slate-700">
                                @foreach (array_slice($service['features'], 0, 3) as $feature)
                                    <div class="flex items-start gap-2">
                                        <i class="ri-checkbox-circle-fill text-emerald-600 mt-0.5 shrink-0"></i>
                                        <span class="truncate">{{ $feature }}</span>
                                    </div>
                                @endforeach
                            </div>

                            <!-- Card Action Footer (Locked to Absolute Bottom) -->
                            <div class="mt-auto pt-5 border-t border-slate-100 flex items-center justify-between gap-3">
                                <div class="text-[11px] font-medium text-slate-500">
                                    <span class="font-bold text-slate-700">{{ $service['frequency'] }}</span>
                                </div>

                                <a
                                    href="{{ route('services.show', ['slug' => $service['slug']]) }}"
                                    class="inline-flex items-center gap-1.5 rounded-xl bg-slate-900 px-4 py-2 text-xs font-bold text-white transition hover:bg-emerald-600 hover:shadow-md shrink-0 group-hover:bg-emerald-600"
                                >
                                    <span>Scope & SLA</span>
                                    <i class="ri-arrow-right-line transition-transform group-hover:translate-x-0.5"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full rounded-2xl border border-dashed border-slate-300 bg-white p-12 text-center">
                        <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-2xl bg-emerald-50 text-emerald-600">
                            <i class="ri-search-2-line text-3xl"></i>
                        </div>
                        <h3 class="mt-4 text-lg font-bold text-slate-900">No matching facility services found</h3>
                        <p class="mt-1 text-xs sm:text-sm text-slate-500">
                            Try adjusting your search query or reset the category filter to view all capabilities.
                        </p>
                        <button
                            type="button"
                            wire:click="$set('search', ''); $set('category', 'all');"
                            class="mt-5 inline-flex items-center gap-2 rounded-xl bg-emerald-600 px-5 py-2.5 text-xs font-bold uppercase tracking-wider text-white shadow-sm transition hover:bg-emerald-700"
                        >
                            Reset All Filters
                        </button>
                    </div>
                @endforelse
            </div>

        </div>
    </section>

    {{-- SLA & Operational Standards Differentiator Strip --}}
    <section class="border-y border-slate-200/80 bg-white py-16 sm:py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-2xl text-center">
                <div class="inline-flex items-center gap-2 rounded-md border border-emerald-200 bg-emerald-50 px-3 py-1 text-[10px] font-bold uppercase tracking-[0.2em] text-emerald-800">
                    <i class="ri-shield-flash-line text-emerald-600"></i>
                    <span>The FacilityPro Difference</span>
                </div>
                <h2 class="mt-3 text-2xl font-extrabold tracking-tight text-slate-900 sm:text-3xl lg:text-4xl">
                    Why Corporate Property Managers Switch To Us
                </h2>
                <p class="mt-3 text-sm leading-relaxed text-slate-600 sm:text-base">
                    Traditional janitorial vendors rely on unvetted contractors and zero verification. We engineer operational discipline through technology and full in-house accountability.
                </p>
            </div>

            <div class="mt-12 grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
                
                <div class="flex flex-col justify-between rounded-2xl border border-slate-200/90 bg-slate-50/60 p-6 transition duration-300 hover:border-emerald-300 hover:bg-white hover:shadow-lg">
                    <div>
                        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-emerald-600 text-white shadow-sm mb-4">
                            <i class="ri-contract-line text-2xl"></i>
                        </div>
                        <h3 class="text-base font-bold text-slate-900">Single Master SLA</h3>
                        <p class="mt-2 text-xs sm:text-sm leading-relaxed text-slate-600">
                            One vendor, one phone call, one consolidated monthly invoice. No vendor disputes or finger-pointing between cleaners and technical teams.
                        </p>
                    </div>
                </div>

                <div class="flex flex-col justify-between rounded-2xl border border-slate-200/90 bg-slate-50/60 p-6 transition duration-300 hover:border-emerald-300 hover:bg-white hover:shadow-lg">
                    <div>
                        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-emerald-600 text-white shadow-sm mb-4">
                            <i class="ri-qr-code-line text-2xl"></i>
                        </div>
                        <h3 class="text-base font-bold text-slate-900">IoT QR Telemetry</h3>
                        <p class="mt-2 text-xs sm:text-sm leading-relaxed text-slate-600">
                            Every washroom and floor cleaning is digitally signed off via scannable QR tags. Real-time dashboards provide 100% inspection visibility.
                        </p>
                    </div>
                </div>

                <div class="flex flex-col justify-between rounded-2xl border border-slate-200/90 bg-slate-50/60 p-6 transition duration-300 hover:border-emerald-300 hover:bg-white hover:shadow-lg">
                    <div>
                        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-emerald-600 text-white shadow-sm mb-4">
                            <i class="ri-user-star-line text-2xl"></i>
                        </div>
                        <h3 class="text-base font-bold text-slate-900">100% W-2 In-House Staff</h3>
                        <p class="mt-2 text-xs sm:text-sm leading-relaxed text-slate-600">
                            Zero subcontracting. All stewards, technicians, and janitors undergo background checks, 40 hours of hospitality training, and full NDA compliance.
                        </p>
                    </div>
                </div>

                <div class="flex flex-col justify-between rounded-2xl border border-slate-200/90 bg-slate-50/60 p-6 transition duration-300 hover:border-emerald-300 hover:bg-white hover:shadow-lg">
                    <div>
                        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-emerald-600 text-white shadow-sm mb-4">
                            <i class="ri-leaf-line text-2xl"></i>
                        </div>
                        <h3 class="text-base font-bold text-slate-900">Green Seal Eco-Formulas</h3>
                        <p class="mt-2 text-xs sm:text-sm leading-relaxed text-slate-600">
                            Hospital-grade virucidal eradication using non-toxic, biodegradable chemistries that protect indoor air quality without harsh fumes.
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- 4-Step Onboarding Blueprint --}}
    <section class="py-16 sm:py-20 lg:py-24 bg-slate-50">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-2xl text-center">
                <div class="inline-flex items-center gap-2 rounded-md border border-emerald-200 bg-emerald-50 px-3 py-1 text-[10px] font-bold uppercase tracking-[0.2em] text-emerald-800">
                    <i class="ri-route-line text-emerald-600"></i>
                    <span>Implementation Roadmap</span>
                </div>
                <h2 class="mt-3 text-2xl font-extrabold tracking-tight text-slate-900 sm:text-3xl lg:text-4xl">
                    Seamless 4-Step Transition Process
                </h2>
                <p class="mt-3 text-sm leading-relaxed text-slate-600 sm:text-base">
                    Switching facility providers should never cause downtime. Our rapid deployment framework transitions commercial properties within 7 days.
                </p>
            </div>

            <div class="mt-14 grid gap-6 md:grid-cols-2 lg:grid-cols-4">
                
                <!-- Step 1 -->
                <div class="flex flex-col justify-between rounded-2xl border border-slate-200/90 bg-white p-6 shadow-xs">
                    <div>
                        <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-emerald-50 text-emerald-700 font-extrabold text-sm border border-emerald-200 mb-4">
                            01
                        </span>
                        <h3 class="text-base font-bold text-slate-900">Comprehensive Site Audit</h3>
                        <p class="mt-2 text-xs sm:text-sm leading-relaxed text-slate-600">
                            Our facility engineers conduct an exhaustive walkthrough, measuring floor square footage, occupant density, and MEP asset conditions.
                        </p>
                    </div>
                </div>

                <!-- Step 2 -->
                <div class="flex flex-col justify-between rounded-2xl border border-slate-200/90 bg-white p-6 shadow-xs">
                    <div>
                        <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-emerald-50 text-emerald-700 font-extrabold text-sm border border-emerald-200 mb-4">
                            02
                        </span>
                        <h3 class="text-base font-bold text-slate-900">Custom Scope Blueprint</h3>
                        <p class="mt-2 text-xs sm:text-sm leading-relaxed text-slate-600">
                            We configure your tailored daily checklist, periodic maintenance calendars, staffing allocations, and guaranteed SLA score thresholds.
                        </p>
                    </div>
                </div>

                <!-- Step 3 -->
                <div class="flex flex-col justify-between rounded-2xl border border-slate-200/90 bg-white p-6 shadow-xs">
                    <div>
                        <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-emerald-50 text-emerald-700 font-extrabold text-sm border border-emerald-200 mb-4">
                            03
                        </span>
                        <h3 class="text-base font-bold text-slate-900">Dedicated Staff Induction</h3>
                        <p class="mt-2 text-xs sm:text-sm leading-relaxed text-slate-600">
                            Uniformed, badge-verified personnel are deployed under an on-site supervisor, with backup standby rosters locked in place.
                        </p>
                    </div>
                </div>

                <!-- Step 4 -->
                <div class="flex flex-col justify-between rounded-2xl border border-slate-200/90 bg-white p-6 shadow-xs">
                    <div>
                        <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-emerald-50 text-emerald-700 font-extrabold text-sm border border-emerald-200 mb-4">
                            04
                        </span>
                        <h3 class="text-base font-bold text-slate-900">IoT Telemetry & Reviews</h3>
                        <p class="mt-2 text-xs sm:text-sm leading-relaxed text-slate-600">
                            QR checkpoints go live. You receive automated digital inspection reports, monthly client scorecards, and continuous SLA optimization.
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- Interactive FAQ Section --}}
    <section class="border-t border-slate-200/80 bg-white py-16 sm:py-20" x-data="{ activeFaq: 1 }">
        <div class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <div class="inline-flex items-center gap-2 rounded-md border border-emerald-200 bg-emerald-50 px-3 py-1 text-[10px] font-bold uppercase tracking-[0.2em] text-emerald-800">
                    <i class="ri-questionnaire-line text-emerald-600"></i>
                    <span>Frequently Asked Questions</span>
                </div>
                <h2 class="mt-3 text-2xl font-extrabold tracking-tight text-slate-900 sm:text-3xl">
                    Service Delivery & SLA Inquiries
                </h2>
                <p class="mt-2 text-xs sm:text-sm text-slate-600">
                    Everything corporate facility managers need to know about our operational methodology.
                </p>
            </div>

            <div class="mt-10 space-y-4">
                
                <!-- FAQ 1 -->
                <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-xs">
                    <button
                        type="button"
                        class="flex w-full items-center justify-between p-5 text-left text-sm font-bold text-slate-900 transition hover:bg-slate-50"
                        @click="activeFaq = (activeFaq === 1 ? null : 1)"
                    >
                        <span>Can cleaning and floor care be performed strictly after business hours?</span>
                        <i class="ri-arrow-down-s-line text-lg text-slate-400 transition-transform duration-200" :class="activeFaq === 1 ? 'rotate-180 text-emerald-600' : ''"></i>
                    </button>
                    <div x-show="activeFaq === 1" x-collapse class="border-t border-slate-100 p-5 text-xs sm:text-sm leading-relaxed text-slate-600 bg-slate-50/50">
                        Yes. Over 70% of our enterprise clientele operate on evening twilight shifts (6 PM to 11 PM) or overnight graveyard shifts (10 PM to 6 AM). All machinery used is decibel-restricted to protect any late-working staff.
                    </div>
                </div>

                <!-- FAQ 2 -->
                <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-xs">
                    <button
                        type="button"
                        class="flex w-full items-center justify-between p-5 text-left text-sm font-bold text-slate-900 transition hover:bg-slate-50"
                        @click="activeFaq = (activeFaq === 2 ? null : 2)"
                    >
                        <span>What happens if our assigned pantry steward or janitor calls in sick?</span>
                        <i class="ri-arrow-down-s-line text-lg text-slate-400 transition-transform duration-200" :class="activeFaq === 2 ? 'rotate-180 text-emerald-600' : ''"></i>
                    </button>
                    <div x-show="activeFaq === 2" x-collapse class="border-t border-slate-100 p-5 text-xs sm:text-sm leading-relaxed text-slate-600 bg-slate-50/50">
                        Our contract includes a 100% Attendance Backfill Guarantee. We maintain a floating reserve roster of trained, security-cleared staff who are dispatched to your facility within 60 minutes of any unscheduled absence.
                    </div>
                </div>

                <!-- FAQ 3 -->
                <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-xs">
                    <button
                        type="button"
                        class="flex w-full items-center justify-between p-5 text-left text-sm font-bold text-slate-900 transition hover:bg-slate-50"
                        @click="activeFaq = (activeFaq === 3 ? null : 3)"
                    >
                        <span>How does the IoT QR Code cleaning verification system work?</span>
                        <i class="ri-arrow-down-s-line text-lg text-slate-400 transition-transform duration-200" :class="activeFaq === 3 ? 'rotate-180 text-emerald-600' : ''"></i>
                    </button>
                    <div x-show="activeFaq === 3" x-collapse class="border-t border-slate-100 p-5 text-xs sm:text-sm leading-relaxed text-slate-600 bg-slate-50/50">
                        Unique tamper-evident NFC/QR tags are mounted in each washroom and service zone. When our staff clean the area, they scan the tag with their company handheld device, which logs GPS, timestamp, and a completed task checklist. Facility managers can inspect this live via a digital dashboard.
                    </div>
                </div>

                <!-- FAQ 4 -->
                <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-xs">
                    <button
                        type="button"
                        class="flex w-full items-center justify-between p-5 text-left text-sm font-bold text-slate-900 transition hover:bg-slate-50"
                        @click="activeFaq = (activeFaq === 4 ? null : 4)"
                    >
                        <span>Are your cleaning chemicals safe for LEED and green-certified buildings?</span>
                        <i class="ri-arrow-down-s-line text-lg text-slate-400 transition-transform duration-200" :class="activeFaq === 4 ? 'rotate-180 text-emerald-600' : ''"></i>
                    </button>
                    <div x-show="activeFaq === 4" x-collapse class="border-t border-slate-100 p-5 text-xs sm:text-sm leading-relaxed text-slate-600 bg-slate-50/50">
                        Yes. 100% of our floor chemicals, detergents, and sanitizing solutions are Green Seal certified, EPA List N registered, zero-VOC, and biodegradable, fully compliant with LEED-EBOM and WELL building standards.
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- Bottom High-Conversion CTA --}}
    <section class="relative overflow-hidden bg-slate-950 py-16 sm:py-20 text-white">
        <div class="absolute inset-0 bg-radial-[at_top_right] from-emerald-900/40 via-transparent to-transparent"></div>
        <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 text-center">
            <span class="inline-flex items-center gap-2 rounded-full border border-emerald-500/30 bg-emerald-950/70 px-4 py-1.5 text-xs font-bold uppercase tracking-wider text-emerald-400">
                <i class="ri-building-4-line"></i> Enterprise Facility Partnership
            </span>

            <h2 class="mt-4 text-3xl font-extrabold tracking-tight sm:text-4xl lg:text-5xl text-white">
                Transform Your Workplace Operations Today
            </h2>

            <p class="mx-auto mt-4 max-w-2xl text-sm leading-relaxed text-slate-300 sm:text-base">
                Join 500+ commercial properties that rely on FacilityPro for immaculate hygiene, flawless pantry stewarding, and SLA-guaranteed building maintenance.
            </p>

            <div class="mt-8 flex flex-col sm:flex-row items-center justify-center gap-4">
                <a
                    href="{{ route('contact') }}"
                    class="w-full sm:w-auto inline-flex items-center justify-center gap-2 rounded-xl bg-emerald-600 px-7 py-3.5 text-xs font-bold uppercase tracking-wider text-white shadow-lg shadow-emerald-600/30 transition hover:bg-emerald-500 hover:shadow-xl"
                >
                    <span>Request Custom Facility Audit</span>
                    <i class="ri-arrow-right-line"></i>
                </a>

                <a
                    href="tel:+18004928820"
                    class="w-full sm:w-auto inline-flex items-center justify-center gap-2 rounded-xl border border-slate-700 bg-slate-900/80 px-7 py-3.5 text-xs font-bold uppercase tracking-wider text-slate-200 transition hover:bg-slate-800 hover:text-white"
                >
                    <i class="ri-phone-fill text-emerald-400"></i>
                    <span>+1 (800) 492-8820</span>
                </a>
            </div>

            <div class="mt-8 flex items-center justify-center gap-6 text-xs text-slate-400 border-t border-slate-800/80 pt-6">
                <span class="flex items-center gap-1.5"><i class="ri-check-line text-emerald-400"></i> Free 30-Min Walkthrough</span>
                <span class="flex items-center gap-1.5"><i class="ri-check-line text-emerald-400"></i> Zero Obligation Scope</span>
                <span class="flex items-center gap-1.5"><i class="ri-check-line text-emerald-400"></i> 7-Day Rapid Deployment</span>
            </div>
        </div>
    </section>

</div>