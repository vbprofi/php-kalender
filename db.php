<?php
//Datenbank
$dbname = "kalender";
//Host
$dbhost = "localhost";
//Benutzer
$dbuser = "root";
//Passwort
$dbpass = "";

$error = "";

$mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

// Create connection
$conn = new mysqli($dbhost, $dbuser, $dbpass);
 // Check connection
  if ($conn->connect_error) {
$error .= "Connection failed: " . $conn->connect_error;
} 
 
// Create database
  $sql = "CREATE DATABASE ". $dbname;
if ($conn->query($sql) === TRUE) {
$error .= "Database created successfully";
} else {
$error .= "Error creating database: " . $conn->error;
}

//   die($error);

$conn->close();
?>