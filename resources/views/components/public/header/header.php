<?php

use Livewire\Component;

new class extends Component
{
    /**
     * @return array<int, array{label: string, href: string}>
     */
    public function navLinks(): array
    {
        return [
            ['label' => 'Home', 'href' => route('home')],
            ['label' => 'About', 'href' => route('home').'#about'],
            ['label' => 'Services', 'href' => route('home').'#services'],
            ['label' => 'Why Us', 'href' => route('home').'#why-us'],
            ['label' => 'Contact', 'href' => route('home').'#contact'],
        ];
    }
};
