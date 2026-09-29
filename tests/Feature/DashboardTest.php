<?php

use App\Models\Contact;
use App\Models\JobApplication;
use App\Models\JobApplied;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;

uses(RefreshDatabase::class);

beforeEach(function () {
    $this->admin = User::factory()->create();
});

/**
 * Create a job opening, filling the columns the table requires.
 */
function makeJobOpening(string $title = 'HVAC Technician'): JobApplication
{
    return JobApplication::create([
        'title' => $title,
        'job_description' => 'Diagnose and repair commercial HVAC systems.',
        'salary' => '₹45,000 - ₹60,000 per month',
        'department' => 'Operations',
        'experince_required' => '3+ years',
        'location' => 'Mumbai',
    ]);
}

/**
 * Create a job applicant, filling the columns the table requires.
 */
function makeApplicant(JobApplication $job, string $name, string $status = 'pending'): JobApplied
{
    return JobApplied::create([
        'job_id' => $job->id,
        'name' => $name,
        'email' => str($name)->slug('.')->append('@example.test')->toString(),
        'phone' => '+1 (555) 000-0000',
        'status' => $status,
    ]);
}

test('dashboard stat cards reflect live database counts', function () {
    Contact::factory()->count(3)->create(['is_read' => false]);
    Contact::factory()->create(['is_read' => true]);

    $category = ServiceCategory::factory()->create();
    Service::factory()->count(2)->create([
        'service_category_id' => $category->id,
        'is_active' => true,
    ]);
    Service::factory()->create([
        'service_category_id' => $category->id,
        'is_active' => false,
    ]);

    $job = makeJobOpening();

    makeApplicant($job, 'Ada Lovelace');
    makeApplicant($job, 'Grace Hopper', 'shortlisted');

    Livewire::actingAs($this->admin)
        ->test('pages::admin.dashboard')
        ->assertSee('Total Inquiries')
        ->assertSee('Job Applicants')
        ->assertSee('Open Positions')
        ->assertSee('Live Services')
        // 4 inquiries, 3 of them unread.
        ->assertSee('3 awaiting reply')
        ->assertSee('1 pending review');
});

test('dashboard excludes inactive services from the live services metric', function () {
    $category = ServiceCategory::factory()->create();

    Service::factory()->count(2)->create([
        'service_category_id' => $category->id,
        'is_active' => true,
    ]);
    Service::factory()->count(5)->create([
        'service_category_id' => $category->id,
        'is_active' => false,
    ]);

    $component = Livewire::actingAs($this->admin)->test('pages::admin.dashboard');

    expect($component->instance()->stats()['services'])->toBe(2);
});

test('dashboard renders the newest inquiries and hides older ones', function () {
    Contact::factory()->create(['name' => 'Oldest Inquiry Person']);
    $newest = Contact::factory()->create(['name' => 'Newest Inquiry Person']);

    $component = Livewire::actingAs($this->admin)->test('pages::admin.dashboard');

    expect($component->instance()->recentInquiries()->first()->is($newest))->toBeTrue();
});

test('dashboard shows the empty state when there are no inquiries', function () {
    Livewire::actingAs($this->admin)
        ->test('pages::admin.dashboard')
        ->assertSee('No inquiries yet')
        ->assertDontSee('Oldest Inquiry Person');
});

test('dashboard limits the inquiry table to the six most recent records', function () {
    Contact::factory()->count(9)->create();

    expect(Livewire::actingAs($this->admin)
        ->test('pages::admin.dashboard')
        ->instance()
        ->recentInquiries()
    )->toHaveCount(6);
});

test('hiring pipeline reports every stage in order including empty ones', function () {
    $job = makeJobOpening('Security Guard');

    makeApplicant($job, 'Alan Turing');
    makeApplicant($job, 'Katherine J');
    makeApplicant($job, 'Dorothy V', 'shortlisted');

    $pipeline = Livewire::actingAs($this->admin)
        ->test('pages::admin.dashboard')
        ->instance()
        ->applicationPipeline();

    expect($pipeline)->toHaveCount(4)
        ->and(array_column($pipeline, 'status'))->toBe(['pending', 'reviewed', 'shortlisted', 'rejected'])
        ->and($pipeline[0]['total'])->toBe(2)
        ->and($pipeline[1]['total'])->toBe(0)
        ->and($pipeline[2]['total'])->toBe(1)
        ->and($pipeline[3]['total'])->toBe(0);
});

test('hotline falls back to the default number when no setting exists', function () {
    expect(Livewire::actingAs($this->admin)
        ->test('pages::admin.dashboard')
        ->instance()
        ->hotline()
    )->toBe('+1 (800) 492-8820');
});

test('hotline uses the configured phone setting when present', function () {
    Setting::setValue('phone', '+1 (800) 555-0199');

    Livewire::actingAs($this->admin)
        ->test('pages::admin.dashboard')
        ->assertSee('+1 (800) 555-0199');
});

test('inquiry export returns a csv attachment', function () {
    Contact::factory()->create([
        'name' => 'Marcus Vance',
        'email' => 'marcus@harbortowers.com',
        'is_read' => false,
    ]);

    Livewire::actingAs($this->admin)
        ->test('pages::admin.dashboard')
        ->call('exportInquiries')
        ->assertFileDownloaded('rfs-inquiries-'.now()->format('Y-m-d').'.csv');
});

test('inquiry export neutralises spreadsheet formula injection', function () {
    Contact::factory()->create([
        'name' => '=HYPERLINK("http://evil.test","click")',
    ]);
    Contact::factory()->create([
        'name' => '+1 (800) 555-0199 Call Back',
    ]);

    $csv = Livewire::actingAs($this->admin)
        ->test('pages::admin.dashboard')
        ->instance()
        ->buildInquiryCsv();

    expect($csv)
        ->toContain('"\'=HYPERLINK')
        ->toContain('"\'+1 (800) 555-0199 Call Back"');
});

test('inquiry export includes a header row and one row per inquiry', function () {
    Contact::factory()->count(3)->create();

    $csv = Livewire::actingAs($this->admin)
        ->test('pages::admin.dashboard')
        ->instance()
        ->buildInquiryCsv();

    $rows = array_values(array_filter(explode("\n", trim($csv))));

    expect($rows)->toHaveCount(4)
        ->and($rows[0])->toContain('Name')
        ->toContain('Property Type')
        ->toContain('Received');
});

test('guests cannot reach the dashboard component', function () {
    $this->get(route('admin.dashboard'))->assertRedirect(route('login'));
});
