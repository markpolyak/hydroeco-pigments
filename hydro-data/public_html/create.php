<?php

//header('Content-type: application/json');
$cnn = pg_connect("host=pg.sweb.ru port=5432 dbname=mpolyakru_hbio user=mpolyakru_hbio password=test1234") or die("Connection Error");

if(isset($_POST['sample']))
{
        $json = str_replace('\"', '"', $_POST['sample']);
    	$j = json_decode($json, true);
    	$id_station = $j['id_station'];
    	$date = mb_strimwidth($j['date'], 0, 10);
    	$comment = $j['comment'];
    	$serial_number = $j['serial_number'];
        
        $query = pg_query($cnn, "SELECT max(id_sample) FROM samples");
        $row = pg_fetch_array($query);
        $id_sample = $row['max'] + 1;
        
        $query = pg_query($cnn, "INSERT INTO samples VALUES ('$id_sample', '$id_station', '$date', '$comment', '$serial_number')");
        if(pg_affected_rows($query) > 0)
        {
            http_response_code(200);
        echo "1";
        }
        
        
        $pigment = $j['pigment'];
        
        $id_trophic_characterization = $j['id_trophic_characterization'];
        $id_horizon = $j['id_horizon'];
        
        
        $volume_of_filtered_water = $j['volume_of_filtered_water'];
        
        $chlorophyll_a_concentration = $j['chlorophyll_a_concentration'];
        $chlorophyll_b_concentration = $j['chlorophyll_b_concentration'];
        $chlorophyll_c_concentration = $j['chlorophyll_c_concentration'];
        $a = $j['a'];
        $pigment_index = $j['pigment_index'];
        $pheopigments = $j['pheopigments'];
        $ratio_of_cl_a_to_cl_c = $j['ratio_of_cl_a_to_cl_c'];
        $pigment_comment = $j['pigment_comment'];
        $pigment_serial_number = $j['pigment_serial_number'];
        
        if($pigment)
        {
            
            $query1 = pg_query($cnn, "SELECT max(id_photosynthetic_pigments_sample) FROM photosynthetic_pigments_samples");
            $row1 = pg_fetch_array($query1);
            $id_photosynthetic_pigments_sample = $row1['max'] + 1;
            
            $query2 = pg_query($cnn, "INSERT INTO photosynthetic_pigments_samples VALUES ('$id_photosynthetic_pigments_sample', '$id_trophic_characterization', '$id_sample', '$id_horizon', '$volume_of_filtered_water', '$chlorophyll_a_concentration', '$chlorophyll_b_concentration', '$chlorophyll_c_concentration', '$a', '$pigment_index', '$pheopigments', '$ratio_of_cl_a_to_cl_c', '$pigment_comment', '$pigment_serial_number')");
        }
}  
else
{
    http_response_header(400);
}


?>