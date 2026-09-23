<div class="bg-white text-slate-800 antialiased font-sans selection:bg-emerald-500 selection:text-white">

    {{-- Breadcrumb Navigation Bar --}}
    <div class="border-b border-slate-100 bg-white">
        <div class="mx-auto max-w-7xl px-4 py-3.5 sm:px-6 lg:px-8">
            <div class="flex flex-wrap items-center justify-between gap-3 text-xs">
                <nav class="flex items-center gap-2 text-slate-400" aria-label="Breadcrumb">
                    <a href="{{ route('home') }}" class="transition hover:text-emerald-700 font-medium">Home</a>
                    <i class="ri-arrow-right-s-line text-slate-300"></i>
                    <a href="{{ route('services') }}" class="transition hover:text-emerald-700 font-medium">Services</a>
                    <i class="ri-arrow-right-s-line text-slate-300"></i>
                    <span class="font-semibold text-slate-800 truncate max-w-[220px] sm:max-w-none">{{ $service['title'] }}</span>
                </nav>

                <a 
                    href="{{ route('services') }}" 
                    class="inline-flex items-center gap-1.5 font-semibold text-emerald-700 hover:text-emerald-800 transition group"
                >
                    <i class="ri-arrow-left-line transition-transform group-hover:-translate-x-1"></i>
                    <span>All Services</span>
                </a>
            </div>
        </div>
    </div>

    {{-- Service Detail Hero Section --}}
    <section class="border-b border-slate-100 py-12 lg:py-16">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid items-center gap-8 lg:grid-cols-12">
                
                <!-- Left Title & Meta Column -->
                <div class="lg:col-span-8 space-y-4">
                    <div class="flex flex-wrap items-center gap-2">
                        <span class="inline-flex items-center gap-1.5 rounded-full bg-emerald-50 px-3.5 py-1 text-xs font-semibold text-emerald-700">
                            <i class="{{ $service['icon'] }}"></i>
                            <span>{{ $service['badge'] }}</span>
                        </span>
                        <span class="inline-flex items-center gap-1 rounded-full bg-slate-50 px-3 py-1 text-xs font-medium text-slate-600 border border-slate-200/80">
                            <i class="ri-shield-check-fill text-emerald-600"></i> ISO 41001 Certified
                        </span>
                        <span class="inline-flex items-center gap-1 rounded-full bg-slate-50 px-3 py-1 text-xs font-medium text-slate-600 border border-slate-200/80">
                            <i class="ri-checkbox-circle-fill text-emerald-600"></i> Single Master SLA
                        </span>
                    </div>

                    <h1 class="text-3xl font-extrabold tracking-tight text-slate-900 sm:text-4xl lg:text-5xl leading-tight">
                        {{ $service['title'] }}
                    </h1>

                    <p class="text-base font-semibold text-emerald-700">
                        {{ $service['tagline'] }}
                    </p>

                    <p class="text-sm leading-relaxed text-slate-600 sm:text-base max-w-3xl font-normal">
                        {{ $service['full_description'] }}
                    </p>
                </div>

                <!-- Right Quick SLA Snapshot Card -->
                <div class="lg:col-span-4">
                    <div class="rounded-3xl border border-slate-200/80 bg-white p-6 shadow-xs">
                        <div class="flex items-center justify-between border-b border-slate-100 pb-3 mb-4">
                            <span class="text-xs font-semibold uppercase tracking-wider text-slate-700">SLA Snapshot</span>
                            <span class="inline-flex items-center gap-1.5 text-[11px] font-semibold text-emerald-700 bg-emerald-50 px-2.5 py-0.5 rounded-full">
                                <span class="h-2 w-2 rounded-full bg-emerald-500 animate-pulse"></span>
                                Live Standard
                            </span>
                        </div>
                        <dl class="space-y-3 text-xs">
                            <div class="flex items-center justify-between">
                                <dt class="text-slate-400 font-medium">Cleanliness SLA:</dt>
                                <dd class="font-bold text-emerald-700 text-sm">{{ $service['sla_rating'] }}</dd>
                            </div>
                            <div class="flex items-center justify-between">
                                <dt class="text-slate-400 font-medium">Response Window:</dt>
                                <dd class="font-bold text-slate-800">{{ $service['response_time'] }}</dd>
                            </div>
                            <div class="flex items-center justify-between">
                                <dt class="text-slate-400 font-medium">Staffing:</dt>
                                <dd class="font-bold text-slate-800">{{ $service['staff_standard'] }}</dd>
                            </div>
                            <div class="flex items-center justify-between">
                                <dt class="text-slate-400 font-medium">Schedule:</dt>
                                <dd class="font-bold text-slate-800">{{ $service['frequency'] }}</dd>
                            </div>
                        </dl>
                        <a
                            href="#quote-form"
                            class="mt-5 flex w-full items-center justify-center gap-2 rounded-full bg-emerald-600 py-3 text-xs font-semibold text-white shadow-xs transition hover:bg-emerald-700"
                        >
                            <span>Schedule Service Audit</span>
                            <i class="ri-arrow-down-line text-xs"></i>
                        </a>
                    </div>
                </div>

            </div>

            <!-- Key SLA Metrics Strip (4 Uniform Columns) -->
            <div class="mt-8 grid grid-cols-2 gap-4 border-t border-slate-100 pt-6 sm:grid-cols-4">
                <div class="rounded-2xl border border-slate-100 bg-slate-50/50 p-4">
                    <span class="text-[11px] font-medium text-slate-400">Guaranteed SLA</span>
                    <p class="mt-1 text-base sm:text-lg font-bold text-emerald-700">{{ $service['sla_rating'] }}</p>
                </div>
                <div class="rounded-2xl border border-slate-100 bg-slate-50/50 p-4">
                    <span class="text-[11px] font-medium text-slate-400">Response Window</span>
                    <p class="mt-1 text-base sm:text-lg font-bold text-slate-800">{{ $service['response_time'] }}</p>
                </div>
                <div class="rounded-2xl border border-slate-100 bg-slate-50/50 p-4">
                    <span class="text-[11px] font-medium text-slate-400">Staff Qualification</span>
                    <p class="mt-1 text-xs sm:text-sm font-bold text-emerald-800 line-clamp-1">{{ $service['staff_standard'] }}</p>
                </div>
                <div class="rounded-2xl border border-slate-100 bg-slate-50/50 p-4">
                    <span class="text-[11px] font-medium text-slate-400">Shift Availability</span>
                    <p class="mt-1 text-base sm:text-lg font-bold text-slate-800">{{ $service['frequency'] }}</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Main Body: 2 Columns Layout --}}
    <section class="py-14 sm:py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-8 lg:grid-cols-12 items-start">
                
                {{-- Left Column: Deep Dive Content (Col 8) --}}
                <div class="lg:col-span-8 space-y-8 sm:space-y-10">
                    
                    <!-- Featured Image Banner -->
                    <div class="relative overflow-hidden rounded-3xl border border-slate-100 bg-slate-100 aspect-16/9 sm:aspect-21/9 max-h-[380px] shadow-sm">
                        <img 
                            src="{{ asset($service['image']) }}" 
                            alt="{{ $service['title'] }}" 
                            class="h-full w-full object-cover"
                        />
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950/70 via-transparent to-transparent"></div>

                        <!-- Overlay Badge -->
                        <div class="absolute bottom-4 left-4 right-4 sm:bottom-5 sm:left-5 sm:right-5 flex flex-wrap items-center justify-between gap-3 rounded-2xl border border-white/20 bg-white/95 p-3.5 shadow-lg backdrop-blur-md">
                            <div class="flex items-center gap-3">
                                <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-emerald-600 text-white">
                                    <i class="ri-qr-code-line text-lg"></i>
                                </div>
                                <div class="min-w-0">
                                    <p class="text-xs font-bold text-slate-900 truncate">IoT Checkpoint Verification</p>
                                    <p class="text-[11px] text-slate-500 truncate">Logged per shift on client operations portal</p>
                                </div>
                            </div>
                            <span class="inline-flex items-center gap-1.5 text-[11px] font-semibold text-emerald-700 bg-emerald-50 px-3 py-1 rounded-full">
                                <span class="h-2 w-2 rounded-full bg-emerald-500 animate-pulse"></span>
                                Live Auditing
                            </span>
                        </div>
                    </div>

                    <!-- Operational Scope of Work -->
                    <div class="rounded-3xl border border-slate-200/80 bg-white p-7 sm:p-9 shadow-xs space-y-7">
                        <div>
                            <span class="inline-flex items-center gap-1.5 rounded-full bg-emerald-50 px-3 py-1 text-xs font-semibold text-emerald-700">
                                <i class="ri-file-list-3-line text-xs"></i> Operational Scope
                            </span>
                            <h2 class="mt-2 text-2xl font-bold tracking-tight text-slate-900">
                                Standardized Daily &amp; Periodic Care
                            </h2>
                            <p class="mt-1 text-xs sm:text-sm text-slate-500">
                                Executed according to standardized checklists and verified via supervisor digital review.
                            </p>
                        </div>

                        <!-- Daily Routine -->
                        <div>
                            <h3 class="flex items-center gap-2 text-xs font-bold uppercase tracking-wider text-slate-900 mb-4">
                                <span class="flex h-6 w-6 items-center justify-center rounded-full bg-emerald-600 text-white text-xs">
                                    <i class="ri-sun-line"></i>
                                </span>
                                <span>Daily Operational Routine</span>
                            </h3>
                            <div class="grid gap-3 sm:grid-cols-2">
                                @foreach ($service['scope']['daily'] as $task)
                                    <div class="flex items-start gap-2.5 rounded-2xl border border-slate-100 bg-slate-50/50 p-4 text-xs text-slate-700">
                                        <i class="ri-checkbox-circle-fill text-emerald-600 mt-0.5 shrink-0 text-sm"></i>
                                        <span class="leading-relaxed">{{ $task }}</span>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Periodic Treatments -->
                        <div class="border-t border-slate-100 pt-6">
                            <h3 class="flex items-center gap-2 text-xs font-bold uppercase tracking-wider text-slate-900 mb-4">
                                <span class="flex h-6 w-6 items-center justify-center rounded-full bg-slate-900 text-white text-xs">
                                    <i class="ri-calendar-check-line"></i>
                                </span>
                                <span>Periodic &amp; Deep Maintenance</span>
                            </h3>
                            <div class="grid gap-3 sm:grid-cols-2">
                                @foreach ($service['scope']['periodic'] as $task)
                                    <div class="flex items-start gap-2.5 rounded-2xl border border-slate-100 bg-slate-50/50 p-4 text-xs text-slate-700">
                                        <i class="ri-sparkling-fill text-emerald-600 mt-0.5 shrink-0 text-sm"></i>
                                        <span class="leading-relaxed">{{ $task }}</span>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <!-- Equipment & Chemical Technology -->
                    <div class="rounded-3xl border border-slate-200/80 bg-white p-7 sm:p-9 shadow-xs space-y-6">
                        <div>
                            <span class="inline-flex items-center gap-1.5 rounded-full bg-emerald-50 px-3 py-1 text-xs font-semibold text-emerald-700">
                                <i class="ri-cpu-line text-xs"></i> Technology
                            </span>
                            <h2 class="mt-2 text-2xl font-bold tracking-tight text-slate-900">
                                Industrial Equipment &amp; Eco-Formulas
                            </h2>
                            <p class="mt-1 text-xs sm:text-sm text-slate-500">
                                Professional-grade machinery and EPA/Green Seal compliant chemistries for occupant health.
                            </p>
                        </div>

                        <div class="grid gap-3 sm:grid-cols-2">
                            @foreach ($service['equipment'] as $item)
                                <div class="flex items-center gap-3.5 rounded-2xl border border-slate-200/80 bg-slate-50/50 p-4 transition hover:border-emerald-300">
                                    <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-emerald-100 text-emerald-700">
                                        <i class="ri-tools-fill text-sm"></i>
                                    </span>
                                    <span class="text-xs sm:text-sm font-semibold text-slate-800 leading-snug">{{ $item }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Vendor Comparison Matrix -->
                    <div class="rounded-3xl border border-slate-200/80 bg-white p-7 sm:p-9 shadow-xs space-y-6">
                        <div>
                            <span class="inline-flex items-center gap-1.5 rounded-full bg-emerald-50 px-3 py-1 text-xs font-semibold text-emerald-700">
                                <i class="ri-scales-3-line text-xs"></i> Comparison
                            </span>
                            <h2 class="mt-2 text-2xl font-bold tracking-tight text-slate-900">
                                FacilityPro vs Traditional Vendors
                            </h2>
                            <p class="mt-1 text-xs sm:text-sm text-slate-500">
                                Why enterprise property directors choose single-contract SLA governance.
                            </p>
                        </div>

                        <div class="overflow-x-auto rounded-2xl border border-slate-200">
                            <table class="w-full text-left text-xs table-fixed min-w-[540px]">
                                <thead class="bg-slate-50 border-b border-slate-200 text-slate-700 font-semibold uppercase tracking-wider">
                                    <tr>
                                        <th class="w-1/3 p-4">Criteria</th>
                                        <th class="w-1/3 p-4 bg-emerald-50/60 text-emerald-800 border-x border-emerald-200/60">
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
                                            <td class="p-4 bg-emerald-50/20 font-medium text-emerald-900 border-x border-emerald-200/40 align-top">
                                                <div class="flex items-start gap-1.5">
                                                    <i class="ri-check-line text-emerald-600 text-base shrink-0"></i>
                                                    <span class="font-bold leading-relaxed">{{ $row['us'] }}</span>
                                                </div>
                                            </td>
                                            <td class="p-4 text-slate-500 align-top">
                                                <div class="flex items-start gap-1.5">
                                                    <i class="ri-close-line text-rose-500 text-base shrink-0"></i>
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
                    <div class="rounded-3xl border border-slate-200/80 bg-white p-7 sm:p-9 shadow-xs space-y-6">
                        <div>
                            <span class="inline-flex items-center gap-1.5 rounded-full bg-emerald-50 px-3 py-1 text-xs font-semibold text-emerald-700">
                                <i class="ri-flow-chart text-xs"></i> SOP
                            </span>
                            <h2 class="mt-2 text-2xl font-bold tracking-tight text-slate-900">
                                Standard Operating Execution Flow
                            </h2>
                        </div>

                        <div class="grid gap-4 sm:grid-cols-2">
                            <div class="rounded-2xl border border-slate-100 bg-slate-50/60 p-5">
                                <span class="rounded-full bg-emerald-100 px-2.5 py-0.5 text-[10px] font-bold uppercase text-emerald-800">Phase 01</span>
                                <h3 class="mt-2 text-sm font-bold text-slate-900">Pre-Shift Briefing &amp; Readiness</h3>
                                <p class="mt-1.5 text-xs text-slate-500 leading-relaxed">Supervisors verify uniforms, personal safety equipment, and machinery battery readiness.</p>
                            </div>
                            <div class="rounded-2xl border border-slate-100 bg-slate-50/60 p-5">
                                <span class="rounded-full bg-emerald-100 px-2.5 py-0.5 text-[10px] font-bold uppercase text-emerald-800">Phase 02</span>
                                <h3 class="mt-2 text-sm font-bold text-slate-900">Systematic Zonal Execution</h3>
                                <p class="mt-1.5 text-xs text-slate-500 leading-relaxed">Color-coded microfiber mops and HEPA vacuums deployed floor-by-floor with zero cross-contamination.</p>
                            </div>
                            <div class="rounded-2xl border border-slate-100 bg-slate-50/60 p-5">
                                <span class="rounded-full bg-emerald-100 px-2.5 py-0.5 text-[10px] font-bold uppercase text-emerald-800">Phase 03</span>
                                <h3 class="mt-2 text-sm font-bold text-slate-900">IoT QR Code Checkpoint Scan</h3>
                                <p class="mt-1.5 text-xs text-slate-500 leading-relaxed">Staff scan QR plaques upon entering and completing each zone, creating tamper-proof timestamps.</p>
                            </div>
                            <div class="rounded-2xl border border-slate-100 bg-slate-50/60 p-5">
                                <span class="rounded-full bg-emerald-100 px-2.5 py-0.5 text-[10px] font-bold uppercase text-emerald-800">Phase 04</span>
                                <h3 class="mt-2 text-sm font-bold text-slate-900">Supervisor Audit &amp; Sign-Off</h3>
                                <p class="mt-1.5 text-xs text-slate-500 leading-relaxed">Area managers conduct randomized tests, verify scores, and upload shift logs to client portal.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Service FAQs -->
                    <div class="rounded-3xl border border-slate-200/80 bg-white p-7 sm:p-9 shadow-xs space-y-6" x-data="{ activeFaq: 0 }">
                        <div>
                            <span class="inline-flex items-center gap-1.5 rounded-full bg-emerald-50 px-3 py-1 text-xs font-semibold text-emerald-700">
                                <i class="ri-questionnaire-line text-xs"></i> Questions
                            </span>
                            <h2 class="mt-2 text-2xl font-bold tracking-tight text-slate-900">
                                {{ $service['title'] }} FAQs
                            </h2>
                        </div>

                        <div class="space-y-3">
                            @foreach ($service['faqs'] as $index => $faq)
                                <div class="overflow-hidden rounded-2xl border border-slate-200/80 bg-white shadow-xs">
                                    <button
                                        type="button"
                                        class="flex w-full items-center justify-between p-4 sm:p-5 text-left text-xs sm:text-sm font-semibold text-slate-900 transition hover:text-emerald-700 cursor-pointer"
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
                    
                    <!-- Fast Proposal Card with Rounded-Full Controls -->
                    <div id="quote-form" class="scroll-mt-28 rounded-3xl border border-slate-200/80 bg-white p-6 sm:p-7 shadow-xs">
                        <div class="flex items-center gap-3 border-b border-slate-100 pb-4">
                            <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-emerald-50 text-emerald-700 font-bold">
                                <i class="ri-file-edit-line text-lg"></i>
                            </span>
                            <div>
                                <h3 class="text-base font-bold text-slate-900">Request Scope Proposal</h3>
                                <p class="text-xs text-slate-500">Get SLA pricing &amp; schedule a walkthrough</p>
                            </div>
                        </div>

                        @if ($submitted)
                            <div class="mt-6 rounded-2xl border border-emerald-200 bg-emerald-50 p-5 text-center">
                                <div class="mx-auto flex h-11 w-11 items-center justify-center rounded-full bg-emerald-600 text-white">
                                    <i class="ri-check-line text-xl"></i>
                                </div>
                                <h4 class="mt-3 text-sm font-bold text-emerald-900">Proposal Request Received</h4>
                                <p class="mt-1 text-xs text-emerald-700">
                                    Our facility director will contact you within 2 business hours.
                                </p>
                                <button
                                    type="button"
                                    wire:click="$set('submitted', false)"
                                    class="mt-4 inline-flex text-xs font-semibold text-emerald-800 underline hover:text-emerald-900 cursor-pointer"
                                >
                                    Submit another request
                                </button>
                            </div>
                        @else
                            <form wire:submit="submitQuote" class="mt-5 space-y-4">
                                <div>
                                    <label class="block text-xs font-semibold uppercase tracking-wider text-slate-700 mb-1">Your Full Name *</label>
                                    <input
                                        type="text"
                                        wire:model="name"
                                        placeholder="e.g. David Henderson"
                                        class="w-full rounded-full border border-slate-200 bg-white px-4 py-2.5 text-xs text-slate-900 placeholder:text-slate-400 focus:border-emerald-500 focus:outline-none focus:ring-1 focus:ring-emerald-500 transition"
                                    />
                                    @error('name') <span class="text-[11px] text-rose-600 mt-0.5 block">{{ $message }}</span> @enderror
                                </div>

                                <div>
                                    <label class="block text-xs font-semibold uppercase tracking-wider text-slate-700 mb-1">Corporate Email *</label>
                                    <input
                                        type="email"
                                        wire:model="email"
                                        placeholder="d.henderson@enterprise.com"
                                        class="w-full rounded-full border border-slate-200 bg-white px-4 py-2.5 text-xs text-slate-900 placeholder:text-slate-400 focus:border-emerald-500 focus:outline-none focus:ring-1 focus:ring-emerald-500 transition"
                                    />
                                    @error('email') <span class="text-[11px] text-rose-600 mt-0.5 block">{{ $message }}</span> @enderror
                                </div>

                                <div>
                                    <label class="block text-xs font-semibold uppercase tracking-wider text-slate-700 mb-1">Direct Phone *</label>
                                    <input
                                        type="text"
                                        wire:model="phone"
                                        placeholder="+1 (555) 019-2834"
                                        class="w-full rounded-full border border-slate-200 bg-white px-4 py-2.5 text-xs text-slate-900 placeholder:text-slate-400 focus:border-emerald-500 focus:outline-none focus:ring-1 focus:ring-emerald-500 transition"
                                    />
                                    @error('phone') <span class="text-[11px] text-rose-600 mt-0.5 block">{{ $message }}</span> @enderror
                                </div>

                                <div class="grid grid-cols-2 gap-3">
                                    <div>
                                        <label class="block text-xs font-semibold uppercase tracking-wider text-slate-700 mb-1">Property</label>
                                        <select
                                            wire:model="propertyType"
                                            class="w-full rounded-full border border-slate-200 bg-white px-3.5 py-2.5 text-xs text-slate-900 focus:border-emerald-500 focus:outline-none focus:ring-1 focus:ring-emerald-500 transition cursor-pointer"
                                        >
                                            <option>Corporate Office</option>
                                            <option>IT &amp; Tech Park</option>
                                            <option>Commercial Tower</option>
                                            <option>Healthcare Center</option>
                                            <option>Educational Campus</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label class="block text-xs font-semibold uppercase tracking-wider text-slate-700 mb-1">Square Feet</label>
                                        <select
                                            wire:model="squareFootage"
                                            class="w-full rounded-full border border-slate-200 bg-white px-3.5 py-2.5 text-xs text-slate-900 focus:border-emerald-500 focus:outline-none focus:ring-1 focus:ring-emerald-500 transition cursor-pointer"
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
                                    <label class="block text-xs font-semibold uppercase tracking-wider text-slate-700 mb-1">Specific Requirements (Optional)</label>
                                    <textarea
                                        wire:model="notes"
                                        rows="2"
                                        placeholder="e.g. Daily restroom rounds and evening floor scrub..."
                                        class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-2.5 text-xs text-slate-900 placeholder:text-slate-400 focus:border-emerald-500 focus:outline-none focus:ring-1 focus:ring-emerald-500 transition resize-none"
                                    ></textarea>
                                </div>

                                <button
                                    type="submit"
                                    class="w-full inline-flex items-center justify-center gap-2 rounded-full bg-emerald-600 px-6 py-3 text-xs font-semibold text-white shadow-xs transition hover:bg-emerald-700 active:scale-[0.98] cursor-pointer"
                                >
                                    <span>Submit SLA Scope Request</span>
                                    <i class="ri-arrow-right-line"></i>
                                </button>

                                <p class="text-[10px] text-center text-slate-400 flex items-center justify-center gap-1">
                                    <i class="ri-lock-line text-emerald-600"></i>
                                    <span>100% Confidential. NDA protected upon request.</span>
                                </p>
                            </form>
                        @endif
                    </div>

                    <!-- 24/7 Operations Helpline Card -->
                    <div class="rounded-3xl border border-slate-200/80 bg-white p-5 sm:p-6 shadow-xs">
                        <span class="text-[10px] font-semibold uppercase tracking-wider text-slate-400">Direct Operations Line</span>
                        <div class="mt-3 flex items-center gap-3.5">
                            <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-emerald-50 text-emerald-700">
                                <i class="ri-phone-fill text-base"></i>
                            </span>
                            <div>
                                <a href="tel:+18004928820" class="text-sm font-bold text-slate-900 hover:text-emerald-700 transition block">
                                    +1 (800) 492-8820
                                </a>
                                <p class="text-[11px] text-slate-400 mt-0.5">24/7 Control Center Dispatch</p>
                            </div>
                        </div>
                    </div>

                    <!-- Other Capabilities Switcher -->
                    <div class="rounded-3xl border border-slate-200/80 bg-white p-5 sm:p-6 shadow-xs">
                        <div class="flex items-center justify-between border-b border-slate-100 pb-3 mb-3">
                            <h4 class="text-xs font-semibold uppercase tracking-wider text-slate-700">
                                All Services
                            </h4>
                            <a href="{{ route('services') }}" class="text-[11px] font-semibold text-emerald-700 hover:text-emerald-800 transition">
                                View Catalog
                            </a>
                        </div>
                        <div class="space-y-1">
                            @foreach (\App\Services\ServiceCatalog::all() as $navService)
                                <a
                                    href="{{ route('services.show', ['slug' => $navService['slug']]) }}"
                                    class="flex items-center justify-between rounded-full px-3.5 py-2 text-xs transition {{ $navService['slug'] === $service['slug'] ? 'bg-emerald-50 text-emerald-800 font-bold border border-emerald-200/80' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }}"
                                >
                                    <span class="flex items-center gap-2 truncate">
                                        <i class="{{ $navService['icon'] }} {{ $navService['slug'] === $service['slug'] ? 'text-emerald-600' : 'text-slate-400' }} text-sm"></i>
                                        <span class="truncate">{{ $navService['title'] }}</span>
                                    </span>
                                    <i class="ri-arrow-right-s-line text-slate-400 shrink-0 text-xs"></i>
                                </a>
                            @endforeach
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>

    {{-- Frequently Bundled Companion Services --}}
    <section class="border-t border-slate-100 bg-slate-50/50 py-16 sm:py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-4 border-b border-slate-200/80 pb-6">
                <div>
                    <span class="text-xs font-semibold uppercase tracking-wider text-emerald-700">Frequently Bundled</span>
                    <h2 class="mt-1 text-2xl font-bold tracking-tight text-slate-900 sm:text-3xl">
                        Companion Capabilities
                    </h2>
                </div>
                <a
                    href="{{ route('services') }}"
                    class="inline-flex items-center gap-1.5 text-xs font-semibold text-emerald-700 hover:text-emerald-800 transition shrink-0"
                >
                    <span>View all capabilities</span>
                    <i class="ri-arrow-right-line"></i>
                </a>
            </div>

            <div class="mt-8 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($this->relatedServices as $related)
                    <div class="group flex flex-col rounded-3xl border border-slate-200/80 bg-white overflow-hidden shadow-xs hover:border-emerald-300 hover:shadow-xl transition-all duration-300">
                        <div class="relative h-44 overflow-hidden bg-slate-100">
                            <img
                                src="{{ asset($related['image']) }}"
                                alt="{{ $related['title'] }}"
                                class="h-full w-full object-cover transition-transform duration-300 group-hover:scale-105"
                            />
                            <div class="absolute inset-0 bg-gradient-to-t from-slate-950/60 to-transparent"></div>
                            <span class="absolute bottom-3 left-3 rounded-full bg-slate-900/90 px-2.5 py-1 text-[10px] font-semibold text-emerald-400">
                                {{ $related['badge'] }}
                            </span>
                        </div>
                        <div class="flex flex-1 flex-col p-6 justify-between">
                            <div>
                                <h3 class="text-base font-bold text-slate-900 group-hover:text-emerald-700 transition">
                                    <a href="{{ route('services.show', ['slug' => $related['slug']]) }}">
                                        {{ $related['title'] }}
                                    </a>
                                </h3>
                                <p class="mt-1.5 text-xs text-slate-500 line-clamp-2 leading-relaxed">
                                    {{ $related['short_description'] }}
                                </p>
                            </div>
                            <div class="mt-5 pt-4 border-t border-slate-100 flex items-center justify-between">
                                <span class="text-[11px] font-semibold text-emerald-700">{{ $related['sla_rating'] }}</span>
                                <a
                                    href="{{ route('services.show', ['slug' => $related['slug']]) }}"
                                    class="inline-flex items-center gap-1 text-xs font-semibold text-slate-900 hover:text-emerald-700 transition"
                                >
                                    <span>Scope</span>
                                    <i class="ri-arrow-right-line text-xs"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Bottom Enterprise CTA (Rounded-Full Buttons) --}}
    <section class="py-20 sm:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="relative overflow-hidden rounded-3xl bg-slate-950 px-6 py-14 sm:px-12 lg:py-16 text-center text-white border border-slate-800">
                <div class="relative max-w-2xl mx-auto space-y-4">
                    <span class="inline-flex items-center gap-2 rounded-full bg-white/10 px-3.5 py-1 text-xs font-semibold text-emerald-400">
                        <i class="ri-check-double-line"></i> Immediate Onboarding
                    </span>
                    <h2 class="text-3xl font-extrabold tracking-tight sm:text-4xl text-white">
                        Upgrade your facility service standard
                    </h2>
                    <p class="text-sm text-slate-400 leading-relaxed max-w-lg mx-auto">
                        Book a confidential 30-minute facility assessment. We audit your layout, benchmark your costs, and prepare an SLA proposal.
                    </p>
                    <div class="pt-4 flex flex-wrap items-center justify-center gap-3">
                        <a
                            href="{{ route('contact') }}"
                            class="inline-flex items-center gap-2 rounded-full bg-emerald-500 px-7 py-3.5 text-xs sm:text-sm font-semibold text-slate-950 shadow-sm transition hover:bg-emerald-400 active:scale-[0.98]"
                        >
                            <span>Schedule Free Walkthrough</span>
                            <i class="ri-arrow-right-line text-sm"></i>
                        </a>
                        <a
                            href="tel:+18004928820"
                            class="inline-flex items-center gap-2 rounded-full border border-white/20 bg-white/10 px-6 py-3.5 text-xs sm:text-sm font-medium text-white backdrop-blur-md transition hover:bg-white/20 active:scale-[0.98]"
                        >
                            <i class="ri-phone-line text-sm text-emerald-400"></i>
                            <span>+1 (800) 492-8820</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>