<?php

use App\Models\Testimonial;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

new #[Layout('layouts::admin')] #[Title('Testimonials - FacilityPro Admin')] class extends Component
{
    use WithPagination;

    public string $search = '';

    public string $filterStatus = 'all';

    public bool $showModal = false;

    public bool $isEditing = false;

    public ?int $testimonialId = null;

    public string $name = '';

    public string $designation = '';

    public string $testimonial = '';

    public int $rating = 5;

    public bool $is_active = true;

    public bool $showDeleteModal = false;

    public ?int $deletingId = null;

    /**
     * @return array<string, array<int, string>>
     */
    protected function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'designation' => ['required', 'string', 'max:255'],
            'testimonial' => ['required', 'string', 'min:10', 'max:2000'],
            'rating' => ['required', 'integer', 'min:1', 'max:5'],
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
        $this->reset(['name', 'designation', 'testimonial', 'testimonialId']);
        $this->rating = 5;
        $this->is_active = true;
        $this->isEditing = false;
        $this->showModal = true;
    }

    public function openEditModal(int $id): void
    {
        $this->resetValidation();
        $record = Testimonial::findOrFail($id);

        $this->testimonialId = $record->id;
        $this->name = $record->name;
        $this->designation = $record->designation;
        $this->testimonial = $record->testimonial;
        $this->rating = (int) $record->rating;
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
        $validated = $this->validate();

        if ($this->isEditing && $this->testimonialId) {
            $record = Testimonial::findOrFail($this->testimonialId);
            $record->update($validated);
            $this->dispatch('toast-show', [
                'message' => 'Testimonial successfully updated.',
                'type' => 'success',
                'position' => 'top-right',
            ]);
        } else {
            Testimonial::create($validated);
            $this->dispatch('toast-show', [
                'message' => 'Testimonial created successfully.',
                'type' => 'success',
                'position' => 'top-right',
            ]);
        }

        $this->closeModal();
    }

    public function toggleStatus(int $id): void
    {
        $record = Testimonial::findOrFail($id);
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
            $record = Testimonial::find($this->deletingId);
            if ($record) {
                $name = $record->name;
                $record->delete();
                $this->dispatch('toast-show', [
                    'message' => 'Testimonial from "'.$name.'" deleted.',
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
    public function getTestimonialsProperty()
    {
        return Testimonial::query()
            ->when($this->search !== '', function ($q) {
                $term = '%'.trim($this->search).'%';
                $q->where(function ($sub) use ($term) {
                    $sub->where('name', 'like', $term)
                        ->orWhere('designation', 'like', $term)
                        ->orWhere('testimonial', 'like', $term);
                });
            })
            ->when($this->filterStatus === 'active', fn ($q) => $q->where('is_active', true))
            ->when($this->filterStatus === 'inactive', fn ($q) => $q->where('is_active', false))
            ->latest('id')
            ->paginate(6);
    }
};
