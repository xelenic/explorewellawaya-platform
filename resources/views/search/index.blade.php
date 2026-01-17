<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Search Results{{ $query ? ' - ' . $query : '' }} - Explore Wellawaya</title>
    
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
        
        .main-content {
            margin-top: 80px;
            padding: 3rem 0;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
        }
        
        .search-header {
            text-align: center;
            margin-bottom: 3rem;
        }
        
        .search-header h1 {
            font-size: 2.5rem;
            color: var(--primary-color);
            margin-bottom: 1rem;
        }
        
        .search-query {
            color: var(--secondary-color);
            font-weight: 600;
        }
        
        .results-count {
            color: var(--text-light);
            font-size: 1.1rem;
        }
        
        .results-section {
            margin-bottom: 3rem;
        }
        
        .section-title {
            font-size: 1.75rem;
            color: var(--primary-color);
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .results-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 2rem;
        }
        
        .result-card {
            background: var(--white);
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            text-decoration: none;
            color: inherit;
            display: block;
        }
        
        .result-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }
        
        .result-card-image {
            width: 100%;
            height: 200px;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--white);
            font-size: 2rem;
        }
        
        .result-card-content {
            padding: 1.5rem;
        }
        
        .result-card-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--primary-color);
            margin-bottom: 0.5rem;
        }
        
        .result-card-meta {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 0.75rem;
            font-size: 0.9rem;
            color: var(--text-light);
        }
        
        .result-card-excerpt {
            color: var(--text-dark);
            font-size: 0.95rem;
            line-height: 1.6;
        }
        
        .category-badge {
            display: inline-block;
            padding: 0.25rem 0.75rem;
            background: var(--light-bg);
            border-radius: 12px;
            font-size: 0.75rem;
            color: var(--secondary-color);
            font-weight: 600;
            text-transform: capitalize;
        }
        
        .no-results {
            text-align: center;
            padding: 4rem 2rem;
            background: var(--white);
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        }
        
        .no-results i {
            font-size: 4rem;
            color: var(--text-light);
            margin-bottom: 1rem;
        }
        
        .no-results h2 {
            color: var(--primary-color);
            margin-bottom: 1rem;
        }
        
        .no-results p {
            color: var(--text-light);
            margin-bottom: 2rem;
        }
        
        .pagination {
            display: flex;
            justify-content: center;
            gap: 0.5rem;
            margin-top: 2rem;
        }
        
        .pagination a,
        .pagination span {
            padding: 0.5rem 1rem;
            border-radius: 8px;
            text-decoration: none;
            color: var(--text-dark);
            background: var(--white);
            border: 1px solid rgba(0, 0, 0, 0.1);
        }
        
        .pagination a:hover {
            background: var(--primary-color);
            color: var(--white);
            border-color: var(--primary-color);
        }
        
        .pagination .active {
            background: var(--primary-color);
            color: var(--white);
            border-color: var(--primary-color);
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
        
        @media (max-width: 768px) {
            .search-header h1 {
                font-size: 2rem;
            }
            
            .results-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    @include('partials.header')

    <main class="main-content">
        <div class="container">
            <div class="search-header">
                <h1>Search Results</h1>
                @if($query)
                    <p class="results-count">
                        Results for <span class="search-query">"{{ $query }}"</span>
                    </p>
                @endif
            </div>

            @if($query)
                @if($destinations->count() > 0 || $blogs->count() > 0)
                    @if($destinations->count() > 0)
                        <div class="results-section">
                            <h2 class="section-title">
                                <i class="fas fa-map-marker-alt"></i>
                                Destinations ({{ $destinations->total() }})
                            </h2>
                            <div class="results-grid">
                                @foreach($destinations as $destination)
                                    <a href="{{ route('destinations.show', $destination->slug) }}" class="result-card">
                                        <div class="result-card-image">
                                            @if($destination->featured_image)
                                                <img src="{{ $destination->featured_image }}" alt="{{ $destination->name }}" style="width: 100%; height: 100%; object-fit: cover;">
                                            @else
                                                <i class="fas fa-mountain"></i>
                                            @endif
                                        </div>
                                        <div class="result-card-content">
                                            <h3 class="result-card-title">{{ $destination->name }}</h3>
                                            <div class="result-card-meta">
                                                <span><i class="fas fa-map-marker-alt"></i> {{ $destination->location }}</span>
                                                <span class="category-badge">{{ $destination->category }}</span>
                                            </div>
                                            <p class="result-card-excerpt">{{ Str::limit($destination->description, 120) }}</p>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                            @if($destinations->hasPages())
                                <div class="pagination">
                                    {{ $destinations->links() }}
                                </div>
                            @endif
                        </div>
                    @endif

                    @if($blogs->count() > 0)
                        <div class="results-section">
                            <h2 class="section-title">
                                <i class="fas fa-blog"></i>
                                Blog Posts ({{ $blogs->total() }})
                            </h2>
                            <div class="results-grid">
                                @foreach($blogs as $blog)
                                    <a href="{{ route('blog.show', $blog->slug) }}" class="result-card">
                                        <div class="result-card-image">
                                            @if($blog->featured_image)
                                                <img src="{{ $blog->featured_image }}" alt="{{ $blog->title }}" style="width: 100%; height: 100%; object-fit: cover;">
                                            @else
                                                <i class="fas fa-image"></i>
                                            @endif
                                        </div>
                                        <div class="result-card-content">
                                            <h3 class="result-card-title">{{ $blog->title }}</h3>
                                            <div class="result-card-meta">
                                                <span><i class="fas fa-calendar"></i> {{ $blog->published_at->format('M d, Y') }}</span>
                                            </div>
                                            @if($blog->excerpt)
                                                <p class="result-card-excerpt">{{ Str::limit($blog->excerpt, 120) }}</p>
                                            @endif
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                            @if($blogs->hasPages())
                                <div class="pagination">
                                    {{ $blogs->links() }}
                                </div>
                            @endif
                        </div>
                    @endif
                @else
                    <div class="no-results">
                        <i class="fas fa-search"></i>
                        <h2>No Results Found</h2>
                        <p>We couldn't find any destinations or blog posts matching "{{ $query }}"</p>
                        <a href="{{ route('destinations.index') }}" class="btn-primary">Browse All Destinations</a>
                    </div>
                @endif
            @else
                <div class="no-results">
                    <i class="fas fa-search"></i>
                    <h2>Enter a Search Query</h2>
                    <p>Please enter a search term to find destinations and blog posts</p>
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
            </div>
            <div class="footer-bottom">
                <p>&copy; {{ date('Y') }} Explore Wellawaya. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html>

