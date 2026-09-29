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
     * Build the TinyMCE-ready rich content stored on the service record.
     *
     * Only elements already styled by the `.rich-content` layer are emitted
     * (headings, paragraphs, lists, blockquote, table) so the seeded content
     * renders identically to content authored in the admin editor.
     *
     * @param  array<string, mixed>  $item
     */
    protected function buildContent(array $item): string
    {
        $html = [];

        if (! empty($item['full_description'])) {
            $html[] = '<blockquote>'.$this->escape($item['full_description']).'</blockquote>';
        }

        if (! empty($item['features']) && is_array($item['features'])) {
            $html[] = '<h2>Service Highlights</h2>';
            $html[] = '<ul>';

            foreach ($item['features'] as $label => $description) {
                $html[] = '<li><strong>'.$this->escape((string) $label).':</strong> '
                    .$this->escape((string) $description).'</li>';
            }

            $html[] = '</ul>';
        }

        if (! empty($item['scope']['daily'])) {
            $html[] = '<h2>Scope of Work</h2>';
            $html[] = '<h3>Daily Routine</h3>';
            $html[] = '<ul>';

            foreach ($item['scope']['daily'] as $task) {
                $html[] = '<li>'.$this->escape((string) $task).'</li>';
            }

            $html[] = '</ul>';
        }

        if (! empty($item['scope']['periodic'])) {
            $html[] = '<h3>Periodic &amp; Deep Maintenance</h3>';
            $html[] = '<ul>';

            foreach ($item['scope']['periodic'] as $task) {
                $html[] = '<li>'.$this->escape((string) $task).'</li>';
            }

            $html[] = '</ul>';
        }

        if (! empty($item['equipment']) && is_array($item['equipment'])) {
            $html[] = '<h2>Equipment &amp; Technology</h2>';
            $html[] = '<ul>';

            foreach ($item['equipment'] as $equipment) {
                $html[] = '<li>'.$this->escape((string) $equipment).'</li>';
            }

            $html[] = '</ul>';
        }

        $commitments = array_filter([
            ($item['sla_rating_label'] ?? 'Quality Compliance') => $item['sla_rating'] ?? null,
            'Emergency Response Window' => $item['response_time'] ?? null,
            'Personnel Standard' => $item['staff_standard'] ?? null,
            'Service Frequency' => $item['frequency'] ?? null,
        ]);

        if ($commitments !== []) {
            $html[] = '<h2>Service Level Commitments</h2>';
            $html[] = '<table><thead><tr><th>Parameter</th><th>RFS Commitment</th></tr></thead><tbody>';

            foreach ($commitments as $parameter => $commitment) {
                $html[] = '<tr><td>'.$this->escape((string) $parameter).'</td><td><strong>'
                    .$this->escape((string) $commitment).'</strong></td></tr>';
            }

            $html[] = '</tbody></table>';
        }

        return implode("\n", $html);
    }

    protected function escape(string $value): string
    {
        return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
    }
}
