<?php

use App\Models\Client;
use App\Models\Service;
use App\Models\Testimonial;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Title;
use Livewire\Component;

new #[Title('Real Facility Services (RFS) - Integrated Facility & Soft Services Since 2022')] class extends Component
{
    /**
     * @return Collection<int, Service>
     */
    #[Computed]
    public function services(): Collection
    {
        return Service::where('is_active', true)
            ->with('category')
            ->orderBy('id')
            ->take(6)
            ->get();
    }

    /**
     * @return Collection<int, Client>
     */
    #[Computed]
    public function clients(): Collection
    {
        return Client::where('is_active', true)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->take(12)
            ->get();
    }

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
                'quote' => 'Our society earlier ran on three different vendors and nobody answered after 8pm. Real Facility Services took over housekeeping, horticulture, technical and security on one contract, and the handover happened without a single service gap.',
                'name' => 'Rajesh Menon',
                'role' => 'President, Green Meadows RWA',
                'rating' => 5,
                'metric' => '3+ Yrs Managed',
            ],
            [
                'quote' => 'RFS has run our commercial complex for over three years. Their trained in-house technicians and 24x7 desk mean an escalator fault at 11pm is closed before our staff even notice it.',
                'name' => 'Anita Deshpande',
                'role' => 'Facility Head, Sunridge Business Park',
                'rating' => 5,
                'metric' => '24x7 Support',
            ],
            [
                'quote' => 'The transition consultancy was the most professional handover we have been through. Vendor selection, rosters, documentation and compliance were all ready before we signed.',
                'name' => 'Sameer Kulkarni',
                'role' => 'Managing Director, Kalpataru Group',
                'rating' => 5,
                'metric' => 'Zero-Downtime Shift',
            ],
        ];
    }
};
