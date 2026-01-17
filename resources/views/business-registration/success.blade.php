<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Successful - Explore Wellawaya</title>

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

        body {
            font-family: 'Nunito', sans-serif;
            background: linear-gradient(135deg, #2d5016 0%, #6b8e23 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
        }

        .success-container {
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
            padding: 3rem;
            text-align: center;
            max-width: 600px;
        }

        .success-icon {
            font-size: 5rem;
            color: #28a745;
            margin-bottom: 1rem;
        }

        h1 {
            color: #2d5016;
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }

        p {
            color: #7f8c8d;
            font-size: 1.1rem;
            margin-bottom: 2rem;
        }

        .btn {
            padding: 0.875rem 2rem;
            border: none;
            border-radius: 8px;
            font-family: 'Nunito', sans-serif;
            font-size: 1rem;
            font-weight: 500;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            background: #2d5016;
            color: white;
            transition: all 0.3s ease;
        }

        .btn:hover {
            background: #6b8e23;
        }
    </style>
</head>
<body>
    <div class="success-container">
        <div class="success-icon">
            <i class="fas fa-check-circle"></i>
        </div>
        <h1>Registration Successful!</h1>
        <p>Thank you for registering your business with Explore Wellawaya. Your registration is pending approval. We will review your application and contact you soon.</p>
        <a href="{{ url('/') }}" class="btn">
            <i class="fas fa-home"></i> Back to Home
        </a>
    </div>
</body>
</html>

