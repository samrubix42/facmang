<x-error-page
    code="419"
    icon="ri-time-line"
    title="Your session timed out"
    description="For your security the page closed after a period of inactivity, so nothing was submitted. Reload the page and fill the form in again — it only takes a moment."
    primary-label="Go back and try again"
    :primary-href="url()->previous()"
    secondary-label="Back to home"
/>
