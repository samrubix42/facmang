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

test('home page displays larger client images without cards and scales them on hover', function () {
    Client::updateOrCreate(
        ['image' => 'images/clients/ace.jpg'],
        [
            'title' => 'Partner ACE',
            'is_active' => true,
            'sort_order' => 1,
        ]
    );

    Livewire::test('pages::home')
        ->assertSeeHtml('max-h-32 max-w-[95%]')
        ->assertSeeHtml('hover:scale-110')
        ->assertSeeHtml('motion-reduce:hover:transform-none');
});

test('home page shows no more than ten client logos', function () {
    foreach (range(1, 11) as $sortOrder) {
        Client::create([
            'title' => 'Client '.$sortOrder,
            'image' => 'images/clients/client-'.$sortOrder.'.jpg',
            'is_active' => true,
            'sort_order' => $sortOrder,
        ]);
    }

    Livewire::test('pages::home')
        ->assertSee('Client 1')
        ->assertSee('Client 10')
        ->assertDontSee('Client 11');
});

test('clients seeder seeds client images correctly', function () {
    $this->seed(ClientsSeeder::class);

    expect(Client::count())->toBeGreaterThan(0);
});
