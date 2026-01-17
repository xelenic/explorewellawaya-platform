<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $destination->name }} - Explore Wellawaya</title>
    
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
        }
        
        body {
            font-family: 'Nunito', sans-serif;
            color: var(--text-dark);
            line-height: 1.8;
            background: var(--light-bg);
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
        }
        
        /* Main Content */
        .main-content {
            margin-top: 80px;
            padding: 3rem 0;
        }
        
        .container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 0 2rem;
        }
        
        .destination-header {
            text-align: center;
            margin-bottom: 3rem;
        }
        
        .destination-title {
            font-size: 3rem;
            color: var(--primary-color);
            margin-bottom: 1rem;
            line-height: 1.2;
        }
        
        .destination-meta {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 2rem;
            color: var(--text-light);
            margin-bottom: 2rem;
            flex-wrap: wrap;
        }
        
        .destination-meta span {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .category-badge {
            display: inline-block;
            padding: 0.5rem 1.5rem;
            background: var(--secondary-color);
            color: var(--white);
            border-radius: 50px;
            font-weight: 600;
            text-transform: capitalize;
        }
        
        .destination-image {
            width: 100%;
            height: 500px;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            border-radius: 15px;
            margin-bottom: 3rem;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--white);
            font-size: 4rem;
            overflow: hidden;
            position: relative;
        }
        
        .destination-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        /* Image Gallery */
        .image-gallery {
            margin-top: 2rem;
        }

        .image-gallery h3 {
            color: var(--primary-color);
            font-size: 1.5rem;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .image-gallery h3 i {
            color: var(--secondary-color);
        }

        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 1rem;
            margin-top: 1rem;
        }

        .gallery-item {
            position: relative;
            width: 100%;
            height: 200px;
            border-radius: 10px;
            overflow: hidden;
            cursor: pointer;
            transition: transform 0.3s ease;
        }

        .gallery-item:hover {
            transform: scale(1.05);
        }

        .gallery-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        /* Lightbox Modal */
        .lightbox-modal {
            display: none;
            position: fixed;
            z-index: 9999;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.9);
            overflow: auto;
        }

        .lightbox-content {
            position: relative;
            margin: auto;
            padding: 2rem;
            width: 90%;
            max-width: 1200px;
            top: 50%;
            transform: translateY(-50%);
        }

        .lightbox-image {
            width: 100%;
            height: auto;
            max-height: 80vh;
            object-fit: contain;
            border-radius: 10px;
        }

        .lightbox-close {
            position: absolute;
            top: 2rem;
            right: 2rem;
            color: var(--white);
            font-size: 2rem;
            font-weight: bold;
            cursor: pointer;
            background: rgba(0, 0, 0, 0.5);
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background 0.3s ease;
        }

        .lightbox-close:hover {
            background: rgba(0, 0, 0, 0.8);
        }

        .lightbox-nav {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: rgba(0, 0, 0, 0.5);
            color: var(--white);
            border: none;
            padding: 1rem;
            font-size: 1.5rem;
            cursor: pointer;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background 0.3s ease;
        }

        .lightbox-nav:hover {
            background: rgba(0, 0, 0, 0.8);
        }

        .lightbox-prev {
            left: 2rem;
        }

        .lightbox-next {
            right: 2rem;
        }
        
        .destination-content {
            background: var(--white);
            padding: 3rem;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            margin-bottom: 2rem;
        }
        
        .info-section {
            margin-bottom: 2.5rem;
        }
        
        .info-section:last-child {
            margin-bottom: 0;
        }
        
        .info-section h3 {
            color: var(--primary-color);
            font-size: 1.5rem;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .info-section h3 i {
            color: var(--secondary-color);
        }
        
        .info-section p {
            margin-bottom: 1rem;
            color: var(--text-dark);
            line-height: 1.8;
        }
        
        .highlights-list {
            list-style: none;
            padding: 0;
        }
        
        .highlights-list li {
            padding: 0.75rem 0;
            padding-left: 2rem;
            position: relative;
            color: var(--text-dark);
        }
        
        .highlights-list li:before {
            content: '\f00c';
            font-family: 'Font Awesome 6 Free';
            font-weight: 900;
            position: absolute;
            left: 0;
            color: var(--secondary-color);
        }
        
        .map-container {
            width: 100%;
            height: 400px;
            border-radius: 15px;
            overflow: hidden;
            margin-top: 1rem;
            background: var(--light-bg);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-light);
        }
        
        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--secondary-color);
            text-decoration: none;
            margin-bottom: 2rem;
            font-weight: 500;
        }
        
        .back-link:hover {
            color: var(--primary-color);
        }
        
        /* Related Destinations */
        .related-destinations {
            margin-top: 4rem;
        }
        
        .related-destinations h2 {
            font-size: 2rem;
            color: var(--primary-color);
            margin-bottom: 2rem;
        }
        
        .related-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 1.5rem;
        }
        
        .related-card {
            background: var(--white);
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            text-decoration: none;
            color: inherit;
            display: block;
        }
        
        .related-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }
        
        .related-card-image {
            width: 100%;
            height: 200px;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--white);
            font-size: 2rem;
        }
        
        .related-card-content {
            padding: 1.5rem;
        }
        
        .related-card-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--primary-color);
            margin-bottom: 0.5rem;
        }
        
        .related-card-location {
            color: var(--text-light);
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        /* Footer */
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
            .destination-title {
                font-size: 2rem;
            }
            
            .destination-content {
                padding: 2rem;
            }
            
            .destination-image {
                height: 300px;
            }
            
            .related-grid {
                grid-template-columns: 1fr;
            }
            
        .map-container {
            height: 300px;
        }

        .gallery-grid {
            grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
        }

        .gallery-item {
            height: 150px;
        }
    }
    </style>
