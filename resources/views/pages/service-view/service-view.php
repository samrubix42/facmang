<?php

use App\Mail\ServiceProposalRequestedMail;
use App\Models\Contact;
use App\Models\Service;
use App\Services\ServiceCatalog;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Rule;
use Livewire\Component;

new class extends Component
{
    public string $slug = '';

    public Service $service;

    #[Rule('required|min:3', message: 'Please enter your full name')]
    public string $name = '';

    #[Rule('required|min:7', message: 'Please enter a valid phone number')]
    public string $phone = '';

    #[Rule('required|min:3', message: 'Please enter a subject')]
    public string $subject = '';

    #[Rule('required|min:5', message: 'Please enter details for your request')]
    public string $description = '';

    public bool $submitted = false;

    public function mount(string $slug = ''): void
    {
        $this->slug = $slug;

        $service = null;
        if ($slug !== '') {
            $service = Service::where('slug', $slug)
                ->where('is_active', true)
                ->with('category')
                ->first();
        }

        if (! $service) {
            $service = Service::where('is_active', true)
                ->with('category')
                ->first();
        }

        if (! $service) {
            abort(404, 'Service not found');
        }

        $this->service = $service;
        $this->slug = $service->slug;
    }

    public function submitQuote(): void
    {
        $this->validate();

        Contact::create([
            'name' => $this->name,
            'phone' => $this->phone,
            'subject' => $this->subject,
            'message' => $this->description,
            'property_type' => $this->service->title,
        ]);

        $recipient = config('mail.to_address')
            ?: env('MAIL_TO_ADDRESS')
            ?: env('MAIL_TO')
            ?: config('mail.from.address')
            ?: setting('email');

        if ($recipient) {
            try {
                Mail::to($recipient)->send(
                    new ServiceProposalRequestedMail(
                        name: $this->name,
                        phone: $this->phone,
                        subjectText: $this->subject,
                        description: $this->description,
                        serviceTitle: $this->service->title
                    )
                );
            } catch (Throwable $e) {
                Log::error('Failed to send service proposal request mail: '.$e->getMessage());
            }
        }

        $this->submitted = true;
        $this->reset(['name', 'phone', 'subject', 'description']);
    }

    /**
     * @return Collection<int, Service>
     */
    #[Computed]
    public function relatedServices(): Collection
    {
        return Service::where('is_active', true)
            ->where('id', '!=', $this->service->id)
            ->when($this->service->service_category_id, function ($q) {
                $q->orderByRaw('CASE WHEN service_category_id = ? THEN 0 ELSE 1 END', [$this->service->service_category_id]);
            })
            ->take(3)
            ->get();
    }

    /**
     * @return Collection<int, Service>
     */
    #[Computed]
    public function allServices(): Collection
    {
        return Service::where('is_active', true)
            ->select('id', 'title', 'slug', 'service_category_id')
            ->orderBy('title')
            ->get();
    }

    /**
     * @return array<string, mixed>|null
     */
    #[Computed]
    public function catalogData(): ?array
    {
        return ServiceCatalog::findBySlug($this->service->slug);
    }

    public function render()
    {
        $title = ($this->service->meta_title ?: $this->service->title).' - Real Facility Services';

        return view('pages.service-view.service-view')
            ->title($title);
    }
};
