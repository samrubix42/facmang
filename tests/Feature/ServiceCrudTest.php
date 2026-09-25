<?php

use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\User;
use Database\Seeders\ServiceSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Livewire\Livewire;

uses(RefreshDatabase::class);

test('unauthenticated user cannot access service list page', function () {
    $response = $this->get(route('admin.services.index'));

    $response->assertRedirect(route('login'));
});

test('unauthenticated user cannot access service create page', function () {
    $response = $this->get(route('admin.services.create'));

    $response->assertRedirect(route('login'));
});

test('authenticated user can view service list page', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->get(route('admin.services.index'));

    $response->assertSuccessful();
    $response->assertSee('Services Management');
    $response->assertSee('Add Service');
});

test('authenticated user can view service create page', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->get(route('admin.services.create'));

    $response->assertSuccessful();
    $response->assertSee('Create New Service');
    $response->assertSee('Save Service');
    $response->assertSee('Meta Keywords');
});

test('authenticated user can view service update page', function () {
    $user = User::factory()->create();
    $category = ServiceCategory::factory()->create();
    $service = Service::factory()->create(['service_category_id' => $category->id]);

    $response = $this->actingAs($user)->get(route('admin.services.edit', $service->id));

    $response->assertSuccessful();
    $response->assertSee('Edit: '.$service->title);
    $response->assertSee('Update Service');
    $response->assertSee('Meta Keywords');
});

test('service seeder correctly populates records', function () {
    $this->seed(ServiceSeeder::class);

    expect(Service::count())->toBeGreaterThanOrEqual(1);
    expect(ServiceCategory::count())->toBeGreaterThanOrEqual(1);
});

test('user can save new service on add page', function () {
    $user = User::factory()->create();
    $category = ServiceCategory::factory()->create();

    $fakeImage = UploadedFile::fake()->image('cleaning.jpg', 600, 400);

    Livewire::actingAs($user)
        ->test('admin::service.add')
        ->set('service_category_id', $category->id)
        ->set('title', 'Robotic Solar Panel Cleaning')
        ->set('slug', 'robotic-solar-panel-cleaning')
        ->set('image', $fakeImage)
        ->set('is_active', true)
        ->set('short_description', 'Automated robotic cleaning systems for commercial rooftop photovoltaic solar arrays.')
        ->set('content', 'Full SLA coverage with thermal inspection and water recovery.')
        ->set('meta_title', 'Solar Array Cleaning | FacilityPro')
        ->set('meta_description', 'High-efficiency robotic solar cleaning for industrial parks.')
        ->set('meta_keyword', 'solar, robotic, industrial, maintenance')
        ->call('save', false)
        ->assertHasNoErrors()
        ->assertRedirect(route('admin.services.index'));

    $this->assertDatabaseHas('services', [
        'title' => 'Robotic Solar Panel Cleaning',
        'slug' => 'robotic-solar-panel-cleaning',
        'service_category_id' => $category->id,
        'is_active' => true,
    ]);
});

test('validation prevents duplicate slug on services', function () {
    $user = User::factory()->create();
    $category = ServiceCategory::factory()->create();

    Service::factory()->create([
        'slug' => 'existing-service-slug',
    ]);

    $fakeImage = UploadedFile::fake()->image('test.jpg');

    Livewire::actingAs($user)
        ->test('admin::service.add')
        ->set('service_category_id', $category->id)
        ->set('title', 'Another Service')
        ->set('slug', 'existing-service-slug')
        ->set('image', $fakeImage)
        ->set('short_description', 'Some description.')
        ->call('save', false)
        ->assertHasErrors(['slug']);
});

test('user can update service on update page', function () {
    $user = User::factory()->create();
    $category = ServiceCategory::factory()->create();
    $service = Service::factory()->create([
        'service_category_id' => $category->id,
        'title' => 'Old Service Title',
        'slug' => 'old-service-title',
    ]);

    Livewire::actingAs($user)
        ->test('admin::service.update', ['service' => $service])
        ->assertSet('title', 'Old Service Title')
        ->set('title', 'Updated Enterprise Service')
        ->set('short_description', 'Updated description content for test.')
        ->call('save')
        ->assertHasNoErrors();

    expect($service->fresh()->title)->toBe('Updated Enterprise Service');
});

test('user can save and update rich html content in content column', function () {
    $user = User::factory()->create();
    $category = ServiceCategory::factory()->create();
    $fakeImage = UploadedFile::fake()->image('test-tinymce.jpg');

    $htmlContent = '<h3>Service Inclusions</h3><ul><li>24/7 Monitoring</li><li>Thermal Imaging</li></ul><p>Guaranteed 99.9% uptime SLA.</p>';

    Livewire::actingAs($user)
        ->test('admin::service.add')
        ->set('service_category_id', $category->id)
        ->set('title', 'Smart Facilities IoT')
        ->set('slug', 'smart-facilities-iot')
        ->set('image', $fakeImage)
        ->set('short_description', 'IoT building sensors and predictive failure telemetry.')
        ->set('content', $htmlContent)
        ->call('save', false)
        ->assertHasNoErrors();

    $service = Service::where('slug', 'smart-facilities-iot')->first();
    expect($service)->not->toBeNull();
    expect($service->content)->toBe($htmlContent);

    $updatedHtml = '<h3>Updated Inclusions</h3><p>Additional coverage terms.</p>';

    Livewire::actingAs($user)
        ->test('admin::service.update', ['service' => $service])
        ->assertSet('content', $htmlContent)
        ->set('content', $updatedHtml)
        ->call('save')
        ->assertHasNoErrors();

    expect($service->fresh()->content)->toBe($updatedHtml);
});

test('user can toggle service status on list page', function () {
    $user = User::factory()->create();
    $category = ServiceCategory::factory()->create();
    $service = Service::factory()->create([
        'service_category_id' => $category->id,
        'is_active' => true,
    ]);

    Livewire::actingAs($user)
        ->test('admin::service.list')
        ->call('toggleStatus', $service->id)
        ->assertHasNoErrors();

    expect($service->fresh()->is_active)->toBeFalse();
});

test('user can delete service via list page modal confirmation', function () {
    $user = User::factory()->create();
    $category = ServiceCategory::factory()->create();
    $service = Service::factory()->create([
        'service_category_id' => $category->id,
        'title' => 'Service To Be Deleted',
    ]);

    Livewire::actingAs($user)
        ->test('admin::service.list')
        ->call('confirmDelete', $service->id)
        ->assertSet('showDeleteModal', true)
        ->call('delete')
        ->assertHasNoErrors()
        ->assertSet('showDeleteModal', false);

    $this->assertDatabaseMissing('services', [
        'id' => $service->id,
    ]);
});
