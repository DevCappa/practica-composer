<?php
	namespace PracticaComposer\Content\Model;
	use PracticaComposer\Content\Config\Connect\database as database;
	use PracticaComposer\Content\Helpers\imagenTraits as imagenTraits;
	
	class practicaModel extends database{

		use imagenTraits;

		public function __construct(){
			parent::__construct();
		}

		public function getDataPractica(){
			$con = parent::activeDB();

			$sql = "SELECT `id`, `NombreDato`, `DescripcionDato`, `estado` FROM `datospractica` WHERE 1 ORDER BY estado desc";
			$new = $con->prepare($sql);
			$new->execute();
			return $new->fetchAll();
		}

		public function buscarImagenes(){
			$con = parent::activeDB();
			$sql = "SELECT * FROM `galeriaimg` WHERE 1 ORDER BY idImg desc limit 3";
			$new = $con->prepare($sql);
			$new->execute();
			$respuesta = $new->fetchAll();
			$arrayR = array("respuesta" => $respuesta);
			echo json_encode($arrayR);
			die();
		}

		public function cargarImagen($name){
			$con = parent::activeDB();
			$sql = "SELECT * FROM `galeriaimg` WHERE `nombreImg` = ? ORDER BY idImg desc limit 1";
			$new = $con->prepare($sql);
			$new->bindValue(1, $name);
			$new->execute();
			$respuesta = $new->fetchAll();
			if(isset($respuesta[0]["nombreImg"])){
				if($this->deleteImagen($respuesta[0]["rutaImg"])){
					//Reload Imagen//
					$nombre = $this->loadImg($_FILES, "assets/img/imgComposer/");
					$sql = "UPDATE `galeriaimg` SET `rutaImg`= ? WHERE `nombreImg` = ?";
					$new = $con->prepare($sql);
					$new->bindValue(1, $nombre[0]);
					$new->bindValue(2, $name);
					$new->execute();
					$arrayRespuesta = array("msj" => "Good");
					echo json_encode($arrayRespuesta);
					die();
				}else{
					$arrayRespuesta = array("msj" => "Error manipulando la imagen");
					echo json_encode($arrayRespuesta);
					die();
				}
			}else{
				$nombre = $this->loadImg($_FILES, "assets/img/imgComposer/");
				$sql = "INSERT INTO `galeriaimg`(`idImg`, `nombreImg`, `rutaImg`) VALUES (default, ?, ?)";
				$new = $con->prepare($sql);
				$new->bindValue(1, $name);
				$new->bindValue(2, $nombre[0]);
				$new->execute();
				$arrayRespuesta = array("msj" => "Good");
				echo json_encode($arrayRespuesta);
				die();
			}
		}

	}


?>