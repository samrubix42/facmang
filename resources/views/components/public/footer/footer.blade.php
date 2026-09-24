<footer class="border-t border-[#12233F]/40 bg-[#0B1A30] text-white">
    <div class="mx-auto max-w-7xl px-4 pb-10 pt-16 sm:px-6 lg:px-8">
        <div class="grid gap-12 lg:grid-cols-[1.4fr_1fr_1fr_1.35fr] lg:gap-10">
            <!-- Brand Overview -->
            <div>
                <!-- Brand Logo Only (Enlarged & Responsive) -->
                <a href="{{ route('home') }}" class="inline-flex items-center">
                    <img src="{{ asset('logo.png') }}" alt="Facility Management Logo" class="h-12 sm:h-14 lg:h-16 w-auto object-contain transition-transform hover:scale-105" />
                </a>
                <p class="mt-5 max-w-sm text-sm leading-relaxed text-slate-400">
                    Architectural-grade facility management for enterprise workplaces. We deliver commercial sweeping, office cleaning, restroom sanitation, and dedicated pantry staffing with 99.8% SLA reliability.
                </p>
                <div class="mt-6 space-y-3 text-xs text-slate-300">
                    <a href="tel:+18004928820" class="flex items-center gap-3 transition hover:text-red-400">
                        <span class="flex h-7 w-7 shrink-0 items-center justify-center rounded-md bg-white/10 text-red-400 border border-white/10">
                            <i class="ri-phone-fill text-xs"></i>
                        </span>
                        <span class="font-medium">+1 (800) 492-8820</span>
                    </a>
                    <a href="mailto:ops@facilitypro.com" class="flex items-center gap-3 transition hover:text-red-400">
                        <span class="flex h-7 w-7 shrink-0 items-center justify-center rounded-md bg-white/10 text-red-400 border border-white/10">
                            <i class="ri-mail-fill text-xs"></i>
                        </span>
                        <span class="font-medium">ops@facilitypro.com</span>
                    </a>
                    <p class="flex items-center gap-3">
                        <span class="flex h-7 w-7 shrink-0 items-center justify-center rounded-md bg-white/10 text-red-400 border border-white/10">
                            <i class="ri-map-pin-fill text-xs"></i>
                        </span>
                        <span class="font-medium">100 Enterprise Plaza, Suite 400</span>
                    </p>
                </div>
            </div>

            <!-- Services -->
            <div>
                <h3 class="text-xs font-bold uppercase tracking-[0.2em] text-red-400">Services</h3>
                <ul class="mt-5 space-y-3 text-xs font-medium text-slate-300">
                    @foreach ($this->serviceLinks() as $link)
                        <li>
                            <a href="{{ $link['href'] }}" class="flex items-center gap-2 transition hover:text-red-400">
                                <i class="ri-arrow-right-s-line text-red-500"></i>
                                <span>{{ $link['label'] }}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <!-- Company -->
            <div>
                <h3 class="text-xs font-bold uppercase tracking-[0.2em] text-red-400">Company</h3>
                <ul class="mt-5 space-y-3 text-xs font-medium text-slate-300">
                    @foreach ($this->companyLinks() as $link)
                        <li>
                            <a href="{{ $link['href'] }}" class="flex items-center gap-2 transition hover:text-red-400">
                                <i class="ri-arrow-right-s-line text-red-500"></i>
                                <span>{{ $link['label'] }}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <!-- Newsletter & SLA Standard -->
            <div>
                <h3 class="text-xs font-bold uppercase tracking-[0.2em] text-red-400">SLA Audit Dispatch</h3>
                <p class="mt-5 text-xs leading-relaxed text-slate-400">
                    Subscribe for monthly facility management checklists, indoor air quality compliance guides, and SLA audit reports.
                </p>
                <div class="mt-5 flex flex-col gap-2.5 sm:flex-row">
                    <label for="footer-email" class="sr-only">Email address</label>
                    <input
                        id="footer-email"
                        type="email"
                        placeholder="facility.manager@company.com"
                        class="w-full rounded-full border border-white/10 bg-white/5 px-4 py-2.5 text-xs text-white placeholder:text-slate-500 focus:border-red-400 focus:outline-none focus:ring-1 focus:ring-red-400 sm:flex-1"
                    />
                    <button
                        type="button"
                        class="rounded-full bg-red-600 px-5 py-2.5 text-xs font-semibold text-white transition hover:bg-red-500 shrink-0"
                    >
                        Subscribe
                    </button>
                </div>
                <div class="mt-6 flex items-center gap-4 text-[11px] text-slate-500 border-t border-white/10 pt-4">
                    <span class="flex items-center gap-1"><i class="ri-shield-check-line text-red-400"></i> ISO 9001</span>
                    <span class="flex items-center gap-1"><i class="ri-leaf-line text-red-400"></i> ISSA CIMS</span>
                    <span class="flex items-center gap-1"><i class="ri-award-line text-red-400"></i> OSHA 30-Hr</span>
                </div>
            </div>
        </div>

        <div class="mt-14 flex flex-col items-center justify-between gap-4 border-t border-white/10 pt-6 text-xs text-slate-500 sm:flex-row">
            <p>© {{ date('Y') }} FacilityPro Management Inc. All rights reserved.</p>
            <div class="flex items-center gap-6">
                <a href="#" class="transition hover:text-red-400">Privacy SLA</a>
                <a href="#" class="transition hover:text-red-400">Terms of Operations</a>
                <a href="#" class="transition hover:text-red-400">Security Compliance</a>
            </div>
        </div>
    </div>
</footer>