<?php
$servername = "localhost";
$username = "u947421468_jettrav";
$password = "Jettrav@capstone1";
$dbname = "u947421468_jettrav";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$clientID = "";
$itineraryData = array();
$errorMessage = "";

// Retrieve clientID from the query parameter
if (isset($_GET['clientID'])) {
    $clientID = $_GET['clientID'];

    // Fetch itinerary details from the itineraries table
    $getItineraryQuery = "SELECT * FROM itineraries WHERE clientID = '$clientID'";
    $itineraryResult = $conn->query($getItineraryQuery);

    if ($itineraryResult && $itineraryResult->num_rows > 0) {
        while ($row = $itineraryResult->fetch_assoc()) {
            $itineraryData[] = $row;
        }
    } else {
        // No itineraries found for the client
        $errorMessage = 'No itineraries found for the clientID: ' . $clientID;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Itineraries</title>
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
    </style>
</head>
<body>
    <div class="container">
        <h1>View Itineraries</h1>

        <form method="get" action="">
            <input type="text" name="clientID" placeholder="Enter Client ID" required>
            <input type="submit" value="View Itinerary">
        </form>

        <?php if (!empty($itineraryData)): ?>
            <div class="itinerary-container">
                <h2>Itinerary Details for Client ID: <?php echo $clientID; ?></h2>
                <?php foreach ($itineraryData as $itinerary): ?>
                    <div class="itinerary-item">
                        <p><strong>Flights:</strong> <?php echo $itinerary['flights']; ?></p>
                        <p><strong>Hotels:</strong> <?php echo $itinerary['hotels']; ?></p>
                        <p><strong>Total Cost:</strong> <?php echo $itinerary['total_cost']; ?></p>
                        <p><strong>Departure:</strong> <?php echo $itinerary['departure']; ?></p>
                        <p><strong>Return Date:</strong> <?php echo $itinerary['return_date']; ?></p>
                        <p><strong>Additional Details:</strong> <?php echo $itinerary['additional_details']; ?></p>
                        <p><strong>Staff:</strong> <?php echo $itinerary['staff']; ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php elseif (!empty($errorMessage)): ?>
            <div class="error-message"><?php echo $errorMessage; ?></div>
        <?php endif; ?>
    </div>
</body>
</html>
