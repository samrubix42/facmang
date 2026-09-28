<x-error-page
    code="422"
    icon="ri-form-warning-line"
    title="Some details need fixing"
    description="A few of the details you sent were incomplete or in the wrong format, so we couldn't process it. Check the highlighted fields and submit again."
    primary-label="Go back and fix the details"
    :primary-href="url()->previous()"
    secondary-label="Contact us"
    :secondary-href="route('contact')"
/>
