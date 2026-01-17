<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>About Us - Explore Wellawaya</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        :root {
            --primary-color: #2d5016;
            --secondary-color: #6b8e23;
            --accent-color: #ffd700;
            --text-dark: #2c3e50;
            --text-light: #7f8c8d;
            --white: #ffffff;
            --light-bg: #f8f9fa;
            --border-color: #e9ecef;
        }
        
        body {
            font-family: 'Nunito', sans-serif;
            color: var(--text-dark);
            line-height: 1.8;
            background: var(--light-bg);
        }
        
        .main-content {
            margin-top: 80px;
            padding: 3rem 0;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
        }
        
        .page-header {
            text-align: center;
            margin-bottom: 4rem;
            padding: 3rem 0;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: var(--white);
            border-radius: 15px;
            margin-bottom: 3rem;
        }
        
        .page-header h1 {
            font-size: 3.5rem;
            margin-bottom: 1rem;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }
        
        .page-header p {
            font-size: 1.25rem;
            opacity: 0.95;
        }
        
        .content-section {
            background: var(--white);
            border-radius: 15px;
            padding: 3rem;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            margin-bottom: 3rem;
        }
        
        .content-section h2 {
            font-size: 2.5rem;
            color: var(--primary-color);
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        
        .content-section h2 i {
            color: var(--secondary-color);
        }
        
        .content-section p {
            color: var(--text-dark);
            margin-bottom: 1.5rem;
            font-size: 1.1rem;
            line-height: 1.8;
        }
        
        .content-section ul {
            margin-left: 2rem;
            margin-bottom: 1.5rem;
        }
        
        .content-section li {
            color: var(--text-dark);
            margin-bottom: 0.75rem;
            font-size: 1.05rem;
        }
        
        .image-section {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 2rem;
            margin: 3rem 0;
            align-items: center;
        }
        
        .image-wrapper {
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        }
        
        .image-wrapper img {
            width: 100%;
            height: 400px;
            object-fit: cover;
            display: block;
        }
        
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 2rem;
            margin: 3rem 0;
        }
        
        .stat-card {
            text-align: center;
            padding: 2rem;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            border-radius: 15px;
            color: var(--white);
        }
        
        .stat-card i {
            font-size: 3rem;
            margin-bottom: 1rem;
            color: var(--accent-color);
        }
        
        .stat-card h3 {
            font-size: 2.5rem;
            margin-bottom: 0.5rem;
        }
        
        .stat-card p {
            font-size: 1.1rem;
            opacity: 0.9;
        }
        
        .values-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 2rem;
            margin: 3rem 0;
        }
        
        .value-card {
            background: var(--white);
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: all 0.3s ease;
        }
        
        .value-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        }
        
        .value-icon {
            width: 80px;
            height: 80px;
            margin: 0 auto 1.5rem;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            color: var(--white);
        }
        
        .value-card h3 {
            font-size: 1.5rem;
            color: var(--primary-color);
            margin-bottom: 1rem;
        }
        
        .value-card p {
            color: var(--text-light);
            line-height: 1.7;
        }
        
        .mission-vision {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 2rem;
            margin: 3rem 0;
        }
        
        .mission-card,
        .vision-card {
            background: var(--white);
            padding: 2.5rem;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        }
        
        .mission-card h3,
        .vision-card h3 {
            font-size: 2rem;
            color: var(--primary-color);
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }
        
        .mission-card h3 i,
        .vision-card h3 i {
            color: var(--secondary-color);
        }
        
        .mission-card p,
        .vision-card p {
            color: var(--text-dark);
            font-size: 1.1rem;
            line-height: 1.8;
        }
        
        .cta-section {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: var(--white);
            padding: 3rem;
            border-radius: 15px;
            text-align: center;
            margin-top: 3rem;
        }
        
        .cta-section h2 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            color: var(--white);
        }
        
        .cta-section p {
            font-size: 1.2rem;
            margin-bottom: 2rem;
            opacity: 0.95;
        }
        
        .btn {
            padding: 1rem 2.5rem;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            display: inline-block;
        }
        
        .btn-white {
            background: var(--white);
            color: var(--primary-color);
        }
        
        .btn-white:hover {
            background: var(--accent-color);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }
        
        footer {
            background: var(--text-dark);
            color: var(--white);
            padding: 3rem 0 1rem;
            margin-top: 4rem;
        }
        
        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            margin-bottom: 2rem;
        }
        
        .footer-section h3 {
            margin-bottom: 1rem;
            color: var(--accent-color);
        }
        
        .footer-section ul {
            list-style: none;
        }
        
        .footer-section ul li {
            margin-bottom: 0.5rem;
        }
        
        .footer-section a {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            transition: color 0.3s ease;
        }
        
        .footer-section a:hover {
            color: var(--accent-color);
        }
        
        .footer-bottom {
            text-align: center;
            padding-top: 2rem;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            color: rgba(255, 255, 255, 0.6);
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            /* Main Content */
            .main-content {
                padding: 2rem 0;
            }

            .container {
                padding: 0 1.5rem;
            }

            /* Page Header */
            .page-header {
                padding: 2rem 1.5rem;
                margin-bottom: 2rem;
                border-radius: 10px;
            }

            .page-header h1 {
                font-size: 1.75rem;
                margin-bottom: 0.75rem;
            }

            .page-header p {
                font-size: 1rem;
            }

            /* Content Section */
            .content-section {
                padding: 1.5rem;
                margin-bottom: 2rem;
                border-radius: 10px;
            }

            .content-section h2 {
                font-size: 1.75rem;
                margin-bottom: 1.25rem;
                flex-direction: column;
                align-items: flex-start;
                gap: 0.5rem;
            }

            .content-section h2 i {
                font-size: 1.5rem;
            }

            .content-section p {
                font-size: 1rem;
                margin-bottom: 1.25rem;
                line-height: 1.7;
            }

            .content-section ul {
                margin-left: 1.5rem;
                margin-bottom: 1.25rem;
            }

            .content-section li {
                font-size: 0.95rem;
                margin-bottom: 0.625rem;
            }

            /* Image Section */
            .image-section {
                grid-template-columns: 1fr;
                gap: 1.5rem;
                margin: 2rem 0;
            }

            .image-wrapper img {
                height: 250px;
            }

            /* Mission & Vision */
            .mission-vision {
                grid-template-columns: 1fr;
                gap: 1.5rem;
                margin: 2rem 0;
            }

            .mission-card,
            .vision-card {
                padding: 1.5rem;
                border-radius: 10px;
            }

            .mission-card h3,
            .vision-card h3 {
                font-size: 1.5rem;
                margin-bottom: 1rem;
                flex-direction: column;
                align-items: flex-start;
                gap: 0.5rem;
            }

            .mission-card h3 i,
            .vision-card h3 i {
                font-size: 1.25rem;
            }

            .mission-card p,
            .vision-card p {
                font-size: 1rem;
                line-height: 1.7;
            }

            /* Stats Grid */
            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 1rem;
                margin: 2rem 0;
            }

            .stat-card {
                padding: 1.5rem;
                border-radius: 10px;
            }

            .stat-card i {
                font-size: 2.5rem;
                margin-bottom: 0.75rem;
            }

            .stat-card h3 {
                font-size: 2rem;
                margin-bottom: 0.4rem;
            }

            .stat-card p {
                font-size: 1rem;
            }

            /* Values Grid */
            .values-grid {
                grid-template-columns: 1fr;
                gap: 1.5rem;
                margin: 2rem 0;
            }

            .value-card {
                padding: 1.5rem;
                border-radius: 10px;
            }

            .value-icon {
                width: 70px;
                height: 70px;
                font-size: 1.75rem;
                margin-bottom: 1.25rem;
            }

            .value-card h3 {
                font-size: 1.25rem;
                margin-bottom: 0.75rem;
            }

            .value-card p {
                font-size: 0.95rem;
            }

            /* CTA Section */
            .cta-section {
                padding: 2rem 1.5rem;
                border-radius: 10px;
                margin-top: 2rem;
            }

            .cta-section h2 {
                font-size: 1.75rem;
                margin-bottom: 0.75rem;
            }

            .cta-section p {
                font-size: 1rem;
                margin-bottom: 1.5rem;
            }

            .btn {
                padding: 0.875rem 2rem;
                font-size: 1rem;
            }

            /* Footer */
            .footer-content {
                grid-template-columns: 1fr;
                gap: 2rem;
            }

            .footer-section {
                text-align: center;
            }

            .footer-section h3 {
                font-size: 1.25rem;
            }

            footer {
                margin-top: 3rem;
                padding: 2rem 0 1rem;
            }
        }

        /* Extra Small Devices */
        @media (max-width: 480px) {
            .container {
                padding: 0 1rem;
            }

            .main-content {
                padding: 1.5rem 0;
            }

            .page-header {
                padding: 1.5rem 1rem;
            }

            .page-header h1 {
                font-size: 1.5rem;
            }

            .page-header p {
                font-size: 0.95rem;
            }

            .content-section {
                padding: 1.25rem;
            }

            .content-section h2 {
                font-size: 1.5rem;
            }

            .content-section p {
                font-size: 0.95rem;
            }

            .content-section li {
                font-size: 0.9rem;
            }

            .image-wrapper img {
                height: 200px;
            }

            .mission-card,
            .vision-card {
                padding: 1.25rem;
            }

            .mission-card h3,
            .vision-card h3 {
                font-size: 1.25rem;
            }

            .mission-card p,
            .vision-card p {
                font-size: 0.95rem;
            }

            .stats-grid {
                grid-template-columns: 1fr;
                gap: 1rem;
            }

            .stat-card {
                padding: 1.25rem;
            }

            .stat-card i {
                font-size: 2rem;
            }

            .stat-card h3 {
                font-size: 1.75rem;
            }

            .stat-card p {
                font-size: 0.9rem;
            }

            .value-card {
                padding: 1.25rem;
            }

            .value-icon {
                width: 60px;
                height: 60px;
                font-size: 1.5rem;
            }

            .value-card h3 {
                font-size: 1.1rem;
            }

            .value-card p {
                font-size: 0.9rem;
            }

            .cta-section {
                padding: 1.5rem 1rem;
            }

            .cta-section h2 {
                font-size: 1.5rem;
            }

            .cta-section p {
                font-size: 0.95rem;
            }

            .btn {
                padding: 0.75rem 1.5rem;
                font-size: 0.95rem;
            }
        }
    </style>
