<?php
include('db.php');
$event=$_GET["event"];
$year=$_GET["year"];
$month=$_GET["month"];
$day=$_GET["day"];
$mysqli->query("delete from events where id='$event'");
header('location:index.php?display=day&year=' . $year . '&month=' . $month . '&day=' . $day . '');
?>