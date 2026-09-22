<header
    class="sticky top-0 z-50 border-b border-slate-200/70 bg-white/90 backdrop-blur-md"
    x-data="{ menuOpen: false }"
>
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between gap-4 lg:h-20">
            <a href="{{ route('home') }}" class="flex shrink-0 items-center gap-3">
                <img src="{{ asset('logo.png') }}" alt="Facility Management logo" class="h-10 w-auto lg:h-11" />
                <span class="hidden text-left leading-tight sm:block">
                    <span class="block text-base font-semibold tracking-tight text-navy-950">Facility Management</span>
                    <span class="mt-0.5 block text-[0.65rem] font-semibold uppercase tracking-[0.18em] text-brand-600">Keep it running</span>
                </span>
            </a>

            <nav class="hidden items-center gap-1 lg:flex" aria-label="Primary">
                @foreach ($this->navLinks() as $link)
                    <a
                        href="{{ $link['href'] }}"
                        class="rounded-full px-4 py-2 text-sm font-medium text-slate-600 transition hover:bg-brand-50 hover:text-brand-700"
                    >
                        {{ $link['label'] }}
                    </a>
                @endforeach
            </nav>

            <div class="flex items-center gap-3">
                <a
                    href="{{ route('home') }}#contact"
                    class="hidden rounded-full bg-brand-600 px-5 py-2.5 text-sm font-semibold text-white shadow-sm shadow-brand-600/20 transition hover:bg-brand-700 sm:inline-flex"
                >
                    Get a Quote
                </a>

                <button
                    type="button"
                    class="inline-flex h-10 w-10 items-center justify-center rounded-full text-navy-950 transition hover:bg-brand-50 lg:hidden"
                    @click="menuOpen = !menuOpen"
                    aria-label="Toggle navigation menu"
                    :aria-expanded="menuOpen.toString()"
                >
                    <svg x-show="!menuOpen" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                    <svg x-show="menuOpen" x-cloak class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>

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
                        class="rounded-xl px-4 py-3 text-sm font-medium text-slate-600 transition hover:bg-brand-50 hover:text-brand-700"
                    >
                        {{ $link['label'] }}
                    </a>
                @endforeach
                <a
                    href="{{ route('home') }}#contact"
                    class="mt-2 rounded-xl bg-brand-600 px-4 py-3 text-center text-sm font-semibold text-white transition hover:bg-brand-700"
                >
                    Get a Quote
                </a>
            </nav>
        </div>
    </div>
</header>