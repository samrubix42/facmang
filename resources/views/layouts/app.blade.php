<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? config('app.name') }}</title>

        <!-- Google Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,400&family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

        <!-- Remix Icon CDN -->
        <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        @livewireStyles
    </head>
    <body class="flex min-h-screen flex-col bg-slate-50 font-sans text-slate-800 antialiased selection:bg-emerald-500 selection:text-white overflow-x-hidden">
        <livewire:public.header />

        <main class="flex-1">
            {{ $slot }}
        </main>

        <livewire:public.footer />

        <!-- Floating Circular Animated WhatsApp Button -->
        @php
            $waNumber = preg_replace('/[^0-9]/', '', setting('whatsapp', setting('phone', '918800593143')));
        @endphp
        <a
            href="https://wa.me/{{ $waNumber }}?text={{ urlencode('Hello Real Facility Services, I would like to inquire about your services.') }}"
            target="_blank"
            rel="noopener noreferrer"
            aria-label="Chat on WhatsApp"
            class="fixed bottom-6 right-6 z-50 group flex h-14 w-14 items-center justify-center rounded-full bg-emerald-500 text-white shadow-xl shadow-emerald-500/30 transition-all duration-300 hover:bg-emerald-600 hover:scale-110 active:scale-95"
        >
            <!-- Outer Pulsing Ring Animation -->
            <span class="absolute inset-0 -z-10 animate-ping rounded-full bg-emerald-500/50 duration-1000"></span>
            
            <!-- WhatsApp Icon -->
            <i class="ri-whatsapp-fill text-3xl transition-transform group-hover:rotate-12"></i>

            <!-- Hover Tooltip -->
            <span class="absolute right-16 top-1/2 -translate-y-1/2 whitespace-nowrap rounded-xl bg-slate-900 px-3.5 py-1.5 text-xs font-semibold text-white shadow-md opacity-0 transition-all duration-300 group-hover:opacity-100 pointer-events-none translate-x-2 group-hover:translate-x-0 hidden sm:block">
                Chat on WhatsApp
            </span>
        </a>

        @livewireScripts
    </body>
</html>
