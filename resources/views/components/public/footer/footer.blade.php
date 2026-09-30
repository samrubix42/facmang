<footer class="border-t border-slate-200 bg-white text-slate-700">
    <div class="mx-auto max-w-7xl px-4 py-10 sm:px-6 sm:py-12 lg:px-8">

        <div class="grid gap-10 sm:grid-cols-2 lg:grid-cols-12 lg:gap-8">

            {{-- Brand --}}
            <div class="lg:col-span-4">
                <a href="{{ route('home') }}" class="inline-flex items-center">
                    <img
                        src="{{ asset('logo.png') }}"
                        alt="Real Facility Services (RFS) Logo"
                        loading="lazy"
                        decoding="async"
                        class="h-9 w-auto object-contain sm:h-11"
                    />
                </a>

                <p class="mt-4 max-w-xs text-sm leading-relaxed text-slate-600">
                    Integrated facility and soft services for residential societies and commercial
                    buildings housekeeping, horticulture, technical, security and 24x7 support by our own team.
                </p>

                <div class="mt-5 flex flex-wrap items-center gap-2">
                    @if(setting('facebook'))
                        <a href="{{ setting('facebook') }}" target="_blank" rel="noopener noreferrer" aria-label="Facebook" class="flex h-9 w-9 items-center justify-center rounded-lg border border-slate-200 text-slate-600 transition hover:border-red-500 hover:bg-red-600 hover:text-white">
                            <i class="ri-facebook-fill text-base"></i>
                        </a>
                    @endif
                    @if(setting('twitter'))
                        <a href="{{ setting('twitter') }}" target="_blank" rel="noopener noreferrer" aria-label="X" class="flex h-9 w-9 items-center justify-center rounded-lg border border-slate-200 text-slate-600 transition hover:border-red-500 hover:bg-red-600 hover:text-white">
                            <i class="ri-twitter-x-fill text-base"></i>
                        </a>
                    @endif
                    @if(setting('linkedin'))
                        <a href="{{ setting('linkedin') }}" target="_blank" rel="noopener noreferrer" aria-label="LinkedIn" class="flex h-9 w-9 items-center justify-center rounded-lg border border-slate-200 text-slate-600 transition hover:border-red-500 hover:bg-red-600 hover:text-white">
                            <i class="ri-linkedin-fill text-base"></i>
                        </a>
                    @endif
                    @if(setting('instagram'))
                        <a href="{{ setting('instagram') }}" target="_blank" rel="noopener noreferrer" aria-label="Instagram" class="flex h-9 w-9 items-center justify-center rounded-lg border border-slate-200 text-slate-600 transition hover:border-red-500 hover:bg-red-600 hover:text-white">
                            <i class="ri-instagram-fill text-base"></i>
                        </a>
                    @endif
                    @if(setting('youtube'))
                        <a href="{{ setting('youtube') }}" target="_blank" rel="noopener noreferrer" aria-label="YouTube" class="flex h-9 w-9 items-center justify-center rounded-lg border border-slate-200 text-slate-600 transition hover:border-red-500 hover:bg-red-600 hover:text-white">
                            <i class="ri-youtube-fill text-base"></i>
                        </a>
                    @endif
                </div>

            </div>

            {{-- Services --}}
            <div class="lg:col-span-3">
                <h2 class="text-xs font-bold uppercase tracking-wider text-slate-900">Services</h2>
                <ul class="mt-4 space-y-2.5 text-sm text-slate-600">
                    @foreach ($this->serviceLinks() as $link)
                        <li>
                            <a href="{{ $link['href'] }}" class="inline-block transition hover:text-red-600">
                                {{ $link['label'] }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            {{-- Company --}}
            <div class="lg:col-span-2">
                <h2 class="text-xs font-bold uppercase tracking-wider text-slate-900">Company</h2>
                <ul class="mt-4 space-y-2.5 text-sm text-slate-600">
                    @foreach ($this->companyLinks() as $link)
                        <li>
                            <a href="{{ $link['href'] }}" class="inline-block transition hover:text-red-600">
                                {{ $link['label'] }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            {{-- Contact --}}
            <div class="lg:col-span-3">
                <h2 class="text-xs font-bold uppercase tracking-wider text-slate-900">Get in touch</h2>

                <ul class="mt-4 space-y-3 text-sm text-slate-600">
                    <li>
                        <a href="tel:{{ setting('phone', '+1 (800) 492-8820') }}" class="inline-flex items-start gap-2.5 transition hover:text-red-600">
                            <i class="ri-phone-line mt-px shrink-0 text-base text-red-500"></i>
                            <span class="font-medium">{{ setting('phone', '+1 (800) 492-8820') }}</span>
                        </a>
                    </li>
                    @if(setting('whatsapp'))
                        <li>
                            <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', setting('whatsapp')) }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-start gap-2.5 transition hover:text-red-600">
                                <i class="ri-whatsapp-line mt-px shrink-0 text-base text-emerald-600"></i>
                                <span class="font-medium">{{ setting('whatsapp') }}</span>
                            </a>
                        </li>
                    @endif
                    <li>
                        <a href="mailto:{{ setting('email', 'ops@facilitypro.com') }}" class="inline-flex items-start gap-2.5 transition hover:text-red-600">
                            <i class="ri-mail-line mt-px shrink-0 text-base text-red-500"></i>
                            <span class="font-medium">{{ setting('email', 'ops@facilitypro.com') }}</span>
                        </a>
                    </li>
                    <li class="flex items-start gap-2.5">
                        <i class="ri-map-pin-line mt-px shrink-0 text-base text-red-500"></i>
                        <span class="min-w-0 font-medium">{{ setting('address', 'Plot No. 128, Haibatpur, Near Gaur City Mall, Greater Noida - 201318 (U.P.)') }}</span>
                    </li>
                </ul>

                <p class="mt-4 text-xs leading-relaxed text-slate-500">
                    Operations desk open 24 hours. Emergency engineers on call every day of the year.
                </p>
            </div>

        </div>

        

        {{-- Bottom Bar --}}
        <div class="mt-6 border-t border-slate-200 pt-6 text-center text-xs text-slate-500">
            <p>&copy; {{ date('Y') }} {{ setting('company_name', 'Real Facility Services (RFS)') }}. All rights reserved.</p>
        </div>

    </div>
</footer>

