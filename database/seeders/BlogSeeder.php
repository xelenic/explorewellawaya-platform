<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get admin user
        $adminUser = User::whereHas('roles', function ($query) {
            $query->where('name', 'admin');
        })->first();

        if (!$adminUser) {
            $adminUser = User::where('email', 'admin@wellawaya.com')->first();
        }

        if (!$adminUser) {
            $adminUser = User::first();
        }

        if (!$adminUser) {
            $this->command->error('No user found. Please run AdminSeeder first.');
            return;
        }

        $blogs = [
            [
                'title' => 'Discovering Wellawaya: A Hidden Gem in Sri Lanka',
                'excerpt' => 'Explore the natural beauty and rich cultural heritage of Wellawaya, a charming town in the Uva Province that offers unforgettable experiences for travelers.',
                'content' => '<p>Nestled in the heart of the Uva Province, Wellawaya is a hidden gem that offers travelers a perfect blend of natural beauty, cultural richness, and authentic experiences. This charming town, surrounded by rolling hills, cascading waterfalls, and lush tea plantations, has been attracting nature lovers and adventure seekers for decades.</p>

<h2>Why Visit Wellawaya?</h2>

<p>Wellawaya is not just another tourist destination; it\'s a place where you can truly immerse yourself in the authentic Sri Lankan experience. Here are some compelling reasons to add Wellawaya to your travel itinerary:</p>

<ul>
<li><strong>Natural Wonders:</strong> Home to some of Sri Lanka\'s most spectacular waterfalls, including Bambarakanda Falls, the highest in the country.</li>
<li><strong>Cool Climate:</strong> The elevated location provides a pleasant climate throughout the year, making it perfect for outdoor activities.</li>
<li><strong>Rich Culture:</strong> Experience traditional Sri Lankan culture through ancient temples, local festivals, and warm hospitality.</li>
<li><strong>Adventure Opportunities:</strong> From hiking trails to waterfall swimming, Wellawaya offers numerous activities for adventure enthusiasts.</li>
</ul>

<h2>Getting There</h2>

<p>Wellawaya is easily accessible from major cities in Sri Lanka. The town is located approximately 200 kilometers from Colombo and can be reached by bus, train, or private vehicle. The journey itself is scenic, passing through tea plantations and mountain ranges.</p>

<h2>Best Time to Visit</h2>

<p>The best time to visit Wellawaya is during the dry season from December to April, when the weather is pleasant and outdoor activities are most enjoyable. However, if you want to see the waterfalls at their most spectacular, the monsoon season (May to September) is ideal.</p>

<p>Whether you\'re seeking tranquility, adventure, or cultural immersion, Wellawaya promises an unforgettable experience that will stay with you long after you\'ve returned home.</p>',
                'featured_image' => 'https://images.unsplash.com/photo-1571896349842-33c89424de2d?w=1200&h=800&fit=crop',
                'is_published' => true,
                'published_at' => now()->subDays(5),
            ],
            [
                'title' => 'Top 5 Must-Visit Waterfalls in Wellawaya',
                'excerpt' => 'From the highest waterfall in Sri Lanka to natural infinity pools, discover the most breathtaking waterfalls that make Wellawaya a paradise for nature lovers.',
                'content' => '<p>Wellawaya is renowned for its spectacular waterfalls, each offering unique beauty and experiences. Here are the top 5 waterfalls you must visit during your trip to Wellawaya:</p>

<h2>1. Bambarakanda Falls (263 meters)</h2>

<p>As the highest waterfall in Sri Lanka, Bambarakanda Falls is an absolute must-see. The waterfall cascades down a rocky cliff, creating a magnificent sight, especially during the monsoon season. A short hike from the main road takes you to the base of this impressive waterfall.</p>

<p><strong>Best Time to Visit:</strong> May to September for maximum water flow</p>
<p><strong>Difficulty:</strong> Easy to moderate hike</p>

<h2>2. Diyaluma Falls (220 meters)</h2>

<p>The second-highest waterfall in Sri Lanka, Diyaluma Falls is famous for its natural infinity pools at the top. The hike to the upper pools is challenging but incredibly rewarding, offering stunning views and a chance to swim in the natural pools.</p>

<p><strong>Best Time to Visit:</strong> Year-round, but pools are best from December to April</p>
<p><strong>Difficulty:</strong> Challenging hike to the top</p>

<h2>3. Dunhinda Falls (64 meters)</h2>

<p>One of the most beautiful waterfalls in the region, Dunhinda Falls is surrounded by lush forest and creates a misty atmosphere. The name "Dunhinda" means "spraying water" in Sinhala, which perfectly describes this stunning natural wonder.</p>

<p><strong>Best Time to Visit:</strong> May to September</p>
<p><strong>Difficulty:</strong> Easy walk from parking area</p>

<h2>4. Ravana Falls (25 meters)</h2>

<p>Named after the legendary King Ravana from the Ramayana epic, this waterfall is steeped in mythological significance. The waterfall is easily accessible and popular for bathing, especially during the dry season.</p>

<p><strong>Best Time to Visit:</strong> Year-round</p>
<p><strong>Difficulty:</strong> Easy access</p>

<h2>5. Baker\'s Falls</h2>

<p>Located within the Horton Plains National Park, Baker\'s Falls is accessible via a scenic hiking trail. The waterfall is smaller but offers a peaceful setting surrounded by montane forests.</p>

<p><strong>Best Time to Visit:</strong> December to April</p>
<p><strong>Difficulty:</strong> Moderate hike through Horton Plains</p>

<h2>Waterfall Safety Tips</h2>

<ul>
<li>Wear appropriate footwear with good grip</li>
<li>Be cautious near waterfall edges and slippery rocks</li>
<li>Check weather conditions before visiting</li>
<li>Carry water and snacks for hikes</li>
<li>Respect the natural environment - leave no trace</li>
</ul>

<p>Each of these waterfalls offers a unique experience, making Wellawaya a true paradise for waterfall enthusiasts. Plan your visit to include at least a few of these natural wonders!</p>',
                'featured_image' => 'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=1200&h=800&fit=crop',
                'is_published' => true,
                'published_at' => now()->subDays(3),
            ],
            [
                'title' => 'A Guide to Wellawaya\'s Local Cuisine',
                'excerpt' => 'Explore the authentic flavors of Wellawaya with our guide to local dishes, traditional cooking methods, and the best places to experience Sri Lankan cuisine.',
                'content' => '<p>Sri Lankan cuisine is renowned for its bold flavors, aromatic spices, and diverse influences. In Wellawaya, you\'ll find traditional dishes prepared with fresh, local ingredients and time-honored recipes passed down through generations.</p>

<h2>Must-Try Traditional Dishes</h2>

<h3>1. Rice and Curry</h3>

<p>The quintessential Sri Lankan meal, rice and curry consists of steamed rice served with an array of curries. In Wellawaya, expect to find:</p>

<ul>
<li><strong>Dhal Curry:</strong> Lentils cooked with coconut milk and spices</li>
<li><strong>Pumpkin Curry:</strong> Sweet and savory pumpkin in coconut gravy</li>
<li><strong>Gotukola Sambol:</strong> Fresh leafy greens mixed with grated coconut and lime</li>
<li><strong>Fried Fish:</strong> Fresh river fish seasoned with local spices</li>
</ul>

<h3>2. Kottu Roti</h3>

<p>A popular street food made from shredded flatbread stir-fried with vegetables, eggs, and meat. The rhythmic chopping sound of kottu roti being prepared is a signature sound of Sri Lankan streets.</p>

<h3>3. Hoppers (Appa)</h3>

<p>Bowl-shaped pancakes made from fermented rice flour and coconut milk. Best enjoyed with a fried egg in the center and accompanied by spicy sambol and dhal curry.</p>

<h3>4. String Hoppers (Idiyappam)</h3>

<p>Delicate noodle-like pancakes made from rice flour, typically served with coconut sambol and curry for breakfast or dinner.</p>

<h3>5. Milk Rice (Kiribath)</h3>

<p>A special dish made from rice cooked in coconut milk, often served during celebrations and special occasions. Traditionally served with lunu miris (spicy onion relish).</p>

<h2>Local Spices and Flavors</h2>

<p>Wellawaya\'s cuisine is characterized by its use of fresh, aromatic spices:</p>

<ul>
<li><strong>Cinnamon:</strong> Sri Lanka is famous for its Ceylon cinnamon</li>
<li><strong>Cardamom:</strong> Grown in the highlands, adding distinctive flavor</li>
<li><strong>Curry Leaves:</strong> Essential for tempering and flavoring</li>
<li><strong>Coconut:</strong> Fresh coconut in various forms - milk, oil, and grated</li>
<li><strong>Chili:</strong> Red and green chilies for heat</li>
</ul>

<h2>Where to Eat in Wellawaya</h2>

<p>While exploring Wellawaya, don\'t miss the opportunity to dine at:</p>

<ul>
<li><strong>Local Restaurants:</strong> Family-run establishments serving authentic home-cooked meals</li>
<li><strong>Street Food Stalls:</strong> Experience kottu roti, samosas, and other quick bites</li>
<li><strong>Hotels and Guesthouses:</strong> Many offer traditional Sri Lankan breakfast and dinner</li>
</ul>

<h2>Dining Tips</h2>

<ul>
<li>Most Sri Lankan food is spicy - feel free to ask for milder versions</li>
<li>Eat with your hands (right hand) for the authentic experience</li>
<li>Try the local tea after meals - Wellawaya is in tea country!</li>
<li>Don\'t miss the tropical fruits - mangoes, pineapples, and papayas are delicious</li>
</ul>

<p>Exploring Wellawaya\'s local cuisine is an adventure in itself. Each meal tells a story of tradition, culture, and the bountiful nature that surrounds this beautiful region.</p>',
                'featured_image' => 'https://images.unsplash.com/photo-1555939594-58d7cb561ad1?w=1200&h=800&fit=crop',
                'is_published' => true,
                'published_at' => now()->subDays(2),
            ],
            [
                'title' => 'Hiking Trails and Adventure Activities in Wellawaya',
                'excerpt' => 'From challenging mountain treks to scenic nature walks, discover the best hiking trails and adventure activities that Wellawaya has to offer.',
                'content' => '<p>Wellawaya is a paradise for outdoor enthusiasts, offering a wide range of hiking trails and adventure activities that showcase the region\'s stunning natural beauty. Whether you\'re a seasoned hiker or a casual walker, there\'s something for everyone.</p>

<h2>Top Hiking Trails</h2>

<h3>1. Bambarakanda Falls Hike</h3>

<p><strong>Difficulty:</strong> Moderate<br>
<strong>Duration:</strong> 2-3 hours round trip<br>
<strong>Distance:</strong> 4-5 km</p>

<p>This scenic trail takes you to the base of Sri Lanka\'s highest waterfall. The path winds through tea plantations and forest areas, offering beautiful views along the way. The reward at the end - the magnificent Bambarakanda Falls - is well worth the effort.</p>

<h3>2. Diyaluma Upper Pools Trek</h3>

<p><strong>Difficulty:</strong> Challenging<br>
<strong>Duration:</strong> 4-5 hours round trip<br>
<strong>Distance:</strong> 8-10 km</p>

<p>For the more adventurous, this challenging hike leads to the natural infinity pools at the top of Diyaluma Falls. The trail is steep and requires good fitness, but the panoramic views and the chance to swim in the pools make it unforgettable.</p>

<h3>3. Local Village Walks</h3>

<p><strong>Difficulty:</strong> Easy<br>
<strong>Duration:</strong> 2-3 hours<br>
<strong>Distance:</strong> 3-5 km</p>

<p>Explore the countryside on gentle walks through tea plantations, passing by local villages and farms. These walks offer cultural insights and are perfect for families with children.</p>

<h3>4. Mountain Viewpoint Hikes</h3>

<p>Several shorter trails lead to viewpoints offering spectacular panoramic views of the surrounding valleys, tea plantations, and mountain ranges. These are great for sunrise or sunset hikes.</p>

<h2>Adventure Activities</h2>

<h3>Waterfall Swimming</h3>

<p>Many of Wellawaya\'s waterfalls have natural pools perfect for swimming. Ravana Falls and Diyaluma Falls are particularly popular for this activity. Always be cautious and check local conditions.</p>

<h3>Photography Tours</h3>

<p>The stunning landscapes, waterfalls, and cultural sites make Wellawaya a photographer\'s dream. Join a guided photography tour or explore on your own to capture the region\'s beauty.</p>

<h3>Bird Watching</h3>

<p>The forests around Wellawaya are home to numerous bird species. Early morning bird watching walks are a peaceful way to experience the region\'s wildlife.</p>

<h2>Essential Hiking Tips</h2>

<ul>
<li><strong>Wear appropriate footwear:</strong> Sturdy hiking boots or shoes with good grip</li>
<li><strong>Dress in layers:</strong> Weather can change quickly in the mountains</li>
<li><strong>Carry water:</strong> Stay hydrated, especially during longer hikes</li>
<li><strong>Pack snacks:</strong> Energy bars, fruits, and nuts for longer trails</li>
<li><strong>Use sunscreen:</strong> Higher elevation means stronger UV rays</li>
<li><strong>Start early:</strong> Begin hikes early to avoid afternoon heat and crowds</li>
<li><strong>Inform someone:</strong> Let your accommodation know your hiking plans</li>
<li><strong>Respect nature:</strong> Leave no trace, stay on marked trails</li>
</ul>

<h2>Hiring a Guide</h2>

<p>While some trails are well-marked, hiring a local guide is recommended for:</p>

<ul>
<li>Safety and navigation on challenging trails</li>
<li>Cultural insights and local knowledge</li>
<li>Access to less-known scenic spots</li>
<li>Supporting the local economy</li>
</ul>

<p>Wellawaya\'s hiking trails and adventure activities offer incredible opportunities to connect with nature, challenge yourself, and create lasting memories. Whether you prefer gentle walks or challenging treks, you\'ll find something that suits your adventure style.</p>',
                'featured_image' => 'https://images.unsplash.com/photo-1544735716-392fe2489ffa?w=1200&h=800&fit=crop',
                'is_published' => true,
                'published_at' => now()->subDay(),
            ],
            [
                'title' => 'Cultural Heritage: Temples and Traditions of Wellawaya',
                'excerpt' => 'Explore the rich cultural heritage of Wellawaya through its ancient temples, traditional festivals, and the warm hospitality of local communities.',
                'content' => '<p>Wellawaya is not just about natural beauty; it\'s also a place where ancient traditions and cultural heritage are preserved and celebrated. From historic Buddhist temples to traditional festivals, the region offers rich cultural experiences for visitors.</p>

<h2>Ancient Buddhist Temples</h2>

<h3>1. Local Village Temples</h3>

<p>The region is dotted with beautiful Buddhist temples, many dating back centuries. These temples are not just places of worship but also centers of community life. Visitors are welcome to explore, but remember to dress modestly and remove shoes before entering.</p>

<h3>2. Temple Architecture</h3>

<p>Wellawaya\'s temples showcase traditional Sinhalese architecture with intricate carvings, colorful murals depicting Buddhist stories, and beautifully maintained stupas. The peaceful atmosphere and serene surroundings make these temples perfect for quiet contemplation.</p>

<h2>Traditional Festivals and Celebrations</h2>

<h3>Poson Poya</h3>

<p>This important Buddhist festival commemorates the introduction of Buddhism to Sri Lanka. Temples are beautifully decorated with colorful lanterns, and devotees participate in religious ceremonies and alms-giving.</p>

<h3>Esala Perahera</h3>

<p>While the grand Kandy Esala Perahera is famous, smaller versions of this traditional procession can be witnessed in local temples, featuring traditional dancers, drummers, and decorated elephants.</p>

<h3>Poya Days</h3>

<p>Every full moon (Poya) is a public holiday in Sri Lanka and holds special religious significance. On these days, you\'ll see many locals visiting temples, and the atmosphere is particularly peaceful and spiritual.</p>

<h2>Traditional Crafts and Arts</h2>

<p>Wellawaya and surrounding areas are known for traditional handicrafts:</p>

<ul>
<li><strong>Wood Carving:</strong> Beautiful wooden items carved by local artisans</li>
<li><strong>Handwoven Textiles:</strong> Traditional fabrics and baskets</li>
<li><strong>Pottery:</strong> Clay items made using traditional methods</li>
<li><strong>Beekeeping:</strong> Local honey production using traditional techniques</li>
</ul>

<h2>Local Customs and Etiquette</h2>

<p>Understanding and respecting local customs enhances your cultural experience:</p>

<ul>
<li><strong>Greetings:</strong> Traditional greeting involves placing hands together and saying "Ayubowan" (may you live long)</li>
<li><strong>Temple Visits:</strong> Remove shoes, cover shoulders and knees, and avoid pointing your feet toward Buddha statues</li>
<li><strong>Photography:</strong> Always ask permission before photographing people, especially during religious ceremonies</li>
<li><strong>Gift Giving:</strong> If visiting a local home, bringing a small gift is appreciated</li>
</ul>

<h2>Experiencing Local Hospitality</h2>

<p>One of the highlights of visiting Wellawaya is experiencing the warm hospitality of local people. Many guesthouses and hotels offer opportunities to:</p>

<ul>
<li>Participate in traditional cooking classes</li>
<li>Visit local families and homes</li>
<li>Learn about daily life and customs</li>
<li>Share meals with locals</li>
</ul>

<h2>Preserving Cultural Heritage</h2>

<p>As visitors, we play a role in preserving Wellawaya\'s cultural heritage:</p>

<ul>
<li>Respect religious sites and local customs</li>
<li>Support local artisans by purchasing authentic handicrafts</li>
<li>Engage respectfully with local communities</li>
<li>Learn about the history and significance of cultural sites</li>
</ul>

<p>Exploring Wellawaya\'s cultural heritage offers a deeper understanding of Sri Lankan traditions and creates meaningful connections with the local community. Take time to visit temples, participate in local activities, and immerse yourself in the rich cultural tapestry of this beautiful region.</p>',
                'featured_image' => 'https://images.unsplash.com/photo-1528164344705-47542687000d?w=1200&h=800&fit=crop',
                'is_published' => true,
                'published_at' => now(),
            ],
            [
                'title' => 'Planning Your Perfect Wellawaya Itinerary: A 3-Day Guide',
                'excerpt' => 'Make the most of your visit to Wellawaya with our comprehensive 3-day itinerary covering must-see attractions, activities, and local experiences.',
                'content' => '<p>Planning a trip to Wellawaya? Here\'s a carefully crafted 3-day itinerary that will help you experience the best this beautiful region has to offer - from natural wonders to cultural experiences.</p>

<h2>Day 1: Waterfalls and Natural Beauty</h2>

<h3>Morning (8:00 AM - 12:00 PM)</h3>

<p><strong>Bambarakanda Falls Visit</strong><br>
Start your day early with a visit to Bambarakanda Falls, the highest waterfall in Sri Lanka. The morning light creates perfect conditions for photography, and you\'ll avoid the afternoon crowds. Allow 3-4 hours for the hike and time to enjoy the falls.</p>

<h3>Afternoon (12:30 PM - 4:00 PM)</h3>

<p><strong>Lunch in Local Restaurant</strong><br>
Enjoy a traditional Sri Lankan rice and curry lunch at a local restaurant. Experience authentic flavors and support the local community.</p>

<p><strong>Ravana Falls</strong><br>
After lunch, visit Ravana Falls - easily accessible and perfect for a refreshing dip. The waterfall has historical significance and is surrounded by beautiful scenery.</p>

<h3>Evening (4:30 PM onwards)</h3>

<p><strong>Relax and Explore</strong><br>
Return to your accommodation, relax, or take a stroll through the town. Enjoy dinner at a local restaurant and prepare for tomorrow\'s adventures.</p>

<h2>Day 2: Hiking and Adventure</h2>

<h3>Morning (7:00 AM - 12:00 PM)</h3>

<p><strong>Diyaluma Falls Trek</strong><br>
Early start for the challenging but rewarding trek to Diyaluma Falls\' upper pools. This 4-5 hour hike takes you through beautiful landscapes and rewards you with natural infinity pools at the top. Pack water, snacks, and wear appropriate hiking gear.</p>

<h3>Afternoon (1:00 PM - 5:00 PM)</h3>

<p><strong>Rest and Lunch</strong><br>
After the hike, return to your accommodation for rest and lunch. You\'ll appreciate the downtime after the challenging morning trek.</p>

<p><strong>Local Village Walk</strong><br>
In the late afternoon, take a gentle walk through tea plantations and local villages. This is a great opportunity to interact with locals and learn about their way of life.</p>

<h3>Evening</h3>

<p><strong>Cultural Dinner</strong><br>
Enjoy a traditional dinner experience, possibly with a local family or at a restaurant specializing in local cuisine. Learn about traditional cooking methods and ingredients.</p>

<h2>Day 3: Culture and Relaxation</h2>

<h3>Morning (8:00 AM - 12:00 PM)</h3>

<p><strong>Temple Visit</strong><br>
Visit a local Buddhist temple to experience the spiritual side of Wellawaya. Take time to appreciate the architecture, artwork, and peaceful atmosphere. Remember to dress modestly and follow temple etiquette.</p>

<p><strong>Handicraft Shopping</strong><br>
Explore local shops for traditional handicrafts - wood carvings, handwoven textiles, and other souvenirs that support local artisans.</p>

<h3>Afternoon (12:30 PM - 4:00 PM)</h3>

<p><strong>Light Activity or Relaxation</strong><br>
Depending on your energy levels, choose from:
<ul>
<li>Another waterfall visit (Dunhinda Falls if you haven\'t been)</li>
<li>A tea plantation tour</li>
<li>Photography tour of scenic viewpoints</li>
<li>Relaxation time at your accommodation</li>
</ul>
</p>

<h3>Evening</h3>

<p><strong>Sunset Viewing</strong><br>
Find a scenic viewpoint for sunset - the mountain views from Wellawaya are spectacular. This is a perfect way to conclude your visit.</p>

<h2>Alternative Activities (Depending on Time)</h2>

<ul>
<li><strong>Bird Watching:</strong> Early morning bird watching tours</li>
<li><strong>Photography Tours:</strong> Guided tours focusing on landscape and cultural photography</li>
<li><strong>Cooking Classes:</strong> Learn to prepare traditional Sri Lankan dishes</li>
<li><strong>Tea Plantation Visits:</strong> Learn about tea production and tasting</li>
</ul>

<h2>Travel Tips</h2>

<ul>
<li><strong>Best Season:</strong> December to April for dry weather, May to September for waterfall viewing</li>
<li><strong>Transportation:</strong> Hire a tuk-tuk or private vehicle for convenience</li>
<li><strong>Accommodation:</strong> Book in advance, especially during peak season</li>
<li><strong>Packing:</strong> Comfortable hiking gear, rain protection, sunscreen, insect repellent</li>
<li><strong>Stay Hydrated:</strong> Carry water on all excursions</li>
</ul>

<h2>Budget Considerations</h2>

<p>Wellawaya offers options for different budgets:</p>

<ul>
<li><strong>Budget:</strong> Local guesthouses, public transport, local restaurants</li>
<li><strong>Mid-range:</strong> Comfortable hotels, tuk-tuk hire, mix of local and tourist restaurants</li>
<li><strong>Luxury:</strong> Boutique hotels, private guides, curated experiences</li>
</ul>

<p>This itinerary can be adjusted based on your interests, fitness level, and available time. Whether you\'re seeking adventure, culture, or relaxation, Wellawaya has something special for every traveler!</p>',
                'featured_image' => 'https://images.unsplash.com/photo-1469854523086-cc02fe5d8800?w=1200&h=800&fit=crop',
                'is_published' => true,
                'published_at' => now()->subDays(7),
            ],
        ];

        foreach ($blogs as $blogData) {
            // Generate slug if not already unique
            $slug = Str::slug($blogData['title']);
            $count = Blog::where('slug', $slug)->count();
            if ($count > 0) {
                $slug = $slug . '-' . ($count + 1);
            }

            Blog::firstOrCreate(
                ['slug' => $slug],
                array_merge($blogData, [
                    'user_id' => $adminUser->id,
                    'slug' => $slug,
                ])
            );
        }

        $this->command->info('Successfully seeded ' . count($blogs) . ' blog posts about Wellawaya!');
    }
}
