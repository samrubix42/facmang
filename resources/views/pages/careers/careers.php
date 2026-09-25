<?php

use Livewire\Attributes\Title;
use Livewire\Component;

new #[Title('Careers - Join Our Operations Team - FacilityPro')] class extends Component
{
    public string $applicantName = '';

    public string $applicantEmail = '';

    public string $applicantPhone = '';

    public string $selectedJob = 'Commercial Sweeping & Floor Care Specialist';

    public string $experience = '';

    public string $shift = 'Day Shift';

    public string $message = '';

    public bool $submitted = false;

    /**
     * @return array<string, array<string, string>>
     */
    protected function rules(): array
    {
        return [
            'applicantName' => ['required', 'string', 'min:2', 'max:100'],
            'applicantEmail' => ['required', 'email', 'max:150'],
            'applicantPhone' => ['required', 'string', 'min:7', 'max:30'],
            'selectedJob' => ['required', 'string'],
            'experience' => ['required', 'string'],
            'shift' => ['required', 'string'],
            'message' => ['nullable', 'string', 'max:1000'],
        ];
    }

    public function selectPosition(string $title): void
    {
        $this->selectedJob = $title;
        $this->submitted = false;
    }

    public function resetSubmission(): void
    {
        $this->submitted = false;
    }

    public function apply(): void
    {
        $this->validate();

        $this->submitted = true;

        $this->dispatch('toast-show', [
            'message' => 'Thank you, '.$this->applicantName.'! Your application for '.$this->selectedJob.' has been received.',
            'type' => 'success',
            'position' => 'top-right',
        ]);

        $this->reset(['applicantName', 'applicantEmail', 'applicantPhone', 'experience', 'message']);
    }

    /**
     * @return array<int, array<string, mixed>>
     */
    public function openPositions(): array
    {
        return [
            [
                'id' => 'sweep-lead',
                'title' => 'Commercial Sweeping & Floor Care Specialist',
                'category' => 'cleaning',
                'category_name' => 'Cleaning & Sweeping',
                'icon' => 'ri-brush-3-line',
                'type' => 'Full-Time',
                'location' => 'On-Site IT Park & Corporate Towers',
                'compensation' => '₹22,000 – ₹28,000 / month + Shift Allowance',
                'description' => 'Operate industrial walk-behind and ride-on battery scrubbers, perform stone floor crystallization, and complete digital QR audit checkpoints.',
                'perks' => ['Direct W-2 Employment', 'ESI & Provident Fund (PF)', 'Paid Safety Uniforms & Shoes', 'Overtime Eligible (1.5x)'],
                'requirements' => ['1+ years experience in commercial janitorial or floor restoration', 'Ability to lift up to 20 kg safely', 'Authorized to work with verified ID proof', 'Punctual and safety conscious'],
            ],
            [
                'id' => 'pantry-steward',
                'title' => 'Executive Hospitality & Pantry Steward',
                'category' => 'pantry',
                'category_name' => 'Pantry & Staffing',
                'icon' => 'ri-cup-line',
                'type' => 'Full-Time',
                'location' => 'Class-A Corporate Headquarters',
                'compensation' => '₹20,000 – ₹25,000 / month + Attendance Bonus',
                'description' => 'Manage executive boardroom hospitality, barista coffee machines, beverage restocking, and micro-kitchen sanitation with white-glove etiquette.',
                'perks' => ['Corporate Schedule (Mon–Fri)', 'Paid Barista Training', 'Full ESI, PF & Medical', 'Paid Leave & Festival Bonus'],
                'requirements' => ['Customer-centric presentation & polite communication', 'Basic hospitality or pantry experience', 'Attention to hygiene in executive settings'],
            ],
            [
                'id' => 'mep-tech',
                'title' => 'Lead MEP & HVAC Maintenance Technician',
                'category' => 'mep',
                'category_name' => 'MEP & Technical',
                'icon' => 'ri-tools-line',
                'type' => 'Full-Time',
                'location' => 'Commercial Campus & Healthcare Hubs',
                'compensation' => '₹35,000 – ₹48,000 / month + Tool Allowance',
                'description' => 'Perform preventative mechanical, electrical, and plumbing diagnostics. Oversee HEPA filter cycle swaps and building automation system checks.',
                'perks' => ['Annual Tool & PPE Allowance', 'Paid Technical Certifications', 'ESI, PF & Comprehensive Insurance', 'Overtime & Emergency Pay'],
                'requirements' => ['ITI / Diploma in Electrical / Mechanical / HVAC', '3+ years commercial MEP or critical HVAC experience', 'Strong diagnostic and BMS monitoring skills'],
            ],
            [
                'id' => 'shift-supervisor',
                'title' => 'Field Operations Shift Supervisor',
                'category' => 'management',
                'category_name' => 'Field Operations',
                'icon' => 'ri-user-star-line',
                'type' => 'Full-Time',
                'location' => 'Regional Corporate Operations Fleet',
                'compensation' => '₹5,50,000 – ₹7,20,000 / year + Performance Bonus',
                'description' => 'Supervise dedicated crews across commercial facilities. Conduct quality walkthroughs, manage supply rosters, and ensure 99.85% SLA compliance.',
                'perks' => ['Annual Performance Bonus', 'Travel & Fuel Allowance', 'Paid Leadership Certifications', 'PF, Gratuity & Family Health Cover'],
                'requirements' => ['2+ years supervisory experience in commercial facilities', 'Proven team leadership and schedule management', 'Strong reporting and communication skills'],
            ],
            [
                'id' => 'facade-tech',
                'title' => 'High-Rise Architectural Facade Technician',
                'category' => 'facades',
                'category_name' => 'Facades & Height Care',
                'icon' => 'ri-building-2-line',
                'type' => 'Full-Time',
                'location' => 'Commercial High-Rise Towers',
                'compensation' => '₹28,000 – ₹38,000 / month + Height Allowance',
                'description' => 'Perform rope access and cradle glass cleaning, exterior architectural surface washes, and facade caulking inspections on high-rise structures.',
                'perks' => ['Paid Rope Access & Height Safety Training', 'Top-Tier Fall Arrest Equipment Provided', 'Special Height Hazard Allowance', 'Full Insurance Coverage'],
                'requirements' => ['Comfortable working at heights with harness safety', 'Prior exterior window cleaning or facade experience', 'Safety-first operational discipline'],
            ],
            [
                'id' => 'restroom-specialist',
                'title' => 'Clinical Restroom Hygiene Specialist',
                'category' => 'cleaning',
                'category_name' => 'Cleaning & Sweeping',
                'icon' => 'ri-drop-line',
                'type' => 'Full-Time',
                'location' => 'Medical & Research Centers',
                'compensation' => '₹18,000 – ₹24,000 / month + Shift Premium',
                'description' => 'Deliver clinical-grade restroom disinfection, touchless dispenser restocking, and automated UV surface decontamination routines.',
                'perks' => ['Steady Year-Round Employment', 'ESI, PF & Medical Coverage', 'Paid Sick Leave', 'Daily PPE & Safety Gear Provided'],
                'requirements' => ['Dependable punctuality and work ethic', 'Basic understanding of chemical dilution and safety protocols', 'Clean background verification'],
            ],
        ];
    }
};
