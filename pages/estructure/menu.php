<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-secondary">
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
	<span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarTogglerDemo01">
	<a class="navbar-brand" href="./">
		<?php
		if(isset($_COOKIE["userNow"]) && $_COOKIE["userNow"] != ""){
			echo($_COOKIE["userNow"]." / ".$_COOKIE["levelNow"]);
		}else{
			echo("Test");
		}
		?>
	</a>
	<?php
	//Usuario General/Cliente
	if($levelNow == "God"){
		?>
		<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
			<li class="nav-item active">
				<a class="nav-link" href="./">
				<img src="./images/icons/house-door.svg" width="25" height="25" class="d-inline-block align-top" style="color: cornflowerblue;" alt="">
				Inicio
				<span class="sr-only">(Current)</span>
				</a>
			</li>
			<li class="nav-item dropdown active">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<img src="./images/icons/hammer.svg" width="25" height="25" class="d-inline-block align-top" style="color: cornflowerblue;" alt="">
					Pruebas
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown3">
					<a class="dropdown-item" href="?test=webpay">Webpay</a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="?test=navbar">Navbar</a>
					<a class="dropdown-item" href="?test=phpinfo">Info</a>
				</div>
			</li>
			<li class="nav-item dropdown active">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown0" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<img src="./images/icons/calendar-plus.svg" width="25" height="25" class="d-inline-block align-top" style="color: cornflowerblue;" alt="">
					Opciones
				</a>
				<ul class="dropdown-menu" aria-labelledby="navbarDropdown0">
					<li class="dropright">
						<a class="dropdown-item dropdown-toggle" href="#">Usuarios</a>
						<ul class="dropdown-menu">
							<li><a class="dropdown-item" href="#">Agregar</a></li>
							<li><a class="dropdown-item" href="#">Gestionar</a></li>
						</ul>
					</li>
					<li class="dropright">
						<a class="dropdown-item dropdown-toggle" href="#">Cargos</a>
						<ul class="dropdown-menu">
							<li><a class="dropdown-item" href="#">Modificar</a></li>
							<li><a class="dropdown-item" href="#">Gestionar</a></li>
						</ul>
					</li>
					<li class="dropdown-divider"></li>
					<li class="dropright">
						<a class="dropdown-item dropdown-toggle" href="#">Bodegas</a>
						<ul class="dropdown-menu">
							<li><a class="dropdown-item" href="./?bodega=agregar">Agregar</a></li>
							<li><a class="dropdown-item" href="./?bodega=gestionar">Gestionar</a></li>
						</ul>
					</li>
					<li class="dropright">
						<a class="dropdown-item dropdown-toggle" href="#">Producto</a>
						<ul class="dropdown-menu">
							<li><a class="dropdown-item" href="#">Agregar</a></li>
							<li><a class="dropdown-item" href="#">Modificar</a></li>
							<li><a class="dropdown-item" href="#">Buscar</a></li>
						</ul>
					</li>
					<li class="dropdown-divider"></li>
					<li class="dropright">
						<a class="dropdown-item dropdown-toggle" href="#">Permisos</a>
						<ul class="dropdown-menu">
							<li><a class="dropdown-item" href="#">Asociar</a></li>
							<li><a class="dropdown-item" href="#">Gestionar</a></li>
						</ul>
					</li>
				</ul>
			</li>
			<li class="nav-item dropdown active">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<img src="./images/icons/file-earmark-person.svg" width="25" height="25" class="d-inline-block align-top" style="color: cornflowerblue;" alt="">
					Usuario
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown2">
					<a class="dropdown-item" href="./?perfil=perfil&id=<?php echo($_COOKIE["idUserNow"]); ?>">Perfil</a>
					<a class="dropdown-item" href="./?gestionar-usuario=true">Gestionar</a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="./process.php?log-out=true">Cerrar sesión</a>
				</div>
			</li>
		</ul>
		<?php
	}elseif($levelNow != "inactivo"){
		?>
		<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
			<li class="nav-item active">
				<a class="nav-link" href="./">
				<img src="./images/icons/house-door.svg" width="25" height="25" class="d-inline-block align-top" style="color: cornflowerblue;" alt="">
				Inicio
				<span class="sr-only">(Current)</span>
				</a>
			</li>
			<li class="nav-item dropdown active">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown0" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<img src="./images/icons/calendar-plus.svg" width="25" height="25" class="d-inline-block align-top" style="color: cornflowerblue;" alt="">
					Opciones
				</a>
				<ul class="dropdown-menu" aria-labelledby="navbarDropdown0">
					<li class="dropright">
						<a class="dropdown-item dropdown-toggle" href="#">Usuarios</a>
						<ul class="dropdown-menu">
							<li><a class="dropdown-item" href="#">Agregar</a></li>
							<li><a class="dropdown-item" href="#">Gestionar</a></li>
						</ul>
					</li>
					<li class="dropright">
						<a class="dropdown-item dropdown-toggle" href="#">Cargos</a>
						<ul class="dropdown-menu">
							<li><a class="dropdown-item" href="#">Modificar</a></li>
							<li><a class="dropdown-item" href="#">Gestionar</a></li>
						</ul>
					</li>
					<li class="dropdown-divider"></li>
					<li class="dropright">
						<a class="dropdown-item dropdown-toggle" href="#">Bodegas</a>
						<ul class="dropdown-menu">
							<li><a class="dropdown-item" href="./?bodega=agregar">Agregar</a></li>
							<li><a class="dropdown-item" href="./?bodega=gestionar">Gestionar</a></li>
						</ul>
					</li>
					<li class="dropright">
						<a class="dropdown-item dropdown-toggle" href="#">Producto</a>
						<ul class="dropdown-menu">
							<li><a class="dropdown-item" href="#">Agregar</a></li>
							<li><a class="dropdown-item" href="#">Modificar</a></li>
							<li><a class="dropdown-item" href="#">Buscar</a></li>
						</ul>
					</li>
					<li class="dropdown-divider"></li>
					<li class="dropright">
						<a class="dropdown-item dropdown-toggle" href="#">Permisos</a>
						<ul class="dropdown-menu">
							<li><a class="dropdown-item" href="#">Asociar</a></li>
							<li><a class="dropdown-item" href="#">Gestionar</a></li>
						</ul>
					</li>
				</ul>
			</li>
			<li class="nav-item dropdown active">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<img src="./images/icons/file-earmark-person.svg" width="25" height="25" class="d-inline-block align-top" style="color: cornflowerblue;" alt="">
					Usuario
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown2">
					<a class="dropdown-item" href="./?perfil=perfil&id=<?php echo($_COOKIE["idUserNow"]); ?>">Perfil</a>
					<a class="dropdown-item" href="./?gestionar-usuario=true">Gestionar</a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="./process.php?log-out=true">Cerrar sesión</a>
				</div>
			</li>
		</ul>
		<?php
	}elseif($levelNow == "inactivo"){
	?>
		<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
			<li class="nav-item active">
				<a class="nav-link" href="./">
					<img src="./images/icons/house-door.svg" width="25" height="25" class="d-inline-block align-top" style="color: cornflowerblue;" alt="">
					Inicio
					<span class="sr-only">(Current)</span>
				</a>
			</li>
			<li class="nav-item dropdown active">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<img src="./images/icons/file-earmark-person.svg" width="25" height="25" class="d-inline-block align-top" style="color: cornflowerblue;" alt="">
					Usuario
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<a class="dropdown-item" href="#">Informaci&oacute;n</a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item trigger-btn" href="#myModal" data-toggle="modal">Iniciar Sesi&oacute;n</a>
				</div>
			</li>
		</ul>
	<?php
	}
	?>
</div>
</nav>
<!--Codigo formulario sobre puesto para inciar sesion-->
<div id="myModal" class="modal fade">
	<div class="modal-dialog modal-login">
		<div class="modal-content">
			<div class="modal-header">
				<div class="avatar">
					<img src="./images/avatar.png" alt="Avatar">
				</div>
				<h4 class="modal-title">Member Login</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<form action="./process.php" method="post">
					<div class="form-group">
						<input type="text" class="form-control" name="username" placeholder="Nombre de usuario" required="required">
					</div>
					<div class="form-group">
						<input type="password" class="form-control" name="password" placeholder="Contraseña" required="required">
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary btn-lg btn-block login-btn">Login</button>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<a href="#">Olvid&eacute; mi contraseña</a>
			</div>
		</div>
	</div>
</div>
<script id="rendered-js">
$('.dropdown-menu a.dropdown-toggle').on('click', function(e) {
	if (!$(this).next().hasClass('show')) {
		$(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
	}
	var $subMenu = $(this).next(".dropdown-menu");
	$subMenu.toggleClass('show');
	$(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
		$('.dropdown-submenu .show').removeClass("show");
	});
	return false;
});
</script>