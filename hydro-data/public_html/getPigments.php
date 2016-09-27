<?php
// Connect to MSSQL

$cnn = pg_connect("host=pg.sweb.ru port=5432 dbname=mpolyakru_hbio user=mpolyakru_hbio password=test1234") or die("Connection Error");

$stations = $_GET["stations"];
$start = $_GET["start"];
$end = $_GET["end"];


if ($stations)
{
	$s = explode(',', $stations);
    
	$q = "select samples.*, photosynthetic_pigments_samples.*, station.id_water_area from samples, photosynthetic_pigments_samples, station WHERE samples.id_station = station.id_station and photosynthetic_pigments_samples.id_sample = samples.id_sample and samples.id_station in  ('"
		.implode("','",$s) .
		"') and samples.date <= '$end'and samples.date >= '$start'";
	$result= pg_query ($cnn, $q);
	$rows = array();
	while($r = pg_fetch_assoc($result)) {
		$rows[] = $r;
	}
	print json_encode($rows);
}
?>