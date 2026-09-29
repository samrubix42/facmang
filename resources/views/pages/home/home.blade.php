<script>
    (function() {
        const registerHeroSlider = () => {
            if (typeof Alpine !== 'undefined') {
                if (!Alpine.data('heroSlider')) {
                    Alpine.data('heroSlider', () => ({
                        active: 0,
                        timer: null,
                        touchStartX: 0,
                        touchEndX: 0,
                        slides: [
                            {
                                title: 'To serve the excellence in facility and soft services',
                                buttonText: 'Our Services',
                                buttonLink: '{{ route("services") }}',
                                image: '{{ asset("images/estate_development.jpg") }}',
                                alt: 'Well maintained residential and commercial property managed by Real Facility Services'
                            },
                            {
                                title: 'Integrated facility management for homes and business',
                                buttonText: 'Who We Are',
                                buttonLink: '{{ route("about") }}',
                                image: '{{ asset("images/commercial_tower.jpg") }}',
                                alt: 'Commercial property and office facility operations'
                            },
                            {
                                title: 'Housekeeping, horticulture, technical and security care',
                                buttonText: 'Soft & Technical Services',
                                buttonLink: '{{ route("services") }}',
                                image: '{{ asset("images/office_sweeping_cleaning.jpg") }}',
                                alt: 'Housekeeping and cleaning services in progress'
                            },
                            {
                                title: 'Auditing, legal support and smooth transition consultancy',
                                buttonText: 'Consultancy',
                                buttonLink: '{{ route("services") }}',
                                image: '{{ asset("images/restroom_hygiene_sanitation.jpg") }}',
                                alt: 'Hygiene, documentation and compliance audit support'
                            },
                            {
                                title: '24x7 support for your residents, your people and your premises',
                                buttonText: 'Talk to RFS',
                                buttonLink: '{{ route("contact") }}',
                                image: '{{ asset("images/mep_hvac_maintenance.jpg") }}',
                                alt: 'Technical maintenance and engineering support team'
                            }
                        ],
                        init() {
                            this.startAutoplay();
                        },
                        startAutoplay() {
                            this.stopAutoplay();
                            this.timer = setInterval(() => {
                                this.next();
                            }, 6000);
                        },
                        stopAutoplay() {
                            if (this.timer) clearInterval(this.timer);
                        },
                        next() {
                            this.active = (this.active + 1) % this.slides.length;
                        },
                        prev() {
                            this.active = (this.active - 1 + this.slides.length) % this.slides.length;
                        },
                        goTo(index) {
                            this.active = index;
                            this.startAutoplay();
                        },
                        handleTouchStart(e) {
                            this.touchStartX = e.changedTouches[0].screenX;
                        },
                        handleTouchEnd(e) {
                            this.touchEndX = e.changedTouches[0].screenX;
                            if (this.touchStartX - this.touchEndX > 50) {
                                this.next();
                            } else if (this.touchEndX - this.touchStartX > 50) {
                                this.prev();
                            }
                        }
                    }));
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
            }
        };
        document.addEventListener('alpine:init', registerHeroSlider);
        if (window.Alpine) { registerHeroSlider(); }
    })();
</script>

<div class="bg-white text-slate-800 antialiased font-sans selection:bg-red-600 selection:text-white">
    
    {{-- Clean Architectural Hero Slider matching Reference Design --}}
    <section 
        x-data="heroSlider"
        @mouseenter="stopAutoplay()"
        @mouseleave="startAutoplay()"
        @keydown.arrow-right.window="next()"
        @keydown.arrow-left.window="prev()"
        @touchstart.passive="handleTouchStart($event)"
        @touchend.passive="handleTouchEnd($event)"
        class="group relative w-full h-[72vh] sm:h-[78vh] lg:h-[84vh] min-h-[540px] max-h-[820px] overflow-hidden bg-[#0B1A30] text-white select-none"
    >
        <!-- Full-Bleed Background Images with Smooth Crossfade -->
        <template x-for="(slide, index) in slides" :key="index">
            <div 
                x-show="active === index"
                x-transition:enter="transition-opacity duration-1000 ease-out"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave="transition-opacity duration-1000 ease-in absolute inset-0"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                class="absolute inset-0 overflow-hidden"
            >
                <img 
                    :src="slide.image" 
                    :alt="slide.alt"
                    class="h-full w-full object-cover object-center transform transition-transform duration-7000 ease-out"
                    :class="active === index ? 'scale-105' : 'scale-100'"
                />

                <!-- Subtle Clean Gradient Overlays for High Contrast Text & Retaining Image Radiance -->
                <div class="absolute inset-0 bg-gradient-to-t from-black/85 via-black/35 to-black/10"></div>
                <div class="absolute inset-0 bg-gradient-to-r from-black/80 via-black/30 to-transparent"></div>
            </div>
        </template>

        <!-- Slide Content Container (Lower-Left Placement Matching Reference) -->
        <div class="relative z-20 mx-auto max-w-7xl px-6 sm:px-10 lg:px-12 h-full flex flex-col justify-end pb-16 sm:pb-20 lg:pb-24">
            
            <div class="max-w-2xl sm:max-w-3xl">
                <template x-for="(slide, index) in slides" :key="index">
                    <div 
                        x-show="active === index"
                        x-transition:enter="transition-all duration-700 ease-out delay-150"
                        x-transition:enter-start="opacity-0 translate-y-4"
                        x-transition:enter-end="opacity-100 translate-y-0"
                        x-transition:leave="transition-all duration-300 ease-in absolute"
                        x-transition:leave-start="opacity-100 translate-y-0"
                        x-transition:leave-end="opacity-0 -translate-y-4"
                        class="space-y-0"
                    >
                        <!-- Large Editorial Heading in Montserrat font -->
                        <h1 
                            class="font-['Montserrat',sans-serif] text-3xl sm:text-5xl lg:text-6xl text-white font-normal leading-[1.16] tracking-tight drop-shadow-sm" 
                            x-text="slide.title"
                        ></h1>

                        <!-- Accent Horizontal Line with Highlight Bar Segment -->
                        <div class="relative w-full max-w-xl h-[1.5px] bg-white/25 my-5 sm:my-6 rounded-full overflow-hidden">
                            <div 
                                class="absolute top-0 bottom-0 bg-white rounded-full transition-all duration-700 ease-out"
                                :style="'left: ' + (active * 20) + '%; width: 20%; min-width: 55px;'"
                            ></div>
                        </div>

                        <!-- Clean White Pill Button -->
                        <div>
                            <a 
                                :href="slide.buttonLink"
                                class="font-['Montserrat',sans-serif] inline-flex items-center justify-center rounded-full bg-white px-7 py-3 text-xs sm:text-sm font-medium text-slate-900 shadow-md hover:bg-slate-100 hover:shadow-lg hover:scale-[1.02] active:scale-[0.98] transition-all duration-200 cursor-pointer"
                            >
                                <span x-text="slide.buttonText"></span>
                            </a>
                        </div>
                    </div>
                </template>
            </div>

        </div>

        <!-- Minimalist Edge Navigation Arrows (Move to the bottom row on phones so they never overlap the headline) -->
        <button 
            @click="prev()" 
            aria-label="Previous Slide"
            class="absolute left-3 sm:left-6 bottom-5 sm:bottom-auto top-auto sm:top-1/2 sm:-translate-y-1/2 z-30 flex h-10 w-10 sm:h-12 sm:w-12 items-center justify-center rounded-full bg-black/25 hover:bg-black/50 text-white/80 hover:text-white backdrop-blur-xs border border-white/10 hover:border-white/25 transition-all duration-200 active:scale-95 cursor-pointer opacity-70 sm:opacity-0 group-hover:opacity-100 focus:opacity-100"
        >
            <i class="ri-arrow-left-s-line text-xl sm:text-2xl"></i>
        </button>

        <button 
            @click="next()" 
            aria-label="Next Slide"
            class="absolute right-3 sm:right-6 bottom-5 sm:bottom-auto top-auto sm:top-1/2 sm:-translate-y-1/2 z-30 flex h-10 w-10 sm:h-12 sm:w-12 items-center justify-center rounded-full bg-black/25 hover:bg-black/50 text-white/80 hover:text-white backdrop-blur-xs border border-white/10 hover:border-white/25 transition-all duration-200 active:scale-95 cursor-pointer opacity-70 sm:opacity-0 group-hover:opacity-100 focus:opacity-100"
        >
            <i class="ri-arrow-right-s-line text-xl sm:text-2xl"></i>
        </button>

        <!-- Bottom Centered Pagination Dots (Exact design from user screenshot) -->
        <div class="absolute bottom-6 sm:bottom-7 left-1/2 -translate-x-1/2 z-30 flex items-center justify-center gap-2.5 sm:gap-3">
            <template x-for="(slide, index) in slides" :key="index">
                <button 
                    @click="goTo(index)"
                    :aria-label="'Go to slide ' + (index + 1)"
                    class="group relative flex items-center justify-center p-1.5 focus:outline-none cursor-pointer"
                >
                    <span 
                        class="block rounded-full transition-all duration-300"
                        :class="active === index 
                            ? 'h-2 sm:h-2.5 w-2 sm:w-2.5 bg-white ring-2 ring-white ring-offset-2 ring-offset-black/50 scale-110 shadow-sm' 
                            : 'h-1.5 sm:h-2 w-1.5 sm:w-2 bg-white/40 group-hover:bg-white/75 group-hover:scale-110'"
                    ></span>
                </button>
            </template>
        </div>

    </section>

    {{-- Who We Are (Image Left / Content Right) --}}
    <section 
        id="who-we-are"
        x-data="scrollReveal(0)"
        :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8 pointer-events-none'"
        class="scroll-mt-20 border-b border-slate-100 bg-white py-14 transition-all duration-700 ease-out sm:py-20 lg:py-24"
    >
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid items-center gap-12 lg:grid-cols-2 lg:gap-16">

                <!-- Left Image (Clean, No Overlay Or Badge) -->
                <div class="order-1">
                    <img
                        src="{{ asset('images/hero_facility.jpg') }}"
                        alt="Real Facility Services team managing a residential and commercial property"
                        loading="lazy"
                        decoding="async"
                        class="h-[280px] w-full rounded-2xl object-cover sm:h-[380px] lg:h-[520px]"
                    />
                </div>

                <!-- Right Content -->
                <div class="order-2">
                    <span class="inline-flex items-center gap-1.5 rounded-full bg-[#12233F]/10 px-3.5 py-1 text-xs font-semibold text-[#12233F]">
                        <i class="ri-team-line text-xs"></i> Who We Are
                    </span>

                    <h2 class="mt-4 text-3xl font-extrabold leading-[1.15] tracking-tight text-slate-900 sm:text-4xl">
                        Real Facility Services. To serve the excellence.
                    </h2>

                    <p class="mt-4 text-sm leading-relaxed text-slate-600 sm:text-base">
                        Real Facility Services (RFS) has been delivering facility and soft services since 2022.
                        We manage and maintain residential societies and commercial properties, and our goal is
                        simple: provide quality services that satisfy the challenging requirements of our customers
                        and clients.
                    </p>

                    <p class="mt-4 text-sm leading-relaxed text-slate-600 sm:text-base">
                        Our strength is a strong management team of people with relevant technical and professional
                        experience, supported by expert, well experienced technical staff and trained workers who
                        aspire to deliver complete facility services. With more than three years of experience in
                        managing residential societies, our integrated facility management covers housekeeping,
                        horticulture, technical and security maintenance — supported by auditing, legal support and
                        consultancy for smooth transition and operation, on a 24x7 support system.
                    </p>


                    <ul class="mt-7 grid gap-3 sm:grid-cols-2">
                        <li class="flex items-start gap-2.5 text-sm text-slate-700">
                            <i class="ri-checkbox-circle-fill mt-0.5 text-sm text-red-600"></i>
                            <span>Residential &amp; commercial management</span>
                        </li>
                        <li class="flex items-start gap-2.5 text-sm text-slate-700">
                            <i class="ri-checkbox-circle-fill mt-0.5 text-sm text-red-600"></i>
                            <span>Housekeeping &amp; horticulture</span>
                        </li>
                        <li class="flex items-start gap-2.5 text-sm text-slate-700">
                            <i class="ri-checkbox-circle-fill mt-0.5 text-sm text-red-600"></i>
                            <span>Technical &amp; security maintenance</span>
                        </li>
                        <li class="flex items-start gap-2.5 text-sm text-slate-700">
                            <i class="ri-checkbox-circle-fill mt-0.5 text-sm text-red-600"></i>
                            <span>Auditing &amp; legal support</span>
                        </li>
                    </ul>

                    <div class="mt-9 flex flex-wrap items-center gap-3">
                        <a
                            href="{{ route('about') }}"
                            class="inline-flex items-center gap-2 rounded-full bg-[#12233F] px-6 py-3 text-xs font-semibold text-white transition hover:bg-[#0B1A30] active:scale-[0.98] sm:text-sm"
                        >
                            <span>More About Us</span>
                            <i class="ri-arrow-right-line text-sm"></i>
                        </a>
                        <a
                            href="{{ route('contact') }}"
                            class="inline-flex items-center gap-2 rounded-full border border-slate-200 bg-white px-6 py-3 text-xs font-medium text-slate-700 transition hover:border-[#12233F]/40 hover:text-slate-900 active:scale-[0.98] sm:text-sm"
                        >
                            <span>Talk to Us</span>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- Why Choose Us (Animated Counters + Reasons) --}}
    <section 
        id="why-us"
        x-data="scrollReveal(0)"
        :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8 pointer-events-none'"
        class="relative scroll-mt-20 overflow-hidden border-y border-slate-100 bg-slate-50/50 py-14 transition-all duration-700 ease-out sm:py-20 lg:py-24"
    >
        <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="max-w-2xl mx-auto text-center">
                <span class="inline-flex items-center gap-1.5 rounded-full bg-[#12233F]/10 px-3.5 py-1 text-xs font-semibold text-[#12233F]">
                    <i class="ri-shield-star-line text-xs"></i> Why Choose Us
                </span>
                <h2 class="mt-4 text-3xl font-extrabold leading-[1.15] tracking-tight text-slate-900 sm:text-4xl">
                    Why Our Clients Choose RFS
                </h2>
                <p class="mt-3 text-sm leading-relaxed text-slate-600 sm:text-base">
                    A complete team, a proven process and support that never switches off.
                </p>
            </div>

            <!-- Animated Counters -->
            <div class="relative mt-12 overflow-hidden rounded-3xl bg-[#0B1A30] px-6 py-10 sm:px-10 sm:py-12">
                <div class="relative grid grid-cols-2 gap-y-9 lg:grid-cols-4">
                    <div class="text-center lg:px-6">
                        <p class="text-4xl font-extrabold tracking-tight text-white tabular-nums sm:text-5xl" x-data="countUp(3, 0)">
                            <span x-text="display">0</span>+
                        </p>
                        <p class="mt-2 text-[11px] font-medium text-slate-400">Years Managing Residential Societies</p>
                    </div>

                    <div class="text-center lg:border-l lg:border-white/10 lg:px-6">
                        <p class="text-4xl font-extrabold tracking-tight text-white tabular-nums sm:text-5xl" x-data="countUp(24, 0)">
                            <span x-text="display">0</span>x7
                        </p>
                        <p class="mt-2 text-[11px] font-medium text-slate-400">Support &amp; Emergency Desk</p>
                    </div>

                    <div class="text-center lg:border-l lg:border-white/10 lg:px-6">
                        <p class="text-4xl font-extrabold tracking-tight text-white tabular-nums sm:text-5xl" x-data="countUp(100, 0)">
                            <span x-text="display">0</span>%
                        </p>
                        <p class="mt-2 text-[11px] font-medium text-slate-400">Trained In-House Workforce</p>
                    </div>

                    <div class="text-center lg:border-l lg:border-white/10 lg:px-6">
                        <p class="text-4xl font-extrabold tracking-tight text-red-400 tabular-nums sm:text-5xl" x-data="countUp(6, 0)">
                            <span x-text="display">0</span>+
                        </p>
                        <p class="mt-2 text-[11px] font-medium text-slate-400">Service Lines Under One Contract</p>
                    </div>
                </div>
            </div>

            <!-- Reasons Grid -->
            <div class="mt-8 grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
                <div 
                    x-data="scrollReveal(0)"
                    :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-6'"
                    class="group relative overflow-hidden rounded-2xl border border-slate-200/80 bg-white p-6 shadow-xs transition duration-300 hover:-translate-y-1 hover:border-[#12233F]/25 hover:shadow-lg sm:p-7"
                >
                    <span class="absolute inset-x-0 top-0 h-[3px] origin-left scale-x-0 bg-red-600 transition-transform duration-300 group-hover:scale-x-100"></span>
                    <span class="flex h-11 w-11 items-center justify-center rounded-xl bg-[#12233F]/10 text-[#12233F] transition-colors duration-300 group-hover:bg-[#12233F] group-hover:text-white">
                        <i class="ri-user-heart-line text-lg"></i>
                    </span>
                    <h3 class="mt-5 text-base font-bold text-slate-900">A Strong Management Team</h3>
                    <p class="mt-2 text-xs leading-relaxed text-slate-600 sm:text-sm">
                        Our managers bring relevant technical and professional experience, and they stay accountable
                        for the site they run instead of being reassigned every quarter.
                    </p>
                </div>

                <div 
                    x-data="scrollReveal(60)"
                    :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-6'"
                    class="group relative overflow-hidden rounded-2xl border border-slate-200/80 bg-white p-6 shadow-xs transition duration-300 hover:-translate-y-1 hover:border-[#12233F]/25 hover:shadow-lg sm:p-7"
                >
                    <span class="absolute inset-x-0 top-0 h-[3px] origin-left scale-x-0 bg-red-600 transition-transform duration-300 group-hover:scale-x-100"></span>
                    <span class="flex h-11 w-11 items-center justify-center rounded-xl bg-[#12233F]/10 text-[#12233F] transition-colors duration-300 group-hover:bg-[#12233F] group-hover:text-white">
                        <i class="ri-links-line text-lg"></i>
                    </span>
                    <h3 class="mt-5 text-base font-bold text-slate-900">One Contract, One Point of Contact</h3>
                    <p class="mt-2 text-xs leading-relaxed text-slate-600 sm:text-sm">
                        Housekeeping, horticulture, technical and security maintenance sit on a single agreement.
                        If something is missed, you call one number — not four vendors pointing at each other.
                    </p>
                </div>

                <div 
                    x-data="scrollReveal(120)"
                    :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-6'"
                    class="group relative overflow-hidden rounded-2xl border border-slate-200/80 bg-white p-6 shadow-xs transition duration-300 hover:-translate-y-1 hover:border-[#12233F]/25 hover:shadow-lg sm:p-7"
                >
                    <span class="absolute inset-x-0 top-0 h-[3px] origin-left scale-x-0 bg-red-600 transition-transform duration-300 group-hover:scale-x-100"></span>
                    <span class="flex h-11 w-11 items-center justify-center rounded-xl bg-[#12233F]/10 text-[#12233F] transition-colors duration-300 group-hover:bg-[#12233F] group-hover:text-white">
                        <i class="ri-community-line text-lg"></i>
                    </span>
                    <h3 class="mt-5 text-base font-bold text-slate-900">3+ Years With Residential Societies</h3>
                    <p class="mt-2 text-xs leading-relaxed text-slate-600 sm:text-sm">
                        Society management is our core strength. We understand committee expectations, resident
                        sensitivities and the daily rhythm of a residential community.
                    </p>
                </div>

                <div 
                    x-data="scrollReveal(0)"
                    :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-6'"
                    class="group relative overflow-hidden rounded-2xl border border-slate-200/80 bg-white p-6 shadow-xs transition duration-300 hover:-translate-y-1 hover:border-[#12233F]/25 hover:shadow-lg sm:p-7"
                >
                    <span class="absolute inset-x-0 top-0 h-[3px] origin-left scale-x-0 bg-red-600 transition-transform duration-300 group-hover:scale-x-100"></span>
                    <span class="flex h-11 w-11 items-center justify-center rounded-xl bg-[#12233F]/10 text-[#12233F] transition-colors duration-300 group-hover:bg-[#12233F] group-hover:text-white">
                        <i class="ri-tools-line text-lg"></i>
                    </span>
                    <h3 class="mt-5 text-base font-bold text-slate-900">Expert Technical Staff &amp; Trained Workers</h3>
                    <p class="mt-2 text-xs leading-relaxed text-slate-600 sm:text-sm">
                        Technical teams are hired for their expertise and trained on your site, so the same
                        experienced people keep coming back shift after shift.
                    </p>
                </div>

                <div 
                    x-data="scrollReveal(60)"
                    :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-6'"
                    class="group relative overflow-hidden rounded-2xl border border-slate-200/80 bg-white p-6 shadow-xs transition duration-300 hover:-translate-y-1 hover:border-[#12233F]/25 hover:shadow-lg sm:p-7"
                >
                    <span class="absolute inset-x-0 top-0 h-[3px] origin-left scale-x-0 bg-red-600 transition-transform duration-300 group-hover:scale-x-100"></span>
                    <span class="flex h-11 w-11 items-center justify-center rounded-xl bg-[#12233F]/10 text-[#12233F] transition-colors duration-300 group-hover:bg-[#12233F] group-hover:text-white">
                        <i class="ri-file-list-3-line text-lg"></i>
                    </span>
                    <h3 class="mt-5 text-base font-bold text-slate-900">Auditing &amp; Legal Support</h3>
                    <p class="mt-2 text-xs leading-relaxed text-slate-600 sm:text-sm">
                        Monthly facility audits, documented findings and legal support for contracts, compliance and
                        vendor matters — so your committee always has evidence of what has been done.
                    </p>
                </div>

                <div 
                    x-data="scrollReveal(120)"
                    :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-6'"
                    class="group relative overflow-hidden rounded-2xl border border-slate-200/80 bg-white p-6 shadow-xs transition duration-300 hover:-translate-y-1 hover:border-[#12233F]/25 hover:shadow-lg sm:p-7"
                >
                    <span class="absolute inset-x-0 top-0 h-[3px] origin-left scale-x-0 bg-red-600 transition-transform duration-300 group-hover:scale-x-100"></span>
                    <span class="absolute inset-x-0 top-0 h-[3px] origin-left scale-x-0 bg-red-600 transition-transform duration-300 group-hover:scale-x-100"></span>
                    <span class="flex h-11 w-11 items-center justify-center rounded-xl bg-red-600/10 text-red-600 transition-colors duration-300 group-hover:bg-red-600 group-hover:text-white">
                        <i class="ri-flashlight-line text-lg"></i>
                    </span>
                    <h3 class="mt-5 text-base font-bold text-slate-900">24x7 Support System</h3>
                    <p class="mt-2 text-xs leading-relaxed text-slate-600 sm:text-sm">
                        Leaking tap, tripped power or a gate failure at 2am? Our support desk and on-call
                        technicians respond every hour of every day.
                    </p>
                </div>
            </div>

            <div class="mt-12 text-center">
                <a
                    href="{{ route('contact') }}"
                    class="inline-flex items-center gap-2 rounded-full bg-[#12233F] px-8 py-3.5 text-xs font-semibold text-white shadow-sm transition hover:bg-[#0B1A30] active:scale-[0.98] sm:text-sm"
                >
                    <span>Request a Free Facility Walkthrough</span>
                    <i class="ri-arrow-right-line text-sm"></i>
                </a>
            </div>
        </div>
    </section>

    {{-- Clean Modern Services Section --}}
    <section 
        id="services" 
        x-data="scrollReveal(0)"
        :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8 pointer-events-none'"
        class="scroll-mt-20 py-14 sm:py-20 lg:py-24 transition-all duration-700 ease-out"
    >
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <!-- Minimal Clean Section Header -->
            <div class="max-w-xl mx-auto text-center">
                <span class="inline-flex items-center gap-1.5 rounded-full bg-[#12233F]/10 px-3.5 py-1 text-xs font-semibold text-[#12233F]">
                    <i class="ri-service-line text-xs"></i> Services
                </span>
                <h2 class="mt-3 text-3xl font-extrabold tracking-tight text-slate-900 sm:text-4xl">
                    Facility &amp; Soft Services Portfolio
                </h2>
                <p class="mt-3 text-sm text-slate-600 leading-relaxed">
                    One integrated team for mechanized operations, washroom care, deep cleaning, landscaping and
                    pest management across homes, workplaces and factories.
                </p>
            </div>

            <!-- Service Cards Grid -->
            <div class="mt-14 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                <!-- Service 1 -->
                <div 
                    x-data="scrollReveal(50)"
                    :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-6'"
                    class="group flex flex-col rounded-3xl border border-slate-200/80 bg-white overflow-hidden shadow-xs hover:shadow-xl hover:border-[#12233F]/30 transition-all duration-300"
                >
                    <div class="relative h-48 overflow-hidden bg-slate-100">
                        <img
                            src="{{ asset('images/office_sweeping_cleaning.jpg') }}"
                            alt="Mechanized cleaning operations with auto scrubbers"
                            class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105"
                        />
                        <span class="absolute top-4 left-4 rounded-full bg-white/90 backdrop-blur-md px-3 py-1 text-[11px] font-semibold text-slate-800">
                            Mechanized
                        </span>
                    </div>
                    <div class="p-6 flex flex-1 flex-col justify-between">
                        <div>
                            <h3 class="text-lg font-bold text-slate-900 group-hover:text-red-700 transition">
                                Mechanized Cleaning Operations
                            </h3>
                            <p class="mt-2 text-xs sm:text-sm text-slate-600 leading-relaxed">
                                Latest scrubbers, jet washers and pressure systems tied up with reputed equipment
                                companies, run through a smart, checklist-driven cleaning process.
                            </p>
                        </div>
                        <div class="mt-6 pt-4 border-t border-slate-100 flex items-center justify-between">
                            <span class="text-xs font-medium text-slate-400">Daily &amp; Weekly Machine Cycles</span>
                            <a 
                                href="{{ route('services.show', ['slug' => 'mechanized-operations']) }}" 
                                class="inline-flex items-center gap-1.5 rounded-full bg-[#12233F] group-hover:bg-red-600 px-4 py-2 text-xs font-medium text-white transition-colors"
                            >
                                <span>View Scope</span>
                                <i class="ri-arrow-right-line text-xs"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Service 2 -->
                <div 
                    x-data="scrollReveal(100)"
                    :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-6'"
                    class="group flex flex-col rounded-3xl border border-slate-200/80 bg-white overflow-hidden shadow-xs hover:shadow-xl hover:border-[#12233F]/30 transition-all duration-300"
                >
                    <div class="relative h-48 overflow-hidden bg-slate-100">
                        <img
                            src="{{ asset('images/restroom_hygiene_sanitation.jpg') }}"
                            alt="Washroom sanitation and hygiene services"
                            class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105"
                        />
                        <span class="absolute top-4 left-4 rounded-full bg-white/90 backdrop-blur-md px-3 py-1 text-[11px] font-semibold text-slate-800">
                            Washroom
                        </span>
                    </div>
                    <div class="p-6 flex flex-1 flex-col justify-between">
                        <div>
                            <h3 class="text-lg font-bold text-slate-900 group-hover:text-red-700 transition">
                                Washroom Services
                            </h3>
                            <p class="mt-2 text-xs sm:text-sm text-slate-600 leading-relaxed">
                                Four to eight scheduled rounds a day with touchpoint disinfection, consumable
                                replenishment, odour control at source and signed hygiene checklists.
                            </p>
                        </div>
                        <div class="mt-6 pt-4 border-t border-slate-100 flex items-center justify-between">
                            <span class="text-xs font-medium text-slate-400">4 to 8 Rounds Daily</span>
                            <a 
                                href="{{ route('services.show', ['slug' => 'washroom-services']) }}" 
                                class="inline-flex items-center gap-1.5 rounded-full bg-[#12233F] group-hover:bg-red-600 px-4 py-2 text-xs font-medium text-white transition-colors"
                            >
                                <span>View Scope</span>
                                <i class="ri-arrow-right-line text-xs"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Service 3 -->
                <div 
                    x-data="scrollReveal(150)"
                    :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-6'"
                    class="group flex flex-col rounded-3xl border border-slate-200/80 bg-white overflow-hidden shadow-xs hover:shadow-xl hover:border-[#12233F]/30 transition-all duration-300"
                >
                    <div class="relative h-48 overflow-hidden bg-slate-100">
                        <img
                            src="{{ asset('images/office_boy_pantry_service.jpg') }}"
                            alt="Deep cleaning of interiors and common areas"
                            class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105"
                        />
                        <span class="absolute top-4 left-4 rounded-full bg-white/90 backdrop-blur-md px-3 py-1 text-[11px] font-semibold text-slate-800">
                            Deep Cleaning
                        </span>
                    </div>
                    <div class="p-6 flex flex-1 flex-col justify-between">
                        <div>
                            <h3 class="text-lg font-bold text-slate-900 group-hover:text-red-700 transition">
                                Deep Cleaning Services
                            </h3>
                            <p class="mt-2 text-xs sm:text-sm text-slate-600 leading-relaxed">
                                High-reach, high-pressure, carpet extraction and kitchen exhaust work, run on a fixed
                                cycle with before-and-after documentation.
                            </p>
                        </div>
                        <div class="mt-6 pt-4 border-t border-slate-100 flex items-center justify-between">
                            <span class="text-xs font-medium text-slate-400">Monthly &amp; Quarterly Cycles</span>
                            <a 
                                href="{{ route('services.show', ['slug' => 'deep-cleaning-services']) }}" 
                                class="inline-flex items-center gap-1.5 rounded-full bg-[#12233F] group-hover:bg-red-600 px-4 py-2 text-xs font-medium text-white transition-colors"
                            >
                                <span>View Scope</span>
                                <i class="ri-arrow-right-line text-xs"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Service 4 -->
                <div 
                    x-data="scrollReveal(200)"
                    :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-6'"
                    class="group flex flex-col rounded-3xl border border-slate-200/80 bg-white overflow-hidden shadow-xs hover:shadow-xl hover:border-[#12233F]/30 transition-all duration-300"
                >
                    <div class="relative h-48 overflow-hidden bg-slate-100">
                        <img
                            src="{{ asset('images/hero_facility.jpg') }}"
                            alt="Pest management and mosquito control"
                            class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105"
                        />
                        <span class="absolute top-4 left-4 rounded-full bg-white/90 backdrop-blur-md px-3 py-1 text-[11px] font-semibold text-slate-800">
                            Pest Management
                        </span>
                    </div>
                    <div class="p-6 flex flex-1 flex-col justify-between">
                        <div>
                            <h3 class="text-lg font-bold text-slate-900 group-hover:text-red-700 transition">
                                Pest Management
                            </h3>
                            <p class="mt-2 text-xs sm:text-sm text-slate-600 leading-relaxed">
                                Mosquito, termite, cockroach and rodent control, starting with a proper site survey
                                and a treatment register for every visit.
                            </p>
                        </div>
                        <div class="mt-6 pt-4 border-t border-slate-100 flex items-center justify-between">
                            <span class="text-xs font-medium text-slate-400">Monthly to Quarterly</span>
                            <a 
                                href="{{ route('services.show', ['slug' => 'pest-management']) }}" 
                                class="inline-flex items-center gap-1.5 rounded-full bg-[#12233F] group-hover:bg-red-600 px-4 py-2 text-xs font-medium text-white transition-colors"
                            >
                                <span>View Scope</span>
                                <i class="ri-arrow-right-line text-xs"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Service 5: Landscaping -->
                <div 
                    x-data="scrollReveal(250)"
                    :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-6'"
                    class="group flex flex-col rounded-3xl border border-slate-200/80 bg-white overflow-hidden shadow-xs hover:shadow-xl hover:border-[#12233F]/30 transition-all duration-300"
                >
                    <div class="relative h-48 overflow-hidden bg-slate-100">
                        <img
                            src="{{ asset('images/estate_development.jpg') }}"
                            alt="Landscaping, lawns and garden maintenance"
                            class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105"
                        />
                        <span class="absolute top-4 left-4 rounded-full bg-white/90 backdrop-blur-md px-3 py-1 text-[11px] font-semibold text-slate-800">
                            Landscaping
                        </span>
                    </div>
                    <div class="p-6 flex flex-1 flex-col justify-between">
                        <div>
                            <h3 class="text-lg font-bold text-slate-900 group-hover:text-red-700 transition">
                                Landscaping &amp; Horticulture
                            </h3>
                            <p class="mt-2 text-xs sm:text-sm text-slate-600 leading-relaxed">
                                Lawn care, seasonal planting, irrigation management, tree pruning and waste-free
                                upkeep of gardens, podiums and terraces.
                            </p>
                        </div>
                        <div class="mt-6 pt-4 border-t border-slate-100 flex items-center justify-between">
                            <span class="text-xs font-medium text-slate-400">Daily &amp; Weekly Cycles</span>
                            <a 
                                href="{{ route('services.show', ['slug' => 'landscaping']) }}" 
                                class="inline-flex items-center gap-1.5 rounded-full bg-[#12233F] group-hover:bg-red-600 px-4 py-2 text-xs font-medium text-white transition-colors"
                            >
                                <span>View Scope</span>
                                <i class="ri-arrow-right-line text-xs"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Service 6: Office Space & Floor Management -->
                <div 
                    x-data="scrollReveal(300)"
                    :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-6'"
                    class="group flex flex-col rounded-3xl border border-slate-200/80 bg-white overflow-hidden shadow-xs hover:shadow-xl hover:border-[#12233F]/30 transition-all duration-300"
                >
                    <div class="relative h-48 overflow-hidden bg-slate-100">
                        <img
                            src="{{ asset('images/commercial_tower.jpg') }}"
                            alt="Office space and floor management services"
                            class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105"
                        />
                        <span class="absolute top-4 left-4 rounded-full bg-white/90 backdrop-blur-md px-3 py-1 text-[11px] font-semibold text-slate-800">
                            Workplace
                        </span>
                    </div>
                    <div class="p-6 flex flex-1 flex-col justify-between">
                        <div>
                            <h3 class="text-lg font-bold text-slate-900 group-hover:text-red-700 transition">
                                Office Space &amp; Floor Management
                            </h3>
                            <p class="mt-2 text-xs sm:text-sm text-slate-600 leading-relaxed">
                                Floor-wise rosters for cabins, workstations, conference rooms and pantries, with
                                night operations and verified supervisor checks.
                            </p>
                        </div>
                        <div class="mt-6 pt-4 border-t border-slate-100 flex items-center justify-between">
                            <span class="text-xs font-medium text-slate-400">Dedicated Floor Teams</span>
                            <a 
                                href="{{ route('services.show', ['slug' => 'office-space-management']) }}" 
                                class="inline-flex items-center gap-1.5 rounded-full bg-[#12233F] group-hover:bg-red-600 px-4 py-2 text-xs font-medium text-white transition-colors"
                            >
                                <span>View Scope</span>
                                <i class="ri-arrow-right-line text-xs"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Sector Focused Services --}}
            <div class="mt-6 grid gap-6 lg:grid-cols-2">
                <!-- Service 7: Residential Society -->
                <div 
                    x-data="scrollReveal(0)"
                    :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-6'"
                    class="group flex flex-col sm:flex-row rounded-3xl border border-slate-200/80 bg-white overflow-hidden shadow-xs hover:shadow-xl hover:border-[#12233F]/30 transition-all duration-300"
                >
                    <div class="relative h-48 sm:h-auto sm:w-1/2 overflow-hidden bg-slate-100">
                        <img
                            src="{{ asset('images/estate_development.jpg') }}"
                            alt="Residential society facility management"
                            class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105"
                        />
                        <span class="absolute top-4 left-4 rounded-full bg-white/90 backdrop-blur-md px-3 py-1 text-[11px] font-semibold text-slate-800">
                            Residential
                        </span>
                    </div>
                    <div class="p-6 sm:p-8 flex flex-1 flex-col justify-between sm:w-1/2">
                        <div>
                            <h3 class="text-lg sm:text-xl font-bold text-slate-900 group-hover:text-red-700 transition">
                                Residential Society Management
                            </h3>
                            <p class="mt-2 text-xs sm:text-sm text-slate-600 leading-relaxed">
                                Housekeeping staff, horticulture, security coordination, technical upkeep, amenity
                                care and a monthly audit report for your committee.
                            </p>
                        </div>
                        <div class="mt-6 pt-4 border-t border-slate-100 flex items-center justify-between">
                            <span class="text-xs font-medium text-[#12233F]">3+ Years Of Experience</span>
                            <a 
                                href="{{ route('services.show', ['slug' => 'residential-society-management']) }}" 
                                class="inline-flex items-center gap-1.5 rounded-full bg-[#12233F] group-hover:bg-red-600 px-5 py-2 text-xs font-medium text-white transition-colors"
                            >
                                <span>View Scope</span>
                                <i class="ri-arrow-right-line text-xs"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Service 8: Manufacturing Sector -->
                <div 
                    x-data="scrollReveal(60)"
                    :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-6'"
                    class="group flex flex-col sm:flex-row rounded-3xl border border-slate-200/80 bg-white overflow-hidden shadow-xs hover:shadow-xl hover:border-[#12233F]/30 transition-all duration-300"
                >
                    <div class="relative h-48 sm:h-auto sm:w-1/2 overflow-hidden bg-slate-100">
                        <img
                            src="{{ asset('images/mep_hvac_maintenance.jpg') }}"
                            alt="Manufacturing plant facility services"
                            class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105"
                        />
                        <span class="absolute top-4 left-4 rounded-full bg-white/90 backdrop-blur-md px-3 py-1 text-[11px] font-semibold text-slate-800">
                            Industrial
                        </span>
                    </div>
                    <div class="p-6 sm:p-8 flex flex-1 flex-col justify-between sm:w-1/2">
                        <div>
                            <h3 class="text-lg sm:text-xl font-bold text-slate-900 group-hover:text-red-700 transition">
                                Manufacturing Sector Services
                            </h3>
                            <p class="mt-2 text-xs sm:text-sm text-slate-600 leading-relaxed">
                                Shop floor, machine bay, spill response, dust and waste control, canteen and change
                                room hygiene on shift-aligned rosters.
                            </p>
                        </div>
                        <div class="mt-6 pt-4 border-t border-slate-100 flex items-center justify-between">
                            <span class="text-xs font-medium text-[#12233F]">15-Min Spill Response</span>
                            <a 
                                href="{{ route('services.show', ['slug' => 'manufacturing-sector-services']) }}" 
                                class="inline-flex items-center gap-1.5 rounded-full bg-[#12233F] group-hover:bg-red-600 px-5 py-2 text-xs font-medium text-white transition-colors"
                            >
                                <span>View Scope</span>
                                <i class="ri-arrow-right-line text-xs"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Included With Every RFS Agreement --}}
            <div class="mt-6 overflow-hidden rounded-3xl border border-slate-200/80 bg-slate-50/60 p-6 sm:p-8">
                <h3 class="text-center text-xs font-bold uppercase tracking-[0.18em] text-slate-500">
                    Included with every RFS agreement
                </h3>

                <div class="mt-6 grid gap-4 sm:grid-cols-2 lg:grid-cols-5">
                    <div class="flex items-center gap-3 rounded-2xl border border-slate-200/80 bg-white px-4 py-3.5">
                        <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-amber-50 text-amber-600">
                            <i class="ri-clipboard-line"></i>
                        </span>
                        <span class="text-xs font-semibold leading-snug text-slate-800">Facility Auditing</span>
                    </div>
                    <div class="flex items-center gap-3 rounded-2xl border border-slate-200/80 bg-white px-4 py-3.5">
                        <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-sky-50 text-sky-600">
                            <i class="ri-scales-3-line"></i>
                        </span>
                        <span class="text-xs font-semibold leading-snug text-slate-800">Legal &amp; Compliance Support</span>
                    </div>
                    <div class="flex items-center gap-3 rounded-2xl border border-slate-200/80 bg-white px-4 py-3.5">
                        <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-indigo-50 text-indigo-600">
                            <i class="ri-refresh-line"></i>
                        </span>
                        <span class="text-xs font-semibold leading-snug text-slate-800">Transition Consultancy</span>
                    </div>
                    <div class="flex items-center gap-3 rounded-2xl border border-slate-200/80 bg-white px-4 py-3.5">
                        <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-slate-100 text-slate-700">
                            <i class="ri-customer-service-2-line"></i>
                        </span>
                        <span class="text-xs font-semibold leading-snug text-slate-800">24x7 Support Desk</span>
                    </div>
                    <div class="flex items-center gap-3 rounded-2xl border border-slate-200/80 bg-white px-4 py-3.5">
                        <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-red-50 text-red-600">
                            <i class="ri-heart-pulse-line"></i>
                        </span>
                        <span class="text-xs font-semibold leading-snug text-slate-800">Free Health Check-Up Camps</span>
                    </div>
                </div>

                <p class="mt-6 text-center text-xs leading-relaxed text-slate-500">
                    Every scope is tailored to your site, documented before we start, and reviewed with you at the
                    monthly audit.
                </p>
            </div>

            <!-- View All Services Rounded Pill Button -->
            <div class="mt-12 text-center">
                <a
                    href="{{ route('services') }}"
                    class="inline-flex items-center gap-2 rounded-full border border-slate-200 bg-white px-8 py-3.5 text-xs sm:text-sm font-semibold text-slate-800 shadow-xs hover:border-[#12233F]/40 hover:text-[#12233F] transition active:scale-[0.98]"
                >
                    <span>View All Services &amp; SLAs</span>
                    <i class="ri-arrow-right-line text-sm"></i>
                </a>
            </div>
        </div>
    </section>

    {{-- Health Check-Up Camps --}}
    <section 
        id="health-camps"
        x-data="scrollReveal(0)"
        :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8 pointer-events-none'"
        class="scroll-mt-20 border-y border-slate-100 bg-slate-50/50 py-14 transition-all duration-700 ease-out sm:py-20 lg:py-24"
    >
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid items-center gap-12 lg:grid-cols-2 lg:gap-16">

                <!-- Left Content -->
                <div>
                    <span class="inline-flex items-center gap-1.5 rounded-full bg-[#12233F]/10 px-3.5 py-1 text-xs font-semibold text-[#12233F]">
                        <i class="ri-heart-pulse-line text-xs"></i> Employee &amp; Client Health
                    </span>

                    <h2 class="mt-4 text-3xl font-extrabold leading-[1.15] tracking-tight text-slate-900 sm:text-4xl">
                        Our top priority is the health of our employees.
                    </h2>

                    <p class="mt-4 text-sm leading-relaxed text-slate-600 sm:text-base">
                        A healthy body leads to a healthy mind. Our housekeeping, horticulture, security and
                        technical teams work physically demanding shifts every day, so their wellbeing is the first
                        thing we invest in — not the last.
                    </p>

                    <p class="mt-4 text-sm leading-relaxed text-slate-600 sm:text-base">
                        We organise <strong class="font-semibold text-slate-800">free health check-up camps</strong>
                        for our employees as well as for our clients, at our sites. A healthy, screened and
                        well-supported team shows up at work with more energy, and our clients get the same care
                        extended to their residents and staff.
                    </p>

                    <div class="mt-8 flex flex-wrap items-center gap-3">
                        <a
                            href="{{ route('contact') }}"
                            class="inline-flex items-center gap-2 rounded-full bg-[#12233F] px-6 py-3 text-xs font-semibold text-white transition hover:bg-[#0B1A30] active:scale-[0.98] sm:text-sm"
                        >
                            <span>Register for a Health Camp</span>
                            <i class="ri-arrow-right-line text-sm"></i>
                        </a>
                        <a
                            href="{{ route('careers') }}"
                            class="inline-flex items-center gap-2 rounded-full border border-slate-200 bg-white px-6 py-3 text-xs font-medium text-slate-700 transition hover:border-[#12233F]/40 hover:text-slate-900 active:scale-[0.98] sm:text-sm"
                        >
                            <span>Join the Team</span>
                        </a>
                    </div>
                </div>

                <!-- Right: What The Camps Cover -->
                <div class="grid gap-4 sm:grid-cols-2">
                    <div 
                        x-data="scrollReveal(0)"
                        :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-6'"
                        class="rounded-2xl border border-slate-200/80 bg-white p-6 shadow-xs transition hover:border-[#12233F]/25 hover:shadow-lg"
                    >
                        <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-red-600/10 text-red-600">
                            <i class="ri-heart-add-line text-lg"></i>
                        </span>
                        <h3 class="mt-4 text-sm font-bold text-slate-900">Free For Employees &amp; Clients</h3>
                        <p class="mt-1.5 text-xs leading-relaxed text-slate-600">
                            No cost, no waiting list. Camps are held at our sites so our teams and your residents
                            can walk in during the day.
                        </p>
                    </div>

                    <div 
                        x-data="scrollReveal(60)"
                        :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-6'"
                        class="rounded-2xl border border-slate-200/80 bg-white p-6 shadow-xs transition hover:border-[#12233F]/25 hover:shadow-lg"
                    >
                        <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-[#12233F]/10 text-[#12233F]">
                            <i class="ri-pulse-line text-lg"></i>
                        </span>
                        <h3 class="mt-4 text-sm font-bold text-slate-900">Basic Screening Included</h3>
                        <p class="mt-1.5 text-xs leading-relaxed text-slate-600">
                            Blood pressure, blood sugar, BMI, general physician consultation and eye and dental
                            checks wherever the camp partner supports them.
                        </p>
                    </div>

                    <div 
                        x-data="scrollReveal(120)"
                        :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-6'"
                        class="rounded-2xl border border-slate-200/80 bg-white p-6 shadow-xs transition hover:border-[#12233F]/25 hover:shadow-lg"
                    >
                        <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-emerald-50 text-emerald-600">
                            <i class="ri-calendar-check-line text-lg"></i>
                        </span>
                        <h3 class="mt-4 text-sm font-bold text-slate-900">Held Through The Year</h3>
                        <p class="mt-1.5 text-xs leading-relaxed text-slate-600">
                            Regular camps are scheduled across our running sites, with follow-up health advisories
                            shared with each team and client.
                        </p>
                    </div>

                    <div 
                        x-data="scrollReveal(180)"
                        :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-6'"
                        class="rounded-2xl border border-slate-200/80 bg-white p-6 shadow-xs transition hover:border-[#12233F]/25 hover:shadow-lg"
                    >
                        <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-amber-50 text-amber-600">
                            <i class="ri-run-line text-lg"></i>
                        </span>
                        <h3 class="mt-4 text-sm font-bold text-slate-900">Awareness Sessions</h3>
                        <p class="mt-1.5 text-xs leading-relaxed text-slate-600">
                            Alongside checks, we run short sessions on hygiene, nutrition, safety and stress
                            management — healthy habits that last beyond camp day.
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- Client Logos Grid --}}
    <section 
        id="clients"
        x-data="scrollReveal(0)"
        :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8 pointer-events-none'"
        class="scroll-mt-20 border-y border-slate-100 bg-slate-50/50 py-14 transition-all duration-700 ease-out sm:py-20 lg:py-24"
    >
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="max-w-2xl mx-auto text-center">
                <span class="inline-flex items-center gap-1.5 rounded-full bg-[#12233F]/10 px-3.5 py-1 text-xs font-semibold text-[#12233F]">
                    <i class="ri-building-line text-xs"></i> Our Clients
                </span>
                <h2 class="mt-3 text-3xl font-extrabold tracking-tight text-slate-900 sm:text-4xl">
                    Happy clients are the evidence of our achievement
                </h2>
                <p class="mt-3 text-sm text-slate-600 leading-relaxed">
                    Our growing list of satisfied residential societies and commercial clients is proof of what
                    a well-run facility team can deliver.
                </p>
            </div>

            <div class="mt-12 grid grid-cols-2 gap-4 sm:grid-cols-3 sm:gap-6 lg:grid-cols-6">
                @forelse ($this->clients as $client)
                    <div
                        wire:key="client-logo-{{ $client->id }}"
                        class="flex h-32 items-center justify-center rounded-2xl border border-slate-200/80 bg-white p-5 shadow-xs transition hover:border-[#12233F]/30 hover:shadow-lg sm:h-36"
                    >
                        <img
                            src="{{ asset($client->image) }}"
                            alt="{{ $client->title ?? 'Client Logo' }}"
                            loading="lazy"
                            decoding="async"
                            class="max-h-20 max-w-[85%] object-contain"
                            onerror="this.onerror=null; this.src='https://placehold.co/150x150?text=Client';"
                        />
                    </div>
                @empty
                    <div class="col-span-full rounded-2xl border border-dashed border-slate-200 bg-white p-10 text-center">
                        <h3 class="text-base font-bold text-slate-900">No client images available</h3>
                        <p class="mt-1 text-xs text-slate-500">
                            Client logos will appear here once added to the portfolio.
                        </p>
                    </div>
                @endforelse
            </div>

            @if ($this->clients->isNotEmpty())
                <div class="mt-10 text-center">
                    <a
                        href="{{ route('clients') }}"
                        class="inline-flex items-center gap-2 rounded-full border border-slate-200 bg-white px-8 py-3.5 text-xs sm:text-sm font-semibold text-slate-800 shadow-xs transition hover:border-[#12233F]/40 hover:text-[#12233F] active:scale-[0.98]"
                    >
                        <span>View All Clients</span>
                        <i class="ri-arrow-right-line text-sm"></i>
                    </a>
                </div>
            @endif
        </div>
    </section>

  

    {{-- Clean Testimonials Carousel --}}
    <section 
        id="testimonials" 
        x-data="scrollReveal(0)"
        :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8 pointer-events-none'"
        class="scroll-mt-20 border-t border-slate-100 bg-slate-50/50 py-14 sm:py-20 lg:py-24 transition-all duration-700 ease-out"
    >
        <div 
            class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8"
            x-data="{
                active: 0,
                testimonials: @js($this->testimonials),
                next() {
                    if (this.testimonials.length > 0) {
                        this.active = (this.active + 1) % this.testimonials.length;
                    }
                },
                prev() {
                    if (this.testimonials.length > 0) {
                        this.active = (this.active - 1 + this.testimonials.length) % this.testimonials.length;
                    }
                }
            }"
        >
            <div class="flex flex-col sm:flex-row items-center justify-between gap-4 pb-10">
                <div class="text-center sm:text-left">
                    <span class="inline-flex items-center gap-1.5 rounded-full bg-[#12233F]/10 px-3.5 py-1 text-xs font-semibold text-[#12233F]">
                        <i class="ri-feedback-line text-xs"></i> Testimonials
                    </span>
                    <h2 class="mt-3 text-3xl font-extrabold tracking-tight text-slate-900 sm:text-4xl">
                        Trusted by Residents &amp; Clients
                    </h2>
                </div>

                <!-- Clean Rounded Prev/Next Controls -->
                <div class="flex items-center gap-2">
                    <button 
                        @click="prev()" 
                        aria-label="Previous Testimonial"
                        class="flex h-11 w-11 items-center justify-center rounded-full border border-slate-200 bg-white text-slate-700 shadow-xs hover:border-red-600 hover:bg-red-600 hover:text-white transition active:scale-95 cursor-pointer"
                    >
                        <i class="ri-arrow-left-line text-sm"></i>
                    </button>
                    <button 
                        @click="next()" 
                        aria-label="Next Testimonial"
                        class="flex h-11 w-11 items-center justify-center rounded-full border border-slate-200 bg-white text-slate-700 shadow-xs hover:border-red-600 hover:bg-red-600 hover:text-white transition active:scale-95 cursor-pointer"
                    >
                        <i class="ri-arrow-right-line text-sm"></i>
                    </button>
                </div>
            </div>

            <!-- Responsive Cards -->
            <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                <template x-for="(cardOffset, i) in [0, 1, 2]" :key="i">
                    <div 
                        :class="{
                            'block': i === 0,
                            'hidden md:block': i === 1,
                            'hidden lg:block': i === 2
                        }"
                    >
                        <div 
                            x-data="{ get item() { return testimonials[(active + i) % testimonials.length] } }"
                            class="flex flex-col justify-between h-full rounded-3xl border border-slate-200/80 bg-white p-7 shadow-xs hover:border-[#12233F]/30 transition"
                        >
                            <div>
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-1 text-amber-400 text-xs">
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-fill"></i>
                                    </div>
                                    <span class="rounded-full bg-[#12233F]/10 px-2.5 py-0.5 text-[10px] font-semibold text-[#12233F]" x-text="item.metric"></span>
                                </div>
                                <p class="mt-5 text-xs sm:text-sm text-slate-600 italic leading-relaxed" x-text="'&ldquo;' + item.quote + '&rdquo;'"></p>
                            </div>

                            <div class="mt-6 pt-5 border-t border-slate-100 flex items-center gap-3">
                                <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-[#12233F] text-white font-bold text-xs" x-text="item.name.charAt(0)"></div>
                                <div>
                                    <h3 class="text-xs sm:text-sm font-bold text-slate-900" x-text="item.name"></h3>
                                    <p class="text-[11px] text-slate-400" x-text="item.role"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </template>
            </div>
        </div>
    </section>



    {{-- Clean FAQ Accordion --}}
    <section 
        id="faq" 
        x-data="scrollReveal(0)"
        :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8 pointer-events-none'"
        class="scroll-mt-20 border-t border-slate-100 bg-slate-50/50 py-14 sm:py-20 lg:py-24 transition-all duration-700 ease-out"
    >
        <div class="mx-auto max-w-3xl px-4 sm:px-6 lg:px-8" x-data="{ activeFaq: 1 }">
            <div class="text-center">
                <span class="inline-flex items-center gap-1.5 rounded-full bg-[#12233F]/10 px-3.5 py-1 text-xs font-semibold text-[#12233F]">
                    <i class="ri-questionnaire-line text-xs"></i> FAQ
                </span>
                <h2 class="mt-3 text-3xl font-extrabold tracking-tight text-slate-900 sm:text-4xl">
                    Frequently Asked Questions
                </h2>
                <p class="mt-3 text-sm text-slate-600 leading-relaxed">
                    Clear answers on scope, staffing, transition and our 24x7 support system.
                </p>
            </div>

            <div class="mt-12 space-y-3">
                <!-- FAQ 1 -->
                <div class="rounded-2xl border border-slate-200/80 bg-white shadow-xs overflow-hidden">
                    <button 
                        @click="activeFaq = (activeFaq === 1 ? null : 1)"
                        class="flex w-full items-center justify-between p-5 text-left text-sm font-semibold text-slate-900 transition hover:text-red-700 cursor-pointer gap-4"
                    >
                        <span>Do you manage both residential societies and commercial properties?</span>
                        <span class="flex h-7 w-7 shrink-0 items-center justify-center rounded-full bg-slate-100 text-slate-500">
                            <i :class="activeFaq === 1 ? 'ri-subtract-line text-red-600' : 'ri-add-line'"></i>
                        </span>
                    </button>
                    <div x-show="activeFaq === 1" x-collapse class="px-5 pb-5 text-xs sm:text-sm leading-relaxed text-slate-600 border-t border-slate-100 pt-3">
                        Yes. Integrated facility management for residential societies and commercial facilities is at the core of our work, and we have more than three years of hands-on experience managing residential society operations.
                    </div>
                </div>

                <!-- FAQ 2 -->
                <div class="rounded-2xl border border-slate-200/80 bg-white shadow-xs overflow-hidden">
                    <button 
                        @click="activeFaq = (activeFaq === 2 ? null : 2)"
                        class="flex w-full items-center justify-between p-5 text-left text-sm font-semibold text-slate-900 transition hover:text-red-700 cursor-pointer gap-4"
                    >
                        <span>Are your housekeeping, security and technical staff in-house and trained?</span>
                        <span class="flex h-7 w-7 shrink-0 items-center justify-center rounded-full bg-slate-100 text-slate-500">
                            <i :class="activeFaq === 2 ? 'ri-subtract-line text-red-600' : 'ri-add-line'"></i>
                        </span>
                    </button>
                    <div x-show="activeFaq === 2" x-collapse class="px-5 pb-5 text-xs sm:text-sm leading-relaxed text-slate-600 border-t border-slate-100 pt-3">
                        Yes. Our technical staff are hired for their expertise and our workers are trained on the job. You get a trained, uniformed team on your site every day — not a rotating pool of daily labour.
                    </div>
                </div>

                <!-- FAQ 3 -->
                <div class="rounded-2xl border border-slate-200/80 bg-white shadow-xs overflow-hidden">
                    <button 
                        @click="activeFaq = (activeFaq === 3 ? null : 3)"
                        class="flex w-full items-center justify-between p-5 text-left text-sm font-semibold text-slate-900 transition hover:text-red-700 cursor-pointer gap-4"
                    >
                        <span>What does the 24x7 support system cover?</span>
                        <span class="flex h-7 w-7 shrink-0 items-center justify-center rounded-full bg-slate-100 text-slate-500">
                            <i :class="activeFaq === 3 ? 'ri-subtract-line text-red-600' : 'ri-add-line'"></i>
                        </span>
                    </button>
                    <div x-show="activeFaq === 3" x-collapse class="px-5 pb-5 text-xs sm:text-sm leading-relaxed text-slate-600 border-t border-slate-100 pt-3">
                        A dedicated support desk operates every hour of the day, with on-call technical staff for breakdowns, water, electrical and security emergencies — so residents and clients always have someone to call.
                    </div>
                </div>

                <!-- FAQ 4 -->
                <div class="rounded-2xl border border-slate-200/80 bg-white shadow-xs overflow-hidden">
                    <button 
                        @click="activeFaq = (activeFaq === 4 ? null : 4)"
                        class="flex w-full items-center justify-between p-5 text-left text-sm font-semibold text-slate-900 transition hover:text-red-700 cursor-pointer gap-4"
                    >
                        <span>Can you help us transition from our current facility vendor?</span>
                        <span class="flex h-7 w-7 shrink-0 items-center justify-center rounded-full bg-slate-100 text-slate-500">
                            <i :class="activeFaq === 4 ? 'ri-subtract-line text-red-600' : 'ri-add-line'"></i>
                        </span>
                    </button>
                    <div x-show="activeFaq === 4" x-collapse class="px-5 pb-5 text-xs sm:text-sm leading-relaxed text-slate-600 border-t border-slate-100 pt-3">
                        Yes. Transition consultancy is part of our service. We audit the current setup, prepare rosters, documentation and compliance records, and phase the handover so there is no service gap.
                    </div>
                </div>

                <!-- FAQ 5 -->
                <div class="rounded-2xl border border-slate-200/80 bg-white shadow-xs overflow-hidden">
                    <button 
                        @click="activeFaq = (activeFaq === 5 ? null : 5)"
                        class="flex w-full items-center justify-between p-5 text-left text-sm font-semibold text-slate-900 transition hover:text-red-700 cursor-pointer gap-4"
                    >
                        <span>Do you provide auditing and legal support?</span>
                        <span class="flex h-7 w-7 shrink-0 items-center justify-center rounded-full bg-slate-100 text-slate-500">
                            <i :class="activeFaq === 5 ? 'ri-subtract-line text-red-600' : 'ri-add-line'"></i>
                        </span>
                    </button>
                    <div x-show="activeFaq === 5" x-collapse class="px-5 pb-5 text-xs sm:text-sm leading-relaxed text-slate-600 border-t border-slate-100 pt-3">
                        Yes. We run scheduled facility audits with documented findings and provide legal support for contracts, compliance and vendor matters, giving your committee a clear record of service delivery.
                    </div>
                </div>

                <!-- FAQ 6 -->
                <div class="rounded-2xl border border-slate-200/80 bg-white shadow-xs overflow-hidden">
                    <button 
                        @click="activeFaq = (activeFaq === 6 ? null : 6)"
                        class="flex w-full items-center justify-between p-5 text-left text-sm font-semibold text-slate-900 transition hover:text-red-700 cursor-pointer gap-4"
                    >
                        <span>What do the free health check-up camps include?</span>
                        <span class="flex h-7 w-7 shrink-0 items-center justify-center rounded-full bg-slate-100 text-slate-500">
                            <i :class="activeFaq === 6 ? 'ri-subtract-line text-red-600' : 'ri-add-line'"></i>
                        </span>
                    </button>
                    <div x-show="activeFaq === 6" x-collapse class="px-5 pb-5 text-xs sm:text-sm leading-relaxed text-slate-600 border-t border-slate-100 pt-3">
                        Free camps are organised for our employees as well as for our clients, covering basic screening such as blood pressure, blood sugar, BMI and a general physician consultation, along with short awareness sessions on hygiene, nutrition and safety.
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Clean Minimalist Final CTA Banner --}}
    <section 
        id="contact" 
        x-data="scrollReveal(0)"
        :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8 pointer-events-none'"
        class="scroll-mt-20 py-14 sm:py-20 lg:py-24 transition-all duration-700 ease-out"
    >
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="relative overflow-hidden rounded-3xl bg-[#0B1A30] px-6 py-14 sm:px-12 lg:py-16 text-center text-white border border-slate-800">
                <div class="relative max-w-2xl mx-auto space-y-4">
                    <span class="inline-flex items-center gap-1.5 rounded-full bg-white/10 px-3.5 py-1 text-xs font-semibold text-red-400">
                        <i class="ri-customer-service-2-line text-xs"></i> 24x7 Operations Desk
                    </span>
                    <h2 class="text-3xl font-extrabold tracking-tight text-white sm:text-4xl">
                        To serve the excellence.
                    </h2>
                    <p class="text-sm text-slate-400 leading-relaxed max-w-lg mx-auto">
                        Speak directly with our management team for a free facility audit, a service scope and a
                        tailored proposal for your society or building.
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
