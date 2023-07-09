<head>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500&display=swap">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 400px;
            padding: 40px;
            margin: 50px auto;
            background-color: #fff;
            border-radius: 4px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333;
            margin-bottom: 20px;
        }

        input[type="text"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 4px;
            background-color: #f5f5f5;
            font-size: 16px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #2196f3;
            color: #fff;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #1976d2;
        }

        .itinerary-container {
            margin-top: 20px;
        }

        .itinerary-item {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            background-color: #f5f5f5;
            margin-bottom: 10px;
        }

        .error-message {
            color: #ff0000;
            margin-bottom: 10px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .logo {
            font-weight: bold;
            font-size: 24px;
        }

        .header-links a {
            margin-left: 20px;
            text-decoration: none;
            color: #333;
        }

        .header-links a:hover {
            color: #1976d2;
        }
    </style>
</head>
    <div class="header">
        <div class="logo">Jettrav</div>
        <div class="header-links">
            <a href="login.php">Login</a>
            <a href="survey.php">Survey</a>
            <a href="view.php">View Itinerary</a>
            <a href="itinerary.php">Create Itinerary</a>
        </div>
    </div>
