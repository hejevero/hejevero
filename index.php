<?php
session_start();
//include("./conexion.php");
include('./funciones.php');
$user = new conexion("localhost", "root", "", "hejevero3");
if(isset($_COOKIE["levelNow"])){
	$levelNow = $_COOKIE["levelNow"];
}else{
	$levelNow = "inactivo";
}
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Pruebas de Programaci&oacute;n</title>
		<meta charset="UTF-8">
		<meta name="title" content="Pruebas de Hejevero">
		<meta name="description" content="P&aacute;gina de pruebas de hejevero">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="./css/custom/style.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="./css/bootstrap/bootstrap.min.css">
		<script src="./js/jquery.min.js"></script>
		<!--<script src="./js/popper.min.js"></script>-->
		<script src="./js/bootstrap.min.js"></script>
	</head>
	<body class="bg-light">
		<!-- Header -->
		<header>
			<?php
			include("./pages/estructure/menu.php");
			?>
		</header>
		<!-- Contenido -->
		<?php
			if(isset($_GET['bodega']) && $_GET['bodega'] != ""){
				include("./pages/modules/warehouse.php");
			}elseif(isset($_GET['gestionar-usuario']) || isset($_GET['perfil'])){
				include("./pages/modules/inicio.php");
			}elseif(isset($_GET['test']) && $_GET['test'] != ""){
				include("./test/".$_GET['test'].".php");
			}elseif(isset($_GET['producto'])){
				include("./pages/modules/ficha.php");
			}else{
				include("./pages/modules/presentacion.php");
			}
		?>
	</body>
	<footer>
	</footer>
</html>