<?php

use App\Models\Service;
use App\Services\ServiceCatalog;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Rule;
use Livewire\Component;

new class extends Component
{
    public string $slug = '';

    public Service $service;

    #[Rule('required|min:3', message: 'Please enter your full name')]
    public string $name = '';

    #[Rule('required|email', message: 'Please enter a valid business email')]
    public string $email = '';

    #[Rule('required|min:7', message: 'Please enter a valid phone number')]
    public string $phone = '';

    public string $propertyType = 'Commercial Office';

    public string $squareFootage = '10,000 - 25,000 sq ft';

    public string $shiftPreference = 'Twilight / Night Shift';

    public string $notes = '';

    public bool $submitted = false;

    public function mount(string $slug = ''): void
    {
        $this->slug = $slug;

        $service = null;
        if ($slug !== '') {
            $service = Service::where('slug', $slug)
                ->where('is_active', true)
                ->with('category')
                ->first();
        }

        if (! $service) {
            $service = Service::where('is_active', true)
                ->with('category')
                ->first();
        }

        if (! $service) {
            abort(404, 'Service not found');
        }

        $this->service = $service;
        $this->slug = $service->slug;
    }

    public function submitQuote(): void
    {
        $this->validate();

        $this->submitted = true;
        $this->reset(['name', 'email', 'phone', 'notes']);
    }

    /**
     * @return Collection<int, Service>
     */
    #[Computed]
    public function relatedServices(): Collection
    {
        return Service::where('is_active', true)
            ->where('id', '!=', $this->service->id)
            ->when($this->service->service_category_id, function ($q) {
                $q->orderByRaw('CASE WHEN service_category_id = ? THEN 0 ELSE 1 END', [$this->service->service_category_id]);
            })
            ->take(3)
            ->get();
    }

    /**
     * @return Collection<int, Service>
     */
    #[Computed]
    public function allServices(): Collection
    {
        return Service::where('is_active', true)
            ->select('id', 'title', 'slug', 'service_category_id')
            ->orderBy('title')
            ->get();
    }

    /**
     * @return array<string, mixed>|null
     */
    #[Computed]
    public function catalogData(): ?array
    {
        return ServiceCatalog::findBySlug($this->service->slug);
    }

    public function render()
    {
        $title = ($this->service->meta_title ?: $this->service->title) . ' - FacilityPro';

        return view('pages.service-view.service-view')
            ->title($title);
    }
};
