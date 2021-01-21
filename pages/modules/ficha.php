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
			<form>
				<table class="table-responsive">
					<thead>
						<tr>
							<th colspan="2" class="table-primary text-center">Datos del producto</th>
						</tr>
					</thead>
					<tbody>
						<tr class="form-group row">
							<th><label for="nomProd" class="col-sm-2 col-form-label">Nombre</label></th>
							<th><input class="col-sm-10" type="text" name="nomProd" id="nomProd" placeholder="Ingrese nombre"/></th>
						</tr>
						<tr>
							<th>Codigo</th>
							<th><input class="rounded" type="text" name="codProd" placeholder="Ingrese codigo"/></th>
						</tr>
						<tr>
							<th>Part Number</th>
							<th><input class="rounded" type="text" name="parnumProd" placeholder="Ingrese part number"/></th>
						</tr>
						<tr>
							<th>Detalles</th>
							<th><input class="rounded" type="text" name="detProd" placeholder="Ingrese nombre"/></th>
						</tr>
						<tr>
							<th>Stock</th>
							<th><input class="rounded" type="text" name="stockProd" placeholder="Ingrese Stock"/></th>
						</tr>
						<tr>
							<th>Precio</th>
							<th><input class="rounded" type="text" name="precioProd" placeholder="Ingrese precio"/></th>
						</tr>
					</tbody>
				</table>
			</form>
			<?php
		}else{
			
		}
	}else{
		
	}
	?>
</section>