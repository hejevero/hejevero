<section class="container bg-light pt-5">
	<?php
	if(isset($_GET['producto'])){
		if(isset($_GET['idBodega'])){
			$user->getActDate();
			$consultaBodPro = "SELECT * FROM warehouse WHERE Id_wh=".$_GET['idBodega'];
			$resultado = $user->buscarPorConsulta($consultaBodPro);
			foreach($resultado as $bodega){
				?>
				<div class="pt-3">
					<table class="table table-borderless">
						<thead>
							<tr>
								<th scope="col">
									<h4>Bodega :<?php echo(" ".$bodega['Nam_wh']); ?></h4>
								</th>
								<th scope="col">
									<h6><?php echo("Fecha: ".$user->dateDDMMYY); ?></h6>
								</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<th>
									<h6>Ingreso de productos</h6>
								</th>
								<td>
									<div class="form-group row">
										<label for="ingNum" class="col-sm-4 col-form-label">N&uacute;mero : </label>
										<div class="col-sm-4">
											<?php
											$codigo = $user->actualYear.$user->actualMonth.$user->actualDay;
											foreach($user->totalIdConsulta("storage_product") as $resultado){
												$codigoDos = $resultado['total'];
											}
											?>
											<input class="form-control" name="ingNum" id="ingNum" type="text" value="<?php echo($codigo.$codigoDos); ?>"/>
										</div>
									</div>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
				<?php
			}
			?>
			<div class="container pb-5 text-center">
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newProd">
					Agregar producto
				</button>
			</div>
			<div class="modal fade" id="newProd" tabindex="-1" role="dialog" aria-labelledby="titleNewProd" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<form method="post" action="./process.php">
							<div class="modal-header text-center pb-3">
								<h4 class="modal-title" id="titleNewProd">Datos del producto</h4>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<div class="form-group row d-none">
									<label for="bodProd">Bodega</label>
									<input type="text" name="bodProd" id="bodProd" value="<?php if(isset($_GET["idBodega"])){echo($_GET["idBodega"]);} ?>"/>
									<label for="ingNum" class="col-sm-4 col-form-label">N&uacute;mero : </label>
									<input class="form-control" name="ingNum" id="ingNum" type="text" value="<?php echo($codigo.$codigoDos); ?>"/>
								</div>
								<div class="form-group row">
									<label for="codProd" class="col-sm-2 col-form-label">Codigo</label>
									<div class="col-sm-3">
										<input class="form-control" type="text" name="codProd" id="codProd" placeholder="Ej: 000000" maxlength="45"/>
									</div>
									<label for="parnumProd" class="col-sm-2 col-fom-label">PartNum</label>
									<div class="col-sm-5">
										<input class="form-control" type="text" name="parnumProd" id="parnumProd" placeholder="Ej: prodxxxxx" maxlength="45"/>
									</div>
								</div>
								<div class="form-group row">
									<label for="nomProd" class="col-sm-2 col-form-label">Nombre*</label>
									<div class="col-sm-4">
										<input required class="form-control" type="text" name="nomProd" id="nomProd" placeholder="Ej: Monitor 22'" maxlength="45"/>
									</div>
									<label for="modProd" class="col-sm-2 col-form-label">Modelo</label>
									<div class="col-sm-4">
										<input class="form-control" type="text" name="modProd" id="modProd" placeholder="Ej: MON2221"/>
									</div>
								</div>
								<div class="form-group row">
									<label for="fabProd" class="col-sm-2 col-form-label">Fabricante</label>
									<div class="col-sm-10">
										<input class="form-control" type="text" name="fabProd" id="fabProd" placeholder="Ej: Samsung"/>
									</div>
								</div>
								<div class="input-group pb-3">
									<div class="input-group-prepend">
										<span class="input-group-text">Detalles</span>
									</div>
									<textarea class="form-control" id="detProd" name="detProd" aria-label="Detalles" placeholder="Detalles del producto no publicos" maxlength="300"></textarea>
								</div>
								<div class="form-group row">
									<label for="stockProd" class="col-sm-2 col-form-label">Stock*</label>
									<div class="col-sm-4">
										<input required class="form-control" type="number" min="0" step="1" name="stockProd" id="stockProd" placeholder="0" maxlength="45"/>
									</div>
									<label for="precioProd" class="col-sm-2 col-form-label">Precio</label>
									<div class="col-sm-4">
										<input class="form-control" type="number" min="0" step="1" name="precioProd" id="precioProd" placeholder="0" maxlength="45"/>
									</div>
								</div>
							</div>
							<div class="modal-footer"> 
								<div class="btn-group pt-3" role="group" aria-label="Large button group">
									<button type="button" class="btn btn-light btn-sm border" data-dismiss="modal">
										<img src="./images/icons/file-x.svg" width="40" height="30" class="d-inline-block align-top" style="color: cornflowerblue;" alt="Agregar">
										<div class="d-block d-sm-block d-md-none">Cerrar</div>
									</button>
									<button type="submit" class="btn btn-light btn-sm border" name="agregarProd" id="agregarProd">
										<img src="./images/icons/cloud-plus.svg" width="40" height="40" class="d-inline-block align-top" style="color: cornflowerblue;" alt="Agregar">
										<div class="d-block d-sm-block d-md-none">Agregar</div>
									</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
			<?php
		}else{
			
		}
	}else{
		
	}
	?>
	<div class="table-responsive">
		<table class="table table-bordered table-hover">
			<thead>
				<tr>
					<th scope="col">Codigo</th>
					<th scope="col">Nombre</th>
					<th scope="col">Detalles</th>
					<th scope="col">Cantidad</th>
				</tr>
			</thead>
			<tbody>
				<?php
				print_r($_SESSION["listPro"]);
				if(isset($_SESSION["publicListPro"])){
					if($_SESSION["publicListPro"] != ""){
						foreach($_SESSION["publicListPro"] as $fila => $publicListProd){
						?>
							<tr>
								<th scope="row"><?php echo($publicListProd[0]); ?></th>
								<td><?php echo($publicListProd[1]); ?></td>
								<td><div style="width:100%; overflo:auto;"><?php echo($publicListProd[2]); ?></div></td>
								<td><?php echo($publicListProd[3]); ?></td>
							</tr>
						<?php
						}
						?>
						<tr>
							<th colspan="3"></th>
							<td>
								<div class="btn-group" role="group" aria-label="Large button group">
									<a href="./process.php?finalizar=bodega&idBodega=<?php echo($_GET['idBodega']); ?>">
										<button type="button" class="btn btn-success border" name="modificarBodega">
											<img src="./images/icons/cloud-plus.svg" width="25" height="25" class="d-inline-block align-top" style="color: cornflowerblue;" alt="Modificar">
											<div class="d-block d-sm-block d-md-none">Agregar</div>
										</button>
									</a>
									<a href="./process.php?opcion=limpiarBodProd&producto=bodega&idBodega=<?php echo($_GET['idBodega']); ?>">
										<button type="button" class="btn btn-danger border" name="eliminarBodega">
											<img src="./images/icons/trash.svg" width="25" height="25" class="d-inline-block align-top" style="color: cornflowerblue;" alt="Eliminar">
											<div class="d-block d-sm-block d-md-none">Limpiar</div>
										</button>
									</a>
								</div>
							</td>
						</tr>
						<?php
					}else{
						?>
						<tr>
							<th scope="row">Ej: G211</th>
							<td>Ej: Cartera</td>
							<td><div style="width:100%; overflow:auto;">Ej: Cafe</div></td>
							<td>Ef: 1</td>
						</tr>
					<?php
					}
				}else{
				?>
					<tr>
						<th scope="row">Ej: G211</th>
						<td>Ej: Cartera</td>
						<td><div style="width:100%; overflow:auto;">Ej: Cafe</div></td>
						<td>Ej: 1</td>
					</tr>
				<?php
				}
				?>
			</tbody>
		</table>
	</div>
</section>