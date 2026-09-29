<?php

namespace Database\Seeders;

use App\Models\Service;
use App\Models\ServiceCategory;
use App\Services\ServiceCatalog;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Slugs from the previous catalogue that are no longer part of RFS services.
     *
     * @var array<int, string>
     */
    protected array $retiredSlugs = [
        'office-sweeping-cleaning',
        'restroom-hygiene-sanitation',
        'corporate-pantry-staffing',
        'deep-disinfection-sanitization',
        'mep-hvac-maintenance',
        'architectural-facade-cleaning',
        'latest-equipment-tie-ups',
        'smart-cleaning-process',
        'landscaping-services',
        'pest-management-services',
        'floor-management-services',
        'manufacturing-sectors-services',
    ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = ServiceCategory::all()->keyBy('slug');

        $catalog = ServiceCatalog::all();
        $requiredSlugs = array_values(array_unique(array_column($catalog, 'category')));

        if (array_diff($requiredSlugs, $categories->keys()->all()) !== []) {
            $this->call(ServiceCategorySeeder::class);
            $categories = ServiceCategory::all()->keyBy('slug');
        }

        Service::whereIn('slug', $this->retiredSlugs)
            ->whereNotIn('slug', array_column($catalog, 'slug'))
            ->delete();

        foreach ($catalog as $item) {
            $category = $categories->get($item['category'] ?? '') ?? $categories->first();

            if (! $category) {
                continue;
            }

            Service::updateOrCreate(
                ['slug' => $item['slug']],
                [
                    'service_category_id' => $category->id,
                    'title' => $item['title'],
                    'slug' => $item['slug'],
                    'image' => $item['image'] ?? 'images/hero_facility.jpg',
                    'is_active' => true,
                    'short_description' => $item['short_description'] ?? $item['tagline'] ?? 'Professional facility management service.',
                    'content' => $this->buildContent($item),
                    'meta_title' => $item['title'].' | Real Facility Services (RFS)',
                    'meta_description' => $item['short_description'] ?? '',
                    'meta_keyword' => implode(', ', array_filter([
                        $item['badge'] ?? null,
                        $item['category_label'] ?? null,
                        'facility management',
                        'soft services',
                    ])),
                ]
            );
        }
    }

    /**
     * Build the TinyMCE-ready content stored on the service record.
     *
     * Deliberately lean: an opening paragraph plus the catalogue highlights.
     * The scope of work, equipment, comparison, SOP and FAQ blocks are already
     * rendered by the service template straight from the catalogue, so
     * duplicating them here would only bloat the admin editor. Only elements
     * covered by the `.rich-content` layer are emitted, so seeded content
     * matches content authored in the editor.
     *
     * @param  array<string, mixed>  $item
     */
    protected function buildContent(array $item): string
    {
        $blocks = [];

        if (! empty($item['full_description'])) {
            $blocks[] = '<p>'.e($item['full_description']).'</p>';
        }

        if (! empty($item['features']) && is_array($item['features'])) {
            $blocks[] = '<h2>Service Highlights</h2>';
            $blocks[] = '<ul>';

            foreach ($item['features'] as $label => $description) {
                $blocks[] = '<li><strong>'.e((string) $label).':</strong> '.e((string) $description).'</li>';
            }

            $blocks[] = '</ul>';
        }

        return implode("\n", $blocks);
    }
}
