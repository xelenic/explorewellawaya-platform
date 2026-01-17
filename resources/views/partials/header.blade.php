@php
    use Illuminate\Support\Str;
@endphp

<!-- Navigation -->
<nav class="navbar">
    <div class="nav-container">
        <a href="{{ url('/') }}" class="logo">Explore Wellawaya</a>
        <button class="mobile-menu-toggle" id="mobileMenuToggle">
            <i class="fas fa-bars"></i>
        </button>
        <ul class="nav-menu" id="navMenu">
            <li class="nav-search">
                <div class="search-wrapper">
                    <form action="{{ route('search.index') }}" method="GET" id="searchForm" style="display: flex; align-items: center; position: relative;">
                        <input type="text" placeholder="Search destinations, blogs..." name="q" id="navSearchInput" autocomplete="off">
                        <button type="submit" aria-label="Search">
                            <i class="fas fa-search"></i>
                        </button>
                    </form>
                    <div class="search-suggestions" id="searchSuggestions"></div>
                </div>
            </li>
            <li><a href="{{ url('/') }}#home" class="{{ request()->is('/') ? 'active' : '' }}">Home</a></li>
            <li><a href="{{ route('destinations.index') }}" class="{{ request()->routeIs('destinations.*') ? 'active' : '' }}">Destinations</a></li>
            <li><a href="{{ route('blog.index') }}" class="{{ request()->routeIs('blog.*') ? 'active' : '' }}">Blog</a></li>
            @guest
                <li><a href="{{ route('business-registration.form') }}" class="{{ request()->routeIs('business-registration.*') ? 'active' : '' }}">Register Business</a></li>
            @endguest
            <li><a href="{{ route('about.index') }}" class="{{ request()->routeIs('about.*') ? 'active' : '' }}">About</a></li>
            <li><a href="{{ url('/') }}#contact">Contact</a></li>
            @auth
                <li class="user-menu">
                    <div class="user-dropdown">
                        <button class="user-menu-toggle" id="userMenuToggle">
                            <i class="fas fa-user-circle"></i>
                            <span class="user-name">{{ Str::limit(auth()->user()->name, 15) }}</span>
                            <i class="fas fa-chevron-down"></i>
                        </button>
                        <div class="user-dropdown-menu" id="userDropdownMenu">
                            <div class="user-info">
                                <div class="user-avatar">
                                    <i class="fas fa-user"></i>
                                </div>
                                <div class="user-details">
                                    <div class="user-full-name">{{ auth()->user()->name }}</div>
                                    <div class="user-email">{{ auth()->user()->email }}</div>
                                    @if(auth()->user()->hasRole('admin'))
                                        <div class="user-role">
                                            <span class="role-badge role-admin">
                                                <i class="fas fa-shield-alt"></i> Admin
                                            </span>
                                        </div>
                                    @elseif(auth()->user()->hasRole('business_owner'))
                                        <div class="user-role">
                                            <span class="role-badge role-business">
                                                <i class="fas fa-building"></i> Business Owner
                                            </span>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="dropdown-divider"></div>
                            @if(auth()->user()->hasRole('admin'))
                                <a href="{{ route('admin.dashboard') }}" class="dropdown-item">
                                    <i class="fas fa-tachometer-alt"></i> Admin Dashboard
                                </a>
                            @elseif(auth()->user()->hasRole('business_owner'))
                                <a href="{{ route('business.dashboard') }}" class="dropdown-item">
                                    <i class="fas fa-building"></i> Business Dashboard
                                </a>
                            @endif
                            <a href="{{ route('profile.settings') }}" class="dropdown-item">
                                <i class="fas fa-cog"></i> Settings
                            </a>
                            <div class="dropdown-divider"></div>
                            <form method="POST" action="{{ route('logout') }}" class="dropdown-item-form">
                                @csrf
                                <button type="submit" class="dropdown-item logout-btn">
                                    <i class="fas fa-sign-out-alt"></i> Logout
                                </button>
                            </form>
                        </div>
                    </div>
                </li>
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
    
    .search-wrapper {
        position: relative;
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
        width: 300px;
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
        z-index: 10;
    }
    
    .nav-search button:hover {
        background: var(--secondary-color);
        transform: scale(1.05);
    }
    
    .nav-search button i {
        font-size: 0.85rem;
    }
    
    /* Search Suggestions Dropdown */
    .search-suggestions {
        position: absolute;
        top: 100%;
        left: 0;
        right: 0;
        background: var(--white);
        border-radius: 15px;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
        margin-top: 0.5rem;
        max-height: 400px;
        overflow-y: auto;
        z-index: 1000;
        display: none;
        min-width: 300px;
    }
    
    .search-suggestions.active {
        display: block;
    }
    
    .suggestion-item {
        padding: 1rem;
        border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        cursor: pointer;
        transition: all 0.2s ease;
        display: flex;
        align-items: center;
        gap: 1rem;
        text-decoration: none;
        color: var(--text-dark);
    }
    
    .suggestion-item:last-child {
        border-bottom: none;
    }
    
    .suggestion-item:hover {
        background: var(--light-bg);
        padding-left: 1.25rem;
    }
    
    .suggestion-icon {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--white);
        font-size: 1rem;
        flex-shrink: 0;
    }
    
    .suggestion-content {
        flex: 1;
        min-width: 0;
    }
    
    .suggestion-title {
        font-weight: 600;
        color: var(--primary-color);
        margin-bottom: 0.25rem;
        font-size: 0.95rem;
    }
    
    .suggestion-subtitle {
        font-size: 0.85rem;
        color: var(--text-light);
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    
    .suggestion-badge {
        display: inline-block;
        padding: 0.25rem 0.5rem;
        background: var(--light-bg);
        border-radius: 12px;
        font-size: 0.75rem;
        color: var(--secondary-color);
        font-weight: 600;
        text-transform: capitalize;
        margin-top: 0.25rem;
    }
    
    .no-suggestions {
        padding: 2rem;
        text-align: center;
        color: var(--text-light);
    }
    
    .mobile-menu-toggle {
        display: none;
        background: none;
        border: none;
        font-size: 1.5rem;
        color: var(--text-dark);
        cursor: pointer;
    }
    
    /* User Menu Dropdown */
    .user-menu {
        position: relative;
    }
    
    .user-dropdown {
        position: relative;
    }
    
    .user-menu-toggle {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        background: none;
        border: none;
        color: var(--text-dark);
        font-weight: 500;
        cursor: pointer;
        padding: 0.5rem 1rem;
        border-radius: 50px;
        transition: all 0.3s ease;
        font-family: 'Nunito', sans-serif;
        font-size: 0.95rem;
    }
    
    .user-menu-toggle:hover {
        background: var(--light-bg);
        color: var(--secondary-color);
    }
    
    .user-menu-toggle i.fa-user-circle {
        font-size: 1.5rem;
        color: var(--secondary-color);
    }
    
    .user-name {
        max-width: 100px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }
    
    .user-menu-toggle .fa-chevron-down {
        font-size: 0.75rem;
        transition: transform 0.3s ease;
    }
    
    .user-dropdown.active .user-menu-toggle .fa-chevron-down {
        transform: rotate(180deg);
    }
    
    .user-dropdown-menu {
        position: absolute;
        top: calc(100% + 0.5rem);
        right: 0;
        background: var(--white);
        border-radius: 15px;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
        min-width: 250px;
        opacity: 0;
        visibility: hidden;
        transform: translateY(-10px);
        transition: all 0.3s ease;
        z-index: 1000;
        overflow: hidden;
    }
    
    .user-dropdown.active .user-dropdown-menu {
        opacity: 1;
        visibility: visible;
        transform: translateY(0);
    }
    
    .user-info {
        padding: 1.5rem;
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        color: var(--white);
        display: flex;
        align-items: center;
        gap: 1rem;
    }
    
    .user-avatar {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.2);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        flex-shrink: 0;
    }
    
    .user-details {
        flex: 1;
        min-width: 0;
    }
    
    .user-full-name {
        font-weight: 600;
        font-size: 1rem;
        margin-bottom: 0.25rem;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    
    .user-email {
        font-size: 0.85rem;
        opacity: 0.9;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        margin-bottom: 0.5rem;
    }
    
    .user-role {
        margin-top: 0.5rem;
    }
    
    .role-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.25rem 0.75rem;
        border-radius: 12px;
        font-size: 0.75rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    
    .role-badge.role-admin {
        background: rgba(255, 215, 0, 0.2);
        color: var(--accent-color);
        border: 1px solid rgba(255, 215, 0, 0.3);
    }
    
    .role-badge.role-business {
        background: rgba(107, 142, 35, 0.2);
        color: rgba(255, 255, 255, 0.9);
        border: 1px solid rgba(255, 255, 255, 0.3);
    }
    
    .role-badge i {
        font-size: 0.7rem;
    }
    
    .dropdown-item {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        padding: 0.75rem 1.5rem;
        color: var(--text-dark);
        text-decoration: none;
        transition: all 0.2s ease;
        border: none;
        background: none;
        width: 100%;
        text-align: left;
        font-family: 'Nunito', sans-serif;
        font-size: 0.95rem;
        cursor: pointer;
    }
    
    .dropdown-item:hover {
        background: var(--light-bg);
        color: var(--secondary-color);
    }
    
    .dropdown-item i {
        width: 20px;
        text-align: center;
        color: var(--text-light);
    }
    
    .dropdown-item:hover i {
        color: var(--secondary-color);
    }
    
    .dropdown-item.logout-btn {
        color: #dc3545;
    }
    
    .dropdown-item.logout-btn:hover {
        background: #f8d7da;
        color: #721c24;
    }
    
    .dropdown-item.logout-btn i {
        color: #dc3545;
    }
    
    .dropdown-item.logout-btn:hover i {
        color: #721c24;
    }
    
    .dropdown-item-form {
        width: 100%;
    }
    
    .dropdown-divider {
        height: 1px;
        background: rgba(0, 0, 0, 0.1);
        margin: 0.5rem 0;
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
        
        .user-dropdown-menu {
            position: fixed;
            top: 70px;
            right: 1rem;
            left: 1rem;
            min-width: auto;
        }
        
        .user-menu-toggle {
            width: 100%;
            justify-content: space-between;
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

        // Dynamic Search with Autocomplete
        const searchInput = document.getElementById('navSearchInput');
        const searchSuggestions = document.getElementById('searchSuggestions');
        let searchTimeout;
        let currentRequest = null;

        if (searchInput && searchSuggestions) {
            // Handle input
            searchInput.addEventListener('input', function() {
                const query = this.value.trim();
                
                clearTimeout(searchTimeout);
                
                if (query.length < 2) {
                    searchSuggestions.classList.remove('active');
                    return;
                }
                
                searchTimeout = setTimeout(() => {
                    fetchSuggestions(query);
                }, 300);
            });

            // Handle focus
            searchInput.addEventListener('focus', function() {
                if (this.value.trim().length >= 2) {
                    fetchSuggestions(this.value.trim());
                }
            });

            // Close suggestions when clicking outside
            document.addEventListener('click', function(e) {
                if (!e.target.closest('.search-wrapper')) {
                    searchSuggestions.classList.remove('active');
                }
            });

            // Fetch suggestions from server
            function fetchSuggestions(query) {
                // Cancel previous request if still pending
                if (currentRequest) {
                    currentRequest.abort();
                }

                currentRequest = new AbortController();
                
                fetch(`{{ route('search.autocomplete') }}?q=${encodeURIComponent(query)}`, {
                    signal: currentRequest.signal,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    displaySuggestions(data);
                    currentRequest = null;
                })
                .catch(error => {
                    if (error.name !== 'AbortError') {
                        console.error('Search error:', error);
                    }
                    currentRequest = null;
                });
            }

            // Display suggestions
            function displaySuggestions(suggestions) {
                if (suggestions.length === 0) {
                    searchSuggestions.innerHTML = '<div class="no-suggestions">No results found</div>';
                    searchSuggestions.classList.add('active');
                    return;
                }

                let html = '';
                suggestions.forEach(item => {
                    html += `
                        <a href="${item.url}" class="suggestion-item">
                            <div class="suggestion-icon">
                                <i class="${item.icon}"></i>
                            </div>
                            <div class="suggestion-content">
                                <div class="suggestion-title">${escapeHtml(item.title)}</div>
                                <div class="suggestion-subtitle">${escapeHtml(item.subtitle || '')}</div>
                                ${item.category ? `<span class="suggestion-badge">${escapeHtml(item.category)}</span>` : ''}
                            </div>
                        </a>
                    `;
                });

                searchSuggestions.innerHTML = html;
                searchSuggestions.classList.add('active');
            }

            // Escape HTML to prevent XSS
            function escapeHtml(text) {
                const div = document.createElement('div');
                div.textContent = text;
                return div.innerHTML;
            }

            // User Dropdown Menu
            const userMenuToggle = document.getElementById('userMenuToggle');
            const userDropdown = document.querySelector('.user-dropdown');
            const userDropdownMenu = document.getElementById('userDropdownMenu');

            if (userMenuToggle && userDropdown) {
                userMenuToggle.addEventListener('click', function(e) {
                    e.stopPropagation();
                    userDropdown.classList.toggle('active');
                });

                // Close dropdown when clicking outside
                document.addEventListener('click', function(e) {
                    if (!e.target.closest('.user-dropdown')) {
                        userDropdown.classList.remove('active');
                    }
                });

                // Close dropdown on escape key
                document.addEventListener('keydown', function(e) {
                    if (e.key === 'Escape' && userDropdown.classList.contains('active')) {
                        userDropdown.classList.remove('active');
                    }
                });
            }

            // Handle keyboard navigation
            searchInput.addEventListener('keydown', function(e) {
                const items = searchSuggestions.querySelectorAll('.suggestion-item');
                const activeItem = searchSuggestions.querySelector('.suggestion-item.highlighted');
                
                if (e.key === 'ArrowDown') {
                    e.preventDefault();
                    if (activeItem) {
                        activeItem.classList.remove('highlighted');
                        const next = activeItem.nextElementSibling || items[0];
                        if (next) next.classList.add('highlighted');
                    } else if (items[0]) {
                        items[0].classList.add('highlighted');
                    }
                } else if (e.key === 'ArrowUp') {
                    e.preventDefault();
                    if (activeItem) {
                        activeItem.classList.remove('highlighted');
                        const prev = activeItem.previousElementSibling || items[items.length - 1];
                        if (prev) prev.classList.add('highlighted');
                    } else if (items[items.length - 1]) {
                        items[items.length - 1].classList.add('highlighted');
                    }
                } else if (e.key === 'Enter' && activeItem) {
                    e.preventDefault();
                    window.location.href = activeItem.href;
                } else if (e.key === 'Escape') {
                    searchSuggestions.classList.remove('active');
                }
            });
        }
    });
</script>

<style>
    .suggestion-item.highlighted {
        background: var(--light-bg);
        padding-left: 1.25rem;
    }
</style>

