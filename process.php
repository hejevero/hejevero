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
	$queryProd = "INSERT INTO product
				VALUES (
				'".$nuevoIdProd."',
				'".$_POST["codProd"]."',
				'".$_POST["parnumProd"]."',
				'".$_POST["nomProd"]."',
				'".$_POST["modProd"]."',
				'".$_POST["fabProd"]."',
				'".$_POST["detProd"]."',
				'".$fechaActual."',
				'".$_POST["stockProd"]."',
				'1'
	);";
	$finalQuery = $queryProd;
	$datosProd = array(
		0 => $_POST["codProd"],
		1 => $_POST["nomProd"],
		2 => $_POST["detProd"],
		3 => $_POST["stockProd"]
	)
	if($ingresarPrecio == true){
		$_SESSION["totalPrecio"] = $_POST["precioProd"];
		$queryPrice = "INSERT INTO price
						VALUES (
						'".$nuevoIdPrecio."',
						'original',
						'".$fechaActual."',
						'".$fechaActual."',
						'".$_POST["precioProd"]."',
						'1',
						'".$nuevoIdProd."'
		);";
		$finalQuery = $finalQuery." ".$queryPrice;
	}
	$querySto = "INSERT INTO storage_product
				VALUES (
				'".$nuevoIdAlm."',
				'".$fechaActual."',
				'Sin detalles',
				'0',
				'0',
				'".$_POST["stockProd"]."',
				'".$_POST["stockProd"]."',
				'".$nuevoIdProd."',
				'".$_POST["bodProd"]."'
	);";
	$finalQuery = $finalQuery." ".$querySto;
	//guardar consultas en un array session
	if(isset($_SESSION["listPro"])){
		if($_SESSION["listPro"] != ""){
			$listProd = $_SESSION["listPro"];
			$totalArray = count($_SESSION["listPro"]);
			$listProd[$totalArray] = $finalQuery;
			$_SESSION["listPro"] = $listProd;
		}elseif($_SESSION["listPro"] == ""){
			$_SESSION["listPro"] = array(
			0 => $finalQuery
			);
		}
	}else{
		$_SESSION["listPro"] = array(
		0 => $finalQuery
		);
	}
	if(isset($_SESSION["publicListPro"])){
		if($_SESSION["publicListPro"] != ""){
			$publicListProd = $_SESSION["publicListPro"];
			$totalArray = count($publicListProd);
			$publicListProd[$totalArray] = $datosProd;
			$_SESSION["publicListPro"] = $publicListProd;
		}elseif($_SESSION["publicListPro"] == ""){
			$_SESSION["publicListPro"] = array(
				0 => $datosProd
			);
		}
	}else{
		$_SESSION["publicListPro"] = array(
			0 => $datosProd
		);
	}
	//$user->redireccionar("?producto=bodega&idBodega=".$_POST["bodProd"].);
}else{
	echo("Error sin ingresos");
}
?>