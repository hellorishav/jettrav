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
            max-width: 800px;
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

        .tab {
            display: none;
        }

        .active {
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

        .welcome-message {
            text-align: left;
            margin-bottom: 20px;
        }

        .logout-button {
            float: right;
            padding: 5px 10px;
            background-color: #ff0000;
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 14px;
            cursor: pointer;
        }

        .dashboard {
            text-align: left;
        }

        .search-box {
            margin-bottom: 10px;
        }

        .leads-table {
            width: 100%;
            border-collapse: collapse;
        }

        .leads-table th,
        .leads-table td {
            padding: 8px;
            border: 1px solid #ddd;
        }
    </style>
    <script>
        function switchTab(tabName) {
            var tabs = document.getElementsByClassName('tab');
            for (var i = 0; i < tabs.length; i++) {
                tabs[i].style.display = 'none';
            }

            document.getElementById(tabName).style.display = 'block';
        }
    </script>
</head>
<body>
    <div class="container">
        <h1>Authentication System</h1>

        <ul class="tab-links">
            <li><a href="#" onclick="switchTab('login-tab')">Login</a></li>
        </ul>

        <div id="login-tab" class="tab active">
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

            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
                $username = $_POST['username'];
                $password = $_POST['password'];

                // Hash the entered password for comparison
                $hashedPassword = hash('sha256', $password);

                // Check if the username and hashed password match in the database
                $loginQuery = "SELECT * FROM credentials WHERE username = '$username' AND password = '$hashedPassword'";
                $loginResult = $conn->query($loginQuery);

                if ($loginResult && $loginResult->num_rows > 0) {
                    // Login successful, store user information in session
                    $_SESSION['username'] = $username;
                    $_SESSION['name'] = $loginResult->fetch_assoc()['name'];
                } else {
                    echo '<div class="error-message">Invalid username or password.</div>';
                }
            }

            // Check if user is logged in
            if (isset($_SESSION['username'])) {
                $name = $_SESSION['name'];
                echo '<div class="welcome-message">Welcome, ' . $name . '!</div>';
                echo '<form method="post" action="">';
                echo '<input class="logout-button" type="submit" name="logout" value="Logout">';
                echo '</form>';

                // Logout functionality
                if (isset($_POST['logout'])) {
                    session_unset();
                    session_destroy();
                    header("Location: login.php");
                    exit();
                }

                // Fetch leads from the database
                $leadsQuery = "SELECT * FROM leads";
                $leadsResult = $conn->query($leadsQuery);

                if ($leadsResult && $leadsResult->num_rows > 0) {
                    echo '<div class="dashboard">';
                    echo '<h2>Leads Dashboard</h2>';
                    echo '<div class="search-box">';
                    echo '<label for="search-input">Search:</label>';
                    echo '<input type="text" id="search-input" onkeyup="searchLeads()" placeholder="Enter search criteria">';
                    echo '</div>';
                    echo '<table class="leads-table">';
                    echo '<thead>';
                    echo '<tr>';
                    echo '<th>ID</th>';
                    echo '<th>Name</th>';
                    echo '<th>Email</th>';
                    echo '<th>Phone</th>';
                    echo '<th>From City</th>';
                    echo '<th>Destination City</th>';
                    echo '<th>Departure Date</th>';
                    echo '<th>Return Date</th>';
                    echo '<th>Citizenship</th>';
                    echo '<th>Additional Details</th>';
                    echo '</tr>';
                    echo '</thead>';
                    echo '<tbody class="leads-table-body">';

                    while ($row = $leadsResult->fetch_assoc()) {
                        echo '<tr>';
                        echo '<td>' . $row['id'] . '</td>';
                        echo '<td>' . $row['name'] . '</td>';
                        echo '<td>' . $row['email'] . '</td>';
                        echo '<td>' . $row['phone'] . '</td>';
                        echo '<td>' . $row['from_city'] . '</td>';
                        echo '<td>' . $row['destination_city'] . '</td>';
                        echo '<td>' . $row['departure_date'] . '</td>';
                        echo '<td>' . $row['return_date'] . '</td>';
                        echo '<td>' . $row['citizenship'] . '</td>';
                        echo '<td>' . $row['additional_details'] . '</td>';
                        echo '</tr>';
                    }

                    echo '</tbody>';
                    echo '</table>';
                    echo '</div>';
                } else {
                    echo '<div class="error-message">No leads found.</div>';
                }
            } else {
                // Show login form if user is not logged in
                echo '<h2>Login</h2>';
                echo '<form method="post" action="">';
                echo '<div class="form-group">';
                echo '<label for="username">Username</label>';
                echo '<input type="text" id="username" name="username" required>';
                echo '</div>';
                echo '<div class="form-group">';
                echo '<label for="password">Password</label>';
                echo '<input type="password" id="password" name="password" required>';
                echo '</div>';
                echo '<input type="submit" name="login" value="Login">';
                echo '</form>';
            }

            $conn->close();
            ?>

            <script>
                function searchLeads() {
                    var input = document.getElementById('search-input');
                    var filter = input.value.toUpperCase();
                    var table = document.getElementsByClassName('leads-table-body')[0];
                    var rows = table.getElementsByTagName('tr');

                    for (var i = 0; i < rows.length; i++) {
                        var cells = rows[i].getElementsByTagName('td');
                        var found = false;

                        for (var j = 0; j < cells.length; j++) {
                            var cell = cells[j];

                            if (cell) {
                                var textValue = cell.textContent || cell.innerText;

                                if (textValue.toUpperCase().indexOf(filter) > -1) {
                                    found = true;
                                    break;
                                }
                            }
                        }

                        if (found) {
                            rows[i].style.display = '';
                        } else {
                            rows[i].style.display = 'none';
                        }
                    }
                }
            </script>
        </div>
    </div>
</body>
</html>
