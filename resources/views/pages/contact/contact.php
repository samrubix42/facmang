<?php

use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Component;

new #[Title('Contact Us & Office Location - Facility Management')] class extends Component
{
    #[Rule('required|min:3')]
    public string $name = '';

    #[Rule('required|email')]
    public string $email = '';

    #[Rule('required')]
    public string $phone = '';

    public string $propertyType = 'Corporate Office Tower';

    #[Rule('required|min:10')]
    public string $message = '';

    public bool $submitted = false;

    public function submit(): void
    {
        $this->validate();

        $this->submitted = true;

        $this->reset(['name', 'email', 'phone', 'message']);
    }
};
