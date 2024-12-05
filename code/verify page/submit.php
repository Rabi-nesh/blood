<?php
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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $mobileno = $_POST['mobileno'];
    $otp = $_POST['otp'];

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO user_info (name, mobileno, otp) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $mobileno, $otp);

    if ($stmt->execute()) {
        echo "Details submitted successfully.<br>";
        // Add the link to need_blood.php page
        echo '<a href="http://localhost/BDMS/need_blood.php" target="_blank">Click here to open Need Blood page</a>';
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
