<?php

use App\Models\Contact;
use App\Models\User;
use Livewire\Livewire;

test('public contact form submits successfully and saves inquiry to database', function () {
    Livewire::test('pages::contact')
        ->set('name', 'John Smith')
        ->set('email', 'jsmith@enterprise.com')
        ->set('phone', '+1 (555) 123-4567')
        ->set('propertyType', 'Corporate Office Tower')
        ->set('message', 'Requesting an on-site spatial audit and SLA proposal.')
        ->call('submit')
        ->assertSet('submitted', true);

    expect(Contact::count())->toBe(1);

    $contact = Contact::first();
    expect($contact->name)->toBe('John Smith');
    expect($contact->email)->toBe('jsmith@enterprise.com');
    expect($contact->phone)->toBe('+1 (555) 123-4567');
    expect($contact->property_type)->toBe('Corporate Office Tower');
    expect($contact->is_read)->toBeFalse();
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
