<?php

use App\Models\Setting;
use App\Models\User;
use Livewire\Livewire;

test('setting helper retrieves value without cache', function () {
    Setting::setValue('email', 'support@facilitypro.com');

    expect(setting('email'))->toBe('support@facilitypro.com');

    // Direct database update to test non-cached retrieval
    Setting::where('key', 'email')->update(['value' => 'updated@facilitypro.com']);

    expect(setting('email'))->toBe('updated@facilitypro.com');
});

test('setting helper returns default value when key does not exist', function () {
    expect(setting('non_existent_key', 'default_value'))->toBe('default_value');
});

test('admin settings page can update company setting values', function () {
    $user = User::factory()->create();

    Livewire::actingAs($user)
        ->test('admin::setting')
        ->set('company_name', 'Acme Facility Services')
        ->set('email', 'contact@acme.com')
        ->set('phone', '+1 (555) 999-8888')
        ->set('whatsapp', '+1 (555) 999-8888')
        ->set('address', '789 Corporate Way, Tech City')
        ->call('save')
        ->assertSet('saved', true);

    expect(setting('company_name'))->toBe('Acme Facility Services');
    expect(setting('email'))->toBe('contact@acme.com');
    expect(setting('phone'))->toBe('+1 (555) 999-8888');
    expect(setting('whatsapp'))->toBe('+1 (555) 999-8888');
    expect(setting('address'))->toBe('789 Corporate Way, Tech City');
});
