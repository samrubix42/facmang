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

            // Build rich HTML content suitable for TinyMCE
            $contentHtml = '<p class="lead">'.htmlspecialchars($item['full_description'] ?? $item['short_description'] ?? '', ENT_QUOTES, 'UTF-8').'</p>';

            if (! empty($item['features']) && is_array($item['features'])) {
                $contentHtml .= '<h3>Key Scope Deliverables</h3><ul>';
                foreach ($item['features'] as $feature) {
                    $contentHtml .= '<li>'.htmlspecialchars($feature, ENT_QUOTES, 'UTF-8').'</li>';
                }
                $contentHtml .= '</ul>';
            }

            if (! empty($item['equipment']) && is_array($item['equipment'])) {
                $contentHtml .= '<h3>Specialized Enterprise Equipment</h3><ul>';
                foreach ($item['equipment'] as $equipment) {
                    $contentHtml .= '<li>'.htmlspecialchars($equipment, ENT_QUOTES, 'UTF-8').'</li>';
                }
                $contentHtml .= '</ul>';
            }

            if (! empty($item['sla_rating']) || ! empty($item['response_time'])) {
                $contentHtml .= '<h3>Service Level Agreement (SLA) Assurances</h3>';
                $contentHtml .= '<table style="width: 100%; border-collapse: collapse;" border="1">';
                $contentHtml .= '<thead><tr><th style="padding: 8px; text-align: left; background-color: #f1f5f9;">Metric</th><th style="padding: 8px; text-align: left; background-color: #f1f5f9;">Guarantee</th></tr></thead>';
                $contentHtml .= '<tbody>';
                if (! empty($item['sla_rating'])) {
                    $contentHtml .= '<tr><td style="padding: 8px;">Uptime & Quality SLA</td><td style="padding: 8px;"><strong>'.htmlspecialchars($item['sla_rating'], ENT_QUOTES, 'UTF-8').'</strong></td></tr>';
                }
                if (! empty($item['response_time'])) {
                    $contentHtml .= '<tr><td style="padding: 8px;">Emergency Response Window</td><td style="padding: 8px;">'.htmlspecialchars($item['response_time'], ENT_QUOTES, 'UTF-8').'</td></tr>';
                }
                if (! empty($item['staff_standard'])) {
                    $contentHtml .= '<tr><td style="padding: 8px;">Personnel Verification</td><td style="padding: 8px;">'.htmlspecialchars($item['staff_standard'], ENT_QUOTES, 'UTF-8').'</td></tr>';
                }
                $contentHtml .= '</tbody></table>';
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
                    'content' => $contentHtml,
                    'meta_title' => $item['title'].' | FacilityPro Enterprise Solutions',
                    'meta_description' => $item['short_description'] ?? '',
                    'meta_keyword' => implode(', ', array_filter([$item['badge'] ?? null, $item['category_label'] ?? null, 'facility management', 'SLA'])),
                ]
            );
        }
    }
}
