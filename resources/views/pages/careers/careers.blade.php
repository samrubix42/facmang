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

    {{-- Hero Header Section (Clean & Polished) --}}
    <section class="relative border-b border-slate-100 bg-gradient-to-b from-[#12233F]/[0.03] via-white to-white py-12 sm:py-16 overflow-hidden">
        {{-- Ambient decorative background glow --}}
        <div class="absolute -top-36 left-1/2 -translate-x-1/2 h-96 w-[760px] bg-gradient-to-tr from-[#12233F]/10 via-red-500/10 to-transparent blur-3xl rounded-full pointer-events-none -z-10"></div>

        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-3xl text-center space-y-3.5">
                
                {{-- Eyebrow badge --}}
                <div class="inline-flex items-center gap-2 rounded-full border border-[#12233F]/15 bg-[#12233F]/5 px-3.5 py-1.5 text-xs font-semibold text-[#12233F] shadow-2xs">
                    <span class="flex h-2 w-2 rounded-full bg-red-600 animate-pulse"></span>
                    <span>Join Our Operations Fleet</span>
                    <span class="text-slate-300">•</span>
                    <span class="text-slate-600 font-normal">Direct Company Rolls (On-Roll)</span>
                </div>

                {{-- Headline --}}
                <h1 class="text-3xl font-extrabold tracking-tight text-slate-900 sm:text-5xl sm:leading-[1.18]">
                    Build A High-Impact Career In Modern Facility Operations
                </h1>

                {{-- Subtitle --}}
                <p class="text-xs sm:text-sm leading-relaxed text-slate-600 font-normal max-w-2xl mx-auto">
                    Explore verified on-roll positions with guaranteed monthly compensation in Indian Rupees, statutory ESI &amp; PF coverage, sponsored skill certifications, and fast-track promotions.
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

    {{-- Main 2-Column Section: Compact Left (5 Cols) & Generous Clean Form (7 Cols) --}}
    <section class="py-10 sm:py-14 bg-slate-50/50" id="careers-board">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-10 items-start">
                
                {{-- LEFT COLUMN: Compact, Clean Job Positions List (5 Cols) --}}
                <div class="lg:col-span-5 space-y-4">
                    
                    {{-- Compact Header & Department Filter --}}
                    <div class="space-y-3">
                        <div class="flex items-center justify-between">
                            <div>
                                <h2 class="text-base sm:text-lg font-extrabold text-slate-900 tracking-tight flex items-center gap-2">
                                    <span>Open Positions</span>
                                    <span class="rounded-full bg-red-100 text-red-700 px-2 py-0.2 text-[11px] font-bold">
                                        {{ $this->jobs->count() }}
                                    </span>
                                </h2>
                                <p class="text-xs text-slate-500 mt-0.5">
                                    Click any role to apply on the right.
                                </p>
                            </div>
                        </div>

                        {{-- Department Filter Pills (Compact) --}}
                        <div class="flex flex-wrap items-center gap-1.5">
                            <button
                                type="button"
                                @click="activeDepartment = 'all'"
                                class="rounded-lg px-2.5 py-1 text-[11px] font-semibold transition cursor-pointer"
                                :class="activeDepartment === 'all' ? 'bg-[#12233F] text-white shadow-2xs' : 'bg-white text-slate-600 border border-slate-200/80 hover:bg-slate-100'"
                            >
                                All
                            </button>
                            @foreach ($this->departments as $dept)
                                <button
                                    type="button"
                                    @click="activeDepartment = '{{ addslashes($dept) }}'"
                                    class="rounded-lg px-2.5 py-1 text-[11px] font-semibold transition cursor-pointer"
                                    :class="activeDepartment === '{{ addslashes($dept) }}' ? 'bg-[#12233F] text-white shadow-2xs' : 'bg-white text-slate-600 border border-slate-200/80 hover:bg-slate-100'"
                                >
                                    {{ $dept }}
                                </button>
                            @endforeach
                        </div>
                    </div>

                    {{-- Compact Job Cards --}}
                    <div class="space-y-3">
                        @forelse ($this->jobs as $job)
                            @php
                                $isSelected = ($selectedJobId === $job->id);
                            @endphp
                            <div 
                                x-show="activeDepartment === 'all' || activeDepartment === '{{ addslashes($job->department) }}'"
                                x-transition
                                x-data="{ showJd: false }"
                                class="rounded-xl border transition-all duration-150 bg-white shadow-xs overflow-hidden {{ $isSelected ? 'border-red-500 ring-2 ring-red-500/15 bg-gradient-to-br from-red-500/[0.02] to-white' : 'border-slate-200/80 hover:border-slate-300 hover:shadow-xs' }}"
                            >
                                {{-- Card Body --}}
                                <div class="p-4 sm:p-4.5 space-y-2.5">
                                    
                                    {{-- Row 1: Department & Salary --}}
                                    <div class="flex items-center justify-between gap-2">
                                        <span class="inline-flex items-center gap-1 rounded bg-slate-100 px-2 py-0.5 text-[11px] font-medium text-slate-700">
                                            <i class="ri-building-line text-xs text-red-600"></i>
                                            <span>{{ $job->department }}</span>
                                        </span>

                                        <span class="text-xs sm:text-sm font-bold text-red-600">
                                            {{ $job->salary }}
                                        </span>
                                    </div>

                                    {{-- Row 2: Title --}}
                                    <div>
                                        <h3 
                                            @click="selectJob({{ $job->id }}, '{{ addslashes($job->title) }}')"
                                            class="text-sm sm:text-base font-bold text-slate-900 hover:text-red-600 transition cursor-pointer leading-snug"
                                        >
                                            {{ $job->title }}
                                        </h3>
                                    </div>

                                    {{-- Row 3: Meta items (Experience, Location, Type) --}}
                                    <div class="flex flex-wrap items-center gap-x-2.5 gap-y-1 text-xs text-slate-500">
                                        <span class="inline-flex items-center gap-1 text-[11px] font-medium text-slate-700">
                                            <i class="ri-user-star-line text-red-600 text-xs"></i>
                                            <span>Exp: {{ $job->experince_required }}</span>
                                        </span>
                                        <span class="text-slate-300">•</span>
                                        <span class="inline-flex items-center gap-1 text-[11px] text-slate-500 truncate max-w-[180px]">
                                            <i class="ri-map-pin-2-line text-slate-400 text-xs"></i>
                                            <span>{{ $job->location }}</span>
                                        </span>
                                        <span class="text-slate-300">•</span>
                                        <span class="text-[11px] text-slate-400">{{ $job->type }}</span>
                                    </div>

                                    {{-- Row 4: Action Controls --}}
                                    <div class="pt-2 border-t border-slate-100 flex items-center justify-between gap-2">
                                        {{-- Dropdown Toggle for Job Description --}}
                                        <button
                                            type="button"
                                            @click="showJd = !showJd"
                                            class="inline-flex items-center gap-1 text-xs font-semibold text-slate-500 hover:text-slate-900 transition cursor-pointer"
                                        >
                                            <span x-text="showJd ? 'Hide JD' : 'View JD & Details'"></span>
                                            <i class="ri-arrow-down-s-line text-sm transition-transform duration-200" :class="showJd ? 'rotate-180 text-red-600' : ''"></i>
                                        </button>

                                        {{-- Select Button --}}
                                        <button
                                            type="button"
                                            @click="selectJob({{ $job->id }}, '{{ addslashes($job->title) }}')"
                                            class="inline-flex items-center gap-1 rounded-lg px-3 py-1.5 text-xs font-semibold transition cursor-pointer shadow-2xs {{ $isSelected ? 'bg-red-600 text-white' : 'bg-slate-900 hover:bg-slate-800 text-white' }}"
                                        >
                                            <span>{{ $isSelected ? 'Selected' : 'Apply' }}</span>
                                            <i class="{{ $isSelected ? 'ri-check-line' : 'ri-arrow-right-line' }} text-xs"></i>
                                        </button>
                                    </div>

                                </div>

                                {{-- Collapsed Job Description Dropdown --}}
                                <div 
                                    x-show="showJd"
                                    x-transition:enter="transition ease-out duration-150"
                                    x-transition:enter-start="opacity-0 -translate-y-1"
                                    x-transition:enter-end="opacity-100 translate-y-0"
                                    x-transition:leave="transition ease-in duration-100"
                                    x-transition:leave-start="opacity-100 translate-y-0"
                                    x-transition:leave-end="opacity-0 -translate-y-1"
                                    class="border-t border-slate-100 bg-slate-50/80 p-4 space-y-3"
                                >
                                    {{-- JD Rich Text --}}
                                    <div class="space-y-1">
                                        <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">Job Description</p>
                                        <div class="text-xs text-slate-700 leading-relaxed bg-white p-3 rounded-lg border border-slate-200/60">
                                            {!! $job->job_description !!}
                                        </div>
                                    </div>

                                    {{-- Requirements & Responsibilities --}}
                                    @if ($job->qualification_requirements)
                                        <div class="space-y-1">
                                            <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">Eligibility</p>
                                            <p class="text-xs text-slate-700 bg-white p-2.5 rounded-lg border border-slate-200/60 leading-relaxed">
                                                {{ $job->qualification_requirements }}
                                            </p>
                                        </div>
                                    @endif

                                    @if ($job->responsibilities)
                                        <div class="space-y-1">
                                            <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">Responsibilities</p>
                                            <p class="text-xs text-slate-700 bg-white p-2.5 rounded-lg border border-slate-200/60 leading-relaxed">
                                                {{ $job->responsibilities }}
                                            </p>
                                        </div>
                                    @endif
                                </div>

                            </div>
                        @empty
                            <div class="rounded-xl border border-dashed border-slate-200 bg-white p-8 text-center text-xs text-slate-400">
                                No active positions found in this category.
                            </div>
                        @endforelse
                    </div>

                </div>

                {{-- RIGHT COLUMN: Ultra-Clean, Modern Sticky Application Form (7 Cols) --}}
                <div class="lg:col-span-7" id="application-form-panel">
                    <div class="lg:sticky lg:top-24">
                        
                        {{-- Form Container --}}
                        <div class="rounded-2xl border border-slate-200/90 bg-white shadow-xs overflow-hidden">
                            
                            {{-- Clean Form Header --}}
                            <div class="border-b border-slate-100 p-6 sm:p-7 space-y-4">
                                <div class="flex items-center justify-between">
                                    <div class="inline-flex items-center gap-1.5 rounded-full bg-red-50 px-3 py-1 text-xs font-bold text-red-600 border border-red-100">
                                        <span class="flex h-1.5 w-1.5 rounded-full bg-red-600"></span>
                                        <span>Direct On-Roll Application</span>
                                    </div>
                                    <span class="text-xs text-slate-400 font-medium">Free • No Placement Fee</span>
                                </div>

                                <div>
                                    <h2 class="text-xl sm:text-2xl font-bold text-slate-900 tracking-tight">
                                        Submit Your Application
                                    </h2>
                                    <p class="text-xs text-slate-500 mt-1">
                                        Takes less than 2 minutes. Our operations team reviews all applications within 24 hours.
                                    </p>
                                </div>

                                {{-- Active Position Banner --}}
                                <div class="rounded-xl border border-red-100 bg-red-50/50 p-3.5 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2">
                                    <div class="flex items-center gap-2.5 min-w-0">
                                        <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-red-600 text-white text-xs">
                                            <i class="ri-briefcase-line"></i>
                                        </span>
                                        <div class="min-w-0">
                                            <p class="text-[10px] font-bold uppercase tracking-wider text-red-600">Selected Position</p>
                                            <p class="text-xs sm:text-sm font-bold text-slate-900 truncate">
                                                {{ $selectedJob ?: 'Select a Role from the Left' }}
                                            </p>
                                        </div>
                                    </div>

                                    @if ($this->activeJob)
                                        <div class="self-start sm:self-auto sm:text-right">
                                            <span class="inline-flex items-center gap-1 text-xs font-bold text-red-600 bg-white px-2.5 py-1 rounded-md border border-red-200/80 shadow-2xs">
                                                <i class="ri-money-rupee-circle-fill"></i>
                                                <span>{{ $this->activeJob->salary }}</span>
                                            </span>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            {{-- Form Body --}}
                            <div class="p-6 sm:p-7">
                                
                                {{-- Submission State (Only message, no option to apply for another) --}}
                                @if ($submitted)
                                    <div class="py-10 px-4 text-center space-y-3">
                                        <span class="flex h-14 w-14 items-center justify-center rounded-full bg-emerald-50 text-emerald-600 mx-auto text-3xl border border-emerald-100">
                                            <i class="ri-checkbox-circle-fill"></i>
                                        </span>
                                        <div class="space-y-1.5 max-w-sm mx-auto">
                                            <h3 class="text-lg font-bold text-slate-900">Application Submitted!</h3>
                                            <p class="text-sm font-bold text-emerald-800">
                                                We will get back to you shortly.
                                            </p>
                                            <p class="text-xs text-slate-500 leading-relaxed pt-1">
                                                Thank you for your application for <strong class="text-slate-800">{{ $selectedJob }}</strong>. Our operations recruitment desk will review your details and reach out on your mobile number.
                                            </p>
                                        </div>
                                    </div>
                                @else
                                    <form wire:submit.prevent="apply" class="space-y-4">
                                        
                                        {{-- Full Name --}}
                                        <div class="space-y-1">
                                            <label for="applicantName" class="text-xs font-bold text-slate-800 flex items-center justify-between">
                                                <span>Full Name <span class="text-red-500">*</span></span>
                                                <span class="text-[10px] text-slate-400 font-normal">As on Aadhaar / ID</span>
                                            </label>
                                            <div class="relative">
                                                <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-slate-400 pointer-events-none">
                                                    <i class="ri-user-line text-xs"></i>
                                                </span>
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

                                        {{-- Mobile Number & Email Address (2 Columns) --}}
                                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3.5">
                                            {{-- Phone --}}
                                            <div class="space-y-1">
                                                <label for="applicantPhone" class="text-xs font-bold text-slate-800">
                                                    Mobile Number <span class="text-red-500">*</span>
                                                </label>
                                                <div class="relative">
                                                    <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-slate-400 pointer-events-none">
                                                        <i class="ri-phone-line text-xs"></i>
                                                    </span>
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

                                            {{-- Email --}}
                                            <div class="space-y-1">
                                                <label for="applicantEmail" class="text-xs font-bold text-slate-800">
                                                    Email Address <span class="text-red-500">*</span>
                                                </label>
                                                <div class="relative">
                                                    <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-slate-400 pointer-events-none">
                                                        <i class="ri-mail-line text-xs"></i>
                                                    </span>
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

                                        {{-- Experience & Shift Preference (2 Columns) --}}
                                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3.5">
                                            <div class="space-y-1">
                                                <label for="experience" class="text-xs font-bold text-slate-800">
                                                    Years of Experience <span class="text-red-500">*</span>
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

                                        {{-- City / Area (Optional) --}}
                                        <div class="space-y-1">
                                            <label for="address" class="text-xs font-bold text-slate-800 flex items-center justify-between">
                                                <span>City / Residential Area</span>
                                                <span class="text-[10px] text-slate-400 font-normal">Optional</span>
                                            </label>
                                            <div class="relative">
                                                <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-slate-400 pointer-events-none">
                                                    <i class="ri-map-pin-line text-xs"></i>
                                                </span>
                                                <input
                                                    type="text"
                                                    id="address"
                                                    wire:model="address"
                                                    placeholder="e.g. Whitefield, Bengaluru"
                                                    class="flex h-10 w-full rounded-xl border border-slate-200 bg-white pl-9 pr-3 py-1 text-xs shadow-2xs transition placeholder:text-slate-400 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-red-500/20 focus-visible:border-red-500"
                                                />
                                            </div>
                                        </div>

                                        {{-- Resume Upload Component (Clean & Refined) --}}
                                        <div class="space-y-1">
                                            <label for="resume-file" class="text-xs font-bold text-slate-800 flex items-center justify-between">
                                                <span>Attach Resume / Bio-Data</span>
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
                                                @if ($resume)
                                                    {{-- File Selected State --}}
                                                    <div class="flex items-center justify-between rounded-xl border border-emerald-200 bg-emerald-50/60 p-3">
                                                        <div class="flex items-center gap-2.5 min-w-0">
                                                            <span class="flex h-8 w-8 items-center justify-center rounded-lg bg-emerald-600 text-white text-xs shrink-0">
                                                                <i class="ri-file-text-line"></i>
                                                            </span>
                                                            <div class="min-w-0">
                                                                <p class="text-xs font-bold text-emerald-900 truncate">
                                                                    {{ $resume->getClientOriginalName() }}
                                                                </p>
                                                                <p class="text-[10px] text-emerald-700">Resume Attached Ready to Submit</p>
                                                            </div>
                                                        </div>

                                                        <button
                                                            type="button"
                                                            wire:click="removeResume"
                                                            title="Remove attached resume"
                                                            class="p-1 rounded-md text-emerald-700 hover:text-rose-600 hover:bg-white transition cursor-pointer"
                                                        >
                                                            <i class="ri-close-line text-base"></i>
                                                        </button>
                                                    </div>
                                                @else
                                                    {{-- File Input Box --}}
                                                    <div class="relative flex items-center justify-center rounded-xl border border-dashed border-slate-300 bg-slate-50/50 p-4 hover:border-red-500 hover:bg-white transition cursor-pointer">
                                                        <input
                                                            type="file"
                                                            id="resume-file"
                                                            wire:model="resume"
                                                            accept=".pdf,.doc,.docx"
                                                            class="absolute inset-0 h-full w-full opacity-0 cursor-pointer"
                                                        />
                                                        <div class="flex items-center gap-3 text-center sm:text-left">
                                                            <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-red-50 text-red-600">
                                                                <i class="ri-attachment-2 text-base"></i>
                                                            </span>
                                                            <div>
                                                                <p class="text-xs font-semibold text-slate-800">
                                                                    <span>Click to attach resume</span>
                                                                    <span class="font-normal text-slate-500 hidden sm:inline">or drag &amp; drop</span>
                                                                </p>
                                                                <p class="text-[10px] text-slate-400">Optional: you can also apply without resume</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif

                                                {{-- Uploading Progress Bar --}}
                                                <div x-show="isUploading" class="w-full bg-slate-100 rounded-full h-1.5 overflow-hidden">
                                                    <div class="bg-red-600 h-1.5 rounded-full transition-all duration-150" :style="`width: ${progress}%`"></div>
                                                </div>
                                            </div>

                                            @error('resume')
                                                <p class="text-[11px] text-red-500 font-medium">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        {{-- Prior Experience Notes --}}
                                        <div class="space-y-1">
                                            <label for="message" class="text-xs font-bold text-slate-800 flex items-center justify-between">
                                                <span>Prior Experience &amp; Notes</span>
                                                <span class="text-[10px] text-slate-400 font-normal">Optional</span>
                                            </label>
                                            <textarea
                                                id="message"
                                                wire:model="message"
                                                rows="2"
                                                placeholder="Mention any machinery operated (e.g. scrubber, pressure washer, BMS), past companies, or trade..."
                                                class="flex w-full rounded-xl border border-slate-200 bg-white px-3 py-2 text-xs shadow-2xs transition placeholder:text-slate-400 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-red-500/20 focus-visible:border-red-500 resize-none leading-relaxed"
                                            ></textarea>
                                        </div>

                                        {{-- Submit Button --}}
                                        <div class="pt-2">
                                            <button
                                                type="submit"
                                                wire:loading.attr="disabled"
                                                class="w-full inline-flex h-11 items-center justify-center gap-2 rounded-xl bg-red-600 px-5 text-xs font-bold text-white shadow-xs hover:bg-red-500 active:scale-[0.99] transition cursor-pointer disabled:opacity-50"
                                            >
                                                <span wire:loading.remove wire:target="apply">Submit Application Now</span>
                                                <span wire:loading wire:target="apply">Submitting Details...</span>
                                                <i class="ri-arrow-right-line text-sm" wire:loading.remove wire:target="apply"></i>
                                                <i class="ri-loader-4-line text-sm animate-spin" wire:loading wire:target="apply"></i>
                                            </button>
                                        </div>

                                    </form>
                                @endif

                                {{-- Trust Badges --}}
                                <div class="mt-5 pt-4 border-t border-slate-100 flex flex-wrap items-center justify-center gap-x-5 gap-y-2 text-[11px] text-slate-500 font-medium">
                                    <span class="inline-flex items-center gap-1">
                                        <i class="ri-checkbox-circle-fill text-emerald-600"></i>
                                        <span>100% Free Application</span>
                                    </span>
                                    <span class="inline-flex items-center gap-1">
                                        <i class="ri-shield-check-fill text-[#12233F]"></i>
                                        <span>Direct On-Roll Hiring</span>
                                    </span>
                                    <span class="inline-flex items-center gap-1">
                                        <i class="ri-phone-line text-red-600"></i>
                                        <span>Call in 24 Hours</span>
                                    </span>
                                </div>

                            </div>
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
