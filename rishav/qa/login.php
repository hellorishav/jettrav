<!DOCTYPE html>
<html>
<head>
    <title>Authentication System</title>
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
            overflow-y: auto;
            max-height: 80vh; /* Adjust the max-height as needed */
        }

        h1 {
            color: #333;
            margin-bottom: 40px;
        }

        input[type="text"],
        input[type="password"] {
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
        input[type="password"]:focus {
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

        .tab-container {
            display: flex;
            justify-content: space-around;
            margin-bottom: 20px;
        }

        .tab-link {
            flex-grow: 1;
            text-align: center;
            padding: 10px;
            cursor: pointer;
            background-color: #ddd;
            border-radius: 4px 4px 0 0;
        }

        .tab-link:hover {
            background-color: #ccc;
        }

        .active {
            background-color: #fff;
            border-bottom: none;
            cursor: default;
        }

        .tab-content {
            display: none;
        }

        .tab-content.active {
            display: block;
        }

        .error-message {
            color: #ff0000;
            margin-bottom: 10px;
        }

        .success-message {
            color: #009900;
            margin-bottom: 10px;
        }
    </style>
    <script>
        function switchTab(tabName) {
            var tabLinks = document.getElementsByClassName('tab-link');
            var tabContents = document.getElementsByClassName('tab-content');

            for (var i = 0; i < tabLinks.length; i++) {
                tabLinks[i].classList.remove('active');
                tabContents[i].classList.remove('active');
            }

            document.getElementById(tabName).classList.add('active');
            document.getElementById(tabName + '-link').classList.add('active');
        }
    </script>
</head>
<body>
    <div class="container">
        <h1>Authentication System</h1>

        <div class="tab-container">
            <div id="create-account-link" class="tab-link active" onclick="switchTab('create-account')">Create Account</div>
            <div id="login-link" class="tab-link" onclick="switchTab('login')">Login</div>
        </div>

        <div id="create-account" class="tab-content active">
            <h2>Create Account</h2>
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
            ?>
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

        <div id="login" class="tab-content">
            <h2>Login</h2>
            <?php
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
                $username = $_POST['username'];
                $password = $_POST['password'];

                // Hash the entered password for comparison
                $hashedPassword = hash('sha256', $password);

                // Check if the username and hashed password match in the database
                $loginQuery = "SELECT * FROM credentials WHERE username = '$username' AND password = '$hashedPassword'";
                $loginResult = $conn->query($loginQuery);

                if ($loginResult && $loginResult->num_rows > 0) {
                    echo '<div class="success-message">Login successful.</div>';
                } else {
                    echo '<div class="error-message">Invalid username or password.</div>';
                }
            }
            ?>
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
