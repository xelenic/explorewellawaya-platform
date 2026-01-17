<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Business Registration - Explore Wellawaya</title>

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
            padding: 2rem;
            padding-top: 100px;
        }

        .register-container {
            max-width: 900px;
            margin: 0 auto;
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
            padding: 3rem;
        }

        .register-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .register-header h1 {
            color: var(--primary-color);
            font-size: 2.5rem;
            margin-bottom: 0.5rem;
        }

        .register-header p {
            color: var(--text-light);
            font-size: 1.1rem;
        }

        .step-indicator {
            display: flex;
            justify-content: center;
            margin-bottom: 3rem;
            gap: 1rem;
        }

        .step {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.75rem 1.5rem;
            border-radius: 50px;
            background: var(--light-bg);
            color: var(--text-light);
            font-weight: 500;
        }

        .step.active {
            background: var(--primary-color);
            color: white;
        }

        .step-number {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.3);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
        }

        .step.active .step-number {
            background: rgba(255, 255, 255, 0.2);
        }

        .category-selection {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .category-card {
            border: 2px solid var(--border-color);
            border-radius: 10px;
            padding: 1.5rem;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .category-card:hover {
            border-color: var(--secondary-color);
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .category-card.active {
            border-color: var(--primary-color);
            background: var(--light-bg);
        }

        .category-card i {
            font-size: 2.5rem;
            color: var(--secondary-color);
            margin-bottom: 1rem;
        }

        .category-card h3 {
            color: var(--text-dark);
            font-size: 1.1rem;
            margin-bottom: 0.5rem;
        }

        .category-card.active i,
        .category-card.active h3 {
            color: var(--primary-color);
        }

        .form-section {
            display: none;
        }

        .form-section.active {
            display: block;
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

        .form-label .required {
            color: #dc3545;
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

        textarea.form-control {
            min-height: 100px;
            resize: vertical;
        }

        .form-check {
            display: flex;
            align-items: center;
            margin-bottom: 0.5rem;
        }

        .form-check input {
            margin-right: 0.5rem;
        }

        .form-row {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1rem;
        }

        .form-help {
            font-size: 0.875rem;
            color: var(--text-light);
            margin-top: 0.25rem;
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

        .btn {
            padding: 0.875rem 2rem;
            border: none;
            border-radius: 8px;
            font-family: 'Nunito', sans-serif;
            font-size: 1rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }

        .btn-primary {
            background: var(--primary-color);
            color: white;
        }

        .btn-primary:hover {
            background: var(--secondary-color);
        }

        .btn-secondary {
            background: var(--text-light);
            color: white;
        }

        .btn-secondary:hover {
            background: #6c757d;
        }

        .form-actions {
            display: flex;
            gap: 1rem;
            margin-top: 2rem;
            justify-content: flex-end;
        }

        .back-link {
            display: inline-block;
            margin-top: 1rem;
            color: var(--secondary-color);
            text-decoration: none;
        }

        .back-link:hover {
            color: var(--primary-color);
        }

        @media (max-width: 768px) {
            body {
                padding-top: 120px;
            }

            .register-container {
                padding: 2rem 1rem;
            }

            .category-selection {
                grid-template-columns: 1fr;
            }

            .form-row {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    @include('partials.header')

    <div class="register-container">
        <div class="register-header">
            <h1><i class="fas fa-building"></i> Business Registration</h1>
            <p>Register your business or service with Explore Wellawaya</p>
        </div>

        <div class="step-indicator">
            <div class="step active" id="step1">
                <div class="step-number">1</div>
                <span>Select Category</span>
            </div>
            <div class="step" id="step2">
                <div class="step-number">2</div>
                <span>Fill Details</span>
            </div>
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

        <form method="POST" action="{{ route('business-registration.submit') }}" id="registrationForm">
            @csrf
            <input type="hidden" name="registration_type" id="registration_type" value="">

            <!-- Category Selection -->
            <div class="form-section active" id="categorySection">
                <h2 style="margin-bottom: 1.5rem; color: var(--primary-color);">Select Your Business Type</h2>
                <div class="category-selection">
                    <div class="category-card" data-type="hotel">
                        <i class="fas fa-hotel"></i>
                        <h3>Hotel</h3>
                    </div>
                    <div class="category-card" data-type="guide">
                        <i class="fas fa-user-tie"></i>
                        <h3>Guide</h3>
                    </div>
                    <div class="category-card" data-type="travel_agency">
                        <i class="fas fa-plane"></i>
                        <h3>Travel Agency</h3>
                    </div>
                    <div class="category-card" data-type="passenger_transport">
                        <i class="fas fa-bus"></i>
                        <h3>Passenger Transport</h3>
                    </div>
                    <div class="category-card" data-type="social_media_activist">
                        <i class="fas fa-share-alt"></i>
                        <h3>Social Media Activist</h3>
                    </div>
                    <div class="category-card" data-type="restaurant">
                        <i class="fas fa-utensils"></i>
                        <h3>Restaurant</h3>
                    </div>
                    <div class="category-card" data-type="handy_craft">
                        <i class="fas fa-hammer"></i>
                        <h3>Handy Craft</h3>
                    </div>
                    <div class="category-card" data-type="innovation">
                        <i class="fas fa-lightbulb"></i>
                        <h3>Innovation</h3>
                    </div>
                    <div class="category-card" data-type="cultured_sector">
                        <i class="fas fa-theater-masks"></i>
                        <h3>Cultured Sector</h3>
                    </div>
                    <div class="category-card" data-type="translator">
                        <i class="fas fa-language"></i>
                        <h3>Translator</h3>
                    </div>
                    <div class="category-card" data-type="mass_media">
                        <i class="fas fa-tv"></i>
                        <h3>Mass Media</h3>
                    </div>
                    <div class="category-card" data-type="experience_provider">
                        <i class="fas fa-star"></i>
                        <h3>Experience Provider</h3>
                    </div>
                </div>
                <div class="form-actions" style="justify-content: center;">
                    <button type="button" class="btn btn-primary" id="continueBtn" style="display: none;">
                        Continue <i class="fas fa-arrow-right"></i>
                    </button>
                </div>
            </div>

            <!-- Hotel Form -->
            @include('business-registration.forms.hotel')

            <!-- Guide Form -->
            @include('business-registration.forms.guide')

            <!-- Travel Agency Form -->
            @include('business-registration.forms.travel_agency')

            <!-- Passenger Transport Form -->
            @include('business-registration.forms.passenger_transport')

            <!-- Social Media Activist Form -->
            @include('business-registration.forms.social_media_activist')

            <!-- Restaurant Form -->
            @include('business-registration.forms.restaurant')

            <!-- Handy Craft Form -->
            @include('business-registration.forms.handy_craft')

            <!-- Innovation Form -->
            @include('business-registration.forms.innovation')

            <!-- Cultured Sector Form -->
            @include('business-registration.forms.cultured_sector')

            <!-- Translator Form -->
            @include('business-registration.forms.translator')

            <!-- Mass Media Form -->
            @include('business-registration.forms.mass_media')

            <!-- Experience Provider Form -->
            @include('business-registration.forms.experience_provider')

            <div class="back-link">
                <a href="{{ url('/') }}"><i class="fas fa-arrow-left"></i> Back to Website</a>
            </div>
        </form>
    </div>

    <script>
        // Category selection
        const categoryCards = document.querySelectorAll('.category-card');
        const continueBtn = document.getElementById('continueBtn');
        const registrationTypeInput = document.getElementById('registration_type');
        const categorySection = document.getElementById('categorySection');
        const step1 = document.getElementById('step1');
        const step2 = document.getElementById('step2');

        let selectedType = '';

        categoryCards.forEach(card => {
            card.addEventListener('click', function() {
                categoryCards.forEach(c => c.classList.remove('active'));
                this.classList.add('active');
                selectedType = this.dataset.type;
                registrationTypeInput.value = selectedType;
                continueBtn.style.display = 'block';
            });
        });

        continueBtn.addEventListener('click', function() {
            if (!selectedType) return;

            categorySection.classList.remove('active');
            document.getElementById(selectedType + 'Section').classList.add('active');
            step1.classList.remove('active');
            step2.classList.add('active');
            window.scrollTo(0, 0);
        });

        function goBack() {
            document.querySelectorAll('.form-section').forEach(section => {
                section.classList.remove('active');
            });
            categorySection.classList.add('active');
            step2.classList.remove('active');
            step1.classList.add('active');
            selectedType = '';
            registrationTypeInput.value = '';
            continueBtn.style.display = 'none';
            categoryCards.forEach(c => c.classList.remove('active'));
            window.scrollTo(0, 0);
        }
    </script>
</body>
</html>

