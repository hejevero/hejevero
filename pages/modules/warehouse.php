<section class="container bg-light pt-5">
<?php
if(isset($_GET['bodega']) && $_GET['bodega'] == "agregar"){
?>
	<form class="pt-3" method="post" action="./process.php?bodega=add">
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
			<div class="container"> 
				<div class="btn-group float-md-right pb-2" role="group" aria-label="Large button group">
					<button type="submit" class="btn btn-light btn-sm border" name="agregarBodega">
						<img src="./images/icons/cloud-plus.svg" width="25" height="25" class="d-inline-block align-top" style="color: cornflowerblue;" alt="Agregar">
						<div class="d-block d-sm-block d-md-none">Agregar</div>
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
		<form class="pt-3">
		<div class="card w-75 pt-3">
			<div class="container-fluid pt-3 card-header">
				<h2 class="panel-title"><?php echo ($value['name_warehause']); ?></h2>
			</div>
			<div class="card-body pt-1">
				<?php echo ($value['country_warehause']." / ".$value['city_warehause']." / ".$value['direction_warehause']); ?>
			</div>
			<div class="container"> 
				<div class="btn-group float-md-right pb-2" role="group" aria-label="Large button group">
					<a href="?producto=bodega&idBodega=<?php echo($value['id_warehause']); ?>">
						<button type="submit" class="btn btn-light btn-sm border" name="agregarBodega">
							<img src="./images/icons/cart-plus.svg" width="25" height="25" class="d-inline-block align-top" style="color: cornflowerblue;" alt="Agregar">
							<div class="d-block d-sm-block d-md-none">Agregar</div>
						</button>
					</a>
					<a href="?bodega=modificar&id=<?php echo ($value['id_warehause']); ?>">
						<button type="submit" class="btn btn-light border" name="modificarBodega">
							<img src="./images/icons/tools.svg" width="25" height="25" class="d-inline-block align-top" style="color: cornflowerblue;" alt="Modificar">
							<div class="d-block d-sm-block d-md-none">Modificar</div>
						</button>
					</a>
					<a href="?bodega=eliminar&id=<?php echo($value['id_warehause']); ?>">
						<button type="submit" class="btn btn-light border" name="eliminarBodega">
							<img src="./images/icons/trash.svg" width="25" height="25" class="d-inline-block align-top" style="color: cornflowerblue;" alt="Eliminar">
							<div class="d-block d-sm-block d-md-none">Eliminar</div>
						</button>
					</a>
				</div>
			</div>
		</div>
		</form>
	<?php
		}
	}
}
	?>
</section>