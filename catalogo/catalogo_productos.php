<?php 
$title='Eshop-Catálogo Productos';
$tituloPagina = 'Catálogo Productos';
require_once '../shared/header.php';
require_once '../shared/sessions.php';
require_once '../shared/menu.php';
require_once '../seguridad/verificar_session.php';
require_once '../shared/db.php';
$id_categoria = filter_input(INPUT_GET, 'id_categoria', FILTER_SANITIZE_STRING);
//$vehiculo = $vehiculo_model->find($id);
 ?>
 <link rel="stylesheet" type="text/css" href="../assets/css/style_index_producto.css">

<form>
  <table class="table table-hover table-sm" style="text-align: center; margin-top: 0%;" border="1">
    <thead class="table_head">
        <tr>
          <th>NOMBRE</th>
          <th>DESCRIPCIÓN</th>
          <th>IMAGEN</th>
          <th>PRECIO</th>
          <th>DETALLE</th>
        </tr>
    </thead>
        <?php 
            $lista_imagenes = $producto_modelo->listarImagenesProductosPorIdCategoria($id_categoria);
  	      	$lista_productos = $producto_modelo->listarProductosPorIdCategoria($id_categoria);
            $max = sizeof($lista_imagenes);
            if(!empty($lista_productos))
            {
    	        for ($i=0; $i < $max; $i++) {
    	            echo "<tr>";
    	            echo "<td>" . $lista_productos[$i]['nombre'] . "</td>";
                  echo "<td>" . $lista_productos[$i]['descripcion'] . "</td>";
                  $data = $lista_imagenes[$i]['imagen'];
                  $img = "<img width='20%' src= 'data:image/jpeg;base64, $data' />";
                  echo "<td>" . $img . "</td>";
                  echo "<td>" . $lista_productos[$i]['precio'] . "</td>";
                  echo "<td>" .
                     " <a style='font-size: 15px;' class='btn btn-primary' role='button' href='./detalle_producto.php?id_producto=" . $lista_productos[$i]['id_producto'] . "'>Detalle</a>".
                    "</td>";
    	            echo "</tr>";
    	        }
           }

         ?>
  </table>
</form>

 <?php
 require_once '../shared/footer.php';
  ?>