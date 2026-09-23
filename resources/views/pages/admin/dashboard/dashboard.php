<?php

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

new #[Layout('layouts::admin')] #[Title('Command Center - FacilityPro Admin')] class extends Component
{
    /**
     * @return array<int, array<string, mixed>>
     */
    public function getProposalsProperty(): array
    {
        return [
            [
                'id' => 'PRP-2026-081',
                'client' => 'Marcus Vance',
                'company' => 'Harbor Executive Towers',
                'property' => 'Commercial Tower',
                'area' => '400,000 sq.ft',
                'services' => 'Janitorial, Restroom, Pantry',
                'status' => 'In Review',
                'date' => 'Today, 11:24 AM',
            ],
            [
                'id' => 'PRP-2026-080',
                'client' => 'Sarah Jenkins',
                'company' => 'Vertex Tech Labs HQ',
                'property' => 'Tech Campus',
                'area' => '250,000 sq.ft',
                'services' => 'MEP & HVAC Care',
                'status' => 'Pending Audit',
                'date' => 'Today, 09:15 AM',
            ],
            [
                'id' => 'PRP-2026-079',
                'client' => 'David Thorne',
                'company' => 'Brookfield Financial Tower',
                'property' => 'Corporate HQ',
                'area' => '180,000 sq.ft',
                'services' => 'Full 6-Capability Master SLA',
                'status' => 'Active Contract',
                'date' => 'Yesterday, 04:30 PM',
            ],
            [
                'id' => 'PRP-2026-078',
                'client' => 'Elena Rostova',
                'company' => 'St. Jude Medical Center',
                'property' => 'Healthcare Facility',
                'area' => '120,000 sq.ft',
                'services' => 'Restroom Hygiene & Disinfection',
                'status' => 'Approved',
                'date' => 'Yesterday, 02:10 PM',
            ],
        ];
    }

    /**
     * @return array<int, array<string, mixed>>
     */
    public function getQrLogsProperty(): array
    {
        return [
            [
                'zone' => 'Tower A • Executive Restroom Floor 14',
                'operator' => 'Elena R. (W-2 #1042)',
                'task' => '4-Hr Touchless Refill & Enzymatic Wash',
                'status' => 'Verified 100%',
                'time' => '12 mins ago',
            ],
            [
                'zone' => 'Main Lobby • South Wing Marble Corridors',
                'operator' => 'David M. (W-2 #1088)',
                'task' => 'Orbital Auto-Scrub & HEPA Sweeping',
                'status' => 'Verified 100%',
                'time' => '34 mins ago',
            ],
            [
                'zone' => 'Building B • Executive Pantry Suite 400',
                'operator' => 'Sarah L. (W-2 #1104)',
                'task' => 'Boardroom Prep & Restock Service',
                'status' => 'Verified 100%',
                'time' => '1 hour ago',
            ],
            [
                'zone' => 'Plant Room • Primary Chiller & HVAC Bank',
                'operator' => 'Michael T. (Engineer #201)',
                'task' => 'Filter Differential & Thermal FLIR Scan',
                'status' => 'Verified 100%',
                'time' => '2 hours ago',
            ],
        ];
    }
};