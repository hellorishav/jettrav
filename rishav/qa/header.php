<!DOCTYPE html>
<html>
<head>
    <title>Jettrav</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500&display=swap">
    <style>
        /* CSS styles for the header */

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 9999;
        }

        .logo {
            font-weight: bold;
            font-size: 24px;
        }

        .header-links {
            display: flex;
            align-items: center;
        }

        .header-links a {
            margin-left: 20px;
            text-decoration: none;
            color: #333;
        }

        .header-links a:hover {
            color: #1976d2;
        }

        /* Additional styles */

        body {
            margin-top: 60px; /* Add top margin to the body to avoid overlapping with the header */
        }

        .container {
            margin-top: 120px; /* Add top margin to the container to avoid overlapping with the header */
        }
        
    </style>
</head>
<body>
    <div class="header">
        <div class="logo">Jettrav</div>
        <div class="header-links">
            <a href="login.php">Login</a>
            <a href="survey.php">Survey</a>
            <a href="view.php">View Itinerary</a>
            <a href="itinerary.php">Create Itinerary</a>
        </div>
    </div>
</body>
</html>
