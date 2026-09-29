<?php

use App\Models\Service;
use Livewire\Component;

new class extends Component
{
    /**
     * @return array<int, array{label: string, href: string}>
     */
    public function serviceLinks(): array
    {
        $services = Service::where('is_active', true)->take(5)->get();

        if ($services->isNotEmpty()) {
            return $services->map(fn ($s) => [
                'label' => $s->title,
                'href' => route('services.show', ['slug' => $s->slug]),
            ])->all();
        }

        return [
            ['label' => 'Mechanized Cleaning Operations', 'href' => route('services.show', ['slug' => 'mechanized-operations'])],
            ['label' => 'Washroom Services', 'href' => route('services.show', ['slug' => 'washroom-services'])],
            ['label' => 'Deep Cleaning Services', 'href' => route('services.show', ['slug' => 'deep-cleaning-services'])],
            ['label' => 'Landscaping', 'href' => route('services.show', ['slug' => 'landscaping'])],
            ['label' => 'Pest Management', 'href' => route('services.show', ['slug' => 'pest-management'])],
        ];
    }

    /**
     * @return array<int, array{label: string, href: string}>
     */
    public function companyLinks(): array
    {
        return [
            ['label' => 'About Us', 'href' => route('about')],
            ['label' => 'Why Choose Us', 'href' => route('home').'#why-us'],
            ['label' => 'Our Services', 'href' => route('services')],
            ['label' => 'Project Gallery', 'href' => route('gallery')],
            ['label' => 'Our Clients', 'href' => route('clients')],
            ['label' => 'Careers & Jobs', 'href' => route('careers')],
            ['label' => 'Contact Us', 'href' => route('contact')],
        ];
    }
};
