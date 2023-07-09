<?php
session_start();

// Check if the 'username' session variable is set
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
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
            <span>Welcome, <?php echo $username; ?>!</span>
        </div>
    </div>
</body>
</html>
