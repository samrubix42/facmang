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

<div class="bg-white text-slate-800 antialiased font-sans selection:bg-emerald-500 selection:text-white">

    {{-- Hero Header Section --}}
    <section class="border-b border-slate-100 py-16 sm:py-20 lg:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid items-center gap-12 lg:grid-cols-12 lg:gap-16">
                
                <!-- Left Text Column -->
                <div class="lg:col-span-7 space-y-6">
                    <div>
                        <span class="inline-flex items-center gap-2 rounded-full bg-emerald-50 px-3.5 py-1 text-xs font-semibold text-emerald-700">
                            <span class="h-2 w-2 rounded-full bg-emerald-500"></span>
                            <span>About FacilityPro</span>
                        </span>
                    </div>

                    <h1 class="text-3xl font-extrabold leading-[1.15] tracking-tight text-slate-900 sm:text-4xl lg:text-5xl">
                        Architectural-grade facility care for high-performance workplaces.
                    </h1>

                    <p class="text-sm sm:text-base leading-relaxed text-slate-600 max-w-2xl font-normal">
                        We replace fragmented vendors with single-point SLA accountability. Combining 100% direct-employed W-2 personnel, IoT QR telemetry, and eco-certified sanitation.
                    </p>

                    <!-- Key Stats Bar -->
                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-6 border-t border-slate-100 pt-6">
                        <div>
                            <p class="text-2xl sm:text-3xl font-bold text-slate-900 tracking-tight">12+</p>
                            <p class="text-[11px] font-medium text-slate-400 mt-0.5">Years Experience</p>
                        </div>
                        <div>
                            <p class="text-2xl sm:text-3xl font-bold text-emerald-600 tracking-tight">500+</p>
                            <p class="text-[11px] font-medium text-slate-400 mt-0.5">Properties Managed</p>
                        </div>
                        <div>
                            <p class="text-2xl sm:text-3xl font-bold text-slate-900 tracking-tight">4.8M+</p>
                            <p class="text-[11px] font-medium text-slate-400 mt-0.5">Sq. Ft Maintained</p>
                        </div>
                        <div>
                            <p class="text-2xl sm:text-3xl font-bold text-emerald-600 tracking-tight">99.85%</p>
                            <p class="text-[11px] font-medium text-slate-400 mt-0.5">SLA Adherence</p>
                        </div>
                    </div>
                </div>

                <!-- Right Feature Image -->
                <div class="lg:col-span-5 relative">
                    <div class="relative h-[320px] sm:h-[400px] w-full overflow-hidden rounded-3xl border border-slate-100 bg-slate-100 shadow-sm">
                        <img 
                            src="{{ asset('images/hero_facility.jpg') }}" 
                            alt="Facility Management Operations Team" 
                            class="h-full w-full object-cover"
                        />
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950/70 via-transparent to-transparent"></div>

                        <!-- Floating Certification Pill -->
                        <div class="absolute bottom-5 left-5 right-5 rounded-2xl border border-white/20 bg-white/95 p-4 shadow-lg backdrop-blur-md">
                            <div class="flex items-center gap-3">
                                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-emerald-600 text-white">
                                    <i class="ri-award-fill text-lg"></i>
                                </div>
                                <div class="min-w-0">
                                    <p class="text-xs font-bold text-slate-900 truncate">ISSA CIMS &amp; ISO 41001 Certified</p>
                                    <p class="text-[11px] text-slate-500 truncate">Gold Standard Commercial Compliance</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- Mission & Vision Section (Minimal Cards) --}}
    <section 
        x-data="scrollReveal(0)"
        :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8 pointer-events-none'"
        class="py-20 sm:py-24 bg-slate-50/50 border-b border-slate-100 transition-all duration-700 ease-out"
    >
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-8 md:grid-cols-2">
                
                <!-- Mission Card -->
                <div class="rounded-3xl border border-slate-200/80 bg-white p-8 sm:p-10 shadow-xs hover:border-emerald-300 transition">
                    <span class="flex h-11 w-11 items-center justify-center rounded-full bg-emerald-50 text-emerald-700 mb-6">
                        <i class="ri-compass-3-line text-xl"></i>
                    </span>
                    <span class="text-xs font-semibold uppercase tracking-wider text-emerald-700">Our Mission</span>
                    <h2 class="mt-2 text-2xl font-bold tracking-tight text-slate-900">Operations Without Compromise</h2>
                    <p class="mt-3 text-sm text-slate-600 leading-relaxed">
                        To provide commercial property managers and corporate enterprises with verified, single-contract facility operations that safeguard occupant health and lower total overhead.
                    </p>
                    <div class="mt-6 pt-5 border-t border-slate-100 flex flex-wrap gap-2 text-xs font-medium text-slate-700">
                        <span class="rounded-full bg-slate-50 px-3 py-1 border border-slate-200/80">100% Direct Staff</span>
                        <span class="rounded-full bg-slate-50 px-3 py-1 border border-slate-200/80">Digital Audits</span>
                        <span class="rounded-full bg-slate-50 px-3 py-1 border border-slate-200/80">Eco-Formulas</span>
                    </div>
                </div>

                <!-- Vision Card -->
                <div class="rounded-3xl border border-slate-200/80 bg-white p-8 sm:p-10 shadow-xs hover:border-emerald-300 transition">
                    <span class="flex h-11 w-11 items-center justify-center rounded-full bg-slate-900 text-white mb-6">
                        <i class="ri-eye-line text-xl"></i>
                    </span>
                    <span class="text-xs font-semibold uppercase tracking-wider text-slate-500">Our Vision</span>
                    <h2 class="mt-2 text-2xl font-bold tracking-tight text-slate-900">Intelligent Workplace Care</h2>
                    <p class="mt-3 text-sm text-slate-600 leading-relaxed">
                        To create the benchmark facility platform where seasoned craftsmanship unites with IoT real-time telemetry — setting new standards for commercial towers across the nation.
                    </p>
                    <div class="mt-6 pt-5 border-t border-slate-100 flex flex-wrap gap-2 text-xs font-medium text-slate-700">
                        <span class="rounded-full bg-slate-50 px-3 py-1 border border-slate-200/80">IoT QR Telemetry</span>
                        <span class="rounded-full bg-slate-50 px-3 py-1 border border-slate-200/80">&lt;15m Response</span>
                        <span class="rounded-full bg-slate-50 px-3 py-1 border border-slate-200/80">Continuous Training</span>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- Operational Pillars Section --}}
    <section 
        x-data="scrollReveal(0)"
        :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8 pointer-events-none'"
        class="py-20 sm:py-24 border-b border-slate-100 transition-all duration-700 ease-out"
    >
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="max-w-xl mx-auto text-center">
                <span class="inline-flex items-center gap-1.5 rounded-full bg-emerald-50 px-3.5 py-1 text-xs font-semibold text-emerald-700">
                    <i class="ri-shield-star-line text-xs"></i> Pillars
                </span>
                <h2 class="mt-3 text-3xl font-extrabold tracking-tight text-slate-900 sm:text-4xl">
                    Why Commercial Leaders Trust Us
                </h2>
                <p class="mt-3 text-sm text-slate-600 leading-relaxed">
                    Six foundational standards governing every shift across our portfolio.
                </p>
            </div>

            <div class="mt-14 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                <!-- Pillar 1 -->
                <div class="rounded-3xl border border-slate-200/80 bg-white p-7 shadow-xs hover:border-emerald-300 transition">
                    <span class="flex h-10 w-10 items-center justify-center rounded-full bg-emerald-50 text-emerald-700 mb-4">
                        <i class="ri-user-heart-line text-lg"></i>
                    </span>
                    <h3 class="text-base font-bold text-slate-900">100% W-2 Direct Employed</h3>
                    <p class="mt-2 text-xs sm:text-sm text-slate-600 leading-relaxed">
                        Every operator is directly employed with full background clearance, health benefits, and uniform standards.
                    </p>
                </div>

                <!-- Pillar 2 -->
                <div class="rounded-3xl border border-slate-200/80 bg-white p-7 shadow-xs hover:border-emerald-300 transition">
                    <span class="flex h-10 w-10 items-center justify-center rounded-full bg-slate-900 text-white mb-4">
                        <i class="ri-qr-code-line text-lg"></i>
                    </span>
                    <h3 class="text-base font-bold text-slate-900">IoT QR Digital Inspection</h3>
                    <p class="mt-2 text-xs sm:text-sm text-slate-600 leading-relaxed">
                        Scan-to-verify timestamps provide facility directors with live operational audit logs.
                    </p>
                </div>

                <!-- Pillar 3 -->
                <div class="rounded-3xl border border-slate-200/80 bg-white p-7 shadow-xs hover:border-emerald-300 transition">
                    <span class="flex h-10 w-10 items-center justify-center rounded-full bg-emerald-50 text-emerald-700 mb-4">
                        <i class="ri-leaf-line text-lg"></i>
                    </span>
                    <h3 class="text-base font-bold text-slate-900">Green Seal Eco-Formulas</h3>
                    <p class="mt-2 text-xs sm:text-sm text-slate-600 leading-relaxed">
                        Hospital-grade virucidal solutions and HEPA filtration protect indoor air quality.
                    </p>
                </div>

                <!-- Pillar 4 -->
                <div class="rounded-3xl border border-slate-200/80 bg-white p-7 shadow-xs hover:border-emerald-300 transition">
                    <span class="flex h-10 w-10 items-center justify-center rounded-full bg-slate-900 text-white mb-4">
                        <i class="ri-hand-coin-line text-lg"></i>
                    </span>
                    <h3 class="text-base font-bold text-slate-900">18.4% Overhead Reduction</h3>
                    <p class="mt-2 text-xs sm:text-sm text-slate-600 leading-relaxed">
                        Consolidating sweeping, restrooms, pantry stewards, and MEP care under one contract removes vendor markup.
                    </p>
                </div>

                <!-- Pillar 5 -->
                <div class="rounded-3xl border border-slate-200/80 bg-white p-7 shadow-xs hover:border-emerald-300 transition">
                    <span class="flex h-10 w-10 items-center justify-center rounded-full bg-emerald-50 text-emerald-700 mb-4">
                        <i class="ri-flashlight-line text-lg"></i>
                    </span>
                    <h3 class="text-base font-bold text-slate-900">&lt;15 Min Emergency Response</h3>
                    <p class="mt-2 text-xs sm:text-sm text-slate-600 leading-relaxed">
                        Dedicated on-call engineers resolve urgent plumbing issues, electrical trips, or HVAC halts 24/7.
                    </p>
                </div>

                <!-- Pillar 6 -->
                <div class="rounded-3xl border border-slate-200/80 bg-white p-7 shadow-xs hover:border-emerald-300 transition">
                    <span class="flex h-10 w-10 items-center justify-center rounded-full bg-slate-900 text-white mb-4">
                        <i class="ri-medal-line text-lg"></i>
                    </span>
                    <h3 class="text-base font-bold text-slate-900">Guaranteed SLA Credits</h3>
                    <p class="mt-2 text-xs sm:text-sm text-slate-600 leading-relaxed">
                        If monthly inspection audits fall below 99% SLA adherence, contract credits are applied automatically.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- Executive Leadership Team --}}
    <section 
        x-data="scrollReveal(0)"
        :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8 pointer-events-none'"
        class="py-20 sm:py-24 bg-slate-50/50 border-b border-slate-100 transition-all duration-700 ease-out"
    >
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="max-w-xl mx-auto text-center">
                <span class="inline-flex items-center gap-1.5 rounded-full bg-emerald-50 px-3.5 py-1 text-xs font-semibold text-emerald-700">
                    <i class="ri-user-star-line text-xs"></i> Leadership
                </span>
                <h2 class="mt-3 text-3xl font-extrabold tracking-tight text-slate-900 sm:text-4xl">
                    Executive Operations Directors
                </h2>
                <p class="mt-3 text-sm text-slate-600 leading-relaxed">
                    Decades of combined experience managing Fortune 500 corporate real estate.
                </p>
            </div>

            <div class="mt-14 grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
                <!-- Leader 1 -->
                <div class="rounded-3xl border border-slate-200/80 bg-white p-7 shadow-xs hover:border-emerald-300 transition text-center">
                    <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-full bg-emerald-600 text-white text-xl font-bold mb-4 shadow-sm">
                        EV
                    </div>
                    <h3 class="text-base font-bold text-slate-900">Elena Vance</h3>
                    <p class="text-xs font-semibold text-emerald-600 mt-0.5">Founder &amp; CEO</p>
                    <p class="mt-3 text-xs text-slate-500 leading-relaxed">
                        Former CBRE Operations Director with 18 years experience scaling programs across 10M+ sq. ft.
                    </p>
                </div>

                <!-- Leader 2 -->
                <div class="rounded-3xl border border-slate-200/80 bg-white p-7 shadow-xs hover:border-emerald-300 transition text-center">
                    <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-full bg-slate-900 text-white text-xl font-bold mb-4 shadow-sm">
                        MV
                    </div>
                    <h3 class="text-base font-bold text-slate-900">Marcus Vance</h3>
                    <p class="text-xs font-semibold text-emerald-600 mt-0.5">Chief Operating Officer</p>
                    <p class="mt-3 text-xs text-slate-500 leading-relaxed">
                        Pioneer of IoT QR audit logging systems. Oversees 350+ direct staff with 99.85% SLA reliability.
                    </p>
                </div>

                <!-- Leader 3 -->
                <div class="rounded-3xl border border-slate-200/80 bg-white p-7 shadow-xs hover:border-emerald-300 transition text-center">
                    <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-full bg-emerald-600 text-white text-xl font-bold mb-4 shadow-sm">
                        DT
                    </div>
                    <h3 class="text-base font-bold text-slate-900">David Thorne</h3>
                    <p class="text-xs font-semibold text-emerald-600 mt-0.5">VP of MEP Engineering</p>
                    <p class="mt-3 text-xs text-slate-500 leading-relaxed">
                        Licensed engineer leading emergency dispatch, HVAC filter cycles, and electrical safety diagnostics.
                    </p>
                </div>

                <!-- Leader 4 -->
                <div class="rounded-3xl border border-slate-200/80 bg-white p-7 shadow-xs hover:border-emerald-300 transition text-center">
                    <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-full bg-slate-900 text-white text-xl font-bold mb-4 shadow-sm">
                        SJ
                    </div>
                    <h3 class="text-base font-bold text-slate-900">Sarah Jenkins</h3>
                    <p class="text-xs font-semibold text-emerald-600 mt-0.5">Head of Client Success</p>
                    <p class="mt-3 text-xs text-slate-500 leading-relaxed">
                        Manages monthly client audit reviews, SLA credit guarantees, and site steward hospitality training.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- Industry Certifications Strip --}}
    <section class="border-b border-slate-100 bg-white py-10">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex flex-wrap items-center justify-center gap-6 sm:gap-12 text-center text-xs font-semibold text-slate-600">
                <span class="flex items-center gap-2">
                    <i class="ri-shield-check-fill text-lg text-emerald-600"></i> ISSA CIMS Certified
                </span>
                <span class="flex items-center gap-2">
                    <i class="ri-award-fill text-lg text-emerald-600"></i> ISO 41001 Standard
                </span>
                <span class="flex items-center gap-2">
                    <i class="ri-verified-badge-fill text-lg text-emerald-600"></i> ISO 9001 Quality
                </span>
                <span class="flex items-center gap-2">
                    <i class="ri-heart-pulse-fill text-lg text-emerald-600"></i> OSHA 30-Hr Safe
                </span>
            </div>
        </div>
    </section>

    {{-- Final CTA Banner (Clean Rounded-Full Buttons) --}}
    <section 
        x-data="scrollReveal(0)"
        :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8 pointer-events-none'"
        class="py-20 sm:py-24 transition-all duration-700 ease-out"
    >
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="relative overflow-hidden rounded-3xl bg-slate-950 px-6 py-14 sm:px-12 lg:py-16 text-center text-white border border-slate-800">
                <div class="relative max-w-2xl mx-auto space-y-4">
                    <span class="inline-flex items-center gap-1.5 rounded-full bg-white/10 px-3.5 py-1 text-xs font-semibold text-emerald-400">
                        <i class="ri-customer-service-2-line text-xs"></i> Direct Operations Desk
                    </span>
                    <h2 class="text-3xl font-extrabold tracking-tight text-white sm:text-4xl">
                        Elevate your facility standards today
                    </h2>
                    <p class="text-sm text-slate-400 leading-relaxed max-w-lg mx-auto">
                        Speak directly with an operations director for a free on-site assessment and tailored SLA proposal.
                    </p>
                    
                    <div class="pt-4 flex flex-wrap items-center justify-center gap-3">
                        <a
                            href="{{ route('contact') }}"
                            class="inline-flex items-center gap-2 rounded-full bg-emerald-500 px-7 py-3.5 text-xs sm:text-sm font-semibold text-slate-950 shadow-sm transition hover:bg-emerald-400 active:scale-[0.98]"
                        >
                            <span>Request Facility Audit</span>
                            <i class="ri-arrow-right-line text-sm"></i>
                        </a>
                        <a
                            href="tel:+18004928820"
                            class="inline-flex items-center gap-2 rounded-full border border-white/20 bg-white/10 px-6 py-3.5 text-xs sm:text-sm font-medium text-white backdrop-blur-md transition hover:bg-white/20 active:scale-[0.98]"
                        >
                            <i class="ri-phone-line text-sm text-emerald-400"></i>
                            <span>+1 (800) 492-8820</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>