<div class="space-y-6">

    <!-- Toast Notification Component -->
    <x-admin.toast />

    <!-- Page Header -->
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <div class="flex items-center gap-2">
                <h1 class="text-xl font-bold tracking-tight text-slate-900 sm:text-2xl">Contact Inquiries</h1>
                @php
                    $unreadCount = \App\Models\Contact::where('is_read', false)->count();
                @endphp
                @if ($unreadCount > 0)
                    <span class="rounded-full bg-red-600 px-2.5 py-0.5 text-xs font-bold text-white shadow-xs">
                        {{ $unreadCount }} Unread
                    </span>
                @endif
            </div>
            <p class="text-xs text-slate-500 mt-0.5">Manage and review contact form submissions and SLA proposal requests from client leads.</p>
        </div>
    </div>

    <!-- Filter & Search Toolbar -->
    <div class="flex flex-col gap-3 rounded-2xl border border-slate-200/80 bg-white p-4 shadow-xs sm:flex-row sm:items-center sm:justify-between">
        
        <!-- Search Input -->
        <div class="relative flex-1">
            <i class="ri-search-line absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400 text-sm"></i>
            <input
                type="text"
                wire:model.live.debounce.300ms="search"
                placeholder="Search by name, email, phone, property type, or message..."
                class="w-full rounded-xl border border-slate-200 pl-9 pr-4 py-2 text-xs text-slate-800 placeholder:text-slate-400 focus:border-slate-400 focus:outline-none focus:ring-1 focus:ring-slate-400"
            />
        </div>

        <!-- Filter Status Buttons -->
        <div class="flex items-center gap-1 border-t border-slate-100 pt-3 sm:border-t-0 sm:pt-0">
            <button
                type="button"
                wire:click="$set('filterStatus', 'all')"
                class="rounded-lg px-3 py-1.5 text-xs font-semibold transition {{ $filterStatus === 'all' ? 'bg-slate-900 text-white' : 'text-slate-600 hover:bg-slate-100' }}"
            >
                All
            </button>
            <button
                type="button"
                wire:click="$set('filterStatus', 'unread')"
                class="rounded-lg px-3 py-1.5 text-xs font-semibold transition {{ $filterStatus === 'unread' ? 'bg-slate-900 text-white' : 'text-slate-600 hover:bg-slate-100' }}"
            >
                Unread
            </button>
            <button
                type="button"
                wire:click="$set('filterStatus', 'read')"
                class="rounded-lg px-3 py-1.5 text-xs font-semibold transition {{ $filterStatus === 'read' ? 'bg-slate-900 text-white' : 'text-slate-600 hover:bg-slate-100' }}"
            >
                Read
            </button>
        </div>
    </div>

    <!-- Data Table Card -->
    <div class="rounded-2xl border border-slate-200/80 bg-white shadow-xs overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs text-slate-600">
                <thead class="bg-slate-50 border-b border-slate-200/80 text-[11px] font-bold uppercase tracking-wider text-slate-500">
                    <tr>
                        <th scope="col" class="px-5 py-3.5">Contact Name</th>
                        <th scope="col" class="px-5 py-3.5">Email &amp; Phone</th>
                        <th scope="col" class="px-5 py-3.5">Property Type</th>
                        <th scope="col" class="px-5 py-3.5">Message Snippet</th>
                        <th scope="col" class="px-5 py-3.5">Submitted At</th>
                        <th scope="col" class="px-5 py-3.5">Status</th>
                        <th scope="col" class="px-5 py-3.5 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse ($this->contacts as $contact)
                        <tr class="hover:bg-slate-50/70 transition {{ ! $contact->is_read ? 'bg-red-50/20 font-semibold' : '' }}">
                            
                            <!-- Name -->
                            <td class="px-5 py-4 whitespace-nowrap">
                                <div class="flex items-center gap-3">
                                    <div class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full {{ ! $contact->is_read ? 'bg-red-600 text-white font-bold' : 'bg-slate-100 text-slate-600' }}">
                                        {{ strtoupper(substr($contact->name, 0, 1)) }}
                                    </div>
                                    <span class="font-bold text-slate-900">{{ $contact->name }}</span>
                                </div>
                            </td>

                            <!-- Email & Phone -->
                            <td class="px-5 py-4 whitespace-nowrap">
                                <p class="font-medium text-slate-800">{{ $contact->email ?: 'N/A' }}</p>
                                <p class="text-[11px] text-slate-400 mt-0.5">{{ $contact->phone ?: 'N/A' }}</p>
                            </td>

                            <!-- Property Type -->
                            <td class="px-5 py-4 whitespace-nowrap">
                                <span class="inline-flex items-center rounded-full bg-slate-100 px-2.5 py-0.5 text-[11px] font-medium text-slate-700 border border-slate-200">
                                    {{ $contact->property_type ?: 'General Inquiry' }}
                                </span>
                            </td>

                            <!-- Message Snippet -->
                            <td class="px-5 py-4 max-w-xs truncate text-slate-600">
                                {{ Str::limit($contact->message, 55) }}
                            </td>

                            <!-- Submitted At -->
                            <td class="px-5 py-4 whitespace-nowrap text-slate-400 text-[11px]">
                                {{ $contact->created_at->format('M d, Y · g:i A') }}
                            </td>

                            <!-- Status Badge -->
                            <td class="px-5 py-4 whitespace-nowrap">
                                @if ($contact->is_read)
                                    <span class="inline-flex items-center gap-1 rounded-full bg-slate-100 px-2.5 py-0.5 text-[10px] font-semibold text-slate-600 border border-slate-200">
                                        <i class="ri-check-line"></i> Read
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1 rounded-full bg-red-100 px-2.5 py-0.5 text-[10px] font-bold text-red-700 border border-red-200">
                                        <span class="h-1.5 w-1.5 rounded-full bg-red-600 animate-pulse"></span> Unread
                                    </span>
                                @endif
                            </td>

                            <!-- Actions -->
                            <td class="px-5 py-4 whitespace-nowrap text-right">
                                <div class="flex items-center justify-end gap-1.5">
                                    <button
                                        type="button"
                                        wire:click="viewDetails({{ $contact->id }})"
                                        title="View Full Details"
                                        class="rounded-lg p-1.5 text-slate-500 hover:bg-slate-100 hover:text-slate-900 transition cursor-pointer"
                                    >
                                        <i class="ri-eye-line text-base"></i>
                                    </button>

                                    <button
                                        type="button"
                                        wire:click="toggleRead({{ $contact->id }})"
                                        title="{{ $contact->is_read ? 'Mark as Unread' : 'Mark as Read' }}"
                                        class="rounded-lg p-1.5 text-slate-500 hover:bg-slate-100 hover:text-slate-900 transition cursor-pointer"
                                    >
                                        <i class="{{ $contact->is_read ? 'ri-mail-line' : 'ri-mail-open-line' }} text-base"></i>
                                    </button>

                                    <button
                                        type="button"
                                        wire:click="confirmDelete({{ $contact->id }})"
                                        title="Delete Inquiry"
                                        class="rounded-lg p-1.5 text-slate-400 hover:bg-rose-50 hover:text-rose-600 transition cursor-pointer"
                                    >
                                        <i class="ri-delete-bin-line text-base"></i>
                                    </button>
                                </div>
                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="p-12 text-center text-slate-400">
                                <div class="mx-auto flex h-12 w-12 items-center justify-center rounded-full bg-slate-100 text-slate-400 mb-3">
                                    <i class="ri-inbox-archive-line text-xl"></i>
                                </div>
                                <p class="text-sm font-semibold text-slate-700">No contact inquiries found</p>
                                <p class="text-xs text-slate-400 mt-1">Submissions from the public Contact page will appear here.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if ($this->contacts->hasPages())
            <div class="border-t border-slate-100 p-4 bg-slate-50/50">
                {{ $this->contacts->links() }}
            </div>
        @endif
    </div>

    <!-- View Details Modal -->
    @if ($showViewModal && $selectedContact)
        <div class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-900/50 backdrop-blur-xs">
            <div class="w-full max-w-lg rounded-2xl bg-white p-6 shadow-2xl space-y-5 border border-slate-200">
                <div class="flex items-center justify-between border-b border-slate-100 pb-3">
                    <div>
                        <span class="text-[10px] font-bold uppercase tracking-wider text-red-600">Contact Request Details</span>
                        <h3 class="text-lg font-bold text-slate-900 mt-0.5">{{ $selectedContact->name }}</h3>
                    </div>
                    <button type="button" wire:click="closeViewModal" class="rounded-lg p-1 text-slate-400 hover:bg-slate-100 hover:text-slate-700">
                        <i class="ri-close-line text-xl"></i>
                    </button>
                </div>

                <div class="grid grid-cols-2 gap-4 text-xs">
                    <div>
                        <p class="text-slate-400 font-medium">Work Email</p>
                        <p class="font-bold text-slate-900 mt-0.5">
                            @if($selectedContact->email)
                                <a href="mailto:{{ $selectedContact->email }}" class="text-red-600 hover:underline">{{ $selectedContact->email }}</a>
                            @else
                                N/A
                            @endif
                        </p>
                    </div>

                    <div>
                        <p class="text-slate-400 font-medium">Phone Number</p>
                        <p class="font-bold text-slate-900 mt-0.5">
                            @if($selectedContact->phone)
                                <a href="tel:{{ $selectedContact->phone }}" class="text-red-600 hover:underline">{{ $selectedContact->phone }}</a>
                            @else
                                N/A
                            @endif
                        </p>
                    </div>

                    <div>
                        <p class="text-slate-400 font-medium">Property Type</p>
                        <p class="font-bold text-slate-900 mt-0.5">{{ $selectedContact->property_type ?: 'General Inquiry' }}</p>
                    </div>

                    <div>
                        <p class="text-slate-400 font-medium">Submitted On</p>
                        <p class="font-bold text-slate-900 mt-0.5">{{ $selectedContact->created_at->format('M d, Y · g:i A') }}</p>
                    </div>
                </div>

                <div class="border-t border-slate-100 pt-4">
                    <p class="text-xs font-semibold text-slate-700 mb-1.5">Requirements &amp; Scope Message:</p>
                    <div class="rounded-xl border border-slate-200 bg-slate-50 p-4 text-xs text-slate-700 leading-relaxed whitespace-pre-line">
                        {{ $selectedContact->message }}
                    </div>
                </div>

                <div class="flex justify-end pt-2">
                    <button
                        type="button"
                        wire:click="closeViewModal"
                        class="rounded-xl bg-slate-900 px-5 py-2 text-xs font-bold text-white hover:bg-slate-800 transition cursor-pointer"
                    >
                        Close
                    </button>
                </div>
            </div>
        </div>
    @endif

    <!-- Delete Confirmation Modal -->
    @if ($showDeleteModal)
        <div class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-900/50 backdrop-blur-xs">
            <div class="w-full max-w-sm rounded-2xl bg-white p-6 shadow-2xl text-center space-y-4 border border-slate-200">
                <div class="mx-auto flex h-12 w-12 items-center justify-center rounded-full bg-rose-100 text-rose-600">
                    <i class="ri-error-warning-line text-2xl"></i>
                </div>
                <div>
                    <h3 class="text-base font-bold text-slate-900">Delete Contact Inquiry?</h3>
                    <p class="text-xs text-slate-500 mt-1">This action cannot be undone and will remove the inquiry record permanently.</p>
                </div>
                <div class="flex items-center justify-center gap-3 pt-2">
                    <button
                        type="button"
                        wire:click="cancelDelete"
                        class="rounded-xl border border-slate-200 px-4 py-2 text-xs font-semibold text-slate-700 hover:bg-slate-50"
                    >
                        Cancel
                    </button>
                    <button
                        type="button"
                        wire:click="delete"
                        class="rounded-xl bg-rose-600 px-4 py-2 text-xs font-semibold text-white hover:bg-rose-700"
                    >
                        Yes, Delete
                    </button>
                </div>
            </div>
        </div>
    @endif

</div>
