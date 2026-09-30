

<div class="bg-white text-slate-800 antialiased font-sans selection:bg-red-500 selection:text-white">

    {{-- Page Hero --}}
    <section class="bg-[#0B1A30]">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            <nav class="border-b border-white/10 py-3.5 text-xs" aria-label="Breadcrumb">
                <ol class="flex flex-wrap items-center gap-1.5">
                    <li><a href="{{ route('home') }}" class="font-medium text-slate-400 transition hover:text-white">Home</a></li>
                    <li aria-hidden="true"><i class="ri-arrow-right-s-line text-slate-600"></i></li>
                    <li><span class="font-semibold text-white" aria-current="page">Contact Us</span></li>
                </ol>
            </nav>

            <div class="py-14 sm:py-20 lg:py-24">
                <h1 class="text-4xl font-extrabold leading-[1.05] tracking-tighter text-white sm:text-5xl lg:text-6xl">
                    Contact Us
                </h1>

                <p class="mt-4 max-w-2xl text-sm leading-relaxed text-slate-300 sm:text-base">
                    Tell us what you need — we reply within two hours.
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
                    href="tel:{{ setting('phone', '+91 88105-67716') }}"
                    class="flex items-center gap-4 rounded-3xl border border-slate-200/80 bg-white p-5 shadow-xs transition hover:border-[#12233F]/30 hover:shadow-md"
                >
                    <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-full bg-red-600 text-white">
                        <i class="ri-phone-fill text-lg"></i>
                    </span>
                    <div class="min-w-0">
                        <p class="text-[11px] font-medium text-slate-400">24/7 Hotline</p>
                        <p class="text-xs sm:text-sm font-bold text-slate-900 truncate">{{ setting('phone', '+91 88105-67716') }}</p>

                        <p class="text-[10px] text-[#12233F] font-medium mt-0.5">Direct Support</p>
                    </div>
                </a>

                <!-- Card 2: Email -->
                <a 
                    href="mailto:{{ setting('email', 'info@realfacilityservices.com') }}"
                    class="flex items-center gap-4 rounded-3xl border border-slate-200/80 bg-white p-5 shadow-xs transition hover:border-[#12233F]/30 hover:shadow-md"
                >
                    <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-full bg-[#12233F]/10 text-[#12233F]">
                        <i class="ri-mail-fill text-lg"></i>
                    </span>
                    <div class="min-w-0">
                        <p class="text-[11px] font-medium text-slate-400">Operations Email</p>
                        <p class="text-xs sm:text-sm font-bold text-slate-900 truncate">{{ setting('email', 'info@realfacilityservices.com') }}</p>
                        <p class="text-[10px] text-slate-400 mt-0.5">Direct Inquiry</p>
                    </div>
                </a>

                <!-- Card 3: Location -->
                <div class="flex items-center gap-4 rounded-3xl border border-slate-200/80 bg-white p-5 shadow-xs">
                    <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-full bg-[#12233F]/10 text-[#12233F]">
                        <i class="ri-map-pin-2-fill text-lg"></i>
                    </span>
                    <div class="min-w-0">
                        <p class="text-[11px] font-medium text-slate-400">Corporate HQ</p>
                        <p class="text-xs sm:text-sm font-bold text-slate-900 leading-snug">{{ setting('address', 'Office No. 2, First Floor, Plot No. 128, New Haibatpur, Near Gaur City Mall, Sector 4, Greater Noida West (U.P.) 201318') }}</p>
                    </div>
                </div>

                <!-- Card 4: Hours -->
                <div class="flex items-center gap-4 rounded-3xl border border-slate-200/80 bg-white p-5 shadow-xs">
                    <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-full bg-[#12233F]/10 text-[#12233F]">
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
    <section class="py-14 sm:py-20 lg:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-12 lg:grid-cols-12 lg:gap-16 items-start">
                
                <!-- Left: Livewire Form with Rounded-Full Elements -->
                <div class="lg:col-span-7">
                    <div class="rounded-3xl border border-slate-200/80 bg-white p-5 sm:p-8 lg:p-10 shadow-xs">
                        
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
                        @if (session()->has('success') || $submitted)
                            <div class="mb-6 rounded-2xl bg-emerald-50 p-4 text-xs sm:text-sm text-emerald-900 border border-emerald-200 shadow-xs flex items-center justify-between">
                                <div class="flex items-center gap-3">
                                    <i class="ri-checkbox-circle-fill text-xl text-emerald-600 shrink-0"></i>
                                    <div>
                                        <p class="font-bold">Proposal Request Received</p>
                                        <p class="text-xs text-emerald-700 mt-0.5">{{ session('success', 'Our operations director will contact you within 24 hours.') }}</p>
                                    </div>
                                </div>
                            </div>
                        @endif


                        <form wire:submit.prevent="addcontact" class="space-y-5">
                            
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

                            <!-- Submit Button with Interactive Loading State -->
                            <div class="pt-2">
                                <button
                                    type="submit"
                                  
                                    class="inline-flex w-full sm:w-auto items-center justify-center gap-2 rounded-full bg-red-600 px-8 py-3.5 text-xs sm:text-sm font-semibold text-white shadow-sm hover:bg-red-700 transition active:scale-[0.98] cursor-pointer disabled:opacity-70 disabled:cursor-not-allowed"
                                >
                                    <span wire:loading.remove wire:target="addcontact" class="inline-flex items-center gap-2">
                                        <i class="ri-send-plane-fill text-sm"></i>
                                        <span>Submit Request</span>
                                    </span>

                                    <span wire:loading wire:target="addcontact" class="inline-flex items-center gap-2">
                                        <i class="ri-loader-4-line text-sm animate-spin"></i>
                                        <span>Submitting Request...</span>
                                    </span>
                                </button>
                            </div>

                        </form>

                    </div>
                </div>

                <!-- Right: Guarantees & Support Cards -->
                <div class="lg:col-span-5 space-y-6">
                    <div>
                        <span class="inline-flex items-center gap-1.5 rounded-full bg-[#12233F]/10 px-3.5 py-1 text-xs font-semibold text-[#12233F]">
                            <i class="ri-shield-check-line text-xs"></i> Direct Management
                        </span>
                        <h2 class="mt-3 text-2xl sm:text-3xl font-bold tracking-tight text-slate-900">Why Partner With Us?</h2>
                        <p class="mt-2 text-xs sm:text-sm text-slate-500 leading-relaxed">
                            Integrated soft and technical facility solutions shaped around your requirements, backed by trained teams, ISO-certified standards, and 24/7 support.
                        </p>
                    </div>

                    <div class="space-y-4">
                        <div class="flex gap-4 rounded-3xl border border-slate-200/80 bg-white p-6 shadow-xs">
                            <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-[#12233F]/10 text-[#12233F]">
                                <i class="ri-building-2-line text-lg"></i>
                            </span>
                            <div>
                                <h3 class="text-sm font-bold text-slate-900">Integrated Facility Services</h3>
                                <p class="mt-1 text-xs text-slate-500 leading-relaxed">Bringing housekeeping, mechanized operations, horticulture, and technical MEP maintenance together under one accountable management team.</p>
                            </div>
                        </div>

                        <div class="flex gap-4 rounded-3xl border border-slate-200/80 bg-white p-6 shadow-xs">
                            <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-[#12233F] text-white">
                                <i class="ri-shield-star-line text-lg"></i>
                            </span>
                            <div>
                                <h3 class="text-sm font-bold text-slate-900">Audits &amp; SLA Compliance</h3>
                                <p class="mt-1 text-xs text-slate-500 leading-relaxed">ISO 9001:2015 certified processes with digital supervisor checklists, internal audits, and transparent performance reviews.</p>
                            </div>
                        </div>

                        <div class="flex gap-4 rounded-3xl border border-slate-200/80 bg-white p-6 shadow-xs">
                            <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-[#12233F]/10 text-[#12233F]">
                                <i class="ri-customer-service-2-line text-lg"></i>
                            </span>
                            <div>
                                <h3 class="text-sm font-bold text-slate-900">24/7 Operational Support</h3>
                                <p class="mt-1 text-xs text-slate-500 leading-relaxed">Round-the-clock support desk and trained technical staff ensuring reliable, uninterrupted facility operations.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Certification Strip -->
                    <div class="rounded-3xl bg-[#0B1A30] p-6 text-white shadow-sm border border-slate-800">
                        <p class="text-[10px] font-semibold uppercase tracking-wider text-red-400">Quality Management</p>
                        <p class="mt-1 text-xs font-semibold text-slate-200">ISO 9001:2015 Certified Facility Partner</p>
                    </div>

                    <!-- Emergency Dispatch CTA -->
                    <a
                        href="tel:{{ setting('phone', '+91 88105-67716') }}"
                        class="flex items-center justify-between gap-4 rounded-3xl bg-red-600 p-6 text-white shadow-sm transition hover:bg-red-700 active:scale-[0.99]"
                    >
                        <div class="flex items-center gap-3">
                            <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-white/15">
                                <i class="ri-phone-fill text-lg"></i>
                            </span>
                            <div>
                                <h3 class="text-sm font-bold">24/7 Operational Helpline</h3>
                                <p class="text-[10px] text-white/80">Direct operations line — always live ({{ setting('phone', '+91 88105-67716') }})</p>
                            </div>
                        </div>
                        <i class="ri-arrow-right-line text-lg"></i>
                    </a>
                </div>

            </div>
        </div>
    </section>

    {{-- Map Section (Clean Rounded Frame) --}}
    <section class="border-t border-slate-100 bg-slate-50/50 py-14 sm:py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="relative overflow-hidden rounded-3xl border border-slate-200/80 bg-white shadow-xs">
                
                <!-- Header Bar -->
                <div class="flex flex-wrap items-center justify-between gap-4 p-5 sm:px-8 border-b border-slate-100 bg-white">
                    <div class="flex items-center gap-3">
                        <span class="flex h-9 w-9 items-center justify-center rounded-full bg-[#12233F]/10 text-[#12233F]">
                            <i class="ri-map-pin-2-fill text-base"></i>
                        </span>
                        <div>
                            <h3 class="text-sm font-bold text-slate-900">{{ setting('company_name', 'Real Facility Services (RFS)') }}</h3>
                            <p class="text-xs text-slate-500">{{ setting('address', 'Office No. 2, First Floor, Plot No. 128, New Haibatpur, Near Gaur City Mall, Sector 4, Greater Noida West (U.P.) 201318') }}</p>
                        </div>
                    </div>
                    <a 
                        href="{{ setting('google_map_link', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3502.655923218129!2d77.4276549!3d28.610097299999996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390ce5900b942d4f%3A0xcb8eeabb60fb701f!2sNDS%20Security%20Services%20Pvt%20Ltd!5e0!3m2!1sen!2sin!4v1790676970101!5m2!1sen!2sin') }}" 
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
                        title="Real Facility Services (RFS) Office Location Map"
                        src="{{ setting('google_map_link', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3502.655923218129!2d77.4276549!3d28.610097299999996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390ce5900b942d4f%3A0xcb8eeabb60fb701f!2sNDS%20Security%20Services%20Pvt%20Ltd!5e0!3m2!1sen!2sin!4v1790676970101!5m2!1sen!2sin') }}" 
                        class="h-full w-full border-0" 
                        allowfullscreen="" 
                        loading="lazy"
                    ></iframe>
                </div>

            </div>
        </div>
    </section>

</div>