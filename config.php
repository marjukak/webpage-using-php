<?php
// config.php — database connection settings
$host = 'localhost';
$user = 'root';
$pass = '';         // XAMPP default is no password
$db   = 'summer_db';

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("DB connection failed: " . $conn->connect_error);
}
?>
