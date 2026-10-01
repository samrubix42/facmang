<?php

use App\Mail\ContactSubmittedMail;
use App\Models\Contact;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Component;

new #[Title('Contact Us & Office Location - Real Facility Services (RFS)')] class extends Component
{
    #[Rule('required|min:3')]
    public string $name = '';

    #[Rule('nullable|email')]
    public string $email = '';

    #[Rule('required')]
    public string $phone = '';

    public string $propertyType = 'Corporate Office Tower';

    #[Rule('required|min:10')]
    public string $message = '';

    public bool $submitted = false;

    public function addcontact(): void
    {
        $this->validate();

        $contact = Contact::create([
            'name' => $this->name,
            'email' => $this->email ?: null,
            'phone' => $this->phone,
            'property_type' => $this->propertyType,
            'subject' => 'Proposal Request - '.$this->propertyType,
            'message' => $this->message,
            'is_read' => false,
        ]);

        $targetEmail = config('mail.to_address');
        if (! empty($targetEmail)) {
            try {
                Mail::to($targetEmail)->send(new ContactSubmittedMail($contact));
            } catch (Throwable $e) {
                Log::error('Failed to send contact admin mail: '.$e->getMessage());
            }
        }

        session()->flash('success', 'Your proposal request has been submitted successfully! Our operations director will contact you within 24 hours.');

        $this->submitted = true;

        $this->reset(['name', 'email', 'phone', 'message']);
    }
};
