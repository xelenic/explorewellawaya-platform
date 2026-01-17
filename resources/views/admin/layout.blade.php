<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel') - Explore Wellawaya</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />

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
            --border-color: #e9ecef;
            --sidebar-bg: #2c3e50;
            --sidebar-hover: #34495e;
        }

        body {
            font-family: 'Nunito', sans-serif;
            color: var(--text-dark);
            background: var(--light-bg);
            line-height: 1.6;
        }

        .admin-wrapper {
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar */
        .sidebar {
            width: 260px;
            background: var(--sidebar-bg);
            color: white;
            position: fixed;
            height: 100vh;
            overflow-y: auto;
            transition: transform 0.3s ease;
            z-index: 1000;
        }

        .sidebar-header {
            padding: 1.5rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .sidebar-header h2 {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--accent-color);
        }

        .sidebar-menu {
            list-style: none;
            padding: 1rem 0;
        }

        .sidebar-menu li {
            margin: 0.25rem 0;
        }

        .sidebar-menu a {
            display: flex;
            align-items: center;
            padding: 0.875rem 1.5rem;
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .sidebar-menu a:hover,
        .sidebar-menu a.active {
            background: var(--sidebar-hover);
            color: white;
            padding-left: 2rem;
        }

        .sidebar-menu a i {
            width: 20px;
            margin-right: 0.75rem;
        }

        /* Main Content */
        .main-content {
            flex: 1;
            margin-left: 260px;
            min-height: 100vh;
        }

        /* Top Navbar */
        .top-navbar {
            background: white;
            padding: 1rem 2rem;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar-left {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .menu-toggle {
            display: none;
            background: none;
            border: none;
            font-size: 1.5rem;
            color: var(--text-dark);
            cursor: pointer;
        }

        .navbar-right {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .user-menu {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            cursor: pointer;
            padding: 0.5rem;
            border-radius: 8px;
            transition: background 0.3s ease;
        }

        .user-menu:hover {
            background: var(--light-bg);
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: var(--secondary-color);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
        }

        /* Content Area */
        .content-area {
            padding: 2rem;
        }

        .page-header {
            margin-bottom: 2rem;
        }

        .page-header h1 {
            font-size: 2rem;
            font-weight: 700;
            color: var(--primary-color);
            margin-bottom: 0.5rem;
        }

        .breadcrumb {
            color: var(--text-light);
            font-size: 0.9rem;
        }

        /* Cards */
        .card {
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .card-header {
            padding-bottom: 1rem;
            margin-bottom: 1rem;
            border-bottom: 1px solid var(--border-color);
        }

        .card-header h3 {
            font-size: 1.25rem;
            font-weight: 600;
            color: var(--text-dark);
        }

        /* Buttons */
        .btn {
            display: inline-block;
            padding: 0.625rem 1.25rem;
            border-radius: 6px;
            text-decoration: none;
            font-weight: 500;
            cursor: pointer;
            border: none;
            transition: all 0.3s ease;
            font-family: 'Nunito', sans-serif;
        }

        .btn-primary {
            background: var(--primary-color);
            color: white;
        }

        .btn-primary:hover {
            background: var(--secondary-color);
        }

        .btn-success {
            background: #28a745;
            color: white;
        }

        .btn-success:hover {
            background: #218838;
        }

        .btn-danger {
            background: #dc3545;
            color: white;
        }

        .btn-danger:hover {
            background: #c82333;
        }

        .btn-secondary {
            background: var(--text-light);
            color: white;
        }

        .btn-secondary:hover {
            background: #6c757d;
        }

        /* Tables */
        .table {
            width: 100%;
            border-collapse: collapse;
            background: white;
        }

        .table thead {
            background: var(--light-bg);
        }

        .table th,
        .table td {
            padding: 1rem;
            text-align: left;
            border-bottom: 1px solid var(--border-color);
        }

        .table th {
            font-weight: 600;
            color: var(--text-dark);
        }

        .table tbody tr:hover {
            background: var(--light-bg);
        }

        /* Forms */
        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: var(--text-dark);
        }

        .form-control {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid var(--border-color);
            border-radius: 6px;
            font-family: 'Nunito', sans-serif;
            font-size: 1rem;
            transition: border-color 0.3s ease;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--secondary-color);
            box-shadow: 0 0 0 3px rgba(107, 142, 35, 0.1);
        }

        .form-check {
            display: flex;
            align-items: center;
            margin-bottom: 0.5rem;
        }

        .form-check input {
            margin-right: 0.5rem;
        }

        /* Alerts */
        .alert {
            padding: 1rem;
            border-radius: 6px;
            margin-bottom: 1.5rem;
        }

        .alert-success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .alert-danger {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        /* Stats Cards */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .stat-card {
            background: white;
            border-radius: 8px;
            padding: 1.5rem;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .stat-card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }

        .stat-card-icon {
            width: 50px;
            height: 50px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: white;
        }

        .stat-card-value {
            font-size: 2rem;
            font-weight: 700;
            color: var(--text-dark);
        }

        .stat-card-label {
            color: var(--text-light);
            font-size: 0.9rem;
        }

        /* Badges */
        .badge {
            display: inline-block;
            padding: 0.25rem 0.75rem;
            border-radius: 12px;
            font-size: 0.875rem;
            font-weight: 500;
        }

        .badge-primary {
            background: #e3f2fd;
            color: #1976d2;
        }

        .badge-success {
            background: #e8f5e9;
            color: #388e3c;
        }

        /* Actions */
        .actions {
            display: flex;
            gap: 0.5rem;
        }

        .btn-sm {
            padding: 0.375rem 0.75rem;
            font-size: 0.875rem;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
            }

            .sidebar.active {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
            }

            .menu-toggle {
                display: block;
            }

            .content-area {
                padding: 1rem;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>

    @stack('styles')
</head>
<body>
    <div class="admin-wrapper">
        <!-- Sidebar -->
        <aside class="sidebar" id="sidebar">
            <div class="sidebar-header">
                <h2><i class="fas fa-shield-alt"></i> Admin Panel</h2>
            </div>
            <ul class="sidebar-menu">
                <li>
                    <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        <i class="fas fa-home"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.users.index') }}" class="{{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                        <i class="fas fa-users"></i>
                        <span>Users</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.roles.index') }}" class="{{ request()->routeIs('admin.roles.*') ? 'active' : '' }}">
                        <i class="fas fa-user-shield"></i>
                        <span>Roles</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.permissions.index') }}" class="{{ request()->routeIs('admin.permissions.*') ? 'active' : '' }}">
                        <i class="fas fa-key"></i>
                        <span>Permissions</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.blogs.index') }}" class="{{ request()->routeIs('admin.blogs.*') ? 'active' : '' }}">
                        <i class="fas fa-blog"></i>
                        <span>Blog Posts</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.destinations.index') }}" class="{{ request()->routeIs('admin.destinations.*') ? 'active' : '' }}">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>Destinations</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/') }}" target="_blank">
                        <i class="fas fa-external-link-alt"></i>
                        <span>View Website</span>
                    </a>
                </li>
            </ul>
        </aside>

        <!-- Main Content -->
        <div class="main-content">
            <!-- Top Navbar -->
            <nav class="top-navbar">
                <div class="navbar-left">
                    <button class="menu-toggle" id="menuToggle">
                        <i class="fas fa-bars"></i>
                    </button>
                    <div class="page-title">
                        @yield('page-title', 'Dashboard')
                    </div>
                </div>
                <div class="navbar-right">
                    <div style="display: flex; align-items: center; gap: 1rem;">
                        <div>
                            <div style="font-weight: 600; text-align: right;">{{ auth()->user()->name }}</div>
                            <div style="font-size: 0.875rem; color: var(--text-light); text-align: right;">{{ auth()->user()->email }}</div>
                        </div>
                        <div class="user-avatar">
                            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                        </div>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-danger">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </button>
                        </form>
                    </div>
                </div>
            </nav>

            <!-- Content Area -->
            <div class="content-area">
                @if(session('success'))
                    <div class="alert alert-success">
                        <i class="fas fa-check-circle"></i> {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger">
                        <i class="fas fa-exclamation-circle"></i> {{ session('error') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul style="margin: 0; padding-left: 1.5rem;">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @yield('content')
            </div>
        </div>
    </div>

    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    
    <script>
        // Mobile menu toggle
        document.getElementById('menuToggle')?.addEventListener('click', function() {
            document.getElementById('sidebar').classList.toggle('active');
        });
    </script>

    @stack('scripts')
</body>
</html>

