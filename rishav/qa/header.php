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
            color: #333; /* Added color */
            text-decoration: none; /* Added text decoration */
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
            transition: color 0.3s ease;
        }

        .header-links a:hover {
            color: #1976d2;
        }

        .login-button {
            margin-left: 20px;
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            background-color: #1976d2;
            color: #fff;
            font-weight: 500;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .login-button:hover {
            background-color: #1565c0;
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
            <a href="dashboard.php" style="color: #1976d2;">Dashboard</a>
            <a href="survey.php">Survey</a>
            <a href="view.php">View Itinerary</a>
            <a href="itinerary.php">Create Itinerary</a>
            <?php
            if (isset($_SESSION['username'])) {
                // If the 'username' session variable is set, show the logout button
                echo '<a href="logout.php" class="login-button">Logout</a>';
            } else {
                // If the 'username' session variable is not set, show the login button
                echo '<a href="login.php" class="login-button">Login</a>';
            }
            ?>
        </div>
    </div>
</body>
</html>
