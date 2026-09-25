<div class="bg-white text-slate-800 antialiased font-sans selection:bg-red-500 selection:text-white">

    {{-- Breadcrumb Navigation Bar --}}
    <div class="border-b border-slate-100 bg-white">
        <div class="mx-auto max-w-7xl px-4 py-3.5 sm:px-6 lg:px-8">
            <div class="flex flex-wrap items-center justify-between gap-3 text-xs">
                <nav class="flex items-center gap-2 text-slate-400" aria-label="Breadcrumb">
                    <a href="{{ route('home') }}" class="transition hover:text-[#12233F] font-medium">Home</a>
                    <i class="ri-arrow-right-s-line text-slate-300"></i>
                    <span class="font-semibold text-slate-800">Our Clients</span>
                </nav>

                <div class="flex items-center gap-2 text-slate-400">
                    <span class="inline-flex h-2 w-2 rounded-full bg-emerald-500"></span>
                    <span class="font-medium text-slate-600">{{ count($this->clients) }} Corporate Partners</span>
                </div>
            </div>
        </div>
    </div>

    {{-- Hero Section --}}
    <section class="border-b border-slate-100 py-14 sm:py-18 lg:py-20 bg-linear-to-b from-slate-50/50 to-white">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 text-center">
            <div class="max-w-3xl mx-auto space-y-4">
                <div>
                    <span class="inline-flex items-center gap-2 rounded-full bg-[#12233F]/10 px-4 py-1.5 text-xs font-semibold text-[#12233F]">
                        <span class="h-2 w-2 rounded-full bg-red-500 animate-pulse"></span>
                        <span>Enterprise Facility Partnerships</span>
                    </span>
                </div>

                <h1 class="text-3xl font-extrabold tracking-tight text-slate-900 sm:text-4xl lg:text-5xl">
                    Our Valued Clients
                </h1>

                <p class="text-sm sm:text-base leading-relaxed text-slate-600 max-w-2xl mx-auto font-normal">
                    Delivering zero-downtime MEP maintenance, hospital-grade janitorial care, and high-standard workplace hygiene for top corporate institutions and commercial towers.
                </p>
            </div>
        </div>
    </section>

    {{-- Clients Image Gallery Grid --}}
    <section class="py-16 sm:py-20 lg:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-4 sm:gap-6">
                @forelse ($this->clients as $client)
                    <div 
                        wire:key="client-logo-{{ $client->id }}"
                        class="group relative flex h-36 sm:h-40 items-center justify-center rounded-2xl sm:rounded-3xl border border-slate-200/80 bg-white p-4 sm:p-6 shadow-xs hover:border-[#12233F]/30 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 overflow-hidden cursor-default"
                    >
                        <div class="relative flex h-full w-full items-center justify-center">
                            <img
                                src="{{ asset($client->image) }}"
                                alt="{{ $client->title ?? 'Client Logo' }}"
                                class="max-h-20 sm:max-h-24 max-w-[85%] object-contain transition-all duration-300 group-hover:scale-110 filter saturate-90 group-hover:saturate-100"
                                onerror="this.onerror=null; this.src='https://placehold.co/150x150?text=Client';"
                            />
                        </div>

                        <!-- Subtle decorative hover border glow -->
                        <div class="absolute inset-0 rounded-2xl sm:rounded-3xl border-2 border-transparent group-hover:border-red-500/20 pointer-events-none transition-colors"></div>
                    </div>
                @empty
                    <div class="col-span-full rounded-3xl border border-dashed border-slate-200 bg-white p-12 text-center">
                        <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-full bg-[#12233F]/10 text-[#12233F]">
                            <i class="ri-building-line text-2xl"></i>
                        </div>
                        <h3 class="mt-4 text-base font-bold text-slate-900">No client images available</h3>
                        <p class="mt-1 text-xs text-slate-500">
                            Client logos will appear here once added to the portfolio.
                        </p>
                    </div>
                @endforelse
            </div>

        </div>
    </section>

    {{-- Bottom Enterprise CTA Strip --}}
    <section class="border-t border-slate-100 bg-slate-50/50 py-16 sm:py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="relative overflow-hidden rounded-3xl bg-[#0B1A30] px-6 py-14 sm:px-12 lg:py-16 text-center text-white border border-slate-800 shadow-xl">
                <div class="relative max-w-2xl mx-auto space-y-4">
                    <span class="inline-flex items-center gap-1.5 rounded-full bg-white/10 px-3.5 py-1 text-xs font-semibold text-red-400">
                        <i class="ri-handshake-line text-xs"></i> Join Our Client Network
                    </span>

                    <h2 class="text-3xl font-extrabold tracking-tight sm:text-4xl text-white">
                        Elevate your facility standards today
                    </h2>

                    <p class="text-sm text-slate-400 leading-relaxed max-w-lg mx-auto">
                        Connect with our operations team to benchmark your facilities management and receive an SLA-guaranteed proposal.
                    </p>

                    <div class="pt-4 flex flex-wrap items-center justify-center gap-3">
                        <a
                            href="{{ route('contact') }}"
                            class="inline-flex items-center gap-2 rounded-full bg-red-500 px-7 py-3.5 text-xs sm:text-sm font-semibold text-slate-950 shadow-sm transition hover:bg-red-400 active:scale-[0.98]"
                        >
                            <span>Request Facility Audit</span>
                            <i class="ri-arrow-right-line text-sm"></i>
                        </a>

                        <a
                            href="tel:+18004928820"
                            class="inline-flex items-center gap-2 rounded-full border border-white/20 bg-white/10 px-6 py-3.5 text-xs sm:text-sm font-medium text-white backdrop-blur-md transition hover:bg-white/20 active:scale-[0.98]"
                        >
                            <i class="ri-phone-line text-sm text-red-400"></i>
                            <span>+1 (800) 492-8820</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
