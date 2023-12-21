
<?php
// Create a new MySQLi object
$servername = "localhost";
$username = "root";
$password = "spdfklmn";
$dbname = "ofbsphp";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Hash the password using bcrypt
$password = "admin23";
$salt = password_hash($password, PASSWORD_BCRYPT);
$hashed_password = password_hash($password, PASSWORD_BCRYPT);
// Insert the hashed password into the database table
$username = "solomon";
$email = "admin@example.com";
$sql = "INSERT INTO admin (admin_uname, admin_pwd, admin_email) VALUES (?,?,?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $username, $hashed_password, $email);
$stmt->execute();

// Close the database connection
$stmt->close();
$conn->close();
?>