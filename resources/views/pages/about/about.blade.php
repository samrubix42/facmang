<script>
    (function() {
        const registerScrollReveal = () => {
            if (typeof Alpine === 'undefined') {
                return;
            }

            if (!Alpine.data('scrollReveal')) {
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

            if (!Alpine.data('countUp')) {
                Alpine.data('countUp', (target, decimals = 0) => ({
                    value: 0,
                    target: Number(target) || 0,
                    decimals: Number(decimals) || 0,
                    get display() {
                        return this.value.toLocaleString(undefined, {
                            minimumFractionDigits: this.decimals,
                            maximumFractionDigits: this.decimals
                        });
                    },
                    init() {
                        const observer = new IntersectionObserver((entries) => {
                            entries.forEach(entry => {
                                if (entry.isIntersecting) {
                                    this.animate();
                                    observer.unobserve(entry.target);
                                }
                            });
                        }, { threshold: 0.5 });
                        observer.observe(this.$el);
                    },
                    animate() {
                        const duration = 1400;
                        const startedAt = performance.now();
                        const step = (now) => {
                            const progress = Math.min((now - startedAt) / duration, 1);
                            this.value = this.target * (1 - Math.pow(1 - progress, 3));
                            if (progress < 1) {
                                requestAnimationFrame(step);
                            } else {
                                this.value = this.target;
                            }
                        };
                        requestAnimationFrame(step);
                    }
                }));
            }
        };
        document.addEventListener('alpine:init', registerScrollReveal);
        if (window.Alpine) { registerScrollReveal(); }
    })();
</script>

<div class="bg-white text-slate-800 antialiased font-sans selection:bg-red-500 selection:text-white">

    {{-- Page Hero --}}
    <section class="bg-[#0B1A30]">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            <nav class="border-b border-white/10 py-3.5 text-xs" aria-label="Breadcrumb">
                <ol class="flex flex-wrap items-center gap-1.5">
                    <li><a href="{{ route('home') }}" class="font-medium text-slate-400 transition hover:text-white">Home</a></li>
                    <li aria-hidden="true"><i class="ri-arrow-right-s-line text-slate-600"></i></li>
                    <li><span class="font-semibold text-white" aria-current="page">About Us</span></li>
                </ol>
            </nav>

            <div class="py-14 sm:py-20 lg:py-24">
                <h1 class="max-w-3xl text-4xl font-extrabold leading-[1.05] tracking-tighter text-white sm:text-5xl lg:text-6xl">
                    About Us
                </h1>

                <p class="mt-5 max-w-2xl text-sm leading-relaxed text-slate-300 sm:text-base">
                    Since 2022, Real Facility Services has brought technical and soft services together for
                    residential and commercial facilities, with trained teams, quality-focused delivery,
                    and support available around the clock.
                </p>

             
            </div>
        </div>
    </section>

    {{-- Our Story (Image Left / Plain-Language Content Right) --}}
    <section
        id="our-story"
        x-data="scrollReveal(0)"
        :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'"
        class="scroll-mt-24 border-b border-slate-100 bg-white py-14 transition-all duration-700 ease-out sm:py-20 lg:py-24"
    >
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid items-center gap-10 lg:grid-cols-2 lg:gap-16">

                <div class="order-1">
                    <img
                        src="{{ asset('images/PIC_4918.webp') }}"
                        alt="Real Facility Services housekeeping and technical team working inside a building"
                        loading="lazy"
                        decoding="async"
                        class="h-[280px] w-full rounded-2xl object-cover sm:h-[380px] lg:h-[520px]"
                    />
                </div>

                <div class="order-2">
                    <span class="inline-flex items-center gap-1.5 rounded-full bg-[#12233F]/10 px-3.5 py-1 text-xs font-semibold text-[#12233F]">
                        <i class="ri-team-line text-xs"></i> Our Story
                    </span>

                    <h2 class="mt-4 text-3xl font-extrabold leading-[1.15] tracking-tight text-slate-900 sm:text-4xl">
                        Integrated facility services, built around your needs
                    </h2>

                    <div class="mt-5 space-y-4 text-sm leading-relaxed text-slate-600 sm:text-base">
                        <p>
                            Real Facility Services has provided facility and soft services since 2022. Our
                            management team brings relevant technical and professional experience, supported
                            by trained workers and technical staff.
                        </p>
                        <p>
                            We bring together housekeeping, horticulture, technical and security maintenance,
                            and other facility services for residential societies and commercial properties.
                            Our residential facility-management experience spans more than three years.
                        </p>
                        <p>
                            Our work is guided by customer requirements, health and safety practices, audits,
                            and ongoing performance review. We also provide legal support and consultancy to
                            help clients with smooth transitions and day-to-day operations.
                        </p>
                        <p class="font-semibold text-slate-800">
                            Our motto is simple: serve with excellence.
                        </p>
                    </div>

                    <ul class="mt-7 grid gap-3 sm:grid-cols-2">
                        <li class="flex items-start gap-2.5 text-sm text-slate-700">
                            <i class="ri-checkbox-circle-fill mt-0.5 text-sm text-red-600"></i>
                            <span>Technical and soft-services expertise</span>
                        </li>
                        <li class="flex items-start gap-2.5 text-sm text-slate-700">
                            <i class="ri-checkbox-circle-fill mt-0.5 text-sm text-red-600"></i>
                            <span>Solutions shaped around client requirements</span>
                        </li>
                        <li class="flex items-start gap-2.5 text-sm text-slate-700">
                            <i class="ri-checkbox-circle-fill mt-0.5 text-sm text-red-600"></i>
                            <span>Audits, reporting, and performance review</span>
                        </li>
                        <li class="flex items-start gap-2.5 text-sm text-slate-700">
                            <i class="ri-checkbox-circle-fill mt-0.5 text-sm text-red-600"></i>
                            <span>24 x 7 support system</span>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </section>

    {{-- Numbers Band --}}
    <section class="bg-slate-50/50 py-12 sm:py-16">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="overflow-hidden rounded-3xl bg-[#0B1A30] px-6 py-10 sm:px-10 sm:py-12">
                <div class="grid grid-cols-2 gap-y-9 lg:grid-cols-4">
                    <div class="text-center lg:px-6">
                        <p class="text-3xl font-extrabold tracking-tight text-white sm:text-4xl">2022</p>
                        <p class="mt-2 text-[11px] font-medium text-slate-400">Providing facility services since</p>
                    </div>

                    <div class="text-center lg:border-l lg:border-white/10 lg:px-6">
                        <p class="text-3xl font-extrabold tracking-tight text-white sm:text-4xl">3+ years</p>
                        <p class="mt-2 text-[11px] font-medium text-slate-400">Residential facility experience</p>
                    </div>

                    <div class="text-center lg:border-l lg:border-white/10 lg:px-6">
                        <p class="text-3xl font-extrabold tracking-tight text-white sm:text-4xl">24 x 7</p>
                        <p class="mt-2 text-[11px] font-medium text-slate-400">Support system</p>
                    </div>

                    <div class="text-center lg:border-l lg:border-white/10 lg:px-6">
                        <p class="text-3xl font-extrabold tracking-tight text-red-400 sm:text-4xl">ISO 9001:2015</p>
                        <p class="mt-2 text-[11px] font-medium text-slate-400">Quality management</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- The Daily Struggles We Remove --}}
    <section
        x-data="scrollReveal(0)"
        :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'"
        class="border-b border-slate-100 bg-white py-14 transition-all duration-700 ease-out sm:py-20 lg:py-24"
    >
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            <div class="max-w-2xl mx-auto text-center">
                <span class="inline-flex items-center gap-1.5 rounded-full bg-red-50 px-3.5 py-1 text-xs font-semibold text-red-600">
                    <i class="ri-shield-star-line text-xs"></i> Our Core Values
                </span>
                <h2 class="mt-3 text-3xl font-extrabold tracking-tight text-slate-900 sm:text-4xl">
                    The principles behind our service
                </h2>
                <p class="mt-3 text-sm leading-relaxed text-slate-600 sm:text-base">
                    Safety, excellence, customer focus, and reliability guide how we serve our clients.
                </p>
            </div>

            <div class="mt-12 grid gap-4 lg:grid-cols-2">

                <div class="flex items-start gap-3.5 rounded-2xl border border-slate-200/80 bg-slate-50/60 p-5 transition hover:border-red-200 hover:bg-white hover:shadow-sm sm:p-6">
                    <span class="mt-0.5 flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-white text-red-600 border border-slate-200 shadow-2xs">
                        <i class="ri-close-circle-line text-sm"></i>
                    </span>
                    <div>
                        <h3 class="text-sm font-bold text-slate-900">Safety</h3>
                        <p class="mt-1.5 text-xs leading-relaxed text-slate-600 sm:text-sm">
                            We put employee and workplace health and safety first through inductions, risk
                            assessments, training, audits, and emergency planning.
                        </p>
                    </div>
                </div>

                <div class="flex items-start gap-3.5 rounded-2xl border border-slate-200/80 bg-slate-50/60 p-5 transition hover:border-red-200 hover:bg-white hover:shadow-sm sm:p-6">
                    <span class="mt-0.5 flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-white text-red-600 border border-slate-200 shadow-2xs">
                        <i class="ri-close-circle-line text-sm"></i>
                    </span>
                    <div>
                        <h3 class="text-sm font-bold text-slate-900">Excellence</h3>
                        <p class="mt-1.5 text-xs leading-relaxed text-slate-600 sm:text-sm">
                            We aim to provide quality services and practical technical solutions that meet the
                            requirements of each client.
                        </p>
                    </div>
                </div>

                <div class="flex items-start gap-3.5 rounded-2xl border border-slate-200/80 bg-slate-50/60 p-5 transition hover:border-red-200 hover:bg-white hover:shadow-sm sm:p-6">
                    <span class="mt-0.5 flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-white text-red-600 border border-slate-200 shadow-2xs">
                        <i class="ri-close-circle-line text-sm"></i>
                    </span>
                    <div>
                        <h3 class="text-sm font-bold text-slate-900">Customer centric</h3>
                        <p class="mt-1.5 text-xs leading-relaxed text-slate-600 sm:text-sm">
                            We work to understand our clients’ needs and shape facility services around their
                            requirements.
                        </p>
                    </div>
                </div>

                <div class="flex items-start gap-3.5 rounded-2xl border border-slate-200/80 bg-slate-50/60 p-5 transition hover:border-red-200 hover:bg-white hover:shadow-sm sm:p-6">
                    <span class="mt-0.5 flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-white text-red-600 border border-slate-200 shadow-2xs">
                        <i class="ri-close-circle-line text-sm"></i>
                    </span>
                    <div>
                        <h3 class="text-sm font-bold text-slate-900">Reliable</h3>
                        <p class="mt-1.5 text-xs leading-relaxed text-slate-600 sm:text-sm">
                            Our teams and 24 x 7 support system are focused on dependable facility operations.
                        </p>
                    </div>
                </div>

                <div class="flex items-start gap-3.5 rounded-2xl border border-slate-200/80 bg-slate-50/60 p-5 transition hover:border-red-200 hover:bg-white hover:shadow-sm sm:p-6">
                    <span class="mt-0.5 flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-white text-red-600 border border-slate-200 shadow-2xs">
                        <i class="ri-close-circle-line text-sm"></i>
                    </span>
                    <div>
                        <h3 class="text-sm font-bold text-slate-900">Accountability</h3>
                        <p class="mt-1.5 text-xs leading-relaxed text-slate-600 sm:text-sm">
                            Internal and external audits, incident reporting, and closure of findings help us
                            review work and take corrective action.
                        </p>
                    </div>
                </div>

                <div class="flex items-start gap-3.5 rounded-2xl border border-slate-200/80 bg-slate-50/60 p-5 transition hover:border-red-200 hover:bg-white hover:shadow-sm sm:p-6">
                    <span class="mt-0.5 flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-white text-red-600 border border-slate-200 shadow-2xs">
                        <i class="ri-close-circle-line text-sm"></i>
                    </span>
                    <div>
                        <h3 class="text-sm font-bold text-slate-900">Continuous improvement</h3>
                        <p class="mt-1.5 text-xs leading-relaxed text-slate-600 sm:text-sm">
                            KPI and trend analysis, performance monitoring, lessons learned, and management
                            review help strengthen our service framework.
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- What We Handle (Service Lines) --}}
    <section
        x-data="scrollReveal(0)"
        :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'"
        class="border-b border-slate-100 bg-white py-14 transition-all duration-700 ease-out sm:py-20 lg:py-24"
    >
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            <div class="max-w-2xl mx-auto text-center">
                <span class="inline-flex items-center gap-1.5 rounded-full bg-[#12233F]/10 px-3.5 py-1 text-xs font-semibold text-[#12233F]">
                    <i class="ri-briefcase-line text-xs"></i> What We Handle
                </span>
                <h2 class="mt-3 text-3xl font-extrabold tracking-tight text-slate-900 sm:text-4xl">
                    Integrated services for people, premises, and equipment
                </h2>
                <p class="mt-3 text-sm leading-relaxed text-slate-600 sm:text-base">
                    Our expertise spans technical and soft services, tailored to the needs of residential,
                    commercial, and other operating environments.
                </p>
            </div>

            <div class="mt-12 grid gap-5 sm:grid-cols-2 lg:grid-cols-3">

                <a
                    href="{{ route('services.show', ['slug' => 'mechanized-operations']) }}"
                    class="group flex flex-col rounded-2xl border border-slate-200/80 bg-white p-6 shadow-xs transition duration-300 hover:-translate-y-1 hover:border-[#12233F]/25 hover:shadow-lg"
                >
                    <span class="flex h-11 w-11 items-center justify-center rounded-xl bg-[#12233F]/10 text-[#12233F] transition-colors duration-300 group-hover:bg-[#12233F] group-hover:text-white">
                        <i class="ri-brush-line text-lg"></i>
                    </span>
                    <h3 class="mt-5 text-base font-bold text-slate-900 group-hover:text-red-700 transition">Mechanized Cleaning Operations</h3>
                    <p class="mt-2 flex-1 text-xs leading-relaxed text-slate-600 sm:text-sm">
                        Mechanized cleaning supported by specialist equipment, including auto scrubbers,
                        burnishers, high-pressure jets, steam cleaners, and road sweepers.
                    </p>
                    <span class="mt-5 inline-flex items-center gap-1.5 text-xs font-semibold text-[#12233F]">
                        See scope
                        <i class="ri-arrow-right-line text-xs transition-transform duration-300 group-hover:translate-x-1"></i>
                    </span>
                </a>

                <a
                    href="{{ route('services.show', ['slug' => 'washroom-services']) }}"
                    class="group flex flex-col rounded-2xl border border-slate-200/80 bg-white p-6 shadow-xs transition duration-300 hover:-translate-y-1 hover:border-[#12233F]/25 hover:shadow-lg"
                >
                    <span class="flex h-11 w-11 items-center justify-center rounded-xl bg-[#12233F]/10 text-[#12233F] transition-colors duration-300 group-hover:bg-[#12233F] group-hover:text-white">
                        <i class="ri-drop-line text-lg"></i>
                    </span>
                    <h3 class="mt-5 text-base font-bold text-slate-900 group-hover:text-red-700 transition">Washroom Services</h3>
                    <p class="mt-2 flex-1 text-xs leading-relaxed text-slate-600 sm:text-sm">
                        Housekeeping and washroom care delivered as part of our soft-services offering for
                        offices, residential societies, and other facilities.
                    </p>
                    <span class="mt-5 inline-flex items-center gap-1.5 text-xs font-semibold text-[#12233F]">
                        See scope
                        <i class="ri-arrow-right-line text-xs transition-transform duration-300 group-hover:translate-x-1"></i>
                    </span>
                </a>

                <a
                    href="{{ route('services.show', ['slug' => 'office-space-management']) }}"
                    class="group flex flex-col rounded-2xl border border-slate-200/80 bg-white p-6 shadow-xs transition duration-300 hover:-translate-y-1 hover:border-[#12233F]/25 hover:shadow-lg"
                >
                    <span class="flex h-11 w-11 items-center justify-center rounded-xl bg-[#12233F]/10 text-[#12233F] transition-colors duration-300 group-hover:bg-[#12233F] group-hover:text-white">
                        <i class="ri-building-line text-lg"></i>
                    </span>
                    <h3 class="mt-5 text-base font-bold text-slate-900 group-hover:text-red-700 transition">Integrated Facility Management</h3>
                    <p class="mt-2 flex-1 text-xs leading-relaxed text-slate-600 sm:text-sm">
                        Coordinated management and maintenance for residential and commercial facilities,
                        supported by technical, housekeeping, horticulture, and security services.
                    </p>
                    <span class="mt-5 inline-flex items-center gap-1.5 text-xs font-semibold text-[#12233F]">
                        See scope
                        <i class="ri-arrow-right-line text-xs transition-transform duration-300 group-hover:translate-x-1"></i>
                    </span>
                </a>

                <a
                    href="{{ route('services.show', ['slug' => 'deep-cleaning-services']) }}"
                    class="group flex flex-col rounded-2xl border border-slate-200/80 bg-white p-6 shadow-xs transition duration-300 hover:-translate-y-1 hover:border-[#12233F]/25 hover:shadow-lg"
                >
                    <span class="flex h-11 w-11 items-center justify-center rounded-xl bg-[#12233F]/10 text-[#12233F] transition-colors duration-300 group-hover:bg-[#12233F] group-hover:text-white">
                        <i class="ri-shield-check-line text-lg"></i>
                    </span>
                    <h3 class="mt-5 text-base font-bold text-slate-900 group-hover:text-red-700 transition">Deep Cleaning Services</h3>
                    <p class="mt-2 flex-1 text-xs leading-relaxed text-slate-600 sm:text-sm">
                        Deep cleaning delivered with trained manpower, mechanized methods, and suitable
                        equipment for the facility and its requirements.
                    </p>
                    <span class="mt-5 inline-flex items-center gap-1.5 text-xs font-semibold text-[#12233F]">
                        See scope
                        <i class="ri-arrow-right-line text-xs transition-transform duration-300 group-hover:translate-x-1"></i>
                    </span>
                </a>

                <a
                    href="{{ route('services.show', ['slug' => 'pest-management']) }}"
                    class="group flex flex-col rounded-2xl border border-slate-200/80 bg-white p-6 shadow-xs transition duration-300 hover:-translate-y-1 hover:border-[#12233F]/25 hover:shadow-lg"
                >
                    <span class="flex h-11 w-11 items-center justify-center rounded-xl bg-[#12233F]/10 text-[#12233F] transition-colors duration-300 group-hover:bg-[#12233F] group-hover:text-white">
                        <i class="ri-bug-line text-lg"></i>
                    </span>
                    <h3 class="mt-5 text-base font-bold text-slate-900 group-hover:text-red-700 transition">Pest Management</h3>
                    <p class="mt-2 flex-1 text-xs leading-relaxed text-slate-600 sm:text-sm">
                        Scheduled inspections, careful checks on chemicals, eco-friendly procedures, safety
                        precautions, and service records with client feedback.
                    </p>
                    <span class="mt-5 inline-flex items-center gap-1.5 text-xs font-semibold text-[#12233F]">
                        See scope
                        <i class="ri-arrow-right-line text-xs transition-transform duration-300 group-hover:translate-x-1"></i>
                    </span>
                </a>

                <a
                    href="{{ route('services') }}"
                    class="group flex flex-col rounded-2xl border border-dashed border-slate-300 bg-slate-50/60 p-6 transition duration-300 hover:border-[#12233F]/40 hover:bg-white hover:shadow-md"
                >
                    <span class="flex h-11 w-11 items-center justify-center rounded-xl bg-white text-[#12233F] border border-slate-200">
                        <i class="ri-grid-fill text-lg"></i>
                    </span>
                    <h3 class="mt-5 text-base font-bold text-slate-900">Not sure what you need?</h3>
                    <p class="mt-2 flex-1 text-xs leading-relaxed text-slate-600 sm:text-sm">
                        Explore our wider range of technical, soft-services, audit, legal-support, and
                        consultancy capabilities.
                    </p>
                    <span class="mt-5 inline-flex items-center gap-1.5 text-xs font-semibold text-[#12233F]">
                        Browse all services
                        <i class="ri-arrow-right-line text-xs transition-transform duration-300 group-hover:translate-x-1"></i>
                    </span>
                </a>

            </div>
        </div>
    </section>

    {{-- Advanced Machinery & Specialist Equipment --}}
    <section
        x-data="scrollReveal(0)"
        :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'"
        class="border-b border-slate-100 bg-white py-14 transition-all duration-700 ease-out sm:py-20 lg:py-24"
    >
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            <div class="max-w-2xl mx-auto text-center">
                <span class="inline-flex items-center gap-1.5 rounded-full bg-red-50 px-3.5 py-1 text-xs font-semibold text-red-600">
                    <i class="ri-settings-5-line text-xs"></i> Machinery &amp; Equipment
                </span>
                <h2 class="mt-3 text-3xl font-extrabold tracking-tight text-slate-900 sm:text-4xl">
                    Advanced Machinery &amp; Specialist Tools
                </h2>
                <p class="mt-3 text-sm leading-relaxed text-slate-600 sm:text-base">
                    We deploy commercial-grade mechanized equipment and high-quality manual tools to deliver superior cleanliness and operational efficiency across all premises.
                </p>
            </div>

            <div class="mt-12 grid gap-5 sm:grid-cols-2 lg:grid-cols-5">

                <div class="rounded-2xl border border-slate-200/80 bg-slate-50/50 p-5 transition duration-300 hover:border-red-300 hover:bg-white hover:shadow-md">
                    <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-red-600 text-white">
                        <i class="ri-bubble-chart-line text-lg"></i>
                    </span>
                    <h3 class="mt-4 text-sm font-bold text-slate-900">Auto Scrubber</h3>
                    <p class="mt-1.5 text-xs text-slate-600 leading-relaxed">Continuous automated floor scrubbing and drying for high-traffic corridors.</p>
                </div>

                <div class="rounded-2xl border border-slate-200/80 bg-slate-50/50 p-5 transition duration-300 hover:border-red-300 hover:bg-white hover:shadow-md">
                    <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-[#12233F] text-white">
                        <i class="ri-sparkling-fill text-lg"></i>
                    </span>
                    <h3 class="mt-4 text-sm font-bold text-slate-900">High Speed Burnisher</h3>
                    <p class="mt-1.5 text-xs text-slate-600 leading-relaxed">High-RPM gloss restoration and deep buffing for marble &amp; granite floors.</p>
                </div>

                <div class="rounded-2xl border border-slate-200/80 bg-slate-50/50 p-5 transition duration-300 hover:border-red-300 hover:bg-white hover:shadow-md">
                    <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-red-600 text-white">
                        <i class="ri-water-flash-line text-lg"></i>
                    </span>
                    <h3 class="mt-4 text-sm font-bold text-slate-900">High Jet Pressure</h3>
                    <p class="mt-1.5 text-xs text-slate-600 leading-relaxed">Heavy-duty water pressure washing for exterior driveways, parking &amp; facades.</p>
                </div>

                <div class="rounded-2xl border border-slate-200/80 bg-slate-50/50 p-5 transition duration-300 hover:border-red-300 hover:bg-white hover:shadow-md">
                    <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-[#12233F] text-white">
                        <i class="ri-temp-hot-line text-lg"></i>
                    </span>
                    <h3 class="mt-4 text-sm font-bold text-slate-900">Steam Cleaner</h3>
                    <p class="mt-1.5 text-xs text-slate-600 leading-relaxed">Thermal steam sanitization for hygienic washrooms, upholstery &amp; grout lines.</p>
                </div>

                <div class="rounded-2xl border border-slate-200/80 bg-slate-50/50 p-5 transition duration-300 hover:border-red-300 hover:bg-white hover:shadow-md">
                    <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-red-600 text-white">
                        <i class="ri-windy-line text-lg"></i>
                    </span>
                    <h3 class="mt-4 text-sm font-bold text-slate-900">Wet &amp; Dry Vacuum</h3>
                    <p class="mt-1.5 text-xs text-slate-600 leading-relaxed">Dual-action suction machines for liquid spill recovery and dust extraction.</p>
                </div>

                <div class="rounded-2xl border border-slate-200/80 bg-slate-50/50 p-5 transition duration-300 hover:border-red-300 hover:bg-white hover:shadow-md">
                    <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-[#12233F] text-white">
                        <i class="ri-roadster-line text-lg"></i>
                    </span>
                    <h3 class="mt-4 text-sm font-bold text-slate-900">Road Sweeper</h3>
                    <p class="mt-1.5 text-xs text-slate-600 leading-relaxed">Large-area mechanized road and perimeter sweeping for townships &amp; parks.</p>
                </div>

                <div class="rounded-2xl border border-slate-200/80 bg-slate-50/50 p-5 transition duration-300 hover:border-red-300 hover:bg-white hover:shadow-md">
                    <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-red-600 text-white">
                        <i class="ri-node-tree text-lg"></i>
                    </span>
                    <h3 class="mt-4 text-sm font-bold text-slate-900">Mobile Ladder</h3>
                    <p class="mt-1.5 text-xs text-slate-600 leading-relaxed">High-reach mobile access platforms for glass cleaning &amp; elevated technical work.</p>
                </div>

                <div class="rounded-2xl border border-slate-200/80 bg-slate-50/50 p-5 transition duration-300 hover:border-red-300 hover:bg-white hover:shadow-md">
                    <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-[#12233F] text-white">
                        <i class="ri-disc-line text-lg"></i>
                    </span>
                    <h3 class="mt-4 text-sm font-bold text-slate-900">Single Disc Scrubber</h3>
                    <p class="mt-1.5 text-xs text-slate-600 leading-relaxed">Versatile single-disc scrubbing for hard floor stripping, washing &amp; crystallization.</p>
                </div>

                <div class="rounded-2xl border border-slate-200/80 bg-slate-50/50 p-5 transition duration-300 hover:border-red-300 hover:bg-white hover:shadow-md">
                    <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-red-600 text-white">
                        <i class="ri-steering-line text-lg"></i>
                    </span>
                    <h3 class="mt-4 text-sm font-bold text-slate-900">Ride On</h3>
                    <p class="mt-1.5 text-xs text-slate-600 leading-relaxed">Ride-on heavy duty scrubbers for rapid coverage of large basements &amp; concourses.</p>
                </div>

                <div class="rounded-2xl border border-slate-200/80 bg-slate-50/50 p-5 transition duration-300 hover:border-red-300 hover:bg-white hover:shadow-md">
                    <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-[#12233F] text-white">
                        <i class="ri-tools-line text-lg"></i>
                    </span>
                    <h3 class="mt-4 text-sm font-bold text-slate-900">High Quality Manual Tools</h3>
                    <p class="mt-1.5 text-xs text-slate-600 leading-relaxed">Ergonomic color-coded mops, squeegees, microfiber cloths &amp; janitorial carts.</p>
                </div>

            </div>
        </div>
    </section>

    {{-- Our Expertise --}}
    <section
        x-data="scrollReveal(0)"
        :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'"
        class="bg-slate-50/50 py-14 transition-all duration-700 ease-out sm:py-20 lg:py-24"
    >

        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            <div class="max-w-2xl mx-auto text-center">
                <span class="inline-flex items-center gap-1.5 rounded-full bg-[#12233F]/10 px-3.5 py-1 text-xs font-semibold text-[#12233F]">
                    <i class="ri-tools-line text-xs"></i> Our Expertise
                </span>
                <h2 class="mt-3 text-3xl font-extrabold tracking-tight text-slate-900 sm:text-4xl">
                    Technical capability, supported by trained teams
                </h2>
                <p class="mt-3 text-sm leading-relaxed text-slate-600 sm:text-base">
                    Our teams combine on-ground experience, regular training, planned maintenance, and
                    performance monitoring across facility operations. Our flexible solutions cover soft and
                    hard facilities management, along with management and administration.
                </p>
            </div>

            <div class="mt-12 grid gap-5 sm:grid-cols-2 lg:grid-cols-3">

                <div class="rounded-2xl border border-slate-200/80 bg-white p-6 shadow-xs">
                    <span class="inline-flex h-9 w-9 items-center justify-center rounded-full bg-[#12233F] text-white">
                        <i class="ri-user-add-line text-sm"></i>
                    </span>
                    <p class="mt-4 text-[11px] font-bold uppercase tracking-wider text-red-600">Technical services</p>
                    <h3 class="mt-1.5 text-base font-bold text-slate-900">Planned and responsive maintenance</h3>
                    <p class="mt-2 text-xs leading-relaxed text-slate-600 sm:text-sm">
                        Planned preventive and breakdown maintenance for MEP, HVAC, power and backup systems,
                        BMS, and other building assets, supported by scheduled equipment checks.
                    </p>
                </div>

                <div class="rounded-2xl border border-slate-200/80 bg-white p-6 shadow-xs">
                    <span class="inline-flex h-9 w-9 items-center justify-center rounded-full bg-[#12233F] text-white">
                        <i class="ri-book-open-line text-sm"></i>
                    </span>
                    <p class="mt-4 text-[11px] font-bold uppercase tracking-wider text-red-600">Operations</p>
                    <h3 class="mt-1.5 text-base font-bold text-slate-900">Structured facility operations</h3>
                    <p class="mt-2 text-xs leading-relaxed text-slate-600 sm:text-sm">
                        Complaint and AMC management, equipment and machinery SOPs, asset and inventory
                        management, and equipment health reviews support daily operations.
                    </p>
                </div>

                <div class="rounded-2xl border border-slate-200/80 bg-white p-6 shadow-xs">
                    <span class="inline-flex h-9 w-9 items-center justify-center rounded-full bg-[#12233F] text-white">
                        <i class="ri-repeat-line text-sm"></i>
                    </span>
                    <p class="mt-4 text-[11px] font-bold uppercase tracking-wider text-red-600">Soft services</p>
                    <h3 class="mt-1.5 text-base font-bold text-slate-900">Care for the everyday environment</h3>
                    <p class="mt-2 text-xs leading-relaxed text-slate-600 sm:text-sm">
                        Housekeeping, mechanized cleaning, washroom services, landscaping, and pest
                        management support clean, safe, and welcoming facilities.
                    </p>
                </div>

                <div class="rounded-2xl border border-slate-200/80 bg-white p-6 shadow-xs">
                    <span class="inline-flex h-9 w-9 items-center justify-center rounded-full bg-red-600 text-white">
                        <i class="ri-qr-code-line text-sm"></i>
                    </span>
                    <p class="mt-4 text-[11px] font-bold uppercase tracking-wider text-red-600">Performance</p>
                    <h3 class="mt-1.5 text-base font-bold text-slate-900">Monitoring, audits, and reporting</h3>
                    <p class="mt-2 text-xs leading-relaxed text-slate-600 sm:text-sm">
                        Audits, performance indicators, trend analysis, and HSQE reporting help teams review
                        findings and follow up on corrective and preventive actions.
                    </p>
                </div>

                <div class="rounded-2xl border border-slate-200/80 bg-white p-6 shadow-xs">
                    <span class="inline-flex h-9 w-9 items-center justify-center rounded-full bg-red-600 text-white">
                        <i class="ri-calendar-check-line text-sm"></i>
                    </span>
                    <p class="mt-4 text-[11px] font-bold uppercase tracking-wider text-red-600">People</p>
                    <h3 class="mt-1.5 text-base font-bold text-slate-900">Training and competency development</h3>
                    <p class="mt-2 text-xs leading-relaxed text-slate-600 sm:text-sm">
                        In-house professionals and industry leaders provide regular technical and soft-skills
                        training to help employees stay current with methods and technology. The company also
                        supports client events and health check-up camps for employees and clients.
                    </p>
                </div>

                <div class="flex flex-col justify-center rounded-2xl border border-[#12233F]/15 bg-[#0B1A30] p-6 text-white">
                    <i class="ri-phone-line text-2xl text-red-400"></i>
                    <h3 class="mt-4 text-base font-bold text-white">Support across your facility</h3>
                    <p class="mt-2 text-xs leading-relaxed text-slate-300">
                        Our integrated approach brings together facility management, maintenance, and
                        24 x 7 support for client operations.
                    </p>
                    <a
                        href="tel:{{ setting('phone', '+1 (800) 492-8820') }}"
                        class="mt-5 inline-flex items-center gap-2 self-start rounded-full bg-red-500 px-5 py-2.5 text-xs font-semibold text-slate-950 transition hover:bg-red-400"
                    >
                        <span>Contact our team</span>
                    </a>
                </div>

            </div>
        </div>
    </section>

    {{-- Mission & Vision --}}
    <section
        x-data="scrollReveal(0)"
        :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'"
        class="border-y border-slate-100 bg-white py-14 transition-all duration-700 ease-out sm:py-20 lg:py-24"
    >
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-6 md:grid-cols-2">

                <div class="relative rounded-3xl border border-slate-200/80 bg-white p-8 shadow-xs transition hover:border-[#12233F]/30 sm:p-10">
                    <span class="absolute top-6 right-6 inline-flex items-center justify-center rounded-full bg-red-600 px-2.5 py-1 text-[10px] font-bold text-white">01</span>
                    <span class="mb-6 flex h-11 w-11 items-center justify-center rounded-full bg-[#12233F]/10 text-[#12233F]">
                        <i class="ri-compass-3-line text-xl"></i>
                    </span>
                    <span class="text-xs font-semibold uppercase tracking-wider text-[#12233F]">Our Mission</span>
                    <h2 class="mt-2 text-2xl font-bold tracking-tight text-slate-900">Quality services, shaped by client needs</h2>
                    <p class="mt-3 text-sm leading-relaxed text-slate-600">
                        To provide quality integrated facility services that meet our clients' requirements,
                        supported by experienced management, trained teams, and a strong focus on health and
                        safety.
                    </p>
                    <div class="mt-6 flex flex-wrap gap-2 border-t border-slate-100 pt-5 text-xs font-medium text-slate-700">
                        <span class="rounded-full border border-slate-200/80 bg-slate-50 px-3 py-1">Customer focus</span>
                        <span class="rounded-full border border-slate-200/80 bg-slate-50 px-3 py-1">Safety first</span>
                        <span class="rounded-full border border-slate-200/80 bg-slate-50 px-3 py-1">Service excellence</span>
                    </div>
                </div>

                <div class="relative rounded-3xl border border-slate-200/80 bg-white p-8 shadow-xs transition hover:border-[#12233F]/30 sm:p-10">
                    <span class="absolute top-6 right-6 inline-flex items-center justify-center rounded-full bg-red-600 px-2.5 py-1 text-[10px] font-bold text-white">02</span>
                    <span class="mb-6 flex h-11 w-11 items-center justify-center rounded-full bg-[#12233F] text-white">
                        <i class="ri-eye-line text-xl"></i>
                    </span>
                    <span class="text-xs font-semibold uppercase tracking-wider text-slate-500">Our Vision</span>
                    <h2 class="mt-2 text-2xl font-bold tracking-tight text-slate-900">A trusted partner for facility operations</h2>
                    <p class="mt-3 text-sm leading-relaxed text-slate-600">
                        To support the smooth transition and operation of residential and commercial facilities
                        through integrated services, technical expertise, and dependable client support.
                    </p>
                    <div class="mt-6 flex flex-wrap gap-2 border-t border-slate-100 pt-5 text-xs font-medium text-slate-700">
                        <span class="rounded-full border border-slate-200/80 bg-slate-50 px-3 py-1">Technical services</span>
                        <span class="rounded-full border border-slate-200/80 bg-slate-50 px-3 py-1">Soft services</span>
                        <span class="rounded-full border border-slate-200/80 bg-slate-50 px-3 py-1">24 x 7 support</span>
                    </div>
                </div>

            </div>
        </div>
    </section>

   


    {{-- Focused Sectors --}}
    <section
        x-data="scrollReveal(0)"
        :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'"
        class="border-t border-slate-100 bg-slate-50/50 py-14 transition-all duration-700 ease-out sm:py-20 lg:py-24"
    >
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-2xl text-center">
                <span class="inline-flex items-center gap-1.5 rounded-full bg-[#12233F]/10 px-3.5 py-1 text-xs font-semibold text-[#12233F]">
                    <i class="ri-building-4-line text-xs"></i> Focused Sectors
                </span>
                <h2 class="mt-3 text-3xl font-extrabold tracking-tight text-slate-900 sm:text-4xl">
                    Facility expertise across sectors
                </h2>
                <p class="mt-3 text-sm leading-relaxed text-slate-600 sm:text-base">
                    Our client environments include residential and master communities, retail, commercial,
                    private and public sector properties, and specialist operating sites.
                </p>
            </div>

            <div class="mt-10 grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
                <div class="border-l-2 border-red-600 bg-white p-5">
                    <h3 class="text-sm font-bold text-slate-900">Residential</h3>
                    <p class="mt-1.5 text-xs leading-relaxed text-slate-600 sm:text-sm">Residential societies and master communities.</p>
                </div>
                <div class="border-l-2 border-[#12233F] bg-white p-5">
                    <h3 class="text-sm font-bold text-slate-900">Retail &amp; Malls</h3>
                    <p class="mt-1.5 text-xs leading-relaxed text-slate-600 sm:text-sm">Retail properties and mall environments.</p>
                </div>
                <div class="border-l-2 border-emerald-600 bg-white p-5">
                    <h3 class="text-sm font-bold text-slate-900">Commercial</h3>
                    <p class="mt-1.5 text-xs leading-relaxed text-slate-600 sm:text-sm">Commercial buildings and office environments.</p>
                </div>
                <div class="border-l-2 border-amber-500 bg-white p-5">
                    <h3 class="text-sm font-bold text-slate-900">Manufacturing Units</h3>
                    <p class="mt-1.5 text-xs leading-relaxed text-slate-600 sm:text-sm">Facility operations for manufacturing sites.</p>
                </div>
                <div class="border-l-2 border-sky-600 bg-white p-5">
                    <h3 class="text-sm font-bold text-slate-900">Healthcare</h3>
                    <p class="mt-1.5 text-xs leading-relaxed text-slate-600 sm:text-sm">Healthcare facilities and hospital environments.</p>
                </div>
                <div class="border-l-2 border-rose-500 bg-white p-5">
                    <h3 class="text-sm font-bold text-slate-900">Export Houses &amp; Automobiles</h3>
                    <p class="mt-1.5 text-xs leading-relaxed text-slate-600 sm:text-sm">Export-house and automobile-sector facilities.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Final CTA --}}
    <section
        x-data="scrollReveal(0)"
        :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'"
        class="py-14 transition-all duration-700 ease-out sm:py-20"
    >
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="rounded-3xl border border-slate-800 bg-[#0B1A30] px-6 py-14 text-center text-white sm:px-12 lg:py-16">
                <div class="mx-auto max-w-2xl space-y-4">
                    <span class="inline-flex items-center gap-1.5 rounded-full border border-white/10 bg-white/10 px-3.5 py-1 text-xs font-semibold text-red-400">
                        <i class="ri-customer-service-2-line text-xs"></i> Direct Operations Desk
                    </span>
                    <h2 class="text-3xl font-extrabold tracking-tight text-white sm:text-4xl">
                        Facility services built around your requirements
                    </h2>
                    <p class="mx-auto max-w-lg text-sm leading-relaxed text-slate-400">
                        Tell us about your facility, operational priorities, and service requirements. Our team
                        can discuss an integrated approach across technical and soft services.
                    </p>

                    <div class="flex flex-wrap items-center justify-center gap-3 pt-4">
                        <a
                            href="{{ route('contact') }}"
                            class="inline-flex items-center gap-2 rounded-full bg-red-500 px-7 py-3.5 text-xs font-semibold text-slate-950 shadow-sm transition hover:bg-red-400 active:scale-[0.98] sm:text-sm"
                        >
                            <span>Discuss Your Requirements</span>
                            <i class="ri-arrow-right-line text-sm"></i>
                        </a>
                        <a
                            href="tel:{{ setting('phone', '+1 (800) 492-8820') }}"
                            class="inline-flex items-center gap-2 rounded-full border border-white/20 bg-white/10 px-6 py-3.5 text-xs font-medium text-white backdrop-blur-md transition hover:bg-white/20 active:scale-[0.98] sm:text-sm"
                        >
                            <i class="ri-phone-line text-sm text-red-400"></i>
                            <span>{{ setting('phone', '+1 (800) 492-8820') }}</span>
                        </a>
                    </div>

                    <p class="pt-3 text-[11px] text-slate-500">
                        Prefer email? Write to
                        <a href="mailto:{{ setting('email', 'ops@facilitypro.com') }}" class="font-semibold text-slate-300 underline underline-offset-2 transition hover:text-white">
                            {{ setting('email', 'ops@facilitypro.com') }}
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </section>

</div>
