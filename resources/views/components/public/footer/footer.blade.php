<footer class="bg-navy-950 text-slate-300">
    <div class="mx-auto max-w-7xl px-4 pb-8 pt-16 sm:px-6 lg:px-8">
        <div class="grid gap-12 lg:grid-cols-[1.4fr_1fr_1fr_1.35fr] lg:gap-10">
            <div>
                <a href="{{ route('home') }}" class="inline-flex items-center gap-3">
                    <span class="flex h-14 w-14 items-center justify-center rounded-2xl bg-white p-1.5 shadow-lg shadow-black/10">
                        <img src="{{ asset('logo.png') }}" alt="Facility Management logo" class="h-full w-full object-contain" />
                    </span>
                    <span class="text-left leading-tight">
                        <span class="block text-base font-semibold tracking-tight text-white">Facility Management</span>
                        <span class="mt-0.5 block text-[0.65rem] font-semibold uppercase tracking-[0.18em] text-brand-400">Keep it running</span>
                    </span>
                </a>
                <p class="mt-5 max-w-sm text-sm leading-relaxed text-slate-400">
                    End-to-end facility management for workplaces that never stop. We keep your buildings safe, clean,
                    and operating at peak performance — so your teams can focus on what matters.
                </p>
                <div class="mt-6 space-y-3 text-sm">
                    <a href="tel:+15550123456" class="flex items-center gap-3 transition hover:text-brand-400">
                        <svg class="h-5 w-5 shrink-0 text-brand-400" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
                        </svg>
                        +1 (555) 012-3456
                    </a>
                    <a href="mailto:hello@facilitymanagement.com" class="flex items-center gap-3 transition hover:text-brand-400">
                        <svg class="h-5 w-5 shrink-0 text-brand-400" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                        </svg>
                        hello@facilitymanagement.com
                    </a>
                    <p class="flex items-center gap-3 text-slate-400">
                        <svg class="h-5 w-5 shrink-0 text-brand-400" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                        </svg>
                        123 Business Park, Suite 100, Springfield
                    </p>
                </div>
            </div>

            <div>
                <h3 class="text-sm font-semibold uppercase tracking-wider text-white">Services</h3>
                <ul class="mt-5 space-y-3 text-sm">
                    @foreach ($this->serviceLinks() as $link)
                        <li>
                            <a href="{{ $link['href'] }}" class="transition hover:text-brand-400">
                                {{ $link['label'] }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div>
                <h3 class="text-sm font-semibold uppercase tracking-wider text-white">Company</h3>
                <ul class="mt-5 space-y-3 text-sm">
                    @foreach ($this->companyLinks() as $link)
                        <li>
                            <a href="{{ $link['href'] }}" class="transition hover:text-brand-400">
                                {{ $link['label'] }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div>
                <h3 class="text-sm font-semibold uppercase tracking-wider text-white">Stay in touch</h3>
                <p class="mt-5 text-sm leading-relaxed text-slate-400">
                    Get the latest maintenance tips and facility insights delivered to your inbox.
                </p>
                <div class="mt-5 flex flex-col gap-3 sm:flex-row">
                    <label for="footer-email" class="sr-only">Email address</label>
                    <input
                        id="footer-email"
                        type="email"
                        placeholder="you@company.com"
                        class="w-full rounded-xl border border-white/15 bg-white/5 px-4 py-3 text-sm text-white placeholder:text-slate-500 focus:border-brand-400 focus:outline-none focus:ring-2 focus:ring-brand-400/30 sm:flex-1"
                    />
                    <button
                        type="button"
                        class="rounded-xl bg-brand-600 px-5 py-3 text-sm font-semibold text-white transition hover:bg-brand-500"
                    >
                        Subscribe
                    </button>
                </div>
            </div>
        </div>

        <div class="mt-14 flex flex-col items-center justify-between gap-4 border-t border-white/10 pt-6 sm:flex-row">
            <p class="text-sm text-slate-400">© {{ date('Y') }} Facility Management. All rights reserved.</p>
            <div class="flex items-center gap-6 text-sm text-slate-400">
                <a href="#" class="transition hover:text-slate-200">Privacy Policy</a>
                <a href="#" class="transition hover:text-slate-200">Terms of Service</a>
            </div>
        </div>
    </div>
</footer>