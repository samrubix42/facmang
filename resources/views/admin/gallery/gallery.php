<?php

use App\Models\Gallery;
use App\Models\Gallerycategory;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

new #[Layout('layouts::admin')] #[Title('Gallery - FacilityPro Admin')] class extends Component
{
    use WithFileUploads;
    use WithPagination;

    public string $search = '';

    public string $filterStatus = 'all';

    public bool $showModal = false;

    public bool $isEditing = false;

    public ?int $galleryId = null;

    public string $title = '';

    public $image = null;

    public ?int $gallerycategory_id = null;

    public bool $is_active = true;

    public bool $showDeleteModal = false;

    public ?int $deletingId = null;

    /**
     * @return array<string, array<int, mixed>>
     */
    protected function rules(): array
    {
        $imageRules = $this->image instanceof UploadedFile
            ? ['required', 'image', 'max:5120']
            : ['required', 'string', 'max:255', 'regex:/^images\/[\w\-]+\.(jpg|jpeg|png|webp)$/i'];

        return [
            'title' => ['required', 'string', 'max:255'],
            'image' => $imageRules,
            'gallerycategory_id' => ['required', 'integer', Rule::exists('gallerycategories', 'id')],
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
        $this->reset(['title', 'image', 'gallerycategory_id', 'galleryId']);
        $this->is_active = true;
        $this->isEditing = false;
        $this->showModal = true;
    }

    public function openEditModal(int $id): void
    {
        $this->resetValidation();
        $record = Gallery::findOrFail($id);

        $this->galleryId = $record->id;
        $this->title = $record->title;
        $this->image = $record->image;
        $this->gallerycategory_id = $record->gallerycategory_id;
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

        if ($this->image instanceof UploadedFile) {
            $filename = Str::uuid().'.'.$this->image->getClientOriginalExtension();
            copy($this->image->getRealPath(), public_path('images/'.$filename));
            $validated['image'] = 'images/'.$filename;
        }

        if ($this->isEditing && $this->galleryId) {
            $record = Gallery::findOrFail($this->galleryId);
            $record->update($validated);
            $this->dispatch('toast-show', [
                'message' => 'Gallery item successfully updated.',
                'type' => 'success',
                'position' => 'top-right',
            ]);
        } else {
            Gallery::create($validated);
            $this->dispatch('toast-show', [
                'message' => 'Gallery item created successfully.',
                'type' => 'success',
                'position' => 'top-right',
            ]);
        }

        $this->closeModal();
    }

    public function toggleStatus(int $id): void
    {
        $record = Gallery::findOrFail($id);
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
            $record = Gallery::find($this->deletingId);
            if ($record) {
                $title = $record->title;
                $record->delete();
                $this->dispatch('toast-show', [
                    'message' => 'Gallery item "'.$title.'" deleted.',
                    'type' => 'success',
                    'position' => 'top-right',
                ]);
            }
        }

        $this->cancelDelete();
    }

    /**
     * @return array<string, int>
     */
    public function categoryOptions(): array
    {
        return Gallerycategory::query()
            ->orderBy('name')
            ->pluck('name', 'id')
            ->all();
    }

    /**
     * @return string|null
     */
    public function imagePreview()
    {
        if ($this->image instanceof UploadedFile) {
            return $this->image->temporaryUrl();
        }

        return $this->image ? asset($this->image) : null;
    }

    /**
     * @return mixed
     */
    public function getGalleriesProperty()
    {
        return Gallery::query()
            ->with('category')
            ->when($this->search !== '', function ($q) {
                $term = '%'.trim($this->search).'%';
                $q->where(function ($sub) use ($term) {
                    $sub->where('title', 'like', $term)
                        ->orWhere('image', 'like', $term);
                });
            })
            ->when($this->filterStatus === 'active', fn ($q) => $q->where('is_active', true))
            ->when($this->filterStatus === 'inactive', fn ($q) => $q->where('is_active', false))
            ->latest('id')
            ->paginate(10);
    }
};
