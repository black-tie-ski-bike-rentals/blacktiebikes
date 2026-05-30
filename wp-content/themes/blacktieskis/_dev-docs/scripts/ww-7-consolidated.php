<?php
/**
 * WW-7: Consolidated setup script — run once.
 *
 * 1. Registers explore_section ACF layout
 * 2. Migrates tabs_section → explore_section on all location pages
 * 3. Sets cat_cta_text / cat_cta_url on every category (all package counts)
 * 4. Updates package descriptions to trimmed one-sentence versions
 *
 * Run with:
 *   wp eval-file wp-content/themes/blacktieskis/_dev-docs/scripts/ww-7-consolidated.php
 *
 * Idempotent — safe to re-run.
 */

if ( ! function_exists( 'acf_get_field' ) ) {
    WP_CLI::error( 'ACF is not active.' );
    return;
}

const BOOKING_URL = 'https://booknow.blacktiebikes.com/reservations/step1';

// ─── Helpers ────────────────────────────────────────────────────────────────

function btb_child_permalink( $location_id, ...$keywords ) {
    $children = get_posts( [
        'post_type'      => 'page',
        'post_parent'    => $location_id,
        'posts_per_page' => -1,
        'post_status'    => 'publish',
    ] );
    foreach ( $children as $child ) {
        $slug = $child->post_name;
        foreach ( $keywords as $kw ) {
            if ( strpos( $slug, $kw ) !== false ) {
                return get_permalink( $child->ID );
            }
        }
    }
    return null;
}

// ─── Step 1: Register ACF layout ────────────────────────────────────────────

$templates_field = acf_get_field( 'bt_templates' );
if ( ! $templates_field ) {
    WP_CLI::error( 'Could not find ACF field "bt_templates".' );
    return;
}

$layout_exists = false;
foreach ( (array) $templates_field['layouts'] as $layout ) {
    if ( isset( $layout['name'] ) && $layout['name'] === 'explore_section' ) {
        $layout_exists = true;
        break;
    }
}

if ( ! $layout_exists ) {
    $group = acf_get_field_group( $templates_field['parent'] );
    if ( ! $group ) {
        WP_CLI::error( 'Could not find the parent field group for bt_templates.' );
        return;
    }
    $group['fields'] = acf_get_fields( $group['key'] );

    $new_layout = [
        'key'        => 'layout_explore_section',
        'name'       => 'explore_section',
        'label'      => 'Explore Section',
        'display'    => 'block',
        'sub_fields' => [
            [
                'key'          => 'field_explore_categories',
                'label'        => 'Categories',
                'name'         => 'categories',
                'type'         => 'repeater',
                'layout'       => 'block',
                'button_label' => 'Add Category',
                'sub_fields'   => [
                    [ 'key' => 'field_explore_cat_label',    'label' => 'Category Label', 'name' => 'cat_label',    'type' => 'text' ],
                    [ 'key' => 'field_explore_cat_cta_text', 'label' => 'CTA Text',       'name' => 'cat_cta_text', 'type' => 'text' ],
                    [ 'key' => 'field_explore_cat_cta_url',  'label' => 'CTA URL',        'name' => 'cat_cta_url',  'type' => 'url'  ],
                    [
                        'key'          => 'field_explore_packages',
                        'label'        => 'Packages',
                        'name'         => 'packages',
                        'type'         => 'repeater',
                        'layout'       => 'block',
                        'button_label' => 'Add Package',
                        'instructions' => '3+ → slider  |  2 → grid  |  1 → featured card',
                        'sub_fields'   => [
                            [ 'key' => 'field_explore_pkg_title',       'label' => 'Title',          'name' => 'pkg_title',       'type' => 'text'    ],
                            [ 'key' => 'field_explore_pkg_image',       'label' => 'Image',          'name' => 'pkg_image',       'type' => 'image', 'return_format' => 'id', 'preview_size' => 'medium' ],
                            [ 'key' => 'field_explore_pkg_description', 'label' => 'Description',    'name' => 'pkg_description', 'type' => 'textarea', 'rows' => 2 ],
                            [ 'key' => 'field_explore_pkg_cta_url',     'label' => 'Booking URL',    'name' => 'pkg_cta_url',     'type' => 'url'     ],
                            [ 'key' => 'field_explore_pkg_badge',       'label' => 'Badge (optional)', 'name' => 'pkg_badge',     'type' => 'text'    ],
                        ],
                    ],
                ],
            ],
        ],
    ];

    foreach ( $group['fields'] as &$field ) {
        if ( $field['name'] === 'bt_templates' ) {
            if ( ! is_array( $field['layouts'] ) ) $field['layouts'] = [];
            $field['layouts'][ $new_layout['key'] ] = $new_layout;
            break;
        }
    }
    unset( $field );

    acf_import_field_group( $group );
    WP_CLI::log( '✓ explore_section layout registered.' );
} else {
    WP_CLI::log( '✓ explore_section layout already registered.' );
}

