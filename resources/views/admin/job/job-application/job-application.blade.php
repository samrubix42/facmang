<div class="space-y-6">

    @if ($isCreating || $isEditing)
        {{-- FORM VIEW: Create or Edit Job Opening with TinyMCE --}}
        <div class="space-y-6 max-w-4xl mx-auto">
            
            <!-- Page Header -->
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 border-b border-slate-200/80 pb-5">
                <div class="space-y-1">
                    <div class="flex items-center gap-2">
                        <button
                            type="button"
                            wire:click="cancel"
                            class="text-xs text-slate-500 hover:text-slate-900 transition flex items-center gap-1 font-medium cursor-pointer"
                        >
                            <i class="ri-arrow-left-line"></i>
                            <span>Job Openings</span>
                        </button>
                    </div>
                    <h1 class="text-2xl font-semibold tracking-tight text-slate-950">
                        {{ $isEditing ? 'Edit Job Opening' : 'Create New Job Opening' }}
                    </h1>
                    <p class="text-xs text-slate-500">
                        Configure role specifications, compensation in Indian Rupees, and rich text job description.
                    </p>
                </div>

                <div class="flex items-center gap-2">
                    <button
                        type="button"
                        wire:click="cancel"
                        class="inline-flex h-9 items-center justify-center rounded-md border border-slate-200 bg-white px-4 py-2 text-xs font-medium text-slate-700 shadow-xs hover:bg-slate-100 transition-colors cursor-pointer"
                    >
                        Cancel
                    </button>
                    <button
                        type="button"
                        wire:click="save"
                        wire:loading.attr="disabled"
                        class="inline-flex h-9 items-center justify-center rounded-md bg-slate-900 px-4 py-2 text-xs font-medium text-slate-50 shadow-xs hover:bg-slate-900/90 transition-colors cursor-pointer gap-2 disabled:opacity-50"
                    >
                        <i class="ri-check-line text-sm" wire:loading.remove wire:target="save"></i>
                        <span wire:loading.remove wire:target="save">{{ $isEditing ? 'Update Job' : 'Publish Job' }}</span>
                        <span wire:loading wire:target="save">Saving...</span>
                    </button>
                </div>
            </div>

            <!-- Form Card -->
            <div class="rounded-lg border border-slate-200 bg-white p-6 shadow-xs">
                <form wire:submit.prevent="save" class="space-y-4">
                    
                    {{-- Title --}}
                    <div class="space-y-1.5">
                        <label for="job_title" class="text-xs font-medium leading-none text-slate-900">
                            Job Title <span class="text-rose-500">*</span>
                        </label>
                        <input
                            type="text"
                            id="job_title"
                            wire:model="title"
                            placeholder="e.g. Commercial Sweeping & Floor Care Specialist"
                            class="flex h-9 w-full rounded-md border border-slate-200 bg-transparent px-3 py-1 text-xs shadow-xs transition-colors placeholder:text-slate-400 focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-slate-950"
                        />
                        @error('title')
                            <p class="text-[11px] text-rose-500 font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Department & Type (2 Columns) --}}
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div class="space-y-1.5">
                            <label for="job_department" class="text-xs font-medium leading-none text-slate-900">
                                Department / Category <span class="text-rose-500">*</span>
                            </label>
                            <select
                                id="job_department"
                                wire:model="department"
                                class="flex h-9 w-full rounded-md border border-slate-200 bg-transparent px-3 py-1 text-xs shadow-xs transition-colors text-slate-800 focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-slate-950 cursor-pointer"
                            >
                                @foreach ($this->departmentsList as $dept)
                                    <option value="{{ $dept }}">{{ $dept }}</option>
                                @endforeach
                            </select>
                            @error('department')
                                <p class="text-[11px] text-rose-500 font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="space-y-1.5">
                            <label for="job_type" class="text-xs font-medium leading-none text-slate-900">
                                Employment Type <span class="text-rose-500">*</span>
                            </label>
                            <select
                                id="job_type"
                                wire:model="type"
                                class="flex h-9 w-full rounded-md border border-slate-200 bg-transparent px-3 py-1 text-xs shadow-xs transition-colors text-slate-800 focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-slate-950 cursor-pointer"
                            >
                                <option value="Full-Time">Full-Time</option>
                                <option value="Part-Time">Part-Time</option>
                                <option value="Contract / Temporary">Contract / Temporary</option>
                                <option value="Rotational Shift">Rotational Shift</option>
                            </select>
                            @error('type')
                                <p class="text-[11px] text-rose-500 font-medium">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    {{-- Experience Required & Location (2 Columns) --}}
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div class="space-y-1.5">
                            <label for="experince_required" class="text-xs font-medium leading-none text-slate-900">
                                Experience Required <span class="text-rose-500">*</span>
                            </label>
                            <input
                                type="text"
                                id="experince_required"
                                wire:model="experince_required"
                                placeholder="e.g. 1+ Years or Fresher Welcome"
                                class="flex h-9 w-full rounded-md border border-slate-200 bg-transparent px-3 py-1 text-xs shadow-xs transition-colors placeholder:text-slate-400 focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-slate-950"
                            />
                            @error('experince_required')
                                <p class="text-[11px] text-rose-500 font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="space-y-1.5">
                            <label for="job_location" class="text-xs font-medium leading-none text-slate-900">
                                Facility Location <span class="text-rose-500">*</span>
                            </label>
                            <input
                                type="text"
                                id="job_location"
                                wire:model="location"
                                placeholder="e.g. On-Site IT Park & Corporate Towers"
                                class="flex h-9 w-full rounded-md border border-slate-200 bg-transparent px-3 py-1 text-xs shadow-xs transition-colors placeholder:text-slate-400 focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-slate-950"
                            />
                            @error('location')
                                <p class="text-[11px] text-rose-500 font-medium">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    {{-- Salary & Status (2 Columns) --}}
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div class="space-y-1.5">
                            <label for="job_salary" class="text-xs font-medium leading-none text-slate-900">
                                Compensation (In Rupees ₹) <span class="text-rose-500">*</span>
                            </label>
                            <input
                                type="text"
                                id="job_salary"
                                wire:model="salary"
                                placeholder="e.g. ₹22,000 – ₹28,000 / month + Shift Allowance"
                                class="flex h-9 w-full rounded-md border border-slate-200 bg-transparent px-3 py-1 text-xs shadow-xs transition-colors placeholder:text-slate-400 focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-slate-950"
                            />
                            @error('salary')
                                <p class="text-[11px] text-rose-500 font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="space-y-1.5">
                            <label for="job_status" class="text-xs font-medium leading-none text-slate-900">
                                Status <span class="text-rose-500">*</span>
                            </label>
                            <select
                                id="job_status"
                                wire:model="status"
                                class="flex h-9 w-full rounded-md border border-slate-200 bg-transparent px-3 py-1 text-xs shadow-xs transition-colors text-slate-800 focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-slate-950 cursor-pointer"
                            >
                                <option value="active">Active (Visible on Careers Page)</option>
                                <option value="draft">Draft (Hidden)</option>
                                <option value="closed">Closed</option>
                            </select>
                            @error('status')
                                <p class="text-[11px] text-rose-500 font-medium">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    {{-- Job Description (JD) with TinyMCE --}}
                    <div class="space-y-1.5 pt-2">
                        <label for="job_desc_editor" class="text-xs font-medium leading-none text-slate-900 flex items-center justify-between">
                            <span>Job Description (JD Content) <span class="text-rose-500">*</span></span>
                            <span class="text-[11px] text-slate-400">TinyMCE Rich Text Editor</span>
                        </label>
                        <div
                            wire:ignore
                            x-data="tinymceEditor({ model: 'job_description', height: 350, placeholder: 'Write comprehensive job description, duties, shifts, and equipment operated...' })"
                            class="rounded-md border border-slate-200 overflow-hidden shadow-xs bg-white"
                        >
                            <textarea
                                id="job_desc_editor"
                                x-ref="textarea"
                                class="hidden"
                            ></textarea>
                        </div>
                        @error('job_description')
                            <p class="text-[11px] text-rose-500 font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Requirements & Responsibilities (2 Columns) --}}
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-2">
                        <div class="space-y-1.5">
                            <label for="qualification_requirements" class="text-xs font-medium leading-none text-slate-900">
                                Qualifications &amp; Eligibility
                            </label>
                            <textarea
                                id="qualification_requirements"
                                wire:model="qualification_requirements"
                                rows="3"
                                placeholder="e.g. ITI certification, valid Aadhaar ID, ability to operate automated scrubbers..."
                                class="flex w-full rounded-md border border-slate-200 bg-transparent px-3 py-2 text-xs shadow-xs transition-colors placeholder:text-slate-400 focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-slate-950 resize-none leading-relaxed"
                            ></textarea>
                            @error('qualification_requirements')
                                <p class="text-[11px] text-rose-500 font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="space-y-1.5">
                            <label for="job_responsibilities" class="text-xs font-medium leading-none text-slate-900">
                                Key Responsibilities
                            </label>
                            <textarea
                                id="job_responsibilities"
                                wire:model="responsibilities"
                                rows="3"
                                placeholder="e.g. Daily shift handover, machine battery charging, chemical dilution safety compliance..."
                                class="flex w-full rounded-md border border-slate-200 bg-transparent px-3 py-2 text-xs shadow-xs transition-colors placeholder:text-slate-400 focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-slate-950 resize-none leading-relaxed"
                            ></textarea>
                            @error('responsibilities')
                                <p class="text-[11px] text-rose-500 font-medium">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    {{-- Form Footer Actions --}}
                    <div class="flex items-center justify-end gap-2 pt-4 border-t border-slate-100">
                        <button
                            type="button"
                            wire:click="cancel"
                            class="inline-flex h-9 items-center justify-center rounded-md border border-slate-200 bg-white px-4 py-2 text-xs font-medium text-slate-700 hover:bg-slate-50 transition cursor-pointer"
                        >
                            Cancel
                        </button>
                        <button
                            type="submit"
                            wire:loading.attr="disabled"
                            class="inline-flex h-9 items-center justify-center gap-2 rounded-md bg-slate-900 px-5 py-2 text-xs font-medium text-white shadow-xs hover:bg-slate-800 transition cursor-pointer disabled:opacity-50"
                        >
                            <span wire:loading.remove wire:target="save">{{ $isEditing ? 'Update Job' : 'Publish Job' }}</span>
                            <span wire:loading wire:target="save">Saving...</span>
                        </button>
                    </div>

                </form>
            </div>

        </div>

    @else
        {{-- LIST VIEW: Job Openings Table --}}
        
        <!-- Page Header -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 border-b border-slate-200/80 pb-5">
            <div class="space-y-1">
                <h1 class="text-2xl font-semibold tracking-tight text-slate-950">
                    Job Openings &amp; Postings
                </h1>
                <p class="text-xs text-slate-500">
                    Manage operational career openings, Indian Rupee compensation packages, and TinyMCE job descriptions.
                </p>
            </div>

            <div class="flex items-center gap-2">
                <a
                    href="{{ route('admin.job-applied.index') }}"
                    wire:navigate
                    class="inline-flex h-9 items-center justify-center rounded-md border border-slate-200 bg-white px-3.5 py-2 text-xs font-medium text-slate-700 shadow-xs hover:bg-slate-50 transition cursor-pointer gap-1.5"
                >
                    <i class="ri-file-user-line text-sm text-red-600"></i>
                    <span>View Candidates</span>
                </a>
                <button
                    type="button"
                    wire:click="create"
                    class="inline-flex h-9 items-center justify-center rounded-md bg-slate-900 px-4 py-2 text-xs font-medium text-slate-50 shadow-xs hover:bg-slate-900/90 transition-colors cursor-pointer gap-2"
                >
                    <i class="ri-add-line text-sm"></i>
                    <span>Create Job Opening</span>
                </button>
            </div>
        </div>

        <!-- Filter Bar -->
        <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3">
            <div class="relative flex-1">
                <i class="ri-search-line absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-xs"></i>
                <input
                    type="text"
                    wire:model.live.debounce.300ms="search"
                    placeholder="Search by title, department, salary, or location..."
                    class="flex h-9 w-full rounded-md border border-slate-200 bg-white pl-9 pr-3 py-1 text-xs shadow-xs placeholder:text-slate-400 focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-slate-950"
                />
            </div>

            <div class="flex items-center gap-2">
                <select
                    wire:model.live="filterDepartment"
                    class="flex h-9 rounded-md border border-slate-200 bg-white px-3 py-1 text-xs shadow-xs text-slate-700 focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-slate-950 cursor-pointer"
                >
                    <option value="all">All Departments</option>
                    @foreach ($this->departmentsList as $dept)
                        <option value="{{ $dept }}">{{ $dept }}</option>
                    @endforeach
                </select>

                <select
                    wire:model.live="filterStatus"
                    class="flex h-9 rounded-md border border-slate-200 bg-white px-3 py-1 text-xs shadow-xs text-slate-700 focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-slate-950 cursor-pointer"
                >
                    <option value="all">All Statuses</option>
                    <option value="active">Active</option>
                    <option value="draft">Draft</option>
                    <option value="closed">Closed</option>
                </select>
            </div>
        </div>

        <!-- Jobs Table Card -->
        <div class="rounded-lg border border-slate-200 bg-white shadow-xs overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs">
                    <thead class="border-b border-slate-200 bg-slate-50/75 text-[11px] font-semibold text-slate-600 uppercase tracking-wider">
                        <tr>
                            <th class="px-4 py-3">Position &amp; Department</th>
                            <th class="px-4 py-3">Experience &amp; Type</th>
                            <th class="px-4 py-3">Salary &amp; Location</th>
                            <th class="px-4 py-3">Candidates</th>
                            <th class="px-4 py-3">Status</th>
                            <th class="px-4 py-3 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse ($this->jobs as $job)
                            <tr class="hover:bg-slate-50/50 transition">
                                {{-- Position & Department --}}
                                <td class="px-4 py-3">
                                    <div class="font-bold text-slate-900">{{ $job->title }}</div>
                                    <div class="inline-flex items-center gap-1 rounded bg-slate-100 px-1.5 py-0.5 text-[10px] font-medium text-slate-600 mt-0.5">
                                        <i class="ri-building-line text-[10px]"></i>
                                        <span>{{ $job->department }}</span>
                                    </div>
                                </td>

                                {{-- Experience & Type --}}
                                <td class="px-4 py-3">
                                    <div class="font-medium text-slate-800">{{ $job->experince_required }}</div>
                                    <div class="text-[11px] text-slate-400">{{ $job->type }}</div>
                                </td>

                                {{-- Salary & Location --}}
                                <td class="px-4 py-3">
                                    <div class="font-bold text-red-600">{{ $job->salary }}</div>
                                    <div class="text-[11px] text-slate-500 truncate max-w-xs">{{ $job->location }}</div>
                                </td>

                                {{-- Candidates Applied --}}
                                <td class="px-4 py-3">
                                    <a
                                        href="{{ route('admin.job-applied.index') }}?job={{ $job->id }}"
                                        wire:navigate
                                        class="inline-flex items-center gap-1 rounded-full px-2.5 py-0.5 text-[11px] font-bold transition {{ $job->applied_candidates_count > 0 ? 'bg-red-50 text-red-600 hover:bg-red-100' : 'bg-slate-100 text-slate-500' }}"
                                    >
                                        <i class="ri-user-line text-xs"></i>
                                        <span>{{ $job->applied_candidates_count }} Applied</span>
                                    </a>
                                </td>

                                {{-- Status Toggle --}}
                                <td class="px-4 py-3">
                                    <button
                                        type="button"
                                        wire:click="toggleStatus({{ $job->id }})"
                                        class="inline-flex items-center gap-1 rounded-full px-2.5 py-0.5 text-[10px] font-bold transition cursor-pointer {{ $job->status === 'active' ? 'bg-emerald-50 text-emerald-700 hover:bg-emerald-100' : ($job->status === 'draft' ? 'bg-amber-50 text-amber-700 hover:bg-amber-100' : 'bg-slate-100 text-slate-600') }}"
                                    >
                                        <span class="flex h-1.5 w-1.5 rounded-full {{ $job->status === 'active' ? 'bg-emerald-500' : ($job->status === 'draft' ? 'bg-amber-500' : 'bg-slate-400') }}"></span>
                                        <span>{{ ucfirst($job->status) }}</span>
                                    </button>
                                </td>

                                {{-- Actions --}}
                                <td class="px-4 py-3 text-right">
                                    <div class="flex items-center justify-end gap-1">
                                        <button
                                            type="button"
                                            wire:click="edit({{ $job->id }})"
                                            title="Edit opening"
                                            class="p-1 rounded-md text-slate-500 hover:text-slate-900 hover:bg-slate-100 transition cursor-pointer"
                                        >
                                            <i class="ri-edit-line text-sm"></i>
                                        </button>
                                        <button
                                            type="button"
                                            wire:click="confirmDelete({{ $job->id }})"
                                            title="Delete opening"
                                            class="p-1 rounded-md text-slate-400 hover:text-rose-600 hover:bg-rose-50 transition cursor-pointer"
                                        >
                                            <i class="ri-delete-bin-line text-sm"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-4 py-12 text-center text-slate-400">
                                    <i class="ri-briefcase-line text-3xl mb-1 text-slate-300 block"></i>
                                    <span>No job openings found matching your criteria.</span>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if ($this->jobs->hasPages())
                <div class="p-4 border-t border-slate-100">
                    {{ $this->jobs->links() }}
                </div>
            @endif
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
                        <h4 class="text-sm font-bold text-slate-900">Delete Job Opening</h4>
                        <p class="text-xs text-slate-500">This action cannot be undone.</p>
                    </div>
                </div>

                <p class="text-xs text-slate-600 leading-relaxed">
                    Are you sure you want to remove this position? Any candidate applications submitted for this role will also be removed.
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