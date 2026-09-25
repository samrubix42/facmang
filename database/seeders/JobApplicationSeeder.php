<?php

namespace Database\Seeders;

use App\Models\JobApplication;
use Illuminate\Database\Seeder;

class JobApplicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jobs = [
            [
                'title' => 'Commercial Sweeping & Floor Care Specialist',
                'department' => 'Cleaning & Sweeping',
                'type' => 'Full-Time',
                'experince_required' => '1+ Years',
                'location' => 'On-Site IT Park & Corporate Towers',
                'salary' => '₹22,000 – ₹28,000 / month',
                'status' => 'active',
                'job_description' => '<p>We are seeking dedicated Commercial Sweeping &amp; Floor Care Specialists to operate heavy-duty industrial floor scrubbers, high-speed burnishers, and pressure washing gear at top-tier commercial campuses.</p><ul><li>Operate ride-on and walk-behind automated battery scrubbers.</li><li>Execute marble crystallization, diamond pad polishing, and terrazzo floor treatments.</li><li>Complete shift-based QR code maintenance audits via digital handheld terminals.</li><li>Ensure standard operating procedures and chemical dilution safety guidelines are met.</li></ul>',
                'qualification_requirements' => '1+ years hands-on experience in commercial janitorial or floor restoration. Able to safely lift up to 20kg. Valid Aadhaar/ID proof.',
                'responsibilities' => 'Floor scrubbing, chemical safety, equipment maintenance, shift handover checklists.',
            ],
            [
                'title' => 'Executive Hospitality & Pantry Steward',
                'department' => 'Pantry & Staffing',
                'type' => 'Full-Time',
                'experince_required' => '1+ Years',
                'location' => 'Class-A Corporate Headquarters',
                'salary' => '₹20,000 – ₹25,000 / month',
                'status' => 'active',
                'job_description' => '<p>Manage executive boardroom hospitality, commercial barista espresso stations, corporate pantry replenishment, and micro-kitchen sanitation with courteous white-glove etiquette.</p><ul><li>Prepare and serve executive refreshments during executive meetings.</li><li>Maintain stock inventory of pantry consumables, coffee beans, and teas.</li><li>Operate commercial bean-to-cup coffee machines and water dispensers.</li><li>Maintain pristine hygiene across corporate pantries and dining hubs.</li></ul>',
                'qualification_requirements' => 'Polite communication, neat grooming, prior hospitality or corporate pantry experience.',
                'responsibilities' => 'Executive beverage service, coffee machine maintenance, pantry stock counting, meeting room readiness.',
            ],
            [
                'title' => 'Lead MEP & HVAC Maintenance Technician',
                'department' => 'MEP & Technical',
                'type' => 'Full-Time',
                'experince_required' => '3+ Years',
                'location' => 'Commercial Campus & Healthcare Hubs',
                'salary' => '₹35,000 – ₹48,000 / month',
                'status' => 'active',
                'job_description' => '<p>Lead diagnostic routines and preventive maintenance on commercial chillers, AHUs, electrical distribution panels, plumbing booster pumps, and diesel generators.</p><ul><li>Perform planned preventive maintenance (PPM) on HVAC chillers, fan coil units, and ventilation fans.</li><li>Monitor Building Management Systems (BMS) telemetry alarms and calibrate thermostats.</li><li>Inspect 3-phase electrical switchboards, capacitor banks, and backup UPS units.</li><li>Troubleshoot water distribution pumps, booster systems, and drainage lines.</li></ul>',
                'qualification_requirements' => 'ITI or Diploma in Electrical / Mechanical / Air Conditioning & Refrigeration. 3+ years commercial MEP experience.',
                'responsibilities' => 'HVAC & MEP preventive diagnostics, emergency repairs, BMS monitoring, technical log reporting.',
            ],
            [
                'title' => 'Field Operations Shift Supervisor',
                'department' => 'Field Operations',
                'type' => 'Full-Time',
                'experince_required' => '2+ Years',
                'location' => 'Regional Corporate Operations Fleet',
                'salary' => '₹45,000 – ₹60,000 / month',
                'status' => 'active',
                'job_description' => '<p>Supervise front-line teams across client facilities. Conduct daily shift briefings, manage chemical supply rosters, verify QR audit checkpoints, and maintain 99.85% SLA compliance.</p><ul><li>Oversee a crew of 20+ cleaning and maintenance technicians across site zones.</li><li>Conduct regular quality audits, scorecards, and resolve client requests promptly.</li><li>Prepare attendance rosters, shift rotations, and consumable inventory indents.</li><li>Enforce strict occupational health and safety protocols across all work zones.</li></ul>',
                'qualification_requirements' => '2+ years leadership or supervisory experience in facilities services. Excellent team coordination and reporting skills.',
                'responsibilities' => 'Shift oversight, SLA compliance, workforce allocation, client liaison, safety audits.',
            ],
            [
                'title' => 'High-Rise Architectural Facade Technician',
                'department' => 'Facades & Heights',
                'type' => 'Full-Time',
                'experince_required' => '2+ Years',
                'location' => 'Commercial High-Rise Towers',
                'salary' => '₹28,000 – ₹38,000 / month',
                'status' => 'active',
                'job_description' => '<p>Execute exterior architectural curtain wall cleaning, cradle-based facade washing, and exterior sealant inspections on premium high-rise commercial structures.</p><ul><li>Operate suspended powered cradles (BMUs) and dual-rope access fall arrest systems.</li><li>Wash exterior architectural glass panels with demineralized water systems.</li><li>Conduct visual checks on exterior expansion joints, gaskets, and silicone seals.</li><li>Adhere strictly to zero-incident height safety protocols and weather limits.</li></ul>',
                'qualification_requirements' => 'Comfortable working at elevated heights. Certification in Rope Access or Cradle Operations preferred. 2+ years high-rise experience.',
                'responsibilities' => 'Facade cradle operations, glass cleaning, rigging checks, wind-speed compliance monitoring.',
            ],
            [
                'title' => 'Clinical Restroom Hygiene Specialist',
                'department' => 'Cleaning & Sweeping',
                'type' => 'Full-Time',
                'experince_required' => '0-1 Year (Freshers Welcome)',
                'location' => 'Medical & Research Centers',
                'salary' => '₹18,000 – ₹24,000 / month',
                'status' => 'active',
                'job_description' => '<p>Deliver clinical-grade sanitization, touchless fixture replenishments, and UV decontamination in high-traffic research and medical facilities.</p><ul><li>Perform systematic top-to-bottom disinfection using hospital-grade virucidal solutions.</li><li>Restock sensor dispensers, organic hand washes, and paper consumables.</li><li>Operate steam cleaners and odor-neutralizing ozone air scrubbers.</li><li>Maintain sanitization log sheets and report maintenance defects immediately.</li></ul>',
                'qualification_requirements' => 'Clean police verification, disciplined punctuality, adherence to chemical dilution norms. Freshers welcome.',
                'responsibilities' => 'Restroom disinfection, dispenser replenishment, touchpoint sanitization, hourly audit signing.',
            ],
        ];

        foreach ($jobs as $job) {
            JobApplication::updateOrCreate(
                ['title' => $job['title']],
                $job
            );
        }
    }
}
