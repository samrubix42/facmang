<?php

use App\Models\ServiceCategory;
use App\Models\User;
use Database\Seeders\ServiceCategorySeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;

uses(RefreshDatabase::class);

test('unauthenticated user cannot access service categories page', function () {
    $response = $this->get(route('admin.service-categories'));

    $response->assertRedirect(route('login'));
});

test('authenticated user can view service categories page', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->get(route('admin.service-categories'));

    $response->assertSuccessful();
    $response->assertSee('Service Categories');
    $response->assertSee('Add Category');
});

test('service category seeder correctly populates records', function () {
    $this->seed(ServiceCategorySeeder::class);

    expect(ServiceCategory::count())->toBeGreaterThanOrEqual(5);
    expect(ServiceCategory::where('slug', 'janitorial')->exists())->toBeTrue();
    expect(ServiceCategory::where('slug', 'technical')->exists())->toBeTrue();
});

test('user can open create modal and save new service category', function () {
    $user = User::factory()->create();

    Livewire::actingAs($user)
        ->test('admin::service.category')
        ->assertSet('showModal', false)
        ->call('openCreateModal')
        ->assertSet('showModal', true)
        ->assertSet('isEditing', false)
        ->set('title', 'Energy & Carbon Audits')
        ->set('slug', 'energy-carbon-audits')
        ->set('description', 'Comprehensive thermal imaging and carbon reduction auditing.')
        ->set('is_active', true)
        ->call('save')
        ->assertHasNoErrors()
        ->assertSet('showModal', false);

    $this->assertDatabaseHas('service_categories', [
        'title' => 'Energy & Carbon Audits',
        'slug' => 'energy-carbon-audits',
        'description' => 'Comprehensive thermal imaging and carbon reduction auditing.',
        'is_active' => true,
    ]);
});

test('validation prevents duplicate slug on service categories', function () {
    $user = User::factory()->create();

    ServiceCategory::create([
        'title' => 'Plumbing Care',
        'slug' => 'plumbing-care',
        'description' => 'Plumbing operations',
        'is_active' => true,
    ]);

    Livewire::actingAs($user)
        ->test('admin::service.category')
        ->call('openCreateModal')
        ->set('title', 'Duplicate Plumbing')
        ->set('slug', 'plumbing-care')
        ->call('save')
        ->assertHasErrors(['slug']);
});

test('user can open edit modal and update service category', function () {
    $user = User::factory()->create();

    $category = ServiceCategory::create([
        'title' => 'HVAC Ventilation',
        'slug' => 'hvac-ventilation',
        'description' => 'Cooling maintenance',
        'is_active' => true,
    ]);

    Livewire::actingAs($user)
        ->test('admin::service.category')
        ->call('openEditModal', $category->id)
        ->assertSet('isEditing', true)
        ->assertSet('title', 'HVAC Ventilation')
        ->set('title', 'Advanced HVAC & Air Scrubbers')
        ->call('save')
        ->assertHasNoErrors()
        ->assertSet('showModal', false);

    expect($category->fresh()->title)->toBe('Advanced HVAC & Air Scrubbers');
});

test('user can toggle status of service category', function () {
    $user = User::factory()->create();

    $category = ServiceCategory::create([
        'title' => 'Acoustic Insulation',
        'slug' => 'acoustic-insulation',
        'is_active' => true,
    ]);

    Livewire::actingAs($user)
        ->test('admin::service.category')
        ->call('toggleStatus', $category->id)
        ->assertHasNoErrors();

    expect($category->fresh()->is_active)->toBeFalse();
});

test('user can delete service category via modal confirmation', function () {
    $user = User::factory()->create();

    $category = ServiceCategory::create([
        'title' => 'Temporary Waste Storage',
        'slug' => 'temp-waste-storage',
        'is_active' => false,
    ]);

    Livewire::actingAs($user)
        ->test('admin::service.category')
        ->call('confirmDelete', $category->id)
        ->assertSet('showDeleteModal', true)
        ->call('delete')
        ->assertHasNoErrors()
        ->assertSet('showDeleteModal', false);

    $this->assertDatabaseMissing('service_categories', [
        'id' => $category->id,
    ]);
});
