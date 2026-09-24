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
                                title: 'Celebrating the past & developing the future',
                                buttonText: 'Real Estate Development',
                                buttonLink: '{{ route("services") }}',
                                image: '{{ asset("images/estate_development.jpg") }}',
                                alt: 'Luxury architectural estate with swimming pool and landscaped grounds'
                            },
                            {
                                title: 'Architectural facility care for modern commercial assets',
                                buttonText: 'Class-A Operations',
                                buttonLink: '{{ route("services") }}',
                                image: '{{ asset("images/commercial_tower.jpg") }}',
                                alt: 'Commercial tower headquarters and plaza'
                            },
                            {
                                title: 'Precision janitorial & dust-free HEPA environmental care',
                                buttonText: 'Janitorial & Floor Care',
                                buttonLink: '{{ route("services.show", ["slug" => "office-sweeping-cleaning"]) }}',
                                image: '{{ asset("images/office_sweeping_cleaning.jpg") }}',
                                alt: 'Commercial sweeping and floor restoration'
                            },
                            {
                                title: 'Molecular restroom hygiene & touchless sanitation telemetry',
                                buttonText: 'Hygiene & Sanitation',
                                buttonLink: '{{ route("services.show", ["slug" => "restroom-hygiene-sanitation"]) }}',
                                image: '{{ asset("images/restroom_hygiene_sanitation.jpg") }}',
                                alt: 'Restroom hygiene and sanitation protocols'
                            },
                            {
                                title: 'Preventative MEP engineering & critical HVAC infrastructure',
                                buttonText: 'Technical Operations',
                                buttonLink: '{{ route("services.show", ["slug" => "mep-hvac-maintenance"]) }}',
                                image: '{{ asset("images/mep_hvac_maintenance.jpg") }}',
                                alt: 'MEP HVAC maintenance and technical engineering'
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

        <!-- Minimalist Edge Navigation Arrows (Discreet, appear on hover/touch) -->
        <button 
            @click="prev()" 
            aria-label="Previous Slide"
            class="absolute left-3 sm:left-6 top-1/2 -translate-y-1/2 z-30 flex h-10 w-10 sm:h-12 sm:w-12 items-center justify-center rounded-full bg-black/25 hover:bg-black/50 text-white/80 hover:text-white backdrop-blur-xs border border-white/10 hover:border-white/25 transition-all duration-200 active:scale-95 cursor-pointer opacity-70 sm:opacity-0 group-hover:opacity-100 focus:opacity-100"
        >
            <i class="ri-arrow-left-s-line text-xl sm:text-2xl"></i>
        </button>

        <button 
            @click="next()" 
            aria-label="Next Slide"
            class="absolute right-3 sm:right-6 top-1/2 -translate-y-1/2 z-30 flex h-10 w-10 sm:h-12 sm:w-12 items-center justify-center rounded-full bg-black/25 hover:bg-black/50 text-white/80 hover:text-white backdrop-blur-xs border border-white/10 hover:border-white/25 transition-all duration-200 active:scale-95 cursor-pointer opacity-70 sm:opacity-0 group-hover:opacity-100 focus:opacity-100"
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

    {{-- Clean Minimalist Client Logo Marquee --}}
    <section class="border-b border-slate-100 bg-white py-8 overflow-hidden">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 text-center mb-6">
            <span class="inline-flex items-center gap-2 rounded-full border border-slate-200/80 bg-slate-50 px-4 py-1 text-xs font-medium text-slate-600">
                <span class="h-2 w-2 rounded-full bg-red-500"></span>
                <span>Trusted by 500+ commercial towers and enterprise headquarters</span>
            </span>
        </div>

        <div class="relative flex overflow-hidden select-none">
            <!-- Left & Right Soft Fade Gradients -->
            <div class="pointer-events-none absolute left-0 top-0 z-10 h-full w-24 sm:w-36 bg-gradient-to-r from-white to-transparent"></div>
            <div class="pointer-events-none absolute right-0 top-0 z-10 h-full w-24 sm:w-36 bg-gradient-to-l from-white to-transparent"></div>

            <div class="animate-marquee flex items-center gap-8 whitespace-nowrap">
                <!-- Logos Set 1 -->
                <div class="flex items-center gap-8">
                    <span class="flex items-center gap-2 rounded-full border border-slate-200/80 bg-white px-5 py-2.5 text-xs font-semibold text-slate-700 shadow-xs hover:border-[#12233F]/40 transition cursor-pointer">
                        <i class="ri-building-4-line text-[#12233F] text-sm"></i> Brookfield Properties
                    </span>
                    <span class="flex items-center gap-2 rounded-full border border-slate-200/80 bg-white px-5 py-2.5 text-xs font-semibold text-slate-700 shadow-xs hover:border-[#12233F]/40 transition cursor-pointer">
                        <i class="ri-community-line text-[#12233F] text-sm"></i> JLL Commercial
                    </span>
                    <span class="flex items-center gap-2 rounded-full border border-slate-200/80 bg-white px-5 py-2.5 text-xs font-semibold text-slate-700 shadow-xs hover:border-[#12233F]/40 transition cursor-pointer">
                        <i class="ri-shield-star-line text-[#12233F] text-sm"></i> CBRE AssetCare
                    </span>
                    <span class="flex items-center gap-2 rounded-full border border-slate-200/80 bg-white px-5 py-2.5 text-xs font-semibold text-slate-700 shadow-xs hover:border-[#12233F]/40 transition cursor-pointer">
                        <i class="ri-hotel-line text-[#12233F] text-sm"></i> Cushman &amp; Wakefield
                    </span>
                    <span class="flex items-center gap-2 rounded-full border border-slate-200/80 bg-white px-5 py-2.5 text-xs font-semibold text-slate-700 shadow-xs hover:border-[#12233F]/40 transition cursor-pointer">
                        <i class="ri-windows-line text-[#12233F] text-sm"></i> Microsoft Campus
                    </span>
                    <span class="flex items-center gap-2 rounded-full border border-slate-200/80 bg-white px-5 py-2.5 text-xs font-semibold text-slate-700 shadow-xs hover:border-[#12233F]/40 transition cursor-pointer">
                        <i class="ri-building-2-line text-[#12233F] text-sm"></i> DLF Cybercity
                    </span>
                    <span class="flex items-center gap-2 rounded-full border border-slate-200/80 bg-white px-5 py-2.5 text-xs font-semibold text-slate-700 shadow-xs hover:border-[#12233F]/40 transition cursor-pointer">
                        <i class="ri-cpu-line text-[#12233F] text-sm"></i> Intel Operations
                    </span>
                    <span class="flex items-center gap-2 rounded-full border border-slate-200/80 bg-white px-5 py-2.5 text-xs font-semibold text-slate-700 shadow-xs hover:border-[#12233F]/40 transition cursor-pointer">
                        <i class="ri-cloud-line text-[#12233F] text-sm"></i> Salesforce Tower
                    </span>
                </div>

                <!-- Logos Set 2 (Duplicate for Loop) -->
                <div class="flex items-center gap-8">
                    <span class="flex items-center gap-2 rounded-full border border-slate-200/80 bg-white px-5 py-2.5 text-xs font-semibold text-slate-700 shadow-xs hover:border-[#12233F]/40 transition cursor-pointer">
                        <i class="ri-building-4-line text-[#12233F] text-sm"></i> Brookfield Properties
                    </span>
                    <span class="flex items-center gap-2 rounded-full border border-slate-200/80 bg-white px-5 py-2.5 text-xs font-semibold text-slate-700 shadow-xs hover:border-[#12233F]/40 transition cursor-pointer">
                        <i class="ri-community-line text-[#12233F] text-sm"></i> JLL Commercial
                    </span>
                    <span class="flex items-center gap-2 rounded-full border border-slate-200/80 bg-white px-5 py-2.5 text-xs font-semibold text-slate-700 shadow-xs hover:border-[#12233F]/40 transition cursor-pointer">
                        <i class="ri-shield-star-line text-[#12233F] text-sm"></i> CBRE AssetCare
                    </span>
                    <span class="flex items-center gap-2 rounded-full border border-slate-200/80 bg-white px-5 py-2.5 text-xs font-semibold text-slate-700 shadow-xs hover:border-[#12233F]/40 transition cursor-pointer">
                        <i class="ri-hotel-line text-[#12233F] text-sm"></i> Cushman &amp; Wakefield
                    </span>
                    <span class="flex items-center gap-2 rounded-full border border-slate-200/80 bg-white px-5 py-2.5 text-xs font-semibold text-slate-700 shadow-xs hover:border-[#12233F]/40 transition cursor-pointer">
                        <i class="ri-windows-line text-[#12233F] text-sm"></i> Microsoft Campus
                    </span>
                    <span class="flex items-center gap-2 rounded-full border border-slate-200/80 bg-white px-5 py-2.5 text-xs font-semibold text-slate-700 shadow-xs hover:border-[#12233F]/40 transition cursor-pointer">
                        <i class="ri-building-2-line text-[#12233F] text-sm"></i> DLF Cybercity
                    </span>
                    <span class="flex items-center gap-2 rounded-full border border-slate-200/80 bg-white px-5 py-2.5 text-xs font-semibold text-slate-700 shadow-xs hover:border-[#12233F]/40 transition cursor-pointer">
                        <i class="ri-cpu-line text-[#12233F] text-sm"></i> Intel Operations
                    </span>
                    <span class="flex items-center gap-2 rounded-full border border-slate-200/80 bg-white px-5 py-2.5 text-xs font-semibold text-slate-700 shadow-xs hover:border-[#12233F]/40 transition cursor-pointer">
                        <i class="ri-cloud-line text-[#12233F] text-sm"></i> Salesforce Tower
                    </span>
                </div>
            </div>
        </div>
    </section>

    {{-- Clean Modern Services Section --}}
    <section 
        id="services" 
        x-data="scrollReveal(0)"
        :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8 pointer-events-none'"
        class="scroll-mt-20 py-20 sm:py-24 transition-all duration-700 ease-out"
    >
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <!-- Minimal Clean Section Header -->
            <div class="max-w-xl mx-auto text-center">
                <span class="inline-flex items-center gap-1.5 rounded-full bg-[#12233F]/10 px-3.5 py-1 text-xs font-semibold text-[#12233F]">
                    <i class="ri-service-line text-xs"></i> Services
                </span>
                <h2 class="mt-3 text-3xl font-extrabold tracking-tight text-slate-900 sm:text-4xl">
                    Workplace Services Portfolio
                </h2>
                <p class="mt-3 text-sm text-slate-600 leading-relaxed">
                    Single-contract facility operations engineered with strict SLAs and 100% direct-employed personnel.
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
                            alt="Office Sweeping & Commercial Cleaning"
                            class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105"
                        />
                        <span class="absolute top-4 left-4 rounded-full bg-white/90 backdrop-blur-md px-3 py-1 text-[11px] font-semibold text-slate-800">
                            Janitorial
                        </span>
                    </div>
                    <div class="p-6 flex flex-1 flex-col justify-between">
                        <div>
                            <h3 class="text-lg font-bold text-slate-900 group-hover:text-red-700 transition">
                                Office Sweeping & Cleaning
                            </h3>
                            <p class="mt-2 text-xs sm:text-sm text-slate-600 leading-relaxed">
                                Daily HEPA sweeping, motorized orbital scrubbing, and high-shine marble crystallization with twilight zero disruption.
                            </p>
                        </div>
                        <div class="mt-6 pt-4 border-t border-slate-100 flex items-center justify-between">
                            <span class="text-xs font-medium text-slate-400">Daily Night Shifts</span>
                            <a 
                                href="{{ route('services.show', ['slug' => 'office-sweeping-cleaning']) }}" 
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
                            alt="Restroom & Toilet Sanitation"
                            class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105"
                        />
                        <span class="absolute top-4 left-4 rounded-full bg-white/90 backdrop-blur-md px-3 py-1 text-[11px] font-semibold text-slate-800">
                            Sanitation
                        </span>
                    </div>
                    <div class="p-6 flex flex-1 flex-col justify-between">
                        <div>
                            <h3 class="text-lg font-bold text-slate-900 group-hover:text-red-700 transition">
                                Restroom & Toilet Hygiene
                            </h3>
                            <p class="mt-2 text-xs sm:text-sm text-slate-600 leading-relaxed">
                                Touchless sensor refills, enzymatic odor elimination, and discreet QR checkpoint logging at every door.
                            </p>
                        </div>
                        <div class="mt-6 pt-4 border-t border-slate-100 flex items-center justify-between">
                            <span class="text-xs font-medium text-slate-400">4-Hour Audits</span>
                            <a 
                                href="{{ route('services.show', ['slug' => 'restroom-hygiene-sanitation']) }}" 
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
                            alt="Corporate Office Boy & Pantry Staffing"
                            class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105"
                        />
                        <span class="absolute top-4 left-4 rounded-full bg-white/90 backdrop-blur-md px-3 py-1 text-[11px] font-semibold text-slate-800">
                            Hospitality
                        </span>
                    </div>
                    <div class="p-6 flex flex-1 flex-col justify-between">
                        <div>
                            <h3 class="text-lg font-bold text-slate-900 group-hover:text-red-700 transition">
                                Pantry Stewarding & Staffing
                            </h3>
                            <p class="mt-2 text-xs sm:text-sm text-slate-600 leading-relaxed">
                                Background-checked attendants for executive beverage service, boardroom prep, and desk support.
                            </p>
                        </div>
                        <div class="mt-6 pt-4 border-t border-slate-100 flex items-center justify-between">
                            <span class="text-xs font-medium text-slate-400">Dedicated Shifts</span>
                            <a 
                                href="{{ route('services.show', ['slug' => 'corporate-pantry-staffing']) }}" 
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
                            alt="Deep Disinfection & Sanitization"
                            class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105"
                        />
                        <span class="absolute top-4 left-4 rounded-full bg-white/90 backdrop-blur-md px-3 py-1 text-[11px] font-semibold text-slate-800">
                            Disinfection
                        </span>
                    </div>
                    <div class="p-6 flex flex-1 flex-col justify-between">
                        <div>
                            <h3 class="text-lg font-bold text-slate-900 group-hover:text-red-700 transition">
                                Deep Sanitization Blitz
                            </h3>
                            <p class="mt-2 text-xs sm:text-sm text-slate-600 leading-relaxed">
                                Electrostatic virucidal fogging, high-touch sanitization, and HEPA indoor air purification blitzes.
                            </p>
                        </div>
                        <div class="mt-6 pt-4 border-t border-slate-100 flex items-center justify-between">
                            <span class="text-xs font-medium text-slate-400">EPA Certified</span>
                            <a 
                                href="{{ route('services.show', ['slug' => 'deep-disinfection-sanitization']) }}" 
                                class="inline-flex items-center gap-1.5 rounded-full bg-[#12233F] group-hover:bg-red-600 px-4 py-2 text-xs font-medium text-white transition-colors"
                            >
                                <span>View Scope</span>
                                <i class="ri-arrow-right-line text-xs"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Service 5: MEP Maintenance (Span 2 cols on lg) -->
                <div 
                    x-data="scrollReveal(250)"
                    :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-6'"
                    class="group flex flex-col sm:flex-row rounded-3xl border border-slate-200/80 bg-white overflow-hidden shadow-xs hover:shadow-xl hover:border-[#12233F]/30 transition-all duration-300 sm:col-span-2 lg:col-span-2"
                >
                    <div class="relative h-48 sm:h-auto sm:w-1/2 overflow-hidden bg-slate-100">
                        <img
                            src="{{ asset('images/mep_hvac_maintenance.jpg') }}"
                            alt="MEP & HVAC Maintenance"
                            class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105"
                        />
                        <span class="absolute top-4 left-4 rounded-full bg-white/90 backdrop-blur-md px-3 py-1 text-[11px] font-semibold text-slate-800">
                            Technical Care
                        </span>
                    </div>
                    <div class="p-6 sm:p-8 flex flex-1 flex-col justify-between sm:w-1/2">
                        <div>
                            <h3 class="text-lg sm:text-xl font-bold text-slate-900 group-hover:text-red-700 transition">
                                MEP & HVAC Preventative Maintenance
                            </h3>
                            <p class="mt-2 text-xs sm:text-sm text-slate-600 leading-relaxed">
                                Certified engineers handling HVAC air filter cycles, electrical thermal scans, and 24/7 emergency line dispatch.
                            </p>
                        </div>
                        <div class="mt-6 pt-4 border-t border-slate-100 flex items-center justify-between">
                            <span class="text-xs font-medium text-[#12233F]">&lt;15m Response</span>
                            <a 
                                href="{{ route('services.show', ['slug' => 'mep-hvac-maintenance']) }}" 
                                class="inline-flex items-center gap-1.5 rounded-full bg-[#12233F] group-hover:bg-red-600 px-5 py-2 text-xs font-medium text-white transition-colors"
                            >
                                <span>View Scope</span>
                                <i class="ri-arrow-right-line text-xs"></i>
                            </a>
                        </div>
                    </div>
                </div>
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

    {{-- The Operational Standard (Minimalist 2-Column Showcase) --}}
    <section 
        id="why-us" 
        x-data="scrollReveal(0)"
        :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8 pointer-events-none'"
        class="scroll-mt-20 border-y border-slate-100 bg-slate-50/60 py-20 sm:py-24 transition-all duration-700 ease-out"
    >
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid items-center gap-12 lg:grid-cols-12">
                <!-- Left Details -->
                <div class="lg:col-span-6 space-y-6">
                    <span class="inline-flex items-center gap-1.5 rounded-full bg-[#12233F]/10 px-3.5 py-1 text-xs font-semibold text-[#12233F]">
                        <i class="ri-shield-check-line text-xs"></i> The Standard
                    </span>
                    <h2 class="text-3xl font-extrabold tracking-tight text-slate-900 sm:text-4xl">
                        Single-contract accountability with live SLA metrics.
                    </h2>
                    <p class="text-sm sm:text-base text-slate-600 leading-relaxed">
                        We replace fragmented vendors with direct-employed teams, digital verification, and fixed monthly reviews.
                    </p>

                    <div class="grid gap-4 sm:grid-cols-2 pt-2">
                        <div class="rounded-2xl border border-slate-200/80 bg-white p-5 shadow-xs">
                            <span class="flex h-9 w-9 items-center justify-center rounded-full bg-[#12233F]/10 text-[#12233F]">
                                <i class="ri-user-star-line text-lg"></i>
                            </span>
                            <h3 class="mt-3 text-sm font-bold text-slate-900">100% W-2 Employed</h3>
                            <p class="mt-1 text-xs text-slate-500">Fully vetted, background-screened staff.</p>
                        </div>

                        <div class="rounded-2xl border border-slate-200/80 bg-white p-5 shadow-xs">
                            <span class="flex h-9 w-9 items-center justify-center rounded-full bg-[#12233F]/10 text-[#12233F]">
                                <i class="ri-qr-code-line text-lg"></i>
                            </span>
                            <h3 class="mt-3 text-sm font-bold text-slate-900">IoT QR Telemetry</h3>
                            <p class="mt-1 text-xs text-slate-500">Live timestamped cleaning verification.</p>
                        </div>

                        <div class="rounded-2xl border border-slate-200/80 bg-white p-5 shadow-xs">
                            <span class="flex h-9 w-9 items-center justify-center rounded-full bg-[#12233F]/10 text-[#12233F]">
                                <i class="ri-leaf-line text-lg"></i>
                            </span>
                            <h3 class="mt-3 text-sm font-bold text-slate-900">Green Seal Certified</h3>
                            <p class="mt-1 text-xs text-slate-500">Indoor air safe eco-certified chemicals.</p>
                        </div>

                        <div class="rounded-2xl border border-slate-200/80 bg-white p-5 shadow-xs">
                            <span class="flex h-9 w-9 items-center justify-center rounded-full bg-[#12233F]/10 text-[#12233F]">
                                <i class="ri-dashboard-line text-lg"></i>
                            </span>
                            <h3 class="mt-3 text-sm font-bold text-slate-900">Dedicated Director</h3>
                            <p class="mt-1 text-xs text-slate-500">Single accountable point of contact.</p>
                        </div>
                    </div>
                </div>

                <!-- Right High-Contrast Metric Card -->
                <div class="lg:col-span-6">
                    <div class="rounded-3xl bg-[#0B1A30] p-8 sm:p-10 text-white shadow-xl">
                        <div class="flex items-center justify-between border-b border-slate-800 pb-5">
                            <div>
                                <span class="text-xs font-semibold uppercase tracking-wider text-red-400">Benchmark Metrics</span>
                                <h3 class="text-lg font-bold text-white mt-0.5">Annual SLA Performance</h3>
                            </div>
                            <span class="flex h-9 w-9 items-center justify-center rounded-full bg-red-500/20 text-red-400">
                                <i class="ri-award-fill text-lg"></i>
                            </span>
                        </div>

                        <div class="mt-8 grid grid-cols-2 gap-6 sm:gap-8">
                            <div>
                                <p class="text-3xl sm:text-4xl font-extrabold text-white tracking-tight">99.85%</p>
                                <p class="text-xs text-slate-400 mt-1">SLA Adherence</p>
                            </div>
                            <div>
                                <p class="text-3xl sm:text-4xl font-extrabold text-red-400 tracking-tight">18.4%</p>
                                <p class="text-xs text-slate-400 mt-1">Overhead Saved</p>
                            </div>
                            <div>
                                <p class="text-3xl sm:text-4xl font-extrabold text-white tracking-tight">&lt;15 min</p>
                                <p class="text-xs text-slate-400 mt-1">Emergency Dispatch</p>
                            </div>
                            <div>
                                <p class="text-3xl sm:text-4xl font-extrabold text-red-400 tracking-tight">4.95<span class="text-base text-slate-400 font-normal">/5</span></p>
                                <p class="text-xs text-slate-400 mt-1">Client Rating</p>
                            </div>
                        </div>

                        <div class="mt-8 rounded-2xl bg-white/5 border border-white/10 p-5">
                            <p class="text-xs sm:text-sm text-slate-300 italic leading-relaxed">
                                "FacilityPro took over our 400,000 sq.ft commercial tower with zero operational hiccup. Restroom cleanliness ratings jumped 35% in month one."
                            </p>
                            <p class="mt-3 text-xs font-medium text-red-400">— Marcus Vance, Senior VP Property Operations</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Seamless 4-Step Onboarding Blueprint --}}
    <section 
        id="workflow" 
        x-data="scrollReveal(0)"
        :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8 pointer-events-none'"
        class="scroll-mt-20 py-20 sm:py-24 transition-all duration-700 ease-out"
    >
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="max-w-xl mx-auto text-center">
                <span class="inline-flex items-center gap-1.5 rounded-full bg-[#12233F]/10 px-3.5 py-1 text-xs font-semibold text-[#12233F]">
                    <i class="ri-git-commit-line text-xs"></i> Blueprint
                </span>
                <h2 class="mt-3 text-3xl font-extrabold tracking-tight text-slate-900 sm:text-4xl">
                    4-Step Onboarding Workflow
                </h2>
                <p class="mt-3 text-sm text-slate-600 leading-relaxed">
                    Zero-downtime transition from spatial audit to active continuous operations.
                </p>
            </div>

            <div class="mt-14 grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
                <!-- Step 1 -->
                <div class="rounded-3xl border border-slate-200/80 bg-white p-6 shadow-xs hover:border-[#12233F]/30 transition">
                    <span class="flex h-10 w-10 items-center justify-center rounded-full bg-[#12233F] text-xs font-bold text-white">01</span>
                    <h3 class="mt-4 text-base font-bold text-slate-900">Spatial &amp; SLA Audit</h3>
                    <p class="mt-2 text-xs sm:text-sm text-slate-600 leading-relaxed">
                        Thorough inspection of floor layouts and high-traffic zones to establish baseline metrics.
                    </p>
                </div>

                <!-- Step 2 -->
                <div class="rounded-3xl border border-slate-200/80 bg-white p-6 shadow-xs hover:border-[#12233F]/30 transition">
                    <span class="flex h-10 w-10 items-center justify-center rounded-full bg-red-600 text-xs font-bold text-white">02</span>
                    <h3 class="mt-4 text-base font-bold text-slate-900">Staff Deployment</h3>
                    <p class="mt-2 text-xs sm:text-sm text-slate-600 leading-relaxed">
                        Direct-employed, uniformed operators assigned with property-specific standard operating procedures.
                    </p>
                </div>

                <!-- Step 3 -->
                <div class="rounded-3xl border border-slate-200/80 bg-white p-6 shadow-xs hover:border-[#12233F]/30 transition">
                    <span class="flex h-10 w-10 items-center justify-center rounded-full bg-[#12233F] text-xs font-bold text-white">03</span>
                    <h3 class="mt-4 text-base font-bold text-slate-900">IoT QR Telemetry</h3>
                    <p class="mt-2 text-xs sm:text-sm text-slate-600 leading-relaxed">
                        Restroom cleaning schedules and high-touch points logged live via digital QR checkpoints.
                    </p>
                </div>

                <!-- Step 4 -->
                <div class="rounded-3xl border border-slate-200/80 bg-white p-6 shadow-xs hover:border-[#12233F]/30 transition">
                    <span class="flex h-10 w-10 items-center justify-center rounded-full bg-red-600 text-xs font-bold text-white">04</span>
                    <h3 class="mt-4 text-base font-bold text-slate-900">Monthly SLA Review</h3>
                    <p class="mt-2 text-xs sm:text-sm text-slate-600 leading-relaxed">
                        Dedicated directors review audit scores, consumables expenditure, and continuous optimization.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- Clean Testimonials Carousel --}}
    <section 
        id="testimonials" 
        x-data="scrollReveal(0)"
        :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8 pointer-events-none'"
        class="scroll-mt-20 border-t border-slate-100 bg-slate-50/50 py-20 sm:py-24 transition-all duration-700 ease-out"
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
                        Trusted by Facility Leaders
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
                                    <p class="text-[11px] text-slate-400" x-text="item.role + ' • ' + item.company"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </template>
            </div>
        </div>
    </section>

    {{-- Interactive SLA Scope & Pricing Calculator (Clean with Rounded-Full Pills) --}}
    <section 
        id="calculator" 
        x-data="scrollReveal(0)"
        :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8 pointer-events-none'"
        class="scroll-mt-20 py-20 sm:py-24 transition-all duration-700 ease-out"
    >
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="max-w-xl mx-auto text-center">
                <span class="inline-flex items-center gap-1.5 rounded-full bg-[#12233F]/10 px-3.5 py-1 text-xs font-semibold text-[#12233F]">
                    <i class="ri-calculator-line text-xs"></i> Scope Calculator
                </span>
                <h2 class="mt-3 text-3xl font-extrabold tracking-tight text-slate-900 sm:text-4xl">
                    Estimate Facility Scope &amp; SLA
                </h2>
                <p class="mt-3 text-sm text-slate-600 leading-relaxed">
                    Select your facility specs to receive a customized operational proposal.
                </p>
            </div>

            <div 
                class="mx-auto mt-12 max-w-2xl rounded-3xl border border-slate-200/80 bg-white p-7 sm:p-10 shadow-sm"
                x-data="{
                    propertyType: 'hq',
                    sqFt: '15k-50k',
                    submitted: false
                }"
            >
                <form @submit.prevent="submitted = true">
                    <div class="space-y-7">
                        <!-- Step 1: Property Type with Rounded-Full Pills -->
                        <div>
                            <label class="block text-xs font-semibold uppercase tracking-wider text-slate-700 mb-3">1. Property Type</label>
                            <div class="flex flex-wrap gap-2.5">
                                <button 
                                    type="button" 
                                    @click="propertyType = 'hq'"
                                    :class="propertyType === 'hq' ? 'bg-red-600 text-white border-red-600' : 'bg-slate-50 text-slate-700 border-slate-200 hover:border-red-300'"
                                    class="rounded-full border px-5 py-2 text-xs font-medium transition cursor-pointer"
                                >
                                    Corporate HQ
                                </button>
                                <button 
                                    type="button" 
                                    @click="propertyType = 'tower'"
                                    :class="propertyType === 'tower' ? 'bg-red-600 text-white border-red-600' : 'bg-slate-50 text-slate-700 border-slate-200 hover:border-red-300'"
                                    class="rounded-full border px-5 py-2 text-xs font-medium transition cursor-pointer"
                                >
                                    Commercial Tower
                                </button>
                                <button 
                                    type="button" 
                                    @click="propertyType = 'campus'"
                                    :class="propertyType === 'campus' ? 'bg-red-600 text-white border-red-600' : 'bg-slate-50 text-slate-700 border-slate-200 hover:border-red-300'"
                                    class="rounded-full border px-5 py-2 text-xs font-medium transition cursor-pointer"
                                >
                                    Tech Campus
                                </button>
                                <button 
                                    type="button" 
                                    @click="propertyType = 'healthcare'"
                                    :class="propertyType === 'healthcare' ? 'bg-red-600 text-white border-red-600' : 'bg-slate-50 text-slate-700 border-slate-200 hover:border-red-300'"
                                    class="rounded-full border px-5 py-2 text-xs font-medium transition cursor-pointer"
                                >
                                    Healthcare &amp; Lab
                                </button>
                            </div>
                        </div>

                        <!-- Step 2: Floor Area with Rounded-Full Pills -->
                        <div>
                            <label class="block text-xs font-semibold uppercase tracking-wider text-slate-700 mb-3">2. Estimated Floor Space (Sq. Ft)</label>
                            <div class="flex flex-wrap gap-2.5">
                                <button 
                                    type="button" 
                                    @click="sqFt = 'under15k'"
                                    :class="sqFt === 'under15k' ? 'bg-red-600 text-white border-red-600' : 'bg-slate-50 text-slate-700 border-slate-200 hover:border-red-300'"
                                    class="rounded-full border px-5 py-2 text-xs font-medium transition cursor-pointer"
                                >
                                    &lt; 15,000
                                </button>
                                <button 
                                    type="button" 
                                    @click="sqFt = '15k-50k'"
                                    :class="sqFt === '15k-50k' ? 'bg-red-600 text-white border-red-600' : 'bg-slate-50 text-slate-700 border-slate-200 hover:border-red-300'"
                                    class="rounded-full border px-5 py-2 text-xs font-medium transition cursor-pointer"
                                >
                                    15,000 - 50,000
                                </button>
                                <button 
                                    type="button" 
                                    @click="sqFt = '50k-150k'"
                                    :class="sqFt === '50k-150k' ? 'bg-red-600 text-white border-red-600' : 'bg-slate-50 text-slate-700 border-slate-200 hover:border-red-300'"
                                    class="rounded-full border px-5 py-2 text-xs font-medium transition cursor-pointer"
                                >
                                    50,000 - 150,000
                                </button>
                                <button 
                                    type="button" 
                                    @click="sqFt = '150k+'"
                                    :class="sqFt === '150k+' ? 'bg-red-600 text-white border-red-600' : 'bg-slate-50 text-slate-700 border-slate-200 hover:border-red-300'"
                                    class="rounded-full border px-5 py-2 text-xs font-medium transition cursor-pointer"
                                >
                                    150,000+
                                </button>
                            </div>
                        </div>

                        <!-- Step 3: Required Services -->
                        <div>
                            <label class="block text-xs font-semibold uppercase tracking-wider text-slate-700 mb-3">3. Service Modules</label>
                            <div class="grid gap-2.5 sm:grid-cols-2">
                                <label class="flex items-center gap-2.5 rounded-2xl border border-slate-200/80 bg-slate-50/50 p-3 text-xs font-medium text-slate-800 cursor-pointer">
                                    <input type="checkbox" checked class="h-4 w-4 rounded-full text-red-600 focus:ring-red-500" />
                                    <span>Office Sweeping &amp; Janitorial</span>
                                </label>
                                <label class="flex items-center gap-2.5 rounded-2xl border border-slate-200/80 bg-slate-50/50 p-3 text-xs font-medium text-slate-800 cursor-pointer">
                                    <input type="checkbox" checked class="h-4 w-4 rounded-full text-red-600 focus:ring-red-500" />
                                    <span>Restroom Hygiene &amp; Refill</span>
                                </label>
                                <label class="flex items-center gap-2.5 rounded-2xl border border-slate-200/80 bg-slate-50/50 p-3 text-xs font-medium text-slate-800 cursor-pointer">
                                    <input type="checkbox" checked class="h-4 w-4 rounded-full text-red-600 focus:ring-red-500" />
                                    <span>Pantry Stewards &amp; Office Boys</span>
                                </label>
                                <label class="flex items-center gap-2.5 rounded-2xl border border-slate-200/80 bg-slate-50/50 p-3 text-xs font-medium text-slate-800 cursor-pointer">
                                    <input type="checkbox" class="h-4 w-4 rounded-full text-red-600 focus:ring-red-500" />
                                    <span>MEP &amp; HVAC Filter Care</span>
                                </label>
                            </div>
                        </div>

                        <!-- Contact Inputs with Rounded-Full styling -->
                        <div class="grid gap-3 pt-2 sm:grid-cols-2">
                            <div>
                                <label class="block text-xs font-medium text-slate-600 mb-1">Work Email</label>
                                <input type="email" required placeholder="manager@company.com" class="w-full rounded-full border border-slate-200 bg-white px-4 py-2.5 text-xs text-slate-800 focus:border-red-500 focus:outline-none focus:ring-1 focus:ring-red-500" />
                            </div>
                            <div>
                                <label class="block text-xs font-medium text-slate-600 mb-1">Phone Number</label>
                                <input type="tel" required placeholder="+1 (555) 000-0000" class="w-full rounded-full border border-slate-200 bg-white px-4 py-2.5 text-xs text-slate-800 focus:border-red-500 focus:outline-none focus:ring-1 focus:ring-red-500" />
                            </div>
                        </div>

                        <!-- Submit Button (Clean Rounded-Full Pill) -->
                        <div class="pt-2 text-center">
                            <button
                                type="submit"
                                class="inline-flex w-full sm:w-auto items-center justify-center gap-2 rounded-full bg-red-600 px-8 py-3.5 text-xs sm:text-sm font-semibold text-white shadow-sm hover:bg-red-700 transition active:scale-[0.98] cursor-pointer"
                            >
                                <span>Generate SLA Proposal</span>
                                <i class="ri-arrow-right-line text-sm"></i>
                            </button>
                        </div>

                        <!-- Success Note -->
                        <div x-show="submitted" x-cloak class="rounded-2xl bg-red-50 p-4 text-center text-xs font-medium text-red-800">
                            Thank you! Your request has been logged. Our operations director will reach out within 24 hours.
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

    {{-- Clean FAQ Accordion --}}
    <section 
        id="faq" 
        x-data="scrollReveal(0)"
        :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8 pointer-events-none'"
        class="scroll-mt-20 border-t border-slate-100 bg-slate-50/50 py-20 sm:py-24 transition-all duration-700 ease-out"
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
                    Clear answers regarding contracts, staff vetting, and emergency guarantees.
                </p>
            </div>

            <div class="mt-12 space-y-3">
                <!-- FAQ 1 -->
                <div class="rounded-2xl border border-slate-200/80 bg-white shadow-xs overflow-hidden">
                    <button 
                        @click="activeFaq = (activeFaq === 1 ? null : 1)"
                        class="flex w-full items-center justify-between p-5 text-left text-sm font-semibold text-slate-900 transition hover:text-red-700 cursor-pointer gap-4"
                    >
                        <span>How do you guarantee single-point SLA accountability?</span>
                        <span class="flex h-7 w-7 shrink-0 items-center justify-center rounded-full bg-slate-100 text-slate-500">
                            <i :class="activeFaq === 1 ? 'ri-subtract-line text-red-600' : 'ri-add-line'"></i>
                        </span>
                    </button>
                    <div x-show="activeFaq === 1" x-collapse class="px-5 pb-5 text-xs sm:text-sm leading-relaxed text-slate-600 border-t border-slate-100 pt-3">
                        We assign a dedicated SLA Director to your account who conducts weekly audits, oversees shifts, and ensures invoice credits are automatically applied if metrics fall below 99%.
                    </div>
                </div>

                <!-- FAQ 2 -->
                <div class="rounded-2xl border border-slate-200/80 bg-white shadow-xs overflow-hidden">
                    <button 
                        @click="activeFaq = (activeFaq === 2 ? null : 2)"
                        class="flex w-full items-center justify-between p-5 text-left text-sm font-semibold text-slate-900 transition hover:text-red-700 cursor-pointer gap-4"
                    >
                        <span>Are all janitorial and steward staff direct W-2 employees?</span>
                        <span class="flex h-7 w-7 shrink-0 items-center justify-center rounded-full bg-slate-100 text-slate-500">
                            <i :class="activeFaq === 2 ? 'ri-subtract-line text-red-600' : 'ri-add-line'"></i>
                        </span>
                    </button>
                    <div x-show="activeFaq === 2" x-collapse class="px-5 pb-5 text-xs sm:text-sm leading-relaxed text-slate-600 border-t border-slate-100 pt-3">
                        Yes. 100% of our on-site operators are direct W-2 employees with full criminal background checks, standardized uniforms, health coverage, and ongoing safety training.
                    </div>
                </div>

                <!-- FAQ 3 -->
                <div class="rounded-2xl border border-slate-200/80 bg-white shadow-xs overflow-hidden">
                    <button 
                        @click="activeFaq = (activeFaq === 3 ? null : 3)"
                        class="flex w-full items-center justify-between p-5 text-left text-sm font-semibold text-slate-900 transition hover:text-red-700 cursor-pointer gap-4"
                    >
                        <span>What is your emergency dispatch response time for MEP failures?</span>
                        <span class="flex h-7 w-7 shrink-0 items-center justify-center rounded-full bg-slate-100 text-slate-500">
                            <i :class="activeFaq === 3 ? 'ri-subtract-line text-red-600' : 'ri-add-line'"></i>
                        </span>
                    </button>
                    <div x-show="activeFaq === 3" x-collapse class="px-5 pb-5 text-xs sm:text-sm leading-relaxed text-slate-600 border-t border-slate-100 pt-3">
                        Our emergency dispatch team guarantees an on-site technician within under 15 minutes for critical plumbing leaks, electrical power trips, or HVAC disruptions.
                    </div>
                </div>

                <!-- FAQ 4 -->
                <div class="rounded-2xl border border-slate-200/80 bg-white shadow-xs overflow-hidden">
                    <button 
                        @click="activeFaq = (activeFaq === 4 ? null : 4)"
                        class="flex w-full items-center justify-between p-5 text-left text-sm font-semibold text-slate-900 transition hover:text-red-700 cursor-pointer gap-4"
                    >
                        <span>How does the IoT QR code digital cleaning log work?</span>
                        <span class="flex h-7 w-7 shrink-0 items-center justify-center rounded-full bg-slate-100 text-slate-500">
                            <i :class="activeFaq === 4 ? 'ri-subtract-line text-red-600' : 'ri-add-line'"></i>
                        </span>
                    </button>
                    <div x-show="activeFaq === 4" x-collapse class="px-5 pb-5 text-xs sm:text-sm leading-relaxed text-slate-600 border-t border-slate-100 pt-3">
                        Discreet QR checkpoints are affixed in restrooms and high-traffic zones. Operators scan after every service cycle, uploading instant timestamped audit logs to your dashboard.
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
        class="scroll-mt-20 py-20 sm:py-24 transition-all duration-700 ease-out"
    >
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="relative overflow-hidden rounded-3xl bg-[#0B1A30] px-6 py-14 sm:px-12 lg:py-16 text-center text-white border border-slate-800">
                <div class="relative max-w-2xl mx-auto space-y-4">
                    <span class="inline-flex items-center gap-1.5 rounded-full bg-white/10 px-3.5 py-1 text-xs font-semibold text-red-400">
                        <i class="ri-customer-service-2-line text-xs"></i> 24/7 Operations Desk
                    </span>
                    <h2 class="text-3xl font-extrabold tracking-tight text-white sm:text-4xl">
                        Ready to elevate your workplace?
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