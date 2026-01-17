<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Business Dashboard - Explore Wellawaya</title>
    
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
        
        .header {
            background: var(--primary-color);
            color: white;
            padding: 1.5rem 2rem;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        
        .header-content {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .header h1 {
            font-size: 1.5rem;
            font-weight: 700;
        }
        
        .header-actions {
            display: flex;
            gap: 1rem;
            align-items: center;
        }
        
        .btn {
            padding: 0.5rem 1.5rem;
            border: none;
            border-radius: 8px;
            font-family: 'Nunito', sans-serif;
            font-size: 0.95rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }
        
        .btn-secondary {
            background: rgba(255, 255, 255, 0.2);
            color: white;
        }
        
        .btn-secondary:hover {
            background: rgba(255, 255, 255, 0.3);
        }
        
        .container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 2rem;
        }
        
        .welcome-card {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            margin-bottom: 2rem;
        }
        
        .welcome-card h2 {
            color: var(--primary-color);
            margin-bottom: 0.5rem;
        }
        
        .welcome-card p {
            color: var(--text-light);
        }
        
        .info-card {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            margin-bottom: 2rem;
        }
        
        .info-card h3 {
            color: var(--primary-color);
            margin-bottom: 1.5rem;
            padding-bottom: 1rem;
            border-bottom: 2px solid var(--border-color);
        }
        
        .info-row {
            display: grid;
            grid-template-columns: 150px 1fr;
            gap: 1rem;
            padding: 1rem 0;
            border-bottom: 1px solid var(--border-color);
        }
        
        .info-row:last-child {
            border-bottom: none;
        }
        
        .info-label {
            font-weight: 600;
            color: var(--text-dark);
        }
        
        .info-value {
            color: var(--text-light);
        }
        
        .status-badge {
            display: inline-block;
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-size: 0.875rem;
            font-weight: 600;
        }
        
        .status-pending {
            background: #fff3cd;
            color: #856404;
        }
        
        .status-approved {
            background: #d4edda;
            color: #155724;
        }
        
        .status-rejected {
            background: #f8d7da;
            color: #721c24;
        }
        
        @media (max-width: 768px) {
            .header-content {
                flex-direction: column;
                gap: 1rem;
            }
            
            .info-row {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="header-content">
            <h1><i class="fas fa-building"></i> Business Dashboard</h1>
            <div class="header-actions">
                <span>Welcome, {{ auth()->user()->name }}</span>
                <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                    @csrf
                    <button type="submit" class="btn btn-secondary">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </button>
                </form>
            </div>
        </div>
    </div>
    
    <div class="container">
        @if($business)
            <div class="welcome-card">
                <h2>Welcome to Your Business Dashboard</h2>
                <p>Manage your business information and track your registration status.</p>
            </div>
            
            <div class="info-card">
                <h3><i class="fas fa-info-circle"></i> Business Information</h3>
                
                <div class="info-row">
                    <div class="info-label">Business Name:</div>
                    <div class="info-value">{{ $business->name }}</div>
                </div>
                
                @if(isset($business->address))
                <div class="info-row">
                    <div class="info-label">Address:</div>
                    <div class="info-value">{{ $business->address }}</div>
                </div>
                @endif
                
                @if(isset($business->contact_email))
                <div class="info-row">
                    <div class="info-label">Contact Email:</div>
                    <div class="info-value">{{ $business->contact_email ?? 'N/A' }}</div>
                </div>
                @endif
                
                @if(isset($business->contact_phone))
                <div class="info-row">
                    <div class="info-label">Contact Phone:</div>
                    <div class="info-value">{{ $business->contact_phone ?? 'N/A' }}</div>
                </div>
                @endif
                
                <div class="info-row">
                    <div class="info-label">Status:</div>
                    <div class="info-value">
                        @if(isset($business->status))
                            @if($business->status === 'approved')
                                <span class="status-badge status-approved">Approved</span>
                            @elseif($business->status === 'rejected')
                                <span class="status-badge status-rejected">Rejected</span>
                            @else
                                <span class="status-badge status-pending">Pending Review</span>
                            @endif
                        @else
                            <span class="status-badge status-pending">Pending Review</span>
                        @endif
                    </div>
                </div>
                
                <div class="info-row">
                    <div class="info-label">Business Type:</div>
                    <div class="info-value">{{ ucwords(str_replace('_', ' ', $businessType)) }}</div>
                </div>
            </div>
        @else
            <div class="welcome-card">
                <h2>No Business Found</h2>
                <p>You don't have a registered business yet. Please register your business first.</p>
                <a href="{{ route('business-registration.form') }}" class="btn" style="background: var(--primary-color); color: white; margin-top: 1rem;">
                    Register Business
                </a>
            </div>
        @endif
    </div>
</body>
</html>

