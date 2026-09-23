<script>
    (function() {
        const registerHeroSlider = () => {
            if (typeof Alpine !== 'undefined' && !Alpine.data('heroSlider')) {
                Alpine.data('heroSlider', () => ({
                    active: 0,
                    slides: [
                        {
                            badge: 'ENTERPRISE FACILITY OPERATIONS',
                            badgeStyle: 'bg-emerald-50 text-emerald-700 border-emerald-200/80',
                            htmlTitle: 'Architectural Precision for <span class="text-emerald-600">Workplace Operations</span>',
                            description: 'Proactive commercial sweeping, hospital-grade restroom hygiene, dedicated corporate pantry staffing, and preventative MEP care with single-point SLA accountability.',
                            primaryBtn: 'Calculate SLA Scope',
                            primaryLink: '#calculator',
                            secondaryBtn: 'Explore Services',
                            secondaryLink: '#services',
                            image: '{{ asset("images/hero_facility.jpg") }}',
                            tagTitle: 'Live SLA Dashboard',
                            tagSub: '99.85% Performance Rate'
                        },
                        {
                            badge: 'COMMERCIAL CLEANING & SWEEPING',
                            badgeStyle: 'bg-sky-50 text-sky-700 border-sky-200/80',
                            htmlTitle: 'High-Performance Janitorial & <span class="text-emerald-600">Floor Care Services</span>',
                            description: 'Motorized marble scrubbing, HEPA dust-free sweeping, diamond polishing, and workstation sanitization designed for corporate lobbies and commercial towers.',
                            primaryBtn: 'Explore Janitorial Scope',
                            primaryLink: '#calculator',
                            secondaryBtn: 'Explore Services',
                            secondaryLink: '#services',
                            image: '{{ asset("images/office_sweeping_cleaning.jpg") }}',
                            tagTitle: 'HEPA Dust-Free Care',
                            tagSub: 'Zero Business Disruption'
                        },
                        {
                            badge: 'RESTROOM SANITATION & HYGIENE',
                            badgeStyle: 'bg-teal-50 text-teal-700 border-teal-200/80',
                            htmlTitle: 'Hospital-Grade Toilet & <span class="text-emerald-600">Restroom Hygiene Care</span>',
                            description: 'Microbial toilet washing, touchless sensor replenishment, 4-hour digital QR audit logging, and 100% eco-friendly virucidal sanitization formulas.',
                            primaryBtn: 'Book Sanitation Audit',
                            primaryLink: '#calculator',
                            secondaryBtn: 'View Portfolio',
                            secondaryLink: '#services',
                            image: '{{ asset("images/restroom_hygiene_sanitation.jpg") }}',
                            tagTitle: 'ISSA CIMS Certified',
                            tagSub: '100% Eco-Safe Formulas'
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
            <div class="grid items-center gap-8 lg:grid-cols-12 lg:gap-12 min-h-0 lg:min-h-[560px]">
                
                <!-- Left Side: Content & Controls -->
                <div class="z-10 max-w-2xl lg:col-span-6 lg:py-6 relative min-h-[300px] sm:min-h-[360px]">
                    <template x-for="(slide, index) in slides" :key="index">
                        <div 
                            x-show="active === index"
                            x-transition:enter="transition-all duration-700 ease-in-out transform"
                            x-transition:enter-start="translate-x-full opacity-0"
                            x-transition:enter-end="translate-x-0 opacity-100"
                            x-transition:leave="transition-all duration-700 ease-in-out transform absolute inset-0"
                            x-transition:leave-start="translate-x-0 opacity-100"
                            x-transition:leave-end="-translate-x-full opacity-0"
                            class="space-y-5 sm:space-y-6"
                        >
                            <!-- Badge / Pill -->
                            <div>
                                <span 
                                    :class="slide.badgeStyle"
                                    class="inline-flex items-center gap-2 rounded-full border px-3.5 py-1.5 text-[11px] sm:text-xs font-bold uppercase tracking-wider sm:tracking-widest shadow-xs"
                                >
                                    <span class="h-2 w-2 rounded-full bg-current animate-pulse"></span>
                                    <span x-text="slide.badge"></span>
                                </span>
                            </div>

                            <!-- Title with Theme Color Accent -->
                            <h1 
                                class="text-2xl font-extrabold leading-[1.15] tracking-tight text-slate-900 sm:text-4xl lg:text-5xl"
                                x-html="slide.htmlTitle"
                            ></h1>

                            <!-- Description -->
                            <p 
                                class="text-sm leading-relaxed text-slate-600 sm:text-base lg:text-lg"
                                x-text="slide.description"
                            ></p>

                            <!-- Action Buttons (Responsive Full Width on Mobile) -->
                            <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3 sm:gap-4 pt-2">
                                <a
                                    :href="slide.primaryLink"
                                    class="inline-flex items-center justify-center gap-3 rounded-full bg-emerald-600 px-7 sm:px-8 py-3.5 sm:py-4 text-xs font-bold uppercase tracking-wider text-white shadow-lg shadow-emerald-600/25 transition-all hover:bg-emerald-700 hover:shadow-xl hover:scale-[1.02] active:scale-[0.98] w-full sm:w-auto"
                                >
                                    <span x-text="slide.primaryBtn"></span>
                                    <i class="ri-arrow-right-line text-sm"></i>
                                </a>
                                
                                <a
                                    :href="slide.secondaryLink"
                                    class="inline-flex items-center justify-center gap-2 rounded-full border border-slate-300 bg-white px-6 sm:px-7 py-3.5 sm:py-4 text-xs font-bold uppercase tracking-wider text-slate-700 shadow-xs transition-all hover:border-emerald-400 hover:bg-emerald-50/50 hover:text-emerald-700 w-full sm:w-auto"
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
                                class="flex h-11 w-11 items-center justify-center rounded-full border border-slate-200 bg-white text-slate-700 shadow-sm transition hover:border-emerald-600 hover:bg-emerald-600 hover:text-white active:scale-95 cursor-pointer"
                            >
                                <i class="ri-arrow-left-line text-lg"></i>
                            </button>
                            <button 
                                @click="next()" 
                                aria-label="Next Slide"
                                class="flex h-11 w-11 items-center justify-center rounded-full border border-slate-200 bg-white text-slate-700 shadow-sm transition hover:border-emerald-600 hover:bg-emerald-600 hover:text-white active:scale-95 cursor-pointer"
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
                                        :class="active === index ? 'w-8 bg-emerald-600' : 'w-2.5 bg-slate-300 hover:bg-slate-400'"
                                        class="h-2.5 rounded-full transition-all duration-300 cursor-pointer"
                                        :aria-label="'Go to slide ' + (index + 1)"
                                    ></button>
                                </template>
                            </div>
                            <span class="text-xs font-bold tracking-widest text-slate-400">
                                <span class="text-emerald-600" x-text="'0' + (active + 1)"></span> / <span x-text="'0' + slides.length"></span>
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Right Side: Image with Faded Left Edge & Horizontal Slide Transition -->
                <div class="relative lg:col-span-6 lg:h-full">
                    <div class="relative h-[380px] sm:h-[460px] lg:h-[540px] w-full overflow-hidden rounded-3xl border border-slate-100 shadow-2xl shadow-slate-200/60 bg-slate-50">
                        <template x-for="(slide, index) in slides" :key="index">
                            <div 
                                x-show="active === index"
                                x-transition:enter="transition-all duration-700 ease-in-out transform"
                                x-transition:enter-start="translate-x-full opacity-0 scale-105"
                                x-transition:enter-end="translate-x-0 opacity-100 scale-100"
                                x-transition:leave="transition-all duration-700 ease-in-out transform absolute inset-0"
                                x-transition:leave-start="translate-x-0 opacity-100 scale-100"
                                x-transition:leave-end="-translate-x-full opacity-0 scale-95"
                                class="absolute inset-0"
                            >
                                <img 
                                    :src="slide.image" 
                                    :alt="slide.title || 'Facility Image'"
                                    class="h-full w-full object-cover object-center"
                                />

                                <!-- Modern Soft Gradient Overlay: Fades seamless white from left to right -->
                                <div class="absolute inset-0 bg-gradient-to-r from-white via-white/50 via-35% to-transparent"></div>
                                <div class="absolute inset-0 bg-gradient-to-t from-white/70 via-transparent to-transparent lg:hidden"></div>

                                <!-- Floating Glass Telemetry Card -->
                                <div class="absolute bottom-6 right-6 left-6 sm:left-auto sm:max-w-xs rounded-2xl border border-white/40 bg-white/80 p-4 shadow-xl backdrop-blur-md">
                                    <div class="flex items-center gap-3">
                                        <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-emerald-600 text-white shadow-md">
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

    {{-- Continuous Infinite Marquee Banner (Elevated Card Badges) --}}
    <section class="relative border-y border-slate-200/80 bg-slate-50/70 py-7 overflow-hidden">
        <!-- Header Trust Pill -->
        <div class="mb-5 text-center px-4">
            <span class="inline-flex items-center gap-2.5 rounded-full border border-slate-200/90 bg-white/90 px-4 py-1.5 text-[11px] font-bold uppercase tracking-wider text-slate-600 shadow-xs backdrop-blur-xs">
                <span class="relative flex h-2 w-2">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-2 w-2 bg-emerald-500"></span>
                </span>
                <span>Trusted by 500+ Enterprise Commercial Properties &amp; IT Parks</span>
            </span>
        </div>

        <!-- Left & Right Soft Fade Gradients -->
        <div class="pointer-events-none absolute left-0 top-0 z-10 h-full w-24 sm:w-48 bg-gradient-to-r from-slate-50 via-slate-50/90 to-transparent"></div>
        <div class="pointer-events-none absolute right-0 top-0 z-10 h-full w-24 sm:w-48 bg-gradient-to-l from-slate-50 via-slate-50/90 to-transparent"></div>

        <!-- Marquee Track -->
        <div class="flex overflow-hidden select-none">
            <div class="animate-marquee flex items-center gap-6 whitespace-nowrap">
                <!-- Logos Set 1 -->
                <div class="flex items-center gap-6">
                    <!-- Card 1: Brookfield -->
                    <div class="flex h-14 items-center gap-3.5 rounded-2xl border border-slate-200/90 bg-white px-6 py-2.5 shadow-xs transition-all duration-300 hover:-translate-y-1 hover:border-emerald-500 hover:shadow-lg hover:shadow-emerald-500/10 group cursor-pointer">
                        <svg class="h-5 sm:h-6 w-auto text-slate-700 transition duration-300 group-hover:text-emerald-600" viewBox="0 0 160 36" fill="currentColor">
                            <path d="M10 8h24c8 0 13 4 13 10 0 4-3 8-7 9 5 1 8 5 8 10 0 7-6 11-14 11H10V8zm8 14h14c4 0 7-2 7-5s-3-5-7-5H18v10zm0 18h15c5 0 8-2 8-6s-3-6-8-6H18v12zM52 24v24h-8V24h8zm0-16v8h-8V8h8zm14 16h8v4c2-3 5-5 10-5 2 0 4 1 5 2l-3 7c-1-1-3-1-4-1-4 0-8 3-8 9v12h-8V24zm32 0c9 0 16 7 16 16s-7 16-16 16-16-7-16-16 7-16 16-16zm0 24c5 0 9-4 9-8s-4-8-9-8-9 4-9 8 4 8 9 8z"/>
                        </svg>
                        <span class="h-4 w-px bg-slate-200 group-hover:bg-emerald-200 transition-colors"></span>
                        <span class="rounded-full bg-slate-100 px-2.5 py-0.5 text-[10px] font-bold tracking-wide text-slate-600 group-hover:bg-emerald-50 group-hover:text-emerald-700 transition-colors">12M+ Sq Ft</span>
                    </div>

                    <!-- Card 2: JLL Commercial -->
                    <div class="flex h-14 items-center gap-3.5 rounded-2xl border border-slate-200/90 bg-white px-6 py-2.5 shadow-xs transition-all duration-300 hover:-translate-y-1 hover:border-blue-600 hover:shadow-lg hover:shadow-blue-600/10 group cursor-pointer">
                        <svg class="h-5 sm:h-6 w-auto text-slate-700 transition duration-300 group-hover:text-blue-700" viewBox="0 0 120 36" fill="currentColor">
                            <path d="M12 8h8v24h12v8H12V8zm28 0h8v32h-8V8zm20 0h8v24h12v8H60V8z"/>
                        </svg>
                        <span class="h-4 w-px bg-slate-200 group-hover:bg-blue-200 transition-colors"></span>
                        <span class="rounded-full bg-slate-100 px-2.5 py-0.5 text-[10px] font-bold tracking-wide text-slate-600 group-hover:bg-blue-50 group-hover:text-blue-700 transition-colors">ISO 41001</span>
                    </div>

                    <!-- Card 3: CBRE AssetCare -->
                    <div class="flex h-14 items-center gap-3.5 rounded-2xl border border-slate-200/90 bg-white px-6 py-2.5 shadow-xs transition-all duration-300 hover:-translate-y-1 hover:border-emerald-600 hover:shadow-lg hover:shadow-emerald-600/10 group cursor-pointer">
                        <svg class="h-5 sm:h-6 w-auto text-slate-700 transition duration-300 group-hover:text-emerald-700" viewBox="0 0 130 36" fill="currentColor">
                            <path d="M12 24c0-9 7-16 16-16 6 0 11 3 14 8l-7 4c-2-3-4-4-7-4-5 0-9 4-9 8s4 8 9 8c3 0 5-1 7-4l7 4c-3 5-8 8-14 8-9 0-16-7-16-16zm36-16h20c5 0 9 2 9 6 0 3-2 5-5 6 4 1 6 3 6 7 0 5-4 7-10 7H48V8zm8 11h11c2 0 4-1 4-3s-2-3-4-3H56v6zm0 11h12c2 0 4-1 4-3s-2-3-4-3H56v6zm34-22h24v6H90v7h18v6H90v7h20v6H90V8z"/>
                        </svg>
                        <span class="h-4 w-px bg-slate-200 group-hover:bg-emerald-200 transition-colors"></span>
                        <span class="rounded-full bg-slate-100 px-2.5 py-0.5 text-[10px] font-bold tracking-wide text-slate-600 group-hover:bg-emerald-50 group-hover:text-emerald-700 transition-colors">99.9% SLA</span>
                    </div>

                    <!-- Card 4: Cushman & Wakefield -->
                    <div class="flex h-14 items-center gap-3.5 rounded-2xl border border-slate-200/90 bg-white px-6 py-2.5 shadow-xs transition-all duration-300 hover:-translate-y-1 hover:border-rose-500 hover:shadow-lg hover:shadow-rose-500/10 group cursor-pointer">
                        <svg class="h-5 sm:h-6 w-auto text-slate-700 transition duration-300 group-hover:text-rose-600" viewBox="0 0 110 36" fill="currentColor">
                            <path d="M10 12h32v4H28v20h-4V16H10v-4zm0-5c10-2 22-2 32 0v3c-10-2-22-2-32 0V7zm40 5h20v4H58v6h10v4H58v6h12v4H50V12zm28 0h18v4H84v6h10v4H84v12h-6V12z"/>
                        </svg>
                        <span class="h-4 w-px bg-slate-200 group-hover:bg-rose-200 transition-colors"></span>
                        <span class="rounded-full bg-slate-100 px-2.5 py-0.5 text-[10px] font-bold tracking-wide text-slate-600 group-hover:bg-rose-50 group-hover:text-rose-700 transition-colors">45+ Towers</span>
                    </div>

                    <!-- Card 5: Microsoft -->
                    <div class="flex h-14 items-center gap-3.5 rounded-2xl border border-slate-200/90 bg-white px-6 py-2.5 shadow-xs transition-all duration-300 hover:-translate-y-1 hover:border-sky-500 hover:shadow-lg hover:shadow-sky-500/10 group cursor-pointer">
                        <svg class="h-5 sm:h-6 w-auto text-slate-700" viewBox="0 0 140 36" fill="currentColor">
                            <rect x="8" y="6" width="12" height="12" fill="#F25022"/>
                            <rect x="23" y="6" width="12" height="12" fill="#7FBA00"/>
                            <rect x="8" y="21" width="12" height="12" fill="#00A4EF"/>
                            <rect x="23" y="21" width="12" height="12" fill="#FFB900"/>
                            <text x="44" y="25" font-family="sans-serif" font-weight="600" font-size="16" fill="#2d3748">Microsoft</text>
                        </svg>
                        <span class="h-4 w-px bg-slate-200 group-hover:bg-sky-200 transition-colors"></span>
                        <span class="rounded-full bg-slate-100 px-2.5 py-0.5 text-[10px] font-bold tracking-wide text-slate-600 group-hover:bg-sky-50 group-hover:text-sky-700 transition-colors">HEPA Care</span>
                    </div>

                    <!-- Card 6: DLF Cybercity -->
                    <div class="flex h-14 items-center gap-3.5 rounded-2xl border border-slate-200/90 bg-white px-6 py-2.5 shadow-xs transition-all duration-300 hover:-translate-y-1 hover:border-emerald-500 hover:shadow-lg hover:shadow-emerald-500/10 group cursor-pointer">
                        <svg class="h-5 sm:h-6 w-auto text-slate-700 transition duration-300 group-hover:text-emerald-600" viewBox="0 0 130 36" fill="currentColor">
                            <path d="M10 8l12 28L34 8h-8l-8 19L18 8h-8zm30 0h24v6H48v7h16v6H48v7h16v6H40V8zm30 0h20c5 0 9 3 9 7 0 4-3 6-6 7 4 1 5 4 5 8v7h-8v-6c0-3-2-4-5-4h-7v10h-8V8zm8 13h10c2 0 4-1 4-3s-2-3-4-3H78v6zm30-13h24v6h-8v26h-8V14h-8V8z"/>
                        </svg>
                        <span class="h-4 w-px bg-slate-200 group-hover:bg-emerald-200 transition-colors"></span>
                        <span class="rounded-full bg-slate-100 px-2.5 py-0.5 text-[10px] font-bold tracking-wide text-slate-600 group-hover:bg-emerald-50 group-hover:text-emerald-700 transition-colors">24/7 On-Site</span>
                    </div>

                    <!-- Card 7: Intel -->
                    <div class="flex h-14 items-center gap-3.5 rounded-2xl border border-slate-200/90 bg-white px-6 py-2.5 shadow-xs transition-all duration-300 hover:-translate-y-1 hover:border-sky-600 hover:shadow-lg hover:shadow-sky-600/10 group cursor-pointer">
                        <svg class="h-5 sm:h-6 w-auto text-slate-700 transition duration-300 group-hover:text-sky-600" viewBox="0 0 110 36" fill="currentColor">
                            <path d="M12 14h8v22h-8V14zm0-10h8v7h-8V4zm14 10h8v3c2-2 5-4 9-4 8 0 11 5 11 12v11h-8V26c0-4-2-6-5-6-3 0-5 2-5 6v10h-8V14zm36-6h8v7h-8V8zm0 6h8v22h-8V14z"/>
                        </svg>
                        <span class="h-4 w-px bg-slate-200 group-hover:bg-sky-200 transition-colors"></span>
                        <span class="rounded-full bg-slate-100 px-2.5 py-0.5 text-[10px] font-bold tracking-wide text-slate-600 group-hover:bg-sky-50 group-hover:text-sky-700 transition-colors">Cleanroom</span>
                    </div>

                    <!-- Card 8: Salesforce -->
                    <div class="flex h-14 items-center gap-3.5 rounded-2xl border border-slate-200/90 bg-white px-6 py-2.5 shadow-xs transition-all duration-300 hover:-translate-y-1 hover:border-blue-500 hover:shadow-lg hover:shadow-blue-500/10 group cursor-pointer">
                        <svg class="h-5 sm:h-6 w-auto text-slate-700 transition duration-300 group-hover:text-blue-500" viewBox="0 0 150 36" fill="currentColor">
                            <path d="M22 10c3-4 8-6 13-5 4-4 10-6 16-3 4-3 9-4 14-2 6 2 10 7 11 13 4 1 7 4 8 8 1 5-2 10-7 11H18c-5 0-9-4-10-9 0-5 3-9 8-10 1-5 3-9 6-13z"/>
                            <text x="68" y="24" font-family="sans-serif" font-weight="700" font-size="15" fill="currentColor">salesforce</text>
                        </svg>
                        <span class="h-4 w-px bg-slate-200 group-hover:bg-blue-200 transition-colors"></span>
                        <span class="rounded-full bg-slate-100 px-2.5 py-0.5 text-[10px] font-bold tracking-wide text-slate-600 group-hover:bg-blue-50 group-hover:text-blue-700 transition-colors">Eco-Certified</span>
                    </div>
                </div>

                <!-- Logos Set 2 (Duplicate for Seamless Infinite Loop) -->
                <div class="flex items-center gap-6">
                    <!-- Card 1: Brookfield -->
                    <div class="flex h-14 items-center gap-3.5 rounded-2xl border border-slate-200/90 bg-white px-6 py-2.5 shadow-xs transition-all duration-300 hover:-translate-y-1 hover:border-emerald-500 hover:shadow-lg hover:shadow-emerald-500/10 group cursor-pointer">
                        <svg class="h-5 sm:h-6 w-auto text-slate-700 transition duration-300 group-hover:text-emerald-600" viewBox="0 0 160 36" fill="currentColor">
                            <path d="M10 8h24c8 0 13 4 13 10 0 4-3 8-7 9 5 1 8 5 8 10 0 7-6 11-14 11H10V8zm8 14h14c4 0 7-2 7-5s-3-5-7-5H18v10zm0 18h15c5 0 8-2 8-6s-3-6-8-6H18v12zM52 24v24h-8V24h8zm0-16v8h-8V8h8zm14 16h8v4c2-3 5-5 10-5 2 0 4 1 5 2l-3 7c-1-1-3-1-4-1-4 0-8 3-8 9v12h-8V24zm32 0c9 0 16 7 16 16s-7 16-16 16-16-7-16-16 7-16 16-16zm0 24c5 0 9-4 9-8s-4-8-9-8-9 4-9 8 4 8 9 8z"/>
                        </svg>
                        <span class="h-4 w-px bg-slate-200 group-hover:bg-emerald-200 transition-colors"></span>
                        <span class="rounded-full bg-slate-100 px-2.5 py-0.5 text-[10px] font-bold tracking-wide text-slate-600 group-hover:bg-emerald-50 group-hover:text-emerald-700 transition-colors">12M+ Sq Ft</span>
                    </div>

                    <!-- Card 2: JLL Commercial -->
                    <div class="flex h-14 items-center gap-3.5 rounded-2xl border border-slate-200/90 bg-white px-6 py-2.5 shadow-xs transition-all duration-300 hover:-translate-y-1 hover:border-blue-600 hover:shadow-lg hover:shadow-blue-600/10 group cursor-pointer">
                        <svg class="h-5 sm:h-6 w-auto text-slate-700 transition duration-300 group-hover:text-blue-700" viewBox="0 0 120 36" fill="currentColor">
                            <path d="M12 8h8v24h12v8H12V8zm28 0h8v32h-8V8zm20 0h8v24h12v8H60V8z"/>
                        </svg>
                        <span class="h-4 w-px bg-slate-200 group-hover:bg-blue-200 transition-colors"></span>
                        <span class="rounded-full bg-slate-100 px-2.5 py-0.5 text-[10px] font-bold tracking-wide text-slate-600 group-hover:bg-blue-50 group-hover:text-blue-700 transition-colors">ISO 41001</span>
                    </div>

                    <!-- Card 3: CBRE AssetCare -->
                    <div class="flex h-14 items-center gap-3.5 rounded-2xl border border-slate-200/90 bg-white px-6 py-2.5 shadow-xs transition-all duration-300 hover:-translate-y-1 hover:border-emerald-600 hover:shadow-lg hover:shadow-emerald-600/10 group cursor-pointer">
                        <svg class="h-5 sm:h-6 w-auto text-slate-700 transition duration-300 group-hover:text-emerald-700" viewBox="0 0 130 36" fill="currentColor">
                            <path d="M12 24c0-9 7-16 16-16 6 0 11 3 14 8l-7 4c-2-3-4-4-7-4-5 0-9 4-9 8s4 8 9 8c3 0 5-1 7-4l7 4c-3 5-8 8-14 8-9 0-16-7-16-16zm36-16h20c5 0 9 2 9 6 0 3-2 5-5 6 4 1 6 3 6 7 0 5-4 7-10 7H48V8zm8 11h11c2 0 4-1 4-3s-2-3-4-3H56v6zm0 11h12c2 0 4-1 4-3s-2-3-4-3H56v6zm34-22h24v6H90v7h18v6H90v7h20v6H90V8z"/>
                        </svg>
                        <span class="h-4 w-px bg-slate-200 group-hover:bg-emerald-200 transition-colors"></span>
                        <span class="rounded-full bg-slate-100 px-2.5 py-0.5 text-[10px] font-bold tracking-wide text-slate-600 group-hover:bg-emerald-50 group-hover:text-emerald-700 transition-colors">99.9% SLA</span>
                    </div>

                    <!-- Card 4: Cushman & Wakefield -->
                    <div class="flex h-14 items-center gap-3.5 rounded-2xl border border-slate-200/90 bg-white px-6 py-2.5 shadow-xs transition-all duration-300 hover:-translate-y-1 hover:border-rose-500 hover:shadow-lg hover:shadow-rose-500/10 group cursor-pointer">
                        <svg class="h-5 sm:h-6 w-auto text-slate-700 transition duration-300 group-hover:text-rose-600" viewBox="0 0 110 36" fill="currentColor">
                            <path d="M10 12h32v4H28v20h-4V16H10v-4zm0-5c10-2 22-2 32 0v3c-10-2-22-2-32 0V7zm40 5h20v4H58v6h10v4H58v6h12v4H50V12zm28 0h18v4H84v6h10v4H84v12h-6V12z"/>
                        </svg>
                        <span class="h-4 w-px bg-slate-200 group-hover:bg-rose-200 transition-colors"></span>
                        <span class="rounded-full bg-slate-100 px-2.5 py-0.5 text-[10px] font-bold tracking-wide text-slate-600 group-hover:bg-rose-50 group-hover:text-rose-700 transition-colors">45+ Towers</span>
                    </div>

                    <!-- Card 5: Microsoft -->
                    <div class="flex h-14 items-center gap-3.5 rounded-2xl border border-slate-200/90 bg-white px-6 py-2.5 shadow-xs transition-all duration-300 hover:-translate-y-1 hover:border-sky-500 hover:shadow-lg hover:shadow-sky-500/10 group cursor-pointer">
                        <svg class="h-5 sm:h-6 w-auto text-slate-700" viewBox="0 0 140 36" fill="currentColor">
                            <rect x="8" y="6" width="12" height="12" fill="#F25022"/>
                            <rect x="23" y="6" width="12" height="12" fill="#7FBA00"/>
                            <rect x="8" y="21" width="12" height="12" fill="#00A4EF"/>
                            <rect x="23" y="21" width="12" height="12" fill="#FFB900"/>
                            <text x="44" y="25" font-family="sans-serif" font-weight="600" font-size="16" fill="#2d3748">Microsoft</text>
                        </svg>
                        <span class="h-4 w-px bg-slate-200 group-hover:bg-sky-200 transition-colors"></span>
                        <span class="rounded-full bg-slate-100 px-2.5 py-0.5 text-[10px] font-bold tracking-wide text-slate-600 group-hover:bg-sky-50 group-hover:text-sky-700 transition-colors">HEPA Care</span>
                    </div>

                    <!-- Card 6: DLF Cybercity -->
                    <div class="flex h-14 items-center gap-3.5 rounded-2xl border border-slate-200/90 bg-white px-6 py-2.5 shadow-xs transition-all duration-300 hover:-translate-y-1 hover:border-emerald-500 hover:shadow-lg hover:shadow-emerald-500/10 group cursor-pointer">
                        <svg class="h-5 sm:h-6 w-auto text-slate-700 transition duration-300 group-hover:text-emerald-600" viewBox="0 0 130 36" fill="currentColor">
                            <path d="M10 8l12 28L34 8h-8l-8 19L18 8h-8zm30 0h24v6H48v7h16v6H48v7h16v6H40V8zm30 0h20c5 0 9 3 9 7 0 4-3 6-6 7 4 1 5 4 5 8v7h-8v-6c0-3-2-4-5-4h-7v10h-8V8zm8 13h10c2 0 4-1 4-3s-2-3-4-3H78v6zm30-13h24v6h-8v26h-8V14h-8V8z"/>
                        </svg>
                        <span class="h-4 w-px bg-slate-200 group-hover:bg-emerald-200 transition-colors"></span>
                        <span class="rounded-full bg-slate-100 px-2.5 py-0.5 text-[10px] font-bold tracking-wide text-slate-600 group-hover:bg-emerald-50 group-hover:text-emerald-700 transition-colors">24/7 On-Site</span>
                    </div>

                    <!-- Card 7: Intel -->
                    <div class="flex h-14 items-center gap-3.5 rounded-2xl border border-slate-200/90 bg-white px-6 py-2.5 shadow-xs transition-all duration-300 hover:-translate-y-1 hover:border-sky-600 hover:shadow-lg hover:shadow-sky-600/10 group cursor-pointer">
                        <svg class="h-5 sm:h-6 w-auto text-slate-700 transition duration-300 group-hover:text-sky-600" viewBox="0 0 110 36" fill="currentColor">
                            <path d="M12 14h8v22h-8V14zm0-10h8v7h-8V4zm14 10h8v3c2-2 5-4 9-4 8 0 11 5 11 12v11h-8V26c0-4-2-6-5-6-3 0-5 2-5 6v10h-8V14zm36-6h8v7h-8V8zm0 6h8v22h-8V14z"/>
                        </svg>
                        <span class="h-4 w-px bg-slate-200 group-hover:bg-sky-200 transition-colors"></span>
                        <span class="rounded-full bg-slate-100 px-2.5 py-0.5 text-[10px] font-bold tracking-wide text-slate-600 group-hover:bg-sky-50 group-hover:text-sky-700 transition-colors">Cleanroom</span>
                    </div>

                    <!-- Card 8: Salesforce -->
                    <div class="flex h-14 items-center gap-3.5 rounded-2xl border border-slate-200/90 bg-white px-6 py-2.5 shadow-xs transition-all duration-300 hover:-translate-y-1 hover:border-blue-500 hover:shadow-lg hover:shadow-blue-500/10 group cursor-pointer">
                        <svg class="h-5 sm:h-6 w-auto text-slate-700 transition duration-300 group-hover:text-blue-500" viewBox="0 0 150 36" fill="currentColor">
                            <path d="M22 10c3-4 8-6 13-5 4-4 10-6 16-3 4-3 9-4 14-2 6 2 10 7 11 13 4 1 7 4 8 8 1 5-2 10-7 11H18c-5 0-9-4-10-9 0-5 3-9 8-10 1-5 3-9 6-13z"/>
                            <text x="68" y="24" font-family="sans-serif" font-weight="700" font-size="15" fill="currentColor">salesforce</text>
                        </svg>
                        <span class="h-4 w-px bg-slate-200 group-hover:bg-blue-200 transition-colors"></span>
                        <span class="rounded-full bg-slate-100 px-2.5 py-0.5 text-[10px] font-bold tracking-wide text-slate-600 group-hover:bg-blue-50 group-hover:text-blue-700 transition-colors">Eco-Certified</span>
                    </div>
                </div>
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

    {{-- 4-Step Operational Onboarding Workflow --}}
    <section id="workflow" class="scroll-mt-20 border-t border-slate-200 bg-white py-20 lg:py-28">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-2xl text-center">
                <div class="inline-flex items-center gap-2 rounded-md border border-emerald-200 bg-emerald-50 px-3 py-1 text-[10px] font-bold uppercase tracking-[0.2em] text-emerald-800">
                    <i class="ri-git-commit-line text-emerald-600"></i>
                    <span>Operational Blueprint</span>
                </div>
                <h2 class="mt-4 text-3xl font-extrabold tracking-tight text-slate-900 sm:text-4xl">
                    4-Step SLA Onboarding Workflow
                </h2>
                <p class="mt-4 text-base leading-relaxed text-slate-600">
                    From initial spatial audit to continuous SLA optimization, our seamless operational blueprint guarantees zero downtime during transition.
                </p>
            </div>

            <div class="mt-16 grid gap-8 sm:grid-cols-2 lg:grid-cols-4">
                <!-- Step 1 -->
                <div class="relative rounded-2xl border border-slate-200/90 bg-slate-50/50 p-6 transition duration-300 hover:border-emerald-400 hover:bg-white hover:shadow-xl hover:shadow-emerald-900/5">
                    <span class="flex h-12 w-12 items-center justify-center rounded-xl bg-slate-900 text-lg font-extrabold text-white shadow-md">01</span>
                    <h3 class="mt-6 text-lg font-bold text-slate-900">Spatial & SLA Audit</h3>
                    <p class="mt-2 text-xs leading-relaxed text-slate-600">
                        Our senior operations director inspects floor plans, traffic patterns, and existing maintenance deficits to establish benchmark SLAs.
                    </p>
                    <span class="mt-4 inline-flex items-center gap-1 text-[11px] font-bold text-emerald-600">
                        Day 1-3 Baseline Assessment <i class="ri-arrow-right-line"></i>
                    </span>
                </div>

                <!-- Step 2 -->
                <div class="relative rounded-2xl border border-slate-200/90 bg-slate-50/50 p-6 transition duration-300 hover:border-emerald-400 hover:bg-white hover:shadow-xl hover:shadow-emerald-900/5">
                    <span class="flex h-12 w-12 items-center justify-center rounded-xl bg-emerald-600 text-lg font-extrabold text-white shadow-md">02</span>
                    <h3 class="mt-6 text-lg font-bold text-slate-900">W-2 Staff Deployment</h3>
                    <p class="mt-2 text-xs leading-relaxed text-slate-600">
                        Vetted, background-checked, and uniformed janitorial operators and office stewards are deployed with site-specific protocols.
                    </p>
                    <span class="mt-4 inline-flex items-center gap-1 text-[11px] font-bold text-emerald-600">
                        100% W-2 Employed <i class="ri-arrow-right-line"></i>
                    </span>
                </div>

                <!-- Step 3 -->
                <div class="relative rounded-2xl border border-slate-200/90 bg-slate-50/50 p-6 transition duration-300 hover:border-emerald-400 hover:bg-white hover:shadow-xl hover:shadow-emerald-900/5">
                    <span class="flex h-12 w-12 items-center justify-center rounded-xl bg-slate-900 text-lg font-extrabold text-white shadow-md">03</span>
                    <h3 class="mt-6 text-lg font-bold text-slate-900">IoT & QR Telemetry</h3>
                    <p class="mt-2 text-xs leading-relaxed text-slate-600">
                        Restroom cleaning schedules and high-touch sanitization tasks are logged digitally via QR codes for instant manager audit access.
                    </p>
                    <span class="mt-4 inline-flex items-center gap-1 text-[11px] font-bold text-emerald-600">
                        Live Digital Audit Logs <i class="ri-arrow-right-line"></i>
                    </span>
                </div>

                <!-- Step 4 -->
                <div class="relative rounded-2xl border border-slate-200/90 bg-slate-50/50 p-6 transition duration-300 hover:border-emerald-400 hover:bg-white hover:shadow-xl hover:shadow-emerald-900/5">
                    <span class="flex h-12 w-12 items-center justify-center rounded-xl bg-emerald-600 text-lg font-extrabold text-white shadow-md">04</span>
                    <h3 class="mt-6 text-lg font-bold text-slate-900">Monthly SLA Review</h3>
                    <p class="mt-2 text-xs leading-relaxed text-slate-600">
                        Dedicated SLA directors review cleaning metrics, expenditure analytics, and service enhancements every 30 days.
                    </p>
                    <span class="mt-4 inline-flex items-center gap-1 text-[11px] font-bold text-emerald-600">
                        Guaranteed ROI Metrics <i class="ri-arrow-right-line"></i>
                    </span>
                </div>
            </div>
        </div>
    </section>

    {{-- Enterprise Case Studies / Client Proof Grid --}}
    <section id="case-studies" class="scroll-mt-20 border-t border-slate-200 bg-slate-50 py-20 lg:py-28">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-2xl text-center">
                <div class="inline-flex items-center gap-2 rounded-md border border-emerald-200 bg-emerald-50 px-3 py-1 text-[10px] font-bold uppercase tracking-[0.2em] text-emerald-800">
                    <i class="ri-file-chart-line text-emerald-600"></i>
                    <span>Enterprise Impact</span>
                </div>
                <h2 class="mt-4 text-3xl font-extrabold tracking-tight text-slate-900 sm:text-4xl">
                    Proven Case Studies & Real Results
                </h2>
                <p class="mt-4 text-base leading-relaxed text-slate-600">
                    See how leading corporate headquarters and commercial towers transformed their operational cleanliness and lowered total overhead.
                </p>
            </div>

            <div class="mt-14 grid gap-8 md:grid-cols-3">
                <!-- Case Study 1 -->
                <div class="flex flex-col justify-between rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition hover:shadow-lg">
                    <div>
                        <div class="flex items-center justify-between border-b border-slate-100 pb-4">
                            <span class="text-xs font-bold uppercase tracking-wider text-emerald-600">Commercial Office Tower</span>
                            <span class="rounded bg-slate-100 px-2.5 py-1 text-[10px] font-bold text-slate-600">400K Sq. Ft</span>
                        </div>
                        <h3 class="mt-4 text-lg font-bold text-slate-900">Harbor Executive Towers</h3>
                        <p class="mt-2 text-xs leading-relaxed text-slate-600">
                            Replaced fragmented vendors with single-point SLA management for sweeping, toilet hygiene, and office boy stewards.
                        </p>
                    </div>
                    <div class="mt-6 rounded-xl bg-emerald-50/70 p-4 border border-emerald-100">
                        <div class="grid grid-cols-2 gap-2 text-center">
                            <div>
                                <p class="text-xl font-extrabold text-slate-900">+38%</p>
                                <p class="text-[10px] font-bold uppercase text-emerald-700">Hygiene Score</p>
                            </div>
                            <div>
                                <p class="text-xl font-extrabold text-emerald-600">18.4%</p>
                                <p class="text-[10px] font-bold uppercase text-emerald-700">Cost Reduced</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Case Study 2 -->
                <div class="flex flex-col justify-between rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition hover:shadow-lg">
                    <div>
                        <div class="flex items-center justify-between border-b border-slate-100 pb-4">
                            <span class="text-xs font-bold uppercase tracking-wider text-emerald-600">Tech Innovation Campus</span>
                            <span class="rounded bg-slate-100 px-2.5 py-1 text-[10px] font-bold text-slate-600">250K Sq. Ft</span>
                        </div>
                        <h3 class="mt-4 text-lg font-bold text-slate-900">Vertex Global Labs</h3>
                        <p class="mt-2 text-xs leading-relaxed text-slate-600">
                            Deployed 24/7 MEP HVAC monitoring and electrostatic virus sanitization blitzes for cleanroom compliance.
                        </p>
                    </div>
                    <div class="mt-6 rounded-xl bg-emerald-50/70 p-4 border border-emerald-100">
                        <div class="grid grid-cols-2 gap-2 text-center">
                            <div>
                                <p class="text-xl font-extrabold text-slate-900">99.9%</p>
                                <p class="text-[10px] font-bold uppercase text-emerald-700">MEP Uptime</p>
                            </div>
                            <div>
                                <p class="text-xl font-extrabold text-emerald-600">&lt;12m</p>
                                <p class="text-[10px] font-bold uppercase text-emerald-700">Dispatch Speed</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Case Study 3 -->
                <div class="flex flex-col justify-between rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition hover:shadow-lg">
                    <div>
                        <div class="flex items-center justify-between border-b border-slate-100 pb-4">
                            <span class="text-xs font-bold uppercase tracking-wider text-emerald-600">Healthcare Facility</span>
                            <span class="rounded bg-slate-100 px-2.5 py-1 text-[10px] font-bold text-slate-600">180K Sq. Ft</span>
                        </div>
                        <h3 class="mt-4 text-lg font-bold text-slate-900">St. Jude Medical Center</h3>
                        <p class="mt-2 text-xs leading-relaxed text-slate-600">
                            Implemented ISSA CIMS certified microbial toilet sanitization and digital QR code cleanliness tracking logs.
                        </p>
                    </div>
                    <div class="mt-6 rounded-xl bg-emerald-50/70 p-4 border border-emerald-100">
                        <div class="grid grid-cols-2 gap-2 text-center">
                            <div>
                                <p class="text-xl font-extrabold text-slate-900">100%</p>
                                <p class="text-[10px] font-bold uppercase text-emerald-700">Audit Pass</p>
                            </div>
                            <div>
                                <p class="text-xl font-extrabold text-emerald-600">0%</p>
                                <p class="text-[10px] font-bold uppercase text-emerald-700">Chemical Toxicity</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- 3-Card Interactive Testimonial Slider (100% Responsive) --}}
    <section id="testimonials" class="scroll-mt-20 border-t border-slate-200 bg-white py-16 sm:py-20 lg:py-28 overflow-hidden" x-data="{
        active: 0,
        testimonials: [
            {
                quote: 'FacilityPro transformed our 400,000 sq. ft commercial tower. Restroom cleanliness ratings jumped 35% in month one, and their QR code inspection logs give our executives total visibility.',
                name: 'Marcus Vance',
                role: 'Senior VP of Property Operations',
                company: 'Harbor Executive Towers',
                rating: 5,
                metric: '+35% Hygiene Rating'
            },
            {
                quote: 'The level of professionalism in their office boy steward staff is unmatched. Uniformed, punctual, and highly proactive during executive boardroom prep and daily pantry management.',
                name: 'Sarah Jenkins',
                role: 'Head of Workplace Experience',
                company: 'Vertex Tech Labs HQ',
                rating: 5,
                metric: '100% W-2 Vetted Staff'
            },
            {
                quote: 'Managing 250,000 sq. ft of high-traffic office space required single-point SLA accountability. FacilityPro delivered an 18.4% overhead reduction with zero service disruptions.',
                name: 'David Thorne',
                role: 'Regional Asset Director',
                company: 'Brookfield Properties',
                rating: 5,
                metric: '18.4% Cost Overhead Saved'
            },
            {
                quote: 'Their 15-minute emergency MEP dispatch saved us from a major water line disaster during peak hours. Their HVAC filter servicing cycle is the sharpest in the commercial industry.',
                name: 'Elena Rostova',
                role: 'Chief Facilities Engineer',
                company: 'JLL Commercial Care',
                rating: 5,
                metric: '<15m Emergency Dispatch'
            }
        ],
        next() {
            this.active = (this.active + 1) % this.testimonials.length;
        },
        prev() {
            this.active = (this.active - 1 + this.testimonials.length) % this.testimonials.length;
        }
    }">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col items-center justify-between gap-4 sm:flex-row border-b border-slate-100 pb-6 sm:pb-8">
                <div class="text-center sm:text-left">
                    <div class="inline-flex items-center gap-2 rounded-md border border-emerald-200 bg-emerald-50 px-3 py-1 text-[10px] font-bold uppercase tracking-[0.2em] text-emerald-800">
                        <i class="ri-feedback-line text-emerald-600"></i>
                        <span>Client Testimonials</span>
                    </div>
                    <h2 class="mt-3 text-2xl font-extrabold tracking-tight text-slate-900 sm:text-3xl lg:text-4xl">
                        Trusted by Enterprise Facility Leaders
                    </h2>
                </div>

                <!-- Carousel Controls -->
                <div class="flex items-center gap-3">
                    <button 
                        @click="prev()" 
                        aria-label="Previous Testimonial"
                        class="flex h-10 w-10 sm:h-11 sm:w-11 items-center justify-center rounded-full border border-slate-200 bg-white text-slate-700 shadow-xs transition hover:border-emerald-600 hover:bg-emerald-600 hover:text-white cursor-pointer active:scale-95"
                    >
                        <i class="ri-arrow-left-line text-base sm:text-lg"></i>
                    </button>
                    <button 
                        @click="next()" 
                        aria-label="Next Testimonial"
                        class="flex h-10 w-10 sm:h-11 sm:w-11 items-center justify-center rounded-full border border-slate-200 bg-white text-slate-700 shadow-xs transition hover:border-emerald-600 hover:bg-emerald-600 hover:text-white cursor-pointer active:scale-95"
                    >
                        <i class="ri-arrow-right-line text-base sm:text-lg"></i>
                    </button>
                </div>
            </div>

            <!-- Responsive Testimonial Cards Container: 1 Card on Mobile, 2 on Tablet, 3 on Desktop -->
            <div class="mt-8 sm:mt-12 grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                <template x-for="(cardOffset, i) in [0, 1, 2]" :key="i">
                    <div 
                        :class="{
                            'block': i === 0,
                            'hidden md:block': i === 1,
                            'hidden lg:block': i === 2
                        }"
                        class="transition-all duration-500"
                    >
                        <div 
                            x-data="{ get item() { return testimonials[(active + i) % testimonials.length] } }"
                            class="flex flex-col justify-between h-full rounded-2xl border border-slate-200/90 bg-slate-50/50 p-6 sm:p-7 shadow-xs transition duration-300 hover:-translate-y-1 hover:border-emerald-400 hover:bg-white hover:shadow-xl hover:shadow-emerald-900/5"
                        >
                            <div>
                                <!-- Rating Stars & Metric Tag -->
                                <div class="flex items-center justify-between gap-2">
                                    <div class="flex items-center gap-1 text-amber-400">
                                        <template x-for="star in item.rating">
                                            <i class="ri-star-fill text-xs sm:text-sm"></i>
                                        </template>
                                    </div>
                                    <span class="rounded-full border border-emerald-200 bg-emerald-50 px-2.5 sm:px-3 py-1 text-[10px] font-bold text-emerald-800 shrink-0" x-text="item.metric"></span>
                                </div>

                                <!-- Quote Text -->
                                <p class="mt-5 sm:mt-6 text-xs sm:text-sm leading-relaxed text-slate-600 italic" x-text="'&ldquo;' + item.quote + '&rdquo;'"></p>
                            </div>

                            <!-- Client Info -->
                            <div class="mt-6 sm:mt-8 flex items-center gap-3.5 border-t border-slate-200/60 pt-4 sm:pt-5">
                                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-emerald-600 text-white font-bold text-sm shadow-md" x-text="item.name.charAt(0)"></div>
                                <div>
                                    <h3 class="text-xs sm:text-sm font-bold text-slate-900" x-text="item.name"></h3>
                                    <p class="text-[10px] sm:text-xs font-medium text-slate-500" x-text="item.role + ' • ' + item.company"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </template>
            </div>
        </div>
    </section>

    {{-- Clean & Professional FAQ Section --}}
    <section id="faq" class="scroll-mt-20 border-t border-slate-200 bg-slate-50/70 py-20 lg:py-28" x-data="{ activeFaq: 1 }">
        <div class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <div class="inline-flex items-center gap-2 rounded-md border border-emerald-200 bg-emerald-50 px-3.5 py-1.5 text-[10px] font-bold uppercase tracking-[0.2em] text-emerald-800">
                    <i class="ri-questionnaire-line text-emerald-600"></i>
                    <span>Operational Assurance & FAQ</span>
                </div>
                <h2 class="mt-4 text-3xl font-extrabold tracking-tight text-slate-900 sm:text-4xl lg:text-5xl">
                    Frequently Asked Questions
                </h2>
                <p class="mt-4 text-base leading-relaxed text-slate-600">
                    Clear, transparent answers regarding SLA contracts, staff vetting, emergency response, and eco-friendly standards.
                </p>
            </div>

            <div class="mt-14 space-y-4">
                <!-- FAQ Item 1 -->
                <div class="rounded-2xl border border-slate-200/90 bg-white shadow-xs transition-all duration-300 hover:border-emerald-300">
                    <button 
                        @click="activeFaq = (activeFaq === 1 ? null : 1)"
                        class="flex w-full items-center justify-between p-6 text-left text-sm sm:text-base font-bold text-slate-900 transition hover:text-emerald-700 cursor-pointer gap-4"
                    >
                        <div class="flex items-center gap-3.5">
                            <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-emerald-50 text-emerald-600 border border-emerald-200/60">
                                <i class="ri-shield-keyhole-line text-lg"></i>
                            </span>
                            <span>How do you guarantee single-point SLA accountability?</span>
                        </div>
                        <i :class="activeFaq === 1 ? 'ri-subtract-line text-emerald-600' : 'ri-add-line text-slate-400'" class="text-xl shrink-0"></i>
                    </button>
                    <div x-show="activeFaq === 1" x-collapse class="px-6 pb-6 text-xs sm:text-sm leading-relaxed text-slate-600 border-t border-slate-100 pt-4">
                        We assign a dedicated SLA Operations Director to your account who conducts weekly audits, manages all staff shifts, and serves as your single point of contact. If any service metric falls below 99% SLA, credits are automatically applied to your invoice.
                    </div>
                </div>

                <!-- FAQ Item 2 -->
                <div class="rounded-2xl border border-slate-200/90 bg-white shadow-xs transition-all duration-300 hover:border-emerald-300">
                    <button 
                        @click="activeFaq = (activeFaq === 2 ? null : 2)"
                        class="flex w-full items-center justify-between p-6 text-left text-sm sm:text-base font-bold text-slate-900 transition hover:text-emerald-700 cursor-pointer gap-4"
                    >
                        <div class="flex items-center gap-3.5">
                            <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-emerald-50 text-emerald-600 border border-emerald-200/60">
                                <i class="ri-user-star-line text-lg"></i>
                            </span>
                            <span>Are all janitorial and office boy personnel W-2 employees?</span>
                        </div>
                        <i :class="activeFaq === 2 ? 'ri-subtract-line text-emerald-600' : 'ri-add-line text-slate-400'" class="text-xl shrink-0"></i>
                    </button>
                    <div x-show="activeFaq === 2" x-collapse class="px-6 pb-6 text-xs sm:text-sm leading-relaxed text-slate-600 border-t border-slate-100 pt-4">
                        Yes. 100% of our on-site operators and pantry stewards are direct W-2 employees with full background checks, uniform standards, health benefits, and ongoing safety training. We do not subcontract core facility staff.
                    </div>
                </div>

                <!-- FAQ Item 3 -->
                <div class="rounded-2xl border border-slate-200/90 bg-white shadow-xs transition-all duration-300 hover:border-emerald-300">
                    <button 
                        @click="activeFaq = (activeFaq === 3 ? null : 3)"
                        class="flex w-full items-center justify-between p-6 text-left text-sm sm:text-base font-bold text-slate-900 transition hover:text-emerald-700 cursor-pointer gap-4"
                    >
                        <div class="flex items-center gap-3.5">
                            <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-emerald-50 text-emerald-600 border border-emerald-200/60">
                                <i class="ri-flashlight-line text-lg"></i>
                            </span>
                            <span>What is your emergency dispatch response time for MEP failures?</span>
                        </div>
                        <i :class="activeFaq === 3 ? 'ri-subtract-line text-emerald-600' : 'ri-add-line text-slate-400'" class="text-xl shrink-0"></i>
                    </button>
                    <div x-show="activeFaq === 3" x-collapse class="px-6 pb-6 text-xs sm:text-sm leading-relaxed text-slate-600 border-t border-slate-100 pt-4">
                        Our rapid-response emergency dispatch team guarantees an on-site technician within under 15 minutes for critical plumbing leaks, HVAC shut-offs, or electrical power trips across all managed properties.
                    </div>
                </div>

                <!-- FAQ Item 4 -->
                <div class="rounded-2xl border border-slate-200/90 bg-white shadow-xs transition-all duration-300 hover:border-emerald-300">
                    <button 
                        @click="activeFaq = (activeFaq === 4 ? null : 4)"
                        class="flex w-full items-center justify-between p-6 text-left text-sm sm:text-base font-bold text-slate-900 transition hover:text-emerald-700 cursor-pointer gap-4"
                    >
                        <div class="flex items-center gap-3.5">
                            <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-emerald-50 text-emerald-600 border border-emerald-200/60">
                                <i class="ri-qr-code-line text-lg"></i>
                            </span>
                            <span>How does the IoT QR code digital cleaning log work?</span>
                        </div>
                        <i :class="activeFaq === 4 ? 'ri-subtract-line text-emerald-600' : 'ri-add-line text-slate-400'" class="text-xl shrink-0"></i>
                    </button>
                    <div x-show="activeFaq === 4" x-collapse class="px-6 pb-6 text-xs sm:text-sm leading-relaxed text-slate-600 border-t border-slate-100 pt-4">
                        Each restroom and floor zone is equipped with a discreet QR code. Operators scan the code upon completion of each sanitation cycle, uploading instant timestamped proof to your online management portal.
                    </div>
                </div>

                <!-- FAQ Item 5 -->
                <div class="rounded-2xl border border-slate-200/90 bg-white shadow-xs transition-all duration-300 hover:border-emerald-300">
                    <button 
                        @click="activeFaq = (activeFaq === 5 ? null : 5)"
                        class="flex w-full items-center justify-between p-6 text-left text-sm sm:text-base font-bold text-slate-900 transition hover:text-emerald-700 cursor-pointer gap-4"
                    >
                        <div class="flex items-center gap-3.5">
                            <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-emerald-50 text-emerald-600 border border-emerald-200/60">
                                <i class="ri-leaf-line text-lg"></i>
                            </span>
                            <span>What eco-friendly chemicals and equipment are used on-site?</span>
                        </div>
                        <i :class="activeFaq === 5 ? 'ri-subtract-line text-emerald-600' : 'ri-add-line text-slate-400'" class="text-xl shrink-0"></i>
                    </button>
                    <div x-show="activeFaq === 5" x-collapse class="px-6 pb-6 text-xs sm:text-sm leading-relaxed text-slate-600 border-t border-slate-100 pt-4">
                        We exclusively use Green Seal certified non-toxic virucidal solutions and HEPA-filter motorized vacuum systems. All chemical formulas are 100% safe for building occupants and improve indoor air quality.
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Live Performance Metrics Banner --}}
    <section class="bg-gradient-to-r from-slate-950 via-emerald-950 to-slate-900 py-16 text-white border-y border-emerald-900/50">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 gap-8 lg:grid-cols-4 text-center">
                <div>
                    <p class="text-4xl lg:text-5xl font-extrabold text-white tracking-tight">4.8M+</p>
                    <p class="mt-2 text-xs font-bold uppercase tracking-wider text-emerald-400">Sq. Ft Managed</p>
                </div>
                <div>
                    <p class="text-4xl lg:text-5xl font-extrabold text-emerald-400 tracking-tight">350+</p>
                    <p class="mt-2 text-xs font-bold uppercase tracking-wider text-emerald-300">Vetted Staff</p>
                </div>
                <div>
                    <p class="text-4xl lg:text-5xl font-extrabold text-white tracking-tight">99.85%</p>
                    <p class="mt-2 text-xs font-bold uppercase tracking-wider text-emerald-400">SLA Compliance</p>
                </div>
                <div>
                    <p class="text-4xl lg:text-5xl font-extrabold text-white tracking-tight">&lt;15m</p>
                    <p class="mt-2 text-xs font-bold uppercase tracking-wider text-emerald-400">Emergency Dispatch</p>
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