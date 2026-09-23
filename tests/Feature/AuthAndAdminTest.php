<?php

use App\Models\User;
use Livewire\Livewire;

test('login page renders successfully with status 200 for guests', function () {
    $response = $this->get(route('login'));

    $response->assertSuccessful();
    $response->assertSee('Welcome back');
    $response->assertSee('Work Email');
    $response->assertSee('Sign in to Command Center');
});

test('unauthenticated user cannot access admin dashboard', function () {
    $response = $this->get(route('admin.dashboard'));

    $response->assertRedirect(route('login'));
});

test('user can authenticate via login component and redirect to dashboard', function () {
    $user = User::factory()->create([
        'email' => 'admin_test@facilitypro.com',
        'password' => bcrypt('secret123'),
    ]);

    Livewire::test('pages::auth.login')
        ->set('email', 'admin_test@facilitypro.com')
        ->set('password', 'secret123')
        ->call('authenticate')
        ->assertHasNoErrors()
        ->assertRedirect(route('admin.dashboard'));

    $this->assertAuthenticatedAs($user);
});

test('authenticated user can view admin dashboard', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->get(route('admin.dashboard'));

    $response->assertSuccessful();
    $response->assertSee('Operations Overview');
    $response->assertSee('Recent SLA Scope Proposals');
    $response->assertSee('IoT QR Telemetry');
});

test('authenticated user can logout via post route', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->post(route('logout'));

    $response->assertRedirect(route('login'));
    $this->assertGuest();
});
