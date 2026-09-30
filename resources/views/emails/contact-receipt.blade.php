<x-mail::message>
# Hello {{ $contact->name }},

Thank you for reaching out to **Real Facility Services (RFS)**.

We have received your message regarding **{{ $contact->subject ?: 'your inquiry' }}**. Our facility management specialists are reviewing your request and will contact you within **24 business hours**.

<x-mail::panel>
**Summary of Your Inquiry:**

* **Name:** {{ $contact->name }}
* **Property Type:** {{ $contact->property_type }}
* **Submitted Message:** {{ $contact->message }}
</x-mail::panel>

If you need urgent assistance, please feel free to reach out to us directly:
* 📞 **Phone:** {{ setting('phone', '+91 88105-67716') }}
* 📧 **Email:** {{ setting('email', 'info@ndssecurityservices.com') }}

<x-mail::button :url="config('app.url')">
Visit Our Website
</x-mail::button>

Warm regards,<br>
**Operations Team**<br>
Real Facility Services (RFS)
</x-mail::message>
