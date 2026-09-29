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
                'designation' => 'President, Green Meadows Residents Welfare Association',
                'testimonial' => 'Our 640-home society had three different vendors and nobody answering the phone. Real Facility Services took over housekeeping, horticulture, security and technical care on one contract, and the transition was completed without a single service gap.',
                'rating' => 5,
                'is_active' => true,
            ],
            [
                'name' => 'Anita Deshpande',
                'designation' => 'Facility Head, Sunridge Business Park',
                'testimonial' => 'RFS has managed our commercial complex for over three years. Their 24x7 helpdesk and trained in-house technicians mean an escalator fault at 11pm is closed out before residents or staff even notice.',
                'rating' => 5,
                'is_active' => true,
            ],
            [
                'name' => 'Sameer Kulkarni',
                'designation' => 'Managing Director, Kalpataru Group',
                'testimonial' => 'The RFS transition consultancy was the most professional handover we have been through. Vendor selection, rosters, documentation and statutory compliance were all prepared before we signed.',
                'rating' => 5,
                'is_active' => true,
            ],
            [
                'name' => 'Farida Sheikh',
                'designation' => 'Secretary, Lakeview Heights Society',
                'testimonial' => 'Their monthly facility audit and legal support have saved our committee hours of work every month. Findings are documented, actioned and closed out — we finally have evidence of what has been done.',
                'rating' => 5,
                'is_active' => true,
            ],
            [
                'name' => 'Vikram Rao',
                'designation' => 'Head of Administration, Techno Park India',
                'testimonial' => 'What stands out is the care RFS takes of their own people. Free health check-up camps for the ground staff, full training and uniform support. That is exactly why attrition on their teams is so low.',
                'rating' => 5,
                'is_active' => true,
            ],
            [
                'name' => 'Deepa Nair',
                'designation' => 'Chief Executive Officer, Meridian Commercial Estates',
                'testimonial' => 'Housekeeping, horticulture, technical maintenance and security under a single accountable partner since 2022. Our service quality audits have stayed consistently above the promised benchmark.',
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
