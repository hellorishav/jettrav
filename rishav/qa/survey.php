<!DOCTYPE html>
<html>
<head>
    <title>JetTrav - Trip Information</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: 'Roboto', sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 400px;
            width: 100%;
            padding: 40px;
            background-color: #fff;
            border-radius: 4px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h1 {
            color: #333;
            margin-bottom: 40px;
        }

        input[type="text"],
        select {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: none;
            border-radius: 4px;
            background-color: #f5f5f5;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        input[type="text"]:focus,
        select:focus {
            background-color: #e0e0e0;
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
    </style>
</head>
<body>
    <div class="container">
        <h1>JetTrav - Trip Information</h1>
        <form>
            <input type="text" name="name" placeholder="Your Name" required>
            <input type="text" name="from" placeholder="Departure City" required>
            <input type="text" name="destination" placeholder="Destination" required>
            <input type="text" name="departure_date" placeholder="Departure Date" required>
            <input type="text" name="return_date" placeholder="Return Date" required>
            <input type="submit" value="Submit" onclick="window.location.href='https://www.google.com/'">
        </form>
    </div>
</body>
</html>
