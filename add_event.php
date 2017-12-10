<?php
//Funktionen
include('functions.php');

//Datenbank einbinden
include('db.php');

$name= string_input($_POST["name"]);
$text= string_input($_POST["location"]);
$start_h= ($_POST["start_h"]);
$start_m= ($_POST["start_m"]);
$end_h= ($_POST["end_h"]);
$end_m= ($_POST["end_m"]);
$year= ($_GET["year"]);
$month= ($_GET["month"]);
$day= ($_GET["day"]);
$mysqli->query("insert into events (Name, text, Day, Month, Year, Start_h, Start_m, End_h, End_m) values ('$name','$text','$day','$month','$year','$start_h','$start_m','$end_h','$end_m')");
header('location:index.php?display=day&year=' . $year . '&month=' . $month . '&day=' . $day . '');
?>