<?php

use App\Models\Gallerycategory;
use Livewire\Attributes\Title;
use Livewire\Component;

new #[Title('Project Gallery - Verified Facility Work - FacilityPro')] class extends Component
{
    /**
     * @return array<int, array{image: string, title: string, tag: string, category: string}>
     */
    public function items(): array
    {
        return [
            ['image' => asset('images/hero_facility.jpg'), 'title' => 'Facility Operations Command', 'tag' => 'SLA Audit & Dispatch', 'category' => 'cleaning'],
            ['image' => asset('images/office_sweeping_cleaning.jpg'), 'title' => 'Executive Sweeping Protocol', 'tag' => 'Daily Commercial Care', 'category' => 'cleaning'],
            ['image' => asset('images/restroom_hygiene_sanitation.jpg'), 'title' => 'Restroom Micro-Sanitization', 'tag' => 'Hygiene Compliance', 'category' => 'restrooms'],
            ['image' => asset('images/office_boy_pantry_service.jpg'), 'title' => 'Pantry Steward Service', 'tag' => 'Hospitality Staffing', 'category' => 'pantry'],
            ['image' => asset('images/mep_hvac_maintenance.jpg'), 'title' => 'HVAC Filter Cycle Audit', 'tag' => 'MEP Preventive Care', 'category' => 'mep'],
            ['image' => asset('images/commercial_tower.jpg'), 'title' => 'High-Rise Facade Care', 'tag' => 'Architectural Maintenance', 'category' => 'facades'],
            ['image' => asset('images/estate_development.jpg'), 'title' => 'Campus Estate Sweeping', 'tag' => 'Grounds & Common Areas', 'category' => 'cleaning'],
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

        return $counts;
    }
};
