<?php

$hostname = 'localhost';
$database = 'sis_venta';
$username = 'root';
$password = '';

$conexion = mysqli_connect($hostname,$username,$password,$database);

$link = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);

if(!$conexion){
	echo "Connection fallida";
} else {
	//echo "Connection correcta";
}


?>
