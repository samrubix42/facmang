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
            ->take(10)
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
                'name' => $this->formatTestimonialName($item->name),
                'rating' => $item->rating,
                'metric' => 'Verified Client',
            ])->all();
        }

        return [
            [
                'quote' => 'Our society earlier ran on three different vendors and nobody answered after 8pm. Real Facility Services took over housekeeping, horticulture, technical and security on one contract, and the handover happened without a single service gap.',
                'name' => 'Rajesh M.',
                'rating' => 5,
                'metric' => '4+ Yrs Managed',
            ],
            [
                'quote' => 'RFS has run our commercial complex for over four years. Their trained in-house technicians and 24x7 desk mean an escalator fault at 11pm is closed before our staff even notice it.',
                'name' => 'Anita D.',
                'rating' => 5,
                'metric' => '24x7 Support',
            ],
            [
                'quote' => 'The transition consultancy was the most professional handover we have been through. Vendor selection, rosters, documentation and compliance were all ready before we signed.',
                'name' => 'Sameer K.',
                'rating' => 5,
                'metric' => 'Zero-Downtime Shift',
            ],
        ];
    }

    private function formatTestimonialName(string $name): string
    {
        $name = preg_replace('/^(?:Dr|Mr|Mrs|Ms)\.?\s+/i', '', trim($name)) ?? trim($name);
        $nameParts = preg_split('/\s+/', $name, flags: PREG_SPLIT_NO_EMPTY);

        if (count($nameParts) < 2) {
            return $nameParts[0] ?? '';
        }

        return $nameParts[0].' '.mb_substr($nameParts[array_key_last($nameParts)], 0, 1).'.';
    }
};
