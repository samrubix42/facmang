<?php

use Livewire\Component;

new class extends Component
{
    /**
     * @return array<int, array{label: string, href: string, route: string, dropdown?: array<int, array{label: string, description: string, icon: string, href: string, category: string}>}>
     */
    public function navLinks(): array
    {
        return [
            ['label' => 'Home', 'href' => route('home'), 'route' => 'home'],
            ['label' => 'About Us', 'href' => route('about'), 'route' => 'about'],
            [
                'label' => 'Services',
                'href' => route('services'),
                'route' => 'services*',
                'dropdown' => [
                    ['label' => 'All Services', 'href' => route('services'), 'category' => 'all'],
                    ['label' => 'Soft Services', 'href' => route('services', ['category' => 'soft-services']), 'category' => 'soft-services'],
                    ['label' => 'Technical Services', 'href' => route('services', ['category' => 'technical-services']), 'category' => 'technical-services'],
                ],
            ],
            ['label' => 'Gallery', 'href' => route('gallery'), 'route' => 'gallery'],
            ['label' => 'Clients', 'href' => route('clients'), 'route' => 'clients'],
            ['label' => 'Careers', 'href' => route('careers'), 'route' => 'careers'],
            ['label' => 'Contact', 'href' => route('contact'), 'route' => 'contact'],
        ];
    }
};
