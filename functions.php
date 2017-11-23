<?php
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

?>