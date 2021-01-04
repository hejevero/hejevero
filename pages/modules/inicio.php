<section class="container bg-light pt-5">
	<?php
	if(isset($_GET['perfil']) && $_GET['perfil'] == "perfil"){
	?>
		<form action="./process.php" method="post" class="pt-3">
			<div class="form-group row">
				<label for="staticCode" class="col-sm-2 col-form-label">Codigo Usuario</label>
				<div class="col-sm-10">
					<input type="text" readonly class="form-control-plaintext" id="staticCode" value="<?php echo $_COOKIE["codeNow"]; ?>">
				</div>
			</div>
			<div class="form-group row">
				<label for="inputName" class="col-sm-2 col-form-label">Nombre</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="inputName" value="<?php echo $_COOKIE["userNow"]; ?>">
				</div>
			</div>
			<div class="form-group row">
				<label for="inputLastName" class="col-sm-2 col-form-label">Apellido</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="inputLastName" value="<?php echo $_COOKIE["lastnameNow"]; ?>">
				</div>
			</div>
			<div class="form-group row">
				<label for="inputUser" class="col-sm-2 col-form-label">Usuario</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="inputUser" value="<?php echo $_COOKIE["nickNow"]; ?>">
				</div>
			</div>
			<div class="form-group row">
				<label for="inputPass" class="col-sm-2 col-form-label">Antigua Contraseña</label>
				<div class="col-sm-10">
					<input type="password" class="form-control" id="inputPass" placeholder="Contraseña">
				</div>
			</div>
			<div class="form-group row">
				<label for="inputPass" class="col-sm-2 col-form-label">Contraseña</label>
				<div class="col-sm-10">
					<input type="password" class="form-control" id="inputPass" placeholder="Contraseña">
				</div>
			</div>
			<div class="form-group row">
				<label for="inputLevel" class="col-sm-2 col-form-label">Nivel de Usuario</label>
				<div class="col-sm-10">
					<input type="text" class="form-control-plaintext" id="inputLevel" value="<?php echo $_COOKIE["levelNow"]; ?>">
				</div>
			</div>
			<div class="btn-group btn-block" role="group" aria-label="Large button group">
				<button type="submit" name="modificarUsuario" class="btn btn-light border">
					<img src="./images/icons/tools.svg" width="25" height="25" class="d-inline-block align-top" style="color: cornflowerblue;" alt="Modificar">
					<div class="d-block d-sm-block d-md-none">Modificar</div>
				</button>
				<button type="submit" name="eliminarUsuario" class="btn btn-light border">
					<img src="./images/icons/trash.svg" width="25" height="25" class="d-inline-block align-top" style="color: cornflowerblue;" alt="Eliminar">
					<div class="d-block d-sm-block d-md-none">Eliminar</div>
				</button>
			</div>
		</form>
	<?php
	}elseif(isset($_GET['perfil']) && $_GET['perfil'] == "true"){
		if($resultado = $user->buscarPorConsulta("SELECT * FROM user INNER JOIN level ON user.level_id_level=level.id_level WHERE id_user=".$_GET['id'])){
			foreach($resultado as $userS){
	?>
		<form action="./process.php" method="post" class="pt-3">
			<div class="form-group row">
				<label for="staticCode" class="col-sm-2 col-form-label">Codigo Usuario</label>
				<div class="col-sm-10">
					<input type="text" readonly class="form-control-plaintext" id="staticCode" value="<?php echo $userS["code_user"]; ?>">
				</div>
			</div>
			<div class="form-group row">
				<label for="inputName" class="col-sm-2 col-form-label">Nombre</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="inputName" value="<?php echo $userS["name_user"]; ?>">
				</div>
			</div>
			<div class="form-group row">
				<label for="inputLastName" class="col-sm-2 col-form-label">Apellido</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="inputLastName" value="<?php echo $userS["lastname_user"]; ?>">
				</div>
			</div>
			<div class="form-group row">
				<label for="inputUser" class="col-sm-2 col-form-label">Usuario</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="inputUser" value="<?php echo $userS["nick_user"]; ?>">
				</div>
			</div>
			<div class="form-group row">
				<label for="inputPass" class="col-sm-2 col-form-label">Contraseña</label>
				<div class="col-sm-10">
					<input type="password" class="form-control" id="inputPass" placeholder="Contraseña">
				</div>
			</div>
			<div class="form-group row">
				<label for="inputLevel" class="col-sm-2 col-form-label">Nivel de Usuario</label>
				<div class="col-sm-10">
					<input type="text" class="form-control-plaintext" id="inputLevel" value="<?php echo $userS["name_level"]; ?>">
				</div>
			</div>
			<div class="btn-group btn-block" role="group" aria-label="Large button group">
				<button type="submit" name="modificarUsuario" class="btn btn-light border">
					<img src="./images/icons/tools.svg" width="25" height="25" class="d-inline-block align-top" style="color: cornflowerblue;" alt="Modificar">
					<div class="d-block d-sm-block d-md-none">Modificar</div>
				</button>
				<button type="submit" name="eliminarUsuario" class="btn btn-light border">
					<img src="./images/icons/trash.svg" width="25" height="25" class="d-inline-block align-top" style="color: cornflowerblue;" alt="Eliminar">
					<div class="d-block d-sm-block d-md-none">Eliminar</div>
				</button>
			</div>
		</form>
	<?php
			}
		}
	}elseif(isset($_GET['gestionar-usuario']) && $_GET['gestionar-usuario'] == "true"){
	?>
	<div class="table-responsive pt-3">
		<table class="table">
			<thead>
				<tr>
					<th class="table-primary text-center" colspan="6">Usuarios</th>
				</tr>
				<tr class="table-primary">
					<th>Nombre</th>
					<th>Apellido</th>
					<th>Usuario</th>
					<th>Nivel</th>
					<th>Contraseña</th>
					<th>Opciones</th>
				</tr>
			</thead>
			<tbody>
				<?php
					//$conUser = "SELECT * FROM user INNER JOIN level ON user.level_id_level=level.id_level WHERE state_user >= 1";
					//$resUser = mysqli_query($conUser);
					//while($user = mysqli_fetch_array($resUser)){
					if($resultado=$user->buscarPorConsulta("SELECT * FROM user INNER JOIN level ON user.level_id_level=level.id_level WHERE state_user >= 1")){
						foreach($resultado as $userS){
				?>
						<tr class="table-success">
							<th><?php echo $userS['name_user']; ?></th>
							<th><?php echo $userS['lastname_user']; ?></th>
							<th><?php echo $userS['nick_user']; ?></th>
							<th><?php echo $userS['name_level']; ?></th>
							<th><?php echo $userS['pass_user']; ?></th>
							<th class="btn-group" role="group" aria-label="Large button group">
								<a href="?perfil=true&id=<?php echo($userS['id_user']); ?>">
									<button type="submit" name="modificarUsuario" class="btn btn-light border">
										<img src="./images/icons/tools.svg" width="25" height="25" class="d-inline-block align-top" style="color: cornflowerblue;" alt="Modificar">
										<div class="d-block d-sm-block d-md-none">Modificar</div>
									</button>
								</a>
								<a href="./process.php?perfil=eliminar&id=<?php echo($userS['id_user']); ?>">
									<button type="submit" name="eliminarUsuario" class="btn btn-light border">
										<img src="./images/icons/trash.svg" width="25" height="25" class="d-inline-block align-top" style="color: cornflowerblue;" alt="Eliminar">
										<div class="d-block d-sm-block d-md-none">Eliminar</div>
									</button>
								</a>
							</th>
						</tr>
				<?php
					//};
						}
					}else{
						
					}
				?>
			</tbody>
		</table>
	</div>
	<?php
	}
	?>
</section>