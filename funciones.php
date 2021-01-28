<?php
//Conexion a basse de datos
class conexion{
	private $dbserver;		//__construct
	private $dbuser;		//__construct
	private $dbpass;		//__construct
	private $dbname;		//__construct
	private $conexion;		//__construct
	private $nickUser;		//getUserNick
	private $passUser; 		//getUserNick
	public $messagePublic; 	//mensaje generico
	public $actualDay; 		//getActDate
	public $actualMonth; 	//getActDate
	public $actualYear; 	//getActDate
	public $dateDDMMYY; 	//getActDate
	public $dateYYMMDD; 	//getActDate
	public $dateMMDDYY; 	//getActDate
	public $actualWeek; 	//getActDate
	public $actualTime; 	//getActDate
	public $total;
	public function __construct($dbserver, $dbuser, $dbpass, $dbname){
		$this->dbserver = $dbserver;
		$this->dbuser = $dbuser;
		$this->dbpass = $dbpass;
		$this->dbname = $dbname;
		$this->conexion = new mysqli($this->dbserver, $this->dbuser, $this->dbpass, $this->dbname);
		$this->conexion->set_charset("utf-8");
	}
	public function getUserNick($nickUser, $passUser){
		$this->nickUser = $nickUser;
		$this->passUser = $passUser;
		try{
			$consultaNick = "SELECT * FROM user 
							INNER JOIN system 
							ON user.Id_user=system.user_Id_user 
							INNER JOIN level
							ON system.level_Id_level=level.Id_level
							WHERE Nick_user='".$this->nickUser."' AND Pass_user='".$this->passUser."';";
			if($resultado = self::buscarPorConsulta($consultaNick)){
				foreach($resultado as $value){
					setcookie("idUserNow", $value["Id_user"], time()+3600);
					setcookie("codeNow", $value["Cod_user"], time()+3600);
					setcookie("userNow", $value["Nam_user"], time()+3600);
					setcookie("lastnameNow", $value["Lasn_user"], time()+3600);
					setcookie("nickNow", $value["Nick_user"], time()+3600);
					setcookie("stateNow", $value["Sta_user"], time()+3600);
					setcookie("idLevelNow", $value["Id_level"], time()+3600);
					setcookie("levelNow", $value["Nam_level"], time()+3600);
				}
				$this->messagePublic = "Usuario encontrado";
			}else{
				$this->messagePublic = $consultaNick." Error usuario no encontrado";
			}
			$messagePublic = $this->messagePublic;
		}catch(Exception $e){
			error_log(
				'Algo salio mal : '.
				$e->getMessage()
			);
		}
		return false;
	}
	public function getActDate(){
		date_default_timezone_set("America/Santiago");
		$this->actualDay 		= date("d");
		$this->actualMonth 		= date("m");
		$this->actualYear 		= date("y");
		$this->dateDDMMYY 		= date("d-m-y");
		$this->dateYYMMDD 		= date("y-m-d");
		$this->dateMMDDYY 		= date("m-d-y");
		$this->actualWeek 		= date("W");
		$this->actualTime 		= date("H:i:s");
	}
	public function totalIdConsulta($tabla){
		$resID = $this->conexion->query("SELECT COUNT(*) AS 'total' FROM ".$tabla) or die($this->conexion->error);
		if($resID){
			return $resID->fetch_all(MYSQLI_ASSOC);
			return false;
		}else{
			$total = 0;
			return $total;
		}
	}
	public function buscarPorConsulta($consulta){
		$resultado = $this->conexion->query($consulta) or die($this->conexion->error);
		if($resultado){
			return $resultado->fetch_all(MYSQLI_ASSOC);
			return false;
		}
	}
	public function insertarPorConsulta($consulta){
		$resINS = $this->conexion->query($consulta) or die($this->conexion->error);
		if($resINS){
			$this->messagePublic = "Nuevo registro sin problemas";
			return true;
		}else{
			$this->messagePublic = "Registro no ingresada";
			return true;
		}
		$messagePublic = $this->messagePublic;
		return false;
	}
	public function redireccionar($pagina){
		echo("
		<html>
			<head>
				<meta http-equiv='refresh' content='0; url=http://localhost/hejevero/".$pagina.">
			</head>
		</html>
		");
	}
	public function volverInicio(){
		echo("
		<html>
			<head>
				<meta http-equiv='refresh' content='0; url=http://localhost/hejevero/index.php'>
			</head>
		</html>
		");
	}
	public function limparSesion(){
		$_SESSION["listPro"] = "";
		$_SESSION["publicListPro"] = "";
	}
}
?>