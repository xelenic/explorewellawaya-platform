<?php

namespace Database\Seeders;

use App\Models\Destination;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DestinationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get admin user or create one for destinations
        $adminUser = User::where('email', 'admin@wellawaya.com')->first();
        
        if (!$adminUser) {
            $adminUser = User::first();
        }

        if (!$adminUser) {
            $this->command->warn('No user found. Please run AdminSeeder first.');
            return;
        }

        $destinations = [
            [
                'name' => 'Bambarakanda Falls',
                'slug' => 'bambarakanda-falls',
                'description' => 'Bambarakanda Falls is the highest waterfall in Sri Lanka, standing at an impressive 263 meters (863 feet). Located in the Badulla District, this magnificent waterfall cascades down a rocky cliff surrounded by lush green forests. The waterfall is part of the Walawe River and creates a spectacular sight, especially during the monsoon season when the water flow is at its peak.',
                'location' => 'Kalupahana, Badulla District',
                'category' => 'waterfall',
                'highlights' => 'Highest waterfall in Sri Lanka (263m), Spectacular cascading water, Beautiful forest surroundings, Great for photography, Hiking trails nearby',
                'best_time_to_visit' => 'December to April (dry season) or May to September (monsoon for maximum water flow)',
                'how_to_reach' => 'From Wellawaya: Take the A4 highway towards Haputale. Turn off at Kalupahana junction and follow the signs. The waterfall is approximately 25 km from Wellawaya. You can hire a tuk-tuk or drive. The last part requires a short hike.',
                'tips' => 'Wear comfortable hiking shoes, Bring water and snacks, Best visited early morning for better lighting, Be cautious near the waterfall edge, Carry a raincoat during monsoon season',
                'latitude' => 6.7500,
                'longitude' => 80.9167,
                'is_published' => true,
                'published_at' => now(),
            ],
            [
                'name' => 'Diyaluma Falls',
                'slug' => 'diyaluma-falls',
                'description' => 'Diyaluma Falls is the second highest waterfall in Sri Lanka, with a height of 220 meters (722 feet). This stunning waterfall is located near Koslanda and offers one of the most unique experiences - natural infinity pools at the top! The waterfall cascades in multiple tiers, creating a breathtaking natural spectacle. The upper pools are accessible via a challenging but rewarding hike.',
                'location' => 'Koslanda, Badulla District',
                'category' => 'waterfall',
                'highlights' => 'Second highest waterfall (220m), Natural infinity pools at the top, Multi-tier cascading falls, Swimming opportunities, Panoramic mountain views',
                'best_time_to_visit' => 'December to April for swimming, May to September for maximum water flow',
                'how_to_reach' => 'From Wellawaya: Take the A4 highway towards Haputale, then turn towards Koslanda. The waterfall is about 30 km from Wellawaya. A 2-3 hour hike is required to reach the top pools.',
                'tips' => 'Hike is challenging - bring proper gear, Swimming in natural pools is possible but be careful, Start early to avoid crowds, Bring plenty of water, Wear non-slip shoes',
                'latitude' => 6.7333,
                'longitude' => 81.0167,
                'is_published' => true,
                'published_at' => now(),
            ],
            [
                'name' => 'Ravana Falls',
                'slug' => 'ravana-falls',
                'description' => 'Ravana Falls is a beautiful waterfall located near Ella, named after the legendary King Ravana from the Ramayana epic. According to mythology, this is where Ravana hid Princess Sita. The waterfall cascades down in multiple tiers, creating a picturesque scene. It\'s easily accessible and one of the most popular waterfalls in the region.',
                'location' => 'Ella, Badulla District',
                'category' => 'waterfall',
                'highlights' => 'Mythological significance, Easily accessible, Multiple cascading tiers, Popular tourist spot, Close to Ella town',
                'best_time_to_visit' => 'Year-round, but best during May to September for maximum water flow',
                'how_to_reach' => 'From Wellawaya: Take the A4 highway towards Ella. The waterfall is visible from the main road, about 6 km before Ella town. Approximately 20 km from Wellawaya.',
                'tips' => 'Can be viewed from the road, Short walk to get closer, Popular spot - visit early morning, Great for photography, Combine with Ella Rock visit',
                'latitude' => 6.8667,
                'longitude' => 81.0500,
                'is_published' => true,
                'published_at' => now(),
            ],
            [
                'name' => 'Lipton\'s Seat',
                'slug' => 'liptons-seat',
                'description' => 'Lipton\'s Seat is a famous viewpoint where Sir Thomas Lipton, the tea magnate, used to survey his tea empire. Located at an elevation of 1,970 meters (6,463 feet), it offers breathtaking panoramic views of the surrounding tea plantations, valleys, and mountains. On a clear day, you can see up to 65 km away, including views of the Udawalawe reservoir.',
                'location' => 'Dambatenne, Haputale',
                'category' => 'viewpoint',
                'highlights' => 'Historic tea plantation viewpoint, Panoramic 360-degree views, Elevation of 1,970m, Tea factory visit nearby, Sunrise and sunset views',
                'best_time_to_visit' => 'Early morning (6-8 AM) for sunrise and clear views, or late afternoon for sunset. Avoid midday when clouds may obstruct views.',
                'how_to_reach' => 'From Wellawale: Take the A4 highway to Haputale, then follow signs to Dambatenne Tea Factory. From there, it\'s a 7 km drive or hike to Lipton\'s Seat. Total distance from Wellawaya is about 40 km.',
                'tips' => 'Best visited early morning for clear views, Bring warm clothing - it can be cold, Combine with Dambatenne Tea Factory tour, Allow 2-3 hours for the visit, Check weather before going',
                'latitude' => 6.7833,
                'longitude' => 80.9667,
                'is_published' => true,
                'published_at' => now(),
            ],
            [
                'name' => 'Dambatenne Tea Factory',
                'slug' => 'dambatenne-tea-factory',
                'description' => 'The Dambatenne Tea Factory is a historic tea processing facility established by Sir Thomas Lipton in 1890. This working tea factory offers guided tours where visitors can learn about the entire tea production process, from leaf picking to packaging. The factory produces high-quality Ceylon tea and is surrounded by beautiful tea plantations.',
                'location' => 'Dambatenne, Haputale',
                'category' => 'factory',
                'highlights' => 'Historic tea factory (1890), Guided factory tours, Tea tasting sessions, Learn tea production process, Beautiful tea plantation views',
                'best_time_to_visit' => 'Year-round, factory tours available daily. Best time is during tea picking season (varies by elevation).',
                'how_to_reach' => 'From Wellawaya: Take the A4 highway to Haputale, then follow signs to Dambatenne. The factory is about 35 km from Wellawaya. Accessible by car or tuk-tuk.',
                'tips' => 'Guided tours available, Tea tasting included, Combine with Lipton\'s Seat visit, Photography allowed in most areas, Buy fresh tea from factory shop',
                'latitude' => 6.7833,
                'longitude' => 80.9500,
                'is_published' => true,
                'published_at' => now(),
            ],
            [
                'name' => 'Ella Rock',
                'slug' => 'ella-rock',
                'description' => 'Ella Rock is a popular hiking destination offering spectacular views of the surrounding valleys, tea plantations, and mountains. The hike takes you through tea plantations, along railway tracks, and up to a viewpoint at approximately 1,041 meters elevation. The panoramic views from the top are absolutely stunning, making it one of the most rewarding hikes in the area.',
                'location' => 'Ella, Badulla District',
                'category' => 'mountain',
                'highlights' => 'Challenging but rewarding hike, Panoramic mountain views, Tea plantation scenery, Railway track crossing, Popular sunrise/sunset spot',
                'best_time_to_visit' => 'Early morning (start at 5-6 AM) for sunrise views, or late afternoon for sunset. Avoid midday heat.',
                'how_to_reach' => 'From Wellawaya: Drive to Ella (about 25 km). The hike starts from Ella town. Follow the railway tracks initially, then take the marked trail. Total hiking time: 3-4 hours round trip.',
                'tips' => 'Start early to avoid heat and crowds, Hire a local guide if unsure of the trail, Bring water and snacks, Wear proper hiking shoes, Allow 3-4 hours for the hike',
                'latitude' => 6.8667,
                'longitude' => 81.0500,
                'is_published' => true,
                'published_at' => now(),
            ],
            [
                'name' => 'Nine Arch Bridge',
                'slug' => 'nine-arch-bridge',
                'description' => 'The Nine Arch Bridge, also known as the Bridge in the Sky, is a magnificent railway bridge built entirely of stone, bricks, and cement without any steel. Located between Ella and Demodara stations, this architectural marvel spans 91 meters and stands 24 meters tall. Surrounded by lush greenery, it\'s one of the most photographed locations in Sri Lanka.',
                'location' => 'Ella, Badulla District',
                'category' => 'landmark',
                'highlights' => 'Historic railway bridge (1921), No steel construction, Beautiful architecture, Surrounded by tea plantations, Train viewing opportunities',
                'best_time_to_visit' => 'Early morning (7-9 AM) or late afternoon (4-6 PM) for best lighting and train schedules. Check train timings for photo opportunities.',
                'how_to_reach' => 'From Wellawaya: Drive to Ella (25 km), then take a tuk-tuk or walk to the bridge. It\'s about 2 km from Ella town center. Accessible via a short walk through tea plantations.',
                'tips' => 'Check train schedules for photo opportunities, Best lighting in early morning, Wear comfortable walking shoes, Popular spot - visit early, Bring camera for stunning photos',
                'latitude' => 6.8500,
                'longitude' => 81.0500,
                'is_published' => true,
                'published_at' => now(),
            ],
            [
                'name' => 'Little Adam\'s Peak',
                'slug' => 'little-adams-peak',
                'description' => 'Little Adam\'s Peak, also known as Punchi Sri Pada, is a smaller and more accessible version of the famous Adam\'s Peak. This relatively easy hike offers stunning views of Ella Gap, tea plantations, and the surrounding mountains. The peak stands at 1,141 meters and is perfect for those who want beautiful views without the strenuous climb of its larger namesake.',
                'location' => 'Ella, Badulla District',
                'category' => 'mountain',
                'highlights' => 'Easy to moderate hike, Stunning views of Ella Gap, Tea plantation scenery, Perfect for sunrise/sunset, Less crowded than Ella Rock',
                'best_time_to_visit' => 'Early morning (6-8 AM) for sunrise or late afternoon (4-6 PM) for sunset. The hike takes about 1-1.5 hours.',
                'how_to_reach' => 'From Wellawaya: Drive to Ella (25 km). The trail starts from Ella town, near the 98 Acres Resort. Well-marked path, about 1-1.5 hour hike to the top.',
                'tips' => 'Much easier than Ella Rock, Suitable for all fitness levels, Best visited for sunrise or sunset, Bring water, Allow 2-3 hours total',
                'latitude' => 6.8667,
                'longitude' => 81.0500,
                'is_published' => true,
                'published_at' => now(),
            ],
            [
                'name' => 'Demodara Loop',
                'slug' => 'demodara-loop',
                'description' => 'The Demodara Loop is an engineering marvel where the railway track forms a complete loop, allowing the train to gain elevation while appearing to travel in a circle. The train enters a tunnel and emerges at a different level, creating a fascinating spiral railway. This unique feature was built to overcome the steep gradient in the area and is one of only a few such loops in the world.',
                'location' => 'Demodara, Badulla District',
                'category' => 'landmark',
                'highlights' => 'Unique spiral railway loop, Engineering marvel, Train viewing opportunities, Historical railway construction, Scenic location',
                'best_time_to_visit' => 'Check train schedules - best viewed when trains are passing. Early morning or afternoon trains are recommended.',
                'how_to_reach' => 'From Wellawaya: Drive towards Ella, then continue to Demodara station (about 30 km). The loop can be viewed from various viewpoints around the station area.',
                'tips' => 'Check train schedules in advance, Multiple viewpoints available, Combine with Nine Arch Bridge visit, Photography opportunities, Learn about railway history',
                'latitude' => 6.8333,
                'longitude' => 81.0333,
                'is_published' => true,
                'published_at' => now(),
            ],
            [
                'name' => 'Uva Highlands',
                'slug' => 'uva-highlands',
                'description' => 'The Uva Highlands is a beautiful mountainous region in the Uva Province, known for its cool climate, rolling hills, tea plantations, and stunning landscapes. This region offers some of the most scenic drives in Sri Lanka, with winding roads through tea estates, misty mountains, and panoramic vistas. It\'s perfect for those seeking tranquility and natural beauty.',
                'location' => 'Uva Province (Haputale, Bandarawela, Welimada)',
                'category' => 'nature',
                'highlights' => 'Cool mountain climate, Scenic drives, Tea plantation views, Misty mountain landscapes, Peaceful atmosphere',
                'best_time_to_visit' => 'Year-round, but December to March offers the clearest views. Early morning is best for misty mountain views.',
                'how_to_reach' => 'From Wellawaya: The highlands region includes Haputale, Bandarawela, and surrounding areas. Wellawaya is part of this region. Scenic drives available on A4 and connecting roads.',
                'tips' => 'Perfect for scenic drives, Bring warm clothing, Best for photography in early morning, Explore tea plantations, Visit multiple viewpoints',
                'latitude' => 6.7667,
                'longitude' => 80.9500,
                'is_published' => true,
                'published_at' => now(),
            ],
            [
                'name' => 'St. Mark\'s Church',
                'slug' => 'st-marks-church',
                'description' => 'St. Mark\'s Church is a historic Anglican church located in Badulla, built during the British colonial era. This beautiful stone church features Gothic architecture and is surrounded by well-maintained gardens. It stands as a testament to the colonial history of the region and offers a peaceful place for reflection.',
                'location' => 'Badulla, Uva Province',
                'category' => 'temple',
                'highlights' => 'Historic colonial church, Gothic architecture, Beautiful stone construction, Peaceful gardens, Cultural significance',
                'best_time_to_visit' => 'Year-round during visiting hours. Sunday services available.',
                'how_to_reach' => 'From Wellawaya: Drive to Badulla town (about 15 km). The church is located in the town center, easily accessible.',
                'tips' => 'Respectful dress required, Photography allowed, Combine with Badulla town visit, Learn about colonial history, Peaceful atmosphere',
                'latitude' => 6.9931,
                'longitude' => 81.0550,
                'is_published' => true,
                'published_at' => now(),
            ],
            [
                'name' => 'Muthiyangana Raja Maha Viharaya',
                'slug' => 'muthiyangana-temple',
                'description' => 'Muthiyangana Raja Maha Viharaya is an ancient Buddhist temple in Badulla, believed to have been visited by Lord Buddha during his third visit to Sri Lanka. This historic temple is one of the Solosmasthana (16 sacred places) in Sri Lanka and holds great religious significance. The temple features ancient stupas, beautiful murals, and a peaceful atmosphere.',
                'location' => 'Badulla, Uva Province',
                'category' => 'temple',
                'highlights' => 'Ancient Buddhist temple, One of 16 sacred places, Historical significance, Beautiful architecture, Peaceful meditation area',
                'best_time_to_visit' => 'Year-round. Early morning or evening for peaceful atmosphere. Full moon days (Poya) are special.',
                'how_to_reach' => 'From Wellawaya: Drive to Badulla town (15 km). The temple is located in the town center, easily accessible.',
                'tips' => 'Remove shoes before entering, Dress modestly, Photography may be restricted in some areas, Respectful behavior required, Learn about Buddhist history',
                'latitude' => 6.9931,
                'longitude' => 81.0550,
                'is_published' => true,
                'published_at' => now(),
            ],
        ];

        foreach ($destinations as $destination) {
            Destination::create([
                'user_id' => $adminUser->id,
                'name' => $destination['name'],
                'slug' => $destination['slug'],
                'description' => $destination['description'],
                'location' => $destination['location'],
                'category' => $destination['category'],
                'highlights' => $destination['highlights'],
                'best_time_to_visit' => $destination['best_time_to_visit'],
                'how_to_reach' => $destination['how_to_reach'],
                'tips' => $destination['tips'],
                'latitude' => $destination['latitude'],
                'longitude' => $destination['longitude'],
                'is_published' => $destination['is_published'],
                'published_at' => $destination['published_at'],
            ]);
        }

        $this->command->info('Successfully seeded ' . count($destinations) . ' destinations near Wellawaya!');
    }
}
