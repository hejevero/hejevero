<?php
session_start();
include("./funciones.php");
$user = new conexion("localhost", "root", "", "hejevero3");
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
							(Id_wh,Cod_wh,Nam_wh,Dat_wh,Cou_wh,Cit_wh,Dir_wh,Sta_wh) 
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
	$noContinuar = false;
	if(isset($_SESSION['nuevoIdProd'])){
		if($_SESSION['nuevoIdProd'] != ""){
			$_SESSION['nuevoIdProd'] = $_SESSION['nuevoIdProd'] + 1;
			$noContinuar = true;
		}
		if(isset($_SESSION['nuevoIdPrecio'])){
			if($_SESSION['nuevoIdPrecio'] != "" && $_POST["precioProd"] != ""){
				$_SESSION['nuevoIdPrecio'] = $_SESSION['nuevoIdPrecio'] + 1;
				$ingresarPrecio = true;
			}
		}
		if($_SESSION['nuevoIdAlm'] != ""){
			$_SESSION['nuevoIdAlm'] = $_SESSION['nuevoIdAlm'] + 1;
		}
	}
	//nuevos id
	if($noContinuar == false){
		if($resIdProd = $user->totalIdConsulta("product")){
			foreach($resIdProd as $totalIdProd){
				$_SESSION['nuevoIdProd'] = $totalIdProd['total'] + 1;
			}
		}
		if(isset($_POST["precioProd"])){
			if($_POST["precioProd"] != ""){
				if($resIdPrecio = $user->totalIdConsulta("price")){
					foreach($resIdPrecio as $totalIdPrecio){
						$_SESSION['nuevoIdPrecio'] = $totalIdPrecio['total'] + 1;
						$ingresarPrecio = true;
					}
				}
			}
		}
		if($resIdAlm = $user->totalIdConsulta("storage_product")){
			foreach($resIdAlm as $totalIdAlm){
				$_SESSION['nuevoIdAlm'] = $totalIdAlm['total'] + 1;
			}
		}
	}
	//variables y constantes
	$user->getActDate();
	$fechaActual = $user->dateDDMMYY." ".$user->actualTime;
	$queryProd = "INSERT INTO 'product'
				(Id_pro,Cod_pro,PaNu_pro,Nam_pro,Mod_pro,Man_pro,Det_pro,Dat_pro,Stock_pro,Sta_pro)
				VALUES 
				(".$_SESSION['nuevoIdProd'].",
				'".$_POST["codProd"]."',
				'".$_POST["parnumProd"]."',
				'".$_POST["nomProd"]."',
				'".$_POST["modProd"]."',
				'".$_POST["fabProd"]."',
				'".$_POST["detProd"]."',
				'".$fechaActual."',
				'".$_POST["stockProd"]."',
				'1');";
	$finalQuery = $queryProd;
	$datosProd = array(
		0 => $_POST["codProd"],
		1 => $_POST["nomProd"],
		2 => $_POST["detProd"],
		3 => $_POST["stockProd"],
		4 => $_POST["bodProd"]
	);
	if($ingresarPrecio == true){
		$queryPrice = "INSERT INTO 'price'
						(Id_price,Cod_price,Start_dat_price,End_dat_price,New_price,State_price,product_Id_pro)
						VALUES 
						(".$_SESSION['nuevoIdPrecio'].",
						'original',
						'".$fechaActual."',
						'".$fechaActual."',
						'".$_POST["precioProd"]."',
						'1',
						".$_SESSION['nuevoIdProd'].");";
		$finalQuery = $finalQuery." ".$queryPrice;
	}
	$querySto = "INSERT INTO 'storage_product'
				(Id_sp,Dat_sp,Det_sp,Tot_sp,Qua_sp,Act_Stock_sp,Sta_sp,product_Id_pro,warehpuse_Id_wh)
				VALUES 
				(".$_SESSION['nuevoIdAlm'].",
				'".$fechaActual."',
				'Sin detalles',
				'0',
				'0',
				'".$_POST["stockProd"]."',
				'".$_POST["ingNum"]."',
				".$_SESSION['nuevoIdProd'].",
				".$_POST["bodProd"].");";
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
	$user->redireccionar("?producto=bodega&idBodega=".$_POST["bodProd"]);
}elseif(isset($_GET["opcion"])){
	if($_GET["opcion"] == "limpiarBodProd"){
		$user->limpiarBodega();
		$user->redireccionar("?producto=bodega&idBodega=".$_GET["idBodega"]);
	}
}elseif(isset($_GET["finalizar"])){
	if($_GET["finalizar"] == "bodega"){
		//codigo prueba
		foreach($_SESSION["listPro"] as $ingProd){
			//echo($ingProd);
			$queryUno = explode(';',$ingProd,3);
			for($i = 0;;$i++){
				if(isset($queryUno[$i]) && $queryUno[$i] != ""){
					echo($queryUno[$i]."</br></br>");
				}else{
					exit;
				}
			}
			//echo("</br>");
			//$user->insertarPorConsulta($ingProd);
		}
		//$user->limpiarBodega();
		//$user->redireccionar("?producto=bodega&idBodega=".$_GET["idBodega"]);
	}
}else{
	echo("Error sin ingresos");
}
?>