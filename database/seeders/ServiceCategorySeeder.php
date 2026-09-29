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
    ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'title' => 'Mechanized Operations',
                'slug' => 'mechanized-operations',
                'description' => 'Machine-assisted cleaning operations using the latest equipment, tied up with reputed manufacturers, and run through a smart, measurable cleaning process.',
                'is_active' => true,
            ],
            [
                'title' => 'Washroom Services',
                'slug' => 'washroom-services',
                'description' => 'Scheduled washroom rounds, touchpoint disinfection, consumable replenishment and documented hygiene checklists.',
                'is_active' => true,
            ],
            [
                'title' => 'Deep Cleaning Services',
                'slug' => 'deep-cleaning-services',
                'description' => 'Periodic deep cleaning of flats, cabins, common areas and hard floors, including high-reach, high-pressure and carpet work.',
                'is_active' => true,
            ],
            [
                'title' => 'Landscaping',
                'slug' => 'landscaping',
                'description' => 'Lawn maintenance, planting, irrigation, tree care, seasonal foliage and waste-free green area upkeep.',
                'is_active' => true,
            ],
            [
                'title' => 'Pest Management',
                'slug' => 'pest-management',
                'description' => 'Scheduled and on-demand control of mosquitoes, termites, cockroaches, rodents and other site-specific pests.',
                'is_active' => true,
            ],
            [
                'title' => 'Office Space & Floor Management',
                'slug' => 'office-space-management',
                'description' => 'Cabin, workstation, conference room, pantry and floor-level housekeeping for corporate workplaces.',
                'is_active' => true,
            ],
            [
                'title' => 'Residential Society Management',
                'slug' => 'residential-society-management',
                'description' => 'Complete society operations: housekeeping staff, horticulture, security, technical upkeep, amenity care and resident reporting.',
                'is_active' => true,
            ],
            [
                'title' => 'Manufacturing Sector Services',
                'slug' => 'manufacturing-sector-services',
                'description' => 'Shop floor, machine bay and canteen cleaning, spill response, dust control and hygiene compliance for plants and factories.',
                'is_active' => true,
            ],
        ];

        $slugs = array_column($categories, 'slug');

        ServiceCategory::whereIn('slug', $this->retiredSlugs)
            ->whereNotIn('slug', $slugs)
            ->delete();

        foreach ($categories as $data) {
            ServiceCategory::updateOrCreate(
                ['slug' => $data['slug']],
                $data
            );
        }
    }
}
