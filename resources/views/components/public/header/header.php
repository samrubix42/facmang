<?php

use App\Services\ServiceCatalog;
use Livewire\Component;

new class extends Component
{
    /**
     * @return array<int, array{label: string, href: string, route: string, is_dropdown?: bool}>
     */
    public function navLinks(): array
    {
        return [
            ['label' => 'Home', 'href' => route('home'), 'route' => 'home'],
            ['label' => 'About Us', 'href' => route('about'), 'route' => 'about'],
            ['label' => 'Services', 'href' => route('services'), 'route' => 'services*', 'is_dropdown' => true],
            ['label' => 'Why Us', 'href' => route('home').'#why-us', 'route' => 'why-us'],
            ['label' => 'Gallery', 'href' => route('gallery'), 'route' => 'gallery'],
            ['label' => 'Careers', 'href' => route('careers'), 'route' => 'careers'],
            ['label' => 'Contact', 'href' => route('contact'), 'route' => 'contact'],
        ];
    }

    public function services()
    {
        $services = \App\Models\Service::where('is_active', true)->with('category')->take(6)->get();

        if ($services->isNotEmpty()) {
            return $services;
        }

        return ServiceCatalog::all();
    }
};