// ─── Step 2: CTA map ────────────────────────────────────────────────────────
// Keys are cat_label values. Values are either a hardcoded URL string,
// or an array of child page slug keywords to match dynamically.
// Falls back to BOOKING_URL if nothing resolves.

$cta_map = [
    'Bikes'                => [ 'slug_keywords' => [ 'bike-rental' ] ],
    'E-Bikes'              => [ 'slug_keywords' => [ 'bike-rental' ] ],
    'Water'                => [ 'slug_keywords' => [ 'paddle', 'board' ] ],
    'Paddle'               => [ 'slug_keywords' => [ 'paddle', 'board' ] ],
    'Tours'                => [ 'slug_keywords' => [ 'tour', 'fishing' ] ],
    '4X4'                  => [ 'slug_keywords' => [ '4x4' ] ],
    '4x4'                  => [ 'slug_keywords' => [ '4x4' ] ],
    'Services'             => [ 'slug_keywords' => [ 'service' ] ],
    'Bike Shop'            => [ 'slug_keywords' => [ 'service' ] ],
    'FAQs'                 => [ 'slug_keywords' => [ 'faq' ] ],
    'Accessories'          => [ 'url' => BOOKING_URL ],
    'Bike Shuttle Service' => [ 'url' => BOOKING_URL ],
];

// ─── Step 3: Package descriptions ───────────────────────────────────────────

