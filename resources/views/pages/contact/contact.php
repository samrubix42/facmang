<?php

use App\Models\Contact;
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

        Contact::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'property_type' => $this->propertyType,
            'subject' => 'SLA Proposal Request - '.$this->propertyType,
            'message' => $this->message,
            'is_read' => false,
        ]);

        session()->flash('success', 'Your proposal request has been submitted successfully! Our operations director will contact you within 24 hours.');

        $this->submitted = true;

        $this->reset(['name', 'email', 'phone', 'message']);
    }
};
