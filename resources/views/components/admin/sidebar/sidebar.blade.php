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

    <!-- Navigation Links -->
    <div class="flex-1 px-4 py-5 space-y-6 overflow-y-auto">
        
        <div>
            <p class="px-2.5 text-[10px] font-bold uppercase tracking-wider text-slate-400 mb-2">
                Management
            </p>
            <nav class="space-y-1">
                <!-- Dashboard / Overview -->
                <a
                    href="{{ route('admin.dashboard') }}"
                    wire:navigate
                    class="flex items-center justify-between rounded-xl px-3 py-2 text-xs font-semibold transition {{ request()->routeIs('admin.dashboard') ? 'bg-slate-900 text-white shadow-xs' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }}"
                >
                    <div class="flex items-center gap-2.5">
                        <i class="ri-dashboard-line text-sm"></i>
                        <span>Overview</span>
                    </div>
                </a>

                <!-- Services -->
                <a
                    href="{{ route('admin.services.index') }}"
                    wire:navigate
                    class="flex items-center justify-between rounded-xl px-3 py-2 text-xs font-semibold transition {{ request()->routeIs('admin.services*') ? 'bg-slate-900 text-white shadow-xs' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }}"
                >
                    <div class="flex items-center gap-2.5">
                        <i class="ri-service-line text-sm"></i>
                        <span>Services</span>
                    </div>
                </a>

                <!-- Service Categories -->
                <a
                    href="{{ route('admin.service-categories') }}"
                    wire:navigate
                    class="flex items-center justify-between rounded-xl px-3 py-2 text-xs font-semibold transition {{ request()->routeIs('admin.service-categories*') ? 'bg-slate-900 text-white shadow-xs' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }}"
                >
                    <div class="flex items-center gap-2.5">
                        <i class="ri-folders-line text-sm"></i>
                        <span>Service Categories</span>
                    </div>
                </a>

                <!-- Gallery -->
                <a
                    href="{{ route('admin.gallery') }}"
                    wire:navigate
                    class="flex items-center justify-between rounded-xl px-3 py-2 text-xs font-semibold transition {{ request()->routeIs('admin.gallery') ? 'bg-slate-900 text-white shadow-xs' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }}"
                >
                    <div class="flex items-center gap-2.5">
                        <i class="ri-image-2-line text-sm"></i>
                        <span>Gallery</span>
                    </div>
                </a>

                <!-- Gallery Categories -->
                <a
                    href="{{ route('admin.gallery-categories') }}"
                    wire:navigate
                    class="flex items-center justify-between rounded-xl px-3 py-2 text-xs font-semibold transition {{ request()->routeIs('admin.gallery-categories') ? 'bg-slate-900 text-white shadow-xs' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }}"
                >
                    <div class="flex items-center gap-2.5">
                        <i class="ri-gallery-line text-sm"></i>
                        <span>Gallery Categories</span>
                    </div>
                </a>

                <!-- Testimonials -->
                <a
                    href="{{ route('admin.testimonials') }}"
                    wire:navigate
                    class="flex items-center justify-between rounded-xl px-3 py-2 text-xs font-semibold transition {{ request()->routeIs('admin.testimonials') ? 'bg-slate-900 text-white shadow-xs' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }}"
                >
                    <div class="flex items-center gap-2.5">
                        <i class="ri-chat-quote-line text-sm"></i>
                        <span>Testimonials</span>
                    </div>
                </a>

                <!-- Job Openings -->
                <a
                    href="{{ route('admin.jobs.index') }}"
                    wire:navigate
                    class="flex items-center justify-between rounded-xl px-3 py-2 text-xs font-semibold transition {{ request()->routeIs('admin.jobs*') ? 'bg-slate-900 text-white shadow-xs' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }}"
                >
                    <div class="flex items-center gap-2.5">
                        <i class="ri-briefcase-line text-sm"></i>
                        <span>Job Openings</span>
                    </div>
                </a>

                <!-- Job Applications -->
                <a
                    href="{{ route('admin.job-applied.index') }}"
                    wire:navigate
                    class="flex items-center justify-between rounded-xl px-3 py-2 text-xs font-semibold transition {{ request()->routeIs('admin.job-applied*') ? 'bg-slate-900 text-white shadow-xs' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }}"
                >
                    <div class="flex items-center gap-2.5">
                        <i class="ri-file-user-line text-sm"></i>
                        <span>Job Applications</span>
                    </div>
                    @php
                        $pendingAppsCount = \App\Models\JobApplied::where('status', 'pending')->count();
                    @endphp
                    @if ($pendingAppsCount > 0)
                        <span class="rounded-full bg-red-600 px-1.5 py-0.2 text-[10px] font-bold text-white">
                            {{ $pendingAppsCount }}
                        </span>
                    @endif
                </a>

                <!-- Site Settings -->
                <a
                    href="{{ route('admin.settings') }}"
                    wire:navigate
                    class="flex items-center justify-between rounded-xl px-3 py-2 text-xs font-semibold transition {{ request()->routeIs('admin.settings') ? 'bg-slate-900 text-white shadow-xs' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }}"
                >
                    <div class="flex items-center gap-2.5">
                        <i class="ri-settings-4-line text-sm"></i>
                        <span>Site Settings</span>
                    </div>
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