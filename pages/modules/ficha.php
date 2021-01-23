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
							<th scope="col">
								<h4>Bodega :<?php echo(" ".$bodega['Name_wh']); ?></h4>
							</th>
						</thead>
						<tbody>
							<th>
								<h6>Ingreso de productos</h6>
							</th>
							<td>
								<h6><?php echo("Fecha: ".$user->dateDDMMYY); ?></h6>
							</td>
						</tbody>
					</table>
				</div>
				<?php
			}
			?>
			<form method="post" action="./process.php">
				<div class="container text-center pb-3">
					<h4>Datos del producto</h4>
				</div>
				<div class="form-group row d-none">
					<label for="bodProd">Bodega</label>
					<input type="text" name="bodProd" id="bodProd" value="<?php if(isset($_GET["idBodega"])){echo($_GET["idBodega"]);} ?>"/>
				</div>
				<div class="form-group row">
					<label for="codProd" class="col-sm-2 col-form-label">Codigo</label>
					<div class="col-sm-3">
						<input class="form-control" type="text" name="codProd" id="codProd" placeholder="Ej: 000000" maxlength="45"/>
					</div>
					<label for="parnumProd" class="col-sm-2 col-fom-label">PartNumber</label>
					<div class="col-sm-4">
						<input class="form-control" type="text" name="parnumProd" id="parnumProd" placeholder="Ej: prodxxxxx" maxlength="45"/>
					</div>
				</div>
				<div class="form-group row">
					<label for="nomProd" class="col-sm-2 col-form-label">Nombre*</label>
					<div class="col-sm-4">
						<input class="form-control" type="text" name="nomProd" id="nomProd" placeholder="Ej: Monitor 22'" maxlength="45"/>
					</div>
					<label for="modProd" class="col-sm-2 col-form-label">Modelo</label>
					<div class="col-sm-3">
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
						<input class="form-control" type="number" min="0" step="1" name="stockProd" id="stockProd" placeholder="0" maxlength="45"/>
					</div>
					<label for="precioProd" class="col-sm-2 col-form-label">Precio</label>
					<div class="col-sm-4">
						<input class="form-control" type="number" min="0" step="1" name="precioProd" id="precioProd" placeholder="0" maxlength="45"/>
					</div>
				</div>
				<div class="container text-center"> 
					<div class="btn-group pt-3" role="group" aria-label="Large button group">
						<button type="submit" class="btn btn-light btn-sm border" name="agregarProd" id="agregarProd">
							<img src="./images/icons/cloud-plus.svg" width="50" height="50" class="d-inline-block align-top" style="color: cornflowerblue;" alt="Agregar">
							<div class="d-block d-sm-block d-md-none">Agregar</div>
						</button>
					</div>
				</div>
			</form>
			<?php
		}else{
			
		}
	}else{
		
	}
	?>
</section>