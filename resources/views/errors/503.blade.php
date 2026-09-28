<x-error-page
    code="503"
    icon="ri-tools-line"
    title="We're down for maintenance"
    description="We're carrying out planned maintenance and will be back online shortly. Nothing you did caused this, and no information has been lost. If it is urgent, our operations desk is still reachable by phone."
    primary-label="Back to home"
    secondary-label="Call the operations desk"
    :secondary-href="'tel:'.setting('phone', '+1 (800) 492-8820')"
    show-phone
/>
