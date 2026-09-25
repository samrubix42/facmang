<div class="space-y-6">

    <!-- Page Header -->
    <div class="flex flex-col gap-1 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h1 class="text-xl font-bold tracking-tight text-slate-900 sm:text-2xl">Site Settings</h1>
            <p class="text-xs text-slate-500 mt-0.5">Manage global company contact info, address, social media links, and Google Maps embed.</p>
        </div>
    </div>

    <!-- Success Message Banner -->
    @if ($saved)
        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 4000)" class="rounded-2xl border border-emerald-200 bg-emerald-50/80 p-4 text-xs text-emerald-800 flex items-center justify-between">
            <div class="flex items-center gap-2.5">
                <i class="ri-checkbox-circle-fill text-emerald-600 text-lg"></i>
                <span class="font-semibold">Site settings saved successfully!</span>
            </div>
            <button type="button" @click="show = false" class="text-emerald-500 hover:text-emerald-700">
                <i class="ri-close-line text-base"></i>
            </button>
        </div>
    @endif

    <form wire:submit="save" class="space-y-6">
        
        <!-- Section 1: Company & Contact Information -->
        <div class="rounded-2xl border border-slate-200/80 bg-white p-6 shadow-xs space-y-5">
            <div class="border-b border-slate-100 pb-4">
                <h2 class="text-sm font-bold text-slate-900 flex items-center gap-2">
                    <i class="ri-building-line text-red-600"></i>
                    <span>Company &amp; Direct Contact</span>
                </h2>
                <p class="text-xs text-slate-400 mt-0.5">Global company credentials used across headers, footers, and contact pages.</p>
            </div>

            <div class="grid gap-5 sm:grid-cols-2">
                <!-- Company Name -->
                <div>
                    <label for="company_name" class="block text-xs font-semibold text-slate-700 mb-1.5">Company Name <span class="text-red-500">*</span></label>
                    <input
                        id="company_name"
                        type="text"
                        wire:model="company_name"
                        placeholder="FacilityPro Management Inc."
                        class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-xs text-slate-800 placeholder:text-slate-400 focus:border-red-500 focus:outline-none focus:ring-1 focus:ring-red-500"
                    />
                    @error('company_name') <span class="text-xs text-rose-600 font-medium mt-1 block">{{ $message }}</span> @enderror
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-xs font-semibold text-slate-700 mb-1.5">Email Address <span class="text-red-500">*</span></label>
                    <input
                        id="email"
                        type="email"
                        wire:model="email"
                        placeholder="ops@facilitypro.com"
                        class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-xs text-slate-800 placeholder:text-slate-400 focus:border-red-500 focus:outline-none focus:ring-1 focus:ring-red-500"
                    />
                    @error('email') <span class="text-xs text-rose-600 font-medium mt-1 block">{{ $message }}</span> @enderror
                </div>

                <!-- Phone -->
                <div>
                    <label for="phone" class="block text-xs font-semibold text-slate-700 mb-1.5">Phone Number <span class="text-red-500">*</span></label>
                    <input
                        id="phone"
                        type="text"
                        wire:model="phone"
                        placeholder="+1 (800) 492-8820"
                        class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-xs text-slate-800 placeholder:text-slate-400 focus:border-red-500 focus:outline-none focus:ring-1 focus:ring-red-500"
                    />
                    @error('phone') <span class="text-xs text-rose-600 font-medium mt-1 block">{{ $message }}</span> @enderror
                </div>

                <!-- WhatsApp -->
                <div>
                    <label for="whatsapp" class="block text-xs font-semibold text-slate-700 mb-1.5">WhatsApp Number</label>
                    <input
                        id="whatsapp"
                        type="text"
                        wire:model="whatsapp"
                        placeholder="+1 (800) 492-8820"
                        class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-xs text-slate-800 placeholder:text-slate-400 focus:border-red-500 focus:outline-none focus:ring-1 focus:ring-red-500"
                    />
                    @error('whatsapp') <span class="text-xs text-rose-600 font-medium mt-1 block">{{ $message }}</span> @enderror
                </div>
            </div>
        </div>

        <!-- Section 2: Address & Location -->
        <div class="rounded-2xl border border-slate-200/80 bg-white p-6 shadow-xs space-y-5">
            <div class="border-b border-slate-100 pb-4">
                <h2 class="text-sm font-bold text-slate-900 flex items-center gap-2">
                    <i class="ri-map-pin-line text-red-600"></i>
                    <span>Address &amp; Location Map</span>
                </h2>
                <p class="text-xs text-slate-400 mt-0.5">Physical headquarters address and Google Map iframe link.</p>
            </div>

            <div class="space-y-4">
                <!-- Address -->
                <div>
                    <label for="address" class="block text-xs font-semibold text-slate-700 mb-1.5">Full Physical Address</label>
                    <textarea
                        id="address"
                        wire:model="address"
                        rows="2"
                        placeholder="100 Enterprise Plaza, Suite 400, Financial District"
                        class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-xs text-slate-800 placeholder:text-slate-400 focus:border-red-500 focus:outline-none focus:ring-1 focus:ring-red-500"
                    ></textarea>
                    @error('address') <span class="text-xs text-rose-600 font-medium mt-1 block">{{ $message }}</span> @enderror
                </div>

                <!-- Google Map Link / Embed URL -->
                <div>
                    <label for="google_map_link" class="block text-xs font-semibold text-slate-700 mb-1.5">Google Map Embed URL or Share Link</label>
                    <input
                        id="google_map_link"
                        type="text"
                        wire:model="google_map_link"
                        placeholder="https://www.google.com/maps/embed?pb=..."
                        class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-xs text-slate-800 placeholder:text-slate-400 focus:border-red-500 focus:outline-none focus:ring-1 focus:ring-red-500"
                    />
                    @error('google_map_link') <span class="text-xs text-rose-600 font-medium mt-1 block">{{ $message }}</span> @enderror
                </div>
            </div>
        </div>

        <!-- Section 3: Social Links -->
        <div class="rounded-2xl border border-slate-200/80 bg-white p-6 shadow-xs space-y-5">
            <div class="border-b border-slate-100 pb-4">
                <h2 class="text-sm font-bold text-slate-900 flex items-center gap-2">
                    <i class="ri-share-line text-red-600"></i>
                    <span>Social Media Channels</span>
                </h2>
                <p class="text-xs text-slate-400 mt-0.5">Corporate social media profile URLs.</p>
            </div>

            <div class="grid gap-5 sm:grid-cols-2">
                <!-- Facebook -->
                <div>
                    <label for="facebook" class="block text-xs font-semibold text-slate-700 mb-1.5 flex items-center gap-1.5">
                        <i class="ri-facebook-fill text-blue-600"></i> Facebook URL
                    </label>
                    <input
                        id="facebook"
                        type="url"
                        wire:model="facebook"
                        placeholder="https://facebook.com/yourcompany"
                        class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-xs text-slate-800 placeholder:text-slate-400 focus:border-red-500 focus:outline-none focus:ring-1 focus:ring-red-500"
                    />
                    @error('facebook') <span class="text-xs text-rose-600 font-medium mt-1 block">{{ $message }}</span> @enderror
                </div>

                <!-- Twitter / X -->
                <div>
                    <label for="twitter" class="block text-xs font-semibold text-slate-700 mb-1.5 flex items-center gap-1.5">
                        <i class="ri-twitter-x-fill text-slate-900"></i> Twitter / X URL
                    </label>
                    <input
                        id="twitter"
                        type="url"
                        wire:model="twitter"
                        placeholder="https://twitter.com/yourcompany"
                        class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-xs text-slate-800 placeholder:text-slate-400 focus:border-red-500 focus:outline-none focus:ring-1 focus:ring-red-500"
                    />
                    @error('twitter') <span class="text-xs text-rose-600 font-medium mt-1 block">{{ $message }}</span> @enderror
                </div>

                <!-- Instagram -->
                <div>
                    <label for="instagram" class="block text-xs font-semibold text-slate-700 mb-1.5 flex items-center gap-1.5">
                        <i class="ri-instagram-fill text-pink-600"></i> Instagram URL
                    </label>
                    <input
                        id="instagram"
                        type="url"
                        wire:model="instagram"
                        placeholder="https://instagram.com/yourcompany"
                        class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-xs text-slate-800 placeholder:text-slate-400 focus:border-red-500 focus:outline-none focus:ring-1 focus:ring-red-500"
                    />
                    @error('instagram') <span class="text-xs text-rose-600 font-medium mt-1 block">{{ $message }}</span> @enderror
                </div>

                <!-- LinkedIn -->
                <div>
                    <label for="linkedin" class="block text-xs font-semibold text-slate-700 mb-1.5 flex items-center gap-1.5">
                        <i class="ri-linkedin-fill text-blue-700"></i> LinkedIn URL
                    </label>
                    <input
                        id="linkedin"
                        type="url"
                        wire:model="linkedin"
                        placeholder="https://linkedin.com/company/yourcompany"
                        class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-xs text-slate-800 placeholder:text-slate-400 focus:border-red-500 focus:outline-none focus:ring-1 focus:ring-red-500"
                    />
                    @error('linkedin') <span class="text-xs text-rose-600 font-medium mt-1 block">{{ $message }}</span> @enderror
                </div>

                <!-- YouTube -->
                <div>
                    <label for="youtube" class="block text-xs font-semibold text-slate-700 mb-1.5 flex items-center gap-1.5">
                        <i class="ri-youtube-fill text-red-600"></i> YouTube URL
                    </label>
                    <input
                        id="youtube"
                        type="url"
                        wire:model="youtube"
                        placeholder="https://youtube.com/@yourcompany"
                        class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-xs text-slate-800 placeholder:text-slate-400 focus:border-red-500 focus:outline-none focus:ring-1 focus:ring-red-500"
                    />
                    @error('youtube') <span class="text-xs text-rose-600 font-medium mt-1 block">{{ $message }}</span> @enderror
                </div>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="flex items-center justify-end gap-3 pt-2">
            <button
                type="submit"
                class="inline-flex items-center gap-2 rounded-xl bg-slate-900 px-6 py-2.5 text-xs font-bold text-white shadow-xs transition hover:bg-red-600 cursor-pointer"
            >
                <i class="ri-save-line text-sm"></i>
                <span>Save Site Settings</span>
            </button>
        </div>

    </form>

</div>