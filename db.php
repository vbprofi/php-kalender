<?php
$error = "";
$mysqli = new mysqli("localhost","root","","kalender");

// Create connection
$conn = new mysqli('localhost', 'root', '');
 // Check connection
  if ($conn->connect_error) {
$error .= "Connection failed: " . $conn->connect_error;
} 
 
// Create database
  $sql = "CREATE DATABASE kalender";
if ($conn->query($sql) === TRUE) {
$error .= "Database created successfully";
} else {
$error .= "Error creating database: " . $conn->error;
}

//    die($error);

$conn->close();
?>