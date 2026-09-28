<x-error-page
    code="403"
    icon="ri-forbidden-line"
    title="You don't have access to this area"
    description="Your account is signed in, but it isn't permitted to view this page. If you believe that is wrong, ask your administrator to review your access and we will sort it out."
    primary-label="Back to home"
    secondary-label="Contact us"
    :secondary-href="route('contact')"
/>
