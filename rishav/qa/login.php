<!DOCTYPE html>
<html>
<head>
    <title>JetTrav - Login and Create Account</title>
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

        .container h2 {
            margin-bottom: 20px;
        }

        .tab-container {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }

        .tab-container .tab {
            flex: 1;
            padding: 10px;
            background-color: #f5f5f5;
            border: 1px solid #ddd;
            border-radius: 4px 4px 0 0;
            cursor: pointer;
        }

        .tab-container .tab.active {
            background-color: #fff;
            border-bottom: none;
        }

        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }

        .form-group label {
            display: block;
            color: #888;
            margin-bottom: 8px;
            font-size: 14px;
            text-align: left;
        }

        .form-group input[type="text"],
        .form-group input[type="password"] {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 4px;
            background-color: #f5f5f5;
            font-size: 16px;
            transition: background-color 0.3s;
            box-sizing: border-box;
        }

        .form-group input[type="text"]:focus,
        .form-group input[type="password"]:focus {
            background-color: #e0e0e0;
        }

        .form-group .error-message,
        .form-group .success-message {
            margin-top: 8px;
            color: #f44336;
            font-size: 14px;
            text-align: left;
        }

        .form-group .success-message {
            color: #4caf50;
        }

        .form-group .hidden {
            display: none;
        }

        .form-group button {
            background-color: #2196f3;
            color: #fff;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .form-group button:hover {
            background-color: #1976d2;
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const tabs = document.querySelectorAll('.tab');
            const forms = document.querySelectorAll('.form-container');

            function activateTab(index) {
                tabs.forEach(tab => tab.classList.remove('active'));
                forms.forEach(form => form.style.display = 'none');

                tabs[index].classList.add('active');
                forms[index].style.display = 'block';
            }

            tabs.forEach((tab, index) => {
                tab.addEventListener('click', function() {
                    activateTab(index);
                });
            });

            const loginForm = document.getElementById('login-form');
            const createAccountForm = document.getElementById('create-account-form');

            loginForm.addEventListener('submit', function(event) {
                event.preventDefault();

                const username = document.getElementById('login-username').value;
                const password = document.getElementById('login-password').value;

                // Perform login validation here
                // You can make an AJAX request to the server to validate the credentials

                // For demonstration purposes, let's assume the login is successful
                const successMessage = document.getElementById('login-success-message');
                const errorMessage = document.getElementById('login-error-message');

                errorMessage.classList.add('hidden');
                successMessage.classList.remove('hidden');
            });

            createAccountForm.addEventListener('submit', function(event) {
                event.preventDefault();

                const username = document.getElementById('create-username').value;
                const password = document.getElementById('create-password').value;

                // Perform account creation validation here
                // You can make an AJAX request to the server to check if the username already exists

                // For demonstration purposes, let's assume the account creation is successful
                const successMessage = document.getElementById('create-success-message');
                const errorMessage = document.getElementById('create-error-message');

                errorMessage.classList.add('hidden');
                successMessage.classList.remove('hidden');
            });
        });
    </script>
</head>
<body>
    <div class="container">
        <h2>JetTrav - Login and Create Account</h2>
        <div class="tab-container">
            <div class="tab active">Login</div>
            <div class="tab">Create Account</div>
        </div>
        <div class="form-container" id="login-form-container">
            <form id="login-form">
                <div class="form-group">
                    <label for="login-username">Username</label>
                    <input type="text" id="login-username" name="login-username" required>
                </div>
                <div class="form-group">
                    <label for="login-password">Password</label>
                    <input type="password" id="login-password" name="login-password" required>
                </div>
                <button type="submit">Login</button>
                <div class="form-group error-message hidden" id="login-error-message">
                    Incorrect username or password. Please try again.
                </div>
                <div class="form-group success-message hidden" id="login-success-message">
                    Login successful. Redirecting...
                </div>
            </form>
        </div>
        <div class="form-container" id="create-account-form-container" style="display: none;">
            <form id="create-account-form">
                <div class="form-group">
                    <label for="create-username">Username</label>
                    <input type="text" id="create-username" name="create-username" required>
                </div>
                <div class="form-group">
                    <label for="create-password">Password</label>
                    <input type="password" id="create-password" name="create-password" required>
                </div>
                <button type="submit">Create Account</button>
                <div class="form-group error-message hidden" id="create-error-message">
                    Username already exists. Please choose a different username.
                </div>
                <div class="form-group success-message hidden" id="create-success-message">
                    Account created successfully.
                </div>
            </form>
        </div>
    </div>
</body>
</html>
