<?php

use App\Models\Setting;
use Livewire\Attributes\Title;
use Livewire\Component;

new #[Title('Site Settings - Admin Console')] class extends Component
{
    public string $company_name = '';

    public string $email = '';

    public string $phone = '';

    public string $whatsapp = '';

    public string $address = '';

    public string $google_map_link = '';

    public string $facebook = '';

    public string $twitter = '';

    public string $instagram = '';

    public string $linkedin = '';

    public string $youtube = '';

    public bool $saved = false;

    public function mount(): void
    {
        $this->company_name = (string) setting('company_name', 'FacilityPro Management Inc.');
        $this->email = (string) setting('email', 'ops@facilitypro.com');
        $this->phone = (string) setting('phone', '+1 (800) 492-8820');
        $this->whatsapp = (string) setting('whatsapp', '+1 (800) 492-8820');
        $this->address = (string) setting('address', '100 Enterprise Plaza, Suite 400, Financial District');
        $this->google_map_link = (string) setting('google_map_link', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3151.83543450937!2d144.95373631531825!3d-37.81627977975171!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad65d4c2b349649%3A0xb6899234e561db11!2sEnvato!5e0!3m2!1sen!2s');
        $this->facebook = (string) setting('facebook', 'https://facebook.com');
        $this->twitter = (string) setting('twitter', 'https://twitter.com');
        $this->instagram = (string) setting('instagram', 'https://instagram.com');
        $this->linkedin = (string) setting('linkedin', 'https://linkedin.com');
        $this->youtube = (string) setting('youtube', 'https://youtube.com');
    }

    public function save(): void
    {
        $this->validate([
            'company_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:50',
            'whatsapp' => 'nullable|string|max:50',
            'address' => 'nullable|string|max:500',
            'google_map_link' => 'nullable|string',
            'facebook' => 'nullable|url|max:255',
            'twitter' => 'nullable|url|max:255',
            'instagram' => 'nullable|url|max:255',
            'linkedin' => 'nullable|url|max:255',
            'youtube' => 'nullable|url|max:255',
        ]);

        Setting::setValue('company_name', $this->company_name);
        Setting::setValue('email', $this->email);
        Setting::setValue('phone', $this->phone);
        Setting::setValue('whatsapp', $this->whatsapp);
        Setting::setValue('address', $this->address);
        Setting::setValue('google_map_link', $this->google_map_link);
        Setting::setValue('facebook', $this->facebook);
        Setting::setValue('twitter', $this->twitter);
        Setting::setValue('instagram', $this->instagram);
        Setting::setValue('linkedin', $this->linkedin);
        Setting::setValue('youtube', $this->youtube);

        $this->saved = true;
    }
};
