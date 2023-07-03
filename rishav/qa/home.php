<!DOCTYPE html>
<html>
<head>
    <title>JetTrav - Trip Information</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
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
            overflow-y: auto;
            max-height: 80vh; /* Adjust the max-height as needed */
        }

        h1 {
            color: #333;
            margin-bottom: 40px;
        }

        input[type="text"],
        select,
        textarea {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: none;
            border-radius: 4px;
            background-color: #f5f5f5;
            font-size: 16px;
            transition: background-color 0.3s;
            box-sizing: border-box;
        }

        input[type="text"]:focus,
        select:focus,
        textarea:focus {
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
            text-align: left;
        }

        label {
            display: block;
            color: #888;
            margin-bottom: 8px;
            font-size: 14px;
        }

        .material-icons {
            vertical-align: middle;
        }

        .confirmation-message {
            display: none;
            color: #333;
            margin-bottom: 40px;
            font-size: 24px;
            line-height: 32px;
        }

        .confirmation-icon {
            font-size: 48px;
            color: #4caf50;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>JetTrav - Trip Information</h1>
        <div class="confirmation-message">
            <?php if (isset($_GET['confirm']) && $_GET['confirm'] === 'true') : ?>
                <?php
                $servername = "localhost";
                $username = "u947421468_jettrav";
                $password = "Jettrav@capstone1";
                $dbname = "u947421468_jettrav";

                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $name = $_POST['name'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $from_city = $_POST['from'];
                $destination_city = $_POST['destination'];
                $departure_date = date('Y-m-d', strtotime($_POST['departure_date']));
                $return_date = date('Y-m-d', strtotime($_POST['return_date']));
                $citizenship = $_POST['citizenship'];
                $additional_details = $_POST['additional_details'];

                $sql = "INSERT INTO leads (name, email, phone, from_city, destination_city, departure_date, return_date, citizenship, additional_details)
                        VALUES ('$name', '$email', '$phone', '$from_city', '$destination_city', '$departure_date', '$return_date', '$citizenship', '$additional_details')";

                if ($conn->query($sql) === TRUE) {
                    $last_id = $conn->insert_id;
                    echo "<div class='confirmation-icon'>
                            <i class='material-icons'>check_circle</i>
                        </div>
                        <p>We have received your submission with ID: <strong>$last_id</strong>. We'll get back to you shortly.</p>";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }

                $conn->close();
                ?>
            <?php else: ?>
                <p>We have received your submission and we'll get back to you shortly.</p>
            <?php endif; ?>
        </div>
        <form method="post" action="?confirm=true">
            <div class="form-group">
                <label for="name"><i class="material-icons">person</i> Your Name</label>
                <input type="text" id="name" name="name" placeholder="Your Name" required>
            </div>
            <div class="form-group">
                <label for="email"><i class="material-icons">email</i> Email</label>
                <input type="text" id="email" name="email" placeholder="Email" required>
            </div>
            <div class="form-group">
                <label for="phone"><i class="material-icons">phone</i> Phone Number</label>
                <input type="text" id="phone" name="phone" placeholder="Phone Number">
            </div>
            <div class="form-group">
                <label for="from"><i class="material-icons">flight_takeoff</i> Departure City</label>
                <input type="text" id="from" name="from" placeholder="Departure City" required>
            </div>
            <div class="form-group">
                <label for="destination"><i class="material-icons">flight_land</i> Destination City</label>
                <input type="text" id="destination" name="destination" placeholder="Destination City" required>
            </div>
            <div class="form-group">
                <label for="departure_date"><i class="material-icons">calendar_today</i> Departure Date</label>
                <input type="text" id="departure_date" name="departure_date" placeholder="Departure Date" required>
            </div>
            <div class="form-group">
                <label for="return_date"><i class="material-icons">calendar_today</i> Return Date</label>
                <input type="text" id="return_date" name="return_date" placeholder="Return Date" required>
            </div>
            <div class="form-group">
                <label for="citizenship"><i class="material-icons">public</i> Citizenship</label>
                <input type="text" id="citizenship" name="citizenship" placeholder="Citizenship" required>
            </div>
            <div class="form-group">
                <label for="additional_details"><i class="material-icons">note</i> Additional Details</label>
                <textarea id="additional_details" name="additional_details" placeholder="Any additional details you would like us to know"></textarea>
            </div>
            <input type="submit" value="Submit">
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        flatpickr('#departure_date', {
            dateFormat: 'Y-m-d'
        });
        flatpickr('#return_date', {
            dateFormat: 'Y-m-d'
        });
    </script>
</body>
</html>
