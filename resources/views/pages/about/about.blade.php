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

    {{-- Hero Header Section --}}
    <section class="relative overflow-hidden bg-white py-14 lg:py-20 border-b border-slate-200/80">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid items-center gap-10 lg:grid-cols-12 lg:gap-14">
                
                <!-- Left Text Column -->
                <div class="lg:col-span-7 space-y-5">
                    <div>
                        <span class="inline-flex items-center gap-2 rounded-full border border-emerald-200 bg-emerald-50 px-3.5 py-1.5 text-xs font-bold uppercase tracking-wider text-emerald-800">
                            <span class="h-2 w-2 rounded-full bg-emerald-500 animate-pulse"></span>
                            <span>About FacilityPro</span>
                        </span>
                    </div>

                    <h1 class="text-2xl font-extrabold leading-[1.15] tracking-tight text-slate-900 sm:text-4xl lg:text-5xl">
                        Pioneering Architectural-Grade <span class="text-emerald-600">Facility Operations</span>
                    </h1>

                    <p class="text-sm leading-relaxed text-slate-600 sm:text-base lg:text-lg">
                        Founded with a steadfast mission to replace fragmented janitorial vendors with single-point SLA accountability. We combine 100% W-2 uniformed personnel, IoT QR code telemetry, and hospital-grade eco-friendly sanitation formulas.
                    </p>

                    <!-- Key Stats Bar -->
                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 border-t border-slate-100 pt-6">
                        <div>
                            <p class="text-2xl sm:text-3xl font-extrabold text-slate-900">12+</p>
                            <p class="text-xs font-bold uppercase tracking-wider text-slate-500 mt-0.5">Years Experience</p>
                        </div>
                        <div>
                            <p class="text-2xl sm:text-3xl font-extrabold text-emerald-600">500+</p>
                            <p class="text-xs font-bold uppercase tracking-wider text-slate-500 mt-0.5">Properties Care</p>
                        </div>
                        <div>
                            <p class="text-2xl sm:text-3xl font-extrabold text-slate-900">4.8M+</p>
                            <p class="text-xs font-bold uppercase tracking-wider text-slate-500 mt-0.5">Sq. Ft Managed</p>
                        </div>
                        <div>
                            <p class="text-2xl sm:text-3xl font-extrabold text-emerald-600">99.85%</p>
                            <p class="text-xs font-bold uppercase tracking-wider text-slate-500 mt-0.5">SLA Rating</p>
                        </div>
                    </div>
                </div>

                <!-- Right Image Feature Column -->
                <div class="lg:col-span-5 relative">
                    <div class="relative h-[340px] sm:h-[420px] w-full overflow-hidden rounded-3xl border border-slate-100 shadow-2xl shadow-slate-200/60 bg-slate-100">
                        <img 
                            src="{{ asset('images/hero_facility.jpg') }}" 
                            alt="Facility Management Operations Team" 
                            class="h-full w-full object-cover"
                        />
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950/70 via-transparent to-transparent"></div>

                        <!-- Floating Glass Badge -->
                        <div class="absolute bottom-5 left-5 right-5 rounded-2xl border border-white/30 bg-white/80 p-4 shadow-xl backdrop-blur-md">
                            <div class="flex items-center gap-3">
                                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-emerald-600 text-white font-bold shadow-md">
                                    <i class="ri-award-fill text-xl"></i>
                                </div>
                                <div>
                                    <p class="text-xs font-bold text-slate-900">ISSA CIMS & ISO 41001 Certified</p>
                                    <p class="text-[11px] font-medium text-slate-600">Gold Standard Facility Compliance</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- Mission & Vision Section --}}
    <section 
        x-data="scrollReveal(0)"
        :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8 pointer-events-none'"
        class="py-16 sm:py-20 bg-slate-50 border-b border-slate-200/80 transition-all duration-700 ease-out transform"
    >
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-8 md:grid-cols-2">
                
                <!-- Mission Card -->
                <div class="rounded-2xl border border-slate-200/90 bg-white p-7 sm:p-9 shadow-xs transition duration-300 hover:border-emerald-300 hover:shadow-lg">
                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-emerald-50 text-emerald-600 border border-emerald-200/60 mb-5">
                        <i class="ri-compass-3-line text-2xl"></i>
                    </div>
                    <span class="text-[10px] font-bold uppercase tracking-[0.2em] text-emerald-700">Our Core Mission</span>
                    <h2 class="mt-2 text-xl font-extrabold text-slate-900 sm:text-2xl">Elevating Corporate Operations Without Compromise</h2>
                    <p class="mt-3 text-xs sm:text-sm leading-relaxed text-slate-600">
                        To provide commercial property managers and corporate enterprises with immaculate, reliable, and SLA-verified facility services — protecting employee health, enhancing brand reputation, and reducing total operational cost.
                    </p>
                    <ul class="mt-5 space-y-2 border-t border-slate-100 pt-4 text-xs font-medium text-slate-700">
                        <li class="flex items-center gap-2"><i class="ri-checkbox-circle-fill text-emerald-600"></i> Zero reliance on unvetted third-party contractors</li>
                        <li class="flex items-center gap-2"><i class="ri-checkbox-circle-fill text-emerald-600"></i> 100% transparent digital inspection reporting</li>
                        <li class="flex items-center gap-2"><i class="ri-checkbox-circle-fill text-emerald-600"></i> Sustainable virucidal hygiene standards</li>
                    </ul>
                </div>

                <!-- Vision Card -->
                <div class="rounded-2xl border border-slate-200/90 bg-white p-7 sm:p-9 shadow-xs transition duration-300 hover:border-emerald-300 hover:shadow-lg">
                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-emerald-50 text-emerald-600 border border-emerald-200/60 mb-5">
                        <i class="ri-eye-line text-2xl"></i>
                    </div>
                    <span class="text-[10px] font-bold uppercase tracking-[0.2em] text-emerald-700">Our Vision</span>
                    <h2 class="mt-2 text-xl font-extrabold text-slate-900 sm:text-2xl">The Future of Smart & Clean Workplaces</h2>
                    <p class="mt-3 text-xs sm:text-sm leading-relaxed text-slate-600">
                        To build the industry's most trusted facility platform where human craftsmanship meets IoT real-time telemetry — setting a new global benchmark for commercial cleanliness, pantry stewards, and preventative maintenance.
                    </p>
                    <ul class="mt-5 space-y-2 border-t border-slate-100 pt-4 text-xs font-medium text-slate-700">
                        <li class="flex items-center gap-2"><i class="ri-checkbox-circle-fill text-emerald-600"></i> Smart QR code restroom cleaning logs</li>
                        <li class="flex items-center gap-2"><i class="ri-checkbox-circle-fill text-emerald-600"></i> 15-Minute rapid emergency MEP dispatch</li>
                        <li class="flex items-center gap-2"><i class="ri-checkbox-circle-fill text-emerald-600"></i> Continuous employee training & growth</li>
                    </ul>
                </div>

            </div>
        </div>
    </section>

    {{-- Core Values & Pillars Section --}}
    <section 
        x-data="scrollReveal(0)"
        :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8 pointer-events-none'"
        class="py-16 sm:py-20 lg:py-24 bg-white border-b border-slate-200/80 transition-all duration-700 ease-out transform"
    >
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-2xl text-center">
                <div class="inline-flex items-center gap-2 rounded-md border border-emerald-200 bg-emerald-50 px-3 py-1 text-[10px] font-bold uppercase tracking-[0.2em] text-emerald-800">
                    <i class="ri-shield-star-line text-emerald-600"></i>
                    <span>Operational Pillars</span>
                </div>
                <h2 class="mt-3 text-2xl font-extrabold tracking-tight text-slate-900 sm:text-3xl lg:text-4xl">
                    Why Commercial Leaders Trust Us
                </h2>
                <p class="mt-3 text-sm leading-relaxed text-slate-600 sm:text-base lg:text-lg">
                    Six foundational principles that govern every cleaning sweep, restroom log, and pantry steward shift across our portfolio.
                </p>
            </div>

            <div class="mt-12 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                <!-- Pillar 1 -->
                <div 
                    x-data="scrollReveal(100)"
                    :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'"
                    class="rounded-2xl border border-slate-200/90 bg-slate-50/50 p-6 transition duration-300 hover:border-emerald-400 hover:bg-white hover:shadow-xl hover:shadow-emerald-900/5"
                >
                    <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-emerald-600 text-white shadow-sm mb-4">
                        <i class="ri-user-heart-line text-xl"></i>
                    </span>
                    <h3 class="text-base font-bold text-slate-900">100% W-2 Direct Employed</h3>
                    <p class="mt-2 text-xs sm:text-sm leading-relaxed text-slate-600">
                        Every janitor, office boy, and supervisor is a direct employee with full background clearance, health benefits, and uniform standards.
                    </p>
                </div>

                <!-- Pillar 2 -->
                <div 
                    x-data="scrollReveal(200)"
                    :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'"
                    class="rounded-2xl border border-slate-200/90 bg-slate-50/50 p-6 transition duration-300 hover:border-emerald-400 hover:bg-white hover:shadow-xl hover:shadow-emerald-900/5"
                >
                    <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-slate-900 text-white shadow-sm mb-4">
                        <i class="ri-qr-code-line text-xl"></i>
                    </span>
                    <h3 class="text-base font-bold text-slate-900">IoT QR Digital Inspection</h3>
                    <p class="mt-2 text-xs sm:text-sm leading-relaxed text-slate-600">
                        Scan-to-verify timestamps for restroom sanitation and floor sweeping give building managers live operational visibility.
                    </p>
                </div>

                <!-- Pillar 3 -->
                <div 
                    x-data="scrollReveal(300)"
                    :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'"
                    class="rounded-2xl border border-slate-200/90 bg-slate-50/50 p-6 transition duration-300 hover:border-emerald-400 hover:bg-white hover:shadow-xl hover:shadow-emerald-900/5"
                >
                    <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-emerald-600 text-white shadow-sm mb-4">
                        <i class="ri-leaf-line text-xl"></i>
                    </span>
                    <h3 class="text-base font-bold text-slate-900">Green Seal Eco-Formulas</h3>
                    <p class="mt-2 text-xs sm:text-sm leading-relaxed text-slate-600">
                        Hospital-grade virucidal solutions and HEPA-filtered equipment protect indoor air quality without harsh toxic fumes.
                    </p>
                </div>

                <!-- Pillar 4 -->
                <div 
                    x-data="scrollReveal(400)"
                    :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'"
                    class="rounded-2xl border border-slate-200/90 bg-slate-50/50 p-6 transition duration-300 hover:border-emerald-400 hover:bg-white hover:shadow-xl hover:shadow-emerald-900/5"
                >
                    <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-slate-900 text-white shadow-sm mb-4">
                        <i class="ri-hand-coin-line text-xl"></i>
                    </span>
                    <h3 class="text-base font-bold text-slate-900">18.4% Cost Overhead Reduction</h3>
                    <p class="mt-2 text-xs sm:text-sm leading-relaxed text-slate-600">
                        Consolidating sweeping, toilet cleaning, pantry stewards, and MEP care under one contract eliminates vendor markup.
                    </p>
                </div>

                <!-- Pillar 5 -->
                <div 
                    x-data="scrollReveal(500)"
                    :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'"
                    class="rounded-2xl border border-slate-200/90 bg-slate-50/50 p-6 transition duration-300 hover:border-emerald-400 hover:bg-white hover:shadow-xl hover:shadow-emerald-900/5"
                >
                    <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-emerald-600 text-white shadow-sm mb-4">
                        <i class="ri-flashlight-line text-xl"></i>
                    </span>
                    <h3 class="text-base font-bold text-slate-900">&lt;15 Min Emergency Response</h3>
                    <p class="mt-2 text-xs sm:text-sm leading-relaxed text-slate-600">
                        Dedicated on-call technicians handle urgent plumbing issues, electrical trips, or HVAC maintenance around the clock.
                    </p>
                </div>

                <!-- Pillar 6 -->
                <div 
                    x-data="scrollReveal(600)"
                    :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'"
                    class="rounded-2xl border border-slate-200/90 bg-slate-50/50 p-6 transition duration-300 hover:border-emerald-400 hover:bg-white hover:shadow-xl hover:shadow-emerald-900/5"
                >
                    <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-slate-900 text-white shadow-sm mb-4">
                        <i class="ri-medal-line text-xl"></i>
                    </span>
                    <h3 class="text-base font-bold text-slate-900">Guaranteed SLA Credits</h3>
                    <p class="mt-2 text-xs sm:text-sm leading-relaxed text-slate-600">
                        If monthly inspection audits fall below 99% SLA adherence, contract credits are applied automatically to your invoice.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- Executive Leadership Team --}}
    <section 
        x-data="scrollReveal(0)"
        :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8 pointer-events-none'"
        class="py-16 sm:py-20 lg:py-24 bg-slate-50 border-b border-slate-200/80 transition-all duration-700 ease-out transform"
    >
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-2xl text-center">
                <div class="inline-flex items-center gap-2 rounded-md border border-emerald-200 bg-emerald-50 px-3 py-1 text-[10px] font-bold uppercase tracking-[0.2em] text-emerald-800">
                    <i class="ri-user-star-line text-emerald-600"></i>
                    <span>Executive Leadership</span>
                </div>
                <h2 class="mt-3 text-2xl font-extrabold tracking-tight text-slate-900 sm:text-3xl lg:text-4xl">
                    Meet the Operations Directors
                </h2>
                <p class="mt-3 text-sm leading-relaxed text-slate-600 sm:text-base lg:text-lg">
                    Seasoned facility leaders with decades of combined experience managing Fortune 500 corporate real estate.
                </p>
            </div>

            <div class="mt-12 grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
                <!-- Leader 1 -->
                <div 
                    x-data="scrollReveal(100)"
                    :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'"
                    class="group overflow-hidden rounded-2xl border border-slate-200 bg-white p-6 shadow-xs transition duration-300 hover:border-emerald-400 hover:shadow-lg text-center"
                >
                    <div class="mx-auto flex h-20 w-20 items-center justify-center rounded-full bg-emerald-600 text-white text-2xl font-extrabold shadow-md mb-4 group-hover:scale-105 transition-transform">
                        EV
                    </div>
                    <h3 class="text-base font-bold text-slate-900">Elena Vance</h3>
                    <p class="text-xs font-bold text-emerald-600 uppercase tracking-wider mt-0.5">Founder & CEO</p>
                    <p class="mt-3 text-xs leading-relaxed text-slate-600">
                        Ex-CBRE Operations Director with 18 years experience scaling commercial janitorial and facility programs across 10M+ sq. ft.
                    </p>
                </div>

                <!-- Leader 2 -->
                <div 
                    x-data="scrollReveal(200)"
                    :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'"
                    class="group overflow-hidden rounded-2xl border border-slate-200 bg-white p-6 shadow-xs transition duration-300 hover:border-emerald-400 hover:shadow-lg text-center"
                >
                    <div class="mx-auto flex h-20 w-20 items-center justify-center rounded-full bg-slate-900 text-white text-2xl font-extrabold shadow-md mb-4 group-hover:scale-105 transition-transform">
                        MV
                    </div>
                    <h3 class="text-base font-bold text-slate-900">Marcus Vance</h3>
                    <p class="text-xs font-bold text-emerald-600 uppercase tracking-wider mt-0.5">Chief Operating Officer</p>
                    <p class="mt-3 text-xs leading-relaxed text-slate-600">
                        Pioneer of IoT QR audit logging systems. Oversees 350+ W-2 janitorial staff and pantry stewards with 99.85% SLA reliability.
                    </p>
                </div>

                <!-- Leader 3 -->
                <div 
                    x-data="scrollReveal(300)"
                    :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'"
                    class="group overflow-hidden rounded-2xl border border-slate-200 bg-white p-6 shadow-xs transition duration-300 hover:border-emerald-400 hover:shadow-lg text-center"
                >
                    <div class="mx-auto flex h-20 w-20 items-center justify-center rounded-full bg-emerald-600 text-white text-2xl font-extrabold shadow-md mb-4 group-hover:scale-105 transition-transform">
                        DT
                    </div>
                    <h3 class="text-base font-bold text-slate-900">David Thorne</h3>
                    <p class="text-xs font-bold text-emerald-600 uppercase tracking-wider mt-0.5">VP of MEP Engineering</p>
                    <p class="mt-3 text-xs leading-relaxed text-slate-600">
                        Licensed mechanical engineer leading rapid-response dispatch, HVAC filter cycles, and electrical circuit diagnostics.
                    </p>
                </div>

                <!-- Leader 4 -->
                <div 
                    x-data="scrollReveal(400)"
                    :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'"
                    class="group overflow-hidden rounded-2xl border border-slate-200 bg-white p-6 shadow-xs transition duration-300 hover:border-emerald-400 hover:shadow-lg text-center"
                >
                    <div class="mx-auto flex h-20 w-20 items-center justify-center rounded-full bg-slate-900 text-white text-2xl font-extrabold shadow-md mb-4 group-hover:scale-105 transition-transform">
                        SJ
                    </div>
                    <h3 class="text-base font-bold text-slate-900">Sarah Jenkins</h3>
                    <p class="text-xs font-bold text-emerald-600 uppercase tracking-wider mt-0.5">Head of Client Success</p>
                    <p class="mt-3 text-xs leading-relaxed text-slate-600">
                        Manages monthly client audit reviews, SLA credit guarantees, and site-specific steward hospitality training programs.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- Industry Certifications Banner --}}
    <section class="bg-emerald-950 py-12 text-white border-b border-emerald-900/60">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mb-6 text-center">
                <span class="text-[10px] font-bold uppercase tracking-[0.25em] text-emerald-400">Industry Compliance & Standards</span>
            </div>
            <div class="flex flex-wrap items-center justify-center gap-8 sm:gap-14 text-center">
                <div class="flex items-center gap-2">
                    <i class="ri-shield-check-fill text-2xl text-emerald-400"></i>
                    <span class="text-sm font-bold text-emerald-100">ISSA CIMS Green Building</span>
                </div>
                <div class="flex items-center gap-2">
                    <i class="ri-award-fill text-2xl text-emerald-400"></i>
                    <span class="text-sm font-bold text-emerald-100">ISO 41001 Standard</span>
                </div>
                <div class="flex items-center gap-2">
                    <i class="ri-verified-badge-fill text-2xl text-emerald-400"></i>
                    <span class="text-sm font-bold text-emerald-100">ISO 9001 Quality</span>
                </div>
                <div class="flex items-center gap-2">
                    <i class="ri-heart-pulse-fill text-2xl text-emerald-400"></i>
                    <span class="text-sm font-bold text-emerald-100">OSHA 30-Hr Safety</span>
                </div>
            </div>
        </div>
    </section>

    {{-- Contact CTA Banner --}}
    <section 
        x-data="scrollReveal(0)"
        :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8 pointer-events-none'"
        class="bg-white py-16 sm:py-20 lg:py-24 transition-all duration-700 ease-out transform"
    >
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="relative overflow-hidden rounded-3xl bg-gradient-to-br from-emerald-700 via-emerald-800 to-emerald-950 px-6 py-12 text-center shadow-2xl shadow-emerald-900/20 sm:px-12 lg:py-16">
                <div aria-hidden="true" class="pointer-events-none absolute inset-0">
                    <div class="absolute -left-20 -top-20 h-72 w-72 rounded-full bg-white/10 blur-3xl"></div>
                    <div class="absolute -bottom-24 -right-20 h-80 w-80 rounded-full bg-emerald-400/10 blur-3xl"></div>
                </div>

                <div class="relative">
                    <span class="inline-flex items-center gap-2 rounded-md border border-white/20 bg-white/10 px-3 py-1 text-[10px] font-bold uppercase tracking-[0.2em] text-emerald-200">
                        <i class="ri-customer-service-2-line"></i> Partner With FacilityPro
                    </span>
                    <h2 class="mx-auto mt-3 max-w-2xl text-2xl font-extrabold tracking-tight text-white sm:text-3xl lg:text-4xl">
                        Transform your workplace facility standards today
                    </h2>
                    <p class="mx-auto mt-3 max-w-xl text-sm leading-relaxed text-emerald-100 sm:text-base lg:text-lg">
                        Contact our executive operations team for a free on-site spatial assessment and customized SLA proposal.
                    </p>
                    
                    <div class="mt-6 sm:mt-8 flex flex-wrap items-center justify-center gap-3.5">
                        <a
                            href="{{ route('home') }}#calculator"
                            class="inline-flex items-center gap-2 rounded-lg bg-white px-6 py-3.5 text-xs sm:text-sm font-bold uppercase tracking-wider text-emerald-900 shadow-md transition hover:bg-emerald-50"
                        >
                            <i class="ri-calculator-line text-base text-emerald-600"></i>
                            <span>Calculate SLA Scope</span>
                        </a>
                        <a
                            href="tel:+18004928820"
                            class="inline-flex items-center gap-2 rounded-lg border border-white/30 bg-white/10 px-6 py-3.5 text-xs sm:text-sm font-bold uppercase tracking-wider text-white transition hover:bg-white/20"
                        >
                            <i class="ri-phone-fill text-base"></i>
                            <span>Call +1 (800) 492-8820</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>