</head>
<body>
    @include('partials.header')

    <!-- Main Content -->
    <main class="main-content">
        <div class="container">
            <a href="{{ route('destinations.index') }}" class="back-link">
                <i class="fas fa-arrow-left"></i> Back to Destinations
            </a>

            <div class="destination-header">
                <h1 class="destination-title">{{ $destination->name }}</h1>
                <div class="destination-meta">
                    <span class="category-badge">{{ $destination->category }}</span>
                    <span><i class="fas fa-map-marker-alt"></i> {{ $destination->location }}</span>
                </div>
            </div>

            @if($destination->featured_image)
                <div class="destination-image">
                    <img src="{{ $destination->featured_image }}" alt="{{ $destination->name }}" onclick="openLightbox(0)">
                </div>
            @else
                <div class="destination-image">
                    <i class="fas fa-mountain"></i>
                </div>
            @endif

            <div class="destination-content">
                <div class="info-section">
                    <h3><i class="fas fa-info-circle"></i> About</h3>
                    <p>{{ $destination->description }}</p>
                </div>

                @if($destination->highlights)
                    <div class="info-section">
                        <h3><i class="fas fa-star"></i> Highlights</h3>
                        <ul class="highlights-list">
                            @foreach(explode(',', $destination->highlights) as $highlight)
                                <li>{{ trim($highlight) }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if($destination->best_time_to_visit)
                    <div class="info-section">
                        <h3><i class="fas fa-calendar-alt"></i> Best Time to Visit</h3>
                        <p>{{ $destination->best_time_to_visit }}</p>
                    </div>
                @endif

                @if($destination->how_to_reach)
                    <div class="info-section">
                        <h3><i class="fas fa-route"></i> How to Reach</h3>
                        <p>{{ $destination->how_to_reach }}</p>
                    </div>
                @endif

                @if($destination->tips)
                    <div class="info-section">
                        <h3><i class="fas fa-lightbulb"></i> Travel Tips</h3>
                        <p>{{ $destination->tips }}</p>
                    </div>
                @endif

                @if($destination->latitude && $destination->longitude)
                    <div class="info-section">
                        <h3><i class="fas fa-map"></i> Location</h3>
                        <div class="map-container">
                            <iframe 
                                width="100%" 
                                height="100%" 
                                style="border:0" 
                                loading="lazy" 
                                allowfullscreen
                                referrerpolicy="no-referrer-when-downgrade"
                                src="https://www.google.com/maps/embed/v1/place?key=AIzaSyBFw0Qbyq9zTFTd-tUY6d-s6U4uY3Y&q={{ $destination->latitude }},{{ $destination->longitude }}">
                            </iframe>
                        </div>
                    </div>
                @endif

                @php
                    $allImages = [];
                    if ($destination->featured_image) {
                        $allImages[] = $destination->featured_image;
                    }
                    if ($destination->images && is_array($destination->images)) {
                        $allImages = array_merge($allImages, $destination->images);
                    }
                @endphp

                @if(count($allImages) > 1)
                    <div class="image-gallery">
                        <h3><i class="fas fa-images"></i> Photo Gallery</h3>
                        <div class="gallery-grid">
                            @foreach($allImages as $index => $image)
                                <div class="gallery-item" onclick="openLightbox({{ $index }})">
                                    <img src="{{ $image }}" alt="{{ $destination->name }} - Image {{ $index + 1 }}">
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>

            <!-- Lightbox Modal -->
            <div id="lightboxModal" class="lightbox-modal">
                <span class="lightbox-close" onclick="closeLightbox()">&times;</span>
                <button class="lightbox-nav lightbox-prev" onclick="changeImage(-1)">&#10094;</button>
                <button class="lightbox-nav lightbox-next" onclick="changeImage(1)">&#10095;</button>
                <div class="lightbox-content">
                    <img id="lightboxImage" class="lightbox-image" src="" alt="">
                </div>
            </div>

            @if($relatedDestinations->count() > 0)
                <div class="related-destinations">
                    <h2>Related Destinations</h2>
                    <div class="related-grid">
                        @foreach($relatedDestinations as $related)
                            <a href="{{ route('destinations.show', $related->slug) }}" class="related-card">
                                <div class="related-card-image">
                                    @if($related->featured_image)
                                        <img src="{{ $related->featured_image }}" alt="{{ $related->name }}" style="width: 100%; height: 100%; object-fit: cover;">
                                    @else
                                        <i class="fas fa-mountain"></i>
                                    @endif
                                </div>
                                <div class="related-card-content">
                                    <h3 class="related-card-title">{{ $related->name }}</h3>
                                    <div class="related-card-location">
                                        <i class="fas fa-map-marker-alt"></i>
                                        {{ $related->location }}
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            @endif
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
                        <li><a href="{{ route('destinations.index') }}">Destinations</a></li>
                        <li><a href="{{ route('blog.index') }}">Blog</a></li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h3>Contact Info</h3>
                    <p>Wellawaya, Uva Province, Sri Lanka</p>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; {{ date('Y') }} Explore Wellawaya. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        // Image Gallery Lightbox
        const images = [
            @if($destination->featured_image)
                '{{ $destination->featured_image }}',
            @endif
            @if($destination->images && is_array($destination->images))
                @foreach($destination->images as $image)
                    '{{ $image }}',
                @endforeach
            @endif
        ].filter(Boolean);

        let currentImageIndex = 0;

        function openLightbox(index) {
            if (images.length === 0) return;
            
            currentImageIndex = index;
            const modal = document.getElementById('lightboxModal');
            const img = document.getElementById('lightboxImage');
            
            img.src = images[currentImageIndex];
            modal.style.display = 'block';
            document.body.style.overflow = 'hidden';
        }

        function closeLightbox() {
            const modal = document.getElementById('lightboxModal');
            modal.style.display = 'none';
            document.body.style.overflow = 'auto';
        }

        function changeImage(direction) {
            currentImageIndex += direction;
            
            if (currentImageIndex < 0) {
                currentImageIndex = images.length - 1;
            } else if (currentImageIndex >= images.length) {
                currentImageIndex = 0;
            }
            
            document.getElementById('lightboxImage').src = images[currentImageIndex];
        }

        // Close lightbox when clicking outside the image
        document.getElementById('lightboxModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeLightbox();
            }
        });

        // Keyboard navigation
        document.addEventListener('keydown', function(e) {
            const modal = document.getElementById('lightboxModal');
            if (modal.style.display === 'block') {
                if (e.key === 'Escape') {
                    closeLightbox();
                } else if (e.key === 'ArrowLeft') {
                    changeImage(-1);
                } else if (e.key === 'ArrowRight') {
                    changeImage(1);
                }
            }
        });
    </script>
</body>
</html>

