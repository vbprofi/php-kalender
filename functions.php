<?php
//Datenbank einbinden
include('db.php');

/*
*@Param datum
* Beispielswert 2018-12-25
*@Return String Wochentag
*Beispielswert Dienstag
*
*****
*Beispiel:
*$test = date('YMD', time());
*echo wochentag($test);
*/
function wochentag($datum) {
$wochentage = array("Sonntag", "Montag", "Dienstag", "Mittwoch", "Donnerstag", "Freitag", "Samstag");
$zeit = strtotime($datum);
return $wochentage[date("w", $zeit)];
}

function string_input($string) {  
global $mysqli;
return trim(strip_tags($mysqli->real_escape_string($string)));
} 

?>