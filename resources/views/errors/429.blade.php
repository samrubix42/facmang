<x-error-page
    code="429"
    icon="ri-speed-up-line"
    title="Too many requests"
    description="You've sent more requests than we're able to handle in a short window. Wait a minute and try again — and if this is urgent, the operations desk line is answered around the clock."
    primary-label="Try again"
    :primary-href="request()->fullUrl()"
    secondary-label="Call the operations desk"
    :secondary-href="'tel:'.setting('phone', '+1 (800) 492-8820')"
    show-phone
/>
