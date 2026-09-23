<div class="flex flex-col flex-1 h-full min-h-0 bg-white">
    
    <!-- Sidebar Header / Brand -->
    <div class="flex items-center justify-between h-16 px-6 border-b border-slate-100">
        <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-2.5">
            <img src="{{ asset('logo.png') }}" alt="FacilityPro Logo" class="h-8 w-auto object-contain" />
        </a>
        <span class="rounded-full bg-slate-100 px-2 py-0.5 text-[10px] font-semibold text-slate-600 border border-slate-200">
            Admin
        </span>
    </div>

    <!-- Navigation Links (shadcn style) -->
    <div class="flex-1 px-4 py-5 space-y-6 overflow-y-auto">
        
        <!-- Main Section -->
        <div>
            <p class="px-2.5 text-[10px] font-bold uppercase tracking-wider text-slate-400 mb-2">
                Operations
            </p>
            <nav class="space-y-1">
                <!-- Dashboard -->
                <a
                    href="{{ route('admin.dashboard') }}"
                    class="flex items-center justify-between rounded-xl px-3 py-2 text-xs font-semibold transition {{ request()->routeIs('admin.dashboard') ? 'bg-slate-900 text-white shadow-xs' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }}"
                >
                    <div class="flex items-center gap-2.5">
                        <i class="ri-dashboard-line text-sm"></i>
                        <span>Overview</span>
                    </div>
                </a>

                <!-- Services -->
                <a
                    href="{{ route('services') }}"
                    target="_blank"
                    class="flex items-center justify-between rounded-xl px-3 py-2 text-xs font-semibold text-slate-600 hover:bg-slate-50 hover:text-slate-900 transition"
                >
                    <div class="flex items-center gap-2.5">
                        <i class="ri-service-line text-sm"></i>
                        <span>Service Catalog</span>
                    </div>
                    <i class="ri-external-link-line text-xs text-slate-400"></i>
                </a>

                <!-- Inquiries & Proposals -->
                <a
                    href="{{ route('admin.dashboard') }}"
                    class="flex items-center justify-between rounded-xl px-3 py-2 text-xs font-semibold text-slate-600 hover:bg-slate-50 hover:text-slate-900 transition"
                >
                    <div class="flex items-center gap-2.5">
                        <i class="ri-file-text-line text-sm"></i>
                        <span>SLA Proposals</span>
                    </div>
                    <span class="rounded-full bg-emerald-50 px-2 py-0.5 text-[10px] font-bold text-emerald-700 border border-emerald-200">
                        4 New
                    </span>
                </a>

                <!-- Checkpoints -->
                <a
                    href="{{ route('admin.dashboard') }}"
                    class="flex items-center justify-between rounded-xl px-3 py-2 text-xs font-semibold text-slate-600 hover:bg-slate-50 hover:text-slate-900 transition"
                >
                    <div class="flex items-center gap-2.5">
                        <i class="ri-qr-code-line text-sm"></i>
                        <span>IoT QR Checkpoints</span>
                    </div>
                    <span class="h-2 w-2 rounded-full bg-emerald-500 animate-pulse"></span>
                </a>
            </nav>
        </div>

        <!-- System Section -->
        <div>
            <p class="px-2.5 text-[10px] font-bold uppercase tracking-wider text-slate-400 mb-2">
                Management
            </p>
            <nav class="space-y-1">
                <a
                    href="{{ route('contact') }}"
                    target="_blank"
                    class="flex items-center justify-between rounded-xl px-3 py-2 text-xs font-semibold text-slate-600 hover:bg-slate-50 hover:text-slate-900 transition"
                >
                    <div class="flex items-center gap-2.5">
                        <i class="ri-customer-service-2-line text-sm"></i>
                        <span>24/7 Operations Desk</span>
                    </div>
                    <i class="ri-external-link-line text-xs text-slate-400"></i>
                </a>

                <a
                    href="{{ route('home') }}"
                    target="_blank"
                    class="flex items-center justify-between rounded-xl px-3 py-2 text-xs font-semibold text-slate-600 hover:bg-slate-50 hover:text-slate-900 transition"
                >
                    <div class="flex items-center gap-2.5">
                        <i class="ri-global-line text-sm"></i>
                        <span>Public Website</span>
                    </div>
                    <i class="ri-external-link-line text-xs text-slate-400"></i>
                </a>
            </nav>
        </div>

    </div>

    <!-- User Profile & Logout Footer -->
    <div class="p-4 border-t border-slate-100">
        <div class="flex items-center justify-between p-2 rounded-2xl border border-slate-200/80 bg-slate-50/60">
            <div class="flex items-center gap-2.5 min-w-0">
                <div class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-slate-900 text-white font-bold text-xs">
                    {{ substr(auth()->user()?->name ?? 'Admin', 0, 1) }}
                </div>
                <div class="min-w-0">
                    <p class="text-xs font-bold text-slate-900 truncate">
                        {{ auth()->user()?->name ?? 'Facility Admin' }}
                    </p>
                    <p class="text-[10px] text-slate-400 truncate">
                        {{ auth()->user()?->email ?? 'admin@facilitypro.com' }}
                    </p>
                </div>
            </div>

            <button
                type="button"
                wire:click="logout"
                title="Sign out"
                class="p-1.5 rounded-lg text-slate-400 hover:text-rose-600 hover:bg-rose-50 transition cursor-pointer"
            >
                <i class="ri-logout-box-r-line text-base"></i>
            </button>
        </div>
    </div>

</div>