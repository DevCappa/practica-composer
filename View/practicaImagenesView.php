<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registro</title>
	<?php $config->_head(); ?>
</head>
<body>
	<style type="text/css">
		.invalid{
			border-color: red;
		}
		.Error{
			color: red;
		}
		.hidden{
			display: none;
		}
	</style>
	<main style="height:100vh; display: flex;">

		<?php $config->_menu(); ?>
		<div class="bg-light p-5 rounded" style="width:100%">
        <div class="col-xxl-3 mb-3" style="margin:auto">
        	<h1 class="text-center">Registrar Imagen</h1><br>
       		<img src="https://img.freepik.com/vector-gratis/fondo-universo-degradado_23-2149635763.jpg" id="Render" style="width:100%;">
       	</div>
        <form method="POST" id="envioData">
	      	<div class="mb-3">
					  <label for="nameImg" class="form-label">Nombre Imagen</label>
					  <input type="text" class="form-control" id="nameImg" placeholder="Nombre de la imagene...">
					  <p class="Error hidden"></p>
					</div>
					<div class="mb-3">
					    <label for="formFile" class="form-label">Imagen agregar</label>
  						<input class="form-control" type="file" id="formFile">
  						<p class="Error hidden"></p>
					</div>
					<input type="submit" class="btn btn-primary" name="enviar" value="Registrar">
				</form>
				<div class="mb-3">
          <h2 class="text-center">Ultimas 3 Imagenes registradas</h2>
       </div>
       <div class="mb-3" >
       	<div class="row" id="Imagenes">
       		<div class="col-xxl-4 mb-3">
       			<img src="https://img.freepik.com/vector-gratis/fondo-universo-degradado_23-2149635763.jpg" id="img01" style="width:100%;">
       		</div>
       		<div class="col-xxl-4 mb-3">
       			<img src="https://img.freepik.com/vector-gratis/fondo-universo-degradado_23-2149635763.jpg" id="img02" style="width:100%;">
       		</div>
       		<div class="col-xxl-4 mb-3">
       			<img src="https://img.freepik.com/vector-gratis/fondo-universo-degradado_23-2149635763.jpg" id="img03" style="width:100%;">
       		</div>
          
        </div>
       </div>
      </div>
	</main>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

	<script type="text/javascript" src="assets/js/galeria.js"></script>
</body>
</html>

<div style="position: fixed;z-index: 99999;background: #000000b3;border-radius: 6px;padding: 21px;top: 0;width: 100%;height: 100%;display:none;" id="displayProgreso">
    <div style="height: 70px;width: 250px;position: relative;top: 50%;margin: auto;">
        <div style="padding: 23px;background: #d5000038;border-radius: 8px;">
            <div class="progress progress-bar-primary">
                <div class="progress-bar progress-bar-striped progress-bar-animated" id="bulk-action-progbar" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 100%;background-color: #f30303d4;">Connecting...</div>
            </div>
        </div>
    </div>
</div>