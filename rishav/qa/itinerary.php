<?php
session_start();

$servername = "localhost";
$username = "u947421468_jettrav";
$password = "Jettrav@capstone1";
$dbname = "u947421468_jettrav";

// Check if the user is authenticated
if (!isset($_SESSION['username'])) {
    $authenticated = false;
} else {
    $authenticated = true;
}

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$clientID = "";
$clientName = "";
$clientPhone = "";
$clientEmail = "";
$successMessage = "";
$errorMessage = "";

// Check if client ID is submitted
if (isset($_POST['retrieve-client'])) {
    $clientID = $_POST['clientID'];

    // Fetch client details from the leads table
    $getClientQuery = "SELECT * FROM leads WHERE id = '$clientID'";
    $clientResult = $conn->query($getClientQuery);

    if ($clientResult && $clientResult->num_rows > 0) {
        $clientData = $clientResult->fetch_assoc();
        $clientName = $clientData['name'];
        $clientPhone = $clientData['phone'];
        $clientEmail = $clientData['email'];
    } else {
        // Client not found
        $clientID = "";
    }
}

// Get user's name from credentials table
$name = "";
$username = $_SESSION['username'];
$getUserNameQuery = "SELECT name FROM credentials WHERE username = '$username'";
$userResult = $conn->query($getUserNameQuery);

if ($userResult && $userResult->num_rows > 0) {
    $userData = $userResult->fetch_assoc();
    $name = $userData['name'];
}

// Store itinerary details if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    // Get input values from the form
    $clientID = $_POST['clientID'];
    $flights = $_POST['flights'];
    $hotels = $_POST['hotels'];
    $totalCost = $_POST['total_cost'];
    $departure = $_POST['departure'];
    $returnDate = $_POST['return_date'];
    $additionalDetails = $_POST['additional_details'];
    $staff = $_SESSION['username'];

    // Insert the itinerary details into the itineraries table
    $insertQuery = "INSERT INTO itineraries (clientID, flights, hotels, total_cost, departure, return_date, additional_details, staff)
                    VALUES ('$clientID', '$flights', '$hotels', '$totalCost', '$departure', '$returnDate', '$additionalDetails', '$staff')";

    if ($conn->query($insertQuery) === TRUE) {
        $successMessage = 'Itinerary created successfully.';
    } else {
        $errorMessage = 'Error creating itinerary: ' . $conn->error;
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html>
<?php include 'header.php'; ?>
<head>
    <title>Create Itinerary</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500&display=swap">
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
            width: 400px;
            padding: 40px;
            background-color: #fff;
            border-radius: 4px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333;
            margin-bottom: 20px;
        }

        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 4px;
            background-color: #f5f5f5;
            font-size: 16px;
            box-sizing: border-box;
        }

        textarea {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 4px;
            background-color: #f5f5f5;
            font-size: 16px;
            box-sizing: border-box;
            resize: vertical;
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

        .success-message {
            color: #009900;
            margin-bottom: 10px;
        }

        .error-message {
            color: #ff0000;
            margin-bottom: 10px;
        }

        .logout-container {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            margin-bottom: 10px;
        }

        .logout-button {
            background-color: #2196f3;
            color: #fff;
            padding: 8px 12px;
            border: none;
            border-radius: 4px;
            font-size: 14px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .logout-button:hover {
            background-color: #1976d2;
        }

        .welcome-message {
            font-size: 14px;
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="logout-container">
            <span class="welcome-message">Logged in as <?php echo $name; ?>.</span>
        </div>
        <h1>Create Itinerary</h1>

        <?php if (empty($clientName)): ?>
            <form method="post" action="">
                <input type="text" name="clientID" placeholder="Client ID" value="<?php echo $clientID; ?>" required>
                <input type="submit" name="retrieve-client" value="Retrieve Client">
            </form>

            <?php if (!empty($clientID)): ?>

            <?php endif; ?>
        <?php else: ?>
            <div>
                <strong>Client ID:</strong> <?php echo $clientID; ?><br>
                <strong>Client Name:</strong> <?php echo $clientName; ?><br>
                <strong>Client Phone:</strong> <?php echo $clientPhone; ?><br>
                <strong>Client Email:</strong> <?php echo $clientEmail; ?>
            </div>

            <form method="post" action="">
                <input type="hidden" name="clientID" value="<?php echo $clientID; ?>">
                <input type="text" name="flights" placeholder="Flights" required><br>
                <input type="text" name="hotels" placeholder="Hotels" required><br>
                <input type="number" name="total_cost" placeholder="Total Cost" required><br>
                <input type="text" name="departure" placeholder="Departure" required><br>
                <input type="text" name="return_date" placeholder="Return Date" required><br>
                <textarea name="additional_details" rows="3" placeholder="Additional Details"></textarea><br>

                <input type="submit" name="submit" value="Create Itinerary">
            </form>

            <?php if (isset($successMessage)): ?>
                <div class="success-message"><?php echo $successMessage; ?></div>
            <?php elseif (isset($errorMessage)): ?>
                <div class="error-message"><?php echo $errorMessage; ?></div>
            <?php endif; ?>
        <?php endif; ?>
    </div>
    <?php if (!$authenticated): ?>
    <div class="container">
            <b>User not authenticated.</b><br><br><br>
            <a href="login.php" class="login-button">Login</a>
        </div>
    <?php endif; ?>
</body>
</html>
