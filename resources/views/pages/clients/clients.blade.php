<div class="bg-white text-slate-800 antialiased font-sans selection:bg-red-500 selection:text-white">

    {{-- Page Hero --}}
    <section class="bg-[#0B1A30]">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            <nav class="border-b border-white/10 py-3.5 text-xs" aria-label="Breadcrumb">
                <ol class="flex flex-wrap items-center gap-1.5">
                    <li><a href="{{ route('home') }}" class="font-medium text-slate-400 transition hover:text-white">Home</a></li>
                    <li aria-hidden="true"><i class="ri-arrow-right-s-line text-slate-600"></i></li>
                    <li><span class="font-semibold text-white" aria-current="page">Our Clients</span></li>
                </ol>
            </nav>

            <div class="py-14 sm:py-20 lg:py-24">
                <h1 class="text-4xl font-extrabold leading-[1.05] tracking-tighter text-white sm:text-5xl lg:text-6xl">
                    Our Clients
                </h1>

                <p class="mt-4 max-w-2xl text-sm leading-relaxed text-slate-300 sm:text-base">
                    The businesses that trust us with their buildings.
                </p>
            </div>
        </div>
    </section>

    {{-- Clients Image Gallery Grid --}}
    <section class="py-14 sm:py-20 lg:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            
            <div class="grid grid-cols-2 gap-6 sm:grid-cols-3 sm:gap-8 lg:grid-cols-5">
                @forelse ($this->clients as $client)
                    <div 
                        wire:key="client-logo-{{ $client->id }}"
                        class="group relative z-0 flex h-44 items-center justify-center transition-transform duration-300 hover:z-10 hover:-translate-y-2 hover:scale-110 sm:h-52 lg:h-56 motion-reduce:transition-none motion-reduce:hover:transform-none"
                    >
                        <div class="flex h-full w-full items-center justify-center">
                            <img
                                src="{{ asset($client->image) }}"
                                alt="{{ $client->title ?? 'Client Logo' }}"
                                class="max-h-32 max-w-[95%] object-contain transition-transform duration-300 group-hover:scale-105 sm:max-h-40 lg:max-h-44 motion-reduce:transition-none motion-reduce:group-hover:transform-none"
                                onerror="this.onerror=null; this.src='https://placehold.co/150x150?text=Client';"
                            />
                        </div>
                    </div>
                @empty
                    <div class="col-span-full rounded-3xl border border-dashed border-slate-200 bg-white p-8 text-center sm:p-12">
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
    <section class="border-t border-slate-100 bg-slate-50/50 py-14 sm:py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="relative overflow-hidden rounded-3xl bg-[#0B1A30] px-6 py-14 sm:px-12 lg:py-16 text-center text-white border border-slate-800 shadow-xl">
                <div class="relative max-w-2xl mx-auto space-y-4">
                    <span class="inline-flex items-center gap-1.5 rounded-full bg-white/10 px-3.5 py-1 text-xs font-semibold text-red-400">
                        <i class="ri-shake-hands-line text-xs"></i> Join Our Client Network
                    </span>

                    <h2 class="text-3xl font-extrabold tracking-tight sm:text-4xl text-white">
                        Elevate your facility standards today
                    </h2>

                    <p class="text-sm text-slate-400 leading-relaxed max-w-lg mx-auto">
                        Connect with our operations team to benchmark your facilities management and receive a customized proposal.
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
                            href="tel:{{ setting('phone', '+91 88005-93143') }}"
                            class="inline-flex items-center gap-2 rounded-full border border-white/20 bg-white/10 px-6 py-3.5 text-xs sm:text-sm font-medium text-white backdrop-blur-md transition hover:bg-white/20 active:scale-[0.98]"
                        >
                            <i class="ri-phone-line text-sm text-red-400"></i>
                            <span>{{ setting('phone', '+91 88005-93143') }}</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
