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

        .form-group {
            margin-bottom: 24px;
        }

        label {
            display: block;
            color: #888;
            margin-bottom: 8px;
            font-size: 14px;
            text-align: left;
        }

        .material-icons {
            vertical-align: middle;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>JetTrav - Trip Information</h1>
        <form>
            <div class="form-group">
                <label for="name"><i class="material-icons">person</i> Your Name</label>
                <input type="text" id="name" name="name" placeholder="Your Name" required>
            </div>
            <div class="form-group">
                <label for="from"><i class="material-icons">flight_takeoff</i> Departure City</label>
                <input type="text" id="from" name="from" placeholder="Departure City" required>
            </div>
            <div class="form-group">
                <label for="destination"><i class="material-icons">flight_land</i> Destination</label>
                <input type="text" id="destination" name="destination" placeholder="Destination" required>
            </div>
            <div class="form-group">
                <label for="departure_date"><i class="material-icons">calendar_today</i> Departure Date</label>
                <input type="text" id="departure_date" name="departure_date" placeholder="Departure Date" required>
            </div>
            <div class="form-group">
                <label for="return_date"><i class="material-icons">calendar_today</i> Return Date</label>
                <input type="text" id="return_date" name="return_date" placeholder="Return Date" required>
            </div>
            <input type="submit" value="Submit" onclick="window.location.href='https://www.google.com/'">
        </form>
    </div>
</body>
</html>
