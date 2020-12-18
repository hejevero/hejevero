<?php
session_start();
include("./conexion.php");
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
		<section class="container bg-info pt-5">
			<div class="table-responsive pt-3">
				<table class="table">
					<thead>
						<tr>
							<th class="table-primary text-center" colspan="5">Usuarios</th>
						</tr>
						<tr class="table-primary">
							<th>Nombre</th>
							<th>Apellido</th>
							<th>Usuario</th>
							<th>Nivel</th>
							<th>Contraseña</th>
						</tr>
					</thead>
					<tbody>
						<tr class="table-success">
							<th>Helmo</th>
							<th>Velásquez</th>
							<th>hejevero</th>
							<th>Adminitrador</th>
							<th>123</th>
						</tr>
						<tr class="table-success">
							<th>Denisse</th>
							<th>Zamora</th>
							<th>dzamora</th>
							<th>Adminitrador</th>
							<th>123</th>
						</tr>
						<tr class="table-success">
							<th>Doris</th>
							<th>Rodríguez</th>
							<th>drodriguez</th>
							<th>Usuario</th>
							<th>123</th>
						</tr>
						<tr class="table-success">
							<th>Liliana</th>
							<th>Velásquez</th>
							<th>lvelasquez</th>
							<th>Usuario</th>
							<th>123</th>
						</tr>
						<tr class="table-success">
							<th>Bernardo</th>
							<th>Velásquez</th>
							<th>hejevero</th>
							<th>Usuario</th>
							<th>123</th>
						</tr>
					</tbody>
				</table>
			</div>
		</section>
	</body>
	<footer>
	</footer>
</html>