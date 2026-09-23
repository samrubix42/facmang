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
                'slug' => 'office-sweeping-cleaning',
                'title' => 'Commercial Sweeping & Office Cleaning',
                'badge' => 'Daily Janitorial',
                'icon' => 'ri-sweep-line',
                'category' => 'janitorial',
                'category_label' => 'Janitorial & Floor Care',
                'tagline' => 'Industrial Sweeping, Floor Scrubbing & Diamond Marble Polish',
                'short_description' => 'Comprehensive daily sweeping, motorized floor scrubbing, HEPA dust filtering, and high-shine marble care designed for corporate lobbies and workstations.',
                'image' => 'images/office_sweeping_cleaning.jpg',
                'sla_rating' => '99.9% Cleanliness SLA',
                'response_time' => '30-Min Rapid Touchup',
                'staff_standard' => '100% W-2 Vetted & Uniformed',
                'frequency' => 'Daily Night & Day Shifts',
                'full_description' => 'Our Commercial Sweeping & Office Cleaning service is engineered for corporate headquarters, financial facilities, and tech campuses requiring spotless precision. Using hospital-grade HEPA filtration sweepers and industrial orbital floor scrubbers, our certified crews eliminate allergen-bearing particulate, polish high-traffic corridors to a mirror finish, and maintain pristine executive workstations without disturbing day-to-day business operations.',
                'features' => [
                    'HEPA dust-free sweeping & allergen containment',
                    'Motorized marble, granite & terrazzo floor buffing',
                    'Night-shift quiet cleaning with zero business disruption',
                    'Disinfection of high-touch door handles, rails & switches',
                    'Desk surface detailing and cable-safe perimeter care',
                    'Trash & recyclable segregation at each workstation',
                ],
                'scope' => [
                    'daily' => [
                        'Morning opening sweep & lobby entrance glass wipe-down',
                        'Vacuuming of all open carpet zones and executive suites',
                        'Mopping and motorized buffing of high-traffic hard floors',
                        'Continuous touchpoint disinfection (elevator buttons, handles)',
                        'End-of-day desk sanitation and paper bin clearing',
                    ],
                    'periodic' => [
                        'Bi-weekly diamond crystallization for marble and granite floors',
                        'Deep carpet shampoo extraction every 30 days',
                        'Wall baseboard scrubbing and high-reach air diffuser dusting',
                        'Detailed interior partition glass descaling',
                    ],
                ],
                'equipment' => [
                    'Tennant Industrial Orbital Auto-Scrubbers',
                    'Dyson & Nilfisk HEPA Pro Commercial Vacuums',
                    'Microfiber split-fiber color-coded flat mops',
                    'Green Seal Certified Neutral pH Floor Cleaners',
                ],
                'comparison' => [
                    ['feature' => 'Staff Employment', 'us' => '100% W-2 Full-Time, background checked', 'others' => 'Gig or subcontracted day-laborers'],
                    ['feature' => 'Equipment Tech', 'us' => 'Hospital-grade HEPA & auto-scrubbers', 'others' => 'Outdated push mops & dirty water buckets'],
                    ['feature' => 'Verification', 'us' => 'QR Code live timestamp & photo audit', 'others' => 'Paper sheet clipped to door, rarely checked'],
                    ['feature' => 'Damage Protection', 'us' => '$5M Comprehensive enterprise liability', 'others' => 'Minimal or uninsured third parties'],
                ],
                'faqs' => [
                    [
                        'q' => 'Can cleaning shifts be scheduled strictly outside business hours?',
                        'a' => 'Yes. Over 70% of our enterprise clients utilize our Twilight or Night Owl shifts (7 PM – 5 AM), ensuring zero friction with employee productivity.',
                    ],
                    [
                        'q' => 'How do you prevent cross-contamination across floors?',
                        'a' => 'We enforce a strict 4-color microfiber code (Red for toilets, Yellow for pantry/food prep, Blue for general desk spaces, Green for meeting rooms). Mops and cloths are never cross-used.',
                    ],
                ],
            ],
            [
                'slug' => 'restroom-hygiene-sanitation',
                'title' => 'Restroom & Washroom Hygiene Sanitation',
                'badge' => 'Hygiene Sanitation',
                'icon' => 'ri-drop-line',
                'category' => 'hygiene',
                'category_label' => 'Sanitation & Hygiene',
                'tagline' => 'Touchless Replenishment, Enzymatic Wash & Odor Eradication',
                'short_description' => 'Rigorous toilet cleaning, chrome polishing, touchless sensor replenishment, enzymatic drain treatments, and 4-hour scheduled sanitation logs.',
                'image' => 'images/restroom_hygiene_sanitation.jpg',
                'sla_rating' => '99.85% Inspection Score',
                'response_time' => '15-Min Spill Response',
                'staff_standard' => 'Bio-Hazard & Infection-Control Certified',
                'frequency' => '2 to 4 Times Daily Rounds',
                'full_description' => 'Commercial washrooms are the true barometer of facility excellence. Our Restroom & Washroom Hygiene protocol eradicates bacteria at the molecular level with microbial enzymatic treatments and virucidal cleaners. Every fixture, partition, and sensor is meticulously sanitized, odor sources in grout lines are permanently eliminated, and soap, hand towels, and sanitizers are restocked with automated predictive thresholds.',
                'features' => [
                    'Microbial toilet, urinal & deep grout steam cleaning',
                    'Touchless soap, paper towel & hand sanitizer replenishment',
                    'Enzymatic drain treatments eliminating organic sewer odor',
                    'Live QR Code audit logs at restroom entry doors',
                    'Streak-free chrome and mirror polishing',
                    'Emergency overflow and spill rapid intervention team',
                ],
                'scope' => [
                    'daily' => [
                        'Hourly condition checks during peak 9 AM - 2 PM surge hours',
                        'Bactericidal wiping of flush valves, faucets, handles & partitions',
                        'Replenishing premium 2-ply hand towels and foam soaps',
                        'Floor wash with hospital-grade disinfectant and dry-fan drying',
                        'Emptying and relining sanitary and waste receptacles',
                    ],
                    'periodic' => [
                        'Weekly high-pressure steam extraction of grout lines',
                        'Descaling of commercial water heaters and aerators',
                        'Air curtain and exhaust vent deep degreasing',
                        'Replacement of anti-splash urinal mats and enzyme blocks',
                    ],
                ],
                'equipment' => [
                    'Kaivac No-Touch Restroom Cleaning Systems',
                    'Kärcher 180°C Commercial Dry Steam Vaporizers',
                    'EPA List N Hospital-Grade Disinfectants',
                    'Digital ATP Bioluminescence Surface Testers',
                ],
                'comparison' => [
                    ['feature' => 'Odor Control', 'us' => 'Root-cause enzymatic digestion', 'others' => 'Heavy chemical sprays masking odors'],
                    ['feature' => 'Audit Protocol', 'us' => 'Digital ATP hygiene swab testing', 'others' => 'Visual check only'],
                    ['feature' => 'Stock Monitoring', 'us' => 'Predictive threshold replenishment', 'others' => 'Frequent empty dispensers'],
                    ['feature' => 'Safety', 'us' => 'Rapid wet-floor drying blowers', 'others' => 'Slippery wet floors left unattended'],
                ],
                'faqs' => [
                    [
                        'q' => 'How do you monitor restroom cleanliness throughout the day?',
                        'a' => 'Our stewards scan an IoT QR tag inside each washroom upon entry and exit. Any guest or employee can also scan the sticker to alert dispatch within 180 seconds if supplies run low.',
                    ],
                    [
                        'q' => 'Are your chemicals harsh or chemically scented?',
                        'a' => 'No. We use plant-derived biodegradable enzymes that neutralize odor naturally without leaving toxic chemical fumes or artificial synthetic perfumes.',
                    ],
                ],
            ],
            [
                'slug' => 'corporate-pantry-staffing',
                'title' => 'Corporate Office Boy & Pantry Staffing',
                'badge' => 'Pantry & Staffing',
                'icon' => 'ri-cup-line',
                'category' => 'staffing',
                'category_label' => 'Hospitality & Staffing',
                'tagline' => 'Executive Pantry Stewards, Barista & Meeting Support',
                'short_description' => 'Uniformed, background-checked office boys and pantry attendants for executive beverage service, boardroom prep, pantry restocking, and desk support.',
                'image' => 'images/office_boy_pantry_service.jpg',
                'sla_rating' => '100% Attendance Backfill',
                'response_time' => 'Instant Desk Dispatch',
                'staff_standard' => 'Hospitality Groomed & Background Verified',
                'frequency' => 'Dedicated Shift Allocation',
                'full_description' => 'Elevate your workplace hospitality with polished, courteous, and well-groomed pantry and office stewards. From setting up VIP boardroom catering and crafting artisanal espresso to managing inventory logistics and inter-floor document routing, our staff are rigorously trained in corporate etiquette, confidentiality, and active guest hospitality.',
                'features' => [
                    'Executive beverage, specialty coffee & herbal tea service',
                    'Conference room preparation, AV reset & post-meeting clearing',
                    'Pantry inventory monitoring, milk rotation & snack restocking',
                    'Commercial dishwasher operation and glassware polishing',
                    'Document dispatch, parcel receiving and internal desk deliveries',
                    'Strict NDA signing and complete criminal background screening',
                ],
                'scope' => [
                    'daily' => [
                        'Morning coffee machine brewing, milk stock check, and fruit basket staging',
                        'Boardroom setup 15 minutes ahead of scheduled executive meetings',
                        'Continuous clearing of mugs, tumblers, and pantry recycling',
                        'VIP guest greeting and tray beverage presentation',
                        'End-of-day kitchen appliance sanitization and refrigeration wipe-down',
                    ],
                    'periodic' => [
                        'Monthly deep cleaning of espresso machines and water dispensers',
                        'Quarterly pantry inventory audit and cost optimization report',
                        'Periodic hospitality retraining and etiquette refresher workshops',
                        'Ice machine descaling and sanitization protocols',
                    ],
                ],
                'equipment' => [
                    'Commercial Espresso & Bean-to-Cup Servicing Kits',
                    'Hospitality-standard stainless steel serving trays & carafes',
                    'Sterilized steam sanitizing dishwashers',
                    'Temperature-controlled food storage containers',
                ],
                'comparison' => [
                    ['feature' => 'Absenteeism Guarantee', 'us' => 'Guaranteed standby backfill within 60 mins', 'others' => 'No backup; empty pantry when staff is absent'],
                    ['feature' => 'Grooming & Uniform', 'us' => 'Tailored branded uniforms, name tags, hair nets', 'others' => 'Casual unironed clothes, unprofessional'],
                    ['feature' => 'Etiquette Training', 'us' => '5-Star hotel hospitality certification', 'others' => 'Zero formal hospitality coaching'],
                    ['feature' => 'Confidentiality', 'us' => 'Strict binding NDAs & background checks', 'others' => 'No legal confidentiality agreements'],
                ],
                'faqs' => [
                    [
                        'q' => 'What happens if our assigned pantry steward calls in sick?',
                        'a' => 'Our service contract includes guaranteed reserve backfill. A trained standby steward is deployed to your facility within 60 minutes with full access credentials.',
                    ],
                    [
                        'q' => 'Can stewards manage pantry purchasing and supply orders?',
                        'a' => 'Yes. We provide end-to-end pantry management, including tracking inventory minimums, negotiating bulk supplier rates for coffee beans and milk, and submitting verified monthly tallies.',
                    ],
                ],
            ],
            [
                'slug' => 'deep-disinfection-sanitization',
                'title' => 'Deep Sanitization & Electrostatic Spray',
                'badge' => 'Disinfection Blitz',
                'icon' => 'ri-virus-line',
                'category' => 'hygiene',
                'category_label' => 'Sanitation & Hygiene',
                'tagline' => 'EPA List N Virucidal Eradication & Micro-Purification',
                'short_description' => 'Electrostatic virucidal fogging, high-touch sanitization, and indoor air purification designed for corporate blitzes and outbreaks.',
                'image' => 'images/hero_facility.jpg',
                'sla_rating' => '99.999% Pathogen Kill',
                'response_time' => '2-Hour Emergency Outbreak Callout',
                'staff_standard' => 'Hazmat & Infection Control Certified',
                'frequency' => 'Bi-Weekly, Monthly, or On-Demand',
                'full_description' => 'When seasonal outbreaks hit or corporate facilities require medical-grade sterility, our Deep Sanitization & Electrostatic Spraying delivers comprehensive environmental safety. Utilizing electrostatic misting technology, microscopic charged droplets wrap 360 degrees around keyboards, chairs, cubicle corners, and HVAC returns — killing 99.999% of bacteria and enveloped viruses without leaving chemical residue.',
                'features' => [
                    '360-Degree wraparound electrostatic virucidal fogging',
                    'EPA List N certified virucidal and bactericidal chemistry',
                    'Computer-safe dry micron fog that protects electronics',
                    'Microbial surface barrier preventing recontamination for 30 days',
                    'Pre-and-post ATP bioluminescence certification report',
                    'Indoor Air Quality (IAQ) VOC and particulate testing',
                ],
                'scope' => [
                    'daily' => [
                        'Rapid outbreak isolation if an infectious case is reported',
                        'Targeted sanitization of elevator cabs, handrails, and cafeteria touchpoints',
                        'Air scrubber deployment for particulate and odor capture',
                    ],
                    'periodic' => [
                        'Monthly complete facility electrostatic envelope misting',
                        'HVAC duct plenum UV-C and disinfectant sterilization',
                        'Carpet and upholstery antimold and bactericidal shampooing',
                        'Executive boardroom and phone booth deep decontamination',
                    ],
                ],
                'equipment' => [
                    'Victory Innovations Professional Cordless Electrostatic Sprayers',
                    'EPA List N registered virucidal agents (Zero bleach, non-corrosive)',
                    'Industrial HEPA 500 CFM Air Scrubbers',
                    'Hygiena EnSURE Touch ATP Verification Monitors',
                ],
                'comparison' => [
                    ['feature' => 'Coverage Technology', 'us' => 'Electrostatic 360° wraparound misting', 'others' => 'Manual rag wipe (misses 65% of surface area)'],
                    ['feature' => 'Safety on Electronics', 'us' => 'Dry micron mist safe on servers & PCs', 'others' => 'Wet sprays that risk short-circuiting electronics'],
                    ['feature' => 'Proof of Eradication', 'us' => 'Digital ATP pre/post swab certification', 'others' => 'No scientific verification or report'],
                    ['feature' => 'Eco-Compatibility', 'us' => '100% Biodegradable, zero toxic residues', 'others' => 'Corrosive chlorine/bleach smells'],
                ],
                'faqs' => [
                    [
                        'q' => 'Is electrostatic fogging safe for computers and sensitive server rooms?',
                        'a' => 'Yes. Our electrostatic mist produces 40-micron droplets that adhere electrostatically without wetting or causing condensation, making it completely safe for monitors, keyboards, and data equipment.',
                    ],
                    [
                        'q' => 'How long before employees can re-enter the facility after fogging?',
                        'a' => 'Our chemical formulation is fast-acting and non-toxic. Rooms can be reoccupied just 15 to 30 minutes after treatment with zero ventilation downtime.',
                    ],
                ],
            ],
            [
                'slug' => 'mep-hvac-maintenance',
                'title' => 'MEP, HVAC & Preventative Maintenance',
                'badge' => 'Technical Maintenance',
                'icon' => 'ri-tools-line',
                'category' => 'technical',
                'category_label' => 'Technical & Engineering',
                'tagline' => 'AC Filter Servicing, Electrical Safety & Zero Downtime Care',
                'short_description' => 'Certified technicians handling air filter cycles, electrical distribution panels, plumbing inspection, and thermal scan diagnostics to ensure uninterrupted property operations.',
                'image' => 'images/mep_hvac_maintenance.jpg',
                'sla_rating' => '99.98% Equipment Uptime',
                'response_time' => '15-Min Critical Line Response',
                'staff_standard' => 'Licensed Electricians & Certified HVAC Techs',
                'frequency' => 'Scheduled Audits & 24/7 Standby',
                'full_description' => 'Prevent catastrophic downtime before it happens. Our Mechanical, Electrical, and Plumbing (MEP) preventative maintenance service keeps critical workplace infrastructure running at peak energy efficiency. We deploy certified MEP technicians equipped with infrared thermal scanners, digital refrigerant gauges, and ultrasonic leak detectors to perform predictive servicing on chillers, distribution panels, water pumps, and emergency backups.',
                'features' => [
                    'Air handling unit (AHU) & fan coil filter replacement & coil cleaning',
                    'Electrical breaker panel FLIR infrared thermography scans',
                    'Plumbing pressure audits, backflow testing & pump servicing',
                    'UPS & emergency generator monthly load-bank testing',
                    'Automated Building Management System (BMS) telemetry tracking',
                    'Single-call 24/7 emergency repair dispatch',
                ],
                'scope' => [
                    'daily' => [
                        'Daily temperature & humidity comfort logs across all office floors',
                        'Visual inspection of primary electrical risers and water meters',
                        'Server room AC unit temperature monitoring and sensor checks',
                        'Rapid resolution of lighting failures, power socket trips, and pipe drips',
                    ],
                    'periodic' => [
                        'Monthly AHU filter wash and chemical coil descaling',
                        'Quarterly FLIR thermal scan of electrical switchboards for hot spots',
                        'Biannual water tank disinfection and water purity testing',
                        'Annual fire suppression and smoke detector sensitivity verification',
                    ],
                ],
                'equipment' => [
                    'FLIR Commercial Infrared Thermal Cameras',
                    'Fieldpiece Digital HVAC Manifold & Refrigerant Gauges',
                    'Rothenberger Industrial Plumbing Jetters & Drain Cameras',
                    'Megger Electrical Insulation & Ground Resistance Testers',
                ],
                'comparison' => [
                    ['feature' => 'Approach', 'us' => 'Predictive thermal & vibration maintenance', 'others' => 'Reactive repairs only after systems breakdown'],
                    ['feature' => 'Technician Caliber', 'us' => 'Govt-licensed MEP engineers & HVAC specialists', 'others' => 'General handy-workers without certifications'],
                    ['feature' => 'Energy Optimization', 'us' => 'Continuous HVAC tuning reducing power by 14%', 'others' => 'No energy auditing or filter optimization'],
                    ['feature' => 'Emergency Response', 'us' => 'Guaranteed on-site tech in under 30 minutes', 'others' => 'Wait 24-48 hours for third-party subcontractors'],
                ],
                'faqs' => [
                    [
                        'q' => 'Do you provide full-time on-site MEP engineers or roving teams?',
                        'a' => 'Both. For facilities over 50,000 sq ft, we assign dedicated resident engineers. For boutique offices, we provide scheduled roving preventative visits with 24/7 emergency dispatch coverage.',
                    ],
                    [
                        'q' => 'Can you help reduce our corporate building energy bill?',
                        'a' => 'Yes. By cleaning fouled chiller coils, re-calibrating airflow dampers, and eliminating phantom electrical heat loads, our clients typically see a 10% to 18% reduction in monthly HVAC power usage.',
                    ],
                ],
            ],
            [
                'slug' => 'architectural-facade-cleaning',
                'title' => 'Architectural Glass & High-Rise Facade Care',
                'badge' => 'Facade & Exterior',
                'icon' => 'ri-building-line',
                'category' => 'technical',
                'category_label' => 'Technical & Engineering',
                'tagline' => 'Rope Access Riggers, Cradle Systems & Pure Water Pole Glass Care',
                'short_description' => 'Specialized rope access technicians and deionized water pole washing for corporate towers, atrium glass, exterior cladding, and solar canopies.',
                'image' => 'images/hero_facility.jpg',
                'sla_rating' => '100% Zero-Incident Safety',
                'response_time' => 'Quarterly & On-Demand Scheduling',
                'staff_standard' => 'IRATA Certified Rope Access Riggers',
                'frequency' => 'Monthly, Quarterly, or Bi-Annual Cycles',
                'full_description' => 'Preserve your building’s architectural curb appeal and maximize natural interior daylight. Our certified facade cleaning team delivers streak-free high-rise glass washing, ACP sheet restoration, and atrium canopy detailing using IRATA-certified rope access riggers, building maintenance cradles, and telescopic pure deionized water-fed poles up to 75 feet.',
                'features' => [
                    'IRATA certified rope access abseiling technicians',
                    'Pure deionized mineral-free water for streak-free drying',
                    'Aluminium Composite Panel (ACP) chemical restoration',
                    'High-atrium internal skylight and chandelier dust extraction',
                    '100% OSHA and local municipal safety compliance',
                    'Comprehensive drop-zone pedestrian protection and netting',
                ],
                'scope' => [
                    'daily' => [
                        'Ground level glass entrance detailing and fingerprint removal',
                        'Canopy glass and vestibule high-reach squeegee passes',
                    ],
                    'periodic' => [
                        'Quarterly exterior building drop washes using certified cradles or ropes',
                        'Annual ACP cladding sealant inspection and chemical scale removal',
                        'Solar panel deionized cleaning to maximize solar efficiency',
                        'Atrium framework and acoustic banner high-dusting',
                    ],
                ],
                'equipment' => [
                    'Unger HydroPower Pure Water Reverse Osmosis Deionizers',
                    'Carbon-Fiber Telescopic Water-Fed Poles (up to 75ft)',
                    'Petzl Certified Rigging & Industrial Rope Access Kits',
                    'Safe-Cradle BMU Fall Arrest and Harness Gear',
                ],
                'comparison' => [
                    ['feature' => 'Safety Record', 'us' => 'Zero-Incident IRATA certified riggers with $10M umbrella', 'others' => 'Uncertified ladders & dangerous ad-hoc ropes'],
                    ['feature' => 'Water Chemistry', 'us' => '0 PPM Deionized pure water (zero water spots)', 'others' => 'Hard tap water that leaves calcium etching'],
                    ['feature' => 'Pedestrian Safety', 'us' => 'Full perimeter barrier netting & ground spotters', 'others' => 'No barricades; danger to pedestrians below'],
                    ['feature' => 'Cladding Care', 'us' => 'pH-neutral solutions protecting manufacturer warranties', 'others' => 'Acidic cleaners that strip anodized finishes'],
                ],
                'faqs' => [
                    [
                        'q' => 'Is your high-rise facade team fully insured?',
                        'a' => 'Yes. Every project is covered by our $10,000,000 comprehensive high-altitude liability policy and full worker compensation, with approved city permits.',
                    ],
                    [
                        'q' => 'How does pure water pole washing work without soap?',
                        'a' => 'Our 4-stage reverse osmosis filtration strips all dissolved solids from tap water down to 0 parts per million. Pure water acts like a natural magnet for dirt, evaporating naturally with zero streaks or soap film.',
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
