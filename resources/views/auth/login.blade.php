<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Explore Wellawaya Admin</title>

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
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
        }

        .login-container {
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
            padding: 3rem;
            width: 100%;
            max-width: 450px;
        }

        .login-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .login-header h1 {
            color: var(--primary-color);
            font-size: 2rem;
            margin-bottom: 0.5rem;
        }

        .login-header p {
            color: var(--text-light);
            font-size: 0.95rem;
        }

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

        .form-check {
            display: flex;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .form-check input {
            margin-right: 0.5rem;
        }

        .btn {
            width: 100%;
            padding: 0.875rem;
            border: none;
            border-radius: 8px;
            font-family: 'Nunito', sans-serif;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-primary {
            background: var(--primary-color);
            color: white;
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

        .alert-danger {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        .login-footer {
            text-align: center;
            margin-top: 2rem;
            padding-top: 2rem;
            border-top: 1px solid var(--border-color);
        }

        .login-footer a {
            color: var(--secondary-color);
            text-decoration: none;
            font-weight: 500;
        }

        .login-footer a:hover {
            text-decoration: underline;
        }

        .error-message {
            color: #dc3545;
            font-size: 0.875rem;
            margin-top: 0.5rem;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-header">
            <h1><i class="fas fa-sign-in-alt"></i> Login</h1>
            <p>Welcome to Explore Wellawaya</p>
            <p style="font-size: 0.85rem; margin-top: 0.5rem;">Login as Admin or Business Owner</p>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul style="margin: 0; padding-left: 1.5rem;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group">
                <label class="form-label" for="email">Email Address</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required autofocus>
                @error('email')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label class="form-label" for="password">Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
                @error('password')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                <label class="form-check-label" for="remember">Remember me</label>
            </div>

            <button type="submit" class="btn btn-primary">
                <i class="fas fa-sign-in-alt"></i> Login
            </button>
        </form>

        <div class="login-footer">
            <p>Don't have an account? <a href="{{ route('register') }}">Register here</a></p>
            <p style="margin-top: 0.5rem;"><a href="{{ url('/') }}">← Back to Website</a></p>
        </div>
    </div>
</body>
</html>


