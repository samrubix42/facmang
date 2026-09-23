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
    <section class="relative overflow-hidden bg-white py-12 lg:py-16 border-b border-slate-200/80">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-3xl text-center space-y-4">
                <div>
                    <span class="inline-flex items-center gap-2 rounded-full border border-emerald-200 bg-emerald-50 px-3.5 py-1.5 text-xs font-bold uppercase tracking-wider text-emerald-800">
                        <span class="h-2 w-2 rounded-full bg-emerald-500 animate-pulse"></span>
                        <span>24/7 Operations Hotline & Support</span>
                    </span>
                </div>

                <h1 class="text-2xl font-extrabold leading-[1.15] tracking-tight text-slate-900 sm:text-4xl lg:text-5xl">
                    Contact Our <span class="text-emerald-600">Facility Operations HQ</span>
                </h1>

                <p class="text-sm leading-relaxed text-slate-600 sm:text-base lg:text-lg">
                    Whether you need a free on-site spatial audit, an emergency dispatch line, or a customized SLA proposal, our facility directors are ready to assist you.
                </p>
            </div>
        </div>
    </section>

    {{-- Quick Contact Info Grid --}}
    <section 
        x-data="scrollReveal(0)"
        :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8 pointer-events-none'"
        class="py-12 bg-slate-50 border-b border-slate-200/80 transition-all duration-700 ease-out transform"
    >
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
                
                <!-- Card 1: Phone -->
                <a 
                    href="tel:+18004928820"
                    x-data="scrollReveal(100)"
                    :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'"
                    class="group flex items-center gap-4 rounded-2xl border border-slate-200 bg-white p-5 shadow-xs transition duration-300 hover:-translate-y-1 hover:border-emerald-400 hover:shadow-md"
                >
                    <span class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-emerald-50 text-emerald-600 border border-emerald-200/60 group-hover:bg-emerald-600 group-hover:text-white transition-colors">
                        <i class="ri-phone-fill text-xl"></i>
                    </span>
                    <div>
                        <p class="text-[10px] font-bold uppercase tracking-wider text-slate-400">24/7 Dispatch</p>
                        <p class="text-sm font-bold text-slate-900 group-hover:text-emerald-700 transition-colors">+1 (800) 492-8820</p>
                        <p class="text-[11px] text-slate-500 mt-0.5">&lt;15m Emergency Line</p>
                    </div>
                </a>

                <!-- Card 2: Email -->
                <a 
                    href="mailto:ops@facilitypro.com"
                    x-data="scrollReveal(200)"
                    :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'"
                    class="group flex items-center gap-4 rounded-2xl border border-slate-200 bg-white p-5 shadow-xs transition duration-300 hover:-translate-y-1 hover:border-emerald-400 hover:shadow-md"
                >
                    <span class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-emerald-50 text-emerald-600 border border-emerald-200/60 group-hover:bg-emerald-600 group-hover:text-white transition-colors">
                        <i class="ri-mail-fill text-xl"></i>
                    </span>
                    <div>
                        <p class="text-[10px] font-bold uppercase tracking-wider text-slate-400">Operations Email</p>
                        <p class="text-sm font-bold text-slate-900 group-hover:text-emerald-700 transition-colors">ops@facilitypro.com</p>
                        <p class="text-[11px] text-slate-500 mt-0.5">Response within 2h</p>
                    </div>
                </a>

                <!-- Card 3: Location -->
                <div 
                    x-data="scrollReveal(300)"
                    :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'"
                    class="flex items-center gap-4 rounded-2xl border border-slate-200 bg-white p-5 shadow-xs transition duration-300 hover:border-emerald-300"
                >
                    <span class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-emerald-50 text-emerald-600 border border-emerald-200/60">
                        <i class="ri-map-pin-2-fill text-xl"></i>
                    </span>
                    <div>
                        <p class="text-[10px] font-bold uppercase tracking-wider text-slate-400">Corporate HQ</p>
                        <p class="text-sm font-bold text-slate-900">100 Enterprise Plaza</p>
                        <p class="text-[11px] text-slate-500 mt-0.5">Suite 400, Financial Dist.</p>
                    </div>
                </div>

                <!-- Card 4: Hours -->
                <div 
                    x-data="scrollReveal(400)"
                    :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'"
                    class="flex items-center gap-4 rounded-2xl border border-slate-200 bg-white p-5 shadow-xs transition duration-300 hover:border-emerald-300"
                >
                    <span class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-emerald-50 text-emerald-600 border border-emerald-200/60">
                        <i class="ri-time-fill text-xl"></i>
                    </span>
                    <div>
                        <p class="text-[10px] font-bold uppercase tracking-wider text-slate-400">Office Hours</p>
                        <p class="text-sm font-bold text-slate-900">Mon - Sat: 7am - 9pm</p>
                        <p class="text-[11px] text-emerald-600 font-semibold mt-0.5">Emergency Dispatch 24/7</p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- Contact Form & Operational Guarantees --}}
    <section 
        x-data="scrollReveal(0)"
        :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8 pointer-events-none'"
        class="py-16 sm:py-20 bg-white border-b border-slate-200/80 transition-all duration-700 ease-out transform"
    >
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-12 lg:grid-cols-12 lg:gap-16 items-start">
                
                <!-- Left Column: Interactive Livewire Contact Form -->
                <div class="lg:col-span-7">
                    <div class="rounded-3xl border border-slate-200 bg-slate-50/50 p-6 sm:p-8 lg:p-10 shadow-lg shadow-slate-200/50">
                        
                        <div class="mb-6">
                            <span class="inline-flex items-center gap-2 rounded-md border border-emerald-200 bg-emerald-50 px-3 py-1 text-[10px] font-bold uppercase tracking-[0.2em] text-emerald-800">
                                <i class="ri-send-plane-line text-emerald-600"></i>
                                <span>Send Message</span>
                            </span>
                            <h2 class="mt-3 text-2xl font-extrabold text-slate-900 sm:text-3xl">Request SLA Proposal</h2>
                            <p class="mt-2 text-xs sm:text-sm text-slate-600">
                                Fill out the form below to receive a custom facility audit and pricing proposal within 24 hours.
                            </p>
                        </div>

                        <!-- Success Alert Banner -->
                        @if ($submitted)
                            <div class="mb-6 rounded-2xl border border-emerald-300 bg-emerald-50 p-4 text-xs sm:text-sm text-emerald-900">
                                <div class="flex items-center gap-3">
                                    <i class="ri-checkbox-circle-fill text-xl text-emerald-600 shrink-0"></i>
                                    <div>
                                        <p class="font-bold">Message Sent Successfully!</p>
                                        <p class="text-xs text-emerald-700 mt-0.5">Thank you for reaching out. Our operations director will contact you within 24 hours.</p>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <form wire:submit="submit" class="space-y-4">
                            
                            <!-- Name -->
                            <div>
                                <label for="contact-name" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">Full Name *</label>
                                <input
                                    id="contact-name"
                                    type="text"
                                    wire:model="name"
                                    placeholder="e.g. Jane Doe"
                                    class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-xs sm:text-sm text-slate-900 focus:border-emerald-500 focus:outline-none focus:ring-1 focus:ring-emerald-500"
                                />
                                @error('name') <span class="text-xs text-rose-600 font-semibold mt-1 block">{{ $message }}</span> @enderror
                            </div>

                            <!-- Email & Phone Grid -->
                            <div class="grid gap-4 sm:grid-cols-2">
                                <div>
                                    <label for="contact-email" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">Work Email *</label>
                                    <input
                                        id="contact-email"
                                        type="email"
                                        wire:model="email"
                                        placeholder="jane@company.com"
                                        class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-xs sm:text-sm text-slate-900 focus:border-emerald-500 focus:outline-none focus:ring-1 focus:ring-emerald-500"
                                    />
                                    @error('email') <span class="text-xs text-rose-600 font-semibold mt-1 block">{{ $message }}</span> @enderror
                                </div>

                                <div>
                                    <label for="contact-phone" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">Phone Number *</label>
                                    <input
                                        id="contact-phone"
                                        type="tel"
                                        wire:model="phone"
                                        placeholder="+1 (555) 000-0000"
                                        class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-xs sm:text-sm text-slate-900 focus:border-emerald-500 focus:outline-none focus:ring-1 focus:ring-emerald-500"
                                    />
                                    @error('phone') <span class="text-xs text-rose-600 font-semibold mt-1 block">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <!-- Property Type Select -->
                            <div>
                                <label for="property-type" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">Facility Property Type</label>
                                <select
                                    id="property-type"
                                    wire:model="propertyType"
                                    class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-xs sm:text-sm text-slate-900 focus:border-emerald-500 focus:outline-none focus:ring-1 focus:ring-emerald-500 cursor-pointer"
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
                                <label for="contact-message" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">SLA Requirements & Message *</label>
                                <textarea
                                    id="contact-message"
                                    wire:model="message"
                                    rows="4"
                                    placeholder="Please describe your floor square footage, required services (sweeping, toilet hygiene, office boy staffing, MEP), and timeline..."
                                    class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-xs sm:text-sm text-slate-900 focus:border-emerald-500 focus:outline-none focus:ring-1 focus:ring-emerald-500"
                                ></textarea>
                                @error('message') <span class="text-xs text-rose-600 font-semibold mt-1 block">{{ $message }}</span> @enderror
                            </div>

                            <!-- Submit Button -->
                            <div class="pt-2">
                                <button
                                    type="submit"
                                    class="inline-flex w-full items-center justify-center gap-2 rounded-xl bg-emerald-600 px-7 py-3.5 text-xs sm:text-sm font-bold uppercase tracking-wider text-white shadow-lg shadow-emerald-600/25 transition hover:bg-emerald-700 cursor-pointer active:scale-[0.98]"
                                >
                                    <i class="ri-send-plane-fill text-base"></i>
                                    <span>Submit Request</span>
                                </button>
                            </div>

                        </form>

                    </div>
                </div>

                <!-- Right Column: Operational Guarantees & Support Cards -->
                <div class="lg:col-span-5 space-y-6">
                    <div>
                        <span class="inline-flex items-center gap-2 rounded-md border border-emerald-200 bg-emerald-50 px-3 py-1 text-[10px] font-bold uppercase tracking-[0.2em] text-emerald-800">
                            <i class="ri-shield-check-line text-emerald-600"></i>
                            <span>Direct SLA Support</span>
                        </span>
                        <h2 class="mt-3 text-2xl font-extrabold text-slate-900 sm:text-3xl">Why Connect With Us?</h2>
                        <p class="mt-2 text-xs sm:text-sm text-slate-600 leading-relaxed">
                            Our executive dispatch team handles on-site spatial audits, emergency technical repair, and customized janitorial staffing without third-party delay.
                        </p>
                    </div>

                    <div class="space-y-4">
                        <div class="flex gap-4 rounded-2xl border border-slate-200/90 bg-slate-50/70 p-5">
                            <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-emerald-600 text-white font-bold shadow-xs">
                                <i class="ri-flashlight-line text-xl"></i>
                            </span>
                            <div>
                                <h3 class="text-sm font-bold text-slate-900">&lt;15 Min Dispatch Guarantee</h3>
                                <p class="mt-1 text-xs text-slate-600 leading-relaxed">Emergency plumbing leaks, electrical trips, or HVAC filter issues resolved immediately by on-call technicians.</p>
                            </div>
                        </div>

                        <div class="flex gap-4 rounded-2xl border border-slate-200/90 bg-slate-50/70 p-5">
                            <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-slate-900 text-white font-bold shadow-xs">
                                <i class="ri-file-search-line text-xl"></i>
                            </span>
                            <div>
                                <h3 class="text-sm font-bold text-slate-900">Complimentary Spatial Audit</h3>
                                <p class="mt-1 text-xs text-slate-600 leading-relaxed">Our senior operations director inspects your property layout and provides a benchmark SLA cost report within 48h.</p>
                            </div>
                        </div>

                        <div class="flex gap-4 rounded-2xl border border-slate-200/90 bg-slate-50/70 p-5">
                            <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-emerald-600 text-white font-bold shadow-xs">
                                <i class="ri-shield-user-line text-xl"></i>
                            </span>
                            <div>
                                <h3 class="text-sm font-bold text-slate-900">Dedicated Account Executive</h3>
                                <p class="mt-1 text-xs text-slate-600 leading-relaxed">A single point of contact responsible for weekly QR cleaning audit reviews and monthly cost optimization reports.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Certification Strip -->
                    <div class="rounded-2xl bg-emerald-950 p-5 text-white shadow-xl">
                        <p class="text-[10px] font-bold uppercase tracking-[0.2em] text-emerald-400">Compliance Standard</p>
                        <p class="mt-1 text-xs font-semibold text-emerald-100">ISSA CIMS & ISO 41001 Certified Facility Partner</p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- Full-Size Immersive Map Section --}}
    <section class="relative w-full bg-slate-900">
        
        <!-- Full Size Map Container -->
        <div class="relative w-full h-[520px] sm:h-[600px] lg:h-[680px]">
            
            <!-- Top Location Header Bar -->
            <div class="absolute top-0 left-0 right-0 z-20 bg-slate-950/90 text-white px-4 py-3.5 sm:px-8 flex items-center justify-between border-b border-slate-800/80 backdrop-blur-md">
                <div class="flex items-center gap-3">
                    <span class="flex h-8 w-8 items-center justify-center rounded-lg bg-emerald-600 text-white font-bold">
                        <i class="ri-map-pin-2-fill text-base"></i>
                    </span>
                    <div>
                        <h3 class="text-xs sm:text-sm font-bold text-white">FacilityPro Operations HQ Map</h3>
                        <p class="text-[10px] sm:text-[11px] text-emerald-400">100 Enterprise Plaza, Suite 400, Financial District</p>
                    </div>
                </div>
                <a 
                    href="https://maps.google.com" 
                    target="_blank" 
                    rel="noopener noreferrer"
                    class="inline-flex items-center gap-2 rounded-lg border border-emerald-600/50 bg-emerald-600 px-3.5 py-1.5 text-xs font-bold text-white transition hover:bg-emerald-500 shadow-md"
                >
                    <span>Open Directions</span>
                    <i class="ri-external-link-line text-xs"></i>
                </a>
            </div>

            <!-- 100% Full Size Google Map Iframe -->
            <iframe 
                title="FacilityPro Headquarters Location Full Size Map"
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3151.83543450937!2d144.95373631531825!3d-37.81627977975171!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad65d4c2b349649%3A0xb6899234e561db11!2sEnvato!5e0!3m2!1sen!2s!4v1625000000000!5m2!1sen!2s" 
                class="absolute inset-0 h-full w-full border-0 filter contrast-[1.05] brightness-[0.98]" 
                allowfullscreen="" 
                loading="lazy"
            ></iframe>

            <!-- Floating Telemetry Glass Card Overlay -->
            <div class="absolute bottom-6 left-4 right-4 sm:left-8 sm:right-auto sm:max-w-sm z-20 rounded-2xl border border-white/40 bg-white/95 p-5 shadow-2xl backdrop-blur-md">
                <div class="flex items-start gap-4">
                    <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-emerald-600 text-white font-bold shadow-md">
                        <i class="ri-building-4-fill text-2xl"></i>
                    </div>
                    <div>
                        <div class="flex items-center gap-2">
                            <span class="h-2 w-2 rounded-full bg-emerald-500 animate-pulse"></span>
                            <span class="text-[10px] font-bold uppercase tracking-wider text-emerald-700">Live HQ Command Center</span>
                        </div>
                        <h4 class="text-sm font-extrabold text-slate-900 mt-0.5">FacilityPro Management Inc.</h4>
                        <p class="text-xs text-slate-600 mt-1 leading-relaxed">
                            100 Enterprise Plaza, Suite 400<br />
                            Financial District HQ
                        </p>
                        <div class="mt-3 flex items-center gap-3 border-t border-slate-200/60 pt-2 text-[11px] text-slate-500 font-medium">
                            <span><i class="ri-phone-line text-emerald-600"></i> +1 (800) 492-8820</span>
                            <span>•</span>
                            <span>24/7/365 Active</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

</div>