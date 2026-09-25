<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sampleContacts = [
            [
                'name' => 'Alexander Wright',
                'email' => 'a.wright@metrotower.com',
                'phone' => '+1 (555) 234-5678',
                'property_type' => 'Corporate Office Tower',
                'subject' => 'SLA Proposal Request - Corporate Office Tower',
                'message' => 'Looking for full-facility janitorial, HVAC maintenance, and 24/7 security management for a 45-story commercial tower.',
                'is_read' => false,
            ],
            [
                'name' => 'Sophia Martinez',
                'email' => 'smartinez@innovatehealth.org',
                'phone' => '+1 (555) 876-5432',
                'property_type' => 'Healthcare / Medical Facility',
                'subject' => 'SLA Proposal Request - Healthcare / Medical Facility',
                'message' => 'We require hospital-grade sanitation, bio-hazard waste handling, and cleanroom air quality management.',
                'is_read' => true,
            ],
            [
                'name' => 'Marcus Vance',
                'email' => 'mvance@vanceenterprises.com',
                'phone' => '+1 (555) 345-6789',
                'property_type' => 'Tech Innovation Campus',
                'subject' => 'SLA Proposal Request - Tech Innovation Campus',
                'message' => 'Need dedicated pantry stewards, daily sweeping, and IoT QR cleaning tracking for our 300,000 sq.ft. tech campus.',
                'is_read' => false,
            ],
        ];

        foreach ($sampleContacts as $contact) {
            Contact::create($contact);
        }
    }
}
