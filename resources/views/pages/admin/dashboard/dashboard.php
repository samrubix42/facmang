<?php

use App\Models\Client;
use App\Models\Contact;
use App\Models\Gallery;
use App\Models\JobApplication;
use App\Models\JobApplied;
use App\Models\Service;
use App\Models\Setting;
use App\Models\Testimonial;
use Illuminate\Support\Collection;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

new #[Layout('layouts::admin')] #[Title('Command Center - RFS Admin')] class extends Component
{
    /**
     * Headline counters for the metric cards.
     *
     * @return array<string, int>
     */
    #[Computed]
    public function stats(): array
    {
        return [
            'inquiries' => Contact::count(),
            'unread' => Contact::where('is_read', false)->count(),
            'applications' => JobApplied::count(),
            'pending' => JobApplied::where('status', 'pending')->count(),
            'services' => Service::where('is_active', true)->count(),
            'jobs' => JobApplication::where('status', 'active')->count(),
            'gallery' => Gallery::where('is_active', true)->count(),
            'testimonials' => Testimonial::where('is_active', true)->count(),
            'clients' => Client::where('is_active', true)->count(),
        ];
    }

    /**
     * Newest website inquiries, used by the main table.
     */
    #[Computed]
    public function recentInquiries(): Collection
    {
        return Contact::query()
            ->latest('id')
            ->limit(6)
            ->get();
    }

    /**
     * Application counts per hiring stage, always in pipeline order.
     *
     * @return array<int, array{status: string, label: string, total: int}>
     */
    #[Computed]
    public function applicationPipeline(): array
    {
        $counts = JobApplied::query()
            ->selectRaw('status, count(*) as aggregate')
            ->groupBy('status')
            ->pluck('aggregate', 'status');

        $stages = [
            'pending' => 'Pending Review',
            'reviewed' => 'Reviewed',
            'shortlisted' => 'Shortlisted',
            'rejected' => 'Rejected',
        ];

        $pipeline = [];

        foreach ($stages as $status => $label) {
            $pipeline[] = [
                'status' => $status,
                'label' => $label,
                'total' => (int) ($counts[$status] ?? 0),
            ];
        }

        return $pipeline;
    }

    /**
     * Newest job applicants, shown alongside the pipeline.
     */
    #[Computed]
    public function recentApplications(): Collection
    {
        return JobApplied::query()
            ->with('job:id,title')
            ->latest('id')
            ->limit(4)
            ->get();
    }

    /**
     * Control desk number, falling back to the value used sitewide.
     */
    #[Computed]
    public function hotline(): string
    {
        return Setting::getValue('phone', '+1 (800) 492-8820');
    }

    /**
     * Stream the inquiry list as CSV for the audit export button.
     */
    public function exportInquiries()
    {
        return response()->streamDownload(function (): void {
            echo $this->buildInquiryCsv();
        }, 'rfs-inquiries-'.now()->format('Y-m-d').'.csv', [
            'Content-Type' => 'text/csv',
        ]);
    }

    /**
     * Build the inquiry CSV body, chunked so large tables stay memory-safe.
     */
    public function buildInquiryCsv(): string
    {
        $handle = fopen('php://temp', 'w+');

        fputcsv($handle, ['Name', 'Email', 'Phone', 'Property Type', 'Message', 'Read', 'Received']);

        Contact::query()
            ->oldest('id')
            ->chunk(200, function (Collection $contacts) use ($handle): void {
                foreach ($contacts as $contact) {
                    fputcsv($handle, [
                        $this->escapeCsvCell($contact->name),
                        $this->escapeCsvCell($contact->email),
                        $this->escapeCsvCell($contact->phone),
                        $this->escapeCsvCell($contact->property_type),
                        $this->escapeCsvCell($contact->message),
                        $contact->is_read ? 'Yes' : 'No',
                        $contact->created_at?->toDateTimeString(),
                    ]);
                }
            });

        rewind($handle);
        $csv = (string) stream_get_contents($handle);
        fclose($handle);

        return $csv;
    }

    /**
     * Neutralise leading characters that spreadsheet apps treat as formulas.
     */
    private function escapeCsvCell(?string $value): string
    {
        $value = (string) $value;

        if ($value !== '' && str_contains('=+-@', $value[0])) {
            return "'".$value;
        }

        return $value;
    }
};
