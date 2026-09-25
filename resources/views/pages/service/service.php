<?php

use App\Models\Service;
use App\Models\ServiceCategory;
use Illuminate\Database\Eloquent\Collection;
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
     * @return Collection<int, ServiceCategory>
     */
    #[Computed]
    public function categories(): Collection
    {
        return ServiceCategory::where('is_active', true)
            ->withCount(['services' => function ($query) {
                $query->where('is_active', true);
            }])
            ->orderBy('title')
            ->get();
    }

    #[Computed]
    public function totalServicesCount(): int
    {
        return Service::where('is_active', true)->count();
    }

    /**
     * @return Collection<int, Service>
     */
    #[Computed]
    public function services(): Collection
    {
        $query = Service::where('is_active', true)
            ->with('category')
            ->orderBy('id', 'asc');

        if ($this->category !== 'all' && trim($this->category) !== '') {
            $catSlug = $this->category;
            $query->whereHas('category', function ($q) use ($catSlug) {
                $q->where('slug', $catSlug);
            });
        }

        if (trim($this->search) !== '') {
            $term = '%' . trim($this->search) . '%';
            $query->where(function ($q) use ($term) {
                $q->where('title', 'like', $term)
                    ->orWhere('short_description', 'like', $term)
                    ->orWhere('content', 'like', $term)
                    ->orWhere('meta_keyword', 'like', $term);
            });
        }

        return $query->get();
    }
};
