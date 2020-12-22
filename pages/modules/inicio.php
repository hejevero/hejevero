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
				<?php
					//$conUser = "SELECT * FROM user INNER JOIN level ON user.level_id_level=level.id_level WHERE state_user >= 1";
					//$resUser = mysqli_query($conUser);
					//while($user = mysqli_fetch_array($resUser)){
					if($resultado=$user->buscar("SELECT * FROM user INNER JOIN level ON user.level_id_level=level.id_level WHERE state_user >= 1")){
						foreach($resultado as $userS){
				?>
						<tr class="table-success">
							<th><?php echo $userS['name_user']; ?></th>
							<th><?php echo $userS['lastname_user']; ?></th>
							<th><?php echo $userS['nick_user']; ?></th>
							<th><?php echo $userS['name_level']; ?></th>
							<th><?php echo $userS['pass_user']; ?></th>
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