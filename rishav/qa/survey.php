<!DOCTYPE html>
<html>
<head>
    <title>JetTrav - Trip Information</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h1 {
            color: #333;
            margin-bottom: 20px;
        }

        input[type="text"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
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
