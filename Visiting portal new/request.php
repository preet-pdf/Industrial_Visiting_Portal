<?php
include('files.php');
$_SESSION['service'] = false;
$servername = "localhost";
$username = "root";
$password = "";
$dbname="requestData";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// sql to create table
$sql = "CREATE TABLE requestdata (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
clientid INT(6) NOT NULL,
userid INT(6) NOT NULL,
email VARCHAR(50),
checked INT(6)NOT NULL,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  echo "Table requestdata created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$conn->close();
?>