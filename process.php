<?php
session_start();
include("./funciones.php");
$user = new conexion("localhost", "root", "", "hejevero2");
if(isset($_POST['username']) || isset($_POST['password']) && $_POST['username'] != ""){
	$user->getUserNick($_POST['username'], $_POST['password']);
	//echo($user->messagePublic);
	$user->volverInicio();
	exit;
}elseif(isset($_GET['log-out'])){
	if($_GET['log-out'] == "true"){
		setcookie("userNow", "", time()-3600);
		setcookie("levelNow", "", time()-3600);
		$user->volverInicio();
	}else{
		$user->volverInicio();
	}
}elseif(isset($_POST['agregarBodega'])){
	if(isset($_POST['agregarBodega'])){
		//calcular id nuevo
		if($resID = $user->totalIdConsulta("warehouse")){
			foreach($resID as $totalId){
				$nuevoId = $totalId['total'] + 1;
			}
		}
		if($resIdUser = $user->totalIdConsulta("level_user_warehouse")){
			foreach($resIdUser as $totalIdUser){
				$nuevoIdUser = $totalIdUser['total'] + 1;
			}
		}
		//fecha
		$user->getActDate();
		$fechaActual = $user->dateDDMMYY." ".$user->actualTime;
		//variables y constsntes
		if($nuevoId < 10){
			$codigo = $_POST['ciudadBodega']."00".$nuevoId;
		}elseif($nuevoId > 9 && $nuevoId < 100){
			$codigo = $_POST['ciudadBodega']."0".$nuevoId;
		}else{
			$codigo = $_POST['ciudadBodega'].$nuevoId;
		}
		$pais = "Chile";
		$estado = $_COOKIE["idUserNow"];
		//Salida
		$consultaBodega = "INSERT INTO warehouse 
							(Id_wh,Cod_wh,Name_wh,Dat_wh,Cou_wh,Cit_wh,Dir_wh,Sta_wh) 
							VALUES 
							(".$nuevoId.",'".$codigo."','".$_POST['nombreBodega']."','".$fechaActual."','".$pais."','".$_POST['ciudadBodega']."','".$_POST['direccionBodega']."','".$estado."');
							";
		$nuevaBodega = $user->insertarPorConsulta($consultaBodega);
		$consultaUserBodega = "
								INSERT INTO level_user_warehouse
								(Id_luw,Sta_luw,user_Id_user,level_Id_level,warehouse_Id_wh) 
								VALUES 
								('".$nuevoIdUser."','1','".$_COOKIE["idUserNow"]."','2','".$nuevoId."');
								";
		$nuevoUserBodega = $user->insertarPorConsulta($consultaUserBodega);
		if($nuevaBodega && $nuevoUserBodega){
			$user->volverInicio();
		}else{
			echo ("Error en la consulta");
		}
	}else{
		$user->volverInicio();
	}
}elseif(isset($_POST["agregarProd"])){
	$ingresarPrecio = false;
	$_SESSION["totalPrecio"] = 0;
	$_SESSION["cantidadPrecio"] = 0;
	$_SESSION["stockTotalPrecio"] = 0;
	//calcular nuevo id
	if($resIdProd = $user->totalIdConsulta("product")){
		foreach($resIdProd as $totalIdProd){
			$nuevoIdProd = $totalIdProd['total'] + 1;
		}
	}
	if(isset($_POST["precioProd"])){
		if($_POST["precioProd"] != ""){
			if($resIdPrecio = $user->totalIdConsulta("price")){
				foreach($resIdPrecio as $totalIdPrecio){
					$nuevoIdPrecio = $totalIdPrecio['total'] + 1;
					$ingresarPrecio = true;
				}
			}
		}
	}
	if($resIdAlm = $user->totalIdConsulta("storage_product")){
		foreach($resIdAlm as $totalIdAlm){
			$nuevoIdAlm = $totalIdAlm['total'] + 1;
		}
	}
	//variables y constantes
	$user->getActDate();
	$fechaActual = $user->dateDDMMYY." ".$user->actualTime;
	echo("producto ("
		.$nuevoIdProd." / "
		.$_POST["codProd"]." / "
		.$_POST["parnumProd"]." / "
		.$_POST["nomProd"]." / "
		.$_POST["modProd"]." / "
		.$_POST["fabProd"]." / "
		.$_POST["detProd"]." / "
		.$fechaActual." / "
		.$_POST["stockProd"]." / 
		1); </br>
	");
	if($ingresarPrecio == true){
		$_SESSION["totalPrecio"] = $_POST["precioProd"];
		echo("precio ("
			.$nuevoIdPrecio." / 
			original / "
			.$fechaActual." / "
			.$fechaActual." / "
			.$_POST["precioProd"]."
			 / 1 / "
			.$nuevoIdProd."); </br>
		");
	}
	echo("almacenamiento("
	.$nuevoIdAlm." / "
	.$fechaActual." / 
	Sin detalles / "
	.$_SESSION["totalPrecio"]." / "
	.$_SESSION["cantidadPrecio"]." / "
	.$_SESSION["stockTotalPrecio"]." / "
	.$_POST["bodProd"]." / 
	1);
	");
	$_SESSION["totalPrecio"] = 0;
}else{
	echo("Error sin ingresos");
}
?>