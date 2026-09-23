<div class="bg-slate-50 text-slate-800 antialiased font-sans">

    {{-- Breadcrumb Navigation Bar --}}
    <div class="border-b border-slate-200/80 bg-white">
        <div class="mx-auto max-w-7xl px-4 py-3 sm:px-6 lg:px-8">
            <div class="flex flex-wrap items-center justify-between gap-3 text-xs">
                <nav class="flex items-center gap-2 text-slate-500" aria-label="Breadcrumb">
                    <a href="{{ route('home') }}" class="transition hover:text-emerald-700 font-medium">Home</a>
                    <i class="ri-arrow-right-s-line text-slate-400"></i>
                    <a href="{{ route('services') }}" class="transition hover:text-emerald-700 font-medium">Services</a>
                    <i class="ri-arrow-right-s-line text-slate-400"></i>
                    <span class="font-bold text-slate-900 truncate max-w-[220px] sm:max-w-none">{{ $service['title'] }}</span>
                </nav>

                <a 
                    href="{{ route('services') }}" 
                    class="inline-flex items-center gap-1.5 font-bold text-emerald-700 hover:text-emerald-800 transition group"
                >
                    <i class="ri-arrow-left-line transition-transform group-hover:-translate-x-1"></i>
                    <span>Back to All Services</span>
                </a>
            </div>
        </div>
    </div>

    {{-- Service Detail Hero Section --}}
    <section class="relative border-b border-slate-200/80 bg-white py-10 lg:py-14">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid items-center gap-8 lg:grid-cols-12">
                
                <!-- Left Title & Meta Column -->
                <div class="lg:col-span-8 space-y-4">
                    <div class="flex flex-wrap items-center gap-2">
                        <span class="inline-flex items-center gap-1.5 rounded-full border border-emerald-200 bg-emerald-50 px-3 py-1 text-xs font-bold uppercase tracking-wider text-emerald-800">
                            <i class="{{ $service['icon'] }}"></i>
                            <span>{{ $service['badge'] }}</span>
                        </span>
                        <span class="inline-flex items-center gap-1 rounded-full bg-slate-100 px-3 py-1 text-xs font-bold text-slate-700 border border-slate-200/60">
                            <i class="ri-shield-check-fill text-emerald-600"></i> ISO 41001 Certified
                        </span>
                        <span class="inline-flex items-center gap-1 rounded-full bg-emerald-100/70 px-3 py-1 text-xs font-bold text-emerald-900 border border-emerald-200/80">
                            <i class="ri-checkbox-circle-fill text-emerald-600"></i> Single-Point SLA
                        </span>
                    </div>

                    <h1 class="text-3xl font-extrabold tracking-tight text-slate-900 sm:text-4xl lg:text-5xl leading-tight">
                        {{ $service['title'] }}
                    </h1>

                    <p class="text-base sm:text-lg font-bold text-emerald-700 leading-snug">
                        {{ $service['tagline'] }}
                    </p>

                    <p class="text-sm leading-relaxed text-slate-600 sm:text-base max-w-3xl">
                        {{ $service['full_description'] }}
                    </p>
                </div>

                <!-- Right Quick Stats Highlight Card -->
                <div class="lg:col-span-4">
                    <div class="rounded-2xl border border-emerald-100 bg-gradient-to-br from-emerald-50/80 to-white p-5 sm:p-6 shadow-sm">
                        <div class="flex items-center justify-between border-b border-emerald-100/80 pb-3 mb-4">
                            <span class="text-xs font-extrabold uppercase tracking-wider text-emerald-800">SLA Snapshot</span>
                            <span class="inline-flex items-center gap-1 text-[11px] font-bold text-emerald-700 bg-white px-2.5 py-0.5 rounded-full border border-emerald-200 shadow-2xs">
                                <span class="h-2 w-2 rounded-full bg-emerald-500 animate-pulse"></span>
                                Live Standard
                            </span>
                        </div>
                        <dl class="space-y-3 text-xs">
                            <div class="flex items-center justify-between">
                                <dt class="text-slate-500 font-medium">Cleanliness SLA:</dt>
                                <dd class="font-extrabold text-emerald-700 text-sm">{{ $service['sla_rating'] }}</dd>
                            </div>
                            <div class="flex items-center justify-between">
                                <dt class="text-slate-500 font-medium">Emergency Window:</dt>
                                <dd class="font-bold text-slate-900">{{ $service['response_time'] }}</dd>
                            </div>
                            <div class="flex items-center justify-between">
                                <dt class="text-slate-500 font-medium">Personnel:</dt>
                                <dd class="font-bold text-slate-900">{{ $service['staff_standard'] }}</dd>
                            </div>
                            <div class="flex items-center justify-between">
                                <dt class="text-slate-500 font-medium">Schedule:</dt>
                                <dd class="font-bold text-slate-900">{{ $service['frequency'] }}</dd>
                            </div>
                        </dl>
                        <a
                            href="#quote-form"
                            class="mt-4 flex w-full items-center justify-center gap-2 rounded-xl bg-emerald-600 py-2.5 text-xs font-bold uppercase tracking-wider text-white shadow-sm transition hover:bg-emerald-700"
                        >
                            <span>Schedule Service Audit</span>
                            <i class="ri-arrow-down-line"></i>
                        </a>
                    </div>
                </div>

            </div>

            <!-- Key SLA Metrics Strip (4 Uniform Columns) -->
            <div class="mt-8 grid grid-cols-2 gap-4 border-t border-slate-100 pt-6 sm:grid-cols-4">
                <div class="flex flex-col justify-between rounded-xl border border-slate-100 bg-slate-50/70 p-4 min-h-[90px]">
                    <span class="text-[10px] font-bold uppercase tracking-wider text-slate-500">Guaranteed SLA</span>
                    <p class="mt-1 text-base sm:text-lg font-extrabold text-emerald-700">{{ $service['sla_rating'] }}</p>
                </div>
                <div class="flex flex-col justify-between rounded-xl border border-slate-100 bg-slate-50/70 p-4 min-h-[90px]">
                    <span class="text-[10px] font-bold uppercase tracking-wider text-slate-500">Response Window</span>
                    <p class="mt-1 text-base sm:text-lg font-extrabold text-slate-900">{{ $service['response_time'] }}</p>
                </div>
                <div class="flex flex-col justify-between rounded-xl border border-slate-100 bg-slate-50/70 p-4 min-h-[90px]">
                    <span class="text-[10px] font-bold uppercase tracking-wider text-slate-500">Staff Qualification</span>
                    <p class="mt-1 text-xs sm:text-sm font-extrabold text-emerald-800 line-clamp-2 leading-snug">{{ $service['staff_standard'] }}</p>
                </div>
                <div class="flex flex-col justify-between rounded-xl border border-slate-100 bg-slate-50/70 p-4 min-h-[90px]">
                    <span class="text-[10px] font-bold uppercase tracking-wider text-slate-500">Shift Availability</span>
                    <p class="mt-1 text-base sm:text-lg font-extrabold text-slate-900">{{ $service['frequency'] }}</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Main Body: 2 Columns Layout --}}
    <section class="py-12 sm:py-16">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-8 lg:grid-cols-12 items-start">
                
                {{-- Left Column: Deep Dive Content (Col 8) --}}
                <div class="lg:col-span-8 space-y-8 sm:space-y-10">
                    
                    <!-- Featured Image Banner with Balanced 16:9 Aspect Ratio -->
                    <div class="relative overflow-hidden rounded-3xl border border-slate-200 shadow-md bg-slate-100 aspect-16/9 sm:aspect-21/9 max-h-[400px]">
                        <img 
                            src="{{ asset($service['image']) }}" 
                            alt="{{ $service['title'] }}" 
                            class="h-full w-full object-cover"
                        />
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-slate-950/20 to-transparent"></div>

                        <!-- Overlay Badge -->
                        <div class="absolute bottom-4 left-4 right-4 sm:bottom-5 sm:left-5 sm:right-5 flex flex-wrap items-center justify-between gap-3 rounded-2xl border border-white/20 bg-white/95 p-3 sm:p-4 shadow-xl backdrop-blur-md">
                            <div class="flex items-center gap-3">
                                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-emerald-600 text-white font-bold shadow-xs">
                                    <i class="ri-qr-code-line text-xl"></i>
                                </div>
                                <div class="min-w-0">
                                    <p class="text-xs font-bold text-slate-900 truncate">IoT Checkpoint Verification</p>
                                    <p class="text-[11px] font-medium text-slate-600 truncate">Scanned & logged per shift on client portal</p>
                                </div>
                            </div>
                            <span class="inline-flex items-center gap-1.5 text-[11px] font-bold text-emerald-800 bg-emerald-50 px-3 py-1 rounded-full border border-emerald-200 shrink-0">
                                <span class="h-2 w-2 rounded-full bg-emerald-500 animate-pulse"></span>
                                Live Auditing
                            </span>
                        </div>
                    </div>

                    <!-- Operational Scope of Work -->
                    <div class="rounded-3xl border border-slate-200/90 bg-white p-6 sm:p-8 lg:p-9 shadow-xs space-y-8">
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
                            <h3 class="flex items-center gap-2 text-xs font-extrabold uppercase tracking-wider text-slate-900 mb-4">
                                <span class="flex h-6 w-6 items-center justify-center rounded-md bg-emerald-600 text-white text-xs">
                                    <i class="ri-sun-line"></i>
                                </span>
                                <span>Daily Operational Routine</span>
                            </h3>
                            <div class="grid gap-3 sm:grid-cols-2">
                                @foreach ($service['scope']['daily'] as $task)
                                    <div class="flex items-start gap-2.5 rounded-xl border border-slate-100 bg-slate-50/60 p-3.5 text-xs text-slate-700 h-full">
                                        <i class="ri-checkbox-circle-fill text-emerald-600 mt-0.5 shrink-0 text-sm"></i>
                                        <span class="leading-relaxed">{{ $task }}</span>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Periodic Treatments -->
                        <div class="border-t border-slate-100 pt-6">
                            <h3 class="flex items-center gap-2 text-xs font-extrabold uppercase tracking-wider text-slate-900 mb-4">
                                <span class="flex h-6 w-6 items-center justify-center rounded-md bg-emerald-700 text-white text-xs">
                                    <i class="ri-calendar-check-line"></i>
                                </span>
                                <span>Periodic & Deep Maintenance Cycles</span>
                            </h3>
                            <div class="grid gap-3 sm:grid-cols-2">
                                @foreach ($service['scope']['periodic'] as $task)
                                    <div class="flex items-start gap-2.5 rounded-xl border border-slate-100 bg-slate-50/60 p-3.5 text-xs text-slate-700 h-full">
                                        <i class="ri-sparkling-fill text-emerald-600 mt-0.5 shrink-0 text-sm"></i>
                                        <span class="leading-relaxed">{{ $task }}</span>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <!-- Equipment & Chemical Technology -->
                    <div class="rounded-3xl border border-slate-200/90 bg-white p-6 sm:p-8 lg:p-9 shadow-xs space-y-6">
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

                        <div class="grid gap-3.5 sm:grid-cols-2">
                            @foreach ($service['equipment'] as $item)
                                <div class="flex items-center gap-3.5 rounded-2xl border border-slate-200/80 bg-slate-50/50 p-4 transition hover:border-emerald-300 hover:bg-emerald-50/30 h-full">
                                    <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-emerald-100 text-emerald-700 font-bold">
                                        <i class="ri-tools-fill text-lg"></i>
                                    </span>
                                    <span class="text-xs sm:text-sm font-bold text-slate-800 leading-snug">{{ $item }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Vendor Comparison Matrix (Properly Formatted Table) -->
                    <div class="rounded-3xl border border-slate-200/90 bg-white p-6 sm:p-8 lg:p-9 shadow-xs space-y-6">
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
                            <table class="w-full text-left text-xs table-fixed min-w-[540px]">
                                <thead class="bg-slate-50 border-b border-slate-200 text-slate-700 font-extrabold uppercase tracking-wider">
                                    <tr>
                                        <th class="w-1/3 p-4">Criteria</th>
                                        <th class="w-1/3 p-4 bg-emerald-50 text-emerald-800 border-x border-emerald-200/60">
                                            <div class="flex items-center gap-1.5">
                                                <i class="ri-checkbox-circle-fill text-emerald-600"></i>
                                                <span>FacilityPro Standard</span>
                                            </div>
                                        </th>
                                        <th class="w-1/3 p-4 text-slate-500">Typical Contractor</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-slate-100">
                                    @foreach ($service['comparison'] as $row)
                                        <tr class="hover:bg-slate-50/50 transition">
                                            <td class="p-4 font-bold text-slate-900 align-top">{{ $row['feature'] }}</td>
                                            <td class="p-4 bg-emerald-50/30 font-medium text-emerald-900 border-x border-emerald-200/40 align-top">
                                                <div class="flex items-start gap-1.5">
                                                    <i class="ri-check-line text-emerald-600 text-base shrink-0 mt-0.5"></i>
                                                    <span class="font-bold leading-relaxed">{{ $row['us'] }}</span>
                                                </div>
                                            </td>
                                            <td class="p-4 text-slate-500 align-top">
                                                <div class="flex items-start gap-1.5">
                                                    <i class="ri-close-line text-rose-500 text-base shrink-0 mt-0.5"></i>
                                                    <span class="leading-relaxed">{{ $row['others'] }}</span>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- SOP Quality Assurance Steps -->
                    <div class="rounded-3xl border border-slate-200/90 bg-white p-6 sm:p-8 lg:p-9 shadow-xs space-y-6">
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
                            <div class="flex flex-col justify-between rounded-2xl border border-slate-100 bg-slate-50 p-5">
                                <div>
                                    <span class="inline-block rounded bg-emerald-100 px-2 py-0.5 text-[10px] font-extrabold uppercase text-emerald-800">Phase 01</span>
                                    <h3 class="mt-2 text-sm font-bold text-slate-900">Pre-Shift Briefing & Readiness Check</h3>
                                    <p class="mt-1.5 text-xs text-slate-600 leading-relaxed">On-site supervisor inspects staff grooming, uniforms, personal protective equipment, and validates machine battery charge.</p>
                                </div>
                            </div>
                            <div class="flex flex-col justify-between rounded-2xl border border-slate-100 bg-slate-50 p-5">
                                <div>
                                    <span class="inline-block rounded bg-emerald-100 px-2 py-0.5 text-[10px] font-extrabold uppercase text-emerald-800">Phase 02</span>
                                    <h3 class="mt-2 text-sm font-bold text-slate-900">Systematic Zonal Execution</h3>
                                    <p class="mt-1.5 text-xs text-slate-600 leading-relaxed">Color-coded microfiber mops and HEPA vacuums are deployed floor-by-floor with zero cross-contamination between rooms.</p>
                                </div>
                            </div>
                            <div class="flex flex-col justify-between rounded-2xl border border-slate-100 bg-slate-50 p-5">
                                <div>
                                    <span class="inline-block rounded bg-emerald-100 px-2 py-0.5 text-[10px] font-extrabold uppercase text-emerald-800">Phase 03</span>
                                    <h3 class="mt-2 text-sm font-bold text-slate-900">IoT QR Code Checkpoint Scan</h3>
                                    <p class="mt-1.5 text-xs text-slate-600 leading-relaxed">Staff scan checkpoint QR plaques upon entering and completing each zone, creating a tamper-proof digital timestamp.</p>
                                </div>
                            </div>
                            <div class="flex flex-col justify-between rounded-2xl border border-slate-100 bg-slate-50 p-5">
                                <div>
                                    <span class="inline-block rounded bg-emerald-100 px-2 py-0.5 text-[10px] font-extrabold uppercase text-emerald-800">Phase 04</span>
                                    <h3 class="mt-2 text-sm font-bold text-slate-900">Supervisor Audit & Client Sign-Off</h3>
                                    <p class="mt-1.5 text-xs text-slate-600 leading-relaxed">Area manager conducts randomized ATP swab tests, verifies checklist scores, and uploads shift telemetry to the client portal.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Service FAQs -->
                    <div class="rounded-3xl border border-slate-200/90 bg-white p-6 sm:p-8 lg:p-9 shadow-xs space-y-6" x-data="{ activeFaq: 0 }">
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
                                        class="flex w-full items-center justify-between p-4 sm:p-5 text-left text-xs sm:text-sm font-bold text-slate-900 transition hover:bg-slate-50"
                                        @click="activeFaq = (activeFaq === {{ $index }} ? null : {{ $index }})"
                                    >
                                        <span>{{ $faq['q'] }}</span>
                                        <i class="ri-arrow-down-s-line text-base text-slate-400 transition-transform duration-200 shrink-0 ml-2" :class="activeFaq === {{ $index }} ? 'rotate-180 text-emerald-600' : ''"></i>
                                    </button>
                                    <div x-show="activeFaq === {{ $index }}" x-collapse class="border-t border-slate-100 p-4 sm:p-5 text-xs sm:text-sm leading-relaxed text-slate-600 bg-slate-50/50">
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
                    <div id="quote-form" class="scroll-mt-28 rounded-3xl border border-slate-200/90 bg-white p-6 sm:p-7 shadow-xl shadow-slate-200/50">
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
                                        class="w-full rounded-xl border border-slate-200 bg-slate-50/50 px-3.5 py-2.5 text-xs text-slate-900 placeholder:text-slate-400 focus:border-emerald-500 focus:bg-white focus:outline-none focus:ring-2 focus:ring-emerald-500/20 transition shadow-2xs"
                                    />
                                    @error('name') <span class="text-[11px] text-rose-600 mt-0.5 block">{{ $message }}</span> @enderror
                                </div>

                                <div>
                                    <label class="block text-xs font-bold text-slate-700 mb-1">Corporate Email *</label>
                                    <input
                                        type="email"
                                        wire:model="email"
                                        placeholder="d.henderson@enterprise.com"
                                        class="w-full rounded-xl border border-slate-200 bg-slate-50/50 px-3.5 py-2.5 text-xs text-slate-900 placeholder:text-slate-400 focus:border-emerald-500 focus:bg-white focus:outline-none focus:ring-2 focus:ring-emerald-500/20 transition shadow-2xs"
                                    />
                                    @error('email') <span class="text-[11px] text-rose-600 mt-0.5 block">{{ $message }}</span> @enderror
                                </div>

                                <div>
                                    <label class="block text-xs font-bold text-slate-700 mb-1">Direct Phone *</label>
                                    <input
                                        type="text"
                                        wire:model="phone"
                                        placeholder="+1 (555) 019-2834"
                                        class="w-full rounded-xl border border-slate-200 bg-slate-50/50 px-3.5 py-2.5 text-xs text-slate-900 placeholder:text-slate-400 focus:border-emerald-500 focus:bg-white focus:outline-none focus:ring-2 focus:ring-emerald-500/20 transition shadow-2xs"
                                    />
                                    @error('phone') <span class="text-[11px] text-rose-600 mt-0.5 block">{{ $message }}</span> @enderror
                                </div>

                                <div class="grid grid-cols-2 gap-3">
                                    <div>
                                        <label class="block text-xs font-bold text-slate-700 mb-1">Property Type</label>
                                        <select
                                            wire:model="propertyType"
                                            class="w-full rounded-xl border border-slate-200 bg-slate-50/50 px-3 py-2.5 text-xs text-slate-900 focus:border-emerald-500 focus:bg-white focus:outline-none focus:ring-2 focus:ring-emerald-500/20 transition shadow-2xs"
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
                                            class="w-full rounded-xl border border-slate-200 bg-slate-50/50 px-3 py-2.5 text-xs text-slate-900 focus:border-emerald-500 focus:bg-white focus:outline-none focus:ring-2 focus:ring-emerald-500/20 transition shadow-2xs"
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
                                        placeholder="e.g. Daily restroom rounds and evening floor scrub..."
                                        class="w-full rounded-xl border border-slate-200 bg-slate-50/50 px-3.5 py-2 text-xs text-slate-900 placeholder:text-slate-400 focus:border-emerald-500 focus:bg-white focus:outline-none focus:ring-2 focus:ring-emerald-500/20 transition resize-none shadow-2xs"
                                    ></textarea>
                                </div>

                                <button
                                    type="submit"
                                    class="w-full inline-flex items-center justify-center gap-2 rounded-xl bg-emerald-600 px-5 py-3 text-xs font-bold uppercase tracking-wider text-white shadow-md shadow-emerald-600/25 transition hover:bg-emerald-700 hover:shadow-lg"
                                >
                                    <span>Submit SLA Scope Request</span>
                                    <i class="ri-arrow-right-line"></i>
                                </button>

                                <p class="text-[10px] text-center text-slate-500 flex items-center justify-center gap-1">
                                    <i class="ri-lock-line text-emerald-600"></i>
                                    <span>100% Confidential. NDA protected upon request.</span>
                                </p>
                            </form>
                        @endif
                    </div>

                    <!-- 24/7 Operations Helpline Card -->
                    <div class="rounded-3xl border border-slate-200/80 bg-white p-5 sm:p-6 shadow-xs">
                        <span class="text-[10px] font-bold uppercase tracking-wider text-slate-400">Direct Operations Line</span>
                        <div class="mt-3 flex items-center gap-3.5">
                            <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl bg-emerald-50 text-emerald-700 font-bold border border-emerald-200/80 shadow-2xs">
                                <i class="ri-phone-fill text-lg"></i>
                            </span>
                            <div>
                                <a href="tel:+18004928820" class="text-sm font-extrabold text-slate-900 hover:text-emerald-700 transition block">
                                    +1 (800) 492-8820
                                </a>
                                <p class="text-[11px] text-slate-500 mt-0.5">24/7 Control Center Dispatch</p>
                            </div>
                        </div>
                    </div>

                    <!-- Other Capabilities Switcher -->
                    <div class="rounded-3xl border border-slate-200/80 bg-white p-5 sm:p-6 shadow-xs">
                        <div class="flex items-center justify-between border-b border-slate-100 pb-3 mb-3">
                            <h4 class="text-xs font-extrabold uppercase tracking-wider text-slate-800">
                                All Services
                            </h4>
                            <a href="{{ route('services') }}" class="text-[11px] font-bold text-emerald-700 hover:text-emerald-800 transition">
                                View Catalog
                            </a>
                        </div>
                        <div class="space-y-1.5">
                            @foreach (\App\Services\ServiceCatalog::all() as $navService)
                                <a
                                    href="{{ route('services.show', ['slug' => $navService['slug']]) }}"
                                    class="flex items-center justify-between rounded-xl px-3 py-2.5 text-xs transition {{ $navService['slug'] === $service['slug'] ? 'bg-emerald-50 text-emerald-800 font-bold border border-emerald-200/80 shadow-2xs' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }}"
                                >
                                    <span class="flex items-center gap-2.5 truncate">
                                        <i class="{{ $navService['icon'] }} {{ $navService['slug'] === $service['slug'] ? 'text-emerald-600' : 'text-slate-400' }} text-sm"></i>
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
    </section>

    {{-- Frequently Bundled Companion Services --}}
    <section class="border-t border-slate-200/80 bg-white py-14 sm:py-18">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-4 border-b border-slate-100 pb-6">
                <div>
                    <span class="text-[10px] font-bold uppercase tracking-[0.2em] text-emerald-700">Frequently Bundled</span>
                    <h2 class="mt-1 text-2xl font-extrabold text-slate-900 tracking-tight sm:text-3xl">
                        Companion Facility Capabilities
                    </h2>
                </div>
                <a
                    href="{{ route('services') }}"
                    class="inline-flex items-center gap-1.5 text-xs font-bold text-emerald-700 hover:text-emerald-800 transition shrink-0"
                >
                    <span>View all 6 capabilities</span>
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
                            <span class="absolute bottom-3 left-3 inline-flex items-center gap-1 rounded bg-slate-900/90 px-2.5 py-1 text-[10px] font-bold text-emerald-300 border border-slate-700/50">
                                <i class="{{ $related['icon'] }}"></i> {{ $related['badge'] }}
                            </span>
                        </div>
                        <div class="flex flex-1 flex-col p-5">
                            <h3 class="text-base font-bold text-slate-900 group-hover:text-emerald-700 transition">
                                <a href="{{ route('services.show', ['slug' => $related['slug']]) }}">
                                    {{ $related['title'] }}
                                </a>
                            </h3>
                            <p class="mt-1.5 text-xs text-slate-600 line-clamp-2 leading-relaxed">
                                {{ $related['short_description'] }}
                            </p>
                            <div class="mt-auto pt-4 border-t border-slate-100 flex items-center justify-between">
                                <span class="text-[11px] font-bold text-emerald-700">{{ $related['sla_rating'] }}</span>
                                <a
                                    href="{{ route('services.show', ['slug' => $related['slug']]) }}"
                                    class="text-xs font-bold text-slate-900 hover:text-emerald-700 transition inline-flex items-center gap-1"
                                >
                                    <span>Scope Details</span>
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
            <h2 class="mt-4 text-2xl font-extrabold sm:text-3xl lg:text-4xl text-white">
                Ready to Upgrade Your Facility Service Standard?
            </h2>
            <p class="mx-auto mt-3 max-w-2xl text-xs sm:text-sm text-slate-300 leading-relaxed">
                Book a confidential 30-minute facility assessment. We will audit your current operations, benchmark your costs, and prepare an SLA-guaranteed proposal.
            </p>
            <div class="mt-8 flex flex-col sm:flex-row items-center justify-center gap-4">
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