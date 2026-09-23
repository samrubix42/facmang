<?php

use App\Models\Testimonial;
use Livewire\Attributes\Title;
use Livewire\Component;

new #[Title('FacilityPro - Architectural-Grade Facility Management & Operations')] class extends Component
{
    /**
     * @return array<int, array<string, mixed>>
     */
    public function getTestimonialsProperty(): array
    {
        $dbItems = rescue(fn () => Testimonial::where('is_active', true)->latest()->take(6)->get(), collect(), false);

        if ($dbItems && $dbItems->isNotEmpty()) {
            return $dbItems->map(fn ($item) => [
                'quote' => $item->testimonial,
                'name' => $item->name,
                'role' => $item->designation,
                'rating' => $item->rating,
                'metric' => 'Verified Client',
            ])->all();
        }

        return [
            [
                'quote' => 'FacilityPro transformed our 400,000 sq. ft commercial tower. Restroom cleanliness ratings jumped 35% in month one, and their QR code inspection logs give our executives total visibility.',
                'name' => 'Marcus Vance',
                'role' => 'Senior VP of Operations, Harbor Executive Towers',
                'rating' => 5,
                'metric' => '+35% Cleanliness',
            ],
            [
                'quote' => 'The level of professionalism in their office steward staff is unmatched. Uniformed, punctual, and highly proactive during executive boardroom prep and daily pantry management.',
                'name' => 'Sarah Jenkins',
                'role' => 'Head of Workplace Experience, Vertex Tech Labs HQ',
                'rating' => 5,
                'metric' => '100% W-2 Staff',
            ],
            [
                'quote' => 'Managing 250,000 sq. ft of high-traffic office space required single-point SLA accountability. FacilityPro delivered an 18.4% overhead reduction with zero service disruptions.',
                'name' => 'David Thorne',
                'role' => 'Regional Asset Director, Brookfield Properties',
                'rating' => 5,
                'metric' => '18.4% Saved',
            ],
        ];
    }
};
