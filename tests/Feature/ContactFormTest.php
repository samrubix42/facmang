<?php

use App\Mail\ContactSubmittedMail;
use App\Models\Contact;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Livewire\Livewire;

test('public contact form submits successfully and saves inquiry to database', function () {
    Livewire::test('pages::contact')
        ->assertSeeHtml('wire:submit.prevent="addcontact"')
        ->assertSeeHtml('type="submit"')
        ->set('name', 'John Smith')
        ->set('email', 'jsmith@enterprise.com')
        ->set('phone', '+1 (555) 123-4567')
        ->set('propertyType', 'Corporate Office Tower')
        ->set('message', 'Requesting an on-site spatial audit and facility proposal.')
        ->call('addcontact')
        ->assertSet('submitted', true);

    expect(Contact::count())->toBe(1);

    $contact = Contact::first();
    expect($contact->name)->toBe('John Smith');
    expect($contact->email)->toBe('jsmith@enterprise.com');
    expect($contact->phone)->toBe('+1 (555) 123-4567');
    expect($contact->property_type)->toBe('Corporate Office Tower');
    expect($contact->is_read)->toBeFalse();
});

test('contact page uses the configured map embed link for the map and directions', function () {
    $mapUrl = 'https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3502.6540133758394!2d77.42513697549995!3d28.610154575677!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMjjCsDM2JzM2LjYiTiA3N8KwMjUnMzkuOCJF!5e0!3m2!1sen!2sin!4v1792579945736!5m2!1sen!2sin';

    Setting::updateOrCreate(
        ['key' => 'google_map_link'],
        ['value' => $mapUrl]
    );

    $this->get(route('contact'))
        ->assertSee('src="'.$mapUrl.'"', false)
        ->assertSee('href="'.$mapUrl.'"', false)
        ->assertSee('referrerpolicy="strict-origin-when-cross-origin"', false)
        ->assertSee('lg:grid-cols-3')
        ->assertSee('sm:p-8')
        ->assertDontSee('Office Timings')
        ->assertDontSee('Sunday Closed');
});

test('contact form sends email notification to target email when submitted', function () {
    Mail::fake();

    Livewire::test('pages::contact')
        ->set('name', 'John Smith')
        ->set('email', 'jsmith@enterprise.com')
        ->set('phone', '+1 (555) 123-4567')
        ->set('propertyType', 'Corporate Office Tower')
        ->set('message', 'Requesting an on-site spatial audit and facility proposal.')
        ->call('addcontact')
        ->assertSet('submitted', true);

    Mail::assertSent(ContactSubmittedMail::class, function ($mail) {
        return $mail->hasTo('samcool3203@gmail.com') && $mail->contact->email === 'jsmith@enterprise.com';
    });

    test('contact form can be submitted without an email address', function () {
        Mail::fake();

        Livewire::test('pages::contact')
            ->set('name', 'John Smith')
            ->set('phone', '+1 (555) 123-4567')
            ->set('propertyType', 'Corporate Office Tower')
            ->set('message', 'Requesting an on-site spatial audit and facility proposal.')
            ->call('addcontact')
            ->assertHasNoErrors()
            ->assertSet('submitted', true);

        expect(Contact::first()->email)->toBeNull();

        Mail::assertSent(ContactSubmittedMail::class, function ($mail) {
            return $mail->envelope()->replyTo === [];
        });
    });
});

test('contact form does not send admin mail if target email is empty', function () {
    Mail::fake();
    config(['mail.to_address' => null]);

    Livewire::test('pages::contact')
        ->set('name', 'John Smith')
        ->set('email', 'jsmith@enterprise.com')
        ->set('phone', '+1 (555) 123-4567')
        ->set('propertyType', 'Corporate Office Tower')
        ->set('message', 'Requesting an on-site spatial audit and facility proposal.')
        ->call('addcontact');

    Mail::assertNotSent(ContactSubmittedMail::class);
});

test('admin contacts management renders inquiries list and toggles read status', function () {
    $user = User::factory()->create();
    $contact = Contact::factory()->create(['is_read' => false]);

    Livewire::actingAs($user)
        ->test('admin::contact')
        ->assertSee($contact->name)
        ->call('toggleRead', $contact->id);

    expect($contact->fresh()->is_read)->toBeTrue();
});

test('admin contacts management opens detail modal and deletes inquiry', function () {
    $user = User::factory()->create();
    $contact = Contact::factory()->create(['is_read' => false]);

    Livewire::actingAs($user)
        ->test('admin::contact')
        ->call('viewDetails', $contact->id)
        ->assertSet('showViewModal', true)
        ->assertSet('selectedContact.id', $contact->id);

    expect($contact->fresh()->is_read)->toBeTrue();

    Livewire::actingAs($user)
        ->test('admin::contact')
        ->call('confirmDelete', $contact->id)
        ->call('delete');

    expect(Contact::find($contact->id))->toBeNull();
});
