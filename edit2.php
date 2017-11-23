<?php
$event=$_GET["event"];
$name=$_POST["name"];
$text=$_POST["location"];
$start_h=$_POST["start_h"];
$start_m=$_POST["start_m"];
$end_h=$_POST["end_h"];
$end_m=$_POST["end_m"];
include('db.php');
$result=$mysqli->query("select * from events where id='$event'");
while($row=$result->fetch_object()){
$year=$row->Year;
$month=$row->Month;
$day=$row->Day;
}


$mysqli->query("update events set Name='$name', text='$text', Start_h='$start_h', Start_m='$start_m', End_h='$end_h', End_m='$end_m' where id='$event'");
header('location:index.php?display=day&year=' . $year . '&month=' . $month . '&day=' . $day . '');
?>