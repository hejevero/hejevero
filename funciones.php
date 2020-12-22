<?php
//Conexion a basse de datos
class conexion{
	public $dbserver;
	public $dbuser;
	public $dbpass;
	public $dbname;
	public $conexion;
	public function __construct($dbserver, $dbuser, $dbpass, $dbname){
		$this->dbserver = $dbserver;
		$this->dbuser = $dbuser;
		$this->dbpass = $dbpass;
		$this->dbname = $dbname;
		$this->conexion = new mysqli($this->dbserver, $this->dbuser, $this->dbpass, $this->dbname);
		$this->conexion->set_charset("utf-8");
	}
	public function buscar($consulta){
		$resultado = $this->conexion->query($consulta);
		if($resultado){
			return $resultado->fetch_all(MYSQLI_ASSOC);
			return false;
		}
	}
}
class sesion{
	public $nickUser;
	public $passUser;
	public function getUserNick($nickUser, $passUser){
		try{
			setcookie("userNow", $nickUser, time()+3600);
		}catch(Exception $e){
			error_log(
				'Algo salio mal : '.
				$e->getMessage()
			);
		}
	}
}
?>