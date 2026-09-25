<?php

namespace App\Livewire\Admin\Job;

use App\Models\JobApplication;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

new #[Layout('layouts::admin')] #[Title('Job Openings - FacilityPro Admin')] class extends Component
{
    use WithPagination;

    public string $search = '';

    public string $filterDepartment = 'all';

    public string $filterStatus = 'all';

    public bool $isCreating = false;

    public bool $isEditing = false;

    public ?int $editingId = null;

    public bool $showDeleteModal = false;

    public ?int $deletingId = null;

    // Form fields
    public string $title = '';

    public string $department = 'Cleaning & Sweeping';

    public string $type = 'Full-Time';

    public string $experince_required = '1+ Years';

    public string $salary = '';

    public string $location = 'On-Site IT Park & Corporate Towers';

    public string $status = 'active';

    public string $job_description = '';

    public string $qualification_requirements = '';

    public string $responsibilities = '';

    /**
     * @return array<string, array<string, string>>
     */
    protected function rules(): array
    {
        return [
            'title' => ['required', 'string', 'min:3', 'max:150'],
            'department' => ['required', 'string', 'max:100'],
            'type' => ['required', 'string', 'max:50'],
            'experince_required' => ['required', 'string', 'max:100'],
            'salary' => ['required', 'string', 'max:100'],
            'location' => ['required', 'string', 'max:150'],
            'status' => ['required', 'in:active,draft,closed'],
            'job_description' => ['required', 'string', 'min:10'],
            'qualification_requirements' => ['nullable', 'string'],
            'responsibilities' => ['nullable', 'string'],
        ];
    }

    public function updatedSearch(): void
    {
        $this->resetPage();
    }

    public function updatedFilterDepartment(): void
    {
        $this->resetPage();
    }

    public function updatedFilterStatus(): void
    {
        $this->resetPage();
    }

    public function create(): void
    {
        $this->resetForm();
        $this->isCreating = true;
        $this->isEditing = false;
        $this->editingId = null;
    }

    public function edit(int $id): void
    {
        $job = JobApplication::findOrFail($id);

        $this->editingId = $job->id;
        $this->title = $job->title;
        $this->department = $job->department;
        $this->type = $job->type;
        $this->experince_required = $job->experince_required;
        $this->salary = $job->salary;
        $this->location = $job->location;
        $this->status = $job->status;
        $this->job_description = $job->job_description;
        $this->qualification_requirements = $job->qualification_requirements ?? '';
        $this->responsibilities = $job->responsibilities ?? '';

        $this->isEditing = true;
        $this->isCreating = false;
    }

    public function cancel(): void
    {
        $this->resetForm();
        $this->isCreating = false;
        $this->isEditing = false;
        $this->editingId = null;
    }

    public function resetForm(): void
    {
        $this->reset([
            'title',
            'salary',
            'job_description',
            'qualification_requirements',
            'responsibilities',
        ]);
        $this->department = 'Cleaning & Sweeping';
        $this->type = 'Full-Time';
        $this->experince_required = '1+ Years';
        $this->location = 'On-Site IT Park & Corporate Towers';
        $this->status = 'active';
        $this->resetValidation();
    }

    public function save(): void
    {
        $validated = $this->validate();

        if ($this->isEditing && $this->editingId) {
            $job = JobApplication::findOrFail($this->editingId);
            $job->update($validated);

            $this->dispatch('toast-show', [
                'message' => 'Job opening "'.$job->title.'" updated successfully.',
                'type' => 'success',
                'position' => 'top-right',
            ]);
        } else {
            $job = JobApplication::create($validated);

            $this->dispatch('toast-show', [
                'message' => 'New job opening "'.$job->title.'" published successfully.',
                'type' => 'success',
                'position' => 'top-right',
            ]);
        }

        $this->cancel();
    }

    public function toggleStatus(int $id): void
    {
        $job = JobApplication::findOrFail($id);
        $newStatus = $job->status === 'active' ? 'draft' : 'active';
        $job->update(['status' => $newStatus]);

        $this->dispatch('toast-show', [
            'message' => 'Status for "'.$job->title.'" changed to '.ucfirst($newStatus).'.',
            'type' => 'success',
            'position' => 'top-right',
        ]);
    }

    public function confirmDelete(int $id): void
    {
        $this->deletingId = $id;
        $this->showDeleteModal = true;
    }

    public function cancelDelete(): void
    {
        $this->showDeleteModal = false;
        $this->deletingId = null;
    }

    public function delete(): void
    {
        if ($this->deletingId) {
            $job = JobApplication::find($this->deletingId);
            if ($job) {
                $title = $job->title;
                $job->delete();

                $this->dispatch('toast-show', [
                    'message' => 'Job opening "'.$title.'" deleted.',
                    'type' => 'success',
                    'position' => 'top-right',
                ]);
            }
        }

        $this->cancelDelete();
    }

    /**
     * @return mixed
     */
    #[Computed]
    public function jobs()
    {
        return JobApplication::query()
            ->withCount('appliedCandidates')
            ->when($this->search !== '', function ($q) {
                $term = '%'.trim($this->search).'%';
                $q->where(function ($sub) use ($term) {
                    $sub->where('title', 'like', $term)
                        ->orWhere('department', 'like', $term)
                        ->orWhere('location', 'like', $term)
                        ->orWhere('salary', 'like', $term);
                });
            })
            ->when($this->filterDepartment !== 'all', function ($q) {
                $q->where('department', $this->filterDepartment);
            })
            ->when($this->filterStatus !== 'all', function ($q) {
                $q->where('status', $this->filterStatus);
            })
            ->latest()
            ->paginate(10);
    }

    /**
     * @return array<int, string>
     */
    #[Computed]
    public function departmentsList(): array
    {
        return [
            'Cleaning & Sweeping',
            'Pantry & Staffing',
            'MEP & Technical',
            'Field Operations',
            'Facades & Heights',
            'Security & Surveillance',
            'Waste Management & Recycling',
        ];
    }
};