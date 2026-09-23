<div class="space-y-8">
    
    <!-- Page Header (shadcn style) -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 border-b border-slate-100 pb-5">
        <div>
            <h1 class="text-2xl font-bold tracking-tight text-slate-900">
                Operations Overview
            </h1>
            <p class="text-xs text-slate-500 mt-1">
                Real-time facility telemetry, SLA compliance tracking, and incoming proposal requests.
            </p>
        </div>

        <div class="flex items-center gap-2.5">
            <button 
                type="button"
                class="inline-flex items-center gap-1.5 rounded-full border border-slate-200 bg-white px-4 py-2 text-xs font-semibold text-slate-700 shadow-2xs hover:bg-slate-50 transition cursor-pointer"
            >
                <i class="ri-download-2-line text-xs"></i>
                <span>Download SLA Audit</span>
            </button>
            <a 
                href="{{ route('contact') }}"
                target="_blank"
                class="inline-flex items-center gap-1.5 rounded-full bg-slate-900 hover:bg-slate-800 px-4 py-2 text-xs font-semibold text-white shadow-2xs transition active:scale-[0.98]"
            >
                <i class="ri-add-line text-xs"></i>
                <span>New Facility Audit</span>
            </a>
        </div>
    </div>

    <!-- 4 Stat Metric Cards (shadcn style) -->
    <div class="grid gap-5 sm:grid-cols-2 lg:grid-cols-4">
        
        <!-- Metric 1: Space -->
        <div class="rounded-3xl border border-slate-200/80 bg-white p-6 shadow-xs">
            <div class="flex items-center justify-between text-xs text-slate-500 font-medium">
                <span>Managed Space</span>
                <span class="flex h-8 w-8 items-center justify-center rounded-full bg-slate-100 text-slate-700">
                    <i class="ri-building-line text-sm"></i>
                </span>
            </div>
            <p class="text-2xl font-bold text-slate-900 tracking-tight mt-3">4.85M</p>
            <div class="mt-2 flex items-center gap-1 text-[11px] text-emerald-700 font-medium">
                <i class="ri-arrow-up-line"></i>
                <span>+12.4% sq.ft from last quarter</span>
            </div>
        </div>

        <!-- Metric 2: SLA Adherence -->
        <div class="rounded-3xl border border-slate-200/80 bg-white p-6 shadow-xs">
            <div class="flex items-center justify-between text-xs text-slate-500 font-medium">
                <span>SLA Adherence</span>
                <span class="flex h-8 w-8 items-center justify-center rounded-full bg-emerald-50 text-emerald-700">
                    <i class="ri-shield-check-line text-sm"></i>
                </span>
            </div>
            <p class="text-2xl font-bold text-slate-900 tracking-tight mt-3">99.85%</p>
            <div class="mt-2 flex items-center gap-1 text-[11px] text-emerald-700 font-medium">
                <i class="ri-check-line"></i>
                <span>Above 99.00% benchmark target</span>
            </div>
        </div>

        <!-- Metric 3: W-2 Direct Staff -->
        <div class="rounded-3xl border border-slate-200/80 bg-white p-6 shadow-xs">
            <div class="flex items-center justify-between text-xs text-slate-500 font-medium">
                <span>Active Personnel</span>
                <span class="flex h-8 w-8 items-center justify-center rounded-full bg-slate-100 text-slate-700">
                    <i class="ri-user-star-line text-sm"></i>
                </span>
            </div>
            <p class="text-2xl font-bold text-slate-900 tracking-tight mt-3">350+</p>
            <div class="mt-2 flex items-center gap-1 text-[11px] text-slate-500 font-medium">
                <span>100% W-2 Backfill Roster Active</span>
            </div>
        </div>

        <!-- Metric 4: Rapid Dispatch -->
        <div class="rounded-3xl border border-slate-200/80 bg-white p-6 shadow-xs">
            <div class="flex items-center justify-between text-xs text-slate-500 font-medium">
                <span>Emergency Window</span>
                <span class="flex h-8 w-8 items-center justify-center rounded-full bg-emerald-50 text-emerald-700">
                    <i class="ri-flashlight-line text-sm"></i>
                </span>
            </div>
            <p class="text-2xl font-bold text-emerald-600 tracking-tight mt-3">&lt;15 min</p>
            <div class="mt-2 flex items-center gap-1 text-[11px] text-emerald-700 font-medium">
                <span class="h-1.5 w-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                <span>Zero critical outages logged</span>
            </div>
        </div>

    </div>

    <!-- 2 Columns: Recent Proposals & Live Telemetry Stream -->
    <div class="grid gap-8 lg:grid-cols-12 items-start">
        
        <!-- Left (Col 8): Recent SLA Proposals Table -->
        <div class="lg:col-span-8 space-y-4">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-base font-bold text-slate-900">
                        Recent SLA Scope Proposals
                    </h2>
                    <p class="text-xs text-slate-500">
                        Inquiries submitted via website and scope calculators.
                    </p>
                </div>
                <span class="rounded-full bg-slate-100 px-3 py-1 text-xs font-semibold text-slate-600">
                    {{ count($this->proposals) }} Inquiries
                </span>
            </div>

            <!-- Table Container (shadcn style) -->
            <div class="rounded-3xl border border-slate-200/80 bg-white overflow-hidden shadow-xs">
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-xs table-auto">
                        <thead class="bg-slate-50/80 border-b border-slate-100 text-slate-500 font-semibold uppercase text-[10px] tracking-wider">
                            <tr>
                                <th class="p-4 pl-6">ID &amp; Property</th>
                                <th class="p-4">Contact</th>
                                <th class="p-4">Area &amp; Scope</th>
                                <th class="p-4">Status</th>
                                <th class="p-4 pr-6 text-right">Submitted</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100">
                            @foreach ($this->proposals as $prop)
                                <tr class="hover:bg-slate-50/50 transition">
                                    <td class="p-4 pl-6">
                                        <p class="font-bold text-slate-900">{{ $prop['company'] }}</p>
                                        <p class="text-[11px] text-slate-400 font-mono">{{ $prop['id'] }} • {{ $prop['property'] }}</p>
                                    </td>
                                    <td class="p-4">
                                        <p class="font-medium text-slate-800">{{ $prop['client'] }}</p>
                                    </td>
                                    <td class="p-4">
                                        <p class="font-semibold text-slate-900">{{ $prop['area'] }}</p>
                                        <p class="text-[11px] text-slate-500 truncate max-w-[180px]">{{ $prop['services'] }}</p>
                                    </td>
                                    <td class="p-4">
                                        @if ($prop['status'] === 'Active Contract')
                                            <span class="inline-flex items-center gap-1 rounded-full bg-emerald-50 px-2.5 py-0.5 text-[10px] font-semibold text-emerald-800 border border-emerald-200">
                                                <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>
                                                {{ $prop['status'] }}
                                            </span>
                                        @elseif ($prop['status'] === 'In Review')
                                            <span class="inline-flex items-center gap-1 rounded-full bg-amber-50 px-2.5 py-0.5 text-[10px] font-semibold text-amber-800 border border-amber-200">
                                                <span class="h-1.5 w-1.5 rounded-full bg-amber-500"></span>
                                                {{ $prop['status'] }}
                                            </span>
                                        @elseif ($prop['status'] === 'Approved')
                                            <span class="inline-flex items-center gap-1 rounded-full bg-blue-50 px-2.5 py-0.5 text-[10px] font-semibold text-blue-800 border border-blue-200">
                                                <span class="h-1.5 w-1.5 rounded-full bg-blue-500"></span>
                                                {{ $prop['status'] }}
                                            </span>
                                        @else
                                            <span class="inline-flex items-center gap-1 rounded-full bg-slate-100 px-2.5 py-0.5 text-[10px] font-semibold text-slate-700 border border-slate-200">
                                                <span class="h-1.5 w-1.5 rounded-full bg-slate-400"></span>
                                                {{ $prop['status'] }}
                                            </span>
                                        @endif
                                    </td>
                                    <td class="p-4 pr-6 text-right text-slate-400 text-[11px]">
                                        {{ $prop['date'] }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Right (Col 4): Live QR Audit Telemetry Stream -->
        <div class="lg:col-span-4 space-y-4">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-base font-bold text-slate-900">
                        IoT QR Telemetry
                    </h2>
                    <p class="text-xs text-slate-500">
                        Live digital checkpoints scanned on site.
                    </p>
                </div>
                <span class="h-2 w-2 rounded-full bg-emerald-500 animate-pulse"></span>
            </div>

            <!-- Feed Card (shadcn style) -->
            <div class="rounded-3xl border border-slate-200/80 bg-white p-5 shadow-xs space-y-4">
                @foreach ($this->qrLogs as $log)
                    <div class="flex items-start gap-3 pb-4 border-b border-slate-100 last:border-b-0 last:pb-0">
                        <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-emerald-50 text-emerald-700 text-xs font-bold mt-0.5">
                            <i class="ri-qr-code-line"></i>
                        </span>
                        <div class="min-w-0 flex-1">
                            <div class="flex items-center justify-between gap-1">
                                <p class="text-xs font-bold text-slate-900 truncate">
                                    {{ $log['zone'] }}
                                </p>
                                <span class="text-[10px] text-slate-400 shrink-0">{{ $log['time'] }}</span>
                            </div>
                            <p class="text-[11px] text-slate-600 mt-0.5">
                                {{ $log['task'] }}
                            </p>
                            <div class="mt-2 flex items-center justify-between text-[10px]">
                                <span class="text-slate-400">{{ $log['operator'] }}</span>
                                <span class="rounded-full bg-emerald-50 px-2 py-0.5 font-semibold text-emerald-800">
                                    {{ $log['status'] }}
                                </span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Direct Hotline Quick Dispatch -->
            <div class="rounded-3xl border border-slate-200/80 bg-slate-950 text-white p-5 shadow-xs">
                <span class="text-[10px] font-semibold uppercase tracking-wider text-emerald-400">Control Desk Hotline</span>
                <p class="text-sm font-bold text-white mt-1">+1 (800) 492-8820</p>
                <p class="text-[11px] text-slate-400 mt-0.5">Instant emergency dispatch to any managed building.</p>
            </div>
        </div>

    </div>

</div>