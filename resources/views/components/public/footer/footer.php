<?php

use Livewire\Component;

new class extends Component
{
    /**
     * @return array<int, array{label: string, href: string}>
     */
    public function serviceLinks(): array
    {
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
            ['label' => 'Contact Us', 'href' => route('contact')],
        ];
    }
};