</head>
<body>
    @include('partials.header')

    <main class="main-content">
        <div class="container">
            <div class="page-header">
                <h1><i class="fas fa-info-circle"></i> About Explore Wellawaya</h1>
                <p>Discover the natural beauty and rich culture of Wellawaya, Sri Lanka</p>
            </div>

            <!-- Introduction Section -->
            <div class="content-section">
                <h2><i class="fas fa-mountain"></i> Welcome to Wellawaya</h2>
                <p>
                    Wellawaya is a hidden gem nestled in the heart of the Uva Province, Sri Lanka. This charming town offers visitors a perfect blend of natural beauty, cultural richness, and authentic experiences. Surrounded by rolling hills, cascading waterfalls, and lush tea plantations, Wellawaya is a destination that captivates the soul and inspires the mind.
                </p>
                <p>
                    Whether you're seeking tranquility, adventure, or cultural immersion, Wellawaya has something special for every traveler. From the majestic Bambarakanda Falls - the highest waterfall in Sri Lanka - to the serene highlands and ancient temples, every corner of this region tells a unique story waiting to be discovered.
                </p>
            </div>

            <!-- Mission & Vision -->
            <div class="mission-vision">
                <div class="mission-card">
                    <h3><i class="fas fa-bullseye"></i> Our Mission</h3>
                    <p>
                        To promote and showcase the natural beauty, cultural heritage, and tourism potential of Wellawaya while supporting local businesses and communities. We aim to create a platform that connects travelers with authentic experiences and helps preserve the unique character of this beautiful region.
                    </p>
                </div>
                <div class="vision-card">
                    <h3><i class="fas fa-eye"></i> Our Vision</h3>
                    <p>
                        To become the leading digital platform for discovering Wellawaya, fostering sustainable tourism that benefits local communities, and preserving the natural and cultural heritage of this remarkable region for future generations to enjoy.
                    </p>
                </div>
            </div>

            <!-- What We Offer -->
            <div class="content-section">
                <h2><i class="fas fa-star"></i> What We Offer</h2>
                <p>Explore Wellawaya provides comprehensive information and services to help you make the most of your visit:</p>
                <ul>
                    <li><strong>Destination Guides:</strong> Detailed information about the most beautiful and popular places in Wellawaya, including waterfalls, mountains, temples, and cultural sites.</li>
                    <li><strong>Business Directory:</strong> Connect with local hotels, restaurants, guides, travel agencies, and other service providers who can enhance your experience.</li>
                    <li><strong>Travel Blog:</strong> Read stories, tips, and insights from travelers and locals about exploring Wellawaya.</li>
                    <li><strong>Business Registration:</strong> Local businesses can register their services to reach more visitors and grow their operations.</li>
                </ul>
            </div>

            <!-- Key Features -->
            <div class="content-section">
                <h2><i class="fas fa-heart"></i> Why Choose Wellawaya</h2>
                <div class="values-grid">
                    <div class="value-card">
                        <div class="value-icon">
                            <i class="fas fa-mountain"></i>
                        </div>
                        <h3>Natural Beauty</h3>
                        <p>Experience stunning landscapes, pristine waterfalls, and breathtaking mountain vistas that will leave you in awe.</p>
                    </div>
                    <div class="value-card">
                        <div class="value-icon">
                            <i class="fas fa-theater-masks"></i>
                        </div>
                        <h3>Rich Culture</h3>
                        <p>Immerse yourself in authentic traditions, visit ancient temples, and connect with the warm and welcoming local community.</p>
                    </div>
                    <div class="value-card">
                        <div class="value-icon">
                            <i class="fas fa-hiking"></i>
                        </div>
                        <h3>Adventure</h3>
                        <p>Embark on exciting hiking trails, explore hidden gems, and create unforgettable memories through various outdoor activities.</p>
                    </div>
                    <div class="value-card">
                        <div class="value-icon">
                            <i class="fas fa-leaf"></i>
                        </div>
                        <h3>Sustainable Tourism</h3>
                        <p>Support eco-friendly practices and local communities while enjoying responsible and meaningful travel experiences.</p>
                    </div>
                    <div class="value-card">
                        <div class="value-icon">
                            <i class="fas fa-utensils"></i>
                        </div>
                        <h3>Local Cuisine</h3>
                        <p>Savor authentic Sri Lankan flavors and traditional dishes prepared with fresh, local ingredients.</p>
                    </div>
                    <div class="value-card">
                        <div class="value-icon">
                            <i class="fas fa-camera"></i>
                        </div>
                        <h3>Photography</h3>
                        <p>Capture stunning moments at scenic locations that are perfect for photography enthusiasts and social media.</p>
                    </div>
                </div>
            </div>

            <!-- Statistics -->
            <div class="stats-grid">
                <div class="stat-card">
                    <i class="fas fa-map-marked-alt"></i>
                    <h3>12+</h3>
                    <p>Featured Destinations</p>
                </div>
                <div class="stat-card">
                    <i class="fas fa-building"></i>
                    <h3>50+</h3>
                    <p>Local Businesses</p>
                </div>
                <div class="stat-card">
                    <i class="fas fa-users"></i>
                    <h3>1000+</h3>
                    <p>Happy Visitors</p>
                </div>
                <div class="stat-card">
                    <i class="fas fa-star"></i>
                    <h3>4.8</h3>
                    <p>Average Rating</p>
                </div>
            </div>

            <!-- Contact CTA -->
            <div class="cta-section">
                <h2>Ready to Explore Wellawaya?</h2>
                <p>Start planning your unforgettable journey today and discover the magic of this beautiful region.</p>
                <a href="{{ route('destinations.index') }}" class="btn btn-white">
                    <i class="fas fa-map"></i> Explore Destinations
                </a>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h3>Explore Wellawaya</h3>
                    <p>Your gateway to discovering the natural beauty and rich culture of Wellawaya, Sri Lanka.</p>
                </div>
                <div class="footer-section">
                    <h3>Quick Links</h3>
                    <ul>
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li><a href="{{ route('about.index') }}">About Us</a></li>
                        <li><a href="{{ route('destinations.index') }}">Destinations</a></li>
                        <li><a href="{{ route('blog.index') }}">Blog</a></li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h3>Contact Info</h3>
                    <p>Wellawaya, Uva Province, Sri Lanka</p>
                    <p>Email: info@explorewellawaya.com</p>
                    <p>Phone: +94 XX XXX XXXX</p>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; {{ date('Y') }} Explore Wellawaya. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html>

