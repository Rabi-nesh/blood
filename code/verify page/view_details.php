<?php
session_start();

if (!isset($_SESSION['admin_logged_in']) || !$_SESSION['admin_logged_in']) {
    header("Location: admin.php"); // Redirect to login if not logged in
    exit();
}

$servername = "localhost";
$username = "root"; // Replace with your MySQL username
$password = ""; // Replace with your MySQL password
$dbname = "user_details"; // Database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM user_info";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - View User Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        h2 {
            color: #333;
            margin-bottom: 20px;
        }

        table {
            border-collapse: collapse;
            width: 80%;
            margin-bottom: 20px;
            background: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 12px;
            text-align: center;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        a {
            text-decoration: none;
            color: #4CAF50;
            font-size: 16px;
            padding: 10px 20px;
            border: 1px solid #4CAF50;
            border-radius: 4px;
            background-color: #fff;
            transition: all 0.3s ease;
        }

        a:hover {
            background-color: #4CAF50;
            color: white;
        }

        .links {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <h2>User Details</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Mobile Number</th>
            <th>OTP</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['mobileno']; ?></td>
            <td><?php echo $row['otp']; ?></td>
        </tr>
        <?php } ?>
    </table>

    <div class="links">
        <a href="http://localhost/BDMS/need_blood.php" target="_blank">Click here to open Need Blood page</a>
        <br><br>
        <a href="admin.php">Logout</a>
    </div>
</body>
</html>

<?php
$conn->close();
?>
