<?php

use App\Services\ServiceCatalog;
use Livewire\Attributes\Rule;
use Livewire\Component;

new class extends Component
{
    public string $slug = '';

    /**
     * @var array<string, mixed>
     */
    public array $service = [];

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
        $found = ServiceCatalog::findBySlug($slug);

        if (! $found) {
            $all = ServiceCatalog::all();
            $found = $all[0];
            $this->slug = $found['slug'];
        }

        $this->service = $found;
    }

    public function submitQuote(): void
    {
        $this->validate();

        $this->submitted = true;
        $this->reset(['name', 'email', 'phone', 'notes']);
    }

    /**
     * @return array<int, array<string, mixed>>
     */
    public function getRelatedServicesProperty(): array
    {
        return ServiceCatalog::related($this->slug, 3);
    }
};
