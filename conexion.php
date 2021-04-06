<?php
$enlace = mysqli_connect("localhost", "root", "", "hejevero");
if(!$enlace){
	echo "Error: No se pudo conectar a Mysql.".PHP_EOL;
	echo "Error de depuración: ".mysqli_connect_errno().PHP_EOL;
	echo "Error de depuracion: ".mysqli_connect_error().PHP_EOL;
	exit;
}
//mysqli_close($enlace);
//define('DB_CONFIG_HOST', 'localhost');
//define('DB_CONFIG_DB', 'hejevero');
//define('DB_CONFIG_USER', 'root');
//define('DB_CONFIG_PW', '');
//$dsn = 'mysql:host='.DB_CONFIG_HOST.';dbname'.DB_CONFIG_DB.';';
//define('DB_CONFIG_DSN', $dsn);
?>