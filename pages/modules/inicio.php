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
					$conUser = "SELECT * FROM user INNER JOIN level ON user.level_id_level=level.id_level WHERE state_user >= 1";
					$resUser = mysqli_query($enlace, $conUser);
					while($user = mysqli_fetch_array($resUser)){
				?>
						<tr class="table-success">
							<th><?php echo $user['name_user']; ?></th>
							<th><?php echo $user['lastname_user']; ?></th>
							<th><?php echo $user['nick_user']; ?></th>
							<th><?php echo $user['name_level']; ?></th>
							<th><?php echo $user['pass_user']; ?></th>
						</tr>
				<?php
					};
				?>
			</tbody>
		</table>
	</div>
</section>