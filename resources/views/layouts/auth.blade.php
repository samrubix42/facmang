<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-slate-50">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? 'Sign In - FacilityPro' }}</title>

        <!-- Google Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

        <!-- Remix Icon CDN -->
        <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        @livewireStyles
    </head>
    <body class="h-full bg-slate-50/60 font-sans text-slate-800 antialiased selection:bg-emerald-500 selection:text-white flex flex-col justify-between">
        
        <!-- Top Navigation Strip -->
        <div class="p-6 sm:px-10 flex items-center justify-between">
            <a href="{{ route('home') }}" class="inline-flex items-center gap-2 group">
                <img src="{{ asset('logo.png') }}" alt="FacilityPro Logo" class="h-9 sm:h-10 w-auto object-contain transition-transform group-hover:scale-105" />
            </a>

            <a
                href="{{ route('home') }}"
                class="inline-flex items-center gap-1.5 rounded-full border border-slate-200/80 bg-white px-4 py-2 text-xs font-semibold text-slate-600 shadow-xs hover:border-emerald-400 hover:text-emerald-700 transition"
            >
                <i class="ri-arrow-left-line text-xs"></i>
                <span>Back to Website</span>
            </a>
        </div>

        <!-- Main Auth Content Area (Centered Card) -->
        <main class="flex-1 flex items-center justify-center p-4 sm:p-6">
            <div class="w-full max-w-[420px]">
                {{ $slot }}
            </div>
        </main>

        <!-- Subtle Footer -->
        <footer class="p-6 text-center text-xs text-slate-400">
            <p>&copy; {{ date('Y') }} FacilityPro Management Inc. Secure Operations Console.</p>
        </footer>

        @livewireScripts
    </body>
</html>
