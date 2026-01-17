<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Settings - Explore Wellawaya</title>
    
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
            --border-color: #e9ecef;
        }
        
        body {
            font-family: 'Nunito', sans-serif;
            background: var(--light-bg);
            min-height: 100vh;
        }
        
        .main-content {
            margin-top: 80px;
            padding: 3rem 0;
        }
        
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 0 2rem;
        }
        
        .page-header {
            margin-bottom: 2rem;
        }
        
        .page-header h1 {
            font-size: 2.5rem;
            color: var(--primary-color);
            margin-bottom: 0.5rem;
        }
        
        .page-header p {
            color: var(--text-light);
        }
        
        .settings-card {
            background: var(--white);
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            padding: 2rem;
            margin-bottom: 2rem;
        }
        
        .settings-card h2 {
            font-size: 1.5rem;
            color: var(--primary-color);
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .settings-card h2 i {
            color: var(--secondary-color);
        }
        
        .form-group {
            margin-bottom: 1.5rem;
        }
        
        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
            color: var(--text-dark);
        }
        
        .form-control {
            width: 100%;
            padding: 0.75rem;
            border: 2px solid var(--border-color);
            border-radius: 8px;
            font-family: 'Nunito', sans-serif;
            font-size: 1rem;
            transition: all 0.3s ease;
        }
        
        .form-control:focus {
            outline: none;
            border-color: var(--secondary-color);
            box-shadow: 0 0 0 3px rgba(107, 142, 35, 0.1);
        }
        
        .btn {
            padding: 0.75rem 2rem;
            border: none;
            border-radius: 8px;
            font-family: 'Nunito', sans-serif;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }
        
        .btn-primary {
            background: var(--primary-color);
            color: var(--white);
        }
        
        .btn-primary:hover {
            background: var(--secondary-color);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }
        
        .alert {
            padding: 1rem;
            border-radius: 8px;
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
        
        .error-message {
            color: #dc3545;
            font-size: 0.875rem;
            margin-top: 0.5rem;
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
        
        @media (max-width: 768px) {
            .page-header h1 {
                font-size: 2rem;
            }
            
            .settings-card {
                padding: 1.5rem;
            }
        }
    </style>
</head>
<body>
    @include('partials.header')

    <main class="main-content">
        <div class="container">
            <a href="{{ url()->previous() }}" class="back-link">
                <i class="fas fa-arrow-left"></i> Back
            </a>

            <div class="page-header">
                <h1><i class="fas fa-cog"></i> Account Settings</h1>
                <p>Manage your account information and preferences</p>
            </div>

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul style="margin: 0; padding-left: 1.5rem;">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Profile Information -->
            <div class="settings-card">
                <h2><i class="fas fa-user"></i> Profile Information</h2>
                <form method="POST" action="{{ route('profile.update') }}">
                    @csrf
                    <div class="form-group">
                        <label class="form-label" for="name">Full Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $user->name) }}" required>
                        @error('name')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="email">Email Address</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $user->email) }}" required>
                        @error('email')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Update Profile
                    </button>
                </form>
            </div>

            <!-- Change Password -->
            <div class="settings-card">
                <h2><i class="fas fa-lock"></i> Change Password</h2>
                <form method="POST" action="{{ route('profile.update-password') }}">
                    @csrf
                    <div class="form-group">
                        <label class="form-label" for="current_password">Current Password</label>
                        <input type="password" class="form-control @error('current_password') is-invalid @enderror" id="current_password" name="current_password" required>
                        @error('current_password')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="password">New Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
                        @error('password')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="password_confirmation">Confirm New Password</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                    </div>

                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-key"></i> Update Password
                    </button>
                </form>
            </div>
        </div>
    </main>
</body>
</html>

