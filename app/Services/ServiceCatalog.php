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
                'image' => 'images/office_sweeping_cleaning.jpg',
                'sla_rating' => '99.5% Machine Cycle Compliance',
                'response_time' => 'Same-Shift Spot Response',
                'staff_standard' => 'Machines Operated By Trained In-House Technicians',
                'frequency' => 'Daily Shifts & Weekly Machine Cycles',
                'full_description' => 'Manual mopping is slow, inconsistent and expensive at scale. Our mechanized operations replace it with the latest cleaning equipment and a smart cleaning process that defines exactly what gets cleaned, how often, with which machine and by whom. We tie up directly with reputed equipment and chemical companies for machines, consumables, spare parts and periodic servicing, so the fleet on your site is always current and always serviceable. Every machine cycle is logged against a zone checklist, verified by a supervisor, and reported to you as part of the monthly facility audit.',
                'features' => [
                    'Latest Equipment' => 'Ride-on and walk-behind auto scrubbers, jet washers, high-pressure washers, wet and dry vacuum cleaners and carpet shampoo machines.',
                    'Reputed Company Tie-Ups' => 'Direct partnerships with reputed equipment and chemical companies for machines, consumables, spare parts and scheduled servicing.',
                    'Smart Cleaning Process' => 'Zone-wise checklists, colour-coded chemicals, fixed daily and monthly numbers, and supervisor verification of every completed task.',
                    'Operator Safety' => 'Trained machine operators, daily machine checklists and controlled handling of batteries, water and chemicals.',
                    'Lower Water & Chemical Use' => 'Dosing-controlled machines and microfibre systems that cut water and chemical consumption without reducing output.',
                    'Complete Audit Trail' => 'Each machine cycle is logged with date, zone, operator and completion status in the monthly service report.',
                ],
                'scope' => [
                    'daily' => [
                        'Pre-shift machine checklist covering battery, brush, squeegee, water level and safety switches',
                        'Auto-scrubbing of lobbies, corridors, staircases and other hard-floor zones',
                        'Dusting and vacuuming of cabins, workstations, conference rooms and pantries',
                        'Spot mopping of spillages, entry mats and high-footfall zones through the day',
                        'Scheduled washroom rounds and consumable refilling',
                        'End-of-day wet-mopping of high-traffic floors and entrance lobbies',
                    ],
                    'periodic' => [
                        'Weekly deep scrub and polish cycles on marble, granite and vitrified floors',
                        'Fortnightly high-reach dusting of false ceilings, ducting and light fittings',
                        'Monthly carpet and upholstery shampoo extraction through machine',
                        'Quarterly pressure washing of driveways, podium decks and entrance aprons',
                        'Half-yearly machine servicing and consumable replacement through our OEM tie-ups',
                        'Annual refresher training for machine operators on the cleaning process',
                    ],
                ],
                'equipment' => [
                    'Ride-On & Walk-Behind Auto Scrubber Driers',
                    'High-Pressure Jet Washers and Foam Cannons',
                    'Wet & Dry Industrial Vacuum Cleaners',
                    'Carpet and Upholstery Shampoo Extractors',
                    'Battery and Dosing Systems with Water-Saving Kits',
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
                'image' => 'images/restroom_hygiene_sanitation.jpg',
                'sla_rating' => '99% Hygiene Checklist Compliance',
                'response_time' => '15-Minute Spill & Overflow Response',
                'staff_standard' => 'Uniformed Staff Trained In Washroom Hygiene & Safety',
                'frequency' => '4 To 8 Rounds Per Day',
                'full_description' => 'Washrooms are the fastest-moving spaces on any site and the first thing residents and staff judge. Our washroom service runs on defined rounds through the day, with additional rounds during peak morning and evening hours. Every round covers fixtures, touchpoints, floors, consumables and waste, and is recorded on a checklist that the duty supervisor verifies. Odour is treated at the source with enzymatic drain care, and chemical use is kept safe for occupied buildings with correct dilution and storage.',
                'features' => [
                    'Scheduled Rounds' => 'A fixed number of rounds through the day, with additional coverage during peak morning and evening footfall.',
                    'Touchpoint Disinfection' => 'Doors, handles, taps, flush levers, partitions, bins and switchboards disinfected on every round.',
                    'Consumable Replenishment' => 'Liquid soap, hand wash, tissue, paper towels and sanitary units stocked before they run out.',
                    'Odour Control at Source' => 'Enzymatic drain treatment and regular trap cleaning instead of masking odour with heavy fragrance.',
                    'Fixed Weekly Deep Cycle' => 'Grout, tiles, partitions, exhaust vents and mirrors scrubbed on a scheduled weekly cycle.',
                    'Checklist Sign-Off' => 'Every washroom carries a daily checklist that the duty supervisor completes and signs.',
                ],
                'scope' => [
                    'daily' => [
                        'Morning deep round before peak usage, with fixtures, mirrors and floors fully serviced',
                        'Mid-day and peak-hour touchpoint disinfection and consumable refilling',
                        'Spill, leak and overflow response with rapid wet-floor drying',
                        'Waste bin emptying, liner replacement and daily deep clean of bins and surrounds',
                        'End-of-day sanitation round with floor wash and dry-fan drying',
                        'Supervisor verification of each washroom checklist',
                    ],
                    'periodic' => [
                        'Weekly deep scrub of tiles, grout lines, partitions and urinal areas',
                        'Weekly cleaning of exhaust vents, ducts and washroom ceilings',
                        'Fortnightly descaling of taps, aerators and shower panels',
                        'Monthly drain trap, floor trap and sensor cleaning',
                        'Quarterly drain camera inspection for slow or blocked lines',
                        'Quarterly review of round frequency based on usage data',
                    ],
                ],
                'equipment' => [
                    'No-Touch Washroom Cleaning Systems',
                    'Commercial Dry Steam Vaporizers',
                    'Enzymatic Drain and Trap Treatment Kits',
                    'Colour-Coded Microfibre Cloths and Mops',
                    'Handheld Wet & Dry Vacuum Units',
                    'Wall-Mounted Soap and Sanitiser Dispensers',
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
                'image' => 'images/office_boy_pantry_service.jpg',
                'sla_rating' => '100% Deep Cycle Completion Reports',
                'response_time' => 'Scheduled Slots Confirmed 72 Hours In Advance',
                'staff_standard' => 'Specialist Deep-Cleaning Crew With Full PPE',
                'frequency' => 'Monthly, Quarterly & Pre-Event Slots',
                'full_description' => 'Deep cleaning is what separates a maintained building from a neglected one. We run deep cleaning as a planned programme rather than an occasional request — grout, tiles, high-reach surfaces, carpets, kitchen exhaust ducts, service areas and lift interiors are worked through on a fixed cycle with a defined crew, defined machines and a documented before-and-after checklist. Whether it is a society before a festival, an office before an audit or a factory during a shutdown window, the same discipline applies: same crew, same equipment, same checklist.',
                'features' => [
                    'Defined Deep-Cleaning Cycle' => 'A published monthly, quarterly and pre-event schedule so deep work never depends on ad-hoc requests.',
                    'High-Reach Cleaning' => 'False ceilings, ducts, light fittings, fans, louvers and high-level ledges cleaned with reach equipment and safety procedures.',
                    'High-Pressure Work' => 'Jet washing of driveways, podiums, ramps, drains, external passages and hard-to-reach service areas.',
                    'Carpet & Upholstery Extraction' => 'Hot water extraction, shampooing and stain treatment for carpets, sofas and chair upholstery.',
                    'Kitchen & Exhaust Cleaning' => 'Degreasing of kitchen surfaces, chimneys, filters and exhaust ducts to remove build-up and fire risk.',
                    'Documented Results' => 'A before-and-after checklist, with photographs, submitted to the client on completion of every deep cycle.',
                ],
                'scope' => [
                    'daily' => [
                        'Pre-planning walkthrough to finalise areas, timing, machinery and access requirements',
                        'Dry removal of dust and debris before any wet process begins',
                        'Zone-wise deep cleaning executed by a dedicated specialist crew',
                        'Separate and dispose of waste as per site waste segregation rules',
                        'Post-clean quality check by the area supervisor with the client representative',
                    ],
                    'periodic' => [
                        'Monthly deep clean of common areas, washrooms, stairwells and service corridors',
                        'Quarterly carpet and upholstery shampoo extraction across cabins and lounges',
                        'Quarterly kitchen, chimney and exhaust duct degreasing',
                        'Half-yearly high-reach cleaning of ceilings, ducts and light fittings',
                        'Pre-event and pre-audit deep clean on short-notice slots',
                        'Annual post-monsoon cleaning of terraces, drains and external areas',
                    ],
                ],
                'equipment' => [
                    'Hot Water Carpet Extractors',
                    'High-Pressure Jet Washers & Drain Cameras',
                    'Foam Machines and Degreaser Units',
                    'Vacuum Cleaners and Reach Rods',
                    'Dry Steam Vaporizers',
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
                'image' => 'images/estate_development.jpg',
                'sla_rating' => 'Weekly Green Area Checklist Compliance',
                'response_time' => '24-Hour Post-Storm Clearance',
                'staff_standard' => 'Trained Horticulture Crew With Protective Equipment',
                'frequency' => 'Daily Touch-Up & Weekly Maintenance Cycles',
                'full_description' => 'Green areas are the first thing residents notice and the fastest way for a property to look neglected when they are ignored. Our landscaping service covers lawns, planting beds, hedges, trees, planters, podium gardens and terraces under one crew with a fixed weekly checklist. Beyond routine care we manage irrigation timing, seasonal planting and foliage, and post-monsoon cleanup, so the landscape stays presentable through every season rather than only on the day the gardener visited.',
                'features' => [
                    'Lawn Care' => 'Mowing, edging, de-thatching, aeration, top-dressing and weed control for lawns and open green belts.',
                    'Planting & Replenishment' => 'Seasonal planting, sapling replacement and re-mulching of beds to keep areas full through the year.',
                    'Irrigation Management' => 'Sprinkler and drip system operation, watering schedules and leak checks across lawns and landscapes.',
                    'Tree Care & Pruning' => 'Pruning, shaping, deadwood removal and safety trimming of trees close to buildings and walkways.',
                    'Seasonal Foliage' => 'Leaf, flower and monsoon debris management with scheduled removal and soil conditioning.',
                    'Waste-Free Practice' => 'Green waste collected, composted or handed to approved handlers instead of being dumped in corners.',
                ],
                'scope' => [
                    'daily' => [
                        'Litter picking across lawns, garden paths, podium decks and seating areas',
                        'Watering of lawns, planters and flowering beds as per the irrigation schedule',
                        'Daily check of sprinkler and drip systems for leaks and blocked lines',
                        'Immediate removal of wilted plants, broken branches and storm debris',
                        'Tool cleaning, sharpening and safe storage at the end of every shift',
                    ],
                    'periodic' => [
                        'Weekly mowing, edging and lawn maintenance cycles',
                        'Weekly hedge trimming, plant shaping and bed weeding',
                        'Monthly fertilisation, mulching and soil conditioning of planters',
                        'Quarterly pruning and shaping of trees and large shrubs',
                        'Pre-monsoon and post-monsoon leaf and debris cleanup cycles',
                        'Seasonal replanting and replacement of failed saplings',
                    ],
                ],
                'equipment' => [
                    'Petrol & Electric Lawn Mowers',
                    'Hedge Trimmers and Brush Cutters',
                    'Pruning Shears, Pole Saws and Ladders',
                    'Sprinkler and Drip Irrigation Systems',
                    'Garden Carts, Tarpaulin and Wet Waste Bags',
                    'Personal Protective Equipment and First Aid Kit',
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
                'image' => 'images/hero_facility.jpg',
                'sla_rating' => 'Recurrence Assurance on Treated Areas',
                'response_time' => '24-Hour Response On New Sightings',
                'staff_standard' => 'Trained Applicators With PPE & Approved Chemistries',
                'frequency' => 'Monthly To Quarterly Treatment Cycles',
                'full_description' => 'Pests are a comfort and, in the case of termites and rodents, a damage issue. RFS pest management begins with a proper site survey, not a blind spray: we identify the pest, the entry route and the breeding source, then design a treatment cycle for that specific problem. Applications are carried out by trained staff with the correct protective equipment, using chemistry that is safe for occupied buildings. Every treatment is recorded, and sightings that reappear are revisited at no additional cost within the cycle.',
                'features' => [
                    'Site Survey First' => 'Pest identification, entry-point mapping and breeding-source analysis before any treatment is planned.',
                    'Mosquito Control' => 'Larviciding of stagnant water, space spraying, fogging in common areas and mosquito screens on vents.',
                    'Termite Control' => 'Pre- and post-construction termite treatment, wood treatment and barrier treatment for building structures.',
                    'Cockroach & Rodent Control' => 'Gel, bait and targeted spraying for cockroaches, plus mechanical trapping and sealing for rodents.',
                    'Safe For Occupied Premises' => 'Approved chemistry, correct dilution and scheduled application windows so the site stays usable.',
                    'Documented Treatment History' => 'A treatment register with date, area, product, applicator and follow-up actions for every visit.',
                ],
                'scope' => [
                    'daily' => [
                        'Visual monitoring of known hot spots during routine facility rounds',
                        'Immediate reporting of fresh sightings, droppings, mud pipes or nesting activity',
                        'Removal and disposal of infested material and dead rodents safely',
                        'Waterlogging checks and standing water elimination in terraces and drains',
                        'Coordination with housekeeping and landscape teams to close entry routes',
                    ],
                    'periodic' => [
                        'Monthly preventive spraying and gel treatment in kitchens, pantries, washrooms and stores',
                        'Monthly rodent control through baiting, trapping and sealing of entry points',
                        'Quarterly termite inspection of vulnerable wooden and structural areas',
                        'Pre-monsoon mosquito control with fogging and larviciding of common areas',
                        'Quarterly review of hot spots with a revised treatment plan if needed',
                        'Annual service report with observation and recommendations',
                    ],
                ],
                'equipment' => [
                    'ULV & Aerosol Applicator Machines',
                    'Cold Fogging and Mosquito Fogging Units',
                    'Bait Stations, Traps and Rodent Sealant',
                    'Termite Injection and Drilling Equipment',
                    'Handheld Sprayers and Dosing Measures',
                    'Protective Equipment and Chemical Storage Cabinets',
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
                'image' => 'images/commercial_tower.jpg',
                'sla_rating' => '99% Floor Checklist Compliance',
                'response_time' => '30-Minute Response During Office Hours',
                'staff_standard' => 'Uniformed, Background-Checked Floor Teams',
                'frequency' => 'Daily Shifts With Weekly Deep Cycles',
                'full_description' => 'An office floor is a daily operation, not a monthly clean. We roster teams floor by floor so every cabin, workstation, conference room, pantry and washroom is covered by name, with defined tasks per shift. Daytime presence handles live service requests and hygiene checks; night shifts handle machine cleaning, deep vacuuming and washroom servicing so the floor is ready before the first arrival. Supervisors walk the floor on a fixed schedule and the report goes into your monthly facility audit.',
                'features' => [
                    'Floor-Wise Rostering' => 'Named attendants and backup staff assigned to each floor, with attendance tracked daily.',
                    'Cabin & Workstation Care' => 'Dust-free desk care, chair and partition cleaning, and cable-safe handling around workstations.',
                    'Pantry & Break Area Management' => 'Pantry cleaning, utensil and appliance hygiene, consumable checks and daily stock reporting.',
                    'Conference Room Support' => 'Room reset before and after meetings, waste clearing, glass and table care.',
                    'Waste Segregation' => 'Daily wet and dry segregation at source, with clearances and handover to the waste contractor.',
                    'Night Operations' => 'Post-hours machine cleaning and deep vacuuming so floors are ready before the day begins.',
                ],
                'scope' => [
                    'daily' => [
                        'Daytime floor presence for live requests, spill response and hygiene checks',
                        'Washroom rounds and consumable refilling during office hours',
                        'Pantry and break area cleaning with appliance wipe-down at close of day',
                        'Meeting room reset after every use and waste clearance from all cabins',
                        'Wet and dry waste segregation, collection and daily handover',
                        'Night shift machine cleaning and deep vacuuming of the floor',
                    ],
                    'periodic' => [
                        'Weekly deep vacuuming of chairs, partitions, storage and under-desk areas',
                        'Weekly washroom deep cycle and glass and mirror cleaning across the floor',
                        'Fortnightly high-reach dusting of ceiling fixtures and vents',
                        'Monthly carpet and chair shampoo extraction',
                        'Quarterly paint, wall and skirting touch-up coordination',
                        'Quarterly review of rosters and floor checklist compliance with the client',
                    ],
                ],
                'equipment' => [
                    'Walk-Behind Auto Scrubber Driers',
                    'Wet & Dry Vacuum Cleaners',
                    'Carpet and Upholstery Shampoo Machines',
                    'Microfibre and Colour-Coded Cleaning Kits',
                    'Washroom Sanitation and Disinfection Units',
                    'Waste Segregation Bins and Trolleys',
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
                'image' => 'images/estate_development.jpg',
                'sla_rating' => 'Monthly Audit Score Reported To The Committee',
                'response_time' => '24x7 Support Desk & On-Call Technical Staff',
                'staff_standard' => 'Trained, Uniformed & Background-Verified Residential Staff',
                'frequency' => 'Daily Operations With Monthly Committee Reporting',
                'full_description' => 'We have been managing residential societies for more than three years, and the work is far more than cleaning. It means deploying and supervising housekeeping staff, keeping the landscape presentable, coordinating security, staying ahead of technical maintenance so lifts, pumps and DG sets do not fail, caring for clubhouse and common amenities, and giving the committee a clear monthly picture. A dedicated manager owns the site, backed by our 24x7 support desk, so residents always know who to call and the committee always has evidence of what has been done.',
                'features' => [
                    'Housekeeping Staff Deployment' => 'Staffing levels set by area and occupancy, with uniforms, training, attendance and daily supervision.',
                    'Horticulture & Green Areas' => 'Lawn care, planting, irrigation and tree maintenance across gardens, podiums and terraces.',
                    'Security Coordination' => 'Gate and security desk staffing, visitor process support, and coordination with your security agency.',
                    'Technical Upkeep' => 'Planned maintenance of lifts, pumps, water tanks, DG sets, lighting and common-area electricals.',
                    'Amenity & Common Area Care' => 'Clubhouse, gym, pool, function lawn and lift interior care, including festive and event preparation.',
                    'Monthly Audit & Committee Report' => 'Documented monthly audit with findings, corrective actions and utilisation of the support desk.',
                ],
                'scope' => [
                    'daily' => [
                        'Supervising housekeeping staff on shifts and verifying common area cleaning',
                        'Landscaping touch-up, watering, litter picking and post-monsoon cleanup',
                        'Security desk coordination, visitor register review and shift briefing',
                        'Technical walkthrough of lifts, pumps, DG, water tanks and common lighting',
                        'Amenity readiness checks for clubhouse, gym, function lawn and common halls',
                        'Resident and vendor complaint handling through the support desk',
                    ],
                    'periodic' => [
                        'Weekly deep cleaning cycles for common areas, washrooms and lift interiors',
                        'Monthly water tank cleaning, pest control and landscaping maintenance cycles',
                        'Monthly facility audit presented to the management committee',
                        'Quarterly lift, pump and DG preventive maintenance and load testing',
                        'Half-yearly fire safety, electrical and civil condition review with action plans',
                        'Annual review of staffing, costs and service scope with the committee',
                    ],
                ],
                'equipment' => [
                    'Cleaning Machines for Common Areas',
                    'Horticulture Tools and Irrigation Systems',
                    'Pest Control Applicators and Bait Stations',
                    'Technical Hand Tools and Safety Equipment',
                    'Waste Collection and Segregation Bins',
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
                'image' => 'images/mep_hvac_maintenance.jpg',
                'sla_rating' => '99% Shift Roster Fulfilment',
                'response_time' => '15-Minute On-Site Spill Response',
                'staff_standard' => 'Shop-Floor Trained Crew With Zone-Specific Induction',
                'frequency' => 'Shift-Aligned Daily Rounds & Planned Overhauls',
                'full_description' => 'Industrial facilities cannot be cleaned like an office. Production cannot stop, machines and floors carry oil, dust and hazardous residue, and every task has to be executed with the safety rules of the plant in mind. Our manufacturing facility services are delivered on shift-aligned rosters with zone-specific induction for our crew, covering shop floor and machine bay cleaning, spill response, dust and waste control, canteen and change room hygiene, and planned overhauls during shutdown windows.',
                'features' => [
                    'Shift-Aligned Rosters' => 'Cleaning crews rostered to production shifts with defined crew strength, supervisors and backups per zone.',
                    'Shop Floor & Machine Bay Care' => 'Machine surrounds, aisles, control panels, grates and under-machine areas cleaned on a defined cycle.',
                    'Spill Response' => 'Trained response for oil, chemical and water spills, with containment, absorption and safe disposal.',
                    'Dust & Waste Control' => 'Housekeeping waste, production scrap and hazardous waste segregated, labelled and handed to approved handlers.',
                    'Canteen & Change Room Hygiene' => 'Food area hygiene, dining area cleaning, change room and washroom upkeep for plant staff.',
                    'Safety-First Execution' => 'Zone-specific induction, PPE compliance, work permits and coordination with your safety team before every task.',
                ],
                'scope' => [
                    'daily' => [
                        'Shop floor aisle and machine bay cleaning within the permitted timings',
                        'Absorbent spill response for oil, chemical and water, with immediate safe disposal',
                        'Waste segregation, labelling and shift-end handover to the waste contractor',
                        'Canteen, dining, change room and washroom cleaning through the day',
                        'Sweeper and vacuum operations scheduled to avoid production and movement windows',
                        'Shift-end supervisor verification of zone checklists',
                    ],
                    'periodic' => [
                        'Weekly deep cleaning of machine bases, service aisles and beneath fixed equipment',
                        'Monthly high-reach cleaning of roof trusses, ducting and lighting inside production sheds',
                        'Monthly spillway, drainage and floor pit cleaning and inspection',
                        'Quarterly overhaul deep cleaning scheduled with plant shutdown windows',
                        'Quarterly audit of waste segregation, hazardous handling and documentation',
                        'Half-yearly review of crew training, PPE compliance and safety induction records',
                    ],
                ],
                'equipment' => [
                    'Ride-On & Walk-Behind Industrial Scrubbers',
                    'High-Pressure and Steam Cleaning Units',
                    'Industrial Wet & Dry Vacuum Cleaners',
                    'Oil Absorbent & Spill Containment Kits',
                    'Waste Segregation Bins, Labels & Containers',
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
