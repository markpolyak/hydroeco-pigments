<?php
$cnn = pg_connect("host=pg.sweb.ru port=5432 dbname=mpolyakru_hbio user=mpolyakru_hbio password=test1234") or die("Connection Error");

$station = $_GET["station"];
$start = $_GET["start"];
$end = $_GET["end"];

if ($station)
{    
	$q = "SELECT DISTINCT samples.serial_number
		  FROM samples, photosynthetic_pigments_samples, station 
		  WHERE samples.id_station = station.id_station 
		  and samples.id_station in ('".$station."') 
		  and samples.date <= '$end'
		  and samples.date >= '$start'
		  ORDER BY samples.serial_number ASC";
	$result = pg_query ($cnn, $q);
	$rows = array();
	while($r = pg_fetch_assoc($result)) {
		$rows[] = $r;
	}
	print json_encode($rows);
}
?>