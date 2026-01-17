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
        
        .article-body {
            line-height: 1.8;
        }

        .article-body h2 {
            font-size: 2rem;
            color: var(--primary-color);
            margin-top: 2.5rem;
            margin-bottom: 1.25rem;
            line-height: 1.3;
        }

        .article-body h3 {
            font-size: 1.5rem;
            color: var(--primary-color);
            margin-top: 2rem;
            margin-bottom: 1rem;
            line-height: 1.3;
        }

        .article-body h4 {
            font-size: 1.25rem;
            color: var(--primary-color);
            margin-top: 1.5rem;
            margin-bottom: 0.75rem;
        }

        .article-body p {
            margin-bottom: 1.5rem;
            color: var(--text-dark);
            line-height: 1.8;
        }

        .article-body ul,
        .article-body ol {
            margin-left: 2rem;
            margin-bottom: 1.5rem;
            padding-left: 1rem;
        }

        .article-body li {
            margin-bottom: 0.75rem;
            color: var(--text-dark);
            line-height: 1.7;
        }

        .article-body ul li {
            list-style-type: disc;
        }

        .article-body ol li {
            list-style-type: decimal;
        }

        .article-body strong {
            font-weight: 600;
            color: var(--primary-color);
        }

        .article-body em {
            font-style: italic;
        }

        .article-body a {
            color: var(--secondary-color);
            text-decoration: underline;
            transition: color 0.3s ease;
        }

        .article-body a:hover {
            color: var(--primary-color);
        }

        .article-body blockquote {
            border-left: 4px solid var(--secondary-color);
            padding-left: 1.5rem;
            margin: 2rem 0;
            font-style: italic;
            color: var(--text-light);
            background: var(--light-bg);
            padding: 1.5rem;
            border-radius: 8px;
        }

        .article-body img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
            margin: 2rem 0;
            display: block;
        }

        .article-body code {
            background: var(--light-bg);
            padding: 0.2rem 0.5rem;
            border-radius: 4px;
            font-family: 'Courier New', monospace;
            font-size: 0.9em;
            color: var(--primary-color);
        }

        .article-body pre {
            background: var(--light-bg);
            padding: 1.5rem;
            border-radius: 8px;
            overflow-x: auto;
            margin: 1.5rem 0;
        }

        .article-body pre code {
            background: none;
            padding: 0;
        }

        .article-body hr {
            border: none;
            border-top: 2px solid var(--border-color);
            margin: 2.5rem 0;
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
            /* Main Content */
            .main-content {
                padding: 2rem 0;
            }

            .container {
                padding: 0 1.5rem;
                max-width: 100%;
            }

            /* Back Link */
            .back-link {
                margin-bottom: 1.5rem;
                font-size: 0.9rem;
            }

            /* Article Header */
            .article-header {
                margin-bottom: 2rem;
            }

            .article-title {
                font-size: 1.75rem;
                margin-bottom: 1rem;
                line-height: 1.3;
            }

            .article-meta {
                flex-direction: column;
                gap: 1rem;
                align-items: flex-start;
                margin-bottom: 1.5rem;
            }

            .article-meta span {
                font-size: 0.9rem;
            }

            /* Article Image */
            .article-image {
                height: 250px;
                margin-bottom: 2rem;
                border-radius: 10px;
            }

            .article-image i {
                font-size: 3rem;
            }

            /* Article Content */
            .article-content {
                padding: 1.5rem;
                border-radius: 10px;
                margin-bottom: 1.5rem;
            }

            .article-content h2 {
                font-size: 1.5rem;
                margin-top: 2rem;
                margin-bottom: 1rem;
            }

            .article-content h3 {
                font-size: 1.25rem;
                margin-top: 1.5rem;
                margin-bottom: 0.75rem;
            }

            .article-content p {
                font-size: 0.95rem;
                line-height: 1.7;
                margin-bottom: 1rem;
            }

            .article-content ul,
            .article-content ol {
                font-size: 0.95rem;
                margin-bottom: 1rem;
                padding-left: 1.5rem;
            }

            .article-content li {
                margin-bottom: 0.5rem;
            }

            .article-content blockquote {
                font-size: 0.9rem;
                padding: 1rem 1.5rem;
                margin: 1.5rem 0;
            }

            .article-content img {
                border-radius: 10px;
                margin: 1.5rem 0;
            }

            /* Share Section */
            .article-share {
                padding: 1.5rem;
                border-radius: 10px;
                margin-bottom: 2rem;
            }

            .article-share h3 {
                font-size: 1.1rem;
                margin-bottom: 1rem;
            }

            .share-buttons {
                gap: 0.75rem;
            }

            .share-btn {
                padding: 0.5rem 1rem;
                font-size: 0.875rem;
            }

            /* Related Posts */
            .related-posts {
                margin-top: 3rem;
            }

            .related-posts h2 {
                font-size: 1.5rem;
                margin-bottom: 1.5rem;
            }

            .related-grid {
                grid-template-columns: 1fr;
                gap: 1.25rem;
            }

            .related-card-image {
                height: 180px;
            }

            .related-card-content {
                padding: 1.25rem;
            }

            .related-card-title {
                font-size: 1.1rem;
            }

            .related-card-meta {
                font-size: 0.85rem;
                gap: 0.75rem;
            }

            .related-card-excerpt {
                font-size: 0.85rem;
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

            .article-title {
                font-size: 1.5rem;
            }

            .article-image {
                height: 200px;
            }

            .article-content {
                padding: 1.25rem;
            }

            .article-content h2 {
                font-size: 1.25rem;
            }

            .article-content h3 {
                font-size: 1.1rem;
            }

            .article-content p {
                font-size: 0.9rem;
            }

            .share-buttons {
                flex-wrap: wrap;
            }

            .share-btn {
                flex: 1 1 calc(50% - 0.375rem);
                min-width: 0;
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

                    <div class="article-body">
                        {!! $blog->content !!}
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
