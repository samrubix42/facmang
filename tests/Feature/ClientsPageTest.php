<?php

use App\Models\Client;
use Database\Seeders\ClientsSeeder;
use Livewire\Livewire;

test('clients page renders successfully with status 200', function () {
    $response = $this->get(route('clients'));

    $response->assertSuccessful();
    $response->assertSee('Our Clients');
    $response->assertSee('The businesses that trust us with their buildings');

});

test('clients page renders client images from database', function () {
    Client::updateOrCreate(
        ['image' => 'images/clients/ace.jpg'],
        [
            'title' => 'Partner ACE',
            'is_active' => true,
            'sort_order' => 1,
        ]
    );

    Livewire::test('pages::clients')
        ->assertSee('images/clients/ace.jpg')
        ->assertStatus(200);
});

test('clients seeder seeds client images correctly', function () {
    $this->seed(ClientsSeeder::class);

    expect(Client::count())->toBeGreaterThan(0);
});
