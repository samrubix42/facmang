<x-mail::message>
# 💼 New Job Application Received

A new job application has been submitted for **{{ $jobApplied->job?->title ?: 'General Application' }}**.

<x-mail::panel>
**Applicant Details**

* **Position:** {{ $jobApplied->job?->title ?: 'General Application' }}
* **Applicant Name:** {{ $jobApplied->name }}
* **Email Address:** {{ $jobApplied->email }}
* **Phone Number:** {{ $jobApplied->phone }}
* **Address:** {{ $jobApplied->address ?: 'Not provided' }}
* **Experience:** {{ $jobApplied->experince ?: 'Not specified' }}
* **Applied Date:** {{ $jobApplied->created_at ? $jobApplied->created_at->format('M d, Y - h:i A') : now()->format('M d, Y - h:i A') }}
@if($jobApplied->resume)
* **Resume:** Attached with this email
@endif
</x-mail::panel>

@if($jobApplied->message)
### 📝 Cover Message / Notes:
> {!! nl2br(e($jobApplied->message)) !!}
@endif

<x-mail::button :url="route('admin.job-applied.index')">
Review Application in Admin
</x-mail::button>

Regards,<br>
**{{ config('app.name', 'Real Facility Services') }} Recruitment System**
</x-mail::message>
