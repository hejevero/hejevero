<section class="container bg-light pt-5">
<?php
if(isset($_GET['bodega']) && $_GET['bodega'] == "agregar"){
?>
	<form method="get" action="./index.php">
		<div class="card w-75 pt-3">
			<div class="container-fluid pt-3 card-header">
				<h2 class="panel-title"><input name="nombreBodega" type="text" class="form-control form-control-lg" placeholder="Nombre de Bodega"></h2>
			</div>
			<div class="card-body form-group row pt-1">
					<div class="col-form-label ml-3 mr-2">
						Chile /
					</div>
					<div class="col-xs-2">
						<input type="text" name="ciudadBodega" class="form-control" id="ciudad" placeholder="Ciudad">
					</div>
					<div class="col-form-label ml-2 mr-2">
						/ 
					</div>
					<div class="col-xs-2">
						<input type="text" name="direccionBodega" class="form-control" id="direccion" placeholder="Direcci&oacute;n">
					</div>
			</div>
			<div class="pr-2 pb-2">
				<div class="float-md-right btn-group-vertical ml-2">
					<button type="submit" name="agregarBodega">
						<img src="./images/icons/cart-plus.svg" width="25" height="25" class="d-inline-block align-top" style="color: cornflowerblue;" alt="Agregar">
						<div class="d-block d-sm-block d-md-none">Agregar</div>
					</button>
				</div>
				<div class="float-md-right ml-2">
					<button type="submit" name="modificarBodega">
						<img src="./images/icons/tools.svg" width="25" height="25" class="d-inline-block align-top" style="color: cornflowerblue;" alt="Modificar">
						<div class="d-block d-sm-block d-md-none">Modificar</div>
					</button>
				</div>
				<div class="float-md-right ml-2">
					<button type="submit" name="eliminarBodega">
						<img src="./images/icons/trash.svg" width="25" height="25" class="d-inline-block align-top" style="color: cornflowerblue;" alt="Eliminar">
						<div class="d-block d-sm-block d-md-none">Eliminar</div>
					</button>
				</div>
			</div>
		</div>
	</form>
	<?php
}elseif(isset($_GET['bodega']) && $_GET['bodega'] == "gestionar"){
	if($resultado = $user->buscarPorConsulta("SELECT * FROM warehause WHERE state_warehause>=1")){
		foreach($resultado as $value){
	?>
		<div class="card w-75 pt-3">
			<div class="container-fluid pt-3 card-header">
				<h2 class="panel-title"><?php echo ($value['name_warehause']); ?></h2>
			</div>
			<div class="card-body pt-1">
				<?php echo ($value['country_warehause']." / ".$value['city_warehause']." / ".$value['direction_warehause']); ?>
			</div>
			<div class="pr-2 pb-2">
				<div class="float-md-right ml-2">
					<button type="submit" name="agregarBodega">
						<img src="./images/icons/cart-plus.svg" width="25" height="25" class="d-inline-block align-top" style="color: cornflowerblue;" alt="Agregar">
						<div class="d-block d-sm-block d-md-none">Agregar</div>
					</button>
				</div>
				<div class="float-md-right ml-2">
					<button type="submit" name="modificarBodega">
						<img src="./images/icons/tools.svg" width="25" height="25" class="d-inline-block align-top" style="color: cornflowerblue;" alt="Modificar">
						<div class="d-block d-sm-block d-md-none">Modificar</div>
					</button>
				</div>
				<div class="float-md-right ml-2">
					<button type="submit" name="eliminarBodega">
						<img src="./images/icons/trash.svg" width="25" height="25" class="d-inline-block align-top" style="color: cornflowerblue;" alt="Eliminar">
						<div class="d-block d-sm-block d-md-none">Eliminar</div>
					</button>
				</div>
			</div>
		</div>
	<?php
		}
	}
}
	?>
</section>