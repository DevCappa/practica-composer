<?php 

	namespace PracticaComposer\Content\Config\Connect;
	use PracticaComposer\Content\Config\ConfigSistema\sysConfig as sysConfig;
	
	class database extends sysConfig{

		private $localhost;
		private $password;
		private $user;
		private $DataBase;
		private $con;

		public function __construct(){

			$this->localhost = parent::_BD_Server_();
			$this->password = parent::_Pass_();
			$this->user = parent::_User_();
			$this->DataBase = parent::_DB_Name_();
			
		}


		protected function activeDB(){
			try{
				$this->con = new \PDO("mysql: host=" . $this->localhost . "; dbname=" . $this->DataBase, $this->user, $this->password);
				$this->con->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
			}catch(\PDOException $ms){
				//die("<script>location='?url=dbError&ms=$" . $ms->getMessage() . "'</script>");
				die('ERROR DE CONEXIÓN: No se ha podido conectar con la base de datos. '. $ms->getMessage());
			}

			return $this->con;
		}

		protected function bitacora($modulo, $result, $destc, $idU){
			$con = $this->con;
			$date = date("n/j/Y");
			$sql = "INSERT INTO `bitacora`(`idBitacora`, `modulo`, `resultadoObtenido`, `descripcion`, `fecha`, `idUsuario`) VALUES (default, ?, ?, ?, ?, ?)";
			$new = $con->prepare($sql);
			$new->bindValue(1, $modulo);
			$new->bindValue(2, $result);
			$new->bindValue(3, $destc);
			$new->bindValue(4, $date);
			$new->bindValue(5, $idU);
			$new->execute();
		}

		protected function desactiveDB(){
			$this->con = NULL;
		}
	}


?>