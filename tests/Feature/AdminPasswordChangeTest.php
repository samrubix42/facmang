<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Livewire\Livewire;

uses(RefreshDatabase::class);

test('unauthenticated user cannot access change password page', function () {
    $response = $this->get(route('admin.password'));

    $response->assertRedirect(route('login'));
});

test('authenticated admin can view change password page', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->get(route('admin.password'));

    $response->assertSuccessful();
    $response->assertSee('Change Administrator Password');
    $response->assertSee('Current Password');
    $response->assertSee('New Password');
    $response->assertSee('Confirm New Password');
});

test('requires current password, new password, and confirmation', function () {
    $user = User::factory()->create([
        'password' => bcrypt('old-password-123'),
    ]);

    Livewire::actingAs($user)
        ->test('admin::password')
        ->set('current_password', '')
        ->set('new_password', '')
        ->set('new_password_confirmation', '')
        ->call('updatePassword')
        ->assertHasErrors(['current_password', 'new_password', 'new_password_confirmation']);
});

test('fails when current password is wrong', function () {
    $user = User::factory()->create([
        'password' => bcrypt('correct-password-123'),
    ]);

    Livewire::actingAs($user)
        ->test('admin::password')
        ->set('current_password', 'wrong-password-999')
        ->set('new_password', 'new-super-secret-123')
        ->set('new_password_confirmation', 'new-super-secret-123')
        ->call('updatePassword')
        ->assertHasErrors(['current_password']);
});

test('fails when new password is less than 8 characters', function () {
    $user = User::factory()->create([
        'password' => bcrypt('correct-password-123'),
    ]);

    Livewire::actingAs($user)
        ->test('admin::password')
        ->set('current_password', 'correct-password-123')
        ->set('new_password', 'short')
        ->set('new_password_confirmation', 'short')
        ->call('updatePassword')
        ->assertHasErrors(['new_password']);
});

test('fails when new password matches old current password', function () {
    $user = User::factory()->create([
        'password' => bcrypt('same-password-123'),
    ]);

    Livewire::actingAs($user)
        ->test('admin::password')
        ->set('current_password', 'same-password-123')
        ->set('new_password', 'same-password-123')
        ->set('new_password_confirmation', 'same-password-123')
        ->call('updatePassword')
        ->assertHasErrors(['new_password']);
});

test('fails when new password confirmation does not match', function () {
    $user = User::factory()->create([
        'password' => bcrypt('correct-password-123'),
    ]);

    Livewire::actingAs($user)
        ->test('admin::password')
        ->set('current_password', 'correct-password-123')
        ->set('new_password', 'new-secure-password-123')
        ->set('new_password_confirmation', 'different-password-123')
        ->call('updatePassword')
        ->assertHasErrors(['new_password']);
});

test('successfully updates password and can sign in with new password', function () {
    $user = User::factory()->create([
        'email' => 'admin@facilitypro.com',
        'password' => bcrypt('current-password-123'),
    ]);

    Livewire::actingAs($user)
        ->test('admin::password')
        ->set('current_password', 'current-password-123')
        ->set('new_password', 'updated-secure-pwd-2026')
        ->set('new_password_confirmation', 'updated-secure-pwd-2026')
        ->call('updatePassword')
        ->assertHasNoErrors()
        ->assertSet('saved', true)
        ->assertSet('current_password', '')
        ->assertSet('new_password', '')
        ->assertSet('new_password_confirmation', '')
        ->assertDispatched('toast-show');

    $user->refresh();
    expect(Hash::check('updated-secure-pwd-2026', $user->password))->toBeTrue();

    // Verify login with new password works
    Livewire::test('pages::auth.login')
        ->set('email', 'admin@facilitypro.com')
        ->set('password', 'updated-secure-pwd-2026')
        ->call('authenticate')
        ->assertHasNoErrors()
        ->assertRedirect(route('admin.dashboard'));
});
