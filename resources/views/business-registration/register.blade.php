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

        /* Hide all fields in non-active sections */
        .form-section:not(.active) {
            position: absolute;
            left: -9999px;
            opacity: 0;
            pointer-events: none;
            visibility: hidden;
        }

        .form-section:not(.active) input,
        .form-section:not(.active) textarea,
        .form-section:not(.active) select {
            display: none !important;
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

        /* Responsive */
        @media (max-width: 768px) {
            body {
                padding: 1rem;
                padding-top: 100px;
            }

            .register-container {
                padding: 1.5rem;
                border-radius: 10px;
                margin: 0;
            }

            /* Header */
            .register-header {
                margin-bottom: 1.5rem;
            }

            .register-header h1 {
                font-size: 1.75rem;
                margin-bottom: 0.5rem;
            }

            .register-header p {
                font-size: 1rem;
            }

            /* Step Indicator */
            .step-indicator {
                flex-direction: column;
                gap: 0.75rem;
                margin-bottom: 2rem;
            }

            .step {
                width: 100%;
                justify-content: center;
                padding: 0.75rem 1rem;
            }

            .step span {
                font-size: 0.9rem;
            }

            .step-number {
                width: 28px;
                height: 28px;
                font-size: 0.9rem;
            }

            /* Category Selection */
            .category-selection {
                grid-template-columns: 1fr;
                gap: 0.75rem;
                margin-bottom: 1.5rem;
            }

            .category-card {
                padding: 1.25rem;
            }

            .category-card i {
                font-size: 2rem;
                margin-bottom: 0.75rem;
            }

            .category-card h3 {
                font-size: 1rem;
            }

            /* Form Section */
            .form-section {
                margin-bottom: 1.5rem;
            }

            .form-section h2 {
                font-size: 1.5rem;
                margin-bottom: 1.25rem;
            }

            /* Form Groups */
            .form-group {
                margin-bottom: 1.25rem;
            }

            .form-label {
                font-size: 0.95rem;
                margin-bottom: 0.4rem;
            }

            .form-control {
                padding: 0.7rem;
                font-size: 0.95rem;
                border-radius: 6px;
            }

            textarea.form-control {
                min-height: 90px;
            }

            /* Form Row */
            .form-row {
                grid-template-columns: 1fr;
                gap: 1rem;
            }

            .form-help {
                font-size: 0.8rem;
            }

            /* Alert */
            .alert {
                padding: 0.875rem;
                font-size: 0.9rem;
                margin-bottom: 1.25rem;
            }

            .error-message {
                font-size: 0.85rem;
                margin-top: 0.4rem;
            }

            /* Buttons */
            .btn {
                padding: 0.75rem 1.5rem;
                font-size: 0.95rem;
                width: 100%;
                text-align: center;
            }

            .form-actions {
                flex-direction: column-reverse;
                gap: 0.75rem;
                margin-top: 1.5rem;
            }

            .form-actions .btn {
                width: 100%;
            }

            /* Back Link */
            .back-link {
                margin-top: 1rem;
                font-size: 0.9rem;
                text-align: center;
                display: block;
            }

            .back-link a {
                font-size: 0.9rem;
                margin: 0.5rem 0.5rem 0.5rem 0;
            }

            /* Section Headers */
            .form-section h2 {
                font-size: 1.35rem;
            }
        }

        /* Extra Small Devices */
        @media (max-width: 480px) {
            body {
                padding: 0.75rem;
                padding-top: 90px;
            }

            .register-container {
                padding: 1.25rem;
            }

            .register-header h1 {
                font-size: 1.5rem;
            }

            .register-header p {
                font-size: 0.95rem;
            }

            .step {
                padding: 0.625rem 0.875rem;
            }

            .step span {
                font-size: 0.85rem;
            }

            .step-number {
                width: 24px;
                height: 24px;
                font-size: 0.85rem;
            }

            .category-card {
                padding: 1rem;
            }

            .category-card i {
                font-size: 1.75rem;
            }

            .category-card h3 {
                font-size: 0.95rem;
            }

            .form-control {
                padding: 0.625rem;
                font-size: 0.9rem;
            }

            .form-section h2 {
                font-size: 1.25rem;
            }

            .btn {
                padding: 0.7rem 1.25rem;
                font-size: 0.9rem;
            }

            .form-help {
                font-size: 0.75rem;
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

            <div class="back-link" style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 1rem;">
                <a href="{{ url('/') }}"><i class="fas fa-arrow-left"></i> Back to Website</a>
                @guest
                    <a href="{{ route('login') }}" style="color: var(--secondary-color); text-decoration: none; font-weight: 500; display: inline-flex; align-items: center; gap: 0.5rem;">
                        <i class="fas fa-sign-in-alt"></i> Login
                    </a>
                @endguest
            </div>
        </form>
    </div>

    <script>
        (function() {
            'use strict';

            const categoryCards = document.querySelectorAll('.category-card');
            const continueBtn = document.getElementById('continueBtn');
            const registrationTypeInput = document.getElementById('registration_type');
            const categorySection = document.getElementById('categorySection');
            const step1 = document.getElementById('step1');
            const step2 = document.getElementById('step2');
            const registrationForm = document.getElementById('registrationForm');

            let selectedType = '{{ old("registration_type") }}';

            // Function to disable all fields in hidden sections
            // Disabled fields are NOT validated by HTML5 validation
            function updateFieldStates() {
                const activeSection = document.querySelector('.form-section.active');
                const activeSectionId = activeSection ? activeSection.id : null;

                // First, disable ALL fields in ALL form sections
                document.querySelectorAll('.form-section').forEach(section => {
                    const inputs = section.querySelectorAll('input, textarea, select');

                    inputs.forEach(field => {
                        // Skip the hidden registration_type field - always enable it
                        if (field.id === 'registration_type' || field.name === 'registration_type') {
                            return;
                        }

                        // Disable all fields first
                        field.disabled = true;

                        // Also remove required to be safe (we'll add it back if needed)
                        if (field.hasAttribute('required')) {
                            field.dataset.hadRequired = 'true';
                            field.removeAttribute('required');
                        }
                    });
                });

                // Then, enable fields only in the active form section (not categorySection)
                if (activeSection && activeSectionId && activeSectionId !== 'categorySection') {
                    const inputs = activeSection.querySelectorAll('input, textarea, select');

                    inputs.forEach(field => {
                        // Skip the hidden registration_type field
                        if (field.id === 'registration_type' || field.name === 'registration_type') {
                            return;
                        }

                        // Enable fields in active form section
                        field.disabled = false;

                        // Restore required attribute if it originally had it
                        if (field.dataset.hadRequired === 'true') {
                            field.setAttribute('required', 'required');
                        }
                    });
                }
            }

            // Function to show a specific section
            function showSection(sectionId) {
                // Hide all sections
                document.querySelectorAll('.form-section').forEach(section => {
                    section.classList.remove('active');
                });

                // Show target section
                const targetSection = document.getElementById(sectionId);
                if (targetSection) {
                    targetSection.classList.add('active');
                }

                // Update field states (enable/disable)
                updateFieldStates();
            }

            // Initialize field states on page load
            updateFieldStates();

            // Initialize form state if there are validation errors
            @if($errors->any() && old('registration_type'))
                selectedType = '{{ old("registration_type") }}';
                registrationTypeInput.value = selectedType;

                // Show the appropriate section
                showSection('{{ old("registration_type") }}Section');
                step1.classList.remove('active');
                step2.classList.add('active');

                // Mark the selected category card
                categoryCards.forEach(card => {
                    if (card.dataset.type === selectedType) {
                        card.classList.add('active');
                    }
                });
            @endif

            // Category selection
            categoryCards.forEach(card => {
                card.addEventListener('click', function() {
                    categoryCards.forEach(c => c.classList.remove('active'));
                    this.classList.add('active');
                    selectedType = this.dataset.type;
                    registrationTypeInput.value = selectedType;
                    continueBtn.style.display = 'block';
                });
            });

            // Continue button handler
            continueBtn.addEventListener('click', function() {
                if (!selectedType) {
                    alert('Please select a business category first.');
                    return;
                }

                // Show selected form section
                showSection(selectedType + 'Section');
                step1.classList.remove('active');
                step2.classList.add('active');
                window.scrollTo(0, 0);
            });

            // Go back function
            window.goBack = function() {
                showSection('categorySection');
                step2.classList.remove('active');
                step1.classList.add('active');
                selectedType = '';
                registrationTypeInput.value = '';
                continueBtn.style.display = 'none';
                categoryCards.forEach(c => c.classList.remove('active'));
                window.scrollTo(0, 0);
            };

            // Form submission handler - must run BEFORE HTML5 validation
            registrationForm.addEventListener('submit', function(e) {
                // Validate registration type is selected
                if (!registrationTypeInput.value) {
                    e.preventDefault();
                    alert('Please select a business category first.');
                    return false;
                }

                // CRITICAL: Ensure only active section fields are enabled BEFORE validation
                // Disabled fields are NOT validated
                updateFieldStates();

                // Allow form to submit - HTML5 validation will only check enabled fields
                return true;
            }, false);
        })();
    </script>
</body>
</html>
