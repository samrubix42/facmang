<?php

use App\Models\Testimonial;
use App\Models\User;
use Database\Seeders\TestimonialSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;

uses(RefreshDatabase::class);

test('unauthenticated user cannot access testimonial management page', function () {
    $response = $this->get(route('admin.testimonials'));

    $response->assertRedirect(route('login'));
});

test('authenticated user can view testimonial management page', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->get(route('admin.testimonials'));

    $response->assertSuccessful();
    $response->assertSee('Client Testimonials');
    $response->assertSee('Add Testimonial');
});

test('testimonial seeder correctly populates records', function () {
    $this->seed(TestimonialSeeder::class);

    expect(Testimonial::count())->toBeGreaterThanOrEqual(6);
    expect(Testimonial::where('name', 'Elena Rostova')->exists())->toBeTrue();
});

test('user can open create modal and save new testimonial', function () {
    $user = User::factory()->create();

    Livewire::actingAs($user)
        ->test('admin::testimonial')
        ->assertSet('showModal', false)
        ->call('openCreateModal')
        ->assertSet('showModal', true)
        ->assertSet('isEditing', false)
        ->set('name', 'Jonathan Reed')
        ->set('designation', 'Director of Engineering, Nexus Tower')
        ->set('testimonial', 'FacilityPro elevated our facility standards with reliable preventive maintenance.')
        ->set('rating', 5)
        ->set('is_active', true)
        ->call('save')
        ->assertHasNoErrors()
        ->assertSet('showModal', false);

    $this->assertDatabaseHas('testimonials', [
        'name' => 'Jonathan Reed',
        'designation' => 'Director of Engineering, Nexus Tower',
        'rating' => 5,
        'is_active' => true,
    ]);
});

test('validation prevents saving incomplete testimonial', function () {
    $user = User::factory()->create();

    Livewire::actingAs($user)
        ->test('admin::testimonial')
        ->call('openCreateModal')
        ->set('name', '')
        ->set('designation', '')
        ->set('testimonial', 'Too short')
        ->call('save')
        ->assertHasErrors(['name', 'designation', 'testimonial']);
});

test('user can open edit modal and update existing testimonial', function () {
    $user = User::factory()->create();
    $item = Testimonial::factory()->create([
        'name' => 'Original Name',
        'designation' => 'Original Role',
        'testimonial' => 'Original testimonial feedback statement here.',
        'rating' => 4,
        'is_active' => true,
    ]);

    Livewire::actingAs($user)
        ->test('admin::testimonial')
        ->call('openEditModal', $item->id)
        ->assertSet('showModal', true)
        ->assertSet('isEditing', true)
        ->assertSet('name', 'Original Name')
        ->set('name', 'Updated Name')
        ->set('rating', 5)
        ->call('save')
        ->assertHasNoErrors()
        ->assertSet('showModal', false);

    $this->assertDatabaseHas('testimonials', [
        'id' => $item->id,
        'name' => 'Updated Name',
        'rating' => 5,
    ]);
});

test('user can toggle active status directly from table', function () {
    $user = User::factory()->create();
    $item = Testimonial::factory()->create([
        'is_active' => true,
    ]);

    Livewire::actingAs($user)
        ->test('admin::testimonial')
        ->call('toggleStatus', $item->id);

    expect($item->fresh()->is_active)->toBeFalse();

    Livewire::actingAs($user)
        ->test('admin::testimonial')
        ->call('toggleStatus', $item->id);

    expect($item->fresh()->is_active)->toBeTrue();
});

test('user can delete a testimonial via confirmation modal', function () {
    $user = User::factory()->create();
    $item = Testimonial::factory()->create([
        'name' => 'To Be Deleted',
    ]);

    Livewire::actingAs($user)
        ->test('admin::testimonial')
        ->call('confirmDelete', $item->id)
        ->assertSet('showDeleteModal', true)
        ->assertSet('deletingId', $item->id)
        ->call('delete')
        ->assertSet('showDeleteModal', false);

    $this->assertDatabaseMissing('testimonials', [
        'id' => $item->id,
    ]);
});

test('user can filter and search testimonials', function () {
    $user = User::factory()->create();
    Testimonial::factory()->create([
        'name' => 'Alpha Client',
        'is_active' => true,
    ]);
    Testimonial::factory()->create([
        'name' => 'Beta Client',
        'is_active' => false,
    ]);

    Livewire::actingAs($user)
        ->test('admin::testimonial')
        ->set('search', 'Alpha')
        ->assertSee('Alpha Client')
        ->assertDontSee('Beta Client')
        ->set('search', '')
        ->set('filterStatus', 'inactive')
        ->assertSee('Beta Client')
        ->assertDontSee('Alpha Client');
});
