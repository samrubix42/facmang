<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-slate-50">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? 'FacilityPro Admin Command Center' }}</title>

        <!-- Google Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

        <!-- Remix Icon CDN -->
        <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        @livewireStyles
    </head>
    <body 
        class="h-full bg-slate-50 font-sans text-slate-800 antialiased selection:bg-emerald-500 selection:text-white"
        x-data="{ mobileSidebarOpen: false }"
    >
        <div class="flex min-h-screen">
            
            <!-- Desktop Sidebar -->
            <aside class="hidden lg:flex lg:w-64 lg:flex-col lg:fixed lg:inset-y-0 border-r border-slate-200/80 bg-white z-30">
                <livewire:admin.sidebar />
            </aside>

            <!-- Mobile Sidebar Backdrop & Drawer -->
            <div 
                x-show="mobileSidebarOpen" 
                x-cloak 
                class="relative z-50 lg:hidden"
                role="dialog" 
                aria-modal="true"
            >
                <div 
                    x-show="mobileSidebarOpen"
                    x-transition:enter="transition-opacity ease-linear duration-200"
                    x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100"
                    x-transition:leave="transition-opacity ease-linear duration-200"
                    x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0"
                    class="fixed inset-0 bg-slate-950/60 backdrop-blur-xs"
                    @click="mobileSidebarOpen = false"
                ></div>

                <div class="fixed inset-0 flex">
                    <div 
                        x-show="mobileSidebarOpen"
                        x-transition:enter="transition ease-in-out duration-200 transform"
                        x-transition:enter-start="-translate-x-full"
                        x-transition:enter-end="translate-x-0"
                        x-transition:leave="transition ease-in-out duration-200 transform"
                        x-transition:leave-start="translate-x-0"
                        x-transition:leave-end="-translate-x-full"
                        class="relative mr-16 flex w-full max-w-xs flex-1 bg-white"
                    >
                        <livewire:admin.sidebar />
                    </div>
                </div>
            </div>

            <!-- Main Content Area -->
            <div class="lg:pl-64 flex flex-1 flex-col min-w-0">
                
                <!-- Admin Header -->
                <livewire:admin.header />

                <!-- Page Content Slot -->
                <main class="flex-1 p-4 sm:p-6 lg:p-8">
                    <div class="mx-auto max-w-7xl">
                        {{ $slot }}
                    </div>
                </main>

                <!-- Clean Footer -->
                <footer class="border-t border-slate-200/80 bg-white py-4 px-6 text-xs text-slate-400 flex flex-col sm:flex-row items-center justify-between gap-2">
                    <p>&copy; {{ date('Y') }} FacilityPro Admin Console. All rights reserved.</p>
                    <div class="flex items-center gap-4 text-[11px]">
                        <span class="inline-flex items-center gap-1.5 text-emerald-600 font-medium">
                            <span class="h-2 w-2 rounded-full bg-emerald-500 animate-pulse"></span>
                            Telemetry Operational
                        </span>
                        <span>•</span>
                        <span>v2.4.0 (Enterprise)</span>
                    </div>
                </footer>
            </div>

        </div>

        @include('components.admin.toast')

        @livewireScripts
    </body>
</html>
