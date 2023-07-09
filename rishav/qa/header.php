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
            color: #333;
            text-decoration: none;
        }

        .header-links {
            display: flex;
            align-items: center;
        }

        .header-links a {
            margin-left: 20px;
            text-decoration: none;
            color: #333;
            font-weight: 500;
            font-size: 18px; /* Increased font size */
            transition: color 0.3s ease;
        }

        .header-links a:hover {
            color: #1976d2;
        }

        .login-button {
            margin-left: 20px;
            padding: 12px 20px; /* Adjusted padding */
            border: none;
            border-radius: 4px;
            background-color: #2196f3;
            color: #fff !important;
            font-weight: 500;
            text-decoration: none;
            transition: background-color 0.3s;
            font-size: 16px; /* Matched font size */
            cursor: pointer;
        }

        .login-button:hover {
            background-color: #1976d2;
        }

        .container {
            margin-top: 125px;
        }
    </style>
</head>
<body>
    <div class="header">
        <a href="home.php" class="logo">Jettrav</a>
        <div class="header-links">
            <a href="dashboard.php">Dashboard</a>
            <a href="survey.php">Survey</a>
            <a href="view.php">View Itinerary</a>
            <a href="itinerary.php">Create Itinerary</a>
            <?php
            session_start();
            if (isset($_SESSION['username'])) {
                // If the 'username' session variable is set, show the logout button
                echo '<a href="logout.php" class="login-button">Logout</a>';
            } else {
                // If the 'username' session variable is not set, show the login button
                echo '<a href="login.php" class="login-button" style="padding: 12px 20px;">Login</a>';
            }
            ?>
        </div>
    </div>
</body>
</html>
