<?php
	use PracticaComposer\Content\Config\ConfigSistema\sysConfig as sysConfig;
	use PracticaComposer\Content\Model\practicaModel as practicaModel;

	$config = new sysConfig();
	$model = new practicaModel();

	if(isset($_POST['LoadAlbum'])){
		$model->buscarImagenes();
	}

	if(isset($_POST['nameImg'])){
		$model->cargarImagen($_POST['nameImg']);
	}


	if(isset($_REQUEST['tipo'])){
		if($_REQUEST['tipo'] == "consultar"){
			$datos = $model->getDataPractica();
			require_once("View/practicaConsultarView.php");
		}elseif($_REQUEST['tipo'] == "registrar"){
			require_once("View/practicaRegistroView.php");
		}elseif($_REQUEST['tipo'] == "modificar"){
			require_once("View/practicaModificarView.php");
		}elseif($_REQUEST['tipo'] == "eliminar"){
			require_once("View/practicaEliminarView.php");
		}elseif($_REQUEST['tipo'] == "imagenes"){
			require_once("View/practicaImagenesView.php");
		}else{
			die("<script>location='?url=practica&tipo=consultar'</script>");
		}
	}else{
		die("<script>location='?url=practica&tipo=consultar'</script>");
	}

?>