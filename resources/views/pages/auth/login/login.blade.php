<div class="space-y-6">
    
    <!-- Main Login Card (shadcn inspired) -->
    <div class="rounded-3xl border border-slate-200/90 bg-white p-7 sm:p-8 shadow-xs">
        
        <!-- Header -->
        <div class="space-y-1.5 text-center sm:text-left">
            <h1 class="text-2xl font-bold tracking-tight text-slate-900">
                Welcome back
            </h1>
            <p class="text-xs text-slate-500">
                Enter your credentials to access the facility command center.
            </p>
        </div>

        <!-- Quick Demo Credentials Callout -->
        <div class="mt-5 rounded-2xl border border-emerald-200/80 bg-emerald-50/60 p-3.5 text-xs text-emerald-900 flex items-center justify-between gap-2">
            <div class="flex items-center gap-2">
                <i class="ri-key-2-line text-emerald-600 text-base shrink-0"></i>
                <div class="text-[11px] leading-tight">
                    <span class="font-bold">Demo Login:</span>
                    <span class="text-emerald-700">admin@facilitypro.com</span> / <span class="text-emerald-700">password</span>
                </div>
            </div>
            <span class="rounded-full bg-emerald-100 px-2 py-0.5 text-[9px] font-bold uppercase text-emerald-800 shrink-0">
                Pre-filled
            </span>
        </div>

        <!-- Form -->
        <form wire:submit="authenticate" class="mt-6 space-y-4">
            
            <!-- Email -->
            <div class="space-y-1.5">
                <label for="email" class="block text-xs font-semibold text-slate-700">
                    Work Email
                </label>
                <div class="relative">
                    <i class="ri-mail-line absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400 text-sm"></i>
                    <input
                        id="email"
                        type="email"
                        wire:model="email"
                        placeholder="admin@facilitypro.com"
                        autocomplete="email"
                        required
                        class="w-full rounded-full border border-slate-200 bg-white pl-10 pr-4 py-2.5 text-xs sm:text-sm text-slate-900 placeholder:text-slate-400 focus:border-slate-900 focus:outline-none focus:ring-1 focus:ring-slate-900 transition"
                    />
                </div>
                @error('email') 
                    <span class="text-[11px] font-medium text-rose-600 mt-1 block">{{ $message }}</span> 
                @enderror
            </div>

            <!-- Password -->
            <div class="space-y-1.5" x-data="{ showPassword: false }">
                <div class="flex items-center justify-between">
                    <label for="password" class="block text-xs font-semibold text-slate-700">
                        Password
                    </label>
                    <span class="text-[11px] font-medium text-slate-400 cursor-not-allowed">
                        Forgot password?
                    </span>
                </div>
                <div class="relative">
                    <i class="ri-lock-line absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400 text-sm"></i>
                    <input
                        id="password"
                        :type="showPassword ? 'text' : 'password'"
                        wire:model="password"
                        placeholder="••••••••"
                        autocomplete="current-password"
                        required
                        class="w-full rounded-full border border-slate-200 bg-white pl-10 pr-10 py-2.5 text-xs sm:text-sm text-slate-900 placeholder:text-slate-400 focus:border-slate-900 focus:outline-none focus:ring-1 focus:ring-slate-900 transition"
                    />
                    <button
                        type="button"
                        @click="showPassword = !showPassword"
                        class="absolute right-3.5 top-1/2 -translate-y-1/2 text-slate-400 hover:text-slate-600 cursor-pointer"
                        tabindex="-1"
                        aria-label="Toggle password visibility"
                    >
                        <i :class="showPassword ? 'ri-eye-off-line' : 'ri-eye-line'" class="text-sm"></i>
                    </button>
                </div>
                @error('password') 
                    <span class="text-[11px] font-medium text-rose-600 mt-1 block">{{ $message }}</span> 
                @enderror
            </div>

            <!-- Remember Me -->
            <div class="flex items-center justify-between pt-1">
                <label class="flex items-center gap-2 cursor-pointer">
                    <input
                        type="checkbox"
                        wire:model="remember"
                        class="h-4 w-4 rounded text-slate-900 border-slate-300 focus:ring-slate-900"
                    />
                    <span class="text-xs text-slate-600 font-medium">Remember this workstation</span>
                </label>
            </div>

            <!-- Submit Button (shadcn clean dark pill) -->
            <div class="pt-2">
                <button
                    type="submit"
                    wire:loading.attr="disabled"
                    class="w-full inline-flex items-center justify-center gap-2 rounded-full bg-slate-900 px-6 py-3 text-xs sm:text-sm font-semibold text-white shadow-xs hover:bg-slate-800 transition active:scale-[0.98] cursor-pointer disabled:opacity-70"
                >
                    <span wire:loading.remove>Sign in to Command Center</span>
                    <span wire:loading class="inline-flex items-center gap-2">
                        <i class="ri-loader-4-line animate-spin"></i>
                        <span>Authenticating...</span>
                    </span>
                    <i wire:loading.remove class="ri-arrow-right-line text-xs"></i>
                </button>
            </div>

        </form>

    </div>

    <!-- Security & Compliance Subtext -->
    <div class="text-center space-y-2">
        <p class="text-[11px] text-slate-400 flex items-center justify-center gap-1.5">
            <i class="ri-shield-check-line text-emerald-600"></i>
            <span>End-to-End 256-Bit SSL Encrypted Console</span>
        </p>
    </div>

</div>