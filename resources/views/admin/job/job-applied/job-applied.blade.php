<div class="space-y-6">

    <!-- Page Header & Stats -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 border-b border-slate-200/80 pb-5">
        <div class="space-y-1">
            <h1 class="text-2xl font-semibold tracking-tight text-slate-950">
                Job Applications &amp; Resumes
            </h1>
            <p class="text-xs text-slate-500">
                Review candidate submissions, download uploaded resumes, and track applicant hiring stages.
            </p>
        </div>

        <div class="flex items-center gap-2">
            <a
                href="{{ route('admin.jobs.index') }}"
                wire:navigate
                class="inline-flex h-9 items-center justify-center rounded-md border border-slate-200 bg-white px-3.5 py-2 text-xs font-medium text-slate-700 shadow-xs hover:bg-slate-50 transition cursor-pointer gap-1.5"
            >
                <i class="ri-briefcase-line text-sm text-slate-500"></i>
                <span>Manage Job Openings</span>
            </a>
        </div>
    </div>

    <!-- Quick Stats Cards -->
    <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 sm:gap-4">
        <div class="rounded-xl border border-slate-200/80 bg-white p-4 shadow-2xs">
            <p class="text-[11px] font-semibold text-slate-500 uppercase tracking-wider">Total Received</p>
            <p class="text-xl sm:text-2xl font-bold text-slate-900 mt-1">{{ $this->stats['total'] }}</p>
        </div>
        <div class="rounded-xl border border-amber-200/80 bg-amber-50/50 p-4 shadow-2xs">
            <p class="text-[11px] font-semibold text-amber-800 uppercase tracking-wider">Pending Review</p>
            <p class="text-xl sm:text-2xl font-bold text-amber-900 mt-1">{{ $this->stats['pending'] }}</p>
        </div>
        <div class="rounded-xl border border-blue-200/80 bg-blue-50/50 p-4 shadow-2xs">
            <p class="text-[11px] font-semibold text-blue-800 uppercase tracking-wider">Reviewed</p>
            <p class="text-xl sm:text-2xl font-bold text-blue-900 mt-1">{{ $this->stats['reviewed'] }}</p>
        </div>
        <div class="rounded-xl border border-emerald-200/80 bg-emerald-50/50 p-4 shadow-2xs">
            <p class="text-[11px] font-semibold text-emerald-800 uppercase tracking-wider">Shortlisted</p>
            <p class="text-xl sm:text-2xl font-bold text-emerald-900 mt-1">{{ $this->stats['shortlisted'] }}</p>
        </div>
    </div>

    <!-- Filters Bar -->
    <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3">
        <div class="relative flex-1">
            <i class="ri-search-line absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-xs"></i>
            <input
                type="text"
                wire:model.live.debounce.300ms="search"
                placeholder="Search candidates by name, phone, email, experience..."
                class="flex h-9 w-full rounded-md border border-slate-200 bg-white pl-9 pr-3 py-1 text-xs shadow-xs placeholder:text-slate-400 focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-slate-950"
            />
        </div>

        <div class="flex items-center gap-2">
            <select
                wire:model.live="filterJobId"
                class="flex h-9 rounded-md border border-slate-200 bg-white px-3 py-1 text-xs shadow-xs text-slate-700 focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-slate-950 cursor-pointer max-w-xs"
            >
                <option value="all">All Positions</option>
                @foreach ($this->jobsList as $j)
                    <option value="{{ $j->id }}">{{ $j->title }}</option>
                @endforeach
            </select>

            <select
                wire:model.live="filterStatus"
                class="flex h-9 rounded-md border border-slate-200 bg-white px-3 py-1 text-xs shadow-xs text-slate-700 focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-slate-950 cursor-pointer"
            >
                <option value="all">All Statuses</option>
                <option value="pending">Pending</option>
                <option value="reviewed">Reviewed</option>
                <option value="shortlisted">Shortlisted</option>
                <option value="rejected">Rejected</option>
            </select>
        </div>
    </div>

    <!-- Applications Table -->
    <div class="rounded-lg border border-slate-200 bg-white shadow-xs overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead class="border-b border-slate-200 bg-slate-50/75 text-[11px] font-semibold text-slate-600 uppercase tracking-wider">
                    <tr>
                        <th class="px-4 py-3">Applicant Name</th>
                        <th class="px-4 py-3">Position Applied</th>
                        <th class="px-4 py-3">Contact</th>
                        <th class="px-4 py-3">Experience</th>
                        <th class="px-4 py-3">Resume</th>
                        <th class="px-4 py-3">Stage / Status</th>
                        <th class="px-4 py-3 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse ($this->applications as $app)
                        <tr class="hover:bg-slate-50/50 transition">
                            {{-- Applicant Name --}}
                            <td class="px-4 py-3">
                                <div class="font-bold text-slate-900">{{ $app->name }}</div>
                                <div class="text-[10px] text-slate-400">
                                    {{ $app->created_at->format('M d, Y • h:i A') }}
                                </div>
                            </td>

                            {{-- Position Applied --}}
                            <td class="px-4 py-3">
                                <div class="font-semibold text-slate-800">
                                    {{ $app->job?->title ?? 'General Roster' }}
                                </div>
                                <div class="text-[10px] text-slate-400">
                                    {{ $app->job?->department ?? 'Operations' }}
                                </div>
                            </td>

                            {{-- Contact --}}
                            <td class="px-4 py-3 space-y-0.5">
                                <div class="flex items-center gap-1 text-slate-700 font-medium">
                                    <i class="ri-phone-line text-slate-400 text-[11px]"></i>
                                    <a href="tel:{{ $app->phone }}" class="hover:text-red-600 transition">{{ $app->phone }}</a>
                                </div>
                                <div class="flex items-center gap-1 text-[11px] text-slate-500">
                                    <i class="ri-mail-line text-slate-400 text-[11px]"></i>
                                    <a href="mailto:{{ $app->email }}" class="hover:text-red-600 transition truncate max-w-xs">{{ $app->email }}</a>
                                </div>
                            </td>

                            {{-- Experience --}}
                            <td class="px-4 py-3">
                                <span class="inline-flex items-center gap-1 rounded bg-slate-100 px-2 py-0.5 text-[11px] font-medium text-slate-700">
                                    {{ $app->experince ?? 'N/A' }}
                                </span>
                            </td>

                            {{-- Resume Link --}}
                            <td class="px-4 py-3">
                                @if ($app->resume)
                                    <a
                                        href="{{ asset('storage/' . $app->resume) }}"
                                        target="_blank"
                                        class="inline-flex items-center gap-1 rounded-md bg-red-50 px-2.5 py-1 text-[11px] font-bold text-red-600 hover:bg-red-100 transition shadow-2xs"
                                        title="View uploaded resume"
                                    >
                                        <i class="ri-file-pdf-line text-xs"></i>
                                        <span>View Resume</span>
                                        <i class="ri-external-link-line text-[10px]"></i>
                                    </a>
                                @else
                                    <span class="text-[11px] text-slate-400 italic">No file attached</span>
                                @endif
                            </td>

                            {{-- Status Stage --}}
                            <td class="px-4 py-3">
                                <select
                                    wire:change="updateStatus({{ $app->id }}, $event.target.value)"
                                    class="rounded-md border border-slate-200 bg-white px-2 py-1 text-[11px] font-bold focus:outline-none cursor-pointer {{ $app->status === 'shortlisted' ? 'text-emerald-700 bg-emerald-50/60 border-emerald-200' : ($app->status === 'reviewed' ? 'text-blue-700 bg-blue-50/60 border-blue-200' : ($app->status === 'rejected' ? 'text-rose-700 bg-rose-50/60 border-rose-200' : 'text-amber-700 bg-amber-50/60 border-amber-200')) }}"
                                >
                                    <option value="pending" {{ $app->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="reviewed" {{ $app->status === 'reviewed' ? 'selected' : '' }}>Reviewed</option>
                                    <option value="shortlisted" {{ $app->status === 'shortlisted' ? 'selected' : '' }}>Shortlisted</option>
                                    <option value="rejected" {{ $app->status === 'rejected' ? 'selected' : '' }}>Rejected</option>
                                </select>
                            </td>

                            {{-- Actions --}}
                            <td class="px-4 py-3 text-right">
                                <div class="flex items-center justify-end gap-1">
                                    <button
                                        type="button"
                                        wire:click="viewDetails({{ $app->id }})"
                                        title="View full profile"
                                        class="p-1 rounded-md text-slate-500 hover:text-slate-900 hover:bg-slate-100 transition cursor-pointer"
                                    >
                                        <i class="ri-eye-line text-sm"></i>
                                    </button>
                                    <button
                                        type="button"
                                        wire:click="confirmDelete({{ $app->id }})"
                                        title="Delete application"
                                        class="p-1 rounded-md text-slate-400 hover:text-rose-600 hover:bg-rose-50 transition cursor-pointer"
                                    >
                                        <i class="ri-delete-bin-line text-sm"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-4 py-12 text-center text-slate-400">
                                <i class="ri-file-user-line text-3xl mb-1 text-slate-300 block"></i>
                                <span>No candidate applications found.</span>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if ($this->applications->hasPages())
            <div class="p-4 border-t border-slate-100">
                {{ $this->applications->links() }}
            </div>
        @endif
    </div>

    {{-- Candidate Profile Modal --}}
    @if ($showDetailsModal && $selectedApplication)
        <div class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-950/40 backdrop-blur-xs">
            <div class="w-full max-w-lg rounded-2xl bg-white p-6 shadow-xl space-y-5 border border-slate-200">
                
                {{-- Modal Header --}}
                <div class="flex items-start justify-between border-b border-slate-100 pb-4">
                    <div class="space-y-1">
                        <span class="inline-flex items-center gap-1 rounded-full bg-[#12233F]/10 px-2.5 py-0.5 text-[10px] font-bold text-[#12233F]">
                            Applicant Profile
                        </span>
                        <h3 class="text-lg font-bold text-slate-900">{{ $selectedApplication->name }}</h3>
                        <p class="text-xs text-slate-500">
                            Applied for <strong class="text-slate-800">{{ $selectedApplication->job?->title ?? 'General Roster' }}</strong> on {{ $selectedApplication->created_at->format('M d, Y') }}
                        </p>
                    </div>

                    <button
                        type="button"
                        wire:click="closeDetails"
                        class="p-1 text-slate-400 hover:text-slate-700 transition cursor-pointer"
                    >
                        <i class="ri-close-line text-xl"></i>
                    </button>
                </div>

                {{-- Contact & Experience Grid --}}
                <div class="grid grid-cols-2 gap-3 text-xs bg-slate-50 p-4 rounded-xl border border-slate-100">
                    <div>
                        <span class="text-[10px] uppercase font-bold text-slate-400 block">Phone</span>
                        <a href="tel:{{ $selectedApplication->phone }}" class="font-bold text-slate-800 hover:text-red-600 transition">{{ $selectedApplication->phone }}</a>
                    </div>
                    <div>
                        <span class="text-[10px] uppercase font-bold text-slate-400 block">Email</span>
                        <a href="mailto:{{ $selectedApplication->email }}" class="font-bold text-slate-800 hover:text-red-600 transition truncate block">{{ $selectedApplication->email }}</a>
                    </div>
                    <div>
                        <span class="text-[10px] uppercase font-bold text-slate-400 block">Experience</span>
                        <span class="font-semibold text-slate-800">{{ $selectedApplication->experince ?? 'N/A' }}</span>
                    </div>
                    <div>
                        <span class="text-[10px] uppercase font-bold text-slate-400 block">Current Status</span>
                        <span class="font-bold capitalize {{ $selectedApplication->status === 'shortlisted' ? 'text-emerald-600' : 'text-slate-800' }}">{{ $selectedApplication->status }}</span>
                    </div>
                </div>

                {{-- Resume Attachment --}}
                @if ($selectedApplication->resume)
                    <div class="flex items-center justify-between p-3.5 rounded-xl border border-red-200 bg-red-50/50">
                        <div class="flex items-center gap-2.5">
                            <span class="flex h-8 w-8 items-center justify-center rounded-lg bg-red-600 text-white">
                                <i class="ri-file-pdf-line text-sm"></i>
                            </span>
                            <div>
                                <p class="text-xs font-bold text-slate-900">Uploaded Resume / Bio-data</p>
                                <p class="text-[10px] text-slate-500">Stored on public disk</p>
                            </div>
                        </div>

                        <a
                            href="{{ asset('storage/' . $selectedApplication->resume) }}"
                            target="_blank"
                            class="inline-flex items-center gap-1.5 rounded-lg bg-red-600 hover:bg-red-500 text-white px-3 py-1.5 text-xs font-bold transition shadow-xs"
                        >
                            <span>Open Resume</span>
                            <i class="ri-external-link-line text-xs"></i>
                        </a>
                    </div>
                @endif

                {{-- Address if provided --}}
                @if ($selectedApplication->address)
                    <div class="space-y-1">
                        <p class="text-[10px] uppercase font-bold text-slate-400">Address / Location</p>
                        <p class="text-xs text-slate-700 bg-slate-50 p-2.5 rounded-lg border border-slate-100">{{ $selectedApplication->address }}</p>
                    </div>
                @endif

                {{-- Message / Prior Experience --}}
                @if ($selectedApplication->message)
                    <div class="space-y-1">
                        <p class="text-[10px] uppercase font-bold text-slate-400">Candidate Notes / Experience</p>
                        <p class="text-xs text-slate-700 bg-slate-50 p-3 rounded-lg border border-slate-100 leading-relaxed whitespace-pre-line">{{ $selectedApplication->message }}</p>
                    </div>
                @endif

                {{-- Stage update actions --}}
                <div class="flex flex-wrap items-center justify-between gap-2 pt-3 border-t border-slate-100">
                    <div class="flex items-center gap-1.5">
                        <span class="text-xs text-slate-500 font-medium">Stage:</span>
                        <button
                            type="button"
                            wire:click="updateStatus({{ $selectedApplication->id }}, 'pending')"
                            class="px-2 py-1 text-[11px] font-bold rounded {{ $selectedApplication->status === 'pending' ? 'bg-amber-100 text-amber-900 font-extrabold' : 'bg-slate-100 text-slate-600 hover:bg-slate-200' }}"
                        >
                            Pending
                        </button>
                        <button
                            type="button"
                            wire:click="updateStatus({{ $selectedApplication->id }}, 'reviewed')"
                            class="px-2 py-1 text-[11px] font-bold rounded {{ $selectedApplication->status === 'reviewed' ? 'bg-blue-100 text-blue-900 font-extrabold' : 'bg-slate-100 text-slate-600 hover:bg-slate-200' }}"
                        >
                            Reviewed
                        </button>
                        <button
                            type="button"
                            wire:click="updateStatus({{ $selectedApplication->id }}, 'shortlisted')"
                            class="px-2 py-1 text-[11px] font-bold rounded {{ $selectedApplication->status === 'shortlisted' ? 'bg-emerald-100 text-emerald-900 font-extrabold' : 'bg-slate-100 text-slate-600 hover:bg-slate-200' }}"
                        >
                            Shortlist
                        </button>
                    </div>

                    <button
                        type="button"
                        wire:click="closeDetails"
                        class="inline-flex h-8 items-center justify-center rounded-md border border-slate-200 bg-white px-3 text-xs font-medium text-slate-700 hover:bg-slate-50 transition cursor-pointer"
                    >
                        Close
                    </button>
                </div>

            </div>
        </div>
    @endif

    {{-- Delete Confirmation Modal --}}
    @if ($showDeleteModal)
        <div class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-950/40 backdrop-blur-xs">
            <div class="w-full max-w-sm rounded-xl bg-white p-6 shadow-xl space-y-4 border border-slate-200">
                <div class="flex items-center gap-3 text-rose-600">
                    <span class="flex h-10 w-10 items-center justify-center rounded-full bg-rose-50 border border-rose-100">
                        <i class="ri-alert-line text-lg"></i>
                    </span>
                    <div>
                        <h4 class="text-sm font-bold text-slate-900">Delete Application</h4>
                        <p class="text-xs text-slate-500">This action cannot be undone.</p>
                    </div>
                </div>

                <p class="text-xs text-slate-600 leading-relaxed">
                    Are you sure you want to delete this candidate application?
                </p>

                <div class="flex items-center justify-end gap-2 pt-2 border-t border-slate-100">
                    <button
                        type="button"
                        wire:click="cancelDelete"
                        class="inline-flex h-8 items-center justify-center rounded-md border border-slate-200 bg-white px-3 text-xs font-medium text-slate-700 hover:bg-slate-50 transition cursor-pointer"
                    >
                        Cancel
                    </button>
                    <button
                        type="button"
                        wire:click="delete"
                        class="inline-flex h-8 items-center justify-center rounded-md bg-rose-600 px-3 text-xs font-medium text-white hover:bg-rose-700 transition cursor-pointer"
                    >
                        Yes, Delete
                    </button>
                </div>
            </div>
        </div>
    @endif

</div>