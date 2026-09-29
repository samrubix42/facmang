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
                'full_description' => 'Mechanized cleaning replaces bucket-and-mop effort with measured cycles. Every zone is cleaned by a defined machine, at a defined frequency, by a trained operator, and verified on a zone checklist. Equipment is kept current through reputed OEM tie-ups, and completed runs are captured in your monthly audit report.',
                'features' => [
                    'Latest Equipment' => 'Auto scrubbers, jet washers and shampoo machines kept current through OEM tie-ups.',
                    'Smart Cleaning Process' => 'Every zone on a fixed frequency, verified and logged by a supervisor.',
                    'Operator Safety' => 'Trained technicians with daily machine checks and safe chemical handling.',
                    'Measured Results' => 'Controlled dosing cuts water and chemical use without reducing output.',
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
                'comparison' => [
                    ['feature' => 'Cleaning Method', 'us' => 'Machine-assisted, checklist-driven process', 'others' => 'Manual mopping with the same effort and cost'],
                    ['feature' => 'Equipment', 'us' => 'Latest machines through reputed company tie-ups', 'others' => 'Aged push mops and one shared vacuum'],
                    ['feature' => 'Water & Chemical Use', 'us' => 'Controlled dosing with measurable consumption', 'others' => 'Unmeasured buckets refilled repeatedly'],
                    ['feature' => 'Proof of Work', 'us' => 'Zone-wise logged checklist with supervisor sign-off', 'others' => 'Verbal assurance with nothing on record'],
                ],
                'faqs' => [
                    [
                        'q' => 'Do you bring your own machines, or do we need to own them?',
                        'a' => 'We bring, operate and maintain our own equipment as part of the contract. For large sites we can deploy additional or dedicated machines for a particular floor or zone.',
                    ],
                    [
                        'q' => 'Can machine cleaning be scheduled after working hours?',
                        'a' => 'Yes. Most machine cycles are planned for post-working hours so that noise, water and chemical use never disturb your staff or residents.',
                    ],
                    [
                        'q' => 'How is the smart cleaning process measured?',
                        'a' => 'Each zone has a defined task list and frequency. The duty supervisor completes and signs the checklist, and the completed report becomes part of the monthly audit shared with you.',
                    ],
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
                'full_description' => 'Washrooms are the first thing visitors judge, so we keep them consistent on a fixed round schedule with extra rounds during peak hours. Every round covers fixtures, touchpoints, floors, consumables and waste, and is verified by a duty supervisor. Odour is treated at the source with enzymatic drain care.',
                'features' => [
                    'Scheduled Rounds' => 'Fixed rounds through the day, with extra coverage during peak footfall.',
                    'Touchpoint Disinfection' => 'Handles, taps, flush levers, partitions and bins disinfected on every round.',
                    'Consumable Replenishment' => 'Soap, tissue and sanitary units stocked before they run out.',
                    'Signed Checklists' => 'Every washroom carries a daily checklist completed and signed by a supervisor.',
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
                'comparison' => [
                    ['feature' => 'Coverage', 'us' => 'Fixed multi-round schedule with peak-hour buffers', 'others' => 'One or two hurried visits a day'],
                    ['feature' => 'Verification', 'us' => 'Signed washroom checklist per round', 'others' => 'No record of who cleaned what'],
                    ['feature' => 'Odour Control', 'us' => 'Enzymatic root-cause treatment', 'others' => 'Strong sprays that only mask the smell'],
                    ['feature' => 'Safety', 'us' => 'Correct dilution, PPE and wet-floor barricading', 'others' => 'Open chemicals and unattended wet floors'],
                ],
                'faqs' => [
                    [
                        'q' => 'How many times a day are washrooms serviced?',
                        'a' => 'Between four and eight rounds depending on the usage pattern of the building. High-traffic commercial and society washrooms get additional rounds during morning and evening peaks.',
                    ],
                    [
                        'q' => 'Are the chemicals safe for children and residents?',
                        'a' => 'Yes. We use eco-friendly, low-toxicity chemistry with correct dilution, and staff are trained to keep washrooms usable and safe while treatment is in progress.',
                    ],
                    [
                        'q' => 'What happens if a washroom is not up to standard?',
                        'a' => 'The supervisor re-services the washroom the same shift, and the miss is recorded in our monthly audit report along with the corrective action taken.',
                    ],
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
                'full_description' => 'Deep cleaning separates a maintained building from a neglected one. We deliver it as a planned programme: grout, tiles, high-reach surfaces, carpets, kitchen exhausts and service areas are worked through on a fixed monthly, quarterly and pre-event cycle by a dedicated specialist crew, with a documented before-and-after checklist.',
                'features' => [
                    'Defined Cycle' => 'A published monthly, quarterly and pre-event schedule for all deep work.',
                    'High-Reach Cleaning' => 'Ceilings, ducts, fans, light fittings and ledges cleaned with reach equipment.',
                    'High-Pressure Work' => 'Driveways, podiums, ramps and external passages cleaned with jet washers.',
                    'Carpet & Upholstery' => 'Hot water extraction and stain treatment for carpets, sofas and chairs.',
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
                'comparison' => [
                    ['feature' => 'Planning', 'us' => 'Published deep-clean cycle with a named crew', 'others' => 'Called when something looks visibly bad'],
                    ['feature' => 'High Reach', 'us' => 'Access equipment and trained operators', 'others' => 'Ladders and skipped ceilings'],
                    ['feature' => 'Reporting', 'us' => 'Before-and-after checklist with photographs', 'others' => 'Verbal completion, no evidence'],
                    ['feature' => 'Scheduling', 'us' => 'Phased slots agreed around site operations', 'others' => 'Work blocking everyday activity'],
                ],
                'faqs' => [
                    [
                        'q' => 'How do you plan a deep cleaning programme?',
                        'a' => 'We walk the site, identify areas by condition and usage, then issue a monthly and quarterly calendar. Areas such as carpets, exhausts and high-reach zones are placed on their own frequency.',
                    ],
                    [
                        'q' => 'Can deep cleaning be done without disturbing daily operations?',
                        'a' => 'Yes. Work is phased floor by floor and, where possible, scheduled after hours or on weekends so residents, staff and production are not impacted.',
                    ],
                    [
                        'q' => 'Is deep cleaning included in the standard contract?',
                        'a' => 'It can be bundled into the annual contract at a fixed number of cycles, or taken as scheduled one-off slots depending on your budget and site condition.',
                    ],
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
                'full_description' => 'Green areas are the first thing residents notice. One trained horticulture crew looks after lawns, planting beds, hedges, trees, planters, podiums and terraces against a fixed weekly checklist, and also manages irrigation timing, seasonal planting and post-monsoon cleanup so the landscape stays presentable through every season.',
                'features' => [
                    'Complete Green Area Coverage' => 'Lawns, beds, hedges, trees, planters and terraces under a single crew.',
                    'Lawn Care' => 'Mowing, edging, aeration and weed control for lawns and open areas.',
                    'Irrigation Management' => 'Sprinkler and drip operation with watering schedules and leak checks.',
                    'Tree Care & Pruning' => 'Pruning, shaping and safety trimming of trees near buildings and walkways.',
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
                'comparison' => [
                    ['feature' => 'Crew', 'us' => 'Trained, uniformed and equipped horticulture crew', 'others' => 'One helper with hand tools'],
                    ['feature' => 'Irrigation', 'us' => 'Managed schedules with leak and coverage checks', 'others' => 'Unscheduled manual watering'],
                    ['feature' => 'Seasonal Work', 'us' => 'Planned planting and foliage cycles', 'others' => 'Plantings that die after a month'],
                    ['feature' => 'Green Waste', 'us' => 'Collected and routed to approved handling', 'others' => 'Piled up and burnt or dumped'],
                ],
                'faqs' => [
                    [
                        'q' => 'Do you look after lawns, planters and trees both?',
                        'a' => 'Yes. Our scope covers lawns, planting beds, hedges, trees, planters, podium gardens and terraces. If a specific element is maintained by the society, we simply exclude it from the scope.',
                    ],
                    [
                        'q' => 'Who supplies plants and garden materials?',
                        'a' => 'We can supply plants, soil, fertilizer and pots as part of the contract, or work with materials you already maintain on site. Both models are fine.',
                    ],
                    [
                        'q' => 'How is the monsoon handled?',
                        'a' => 'Pre-monsoon pruning and drainage checks are done in advance, and a dedicated post-monsoon cleanup cycle clears leaves, silt and blockages from gardens, drains and paths.',
                    ],
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
                'full_description' => 'Pest control should start with a survey, not a spray. We identify the pest, its entry route and breeding source, then design a treatment cycle for that specific problem. Applications use approved chemistry safe for occupied buildings, every treatment is recorded, and any pest that reappears within the cycle is treated again at no extra cost.',
                'features' => [
                    'Site Survey First' => 'Pest identification, entry-point mapping and source analysis before any treatment.',
                    'Mosquito Control' => 'Larviciding, fogging and screens to cut mosquito breeding and entry.',
                    'Termite & Vermin Control' => 'Structural termite treatment plus cockroach and rodent baiting and trapping.',
                    'Documented History' => 'A treatment register with date, area, product and follow-up for every visit.',
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
                'comparison' => [
                    ['feature' => 'Approach', 'us' => 'Survey, identify, treat the source', 'others' => 'Same spray on every visit regardless of pest'],
                    ['feature' => 'Coverage', 'us' => 'Hot spots, entry routes and breeding sites', 'others' => 'Visible areas only'],
                    ['feature' => 'Safety', 'us' => 'Approved chemistry, PPE, scheduled windows', 'others' => 'Strong spray applied in occupied areas'],
                    ['feature' => 'Records', 'us' => 'Treatment register shared with the client', 'others' => 'No history, no follow-up'],
                ],
                'faqs' => [
                    [
                        'q' => 'How often should pest control be done?',
                        'a' => 'It depends on the site. Most residential societies and commercial facilities need monthly preventive treatment, with quarterly termite and pre-monsoon mosquito cycles added on top.',
                    ],
                    [
                        'q' => 'Is the treatment safe for children, pets and residents?',
                        'a' => 'Yes. We use approved, low-toxicity chemistry with correct dilution, and treatments are scheduled in windows when the area can be kept unused. Instructions are provided after every application.',
                    ],
                    [
                        'q' => 'What if the same pest comes back after treatment?',
                        'a' => 'We re-inspect the area, identify why the treatment did not hold and re-apply at no additional cost within the agreed cycle.',
                    ],
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
                'full_description' => 'An office floor is a daily operation, not a monthly clean. We roster teams floor by floor so cabins, workstations, conference rooms, pantries and washrooms are covered by name, with defined tasks per shift. Daytime staff handle live requests and hygiene checks; night shifts handle machine cleaning and deep vacuuming so every floor is ready before the first arrival.',
                'features' => [
                    'Floor-Wise Rostering' => 'Named attendants and backups per floor, with attendance tracked daily.',
                    'Cabin & Workstation Care' => 'Dust-free desks, plus chair and partition cleaning across workstations.',
                    'Pantry & Conference Rooms' => 'Pantry hygiene, appliance care and room reset after every use.',
                    'Waste Segregation' => 'Daily wet and dry segregation at source with handover.',
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
                'comparison' => [
                    ['feature' => 'Deployment', 'us' => 'Named floor teams with backup cover', 'others' => 'One pool of staff moved across floors'],
                    ['feature' => 'Shift Planning', 'us' => 'Day support plus night machine cleaning', 'others' => 'Cleaning finished before the office fills'],
                    ['feature' => 'Checks', 'us' => 'Supervisor walk with recorded floor checklist', 'others' => 'No documented verification'],
                    ['feature' => 'Response', 'us' => 'On-floor staff resolve issues immediately', 'others' => 'Wait for a central dispatch call'],
                ],
                'faqs' => [
                    [
                        'q' => 'Do you assign dedicated staff to our floor?',
                        'a' => 'Yes. Each floor is assigned named attendants with a trained backup, so attendance, quality and escalation are clear every day.',
                    ],
                    [
                        'q' => 'How do you handle work during office hours?',
                        'a' => 'Daytime staff stay on the floor for live service requests and hygiene rounds, while machine cleaning and deep vacuuming are scheduled after hours to avoid disturbing your team.',
                    ],
                    [
                        'q' => 'Can you also manage the pantry and consumables?',
                        'a' => 'Yes. Pantry hygiene, appliance care, consumable checks and daily stock reporting can all be included, along with periodic deep cleaning of the pantry itself.',
                    ],
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
                'full_description' => 'Our society work goes far beyond cleaning. We deploy and supervise housekeeping staff, keep the landscape presentable, coordinate security, and stay ahead of technical maintenance so lifts, pumps and DG sets do not fail. A dedicated manager owns the site, and every month the committee receives a clear audit report.',
                'features' => [
                    'Staff Deployment' => 'Housekeeping staffing set by area and occupancy, with daily supervision.',
                    'Horticulture & Green Areas' => 'Lawn care, planting, irrigation and tree maintenance across common areas.',
                    'Technical Upkeep' => 'Planned maintenance of lifts, pumps, tanks, DG sets and common lighting.',
                    'Monthly Audit & Committee Report' => 'A documented report of scores, actions and support desk use.',
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
                'comparison' => [
                    ['feature' => 'Ownership', 'us' => 'One manager accountable for the whole site', 'others' => 'Four vendors pointing at each other'],
                    ['feature' => 'Support', 'us' => '24x7 support desk and on-call technical staff', 'others' => 'Phone calls answered the next morning'],
                    ['feature' => 'Visibility', 'us' => 'Monthly audit and committee report', 'others' => 'No record, only verbal updates'],
                    ['feature' => 'Continuity', 'us' => 'Trained staff who stay on your society', 'others' => 'Changing helpers every month'],
                ],
                'faqs' => [
                    [
                        'q' => 'How many staff will be required for our society?',
                        'a' => 'It depends on the number of towers, the size of common areas and the amenities. We assess the site, then propose a staffing plan with shifts and backups for your approval.',
                    ],
                    [
                        'q' => 'Will we have one point of contact?',
                        'a' => 'Yes. Each society is assigned a dedicated manager who handles resident requests, vendors, audits and committee reporting, backed by our 24x7 support desk.',
                    ],
                    [
                        'q' => 'How do you report to the management committee?',
                        'a' => 'Through a monthly facility audit that covers service scores, open issues, corrective actions, vendor coordination and any support desk usage during the month.',
                    ],
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
                'full_description' => 'Production cannot stop, and machines and floors carry oil, dust and hazardous residue. Our crews work on shift-aligned rosters with zone-specific induction, covering shop floor and machine bay cleaning, spill response, dust and waste control, and canteen and change room hygiene. Every task follows the plant safety rules.',
                'features' => [
                    'Shift-Aligned Rosters' => 'Cleaning crews mapped to production shifts with named supervisors per zone.',
                    'Shop Floor & Machine Bay Care' => 'Machine surrounds, aisles and grates cleaned on a defined cycle.',
                    'Spill Response' => 'Trained containment, absorption and safe disposal for oil and chemical spills.',
                    'Waste Control' => 'Segregated, labelled waste handed to approved handlers.',
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
                'comparison' => [
                    ['feature' => 'Planning', 'us' => 'Rosters built around your production shifts', 'others' => 'Cleaning scheduled against plant output'],
                    ['feature' => 'Safety', 'us' => 'Zone induction, PPE and permit coordination', 'others' => 'Untrained cleaners on the shop floor'],
                    ['feature' => 'Spills', 'us' => 'Trained response with containment and disposal', 'others' => 'Water added to an oil spill'],
                    ['feature' => 'Waste', 'us' => 'Segregated, labelled and handed to approved handlers', 'others' => 'Mixed waste left for the next shift'],
                ],
                'faqs' => [
                    [
                        'q' => 'Can cleaning be done while production is running?',
                        'a' => 'Yes, within agreed windows and zones. We align the cleaning plan with your shift schedule and movement windows so that production is never blocked and safety rules are respected.',
                    ],
                    [
                        'q' => 'How do you handle chemical or oil spills?',
                        'a' => 'Our crews are trained in spill response: immediate containment with absorbents, cleanup, safe disposal of the contaminated material and a record of the incident in the shift report.',
                    ],
                    [
                        'q' => 'Do your staff need plant safety induction?',
                        'a' => 'Yes. Every crew member completes zone-specific safety induction before entering the area, and follows your PPE, access and work permit requirements while on site.',
                    ],
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
