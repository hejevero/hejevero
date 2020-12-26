<section class="container bg-light pt-5">
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
								<button type="submit" name="modificarUsuario" class="btn btn-success">
									<img src="./images/icons/tools.svg" width="25" height="25" class="d-inline-block align-top" style="color: cornflowerblue;" alt="Modificar">
									<div class="d-block d-sm-block d-md-none">Modificar</div>
								</button>
								<button type="submit" name="eliminarUsuario" class="btn btn-danger">
									<img src="./images/icons/trash.svg" width="25" height="25" class="d-inline-block align-top" style="color: cornflowerblue;" alt="Eliminar">
									<div class="d-block d-sm-block d-md-none">Eliminar</div>
								</button>
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
</section>