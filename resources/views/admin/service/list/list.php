<?php

use App\Models\Service;
use App\Models\ServiceCategory;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

new #[Layout('layouts::admin')] #[Title('Services - FacilityPro Admin')] class extends Component
{
    use WithPagination;

    public string $search = '';

    public string $filterCategory = 'all';

    public string $filterStatus = 'all';

    public bool $showDeleteModal = false;

    public ?int $deletingId = null;

    public function updatedSearch(): void
    {
        $this->resetPage();
    }

    public function updatedFilterCategory(): void
    {
        $this->resetPage();
    }

    public function updatedFilterStatus(): void
    {
        $this->resetPage();
    }

    public function toggleStatus(int $id): void
    {
        $service = Service::findOrFail($id);
        $service->update([
            'is_active' => ! $service->is_active,
        ]);

        $this->dispatch('toast-show', [
            'message' => 'Status changed for "'.$service->title.'".',
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
            $service = Service::find($this->deletingId);
            if ($service) {
                $title = $service->title;
                $service->delete();

                $this->dispatch('toast-show', [
                    'message' => 'Service "'.$title.'" successfully deleted.',
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
    public function getServicesProperty()
    {
        return Service::query()
            ->with('category')
            ->when($this->search !== '', function ($q) {
                $term = '%'.trim($this->search).'%';
                $q->where(function ($sub) use ($term) {
                    $sub->where('title', 'like', $term)
                        ->orWhere('slug', 'like', $term)
                        ->orWhere('short_description', 'like', $term);
                });
            })
            ->when($this->filterCategory !== 'all', function ($q) {
                $q->where('service_category_id', (int) $this->filterCategory);
            })
            ->when($this->filterStatus === 'active', fn ($q) => $q->where('is_active', true))
            ->when($this->filterStatus === 'inactive', fn ($q) => $q->where('is_active', false))
            ->latest('id')
            ->paginate(10);
    }

    /**
     * @return Collection<int, ServiceCategory>
     */
    #[Computed]
    public function categories()
    {
        return ServiceCategory::orderBy('title')->get();
    }

    /**
     * @return array<string, int>
     */
    #[Computed]
    public function stats(): array
    {
        return [
            'total' => Service::count(),
            'active' => Service::where('is_active', true)->count(),
            'inactive' => Service::where('is_active', false)->count(),
            'categories' => ServiceCategory::count(),
        ];
    }
};
