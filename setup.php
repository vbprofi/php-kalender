<?php
include('db.php');
echo "<br>";
$sql = "";

$sql = "CREATE TABLE Events
(
Id int NOT NULL AUTO_INCREMENT,
Name varchar(255),
text varchar(255),
Day varchar(255),
Month varchar(255),
Year varchar(255),
Start_h varchar(255),
Start_m varchar(255),
End_h varchar(255),
End_m varchar(255),
PRIMARY KEY (Id)
)";
$dbct = $mysqli->query($sql);

if($dbct)
	echo "Erstellung  der Tabelle Events war erfolgreich";
else
	echo "Fehler: Tabelle Events konnte nicht erstellt werden.";

?>