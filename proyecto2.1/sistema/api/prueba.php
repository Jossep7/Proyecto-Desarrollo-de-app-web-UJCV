<?php

	include 'conexion.php';
	date_default_timezone_set('America/Guayaquil');
	$valor = $_POST['value'];
	$uid = $_POST['id'];
	
	$sql2 = "SELECT id_placa FROM placas WHERE placas.uid_placa = '$uid'";
	$resultado = mysqli_query($conexion,$sql2);
		
	while($row = mysqli_fetch_array($resultado)){
		$id = $row['id_placa'];
    }
	
	$arr = json_decode($valor, true);
	$sensor1 = $arr['sensor1'];
	$sensor2 = $arr['sensor2'];
	$sensor3 = $arr['sensor3'];
	$sensor4 = $arr['sensor4'];
	
	
	$hora_actual = date('H:i:s');
	$fecha_actual = date('d-m-Y');
	
	$sql = "INSERT INTO graficos (valor_one, valor_two, valor_three, valor_four, hora, fecha, id_placa) VALUES ('$sensor1', '$sensor2', '$sensor3', '$sensor4', '$hora_actual', '$fecha_actual', '$id')";
	$result = $link->prepare($sql);
	
	if($result->execute()){
		echo "Insertardo";
	}
	
	
	
	


?>