$descriptions = [
    'Banff' => [
        'Bikes' => [
            'Step Over E-Bike'          => 'A premium e-bike with a 48V 17.5ah battery offering up to 93km of range in unmatched comfort and style.',
            'Marin Bobcat Trail 4'      => 'A quality off-road hardtail with SR/Suntour fork, Shimano CUES 10-speed shifting, and Tektro hydraulic brakes.',
            'Marin Riftzone 1'          => 'The ultimate do-it-all trail bike, built for everything from all-day epics to local shred laps and big mountain adventures.',
            'Marin Donky Jr'            => 'A lightweight aluminum kids bike with Shimano 6-speed drivetrain, available in 16, 20, and 24-inch wheel sizes.',
            'Step Through E-Bike'       => 'A comfortable step-through e-bike with rear hub motor and high-capacity battery, perfect for paths, commutes, and family rides.',
        ],
        'Paddle' => [
            'Inflatable Stand Up Paddleboard' => 'A versatile inflatable SUP perfectly tailored for adventurous water lovers of all skill levels.',
            'Inflatable Giant SUP'            => 'A 16ft family SUP for groups up to 1,320lbs, includes board, 2 paddles, and 4 PFDs.',
        ],
        'Accessories' => [
            'Child Trailer' => 'A safe, comfortable tow-behind trailer for 1–2 children with 5-point harnesses, bug screen, and rain cover, up to 100lbs.',
            'Pet Trailer'   => 'A bicycle pet trailer for rides with your furry companion, compatible with our hardtail and e-bike models, up to 44lbs.',
            'Bear Spray'    => 'The most effective proven deterrent against a bear attack when used correctly.',
        ],
    ],
    'Whistler' => [
        'Bikes' => [
            'Downhill/Bike Park'     => 'Full-day downhill and long-travel enduro rentals on Devinci and Marin bikes built for the Whistler Bike Park.',
            'Enduro/Trail'           => 'Full suspension enduro trail bikes including the Marin Alpine Trail Carbon and Devinci Spartan for Whistler\'s singletrack.',
            'E-Bikes'                => 'Pedal-assist e-bikes for the paved Valley Trail or full suspension options for mountain bikers wanting help on the climbs.',
            'Recreational & Kids\'' => 'Recreational and kids bikes from Marin for exploring Whistler\'s paved and gravel Valley Trail network.',
        ],
        'Services' => [
            'Bike Repair & Services' => 'Full repairs and quick tune-ups available in-shop or via pick-up and drop-off at your location.',
        ],
        'FAQs' => [
            'Learn More' => 'Read the most frequently asked questions.',
        ],
    ],
    'North Tahoe' => [
        'E-Bikes' => [
            'Premium E-Bike'         => 'A fat tire Aventon Aventure e-bike with over 40 miles of range.',
            'Premium (Cargo) E-Bike' => 'An Aventon Abound cargo e-bike with extra hauling capacity and over 50 miles of range.',
        ],
        'Paddle' => [
            'Paddle Board Reg. (1 Person)'   => 'A rigid, stable inflatable SUP with 400lb capacity, ideal for solo paddlers.',
            'Paddle Board Large (2 Person)'  => 'A spacious inflatable SUP with room for two adults and 550lb capacity.',
            'Paddle Board Giant (6 Person!)' => 'A massive 6-person party SUP with strategically placed handles, foam padding, and soft gear attachments.',
            'Inflatable Kayak'               => 'A high-quality inflatable kayak built for durability and performance on any water.',
            'Tube'                           => 'A comfortable, stylish tube for lounging on the lake or floating the Truckee River.',
        ],
    ],
    'Big Sky' => [
        'Bikes' => [
            'E-Mountain Bike'                          => 'Premium e-mountain bikes with unmatched performance for Big Sky\'s trails.',
            'Premium Full Suspension'                  => 'Top-tier full suspension mountain bikes matched to Big Sky\'s most technical terrain.',
            'Premium Full Suspension with Accessories' => 'Premium full suspension bikes with accessories for park and trail adventures.',
            'Junior Premium Full Suspension'           => 'Premium full suspension bikes sized for experienced junior riders.',
            'Junior Standard'                          => 'Front-suspension kids bikes for young riders getting started on the trails.',
            'E-Bike (Path)'                            => 'Easy-to-ride pedal-assist e-bikes perfect for exploring around town.',
            'E-Mountain Fat Tire Bike'                 => 'Fat tire e-mountain bikes combining electric power with oversized tire stability.',
        ],
        'Accessories' => [
            'Helmets, Gloves, Knee & Elbow Guards' => 'Protective gear to keep you safe on the trails.',
        ],
    ],
    'Whitefish' => [
        'Bikes' => [
            'E-Mountain Bike'          => 'A hardtail electric mountain bike with front suspension built for off-road riding right from our shop.',
            'E-Mountain Fat Tire Bike' => 'Fat tire e-mountain bikes combining electric power and oversized tire stability for all skill levels.',
            'E-Bike (Path)'            => 'A lightweight path e-bike with electric assist, ideal for Glacier\'s Going-to-the-Sun Road and Whitefish\'s scenic routes.',
            'E-Bike (Cruiser)'         => 'A laid-back electric cruiser perfect for casual rides and errands around town.',
            'E-Bike (Cargo)'           => 'A powerful cargo e-bike built to carry everything — including your kids.',
            'E-Bike (Folding)'         => 'A folding e-bike that fits in the back of a standard car for easy transport and elevated adventures.',
        ],
        'Water' => [
            'Paddle Boards'               => 'Inflatable SOL paddle boards for all ages, great for lakes, rivers, fishing, yoga, or soaking up the sun.',
            'Inflatable Kayak'            => 'A SOL inflatable kayak for 1–2 paddlers that packs into your car and inflates right at the water.',
            'River Tubes'                 => 'A durable SOLtube with welded floor for comfortable sitting or kneeling on the lake or Whitefish River.',
            'Packrafts'                   => 'Lightweight Alpacka packrafts around 6–8 lbs that pack into your backpack for backcountry lake and river adventures.',
            'Alpacka Expedition Packraft' => 'A premium Alpacka Expedition packraft built for serious backcountry explorers tackling Montana\'s wild rivers and alpine lakes.',
        ],
    ],
    'Sun Valley' => [
        'Bikes' => [
            'RadMission'                   => 'A lightweight single-speed electric hybrid with a road bike feel, easy to carry up stairs.',
            'RadRunner 2'                  => 'A stress-free step-thru e-bike that handles cargo, passengers, and everyday rides with style.',
            'Trek Verve 3+'                => 'A comfortable electric hybrid with suspension seatpost, stable tires, and integrated lights for daily rides and commutes.',
            'Guerrilla Gravity Gnarvana'   => 'A confidence-inspiring enduro bike built for steep, chunky, fall-line trails.',
            'Guerrilla Gravity Shred Dogg' => 'A playful, maneuverable trail bike with switchable 130/140mm travel modes for any trail type.',
        ],
        'Paddle' => [
            'Galaxy SOLtrain' => 'The flagship SOL board, versatile for lake cruising, river running, fishing, yoga, and carrying a small front passenger.',
            'GalaXy SOLuno'   => 'A rigid, durable inflatable kayak with a patent-pending stringer system for unmatched tracking and puncture resistance.',
        ],
        '4X4' => [
            'Jeep Rubicon 4XE' => 'Rent a hybrid electric Wrangler Rubicon 4XE, available with a Kuat bike rack for 2 or 4 bikes.',
        ],
        'Bike Shop' => [
            'Bike Repair & Services' => 'Full repairs and quick tune-ups available in-shop or via pick-up and drop-off at your location.',
        ],
    ],
    'Park City' => [
        'Bikes' => [
            'E-bike Single Rider' => 'Class 2 pedal-assist and throttle e-bikes from Rad and Lectric for riders of any size or ability.',
            'E-bike Kid Carrier'  => 'Cargo e-bikes from Rad and Lectric with options for 1–2 additional riders on the back.',
            'Mountain Bikes'      => 'Top-of-the-line full suspension mountain bikes for all ability levels and any terrain in Park City.',
            'Kids Bikes'          => 'Quality kids mountain bikes in sizes for any young rider.',
        ],
        'Tours' => [
            '1/2 Day Guided Fly Fishing Trip (One Person) '      => 'A 4–5 hour guided fly fishing trip on the Middle Provo or Weber River with all gear included except a fishing license.',
            '2 Hour Guided E-Bike Tour (Maximum of 6 guests)'    => 'A 2-hour guided e-bike tour with a local expert, bookable as an add-on to your e-bike rental.',
            '4 Hour Guided E-Bike Tour (Maximum of 6 guests)'    => 'A 4-hour guided e-bike tour with a local expert, bookable as an add-on to your e-bike rental.',
        ],
    ],
    'Vail' => [
        'Bikes' => [
            'Mountain Bikes' => 'Top-of-the-line Rocky Mountain and Guerrilla Gravity bikes for all ability levels and terrain.',
            'E-Bikes'        => 'Pedal-assist and throttle e-bikes from Rocky Mountain and Rad for trails or relaxed path cruising.',
            'Kid Bikes'      => 'Full suspension Rocky Mountain kids bikes for all ability levels in the park and on local trails.',
        ],
        'Accessories' => [
            'Lock'          => 'Keep your bike safe and secure with a lock from our experts.',
            'Extra Battery' => 'An extra battery so a dying charge never cuts your ride short.',
            'Child Seat '   => 'A child seat add-on to bring along riders too young for their own bike.',
            'Phone Mount'   => 'A phone mount so you can focus on the views instead of your pockets.',
        ],
    ],
    'Breckenridge' => [
        'Bikes' => [
            'Rad Rover 6 Step-Thru' => 'Rad Power Bikes\' flagship fat tire e-bike, built to power through all weather and terrain in its sixth and best version yet.',
            'Rad Rover 6 High-Step' => 'Rad Power Bikes\' flagship fat tire e-bike, built to power through all weather and terrain in its sixth and best version yet.',
        ],
        'Accessories' => [
            'Lock'          => 'Keep your bike safe and secure with a lock from our experts.',
            'Extra Battery' => 'An extra battery so a dying charge never cuts your ride short.',
            'Child Seat '   => 'A child seat add-on to bring along riders too young for their own bike.',
            'Phone Mount'   => 'A phone mount so you can focus on the views instead of your pockets.',
        ],
    ],
    'Mammoth' => [
        'Bikes' => [
            'E Bikes'          => 'Pedal-assist and throttle e-bikes from Rad and Aventon for path cruising and family rides.',
            'E-Mountain Bikes' => 'Full suspension and hardtail e-mountain bikes from Trek and Aventon for all ability levels and any terrain.',
            'Mountain Bikes'   => 'Top-of-the-line Trek mountain bikes for all ability levels from the bike park to scenic valley rides.',
            'Kids Bikes'       => 'Kids bikes for all ages, sizes, and ability levels.',
        ],
        'Paddle' => [
            'Paddle Board'     => 'Inflatable SUPs from SOL and ROC for lakes, rivers, fishing, or yoga.',
            'Inflatable Kayak' => 'A SOL inflatable kayak packed and ready to go — just head to the lake and inflate.',
            'River Tubes'      => 'A durable, fully welded SOLtube for floating the water in comfort and style.',
        ],
        'Tours' => [
            'Bike Tours' => 'A guided e-bike tour of Mammoth Lakes showcasing the Sierra Nevada\'s best mountain views, lakes, and vistas.',
        ],
        'Bike Shop' => [
            'Bike Repair & Services' => 'Full repairs and quick tune-ups available in-shop on Old Mammoth Road or via pick-up and drop-off.',
        ],
        'Bike Shuttle Service' => [
            'Bike Shuttle Service' => 'Mammoth\'s first dedicated bike shuttle service — we drop you at the trailhead so you can ride more and haul less.',
        ],
    ],
    'Telluride' => [
        'Bikes' => [
            'Mountain Bikes' => 'Top-of-the-line Yeti, Norco, Giant, and Orbea bikes for all ability levels and any terrain.',
            'Ebikes'         => 'Pedal-assist and throttle e-bikes from Yeti, Giant, and Rad for trails or easy path riding.',
            'Kids Bikes'     => 'Norco full suspension and hardtail kids bikes for park riding and progressing on local trails.',
            'Cruisers'       => 'Stylish State Bikes mountain cruisers for getting around Telluride all week.',
        ],
        'Paddle' => [
            'Paddle Board'     => 'Inflatable SOL paddle boards in multiple models for lakes, rivers, fishing, and yoga.',
            'Inflatable Kayak' => 'A SOL inflatable kayak packed and ready to go — just head to the lake and inflate.',
            'River Tubes'      => 'A durable, fully welded SOLtube for floating the water in comfort and style.',
        ],
        '4x4' => [
            'Jeep Rubicon' => 'An AEV Jeep Wrangler delivered to your lodging, set up with bikes, paddle boards, or whatever your adventure needs.',
        ],
        'Accessories' => [
            'Down Hill Bike Pads and Full Face Helmets' => 'Full protective kit for the bike park including full face helmets, chest protectors, knee and elbow pads, and gloves from Leatt, 7Protection, and Bell/Giro.',
            'Kids Bike Trailers'                        => 'A tow-behind bike trailer for two young ones with restraint belts, compatible with standard bike rentals.',
            'Lake/Festival Rentals'                     => 'Sun shelters from Big Agnes and foldable camp chairs in two sizes.',
            'Child Carry Backpacks and Strollers'       => 'Deuter child carry backpacks and Burley strollers to keep your young ones along for the hike.',
            '55 Qt Canyon Cooler'                       => 'A rugged 55-quart Canyon Cooler that holds ice for up to five days, built for trucks, boats, and campsites.',
        ],
    ],
];

