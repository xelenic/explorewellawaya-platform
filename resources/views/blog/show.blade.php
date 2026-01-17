<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $blog->title }} - Explore Wellawaya Blog</title>
    
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
            max-width: 900px;
            margin: 0 auto;
            padding: 0 2rem;
        }
        
        .article-header {
            text-align: center;
            margin-bottom: 3rem;
        }
        
        .article-title {
            font-size: 3rem;
            color: var(--primary-color);
            margin-bottom: 1.5rem;
            line-height: 1.2;
        }
        
        .article-meta {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 2rem;
            color: var(--text-light);
            margin-bottom: 2rem;
            flex-wrap: wrap;
        }
        
        .article-meta span {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .article-image {
            width: 100%;
            height: 400px;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            border-radius: 15px;
            margin-bottom: 3rem;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--white);
            font-size: 4rem;
            overflow: hidden;
        }
        
        .article-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .article-content {
            background: var(--white);
            padding: 3rem;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            margin-bottom: 3rem;
        }
        
        .article-content h2,
        .article-content h3 {
            color: var(--primary-color);
            margin-top: 2rem;
            margin-bottom: 1rem;
        }
        
        .article-content p {
            margin-bottom: 1.5rem;
            color: var(--text-dark);
        }
        
        .article-content ul,
        .article-content ol {
            margin-left: 2rem;
            margin-bottom: 1.5rem;
        }
        
        .article-content li {
            margin-bottom: 0.5rem;
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
        
        /* Related Posts */
        .related-posts {
            margin-top: 4rem;
        }
        
        .related-posts h2 {
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
        
        .related-card-excerpt {
            color: var(--text-light);
            font-size: 0.9rem;
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
            .article-title {
                font-size: 2rem;
            }
            
            .article-content {
                padding: 2rem;
            }
            
            .article-image {
                height: 250px;
            }
            
            .related-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    @include('partials.header')

    <!-- Main Content -->
    <main class="main-content">
        <div class="container">
            <a href="{{ route('blog.index') }}" class="back-link">
                <i class="fas fa-arrow-left"></i> Back to Blog
            </a>

            <article>
                <div class="article-header">
                    <h1 class="article-title">{{ $blog->title }}</h1>
                    <div class="article-meta">
                        <span><i class="fas fa-user"></i> {{ $blog->user->name }}</span>
                        <span><i class="fas fa-calendar"></i> {{ $blog->published_at->format('F d, Y') }}</span>
                    </div>
                </div>

                @if($blog->featured_image)
                    <div class="article-image">
                        <img src="{{ $blog->featured_image }}" alt="{{ $blog->title }}">
                    </div>
                @else
                    <div class="article-image">
                        <i class="fas fa-image"></i>
                    </div>
                @endif

                <div class="article-content">
                    @if($blog->excerpt)
                        <p style="font-size: 1.2rem; color: var(--text-light); font-weight: 500; margin-bottom: 2rem;">
                            {{ $blog->excerpt }}
                        </p>
                    @endif

                    <div>
                        {!! nl2br(e($blog->content)) !!}
                    </div>
                </div>
            </article>

            @if($relatedPosts->count() > 0)
                <div class="related-posts">
                    <h2>Related Posts</h2>
                    <div class="related-grid">
                        @foreach($relatedPosts as $relatedPost)
                            <a href="{{ route('blog.show', $relatedPost->slug) }}" class="related-card">
                                <div class="related-card-image">
                                    @if($relatedPost->featured_image)
                                        <img src="{{ $relatedPost->featured_image }}" alt="{{ $relatedPost->title }}" style="width: 100%; height: 100%; object-fit: cover;">
                                    @else
                                        <i class="fas fa-image"></i>
                                    @endif
                                </div>
                                <div class="related-card-content">
                                    <h3 class="related-card-title">{{ $relatedPost->title }}</h3>
                                    @if($relatedPost->excerpt)
                                        <p class="related-card-excerpt">{{ Str::limit($relatedPost->excerpt, 100) }}</p>
                                    @endif
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
