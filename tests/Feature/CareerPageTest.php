<?php

use App\Models\JobApplication;
use App\Models\JobApplied;
use Database\Seeders\JobApplicationSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Livewire\Livewire;

uses(RefreshDatabase::class);

beforeEach(function () {
    $this->seed(JobApplicationSeeder::class);
});

test('career page is accessible via /careers and displays rupees', function () {
    $response = $this->get(route('careers'));

    $response->assertSuccessful();
    $response->assertSee('Build A High-Impact Career In Modern Facility Operations');
    $response->assertSee('Commercial Sweeping & Floor Care Specialist');
    $response->assertSee('₹');
});

test('user can submit application with resume on career page', function () {
    Storage::fake('public');

    $job = JobApplication::first();
    $fakeResume = UploadedFile::fake()->create('resume.pdf', 500, 'application/pdf');

    Livewire::test('pages::careers')
        ->set('selectedJobId', $job->id)
        ->set('applicantName', 'Jane Doe')
        ->set('applicantEmail', 'jane.doe@example.com')
        ->set('applicantPhone', '9876543210')
        ->set('experience', '1-3 years')
        ->set('shift', 'Day Shift')
        ->set('message', 'Certified ISSA floor care technician.')
        ->set('resume', $fakeResume)
        ->call('apply')
        ->assertHasNoErrors()
        ->assertDispatched('toast-show');

    expect(JobApplied::count())->toBe(1);
    $applied = JobApplied::first();
    expect($applied->name)->toBe('Jane Doe')
        ->and($applied->job_id)->toBe($job->id)
        ->and($applied->resume)->not->toBeNull();
});

test('application requires mandatory fields', function () {
    Livewire::test('pages::careers')
        ->set('selectedJobId', null)
        ->call('apply')
        ->assertHasErrors(['applicantName', 'applicantEmail', 'applicantPhone', 'selectedJobId', 'experience']);
});

test('after applying user sees only we will get back to you message', function () {
    $job = JobApplication::first();

    Livewire::test('pages::careers')
        ->set('selectedJobId', $job->id)
        ->set('applicantName', 'Jane Doe')
        ->set('applicantEmail', 'jane.doe@example.com')
        ->set('applicantPhone', '9876543210')
        ->set('experience', '1-3 years')
        ->set('shift', 'Day Shift')
        ->call('apply')
        ->assertSee('We will get back to you shortly.')
        ->assertDontSee('Submit Another Application');
});

