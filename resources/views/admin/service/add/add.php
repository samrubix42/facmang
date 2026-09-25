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

new #[Layout('layouts::admin')] #[Title('Add New Service - FacilityPro Admin')] class extends Component
{
    use WithFileUploads;

    public ?int $service_category_id = null;

    public string $title = '';

    public string $slug = '';

    public $image = null;

    public bool $is_active = true;

    public string $short_description = '';

    public string $content = '';

    public string $meta_title = '';

    public string $meta_description = '';

    public string $meta_keyword = '';

    public bool $slugManuallyChanged = false;

    /**
     * @return array<string, array<int, mixed>>
     */
    protected function rules(): array
    {
        return [
            'service_category_id' => ['required', 'integer', Rule::exists('service_categories', 'id')],
            'title' => ['required', 'string', 'max:255'],
            'slug' => [
                'required',
                'string',
                'max:255',
                'regex:/^[a-z0-9]+(?:-[a-z0-9]+)*$/',
                Rule::unique('services', 'slug'),
            ],
            'image' => ['required', 'image', 'max:5120'],
            'is_active' => ['boolean'],
            'short_description' => ['required', 'string', 'max:1000'],
            'content' => ['nullable', 'string'],
            'meta_title' => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string', 'max:1000'],
            'meta_keyword' => ['nullable', 'string', 'max:500'],
        ];
    }

    public function updatedTitle(string $value): void
    {
        if (! $this->slugManuallyChanged) {
            $this->slug = Str::slug($value);
        }

        if (trim($this->meta_title) === '') {
            $this->meta_title = $value.' | FacilityPro';
        }
    }

    public function updatedSlug(): void
    {
        $this->slugManuallyChanged = true;
    }

    public function generateSlug(): void
    {
        $this->slug = Str::slug($this->title);
        $this->slugManuallyChanged = false;
    }

    /**
     * @return Collection<int, ServiceCategory>
     */
    #[Computed]
    public function categories()
    {
        return ServiceCategory::where('is_active', true)->orderBy('title')->get();
    }

    public function save(bool $createAnother = false): mixed
    {
        if (trim($this->slug) === '') {
            $this->slug = Str::slug($this->title);
        }

        $validated = $this->validate();

        if ($this->image instanceof UploadedFile) {
            $extension = $this->image->getClientOriginalExtension() ?: 'jpg';
            $filename = 'service-'.Str::uuid().'.'.$extension;
            copy($this->image->getRealPath(), public_path('images/'.$filename));
            $validated['image'] = 'images/'.$filename;
        }

        $service = Service::create($validated);

        session()->flash('toast', [
            'message' => 'Service "'.$service->title.'" successfully created.',
            'type' => 'success',
            'position' => 'top-right',
        ]);

        if ($createAnother) {
            $this->reset([
                'title',
                'slug',
                'image',
                'short_description',
                'content',
                'meta_title',
                'meta_description',
                'meta_keyword',
                'slugManuallyChanged',
            ]);
            $this->is_active = true;
            $this->dispatch('toast-show', [
                'message' => 'Service created. Ready to add another.',
                'type' => 'success',
                'position' => 'top-right',
            ]);

            return null;
        }

        return $this->redirect(route('admin.services.index'), navigate: true);
    }
};
