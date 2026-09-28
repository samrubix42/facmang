<x-error-page
    code="500"
    icon="ri-bug-line"
    title="Something went wrong on our side"
    description="This one is on us, not you. Our technical team has been notified automatically. Try again in a moment, and if it keeps happening call the operations desk and we'll handle it for you."
    primary-label="Back to home"
    secondary-label="Call the operations desk"
    :secondary-href="'tel:'.setting('phone', '+1 (800) 492-8820')"
    show-phone
/>
