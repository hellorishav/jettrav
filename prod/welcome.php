<?php
session_start();

// Check if the 'username' session variable is set
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];

    // Database credentials
    $servername = "localhost";
    $db_username = "u947421468_jettrav";
    $db_password = "Jettrav@capstone1";
    $dbname = "u947421468_jettrav";

    // Create connection
    $conn = new mysqli($servername, $db_username, $db_password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch the user's name from the database
    $query = "SELECT name FROM credentials WHERE username = '$username'";
    $result = $conn->query($query);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $name = $row['name'];
    } else {
        $name = "User";
    }
} else {
    // Redirect to the login page if the user is not logged in
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<?php include 'header.php'; ?>
<head>
    <title>Welcome to Jettrav</title>
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

        .welcome-message {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 40px;
        }

        .welcome-message i {
            color: #009900;
            font-size: 48px;
            margin-right: 16px;
        }

        .welcome-message span {
            font-size: 24px;
            font-weight: 500;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="welcome-message">
            <i class="material-icons">check_circle</i>
            <span>Welcome, <?php echo $name; ?>!</span>
        </div>
    </div>
</body>
</html>
