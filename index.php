<?php 


	if(file_exists("vendor/autoload.php")){
		require_once('vendor/autoload.php');
	}else{
		die('
			<title>Mantenimiento</title>
			<h1>No se encuentra Composer</h1>
			<input type="hidden" id="ms" value="Error en el frontController.">'
		);
	}

	

	use PracticaComposer\Content\Config\ConfigSistema\sysConfig as sysConfig;
	$objConfig = new sysConfig;
	$objConfig->_int();

	use PracticaComposer\Content\Controller\frontController as frontController;
	$objConfig = new frontController($_REQUEST);

?>