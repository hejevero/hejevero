<?php
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
}else{
	echo("Error");
}
?>