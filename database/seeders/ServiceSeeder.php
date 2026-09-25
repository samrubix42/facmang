<?php

namespace Database\Seeders;

use App\Models\Service;
use App\Models\ServiceCategory;
use App\Services\ServiceCatalog;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = ServiceCategory::all()->keyBy('slug');

        if ($categories->isEmpty()) {
            $this->call(ServiceCategorySeeder::class);
            $categories = ServiceCategory::all()->keyBy('slug');
        }

        $catalog = ServiceCatalog::all();

        foreach ($catalog as $item) {
            $catSlug = $item['category'] ?? 'janitorial';
            $category = $categories->get($catSlug) ?? $categories->first();

            if (! $category) {
                continue;
            }

            Service::updateOrCreate(
                ['slug' => $item['slug']],
                [
                    'service_category_id' => $category->id,
                    'title' => $item['title'],
                    'slug' => $item['slug'],
                    'image' => $item['image'] ?? 'images/service_placeholder.jpg',
                    'is_active' => true,
                    'short_description' => $item['short_description'] ?? $item['tagline'] ?? 'Professional facility management service.',
                    'content' => $item['full_description'] ?? '',
                    'meta_title' => $item['title'].' | FacilityPro Enterprise Solutions',
                    'meta_description' => $item['short_description'] ?? '',
                    'meta_keyword' => implode(', ', array_filter([$item['badge'] ?? null, $item['category_label'] ?? null, 'facility management', 'SLA'])),
                ]
            );
        }
    }
}
