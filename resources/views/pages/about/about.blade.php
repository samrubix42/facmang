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
                    We are a facility management company. Housekeeping, washrooms, pantry, air conditioning,
                    electrical and repairs  handled by our own trained people, on one contract, with a report
                    you can actually check.
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
                        src="{{ asset('images/hero_facility.jpg') }}"
                        alt="FacilityPro housekeeping and technical team working inside an office building"
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
                        We started with one building and one simple promise
                    </h2>

                    <div class="mt-5 space-y-4 text-sm leading-relaxed text-slate-600 sm:text-base">
                        <p>
                            We began by managing a single office tower. Not as a contractor, and not by
                            finding whoever was free that week — we hired our own people, put them on our
                            payroll, and trained them ourselves.
                        </p>
                        <p>
                            That sounds obvious now. Back then, most buildings ran housekeeping on a rotating
                            pool of daily-wage helpers. People changed every month, nobody knew who cleaned
                            which floor, and when something was missed there was no one to ask.
                        </p>
                        <p>
                            Our idea was simple: keep the same trained team on your site, show up on time,
                            log what they did, and let you check the log. When we fall short, you should not
                            have to chase us for a correction — it should already be on your invoice.
                        </p>
                        <p class="font-semibold text-slate-800">
                            That is still the whole business today. Same team. Same standard. Every day.
                        </p>
                    </div>

                    <ul class="mt-7 grid gap-3 sm:grid-cols-2">
                        <li class="flex items-start gap-2.5 text-sm text-slate-700">
                            <i class="ri-checkbox-circle-fill mt-0.5 text-sm text-red-600"></i>
                            <span>Our own employees, never sub-contracted</span>
                        </li>
                        <li class="flex items-start gap-2.5 text-sm text-slate-700">
                            <i class="ri-checkbox-circle-fill mt-0.5 text-sm text-red-600"></i>
                            <span>One contract and one point of contact</span>
                        </li>
                        <li class="flex items-start gap-2.5 text-sm text-slate-700">
                            <i class="ri-checkbox-circle-fill mt-0.5 text-sm text-red-600"></i>
                            <span>Phone-scanned, time-stamped task reports</span>
                        </li>
                        <li class="flex items-start gap-2.5 text-sm text-slate-700">
                            <i class="ri-checkbox-circle-fill mt-0.5 text-sm text-red-600"></i>
                            <span>Engineers on call around the clock</span>
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
                        <p class="text-4xl font-extrabold tracking-tight text-white tabular-nums sm:text-5xl" x-data="countUp(4.8, 1)">
                            <span x-text="display">0</span>M+
                        </p>
                        <p class="mt-2 text-[11px] font-medium text-slate-400">Sq. Ft. Under Management</p>
                    </div>

                    <div class="text-center lg:border-l lg:border-white/10 lg:px-6">
                        <p class="text-4xl font-extrabold tracking-tight text-white tabular-nums sm:text-5xl" x-data="countUp(2400, 0)">
                            <span x-text="display">0</span>+
                        </p>
                        <p class="mt-2 text-[11px] font-medium text-slate-400">Trained In-House Staff</p>
                    </div>

                    <div class="text-center lg:border-l lg:border-white/10 lg:px-6">
                        <p class="text-4xl font-extrabold tracking-tight text-white tabular-nums sm:text-5xl" x-data="countUp(99.85, 2)">
                            <span x-text="display">0</span>%
                        </p>
                        <p class="mt-2 text-[11px] font-medium text-slate-400">Monthly Quality Score</p>
                    </div>

                    <div class="text-center lg:border-l lg:border-white/10 lg:px-6">
                        <p class="text-4xl font-extrabold tracking-tight text-red-400 tabular-nums sm:text-5xl" x-data="countUp(15, 0)">
                            &lt;<span x-text="display">0</span>
                        </p>
                        <p class="mt-2 text-[11px] font-medium text-slate-400">Minute Emergency Response</p>
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
                    <i class="ri-emotion-sad-line text-xs"></i> Sound Familiar?
                </span>
                <h2 class="mt-3 text-3xl font-extrabold tracking-tight text-slate-900 sm:text-4xl">
                    The problems every building ends up with
                </h2>
                <p class="mt-3 text-sm leading-relaxed text-slate-600 sm:text-base">
                    If any of these feel like your building, this is exactly the work we take off your plate.
                </p>
            </div>

            <div class="mt-12 grid gap-4 lg:grid-cols-2">

                <div class="flex items-start gap-3.5 rounded-2xl border border-slate-200/80 bg-slate-50/60 p-5 transition hover:border-red-200 hover:bg-white hover:shadow-sm sm:p-6">
                    <span class="mt-0.5 flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-white text-red-600 border border-slate-200 shadow-2xs">
                        <i class="ri-close-circle-line text-sm"></i>
                    </span>
                    <div>
                        <h3 class="text-sm font-bold text-slate-900">The washroom is spotless at 9 AM and unusable by lunch</h3>
                        <p class="mt-1.5 text-xs leading-relaxed text-slate-600 sm:text-sm">
                            Soap, paper and cleaning are consumed all day. Refills and re-cleaning have to be
                            scheduled through the day, not just once in the morning.
                        </p>
                    </div>
                </div>

                <div class="flex items-start gap-3.5 rounded-2xl border border-slate-200/80 bg-slate-50/60 p-5 transition hover:border-red-200 hover:bg-white hover:shadow-sm sm:p-6">
                    <span class="mt-0.5 flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-white text-red-600 border border-slate-200 shadow-2xs">
                        <i class="ri-close-circle-line text-sm"></i>
                    </span>
                    <div>
                        <h3 class="text-sm font-bold text-slate-900">Nobody can say who cleaned the 12th floor last night</h3>
                        <p class="mt-1.5 text-xs leading-relaxed text-slate-600 sm:text-sm">
                            Without a record, every complaint turns into an argument. With scan-based logs you
                            know the floor, the person and the exact time.
                        </p>
                    </div>
                </div>

                <div class="flex items-start gap-3.5 rounded-2xl border border-slate-200/80 bg-slate-50/60 p-5 transition hover:border-red-200 hover:bg-white hover:shadow-sm sm:p-6">
                    <span class="mt-0.5 flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-white text-red-600 border border-slate-200 shadow-2xs">
                        <i class="ri-close-circle-line text-sm"></i>
                    </span>
                    <div>
                        <h3 class="text-sm font-bold text-slate-900">Four vendors, four invoices, and everyone blames someone else</h3>
                        <p class="mt-1.5 text-xs leading-relaxed text-slate-600 sm:text-sm">
                            Housekeeping says it is the plumber. The plumber says it is the electrician. You
                            just need to run the building.
                        </p>
                    </div>
                </div>

                <div class="flex items-start gap-3.5 rounded-2xl border border-slate-200/80 bg-slate-50/60 p-5 transition hover:border-red-200 hover:bg-white hover:shadow-sm sm:p-6">
                    <span class="mt-0.5 flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-white text-red-600 border border-slate-200 shadow-2xs">
                        <i class="ri-close-circle-line text-sm"></i>
                    </span>
                    <div>
                        <h3 class="text-sm font-bold text-slate-900">The AC stops at 2 PM and you hear about it tomorrow</h3>
                        <p class="mt-1.5 text-xs leading-relaxed text-slate-600 sm:text-sm">
                            A hot floor and unhappy people cost more than the repair. Our engineers answer
                            24/7 and reach site in under 15 minutes.
                        </p>
                    </div>
                </div>

                <div class="flex items-start gap-3.5 rounded-2xl border border-slate-200/80 bg-slate-50/60 p-5 transition hover:border-red-200 hover:bg-white hover:shadow-sm sm:p-6">
                    <span class="mt-0.5 flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-white text-red-600 border border-slate-200 shadow-2xs">
                        <i class="ri-close-circle-line text-sm"></i>
                    </span>
                    <div>
                        <h3 class="text-sm font-bold text-slate-900">A new face on your floor every single week</h3>
                        <p class="mt-1.5 text-xs leading-relaxed text-slate-600 sm:text-sm">
                            Constant turnover means constant retraining, and your team keeps explaining the
                            same things. Our people stay assigned to your site.
                        </p>
                    </div>
                </div>

                <div class="flex items-start gap-3.5 rounded-2xl border border-slate-200/80 bg-slate-50/60 p-5 transition hover:border-red-200 hover:bg-white hover:shadow-sm sm:p-6">
                    <span class="mt-0.5 flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-white text-red-600 border border-slate-200 shadow-2xs">
                        <i class="ri-close-circle-line text-sm"></i>
                    </span>
                    <div>
                        <h3 class="text-sm font-bold text-slate-900">Your compliance audit is a stack of papers nobody trusts</h3>
                        <p class="mt-1.5 text-xs leading-relaxed text-slate-600 sm:text-sm">
                            If the proof is scattered across WhatsApp and registers, an inspection turns into a
                            panic. We keep one clean digital record.
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- A Day With Us (Working Rhythm) --}}
    <section
        x-data="scrollReveal(0)"
        :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'"
        class="scroll-mt-24 bg-slate-50/50 py-14 transition-all duration-700 ease-out sm:py-20 lg:py-24"
    >
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            <div class="max-w-2xl mx-auto text-center">
                <span class="inline-flex items-center gap-1.5 rounded-full bg-[#12233F]/10 px-3.5 py-1 text-xs font-semibold text-[#12233F]">
                    <i class="ri-time-line text-xs"></i> A Day With Us
                </span>
                <h2 class="mt-3 text-3xl font-extrabold tracking-tight text-slate-900 sm:text-4xl">
                    What actually happens in your building
                </h2>
                <p class="mt-3 text-sm leading-relaxed text-slate-600 sm:text-base">
                    A typical shift, from the first cleaning round to the last engineer signing off.
                </p>
            </div>

            <ol class="mx-auto mt-12 max-w-4xl space-y-4">

                <li class="grid grid-cols-1 gap-3 sm:grid-cols-[120px_1fr] sm:gap-6">
                    <div class="flex items-center sm:justify-end sm:border-r sm:border-slate-200 sm:pr-6">
                        <span class="inline-flex items-center gap-1.5 rounded-full border border-red-100 bg-red-50 px-2.5 py-1 text-[11px] font-extrabold tabular-nums text-red-600 sm:border-0 sm:bg-transparent sm:p-0">
                            <i class="ri-sun-rise-line text-xs sm:hidden"></i> 6:00 AM
                        </span>
                    </div>
                    <div class="rounded-2xl border border-slate-200/80 bg-white p-5 shadow-xs sm:p-6">
                        <h3 class="text-sm font-bold text-slate-900">Washrooms and floors first, before anyone walks in</h3>
                        <p class="mt-1.5 text-xs leading-relaxed text-slate-600 sm:text-sm">
                            Every washroom is cleaned, sanitised and restocked. Floors are dust-mopped across
                            all occupied cabins. Waste is pulled out. The building is ready before the first
                            employee walks in — not while people are working.
                        </p>
                    </div>
                </li>

                <li class="grid grid-cols-1 gap-3 sm:grid-cols-[120px_1fr] sm:gap-6">
                    <div class="flex items-center sm:justify-end sm:border-r sm:border-slate-200 sm:pr-6">
                        <span class="inline-flex items-center gap-1.5 rounded-full border border-red-100 bg-red-50 px-2.5 py-1 text-[11px] font-extrabold tabular-nums text-red-600 sm:border-0 sm:bg-transparent sm:p-0">
                            <i class="ri-coffee-line text-xs sm:hidden"></i> 9:30 AM
                        </span>
                    </div>
                    <div class="rounded-2xl border border-slate-200/80 bg-white p-5 shadow-xs sm:p-6">
                        <h3 class="text-sm font-bold text-slate-900">Pantry opens, and housekeeping catches up</h3>
                        <p class="mt-1.5 text-xs leading-relaxed text-slate-600 sm:text-sm">
                            Pantry attendants are ready with hot beverage service. Meanwhile the morning crew
                            finishes pending tasks, clears conference rooms after meetings, and tops up
                            washroom consumables before the 11 AM rush.
                        </p>
                    </div>
                </li>

                <li class="grid grid-cols-1 gap-3 sm:grid-cols-[120px_1fr] sm:gap-6">
                    <div class="flex items-center sm:justify-end sm:border-r sm:border-slate-200 sm:pr-6">
                        <span class="inline-flex items-center gap-1.5 rounded-full border border-red-100 bg-red-50 px-2.5 py-1 text-[11px] font-extrabold tabular-nums text-red-600 sm:border-0 sm:bg-transparent sm:p-0">
                            <i class="ri-search-eye-line text-xs sm:hidden"></i> 1:00 PM
                        </span>
                    </div>
                    <div class="rounded-2xl border border-slate-200/80 bg-white p-5 shadow-xs sm:p-6">
                        <h3 class="text-sm font-bold text-slate-900">Scheduled checks: air, water, power, panels</h3>
                        <p class="mt-1.5 text-xs leading-relaxed text-slate-600 sm:text-sm">
                            The engineer runs a fixed checklist — AC filters and cooling output, drinking water
                            quality, electrical panels and earthing, lift lobby and escalator area. Anything
                            unusual gets logged the same day, not discovered next month.
                        </p>
                    </div>
                </li>

                <li class="grid grid-cols-1 gap-3 sm:grid-cols-[120px_1fr] sm:gap-6">
                    <div class="flex items-center sm:justify-end sm:border-r sm:border-slate-200 sm:pr-6">
                        <span class="inline-flex items-center gap-1.5 rounded-full border border-red-100 bg-red-50 px-2.5 py-1 text-[11px] font-extrabold tabular-nums text-red-600 sm:border-0 sm:bg-transparent sm:p-0">
                            <i class="ri-login-circle-line text-xs sm:hidden"></i> 4:00 PM
                        </span>
                    </div>
                    <div class="rounded-2xl border border-slate-200/80 bg-white p-5 shadow-xs sm:p-6">
                        <h3 class="text-sm font-bold text-slate-900">Evening shift takes over — same faces, same standard</h3>
                        <p class="mt-1.5 text-xs leading-relaxed text-slate-600 sm:text-sm">
                            No new unknowns. The evening lead is someone your team already knows, briefed on
                            the day's open items, and the supervisor does a walk-through with them before the
                            shift starts.
                        </p>
                    </div>
                </li>

                <li class="grid grid-cols-1 gap-3 sm:grid-cols-[120px_1fr] sm:gap-6">
                    <div class="flex items-center sm:justify-end sm:border-r sm:border-slate-200 sm:pr-6">
                        <span class="inline-flex items-center gap-1.5 rounded-full border border-red-100 bg-red-50 px-2.5 py-1 text-[11px] font-extrabold tabular-nums text-red-600 sm:border-0 sm:bg-transparent sm:p-0">
                            <i class="ri-moon-line text-xs sm:hidden"></i> 8:00 PM
                        </span>
                    </div>
                    <div class="rounded-2xl border border-slate-200/80 bg-white p-5 shadow-xs sm:p-6">
                        <h3 class="text-sm font-bold text-slate-900">Office floors are cleaned while the desks are empty</h3>
                        <p class="mt-1.5 text-xs leading-relaxed text-slate-600 sm:text-sm">
                            Machines scrubbers run on the open floors, dust is wiped from workstations and
                            partitions, glass and high-touch surfaces are sanitised. Nobody works around
                            wet floors or noise.
                        </p>
                    </div>
                </li>

                <li class="grid grid-cols-1 gap-3 sm:grid-cols-[120px_1fr] sm:gap-6">
                    <div class="flex items-center sm:justify-end sm:border-r sm:border-slate-200 sm:pr-6">
                        <span class="inline-flex items-center gap-1.5 rounded-full border border-red-100 bg-red-50 px-2.5 py-1 text-[11px] font-extrabold tabular-nums text-red-600 sm:border-0 sm:bg-transparent sm:p-0">
                            <i class="ri-alarm-warning-line text-xs sm:hidden"></i> Any Time
                        </span>
                    </div>
                    <div class="rounded-2xl border border-slate-200/80 bg-white p-5 shadow-xs sm:p-6">
                        <h3 class="text-sm font-bold text-slate-900">Leak, trip or breakdown? One number, under 15 minutes</h3>
                        <p class="mt-1.5 text-xs leading-relaxed text-slate-600 sm:text-sm">
                            You call a single number and describe the problem. The on-call engineer is
                            dispatched, the work gets logged, and you get a completion update. No ticket
                            chasing, no four vendors pointing at each other.
                        </p>
                    </div>
                </li>

            </ol>
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
                    Everything a working office needs, under one roof
                </h2>
                <p class="mt-3 text-sm leading-relaxed text-slate-600 sm:text-base">
                    Pick the services you need today. Add more later without changing vendors.
                </p>
            </div>

            <div class="mt-12 grid gap-5 sm:grid-cols-2 lg:grid-cols-3">

                <a
                    href="{{ route('services.show', ['slug' => 'office-sweeping-cleaning']) }}"
                    class="group flex flex-col rounded-2xl border border-slate-200/80 bg-white p-6 shadow-xs transition duration-300 hover:-translate-y-1 hover:border-[#12233F]/25 hover:shadow-lg"
                >
                    <span class="flex h-11 w-11 items-center justify-center rounded-xl bg-[#12233F]/10 text-[#12233F] transition-colors duration-300 group-hover:bg-[#12233F] group-hover:text-white">
                        <i class="ri-broom-line text-lg"></i>
                    </span>
                    <h3 class="mt-5 text-base font-bold text-slate-900 group-hover:text-red-700 transition">Housekeeping &amp; Floor Care</h3>
                    <p class="mt-2 flex-1 text-xs leading-relaxed text-slate-600 sm:text-sm">
                        Daily dust-mopping, cabin and workstation cleaning, carpet and hard-floor scrubbing,
                        glass and high-rise facade care.
                    </p>
                    <span class="mt-5 inline-flex items-center gap-1.5 text-xs font-semibold text-[#12233F]">
                        See scope
                        <i class="ri-arrow-right-line text-xs transition-transform duration-300 group-hover:translate-x-1"></i>
                    </span>
                </a>

                <a
                    href="{{ route('services.show', ['slug' => 'restroom-hygiene-sanitation']) }}"
                    class="group flex flex-col rounded-2xl border border-slate-200/80 bg-white p-6 shadow-xs transition duration-300 hover:-translate-y-1 hover:border-[#12233F]/25 hover:shadow-lg"
                >
                    <span class="flex h-11 w-11 items-center justify-center rounded-xl bg-[#12233F]/10 text-[#12233F] transition-colors duration-300 group-hover:bg-[#12233F] group-hover:text-white">
                        <i class="ri-drop-line text-lg"></i>
                    </span>
                    <h3 class="mt-5 text-base font-bold text-slate-900 group-hover:text-red-700 transition">Washroom Hygiene</h3>
                    <p class="mt-2 flex-1 text-xs leading-relaxed text-slate-600 sm:text-sm">
                        Scheduled re-cleaning through the day, consumable refills, odour control, and a QR
                        checkpoint at every door so the log is never guesswork.
                    </p>
                    <span class="mt-5 inline-flex items-center gap-1.5 text-xs font-semibold text-[#12233F]">
                        See scope
                        <i class="ri-arrow-right-line text-xs transition-transform duration-300 group-hover:translate-x-1"></i>
                    </span>
                </a>

                <a
                    href="{{ route('services.show', ['slug' => 'corporate-pantry-staffing']) }}"
                    class="group flex flex-col rounded-2xl border border-slate-200/80 bg-white p-6 shadow-xs transition duration-300 hover:-translate-y-1 hover:border-[#12233F]/25 hover:shadow-lg"
                >
                    <span class="flex h-11 w-11 items-center justify-center rounded-xl bg-[#12233F]/10 text-[#12233F] transition-colors duration-300 group-hover:bg-[#12233F] group-hover:text-white">
                        <i class="ri-cup-line text-lg"></i>
                    </span>
                    <h3 class="mt-5 text-base font-bold text-slate-900 group-hover:text-red-700 transition">Pantry &amp; Front Office</h3>
                    <p class="mt-2 flex-1 text-xs leading-relaxed text-slate-600 sm:text-sm">
                        Trained pantry attendants for beverage service, meeting and boardroom support, and
                        basic front-desk and visitor coordination.
                    </p>
                    <span class="mt-5 inline-flex items-center gap-1.5 text-xs font-semibold text-[#12233F]">
                        See scope
                        <i class="ri-arrow-right-line text-xs transition-transform duration-300 group-hover:translate-x-1"></i>
                    </span>
                </a>

                <a
                    href="{{ route('services.show', ['slug' => 'mep-hvac-maintenance']) }}"
                    class="group flex flex-col rounded-2xl border border-slate-200/80 bg-white p-6 shadow-xs transition duration-300 hover:-translate-y-1 hover:border-[#12233F]/25 hover:shadow-lg"
                >
                    <span class="flex h-11 w-11 items-center justify-center rounded-xl bg-red-600/10 text-red-600 transition-colors duration-300 group-hover:bg-red-600 group-hover:text-white">
                        <i class="ri-wrench-line text-lg"></i>
                    </span>
                    <h3 class="mt-5 text-base font-bold text-slate-900 group-hover:text-red-700 transition">AC, Electrical &amp; Repairs</h3>
                    <p class="mt-2 flex-1 text-xs leading-relaxed text-slate-600 sm:text-sm">
                        Air conditioning service and filter cycles, switchboards and earthing, plumbing and
                        sanitiser servicing, plus 24/7 breakdown response.
                    </p>
                    <span class="mt-5 inline-flex items-center gap-1.5 text-xs font-semibold text-[#12233F]">
                        See scope
                        <i class="ri-arrow-right-line text-xs transition-transform duration-300 group-hover:translate-x-1"></i>
                    </span>
                </a>

                <a
                    href="{{ route('services.show', ['slug' => 'deep-disinfection-sanitization']) }}"
                    class="group flex flex-col rounded-2xl border border-slate-200/80 bg-white p-6 shadow-xs transition duration-300 hover:-translate-y-1 hover:border-[#12233F]/25 hover:shadow-lg"
                >
                    <span class="flex h-11 w-11 items-center justify-center rounded-xl bg-[#12233F]/10 text-[#12233F] transition-colors duration-300 group-hover:bg-[#12233F] group-hover:text-white">
                        <i class="ri-shield-check-line text-lg"></i>
                    </span>
                    <h3 class="mt-5 text-base font-bold text-slate-900 group-hover:text-red-700 transition">Deep Sanitisation</h3>
                    <p class="mt-2 flex-1 text-xs leading-relaxed text-slate-600 sm:text-sm">
                        Periodic electrostatic and chemical sanitisation of cabins, conference rooms and
                        high-touch surfaces, scheduled around your working hours.
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
                        Walk the building with us. We will point out what is actually needed, what can wait,
                        and give you a fixed monthly cost for it.
                    </p>
                    <span class="mt-5 inline-flex items-center gap-1.5 text-xs font-semibold text-[#12233F]">
                        Browse all services
                        <i class="ri-arrow-right-line text-xs transition-transform duration-300 group-hover:translate-x-1"></i>
                    </span>
                </a>

            </div>
        </div>
    </section>

    {{-- How We Work (Operating Model) --}}
    <section
        x-data="scrollReveal(0)"
        :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'"
        class="bg-slate-50/50 py-14 transition-all duration-700 ease-out sm:py-20 lg:py-24"
    >
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            <div class="max-w-2xl mx-auto text-center">
                <span class="inline-flex items-center gap-1.5 rounded-full bg-[#12233F]/10 px-3.5 py-1 text-xs font-semibold text-[#12233F]">
                    <i class="ri-loop-right-line text-xs"></i> How We Work
                </span>
                <h2 class="mt-3 text-3xl font-extrabold tracking-tight text-slate-900 sm:text-4xl">
                    Five steps, the same way, every time
                </h2>
                <p class="mt-3 text-sm leading-relaxed text-slate-600 sm:text-base">
                    Nothing clever. Just a process that does not change when the person on shift changes.
                </p>
            </div>

            <div class="mt-12 grid gap-5 sm:grid-cols-2 lg:grid-cols-3">

                <div class="rounded-2xl border border-slate-200/80 bg-white p-6 shadow-xs">
                    <span class="inline-flex h-9 w-9 items-center justify-center rounded-full bg-[#12233F] text-white">
                        <i class="ri-user-add-line text-sm"></i>
                    </span>
                    <p class="mt-4 text-[11px] font-bold uppercase tracking-wider text-red-600">Step 01</p>
                    <h3 class="mt-1.5 text-base font-bold text-slate-900">We hire, we do not sub-contract</h3>
                    <p class="mt-2 text-xs leading-relaxed text-slate-600 sm:text-sm">
                        Our technicians are on our payroll with ESI, PF and insurance. If someone performs
                        work in your building, they are our employee and our responsibility.
                    </p>
                </div>

                <div class="rounded-2xl border border-slate-200/80 bg-white p-6 shadow-xs">
                    <span class="inline-flex h-9 w-9 items-center justify-center rounded-full bg-[#12233F] text-white">
                        <i class="ri-book-open-line text-sm"></i>
                    </span>
                    <p class="mt-4 text-[11px] font-bold uppercase tracking-wider text-red-600">Step 02</p>
                    <h3 class="mt-1.5 text-base font-bold text-slate-900">Trained before they are deployed</h3>
                    <p class="mt-2 text-xs leading-relaxed text-slate-600 sm:text-sm">
                        Chemical handling, machine operation, electrical safety, first aid and soft skills are
                        all covered in induction — and paid for by us.
                    </p>
                </div>

                <div class="rounded-2xl border border-slate-200/80 bg-white p-6 shadow-xs">
                    <span class="inline-flex h-9 w-9 items-center justify-center rounded-full bg-[#12233F] text-white">
                        <i class="ri-repeat-line text-sm"></i>
                    </span>
                    <p class="mt-4 text-[11px] font-bold uppercase tracking-wider text-red-600">Step 03</p>
                    <h3 class="mt-1.5 text-base font-bold text-slate-900">Same team stays on your site</h3>
                    <p class="mt-2 text-xs leading-relaxed text-slate-600 sm:text-sm">
                        Your floors, washrooms and machines are assigned to named people. They learn your
                        building, your timings and your expectations — and they keep turning up.
                    </p>
                </div>

                <div class="rounded-2xl border border-slate-200/80 bg-white p-6 shadow-xs">
                    <span class="inline-flex h-9 w-9 items-center justify-center rounded-full bg-red-600 text-white">
                        <i class="ri-qr-code-line text-sm"></i>
                    </span>
                    <p class="mt-4 text-[11px] font-bold uppercase tracking-wider text-red-600">Step 04</p>
                    <h3 class="mt-1.5 text-base font-bold text-slate-900">Every task is scanned and logged</h3>
                    <p class="mt-2 text-xs leading-relaxed text-slate-600 sm:text-sm">
                        Staff scan a code at each washroom, floor and machine. You get a dated report showing
                        what was done, by whom, and at what time.
                    </p>
                </div>

                <div class="rounded-2xl border border-slate-200/80 bg-white p-6 shadow-xs">
                    <span class="inline-flex h-9 w-9 items-center justify-center rounded-full bg-red-600 text-white">
                        <i class="ri-calendar-check-line text-sm"></i>
                    </span>
                    <p class="mt-4 text-[11px] font-bold uppercase tracking-wider text-red-600">Step 05</p>
                    <h3 class="mt-1.5 text-base font-bold text-slate-900">Monthly review, automatic credits</h3>
                    <p class="mt-2 text-xs leading-relaxed text-slate-600 sm:text-sm">
                        We sit down with your scorecard every month. Score below 99% and the credit is applied
                        to your next invoice — you never have to ask for it.
                    </p>
                </div>

                <div class="flex flex-col justify-center rounded-2xl border border-[#12233F]/15 bg-[#0B1A30] p-6 text-white">
                    <i class="ri-phone-line text-2xl text-red-400"></i>
                    <h3 class="mt-4 text-base font-bold text-white">Something broke right now?</h3>
                    <p class="mt-2 text-xs leading-relaxed text-slate-300">
                        Skip the queue. Call the dispatch line and an engineer heads to your site, day or night.
                    </p>
                    <a
                        href="tel:{{ setting('phone', '+1 (800) 492-8820') }}"
                        class="mt-5 inline-flex items-center gap-2 self-start rounded-full bg-red-500 px-5 py-2.5 text-xs font-semibold text-slate-950 transition hover:bg-red-400"
                    >
                        <span>{{ setting('phone', '+1 (800) 492-8820') }}</span>
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
                    <h2 class="mt-2 text-2xl font-bold tracking-tight text-slate-900">Care you can measure</h2>
                    <p class="mt-3 text-sm leading-relaxed text-slate-600">
                        To run offices, technology campuses and commercial buildings so well that the people
                        inside never have to think about cleaning, air conditioning or repairs — and so the
                        people managing them can prove exactly what was done, every single day.
                    </p>
                    <div class="mt-6 flex flex-wrap gap-2 border-t border-slate-100 pt-5 text-xs font-medium text-slate-700">
                        <span class="rounded-full border border-slate-200/80 bg-slate-50 px-3 py-1">Our own payroll</span>
                        <span class="rounded-full border border-slate-200/80 bg-slate-50 px-3 py-1">Digital daily reports</span>
                        <span class="rounded-full border border-slate-200/80 bg-slate-50 px-3 py-1">SLA credits</span>
                    </div>
                </div>

                <div class="relative rounded-3xl border border-slate-200/80 bg-white p-8 shadow-xs transition hover:border-[#12233F]/30 sm:p-10">
                    <span class="absolute top-6 right-6 inline-flex items-center justify-center rounded-full bg-red-600 px-2.5 py-1 text-[10px] font-bold text-white">02</span>
                    <span class="mb-6 flex h-11 w-11 items-center justify-center rounded-full bg-[#12233F] text-white">
                        <i class="ri-eye-line text-xl"></i>
                    </span>
                    <span class="text-xs font-semibold uppercase tracking-wider text-slate-500">Our Vision</span>
                    <h2 class="mt-2 text-2xl font-bold tracking-tight text-slate-900">Buildings that look after themselves</h2>
                    <p class="mt-3 text-sm leading-relaxed text-slate-600">
                        To grow into the facility partner every commercial building expects — where experienced
                        on-ground staff work hand in hand with digital monitoring, so problems are spotted
                        before anyone has to complain about them.
                    </p>
                    <div class="mt-6 flex flex-wrap gap-2 border-t border-slate-100 pt-5 text-xs font-medium text-slate-700">
                        <span class="rounded-full border border-slate-200/80 bg-slate-50 px-3 py-1">QR task tracking</span>
                        <span class="rounded-full border border-slate-200/80 bg-slate-50 px-3 py-1">Preventive maintenance</span>
                        <span class="rounded-full border border-slate-200/80 bg-slate-50 px-3 py-1">Ongoing training</span>
                    </div>
                </div>

            </div>
        </div>
    </section>

   

    {{-- The People On Your Site --}}
    <section
        x-data="scrollReveal(0)"
        :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'"
        class="border-b border-slate-100 bg-white py-14 transition-all duration-700 ease-out sm:py-20 lg:py-24"
    >
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            <div class="max-w-2xl mx-auto text-center">
                <span class="inline-flex items-center gap-1.5 rounded-full bg-[#12233F]/10 px-3.5 py-1 text-xs font-semibold text-[#12233F]">
                    <i class="ri-user-star-line text-xs"></i> Your Team
                </span>
                <h2 class="mt-3 text-3xl font-extrabold tracking-tight text-slate-900 sm:text-4xl">
                    Who you will actually meet
                </h2>
                <p class="mt-3 text-sm leading-relaxed text-slate-600 sm:text-base">
                    No call centres and no rotating unknowns. These four roles cover everything on your site.
                </p>
            </div>

            <div class="mt-12 grid gap-5 sm:grid-cols-2 lg:grid-cols-4">

                <div class="rounded-2xl border border-slate-200/80 bg-white p-6 shadow-xs transition hover:border-[#12233F]/30 hover:shadow-md">
                    <span class="flex h-12 w-12 items-center justify-center rounded-full bg-[#12233F] text-white">
                        <i class="ri-clipboard-check-line text-xl"></i>
                    </span>
                    <h3 class="mt-5 text-base font-bold text-slate-900">Site Supervisor</h3>
                    <p class="mt-1 text-[11px] font-semibold uppercase tracking-wider text-red-600">Your first point of call</p>
                    <p class="mt-3 text-xs leading-relaxed text-slate-600 sm:text-sm">
                        On site every day. Runs the morning checklist, spot-checks floors and washrooms,
                        records complaints, and is the person who answers when you call.
                    </p>
                </div>

                <div class="rounded-2xl border border-slate-200/80 bg-white p-6 shadow-xs transition hover:border-[#12233F]/30 hover:shadow-md">
                    <span class="flex h-12 w-12 items-center justify-center rounded-full bg-[#12233F]/10 text-[#12233F]">
                        <i class="ri-broom-line text-xl"></i>
                    </span>
                    <h3 class="mt-5 text-base font-bold text-slate-900">Housekeeping Lead</h3>
                    <p class="mt-1 text-[11px] font-semibold uppercase tracking-wider text-slate-500">Plans the shifts</p>
                    <p class="mt-3 text-xs leading-relaxed text-slate-600 sm:text-sm">
                        Assigns people to floors and washrooms, keeps the same faces on your site, and makes
                        sure night shift finishes what the day shift could not.
                    </p>
                </div>

                <div class="rounded-2xl border border-slate-200/80 bg-white p-6 shadow-xs transition hover:border-[#12233F]/30 hover:shadow-md">
                    <span class="flex h-12 w-12 items-center justify-center rounded-full bg-red-600 text-white">
                        <i class="ri-tools-line text-xl"></i>
                    </span>
                    <h3 class="mt-5 text-base font-bold text-slate-900">MEP Technician</h3>
                    <p class="mt-1 text-[11px] font-semibold uppercase tracking-wider text-red-600">24/7 breakdown response</p>
                    <p class="mt-3 text-xs leading-relaxed text-slate-600 sm:text-sm">
                        Air conditioning, electrical, plumbing and machines. On call through the night, on
                        site in under 15 minutes when something fails.
                    </p>
                </div>

                <div class="rounded-2xl border border-slate-200/80 bg-white p-6 shadow-xs transition hover:border-[#12233F]/30 hover:shadow-md">
                    <span class="flex h-12 w-12 items-center justify-center rounded-full bg-[#12233F]/10 text-[#12233F]">
                        <i class="ri-bar-chart-box-line text-xl"></i>
                    </span>
                    <h3 class="mt-5 text-base font-bold text-slate-900">Account Manager</h3>
                    <p class="mt-1 text-[11px] font-semibold uppercase tracking-wider text-slate-500">Your monthly review</p>
                    <p class="mt-3 text-xs leading-relaxed text-slate-600 sm:text-sm">
                        Owns the contract, brings the monthly scorecard, handles escalations, and applies SLA
                        credits automatically if we fall short.
                    </p>
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
            <div class="relative overflow-hidden rounded-3xl border border-slate-800 bg-[#0B1A30] px-6 py-14 text-center text-white sm:px-12 lg:py-16">
                <div class="pointer-events-none absolute -top-24 -right-24 h-80 w-80 rounded-full bg-red-600/15 blur-3xl"></div>
                <div class="pointer-events-none absolute -bottom-24 -left-24 h-80 w-80 rounded-full bg-[#12233F]/40 blur-3xl"></div>

                <div class="relative mx-auto max-w-2xl space-y-4">
                    <span class="inline-flex items-center gap-1.5 rounded-full border border-white/10 bg-white/10 px-3.5 py-1 text-xs font-semibold text-red-400">
                        <i class="ri-customer-service-2-line text-xs"></i> Direct Operations Desk
                    </span>
                    <h2 class="text-3xl font-extrabold tracking-tight text-white sm:text-4xl">
                        See what your building actually needs
                    </h2>
                    <p class="mx-auto max-w-lg text-sm leading-relaxed text-slate-400">
                        Book a free site walkthrough. We will walk the floors with you, point out what is
                        genuinely required, and give you a fixed monthly cost — no long contract, no hidden
                        charges.
                    </p>

                    <div class="flex flex-wrap items-center justify-center gap-3 pt-4">
                        <a
                            href="{{ route('contact') }}"
                            class="inline-flex items-center gap-2 rounded-full bg-red-500 px-7 py-3.5 text-xs font-semibold text-slate-950 shadow-sm transition hover:bg-red-400 active:scale-[0.98] sm:text-sm"
                        >
                            <span>Request Free Site Walkthrough</span>
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
