<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blog - Explore Wellawaya</title>

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

        /* Blog Grid */
        .blog-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 2rem;
            margin-bottom: 3rem;
        }

        .blog-card {
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

        .blog-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        .blog-card-image {
            width: 100%;
            height: 250px;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--white);
            font-size: 3rem;
        }

        .blog-card-content {
            padding: 1.5rem;
        }

        .blog-card-meta {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1rem;
            font-size: 0.9rem;
            color: var(--text-light);
        }

        .blog-card-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary-color);
            margin-bottom: 0.75rem;
        }

        .blog-card-excerpt {
            color: var(--text-light);
            margin-bottom: 1rem;
            line-height: 1.6;
        }

        .blog-card-footer {
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
            /* Main Content */
            .main-content {
                padding: 2rem 0;
            }

            .container {
                padding: 0 1.5rem;
            }

            /* Page Header */
            .page-header {
                margin-bottom: 2rem;
            }

            .page-header h1 {
                font-size: 1.75rem;
                margin-bottom: 0.75rem;
            }

            .page-header p {
                font-size: 1rem;
            }

            /* Blog Grid */
            .blog-grid {
                grid-template-columns: 1fr;
                gap: 1.5rem;
                margin-bottom: 2rem;
            }

            .blog-card {
                margin-bottom: 0;
            }

            .blog-card-image {
                height: 200px;
            }

            .blog-card-image i {
                font-size: 2.5rem;
            }

            .blog-card-content {
                padding: 1.25rem;
            }

            .blog-card-meta {
                font-size: 0.85rem;
                gap: 0.75rem;
                margin-bottom: 0.75rem;
                flex-wrap: wrap;
            }

            .blog-card-title {
                font-size: 1.25rem;
                margin-bottom: 0.5rem;
            }

            .blog-card-excerpt {
                font-size: 0.9rem;
                margin-bottom: 0.75rem;
            }

            .blog-card-footer {
                padding-top: 0.75rem;
            }

            .read-more {
                font-size: 0.9rem;
            }

            /* Empty State */
            .empty-state {
                padding: 3rem 1.5rem;
            }

            .empty-state i {
                font-size: 3rem;
            }

            .empty-state h2 {
                font-size: 1.25rem;
            }

            /* Pagination */
            .pagination {
                flex-wrap: wrap;
                gap: 0.5rem;
                margin-top: 2rem;
            }

            .pagination a,
            .pagination span {
                padding: 0.5rem 0.75rem;
                font-size: 0.875rem;
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

            .page-header h1 {
                font-size: 1.5rem;
            }

            .main-content {
                padding: 1.5rem 0;
            }

            .blog-grid {
                gap: 1.25rem;
            }

            .blog-card-content {
                padding: 1rem;
            }

            .blog-card-title {
                font-size: 1.1rem;
            }

            .blog-card-image {
                height: 180px;
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
                <h1>Our Blog</h1>
                <p>Discover stories, tips, and insights about Wellawaya</p>
            </div>

            @if($blogs->count() > 0)
                <div class="blog-grid">
                    @foreach($blogs as $blog)
                        <a href="{{ route('blog.show', $blog->slug) }}" class="blog-card">
                            <div class="blog-card-image">
                                @if($blog->featured_image)
                                    <img src="{{ $blog->featured_image }}" alt="{{ $blog->title }}" style="width: 100%; height: 100%; object-fit: cover;">
                                @else
                                    <i class="fas fa-image"></i>
                                @endif
                            </div>
                            <div class="blog-card-content">
                                <div class="blog-card-meta">
                                    <span><i class="fas fa-user"></i> {{ $blog->user->name }}</span>
                                    <span><i class="fas fa-calendar"></i> {{ $blog->published_at->format('M d, Y') }}</span>
                                </div>
                                <h2 class="blog-card-title">{{ $blog->title }}</h2>
                                @if($blog->excerpt)
                                    <p class="blog-card-excerpt">{{ $blog->excerpt }}</p>
                                @else
                                    <p class="blog-card-excerpt">{{ Str::limit(strip_tags($blog->content), 150) }}</p>
                                @endif
                                <div class="blog-card-footer">
                                    <span class="read-more">Read More <i class="fas fa-arrow-right"></i></span>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>

                @if($blogs->hasPages())
                    <div class="pagination">
                        {{ $blogs->links() }}
                    </div>
                @endif
            @else
                <div class="empty-state">
                    <i class="fas fa-book-open"></i>
                    <h2>No blog posts yet</h2>
                    <p>Check back soon for new articles and stories about Wellawaya!</p>
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
