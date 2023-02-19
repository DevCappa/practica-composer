<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registro</title>
	<?php $config->_head(); ?>
</head>
<body>
	<main style="height:100vh; display: flex;">

		<?php $config->_menu(); ?>
		<div class="bg-light p-5 rounded" style="width:100%">
        <div class="col-sm-8 mx-auto">
          <h1>Registro de Contenido</h1><br>
        </div>
        <form method="POST">
	        <div class="mb-3">
			  <label for="exampleFormControlInput1" class="form-label">Nombre contenido</label>
			  <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Hombre del contenido...">
			</div>
			<div class="mb-3">
			  <label for="exampleFormControlTextarea1" class="form-label">Descripción del contenido</label>
			  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
			</div>
			<input type="submit" class="btn btn-primary" name="enviar" value="Registrar">
		</form>
      </div>
		
	</main>
</body>
</html>