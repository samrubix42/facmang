<?php

use Livewire\Livewire;

test('career page is accessible via /careers and displays rupees', function () {
    $response = $this->get(route('careers'));

    $response->assertSuccessful();
    $response->assertSee('Build A High-Impact Career In Modern Facility Operations');
    $response->assertSee('Commercial Sweeping & Floor Care Specialist');
    $response->assertSee('₹');
});

test('user can submit application on career page', function () {
    Livewire::test('pages::careers')
        ->set('selectedJob', 'Commercial Sweeping & Floor Care Specialist')
        ->set('applicantName', 'Jane Doe')
        ->set('applicantEmail', 'jane.doe@example.com')
        ->set('applicantPhone', '9876543210')
        ->set('experience', '1-3 years')
        ->set('shift', 'Day Shift')
        ->set('message', 'Certified ISSA floor care technician with 2 years commercial experience.')
        ->call('apply')
        ->assertHasNoErrors()
        ->assertDispatched('toast-show');
});

test('application requires mandatory fields', function () {
    Livewire::test('pages::careers')
        ->set('selectedJob', '')
        ->call('apply')
        ->assertHasErrors(['applicantName', 'applicantEmail', 'applicantPhone', 'selectedJob', 'experience']);
});

