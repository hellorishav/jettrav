<!DOCTYPE html>
<html>
<head>
    <title>Jettrav - Your Travel Companion</title>
    <style>
        /* Global styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        
        /* Header styles */
        header {
            background-color: #fff;
            padding: 10px;
        }
        
        nav ul {
            list-style: none;
            margin: 0;
            padding: 0;
        }
        
        nav ul li {
            display: inline-block;
            margin-right: 10px;
        }
        
        nav ul li a {
            text-decoration: none;
            color: #333;
        }
        
        /* Hero section styles */
        .hero {
            background-image: url('background.jpg');
            background-size: cover;
            background-position: center;
            height: 500px;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #fff;
            flex-direction: column;
        }
        
        .hero-content {
            text-align: center;
        }
        
        .hero-content h1 {
            font-size: 48px;
            margin-bottom: 20px;
        }
        
        .hero-content p {
            font-size: 24px;
            margin-bottom: 30px;
        }
        
        .btn {
            display: inline-block;
            padding: 12px 20px;
            background-color: #333;
            color: #fff;
            text-decoration: none;
            font-weight: bold;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        
        .btn:hover {
            background-color: #555;
        }
        
        /* Features section styles */
        .features {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 50px 0;
        }
        
        .feature {
            width: 33.33%;
            text-align: center;
        }
        
        .feature h2 {
            font-size: 24px;
            margin-bottom: 10px;
        }
        
        .feature p {
            font-size: 18px;
            margin-bottom: 20px;
        }
        
        /* Footer styles */
        footer {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
        }
    </style>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Destinations</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </nav>
    </header>
    
    <section class="hero">
        <div class="hero-content">
            <h1>Welcome to</h1>
            <h1 class="jettrav-heading">Jettrav</h1>
            <p>Your personalized travel planning platform</p>
            <a href="#" class="btn">Get Started</a>
        </div>
    </section>
    
    <section class="features">
        <div class="feature">
            <h2>Customize Your Trip</h2>
            <p>Take our survey to select your preferred destinations and activities for a personalized vacation experience.</p>
        </div>
        
        <div class="feature">
            <h2>Live Itinerary Updates</h2>
            <p>Stay informed about your upcoming activities and receive real-time updates about your trip itinerary.</p>
        </div>
        
        <div class="feature">
            <h2>24/7 Customer Support</h2>
            <p>Our friendly staff is always available to assist you during your trip. Reach out to us anytime through our messaging service.</p>
        </div>
    </section>
    
    <footer>
        <p>&copy; <?php echo date("Y"); ?> Jettrav. All rights reserved.</p>
    </footer>
</body>
</html>
