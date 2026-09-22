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
            ['label' => 'Building Maintenance', 'href' => route('home').'#services'],
            ['label' => 'Janitorial & Cleaning', 'href' => route('home').'#services'],
            ['label' => 'Security Services', 'href' => route('home').'#services'],
            ['label' => 'Energy Management', 'href' => route('home').'#services'],
            ['label' => 'Grounds & Landscaping', 'href' => route('home').'#services'],
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
            ['label' => 'Our Services', 'href' => route('home').'#services'],
            ['label' => 'Get a Quote', 'href' => route('home').'#contact'],
        ];
    }
};
