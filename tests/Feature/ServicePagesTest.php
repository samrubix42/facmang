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
    $response->assertSee('Commercial Sweeping & Office Cleaning');
    $response->assertSee('Restroom & Washroom Hygiene Sanitation');
});

test('service detail page renders successfully for a given slug', function () {
    $response = $this->get(route('services.show', ['slug' => 'office-sweeping-cleaning']));

    $response->assertSuccessful();
    $response->assertSee('Commercial Sweeping & Office Cleaning');
    $response->assertSee('Industrial Sweeping, Floor Scrubbing & Diamond Marble Polish');
    $response->assertSee('Daily Operational Routine');
});

test('service listing can filter by search and category in livewire', function () {
    Livewire::test('pages::service')
        ->set('category', 'staffing')
        ->assertSee('Corporate Office Boy & Pantry Staffing')
        ->set('search', 'Pantry')
        ->assertSee('Corporate Office Boy & Pantry Staffing')
        ->set('search', 'NonExistentServiceXYZ')
        ->assertSee('No matching facility services found');
});

test('service detail quote form validates and submits successfully', function () {
    Livewire::test('pages::service-view', ['slug' => 'restroom-hygiene-sanitation'])
        ->set('name', 'John Doe')
        ->set('email', 'john@enterprise.com')
        ->set('phone', '+1 555-019-2834')
        ->set('notes', 'Looking for 3 daily rounds')
        ->call('submitQuote')
        ->assertHasNoErrors()
        ->assertSet('submitted', true);
});
