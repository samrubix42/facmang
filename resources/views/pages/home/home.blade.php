<script>
    (function() {
        const registerHeroSlider = () => {
            if (typeof Alpine !== 'undefined' && !Alpine.data('heroSlider')) {
                Alpine.data('heroSlider', () => ({
                    active: 0,
                    slides: [
                        {
                            badge: 'ADMISSIONS OPEN 2027–2028',
                            badgeStyle: 'bg-rose-50 text-rose-600 border-rose-200/80',
                            title: 'Nurturing Minds, Shaping Futures',
                            description: "Sahara Advanced World School (SAWS) Purnea blends traditional academic rigor with advanced methodologies to cultivate tomorrow's global leaders.",
                            primaryBtn: 'Explore Admissions',
                            primaryLink: '#calculator',
                            secondaryBtn: 'Learn More',
                            secondaryLink: '#services',
                            image: '{{ asset("images/hero_facility.jpg") }}',
                            tagTitle: 'HQ Campus Operations',
                            tagSub: 'ISO 9001 & ISSA Certified'
                        },
                        {
                            badge: 'ENTERPRISE FACILITY OPERATIONS',
                            badgeStyle: 'bg-emerald-50 text-emerald-700 border-emerald-200/80',
                            title: 'Architectural Precision for Workplace Operations',
                            description: 'Proactive commercial sweeping, hospital-grade restroom hygiene, dedicated corporate pantry staffing, and preventative MEP care with single-point SLA accountability.',
                            primaryBtn: 'Calculate SLA Scope',
                            primaryLink: '#calculator',
                            secondaryBtn: 'Explore Services',
                            secondaryLink: '#services',
                            image: '{{ asset("images/office_sweeping_cleaning.jpg") }}',
                            tagTitle: 'Live SLA Dashboard',
                            tagSub: '99.85% Performance Rate'
                        },
                        {
                            badge: 'SANITATION & HYGIENE CARE',
                            badgeStyle: 'bg-sky-50 text-sky-700 border-sky-200/80',
                            title: 'Hospital-Grade Hygiene & Environmental Care',
                            description: 'Continuous touchpoint disinfection, automated inventory replenishment, and certified eco-friendly cleaning formulas tailored to high-density workplaces.',
                            primaryBtn: 'Book Sanitation Audit',
                            primaryLink: '#calculator',
                            secondaryBtn: 'View Portfolio',
                            secondaryLink: '#services',
                            image: '{{ asset("images/restroom_hygiene_sanitation.jpg") }}',
                            tagTitle: 'Certified Sanitation',
                            tagSub: '100% Non-Toxic Formulas'
                        }
                    ],
                    timer: null,
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
                    }
                }));
            }
        };
        document.addEventListener('alpine:init', registerHeroSlider);
        if (window.Alpine) { registerHeroSlider(); }
    })();
</script>

