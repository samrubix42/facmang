<x-error-page
    code="401"
    icon="ri-lock-line"
    title="Please sign in to continue"
    description="This part of the site is only available to signed-in users. Sign in and you will come straight back to where you were."
    primary-label="Go to sign in"
    :primary-href="route('login')"
    secondary-label="Back to home"
    :secondary-href="route('home')"
/>
