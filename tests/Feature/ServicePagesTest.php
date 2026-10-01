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

test('home page displays active services with their saved photos', function () {
    $response = $this->get(route('home'));

    $response->assertSuccessful();
    $response->assertSee('Mechanized Cleaning Operations');
    $response->assertSee('images/services/mechanized_operations.webp');
    $response->assertDontSee('Residential Society Management');
    $response->assertDontSee('Manufacturing Sector Services');
});

test('service detail page renders successfully for a given slug', function () {
    $response = $this->get(route('services.show', ['slug' => 'mechanized-operations']));

    $response->assertSuccessful();
    $response->assertSee('Mechanized Cleaning Operations');
    $response->assertSee('Key Points');
});

test('service listing can filter by search and category in livewire', function () {
    Livewire::test('pages::service')
        ->set('category', 'soft-services')
        ->assertSee('Residential Society Management')
        ->set('search', 'Pest')
        ->assertSee('Pest Management')
        ->set('search', 'NonExistentServiceXYZ')
        ->assertSee('No matching facility services found');
});

test('service detail quote form validates and submits successfully', function () {
    Livewire::test('pages::service-view', ['slug' => 'washroom-services'])
        ->set('name', 'John Doe')
        ->set('phone', '+91 98765 43210')
        ->set('subject', 'Washroom Hygiene Inquiry')
        ->set('description', 'Looking for 3 daily rounds of washroom care.')
        ->call('submitQuote')
        ->assertHasNoErrors()
        ->assertSet('submitted', true);
});
