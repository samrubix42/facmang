<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $testimonials = [
            [
                'name' => 'Elena Rostova',
                'designation' => 'VP of Real Estate, Helix BioTech Campus',
                'testimonial' => 'Transitioning our 1.4M sq ft wet-lab campus to FacilityPro brought our audit pass rate from 88% to a pristine 99.8%. The IoT checkpoint tracking and strict SLA compliance make them the gold standard for life-sciences facilities.',
                'rating' => 5,
                'is_active' => true,
            ],
            [
                'name' => 'Marcus Vance',
                'designation' => 'Global Head of Workplace, Apex Financial Tower',
                'testimonial' => 'Across our 62-floor headquarters, zero downtime is non-negotiable. FacilityPro’s predictive HVAC maintenance and rapid incident response team have slashed energy consumption by 24% and eliminated tenant thermal complaints.',
                'rating' => 5,
                'is_active' => true,
            ],
            [
                'name' => 'Sarah Lin-Sterling',
                'designation' => 'Managing Director, Sterling Logistics Parks',
                'testimonial' => 'Managing high-throughput distribution hubs across 4 states requires relentless operational rigor. FacilityPro delivers transparent weekly KPI reports, 100% security gate uptime, and flawless dock maintenance.',
                'rating' => 5,
                'is_active' => true,
            ],
            [
                'name' => 'David Thorne',
                'designation' => 'Chief Operations Officer, Lumina Health Systems',
                'testimonial' => 'Hospital sanitation and sterilization standards leave zero margin for error. FacilityPro implemented hospital-grade bio-sanitization protocols and rigorous digital checkpoint logs that impressed state inspectors on day one.',
                'rating' => 5,
                'is_active' => true,
            ],
            [
                'name' => 'Priya Patel',
                'designation' => 'Director of Corporate Services, Quantico Tech Hub',
                'testimonial' => 'The integrated admin dashboard and instant SLA dispatch make collaborating with FacilityPro an absolute breeze. They are proactive partners who anticipate infrastructure bottlenecks before they happen.',
                'rating' => 4,
                'is_active' => true,
            ],
            [
                'name' => 'Arthur Pendelton',
                'designation' => 'Asset Manager, Sovereign Wealth Real Estate',
                'testimonial' => 'Their computerized maintenance management integration has extended our central chiller plant asset lifecycle by an estimated 7 years. Truly institutional-grade facility operations.',
                'rating' => 5,
                'is_active' => false,
            ],
        ];

        foreach ($testimonials as $data) {
            Testimonial::updateOrCreate(
                ['name' => $data['name'], 'designation' => $data['designation']],
                $data
            );
        }
    }
}
