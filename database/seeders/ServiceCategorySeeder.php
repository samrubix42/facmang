<?php

namespace Database\Seeders;

use App\Models\ServiceCategory;
use Illuminate\Database\Seeder;

class ServiceCategorySeeder extends Seeder
{
    /**
     * Slugs that belonged to the previous catalogue and are no longer used.
     *
     * @var array<int, string>
     */
    protected array $retiredSlugs = [
        'janitorial',
        'hygiene',
        'staffing',
        'technical',
        'security',
        'workplace',
        'compliance',
        'washroom-hygiene',
        'deep-cleaning',
        'floor-management',
        'residential-society',
        'manufacturing-sectors',
        'mechanized-operations',
        'washroom-services',
        'deep-cleaning-services',
        'landscaping',
        'pest-management',
        'office-space-management',
        'residential-society-management',
        'manufacturing-sector-services',
    ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'title' => 'Soft Services',
                'slug' => 'soft-services',
                'description' => 'Professional housekeeping, mechanized cleaning, washroom hygiene, landscaping & horticulture, pest management, and general facility operations.',
                'is_active' => true,
            ],
            [
                'title' => 'Technical Services',
                'slug' => 'technical-services',
                'description' => 'Mechanical, Electrical & Plumbing (MEP) maintenance, HVAC systems, DG sets, BMS operations, rotating machinery, Planned Preventive Maintenance (PPM), and asset due diligence.',
                'is_active' => true,
            ],
        ];

        $slugs = array_column($categories, 'slug');

        ServiceCategory::whereNotIn('slug', $slugs)->delete();

        foreach ($categories as $data) {
            ServiceCategory::updateOrCreate(
                ['slug' => $data['slug']],
                $data
            );
        }
    }
}
