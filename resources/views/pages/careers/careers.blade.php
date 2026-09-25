<div 
    class="bg-white text-slate-800 antialiased font-sans selection:bg-red-500 selection:text-white"
    x-data="{
        activeDepartment: 'all',
        scrollToForm() {
            if (window.innerWidth < 1024) {
                const el = document.getElementById('application-form-panel');
                if (el) {
                    el.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            }
        },
        selectJob(id, title) {
            $wire.selectPosition(id, title);
            this.scrollToForm();
        }
    }"
>

    {{-- Hero Header Section (Navy & Red Brand Palette) --}}
    <section class="relative border-b border-slate-100 bg-gradient-to-b from-[#12233F]/[0.04] via-white to-white py-12 sm:py-16 overflow-hidden">
        {{-- Ambient decorative background glow --}}
        <div class="absolute -top-36 left-1/2 -translate-x-1/2 h-96 w-[760px] bg-gradient-to-tr from-[#12233F]/10 via-red-500/10 to-transparent blur-3xl rounded-full pointer-events-none -z-10"></div>

        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-3xl text-center space-y-3.5">
                
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
                <p class="text-xs sm:text-sm leading-relaxed text-slate-600 font-normal max-w-2xl mx-auto">
                    Explore verified on-roll positions with guaranteed monthly salary in Indian Rupees, statutory ESI &amp; PF coverage, sponsored skill certifications, and fast-track promotions.
                </p>

                {{-- Key Highlights in Rupees & Benefits --}}
                <div class="pt-2 flex flex-wrap items-center justify-center gap-2 sm:gap-3 text-xs text-slate-700 font-medium">
                    <div class="inline-flex items-center gap-1.5 rounded-lg bg-[#12233F]/5 px-3 py-1.5 border border-[#12233F]/10">
                        <i class="ri-money-rupee-circle-fill text-red-600 text-sm"></i>
                        <span class="font-bold text-slate-900">₹18,000 – ₹60,000+ / mo</span>
                    </div>
                    <div class="inline-flex items-center gap-1.5 rounded-lg bg-[#12233F]/5 px-3 py-1.5 border border-[#12233F]/10">
                        <i class="ri-shield-check-line text-[#12233F] text-sm"></i>
                        <span>ESI &amp; Provident Fund (PF)</span>
                    </div>
                    <div class="inline-flex items-center gap-1.5 rounded-lg bg-[#12233F]/5 px-3 py-1.5 border border-[#12233F]/10">
                        <i class="ri-award-line text-red-600 text-sm"></i>
                        <span>Free Skill Certifications</span>
                    </div>
                    <div class="inline-flex items-center gap-1.5 rounded-lg bg-[#12233F]/5 px-3 py-1.5 border border-[#12233F]/10">
                        <i class="ri-calendar-check-line text-[#12233F] text-sm"></i>
                        <span>Timely Monthly Payouts</span>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- Main 2-Column Section: Positions (Left) & Sticky Application Form (Right) --}}
    <section class="py-10 sm:py-14 bg-slate-50/40" id="careers-board">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-10 items-start">
                
                {{-- LEFT COLUMN: Open Positions with Collapsed JD & Dropdown --}}
                <div class="lg:col-span-7 xl:col-span-7 space-y-5">
                    
                    {{-- Section Filter & Header --}}
                    <div class="rounded-2xl border border-slate-200/80 bg-white p-5 shadow-xs space-y-4">
                        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 border-b border-slate-100 pb-3">
                            <div>
                                <div class="inline-flex items-center gap-1.5 text-[11px] font-bold text-red-600 uppercase tracking-wider mb-0.5">
                                    <i class="ri-briefcase-line"></i>
                                    <span>Immediate Openings</span>
                                </div>
                                <h2 class="text-xl font-extrabold text-slate-900 tracking-tight">
                                    Select an Open Position
                                </h2>
                                <p class="text-xs text-slate-500">
                                    Title, Experience &amp; Location visible below. Click <strong class="text-slate-700">"View JD"</strong> to expand the full description.
                                </p>
                            </div>
                            
                            {{-- Positions Count Pill --}}
                            <div class="self-start sm:self-auto">
                                <span class="inline-flex items-center gap-1.5 rounded-full bg-[#12233F]/10 px-3 py-1 text-xs font-bold text-[#12233F]">
                                    <span class="flex h-1.5 w-1.5 rounded-full bg-red-600"></span>
                                    <span>{{ $this->jobs->count() }} Roles Available</span>
                                </span>
                            </div>
                        </div>

                        {{-- Department Filter Pills --}}
                        <div class="flex flex-wrap items-center gap-1.5 sm:gap-2">
                            <button
                                type="button"
                                @click="activeDepartment = 'all'"
                                class="rounded-lg px-3 py-1.5 text-xs font-semibold transition cursor-pointer"
                                :class="activeDepartment === 'all' ? 'bg-[#12233F] text-white shadow-xs' : 'bg-slate-100 text-slate-600 hover:bg-slate-200'"
                            >
                                All Roles ({{ $this->jobs->count() }})
                            </button>
                            @foreach ($this->departments as $dept)
                                <button
                                    type="button"
                                    @click="activeDepartment = '{{ addslashes($dept) }}'"
                                    class="rounded-lg px-3 py-1.5 text-xs font-semibold transition cursor-pointer"
                                    :class="activeDepartment === '{{ addslashes($dept) }}' ? 'bg-[#12233F] text-white shadow-xs' : 'bg-slate-100 text-slate-600 hover:bg-slate-200'"
                                >
                                    {{ $dept }}
                                </button>
                            @endforeach
                        </div>
                    </div>

                    {{-- Cards List: Compact with JD collapsed in dropdown --}}
                    <div class="space-y-3.5">
                        @forelse ($this->jobs as $job)
                            @php
                                $isSelected = ($selectedJobId === $job->id);
                            @endphp
                            <div 
                                x-show="activeDepartment === 'all' || activeDepartment === '{{ addslashes($job->department) }}'"
                                x-transition
                                x-data="{ showJd: false }"
                                class="rounded-2xl border transition-all duration-200 bg-white shadow-xs overflow-hidden {{ $isSelected ? 'border-red-500 ring-2 ring-red-500/20 shadow-md' : 'border-slate-200/90 hover:border-[#12233F]/40 hover:shadow-sm' }}"
                            >
                                {{-- Visible Summary Card (Always Visible) --}}
                                <div class="p-5 space-y-3">
                                    
                                    {{-- Category & Type Row --}}
                                    <div class="flex flex-wrap items-center justify-between gap-2">
                                        <div class="flex items-center gap-2">
                                            <span class="inline-flex items-center gap-1.5 rounded-md bg-[#12233F]/5 px-2.5 py-0.5 text-[11px] font-bold text-[#12233F] border border-[#12233F]/10">
                                                <i class="ri-building-line text-xs text-red-600"></i>
                                                <span>{{ $job->department }}</span>
                                            </span>
                                            <span class="rounded-md bg-slate-100 px-2 py-0.5 text-[10px] font-semibold text-slate-600">
                                                {{ $job->type }}
                                            </span>
                                        </div>

                                        {{-- Selection Badge --}}
                                        @if ($isSelected)
                                            <span class="inline-flex items-center gap-1 rounded-full bg-red-600 px-2.5 py-0.5 text-[11px] font-bold text-white shadow-xs">
                                                <i class="ri-check-line text-xs"></i>
                                                <span>Active in Form</span>
                                            </span>
                                        @endif
                                    </div>

                                    {{-- Job Title --}}
                                    <div>
                                        <h3 class="text-base sm:text-lg font-bold text-slate-900 leading-snug">
                                            {{ $job->title }}
                                        </h3>
                                    </div>

                                    {{-- Compensation, Experience & Location (Required to be visible) --}}
                                    <div class="flex flex-wrap items-center gap-x-3 gap-y-2 text-xs pt-0.5">
                                        
                                        {{-- Compensation in Rupees --}}
                                        <div class="inline-flex items-center gap-1 font-bold text-red-600 text-sm">
                                            <i class="ri-money-rupee-circle-fill text-red-600"></i>
                                            <span>{{ $job->salary }}</span>
                                        </div>

                                        <span class="text-slate-300 hidden sm:inline">•</span>

                                        {{-- Experience --}}
                                        <div class="inline-flex items-center gap-1 rounded-md bg-slate-100/90 px-2.5 py-1 text-slate-700 font-semibold text-[11px]">
                                            <i class="ri-user-star-line text-red-600"></i>
                                            <span>Exp: {{ $job->experince_required }}</span>
                                        </div>

                                        {{-- Location --}}
                                        <div class="inline-flex items-center gap-1 rounded-md bg-slate-100/90 px-2.5 py-1 text-slate-600 font-medium text-[11px]">
                                            <i class="ri-map-pin-2-line text-[#12233F]"></i>
                                            <span>{{ $job->location }}</span>
                                        </div>

                                    </div>

                                    {{-- Action Row: Apply Button & View JD Dropdown Toggle --}}
                                    <div class="pt-3 border-t border-slate-100 flex flex-wrap items-center justify-between gap-2">
                                        
                                        {{-- Left: Dropdown Toggle for Job Description --}}
                                        <button
                                            type="button"
                                            @click="showJd = !showJd"
                                            class="inline-flex items-center gap-1.5 text-xs font-bold text-slate-700 hover:text-red-600 bg-slate-100/80 hover:bg-slate-200/80 px-3 py-1.5 rounded-lg transition cursor-pointer"
                                        >
                                            <i class="ri-file-text-line text-slate-500"></i>
                                            <span x-text="showJd ? 'Hide Job Description' : 'View Job Description (JD)'"></span>
                                            <i class="ri-arrow-down-s-line text-sm transition-transform duration-200" :class="showJd ? 'rotate-180 text-red-600' : ''"></i>
                                        </button>

                                        {{-- Right: Apply / Select Button --}}
                                        <button
                                            type="button"
                                            @click="selectJob({{ $job->id }}, '{{ addslashes($job->title) }}')"
                                            class="inline-flex items-center gap-1.5 text-xs font-bold px-3.5 py-1.5 rounded-lg transition shadow-2xs cursor-pointer {{ $isSelected ? 'bg-red-600 text-white' : 'bg-[#12233F] hover:bg-[#0B1A30] text-white' }}"
                                        >
                                            <span>{{ $isSelected ? 'Selected' : 'Apply Now' }}</span>
                                            <i class="{{ $isSelected ? 'ri-check-line' : 'ri-arrow-right-line' }} text-xs"></i>
                                        </button>

                                    </div>

                                </div>

                                {{-- Collapsible Job Description (JD on Close, Shows with Dropdown) --}}
                                <div 
                                    x-show="showJd"
                                    x-transition:enter="transition ease-out duration-200"
                                    x-transition:enter-start="opacity-0 -translate-y-2"
                                    x-transition:enter-end="opacity-100 translate-y-0"
                                    x-transition:leave="transition ease-in duration-150"
                                    x-transition:leave-start="opacity-100 translate-y-0"
                                    x-transition:leave-end="opacity-0 -translate-y-2"
                                    class="border-t border-slate-200/80 bg-slate-50/70 p-5 space-y-4"
                                >
                                    {{-- JD Rich Text Content --}}
                                    <div class="space-y-1.5">
                                        <div class="flex items-center gap-1.5 text-[11px] font-bold text-slate-500 uppercase tracking-wider">
                                            <i class="ri-article-line text-red-600"></i>
                                            <span>Detailed Job Description (JD)</span>
                                        </div>
                                        <div class="prose prose-sm prose-slate max-w-none text-xs leading-relaxed bg-white p-4 rounded-xl border border-slate-200/70">
                                            {!! $job->job_description !!}
                                        </div>
                                    </div>

                                    {{-- Qualifications & Responsibilities --}}
                                    @if ($job->qualification_requirements || $job->responsibilities)
                                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 pt-1">
                                            @if ($job->qualification_requirements)
                                                <div class="space-y-1 rounded-xl border border-slate-200/60 bg-white p-3">
                                                    <p class="text-[11px] font-bold uppercase tracking-wider text-slate-500 flex items-center gap-1">
                                                        <i class="ri-shield-check-line text-red-600"></i>
                                                        <span>Requirements</span>
                                                    </p>
                                                    <p class="text-xs text-slate-700 leading-relaxed">{{ $job->qualification_requirements }}</p>
                                                </div>
                                            @endif

                                            @if ($job->responsibilities)
                                                <div class="space-y-1 rounded-xl border border-slate-200/60 bg-white p-3">
                                                    <p class="text-[11px] font-bold uppercase tracking-wider text-slate-500 flex items-center gap-1">
                                                        <i class="ri-list-check-2 text-emerald-600"></i>
                                                        <span>Responsibilities</span>
                                                    </p>
                                                    <p class="text-xs text-slate-700 leading-relaxed">{{ $job->responsibilities }}</p>
                                                </div>
                                            @endif
                                        </div>
                                    @endif

                                    {{-- Bottom Select CTA in Dropdown --}}
                                    <div class="pt-2 flex justify-end">
                                        <button
                                            type="button"
                                            @click="selectJob({{ $job->id }}, '{{ addslashes($job->title) }}')"
                                            class="inline-flex items-center gap-1.5 text-xs font-bold text-red-600 hover:text-red-700 cursor-pointer"
                                        >
                                            <span>Select this role for Application</span>
                                            <i class="ri-arrow-right-line text-xs"></i>
                                        </button>
                                    </div>

                                </div>

                            </div>
                        @empty
                            <div class="rounded-2xl border border-dashed border-slate-300 bg-white p-12 text-center space-y-3">
                                <i class="ri-briefcase-line text-3xl text-slate-400"></i>
                                <h3 class="text-base font-bold text-slate-800">No Open Roles Right Now</h3>
                                <p class="text-xs text-slate-500 max-w-sm mx-auto">
                                    We are not actively posting positions in this category, but you can still submit an open general application on the right.
                                </p>
                            </div>
                        @endforelse
                    </div>

                </div>

                {{-- RIGHT COLUMN: Sticky Direct Application Form with Resume Upload --}}
                <div class="lg:col-span-5 xl:col-span-5" id="application-form-panel">
                    <div class="lg:sticky lg:top-24 space-y-4">
                        
                        {{-- Form Container Card --}}
                        <div class="rounded-2xl border border-slate-200/90 bg-white shadow-sm overflow-hidden">
                            
                            {{-- Header --}}
                            <div class="bg-gradient-to-r from-[#0B1A30] to-[#12233F] p-5 sm:p-6 text-white space-y-2">
                                <div class="inline-flex items-center gap-1.5 rounded-full bg-red-600/95 px-3 py-0.5 text-[11px] font-bold text-white uppercase tracking-wider">
                                    <i class="ri-send-plane-fill"></i>
                                    <span>Direct On-Roll Application</span>
                                </div>
                                <h3 class="text-lg sm:text-xl font-extrabold tracking-tight text-white">
                                    Apply for Position
                                </h3>
                                <p class="text-xs text-slate-300 leading-relaxed">
                                    Zero recruitment fees. Fill details below for direct review by our internal operations desk.
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
                                            {{ $selectedJob ?: 'Select a Position' }}
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
                                            Thank you! Our recruitment team has received your profile for <strong class="text-emerald-900">{{ $selectedJob }}</strong>. You will receive a verification call within 24 business hours.
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
                                            <span class="text-[10px] text-slate-400 font-normal">As on ID / Aadhaar</span>
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
                                        <label for="selectedJobId" class="text-xs font-bold text-slate-800">
                                            Applying For Position <span class="text-red-500">*</span>
                                        </label>
                                        <div class="relative">
                                            <select
                                                id="selectedJobId"
                                                wire:model.live="selectedJobId"
                                                class="flex h-10 w-full rounded-xl border border-slate-200 bg-white px-3 py-1 text-xs shadow-2xs transition text-slate-800 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-red-500/20 focus-visible:border-red-500 cursor-pointer"
                                            >
                                                <option value="">Select a role...</option>
                                                @foreach ($this->jobs as $position)
                                                    <option value="{{ $position->id }}">
                                                        {{ $position->title }} ({{ $position->salary }})
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('selectedJobId')
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

                                    {{-- Resume Upload Component --}}
                                    <div class="space-y-1.5">
                                        <label for="resume-input" class="text-xs font-bold text-slate-800 flex items-center justify-between">
                                            <span>Upload Resume / Bio-data</span>
                                            <span class="text-[10px] text-slate-400 font-normal">PDF, DOC, DOCX up to 10MB</span>
                                        </label>

                                        <div
                                            x-data="{ isUploading: false, progress: 0 }"
                                            x-on:livewire-upload-start="isUploading = true"
                                            x-on:livewire-upload-finish="isUploading = false"
                                            x-on:livewire-upload-error="isUploading = false"
                                            x-on:livewire-upload-progress="progress = $event.detail.progress"
                                            class="space-y-2"
                                        >
                                            <div class="relative flex items-center justify-center rounded-xl border border-dashed border-slate-300 bg-slate-50/70 p-4 hover:border-red-500 hover:bg-white transition cursor-pointer">
                                                <input
                                                    type="file"
                                                    id="resume-input"
                                                    wire:model="resume"
                                                    accept=".pdf,.doc,.docx"
                                                    class="absolute inset-0 h-full w-full opacity-0 cursor-pointer"
                                                />
                                                <div class="flex items-center gap-3 text-center sm:text-left">
                                                    <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-[#12233F]/10 text-[#12233F]">
                                                        <i class="ri-file-upload-line text-lg text-red-600"></i>
                                                    </span>
                                                    <div class="min-w-0">
                                                        @if ($resume)
                                                            <p class="text-xs font-bold text-emerald-700 truncate flex items-center gap-1">
                                                                <i class="ri-checkbox-circle-fill"></i>
                                                                <span>Resume Attached</span>
                                                            </p>
                                                            <p class="text-[10px] text-slate-500">Click to change file</p>
                                                        @else
                                                            <p class="text-xs font-semibold text-slate-800">
                                                                <span>Click to attach Resume</span>
                                                                <span class="font-normal text-slate-500 hidden sm:inline">or drag here</span>
                                                            </p>
                                                            <p class="text-[10px] text-slate-400">Optional but recommended</p>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- Progress bar --}}
                                            <div x-show="isUploading" class="w-full bg-slate-100 rounded-full h-1.5 overflow-hidden">
                                                <div class="bg-red-600 h-1.5 rounded-full transition-all duration-200" :style="`width: ${progress}%`"></div>
                                            </div>
                                        </div>

                                        @error('resume')
                                            <p class="text-[11px] text-red-500 font-medium">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    {{-- Brief Message / Prior Experience --}}
                                    <div class="space-y-1">
                                        <label for="message" class="text-xs font-bold text-slate-800 flex items-center justify-between">
                                            <span>Prior Experience &amp; Skills</span>
                                            <span class="text-[10px] text-slate-400 font-normal">Optional</span>
                                        </label>
                                        <textarea
                                            id="message"
                                            wire:model="message"
                                            rows="2"
                                            placeholder="Mention any machinery operated (e.g. scrubber, high-pressure jet), ITI trade, or past employers..."
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
                                            <span wire:loading wire:target="apply">Submitting Application...</span>
                                            <i class="ri-arrow-right-line text-sm" wire:loading.remove wire:target="apply"></i>
                                            <i class="ri-loader-4-line text-sm animate-spin" wire:loading wire:target="apply"></i>
                                        </button>
                                    </div>

                                </form>

                                {{-- Trust Badges --}}
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
                                    <p class="text-[11px] text-slate-500">Speak directly with operations recruiting</p>
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
    <section class="py-14 sm:py-18 border-y border-slate-100 bg-white">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 space-y-10">
            
            <div class="text-center max-w-2xl mx-auto space-y-2.5">
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
    <section class="py-14 sm:py-18 bg-slate-50/40">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 space-y-10">
            
            <div class="text-center max-w-2xl mx-auto space-y-2.5">
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
    <section class="py-14 sm:py-18">
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
                        <a
                            href="#careers-board"
                            class="inline-flex items-center gap-2 rounded-full bg-red-600 hover:bg-red-500 px-6 py-3 text-xs sm:text-sm font-semibold text-white shadow-sm transition active:scale-[0.98] cursor-pointer"
                        >
                            <span>Apply for Current Openings</span>
                            <i class="ri-arrow-right-line text-sm"></i>
                        </a>
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
