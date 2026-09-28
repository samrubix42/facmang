<div class="space-y-6 sm:space-y-8">
    
    <!-- Page Header (shadcn style) -->
    <div class="flex flex-col gap-4 border-b border-slate-100 pb-5 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h1 class="text-xl font-bold tracking-tight text-slate-900 sm:text-2xl">
                Operations Overview
            </h1>
            <p class="mt-1 text-xs text-slate-500">
                Live inquiry volume, hiring pipeline, and published content across the console.
            </p>
        </div>

        <div class="flex flex-wrap items-center gap-2.5">
            <button 
                type="button"
                wire:click="exportInquiries"
                wire:loading.attr="disabled"
                wire:target="exportInquiries"
                class="inline-flex flex-1 items-center justify-center gap-1.5 rounded-full border border-slate-200 bg-white px-4 py-2 text-xs font-semibold text-slate-700 shadow-2xs transition hover:bg-slate-50 disabled:opacity-60 sm:flex-none"
            >
                <span wire:loading.remove wire:target="exportInquiries">
                    <i class="ri-download-2-line text-xs"></i>
                    <span>Export Inquiries</span>
                </span>
                <span wire:loading wire:target="exportInquiries" class="inline-flex items-center gap-1.5">
                    <i class="ri-loader-4-line animate-spin text-xs"></i>
                    <span>Preparing</span>
                </span>
            </button>
            <a 
                href="{{ route('contact') }}"
                target="_blank"
                rel="noopener"
                class="inline-flex flex-1 items-center justify-center gap-1.5 rounded-full bg-slate-900 px-4 py-2 text-xs font-semibold text-white shadow-2xs transition hover:bg-slate-800 active:scale-[0.98] sm:flex-none"
            >
                <i class="ri-add-line text-xs"></i>
                <span>New Facility Audit</span>
            </a>
        </div>
    </div>

    <!-- Metric Cards (shadcn style) -->
    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 sm:gap-5 lg:grid-cols-4">
        
        <!-- Metric 1: Website inquiries -->
        <div class="rounded-3xl border border-slate-200/80 bg-white p-5 shadow-xs sm:p-6">
            <div class="flex items-center justify-between text-xs font-medium text-slate-500">
                <span>Total Inquiries</span>
                <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-slate-100 text-slate-700">
                    <i class="ri-mail-send-line text-sm"></i>
                </span>
            </div>
            <p class="mt-3 text-2xl font-bold tracking-tight text-slate-900">{{ $this->stats['inquiries'] }}</p>
            <div class="mt-2 flex items-center gap-1 text-[11px] font-medium {{ $this->stats['unread'] > 0 ? 'text-amber-700' : 'text-emerald-700' }}">
                <i class="{{ $this->stats['unread'] > 0 ? 'ri-notification-3-line' : 'ri-check-line' }}"></i>
                <span>{{ $this->stats['unread'] }} awaiting reply</span>
            </div>
        </div>

        <!-- Metric 2: Job applicants -->
        <div class="rounded-3xl border border-slate-200/80 bg-white p-5 shadow-xs sm:p-6">
            <div class="flex items-center justify-between text-xs font-medium text-slate-500">
                <span>Job Applicants</span>
                <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-slate-100 text-slate-700">
                    <i class="ri-user-star-line text-sm"></i>
                </span>
            </div>
            <p class="mt-3 text-2xl font-bold tracking-tight text-slate-900">{{ $this->stats['applications'] }}</p>
            <div class="mt-2 flex items-center gap-1 text-[11px] font-medium {{ $this->stats['pending'] > 0 ? 'text-amber-700' : 'text-slate-500' }}">
                <i class="{{ $this->stats['pending'] > 0 ? 'ri-time-line' : 'ri-check-line' }}"></i>
                <span>{{ $this->stats['pending'] }} pending review</span>
            </div>
        </div>

        <!-- Metric 3: Open roles -->
        <div class="rounded-3xl border border-slate-200/80 bg-white p-5 shadow-xs sm:p-6">
            <div class="flex items-center justify-between text-xs font-medium text-slate-500">
                <span>Open Positions</span>
                <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-slate-100 text-slate-700">
                    <i class="ri-briefcase-line text-sm"></i>
                </span>
            </div>
            <p class="mt-3 text-2xl font-bold tracking-tight text-slate-900">{{ $this->stats['jobs'] }}</p>
            <div class="mt-2 flex items-center gap-1 text-[11px] font-medium text-slate-500">
                <i class="ri-calendar-check-line"></i>
                <span>{{ $this->stats['applications'] }} total submissions</span>
            </div>
        </div>

        <!-- Metric 4: Published services -->
        <div class="rounded-3xl border border-slate-200/80 bg-white p-5 shadow-xs sm:p-6">
            <div class="flex items-center justify-between text-xs font-medium text-slate-500">
                <span>Live Services</span>
                <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-emerald-50 text-emerald-700">
                    <i class="ri-shield-check-line text-sm"></i>
                </span>
            </div>
            <p class="mt-3 text-2xl font-bold tracking-tight text-slate-900">{{ $this->stats['services'] }}</p>
            <div class="mt-2 flex items-center gap-1 text-[11px] font-medium text-slate-500">
                <i class="ri-image-line"></i>
                <span>{{ $this->stats['gallery'] }} gallery &middot; {{ $this->stats['clients'] }} clients</span>
            </div>
        </div>

    </div>

    <!-- 2 Columns: Recent Inquiries & Hiring Pipeline -->
    <div class="grid grid-cols-1 items-start gap-6 sm:gap-8 lg:grid-cols-12">
        
        <!-- Left (Col 8): Recent inquiries -->
        <div class="space-y-4 lg:col-span-8">
            <div class="flex flex-wrap items-center justify-between gap-2">
                <div>
                    <h2 class="text-base font-bold text-slate-900">
                        Recent Website Inquiries
                    </h2>
                    <p class="text-xs text-slate-500">
                        Submissions from the public contact form.
                    </p>
                </div>
                <div class="flex items-center gap-2">
                    <span class="rounded-full bg-slate-100 px-3 py-1 text-xs font-semibold text-slate-600">
                        {{ $this->stats['inquiries'] }} Total
                    </span>
                    <a 
                        href="{{ route('admin.contacts.index') }}"
                        wire:navigate
                        class="rounded-full px-3 py-1 text-xs font-semibold text-slate-600 transition hover:bg-slate-100"
                    >
                        View all
                    </a>
                </div>
            </div>

            @if ($this->recentInquiries->isEmpty())
                <div class="rounded-3xl border border-dashed border-slate-200 bg-white p-8 text-center shadow-xs sm:p-12">
                    <span class="mx-auto flex h-11 w-11 items-center justify-center rounded-full bg-slate-100 text-slate-400">
                        <i class="ri-inbox-line text-lg"></i>
                    </span>
                    <p class="mt-3 text-sm font-bold text-slate-900">No inquiries yet</p>
                    <p class="mt-1 text-xs text-slate-500">
                        Submissions made through the website contact form will appear here.
                    </p>
                </div>
            @else
                <div class="overflow-hidden rounded-3xl border border-slate-200/80 bg-white shadow-xs">
                    
                    <!-- Desktop: table -->
                    <div class="hidden overflow-x-auto sm:block">
                        <table class="w-full table-auto text-left text-xs">
                            <thead class="border-b border-slate-100 bg-slate-50/80 text-[10px] font-semibold uppercase tracking-wider text-slate-500">
                                <tr>
                                    <th class="p-4 pl-6">Contact</th>
                                    <th class="p-4">Property Type</th>
                                    <th class="p-4">Status</th>
                                    <th class="p-4 pr-6 text-right">Received</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100">
                                @foreach ($this->recentInquiries as $inquiry)
                                    <tr class="transition hover:bg-slate-50/50">
                                        <td class="p-4 pl-6">
                                            <p class="font-bold text-slate-900">{{ $inquiry->name }}</p>
                                            <p class="truncate text-[11px] text-slate-400">{{ $inquiry->email }}</p>
                                        </td>
                                        <td class="p-4">
                                            <p class="max-w-[180px] truncate font-semibold text-slate-900">
                                                {{ $inquiry->property_type ?: '—' }}
                                            </p>
                                            <p class="max-w-[180px] truncate text-[11px] text-slate-500">
                                                {{ \Illuminate\Support\Str::limit($inquiry->message, 48) }}
                                            </p>
                                        </td>
                                        <td class="p-4">
                                            @if ($inquiry->is_read)
                                                <span class="inline-flex items-center gap-1 rounded-full border border-slate-200 bg-slate-100 px-2.5 py-0.5 text-[10px] font-semibold text-slate-700">
                                                    <span class="h-1.5 w-1.5 rounded-full bg-slate-400"></span>
                                                    Read
                                                </span>
                                            @else
                                                <span class="inline-flex items-center gap-1 rounded-full border border-amber-200 bg-amber-50 px-2.5 py-0.5 text-[10px] font-semibold text-amber-800">
                                                    <span class="h-1.5 w-1.5 rounded-full bg-amber-500"></span>
                                                    New
                                                </span>
                                            @endif
                                        </td>
                                        <td class="p-4 pr-6 text-right text-[11px] text-slate-400">
                                            <span class="block">{{ $inquiry->created_at?->diffForHumans() }}</span>
                                            <span class="block text-slate-300">{{ $inquiry->created_at?->format('d M Y') }}</span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Mobile: card list -->
                    <ul class="divide-y divide-slate-100 sm:hidden">
                        @foreach ($this->recentInquiries as $inquiry)
                            <li class="p-4">
                                <div class="flex items-start justify-between gap-3">
                                    <div class="min-w-0">
                                        <p class="truncate text-sm font-bold text-slate-900">{{ $inquiry->name }}</p>
                                        <p class="truncate text-[11px] text-slate-400">{{ $inquiry->email }}</p>
                                    </div>
                                    @if ($inquiry->is_read)
                                        <span class="shrink-0 rounded-full border border-slate-200 bg-slate-100 px-2.5 py-0.5 text-[10px] font-semibold text-slate-700">Read</span>
                                    @else
                                        <span class="shrink-0 rounded-full border border-amber-200 bg-amber-50 px-2.5 py-0.5 text-[10px] font-semibold text-amber-800">New</span>
                                    @endif
                                </div>
                                <p class="mt-2 text-xs font-semibold text-slate-900">
                                    {{ $inquiry->property_type ?: 'General inquiry' }}
                                </p>
                                <p class="mt-0.5 text-[11px] leading-relaxed text-slate-500">
                                    {{ \Illuminate\Support\Str::limit($inquiry->message, 90) }}
                                </p>
                                <p class="mt-2 text-[10px] text-slate-400">
                                    {{ $inquiry->created_at?->diffForHumans() }}
                                </p>
                            </li>
                        @endforeach
                    </ul>

                </div>
            @endif
        </div>

        <!-- Right (Col 4): Hiring pipeline & contact card -->
        <div class="space-y-4 lg:col-span-4">
            <div class="flex items-center justify-between gap-2">
                <div>
                    <h2 class="text-base font-bold text-slate-900">
                        Hiring Pipeline
                    </h2>
                    <p class="text-xs text-slate-500">
                        Applicants by review stage.
                    </p>
                </div>
                <a 
                    href="{{ route('admin.job-applied.index') }}"
                    wire:navigate
                    class="shrink-0 rounded-full px-3 py-1 text-xs font-semibold text-slate-600 transition hover:bg-slate-100"
                >
                    Review
                </a>
            </div>

            <div class="space-y-4 rounded-3xl border border-slate-200/80 bg-white p-5 shadow-xs">
                @php($pipelineTotal = max(1, $this->stats['applications']))

                @foreach ($this->applicationPipeline as $stage)
                    <div>
                        <div class="flex items-center justify-between gap-2 text-[11px]">
                            <span class="font-semibold text-slate-700">{{ $stage['label'] }}</span>
                            <span class="font-bold text-slate-900">{{ $stage['total'] }}</span>
                        </div>
                        <div class="mt-1.5 h-1.5 w-full overflow-hidden rounded-full bg-slate-100">
                            <div
                                @class([
                                    'h-full rounded-full',
                                    'bg-amber-500' => $stage['status'] === 'pending',
                                    'bg-blue-500' => $stage['status'] === 'reviewed',
                                    'bg-emerald-500' => $stage['status'] === 'shortlisted',
                                    'bg-rose-400' => $stage['status'] === 'rejected',
                                ])
                                style="width: {{ round($stage['total'] / $pipelineTotal * 100) }}%"
                            ></div>
                        </div>
                    </div>
                @endforeach
            </div>

            @if ($this->recentApplications->isNotEmpty())
                <div class="rounded-3xl border border-slate-200/80 bg-white p-5 shadow-xs">
                    <p class="text-[10px] font-semibold uppercase tracking-wider text-slate-400">
                        Latest Applicants
                    </p>

                    <div class="mt-3 space-y-3">
                        @foreach ($this->recentApplications as $applicant)
                            <div class="flex items-center gap-3 border-b border-slate-100 pb-3 last:border-b-0 last:pb-0">
                                <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-slate-100 text-[11px] font-bold text-slate-700">
                                    {{ strtoupper(substr($applicant->name, 0, 1)) }}
                                </span>
                                <div class="min-w-0 flex-1">
                                    <p class="truncate text-xs font-bold text-slate-900">{{ $applicant->name }}</p>
                                    <p class="truncate text-[10px] text-slate-400">
                                        {{ $applicant->job?->title ?? 'General application' }}
                                    </p>
                                </div>
                                <span class="shrink-0 text-[10px] capitalize text-slate-500">
                                    {{ $applicant->status }}
                                </span>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            <!-- Direct Hotline Quick Dispatch -->
            <div class="rounded-3xl border border-slate-800 bg-slate-950 p-5 text-white shadow-xs">
                <span class="text-[10px] font-semibold uppercase tracking-wider text-emerald-400">Control Desk Hotline</span>
                <a href="tel:{{ preg_replace('/[^0-9+]/', '', $this->hotline) }}" class="mt-1 block text-sm font-bold text-white">
                    {{ $this->hotline }}
                </a>
                <p class="mt-0.5 text-[11px] text-slate-400">Emergency dispatch line for managed buildings.</p>
            </div>
        </div>

    </div>

</div>
