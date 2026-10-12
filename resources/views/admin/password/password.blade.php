<div class="space-y-6">

    <!-- Page Header & Breadcrumbs -->
    <div class="flex flex-col gap-1 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <div class="flex items-center gap-2 text-xs text-slate-400 mb-1">
                <a href="{{ route('admin.dashboard') }}" wire:navigate class="hover:text-slate-600 transition">Dashboard</a>
                <i class="ri-arrow-right-s-line text-slate-300"></i>
                <span class="text-slate-600 font-medium">Security</span>
                <i class="ri-arrow-right-s-line text-slate-300"></i>
                <span class="text-slate-900 font-semibold">Change Password</span>
            </div>
            <h1 class="text-xl font-bold tracking-tight text-slate-900 sm:text-2xl flex items-center gap-2">
                <i class="ri-shield-keyhole-line text-red-600"></i>
                <span>Change Administrator Password</span>
            </h1>
            <p class="text-xs text-slate-500 mt-0.5">
                Update your login credentials to protect access to the Facility Operations Command Center.
            </p>
        </div>
    </div>

    <!-- Success Message Banner -->
    @if ($saved)
        <div 
            x-data="{ show: true }" 
            x-show="show" 
            x-init="setTimeout(() => show = false, 5000)" 
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 -translate-y-2"
            x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 translate-y-0"
            x-transition:leave-end="opacity-0 -translate-y-2"
            class="rounded-2xl border border-emerald-200 bg-emerald-50/90 p-4 text-xs text-emerald-800 flex items-center justify-between shadow-2xs"
        >
            <div class="flex items-center gap-3">
                <div class="flex h-8 w-8 shrink-0 items-center justify-center rounded-xl bg-emerald-600 text-white">
                    <i class="ri-checkbox-circle-fill text-lg"></i>
                </div>
                <div>
                    <p class="font-bold text-emerald-900">Password Updated Successfully</p>
                    <p class="text-emerald-700 mt-0.5">Your administrator account password has been updated. Use your new password for future sign-ins.</p>
                </div>
            </div>
            <button 
                type="button" 
                @click="show = false" 
                class="rounded-lg p-1 text-emerald-600 hover:bg-emerald-100 transition cursor-pointer"
                aria-label="Dismiss alert"
            >
                <i class="ri-close-line text-lg"></i>
            </button>
        </div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        <!-- Left / Main: Password Form Card -->
        <div class="lg:col-span-2 space-y-6">
            <div class="rounded-2xl border border-slate-200/80 bg-white shadow-xs overflow-hidden">

                <!-- Admin Account Header Strip -->
                <div class="p-6 border-b border-slate-100 bg-slate-50/50 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                    <div class="flex items-center gap-3.5">
                        <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-slate-900 text-white font-bold text-base shadow-xs">
                            {{ substr(auth()->user()?->name ?? 'A', 0, 1) }}
                        </div>
                        <div class="min-w-0">
                            <h2 class="text-sm font-bold text-slate-900 truncate">
                                {{ auth()->user()?->name ?? 'Facility Administrator' }}
                            </h2>
                            <p class="text-xs text-slate-500 truncate flex items-center gap-1.5 mt-0.5">
                                <i class="ri-mail-line text-slate-400"></i>
                                <span>{{ auth()->user()?->email ?? 'admin@facilitypro.com' }}</span>
                            </p>
                        </div>
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="inline-flex items-center gap-1 rounded-full bg-emerald-50 px-2.5 py-1 text-[11px] font-semibold text-emerald-700 border border-emerald-200">
                            <span class="h-1.5 w-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                            Active Session
                        </span>
                        <span class="rounded-full bg-slate-100 px-2.5 py-1 text-[11px] font-semibold text-slate-600 border border-slate-200">
                            Super Admin
                        </span>
                    </div>
                </div>

                <!-- Form Section -->
                <form wire:submit="updatePassword" class="p-6 space-y-5">
                    
                    <!-- Current Password -->
                    <div x-data="{ showCurrent: false }">
                        <div class="flex items-center justify-between mb-1.5">
                            <label for="current_password" class="block text-xs font-semibold text-slate-700">
                                Current Password <span class="text-red-500">*</span>
                            </label>
                        </div>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                                <i class="ri-lock-line text-sm"></i>
                            </div>
                            <input
                                id="current_password"
                                :type="showCurrent ? 'text' : 'password'"
                                wire:model="current_password"
                                placeholder="Enter current password"
                                autocomplete="current-password"
                                class="w-full rounded-xl border border-slate-200 bg-white pl-10 pr-10 py-2.5 text-xs text-slate-800 placeholder:text-slate-400 focus:border-red-500 focus:outline-none focus:ring-1 focus:ring-red-500 transition"
                            />
                            <button
                                type="button"
                                @click="showCurrent = !showCurrent"
                                class="absolute inset-y-0 right-0 pr-3.5 flex items-center text-slate-400 hover:text-slate-600 transition cursor-pointer"
                                :aria-label="showCurrent ? 'Hide password' : 'Show password'"
                            >
                                <i :class="showCurrent ? 'ri-eye-off-line' : 'ri-eye-line'" class="text-sm"></i>
                            </button>
                        </div>
                        @error('current_password')
                            <p class="text-xs text-rose-600 font-medium mt-1.5 flex items-center gap-1">
                                <i class="ri-error-warning-line"></i>
                                <span>{{ $message }}</span>
                            </p>
                        @enderror
                    </div>

                    <div class="border-t border-slate-100 my-4"></div>

                    <!-- New Password -->
                    <div x-data="{ showNew: false }">
                        <div class="flex items-center justify-between mb-1.5">
                            <label for="new_password" class="block text-xs font-semibold text-slate-700">
                                New Password <span class="text-red-500">*</span>
                            </label>
                            <span class="text-[11px] text-slate-400">Min. 8 characters</span>
                        </div>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                                <i class="ri-key-line text-sm"></i>
                            </div>
                            <input
                                id="new_password"
                                :type="showNew ? 'text' : 'password'"
                                wire:model="new_password"
                                placeholder="Create new strong password"
                                autocomplete="new-password"
                                class="w-full rounded-xl border border-slate-200 bg-white pl-10 pr-10 py-2.5 text-xs text-slate-800 placeholder:text-slate-400 focus:border-red-500 focus:outline-none focus:ring-1 focus:ring-red-500 transition"
                            />
                            <button
                                type="button"
                                @click="showNew = !showNew"
                                class="absolute inset-y-0 right-0 pr-3.5 flex items-center text-slate-400 hover:text-slate-600 transition cursor-pointer"
                                :aria-label="showNew ? 'Hide password' : 'Show password'"
                            >
                                <i :class="showNew ? 'ri-eye-off-line' : 'ri-eye-line'" class="text-sm"></i>
                            </button>
                        </div>
                        @error('new_password')
                            <p class="text-xs text-rose-600 font-medium mt-1.5 flex items-center gap-1">
                                <i class="ri-error-warning-line"></i>
                                <span>{{ $message }}</span>
                            </p>
                        @enderror
                    </div>

                    <!-- Confirm New Password -->
                    <div x-data="{ showConfirm: false }">
                        <div class="flex items-center justify-between mb-1.5">
                            <label for="new_password_confirmation" class="block text-xs font-semibold text-slate-700">
                                Confirm New Password <span class="text-red-500">*</span>
                            </label>
                        </div>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                                <i class="ri-check-line text-sm"></i>
                            </div>
                            <input
                                id="new_password_confirmation"
                                :type="showConfirm ? 'text' : 'password'"
                                wire:model="new_password_confirmation"
                                placeholder="Re-enter new password"
                                autocomplete="new-password"
                                class="w-full rounded-xl border border-slate-200 bg-white pl-10 pr-10 py-2.5 text-xs text-slate-800 placeholder:text-slate-400 focus:border-red-500 focus:outline-none focus:ring-1 focus:ring-red-500 transition"
                            />
                            <button
                                type="button"
                                @click="showConfirm = !showConfirm"
                                class="absolute inset-y-0 right-0 pr-3.5 flex items-center text-slate-400 hover:text-slate-600 transition cursor-pointer"
                                :aria-label="showConfirm ? 'Hide password' : 'Show password'"
                            >
                                <i :class="showConfirm ? 'ri-eye-off-line' : 'ri-eye-line'" class="text-sm"></i>
                            </button>
                        </div>
                        @error('new_password_confirmation')
                            <p class="text-xs text-rose-600 font-medium mt-1.5 flex items-center gap-1">
                                <i class="ri-error-warning-line"></i>
                                <span>{{ $message }}</span>
                            </p>
                        @enderror
                    </div>

                    <!-- Actions -->
                    <div class="flex items-center justify-between pt-4 border-t border-slate-100">
                        <a
                            href="{{ route('admin.dashboard') }}"
                            wire:navigate
                            class="inline-flex items-center gap-1.5 text-xs font-semibold text-slate-500 hover:text-slate-800 transition"
                        >
                            <i class="ri-arrow-left-line"></i>
                            <span>Back to Dashboard</span>
                        </a>

                        <button
                            type="submit"
                            wire:loading.attr="disabled"
                            class="inline-flex items-center gap-2 rounded-xl bg-slate-900 px-6 py-2.5 text-xs font-bold text-white shadow-xs transition hover:bg-red-600 disabled:opacity-50 disabled:cursor-not-allowed cursor-pointer"
                        >
                            <span wire:loading.remove wire:target="updatePassword" class="inline-flex items-center gap-2">
                                <i class="ri-lock-password-line text-sm"></i>
                                <span>Update Password</span>
                            </span>
                            <span wire:loading wire:target="updatePassword" class="inline-flex items-center gap-2">
                                <i class="ri-loader-4-line animate-spin text-sm"></i>
                                <span>Updating...</span>
                            </span>
                        </button>
                    </div>

                </form>

            </div>
        </div>

        <!-- Right: Security Guidelines & Quick Links -->
        <div class="space-y-6">

            <!-- Security Requirements Card -->
            <div class="rounded-2xl border border-slate-200/80 bg-white p-6 shadow-xs space-y-4">
                <div class="flex items-center gap-2.5 pb-3 border-b border-slate-100">
                    <div class="flex h-8 w-8 items-center justify-center rounded-xl bg-red-50 text-red-600">
                        <i class="ri-shield-check-line text-base"></i>
                    </div>
                    <div>
                        <h3 class="text-xs font-bold text-slate-900">Security Criteria</h3>
                        <p class="text-[10px] text-slate-400">Password guidelines</p>
                    </div>
                </div>

                <ul class="space-y-3 text-xs text-slate-600">
                    <li class="flex items-start gap-2">
                        <i class="ri-checkbox-circle-line text-emerald-500 mt-0.5 shrink-0 text-sm"></i>
                        <span>Minimum <strong>8 characters</strong> in total length.</span>
                    </li>
                    <li class="flex items-start gap-2">
                        <i class="ri-checkbox-circle-line text-emerald-500 mt-0.5 shrink-0 text-sm"></i>
                        <span>Must be <strong>different</strong> from your previous password.</span>
                    </li>
                    <li class="flex items-start gap-2">
                        <i class="ri-checkbox-circle-line text-emerald-500 mt-0.5 shrink-0 text-sm"></i>
                        <span>Include uppercase, lowercase letters, numbers, and symbols for max strength.</span>
                    </li>
                    <li class="flex items-start gap-2">
                        <i class="ri-checkbox-circle-line text-emerald-500 mt-0.5 shrink-0 text-sm"></i>
                        <span>Avoid using common names or predictable patterns.</span>
                    </li>
                </ul>
            </div>

            <!-- Quick Navigation Card -->
            <div class="rounded-2xl border border-slate-200/80 bg-white p-6 shadow-xs space-y-3">
                <h3 class="text-xs font-bold text-slate-900 flex items-center gap-2">
                    <i class="ri-settings-line text-slate-400"></i>
                    <span>Related Settings</span>
                </h3>

                <div class="space-y-2 pt-1">
                    <a
                        href="{{ route('admin.settings') }}"
                        wire:navigate
                        class="flex items-center justify-between p-2.5 rounded-xl border border-slate-100 hover:border-slate-300 hover:bg-slate-50 transition text-xs font-medium text-slate-700"
                    >
                        <div class="flex items-center gap-2">
                            <i class="ri-building-line text-slate-400"></i>
                            <span>Site Settings</span>
                        </div>
                        <i class="ri-arrow-right-s-line text-slate-400"></i>
                    </a>

                    <a
                        href="{{ route('admin.dashboard') }}"
                        wire:navigate
                        class="flex items-center justify-between p-2.5 rounded-xl border border-slate-100 hover:border-slate-300 hover:bg-slate-50 transition text-xs font-medium text-slate-700"
                    >
                        <div class="flex items-center gap-2">
                            <i class="ri-dashboard-line text-slate-400"></i>
                            <span>Operations Overview</span>
                        </div>
                        <i class="ri-arrow-right-s-line text-slate-400"></i>
                    </a>
                </div>
            </div>

        </div>

    </div>

</div>
