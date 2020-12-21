<?php
session_start();
include("./conexion.php");
if(isset($_POST['username']) || isset($_POST['password']) && $_POST['username'] != ""){
	include_once('./funciones.php');
	$a = new login();
	try{
		echo $a->getUserName($enlace, $_POST['username']);
	}catch(Exception $e){
		error_log('Usuario no encontrado: '.$e->getMessage());
	}
}
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<title>P&aacute;gina de Hejevero</title>
		<meta charset="UTF-8">
		<meta name="title" content="Pruebas de hejevero">
		<meta name="description" content="P&aacute;gina de pruebas de hejevero">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="./css/style.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="./css/bootstrap.min.css">
		<script src="./js/jquery.min.js"></script>
		<script src="./js/popper.min.js"></script>
		<script src="./js/bootstrap.min.js"></script>
	</head>
	<body class="bg-light">
		<!-- Header -->
		<header class="container bg-primary text-white">
			<?php
			include("./pages/estructure/menu.php");
			?>
		</header>
		<!-- Contenido -->
		<?php
			include("./pages/modules/inicio.php");
		?>
	</body>
	<footer>
	</footer>
</html>