<?php
session_start();

$servername = "localhost";
$username = "u947421468_jettrav";
$password = "Jettrav@capstone1";
$dbname = "u947421468_jettrav";

// Check if the user is authenticated
if (isset($_SESSION['username'])) {
    $authenticated = true;
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $username = $_SESSION['username'];

    // Fetch user's name from the credentials table
    $getNameQuery = "SELECT name FROM credentials WHERE username = '$username'";
    $nameResult = $conn->query($getNameQuery);

    if ($nameResult && $nameResult->num_rows > 0) {
        $row = $nameResult->fetch_assoc();
        $name = $row['name'];
    } else {
        $name = '';
    }
} else {
    $authenticated = false;
}
?>
<!DOCTYPE html>
<html>
<?php include 'header.php'; ?>
<head>
    <title>Leads Dashboard</title>
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
            width: 90%;
            max-width: 1200px;
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

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table th, table td {
            padding: 12px;
            border: 1px solid #ddd;
        }

        table th {
            background-color: #f5f5f5;
        }

        .search-container {
            margin-bottom: 20px;
        }

        .search-container input[type="text"] {
            width: 300px;
            padding: 12px;
            border: none;
            border-radius: 4px;
            background-color: #f5f5f5;
            font-size: 16px;
            transition: background-color 0.3s;
            box-sizing: border-box;
        }

        .search-container input[type="text"]:focus {
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
    </style>
    <script>
        function searchLeads() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("search-input");
            filter = input.value.toUpperCase();
            table = document.getElementById("leads-table");
            tr = table.getElementsByTagName("tr");

            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td");
                for (var j = 0; j < td.length; j++) {
                    txtValue = td[j].textContent || td[j].innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                        break;
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>
</head>
<body>
    <?php if ($authenticated): ?>
        <div class="container">
            <div style="text-align: right;">
                Logged in as <b><?php echo $name; ?></b>.
            </div>
            <h1>Leads Dashboard</h1>

            <div class="search-container">
                <input type="text" id="search-input" placeholder="Start typing to search..." onkeyup="searchLeads()">
            </div>

            <?php
            $sql = "SELECT * FROM leads";
            $result = $conn->query($sql);

            if ($result && $result->num_rows > 0) {
                echo '<table id="leads-table">';
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

                while ($row = $result->fetch_assoc()) {
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

                echo '</table>';
            } else {
                echo 'No leads found.';
            }

            $conn->close();
            ?>
        </div>
    <?php else: ?>
        <div class="container">
            User not authenticated.<br>
            <a href="login.php" class="login-button">Logout</a>
        </div>
    <?php endif; ?>
</body>
</html>
