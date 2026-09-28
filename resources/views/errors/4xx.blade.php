@php
    $status = (int) ($exception?->getStatusCode() ?: 400);
@endphp

<x-error-page
    :code="$status"
    icon="ri-error-warning-line"
    title="That request couldn't be completed"
    description="The page you asked for can't be shown. The address may be mistyped, the link may be outdated, or the request may not be supported here."
    primary-label="Back to home"
    secondary-label="Browse our services"
/>
