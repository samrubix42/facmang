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
    <section class="border-b border-slate-100 py-16 sm:py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-2xl text-center space-y-4">
                <div>
                    <span class="inline-flex items-center gap-2 rounded-full bg-[#12233F]/10 px-3.5 py-1 text-xs font-semibold text-[#12233F]">
                        <span class="h-2 w-2 rounded-full bg-red-500"></span>
                        <span>24/7 Operations Desk</span>
                    </span>
                </div>

                <h1 class="text-3xl font-extrabold leading-[1.15] tracking-tight text-slate-900 sm:text-4xl lg:text-5xl">
                    Connect With Our Operations Team
                </h1>

                <p class="text-sm sm:text-base leading-relaxed text-slate-600 font-normal">
                    Schedule a complimentary on-site spatial audit, inquire about SLAs, or dispatch emergency MEP technicians.
                </p>
            </div>
        </div>
    </section>

    {{-- Contact Quick Pills Grid --}}
    <section class="py-12 border-b border-slate-100 bg-slate-50/50">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-5 sm:grid-cols-2 lg:grid-cols-4">
                
                <!-- Card 1: Phone -->
                <a 
                    href="tel:+18004928820"
                    class="flex items-center gap-4 rounded-3xl border border-slate-200/80 bg-white p-5 shadow-xs transition hover:border-[#12233F]/30 hover:shadow-md"
                >
                    <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-full bg-[#12233F]/10 text-[#12233F]">
                        <i class="ri-phone-fill text-lg"></i>
                    </span>
                    <div class="min-w-0">
                        <p class="text-[11px] font-medium text-slate-400">24/7 Hotline</p>
                        <p class="text-xs sm:text-sm font-bold text-slate-900 truncate">+1 (800) 492-8820</p>
                        <p class="text-[10px] text-[#12233F] font-medium mt-0.5">&lt;15m Response</p>
                    </div>
                </a>

                <!-- Card 2: Email -->
                <a 
                    href="mailto:ops@facilitypro.com"
                    class="flex items-center gap-4 rounded-3xl border border-slate-200/80 bg-white p-5 shadow-xs transition hover:border-[#12233F]/30 hover:shadow-md"
                >
                    <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-full bg-slate-100 text-slate-700">
                        <i class="ri-mail-fill text-lg"></i>
                    </span>
                    <div class="min-w-0">
                        <p class="text-[11px] font-medium text-slate-400">Operations Email</p>
                        <p class="text-xs sm:text-sm font-bold text-slate-900 truncate">ops@facilitypro.com</p>
                        <p class="text-[10px] text-slate-400 mt-0.5">Response &lt;2 hours</p>
                    </div>
                </a>

                <!-- Card 3: Location -->
                <div class="flex items-center gap-4 rounded-3xl border border-slate-200/80 bg-white p-5 shadow-xs">
                    <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-full bg-[#12233F]/10 text-[#12233F]">
                        <i class="ri-map-pin-2-fill text-lg"></i>
                    </span>
                    <div class="min-w-0">
                        <p class="text-[11px] font-medium text-slate-400">Corporate HQ</p>
                        <p class="text-xs sm:text-sm font-bold text-slate-900 truncate">100 Enterprise Plaza</p>
                        <p class="text-[10px] text-slate-400 mt-0.5">Suite 400, Financial Dist.</p>
                    </div>
                </div>

                <!-- Card 4: Hours -->
                <div class="flex items-center gap-4 rounded-3xl border border-slate-200/80 bg-white p-5 shadow-xs">
                    <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-full bg-slate-100 text-slate-700">
                        <i class="ri-time-fill text-lg"></i>
                    </span>
                    <div class="min-w-0">
                        <p class="text-[11px] font-medium text-slate-400">Operating Hours</p>
                        <p class="text-xs sm:text-sm font-bold text-slate-900 truncate">Mon - Sat: 7am - 9pm</p>
                        <p class="text-[10px] text-[#12233F] font-medium mt-0.5">Dispatch Active 24/7</p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- Contact Form & Operational Guarantees --}}
    <section class="py-16 sm:py-20 lg:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-12 lg:grid-cols-12 lg:gap-16 items-start">
                
                <!-- Left: Livewire Form with Rounded-Full Elements -->
                <div class="lg:col-span-7">
                    <div class="rounded-3xl border border-slate-200/80 bg-white p-7 sm:p-10 shadow-xs">
                        
                        <div class="mb-8">
                            <span class="inline-flex items-center gap-1.5 rounded-full bg-[#12233F]/10 px-3.5 py-1 text-xs font-semibold text-[#12233F]">
                                <i class="ri-send-plane-line text-xs"></i> Proposal
                            </span>
                            <h2 class="mt-3 text-2xl sm:text-3xl font-bold tracking-tight text-slate-900">Request SLA Proposal</h2>
                            <p class="mt-2 text-xs sm:text-sm text-slate-500">
                                Complete the brief form below to receive a benchmark SLA proposal within 24 hours.
                            </p>
                        </div>

                        <!-- Success Alert Banner -->
                        @if ($submitted)
                            <div class="mb-6 rounded-2xl bg-[#12233F]/10 p-4 text-xs sm:text-sm text-[#12233F] border border-[#12233F]/10">
                                <div class="flex items-center gap-3">
                                    <i class="ri-checkbox-circle-fill text-xl text-[#12233F] shrink-0"></i>
                                    <div>
                                        <p class="font-bold">Proposal Request Received</p>
                                        <p class="text-xs text-[#12233F] mt-0.5">Our operations director will contact you within 24 hours.</p>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <form wire:submit="submit" class="space-y-5">
                            
                            <!-- Name -->
                            <div>
                                <label for="contact-name" class="block text-xs font-semibold uppercase tracking-wider text-slate-700 mb-1.5">Full Name *</label>
                                <input
                                    id="contact-name"
                                    type="text"
                                    wire:model="name"
                                    placeholder="e.g. Jane Doe"
                                    class="w-full rounded-full border border-slate-200 bg-white px-5 py-3 text-xs sm:text-sm text-slate-800 placeholder:text-slate-400 focus:border-red-500 focus:outline-none focus:ring-1 focus:ring-red-500"
                                />
                                @error('name') <span class="text-xs text-rose-600 font-medium mt-1 block">{{ $message }}</span> @enderror
                            </div>

                            <!-- Email & Phone -->
                            <div class="grid gap-4 sm:grid-cols-2">
                                <div>
                                    <label for="contact-email" class="block text-xs font-semibold uppercase tracking-wider text-slate-700 mb-1.5">Work Email *</label>
                                    <input
                                        id="contact-email"
                                        type="email"
                                        wire:model="email"
                                        placeholder="jane@company.com"
                                        class="w-full rounded-full border border-slate-200 bg-white px-5 py-3 text-xs sm:text-sm text-slate-800 placeholder:text-slate-400 focus:border-red-500 focus:outline-none focus:ring-1 focus:ring-red-500"
                                    />
                                    @error('email') <span class="text-xs text-rose-600 font-medium mt-1 block">{{ $message }}</span> @enderror
                                </div>

                                <div>
                                    <label for="contact-phone" class="block text-xs font-semibold uppercase tracking-wider text-slate-700 mb-1.5">Phone Number *</label>
                                    <input
                                        id="contact-phone"
                                        type="tel"
                                        wire:model="phone"
                                        placeholder="+1 (555) 000-0000"
                                        class="w-full rounded-full border border-slate-200 bg-white px-5 py-3 text-xs sm:text-sm text-slate-800 placeholder:text-slate-400 focus:border-red-500 focus:outline-none focus:ring-1 focus:ring-red-500"
                                    />
                                    @error('phone') <span class="text-xs text-rose-600 font-medium mt-1 block">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <!-- Property Type -->
                            <div>
                                <label for="property-type" class="block text-xs font-semibold uppercase tracking-wider text-slate-700 mb-1.5">Property Type</label>
                                <select
                                    id="property-type"
                                    wire:model="propertyType"
                                    class="w-full rounded-full border border-slate-200 bg-white px-5 py-3 text-xs sm:text-sm text-slate-800 focus:border-red-500 focus:outline-none focus:ring-1 focus:ring-red-500 cursor-pointer"
                                >
                                    <option value="Corporate Office Tower">Corporate Office Tower</option>
                                    <option value="Tech Innovation Campus">Tech Innovation Campus</option>
                                    <option value="Healthcare / Medical Facility">Healthcare / Medical Facility</option>
                                    <option value="Commercial Mall / Retail Hub">Commercial Mall / Retail Hub</option>
                                    <option value="Industrial / Warehouse Center">Industrial / Warehouse Center</option>
                                </select>
                            </div>

                            <!-- Message -->
                            <div>
                                <label for="contact-message" class="block text-xs font-semibold uppercase tracking-wider text-slate-700 mb-1.5">Requirements &amp; Scope *</label>
                                <textarea
                                    id="contact-message"
                                    wire:model="message"
                                    rows="4"
                                    placeholder="Please provide floor space estimate and required services..."
                                    class="w-full rounded-2xl border border-slate-200 bg-white px-5 py-3 text-xs sm:text-sm text-slate-800 placeholder:text-slate-400 focus:border-red-500 focus:outline-none focus:ring-1 focus:ring-red-500"
                                ></textarea>
                                @error('message') <span class="text-xs text-rose-600 font-medium mt-1 block">{{ $message }}</span> @enderror
                            </div>

                            <!-- Submit Button (Clean Rounded-Full Pill) -->
                            <div class="pt-2">
                                <button
                                    type="submit"
                                    class="inline-flex w-full sm:w-auto items-center justify-center gap-2 rounded-full bg-red-600 px-8 py-3.5 text-xs sm:text-sm font-semibold text-white shadow-sm hover:bg-red-700 transition active:scale-[0.98] cursor-pointer"
                                >
                                    <i class="ri-send-plane-fill text-sm"></i>
                                    <span>Submit Request</span>
                                </button>
                            </div>

                        </form>

                    </div>
                </div>

                <!-- Right: Guarantees & Support Cards -->
                <div class="lg:col-span-5 space-y-6">
                    <div>
                        <span class="inline-flex items-center gap-1.5 rounded-full bg-[#12233F]/10 px-3.5 py-1 text-xs font-semibold text-[#12233F]">
                            <i class="ri-shield-check-line text-xs"></i> Direct Support
                        </span>
                        <h2 class="mt-3 text-2xl sm:text-3xl font-bold tracking-tight text-slate-900">Why Partner With Us?</h2>
                        <p class="mt-2 text-xs sm:text-sm text-slate-500 leading-relaxed">
                            Direct management ensures accountability, zero vendor margin, and rapid emergency intervention.
                        </p>
                    </div>

                    <div class="space-y-4">
                        <div class="flex gap-4 rounded-3xl border border-slate-200/80 bg-white p-6 shadow-xs">
                            <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-[#12233F]/10 text-[#12233F]">
                                <i class="ri-flashlight-line text-lg"></i>
                            </span>
                            <div>
                                <h3 class="text-sm font-bold text-slate-900">&lt;15 Min Dispatch Guarantee</h3>
                                <p class="mt-1 text-xs text-slate-500 leading-relaxed">Emergency plumbing leaks, electrical trips, or HVAC disruptions resolved promptly by on-call engineers.</p>
                            </div>
                        </div>

                        <div class="flex gap-4 rounded-3xl border border-slate-200/80 bg-white p-6 shadow-xs">
                            <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-[#12233F] text-white">
                                <i class="ri-file-search-line text-lg"></i>
                            </span>
                            <div>
                                <h3 class="text-sm font-bold text-slate-900">Free Spatial Audit</h3>
                                <p class="mt-1 text-xs text-slate-500 leading-relaxed">Our senior operations director inspects your layout and delivers a benchmark SLA report within 48h.</p>
                            </div>
                        </div>

                        <div class="flex gap-4 rounded-3xl border border-slate-200/80 bg-white p-6 shadow-xs">
                            <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-[#12233F]/10 text-[#12233F]">
                                <i class="ri-shield-user-line text-lg"></i>
                            </span>
                            <div>
                                <h3 class="text-sm font-bold text-slate-900">Dedicated Account Director</h3>
                                <p class="mt-1 text-xs text-slate-500 leading-relaxed">A single point of contact responsible for weekly QR cleaning logs and monthly optimization reviews.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Certification Strip -->
                    <div class="rounded-3xl bg-[#0B1A30] p-6 text-white shadow-sm border border-slate-800">
                        <p class="text-[10px] font-semibold uppercase tracking-wider text-red-400">Compliance Standard</p>
                        <p class="mt-1 text-xs font-semibold text-slate-200">ISSA CIMS &amp; ISO 41001 Certified Facility Partner</p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- Map Section (Clean Rounded Frame) --}}
    <section class="border-t border-slate-100 bg-slate-50/50 py-16 sm:py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="relative overflow-hidden rounded-3xl border border-slate-200/80 bg-white shadow-xs">
                
                <!-- Header Bar -->
                <div class="flex flex-wrap items-center justify-between gap-4 p-5 sm:px-8 border-b border-slate-100 bg-white">
                    <div class="flex items-center gap-3">
                        <span class="flex h-9 w-9 items-center justify-center rounded-full bg-[#12233F]/10 text-[#12233F]">
                            <i class="ri-map-pin-2-fill text-base"></i>
                        </span>
                        <div>
                            <h3 class="text-sm font-bold text-slate-900">FacilityPro Operations HQ</h3>
                            <p class="text-xs text-slate-500">100 Enterprise Plaza, Suite 400, Financial District</p>
                        </div>
                    </div>
                    <a 
                        href="https://maps.google.com" 
                        target="_blank" 
                        rel="noopener noreferrer"
                        class="inline-flex items-center gap-2 rounded-full border border-slate-200 bg-white px-5 py-2 text-xs font-semibold text-slate-800 shadow-xs hover:border-[#12233F]/40 hover:text-[#12233F] transition"
                    >
                        <span>Directions</span>
                        <i class="ri-external-link-line text-xs"></i>
                    </a>
                </div>

                <!-- Google Map Iframe -->
                <div class="relative h-[420px] sm:h-[480px] w-full">
                    <iframe 
                        title="FacilityPro Headquarters Location Map"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3151.83543450937!2d144.95373631531825!3d-37.81627977975171!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad65d4c2b349649%3A0xb6899234e561db11!2sEnvato!5e0!3m2!1sen!2s!4v1625000000000!5m2!1sen!2s" 
                        class="h-full w-full border-0" 
                        allowfullscreen="" 
                        loading="lazy"
                    ></iframe>
                </div>

            </div>
        </div>
    </section>

</div>