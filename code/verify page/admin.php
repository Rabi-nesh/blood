<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $admin_username = "admin"; // Admin username
    $admin_password = "password123"; // Admin password

    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username == $admin_username && $password == $admin_password) {
        $_SESSION['admin_logged_in'] = true;
        header("Location: view_details.php"); // Redirect to the details page
        exit();
    } else {
        $error = "Invalid username or password!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <style>
        /* General body styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        /* Centering the login form */
        h2 {
            text-align: center;
            color: #333;
        }

        form {
            width: 100%;
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Input fields */
        label {
            font-size: 1rem;
            color: #333;
            margin-bottom: 10px;
            display: block;
        }

        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 1rem;
            color: #333;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 1.1rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        /* Error message styling */
        p {
            text-align: center;
            color: red;
            font-weight: bold;
        }

        /* Responsive Design */
        @media (max-width: 600px) {
            form {
                width: 90%;
            }
        }
    </style>
</head>
<body>
    <h2>Admin Login</h2>
    <?php if (isset($error)) { echo "<p>$error</p>"; } ?>
    <form action="admin.php" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>

        <input type="submit" value="Login">
        <a href="http://localhost/BDMS/need_blood.php" target="_blank">Click here to open Need Blood page</a>
    </form>
</body>
</html>
