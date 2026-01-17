<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Destinations - Explore Wellawaya</title>

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
            line-height: 1.6;
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
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        .page-header {
            text-align: center;
            margin-bottom: 3rem;
        }

        .page-header h1 {
            font-size: 3rem;
            color: var(--primary-color);
            margin-bottom: 1rem;
        }

        .page-header p {
            font-size: 1.1rem;
            color: var(--text-light);
        }

        /* Filters */
        .filters {
            display: flex;
            gap: 1rem;
            margin-bottom: 2rem;
            flex-wrap: wrap;
            justify-content: center;
        }

        .filter-btn {
            padding: 0.5rem 1.5rem;
            border: 2px solid var(--border-color);
            background: white;
            border-radius: 25px;
            text-decoration: none;
            color: var(--text-dark);
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .filter-btn:hover,
        .filter-btn.active {
            background: var(--primary-color);
            color: white;
            border-color: var(--primary-color);
        }

        /* Destinations Grid */
        .destinations-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 2rem;
            margin-bottom: 3rem;
        }

        .destination-card {
            background: var(--white);
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            cursor: pointer;
            text-decoration: none;
            color: inherit;
            display: block;
        }

        .destination-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        .destination-card-image {
            width: 100%;
            height: 250px;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--white);
            font-size: 3rem;
            position: relative;
            overflow: hidden;
        }

        .destination-card-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .destination-card-image i {
            position: absolute;
            z-index: 1;
        }

        .destination-card-badge {
            position: absolute;
            top: 1rem;
            right: 1rem;
            background: var(--accent-color);
            color: var(--primary-color);
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-size: 0.875rem;
            font-weight: 600;
        }

        .destination-card-content {
            padding: 1.5rem;
        }

        .destination-card-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary-color);
            margin-bottom: 0.75rem;
        }

        .destination-card-location {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--text-light);
            margin-bottom: 1rem;
            font-size: 0.9rem;
        }

        .destination-card-description {
            color: var(--text-light);
            margin-bottom: 1rem;
            line-height: 1.6;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .destination-card-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding-top: 1rem;
            border-top: 1px solid #e9ecef;
        }

        .read-more {
            color: var(--secondary-color);
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .read-more:hover {
            color: var(--primary-color);
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 4rem 2rem;
            color: var(--text-light);
        }

        .empty-state i {
            font-size: 4rem;
            margin-bottom: 1rem;
            color: var(--text-light);
        }

        .empty-state h2 {
            font-size: 1.5rem;
            margin-bottom: 0.5rem;
            color: var(--text-dark);
        }

        /* Pagination */
        .pagination {
            display: flex;
            justify-content: center;
            gap: 0.5rem;
            margin-top: 3rem;
        }

        .pagination a,
        .pagination span {
            padding: 0.5rem 1rem;
            border-radius: 5px;
            text-decoration: none;
            color: var(--text-dark);
            background: var(--white);
            border: 1px solid #e9ecef;
            transition: all 0.3s ease;
        }

        .pagination a:hover {
            background: var(--secondary-color);
            color: var(--white);
            border-color: var(--secondary-color);
        }

        .pagination .active span {
            background: var(--primary-color);
            color: var(--white);
            border-color: var(--primary-color);
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
            .destinations-grid {
                grid-template-columns: 1fr;
            }

            .page-header h1 {
                font-size: 2rem;
            }

            .filters {
                justify-content: flex-start;
            }
        }
    </style>
</head>
<body>
    @include('partials.header')

    <!-- Main Content -->
    <main class="main-content">
        <div class="container">
            <div class="page-header">
                <h1><i class="fas fa-map-marked-alt"></i> Explore Destinations</h1>
                <p>Discover the most beautiful places in Wellawaya</p>
            </div>

            @if($categories->count() > 0)
                <div class="filters">
                    <a href="{{ route('destinations.index') }}" class="filter-btn {{ !request('category') ? 'active' : '' }}">
                        All
                    </a>
                    @foreach($categories as $category)
                        <a href="{{ route('destinations.index', ['category' => $category]) }}" 
                           class="filter-btn {{ request('category') == $category ? 'active' : '' }}">
                            {{ ucfirst($category) }}
                        </a>
                    @endforeach
                </div>
            @endif

            @if($destinations->count() > 0)
                <div class="destinations-grid">
                    @foreach($destinations as $destination)
                        <a href="{{ route('destinations.show', $destination->slug) }}" class="destination-card">
                            <div class="destination-card-image">
                                @if($destination->featured_image)
                                    <img src="{{ $destination->featured_image }}" alt="{{ $destination->name }}">
                                @else
                                    <i class="fas fa-image"></i>
                                @endif
                                <span class="destination-card-badge">{{ ucfirst($destination->category) }}</span>
                            </div>
                            <div class="destination-card-content">
                                <h2 class="destination-card-title">{{ $destination->name }}</h2>
                                <div class="destination-card-location">
                                    <i class="fas fa-map-marker-alt"></i>
                                    <span>{{ $destination->location }}</span>
                                </div>
                                <p class="destination-card-description">{{ Str::limit(strip_tags($destination->description), 150) }}</p>
                                <div class="destination-card-footer">
                                    <span class="read-more">Explore <i class="fas fa-arrow-right"></i></span>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>

                @if($destinations->hasPages())
                    <div class="pagination">
                        {{ $destinations->links() }}
                    </div>
                @endif
            @else
                <div class="empty-state">
                    <i class="fas fa-map"></i>
                    <h2>No destinations found</h2>
                    <p>Check back soon for new destinations in Wellawaya!</p>
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
</body>
</html>

