<x-mail::message>
# 📥 New Contact Inquiry Received

A new message has been submitted through the **Real Facility Services** website contact form.

<x-mail::panel>
**Inquiry Details**

* **Full Name:** {{ $contact->name }}
* **Email Address:** {{ $contact->email ?: 'N/A' }}
* **Phone Number:** {{ $contact->phone ?: 'N/A' }}
* **Property Type:** {{ $contact->property_type ?: 'General' }}
* **Subject:** {{ $contact->subject ?: 'No subject specified' }}
* **Date & Time:** {{ $contact->created_at ? $contact->created_at->format('M d, Y - h:i A') : now()->format('M d, Y - h:i A') }}
</x-mail::panel>

### 💬 Message Content:
> {!! nl2br(e($contact->message)) !!}

<x-mail::button :url="route('admin.contacts.index')">
View in Admin Panel
</x-mail::button>

Regards,<br>
**{{ config('app.name', 'Real Facility Services') }}**
</x-mail::message>
