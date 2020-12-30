<?php
include("./funciones.php");
$user = new conexion("localhost", "root", "", "hejevero");
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
}elseif(isset($_GET['bodega'])){
	if($_GET['bodega'] == "add"){
		echo("agregar bodega");
	}else{
		$user->volverInicio();
	}
}else{
	echo("Error");
}
?>