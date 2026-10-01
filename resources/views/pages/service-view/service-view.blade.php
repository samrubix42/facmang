@php
    $catalog = $this->catalogData;
@endphp

<div class="bg-white text-slate-800 antialiased font-sans selection:bg-red-500 selection:text-white">

    

 

    {{-- Page Hero --}}
    <section class="bg-[#0B1A30]">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            <nav class="border-b border-white/10 py-3.5 text-xs" aria-label="Breadcrumb">
                <ol class="flex flex-wrap items-center gap-1.5">
                    <li><a href="{{ route('home') }}" class="font-medium text-slate-400 transition hover:text-white">Home</a></li>
                    <li aria-hidden="true"><i class="ri-arrow-right-s-line text-slate-600"></i></li>
                    <li><a href="{{ route('services') }}" class="font-medium text-slate-400 transition hover:text-white">Services</a></li>
                    <li aria-hidden="true"><i class="ri-arrow-right-s-line text-slate-600"></i></li>
                    <li><span class="font-semibold text-white" aria-current="page">{{ $service->title }}</span></li>
                </ol>
            </nav>

            <div class="py-14 sm:py-20 lg:py-24">
                <h1 class="max-w-4xl text-4xl font-extrabold leading-[1.05] tracking-tighter text-white sm:text-5xl lg:text-6xl">
                    {{ $service->title }}
                </h1>

                <p class="mt-4 max-w-2xl text-sm leading-relaxed text-slate-300 sm:text-base">
                    {{ $service->short_description ?? $catalog['tagline'] ?? $service->category?->title ?? '' }}
                </p>
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
                            src="{{ asset($service->image) }}" 
                            alt="{{ $service->title }}" 
                            class="h-full w-full object-cover"
                            onerror="this.onerror=null; this.src='https://placehold.co/1200x600?text={{ urlencode($service->title) }}';"
                        />
                        <div class="absolute inset-0 bg-gradient-to-t from-[#0B1A30]/70 via-transparent to-transparent"></div>

                        <!-- Overlay Badge -->
                     
                    </div>

                    <!-- Dynamic Rich Content from Database (TinyMCE) -->
                    @if (!empty($service->content))
                        <div class="rounded-3xl border border-slate-200/80 bg-white p-7 sm:p-9 shadow-xs space-y-4">
                            <div class="flex items-center gap-2 border-b border-slate-100 pb-4">
                                <span class="flex h-8 w-8 items-center justify-center rounded-full bg-[#12233F]/10 text-[#12233F] text-xs">
                                    <i class="ri-file-text-line"></i>
                                </span>
                                <div>
                                    <h2 class="text-xl font-bold tracking-tight text-slate-900">
                                        Scope &amp; Service Specifications
                                    </h2>
                                    <p class="text-xs text-slate-500">Official scope of work and enterprise deliverables</p>
                                </div>
                            </div>
                            <div class="rich-content">
                                {!! $service->content !!}
                            </div>
                        </div>
                    @endif

                    @if (empty($service->content) && (!empty($catalog['scope']['daily']) || !empty($catalog['scope']['periodic'])))
                        <!-- Operational Scope of Work -->
                        <div class="rounded-3xl border border-slate-200/80 bg-white p-7 sm:p-9 shadow-xs space-y-7">
                            <div>
                                <span class="inline-flex items-center gap-1.5 rounded-full bg-[#12233F]/10 px-3 py-1 text-xs font-semibold text-[#12233F]">
                                    <i class="ri-file-list-3-line text-xs"></i> Operational Scope
                                </span>
                                <h2 class="mt-2 text-2xl font-bold tracking-tight text-slate-900">
                                    Standardized Daily &amp; Periodic Care
                                </h2>
                                <p class="mt-1 text-xs sm:text-sm text-slate-500">
                                    Executed according to standardized checklists and verified via supervisor digital review.
                                </p>
                            </div>

                            @if (!empty($catalog['scope']['daily']))
                                <!-- Daily Routine -->
                                <div>
                                    <h3 class="flex items-center gap-2 text-xs font-bold uppercase tracking-wider text-slate-900 mb-4">
                                        <span class="flex h-6 w-6 items-center justify-center rounded-full bg-red-600 text-white text-xs">
                                            <i class="ri-sun-line"></i>
                                        </span>
                                        <span>Daily Operational Routine</span>
                                    </h3>
                                    <div class="grid gap-3 sm:grid-cols-2">
                                        @foreach ($catalog['scope']['daily'] as $task)
                                            <div class="flex items-start gap-2.5 rounded-2xl border border-slate-100 bg-slate-50/50 p-4 text-xs text-slate-700">
                                                <i class="ri-checkbox-circle-fill text-[#12233F] mt-0.5 shrink-0 text-sm"></i>
                                                <span class="leading-relaxed">{{ $task }}</span>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif

                            @if (!empty($catalog['scope']['periodic']))
                                <!-- Periodic Treatments -->
                                <div class="border-t border-slate-100 pt-6">
                                    <h3 class="flex items-center gap-2 text-xs font-bold uppercase tracking-wider text-slate-900 mb-4">
                                        <span class="flex h-6 w-6 items-center justify-center rounded-full bg-[#12233F] text-white text-xs">
                                            <i class="ri-calendar-check-line"></i>
                                        </span>
                                        <span>Periodic &amp; Deep Maintenance</span>
                                    </h3>
                                    <div class="grid gap-3 sm:grid-cols-2">
                                        @foreach ($catalog['scope']['periodic'] as $task)
                                            <div class="flex items-start gap-2.5 rounded-2xl border border-slate-100 bg-slate-50/50 p-4 text-xs text-slate-700">
                                                <i class="ri-sparkling-fill text-[#12233F] mt-0.5 shrink-0 text-sm"></i>
                                                <span class="leading-relaxed">{{ $task }}</span>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        </div>
                    @endif

                    @if (empty($service->content) && !empty($catalog['equipment']))
                        <!-- Equipment & Chemical Technology -->
                        <div class="rounded-3xl border border-slate-200/80 bg-white p-7 sm:p-9 shadow-xs space-y-6">
                            <div>
                                <span class="inline-flex items-center gap-1.5 rounded-full bg-[#12233F]/10 px-3 py-1 text-xs font-semibold text-[#12233F]">
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
                                @foreach ($catalog['equipment'] as $item)
                                    <div class="flex items-center gap-3.5 rounded-2xl border border-slate-200/80 bg-slate-50/50 p-4 transition hover:border-[#12233F]/30">
                                        <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-[#12233F]/10 text-[#12233F]">
                                            <i class="ri-tools-fill text-sm"></i>
                                        </span>
                                        <span class="text-xs sm:text-sm font-semibold text-slate-800 leading-snug">{{ $item }}</span>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    @if (!empty($catalog['comparison']))
                        <!-- Vendor Comparison Matrix -->
                        <div class="rounded-3xl border border-slate-200/80 bg-white p-7 sm:p-9 shadow-xs space-y-6">
                            <div>
                                <span class="inline-flex items-center gap-1.5 rounded-full bg-[#12233F]/10 px-3 py-1 text-xs font-semibold text-[#12233F]">
                                    <i class="ri-scales-3-line text-xs"></i> Comparison
                                </span>
                                <h2 class="mt-2 text-2xl font-bold tracking-tight text-slate-900">
                                    Real Facility Services vs Traditional Vendors
                                </h2>
                                <p class="mt-1 text-xs sm:text-sm text-slate-500">
                                    Why property managers choose Real Facility Services over traditional vendors.
                                </p>
                            </div>

                            <div class="overflow-x-auto rounded-2xl border border-slate-200">
                                <table class="w-full text-left text-xs table-fixed min-w-[540px]">
                                    <thead class="bg-slate-50 border-b border-slate-200 text-slate-700 font-semibold uppercase tracking-wider">
                                        <tr>
                                            <th class="w-1/3 p-4">Criteria</th>
                                            <th class="w-1/3 p-4 bg-[#12233F]/10 text-[#12233F] border-x border-[#12233F]/10">
                                                <div class="flex items-center gap-1.5">
                                                    <i class="ri-checkbox-circle-fill text-[#12233F]"></i>
                                                    <span>RFS Standard</span>
                                                </div>
                                            </th>
                                            <th class="w-1/3 p-4 text-slate-500">Typical Contractor</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-slate-100">
                                        @foreach ($catalog['comparison'] as $row)
                                            <tr class="hover:bg-slate-50/50 transition">
                                                <td class="p-4 font-bold text-slate-900 align-top">{{ $row['feature'] }}</td>
                                                <td class="p-4 bg-[#12233F]/5 font-medium text-[#12233F] border-x border-[#12233F]/10 align-top">
                                                    <div class="flex items-start gap-1.5">
                                                        <i class="ri-check-line text-[#12233F] text-base shrink-0"></i>
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
                    @endif

                    

                    @if (!empty($catalog['faqs']))
                        <!-- Service FAQs -->
                        <div class="rounded-3xl border border-slate-200/80 bg-white p-7 sm:p-9 shadow-xs space-y-6" x-data="{ activeFaq: 0 }">
                            <div>
                                <span class="inline-flex items-center gap-1.5 rounded-full bg-[#12233F]/10 px-3 py-1 text-xs font-semibold text-[#12233F]">
                                    <i class="ri-questionnaire-line text-xs"></i> Questions
                                </span>
                                <h2 class="mt-2 text-2xl font-bold tracking-tight text-slate-900">
                                    {{ $service->title }} FAQs
                                </h2>
                            </div>

                            <div class="space-y-3">
                                @foreach ($catalog['faqs'] as $index => $faq)
                                    <div class="overflow-hidden rounded-2xl border border-slate-200/80 bg-white shadow-xs">
                                        <button
                                            type="button"
                                            class="flex w-full items-center justify-between p-4 sm:p-5 text-left text-xs sm:text-sm font-semibold text-slate-900 transition hover:text-[#12233F] cursor-pointer"
                                            @click="activeFaq = (activeFaq === {{ $index }} ? null : {{ $index }})"
                                        >
                                            <span>{{ $faq['q'] }}</span>
                                            <i class="ri-arrow-down-s-line text-base text-slate-400 transition-transform duration-200 shrink-0 ml-2" :class="activeFaq === {{ $index }} ? 'rotate-180 text-[#12233F]' : ''"></i>
                                        </button>
                                        <div x-show="activeFaq === {{ $index }}" x-collapse class="border-t border-slate-100 p-4 sm:p-5 text-xs sm:text-sm leading-relaxed text-slate-600 bg-slate-50/50">
                                            {{ $faq['a'] }}
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                </div>

                {{-- Right Column: Interactive Quote Sidebar (Col 4) --}}
                <div class="lg:col-span-4 space-y-6">
                    
                    <!-- Fast Proposal Card with Rounded-Full Controls -->
                    <div id="quote-form" class="scroll-mt-28 rounded-3xl border border-slate-200/80 bg-white p-6 sm:p-7 shadow-xs">
                        <div class="flex items-center gap-3 border-b border-slate-100 pb-4">
                            <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-[#12233F]/10 text-[#12233F] font-bold">
                                <i class="ri-file-edit-line text-lg"></i>
                            </span>
                            <div>
                                <h3 class="text-base font-bold text-slate-900">Request Scope Proposal</h3>
                                <p class="text-xs text-slate-500">Get customized pricing &amp; schedule a walkthrough</p>
                            </div>
                        </div>

                        @if ($submitted)
                            <div class="mt-6 rounded-2xl border border-[#12233F]/10 bg-[#12233F]/10 p-5 text-center">
                                <div class="mx-auto flex h-11 w-11 items-center justify-center rounded-full bg-red-600 text-white">
                                    <i class="ri-check-line text-xl"></i>
                                </div>
                                <h4 class="mt-3 text-sm font-bold text-[#12233F]">Proposal Request Received</h4>
                                <p class="mt-1 text-xs text-[#12233F]">
                                    Our facility director will contact you within 2 business hours.
                                </p>
                                <button
                                    type="button"
                                    wire:click="$set('submitted', false)"
                                    class="mt-4 inline-flex text-xs font-semibold text-[#12233F] underline hover:text-[#12233F] cursor-pointer"
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
                                        class="w-full rounded-full border border-slate-200 bg-white px-4 py-2.5 text-xs text-slate-900 placeholder:text-slate-400 focus:border-red-500 focus:outline-none focus:ring-1 focus:ring-red-500 transition"
                                    />
                                    @error('name') <span class="text-[11px] text-rose-600 mt-0.5 block">{{ $message }}</span> @enderror
                                </div>

                                <div>
                                    <label class="block text-xs font-semibold uppercase tracking-wider text-slate-700 mb-1">Phone Number *</label>
                                    <input
                                        type="text"
                                        wire:model="phone"
                                        placeholder="+91 98765 43210"
                                        class="w-full rounded-full border border-slate-200 bg-white px-4 py-2.5 text-xs text-slate-900 placeholder:text-slate-400 focus:border-red-500 focus:outline-none focus:ring-1 focus:ring-red-500 transition"
                                    />
                                    @error('phone') <span class="text-[11px] text-rose-600 mt-0.5 block">{{ $message }}</span> @enderror
                                </div>

                                <div>
                                    <label class="block text-xs font-semibold uppercase tracking-wider text-slate-700 mb-1">Subject *</label>
                                    <input
                                        type="text"
                                        wire:model="subject"
                                        placeholder="e.g. Washroom Hygiene Inquiry"
                                        class="w-full rounded-full border border-slate-200 bg-white px-4 py-2.5 text-xs text-slate-900 placeholder:text-slate-400 focus:border-red-500 focus:outline-none focus:ring-1 focus:ring-red-500 transition"
                                    />
                                    @error('subject') <span class="text-[11px] text-rose-600 mt-0.5 block">{{ $message }}</span> @enderror
                                </div>

                                <div>
                                    <label class="block text-xs font-semibold uppercase tracking-wider text-slate-700 mb-1">Description *</label>
                                    <textarea
                                        wire:model="description"
                                        rows="3"
                                        placeholder="Please enter details of your request..."
                                        class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-2.5 text-xs text-slate-900 placeholder:text-slate-400 focus:border-red-500 focus:outline-none focus:ring-1 focus:ring-red-500 transition resize-none"
                                    ></textarea>
                                    @error('description') <span class="text-[11px] text-rose-600 mt-0.5 block">{{ $message }}</span> @enderror
                                </div>

                                <button
                                    type="submit"
                                    wire:loading.attr="disabled"
                                    class="w-full inline-flex items-center justify-center gap-2 rounded-full bg-red-600 px-6 py-3 text-xs font-semibold text-white shadow-xs transition hover:bg-red-700 active:scale-[0.98] cursor-pointer disabled:opacity-75 disabled:cursor-not-allowed"
                                >
                                    <span wire:loading.remove wire:target="submitQuote" class="inline-flex items-center gap-2">
                                        <span>Submit Proposal Request</span>
                                        <i class="ri-arrow-right-line"></i>
                                    </span>

                                    <span wire:loading wire:target="submitQuote" class="inline-flex items-center gap-2">
                                        <i class="ri-loader-4-line text-sm animate-spin"></i>
                                        <span>Submitting Request...</span>
                                    </span>
                                </button>

                                <p class="text-[10px] text-center text-slate-400 flex items-center justify-center gap-1">
                                    <i class="ri-lock-line text-[#12233F]"></i>
                                    <span>100% Confidential. NDA protected upon request.</span>
                                </p>
                            </form>
                        @endif
                    </div>

                    <!-- 24/7 Operations Helpline Card -->
                    <div class="rounded-3xl border border-slate-200/80 bg-white p-5 sm:p-6 shadow-xs">
                        <span class="text-[10px] font-semibold uppercase tracking-wider text-slate-400">Direct Operations Line</span>
                        <div class="mt-3 flex items-center gap-3.5">
                            <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-[#12233F]/10 text-[#12233F]">
                                <i class="ri-phone-fill text-base"></i>
                            </span>
                            <div>
                                <a href="tel:{{ setting('phone', '+91 88005-93143') }}" class="text-sm font-bold text-slate-900 hover:text-[#12233F] transition block">
                                    {{ setting('phone', '+91 88005-93143') }}
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
                            <a href="{{ route('services') }}" class="text-[11px] font-semibold text-[#12233F] hover:text-[#12233F] transition">
                                View Catalog
                            </a>
                        </div>
                        <div class="space-y-1">
                            @foreach ($this->allServices as $navService)
                                <a
                                    href="{{ route('services.show', ['slug' => $navService->slug]) }}"
                                    class="flex items-center justify-between rounded-full px-3.5 py-2 text-xs transition {{ $navService->slug === $service->slug ? 'bg-[#12233F]/10 text-[#12233F] font-bold border border-[#12233F]/20' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }}"
                                >
                                    <span class="flex items-center gap-2 truncate">
                                        <i class="ri-checkbox-circle-line {{ $navService->slug === $service->slug ? 'text-[#12233F]' : 'text-slate-400' }} text-sm"></i>
                                        <span class="truncate">{{ $navService->title }}</span>
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
    <section class="border-t border-slate-100 bg-slate-50/50 py-14 sm:py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-4 border-b border-slate-200/80 pb-6">
                <div>
                    <span class="text-xs font-semibold uppercase tracking-wider text-[#12233F]">Frequently Bundled</span>
                    <h2 class="mt-1 text-2xl font-bold tracking-tight text-slate-900 sm:text-3xl">
                        Companion Capabilities
                    </h2>
                </div>
                <a
                    href="{{ route('services') }}"
                    class="inline-flex items-center gap-1.5 text-xs font-semibold text-[#12233F] hover:text-[#12233F] transition shrink-0"
                >
                    <span>View all capabilities</span>
                    <i class="ri-arrow-right-line"></i>
                </a>
            </div>

            <div class="mt-8 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($this->relatedServices as $related)
                    <div class="group flex flex-col rounded-3xl border border-slate-200/80 bg-white overflow-hidden shadow-xs hover:border-[#12233F]/30 hover:shadow-xl transition-all duration-300">
                        <div class="relative h-44 overflow-hidden bg-slate-100">
                            <img
                                src="{{ asset($related->image) }}"
                                alt="{{ $related->title }}"
                                class="h-full w-full object-cover transition-transform duration-300 group-hover:scale-105"
                                onerror="this.onerror=null; this.src='https://placehold.co/600x400?text={{ urlencode($related->title) }}';"
                            />
                            <div class="absolute inset-0 bg-gradient-to-t from-[#0B1A30]/60 to-transparent"></div>
                            <span class="absolute bottom-3 left-3 rounded-full bg-[#12233F]/90 px-2.5 py-1 text-[10px] font-semibold text-red-400">
                                {{ $related->category?->title ?? 'Facility Service' }}
                            </span>
                        </div>
                        <div class="flex flex-1 flex-col p-6 justify-between">
                            <div>
                                <h3 class="text-base font-bold text-slate-900 group-hover:text-[#12233F] transition">
                                    <a href="{{ route('services.show', ['slug' => $related->slug]) }}">
                                        {{ $related->title }}
                                    </a>
                                </h3>
                                <p class="mt-1.5 text-xs text-slate-500 line-clamp-2 leading-relaxed">
                                    {{ $related->short_description }}
                                </p>
                            </div>
                             <div class="mt-5 pt-4 border-t border-slate-100 flex items-center justify-between">
                                <span class="text-[11px] font-semibold text-[#12233F]">Quality Guaranteed</span>
                                <a
                                    href="{{ route('services.show', ['slug' => $related->slug]) }}"
                                    class="inline-flex items-center gap-1 text-xs font-semibold text-slate-900 hover:text-[#12233F] transition"
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
    <section class="py-14 sm:py-20 lg:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="relative overflow-hidden rounded-3xl bg-[#0B1A30] px-6 py-14 sm:px-12 lg:py-16 text-center text-white border border-slate-800">
                <div class="relative max-w-2xl mx-auto space-y-4">
                    <span class="inline-flex items-center gap-2 rounded-full bg-white/10 px-3.5 py-1 text-xs font-semibold text-red-400">
                        <i class="ri-check-double-line"></i> Immediate Onboarding
                    </span>
                    <h2 class="text-3xl font-extrabold tracking-tight sm:text-4xl text-white">
                        Upgrade your facility service standard
                    </h2>
                    <p class="text-sm text-slate-400 leading-relaxed max-w-lg mx-auto">
                        Book a confidential 30-minute facility assessment. We audit your layout, benchmark your costs, and prepare a customized proposal.
                    </p>
                    <div class="pt-4 flex flex-wrap items-center justify-center gap-3">
                        <a
                            href="{{ route('contact') }}"
                            class="inline-flex items-center gap-2 rounded-full bg-red-500 px-7 py-3.5 text-xs sm:text-sm font-semibold text-slate-950 shadow-sm transition hover:bg-red-400 active:scale-[0.98]"
                        >
                            <span>Schedule Free Walkthrough</span>
                            <i class="ri-arrow-right-line text-sm"></i>
                        </a>
                        <a
                            href="tel:{{ setting('phone', '+91 88005-93143') }}"
                            class="inline-flex items-center gap-2 rounded-full border border-white/20 bg-white/10 px-6 py-3.5 text-xs sm:text-sm font-medium text-white backdrop-blur-md transition hover:bg-white/20 active:scale-[0.98]"
                        >
                            <i class="ri-phone-line text-sm text-red-400"></i>
                            <span>{{ setting('phone', '+91 88005-93143') }}</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>