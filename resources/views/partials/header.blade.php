<!-- Navigation -->
<nav class="navbar">
    <div class="nav-container">
        <a href="{{ url('/') }}" class="logo">Explore Wellawaya</a>
        <button class="mobile-menu-toggle" id="mobileMenuToggle">
            <i class="fas fa-bars"></i>
        </button>
        <ul class="nav-menu" id="navMenu">
            <li class="nav-search">
                <form action="#" method="GET" style="display: flex; align-items: center;">
                    <input type="text" placeholder="Search destinations..." name="search" id="navSearchInput">
                    <button type="submit" aria-label="Search">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
            </li>
            <li><a href="{{ url('/') }}#home" class="{{ request()->is('/') ? 'active' : '' }}">Home</a></li>
            <li><a href="{{ url('/') }}#destinations">Destinations</a></li>
            <li><a href="{{ route('blog.index') }}" class="{{ request()->routeIs('blog.*') ? 'active' : '' }}">Blog</a></li>
            <li><a href="{{ route('business-registration.form') }}" class="{{ request()->routeIs('business-registration.*') ? 'active' : '' }}">Register Business</a></li>
            <li><a href="{{ url('/') }}#about">About</a></li>
            <li><a href="{{ url('/') }}#contact">Contact</a></li>
            @auth
                <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            @endauth
        </ul>
    </div>
</nav>

<style>
    /* Navigation */
    .navbar {
        position: fixed;
        top: 0;
        width: 100%;
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        box-shadow: 0 2px 20px rgba(0, 0, 0, 0.1);
        z-index: 1000;
        padding: 1rem 0;
        transition: all 0.3s ease;
    }
    
    .nav-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 2rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    
    .logo {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--primary-color);
        text-decoration: none;
        font-family: 'Nunito', sans-serif;
    }
    
    .nav-menu {
        display: flex;
        list-style: none;
        gap: 1.5rem;
        align-items: center;
    }
    
    .nav-menu a {
        text-decoration: none;
        color: var(--text-dark);
        font-weight: 500;
        transition: color 0.3s ease;
    }
    
    .nav-menu a:hover,
    .nav-menu a.active {
        color: var(--secondary-color);
    }
    
    /* Search Field */
    .nav-search {
        position: relative;
        display: flex;
        align-items: center;
    }
    
    .nav-search input {
        padding: 0.5rem 2.5rem 0.5rem 1rem;
        border: 2px solid rgba(0, 0, 0, 0.1);
        border-radius: 50px;
        font-size: 0.9rem;
        font-family: 'Nunito', sans-serif;
        width: 200px;
        transition: all 0.3s ease;
        background: var(--white);
        outline: none;
    }
    
    .nav-search input:focus {
        border-color: var(--secondary-color);
        width: 250px;
        box-shadow: 0 0 0 3px rgba(107, 142, 35, 0.1);
    }
    
    .nav-search input::placeholder {
        color: var(--text-light);
    }
    
    .nav-search button {
        position: absolute;
        right: 5px;
        background: var(--primary-color);
        border: none;
        color: var(--white);
        width: 32px;
        height: 32px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.3s ease;
    }
    
    .nav-search button:hover {
        background: var(--secondary-color);
        transform: scale(1.05);
    }
    
    .nav-search button i {
        font-size: 0.85rem;
    }
    
    .mobile-menu-toggle {
        display: none;
        background: none;
        border: none;
        font-size: 1.5rem;
        color: var(--text-dark);
        cursor: pointer;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .mobile-menu-toggle {
            display: block;
        }
        
        .nav-menu {
            position: fixed;
            top: 70px;
            left: -100%;
            width: 100%;
            background: var(--white);
            flex-direction: column;
            padding: 2rem;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            transition: left 0.3s ease;
            align-items: stretch;
        }
        
        .nav-menu.active {
            left: 0;
        }
        
        .nav-search {
            width: 100%;
            margin-bottom: 1rem;
        }
        
        .nav-search input {
            width: 100% !important;
        }
        
        .nav-menu li {
            width: 100%;
        }
    }
</style>

<script>
    // Mobile menu toggle
    document.addEventListener('DOMContentLoaded', function() {
        const mobileMenuToggle = document.getElementById('mobileMenuToggle');
        const navMenu = document.getElementById('navMenu');

        if (mobileMenuToggle) {
            mobileMenuToggle.addEventListener('click', () => {
                navMenu.classList.toggle('active');
            });

            // Close mobile menu when clicking on a link
            document.querySelectorAll('.nav-menu a').forEach(link => {
                link.addEventListener('click', () => {
                    navMenu.classList.remove('active');
                });
            });
        }

        // Navbar scroll effect
        window.addEventListener('scroll', () => {
            const navbar = document.querySelector('.navbar');
            if (navbar) {
                if (window.scrollY > 50) {
                    navbar.style.boxShadow = '0 2px 20px rgba(0, 0, 0, 0.15)';
                } else {
                    navbar.style.boxShadow = '0 2px 20px rgba(0, 0, 0, 0.1)';
                }
            }
        });

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                const href = this.getAttribute('href');
                if (href && href !== '#' && href.includes('#')) {
                    e.preventDefault();
                    const target = document.querySelector(href);
                    if (target) {
                        const offsetTop = target.offsetTop - 80;
                        window.scrollTo({
                            top: offsetTop,
                            behavior: 'smooth'
                        });
                    }
                }
            });
        });
    });
</script>

