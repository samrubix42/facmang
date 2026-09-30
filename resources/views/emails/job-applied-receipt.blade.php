
<x-mail::message>
# Dear {{ $jobApplied->name }},

Thank you for your interest in joining **Real Facility Services (RFS)**!

We have successfully received your application for the position of **{{ $jobApplied->job?->title ?: 'Facilities Team Member' }}**.

<x-mail::panel>
**Application Summary:**

* **Position:** {{ $jobApplied->job?->title ?: 'General Application' }}
* **Name:** {{ $jobApplied->name }}
* **Email:** {{ $jobApplied->email }}
* **Phone:** {{ $jobApplied->phone }}
* **Experience:** {{ $jobApplied->experince ?: 'N/A' }}
</x-mail::panel>

### What happens next?
Our Human Resources team will evaluate your profile against our current requirements. If your qualification matches the role, our hiring team will contact you to schedule an initial discussion.

Thank you again for applying to Real Facility Services.

Best of luck,<br>
**Human Resources Team**<br>
Real Facility Services (RFS)
</x-mail::message>
