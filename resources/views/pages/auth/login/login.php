<?php

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Component;

new #[Layout('layouts::auth')] #[Title('Sign In - FacilityPro Admin')] class extends Component
{
    #[Rule('required|email', message: 'Please enter a valid work email.')]
    public string $email = '';

    #[Rule('required', message: 'Please enter your password.')]
    public string $password = '';

    public bool $remember = false;

    public function mount(): void
    {
        // For convenience, fill demo credentials if empty
        if (empty($this->email)) {
            $this->email = 'admin@facilitypro.com';
            $this->password = 'password';
        }
    }

    public function authenticate()
    {
        $this->validate();

        if (! Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
            $this->addError('email', 'Invalid credentials provided. Please check and try again.');

            return;
        }

        session()->regenerate();

        return redirect()->intended(route('admin.dashboard'));
    }
};