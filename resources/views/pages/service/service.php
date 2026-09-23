<?php

use App\Services\ServiceCatalog;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;

new #[Title('Enterprise Workplace Facility Services & SLAs - FacilityPro')] class extends Component
{
    #[Url]
    public string $search = '';

    #[Url]
    public string $category = 'all';

    public function setCategory(string $category): void
    {
        $this->category = $category;
    }

    /**
     * @return array<int, array<string, mixed>>
     */
    #[Computed]
    public function services(): array
    {
        $all = ServiceCatalog::all();

        if ($this->category !== 'all') {
            $all = array_filter($all, fn ($service) => $service['category'] === $this->category);
        }

        if (trim($this->search) !== '') {
            $q = mb_strtolower(trim($this->search));
            $all = array_filter($all, function ($service) use ($q) {
                return str_contains(mb_strtolower($service['title']), $q)
                    || str_contains(mb_strtolower($service['tagline']), $q)
                    || str_contains(mb_strtolower($service['short_description']), $q);
            });
        }

        return array_values($all);
    }
};
