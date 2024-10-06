<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        /* Top Bar Styling */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 50px;
            background-color: transparent;
        }

        .navbar .brand {
            font-size: 24px;
            font-weight: bold;
            color: #333;
        }

        .navbar ul {
            list-style: none;
            display: flex;
            gap: 20px;
        }

        .navbar ul li {
            font-size: 16px;
            color: #333;
        }

        .navbar ul li a {
            text-decoration: none;
            color: #333;
            font-weight: 500;
        }

        /* Login Button */
        .navbar .login a {
            text-decoration: none;
            font-weight: 500;
            color: #007bff; /* Plain text */
            padding: 0; /* No background */
            border: none; /* Remove border */
        }

        /* Become a Member Button without rounded corners */
        .navbar .cta-buttons .member-btn {
            background-color: #007bff;
            color: white;
            padding: 10px 25px;
            text-decoration: none;
            border-radius: 0px; /* No rounded corners */
            position: relative;
            font-weight: 500;
        }

        .navbar .cta-buttons .member-btn::after {
            content: '→';
            position: absolute;
            right: 15px;
            font-size: 18px;
        }

        .hero {
            background-image: url('{{ asset("images/hero-cover.3.jpg") }}');
            height: 600px;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            text-align: center;
            position: relative;
            z-index: 1;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.5); /* Add dark overlay */
            z-index: -1;
        }

        .hero h1 {
            font-size: 58px;
            font-weight: bold;
            margin-bottom: 20px;
            line-height: 1.2;
        }

        .hero p {
            font-size: 20px;
            margin-bottom: 30px;
            line-height: 1.5;
        }

        .cta-buttons a {
            background-color: #007bff;
            color: white;
            padding: 15px 30px;
            margin: 10px;
            text-decoration: none;
            border-radius: 50px;
            font-size: 18px;
        }

        .cta-buttons .learn-more {
            background-color: white;
            color: #007bff;
            border: 2px solid #007bff;
        }

        /* Features Section */
        .features {
            display: flex;
            justify-content: space-around;
            margin-top: -50px; /* Adjusted space between hero and boxes */
            padding: 0 50px;
            position: relative;
            z-index: 10;
        }

        .features .feature-box {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 6px 12px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 300px;
            position: relative;
        }

        .features .feature-box img {
            margin-bottom: 20px;
        }

        .features .feature-box h3 {
            font-size: 22px;
            font-weight: bold;
            margin-bottom: 15px;
        }

        .features .feature-box p {
            font-size: 16px;
            color: #777;
        }

        /* Last Box Styling */
        .features .feature-box:last-child {
            background-color: #007bff;
            color: white;
        }

        .features .feature-box:last-child h3,
        .features .feature-box:last-child p {
            color: white;
        }

        /* Space at the end */
        body {
            margin-bottom: 100px; /* Extra margin at the bottom */
        }

    </style>
</head>
<body>

    <!-- Top Bar -->
    <div class="navbar">
        <div class="brand">BrandName</div>
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">Product</a></li>
            <li><a href="#">Pricing</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
        <ul>
            <li><a href="#">Login</a></li>
            <div class="cta-buttons">
                <a href="#" class="member-btn">Become a Member</a>
            </div>
        </ul>
    </div>

    <!-- Hero Section -->
    <div class="hero">
        <div>
            <h1>Creating a Beautiful & Useful<br>Solutions</h1>
            <p>We know how large objects will act,<br>but things on a small scale just do not act that way.</p>
            <div class="cta-buttons">
                <a href="#" class="get-quote">Get Quote Now</a>
                <a href="#" class="learn-more">Learn More</a>
            </div>
        </div>
    </div>

    <!-- Features Section -->
    <div class="features">
        <div class="feature-box">
            <img src="{{ asset('images/icn resize icn-md.png') }}" alt="Investment Trading" width="50">
            <h3>Investment Trading</h3>
            <p>The quick fox jumps over the lazy dog</p>
        </div>
        <div class="feature-box">
            <img src="{{ asset('images/icn resize icn-md.png') }}" alt="Raising Funds" width="50">
            <h3>Raising Funds</h3>
            <p>The quick fox jumps over the lazy dog</p>
        </div>
        <div class="feature-box">
            <img src="{{ asset('images/icn resize icn-md-2.png') }}" alt="Financial Analysis" width="50">
            <h3>Financial Analysis</h3>
            <p>The quick fox jumps over the lazy dog</p>
        </div>
    </div>

</body>
</html>
