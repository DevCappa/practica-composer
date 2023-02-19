<?php

	namespace PracticaComposer\Content\Config\ConfigSistema;

	define("_SYS_VER_", "1.0.0");
	define("_DIRECTORY_", "Content/Controller/");
	define("_CONF_", "config/");
	define("_ROUTE_", "http://127.0.0.1/practica-composer/");
	define("_CONTROLLER_", "Controller.php");
	define("_INDEX_FILE_", "Inicio");
	define("_THEME_", "assets/");
	define("_SERIAL_", "123");  
	define("_MODEL_", "modelo/");
	define("_DB_SERVER_", "127.0.0.1");
	define("_DB_NAME_", "practica");
	define("_DB_USER_", "root");
	define("_DB_PASS_", "");
	define("_Token_", "0ea5f6acb5d25184ad59b436f73fd5538424cef2cd80fc7d3e6dfe1087c9d228");

	class sysConfig{

		public function _int(){
			if(!file_exists("Content/Controller/frontController.php")){
				die('
					<title>Mantenimiento</title>
					<h1>No existe el controlador principal</h1>
					<input type="hidden" id="ms" value="Error en el frontController.">'
				);
			}
		}

		protected function _TokenSis(){
			return _Token_;
		}

		protected function _Contro_(){
			return _CONTROLLER_;
		}

		protected function _User_(){
			return _DB_USER_;
		}

		protected function _Pass_(){
			return _DB_PASS_;
		}

		protected function _BD_Server_(){
			return _DB_SERVER_;
		}

		protected function _DB_Name_(){
			return _DB_NAME_;
		}

		protected function _Model_(){
			return _MODEL_;
		}

		protected function _Theme_(){
			return _THEME_;
		}

		protected function _Index_(){
			return _INDEX_FILE_;
		}

		protected function _Dir_(){
			return _DIRECTORY_;
		}

		protected function _Version_(){
			return _SYS_VER_;
		}

		protected function _Root_(){
			return _ROUTE_;
		}

		public function _head(){
			echo '<meta charset="utf-8">
				<meta http-equiv="X-UA-Compatible" content="IE=edge">
				<meta name="viewport" content="width=device-width, initial-scale=1.0">
				
			    <meta charset="utf-8">
			    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

			    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
			    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
			    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
				<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
				<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
				<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';
		}


		public function _menu(){


			$actRgistro = "text-white";$actConsul = "text-white";$actModi = "text-white";$actElimi = "text-white";$actImg = "text-white";
			if(isset($_REQUEST["url"])){
				if($_REQUEST["url"] == "practica"){
					if(isset($_REQUEST["tipo"])){
						if($_REQUEST['tipo'] == "consultar"){
							$actConsul = "active";
						}elseif($_REQUEST['tipo'] == "registrar"){
							$actRgistro = "active";
						}elseif($_REQUEST['tipo'] == "modificar"){
							$actModi = "active";
						}elseif($_REQUEST['tipo'] == "eliminar"){
							$actElimi = "active";
						}elseif($_REQUEST['tipo'] == "imagenes"){
							$actImg = "active";
						}else{
							$actConsul = "active";
						}
					}else{
						$actConsul = "active";
					}
				}else{
					$actConsul = "active";
				}
			}else{
				$actConsul = "active";
			}
			echo '<div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 280px;height: 100%;">
		    <a href="?url=practica&tipo=registrar" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
		      <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
		      <span class="fs-4">Menu Ejemplo</span>
		    </a>
		    <hr>
		    <ul class="nav nav-pills flex-column mb-auto">
		      <li class="nav-item">
		        <a href="?url=practica&tipo=registrar" class="nav-link '.$actRgistro.'" aria-current="page">
		          <svg class="bi me-2" width="16" height="16"><use xlink:href="#home"></use></svg>
		          Registro
		        </a>
		      </li>
		      <li>
		        <a href="?url=practica&tipo=consultar" class="nav-link '.$actConsul.'">
		          <svg class="bi me-2" width="16" height="16"><use xlink:href="#speedometer2"></use></svg>
		          Consultar
		        </a>
		      </li>
		      <li>
		        <a href="?url=practica&tipo=modificar" class="nav-link '.$actModi.'">
		          <svg class="bi me-2" width="16" height="16"><use xlink:href="#table"></use></svg>
		          Modificar
		        </a>
		      </li>
		      <li>
		        <a href="?url=practica&tipo=eliminar" class="nav-link '.$actElimi.'">
		          <svg class="bi me-2" width="16" height="16"><use xlink:href="#grid"></use></svg>
		          Eliminar
		        </a>
		      </li>
		      <li>
		        <a href="?url=practica&tipo=imagenes" class="nav-link '.$actImg.'">
		          <svg class="bi me-2" width="16" height="16"><use xlink:href="#grid"></use></svg>
		          Imagenes
		        </a>
		      </li>
		    </ul>
		    <hr>
		    <div class="dropdown">
		      <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
		        <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
		        <strong>mdo</strong>
		      </a>
		      <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
		        <li><a class="dropdown-item" href="#">New project...</a></li>
		        <li><a class="dropdown-item" href="#">Settings</a></li>
		        <li><a class="dropdown-item" href="#">Profile</a></li>
		        <li><hr class="dropdown-divider"></li>
		        <li><a class="dropdown-item" href="#">Sign out</a></li>
		      </ul>
		    </div>
		  </div>';
		}

	}


?>