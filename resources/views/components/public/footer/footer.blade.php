<footer class="border-t border-white/5 bg-[#0B1A30] text-slate-300">
    <div class="mx-auto max-w-7xl px-4 py-10 sm:px-6 sm:py-12 lg:px-8">

        <div class="grid gap-10 sm:grid-cols-2 lg:grid-cols-12 lg:gap-8">

            {{-- Brand --}}
            <div class="lg:col-span-4">
                <a href="{{ route('home') }}" class="inline-flex items-center">
                    <img
                        src="{{ asset('logo.png') }}"
                        alt="FacilityPro Management Logo"
                        loading="lazy"
                        decoding="async"
                        class="h-9 w-auto object-contain sm:h-11"
                    />
                </a>

                <p class="mt-4 max-w-xs text-xs leading-relaxed text-slate-400">
                    Housekeeping, washrooms, pantry and MEP maintenance for offices and commercial
                    buildings — by our own trained team, on one contract.
                </p>

                <div class="mt-5 flex flex-wrap items-center gap-2">
                    @if(setting('facebook'))
                        <a href="{{ setting('facebook') }}" target="_blank" rel="noopener noreferrer" aria-label="Facebook" class="flex h-8 w-8 items-center justify-center rounded-lg border border-white/10 text-slate-400 transition hover:border-red-500/40 hover:bg-red-600 hover:text-white">
                            <i class="ri-facebook-fill text-sm"></i>
                        </a>
                    @endif
                    @if(setting('twitter'))
                        <a href="{{ setting('twitter') }}" target="_blank" rel="noopener noreferrer" aria-label="X" class="flex h-8 w-8 items-center justify-center rounded-lg border border-white/10 text-slate-400 transition hover:border-red-500/40 hover:bg-red-600 hover:text-white">
                            <i class="ri-twitter-x-fill text-sm"></i>
                        </a>
                    @endif
                    @if(setting('linkedin'))
                        <a href="{{ setting('linkedin') }}" target="_blank" rel="noopener noreferrer" aria-label="LinkedIn" class="flex h-8 w-8 items-center justify-center rounded-lg border border-white/10 text-slate-400 transition hover:border-red-500/40 hover:bg-red-600 hover:text-white">
                            <i class="ri-linkedin-fill text-sm"></i>
                        </a>
                    @endif
                    @if(setting('instagram'))
                        <a href="{{ setting('instagram') }}" target="_blank" rel="noopener noreferrer" aria-label="Instagram" class="flex h-8 w-8 items-center justify-center rounded-lg border border-white/10 text-slate-400 transition hover:border-red-500/40 hover:bg-red-600 hover:text-white">
                            <i class="ri-instagram-fill text-sm"></i>
                        </a>
                    @endif
                    @if(setting('youtube'))
                        <a href="{{ setting('youtube') }}" target="_blank" rel="noopener noreferrer" aria-label="YouTube" class="flex h-8 w-8 items-center justify-center rounded-lg border border-white/10 text-slate-400 transition hover:border-red-500/40 hover:bg-red-600 hover:text-white">
                            <i class="ri-youtube-fill text-sm"></i>
                        </a>
                    @endif
                </div>

                <a
                    href="{{ route('contact') }}"
                    class="mt-5 inline-flex items-center gap-2 rounded-full bg-white/10 px-4 py-2 text-[11px] font-semibold text-white transition hover:bg-red-600"
                >
                    <i class="ri-calendar-check-line text-xs"></i>
                    <span>Book a free site walkthrough</span>
                </a>
            </div>

            {{-- Services --}}
            <div class="lg:col-span-3">
                <h2 class="text-[10px] font-bold uppercase tracking-[0.18em] text-slate-500">Services</h2>
                <ul class="mt-4 space-y-2.5 text-xs text-slate-400">
                    @foreach ($this->serviceLinks() as $link)
                        <li>
                            <a href="{{ $link['href'] }}" class="inline-block transition hover:text-white">
                                {{ $link['label'] }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            {{-- Company --}}
            <div class="lg:col-span-2">
                <h2 class="text-[10px] font-bold uppercase tracking-[0.18em] text-slate-500">Company</h2>
                <ul class="mt-4 space-y-2.5 text-xs text-slate-400">
                    @foreach ($this->companyLinks() as $link)
                        <li>
                            <a href="{{ $link['href'] }}" class="inline-block transition hover:text-white">
                                {{ $link['label'] }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            {{-- Contact --}}
            <div class="lg:col-span-3">
                <h2 class="text-[10px] font-bold uppercase tracking-[0.18em] text-slate-500">Get in touch</h2>

                <ul class="mt-4 space-y-3 text-xs text-slate-400">
                    <li>
                        <a href="tel:{{ setting('phone', '+1 (800) 492-8820') }}" class="inline-flex items-start gap-2.5 transition hover:text-white">
                            <i class="ri-phone-line mt-px shrink-0 text-sm text-red-500"></i>
                            <span class="font-medium">{{ setting('phone', '+1 (800) 492-8820') }}</span>
                        </a>
                    </li>
                    @if(setting('whatsapp'))
                        <li>
                            <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', setting('whatsapp')) }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-start gap-2.5 transition hover:text-white">
                                <i class="ri-whatsapp-line mt-px shrink-0 text-sm text-emerald-500"></i>
                                <span class="font-medium">{{ setting('whatsapp') }}</span>
                            </a>
                        </li>
                    @endif
                    <li>
                        <a href="mailto:{{ setting('email', 'ops@facilitypro.com') }}" class="inline-flex items-start gap-2.5 transition hover:text-white">
                            <i class="ri-mail-line mt-px shrink-0 text-sm text-red-500"></i>
                            <span class="font-medium">{{ setting('email', 'ops@facilitypro.com') }}</span>
                        </a>
                    </li>
                    <li class="flex items-start gap-2.5">
                        <i class="ri-map-pin-line mt-px shrink-0 text-sm text-red-500"></i>
                        <span class="min-w-0 font-medium">{{ setting('address', '100 Enterprise Plaza, Suite 400') }}</span>
                    </li>
                </ul>

                <p class="mt-4 text-[11px] leading-relaxed text-slate-500">
                    Operations desk open 24 hours. Emergency engineers on call every day of the year.
                </p>
            </div>

        </div>

        {{-- Trust Strip --}}
        <div class="mt-9 flex flex-wrap items-center gap-x-5 gap-y-2 text-[11px] text-slate-500">
            <span class="inline-flex items-center gap-1.5"><i class="ri-shield-user-line text-red-500"></i> Police-verified staff</span>
            <span class="inline-flex items-center gap-1.5"><i class="ri-hospital-line text-red-500"></i> ESI &amp; PF compliant</span>
            <span class="inline-flex items-center gap-1.5"><i class="ri-cup-line text-red-500"></i> FSSAI-trained pantry</span>
            <span class="inline-flex items-center gap-1.5"><i class="ri-fire-line text-red-500"></i> Fire &amp; first-aid trained</span>
        </div>

        {{-- Bottom Bar --}}
        <div class="mt-6 border-t border-white/5 pt-6 text-center text-[11px] text-slate-500">
            <p>&copy; {{ date('Y') }} {{ setting('company_name', 'FacilityPro Management Inc.') }}. All rights reserved.</p>
        </div>

    </div>
</footer>
