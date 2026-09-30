<?php

namespace App\Services;

class ServiceCatalog
{
    /**
     * @return array<int, array<string, mixed>>
     */
    public static function all(): array
    {
        return [
            [
                'slug' => 'mechanized-operations',
                'title' => 'Mechanized Cleaning Operations',
                'badge' => 'Machine-Floor Operations',
                'icon' => 'ri-robot-2-line',
                'category' => 'mechanized-operations',
                'category_label' => 'Mechanized Operations',
                'tagline' => 'Latest Equipment, Reputed Company Tie-Ups & A Smart Cleaning Process',
                'short_description' => 'Machine-assisted cleaning with the latest scrubbers, jet washers and pressure systems, backed by tie-ups with reputed equipment companies and run through a smart, checklist-driven cleaning process.',
                'image' => 'images/services/mechanized_operations.jpg',
                'sla_rating' => '99.5% Machine Cycle Compliance',
                'response_time' => 'Same-Shift Spot Response',
                'staff_standard' => 'Machines Operated By Trained In-House Technicians',
                'frequency' => 'Daily Shifts & Weekly Machine Cycles',
                'full_description' => 'Mechanized Cleaning Operations provide high-efficiency, technology-driven floor maintenance designed for commercial, industrial, and residential properties. Traditional manual mopping methods often push dirt around, consume excessive water, and produce inconsistent hygiene results across large square footage. Our mechanized cleaning solutions replace manual labor with advanced auto-scrubber driers, high-pressure jet washers, wet and dry industrial vacuum cleaners, and single-disc floor polishing machinery. Every machine operator on site is a trained technician skilled in chemical dosing, equipment safety, and surface-specific scrubbing techniques. Our operations cover daily shift maintenance, post-working-hour deep scrubs, and periodic floor restoration. Auto-scrubbers instantly distribute clean water mixed with specialized eco-friendly cleaning formulas, scrub the floor surface thoroughly using high-torque brushes, and vacuum up the slurry in a single pass, leaving floors clean, dry, and safe for immediate foot traffic. By standardizing machine deployment schedules, managing OEM equipment tie-ups, and logging every operational run via supervisor sign-offs, we deliver a 99.5% machine cycle compliance rate. Whether maintaining marble lobbies, vitrified tile corridors, granite aprons, or industrial concrete bays, mechanized cleaning ensures maximum surface hygiene, reduced water usage, and extended floor lifespan without interrupting daily site activities.',
                'features' => [
                    'High-Performance Fleet' => 'Industrial auto scrubbers, pressure jet washers, wet/dry vacuums, and floor polishers.',
                    'Checklist-Driven Cycles' => 'Pre-shift machine checks, daily zone scrubbing, and logged supervisor verifications.',
                    'Eco-Dosing & Water Saving' => 'Controlled chemical dilution and high-efficiency recovery systems.',
                    'Trained Tech Operators' => 'Certified technicians skilled in machine safety, battery care, and surface chemistry.',
                    'Zero-Disruption Scheduling' => 'Execution planned during off-peak and post-office hours for seamless site flow.',
                ],
                'scope' => [
                    'daily' => [
                        'Pre-shift machine check covering battery, brushes, squeegee and water levels',
                        'Auto-scrubbing, vacuuming and dusting of hard-floor zones and lobbies',
                        'Spot response to spills and high-footfall areas through the day',
                        'End-of-shift logging of completed zones against the daily checklist',
                    ],
                    'periodic' => [
                        'Weekly deep scrub and machine polish of marble, granite and vitrified floors',
                        'Fortnightly high-reach dusting of ceilings, ducting and light fittings',
                        'Monthly carpet and upholstery hot-water shampoo extraction',
                        'Quarterly pressure jet washing of driveways, podiums and entrance aprons',
                    ],
                ],
                'equipment' => [
                    'Ride-On & Walk-Behind Auto Scrubber Driers',
                    'High-Pressure Jet Washers and Foam Cannons',
                    'Wet & Dry Industrial Vacuum Cleaners',
                    'Carpet and Upholstery Shampoo Extractors',
                    'Microfibre and Colour-Coded Cleaning Tools',
                ],
            ],
            [
                'slug' => 'washroom-services',
                'title' => 'Washroom Services',
                'badge' => 'Washroom Hygiene',
                'icon' => 'ri-water-flash-line',
                'category' => 'washroom-services',
                'category_label' => 'Washroom Services',
                'tagline' => 'Scheduled Rounds, Disinfection, Replenishment & Documented Checks',
                'short_description' => 'Multi-round washroom care with touchpoint disinfection, consumable replenishment, odour control at source, and supervisor-verified hygiene checklists for every washroom in the building.',
                'image' => 'images/services/washroom_services.jpg',
                'sla_rating' => '99% Hygiene Checklist Compliance',
                'response_time' => '15-Minute Spill & Overflow Response',
                'staff_standard' => 'Uniformed Staff Trained In Washroom Hygiene & Safety',
                'frequency' => '4 To 8 Rounds Per Day',
                'full_description' => 'Washroom Services are critical to maintaining health standards, tenant satisfaction, and property reputation across corporate offices, commercial towers, and residential communities. Washrooms are the highest-footfall touchpoints in any building and require structured, multi-round sanitation rather than occasional basic cleaning. Our dedicated washroom hygiene management system operates on a scheduled round schedule, increasing cleaning frequency during morning, afternoon, and evening peak usage windows to prevent foul odors, empty dispensers, and dirty surfaces. Every service round follows strict hygiene protocols covering touchpoint disinfection, fixture descaling, floor drying, consumable restocking, and waste disposal. All high-touch areas—including door handles, faucet levers, flush buttons, partition latches, paper dispensers, and waste bins—are disinfected with hospital-grade, non-corrosive sanitizing agents. Consumables such as liquid hand soap, paper towels, tissue rolls, and sanitary bags are monitored continuously to ensure dispensers never run empty. To eliminate foul odors at their root cause, we utilize enzymatic drain and trap treatments that break down organic waste inside pipes rather than masking odors with heavy synthetic sprays. Every washroom carries a visible daily checklist updated and signed by duty supervisors, providing complete audit compliance.',
                'features' => [
                    'Scheduled Multi-Round Care' => 'Fixed daily cleaning rounds (4 to 8 rounds per day) with peak-hour coverage.',
                    'Touchpoint Disinfection' => 'Frequent sanitization of handles, taps, flush levers, partitions, and dispenser buttons.',
                    'Consumable Management' => 'Proactive replenishment of soap, tissue rolls, hand towels, and sanitary supplies.',
                    'Enzymatic Odor Control' => 'Root-cause odor treatment targeting drain traps and urinal pipes without harsh fumes.',
                    'Digital & Signed Checklists' => 'Supervisor-verified inspection logs displayed in every washroom for complete transparency.',
                ],
                'scope' => [
                    'daily' => [
                        'Pre-peak deep round covering fixtures, mirrors, partitions and floors',
                        'Peak-hour touchpoint disinfection, refilling and spot response',
                        'Rapid spill and overflow response with signage and wet-floor drying',
                        'End-of-day sanitation round with floor wash and forced-air drying',
                    ],
                    'periodic' => [
                        'Weekly deep scrub of tiles, grout lines, partitions and urinal areas',
                        'Weekly cleaning of exhaust vents, ducts and washroom ceilings',
                        'Fortnightly descaling of taps, aerators and shower panels',
                        'Monthly drain trap, floor trap and sensor cleaning',
                    ],
                ],
                'equipment' => [
                    'No-Touch Washroom Cleaning Systems',
                    'Commercial Dry Steam Vaporizers',
                    'Enzymatic Drain and Trap Treatment Kits',
                    'Colour-Coded Microfibre Cloths and Mops',
                    'Handheld Wet & Dry Vacuum Units',
                ],
            ],
            [
                'slug' => 'deep-cleaning-services',
                'title' => 'Deep Cleaning Services',
                'badge' => 'Periodic Deep Care',
                'icon' => 'ri-spray-line',
                'category' => 'deep-cleaning-services',
                'category_label' => 'Deep Cleaning Services',
                'tagline' => 'High-Reach, High-Pressure, Carpet & Kitchen-Exhaust Deep Work',
                'short_description' => 'Planned deep cleaning for flats, cabins, common areas, carpets, kitchen exhausts and high-reach surfaces, executed on a fixed periodic cycle with a documented before-and-after checklist.',
                'image' => 'images/services/deep_cleaning_services.jpg',
                'sla_rating' => '100% Deep Cycle Completion Reports',
                'response_time' => 'Scheduled Slots Confirmed 72 Hours In Advance',
                'staff_standard' => 'Specialist Deep-Cleaning Crew With Full PPE',
                'frequency' => 'Monthly, Quarterly & Pre-Event Slots',
                'full_description' => 'Deep Cleaning Services deliver intensive, periodic sanitation targeting embedded grime, hard water stains, high-reach dust, and heavy soil build-up that standard daily housekeeping cannot address. Over time, dust accumulates on ceiling beams, air conditioning vents, light fixtures, and structural ledges, while grout lines, carpets, upholstery, and hard floors absorb grease and deep-seated dirt. Our specialized deep cleaning crews operate on planned monthly, quarterly, and pre-event cycles to restore property interiors and exteriors to pristine condition. Equipped with hot-water carpet extractors, heavy-duty steam vaporizers, floor stripping machines, and high-reach cleaning rods, our teams execute systematic deep cleans for corporate offices, commercial facilities, and residential premises. Hard floors undergo deep scrubbing, chemical descaling, and protective polishing; carpets and fabric chairs undergo hot-water shampoo extraction and targeted stain removal; and kitchen exhausts and grease traps receive thorough degreasing. All work is conducted adhering to height safety standards using appropriate scaffolding and safety harnesses. Before initiating work, our supervisors conduct a site walkthrough, and upon completion, a comprehensive before-and-after audit checklist with photo documentation is delivered.',
                'features' => [
                    'High-Reach & Overhead Dusting' => 'Cleaning of ductwork, ceiling beams, light fixtures, and overhead ledges.',
                    'Hard Floor Scrubbing & Polishing' => 'Deep scrubbing, descaling, and polishing for tile, marble, and granite floors.',
                    'Hot-Water Carpet Extraction' => 'Deep shampoo extraction and stain treatment for carpets, sofas, and office chairs.',
                    'Kitchen & Exhaust Degreasing' => 'Specialized removal of heavy oil, carbon, and grease from exhausts and kitchen surfaces.',
                    'Documented Quality Audit' => 'Before-and-after inspection report complete with photo evidence and sign-offs.',
                ],
                'scope' => [
                    'daily' => [
                        'Pre-planning walkthrough to finalise areas, timing, machinery and access',
                        'Dry removal of dust and debris before any wet process begins',
                        'Zone-wise deep cleaning by a dedicated specialist crew',
                        'Post-clean quality check with the client representative',
                    ],
                    'periodic' => [
                        'Monthly deep clean of common areas, washrooms and stairwells',
                        'Quarterly carpet and upholstery shampoo extraction',
                        'Quarterly kitchen, chimney and exhaust duct degreasing',
                        'Half-yearly high-reach cleaning of ceilings, ducting and light fittings',
                    ],
                ],
                'equipment' => [
                    'Hot Water Carpet Extractors',
                    'High-Pressure Jet Washers and Drain Cameras',
                    'Foam Machines and Degreaser Units',
                    'Dry Steam Vaporizers and Reach Rods',
                    'Height Access Equipment and Safety Harnesses',
                ],
            ],
            [
                'slug' => 'landscaping',
                'title' => 'Landscaping & Horticulture',
                'badge' => 'Green Area Management',
                'icon' => 'ri-plant-line',
                'category' => 'landscaping',
                'category_label' => 'Landscaping',
                'tagline' => 'Lawns, Planting, Irrigation, Tree Care & Seasonal Foliage',
                'short_description' => 'Complete green area management for gardens, lawns, podiums and terraces — lawn care, planting, irrigation, tree pruning, seasonal foliage and waste-free upkeep by a trained horticulture crew.',
                'image' => 'images/services/landscaping.jpg',
                'sla_rating' => 'Weekly Green Area Checklist Compliance',
                'response_time' => '24-Hour Post-Storm Clearance',
                'staff_standard' => 'Trained Horticulture Crew With Protective Equipment',
                'frequency' => 'Daily Touch-Up & Weekly Maintenance Cycles',
                'full_description' => 'Landscaping & Horticulture Services provide end-to-end management for green spaces, gardens, lawns, podium decks, and indoor planters across residential societies and corporate campuses. Beautifully maintained landscapes enhance property value, improve air quality, and create welcoming environments for residents, staff, and visitors. Our dedicated horticulture teams combine routine daily maintenance with planned seasonal planting, lawn care, tree pruning, and irrigation management to keep greenery lush and healthy year-round. Our scope of work includes regular lawn mowing, turf aeration, edge trimming, weed removal, and soil conditioning using organic fertilizers and compost. We oversee manual and automated irrigation systems—including drip lines and sprinkler heads—performing regular pressure checks to prevent water waste and dry zones. Qualified gardeners manage shrub shaping, seasonal flower bed planting, and safe tree pruning to prevent overgrown branches from obstructing lighting or building structures. Following storms or seasonal leaf sheds, our crews immediately clear green waste and route all organic matter to approved composting units, ensuring zero waste accumulation on site.',
                'features' => [
                    'Lawn & Turf Management' => 'Precision mowing, edging, weed control, turf aeration, and seasonal overseeding.',
                    'Irrigation System Upkeep' => 'Daily operation and leak checks for sprinkler and drip irrigation networks.',
                    'Tree Pruning & Shrub Shaping' => 'Safe branch trimming, hedge shaping, and structural pruning near building facades.',
                    'Soil Health & Organic Feeding' => 'Regular application of eco-friendly fertilizers, compost, and soil conditioners.',
                    'Green Waste Handling' => 'Systematic collection, shredding, and composting of leaves and organic cuttings.',
                ],
                'scope' => [
                    'daily' => [
                        'Litter picking across lawns, garden paths, podium decks and seating areas',
                        'Watering of lawns, planters and flowering beds as per the irrigation schedule',
                        'Daily check of sprinkler and drip systems for leaks and blocked lines',
                        'Immediate removal of wilted plants, broken branches and storm debris',
                    ],
                    'periodic' => [
                        'Weekly mowing, edging and lawn maintenance across all green areas',
                        'Weekly hedge trimming, plant shaping and bed weeding',
                        'Monthly fertilisation, mulching and soil conditioning of planters',
                        'Quarterly pruning and shaping of trees and large shrubs',
                    ],
                ],
                'equipment' => [
                    'Petrol & Electric Lawn Mowers',
                    'Hedge Trimmers and Brush Cutters',
                    'Pruning Shears, Pole Saws and Ladders',
                    'Sprinkler and Drip Irrigation Systems',
                    'Personal Protective Equipment',
                ],
            ],
            [
                'slug' => 'pest-management',
                'title' => 'Pest Management',
                'badge' => 'Pest Control',
                'icon' => 'ri-bug-line',
                'category' => 'pest-management',
                'category_label' => 'Pest Management',
                'tagline' => 'Mosquito, Termite, Cockroach, Rodent & Site-Specific Control',
                'short_description' => 'Scheduled and on-demand pest management for mosquitoes, termites, cockroaches, rodents and other site-specific pests, with safe application for occupied buildings and a documented treatment history.',
                'image' => 'images/services/pest_management.jpg',
                'sla_rating' => 'Recurrence Assurance on Treated Areas',
                'response_time' => '24-Hour Response On New Sightings',
                'staff_standard' => 'Trained Applicators With PPE & Approved Chemistries',
                'frequency' => 'Monthly To Quarterly Treatment Cycles',
                'full_description' => 'Pest Management Services deliver targeted, scientific pest elimination and prevention for commercial buildings, corporate offices, industrial facilities, and residential societies. Pest infestations pose severe risks to occupant health, hygiene compliance, structural woodwork, and corporate reputation. Rather than relying on generic blanket sprays, our approach begins with a comprehensive site survey to identify pest species, entry pathways, moisture hot spots, and nesting sites before developing a tailored treatment protocol. Our pest control operations tackle mosquitoes, cockroaches, termites, rodents, ants, bedbugs, and site-specific vermin using odorless, low-toxicity, EPA-approved chemicals that are completely safe for occupied spaces. Mosquito management includes standing water larviciding, cold fogging, and window screen checks; rodent control utilizes secure bait stations, snap traps, and entry-point wire mesh sealing; and termite management incorporates soil barrier injections and wood treatment. Every service visit is documented in a detailed pest register recording chemicals applied, dilution ratios, targeted areas, and recommended preventative measures.',
                'features' => [
                    'Survey-Based Strategy' => 'Initial inspection mapping pest species, entry points, and breeding harborage.',
                    'Odorless & Safe Chemistry' => 'Use of eco-friendly, low-toxicity, government-approved chemical formulations.',
                    'Comprehensive Pest Coverage' => 'Targeted control for mosquitoes, cockroaches, termites, rodents, and ants.',
                    'Rodent Proofing & Baiting' => 'Placement of tamper-resistant bait stations and structural entry-point sealing.',
                    'Detailed Service Logbook' => 'Documented registers of treatment dates, chemicals used, and warranty follow-up visits.',
                ],
                'scope' => [
                    'daily' => [
                        'Visual monitoring of known hot spots during routine facility rounds',
                        'Immediate reporting of fresh sightings, droppings or nesting activity',
                        'Safe removal and disposal of infested material and dead rodents',
                        'Waterlogging checks and elimination of standing water in terraces and drains',
                    ],
                    'periodic' => [
                        'Monthly preventive treatment in kitchens, pantries, stores and washrooms',
                        'Monthly rodent control through baiting, trapping and sealing of entry points',
                        'Quarterly termite inspection of vulnerable wooden and structural areas',
                        'Pre-monsoon mosquito control with fogging and larviciding',
                    ],
                ],
                'equipment' => [
                    'ULV and Aerosol Applicator Machines',
                    'Cold Fogging Units',
                    'Bait Stations, Traps and Rodent Sealants',
                    'Termite Injection and Drilling Equipment',
                    'Handheld Sprayers and Dosing Measures',
                ],
            ],
            [
                'slug' => 'office-space-management',
                'title' => 'Office Space & Floor Management',
                'badge' => 'Workplace Facility Management',
                'icon' => 'ri-building-2-line',
                'category' => 'office-space-management',
                'category_label' => 'Office Space & Floor Management',
                'tagline' => 'Cabin, Workstation, Pantry, Conference Room & Floor-Wise Rostering',
                'short_description' => 'Floor-wise facility management for corporate workplaces — cabin and workstation cleaning, conference room and pantry upkeep, waste segregation, and night operations with verified supervisor checks.',
                'image' => 'images/services/office_space_management.jpg',
                'sla_rating' => '99% Floor Checklist Compliance',
                'response_time' => '30-Minute Response During Office Hours',
                'staff_standard' => 'Uniformed, Background-Checked Floor Teams',
                'frequency' => 'Daily Shifts With Weekly Deep Cycles',
                'full_description' => 'Office Space & Floor Management provides dedicated, floor-wise facility maintenance tailored to corporate workplaces, IT parks, and administrative centers. A clean, organized office directly boosts employee productivity, reduces sick leaves, and upholds corporate brand standards. We deploy trained, background-verified floor teams assigned to specific floors, ensuring personal accountability for every cabin, workstation, conference room, pantry, and restroom throughout the workday. Daytime attendants maintain continuous presence for live service requests, spill cleanup, conference room resets, and pantries, while night crews execute heavy floor scrubbing and deep vacuuming so desks and carpets are fresh before office hours. Workstations undergo desk wiping, computer-safe dusting, chair vacuuming, and trash bin emptying. Pantries are sanitized continuously with special attention to microwaves, coffee machines, refrigerators, and sinks. We also enforce strict waste segregation at source, separating organic, recyclable, and hazardous electronic waste to align with corporate sustainability goals.',
                'features' => [
                    'Dedicated Floor Rostering' => 'Named floor attendants with backup coverage for daily continuity.',
                    'Workstation & Cabin Care' => 'Sanitization of desk surfaces, partition panels, chairs, and electronic fixtures.',
                    'Pantry & Breakroom Sanitation' => 'Hygiene maintenance for appliances, counter tops, sink traps, and dining spaces.',
                    'Source Waste Segregation' => 'Systematic separation of wet, dry, and recyclable waste at office collection points.',
                    'Conference Room Reset' => 'Prompt cleaning, table wiping, and chair arrangement between meetings.',
                ],
                'scope' => [
                    'daily' => [
                        'Daytime floor presence for live requests, spill response and hygiene checks',
                        'Washroom rounds and consumable refilling during office hours',
                        'Pantry and break area cleaning with appliance wipe-down at close of day',
                        'Night shift machine cleaning and deep vacuuming of the floor',
                    ],
                    'periodic' => [
                        'Weekly deep vacuum of chairs, partitions, storage and under-desk areas',
                        'Weekly washroom deep cycle and glass and mirror cleaning',
                        'Fortnightly high-reach dusting of ceiling fixtures and vents',
                        'Monthly carpet and chair shampoo extraction',
                    ],
                ],
                'equipment' => [
                    'Walk-Behind Auto Scrubber Driers',
                    'Wet & Dry Vacuum Cleaners',
                    'Carpet and Upholstery Shampoo Machines',
                    'Colour-Coded Microfibre Cleaning Kits',
                    'Washroom Sanitation and Disinfection Units',
                ],
            ],
            [
                'slug' => 'residential-society-management',
                'title' => 'Residential Society Management',
                'badge' => 'Society Operations',
                'icon' => 'ri-building-community-line',
                'category' => 'residential-society-management',
                'category_label' => 'Residential Society Management',
                'tagline' => 'Housekeeping Staff, Horticulture, Security, Technical Upkeep & Amenities',
                'short_description' => 'End-to-end residential society management — housekeeping staff deployment, horticulture, security coordination, technical upkeep, amenity care, monthly audits and clear resident communication.',
                'image' => 'images/services/residential_society_management.jpg',
                'sla_rating' => 'Monthly Audit Score Reported To The Committee',
                'response_time' => '24x7 Support Desk & On-Call Technical Staff',
                'staff_standard' => 'Trained, Uniformed & Background-Verified Residential Staff',
                'frequency' => 'Daily Operations With Monthly Committee Reporting',
                'full_description' => 'Residential Society Management offers comprehensive, end-to-end facility governance for housing societies, gated communities, and apartment complexes. Managing a residential society requires seamless coordination across multiple operational domains—including housekeeping, horticulture, technical utility upkeep, security oversight, and vendor management. We deploy a dedicated on-site Facility Manager who acts as the single point of contact for the managing committee and residents, overseeing daily operations and maintaining quality standards. Our residential team covers daily cleaning of common lobbies, elevators, staircases, clubhouses, gymnasiums, and parking decks. Technical staff conduct daily walkthroughs inspecting water pumps, overhead tanks, diesel generators, lift machinery, and common area lighting to prevent unexpected utility failures. Horticulture crews care for lawns and gardens, while our support desk manages resident complaints 24/7. Every month, the management committee receives a transparent facility audit report covering service scores, equipment maintenance status, energy usage, and resolved ticket summaries.',
                'features' => [
                    'Single Point Accountability' => 'Dedicated on-site Facility Manager overseeing all operations and vendor teams.',
                    'Common Area Housekeeping' => 'Daily cleaning of lobbies, corridors, elevators, stairwells, and amenities.',
                    'Technical & Utility Walkthroughs' => 'Routine checks of pumps, DG sets, water storage tanks, and common electricals.',
                    '24/7 Resident Support Desk' => 'Round-the-clock helpdesk for maintenance logging and quick emergency response.',
                    'Monthly Committee Reporting' => 'Transparent audit reports covering compliance scores, maintenance logs, and budget tracking.',
                ],
                'scope' => [
                    'daily' => [
                        'Supervising housekeeping shifts and verifying common area cleaning',
                        'Landscaping touch-up, watering and litter picking',
                        'Security desk coordination and visitor register review',
                        'Technical walkthrough of lifts, pumps, DG, water tanks and lighting',
                    ],
                    'periodic' => [
                        'Weekly deep cleaning cycles for common areas, washrooms and lift interiors',
                        'Monthly water tank cleaning, pest control and landscaping cycles',
                        'Monthly facility audit presented to the management committee',
                        'Quarterly lift, pump and DG preventive maintenance',
                    ],
                ],
                'equipment' => [
                    'Cleaning Machines for Common Areas',
                    'Horticulture Tools and Irrigation Systems',
                    'Pest Control Applicators and Bait Stations',
                    'Technical Hand Tools and Safety Equipment',
                    'Checklist Boards, Registers and Reporting Tools',
                ],
            ],
            [
                'slug' => 'manufacturing-sector-services',
                'title' => 'Manufacturing Sector Services',
                'badge' => 'Industrial Facility Services',
                'icon' => 'ri-factory-line',
                'category' => 'manufacturing-sector-services',
                'category_label' => 'Manufacturing Sector Services',
                'tagline' => 'Shop Floor, Machine Bay, Spill Response, Dust Control & Canteen Hygiene',
                'short_description' => 'Facility services for plants and factories — shop floor and machine bay cleaning, spill response, dust and waste control, canteen and change room hygiene, delivered on shift-aligned rosters with safety-first execution.',
                'image' => 'images/services/manufacturing_sector_services.jpg',
                'sla_rating' => '99% Shift Roster Fulfilment',
                'response_time' => '15-Minute On-Site Spill Response',
                'staff_standard' => 'Shop-Floor Trained Crew With Zone-Specific Induction',
                'frequency' => 'Shift-Aligned Daily Rounds & Planned Overhauls',
                'full_description' => 'Manufacturing Sector Services deliver specialized industrial facility maintenance for factories, processing plants, warehouses, and manufacturing units. Industrial environments present complex operational challenges—including heavy oil and grease accumulation, airborne dust, chemical residue, and strict factory safety mandates. Our factory cleaning teams work on shift-aligned rosters synchronized with production schedules, ensuring plant cleanliness without disrupting manufacturing lines or machinery output. Our crews undergo zone-specific safety inductions and wear full Personal Protective Equipment (PPE) tailored to plant requirements. Scope of work includes machine bay cleaning, shop floor scrubbing, overhead truss dusting, and hazardous spill containment. In the event of oil, coolant, or chemical spills, our trained technicians deploy specialized absorbents and containment booms for immediate cleanup and safe waste disposal. Additionally, we maintain high hygiene standards across non-production zones—such as worker canteens, change rooms, locker facilities, and plant restrooms—promoting worker health and safety compliance.',
                'features' => [
                    'Production Shift Alignment' => 'Cleaning rosters designed around plant working shifts to minimize downtime.',
                    'Shop Floor & Machine Surround Care' => 'Removal of industrial oil, coolant, grease, and metal shavings from aisles and bays.',
                    'Rapid Spill Containment' => 'Absorbent response kits and trained protocols for chemical and oil spill cleanup.',
                    'Plant Safety & PPE Compliance' => 'Strict adherence to factory safety rules, work permits, and mandatory safety gear.',
                    'Canteen & Amenity Sanitation' => 'High-frequency hygienic cleaning for worker canteens, change rooms, and restrooms.',
                ],
                'scope' => [
                    'daily' => [
                        'Shop floor and machine bay cleaning within the permitted timings',
                        'Absorbent spill response for oil, chemical and water with safe disposal',
                        'Waste segregation, labelling and shift-end handover',
                        'Canteen, change room and washroom cleaning through the day',
                    ],
                    'periodic' => [
                        'Weekly deep cleaning of machine bases, service aisles and beneath fixed equipment',
                        'Monthly high-reach cleaning of roof trusses, ducting and lighting in production sheds',
                        'Monthly spillway, drainage and floor pit cleaning and inspection',
                        'Quarterly overhaul deep cleaning scheduled with plant shutdown windows',
                    ],
                ],
                'equipment' => [
                    'Ride-On & Walk-Behind Industrial Scrubbers',
                    'High-Pressure and Steam Cleaning Units',
                    'Industrial Wet & Dry Vacuum Cleaners',
                    'Oil Absorbent and Spill Containment Kits',
                    'Zone-Specific PPE and Safety Equipment',
                ],
            ],
        ];
    }

    /**
     * @return array<string, mixed>|null
     */
    public static function findBySlug(string $slug): ?array
    {
        foreach (self::all() as $service) {
            if ($service['slug'] === $slug) {
                return $service;
            }
        }

        return null;
    }

    /**
     * @return array<int, array<string, mixed>>
     */
    public static function related(string $currentSlug, int $limit = 3): array
    {
        $filtered = array_filter(self::all(), fn ($s) => $s['slug'] !== $currentSlug);

        return array_slice(array_values($filtered), 0, $limit);
    }
}
