<section class="container bg-light pt-5">
	<?php
	if($resultado = $user->buscarPorConsulta("SELECT * FROM warehause WHERE state_warehause>=1")){
		foreach($resultado as $value){
	?>
		<div class="card w-75 pt-3">
			<div class="container-fluid pt-3 card-header">
				<h2 class="panel-title"><?php echo ($value['name_warehause']); ?></h2>
			</div>
			<div class="card-body pt-1">
				<h5><?php echo ($value['country_warehause']." / ".$value['city_warehause']." / ".$value['direction_warehause']); ?></h5>
			</div>
			<div class="pr-2 pb-2">
				<div class="float-md-right ml-2">
					<a>
						<img src="./images/icons/cart-plus.svg" width="25" height="25" class="d-inline-block align-top" style="color: cornflowerblue;" alt="Agregar">
					</a>
				</div>
				<div class="float-md-right ml-2">
					<a>
						<img src="./images/icons/tools.svg" width="25" height="25" class="d-inline-block align-top" style="color: cornflowerblue;" alt="Modificar">
					</a>
				</div>
				<div class="float-md-right ml-2">
					<a>
						<img src="./images/icons/trash.svg" width="25" height="25" class="d-inline-block align-top" style="color: cornflowerblue;" alt="Eliminar">
					</a>
				</div>
			</div>
		</div>
	<?php
		}
	}
	?>
</section>