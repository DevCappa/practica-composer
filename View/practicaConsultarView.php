<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Consultar</title>
	<?php $config->_head(); ?>
</head>
<body>
	<main style="height:100vh; display: flex;">

		<?php $config->_menu(); ?>
		<div class="bg-light p-5 rounded" style="width:100%">
        <div class="col-sm-8 mx-auto">
          <h1>Consultar de Contenido</h1><br>
        </div>
            <table class="table" id="table" style="width:100%">
               <thead >
                   <tr >
                   		<th scope="col">#</th>
                   		<th scope="col">Nombre Contenido</th>
                   		<th scope="col">Nombre Descripción</th>
                   		<th scope="col">Estado</th>
                   </tr>
                </thead>

               	<tbody id="AddContent">
               		<?php if(isset($datos)){

               			foreach($datos as $key => $value){
               				$bandera = $key + 1;
               				if($value["estado"] == 1){
               					$tipo = '<button type="submit" style="display: inline-grid" class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" style="color:#fff;" width="16" height="16" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16"><path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/></svg></button>';
               				}else{
               					$tipo = '<button type="submit" style="display: inline-grid" class="btn btn-danger"><svg xmlns="http://www.w3.org/2000/svg" style="color:#fff;" width="16" height="16" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16"><path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/></svg></button>';
               				}
               				echo "<tr><td>".$bandera."</td><td>".$value["NombreDato"]."</td><td>".$value["DescripcionDato"]."</td><td>".$tipo."</td></tr>";
               			}

               		}else{
               			echo "<tr><td></td><td></td><td>Sin registros...</td><td></td><tr>";
               		} ?>
                </tbody>	
            </table>
      </div>
		
	</main>
          <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.11.3/datatables.min.js"></script>
          <script type="text/javascript" src="//cdn.datatables.net/plug-ins/1.13.1/i18n/es-ES.json"></script>
          <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
			<script type="text/javascript">
				$(document).ready(function () {
				    $('#table').DataTable({"language": {
					        "decimal": ",",
					        "thousands": ".",
					        "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
					        "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
					        "infoPostFix": "",
					        "infoFiltered": "(filtrado de un total de _MAX_ registros)",
					        "loadingRecords": "Cargando...",
					        "lengthMenu": "Mostrar _MENU_ registros",
					        "paginate": {
					            "first": "Primero",
					            "last": "Último",
					            "next": "Siguiente",
					            "previous": "Anterior"
					        },
					        "processing": "Procesando...",
					        "search": "Buscar:",
					        "searchPlaceholder": "Término de búsqueda",
					        "zeroRecords": "No se encontraron resultados",
					        "emptyTable": "Ningún dato disponible en esta tabla",
					        "aria": {
					            "sortAscending":  ": Activar para ordenar la columna de manera ascendente",
					            "sortDescending": ": Activar para ordenar la columna de manera descendente"
					        },
					        //only works for built-in buttons, not for custom buttons
					        "buttons": {
					            "create": "Nuevo",
					            "edit": "Cambiar",
					            "remove": "Borrar",
					            "copy": "Copiar",
					            "csv": "fichero CSV",
					            "excel": "tabla Excel",
					            "pdf": "documento PDF",
					            "print": "Imprimir",
					            "colvis": "Visibilidad columnas",
					            "collection": "Colección",
					            "upload": "Seleccione fichero...."
					        },
					        "select": {
					            "rows": {
					                _: '%d filas seleccionadas',
					                0: 'clic fila para seleccionar',
					                1: 'una fila seleccionada'
					            }
					        }
					    }           
					});
				});
			</script>
</body>
</html>