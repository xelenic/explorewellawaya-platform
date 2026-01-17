<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Explore Wellawaya - Discover the Beauty of Sri Lanka</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    
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
        }
        
        body {
            font-family: 'Nunito', sans-serif;
            color: var(--text-dark);
            line-height: 1.6;
            overflow-x: hidden;
        }
        
        h1, h2, h3, h4, h5, h6 {
            font-family: 'Nunito', sans-serif;
            font-weight: 700;
        }
        
        .btn-primary {
            background: var(--primary-color);
            color: var(--white);
            padding: 0.75rem 1.5rem;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
            display: inline-block;
        }
        
        .btn-primary:hover {
            background: var(--secondary-color);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }
        
        /* Hero Section */
        .hero-section {
            margin-top: 80px;
            position: relative;
            height: 100vh;
            min-height: 600px;
        }
        
        .swiper {
            width: 100%;
            height: 100%;
        }
        
        .swiper-slide {
            position: relative;
            overflow: hidden;
        }
        
        .swiper-slide img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .hero-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to bottom, rgba(0,0,0,0.3), rgba(0,0,0,0.5));
            z-index: 1;
        }
        
        .hero-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            color: var(--white);
            z-index: 2;
            max-width: 800px;
            padding: 0 2rem;
        }
        
        .hero-content h1 {
            font-size: 3.5rem;
            margin-bottom: 1rem;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
            animation: fadeInUp 1s ease;
        }
        
        .hero-content p {
            font-size: 1.25rem;
            margin-bottom: 2rem;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.3);
            animation: fadeInUp 1s ease 0.2s both;
        }
        
        .hero-buttons {
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
            animation: fadeInUp 1s ease 0.4s both;
        }
        
        .btn-white {
            background: var(--white);
            color: var(--primary-color);
            padding: 0.75rem 2rem;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            display: inline-block;
        }
        
        .btn-white:hover {
            background: var(--accent-color);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }
        
        .btn-outline {
            background: transparent;
            color: var(--white);
            border: 2px solid var(--white);
            padding: 0.75rem 2rem;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            display: inline-block;
        }
        
        .btn-outline:hover {
            background: var(--white);
            color: var(--primary-color);
        }
        
        /* Swiper Navigation */
        .swiper-button-next,
        .swiper-button-prev {
            color: var(--white);
            background: rgba(255, 255, 255, 0.2);
            width: 50px;
            height: 50px;
            border-radius: 50%;
            backdrop-filter: blur(10px);
        }
        
        .swiper-button-next:after,
        .swiper-button-prev:after {
            font-size: 20px;
        }
        
        .swiper-pagination-bullet {
            background: var(--white);
            opacity: 0.5;
        }
        
        .swiper-pagination-bullet-active {
            opacity: 1;
            background: var(--accent-color);
        }
        
        /* Sections */
        .section {
            padding: 5rem 0;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
        }
        
        .section-header {
            text-align: center;
            margin-bottom: 3rem;
        }
        
        .section-header h2 {
            font-size: 2.5rem;
            color: var(--primary-color);
            margin-bottom: 1rem;
        }
        
        .section-header p {
            font-size: 1.1rem;
            color: var(--text-light);
            max-width: 600px;
            margin: 0 auto;
        }
        
        /* Featured Destinations */
        .destinations-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin-top: 3rem;
        }
        
        .destination-card {
            background: var(--white);
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            cursor: pointer;
        }
        
        .destination-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }
        
        .destination-card img {
            width: 100%;
            height: 250px;
            object-fit: cover;
        }
        
        .destination-card-content {
            padding: 1.5rem;
        }
        
        .destination-card h3 {
            font-size: 1.5rem;
            margin-bottom: 0.5rem;
            color: var(--primary-color);
        }
        
        .destination-card p {
            color: var(--text-light);
            margin-bottom: 1rem;
        }
        
        .destination-card a {
            color: var(--secondary-color);
            text-decoration: none;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .destination-card a:hover {
            color: var(--primary-color);
        }
        
        /* Features Section */
        .features-section {
            background: var(--light-bg);
        }
        
        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
        }
        
        .feature-item {
            text-align: center;
            padding: 2rem;
        }
        
        .feature-icon {
            font-size: 3rem;
            color: var(--secondary-color);
            margin-bottom: 1rem;
        }
        
        .feature-item h3 {
            font-size: 1.25rem;
            margin-bottom: 0.5rem;
            color: var(--primary-color);
        }
        
        .feature-item p {
            color: var(--text-light);
        }
        
        /* About Section */
        .about-section {
            background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
            position: relative;
            overflow: hidden;
        }

        .about-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('data:image/svg+xml,<svg width="100" height="100" xmlns="http://www.w3.org/2000/svg"><defs><pattern id="grid" width="100" height="100" patternUnits="userSpaceOnUse"><path d="M 100 0 L 0 0 0 100" fill="none" stroke="rgba(45,80,22,0.03)" stroke-width="1"/></pattern></defs><rect width="100" height="100" fill="url(%23grid)"/></svg>');
            opacity: 0.5;
        }

        .about-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
            align-items: center;
            position: relative;
            z-index: 1;
        }
        
        .about-image-wrapper {
            position: relative;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
            transform: perspective(1000px) rotateY(-5deg);
            transition: all 0.5s ease;
        }

        .about-image-wrapper:hover {
            transform: perspective(1000px) rotateY(0deg) scale(1.02);
            box-shadow: 0 25px 70px rgba(0, 0, 0, 0.2);
        }
        
        .about-image-wrapper img {
            width: 100%;
            height: 500px;
            object-fit: cover;
            display: block;
            transition: transform 0.5s ease;
        }

        .about-image-wrapper:hover img {
            transform: scale(1.1);
        }

        .about-image-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(45, 80, 22, 0.1) 0%, rgba(107, 142, 35, 0.1) 100%);
            opacity: 0;
            transition: opacity 0.5s ease;
        }

        .about-image-wrapper:hover .about-image-overlay {
            opacity: 1;
        }

        .about-text {
            position: relative;
        }

        .about-text h3 {
            font-size: 2rem;
            color: var(--primary-color);
            margin-bottom: 1.5rem;
            position: relative;
            line-height: 1.3;
        }

        .about-text h3::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 0;
            width: 80px;
            height: 4px;
            background: linear-gradient(90deg, var(--primary-color), var(--accent-color));
            border-radius: 2px;
        }
        
        .about-text p {
            color: var(--text-light);
            margin-bottom: 1.5rem;
            font-size: 1rem;
            line-height: 1.7;
        }

        .about-features {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1.5rem;
            margin: 2rem 0;
        }

        .about-feature {
            text-align: center;
            padding: 1.5rem;
            background: white;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
        }

        .about-feature:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.12);
        }

        .about-feature-icon {
            width: 60px;
            height: 60px;
            margin: 0 auto 1rem;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: white;
        }

        .about-feature h4 {
            font-size: 1rem;
            color: var(--text-dark);
            margin-bottom: 0.5rem;
            font-weight: 600;
        }

        .about-feature p {
            font-size: 0.9rem;
            color: var(--text-light);
            margin: 0;
        }
        
        /* CTA Section */
        .cta-section {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: var(--white);
            text-align: center;
            padding: 4rem 2rem;
            border-radius: 20px;
            margin: 3rem 0;
        }
        
        .cta-section h2 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            color: var(--white);
        }
        
        .cta-section p {
            font-size: 1.2rem;
            margin-bottom: 2rem;
            opacity: 0.9;
        }
        
        /* Footer */
        footer {
            background: var(--text-dark);
            color: var(--white);
            padding: 3rem 0 1rem;
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
        
        .social-links {
            display: flex;
            gap: 1rem;
            margin-top: 1rem;
        }
        
        .social-links a {
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }
        
        .social-links a:hover {
            background: var(--secondary-color);
            transform: translateY(-3px);
        }
        
        .footer-bottom {
            text-align: center;
            padding-top: 2rem;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            color: rgba(255, 255, 255, 0.6);
        }
        
        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .hero-content h1 {
                font-size: 2.5rem;
            }
            
            .hero-content p {
                font-size: 1rem;
            }
            
            .about-content {
                grid-template-columns: 1fr;
                gap: 2rem;
            }

            .about-image-wrapper {
                transform: perspective(1000px) rotateY(0deg);
                order: -1;
            }

            .about-text h3 {
                font-size: 1.75rem;
            }

            .about-text p {
                font-size: 0.95rem;
            }

            .about-features {
                grid-template-columns: 1fr;
                gap: 1rem;
            }
            
            .section-header h2 {
                font-size: 2rem;
            }
            
            .destinations-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    @include('partials.header')

    <!-- Hero Section -->
    <section class="hero-section" id="home">
        <div class="swiper hero-swiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img src="{{ asset('slider/slide1.jpeg') }}" alt="Discover Wellawaya">
                    <div class="hero-overlay"></div>
                    <div class="hero-content">
                        <h1>Discover Wellawaya</h1>
                        <p>Experience the natural beauty and rich culture of Sri Lanka's hidden gem</p>
                        <div class="hero-buttons">
                            <a href="#destinations" class="btn-white">Explore Now</a>
                            <a href="#about" class="btn-outline">Learn More</a>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <img src="{{ asset('slider/slide2.jpeg') }}" alt="Beautiful Landscapes">
                    <div class="hero-overlay"></div>
                    <div class="hero-content">
                        <h1>Beautiful Landscapes</h1>
                        <p>Immerse yourself in stunning vistas and serene natural surroundings</p>
                        <div class="hero-buttons">
                            <a href="#destinations" class="btn-white">View Destinations</a>
                            <a href="#about" class="btn-outline">About Us</a>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <img src="{{ asset('slider/slide3.jpeg') }}" alt="Cultural Heritage">
                    <div class="hero-overlay"></div>
                    <div class="hero-content">
                        <h1>Cultural Heritage</h1>
                        <p>Discover the rich traditions and authentic experiences of Wellawaya</p>
                        <div class="hero-buttons">
                            <a href="#destinations" class="btn-white">Start Journey</a>
                            <a href="#contact" class="btn-outline">Contact Us</a>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <img src="{{ asset('slider/slide4.jpeg') }}" alt="Adventure Awaits">
                    <div class="hero-overlay"></div>
                    <div class="hero-content">
                        <h1>Adventure Awaits</h1>
                        <p>Embark on exciting adventures and create unforgettable memories</p>
                        <div class="hero-buttons">
                            <a href="#destinations" class="btn-white">Explore Now</a>
                            <a href="#about" class="btn-outline">Learn More</a>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <img src="{{ asset('slider/slide5.jpeg') }}" alt="Explore Wellawaya">
                    <div class="hero-overlay"></div>
                    <div class="hero-content">
                        <h1>Explore Wellawaya</h1>
                        <p>Your gateway to discovering the natural beauty and rich culture of Wellawaya</p>
                        <div class="hero-buttons">
                            <a href="#destinations" class="btn-white">Start Journey</a>
                            <a href="#contact" class="btn-outline">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-pagination"></div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="section features-section">
        <div class="container">
            <div class="features-grid">
                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="fas fa-map-marked-alt"></i>
                    </div>
                    <h3>Best Destinations</h3>
                    <p>Curated selection of the most beautiful places in Wellawaya</p>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="fas fa-hotel"></i>
                    </div>
                    <h3>Comfortable Stays</h3>
                    <p>Find the perfect accommodation for your journey</p>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="fas fa-utensils"></i>
                    </div>
                    <h3>Local Cuisine</h3>
                    <p>Experience authentic flavors and traditional dishes</p>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="fas fa-camera"></i>
                    </div>
                    <h3>Photo Opportunities</h3>
                    <p>Capture memories at stunning scenic locations</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Destinations Section -->
    <section class="section" id="destinations">
        <div class="container">
            <div class="section-header">
                <h2>Featured Destinations</h2>
                <p>Explore the most beautiful and popular places in Wellawaya</p>
            </div>
            <div class="destinations-grid">
                <div class="destination-card">
                    <div style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); height: 250px;"></div>
                    <div class="destination-card-content">
                        <h3>Bambarakanda Falls</h3>
                        <p>Discover the highest waterfall in Sri Lanka, surrounded by lush greenery and breathtaking views.</p>
                        <a href="#">Explore More <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="destination-card">
                    <div style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%); height: 250px;"></div>
                    <div class="destination-card-content">
                        <h3>Uva Highlands</h3>
                        <p>Experience the cool climate and stunning mountain vistas of the Uva province highlands.</p>
                        <a href="#">Explore More <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="destination-card">
                    <div style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%); height: 250px;"></div>
                    <div class="destination-card-content">
                        <h3>Ancient Temples</h3>
                        <p>Visit historic Buddhist temples and immerse yourself in the rich cultural heritage.</p>
                        <a href="#">Explore More <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="section about-section" id="about">
        <div class="container">
            <div class="about-content">
                <div class="about-image-wrapper">
                    <img src="{{ asset('slider/slide2.jpeg') }}" alt="Wellawaya Landscape">
                    <div class="about-image-overlay"></div>
                </div>
                <div class="about-text">
                    <h3>Welcome to Explore Wellawaya</h3>
                    <p>Wellawaya is a hidden gem in Sri Lanka, offering visitors a perfect blend of natural beauty, cultural richness, and adventure. Located in the Uva Province, this charming town is surrounded by rolling hills, cascading waterfalls, and lush tea plantations.</p>
                    <p>Whether you're seeking tranquility, adventure, or cultural experiences, Wellawaya has something special for every traveler. From the majestic Bambarakanda Falls to the serene highlands, every corner of this region tells a unique story.</p>
                    
                    <div class="about-features">
                        <div class="about-feature">
                            <div class="about-feature-icon">
                                <i class="fas fa-mountain"></i>
                            </div>
                            <h4>Natural Beauty</h4>
                            <p>Stunning landscapes & waterfalls</p>
                        </div>
                        <div class="about-feature">
                            <div class="about-feature-icon">
                                <i class="fas fa-theater-masks"></i>
                            </div>
                            <h4>Rich Culture</h4>
                            <p>Authentic traditions & heritage</p>
                        </div>
                        <div class="about-feature">
                            <div class="about-feature-icon">
                                <i class="fas fa-hiking"></i>
                            </div>
                            <h4>Adventure</h4>
                            <p>Exciting activities & trails</p>
                        </div>
                    </div>

                    <p style="margin-top: 1rem;">Join us on a journey to discover the authentic beauty of Sri Lanka through the lens of Wellawaya's enchanting landscapes and warm hospitality.</p>
                    <a href="#contact" class="btn-primary" style="margin-top: 1rem;">Contact Us</a>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="section">
        <div class="container">
            <div class="cta-section">
                <h2>Ready to Explore Wellawaya?</h2>
                <p>Start planning your unforgettable journey today</p>
                <a href="#contact" class="btn-white">Get Started</a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer id="contact">
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h3>Explore Wellawaya</h3>
                    <p>Your gateway to discovering the natural beauty and rich culture of Wellawaya, Sri Lanka.</p>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                <div class="footer-section">
                    <h3>Quick Links</h3>
                    <ul>
                        <li><a href="#home">Home</a></li>
                        <li><a href="#destinations">Destinations</a></li>
                        <li><a href="{{ route('blog.index') }}">Blog</a></li>
                        <li><a href="#about">About Us</a></li>
                        <li><a href="#contact">Contact</a></li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h3>Contact Info</h3>
                    <ul>
                        <li><i class="fas fa-map-marker-alt"></i> Wellawaya, Uva Province, Sri Lanka</li>
                        <li><i class="fas fa-phone"></i> +94 XX XXX XXXX</li>
                        <li><i class="fas fa-envelope"></i> info@explorewellawaya.com</li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h3>Newsletter</h3>
                    <p>Subscribe to our newsletter for travel tips and exclusive offers.</p>
                    <form style="margin-top: 1rem;">
                        <input type="email" placeholder="Your email" style="width: 100%; padding: 0.75rem; border-radius: 5px; border: none; margin-bottom: 0.5rem;">
                        <button type="submit" class="btn-primary" style="width: 100%;">Subscribe</button>
                    </form>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; {{ date('Y') }} Explore Wellawaya. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    
    <script>
        // Initialize Swiper
        const swiper = new Swiper('.hero-swiper', {
            loop: true,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            effect: 'fade',
            fadeEffect: {
                crossFade: true
            },
        });

    </script>
</body>
</html>
