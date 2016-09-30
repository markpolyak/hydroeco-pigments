<?php
$cnn = pg_connect("host=pg.sweb.ru port=5432 dbname=mpolyakru_hbio user=mpolyakru_hbio password=test1234") or die("Connection Error");

$area = $_GET["area"];

if ($area)
{    
	$q = "SELECT station.name, station.id_station
		  FROM station 
		  WHERE station.id_water_area = '$area'
          ORDER BY station.name ASC";
	$result = pg_query ($cnn, $q);
	$rows = array();
	while($r = pg_fetch_assoc($result)) {
		$rows[] = $r;
	}
	print json_encode($rows);
}
?>