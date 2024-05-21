<?php
// Start the session
session_start();

// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";

// Process form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if username is empty
    if (empty(trim($_POST["username"]))) {
        $username_err = "Please enter username.";
    } else {
        $username = trim($_POST["username"]);
    }

    // Check if password is empty
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter your password.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Validate credentials
    if (empty($username_err) && empty($password_err)) {
        // Connect to the database
        $mysqli = new mysqli("localhost", "root", "1234", "borrowed_books");

        // Check connection
        if ($mysqli->connect_error) {
            die("Connection failed: " . $mysqli->connect_error);
        }

        // Prepare a select statement
        $sql = "SELECT username, password FROM accounts WHERE username = ?";
        if ($stmt = $mysqli->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("s", $param_username);

            // Set parameters
            $param_username = $username;

            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                // Store result
                $stmt->store_result();

                // Check if username exists, if yes then verify password
                if ($stmt->num_rows == 1) {
                    // Bind result variables
                    $stmt->bind_result($username, $hashed_password);
                    if ($stmt->fetch()) {
                        if (password_verify($password, $hashed_password)) {
                            // Password is correct, start a new session
                            session_start();

                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["username"] = $username;

                            // Redirect user to the dashboard
                            header("location: dashboard.php");
                        } else {
                            // Display an error message if password is not valid
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else {
                    // Display an error message if username doesn't exist
                    $username_err = "No account found with that username.";
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            $stmt->close();
        }

        // Close connection
        $mysqli->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BookWormer Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .login-container {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            width: 400px;
            text-align: center;
        }
        .login-header {
            background-color: #d2a478;
            color: #ffffff;
            padding: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-header img {
            height: 50px;
            margin-right: 10px;
        }
        .login-header h1 {
            margin: 0;
            font-size: 24px;
        }
        .login-form {
            padding: 20px;
        }
        .login-form input {
            width: calc(100% - 20px);
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .login-form button {
            background-color: #d2a478;
            border: none;
            border-radius: 5px;
            color: white;
            cursor: pointer;
            padding: 10px 20px;
            width: calc(100% - 20px);
        }
        .login-form button:hover {
            background-color: #b48663;
        }
        .login-footer {
            background-color: #1a3c40;
            color: white;
            padding: 10px;
            text-align: center;
        }
        .login-footer a {
            color: white;
            margin: 0 10px;
            text-decoration: none;
        }
        .login-footer a:hover {
            text-decoration: underline;
        }
        .error-message {
            color: red;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-header">
            <img src="images/logo.svg" alt="BookWormer Logo">
        </div>
        <div class="login-form">
            <h2>Login</h2>
            <?php 
            if (!empty($username_err)) {
                echo '<div class="error-message">' . $username_err . '</div>';
            }
            if (!empty($password_err)) {
                echo '<div class="error-message">' . $password_err . '</div>';
            }
            ?>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <input type="text" name="username" placeholder="Username" value="<?php echo $username; ?>" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit">Login</button>
            </form>
        </div>
        <div class="login-footer">
            <div>BookWormer</div>
            <div>
                <a href="#">Facebook</a> | <a href="#">Instagram</a>
            </div>
            <div>Contact Us: bcnp.admin@gmail.com</div>
        </div>
    </div>
</body>
</html>
