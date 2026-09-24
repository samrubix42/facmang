<?php

use App\Models\Gallery;
use App\Models\Gallerycategory;
use Livewire\Attributes\Title;
use Livewire\Component;

new #[Title('Project Gallery - Verified Facility Work - FacilityPro')] class extends Component
{
    /**
     * @return array<int, array{image: string, title: string, category: string}>
     */
    public function items(): array
    {
        $dbItems = Gallery::query()
            ->with('category')
            ->where('is_active', true)
            ->orderBy('id')
            ->get()
            ->map(fn (Gallery $item): array => [
                'image' => asset($item->image),
                'title' => $item->title,
                'category' => $item->category?->slug ?? 'cleaning',
            ])
            ->all();

        return $dbItems ?: $this->defaultItems();
    }

    /**
     * @return array<int, array{image: string, title: string, category: string}>
     */
    private function defaultItems(): array
    {
        return [
            ['image' => asset('images/hero_facility.jpg'), 'title' => 'Facility Operations Command', 'category' => 'cleaning'],
            ['image' => asset('images/office_sweeping_cleaning.jpg'), 'title' => 'Executive Sweeping Protocol', 'category' => 'cleaning'],
            ['image' => asset('images/restroom_hygiene_sanitation.jpg'), 'title' => 'Restroom Micro-Sanitization', 'category' => 'restrooms'],
            ['image' => asset('images/office_boy_pantry_service.jpg'), 'title' => 'Pantry Steward Service', 'category' => 'pantry'],
            ['image' => asset('images/mep_hvac_maintenance.jpg'), 'title' => 'HVAC Filter Cycle Audit', 'category' => 'mep'],
            ['image' => asset('images/commercial_tower.jpg'), 'title' => 'High-Rise Facade Care', 'category' => 'facades'],
            ['image' => asset('images/estate_development.jpg'), 'title' => 'Campus Estate Sweeping', 'category' => 'cleaning'],
        ];
    }

    /**
     * @return array<string, string>
     */
    public function categories(): array
    {
        $defaults = [
            'cleaning' => 'Cleaning & Sweeping',
            'restrooms' => 'Restroom Hygiene',
            'pantry' => 'Pantry & Staffing',
            'mep' => 'MEP & HVAC',
            'facades' => 'Facades',
        ];

        $dbCategories = Gallerycategory::query()
            ->where('is_active', true)
            ->orderBy('id')
            ->pluck('name', 'slug')
            ->all();

        $categories = $dbCategories ?: $defaults;

        return ['all' => 'All Projects'] + $categories;
    }

    /**
     * @return array<string, int>
     */
    public function counts(): array
    {
        $counts = array_count_values(array_map(fn (array $item): string => $item['category'], $this->items()));
        $counts['all'] = count($this->items());

        foreach ($this->categories() as $slug => $label) {
            $counts[$slug] ??= 0;
        }

        return $counts;
    }
};
