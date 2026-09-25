<?php

namespace App\Livewire\Admin\Job;

use App\Models\JobApplication;
use App\Models\JobApplied;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

new #[Layout('layouts::admin')] #[Title('Candidate Applications & Resumes - FacilityPro Admin')] class extends Component
{
    use WithPagination;

    public string $search = '';

    public string $filterJobId = 'all';

    public string $filterStatus = 'all';

    public bool $showDetailsModal = false;

    public ?JobApplied $selectedApplication = null;

    public bool $showDeleteModal = false;

    public ?int $deletingId = null;

    public function mount(): void
    {
        if (request()->has('job')) {
            $this->filterJobId = (string) request()->get('job');
        }
    }

    public function updatedSearch(): void
    {
        $this->resetPage();
    }

    public function updatedFilterJobId(): void
    {
        $this->resetPage();
    }

    public function updatedFilterStatus(): void
    {
        $this->resetPage();
    }

    public function viewDetails(int $id): void
    {
        $this->selectedApplication = JobApplied::with('job')->find($id);
        $this->showDetailsModal = true;
    }

    public function closeDetails(): void
    {
        $this->showDetailsModal = false;
        $this->selectedApplication = null;
    }

    public function updateStatus(int $id, string $newStatus): void
    {
        $application = JobApplied::findOrFail($id);
        $application->update(['status' => $newStatus]);

        if ($this->selectedApplication && $this->selectedApplication->id === $id) {
            $this->selectedApplication->status = $newStatus;
        }

        $this->dispatch('toast-show', [
            'message' => 'Status for '.$application->name.' changed to '.ucfirst($newStatus).'.',
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
            $application = JobApplied::find($this->deletingId);
            if ($application) {
                $name = $application->name;
                $application->delete();

                $this->dispatch('toast-show', [
                    'message' => 'Application from "'.$name.'" deleted.',
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
    public function applications()
    {
        return JobApplied::query()
            ->with('job')
            ->when($this->search !== '', function ($q) {
                $term = '%'.trim($this->search).'%';
                $q->where(function ($sub) use ($term) {
                    $sub->where('name', 'like', $term)
                        ->orWhere('email', 'like', $term)
                        ->orWhere('phone', 'like', $term)
                        ->orWhere('address', 'like', $term)
                        ->orWhere('experince', 'like', $term);
                });
            })
            ->when($this->filterJobId !== 'all', function ($q) {
                $q->where('job_id', (int) $this->filterJobId);
            })
            ->when($this->filterStatus !== 'all', function ($q) {
                $q->where('status', $this->filterStatus);
            })
            ->latest()
            ->paginate(15);
    }

    /**
     * @return Collection<int, JobApplication>
     */
    #[Computed]
    public function jobsList(): Collection
    {
        return JobApplication::orderBy('title')->get();
    }

    /**
     * @return array<string, int>
     */
    #[Computed]
    public function stats(): array
    {
        return [
            'total' => JobApplied::count(),
            'pending' => JobApplied::where('status', 'pending')->count(),
            'shortlisted' => JobApplied::where('status', 'shortlisted')->count(),
            'reviewed' => JobApplied::where('status', 'reviewed')->count(),
        ];
    }
};