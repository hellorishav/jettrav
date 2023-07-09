<!DOCTYPE html>
<html>
<head>
    <title>Jettrav</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500&display=swap">
    <style>
        body {
            margin: 0;
            padding: 0;
        }

        .header {
            background-color: #2196f3;
            color: #fff;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header-logo {
            font-size: 24px;
            font-weight: bold;
        }

        .header-links {
            display: flex;
            gap: 10px;
        }

        .header-links a {
            color: #fff;
            text-decoration: none;
            font-weight: bold;
        }

        .container {
            margin-top: 120px; /* Add top margin to the container to avoid overlapping with the header */
        }

        /* Additional CSS styles, if needed */
    </style>
</head>
<body>
    <div class="header">
        <div class="header-logo">Jettrav</div>
        <div class="header-links">
            <a href="login.php">Login</a>
            <a href="survey.php">Survey</a>
            <a href="view.php">View Itinerary</a>
            <a href="itinerary.php">Create Itinerary</a>
        </div>
    </div>
</body>
</html>
