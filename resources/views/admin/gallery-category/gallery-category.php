<?php

use App\Models\Gallerycategory;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

new #[Layout('layouts::admin')] #[Title('Gallery Categories - FacilityPro Admin')] class extends Component
{
    use WithPagination;

    public string $search = '';

    public string $filterStatus = 'all';

    public bool $showModal = false;

    public bool $isEditing = false;

    public ?int $galleryCategoryId = null;

    public string $name = '';

    public string $slug = '';

    public bool $is_active = true;

    public bool $showDeleteModal = false;

    public ?int $deletingId = null;

    /**
     * @return array<string, array<int, mixed>>
     */
    protected function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'slug' => [
                'required',
                'string',
                'max:255',
                'regex:/^[a-z0-9]+(?:-[a-z0-9]+)*$/',
                Rule::unique('gallerycategories', 'slug')->ignore($this->galleryCategoryId),
            ],
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
        $this->reset(['name', 'slug', 'galleryCategoryId']);
        $this->is_active = true;
        $this->isEditing = false;
        $this->showModal = true;
    }

    public function openEditModal(int $id): void
    {
        $this->resetValidation();
        $record = Gallerycategory::findOrFail($id);

        $this->galleryCategoryId = $record->id;
        $this->name = $record->name;
        $this->slug = $record->slug;
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
        $this->slug = trim($this->slug) !== '' ? $this->slug : Str::slug($this->name);

        $validated = $this->validate();

        if ($this->isEditing && $this->galleryCategoryId) {
            $record = Gallerycategory::findOrFail($this->galleryCategoryId);
            $record->update($validated);
            $this->dispatch('toast-show', [
                'message' => 'Gallery category successfully updated.',
                'type' => 'success',
                'position' => 'top-right',
            ]);
        } else {
            Gallerycategory::create($validated);
            $this->dispatch('toast-show', [
                'message' => 'Gallery category created successfully.',
                'type' => 'success',
                'position' => 'top-right',
            ]);
        }

        $this->closeModal();
    }

    public function toggleStatus(int $id): void
    {
        $record = Gallerycategory::findOrFail($id);
        $record->update([
            'is_active' => ! $record->is_active,
        ]);

        $this->dispatch('toast-show', [
            'message' => 'Status updated for "'.$record->name.'".',
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
            $record = Gallerycategory::find($this->deletingId);
            if ($record) {
                $name = $record->name;
                $record->delete();
                $this->dispatch('toast-show', [
                    'message' => 'Gallery category "'.$name.'" deleted.',
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
        return Gallerycategory::query()
            ->when($this->search !== '', function ($q) {
                $term = '%'.trim($this->search).'%';
                $q->where(function ($sub) use ($term) {
                    $sub->where('name', 'like', $term)
                        ->orWhere('slug', 'like', $term);
                });
            })
            ->when($this->filterStatus === 'active', fn ($q) => $q->where('is_active', true))
            ->when($this->filterStatus === 'inactive', fn ($q) => $q->where('is_active', false))
            ->latest('id')
            ->paginate(10);
    }
};
