<!DOCTYPE html>
<html>
<?php include 'header.php'; ?>
<head>
    <title>Home</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
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

        .card-container {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            max-width: 800px;
        }

        .card {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .card i {
            font-size: 48px;
            color: #333;
            margin-bottom: 20px;
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
            width: 200px;
        }

        .card a:hover {
            background-color: #1976d2;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card-container">
            <div class="card">
                <i class="material-icons">login</i>
                <h1>Login</h1>
                <a href="login.php">Go to Login</a>
            </div>
            <div class="card">
                <i class="material-icons">survey</i>
                <h1>Survey</h1>
                <a href="survey.php">Take Survey</a>
            </div>
            <div class="card">
                <i class="material-icons">visibility</i>
                <h1>View Itinerary</h1>
                <a href="view.php">View Itinerary</a>
            </div>
            <div class="card">
                <i class="material-icons">add_circle</i>
                <h1>Create Itinerary</h1>
                <a href="itinerary.php">Create Itinerary</a>
            </div>
        </div>
    </div>
</body>
</html>
