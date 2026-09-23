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
            ['label' => 'Office Cleaning & Sweeping', 'href' => route('home').'#services'],
            ['label' => 'Restroom & Toilet Hygiene', 'href' => route('home').'#services'],
            ['label' => 'Office Boy & Pantry Support', 'href' => route('home').'#services'],
            ['label' => 'Deep Disinfection Blitz', 'href' => route('home').'#services'],
            ['label' => 'MEP & HVAC Maintenance', 'href' => route('home').'#services'],
        ];
    }

    /**
     * @return array<int, array{label: string, href: string}>
     */
    public function companyLinks(): array
    {
        return [
            ['label' => 'About Us', 'href' => route('home').'#about'],
            ['label' => 'Why Choose Us', 'href' => route('home').'#why-us'],
            ['label' => 'SLA & Standards', 'href' => route('home').'#services'],
            ['label' => 'Scope Calculator', 'href' => route('home').'#calculator'],
            ['label' => 'Request Quote', 'href' => route('home').'#contact'],
        ];
    }
};
