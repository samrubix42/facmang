<x-mail::message>
# New Service Proposal Request

You have received a new proposal request from the website.

**Service:** {{ $serviceTitle }}  
**Name:** {{ $name }}  
**Phone:** {{ $phone }}  
**Subject:** {{ $subjectText }}  

### Description / Requirements
{{ $description }}

<x-mail::button :url="config('app.url')">
Visit Website
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
