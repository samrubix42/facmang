<?php

use App\Models\ServiceCategory;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

new #[Layout('layouts::admin')] #[Title('Service Categories - FacilityPro Admin')] class extends Component
{
    use WithPagination;

    public string $search = '';

    public string $filterStatus = 'all';

    public bool $showModal = false;

    public bool $isEditing = false;

    public ?int $serviceCategoryId = null;

    public string $title = '';

    public string $slug = '';

    public string $description = '';

    public bool $is_active = true;

    public bool $showDeleteModal = false;

    public ?int $deletingId = null;

    /**
     * @return array<string, array<int, mixed>>
     */
    protected function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'slug' => [
                'required',
                'string',
                'max:255',
                'regex:/^[a-z0-9]+(?:-[a-z0-9]+)*$/',
                Rule::unique('service_categories', 'slug')->ignore($this->serviceCategoryId),
            ],
            'description' => ['nullable', 'string', 'max:1000'],
            'is_active' => ['boolean'],
        ];
    }

    public function updatedSearch(): void
    {
        $this->resetPage();
    }

    public function updatedFilterStatus(): void
    {
        $this->resetPage();
    }

    public function openCreateModal(): void
    {
        $this->resetValidation();
        $this->reset(['title', 'slug', 'description', 'serviceCategoryId']);
        $this->is_active = true;
        $this->isEditing = false;
        $this->showModal = true;
    }

    public function openEditModal(int $id): void
    {
        $this->resetValidation();
        $record = ServiceCategory::findOrFail($id);

        $this->serviceCategoryId = $record->id;
        $this->title = $record->title;
        $this->slug = $record->slug;
        $this->description = $record->description ?? '';
        $this->is_active = (bool) $record->is_active;

        $this->isEditing = true;
        $this->showModal = true;
    }

    public function closeModal(): void
    {
        $this->showModal = false;
        $this->resetValidation();
    }

    public function save(): void
    {
        $this->slug = trim($this->slug) !== '' ? $this->slug : Str::slug($this->title);

        $validated = $this->validate();

        if ($this->isEditing && $this->serviceCategoryId) {
            $record = ServiceCategory::findOrFail($this->serviceCategoryId);
            $record->update($validated);
            $this->dispatch('toast-show', [
                'message' => 'Service category successfully updated.',
                'type' => 'success',
                'position' => 'top-right',
            ]);
        } else {
            ServiceCategory::create($validated);
            $this->dispatch('toast-show', [
                'message' => 'Service category created successfully.',
                'type' => 'success',
                'position' => 'top-right',
            ]);
        }

        $this->closeModal();
    }

    public function toggleStatus(int $id): void
    {
        $record = ServiceCategory::findOrFail($id);
        $record->update([
            'is_active' => ! $record->is_active,
        ]);

        $this->dispatch('toast-show', [
            'message' => 'Status updated for "'.$record->title.'".',
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
            $record = ServiceCategory::find($this->deletingId);
            if ($record) {
                $title = $record->title;
                $record->delete();
                $this->dispatch('toast-show', [
                    'message' => 'Service category "'.$title.'" deleted.',
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
    public function getCategoriesProperty()
    {
        return ServiceCategory::query()
            ->when($this->search !== '', function ($q) {
                $term = '%'.trim($this->search).'%';
                $q->where(function ($sub) use ($term) {
                    $sub->where('title', 'like', $term)
                        ->orWhere('slug', 'like', $term)
                        ->orWhere('description', 'like', $term);
                });
            })
            ->when($this->filterStatus === 'active', fn ($q) => $q->where('is_active', true))
            ->when($this->filterStatus === 'inactive', fn ($q) => $q->where('is_active', false))
            ->latest('id')
            ->paginate(10);
    }
};
