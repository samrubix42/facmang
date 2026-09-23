<div class="bg-slate-50 text-slate-800 antialiased font-sans">

    {{-- Breadcrumb & Back Nav Bar --}}
    <div class="border-b border-slate-200/80 bg-white">
        <div class="mx-auto max-w-7xl px-4 py-3.5 sm:px-6 lg:px-8">
            <div class="flex flex-wrap items-center justify-between gap-3 text-xs">
                <nav class="flex items-center gap-2 text-slate-500" aria-label="Breadcrumb">
                    <a href="{{ route('home') }}" class="transition hover:text-emerald-700">Home</a>
                    <i class="ri-arrow-right-s-line text-slate-400"></i>
                    <a href="{{ route('services') }}" class="transition hover:text-emerald-700">Services</a>
                    <i class="ri-arrow-right-s-line text-slate-400"></i>
                    <span class="font-semibold text-slate-800 truncate max-w-[200px] sm:max-w-none">{{ $service['title'] }}</span>
                </nav>

                <a 
                    href="{{ route('services') }}" 
                    class="inline-flex items-center gap-1.5 font-bold text-emerald-700 hover:text-emerald-800 transition"
                >
                    <i class="ri-arrow-left-line"></i>
                    <span>All Services</span>
                </a>
            </div>
        </div>
    </div>

    {{-- Service Detail Hero --}}
    <section class="border-b border-slate-200/80 bg-white py-10 lg:py-16">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="max-w-4xl space-y-4">
                <div class="flex flex-wrap items-center gap-2">
                    <span class="inline-flex items-center gap-1.5 rounded-full border border-emerald-200 bg-emerald-50 px-3 py-1 text-xs font-bold uppercase tracking-wider text-emerald-800">
                        <i class="{{ $service['icon'] }}"></i>
                        <span>{{ $service['badge'] }}</span>
                    </span>
                    <span class="inline-flex items-center gap-1 rounded-full bg-slate-100 px-3 py-1 text-xs font-bold text-slate-700">
                        <i class="ri-shield-check-fill text-emerald-600"></i> ISO 41001 Certified
                    </span>
                    <span class="inline-flex items-center gap-1 rounded-full bg-emerald-100/70 px-3 py-1 text-xs font-bold text-emerald-800">
                        <i class="ri-checkbox-circle-fill text-emerald-600"></i> Single-Point SLA
                    </span>
                </div>

                <h1 class="text-3xl font-extrabold tracking-tight text-slate-900 sm:text-4xl lg:text-5xl">
                    {{ $service['title'] }}
                </h1>

                <p class="text-base sm:text-lg font-bold text-emerald-700">
                    {{ $service['tagline'] }}
                </p>

                <p class="text-sm leading-relaxed text-slate-600 sm:text-base">
                    {{ $service['full_description'] }}
                </p>
            </div>

            <!-- Key SLA Metrics Strip -->
            <div class="mt-8 grid grid-cols-2 gap-4 border-t border-slate-100 pt-6 sm:grid-cols-4">
                <div class="rounded-xl border border-slate-100 bg-slate-50/70 p-4">
                    <span class="text-[10px] font-bold uppercase tracking-wider text-slate-500">Guaranteed SLA</span>
                    <p class="mt-1 text-base sm:text-lg font-extrabold text-emerald-700">{{ $service['sla_rating'] }}</p>
                </div>
                <div class="rounded-xl border border-slate-100 bg-slate-50/70 p-4">
                    <span class="text-[10px] font-bold uppercase tracking-wider text-slate-500">Response Window</span>
                    <p class="mt-1 text-base sm:text-lg font-extrabold text-slate-900">{{ $service['response_time'] }}</p>
                </div>
                <div class="rounded-xl border border-slate-100 bg-slate-50/70 p-4">
                    <span class="text-[10px] font-bold uppercase tracking-wider text-slate-500">Staff Standard</span>
                    <p class="mt-1 text-base sm:text-lg font-extrabold text-emerald-700 truncate" title="{{ $service['staff_standard'] }}">{{ $service['staff_standard'] }}</p>
                </div>
                <div class="rounded-xl border border-slate-100 bg-slate-50/70 p-4">
                    <span class="text-[10px] font-bold uppercase tracking-wider text-slate-500">Shift Frequency</span>
                    <p class="mt-1 text-base sm:text-lg font-extrabold text-slate-900">{{ $service['frequency'] }}</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Main Body: 2 Columns Layout --}}
    <section class="py-12 sm:py-16">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-10 lg:grid-cols-12">
                
                {{-- Left Column: Deep Dive Content (Col 8) --}}
                <div class="lg:col-span-8 space-y-10">
                    
                    <!-- Featured Image Banner -->
                    <div class="relative h-[340px] sm:h-[420px] overflow-hidden rounded-3xl border border-slate-200 shadow-lg bg-slate-100">
                        <img 
                            src="{{ asset($service['image']) }}" 
                            alt="{{ $service['title'] }}" 
                            class="h-full w-full object-cover"
                        />
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-transparent to-transparent"></div>

                        <!-- Floating Live Overlay Badge -->
                        <div class="absolute bottom-5 left-5 right-5 flex flex-wrap items-center justify-between gap-3 rounded-2xl border border-white/20 bg-white/90 p-4 shadow-xl backdrop-blur-md">
                            <div class="flex items-center gap-3">
                                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-emerald-600 text-white font-bold shadow-xs">
                                    <i class="ri-qr-code-line text-xl"></i>
                                </div>
                                <div>
                                    <p class="text-xs font-bold text-slate-900">IoT Checkpoint Verification</p>
                                    <p class="text-[11px] font-medium text-slate-600">Scanned & logged per shift on client dashboard</p>
                                </div>
                            </div>
                            <span class="inline-flex items-center gap-1 text-[11px] font-bold text-emerald-700 bg-emerald-50 px-2.5 py-1 rounded-full border border-emerald-200">
                                <span class="h-2 w-2 rounded-full bg-emerald-500 animate-pulse"></span>
                                Live Auditing
                            </span>
                        </div>
                    </div>

                    <!-- Operational Scope of Work -->
                    <div class="rounded-3xl border border-slate-200/90 bg-white p-7 sm:p-9 shadow-xs space-y-8">
                        <div>
                            <div class="inline-flex items-center gap-2 rounded-md border border-emerald-200 bg-emerald-50 px-3 py-1 text-[10px] font-bold uppercase tracking-[0.2em] text-emerald-800">
                                <i class="ri-file-list-3-line text-emerald-600"></i>
                                <span>Operational Scope</span>
                            </div>
                            <h2 class="mt-2 text-2xl font-extrabold text-slate-900 tracking-tight">
                                Daily Routine & Periodic Deep Care
                            </h2>
                            <p class="mt-1 text-xs sm:text-sm text-slate-600">
                                Standardized procedures executed according to strict timeframes and signed off via digital supervisor checklists.
                            </p>
                        </div>

                        <!-- Daily Routine -->
                        <div>
                            <h3 class="flex items-center gap-2 text-sm font-extrabold uppercase tracking-wider text-slate-900 mb-4">
                                <span class="flex h-6 w-6 items-center justify-center rounded-md bg-emerald-600 text-white text-xs">
                                    <i class="ri-sun-line"></i>
                                </span>
                                <span>Daily Operational Routine</span>
                            </h3>
                            <div class="grid gap-3 sm:grid-cols-2">
                                @foreach ($service['scope']['daily'] as $task)
                                    <div class="flex items-start gap-2.5 rounded-xl border border-slate-100 bg-slate-50/60 p-3.5 text-xs text-slate-700">
                                        <i class="ri-checkbox-circle-fill text-emerald-600 mt-0.5 shrink-0 text-sm"></i>
                                        <span>{{ $task }}</span>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Periodic Treatments -->
                        <div class="border-t border-slate-100 pt-6">
                            <h3 class="flex items-center gap-2 text-sm font-extrabold uppercase tracking-wider text-slate-900 mb-4">
                                <span class="flex h-6 w-6 items-center justify-center rounded-md bg-emerald-700 text-white text-xs">
                                    <i class="ri-calendar-check-line"></i>
                                </span>
                                <span>Periodic & Deep Maintenance Cycles</span>
                            </h3>
                            <div class="grid gap-3 sm:grid-cols-2">
                                @foreach ($service['scope']['periodic'] as $task)
                                    <div class="flex items-start gap-2.5 rounded-xl border border-slate-100 bg-slate-50/60 p-3.5 text-xs text-slate-700">
                                        <i class="ri-sparkling-fill text-emerald-600 mt-0.5 shrink-0 text-sm"></i>
                                        <span>{{ $task }}</span>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <!-- Equipment & Chemical Technology -->
                    <div class="rounded-3xl border border-slate-200/90 bg-white p-7 sm:p-9 shadow-xs space-y-6">
                        <div>
                            <div class="inline-flex items-center gap-2 rounded-md border border-emerald-200 bg-emerald-50 px-3 py-1 text-[10px] font-bold uppercase tracking-[0.2em] text-emerald-800">
                                <i class="ri-cpu-line text-emerald-600"></i>
                                <span>Technology & Machinery</span>
                            </div>
                            <h2 class="mt-2 text-2xl font-extrabold text-slate-900 tracking-tight">
                                Industrial Equipment & Green Chemistry
                            </h2>
                            <p class="mt-1 text-xs sm:text-sm text-slate-600">
                                We invest in professional-grade machinery and EPA/Green Seal compliant formulations to maximize productivity and indoor air safety.
                            </p>
                        </div>

                        <div class="grid gap-4 sm:grid-cols-2">
                            @foreach ($service['equipment'] as $item)
                                <div class="flex items-center gap-3.5 rounded-2xl border border-slate-200/80 bg-slate-50/50 p-4 transition hover:border-emerald-300 hover:bg-emerald-50/30">
                                    <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-emerald-100 text-emerald-700 font-bold">
                                        <i class="ri-tools-fill text-lg"></i>
                                    </span>
                                    <span class="text-xs sm:text-sm font-bold text-slate-800">{{ $item }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Vendor Comparison Matrix -->
                    <div class="rounded-3xl border border-slate-200/90 bg-white p-7 sm:p-9 shadow-xs space-y-6">
                        <div>
                            <div class="inline-flex items-center gap-2 rounded-md border border-emerald-200 bg-emerald-50 px-3 py-1 text-[10px] font-bold uppercase tracking-[0.2em] text-emerald-800">
                                <i class="ri-scales-3-line text-emerald-600"></i>
                                <span>Accountability Comparison</span>
                            </div>
                            <h2 class="mt-2 text-2xl font-extrabold text-slate-900 tracking-tight">
                                FacilityPro vs Traditional Vendors
                            </h2>
                            <p class="mt-1 text-xs sm:text-sm text-slate-600">
                                See why top commercial property management teams choose our single-contract SLA over fragmented contractors.
                            </p>
                        </div>

                        <div class="overflow-x-auto rounded-2xl border border-slate-200">
                            <table class="w-full text-left text-xs">
                                <thead class="bg-slate-50 border-b border-slate-200 text-slate-700 font-extrabold uppercase tracking-wider">
                                    <tr>
                                        <th class="p-4">Criteria</th>
                                        <th class="p-4 bg-emerald-50/80 text-emerald-800">FacilityPro Standard</th>
                                        <th class="p-4 text-slate-500">Typical Contractor</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-slate-100">
                                    @foreach ($service['comparison'] as $row)
                                        <tr class="hover:bg-slate-50/50 transition">
                                            <td class="p-4 font-bold text-slate-900">{{ $row['feature'] }}</td>
                                            <td class="p-4 bg-emerald-50/40 font-medium text-emerald-900">
                                                <span class="inline-flex items-center gap-1.5 font-bold">
                                                    <i class="ri-check-line text-emerald-600 text-base"></i>
                                                    {{ $row['us'] }}
                                                </span>
                                            </td>
                                            <td class="p-4 text-slate-500">
                                                <span class="inline-flex items-center gap-1.5">
                                                    <i class="ri-close-line text-rose-500 text-base"></i>
                                                    {{ $row['others'] }}
                                                </span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- SOP Quality Assurance Steps -->
                    <div class="rounded-3xl border border-slate-200/90 bg-white p-7 sm:p-9 shadow-xs space-y-6">
                        <div>
                            <div class="inline-flex items-center gap-2 rounded-md border border-emerald-200 bg-emerald-50 px-3 py-1 text-[10px] font-bold uppercase tracking-[0.2em] text-emerald-800">
                                <i class="ri-flow-chart text-emerald-600"></i>
                                <span>Quality Assurance SOP</span>
                            </div>
                            <h2 class="mt-2 text-2xl font-extrabold text-slate-900 tracking-tight">
                                Standard Operating Execution Flow
                            </h2>
                        </div>

                        <div class="grid gap-4 sm:grid-cols-2">
                            <div class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                                <span class="text-xs font-extrabold text-emerald-700">Phase 01</span>
                                <h3 class="mt-1 text-sm font-bold text-slate-900">Pre-Shift Briefing & Equipment Check</h3>
                                <p class="mt-1 text-xs text-slate-600">On-site supervisor inspects staff grooming, personal protective equipment, and validates machine battery charge.</p>
                            </div>
                            <div class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                                <span class="text-xs font-extrabold text-emerald-700">Phase 02</span>
                                <h3 class="mt-1 text-sm font-bold text-slate-900">Systematic Zonal Cleaning</h3>
                                <p class="mt-1 text-xs text-slate-600">Color-coded microfiber mops and HEPA vacuums are deployed floor-by-floor with zero cross-contamination.</p>
                            </div>
                            <div class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                                <span class="text-xs font-extrabold text-emerald-700">Phase 03</span>
                                <h3 class="mt-1 text-sm font-bold text-slate-900">IoT QR Code Checkpoint Scan</h3>
                                <p class="mt-1 text-xs text-slate-600">Staff scan checkpoint QR plaques upon entering and completing each zone, creating a time-stamped digital breadcrumb.</p>
                            </div>
                            <div class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                                <span class="text-xs font-extrabold text-emerald-700">Phase 04</span>
                                <h3 class="mt-1 text-sm font-bold text-slate-900">Supervisor Audit & Client Log</h3>
                                <p class="mt-1 text-xs text-slate-600">Area manager performs random ATP swab tests and signs off on the shift log before handing over the floor.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Service FAQs -->
                    <div class="rounded-3xl border border-slate-200/90 bg-white p-7 sm:p-9 shadow-xs space-y-6" x-data="{ activeFaq: 0 }">
                        <div>
                            <div class="inline-flex items-center gap-2 rounded-md border border-emerald-200 bg-emerald-50 px-3 py-1 text-[10px] font-bold uppercase tracking-[0.2em] text-emerald-800">
                                <i class="ri-questionnaire-line text-emerald-600"></i>
                                <span>Common Inquiries</span>
                            </div>
                            <h2 class="mt-2 text-2xl font-extrabold text-slate-900 tracking-tight">
                                {{ $service['title'] }} FAQs
                            </h2>
                        </div>

                        <div class="space-y-3">
                            @foreach ($service['faqs'] as $index => $faq)
                                <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-xs">
                                    <button
                                        type="button"
                                        class="flex w-full items-center justify-between p-4 text-left text-xs sm:text-sm font-bold text-slate-900 transition hover:bg-slate-50"
                                        @click="activeFaq = (activeFaq === {{ $index }} ? null : {{ $index }})"
                                    >
                                        <span>{{ $faq['q'] }}</span>
                                        <i class="ri-arrow-down-s-line text-base text-slate-400 transition-transform duration-200" :class="activeFaq === {{ $index }} ? 'rotate-180 text-emerald-600' : ''"></i>
                                    </button>
                                    <div x-show="activeFaq === {{ $index }}" x-collapse class="border-t border-slate-100 p-4 text-xs sm:text-sm leading-relaxed text-slate-600 bg-slate-50/50">
                                        {{ $faq['a'] }}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>

                {{-- Right Column: Interactive Quote Sidebar (Col 4) --}}
                <div class="lg:col-span-4 space-y-6">
                    
                    <!-- Fast Quote / Proposal Card -->
                    <div class="sticky top-24 rounded-3xl border border-slate-200/90 bg-white p-6 shadow-xl shadow-slate-200/50">
                        <div class="flex items-center gap-3 border-b border-slate-100 pb-4">
                            <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-emerald-600 text-white font-bold shadow-xs">
                                <i class="ri-file-edit-line text-xl"></i>
                            </span>
                            <div>
                                <h3 class="text-base font-extrabold text-slate-900">Request Service Scope</h3>
                                <p class="text-xs text-slate-500">Get SLA pricing & schedule a walkthrough</p>
                            </div>
                        </div>

                        @if ($submitted)
                            <div class="mt-6 rounded-2xl border border-emerald-200 bg-emerald-50 p-5 text-center">
                                <div class="mx-auto flex h-12 w-12 items-center justify-center rounded-full bg-emerald-600 text-white">
                                    <i class="ri-check-line text-2xl"></i>
                                </div>
                                <h4 class="mt-3 text-sm font-bold text-emerald-900">Proposal Request Received!</h4>
                                <p class="mt-1 text-xs text-emerald-700">
                                    Our facility director will contact you within 2 business hours with an audit itinerary.
                                </p>
                                <button
                                    type="button"
                                    wire:click="$set('submitted', false)"
                                    class="mt-4 inline-flex text-xs font-bold text-emerald-800 underline hover:text-emerald-900"
                                >
                                    Submit another request
                                </button>
                            </div>
                        @else
                            <form wire:submit="submitQuote" class="mt-5 space-y-4">
                                <div>
                                    <label class="block text-xs font-bold text-slate-700 mb-1">Your Full Name *</label>
                                    <input
                                        type="text"
                                        wire:model="name"
                                        placeholder="e.g. David Henderson"
                                        class="w-full rounded-xl border border-slate-200 bg-slate-50/50 px-3.5 py-2.5 text-xs text-slate-900 placeholder:text-slate-400 focus:border-emerald-500 focus:bg-white focus:outline-none focus:ring-2 focus:ring-emerald-500/20 transition"
                                    />
                                    @error('name') <span class="text-[11px] text-rose-600 mt-0.5 block">{{ $message }}</span> @enderror
                                </div>

                                <div>
                                    <label class="block text-xs font-bold text-slate-700 mb-1">Corporate Email *</label>
                                    <input
                                        type="email"
                                        wire:model="email"
                                        placeholder="d.henderson@enterprise.com"
                                        class="w-full rounded-xl border border-slate-200 bg-slate-50/50 px-3.5 py-2.5 text-xs text-slate-900 placeholder:text-slate-400 focus:border-emerald-500 focus:bg-white focus:outline-none focus:ring-2 focus:ring-emerald-500/20 transition"
                                    />
                                    @error('email') <span class="text-[11px] text-rose-600 mt-0.5 block">{{ $message }}</span> @enderror
                                </div>

                                <div>
                                    <label class="block text-xs font-bold text-slate-700 mb-1">Direct Phone *</label>
                                    <input
                                        type="text"
                                        wire:model="phone"
                                        placeholder="+1 (555) 019-2834"
                                        class="w-full rounded-xl border border-slate-200 bg-slate-50/50 px-3.5 py-2.5 text-xs text-slate-900 placeholder:text-slate-400 focus:border-emerald-500 focus:bg-white focus:outline-none focus:ring-2 focus:ring-emerald-500/20 transition"
                                    />
                                    @error('phone') <span class="text-[11px] text-rose-600 mt-0.5 block">{{ $message }}</span> @enderror
                                </div>

                                <div class="grid grid-cols-2 gap-3">
                                    <div>
                                        <label class="block text-xs font-bold text-slate-700 mb-1">Property Type</label>
                                        <select
                                            wire:model="propertyType"
                                            class="w-full rounded-xl border border-slate-200 bg-slate-50/50 px-3 py-2.5 text-xs text-slate-900 focus:border-emerald-500 focus:bg-white focus:outline-none focus:ring-2 focus:ring-emerald-500/20 transition"
                                        >
                                            <option>Corporate Office</option>
                                            <option>IT & Tech Park</option>
                                            <option>Commercial Tower</option>
                                            <option>Healthcare Center</option>
                                            <option>Educational Campus</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label class="block text-xs font-bold text-slate-700 mb-1">Square Footage</label>
                                        <select
                                            wire:model="squareFootage"
                                            class="w-full rounded-xl border border-slate-200 bg-slate-50/50 px-3 py-2.5 text-xs text-slate-900 focus:border-emerald-500 focus:bg-white focus:outline-none focus:ring-2 focus:ring-emerald-500/20 transition"
                                        >
                                            <option>&lt; 10,000 sq ft</option>
                                            <option>10,000 - 25,000 sq ft</option>
                                            <option>25,000 - 75,000 sq ft</option>
                                            <option>75,000 - 150,000 sq ft</option>
                                            <option>&gt; 150,000 sq ft</option>
                                        </select>
                                    </div>
                                </div>

                                <div>
                                    <label class="block text-xs font-bold text-slate-700 mb-1">Specific Requirements (Optional)</label>
                                    <textarea
                                        wire:model="notes"
                                        rows="2"
                                        placeholder="e.g. Need 4 pantry stewards and evening floor buffing..."
                                        class="w-full rounded-xl border border-slate-200 bg-slate-50/50 px-3.5 py-2 text-xs text-slate-900 placeholder:text-slate-400 focus:border-emerald-500 focus:bg-white focus:outline-none focus:ring-2 focus:ring-emerald-500/20 transition resize-none"
                                    ></textarea>
                                </div>

                                <button
                                    type="submit"
                                    class="w-full inline-flex items-center justify-center gap-2 rounded-xl bg-emerald-600 px-5 py-3 text-xs font-bold uppercase tracking-wider text-white shadow-md shadow-emerald-600/25 transition hover:bg-emerald-700 hover:shadow-lg"
                                >
                                    <span>Submit SLA Scope Request</span>
                                    <i class="ri-arrow-right-line"></i>
                                </button>

                                <p class="text-[10px] text-center text-slate-500">
                                    <i class="ri-lock-line"></i> 100% Confidential. NDA protected upon request.
                                </p>
                            </form>
                        @endif

                        <!-- Dispatch Hotline Banner inside sidebar -->
                        <div class="mt-6 rounded-2xl border border-slate-100 bg-slate-50 p-4">
                            <span class="text-[10px] font-bold uppercase tracking-wider text-slate-500">24/7 Operations Desk</span>
                            <div class="mt-2 flex items-center gap-3">
                                <span class="flex h-9 w-9 items-center justify-center rounded-xl bg-emerald-100 text-emerald-700 font-bold">
                                    <i class="ri-phone-fill"></i>
                                </span>
                                <div>
                                    <a href="tel:+18004928820" class="text-xs font-extrabold text-slate-900 hover:text-emerald-700 transition">
                                        +1 (800) 492-8820
                                    </a>
                                    <p class="text-[10px] text-slate-500">Direct link to facility controller</p>
                                </div>
                            </div>
                        </div>

                        <!-- Other Services Quick List -->
                        <div class="mt-6 border-t border-slate-100 pt-6">
                            <h4 class="text-xs font-bold uppercase tracking-wider text-slate-800 mb-3">
                                Explore Other Capabilities
                            </h4>
                            <div class="space-y-2">
                                @foreach (\App\Services\ServiceCatalog::all() as $navService)
                                    <a
                                        href="{{ route('services.show', ['slug' => $navService['slug']]) }}"
                                        class="flex items-center justify-between rounded-xl px-3 py-2 text-xs transition {{ $navService['slug'] === $service['slug'] ? 'bg-emerald-50 text-emerald-800 font-bold border border-emerald-200' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }}"
                                    >
                                        <span class="flex items-center gap-2 truncate">
                                            <i class="{{ $navService['icon'] }} {{ $navService['slug'] === $service['slug'] ? 'text-emerald-600' : 'text-slate-400' }}"></i>
                                            <span class="truncate">{{ $navService['title'] }}</span>
                                        </span>
                                        <i class="ri-arrow-right-s-line text-slate-400 shrink-0"></i>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>

    {{-- Related Companion Services --}}
    <section class="border-t border-slate-200/80 bg-white py-14 sm:py-18">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-4">
                <div>
                    <span class="text-[10px] font-bold uppercase tracking-[0.2em] text-emerald-700">Frequently Bundled</span>
                    <h2 class="mt-1 text-2xl font-extrabold text-slate-900 tracking-tight sm:text-3xl">
                        Companion Facility Capabilities
                    </h2>
                </div>
                <a
                    href="{{ route('services') }}"
                    class="inline-flex items-center gap-1.5 text-xs font-bold text-emerald-700 hover:text-emerald-800 transition"
                >
                    <span>View all 6 services</span>
                    <i class="ri-arrow-right-line"></i>
                </a>
            </div>

            <div class="mt-8 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($this->relatedServices as $related)
                    <div class="group flex flex-col overflow-hidden rounded-2xl border border-slate-200/90 bg-white shadow-xs transition duration-300 hover:-translate-y-1 hover:border-emerald-300 hover:shadow-lg">
                        <div class="relative h-44 overflow-hidden bg-slate-100">
                            <img
                                src="{{ asset($related['image']) }}"
                                alt="{{ $related['title'] }}"
                                class="h-full w-full object-cover transition duration-300 group-hover:scale-105"
                            />
                            <div class="absolute inset-0 bg-gradient-to-t from-slate-950/60 to-transparent"></div>
                            <span class="absolute bottom-3 left-3 inline-flex items-center gap-1 rounded bg-slate-900/90 px-2 py-0.5 text-[10px] font-bold text-emerald-300 border border-slate-700/50">
                                <i class="{{ $related['icon'] }}"></i> {{ $related['badge'] }}
                            </span>
                        </div>
                        <div class="flex flex-1 flex-col p-5">
                            <h3 class="text-base font-bold text-slate-900 group-hover:text-emerald-700 transition">
                                <a href="{{ route('services.show', ['slug' => $related['slug']]) }}">
                                    {{ $related['title'] }}
                                </a>
                            </h3>
                            <p class="mt-1 text-xs text-slate-600 line-clamp-2">
                                {{ $related['short_description'] }}
                            </p>
                            <div class="mt-4 pt-3 border-t border-slate-100 flex items-center justify-between">
                                <span class="text-[11px] font-semibold text-emerald-700">{{ $related['sla_rating'] }}</span>
                                <a
                                    href="{{ route('services.show', ['slug' => $related['slug']]) }}"
                                    class="text-xs font-bold text-slate-900 hover:text-emerald-700 transition inline-flex items-center gap-1"
                                >
                                    <span>Scope</span>
                                    <i class="ri-arrow-right-line"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Bottom Enterprise CTA --}}
    <section class="relative overflow-hidden bg-slate-950 py-16 text-white text-center">
        <div class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8">
            <span class="inline-flex items-center gap-2 rounded-full border border-emerald-500/30 bg-emerald-950/70 px-4 py-1 text-xs font-bold uppercase tracking-wider text-emerald-400">
                <i class="ri-check-double-line"></i> Ready for Immediate Onboarding
            </span>
            <h2 class="mt-4 text-2xl font-extrabold sm:text-3xl lg:text-4xl">
                Ready to Upgrade Your Facility Service Standard?
            </h2>
            <p class="mx-auto mt-3 max-w-2xl text-xs sm:text-sm text-slate-300">
                Book a confidential 30-minute facility assessment. We will audit your current operations, benchmark your costs, and prepare an SLA-guaranteed proposal.
            </p>
            <div class="mt-6 flex flex-col sm:flex-row items-center justify-center gap-4">
                <a
                    href="{{ route('contact') }}"
                    class="w-full sm:w-auto inline-flex items-center justify-center gap-2 rounded-xl bg-emerald-600 px-6 py-3 text-xs font-bold uppercase tracking-wider text-white shadow-lg shadow-emerald-600/25 transition hover:bg-emerald-500"
                >
                    <span>Schedule Free On-Site Audit</span>
                    <i class="ri-arrow-right-line"></i>
                </a>
                <a
                    href="tel:+18004928820"
                    class="w-full sm:w-auto inline-flex items-center justify-center gap-2 rounded-xl border border-slate-700 bg-slate-900/80 px-6 py-3 text-xs font-bold uppercase tracking-wider text-slate-200 transition hover:bg-slate-800 hover:text-white"
                >
                    <i class="ri-phone-fill text-emerald-400"></i>
                    <span>Call +1 (800) 492-8820</span>
                </a>
            </div>
        </div>
    </section>

</div>