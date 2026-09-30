<?php

use App\Mail\JobAppliedMail;
use App\Models\JobApplication;
use App\Models\JobApplied;
use Database\Seeders\JobApplicationSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Livewire\Livewire;

uses(RefreshDatabase::class);

beforeEach(function () {
    $this->seed(JobApplicationSeeder::class);
});

test('career page is accessible via /careers and displays rupees', function () {
    $response = $this->get(route('careers'));

    $response->assertSuccessful();
    $response->assertSee('Careers');
    $response->assertSee('Open roles with guaranteed pay');
    $response->assertSee('₹');
});

test('user can submit application with resume on career page and emails are sent', function () {
    Mail::fake();
    Storage::fake('public');

    $job = JobApplication::first();
    $fakeResume = UploadedFile::fake()->create('resume.pdf', 500, 'application/pdf');

    Livewire::test('pages::careers')
        ->set('selectedJobId', $job->id)
        ->set('applicantName', 'Jane Doe')
        ->set('applicantEmail', 'jane.doe@example.com')
        ->set('applicantPhone', '9876543210')
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
        ->and($applied->experince)->toBe('')
        ->and($applied->resume)->not->toBeNull();

    Mail::assertSent(JobAppliedMail::class, function ($mail) {
        return $mail->hasTo('samcool3203@gmail.com') && $mail->jobApplied->email === 'jane.doe@example.com';
    });
});

test('career application does not send admin mail if target email is empty', function () {
    Mail::fake();
    Storage::fake('public');
    config(['mail.to_address' => null]);
    $job = JobApplication::first();
    $fakeResume = UploadedFile::fake()->create('resume.pdf', 500, 'application/pdf');

    Livewire::test('pages::careers')
        ->set('selectedJobId', $job->id)
        ->set('applicantName', 'Jane Doe')
        ->set('applicantEmail', 'jane.doe@example.com')
        ->set('applicantPhone', '9876543210')
        ->set('shift', 'Day Shift')
        ->set('resume', $fakeResume)
        ->call('apply');

    Mail::assertNotSent(JobAppliedMail::class);
});

test('application requires mandatory fields', function () {
    Livewire::test('pages::careers')
        ->set('selectedJobId', null)
        ->call('apply')
        ->assertHasErrors(['applicantName', 'applicantPhone', 'resume']);
});

test('user can submit application without a selected job', function () {
    Storage::fake('public');
    $fakeResume = UploadedFile::fake()->create('resume.pdf', 500, 'application/pdf');

    Livewire::test('pages::careers')
        ->set('selectedJobId', null)
        ->set('applicantName', 'Jane Doe')
        ->set('applicantEmail', 'jane.doe@example.com')
        ->set('applicantPhone', '9876543210')
        ->set('shift', 'Day Shift')
        ->set('resume', $fakeResume)
        ->call('apply')
        ->assertHasNoErrors()
        ->assertDispatched('toast-show');

    expect(JobApplied::first()->job_id)->toBeNull();
});

test('after applying user sees only we will get back to you message', function () {
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
        ->set('resume', $fakeResume)
        ->call('apply')
        ->assertSee('We will get back to you shortly.')
        ->assertDontSee('Submit Another Application');
});
