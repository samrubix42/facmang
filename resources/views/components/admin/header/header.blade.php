<header class="sticky top-0 z-20 flex h-16 shrink-0 items-center justify-between border-b border-slate-200/80 bg-white/95 px-4 sm:px-6 lg:px-8 backdrop-blur-md">
    
    <!-- Left: Mobile Menu Toggle & Title -->
    <div class="flex items-center gap-3">
        <!-- Mobile Drawer Button -->
        <button
            type="button"
            class="inline-flex h-9 w-9 items-center justify-center rounded-xl border border-slate-200 text-slate-600 hover:bg-slate-100 lg:hidden cursor-pointer"
            @click="mobileSidebarOpen = true"
            aria-label="Open sidebar"
        >
            <i class="ri-menu-2-line text-lg"></i>
        </button>

        <!-- Breadcrumb / Location -->
        <div class="flex items-center gap-2 text-xs">
            <span class="font-medium text-slate-400">Console</span>
            <i class="ri-arrow-right-s-line text-slate-300"></i>
            <span class="font-bold text-slate-900">Facility Operations Command</span>
        </div>
    </div>

    <!-- Right Controls -->
    <div class="flex items-center gap-3">
        
        <!-- Live Status Pill -->
        <div class="hidden sm:inline-flex items-center gap-2 rounded-full border border-emerald-200/80 bg-emerald-50 px-3.5 py-1 text-xs font-medium text-emerald-800">
            <span class="h-2 w-2 rounded-full bg-emerald-500 animate-pulse"></span>
            <span>SLA Audit Telemetry: 99.85%</span>
        </div>

        <!-- View Live Site Link -->
        <a
            href="{{ route('home') }}"
            target="_blank"
            class="inline-flex items-center gap-1.5 rounded-full border border-slate-200 bg-white px-3.5 py-1.5 text-xs font-semibold text-slate-700 shadow-2xs hover:border-emerald-400 hover:text-emerald-700 transition"
        >
            <i class="ri-external-link-line text-xs"></i>
            <span class="hidden sm:inline">View Site</span>
        </a>

        <!-- Sign Out Button -->
        <button
            type="button"
            wire:click="logout"
            class="inline-flex items-center gap-1.5 rounded-full bg-slate-100 hover:bg-rose-50 hover:text-rose-600 px-3.5 py-1.5 text-xs font-semibold text-slate-700 transition cursor-pointer"
        >
            <i class="ri-logout-box-r-line text-xs"></i>
            <span class="hidden sm:inline">Sign out</span>
        </button>

    </div>

</header>