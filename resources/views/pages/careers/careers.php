<?php

namespace App\Livewire\Pages;

use App\Mail\JobAppliedMail;
use App\Models\JobApplication;
use App\Models\JobApplied;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

new #[Title('Careers - Join Our Operations Team - Real Facility Services')] class extends Component
{
    use WithFileUploads;

    public string $applicantName = '';

    public string $applicantEmail = '';

    public string $applicantPhone = '';

    public ?int $selectedJobId = null;

    public string $selectedJob = '';

    public string $experience = '';

    public string $shift = 'Day Shift';

    public string $address = '';

    public string $message = '';

    public $resume = null;

    public bool $submitted = false;

    public function mount(): void
    {
        $firstJob = JobApplication::where('status', 'active')->first();
        if ($firstJob) {
            $this->selectedJobId = $firstJob->id;
            $this->selectedJob = $firstJob->title;
        }
    }

    public function updatedSelectedJobId(?int $id): void
    {
        if ($id) {
            $job = JobApplication::find($id);
            if ($job) {
                $this->selectedJob = $job->title;
                $this->submitted = false;
            }
        }
    }

    public function selectPosition(int $id, string $title): void
    {
        $this->selectedJobId = $id;
        $this->selectedJob = $title;
        $this->submitted = false;
    }

    public function removeResume(): void
    {
        $this->resume = null;
    }

    public function resetSubmission(): void
    {
        $this->submitted = false;
    }

    #[Computed]
    public function activeJob(): ?JobApplication
    {
        if ($this->selectedJobId) {
            return JobApplication::find($this->selectedJobId);
        }

        return null;
    }

    /**
     * @return array<string, array<string, string>>
     */
    protected function rules(): array
    {
        return [
            'applicantName' => ['required', 'string', 'min:2', 'max:100'],
            'applicantEmail' => ['nullable', 'email', 'max:150'],
            'applicantPhone' => ['required', 'string', 'min:7', 'max:30'],
            'selectedJobId' => ['nullable', 'exists:job_applications,id'],
            'experience' => ['nullable', 'string'],
            'shift' => ['required', 'string'],
            'address' => ['nullable', 'string', 'max:255'],
            'message' => ['nullable', 'string', 'max:1000'],
            'resume' => ['required', 'file', 'mimes:pdf,doc,docx', 'max:10240'],

        ];
    }

    public function apply(): void
    {
        $this->validate();

        $resumePath = null;
        if ($this->resume) {
            $resumePath = $this->resume->store('resumes', 'public');
        }

        $jobApplied = JobApplied::create([
            'job_id' => $this->selectedJobId,
            'name' => $this->applicantName,
            'email' => $this->applicantEmail ?: null,
            'phone' => $this->applicantPhone,
            'address' => $this->address ?: null,
            'resume' => $resumePath,
            'message' => $this->message ?: null,
            'experince' => $this->experience,
            'status' => 'pending',
        ]);

        $targetEmail = config('mail.to_address');
        if (! empty($targetEmail)) {
            try {
                Mail::to($targetEmail)->send(new JobAppliedMail($jobApplied));
            } catch (\Throwable $e) {
                Log::error('Failed to send career application admin mail: '.$e->getMessage());
            }
        }

        $this->submitted = true;

        $this->dispatch('toast-show', [
            'message' => 'Thank you, '.$this->applicantName.'! Your application'.($this->selectedJob ? ' for '.$this->selectedJob : '').' has been received.',
            'type' => 'success',
            'position' => 'top-right',
        ]);

        $this->reset(['applicantName', 'applicantEmail', 'applicantPhone', 'address', 'experience', 'message', 'resume']);
    }

    /**
     * @return Collection<int, JobApplication>
     */
    #[Computed]
    public function jobs(): Collection
    {
        return JobApplication::where('status', 'active')->latest()->get();
    }

    /**
     * @return array<int, string>
     */
    #[Computed]
    public function departments(): array
    {
        return JobApplication::where('status', 'active')
            ->distinct()
            ->pluck('department')
            ->filter()
            ->values()
            ->all();
    }
};
