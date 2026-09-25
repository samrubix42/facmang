<?php

use App\Models\Client;
use Livewire\Livewire;

test('clients page renders successfully with status 200', function () {
    $response = $this->get(route('clients'));

    $response->assertSuccessful();
    $response->assertSee('Our Valued Clients');
    $response->assertSee('Enterprise Facility Partnerships');
});

test('clients page renders client images from database', function () {
    Client::updateOrCreate(
        ['image' => 'images/clients/01-1-150x150.jpg'],
        [
            'title' => 'Partner 01',
            'is_active' => true,
            'sort_order' => 1,
        ]
    );

    Livewire::test('pages::clients')
        ->assertSee('images/clients/01-1-150x150.jpg')
        ->assertStatus(200);
});
