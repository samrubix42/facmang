<?php

namespace Database\Seeders;

use App\Models\ServiceCategory;
use Illuminate\Database\Seeder;

class ServiceCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'title' => 'Janitorial & Floor Care',
                'slug' => 'janitorial',
                'description' => 'Industrial sweeping, motorized scrubbing, HEPA particulate filtering, and diamond marble polish.',
                'is_active' => true,
            ],
            [
                'title' => 'Technical, MEP & Engineering',
                'slug' => 'technical',
                'description' => 'Preventive HVAC chiller maintenance, HT/LT electrical panels, DG sync sets, and plumbing.',
                'is_active' => true,
            ],
            [
                'title' => 'Security, Surveillance & Access',
                'slug' => 'security',
                'description' => 'Trained corporate guards, perimeter CCTV monitoring, boom barriers, and access control.',
                'is_active' => true,
            ],
            [
                'title' => 'Workplace & Environmental',
                'slug' => 'workplace',
                'description' => 'Indoor air quality monitoring, ergonomic adjustments, acoustic management, and waste reduction.',
                'is_active' => true,
            ],
            [
                'title' => 'Audits, Compliance & Green SLAs',
                'slug' => 'compliance',
                'description' => 'Statutory safety audits, green building certifications, ISO standard compliance, and SLA logs.',
                'is_active' => true,
            ],
        ];

        foreach ($categories as $data) {
            ServiceCategory::updateOrCreate(
                ['slug' => $data['slug']],
                $data
            );
        }
    }
}
