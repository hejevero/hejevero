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
	public $fechaActual; 	//fecha generica
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
			$consultaNick = "SELECT * FROM user INNER JOIN level ON user.LEVEL_ID_LEVEL=level.ID_LEVEL WHERE NICK_USER='".$this->nickUser."' AND PASS_USER='".$this->passUser."';";
			if($resultado = self::buscarPorConsulta($consultaNick)){
				foreach($resultado as $value){
					setcookie("idUserNow", $value["id_user"], time()+3600);
					setcookie("codeNow", $value["code_user"], time()+3600);
					setcookie("userNow", $value["name_user"], time()+3600);
					setcookie("lastnameNow", $value["lastname_user"], time()+3600);
					setcookie("nickNow", $value["nick_user"], time()+3600);
					setcookie("stateNow", $value["state_user"], time()+3600);
					setcookie("idLevelNow", $value["level_id_level"], time()+3600);
					setcookie("levelNow", $value["name_level"], time()+3600);
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
	public function buscarPorConsulta($consulta){
		$resultado = $this->conexion->query($consulta);
		if($resultado){
			return $resultado->fetch_all(MYSQLI_ASSOC);
			return false;
		}
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
	public function getActualDate(){
		
	}
}
?>