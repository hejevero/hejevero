<?php
class login{
	function getUserName(PDO $pdo, $userNick){
		if(empty($userNick) || $userNick == ""){
			throw new InvalidArgumentException(
				'Ingrese usuario'.
				'Vslue sent: '.var_export($userNick, true)
			);
		}
		$conUser = "SELECT * 
					FROM user
					WHERE nick_user = :userNick
					Limit 1";
		try{
			$stmt = $pdo->prepare($conUser);
			$stmt->bindParam(':userNick, $userNick');
			$stmt->execute();
			if($stmt->rowCount === 0){
				return false;
			}else{
				return $stmt->fetchColumn();
			}
		}catch(PDOException $e){
			error_log(
				'Algo salio mal : '.
				$e->getMessage()
			);
			return null;
		}
	}
}
?>