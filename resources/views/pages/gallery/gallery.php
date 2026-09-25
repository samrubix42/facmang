<?php

use App\Models\Gallery;
use App\Models\Gallerycategory;
use Livewire\Attributes\Title;
use Livewire\Component;

new #[Title('Project Gallery - Verified Facility Work - FacilityPro')] class extends Component
{
    /**
     * @return array<int, array{id: int, image: string, title: string, category: string, category_name: string, icon: string}>
     */
    public function items(): array
    {
        $categoryIcons = [
            'cleaning' => 'ri-brush-3-line',
            'restrooms' => 'ri-drop-line',
            'pantry' => 'ri-cup-line',
            'mep' => 'ri-tools-line',
            'facades' => 'ri-building-2-line',
        ];

        $dbItems = Gallery::query()
            ->with('category')
            ->where('is_active', true)
            ->orderBy('id')
            ->get()
            ->map(function (Gallery $item) use ($categoryIcons): array {
                $categorySlug = $item->category?->slug ?? 'cleaning';

                return [
                    'id' => $item->id,
                    'image' => asset($item->image),
                    'title' => $item->title,
                    'category' => $categorySlug,
                    'category_name' => $item->category?->name ?? 'Facility Care',
                    'icon' => $categoryIcons[$categorySlug] ?? 'ri-image-line',
                ];
            })
            ->all();

        return $dbItems ?: $this->defaultItems();
    }

    /**
     * @return array<int, array{id: int, image: string, title: string, category: string, category_name: string, icon: string}>
     */
    private function defaultItems(): array
    {
        return [
            ['id' => 1, 'image' => asset('images/hero_facility.jpg'), 'title' => 'Facility Operations Command Center', 'category' => 'cleaning', 'category_name' => 'Cleaning & Sweeping', 'icon' => 'ri-brush-3-line'],
            ['id' => 2, 'image' => asset('images/office_sweeping_cleaning.jpg'), 'title' => 'Executive Sweeping & Floor Restoration', 'category' => 'cleaning', 'category_name' => 'Cleaning & Sweeping', 'icon' => 'ri-brush-3-line'],
            ['id' => 3, 'image' => asset('images/restroom_hygiene_sanitation.jpg'), 'title' => 'Restroom Micro-Sanitization Protocol', 'category' => 'restrooms', 'category_name' => 'Restroom Hygiene', 'icon' => 'ri-drop-line'],
            ['id' => 4, 'image' => asset('images/office_boy_pantry_service.jpg'), 'title' => 'Pantry Steward & Hospitality Service', 'category' => 'pantry', 'category_name' => 'Pantry & Staffing', 'icon' => 'ri-cup-line'],
            ['id' => 5, 'image' => asset('images/mep_hvac_maintenance.jpg'), 'title' => 'HVAC Filter Cycle & MEP Audit', 'category' => 'mep', 'category_name' => 'MEP & HVAC', 'icon' => 'ri-tools-line'],
            ['id' => 6, 'image' => asset('images/commercial_tower.jpg'), 'title' => 'High-Rise Architectural Facade Care', 'category' => 'facades', 'category_name' => 'Facades', 'icon' => 'ri-building-2-line'],
            ['id' => 7, 'image' => asset('images/estate_development.jpg'), 'title' => 'Corporate Campus Estate Sweeping', 'category' => 'cleaning', 'category_name' => 'Cleaning & Sweeping', 'icon' => 'ri-brush-3-line'],
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
