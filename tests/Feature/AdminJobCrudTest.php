<?php

use App\Models\JobApplication;
use App\Models\JobApplied;
use App\Models\User;
use Database\Seeders\JobApplicationSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;

uses(RefreshDatabase::class);

beforeEach(function () {
    $this->seed(JobApplicationSeeder::class);
    $this->user = User::factory()->create();
});

test('unauthenticated user cannot access admin jobs', function () {
    $response = $this->get(route('admin.jobs.index'));
    $response->assertRedirect(route('login'));
});

test('unauthenticated user cannot access admin job-applied', function () {
    $response = $this->get(route('admin.job-applied.index'));
    $response->assertRedirect(route('login'));
});

test('authenticated user can view jobs list', function () {
    $this->actingAs($this->user);

    $response = $this->get(route('admin.jobs.index'));
    $response->assertSuccessful();
    $response->assertSee('Job Openings');
    $response->assertSee('Commercial Sweeping & Floor Care Specialist');
});

test('admin can create a new job opening', function () {
    $this->actingAs($this->user);

    Livewire::test('admin::job.job-application')
        ->call('create')
        ->set('title', 'Senior Electrical Plant Engineer')
        ->set('department', 'MEP & Technical')
        ->set('type', 'Full-Time')
        ->set('experince_required', '5+ Years')
        ->set('salary', '₹60,000 – ₹85,000 / month')
        ->set('location', 'High-Tech Manufacturing Zone')
        ->set('status', 'active')
        ->set('job_description', '<p>Manage substation transformers and diesel generator synchronization panels.</p>')
        ->set('qualification_requirements', 'B.Tech / Diploma in Electrical Engineering with HT license.')
        ->set('responsibilities', 'Substation monitoring, transformer oil testing, HT panel inspections.')
        ->call('save')
        ->assertHasNoErrors()
        ->assertDispatched('toast-show');

    expect(JobApplication::where('title', 'Senior Electrical Plant Engineer')->exists())->toBeTrue();
});

test('admin can edit an existing job opening', function () {
    $this->actingAs($this->user);

    $job = JobApplication::first();

    Livewire::test('admin::job.job-application')
        ->call('edit', $job->id)
        ->set('salary', '₹30,000 – ₹35,000 / month')
        ->call('save')
        ->assertHasNoErrors()
        ->assertDispatched('toast-show');

    expect($job->fresh()->salary)->toBe('₹30,000 – ₹35,000 / month');
});

test('admin can toggle job status', function () {
    $this->actingAs($this->user);

    $job = JobApplication::first();
    $initialStatus = $job->status;

    Livewire::test('admin::job.job-application')
        ->call('toggleStatus', $job->id)
        ->assertDispatched('toast-show');

    expect($job->fresh()->status)->not->toBe($initialStatus);
});

test('admin can view and update applied candidate status', function () {
    $this->actingAs($this->user);

    $job = JobApplication::first();
    $candidate = JobApplied::create([
        'job_id' => $job->id,
        'name' => 'Rahul Sharma',
        'email' => 'rahul@example.com',
        'phone' => '9876543210',
        'experince' => '2 years',
        'status' => 'pending',
    ]);

    Livewire::test('admin::job.job-applied')
        ->assertSee('Rahul Sharma')
        ->call('updateStatus', $candidate->id, 'shortlisted')
        ->assertDispatched('toast-show');

    expect($candidate->fresh()->status)->toBe('shortlisted');
});
