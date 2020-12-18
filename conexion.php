<?php
$enlace = mysqli_connect("localhost", "root", "", "pokebase");
if(!$enlace){
	echo "Error: No se pudo conectar a Mysql.".PHP_EOL;
	echo "Error de depuración: ".mysqli_connect_errno().PHP_EOL;
	echo "Error de depuracion: ".mysqli_connect_error().PHP_EOL;
	exit;
}
//mysqli_close($enlace);
?>