<div class="bg-slate-50 text-slate-800 antialiased font-sans">
    {{-- Modern Clean Hero Slider Section --}}
    <section 
        x-data="heroSlider"
        @mouseenter="stopAutoplay()"
        @mouseleave="startAutoplay()"
        class="relative overflow-hidden bg-white pt-8 pb-12 lg:pt-12 lg:pb-16"
    >
        <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid items-center gap-8 lg:grid-cols-12 lg:gap-12 min-h-[500px] lg:min-h-[560px]">
                
                <!-- Left Side: Content & Controls -->
                <div class="z-10 max-w-2xl lg:col-span-6 lg:py-6">
                    <template x-for="(slide, index) in slides" :key="index">
                        <div 
                            x-show="active === index"
                            x-transition:enter="transition ease-out duration-500 transform"
                            x-transition:enter-start="opacity-0 translate-y-4"
                            x-transition:enter-end="opacity-100 translate-y-0"
                            x-transition:leave="transition ease-in duration-300 absolute"
                            x-transition:leave-start="opacity-100 translate-y-0"
                            x-transition:leave-end="opacity-0 -translate-y-4"
                            class="space-y-6"
                        >
                            <!-- Badge / Pill -->
                            <div>
                                <span 
                                    :class="slide.badgeStyle"
                                    class="inline-flex items-center gap-2 rounded-full border px-4 py-1.5 text-xs font-bold uppercase tracking-widest shadow-xs"
                                >
                                    <span class="h-2 w-2 rounded-full bg-current animate-pulse"></span>
                                    <span x-text="slide.badge"></span>
                                </span>
                            </div>

                            <!-- Title -->
                            <h1 
                                class="text-3xl font-extrabold leading-[1.12] tracking-tight text-slate-900 sm:text-4xl lg:text-5xl"
                                x-text="slide.title"
                            ></h1>

                            <!-- Description -->
                            <p 
                                class="text-base leading-relaxed text-slate-600 sm:text-lg"
                                x-text="slide.description"
                            ></p>

                            <!-- Action Buttons -->
                            <div class="flex flex-wrap items-center gap-4 pt-2">
                                <a
                                    :href="slide.primaryLink"
                                    class="inline-flex items-center gap-3 rounded-full bg-slate-900 px-8 py-4 text-xs font-bold uppercase tracking-wider text-white shadow-lg shadow-slate-900/20 transition-all hover:bg-slate-800 hover:shadow-xl hover:scale-[1.02] active:scale-[0.98]"
                                >
                                    <span x-text="slide.primaryBtn"></span>
                                    <i class="ri-arrow-right-line text-sm"></i>
                                </a>
                                
                                <a
                                    :href="slide.secondaryLink"
                                    class="inline-flex items-center gap-2 rounded-full border border-slate-300 bg-white px-7 py-4 text-xs font-bold uppercase tracking-wider text-slate-700 shadow-xs transition-all hover:border-slate-400 hover:bg-slate-50 hover:text-slate-900"
                                >
                                    <span x-text="slide.secondaryBtn"></span>
                                    <i class="ri-arrow-down-line text-sm"></i>
                                </a>
                            </div>
                        </div>
                    </template>

                    <!-- Slider Navigation & Indicators -->
                    <div class="mt-12 flex items-center justify-between border-t border-slate-100 pt-6">
                        <!-- Navigation Arrows -->
                        <div class="flex items-center gap-3">
                            <button 
                                @click="prev()" 
                                aria-label="Previous Slide"
                                class="flex h-11 w-11 items-center justify-center rounded-full border border-slate-200 bg-white text-slate-700 shadow-sm transition hover:border-slate-300 hover:bg-slate-900 hover:text-white active:scale-95 cursor-pointer"
                            >
                                <i class="ri-arrow-left-line text-lg"></i>
                            </button>
                            <button 
                                @click="next()" 
                                aria-label="Next Slide"
                                class="flex h-11 w-11 items-center justify-center rounded-full border border-slate-200 bg-white text-slate-700 shadow-sm transition hover:border-slate-300 hover:bg-slate-900 hover:text-white active:scale-95 cursor-pointer"
                            >
                                <i class="ri-arrow-right-line text-lg"></i>
                            </button>
                        </div>

                        <!-- Progress Dots & Counter -->
                        <div class="flex items-center gap-4">
                            <div class="flex items-center gap-2">
                                <template x-for="(slide, index) in slides" :key="index">
                                    <button 
                                        @click="goTo(index)"
                                        :class="active === index ? 'w-8 bg-slate-900' : 'w-2.5 bg-slate-300 hover:bg-slate-400'"
                                        class="h-2.5 rounded-full transition-all duration-300 cursor-pointer"
                                        :aria-label="'Go to slide ' + (index + 1)"
                                    ></button>
                                </template>
                            </div>
                            <span class="text-xs font-bold tracking-widest text-slate-400">
                                <span class="text-slate-900" x-text="'0' + (active + 1)"></span> / <span x-text="'0' + slides.length"></span>
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Right Side: Image with Faded Left Edge (Matching Reference Image) -->
                <div class="relative lg:col-span-6 lg:h-full">
                    <div class="relative h-[380px] sm:h-[460px] lg:h-[540px] w-full overflow-hidden rounded-3xl border border-slate-100 shadow-2xl shadow-slate-200/60 bg-slate-50">
                        <template x-for="(slide, index) in slides" :key="index">
                            <div 
                                x-show="active === index"
                                x-transition:enter="transition ease-out duration-700 opacity-0 scale-105"
                                x-transition:enter-start="opacity-0 scale-105"
                                x-transition:enter-end="opacity-100 scale-100"
                                x-transition:leave="transition ease-in duration-500 absolute inset-0"
                                x-transition:leave-start="opacity-100"
                                x-transition:leave-end="opacity-0"
                                class="absolute inset-0"
                            >
                                <img 
                                    :src="slide.image" 
                                    :alt="slide.title"
                                    class="h-full w-full object-cover object-center"
                                />

                                <!-- Modern Soft Gradient Overlay: Fades seamless white from left to right -->
                                <div class="absolute inset-0 bg-gradient-to-r from-white via-white/50 via-35% to-transparent"></div>
                                <div class="absolute inset-0 bg-gradient-to-t from-white/70 via-transparent to-transparent lg:hidden"></div>

                                <!-- Floating Glass Telemetry Card -->
                                <div class="absolute bottom-6 right-6 left-6 sm:left-auto sm:max-w-xs rounded-2xl border border-white/40 bg-white/80 p-4 shadow-xl backdrop-blur-md">
                                    <div class="flex items-center gap-3">
                                        <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-slate-900 text-white shadow-md">
                                            <i class="ri-shield-check-fill text-xl"></i>
                                        </div>
                                        <div>
                                            <p class="text-xs font-bold text-slate-900" x-text="slide.tagTitle"></p>
                                            <p class="text-[10px] font-medium text-slate-500" x-text="slide.tagSub"></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </template>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- Continuous Infinite Marquee Banner --}}
    <section class="relative border-y border-slate-200/80 bg-slate-50 py-5 overflow-hidden">
        <!-- Left & Right Soft Fade Gradients -->
        <div class="pointer-events-none absolute left-0 top-0 z-10 h-full w-24 bg-gradient-to-r from-slate-50 to-transparent"></div>
        <div class="pointer-events-none absolute right-0 top-0 z-10 h-full w-24 bg-gradient-to-l from-slate-50 to-transparent"></div>

        <!-- Marquee Track -->
        <div class="flex overflow-hidden select-none">
            <div class="animate-marquee flex items-center gap-12 whitespace-nowrap text-xs font-bold uppercase tracking-wider text-slate-600">
                <!-- Items Set 1 -->
                <span class="flex items-center gap-2.5"><i class="ri-shield-star-fill text-emerald-600 text-base"></i> ISSA CIMS Certified Standards</span>
                <span class="text-slate-300">•</span>
                <span class="flex items-center gap-2.5"><i class="ri-building-4-line text-emerald-600 text-base"></i> Brookfield Properties</span>
                <span class="text-slate-300">•</span>
                <span class="flex items-center gap-2.5"><i class="ri-checkbox-circle-fill text-emerald-600 text-base"></i> 99.85% SLA Compliance Rate</span>
                <span class="text-slate-300">•</span>
                <span class="flex items-center gap-2.5"><i class="ri-government-line text-emerald-600 text-base"></i> JLL Commercial Real Estate</span>
                <span class="text-slate-300">•</span>
                <span class="flex items-center gap-2.5"><i class="ri-user-star-line text-emerald-600 text-base"></i> 350+ Vetted & Trained Staff</span>
                <span class="text-slate-300">•</span>
                <span class="flex items-center gap-2.5"><i class="ri-community-line text-emerald-600 text-base"></i> CBRE AssetCare Portfolio</span>
                <span class="text-slate-300">•</span>
                <span class="flex items-center gap-2.5"><i class="ri-flashlight-line text-emerald-600 text-base"></i> &lt;15 Min Emergency Response</span>
                <span class="text-slate-300">•</span>
                <span class="flex items-center gap-2.5"><i class="ri-bank-line text-emerald-600 text-base"></i> Vertex Tech Labs HQ</span>
                <span class="text-slate-300">•</span>

                <!-- Items Set 2 (Duplicate for Continuous Loop) -->
                <span class="flex items-center gap-2.5"><i class="ri-shield-star-fill text-emerald-600 text-base"></i> ISSA CIMS Certified Standards</span>
                <span class="text-slate-300">•</span>
                <span class="flex items-center gap-2.5"><i class="ri-building-4-line text-emerald-600 text-base"></i> Brookfield Properties</span>
                <span class="text-slate-300">•</span>
                <span class="flex items-center gap-2.5"><i class="ri-checkbox-circle-fill text-emerald-600 text-base"></i> 99.85% SLA Compliance Rate</span>
                <span class="text-slate-300">•</span>
                <span class="flex items-center gap-2.5"><i class="ri-government-line text-emerald-600 text-base"></i> JLL Commercial Real Estate</span>
                <span class="text-slate-300">•</span>
                <span class="flex items-center gap-2.5"><i class="ri-user-star-line text-emerald-600 text-base"></i> 350+ Vetted & Trained Staff</span>
                <span class="text-slate-300">•</span>
                <span class="flex items-center gap-2.5"><i class="ri-community-line text-emerald-600 text-base"></i> CBRE AssetCare Portfolio</span>
                <span class="text-slate-300">•</span>
                <span class="flex items-center gap-2.5"><i class="ri-flashlight-line text-emerald-600 text-base"></i> &lt;15 Min Emergency Response</span>
                <span class="text-slate-300">•</span>
                <span class="flex items-center gap-2.5"><i class="ri-bank-line text-emerald-600 text-base"></i> Vertex Tech Labs HQ</span>
                <span class="text-slate-300">•</span>
            </div>
        </div>
    </section>


    {{-- Core Services Portfolio --}}
    <section id="services" class="scroll-mt-20 bg-slate-50 py-20 lg:py-28">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-2xl text-center">
                <div class="inline-flex items-center gap-2 rounded-md border border-emerald-200 bg-emerald-50 px-3 py-1 text-[10px] font-bold uppercase tracking-[0.2em] text-emerald-800">
                    <i class="ri-service-line text-emerald-600"></i>
                    <span>Service Portfolio</span>
                </div>
                <h2 class="mt-4 text-3xl font-extrabold tracking-tight text-slate-900 sm:text-4xl">
                    End-to-End Workplace Services
                </h2>
                <p class="mt-4 text-base leading-relaxed text-slate-600">
                    Proactive janitorial sweeping, hospital-grade toilet sanitization, and dedicated office stewards — tailored to your property.
                </p>
            </div>

            <div class="mt-14 grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                <!-- Card 1: Office Sweeping & Cleaning -->
                <div class="group flex flex-col overflow-hidden rounded-2xl border border-slate-200/90 bg-white shadow-sm transition duration-300 hover:-translate-y-1 hover:border-emerald-400 hover:shadow-xl hover:shadow-emerald-900/5">
                    <div class="relative h-52 overflow-hidden bg-slate-100">
                        <img
                            src="{{ asset('images/office_sweeping_cleaning.jpg') }}"
                            alt="Commercial Office Sweeping and Floor Scrubbing Service"
                            class="h-full w-full object-cover transition duration-500 group-hover:scale-105"
                        />
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-900/60 to-transparent"></div>
                        <span class="absolute bottom-3 left-3 inline-flex items-center gap-1.5 rounded bg-emerald-950/90 px-2.5 py-1 text-[10px] font-bold tracking-wider text-emerald-400 border border-emerald-700/50 backdrop-blur-xs">
                            <i class="ri-sweep-line"></i> DAILY JANITORIAL
                        </span>
                    </div>
                    <div class="flex flex-1 flex-col p-6">
                        <h3 class="text-xl font-bold text-slate-900 group-hover:text-emerald-700 transition">
                            Office Sweeping & Commercial Cleaning
                        </h3>
                        <p class="mt-2 text-xs font-semibold text-emerald-700">
                            Industrial Sweeping, Floor Scrubbing & Diamond Marble Polish
                        </p>
                        <p class="mt-3 text-xs leading-relaxed text-slate-600 flex-1">
                            Comprehensive daily sweeping, motorized floor scrubbing, HEPA dust filtering, and high-shine marble care designed for corporate lobbies and workstations.
                        </p>
                        <ul class="mt-5 space-y-2 border-t border-slate-100 pt-4 text-xs text-slate-700">
                            <li class="flex items-center gap-2"><i class="ri-checkbox-circle-fill text-emerald-600"></i> HEPA dust-free sweeping</li>
                            <li class="flex items-center gap-2"><i class="ri-checkbox-circle-fill text-emerald-600"></i> Motorized marble & tile buffing</li>
                            <li class="flex items-center gap-2"><i class="ri-checkbox-circle-fill text-emerald-600"></i> Night-shift zero disruption</li>
                        </ul>
                    </div>
                </div>

                <!-- Card 2: Restroom & Toilet Hygiene -->
                <div class="group flex flex-col overflow-hidden rounded-2xl border border-slate-200/90 bg-white shadow-sm transition duration-300 hover:-translate-y-1 hover:border-emerald-400 hover:shadow-xl hover:shadow-emerald-900/5">
                    <div class="relative h-52 overflow-hidden bg-slate-100">
                        <img
                            src="{{ asset('images/restroom_hygiene_sanitation.jpg') }}"
                            alt="Commercial Restroom and Toilet Sanitation Service"
                            class="h-full w-full object-cover transition duration-500 group-hover:scale-105"
                        />
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-900/60 to-transparent"></div>
                        <span class="absolute bottom-3 left-3 inline-flex items-center gap-1.5 rounded bg-emerald-950/90 px-2.5 py-1 text-[10px] font-bold tracking-wider text-emerald-400 border border-emerald-700/50 backdrop-blur-xs">
                            <i class="ri-drop-line"></i> HYGIENE SANITATION
                        </span>
                    </div>
                    <div class="flex flex-1 flex-col p-6">
                        <h3 class="text-xl font-bold text-slate-900 group-hover:text-emerald-700 transition">
                            Restroom & Toilet Hygiene Sanitation
                        </h3>
                        <p class="mt-2 text-xs font-semibold text-emerald-700">
                            Touchless Replenishment, Enzymatic Wash & Odor Eradication
                        </p>
                        <p class="mt-3 text-xs leading-relaxed text-slate-600 flex-1">
                            Rigorous toilet cleaning, chrome polishing, touchless sensor replenishment, enzymatic drain treatments, and 4-hour scheduled sanitation logs.
                        </p>
                        <ul class="mt-5 space-y-2 border-t border-slate-100 pt-4 text-xs text-slate-700">
                            <li class="flex items-center gap-2"><i class="ri-checkbox-circle-fill text-emerald-600"></i> Microbial toilet & urinal wash</li>
                            <li class="flex items-center gap-2"><i class="ri-checkbox-circle-fill text-emerald-600"></i> Touchless soap & towel refill</li>
                            <li class="flex items-center gap-2"><i class="ri-checkbox-circle-fill text-emerald-600"></i> 4-Hour digital audit log</li>
                        </ul>
                    </div>
                </div>

                <!-- Card 3: Office Boy & Pantry Support -->
                <div class="group flex flex-col overflow-hidden rounded-2xl border border-slate-200/90 bg-white shadow-sm transition duration-300 hover:-translate-y-1 hover:border-emerald-400 hover:shadow-xl hover:shadow-emerald-900/5">
                    <div class="relative h-52 overflow-hidden bg-slate-100">
                        <img
                            src="{{ asset('images/office_boy_pantry_service.jpg') }}"
                            alt="Corporate Office Boy and Pantry Steward Staffing"
                            class="h-full w-full object-cover transition duration-500 group-hover:scale-105"
                        />
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-900/60 to-transparent"></div>
                        <span class="absolute bottom-3 left-3 inline-flex items-center gap-1.5 rounded bg-emerald-950/90 px-2.5 py-1 text-[10px] font-bold tracking-wider text-emerald-400 border border-emerald-700/50 backdrop-blur-xs">
                            <i class="ri-cup-line"></i> PANTRY & STAFFING
                        </span>
                    </div>
                    <div class="flex flex-1 flex-col p-6">
                        <h3 class="text-xl font-bold text-slate-900 group-hover:text-emerald-700 transition">
                            Corporate Office Boy & Pantry Staffing
                        </h3>
                        <p class="mt-2 text-xs font-semibold text-emerald-700">
                            Executive Pantry Stewards, Barista & Meeting Support
                        </p>
                        <p class="mt-3 text-xs leading-relaxed text-slate-600 flex-1">
                            Uniformed, background-checked office boys and pantry attendants for executive beverage service, boardroom prep, pantry restocking, and desk support.
                        </p>
                        <ul class="mt-5 space-y-2 border-t border-slate-100 pt-4 text-xs text-slate-700">
                            <li class="flex items-center gap-2"><i class="ri-checkbox-circle-fill text-emerald-600"></i> Executive pantry stewarding</li>
                            <li class="flex items-center gap-2"><i class="ri-checkbox-circle-fill text-emerald-600"></i> Boardroom setup & coffee service</li>
                            <li class="flex items-center gap-2"><i class="ri-checkbox-circle-fill text-emerald-600"></i> Document dispatch & desk support</li>
                        </ul>
                    </div>
                </div>

                <!-- Card 4: Deep Disinfection Blitz -->
                <div class="group flex flex-col overflow-hidden rounded-2xl border border-slate-200/90 bg-white shadow-sm transition duration-300 hover:-translate-y-1 hover:border-emerald-400 hover:shadow-xl hover:shadow-emerald-900/5">
                    <div class="relative h-52 overflow-hidden bg-slate-100">
                        <img
                            src="{{ asset('images/hero_facility.jpg') }}"
                            alt="Deep Disinfection and Electrostatic Spraying Service"
                            class="h-full w-full object-cover transition duration-500 group-hover:scale-105"
                        />
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-900/60 to-transparent"></div>
                        <span class="absolute bottom-3 left-3 inline-flex items-center gap-1.5 rounded bg-emerald-950/90 px-2.5 py-1 text-[10px] font-bold tracking-wider text-emerald-400 border border-emerald-700/50 backdrop-blur-xs">
                            <i class="ri-virus-line"></i> DISINFECTION BLITZ
                        </span>
                    </div>
                    <div class="flex flex-1 flex-col p-6">
                        <h3 class="text-xl font-bold text-slate-900 group-hover:text-emerald-700 transition">
                            Deep Sanitization & Electrostatic Spray
                        </h3>
                        <p class="mt-2 text-xs font-semibold text-emerald-700">
                            EPA List N Virucidal Eradication & Air Quality
                        </p>
                        <p class="mt-3 text-xs leading-relaxed text-slate-600 flex-1">
                            Electrostatic virucidal fogging, high-touch sanitization, and indoor air purification designed for post-occupancy sanitization blitzes.
                        </p>
                        <ul class="mt-5 space-y-2 border-t border-slate-100 pt-4 text-xs text-slate-700">
                            <li class="flex items-center gap-2"><i class="ri-checkbox-circle-fill text-emerald-600"></i> EPA-certified virucidal mist</li>
                            <li class="flex items-center gap-2"><i class="ri-checkbox-circle-fill text-emerald-600"></i> Touchpoint sanitization checklist</li>
                            <li class="flex items-center gap-2"><i class="ri-checkbox-circle-fill text-emerald-600"></i> HEPA air duct purification</li>
                        </ul>
                    </div>
                </div>

                <!-- Card 5: MEP & HVAC Maintenance -->
                <div class="group flex flex-col overflow-hidden rounded-2xl border border-slate-200/90 bg-white shadow-sm transition duration-300 hover:-translate-y-1 hover:border-emerald-400 hover:shadow-xl hover:shadow-emerald-900/5 md:col-span-2 lg:col-span-2">
                    <div class="grid md:grid-cols-12 h-full">
                        <div class="relative h-56 md:h-full md:col-span-5 overflow-hidden bg-slate-100">
                            <img
                                src="{{ asset('images/mep_hvac_maintenance.jpg') }}"
                                alt="MEP and HVAC Maintenance Services"
                                class="h-full w-full object-cover transition duration-500 group-hover:scale-105"
                            />
                            <div class="absolute inset-0 bg-gradient-to-t from-slate-900/60 to-transparent"></div>
                            <span class="absolute bottom-3 left-3 inline-flex items-center gap-1.5 rounded bg-emerald-950/90 px-2.5 py-1 text-[10px] font-bold tracking-wider text-emerald-400 border border-emerald-700/50 backdrop-blur-xs">
                                <i class="ri-tools-line"></i> MEP & HVAC MAINTENANCE
                            </span>
                        </div>
                        <div class="flex flex-1 flex-col p-6 md:col-span-7">
                            <h3 class="text-xl font-bold text-slate-900 group-hover:text-emerald-700 transition">
                                MEP, HVAC & Preventative Maintenance
                            </h3>
                            <p class="mt-2 text-xs font-semibold text-emerald-700">
                                AC Filter Servicing, Electrical Safety & Zero Downtime Care
                            </p>
                            <p class="mt-3 text-xs leading-relaxed text-slate-600 flex-1">
                                Certified technicians handling air filter cycles, electrical distribution panels, plumbing inspection, and thermal scan diagnostics to ensure uninterrupted property operations.
                            </p>
                            <div class="mt-5 grid grid-cols-2 gap-2 border-t border-slate-100 pt-4 text-xs text-slate-700">
                                <span class="flex items-center gap-2"><i class="ri-checkbox-circle-fill text-emerald-600"></i> AC filter replacement</span>
                                <span class="flex items-center gap-2"><i class="ri-checkbox-circle-fill text-emerald-600"></i> Thermal circuit scanning</span>
                                <span class="flex items-center gap-2"><i class="ri-checkbox-circle-fill text-emerald-600"></i> Plumbing emergency line</span>
                                <span class="flex items-center gap-2"><i class="ri-checkbox-circle-fill text-emerald-600"></i> Zero downtime guarantee</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Operational Standards & SLA Proof --}}
    <section id="why-us" class="scroll-mt-20 border-y border-slate-200 bg-white py-20 lg:py-28">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid items-center gap-12 lg:grid-cols-12 lg:gap-16">
                <div class="lg:col-span-7">
                    <div class="inline-flex items-center gap-2 rounded-md border border-emerald-200 bg-emerald-50 px-3 py-1 text-[10px] font-bold uppercase tracking-[0.2em] text-emerald-800">
                        <i class="ri-shield-check-line text-emerald-600"></i>
                        <span>The Operational Standard</span>
                    </div>
                    <h2 class="mt-4 text-3xl font-extrabold tracking-tight text-slate-900 sm:text-4xl">
                        A facility partner built on SLA transparency
                    </h2>
                    <p class="mt-4 text-base leading-relaxed text-slate-600">
                        We combine rigorously trained on-site staff with real-time digital logging so property managers have complete line-of-sight into facility cleanliness and expenditure.
                    </p>

                    <div class="mt-8 grid gap-6 sm:grid-cols-2">
                        <div class="flex gap-4 rounded-xl border border-slate-100 bg-slate-50/60 p-4">
                            <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-emerald-600 text-white">
                                <i class="ri-user-check-line text-xl"></i>
                            </span>
                            <div>
                                <h3 class="text-sm font-bold text-slate-900">100% W-2 Employed</h3>
                                <p class="mt-1 text-xs text-slate-600">Full background checks, uniform standards, and continuous safety training.</p>
                            </div>
                        </div>

                        <div class="flex gap-4 rounded-xl border border-slate-100 bg-slate-50/60 p-4">
                            <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-emerald-600 text-white">
                                <i class="ri-qr-code-line text-xl"></i>
                            </span>
                            <div>
                                <h3 class="text-sm font-bold text-slate-900">IoT QR Clean Logs</h3>
                                <p class="mt-1 text-xs text-slate-600">Restroom and office cleaning verified live via digital QR timestamps.</p>
                            </div>
                        </div>

                        <div class="flex gap-4 rounded-xl border border-slate-100 bg-slate-50/60 p-4">
                            <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-emerald-600 text-white">
                                <i class="ri-leaf-line text-xl"></i>
                            </span>
                            <div>
                                <h3 class="text-sm font-bold text-slate-900">Green Seal Certified</h3>
                                <p class="mt-1 text-xs text-slate-600">Eco-responsible chemicals safe for occupants and indoor air quality.</p>
                            </div>
                        </div>

                        <div class="flex gap-4 rounded-xl border border-slate-100 bg-slate-50/60 p-4">
                            <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-emerald-600 text-white">
                                <i class="ri-dashboard-3-line text-xl"></i>
                            </span>
                            <div>
                                <h3 class="text-sm font-bold text-slate-900">Dedicated SLA Director</h3>
                                <p class="mt-1 text-xs text-slate-600">Single point of contact with monthly performance and cost reviews.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Dark Forest Green SLA Proof Card -->
                <div class="lg:col-span-5">
                    <div class="rounded-2xl bg-gradient-to-br from-emerald-950 via-emerald-900 to-slate-900 p-8 text-white shadow-2xl shadow-emerald-950/30">
                        <div class="flex items-center justify-between border-b border-emerald-800/80 pb-5">
                            <div>
                                <span class="text-[10px] font-bold uppercase tracking-[0.2em] text-emerald-400">Operational SLA Impact</span>
                                <h3 class="mt-1 text-lg font-bold text-white">Annual Performance Benchmark</h3>
                            </div>
                            <span class="flex h-9 w-9 items-center justify-center rounded-lg bg-emerald-600/30 text-emerald-400 border border-emerald-500/30">
                                <i class="ri-award-fill text-lg"></i>
                            </span>
                        </div>

                        <div class="mt-6 grid grid-cols-2 gap-6">
                            <div>
                                <p class="text-3xl font-extrabold text-white">99.85%</p>
                                <p class="mt-1 text-xs text-emerald-200">SLA Audit Adherence</p>
                            </div>
                            <div>
                                <p class="text-3xl font-extrabold text-emerald-400">18.4%</p>
                                <p class="mt-1 text-xs text-emerald-200">Avg Cost Reduction</p>
                            </div>
                            <div>
                                <p class="text-3xl font-extrabold text-white">&lt;15 min</p>
                                <p class="mt-1 text-xs text-emerald-200">Emergency Dispatch</p>
                            </div>
                            <div>
                                <p class="text-3xl font-extrabold text-white">4.95<span class="text-base text-emerald-400">/5</span></p>
                                <p class="mt-1 text-xs text-emerald-200">Client Audit Rating</p>
                            </div>
                        </div>

                        <div class="mt-8 rounded-xl border border-emerald-700/50 bg-emerald-900/40 p-4">
                            <p class="text-xs italic text-emerald-100">
                                "FacilityPro took over our 400,000 sq.ft commercial tower with zero operational hiccup. Restroom cleanliness ratings jumped 35% in month one."
                            </p>
                            <p class="mt-2 text-[11px] font-bold text-emerald-300">— Marcus Vance, Senior VP Property Operations</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Interactive SLA Scope & Pricing Calculator --}}
    <section id="calculator" class="scroll-mt-20 bg-slate-50 py-20 lg:py-28">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-2xl text-center">
                <div class="inline-flex items-center gap-2 rounded-md border border-emerald-200 bg-emerald-50 px-3 py-1 text-[10px] font-bold uppercase tracking-[0.2em] text-emerald-800">
                    <i class="ri-calculator-line text-emerald-600"></i>
                    <span>Scope Calculator</span>
                </div>
                <h2 class="mt-4 text-3xl font-extrabold tracking-tight text-slate-900 sm:text-4xl">
                    Calculate Facility SLA & Scope
                </h2>
                <p class="mt-4 text-base leading-relaxed text-slate-600">
                    Select your property specifications to receive a customized service level proposal within 24 hours.
                </p>
            </div>

            <div class="mx-auto mt-12 max-w-4xl rounded-2xl border border-slate-200 bg-white p-6 shadow-xl shadow-slate-200/60 sm:p-10">
                <form onsubmit="event.preventDefault(); alert('Thank you! Your SLA proposal request has been logged. Our operations team will contact you within 24 hours.');">
                    <div class="space-y-8">
                        <!-- Step 1: Property Type -->
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-3">1. Select Property Type</label>
                            <div class="grid grid-cols-2 gap-3 sm:grid-cols-4">
                                <label class="flex cursor-pointer flex-col items-center rounded-xl border border-emerald-500 bg-emerald-50/60 p-3.5 text-center text-xs font-bold text-emerald-900 transition">
                                    <i class="ri-building-4-line text-2xl text-emerald-600 mb-1"></i>
                                    <span>Corporate HQ</span>
                                </label>
                                <label class="flex cursor-pointer flex-col items-center rounded-xl border border-slate-200 bg-slate-50 p-3.5 text-center text-xs font-semibold text-slate-700 transition hover:border-emerald-300">
                                    <i class="ri-building-line text-2xl text-slate-500 mb-1"></i>
                                    <span>Commercial Tower</span>
                                </label>
                                <label class="flex cursor-pointer flex-col items-center rounded-xl border border-slate-200 bg-slate-50 p-3.5 text-center text-xs font-semibold text-slate-700 transition hover:border-emerald-300">
                                    <i class="ri-cpu-line text-2xl text-slate-500 mb-1"></i>
                                    <span>Tech Campus</span>
                                </label>
                                <label class="flex cursor-pointer flex-col items-center rounded-xl border border-slate-200 bg-slate-50 p-3.5 text-center text-xs font-semibold text-slate-700 transition hover:border-emerald-300">
                                    <i class="ri-flask-line text-2xl text-slate-500 mb-1"></i>
                                    <span>Healthcare / Lab</span>
                                </label>
                            </div>
                        </div>

                        <!-- Step 2: Floor Area -->
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-3">2. Estimated Floor Space (Sq. Ft)</label>
                            <div class="grid grid-cols-2 gap-3 sm:grid-cols-4">
                                <button type="button" class="rounded-lg border border-slate-200 bg-slate-50 py-2.5 text-xs font-bold text-slate-700 hover:border-emerald-400">Under 15,000</button>
                                <button type="button" class="rounded-lg border border-emerald-500 bg-emerald-50 py-2.5 text-xs font-bold text-emerald-900">15,000 - 50,000</button>
                                <button type="button" class="rounded-lg border border-slate-200 bg-slate-50 py-2.5 text-xs font-bold text-slate-700 hover:border-emerald-400">50,000 - 150,000</button>
                                <button type="button" class="rounded-lg border border-slate-200 bg-slate-50 py-2.5 text-xs font-bold text-slate-700 hover:border-emerald-400">150,000+</button>
                            </div>
                        </div>

                        <!-- Step 3: Required Services -->
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-3">3. Required Service Modules</label>
                            <div class="grid gap-3 sm:grid-cols-2">
                                <label class="flex items-center gap-3 rounded-xl border border-slate-200 bg-slate-50/50 p-3 text-xs font-semibold text-slate-800">
                                    <input type="checkbox" checked class="h-4 w-4 rounded text-emerald-600 focus:ring-emerald-500" />
                                    <span>Office Sweeping & Janitorial Cleaning</span>
                                </label>
                                <label class="flex items-center gap-3 rounded-xl border border-slate-200 bg-slate-50/50 p-3 text-xs font-semibold text-slate-800">
                                    <input type="checkbox" checked class="h-4 w-4 rounded text-emerald-600 focus:ring-emerald-500" />
                                    <span>Toilet & Restroom Hygiene Sanitation</span>
                                </label>
                                <label class="flex items-center gap-3 rounded-xl border border-slate-200 bg-slate-50/50 p-3 text-xs font-semibold text-slate-800">
                                    <input type="checkbox" checked class="h-4 w-4 rounded text-emerald-600 focus:ring-emerald-500" />
                                    <span>Corporate Office Boy & Pantry Staffing</span>
                                </label>
                                <label class="flex items-center gap-3 rounded-xl border border-slate-200 bg-slate-50/50 p-3 text-xs font-semibold text-slate-800">
                                    <input type="checkbox" class="h-4 w-4 rounded text-emerald-600 focus:ring-emerald-500" />
                                    <span>MEP & HVAC Air Filter Maintenance</span>
                                </label>
                            </div>
                        </div>

                        <!-- Contact Inputs -->
                        <div class="grid gap-4 border-t border-slate-200 pt-6 sm:grid-cols-3">
                            <div>
                                <label class="block text-[11px] font-bold uppercase text-slate-600 mb-1">Full Name</label>
                                <input type="text" required placeholder="Jane Doe" class="w-full rounded-lg border border-slate-300 bg-white px-3.5 py-2 text-xs text-slate-800 focus:border-emerald-500 focus:outline-none focus:ring-1 focus:ring-emerald-500" />
                            </div>
                            <div>
                                <label class="block text-[11px] font-bold uppercase text-slate-600 mb-1">Work Email</label>
                                <input type="email" required placeholder="jane@company.com" class="w-full rounded-lg border border-slate-300 bg-white px-3.5 py-2 text-xs text-slate-800 focus:border-emerald-500 focus:outline-none focus:ring-1 focus:ring-emerald-500" />
                            </div>
                            <div>
                                <label class="block text-[11px] font-bold uppercase text-slate-600 mb-1">Phone Number</label>
                                <input type="tel" required placeholder="+1 (555) 000-0000" class="w-full rounded-lg border border-slate-300 bg-white px-3.5 py-2 text-xs text-slate-800 focus:border-emerald-500 focus:outline-none focus:ring-1 focus:ring-emerald-500" />
                            </div>
                        </div>

                        <div class="pt-2 text-center">
                            <button
                                type="submit"
                                class="inline-flex w-full items-center justify-center gap-2 rounded-lg bg-emerald-600 px-8 py-4 text-xs font-bold uppercase tracking-wider text-white shadow-lg shadow-emerald-600/25 transition hover:bg-emerald-700 sm:w-auto"
                            >
                                <i class="ri-file-text-line text-base"></i>
                                <span>Generate SLA Proposal</span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

    {{-- Contact CTA Banner --}}
    <section id="contact" class="scroll-mt-20 bg-white py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="relative overflow-hidden rounded-3xl bg-gradient-to-br from-emerald-700 via-emerald-800 to-emerald-950 px-6 py-16 text-center shadow-2xl shadow-emerald-900/20 sm:px-16 lg:py-20">
                <div aria-hidden="true" class="pointer-events-none absolute inset-0">
                    <div class="absolute -left-20 -top-20 h-72 w-72 rounded-full bg-white/10 blur-3xl"></div>
                    <div class="absolute -bottom-24 -right-20 h-80 w-80 rounded-full bg-emerald-400/10 blur-3xl"></div>
                </div>

                <div class="relative">
                    <span class="inline-flex items-center gap-2 rounded-md border border-white/20 bg-white/10 px-3 py-1 text-[10px] font-bold uppercase tracking-[0.2em] text-emerald-200">
                        <i class="ri-customer-service-2-line"></i> 24/7 Operations Hotline
                    </span>
                    <h2 class="mx-auto mt-4 max-w-2xl text-3xl font-extrabold tracking-tight text-white sm:text-4xl">
                        Ready to elevate your facility standards?
                    </h2>
                    <p class="mx-auto mt-4 max-w-xl text-sm leading-relaxed text-emerald-100">
                        Speak directly with an account manager for a free on-site operational audit and tailored SLA quote within 48 hours.
                    </p>
                    
                    <div class="mt-8 flex flex-wrap items-center justify-center gap-4">
                        <a
                            href="tel:+18004928820"
                            class="inline-flex items-center gap-2 rounded-lg bg-white px-6 py-3.5 text-xs font-bold uppercase tracking-wider text-emerald-900 shadow-md transition hover:bg-emerald-50"
                        >
                            <i class="ri-phone-fill text-base text-emerald-600"></i>
                            <span>Call +1 (800) 492-8820</span>
                        </a>
                        <a
                            href="mailto:ops@facilitypro.com"
                            class="inline-flex items-center gap-2 rounded-lg border border-white/30 bg-white/10 px-6 py-3.5 text-xs font-bold uppercase tracking-wider text-white transition hover:bg-white/20"
                        >
                            <i class="ri-mail-fill text-base"></i>
                            <span>Email Operations</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>