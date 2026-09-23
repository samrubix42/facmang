<header
    class="sticky top-0 z-50 transition-all shadow-xs"
    x-data="{ menuOpen: false }"
>
    <!-- Top Utility Announcement Bar (Desktop) -->
    <div class="hidden border-b border-slate-900/10 bg-slate-900 text-slate-300 text-[11px] lg:block">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex h-9 items-center justify-between">
                <!-- Left Info -->
                <div class="flex items-center gap-4">
                    <span class="inline-flex items-center gap-1.5 text-emerald-400 font-bold">
                        <span class="h-2 w-2 rounded-full bg-emerald-400 animate-pulse"></span>
                        24/7 SLA Rapid Dispatch Active
                    </span>
                    <span class="text-slate-700">•</span>
                    <span class="text-slate-400 flex items-center gap-1.5">
                        <i class="ri-shield-star-fill text-emerald-400"></i> ISO 41001 & ISSA CIMS Certified
                    </span>
                    <span class="text-slate-700">•</span>
                    <span class="text-slate-400">Single-Contract Corporate Operations</span>
                </div>

                <!-- Right Info -->
                <div class="flex items-center gap-5">
                    <a href="mailto:ops@facilitypro.com" class="flex items-center gap-1.5 text-slate-300 hover:text-emerald-400 transition">
                        <i class="ri-mail-line text-emerald-400"></i>
                        <span>ops@facilitypro.com</span>
                    </a>
                    <span class="text-slate-700">•</span>
                    <span class="text-slate-400 flex items-center gap-1.5">
                        <i class="ri-map-pin-line text-emerald-400"></i> 100 Enterprise Plaza, Suite 400
                    </span>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Navigation Bar -->
    <div class="border-b border-slate-200/80 bg-white/95 backdrop-blur-md">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex h-16 items-center justify-between gap-4 lg:h-20">
                
                <!-- Brand Logo -->
                <a href="{{ route('home') }}" class="group flex shrink-0 items-center">
                    <img 
                        src="{{ asset('logo.png') }}" 
                        alt="FacilityPro Management Logo" 
                        class="h-10 sm:h-12 lg:h-15 w-auto object-contain transition-transform group-hover:scale-105" 
                    />
                </a>

                <!-- Desktop Nav Links -->
                <nav class="hidden items-center gap-1 rounded-full border border-slate-200/80 bg-slate-50/80 p-1.5 lg:flex shadow-xs" aria-label="Primary">
                    @foreach ($this->navLinks() as $link)
                        @php
                            $isActive = request()->routeIs($link['route']);
                        @endphp

                        @if (! empty($link['is_dropdown']))
                            <!-- Services Dropdown Trigger -->
                            <div 
                                class="relative" 
                                x-data="{ open: false }" 
                                @mouseenter="open = true" 
                                @mouseleave="open = false"
                            >
                                <a
                                    href="{{ $link['href'] }}"
                                    class="inline-flex items-center gap-1 rounded-full px-4 py-2 text-xs font-semibold transition {{ $isActive ? 'bg-white text-emerald-800 font-bold shadow-xs border border-slate-200/60' : 'text-slate-700 hover:bg-white hover:text-emerald-700 hover:shadow-xs' }}"
                                    @click="open = !open"
                                >
                                    <span>{{ $link['label'] }}</span>
                                    <i class="ri-arrow-down-s-line text-xs transition-transform duration-200" :class="open ? 'rotate-180 text-emerald-600' : 'text-slate-400'"></i>
                                </a>

                                <!-- Services Mega Dropdown Panel -->
                                <div
                                    x-show="open"
                                    x-cloak
                                    x-transition:enter="transition ease-out duration-200"
                                    x-transition:enter-start="opacity-0 translate-y-2 scale-98"
                                    x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                                    x-transition:leave="transition ease-in duration-150"
                                    x-transition:leave-start="opacity-100 translate-y-0 scale-100"
                                    x-transition:leave-end="opacity-0 translate-y-2 scale-98"
                                    class="absolute left-1/2 top-full -translate-x-1/2 pt-2.5 w-[660px] z-50"
                                >
                                    <div class="rounded-2xl border border-slate-200/90 bg-white p-5 shadow-2xl shadow-slate-900/10">
                                        <div class="flex items-center justify-between border-b border-slate-100 pb-3 mb-4">
                                            <div>
                                                <p class="text-xs font-extrabold uppercase tracking-wider text-slate-900">Enterprise Facility Capabilities</p>
                                                <p class="text-[11px] text-slate-500">SLA-backed operations with single-point accountability</p>
                                            </div>
                                            <a
                                                href="{{ route('services') }}"
                                                class="inline-flex items-center gap-1 text-xs font-bold text-emerald-700 hover:text-emerald-800 transition"
                                            >
                                                <span>All Services</span>
                                                <i class="ri-arrow-right-line"></i>
                                            </a>
                                        </div>

                                        <!-- 2-Column Services Grid -->
                                        <div class="grid grid-cols-2 gap-2.5">
                                            @foreach ($this->services() as $service)
                                                <a
                                                    href="{{ route('services.show', ['slug' => $service['slug']]) }}"
                                                    class="group flex items-start gap-3 rounded-xl p-3 transition hover:bg-slate-50 border border-transparent hover:border-slate-200/60"
                                                >
                                                    <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-emerald-50 text-emerald-700 group-hover:bg-emerald-600 group-hover:text-white transition shadow-xs border border-emerald-200/60">
                                                        <i class="{{ $service['icon'] }} text-base"></i>
                                                    </span>
                                                    <div class="min-w-0">
                                                        <p class="text-xs font-bold text-slate-900 group-hover:text-emerald-700 transition truncate">
                                                            {{ $service['title'] }}
                                                        </p>
                                                        <p class="text-[11px] text-slate-500 truncate mt-0.5">
                                                            {{ $service['tagline'] }}
                                                        </p>
                                                    </div>
                                                </a>
                                            @endforeach
                                        </div>

                                        <!-- Dropdown Bottom Highlight -->
                                        <div class="mt-4 -mx-5 -mb-5 rounded-b-2xl border-t border-slate-100 bg-slate-50/70 p-3.5 px-5 flex items-center justify-between text-xs">
                                            <div class="flex items-center gap-3 text-slate-600 font-medium">
                                                <span class="flex items-center gap-1"><i class="ri-checkbox-circle-fill text-emerald-600"></i> 100% W-2 Staff</span>
                                                <span class="flex items-center gap-1"><i class="ri-checkbox-circle-fill text-emerald-600"></i> IoT QR Logs</span>
                                            </div>
                                            <a
                                                href="{{ route('contact') }}"
                                                class="font-bold text-emerald-700 hover:text-emerald-800 transition inline-flex items-center gap-1"
                                            >
                                                <span>Request Custom Scope & Audit</span>
                                                <i class="ri-arrow-right-line"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <a
                                href="{{ $link['href'] }}"
                                class="rounded-full px-4 py-2 text-xs font-semibold transition {{ $isActive ? 'bg-white text-emerald-800 font-bold shadow-xs border border-slate-200/60' : 'text-slate-700 hover:bg-white hover:text-emerald-700 hover:shadow-xs' }}"
                            >
                                {{ $link['label'] }}
                            </a>
                        @endif
                    @endforeach
                </nav>

                <!-- Actions & Hotline -->
                <div class="flex items-center gap-3.5 sm:gap-4">
                    
                    <!-- 24/7 Hotline -->
                    <a
                        href="tel:+18004928820"
                        class="hidden items-center gap-2.5 rounded-full border border-slate-200 bg-slate-50/60 px-3.5 py-1.5 text-xs font-semibold text-slate-700 transition hover:border-emerald-300 hover:bg-white hover:text-emerald-700 hover:shadow-xs xl:flex"
                    >
                        <span class="relative flex h-7 w-7 items-center justify-center rounded-full bg-emerald-600 text-white shadow-xs">
                            <i class="ri-phone-fill text-xs"></i>
                            <span class="absolute -top-0.5 -right-0.5 flex h-2.5 w-2.5">
                                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                                <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-emerald-500"></span>
                            </span>
                        </span>
                        <div>
                            <p class="text-[9px] font-bold uppercase tracking-wider text-slate-400 leading-tight">24/7 Dispatch</p>
                            <p class="text-xs font-bold text-slate-900 leading-tight">+1 (800) 492-8820</p>
                        </div>
                    </a>

                    <!-- Request Quote Primary CTA -->
                    <a
                        href="{{ route('contact') }}"
                        class="hidden items-center gap-2 rounded-xl bg-emerald-600 px-5 py-2.5 text-xs font-bold uppercase tracking-wider text-white shadow-md shadow-emerald-600/25 transition hover:bg-emerald-700 hover:shadow-lg sm:inline-flex"
                    >
                        <span>Request Quote</span>
                        <i class="ri-arrow-right-line text-sm transition-transform group-hover:translate-x-0.5"></i>
                    </a>

                    <!-- Mobile Menu Hamburger Button -->
                    <button
                        type="button"
                        class="inline-flex h-10 w-10 items-center justify-center rounded-xl border border-slate-200 bg-white text-slate-700 transition hover:bg-emerald-50 hover:text-emerald-700 lg:hidden shadow-xs"
                        @click="menuOpen = !menuOpen"
                        aria-label="Toggle navigation menu"
                        :aria-expanded="menuOpen.toString()"
                    >
                        <i x-show="!menuOpen" class="ri-menu-3-line text-xl"></i>
                        <i x-show="menuOpen" x-cloak class="ri-close-line text-xl"></i>
                    </button>
                </div>
            </div>

            <!-- Mobile Drawer Menu -->
            <div
                x-show="menuOpen"
                x-cloak
                x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="translate-y-1 opacity-0"
                x-transition:enter-end="translate-y-0 opacity-100"
                x-transition:leave="transition ease-in duration-150"
                x-transition:leave-start="translate-y-0 opacity-100"
                x-transition:leave-end="translate-y-1 opacity-0"
                class="border-t border-slate-100 py-4 lg:hidden"
                x-data="{ mobileServicesOpen: false }"
            >
                <nav class="flex flex-col gap-1" aria-label="Mobile">
                    @foreach ($this->navLinks() as $link)
                        @php
                            $isActive = request()->routeIs($link['route']);
                        @endphp

                        @if (! empty($link['is_dropdown']))
                            <!-- Mobile Services Accordion -->
                            <div>
                                <div class="flex items-center justify-between rounded-xl px-4 py-3 text-sm font-semibold transition {{ $isActive ? 'bg-emerald-50 text-emerald-800' : 'text-slate-700 hover:bg-slate-50' }}">
                                    <a href="{{ $link['href'] }}" @click="menuOpen = false" class="flex-1">
                                        <span>{{ $link['label'] }}</span>
                                    </a>
                                    <button
                                        type="button"
                                        @click="mobileServicesOpen = !mobileServicesOpen"
                                        class="p-1 text-slate-400 hover:text-emerald-700"
                                        aria-label="Toggle services list"
                                    >
                                        <i class="ri-arrow-down-s-line text-lg transition-transform duration-200" :class="mobileServicesOpen ? 'rotate-180 text-emerald-600' : ''"></i>
                                    </button>
                                </div>

                                <div x-show="mobileServicesOpen" x-collapse class="pl-4 pr-2 py-2 space-y-1 bg-slate-50/60 rounded-xl mb-1">
                                    @foreach ($this->services() as $service)
                                        <a
                                            href="{{ route('services.show', ['slug' => $service['slug']]) }}"
                                            class="flex items-center gap-2.5 rounded-lg px-3 py-2 text-xs font-medium text-slate-600 hover:bg-white hover:text-emerald-700 transition"
                                            @click="menuOpen = false"
                                        >
                                            <i class="{{ $service['icon'] }} text-emerald-600"></i>
                                            <span class="truncate">{{ $service['title'] }}</span>
                                        </a>
                                    @endforeach
                                    <a
                                        href="{{ route('services') }}"
                                        class="flex items-center justify-between rounded-lg px-3 py-2 text-xs font-bold text-emerald-700 hover:bg-white transition border-t border-slate-200/60 mt-2 pt-2"
                                        @click="menuOpen = false"
                                    >
                                        <span>Explore All Capabilities</span>
                                        <i class="ri-arrow-right-line"></i>
                                    </a>
                                </div>
                            </div>
                        @else
                            <a
                                href="{{ $link['href'] }}"
                                class="flex items-center justify-between rounded-xl px-4 py-3 text-sm font-semibold transition {{ $isActive ? 'bg-emerald-50 text-emerald-800 font-bold' : 'text-slate-700 hover:bg-slate-50 hover:text-emerald-700' }}"
                                @click="menuOpen = false"
                            >
                                <span>{{ $link['label'] }}</span>
                                <i class="ri-arrow-right-s-line text-slate-400"></i>
                            </a>
                        @endif
                    @endforeach

                    <!-- Mobile Hotline Link -->
                    <a
                        href="tel:+18004928820"
                        class="mt-3 flex items-center gap-3 rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm font-semibold text-slate-800"
                    >
                        <span class="flex h-8 w-8 items-center justify-center rounded-lg bg-emerald-600 text-white">
                            <i class="ri-phone-fill text-sm"></i>
                        </span>
                        <div>
                            <p class="text-[10px] font-bold uppercase tracking-wider text-slate-500">Emergency Dispatch</p>
                            <p class="text-xs font-bold text-slate-900">+1 (800) 492-8820</p>
                        </div>
                    </a>

                    <!-- Mobile Request Quote Button -->
                    <a
                        href="{{ route('contact') }}"
                        class="mt-2 flex items-center justify-center gap-2 rounded-xl bg-emerald-600 px-4 py-3 text-center text-xs font-bold uppercase tracking-wider text-white shadow-md transition hover:bg-emerald-700"
                        @click="menuOpen = false"
                    >
                        <span>Request Facility Quote</span>
                        <i class="ri-arrow-right-line"></i>
                    </a>

                    <!-- Mobile Badges Footer -->
                    <div class="mt-4 flex items-center justify-center gap-4 text-[11px] text-slate-400 border-t border-slate-100 pt-4">
                        <span class="flex items-center gap-1"><i class="ri-shield-star-line text-emerald-600"></i> ISO 41001</span>
                        <span class="flex items-center gap-1"><i class="ri-award-line text-emerald-600"></i> ISSA CIMS</span>
                        <span class="flex items-center gap-1"><i class="ri-check-line text-emerald-600"></i> 100% W-2</span>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>