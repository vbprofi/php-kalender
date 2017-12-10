<?php
$event=$_GET["event"];
include('db.php');
$result=$mysqli->query("select * from events where id='$event'");
while($row=$result->fetch_object()){
$name=$row->Name;
$text=$row->text;
$day=$row->Day;
$month=$row->Month;
$year=$row->Year;
$start_h=$row->Start_h;
$start_m=$row->Start_m;
$end_h=$row->End_h;
$end_m=$row->End_m;
}
echo '<center><form action="edit2.php?event=' . $event . '" method="post">Name: <input type="text" name="name" value="' . $name . '"></br>Text: <input type="text" name="location" value="' . $text . '"></br>Start time: <select name="start_h">';
$i='0';
while($i<=23){
echo '<option value=' . $i . '';
if($i==$start_h){
echo ' SELECTED';
}
echo '>' . $i . '</option>';
$i++;
}
echo '</select>:<select name="start_m">';
$i='0';
while($i<=59){
echo '<option value=' . $i . '';
if($i==$start_m){
echo ' SELECTED';
}
echo '>' . $i . '</option>';
$i++;
}
echo '</select></br>End time: <select name="end_h">';
$i='0';
while($i<=23){
echo '<option value=' . $i . '';
if($i==$end_h){
echo ' SELECTED';
}
echo '>' . $i . '</option>';
$i++;
}
echo '</select>:<select name="end_m">';
$i='0';
while($i<=59){
echo '<option value=' . $i . '';
if($i==$end_m){
echo ' SELECTED';
}
echo '>' . $i . '</option>';
$i++;
}
echo '<select></br><input type="submit" value="Edit"></form></center>';


?>