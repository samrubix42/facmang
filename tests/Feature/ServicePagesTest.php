<?php

use App\Models\Testimonial;
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
    $response->assertSee('images/slider/PIC_4905.webp');
    $response->assertSee('images/slider/PIC_4914.webp');
    $response->assertSee('images/slider/PIC_4920.webp');
    $response->assertSee('images/slider/PIC_4921.webp');
    $response->assertDontSee('images/slider/hero_slide_1.webp');
    $response->assertDontSee('images/slider/hero_slide_2.webp');
    $response->assertDontSee('images/slider/hero_slide_3.webp');
    $response->assertDontSee('images/slider/hero_slide_4.webp');
    $response->assertDontSee('images/slider/hero_slide_5.webp');
    $response->assertSee('4+ Years With Residential Societies');
    $response->assertDontSee('Residential Society Management');
    $response->assertDontSee('Manufacturing Sector Services');
});

test('public pages describe four years of company experience', function () {
    $this->get(route('home'))
        ->assertSee('more than four years of experience');

    $this->get(route('about'))
        ->assertSee('more than four years.')
        ->assertSee('countUp(4, 0)', false);
});

test('home page displays four-year experience from active testimonials', function () {
    Testimonial::factory()->create([
        'testimonial' => 'RFS has managed our corporate towers for over four years.',
    ]);

    $this->get(route('home'))
        ->assertSee('over four years');
});

test('home testimonials show first name and last initial without designation', function () {
    Testimonial::factory()->create([
        'name' => 'Dr. Rajesh Menon',
        'designation' => 'President, Green Meadows RWA',
        'testimonial' => 'A sample testimonial from our residential client.',
    ]);

    $this->get(route('home'))
        ->assertSee('Rajesh M.')
        ->assertDontSee('Dr. Rajesh Menon')
        ->assertDontSee('President, Green Meadows RWA');
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
