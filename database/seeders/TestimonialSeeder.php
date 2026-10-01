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
                'name' => 'Rajesh Menon',
                'designation' => 'President, Mahagun Meadows Society',
                'testimonial' => 'Real Facility Services has transformed our residential complex maintenance. Housekeeping, security, and HVAC services are managed seamlessly under one accountable contract.',
                'rating' => 5,
                'is_active' => true,
            ],
            [
                'name' => 'Anita Deshpande',
                'designation' => 'Facility Head, Parkway Commercial Complex',
                'testimonial' => 'RFS has managed our corporate towers for over three years. Their 24x7 helpdesk and rapid response technicians ensure zero downtime for our commercial tenants.',
                'rating' => 5,
                'is_active' => true,
            ],
            [
                'name' => 'Sameer Kulkarni',
                'designation' => 'Managing Director, ACE Group',
                'testimonial' => 'The facility transition conducted by RFS was seamless. Rosters, statutory compliance, and trained manpower were fully deployed ahead of schedule.',
                'rating' => 5,
                'is_active' => true,
            ],
            [
                'name' => 'Farida Sheikh',
                'designation' => 'Operations Manager, Asiana Commercial Towers',
                'testimonial' => 'Their monthly facility audit reports and proactive maintenance schedules have saved our management team countless hours. Outstanding service standards across all floors.',
                'rating' => 5,
                'is_active' => true,
            ],
            [
                'name' => 'Vikram Rao',
                'designation' => 'Head of Administration, BB Tech Park',
                'testimonial' => 'What stands out is the high quality of staff training and low staff attrition. RFS delivers top-tier cleaning, MEP, and security services consistently.',
                'rating' => 5,
                'is_active' => true,
            ],
            [
                'name' => 'Amit Sharma',
                'designation' => 'Admin Lead, Kia Motors Facility',
                'testimonial' => 'Extremely satisfied with the professional housekeeping and facility support at our main center. The team is disciplined, well-groomed, and attentive.',
                'rating' => 5,
                'is_active' => true,
            ],
            [
                'name' => 'Dr. Sunita Verma',
                'designation' => 'Director, Vivekanand Institute',
                'testimonial' => 'Managing campus hygiene and technical services across multiple buildings was a challenge until RFS took over. Their team delivers prompt and reliable support daily.',
                'rating' => 5,
                'is_active' => true,
            ],
            [
                'name' => 'Sandeep Mehta',
                'designation' => 'General Manager, KIO Enterprise Hub',
                'testimonial' => 'RFS provides top-notch facility management services. Their single point of contact and transparent reporting make complex campus management effortless.',
                'rating' => 5,
                'is_active' => true,
            ],
        ];

        // Seed or update testimonials
        $seededNames = [];
        foreach ($testimonials as $data) {
            $seededNames[] = $data['name'];
            Testimonial::updateOrCreate(
                ['name' => $data['name']],
                $data
            );
        }

        // Clean up legacy testimonials not in the seed list
        Testimonial::whereNotIn('name', $seededNames)->delete();
    }
}
