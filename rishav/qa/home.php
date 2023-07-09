<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500&display=swap">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .card {
            width: 400px;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .card h1 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #333;
        }

        .card a {
            display: block;
            margin-bottom: 12px;
            padding: 12px 0;
            background-color: #2196f3;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            font-size: 18px;
            transition: background-color 0.3s;
        }

        .card a:hover {
            background-color: #1976d2;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <h1>Welcome to the Website!</h1>
            <a href="login.php">Login</a>
            <a href="survey.php">Survey</a>
            <a href="view.php">View Itinerary</a>
            <a href="itinerary.php">Create Itinerary</a>
        </div>
    </div>
</body>
</html>
