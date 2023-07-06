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

// Retrieve data from the database
$query = "SELECT * FROM customers WHERE id = 32"; // Replace 123 with the actual customer ID
$result = $conn->query($query);

// Check if the query was successful
if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $name = $row['name'];
    $email = $row['email'];
    $phone = $row['phone'];
    $fromCity = $row['from_city'];
    $destinationCity = $row['destination_city'];
    $departureDate = $row['departure_date'];
    $returnDate = $row['return_date'];
    $citizenship = $row['citizenship'];
    $additionalDetails = $row['additional_details'];
} else {
    echo "No data found.";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Confirmation Page</title>
    <style>
        .category {
            margin-bottom: 20px;
        }

        .category h2 {
            color: #3f6161;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin-bottom: 10px;
        }

        .category p {
            font-size: 16px;
        }
    </style>
</head>
<body>
    <div class="category">
        <h2>Flight</h2>
        <p>Name: <?php echo $name; ?></p>
        <p>Email: <?php echo $email; ?></p>
        <p>Phone: <?php echo $phone; ?></p>
        <p>From City: <?php echo $fromCity; ?></p>
        <p>Destination City: <?php echo $destinationCity; ?></p>
        <p>Departure Date: <?php echo $departureDate; ?></p>
        <p>Return Date: <?php echo $returnDate; ?></p>
    </div>

    <div class="category">
        <h2>Hotel</h2>
        <!-- Add hotel information here -->
    </div>

    <div class="category">
        <h2>Transportation</h2>
        <!-- Add transportation information here -->
    </div>

    <div class="category">
        <h2>Excursions</h2>
        <!-- Add excursions information here -->
    </div>

    <div class="category">
        <h2>Additional Details</h2>
        <p><?php echo $additionalDetails; ?></p>
    </div>
</body>
</html>

<?php
// Close the database connection
$conn->close();
?>
