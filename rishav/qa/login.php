<?php
session_start();

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

// Process form submission for account creation
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['create-account'])) {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if the username already exists
    $checkQuery = "SELECT * FROM credentials WHERE username = '$username'";
    $checkResult = $conn->query($checkQuery);

    if ($checkResult && $checkResult->num_rows > 0) {
        echo '<div class="error-message">Username already exists. Please choose a different username.</div>';
    } else {
        // Hash the password
        $hashedPassword = hash('sha256', $password);

        // Insert the new account into the database
        $insertQuery = "INSERT INTO credentials (name, username, password, role) VALUES ('$name', '$username', '$hashedPassword', 'user')";
        if ($conn->query($insertQuery) === TRUE) {
            echo '<div class="success-message">Account created successfully.</div>';
        } else {
            echo '<div class="error-message">Error creating account: ' . $conn->error . '</div>';
        }
    }
}

// Process form submission for login
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Hash the entered password for comparison
    $hashedPassword = hash('sha256', $password);

    // Check if the username and hashed password match in the database
    $loginQuery = "SELECT * FROM credentials WHERE username = '$username' AND password = '$hashedPassword'";
    $loginResult = $conn->query($loginQuery);

    if ($loginResult && $loginResult->num_rows > 0) {
        echo '<div class="success-message">Login successful. Redirecting to Dashboard...</div>';

        // Set the session variable from the "username" field
        $_SESSION['username'] = $username;

        // Redirect to dashboard.php
        header("Location: dashboard.php");
        exit();
    } else {
        echo '<div class="error-message">Invalid username or password.</div>';
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Authentication System</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <style>
        /* CSS styles omitted for brevity */
    </style>
    <script>
        // JavaScript code omitted for brevity
    </script>
</head>
<body>
    <div class="container">
        <h1>Authentication System</h1>

        <ul class="tab-links">
            <li><a class="tab-link" href="#" data-tab="create-account-tab">Create Account</a></li>
            <li><a class="tab-link" href="#" data-tab="login-tab">Login</a></li>
        </ul>

        <div id="create-account-tab" class="tab-content">
            <h2>Create Account</h2>
            <form method="post" action="">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <input type="submit" name="create-account" value="Create Account">
            </form>
        </div>

        <div id="login-tab" class="tab-content">
            <h2>Login</h2>
            <form method="post" action="">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <input type="submit" name="login" value="Login">
            </form>
        </div>
    </div>
</body>
</html>
