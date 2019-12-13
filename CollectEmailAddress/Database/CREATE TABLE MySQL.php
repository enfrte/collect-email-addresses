<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "liana_demo";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// sql to create table
$sql = "CREATE TABLE email_subscriber (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  email VARCHAR(254) NOT NULL UNIQUE
)";

if ($conn->query($sql) === TRUE) {
    echo "Tables were created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>