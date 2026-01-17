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

        /* Countdown Overlay */
        .countdown-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #2d5016 0%, #6b8e23 50%, #2d5016 100%);
            background-size: 400% 400%;
            animation: gradientShift 8s ease infinite;
            z-index: 9999;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            cursor: pointer;
            transition: opacity 0.8s ease, visibility 0.8s ease;
        }

        .countdown-overlay.hidden {
            opacity: 0;
            visibility: hidden;
        }

        @keyframes gradientShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        /* Animated Background Particles */
        .particles {
            position: absolute;
            width: 100%;
            height: 100%;
            overflow: hidden;
        }

        .particle {
            position: absolute;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            animation: float 15s infinite ease-in-out;
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0) translateX(0) rotate(0deg);
                opacity: 0;
            }
            10% {
                opacity: 1;
            }
            90% {
                opacity: 1;
            }
            50% {
                transform: translateY(-100vh) translateX(50px) rotate(180deg);
            }
        }

        /* Countdown Container */
        .countdown-container {
            position: relative;
            z-index: 2;
            text-align: center;
        }

        .countdown-title {
            font-size: 3.5rem;
            font-weight: 800;
            color: var(--white);
            margin-bottom: 1rem;
            text-shadow: 0 0 30px rgba(255, 255, 255, 0.5);
            animation: pulse 2s ease-in-out infinite;
            letter-spacing: 3px;
        }

        @keyframes pulse {
            0%, 100% {
                transform: scale(1);
                text-shadow: 0 0 30px rgba(255, 255, 255, 0.5);
            }
            50% {
                transform: scale(1.05);
                text-shadow: 0 0 50px rgba(255, 255, 255, 0.8);
            }
        }

        .countdown-subtitle {
            font-size: 1.5rem;
            color: var(--accent-color);
            margin-bottom: 3rem;
            font-weight: 300;
            letter-spacing: 2px;
            animation: fadeInUp 1s ease 0.3s both;
        }

        /* Countdown Numbers */
        .countdown-numbers {
            display: flex;
            justify-content: center;
            gap: 2rem;
            margin-bottom: 3rem;
            flex-wrap: wrap;
        }

        .countdown-item {
            position: relative;
            width: 120px;
            height: 120px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .countdown-circle {
            position: absolute;
            width: 120px;
            height: 120px;
            border: 3px solid rgba(255, 255, 255, 0.3);
            border-top-color: var(--accent-color);
            border-radius: 50%;
            animation: spin 2s linear infinite;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        .countdown-number {
            font-size: 3.5rem;
            font-weight: 800;
            color: var(--white);
            line-height: 1;
            text-shadow: 0 0 20px rgba(255, 255, 255, 0.5);
            animation: numberPop 0.5s ease;
            z-index: 1;
        }

        @keyframes numberPop {
            0% {
                transform: scale(0);
                opacity: 0;
            }
            50% {
                transform: scale(1.2);
            }
            100% {
                transform: scale(1);
                opacity: 1;
            }
        }

        .countdown-label {
            font-size: 0.9rem;
            color: rgba(255, 255, 255, 0.8);
            margin-top: 0.5rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            z-index: 1;
        }

        /* Skip Button */
        .skip-button {
            margin-top: 2rem;
            padding: 1rem 2.5rem;
            background: rgba(255, 255, 255, 0.2);
            border: 2px solid rgba(255, 255, 255, 0.5);
            border-radius: 50px;
            color: var(--white);
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
            letter-spacing: 1px;
        }

        .skip-button:hover {
            background: rgba(255, 255, 255, 0.3);
            border-color: var(--accent-color);
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(255, 215, 0, 0.3);
        }

        .skip-hint {
            margin-top: 1rem;
            color: rgba(255, 255, 255, 0.6);
            font-size: 0.9rem;
            animation: fadeIn 1s ease 2s both;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

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

        /* Responsive Countdown */
        @media (max-width: 768px) {
            .countdown-title {
                font-size: 2.5rem;
            }

            .countdown-subtitle {
                font-size: 1.2rem;
            }

            .countdown-item {
                width: 80px;
                height: 80px;
            }

            .countdown-circle {
                width: 80px;
                height: 80px;
            }

            .countdown-number {
                font-size: 2.5rem;
            }

            .countdown-numbers {
                gap: 1rem;
            }
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

        /* Slider Thumbnails */
        .slider-thumbnails {
            position: absolute;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 0.75rem;
            z-index: 10;
            padding: 0 2rem;
            max-width: 100%;
            overflow-x: auto;
            scrollbar-width: thin;
            scrollbar-color: rgba(255, 255, 255, 0.3) transparent;
        }

        .slider-thumbnails::-webkit-scrollbar {
            height: 4px;
        }

        .slider-thumbnails::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 2px;
        }

        .slider-thumbnails::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.3);
            border-radius: 2px;
        }

        .slider-thumbnails::-webkit-scrollbar-thumb:hover {
            background: rgba(255, 255, 255, 0.5);
        }

        .thumbnail-item {
            flex-shrink: 0;
            width: 80px;
            height: 60px;
            border-radius: 8px;
            overflow: hidden;
            cursor: pointer;
            border: 3px solid transparent;
            transition: all 0.3s ease;
            opacity: 0.7;
            position: relative;
        }

        .thumbnail-item:hover {
            opacity: 1;
            transform: scale(1.1);
            border-color: rgba(255, 255, 255, 0.5);
        }

        .thumbnail-item.active {
            opacity: 1;
            border-color: var(--accent-color);
            box-shadow: 0 0 15px rgba(255, 215, 0, 0.5);
        }

        .thumbnail-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .thumbnail-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.3);
            transition: background 0.3s ease;
        }

        .thumbnail-item.active .thumbnail-overlay,
        .thumbnail-item:hover .thumbnail-overlay {
            background: rgba(0, 0, 0, 0.1);
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
            display: block;
            text-decoration: none;
            color: inherit;
        }

        .destination-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        .destination-card img {
            width: 100%;
            height: 250px;
            object-fit: cover;
            display: block;
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

        .destination-card .explore-link {
            color: var(--secondary-color);
            text-decoration: none;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            transition: color 0.3s ease;
        }

        .destination-card:hover .explore-link {
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
            /* Hero Section */
            .hero-section {
                height: 100vh;
                min-height: 500px;
            }

            .hero-content {
                padding: 0 1.5rem;
                max-width: 100%;
            }

            .hero-content h1 {
                font-size: 2rem;
                margin-bottom: 0.75rem;
                line-height: 1.2;
            }

            .hero-content p {
                font-size: 0.95rem;
                margin-bottom: 1.5rem;
            }

            .hero-buttons {
                flex-direction: column;
                gap: 0.75rem;
                width: 100%;
            }

            .btn-white,
            .btn-outline {
                width: 100%;
                padding: 0.75rem 1.5rem;
                text-align: center;
            }

            /* Swiper Navigation - Hide on mobile */
            .swiper-button-next,
            .swiper-button-prev {
                display: none;
            }

            .swiper-pagination {
                bottom: 90px !important;
            }

            /* Thumbnails on Mobile */
            .slider-thumbnails {
                bottom: 15px;
                gap: 0.5rem;
                padding: 0 1rem;
            }

            .thumbnail-item {
                width: 60px;
                height: 45px;
                border-width: 2px;
            }

            /* Sections */
            .section {
                padding: 3rem 0;
            }

            .container {
                padding: 0 1.5rem;
            }

            .section-header {
                margin-bottom: 2rem;
            }

            .section-header h2 {
                font-size: 1.75rem;
                margin-bottom: 0.75rem;
            }

            .section-header p {
                font-size: 1rem;
            }

            /* Features Section */
            .features-grid {
                grid-template-columns: 1fr;
                gap: 1.5rem;
            }

            .feature-item {
                padding: 1.5rem;
            }

            .feature-icon {
                font-size: 2.5rem;
                margin-bottom: 0.75rem;
            }

            .feature-item h3 {
                font-size: 1.1rem;
            }

            .feature-item p {
                font-size: 0.9rem;
            }

            /* Destinations Grid */
            .destinations-grid {
                grid-template-columns: 1fr;
                gap: 1.5rem;
            }

            .destination-card {
                margin-bottom: 0;
            }

            .destination-card img {
                height: 200px;
            }

            .destination-card-content {
                padding: 1.25rem;
            }

            .destination-card h3 {
                font-size: 1.25rem;
            }

            .destination-card p {
                font-size: 0.9rem;
                margin-bottom: 0.75rem;
            }

            /* About Section */
            .about-content {
                grid-template-columns: 1fr;
                gap: 2rem;
            }

            .about-image-wrapper {
                transform: perspective(1000px) rotateY(0deg);
                order: -1;
            }

            .about-image-wrapper img {
                height: 300px;
            }

            .about-text h3 {
                font-size: 1.5rem;
                margin-bottom: 1rem;
            }

            .about-text p {
                font-size: 0.9rem;
                margin-bottom: 1rem;
            }

            .about-features {
                grid-template-columns: 1fr;
                gap: 1rem;
                margin: 1.5rem 0;
            }

            .about-feature {
                padding: 1.25rem;
            }

            .about-feature-icon {
                width: 50px;
                height: 50px;
                font-size: 1.25rem;
                margin-bottom: 0.75rem;
            }

            .about-feature h4 {
                font-size: 0.95rem;
            }

            .about-feature p {
                font-size: 0.85rem;
                margin: 0;
            }

            /* CTA Section */
            .cta-section {
                padding: 3rem 1.5rem;
                margin: 2rem 0;
                border-radius: 15px;
            }

            .cta-section h2 {
                font-size: 1.75rem;
                margin-bottom: 0.75rem;
            }

            .cta-section p {
                font-size: 1rem;
                margin-bottom: 1.5rem;
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

            .social-links {
                justify-content: center;
            }

            /* Buttons */
            .btn-primary {
                padding: 0.75rem 1.25rem;
                font-size: 0.9rem;
            }

            /* Page Header adjustments */
            .page-header h1 {
                font-size: 2rem;
            }
        }

        /* Extra Small Devices */
        @media (max-width: 480px) {
            .hero-content h1 {
                font-size: 1.75rem;
            }

            .hero-content p {
                font-size: 0.85rem;
            }

            .section-header h2 {
                font-size: 1.5rem;
            }

            .section {
                padding: 2rem 0;
            }

            .container {
                padding: 0 1rem;
            }

            .cta-section h2 {
                font-size: 1.5rem;
            }

            .about-text h3 {
                font-size: 1.25rem;
            }

            .destination-card-content {
                padding: 1rem;
            }
        }
    </style>
</head>
<body>
    <!-- Countdown Overlay -->
    <div class="countdown-overlay" id="countdownOverlay">
        <div class="particles" id="particles"></div>
        <div class="countdown-container">
            <h1 class="countdown-title">EXPLORE WELLAWAYA</h1>
            <p class="countdown-subtitle">Website Launching In</p>
            <div class="countdown-numbers">
                <div class="countdown-item">
                    <div class="countdown-circle"></div>
                    <div class="countdown-number" id="days">00</div>
                    <div class="countdown-label">Days</div>
                </div>
                <div class="countdown-item">
                    <div class="countdown-circle"></div>
                    <div class="countdown-number" id="hours">00</div>
                    <div class="countdown-label">Hours</div>
                </div>
                <div class="countdown-item">
                    <div class="countdown-circle"></div>
                    <div class="countdown-number" id="minutes">00</div>
                    <div class="countdown-label">Minutes</div>
                </div>
                <div class="countdown-item">
                    <div class="countdown-circle"></div>
                    <div class="countdown-number" id="seconds">00</div>
                    <div class="countdown-label">Seconds</div>
                </div>
            </div>
            <button class="skip-button" onclick="skipCountdown()">Skip Countdown</button>
            <p class="skip-hint">Click anywhere to launch website</p>
        </div>
    </div>

    @include('partials.header')

    <!-- Hero Section -->
    <section class="hero-section" id="home">
        <div class="swiper hero-swiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide" data-thumbnail="{{ asset('slider/slide1.jpeg') }}">
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
                <div class="swiper-slide" data-thumbnail="{{ asset('slider/slide2.jpeg') }}">
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
                <div class="swiper-slide" data-thumbnail="{{ asset('slider/slide3.jpeg') }}">
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
                <div class="swiper-slide" data-thumbnail="{{ asset('slider/slide4.jpeg') }}">
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
                <div class="swiper-slide" data-thumbnail="{{ asset('slider/slide5.jpeg') }}">
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
            <!-- Thumbnails Container -->
            <div class="slider-thumbnails" id="sliderThumbnails"></div>
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
            @if(isset($featuredDestinations) && $featuredDestinations->count() > 0)
                <div class="destinations-grid">
                    @foreach($featuredDestinations as $destination)
                        <a href="{{ route('destinations.show', $destination->slug) }}" class="destination-card">
                            @if($destination->featured_image)
                                <img src="{{ $destination->featured_image }}" alt="{{ $destination->name }}">
                            @else
                                <div style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); height: 250px; display: flex; align-items: center; justify-content: center;">
                                    <i class="fas fa-image" style="font-size: 3rem; color: rgba(255,255,255,0.5);"></i>
                                </div>
                            @endif
                            <div class="destination-card-content">
                                <h3>{{ $destination->name }}</h3>
                                <p style="color: var(--text-light); margin-bottom: 0.5rem;">
                                    <i class="fas fa-map-marker-alt" style="margin-right: 0.5rem;"></i>{{ $destination->location }}
                                </p>
                                <p>{{ Str::limit(strip_tags($destination->description), 120) }}</p>
                                <span class="explore-link">
                                    Explore More <i class="fas fa-arrow-right"></i>
                                </span>
                            </div>
                        </a>
                    @endforeach
                </div>
                <div style="text-align: center; margin-top: 3rem;">
                    <a href="{{ route('destinations.index') }}" class="btn-primary">View All Destinations</a>
                </div>
            @else
                <div class="destinations-grid">
                    <div class="destination-card">
                        <div style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); height: 250px;"></div>
                        <div class="destination-card-content">
                            <h3>Bambarakanda Falls</h3>
                            <p>Discover the highest waterfall in Sri Lanka, surrounded by lush greenery and breathtaking views.</p>
                            <a href="{{ route('destinations.index') }}">Explore More <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="destination-card">
                        <div style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%); height: 250px;"></div>
                        <div class="destination-card-content">
                            <h3>Uva Highlands</h3>
                            <p>Experience the cool climate and stunning mountain vistas of the Uva province highlands.</p>
                            <a href="{{ route('destinations.index') }}">Explore More <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="destination-card">
                        <div style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%); height: 250px;"></div>
                        <div class="destination-card-content">
                            <h3>Ancient Temples</h3>
                            <p>Visit historic Buddhist temples and immerse yourself in the rich cultural heritage.</p>
                            <a href="{{ route('destinations.index') }}">Explore More <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            @endif
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
        // Countdown Launch Animation
        (function() {
            // Check if countdown was already shown
            if (localStorage.getItem('countdownShown') === 'true') {
                document.getElementById('countdownOverlay').style.display = 'none';
                return;
            }

            // Create animated particles
            function createParticles() {
                const particlesContainer = document.getElementById('particles');
                const particleCount = 50;

                for (let i = 0; i < particleCount; i++) {
                    const particle = document.createElement('div');
                    particle.className = 'particle';
                    particle.style.width = Math.random() * 10 + 5 + 'px';
                    particle.style.height = particle.style.width;
                    particle.style.left = Math.random() * 100 + '%';
                    particle.style.top = Math.random() * 100 + '%';
                    particle.style.animationDelay = Math.random() * 15 + 's';
                    particle.style.animationDuration = (Math.random() * 10 + 10) + 's';
                    particlesContainer.appendChild(particle);
                }
            }

            // Countdown timer
            function startCountdown() {
                // Set launch date (you can change this to your actual launch date)
                const launchDate = new Date();
                launchDate.setDate(launchDate.getDate() + 1); // 1 day from now (change as needed)
                launchDate.setHours(0, 0, 0, 0);

                const daysEl = document.getElementById('days');
                const hoursEl = document.getElementById('hours');
                const minutesEl = document.getElementById('minutes');
                const secondsEl = document.getElementById('seconds');

                function updateCountdown() {
                    const now = new Date().getTime();
                    const distance = launchDate.getTime() - now;

                    if (distance < 0) {
                        // Countdown finished
                        skipCountdown();
                        return;
                    }

                    const days = Math.floor(distance / (1000 * 60 * 60 * 24));
                    const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                    const seconds = Math.floor((distance % (1000 * 60)) / 1000);

                    // Update with animation
                    if (daysEl.textContent !== String(days).padStart(2, '0')) {
                        daysEl.textContent = String(days).padStart(2, '0');
                        daysEl.style.animation = 'none';
                        setTimeout(() => daysEl.style.animation = 'numberPop 0.5s ease', 10);
                    }

                    if (hoursEl.textContent !== String(hours).padStart(2, '0')) {
                        hoursEl.textContent = String(hours).padStart(2, '0');
                        hoursEl.style.animation = 'none';
                        setTimeout(() => hoursEl.style.animation = 'numberPop 0.5s ease', 10);
                    }

                    if (minutesEl.textContent !== String(minutes).padStart(2, '0')) {
                        minutesEl.textContent = String(minutes).padStart(2, '0');
                        minutesEl.style.animation = 'none';
                        setTimeout(() => minutesEl.style.animation = 'numberPop 0.5s ease', 10);
                    }

                    if (secondsEl.textContent !== String(seconds).padStart(2, '0')) {
                        secondsEl.textContent = String(seconds).padStart(2, '0');
                        secondsEl.style.animation = 'none';
                        setTimeout(() => secondsEl.style.animation = 'numberPop 0.5s ease', 10);
                    }
                }

                updateCountdown();
                setInterval(updateCountdown, 1000);
            }

            // Skip countdown function
            window.skipCountdown = function() {
                const overlay = document.getElementById('countdownOverlay');
                overlay.classList.add('hidden');

                // Mark as shown in localStorage
                localStorage.setItem('countdownShown', 'true');

                // Remove overlay after animation
                setTimeout(() => {
                    overlay.style.display = 'none';
                    document.body.style.overflow = 'auto';
                }, 800);
            };

            // Click anywhere to skip
            document.getElementById('countdownOverlay').addEventListener('click', function(e) {
                if (e.target.classList.contains('skip-button') ||
                    e.target.closest('.skip-button')) {
                    return; // Skip button handles its own click
                }
                skipCountdown();
            });

            // Prevent body scroll while countdown is showing
            document.body.style.overflow = 'hidden';

            // Initialize
            createParticles();
            startCountdown();
        })();

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
            on: {
                init: function() {
                    initializeThumbnails();
                },
                slideChange: function() {
                    updateActiveThumbnail(this.realIndex);
                }
            }
        });

        // Initialize Thumbnails
        function initializeThumbnails() {
            const thumbnailContainer = document.getElementById('sliderThumbnails');
            const slides = document.querySelectorAll('.swiper-slide[data-thumbnail]');

            if (!thumbnailContainer || !slides.length) return;

            slides.forEach((slide, index) => {
                const thumbnailSrc = slide.getAttribute('data-thumbnail');
                if (!thumbnailSrc) return;

                const thumbnailItem = document.createElement('div');
                thumbnailItem.className = 'thumbnail-item';
                thumbnailItem.dataset.index = index;
                thumbnailItem.innerHTML = `
                    <img src="${thumbnailSrc}" alt="Slide ${index + 1}">
                    <div class="thumbnail-overlay"></div>
                `;

                thumbnailItem.addEventListener('click', function() {
                    swiper.slideToLoop(index);
                });

                thumbnailContainer.appendChild(thumbnailItem);
            });

            // Set first thumbnail as active
            if (thumbnailContainer.children.length > 0) {
                thumbnailContainer.children[0].classList.add('active');
            }
        }

        // Update active thumbnail
        function updateActiveThumbnail(index) {
            const thumbnails = document.querySelectorAll('.thumbnail-item');
            thumbnails.forEach((thumb, i) => {
                if (i === index) {
                    thumb.classList.add('active');
                    // Scroll thumbnail into view
                    thumb.scrollIntoView({ behavior: 'smooth', block: 'nearest', inline: 'center' });
                } else {
                    thumb.classList.remove('active');
                }
            });
        }

    </script>
</body>
</html>
