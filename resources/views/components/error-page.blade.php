@props([
    'code' => '404',
    'icon' => 'ri-error-warning-line',
    'title' => 'Something went wrong',
    'description' => '',
    'note' => null,
    'primaryLabel' => 'Back to home',
    'primaryHref' => null,
    'secondaryLabel' => 'Browse our services',
    'secondaryHref' => null,
    'showPhone' => false,
])

@php
    $primaryHref ??= route('home');
    $secondaryHref ??= route('services');
@endphp

<x-layouts.error :document-title="$title.' ('.$code.') | '.setting('company_name', 'FacilityPro')">
    <div class="flex min-h-[72vh] items-center bg-white py-16 sm:py-20">
        <div class="mx-auto w-full max-w-xl px-4 text-center sm:px-6">

            <span class="mx-auto flex h-14 w-14 items-center justify-center rounded-2xl border border-[#12233F]/10 bg-[#12233F]/10 text-[#12233F]">
                <i class="{{ $icon }} text-2xl"></i>
            </span>

            <p class="mt-6 text-5xl font-extrabold tracking-tighter text-slate-900 tabular-nums sm:text-6xl">
                {{ $code }}
            </p>

            <h1 class="mt-2 text-xl font-bold tracking-tight text-slate-900 sm:text-2xl">
                {{ $title }}
            </h1>

            @if ($description)
                <p class="mt-3 text-sm leading-relaxed text-slate-600">
                    {{ $description }}
                </p>
            @endif

            @if ($note)
                <div class="mt-6 rounded-xl border border-red-100 bg-red-50/60 px-4 py-3 text-left">
                    <p class="text-xs leading-relaxed text-red-900">
                        {{ $note }}
                    </p>
                </div>
            @endif

            <div class="mt-8 flex flex-wrap items-center justify-center gap-3">
                <a
                    href="{{ $primaryHref }}"
                    class="inline-flex items-center gap-2 rounded-full bg-red-600 px-6 py-3 text-xs font-semibold text-white shadow-sm transition hover:bg-red-500 active:scale-[0.98] sm:text-sm"
                >
                    <span>{{ $primaryLabel }}</span>
                    <i class="ri-arrow-right-line text-sm"></i>
                </a>

                <a
                    href="{{ $secondaryHref }}"
                    class="inline-flex items-center gap-2 rounded-full border border-slate-200 bg-white px-6 py-3 text-xs font-medium text-slate-700 transition hover:border-[#12233F]/40 hover:text-slate-900 active:scale-[0.98] sm:text-sm"
                >
                    <span>{{ $secondaryLabel }}</span>
                </a>
            </div>

            @if ($showPhone)
                <p class="mt-5 text-xs text-slate-500">
                    Need it sorted right now? Call the operations desk on
                    <a href="tel:{{ setting('phone', '+1 (800) 492-8820') }}" class="font-semibold text-slate-900 underline underline-offset-2 transition hover:text-red-600">
                        {{ setting('phone', '+1 (800) 492-8820') }}
                    </a>
                </p>
            @endif

            <div class="mt-9 flex flex-wrap items-center justify-center gap-x-5 gap-y-2 border-t border-slate-100 pt-6 text-xs text-slate-500">
                <a href="{{ route('home') }}" class="transition hover:text-red-600">Home</a>
                <a href="{{ route('services') }}" class="transition hover:text-red-600">Services</a>
                <a href="{{ route('about') }}" class="transition hover:text-red-600">About us</a>
                <a href="{{ route('contact') }}" class="transition hover:text-red-600">Contact</a>
            </div>

        </div>
    </div>
</x-layouts.error>
