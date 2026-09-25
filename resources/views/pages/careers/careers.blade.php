<div 
    class="bg-white text-slate-800 antialiased font-sans selection:bg-red-500 selection:text-white"
    x-data="{
        activeCategory: 'all',
        searchQuery: '',
        scrollToForm() {
            if (window.innerWidth < 1024) {
                const el = document.getElementById('application-form-panel');
                if (el) {
                    el.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            }
        },
        selectJob(title) {
            $wire.selectPosition(title);
            this.scrollToForm();
        }
    }"
>

    {{-- Hero Header Section (Navy & Red Brand System) --}}
    <section class="relative border-b border-slate-100 bg-gradient-to-b from-[#12233F]/[0.04] via-white to-white py-14 sm:py-20 overflow-hidden">
        {{-- Ambient decorative background glow --}}
        <div class="absolute -top-36 left-1/2 -translate-x-1/2 h-96 w-[760px] bg-gradient-to-tr from-[#12233F]/10 via-red-500/10 to-transparent blur-3xl rounded-full pointer-events-none -z-10"></div>

        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-3xl text-center space-y-4">
                
                {{-- Eyebrow badge --}}
                <div class="inline-flex items-center gap-2 rounded-full border border-[#12233F]/15 bg-[#12233F]/5 px-3.5 py-1.5 text-xs font-semibold text-[#12233F] shadow-2xs">
                    <span class="flex h-2 w-2 rounded-full bg-red-600 animate-pulse"></span>
                    <span>Join Our Operations Team</span>
                    <span class="text-slate-300">•</span>
                    <span class="text-slate-600 font-normal">Direct Company Rolls (On-Roll)</span>
                </div>

                {{-- Headline --}}
                <h1 class="text-3xl font-extrabold tracking-tight text-slate-900 sm:text-5xl sm:leading-[1.18]">
                    Build A High-Impact Career In Modern Facility Operations
                </h1>

                {{-- Subtitle --}}
                <p class="text-sm sm:text-base leading-relaxed text-slate-600 font-normal max-w-2xl mx-auto">
                    Join an elite workforce maintaining Class-A commercial towers, IT parks, and healthcare campuses. We offer market-leading compensation in Indian Rupees, statutory benefits, paid certifications, and rapid internal growth.
                </p>

                {{-- Key Highlights in Rupees & Benefits --}}
                <div class="pt-2 flex flex-wrap items-center justify-center gap-2 sm:gap-3 text-xs text-slate-700 font-medium">
                    <div class="inline-flex items-center gap-1.5 rounded-lg bg-[#12233F]/5 px-3.5 py-1.5 border border-[#12233F]/10">
                        <i class="ri-money-rupee-circle-line text-red-600 text-sm"></i>
                        <span class="font-bold text-slate-900">₹18,000 – ₹60,000+ / month</span>
                    </div>
                    <div class="inline-flex items-center gap-1.5 rounded-lg bg-[#12233F]/5 px-3.5 py-1.5 border border-[#12233F]/10">
                        <i class="ri-shield-check-line text-[#12233F] text-sm"></i>
                        <span>ESI &amp; Provident Fund (PF)</span>
                    </div>
                    <div class="inline-flex items-center gap-1.5 rounded-lg bg-[#12233F]/5 px-3.5 py-1.5 border border-[#12233F]/10">
                        <i class="ri-medal-line text-red-600 text-sm"></i>
                        <span>Sponsored Trade Training</span>
                    </div>
                    <div class="inline-flex items-center gap-1.5 rounded-lg bg-[#12233F]/5 px-3.5 py-1.5 border border-[#12233F]/10">
                        <i class="ri-time-line text-[#12233F] text-sm"></i>
                        <span>Prompt Monthly Direct Payouts</span>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- Main 2-Column Section: Positions (Left) & Application Form (Right) --}}
    <section class="py-12 sm:py-16 bg-slate-50/40" id="careers-board">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-10 items-start">
                
                {{-- LEFT COLUMN: Open Positions List & Filter --}}
                <div class="lg:col-span-7 xl:col-span-7 space-y-6">
                    
                    {{-- Section Header & Filter Controls --}}
                    <div class="rounded-2xl border border-slate-200/80 bg-white p-5 sm:p-6 shadow-xs space-y-4">
                        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 border-b border-slate-100 pb-4">
                            <div>
                                <div class="inline-flex items-center gap-1.5 text-xs font-bold text-red-600 uppercase tracking-wider mb-1">
                                    <i class="ri-briefcase-line"></i>
                                    <span>Immediate Openings</span>
                                </div>
                                <h2 class="text-xl sm:text-2xl font-extrabold text-slate-900 tracking-tight">
                                    Select an Open Position
                                </h2>
                                <p class="text-xs text-slate-500 mt-0.5">
                                    Click any card below to automatically load it into the application form.
                                </p>
                            </div>
                            
                            {{-- Positions Count Pill --}}
                            <div class="self-start sm:self-auto">
                                <span class="inline-flex items-center gap-1.5 rounded-full bg-[#12233F]/10 px-3 py-1 text-xs font-bold text-[#12233F]">
                                    <span class="flex h-1.5 w-1.5 rounded-full bg-red-600"></span>
                                    <span>{{ count($this->openPositions()) }} Roles Available</span>
                                </span>
                            </div>
                        </div>

                        {{-- Category Filter Pills --}}
                        <div class="flex flex-wrap items-center gap-1.5 sm:gap-2">
                            <button
                                type="button"
                                @click="activeCategory = 'all'"
                                class="rounded-lg px-3 py-1.5 text-xs font-semibold transition cursor-pointer"
                                :class="activeCategory === 'all' ? 'bg-[#12233F] text-white shadow-xs' : 'bg-slate-100 text-slate-600 hover:bg-slate-200'"
                            >
                                All Roles
                            </button>
                            <button
                                type="button"
                                @click="activeCategory = 'cleaning'"
                                class="rounded-lg px-3 py-1.5 text-xs font-semibold transition cursor-pointer"
                                :class="activeCategory === 'cleaning' ? 'bg-[#12233F] text-white shadow-xs' : 'bg-slate-100 text-slate-600 hover:bg-slate-200'"
                            >
                                Cleaning &amp; Sweeping
                            </button>
                            <button
                                type="button"
                                @click="activeCategory = 'pantry'"
                                class="rounded-lg px-3 py-1.5 text-xs font-semibold transition cursor-pointer"
                                :class="activeCategory === 'pantry' ? 'bg-[#12233F] text-white shadow-xs' : 'bg-slate-100 text-slate-600 hover:bg-slate-200'"
                            >
                                Pantry &amp; Staffing
                            </button>
                            <button
                                type="button"
                                @click="activeCategory = 'mep'"
                                class="rounded-lg px-3 py-1.5 text-xs font-semibold transition cursor-pointer"
                                :class="activeCategory === 'mep' ? 'bg-[#12233F] text-white shadow-xs' : 'bg-slate-100 text-slate-600 hover:bg-slate-200'"
                            >
                                MEP &amp; Technical
                            </button>
                            <button
                                type="button"
                                @click="activeCategory = 'management'"
                                class="rounded-lg px-3 py-1.5 text-xs font-semibold transition cursor-pointer"
                                :class="activeCategory === 'management' ? 'bg-[#12233F] text-white shadow-xs' : 'bg-slate-100 text-slate-600 hover:bg-slate-200'"
                            >
                                Field Operations
                            </button>
                            <button
                                type="button"
                                @click="activeCategory = 'facades'"
                                class="rounded-lg px-3 py-1.5 text-xs font-semibold transition cursor-pointer"
                                :class="activeCategory === 'facades' ? 'bg-[#12233F] text-white shadow-xs' : 'bg-slate-100 text-slate-600 hover:bg-slate-200'"
                            >
                                Facades &amp; Heights
                            </button>
                        </div>
                    </div>

                    {{-- Cards List --}}
                    <div class="space-y-4">
                        @foreach ($this->openPositions() as $job)
                            @php
                                $isSelected = ($selectedJob === $job['title']);
                            @endphp
                            <div 
                                x-show="activeCategory === 'all' || activeCategory === '{{ $job['category'] }}'"
                                x-transition
                                @click="selectJob('{{ addslashes($job['title']) }}')"
                                class="group relative rounded-2xl border transition-all duration-200 p-5 sm:p-6 bg-white cursor-pointer shadow-xs {{ $isSelected ? 'border-red-500 ring-2 ring-red-500/20 bg-gradient-to-br from-red-500/[0.02] to-white shadow-md' : 'border-slate-200/90 hover:border-[#12233F]/40 hover:shadow-md' }}"
                            >
                                {{-- Card Content --}}
                                <div class="space-y-4">
                                    
                                    {{-- Card Top Badge Row --}}
                                    <div class="flex flex-wrap items-center justify-between gap-2">
                                        <div class="flex items-center gap-2">
                                            <span class="inline-flex items-center gap-1.5 rounded-md bg-[#12233F]/5 px-2.5 py-1 text-[11px] font-bold text-[#12233F] border border-[#12233F]/10">
                                                <i class="{{ $job['icon'] }} text-xs text-red-600"></i>
                                                <span>{{ $job['category_name'] }}</span>
                                            </span>
                                            <span class="rounded-md bg-slate-100 px-2 py-0.5 text-[10px] font-semibold text-slate-600">
                                                {{ $job['type'] }}
                                            </span>
                                        </div>

                                        {{-- Selected Status Indicator --}}
                                        @if ($isSelected)
                                            <span class="inline-flex items-center gap-1 rounded-full bg-red-600 px-2.5 py-0.5 text-[11px] font-bold text-white shadow-xs">
                                                <i class="ri-check-line text-xs"></i>
                                                <span>Selected</span>
                                            </span>
                                        @else
                                            <span class="inline-flex items-center gap-1 text-[11px] font-semibold text-slate-400 group-hover:text-red-600 transition">
                                                <span>Click to Apply</span>
                                                <i class="ri-arrow-right-line text-xs"></i>
                                            </span>
                                        @endif
                                    </div>

                                    {{-- Job Title & Compensation (In Rupees) --}}
                                    <div>
                                        <h3 class="text-base sm:text-lg font-bold text-slate-900 group-hover:text-[#12233F] transition-colors leading-snug">
                                            {{ $job['title'] }}
                                        </h3>

                                        <div class="mt-2 flex flex-wrap items-center gap-x-4 gap-y-1 text-xs">
                                            {{-- Rupee Compensation --}}
                                            <div class="flex items-center gap-1 font-bold text-red-600 text-sm sm:text-base">
                                                <i class="ri-money-rupee-circle-fill text-red-600"></i>
                                                <span>{{ $job['compensation'] }}</span>
                                            </div>

                                            {{-- Location --}}
                                            <div class="flex items-center gap-1 text-slate-500 font-medium">
                                                <i class="ri-map-pin-2-line text-slate-400"></i>
                                                <span>{{ $job['location'] }}</span>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Description --}}
                                    <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                                        {{ $job['description'] }}
                                    </p>

                                    {{-- Perks & Benefits Tags --}}
                                    <div class="flex flex-wrap gap-1.5 pt-1">
                                        @foreach ($job['perks'] as $perk)
                                            <span class="inline-flex items-center gap-1 rounded-md bg-slate-50 px-2.5 py-1 text-[11px] font-medium text-slate-600 border border-slate-200/60">
                                                <i class="ri-checkbox-circle-fill text-red-500 text-xs"></i>
                                                <span>{{ $perk }}</span>
                                            </span>
                                        @endforeach
                                    </div>

                                    {{-- Card Action Footer --}}
                                    <div class="pt-3 border-t border-slate-100 flex items-center justify-between">
                                        <div class="text-[11px] text-slate-400">
                                            <span class="font-medium text-slate-700">Requirements:</span> {{ Str::limit($job['requirements'][0], 45) }}
                                        </div>

                                        <button
                                            type="button"
                                            class="inline-flex items-center gap-1.5 text-xs font-bold transition {{ $isSelected ? 'text-red-600' : 'text-[#12233F] group-hover:text-red-600' }}"
                                        >
                                            <span>{{ $isSelected ? 'Ready in Form' : 'Select Position' }}</span>
                                            <i class="ri-arrow-right-line text-xs"></i>
                                        </button>
                                    </div>

                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>

                {{-- RIGHT COLUMN: Sticky Application Form --}}
                <div class="lg:col-span-5 xl:col-span-5" id="application-form-panel">
                    <div class="lg:sticky lg:top-24 space-y-4">
                        
                        {{-- Form Container Card --}}
                        <div class="rounded-2xl border border-slate-200/90 bg-white shadow-sm overflow-hidden">
                            
                            {{-- Header --}}
                            <div class="bg-gradient-to-r from-[#0B1A30] to-[#12233F] p-5 sm:p-6 text-white space-y-2">
                                <div class="inline-flex items-center gap-1.5 rounded-full bg-red-600/90 px-3 py-0.5 text-[11px] font-bold text-white uppercase tracking-wider">
                                    <i class="ri-send-plane-fill"></i>
                                    <span>Direct On-Roll Application</span>
                                </div>
                                <h3 class="text-lg sm:text-xl font-extrabold tracking-tight text-white">
                                    Apply for Position
                                </h3>
                                <p class="text-xs text-slate-300 leading-relaxed">
                                    No consultancy fees. Your details go straight to our internal operations hiring desk.
                                </p>
                            </div>

                            {{-- Selected Position Banner inside Form --}}
                            <div class="border-b border-slate-100 bg-red-50/50 p-4">
                                <div class="flex items-start gap-3">
                                    <div class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-red-600 text-white shadow-2xs">
                                        <i class="ri-briefcase-4-line text-sm"></i>
                                    </div>
                                    <div class="min-w-0 flex-1">
                                        <p class="text-[10px] font-bold uppercase tracking-wider text-red-600">Currently Applying For:</p>
                                        <p class="text-xs sm:text-sm font-bold text-slate-900 truncate">
                                            {{ $selectedJob ?: 'General Operations Roster' }}
                                        </p>
                                    </div>
                                </div>
                            </div>

                            {{-- Form Body --}}
                            <div class="p-5 sm:p-6">
                                
                                {{-- Submission Confirmation Banner --}}
                                @if ($submitted)
                                    <div class="mb-5 rounded-xl border border-emerald-200 bg-emerald-50/80 p-4 text-emerald-900 space-y-2">
                                        <div class="flex items-center gap-2 font-bold text-xs sm:text-sm text-emerald-800">
                                            <i class="ri-checkbox-circle-fill text-base text-emerald-600"></i>
                                            <span>Application Submitted Successfully!</span>
                                        </div>
                                        <p class="text-xs text-emerald-700 leading-relaxed">
                                            Thank you! Our operations recruitment team has logged your profile for <strong class="text-emerald-900">{{ $selectedJob }}</strong>. You will receive a verification call within 24 business hours.
                                        </p>
                                        <div class="pt-2">
                                            <button
                                                type="button"
                                                wire:click="resetSubmission"
                                                class="inline-flex items-center gap-1.5 text-xs font-bold text-emerald-800 hover:text-emerald-900 underline cursor-pointer"
                                            >
                                                <span>Submit Another Application</span>
                                                <i class="ri-arrow-right-line text-xs"></i>
                                            </button>
                                        </div>
                                    </div>
                                @endif

                                <form wire:submit.prevent="apply" class="space-y-4">
                                    
                                    {{-- Full Name --}}
                                    <div class="space-y-1">
                                        <label for="applicantName" class="text-xs font-bold text-slate-800 flex items-center justify-between">
                                            <span>Full Name <span class="text-red-500">*</span></span>
                                            <span class="text-[10px] text-slate-400 font-normal">As on Aadhaar / ID</span>
                                        </label>
                                        <div class="relative">
                                            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-slate-400">
                                                <i class="ri-user-line text-xs"></i>
                                            </div>
                                            <input
                                                type="text"
                                                id="applicantName"
                                                wire:model="applicantName"
                                                placeholder="e.g. Ramesh Kumar"
                                                class="flex h-10 w-full rounded-xl border border-slate-200 bg-white pl-9 pr-3 py-1 text-xs shadow-2xs transition placeholder:text-slate-400 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-red-500/20 focus-visible:border-red-500"
                                            />
                                        </div>
                                        @error('applicantName')
                                            <p class="text-[11px] text-red-500 font-medium">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    {{-- Phone & Email Grid --}}
                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                                        {{-- Phone Number --}}
                                        <div class="space-y-1">
                                            <label for="applicantPhone" class="text-xs font-bold text-slate-800">
                                                Mobile Number <span class="text-red-500">*</span>
                                            </label>
                                            <div class="relative">
                                                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-slate-400">
                                                    <i class="ri-phone-line text-xs"></i>
                                                </div>
                                                <input
                                                    type="tel"
                                                    id="applicantPhone"
                                                    wire:model="applicantPhone"
                                                    placeholder="98765 43210"
                                                    class="flex h-10 w-full rounded-xl border border-slate-200 bg-white pl-9 pr-3 py-1 text-xs shadow-2xs transition placeholder:text-slate-400 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-red-500/20 focus-visible:border-red-500"
                                                />
                                            </div>
                                            @error('applicantPhone')
                                                <p class="text-[11px] text-red-500 font-medium">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        {{-- Email Address --}}
                                        <div class="space-y-1">
                                            <label for="applicantEmail" class="text-xs font-bold text-slate-800">
                                                Email Address <span class="text-red-500">*</span>
                                            </label>
                                            <div class="relative">
                                                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-slate-400">
                                                    <i class="ri-mail-line text-xs"></i>
                                                </div>
                                                <input
                                                    type="email"
                                                    id="applicantEmail"
                                                    wire:model="applicantEmail"
                                                    placeholder="name@email.com"
                                                    class="flex h-10 w-full rounded-xl border border-slate-200 bg-white pl-9 pr-3 py-1 text-xs shadow-2xs transition placeholder:text-slate-400 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-red-500/20 focus-visible:border-red-500"
                                                />
                                            </div>
                                            @error('applicantEmail')
                                                <p class="text-[11px] text-red-500 font-medium">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- Desired Position Select Dropdown --}}
                                    <div class="space-y-1">
                                        <label for="selectedJob" class="text-xs font-bold text-slate-800">
                                            Applying For Position <span class="text-red-500">*</span>
                                        </label>
                                        <div class="relative">
                                            <select
                                                id="selectedJob"
                                                wire:model.live="selectedJob"
                                                class="flex h-10 w-full rounded-xl border border-slate-200 bg-white px-3 py-1 text-xs shadow-2xs transition text-slate-800 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-red-500/20 focus-visible:border-red-500 cursor-pointer"
                                            >
                                                <option value="">Select a role...</option>
                                                @foreach ($this->openPositions() as $position)
                                                    <option value="{{ $position['title'] }}">
                                                        {{ $position['title'] }} ({{ $position['compensation'] }})
                                                    </option>
                                                @endforeach
                                                <option value="General Operations Roster (Open Application)">
                                                    General Operations Roster (Open Application)
                                                </option>
                                            </select>
                                        </div>
                                        @error('selectedJob')
                                            <p class="text-[11px] text-red-500 font-medium">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    {{-- Experience & Shift Grid --}}
                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                                        {{-- Experience --}}
                                        <div class="space-y-1">
                                            <label for="experience" class="text-xs font-bold text-slate-800">
                                                Experience <span class="text-red-500">*</span>
                                            </label>
                                            <select
                                                id="experience"
                                                wire:model="experience"
                                                class="flex h-10 w-full rounded-xl border border-slate-200 bg-white px-3 py-1 text-xs shadow-2xs transition text-slate-800 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-red-500/20 focus-visible:border-red-500 cursor-pointer"
                                            >
                                                <option value="">Select experience...</option>
                                                <option value="Fresher / Entry Level (0-1 year)">Fresher / Entry Level (0-1 year)</option>
                                                <option value="1-3 years">1-3 years</option>
                                                <option value="3-5 years">3-5 years</option>
                                                <option value="5+ years (Supervisor / Lead)">5+ years (Supervisor / Lead)</option>
                                            </select>
                                            @error('experience')
                                                <p class="text-[11px] text-red-500 font-medium">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        {{-- Preferred Shift --}}
                                        <div class="space-y-1">
                                            <label for="shift" class="text-xs font-bold text-slate-800">
                                                Preferred Shift <span class="text-red-500">*</span>
                                            </label>
                                            <select
                                                id="shift"
                                                wire:model="shift"
                                                class="flex h-10 w-full rounded-xl border border-slate-200 bg-white px-3 py-1 text-xs shadow-2xs transition text-slate-800 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-red-500/20 focus-visible:border-red-500 cursor-pointer"
                                            >
                                                <option value="Day Shift">Day Shift (7:00 AM – 3:30 PM)</option>
                                                <option value="Evening Shift">Evening Shift (3:00 PM – 11:30 PM)</option>
                                                <option value="Night Shift">Night Shift (11:00 PM – 7:30 AM)</option>
                                                <option value="Rotational / Any Shift">Rotational / Any Shift</option>
                                            </select>
                                            @error('shift')
                                                <p class="text-[11px] text-red-500 font-medium">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- Brief Message / Machinery Operated --}}
                                    <div class="space-y-1">
                                        <label for="message" class="text-xs font-bold text-slate-800 flex items-center justify-between">
                                            <span>Prior Experience &amp; Skills</span>
                                            <span class="text-[10px] text-slate-400 font-normal">Optional</span>
                                        </label>
                                        <textarea
                                            id="message"
                                            wire:model="message"
                                            rows="2"
                                            placeholder="Mention any machinery operated (e.g. scrubber, high-pressure washer), ITI certifications, or past companies..."
                                            class="flex w-full rounded-xl border border-slate-200 bg-white px-3 py-2 text-xs shadow-2xs transition placeholder:text-slate-400 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-red-500/20 focus-visible:border-red-500 resize-none leading-relaxed"
                                        ></textarea>
                                    </div>

                                    {{-- Submit Button --}}
                                    <div class="pt-2">
                                        <button
                                            type="submit"
                                            wire:loading.attr="disabled"
                                            class="w-full inline-flex h-11 items-center justify-center gap-2 rounded-xl bg-red-600 px-5 text-xs font-bold text-white shadow-sm hover:bg-red-500 active:scale-[0.99] transition cursor-pointer disabled:opacity-50"
                                        >
                                            <span wire:loading.remove wire:target="apply">Submit Application Now</span>
                                            <span wire:loading wire:target="apply">Submitting Details...</span>
                                            <i class="ri-arrow-right-line text-sm" wire:loading.remove wire:target="apply"></i>
                                            <i class="ri-loader-4-line text-sm animate-spin" wire:loading wire:target="apply"></i>
                                        </button>
                                    </div>

                                </form>

                                {{-- Trust Micro-Badges --}}
                                <div class="mt-5 pt-4 border-t border-slate-100 grid grid-cols-3 gap-2 text-center text-[10px] text-slate-500 font-medium">
                                    <div class="flex flex-col items-center gap-1">
                                        <i class="ri-shield-check-fill text-emerald-600 text-sm"></i>
                                        <span>100% Free</span>
                                    </div>
                                    <div class="flex flex-col items-center gap-1">
                                        <i class="ri-building-line text-[#12233F] text-sm"></i>
                                        <span>Direct On-Roll</span>
                                    </div>
                                    <div class="flex flex-col items-center gap-1">
                                        <i class="ri-phone-camera-line text-red-600 text-sm"></i>
                                        <span>Call in 24 Hrs</span>
                                    </div>
                                </div>

                            </div>
                        </div>

                        {{-- Quick Help Box --}}
                        <div class="rounded-xl border border-slate-200 bg-slate-50 p-4 text-xs text-slate-600 flex items-center justify-between">
                            <div class="flex items-center gap-2.5">
                                <div class="flex h-7 w-7 items-center justify-center rounded-lg bg-[#12233F] text-white">
                                    <i class="ri-customer-service-2-line text-xs"></i>
                                </div>
                                <div>
                                    <p class="font-bold text-slate-900">Need HR Assistance?</p>
                                    <p class="text-[11px] text-slate-500">Call our recruitment desk directly</p>
                                </div>
                            </div>
                            <a
                                href="tel:+918004928820"
                                class="inline-flex items-center gap-1 rounded-lg bg-white px-2.5 py-1 text-xs font-bold text-[#12233F] border border-slate-200 hover:border-red-500 hover:text-red-600 transition"
                            >
                                <i class="ri-phone-line text-xs"></i>
                                <span>Call Desk</span>
                            </a>
                        </div>

                    </div>
                </div>

            </div>

        </div>
    </section>

    {{-- Value Propositions (Why FacilityPro) --}}
    <section class="py-16 sm:py-20 border-y border-slate-100 bg-white">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 space-y-12">
            
            <div class="text-center max-w-2xl mx-auto space-y-3">
                <span class="inline-flex items-center gap-1.5 rounded-full bg-[#12233F]/10 px-3.5 py-1 text-xs font-semibold text-[#12233F]">
                    <i class="ri-star-line text-red-600"></i> Benefits &amp; Growth
                </span>
                <h2 class="text-2xl sm:text-3xl font-extrabold tracking-tight text-slate-900">
                    Why Exceptional Field Staff Choose Us
                </h2>
                <p class="text-xs sm:text-sm text-slate-500 leading-relaxed">
                    We treat facilities management as a dignified, professional trade. Every technician receives genuine respect, modern equipment, and guaranteed career advancement.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                
                {{-- Benefit 1 --}}
                <div class="rounded-2xl border border-slate-200/80 bg-slate-50/50 p-6 hover:border-[#12233F]/30 hover:bg-white hover:shadow-md transition-all space-y-3">
                    <span class="flex h-11 w-11 items-center justify-center rounded-xl bg-[#12233F]/5 text-[#12233F] border border-[#12233F]/10">
                        <i class="ri-shield-user-line text-xl text-red-600"></i>
                    </span>
                    <h3 class="text-base font-bold text-slate-900">Direct On-Roll Hiring</h3>
                    <p class="text-xs text-slate-600 leading-relaxed">
                        Never worry about middleman deductions. Enjoy timely monthly bank deposits, complete ESI medical cover, and Provident Fund (PF) contributions.
                    </p>
                </div>

                {{-- Benefit 2 --}}
                <div class="rounded-2xl border border-slate-200/80 bg-slate-50/50 p-6 hover:border-[#12233F]/30 hover:bg-white hover:shadow-md transition-all space-y-3">
                    <span class="flex h-11 w-11 items-center justify-center rounded-xl bg-[#12233F]/5 text-[#12233F] border border-[#12233F]/10">
                        <i class="ri-award-line text-xl text-[#12233F]"></i>
                    </span>
                    <h3 class="text-base font-bold text-slate-900">Sponsored Certifications</h3>
                    <p class="text-xs text-slate-600 leading-relaxed">
                        Learn while earning. We sponsor certifications for ISSA CIMS hygiene, automated ride-on machinery operation, high-rise safety, and electrical MEP systems.
                    </p>
                </div>

                {{-- Benefit 3 --}}
                <div class="rounded-2xl border border-slate-200/80 bg-slate-50/50 p-6 hover:border-[#12233F]/30 hover:bg-white hover:shadow-md transition-all space-y-3">
                    <span class="flex h-11 w-11 items-center justify-center rounded-xl bg-[#12233F]/5 text-[#12233F] border border-[#12233F]/10">
                        <i class="ri-line-chart-line text-xl text-red-600"></i>
                    </span>
                    <h3 class="text-base font-bold text-slate-900">Fast Promotion Pathway</h3>
                    <p class="text-xs text-slate-600 leading-relaxed">
                        Over 75% of our shift team leads and site facility executives started as front-line specialists. Hard work and punctuality are rewarded rapidly.
                    </p>
                </div>

                {{-- Benefit 4 --}}
                <div class="rounded-2xl border border-slate-200/80 bg-slate-50/50 p-6 hover:border-[#12233F]/30 hover:bg-white hover:shadow-md transition-all space-y-3">
                    <span class="flex h-11 w-11 items-center justify-center rounded-xl bg-[#12233F]/5 text-[#12233F] border border-[#12233F]/10">
                        <i class="ri-heart-pulse-line text-xl text-[#12233F]"></i>
                    </span>
                    <h3 class="text-base font-bold text-slate-900">Medical Cover &amp; Welfare</h3>
                    <p class="text-xs text-slate-600 leading-relaxed">
                        Comprehensive accident insurance, clean branded safety uniforms, protective footwear, and annual festival allowances for all operational staff.
                    </p>
                </div>

            </div>
        </div>
    </section>

    {{-- The Hiring Process (4 Steps) --}}
    <section class="py-16 sm:py-20 bg-slate-50/40">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 space-y-12">
            
            <div class="text-center max-w-2xl mx-auto space-y-3">
                <span class="inline-flex items-center gap-1.5 rounded-full bg-[#12233F]/10 px-3.5 py-1 text-xs font-semibold text-[#12233F]">
                    <i class="ri-footprint-line text-red-600"></i> Simple 4-Step Process
                </span>
                <h2 class="text-2xl sm:text-3xl font-extrabold tracking-tight text-slate-900">
                    How We Hire &amp; Welcome You
                </h2>
                <p class="text-xs sm:text-sm text-slate-500">
                    A respectful, swift journey from your online application to your first paid assignment.
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                
                {{-- Step 1 --}}
                <div class="rounded-2xl border border-slate-200/80 bg-white p-6 shadow-xs space-y-3">
                    <span class="inline-flex h-8 w-8 items-center justify-center rounded-full bg-[#12233F] text-white text-xs font-bold">
                        1
                    </span>
                    <h3 class="text-sm font-bold text-slate-900">2-Minute Application</h3>
                    <p class="text-xs text-slate-600 leading-relaxed">
                        Pick your preferred position on the left, fill out your mobile number and experience, and submit directly.
                    </p>
                </div>

                {{-- Step 2 --}}
                <div class="rounded-2xl border border-slate-200/80 bg-white p-6 shadow-xs space-y-3">
                    <span class="inline-flex h-8 w-8 items-center justify-center rounded-full bg-red-600 text-white text-xs font-bold">
                        2
                    </span>
                    <h3 class="text-sm font-bold text-slate-900">10-Min Phone Call</h3>
                    <p class="text-xs text-slate-600 leading-relaxed">
                        Our HR manager calls to understand your nearby facility location preference, shifts, and wage details.
                    </p>
                </div>

                {{-- Step 3 --}}
                <div class="rounded-2xl border border-slate-200/80 bg-white p-6 shadow-xs space-y-3">
                    <span class="inline-flex h-8 w-8 items-center justify-center rounded-full bg-[#12233F] text-white text-xs font-bold">
                        3
                    </span>
                    <h3 class="text-sm font-bold text-slate-900">Document Verification</h3>
                    <p class="text-xs text-slate-600 leading-relaxed">
                        Quick submission of standard identity proof (Aadhaar/PAN/Bank Details) for on-roll compliance and ESI/PF registration.
                    </p>
                </div>

                {{-- Step 4 --}}
                <div class="rounded-2xl border border-slate-200/80 bg-white p-6 shadow-xs space-y-3">
                    <span class="inline-flex h-8 w-8 items-center justify-center rounded-full bg-emerald-600 text-white text-xs font-bold">
                        4
                    </span>
                    <h3 class="text-sm font-bold text-slate-900">Paid Induction &amp; Uniforms</h3>
                    <p class="text-xs text-slate-600 leading-relaxed">
                        Receive branded uniforms, safety equipment, equipment walkthroughs, and begin your first shift with full pay.
                    </p>
                </div>

            </div>

        </div>
    </section>

    {{-- Call to Action Banner (Dark Navy #0B1A30 with Red Highlights) --}}
    <section class="py-16 sm:py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="relative overflow-hidden rounded-3xl bg-[#0B1A30] px-6 py-12 sm:px-12 lg:py-16 text-center text-white border border-slate-800 shadow-xl">
                {{-- Decorative background glow --}}
                <div class="absolute -top-24 -right-24 h-80 w-80 rounded-full bg-red-600/15 blur-3xl pointer-events-none"></div>
                <div class="absolute -bottom-24 -left-24 h-80 w-80 rounded-full bg-[#12233F]/40 blur-3xl pointer-events-none"></div>

                <div class="relative max-w-2xl mx-auto space-y-5">
                    <div class="inline-flex items-center gap-2 rounded-full bg-white/10 px-3.5 py-1 text-xs font-semibold text-red-400 border border-white/10">
                        <i class="ri-customer-service-2-line text-xs"></i>
                        <span>Direct Operations Helpline</span>
                    </div>

                    <h2 class="text-2xl sm:text-4xl font-extrabold tracking-tight text-white">
                        Don't See Your Specialty Listed?
                    </h2>

                    <p class="text-xs sm:text-sm text-slate-300 leading-relaxed max-w-lg mx-auto">
                        We are continuously onboarding experienced deep cleaning crews, pantry stewards, electromechanical technicians, and site leaders across regions.
                    </p>

                    <div class="pt-3 flex flex-wrap items-center justify-center gap-3">
                        <button
                            type="button"
                            @click="selectJob('General Operations Roster (Open Application)')"
                            class="inline-flex items-center gap-2 rounded-full bg-red-600 hover:bg-red-500 px-6 py-3 text-xs sm:text-sm font-semibold text-white shadow-sm transition active:scale-[0.98] cursor-pointer"
                        >
                            <span>Send Open Application</span>
                            <i class="ri-arrow-right-line text-sm"></i>
                        </button>
                        <a
                            href="tel:+918004928820"
                            class="inline-flex items-center gap-2 rounded-full border border-white/20 bg-white/10 px-6 py-3 text-xs sm:text-sm font-medium text-white backdrop-blur-md transition hover:bg-white/20 active:scale-[0.98] cursor-pointer"
                        >
                            <i class="ri-phone-line text-sm text-red-400"></i>
                            <span>Call Hiring Desk: +91 (800) 492-8820</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
