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
		}else{
			
		}
	}else{
		
	}
	?>
</section>