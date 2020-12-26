<?php
include("./funciones.php");
$user = new conexion("localhost", "root", "", "hejevero");
if(isset($_POST['username']) || isset($_POST['password']) && $_POST['username'] != ""){
	$user->getUserNick($_POST['username'], $_POST['password']);
	//echo($user->messagePublic);
	$user->volverInicio();
}elseif(isset($_GET['log-out']) || $_GET['log-out'] != ""){
	setcookie("userNow", "", time()-3600);
	setcookie("levelNow", "", time()-3600);
	$user->volverInicio();
}else{
	echo("Error");
}
?>