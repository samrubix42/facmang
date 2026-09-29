<?php

use Database\Seeders\ServiceCategorySeeder;
use Database\Seeders\ServiceSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;

uses(RefreshDatabase::class);

beforeEach(function () {
    $this->seed(ServiceCategorySeeder::class);
    $this->seed(ServiceSeeder::class);
});

test('services page renders successfully with status 200', function () {
    $response = $this->get(route('services'));

    $response->assertSuccessful();
    $response->assertSee('Mechanized Cleaning Operations');
    $response->assertSee('Washroom Services');
});

test('service detail page renders successfully for a given slug', function () {
    $response = $this->get(route('services.show', ['slug' => 'mechanized-operations']));

    $response->assertSuccessful();
    $response->assertSee('Mechanized Cleaning Operations');
    $response->assertSee('Service Highlights');
    $response->assertSee('Daily Operational Routine');
});

test('service listing can filter by search and category in livewire', function () {
    Livewire::test('pages::service')
        ->set('category', 'residential-society-management')
        ->assertSee('Residential Society Management')
        ->set('search', 'Pest')
        ->assertSee('Pest Management')
        ->set('search', 'NonExistentServiceXYZ')
        ->assertSee('No matching facility services found');
});

test('service detail quote form validates and submits successfully', function () {
    Livewire::test('pages::service-view', ['slug' => 'washroom-services'])
        ->set('name', 'John Doe')
        ->set('email', 'john@enterprise.com')
        ->set('phone', '+1 555-019-2834')
        ->set('notes', 'Looking for 3 daily rounds')
        ->call('submitQuote')
        ->assertHasNoErrors()
        ->assertSet('submitted', true);
});
