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
$query = "SELECT * FROM leads WHERE id = 32"; // Replace 123 with the actual customer ID
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
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f1f1f1;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .category {
            background-color: #fff;
            border-radius: 4px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 600px;
            transition: transform 0.3s, z-index 0.3s;
        }

        .category h2 {
            color: #3f6161;
            margin-bottom: 10px;
        }

        .category p {
            font-size: 16px;
            margin-bottom: 8px;
            text-align: center;
        }

        .category p:last-child {
            margin-bottom: 0;
        }

        .current-category {
            transform: scale(1.35) !important;
            z-index: 1;
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var categories = document.querySelectorAll('.category');
            var previousCategory = null;

            function handleClick(category) {
                if (previousCategory) {
                    previousCategory.style.transform = '';
                }

                category.style.transform = 'scale(1.35)';
                previousCategory = category;

                setTimeout(function() {
                    category.style.transform = '';
                }, 70000); // Reset after 70 seconds
            }

            categories.forEach(function(category) {
                category.addEventListener('click', function() {
                    handleClick(this);
                });
            });

            setInterval(function() {
                var currentTime = new Date().getTime();
                var scheduledTimes = [
                    new Date('2023-07-05 12:00:00').getTime(), // Replace with your desired scheduled times
                    new Date('2023-07-05 13:30:00').getTime(),
                    new Date('2023-07-05 15:00:00').getTime()
                ];

                var timeDifferences = scheduledTimes.map(function(time) {
                    return Math.abs(time - currentTime);
                });

                var minTimeDifference = Math.min.apply(null, timeDifferences);
                var closestCategoryIndex = timeDifferences.indexOf(minTimeDifference);

                for (var i = 0; i < categories.length; i++) {
                    var category = categories[i];
                    var timeDifference = timeDifferences[i];

                    if (timeDifference === minTimeDifference) {
                        category.classList.add('current-category');
                    } else {
                        category.classList.remove('current-category');
                    }

                    var scale = 1 + (minTimeDifference - timeDifference) / 10000;
                    scale = Math.max(0.5, Math.min(2, scale)); // Restrict scale between 0.5 and 2
                    category.style.transform = 'scale(' + scale + ')';
                }

                categories[closestCategoryIndex].style.transform = 'scale(1.35)';
            }, 1000); // Check every second
        });
    </script>
</head>
<body>
    <div class="category">
        <h2>Flight</h2>
        <p><strong>Name:</strong> <?php echo $name; ?></p>
        <p><strong>Email:</strong> <?php echo $email; ?></p>
        <p><strong>Phone:</strong> <?php echo $phone; ?></p>
        <p><strong>From City:</strong> <?php echo $fromCity; ?></p>
        <p><strong>Destination City:</strong> <?php echo $destinationCity; ?></p>
        <p><strong>Departure Date:</strong> <?php echo $departureDate; ?></p>
        <p><strong>Return Date:</strong>
    </div>

    <div class="category">
        <h2>Hotel</h2>
        <p><strong>Name:</strong> <?php echo $name; ?></p>
        <p><strong>Email:</strong> <?php echo $email; ?></p>
        <p><strong>Phone:</strong> <?php echo $phone; ?></p>
        <p><strong>From City:</strong> <?php echo $fromCity; ?></p>
        <p><strong>Destination City:</strong> <?php echo $destinationCity; ?></p>
        <p><strong>Departure Date:</strong> <?php echo $departureDate; ?></p>
        <p><strong>Return Date:</strong> <?php echo $returnDate; ?></p>
    </div>

    <div class="category">
        <h2>Transportation</h2>
        <p><strong>Name:</strong> <?php echo $name; ?></p>
        <p><strong>Email:</strong> <?php echo $email; ?></p>
        <p><strong>Phone:</strong> <?php echo $phone; ?></p>
        <p><strong>From City:</strong> <?php echo $fromCity; ?></p>
        <p><strong>Destination City:</strong> <?php echo $destinationCity; ?></p>
        <p><strong>Departure Date:</strong> <?php echo $departureDate; ?></p>
        <p><strong>Return Date:</strong> <?php echo $returnDate; ?></p>
    </div>

    <div class="category">
        <h2>Excursions</h2>
        <p><strong>Name:</strong> <?php echo $name; ?></p>
        <p><strong>Email:</strong> <?php echo $email; ?></p>
        <p><strong>Phone:</strong> <?php echo $phone; ?></p>
        <p><strong>From City:</strong> <?php echo $fromCity; ?></p>
        <p><strong>Destination City:</strong> <?php echo $destinationCity; ?></p>
        <p><strong>Departure Date:</strong> <?php echo $departureDate; ?></p>
        <p><strong>Return Date:</strong> <?php echo $returnDate; ?></p>
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