<?php

use Livewire\Component;

new class extends Component
{
    /**
     * @return array<int, array{label: string, href: string}>
     */
    public function serviceLinks(): array
    {
        $services = \App\Models\Service::where('is_active', true)->take(6)->get();

        if ($services->isNotEmpty()) {
            return $services->map(fn ($s) => [
                'label' => $s->title,
                'href' => route('services.show', ['slug' => $s->slug]),
            ])->all();
        }

        return [
            ['label' => 'Office Cleaning & Sweeping', 'href' => route('services.show', ['slug' => 'office-sweeping-cleaning'])],
            ['label' => 'Restroom & Toilet Hygiene', 'href' => route('services.show', ['slug' => 'restroom-hygiene-sanitation'])],
            ['label' => 'Office Boy & Pantry Support', 'href' => route('services.show', ['slug' => 'corporate-pantry-staffing'])],
            ['label' => 'Deep Disinfection Blitz', 'href' => route('services.show', ['slug' => 'deep-disinfection-sanitization'])],
            ['label' => 'MEP & HVAC Maintenance', 'href' => route('services.show', ['slug' => 'mep-hvac-maintenance'])],
            ['label' => 'High-Rise Facade Care', 'href' => route('services.show', ['slug' => 'architectural-facade-cleaning'])],
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
            ['label' => 'SLA & Standards', 'href' => route('home').'#services'],
            ['label' => 'Scope Calculator', 'href' => route('home').'#calculator'],
            ['label' => 'Project Gallery', 'href' => route('gallery')],
            ['label' => 'Our Clients', 'href' => route('clients')],
            ['label' => 'Careers & Jobs', 'href' => route('careers')],
            ['label' => 'Contact Us', 'href' => route('contact')],
        ];
    }
};
