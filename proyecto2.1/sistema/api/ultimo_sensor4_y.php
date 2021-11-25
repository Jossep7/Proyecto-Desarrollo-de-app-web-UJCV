<?php
	//header('Content-Type: application/json');
	include "conexion.php";
	 $point = "";
	 $point2 = "";
	
	$sql = "select valor_four, hora from graficos order by id_graficos desc limit 1";
	
	
    $result = mysqli_query($conexion, $sql); 
    while ($row = mysqli_fetch_row($result)) {
        $point =  $row[0];
        $point2 =  $row[1];
    }
    echo $point;
	
	
	
?>