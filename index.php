<?php
//Funktionen
include('functions.php');
//Datenbankverbindung
include('db.php');

/*
* GET Params
* Properties
*/
if(isset($_GET["display"])){
$display=$_GET["display"];
}else{
$display="month";
}
if(isset($_GET["year"])){
$year=$_GET["year"];
}else{
$year=date("Y");
}
if(isset($_GET["month"])){
$month=$_GET["month"];
}else{
$month=date("n");
}
if(isset($_GET["day"])){
$day=$_GET["day"];
}else{
$day=date("j");
}


$today_year=date("Y");
$today_month=date("n");
$today_day=date("j");

$firstdate = mktime(0, 0, 0, $month, 1, $year);
$lastdate  = mktime(0, 0, 0, $month, date('t', $firstdate), $year);

$monthNames = array('Januar', 'Februar', 'März', 'April', 'Mai', 'Juni', 'Juli', 'August', 'September', 'Oktober', 'November', 'Dezember');
$trans = array(6, 0, 1, 2, 3, 4, 5);

echo '<link rel="stylesheet" type="text/css" href="style.css" />';


echo '<a href="index.php?display=day&year=' . $today_year . '&month=' . $today_month . '&day=' . $today_day . '">Heute</a>';

echo "&nbsp;";

echo '<a href="index.php?display=month&year=';
echo $year-1;
echo '&month=' . $month . '&day=' . $day . '">← Jahr</a> ';

echo '<a href="index.php?display=month&year=';
if($month==1){
echo $year-1 . '&month=12&';
}else{
echo $year . '&month=';
echo $month-1;
echo '&';
}
echo 'day=' . $day . '">← Monat, </a> ';

echo "&nbsp;|&nbsp;";

echo '<a href="index.php?display=month&year=' . $year . '&month=1&day=' . $day . '">Jan</a> <a href="index.php?display=month&year=' . $year . '&month=2&day=' . $day . '">Feb</a> <a href="index.php?display=month&year=' . $year . '&month=3&day=' . $day . '">Mär</a> <a href="index.php?display=month&year=' . $year . '&month=4&day=' . $day . '">Apr</a> <a href="index.php?display=month&year=' . $year . '&month=5&day=' . $day . '">Mai</a> <a href="index.php?display=month&year=' . $year . '&month=6&day=' . $day . '">Jun</a> <a href="index.php?display=month&year=' . $year . '&month=7&day=' . $day . '">Jul</a> <a href="index.php?display=month&year=' . $year . '&month=8&day=' . $day . '">Aug</a> <a href="index.php?display=month&year=' . $year . '&month=9&day=' . $day . '">Sep</a> <a href="index.php?display=month&year=' . $year . '&month=10&day=' . $day . '">Okt</a> <a href="index.php?display=month&year=' . $year . '&month=11&day=' . $day . '">Nov</a> <a href="index.php?display=month&year=' . $year . '&month=12&day=' . $day . '">Dez</a> | ';

echo ' <a href="index.php?display=month&year=';
if($month==12){
echo $year+1;
echo '&month=1&day=';
}else{
echo $year . '&month=';
echo $month+1;
echo '&day=';
}
echo $day . '">Monat →</a> <a href="index.php?display=month&year=';
echo $year+1;
echo '&month=' . $month . '&day=' . $day . '">Jahr →</a></center></br></br>';