// ─── Step 4: Process all location pages ─────────────────────────────────────

$pages = get_posts( [
    'post_type'      => 'page',
    'posts_per_page' => -1,
    'meta_query'     => [ [
        'key'   => '_wp_page_template',
        'value' => 'page-location.php',
    ] ],
] );

if ( empty( $pages ) ) {
    WP_CLI::error( 'No location pages found.' );
    return;
}

WP_CLI::log( 'Found ' . count( $pages ) . ' location page(s).' );

$desc_updated = 0;
$desc_skipped = 0;
$desc_missed  = 0;

foreach ( $pages as $page ) {
    $title     = $page->post_title;
    $templates = get_field( 'bt_templates', $page->ID );

    if ( empty( $templates ) ) {
        WP_CLI::log( "  {$title}: no bt_templates data, skipping." );
        continue;
    }

    // --- Find or migrate explore_section ---

    $explore_idx = null;
    $source_idx  = null;

    foreach ( $templates as $i => $row ) {
        if ( $row['acf_fc_layout'] === 'explore_section' && ! empty( $row['categories'] ) ) {
            $explore_idx = $i;
            break;
        }
        if ( $row['acf_fc_layout'] === 'tabs_section' ||
             ( $row['acf_fc_layout'] === 'explore_section' && empty( $row['categories'] ) ) ) {
            $source_idx = $i;
        }
    }

    if ( $explore_idx === null ) {
        if ( $source_idx === null ) {
            WP_CLI::log( "  {$title}: no tabs_section found, skipping." );
            continue;
        }

        $row        = $templates[ $source_idx ];
        $categories = [];

        foreach ( (array) $row['tabs'] as $tab ) {
            $packages = [];
            foreach ( (array) $tab['description'] as $item ) {
                $image_id = is_array( $item['image'] ) ? (int) $item['image']['ID'] : (int) $item['image'];
                $clean    = wp_strip_all_tags( $item['description'] );
                $clean    = preg_replace( '/\s+/', ' ', $clean );
                $clean    = preg_replace( '/\s*(More Info|Book now|Book Now)\s*$/i', '', $clean );
                $clean    = trim( $clean );

                $packages[] = [
                    'pkg_title'       => $item['title'],
                    'pkg_image'       => $image_id,
                    'pkg_description' => $clean,
                    'pkg_cta_url'     => '',
                    'pkg_badge'       => '',
                ];
            }

            $categories[] = [
                'cat_label'    => $tab['tab_label'],
                'cat_cta_text' => '',
                'cat_cta_url'  => '',
                'packages'     => $packages,
            ];
        }

        $templates[ $source_idx ] = [
            'acf_fc_layout' => 'explore_section',
            'categories'    => $categories,
        ];
        $explore_idx = $source_idx;

        $pkg_total = array_sum( array_map( fn( $c ) => count( $c['packages'] ), $categories ) );
        WP_CLI::log( "  {$title}: migrated " . count( $categories ) . " categories, {$pkg_total} packages." );
    } else {
        WP_CLI::log( "  {$title}: explore_section exists." );
    }

    // --- Set CTAs on every category, no skipping ---

    $explore_row = &$templates[ $explore_idx ];

    foreach ( $explore_row['categories'] as $ci => &$cat ) {
        $label = $cat['cat_label'];

        // Resolve URL from cta_map
        $cta_url  = null;
        $cta_text = 'View All ' . $label;

        if ( isset( $cta_map[ $label ] ) ) {
            $entry = $cta_map[ $label ];
            if ( isset( $entry['url'] ) ) {
                $cta_url = $entry['url'];
            } elseif ( isset( $entry['slug_keywords'] ) ) {
                $cta_url = btb_child_permalink( $page->ID, ...$entry['slug_keywords'] );
                if ( ! $cta_url ) {
                    $cta_url = BOOKING_URL;
                    WP_CLI::log( "    {$label}: no child page found, falling back to booking URL." );
                }
            }
        } else {
            $cta_url = BOOKING_URL;
            WP_CLI::log( "    {$label}: not in CTA map, falling back to booking URL." );
        }

        // Skip if already correctly set
        if ( $cat['cat_cta_url'] === $cta_url && $cat['cat_cta_text'] === $cta_text ) {
            WP_CLI::log( "    {$label}: CTA already set, skipping." );
            continue;
        }

        $cat['cat_cta_text'] = $cta_text;
        $cat['cat_cta_url']  = $cta_url;
        WP_CLI::log( "    {$label} → {$cta_url}" );
    }
    unset( $cat );

    update_row( 'bt_templates', $explore_idx + 1, $templates[ $explore_idx ], $page->ID );

    // --- Update package descriptions via direct post_meta ---

    if ( ! isset( $descriptions[ $title ] ) ) {
        WP_CLI::warning( "  {$title}: no descriptions defined." );
        continue;
    }

    foreach ( $explore_row['categories'] as $ci => $cat ) {
        $cat_label = $cat['cat_label'];

        if ( ! isset( $descriptions[ $title ][ $cat_label ] ) ) {
            WP_CLI::warning( "  {$title} / {$cat_label}: no descriptions defined." );
            continue;
        }

        foreach ( $cat['packages'] as $pi => $pkg ) {
            $pkg_title = $pkg['pkg_title'];

            if ( ! isset( $descriptions[ $title ][ $cat_label ][ $pkg_title ] ) ) {
                WP_CLI::warning( "  {$title} / {$cat_label} / {$pkg_title}: no description defined." );
                $desc_missed++;
                continue;
            }

            $new_desc = $descriptions[ $title ][ $cat_label ][ $pkg_title ];
            $meta_key = "bt_templates_{$explore_idx}_categories_{$ci}_packages_{$pi}_pkg_description";

            global $wpdb;
            $existing = $wpdb->get_var( $wpdb->prepare(
                "SELECT meta_value FROM {$wpdb->postmeta} WHERE post_id=%d AND meta_key=%s",
                $page->ID,
                $meta_key
            ) );

            if ( $existing === $new_desc ) {
                $desc_skipped++;
                continue;
            }

            update_post_meta( $page->ID, $meta_key, $new_desc );
            WP_CLI::log( "  ✓ desc: {$title} / {$cat_label} / {$pkg_title}" );
            $desc_updated++;
        }
    }
}

WP_CLI::success( "Done. Descriptions — Updated: {$desc_updated}, Skipped: {$desc_skipped}, Missing from map: {$desc_missed}." );
