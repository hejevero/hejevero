<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-secondary">
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
	<span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarTogglerDemo01">
	<a class="navbar-brand" href="#">Hejevero</a>
	<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
		<li class="nav-item active">
			<a class="nav-link" href="#">
				<img src="./images/icons/house-door.svg" width="25" height="25" class="d-inline-block align-top" style="color: cornflowerblue;" alt="">
				Inicio
				<span class="sr-only">(Current)</span>
			</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="#">
				<img src="./images/icons/plus-square.svg" width="25" height="25" class="d-inline-block align-top" style="color: cornflowerblue;" alt="">
				Bodegas
			</a>
		</li>
		<li class="nav-item dropdown">
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
	<form class="form-inline my-2 my-lg-0">
		<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
		<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Submit</button>
	</form>
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
				<form action="index.php" method="post">
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