//Tagesübersicht
if($display=='day'){
echo '<br><a href="index.php?display=month&month=' . $month .'&year='. $year .'">↑ ';
echo wochentag($year.'-'.$month.'-'.$day).', &nbsp;'. $day . '. ';
echo $monthNames[(int)$month-1].' '.$year;
echo "</a><br>";
	//KW berechnen
	 $kw = new DateTime($year.'-'.$month.'-'.$day);
 echo 'Kalenderwoche ' . $kw->format('W').'<br>';

echo "<h1>Einträge</h1>";
$result=$mysqli->query("select * from events where Year=$year and Month=$month and Day=$day");
$events = $result->num_rows;
if($events=="0"){
echo '<center><font size="6">Keine Einträge gefunden</font></center>';
}else{
	echo $events. " Einträge gefunden";
echo '<center><table border="2"	><tr><td>Name</td><td>Text</td><td>Beginn</td><td>Ende</td><td>Aktion</td></tr>';
while($row=$result->fetch_object()){
$id=$row->Id;
$name=$row->Name;
$text=$row->text;
$start_h=$row->Start_h;
$start_m=$row->Start_m;
$end_h=$row->End_h;
$end_m=$row->End_m;
echo '<tr><td>' . $name . '</td><td>' . $text . '</td><td>' . $start_h . ':' . $start_m . '</td><td>' . $end_h . ':' . $end_m . '</td><td><a href="edit.php?event=' . $id . '">Edit</a> <a href="delete.php?event=' . $id . '&year=' . $year . '&month=' . $month . '&day=' . $day . '">Löschen</a></td></tr>';
}
echo '</table>';
}
echo '</br></br>';
echo "<h1>Neuer Eintrag</h1>";
echo '<center><form action="add_event.php?year=' . $year . '&month=' . $month . '&day=' . $day . '" method="post">Name: <input name="name" type="text"> Text: <input type="text" name="location"></br>Zeit Beginn: <select name="start_h">';
$i='0';
while($i<=23){
echo '<option value=' . $i . '>' . $i . '</option>';
$i++;
}
echo '</select>:<select name="start_m">';
$i='0';
while($i<=59){
echo '<option value=' . $i . '>' . $i . '</option>';
$i++;
}
echo '</select> Zeit Ende: <select name="end_h">';
$i='0';
while($i<=23){
echo '<option value=' . $i . '>' . $i . '</option>';
$i++;
}
echo '</select>:<select name="end_m">';
$i='0';
while($i<=59){
echo '<option value=' . $i . '>' . $i . '</option>';
$i++;
}
echo '</select></br><input type="submit" name="sendbutton" value="Eintrag hinzufügen"></form></center>';
}




//Monatsübersicht
if($display=="month"){
	echo "<h1>Kalender</h1>";
?>

<table id="calendar" border="1">
<caption><?php echo $monthNames[(int)$month-1].' '.$year; ?></caption>
<thead>
<tr>
<th scope="col" title="Kalenderwoche">KW</th>
<th scope="col" title="Montag">Mo</th>
<th scope="col" title="Dienstag">Di</th>
<th scope="col" title="Mittwoch">Mi</th>
<th scope="col" title="Donnerstag">Do</th>
<th scope="col" title="Freitag">Fr</th>
<th scope="col" title="Samstag">Sa</th>
<th scope="col" title="Sonntag">So</th>
</tr>
</thead>
<tbody>
<?php

for( $i=-$trans[date('w', $firstdate)]; $i<date('t', $firstdate); ) {
$woy = date('W', mktime(0, 0, 0, $month, $i<0 ? 1 : $i+1, $year));
echo '      <tr title="'.$woy.'. Kalenderwoche">';
echo '<th scope="row">KW '.$woy.'</th>';

for( $j=0; $j<7; $j++ ) {
$i++;
if( $i <= 0 || $i > date('t', $firstdate) ) {
echo '<td class="unactive_day">-</td>';
continue;
}

if( mktime(0, 0, 0, $month, $i, $year) == mktime(0, 0, 0, date('m'), date('d'), date('Y')) ) {
echo '<td width="100" class="heute" title="heutiges Datum"><a href="index.php?display=day&year=' . $year . '&month=' . $month . '&day=' . $i . '"><b>⇒ '.$i.' ⇐</b></a></td>';
} else {
echo '<td width="100" class="day"><a href="index.php?display=day&year=' . $year . '&month=' . $month . '&day=' . $i . '">'.$i.'</a><table width="100%" height="100%"><tr><td class="date">';
$result=$mysqli->query("select * from events where Year=$year and Month=$month and Day=$i");
while($row=$result->fetch_object()){
$name=$row->Name;
$start_h=$row->Start_h;
$start_m=$row->Start_m;
echo $name . ' um ' . $start_h . ':' . $start_m . ' Uhr</br>';
}
echo "</td></tr></table></td>";
}
}

echo '</tr>'."\n";
}
?>

</tbody>
</table>
<?php
}
?>