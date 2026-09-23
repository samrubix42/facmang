<header
    class="sticky top-0 z-50 border-b border-slate-200/80 bg-white/95 backdrop-blur-md transition-all"
    x-data="{ menuOpen: false }"
>
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between gap-4 lg:h-20">
            <!-- Brand Logo Only (Enlarged & Responsive) -->
            <a href="{{ route('home') }}" class="group flex shrink-0 items-center">
                <img src="{{ asset('logo.png') }}" alt="Facility Management Logo" class="h-10 sm:h-12 lg:h-16 w-auto object-contain transition-transform group-hover:scale-105" />
            </a>

            <!-- Desktop Nav Links -->
            <nav class="hidden items-center gap-1 rounded-full border border-slate-200/80 bg-slate-50/70 p-1 lg:flex" aria-label="Primary">
                @foreach ($this->navLinks() as $link)
                    <a
                        href="{{ $link['href'] }}"
                        class="rounded-full px-4 py-2 text-xs font-semibold text-slate-700 transition hover:bg-white hover:text-emerald-700 hover:shadow-xs"
                    >
                        {{ $link['label'] }}
                    </a>
                @endforeach
            </nav>

            <!-- Actions & Hotline -->
            <div class="flex items-center gap-4">
                <a
                    href="tel:+18004928820"
                    class="hidden items-center gap-2 text-xs font-semibold text-slate-600 transition hover:text-emerald-700 xl:flex"
                >
                    <span class="flex h-8 w-8 items-center justify-center rounded-full bg-emerald-50 text-emerald-600">
                        <i class="ri-phone-fill text-sm"></i>
                    </span>
                    <span>+1 (800) 492-8820</span>
                </a>

                <a
                    href="{{ route('home') }}#contact"
                    class="hidden items-center gap-2 rounded-lg bg-emerald-600 px-5 py-2.5 text-xs font-bold uppercase tracking-wider text-white shadow-sm shadow-emerald-600/25 transition hover:bg-emerald-700 hover:shadow-md sm:inline-flex"
                >
                    <span>Request Quote</span>
                    <i class="ri-arrow-right-line text-sm"></i>
                </a>

                <button
                    type="button"
                    class="inline-flex h-10 w-10 items-center justify-center rounded-lg border border-slate-200 text-slate-700 transition hover:bg-emerald-50 hover:text-emerald-700 lg:hidden"
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
        >
            <nav class="flex flex-col gap-1" aria-label="Mobile">
                @foreach ($this->navLinks() as $link)
                    <a
                        href="{{ $link['href'] }}"
                        class="flex items-center justify-between rounded-lg px-4 py-3 text-sm font-semibold text-slate-700 transition hover:bg-emerald-50 hover:text-emerald-700"
                        @click="menuOpen = false"
                    >
                        <span>{{ $link['label'] }}</span>
                        <i class="ri-arrow-right-s-line text-slate-400"></i>
                    </a>
                @endforeach
                <a
                    href="tel:+18004928820"
                    class="mt-2 flex items-center gap-3 rounded-lg border border-slate-200 bg-slate-50 px-4 py-3 text-sm font-semibold text-slate-800"
                >
                    <i class="ri-phone-fill text-emerald-600"></i>
                    <span>+1 (800) 492-8820</span>
                </a>
                <a
                    href="{{ route('home') }}#contact"
                    class="mt-2 flex items-center justify-center gap-2 rounded-lg bg-emerald-600 px-4 py-3 text-center text-xs font-bold uppercase tracking-wider text-white shadow-sm transition hover:bg-emerald-700"
                    @click="menuOpen = false"
                >
                    <span>Request Quote</span>
                    <i class="ri-arrow-right-line"></i>
                </a>
            </nav>
        </div>
    </div>
</header>