<?php

use Livewire\Component;

new class extends Component
{
    /**
     * @return array<int, array{label: string, href: string, route: string}>
     */
    public function navLinks(): array
    {
        return [
            ['label' => 'Home', 'href' => route('home'), 'route' => 'home'],
            ['label' => 'About Us', 'href' => route('about'), 'route' => 'about'],
            ['label' => 'Services', 'href' => route('services'), 'route' => 'services*'],
            ['label' => 'Gallery', 'href' => route('gallery'), 'route' => 'gallery'],
            ['label' => 'Clients', 'href' => route('clients'), 'route' => 'clients'],
            ['label' => 'Careers', 'href' => route('careers'), 'route' => 'careers'],
            ['label' => 'Contact', 'href' => route('contact'), 'route' => 'contact'],
        ];
    }
};
