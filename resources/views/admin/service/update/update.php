<?php

use App\Models\Service;
use App\Models\ServiceCategory;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

new #[Layout('layouts::admin')] #[Title('Edit Service - FacilityPro Admin')] class extends Component
{
    use WithFileUploads;

    public int $serviceId;

    public ?int $service_category_id = null;

    public string $title = '';

    public string $slug = '';

    public $image = null;

    public ?string $existingImage = null;

    public bool $is_active = true;

    public string $short_description = '';

    public string $content = '';

    public string $meta_title = '';

    public string $meta_description = '';

    public string $meta_keyword = '';

    public bool $showDeleteModal = false;

    public function mount(Service|int|string $service): void
    {
        $model = $service instanceof Service ? $service : Service::findOrFail($service);

        $this->serviceId = $model->id;
        $this->service_category_id = $model->service_category_id;
        $this->title = $model->title;
        $this->slug = $model->slug;
        $this->existingImage = $model->image;
        $this->is_active = (bool) $model->is_active;
        $this->short_description = $model->short_description;
        $this->content = $model->content ?? '';
        $this->meta_title = $model->meta_title ?? '';
        $this->meta_description = $model->meta_description ?? '';
        $this->meta_keyword = $model->meta_keyword ?? '';
    }

    /**
     * @return array<string, array<int, mixed>>
     */
    protected function rules(): array
    {
        $imageRule = $this->image instanceof UploadedFile
            ? ['required', 'image', 'max:5120']
            : ['nullable'];

        return [
            'service_category_id' => ['required', 'integer', Rule::exists('service_categories', 'id')],
            'title' => ['required', 'string', 'max:255'],
            'slug' => [
                'required',
                'string',
                'max:255',
                'regex:/^[a-z0-9]+(?:-[a-z0-9]+)*$/',
                Rule::unique('services', 'slug')->ignore($this->serviceId),
            ],
            'image' => $imageRule,
            'is_active' => ['boolean'],
            'short_description' => ['required', 'string', 'max:1000'],
            'content' => ['nullable', 'string'],
            'meta_title' => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string', 'max:1000'],
            'meta_keyword' => ['nullable', 'string', 'max:500'],
        ];
    }

    public function generateSlug(): void
    {
        $this->slug = Str::slug($this->title);
    }

    /**
     * @return Collection<int, ServiceCategory>
     */
    #[Computed]
    public function categories()
    {
        return ServiceCategory::where('is_active', true)->orderBy('title')->get();
    }

    public function save(): mixed
    {
        if (trim($this->slug) === '') {
            $this->slug = Str::slug($this->title);
        }

        $validated = $this->validate();

        $service = Service::findOrFail($this->serviceId);

        if ($this->image instanceof UploadedFile) {
            $extension = $this->image->getClientOriginalExtension() ?: 'jpg';
            $filename = 'service-'.Str::uuid().'.'.$extension;
            copy($this->image->getRealPath(), public_path('images/'.$filename));
            $validated['image'] = 'images/'.$filename;
            $this->existingImage = $validated['image'];
            $this->image = null;
        } else {
            unset($validated['image']);
        }

        $service->update($validated);

        $this->dispatch('toast-show', [
            'message' => 'Service "'.$service->title.'" updated successfully.',
            'type' => 'success',
            'position' => 'top-right',
        ]);

        return null;
    }

    public function confirmDelete(): void
    {
        $this->showDeleteModal = true;
    }

    public function cancelDelete(): void
    {
        $this->showDeleteModal = false;
    }

    public function delete(): mixed
    {
        $service = Service::findOrFail($this->serviceId);
        $title = $service->title;
        $service->delete();

        session()->flash('toast', [
            'message' => 'Service "'.$title.'" successfully deleted.',
            'type' => 'success',
            'position' => 'top-right',
        ]);

        return $this->redirect(route('admin.services.index'), navigate: true);
    }
};
