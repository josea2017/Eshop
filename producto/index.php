<?php 
$title='Eshop-Adm Productos';
$tituloPagina = 'Adm Productos';
require_once '../shared/header.php';
require_once '../shared/sessions.php';
require_once '../shared/menu.php';
require_once '../seguridad/verificar_session.php';
require_once '../shared/db.php';
require_once '../seguridad/verificar_permiso.php';

 ?>
 <link rel="stylesheet" type="text/css" href="../assets/css/style_index_producto.css">

<form>
  <table class="table table-hover text-center" style="text-align: center; margin-top: 0%;" border="1">
    <thead class="table_head">
        <tr>
          <th>ID PRODUCTO</th>
          <th>NOMBRE</th>
          <th>DESCRIPCIÓN</th>
          <th>IMAGEN</th>
          <th>STOCK</th>
          <th>PRECIO</th>
          <th>CATEGORIA</th>
          <th><a class="btn btn-success" name="producto_nuevo" href="./nuevo.php">Producto nuevo</a></th>
        </tr>
    </thead>
        <?php 
            $lista_imagenes = $producto_modelo->listarTodasImagenes();
  	      	$lista_productos = $producto_modelo->listarTodosProductos();
            $max = sizeof($lista_imagenes);
            if(!empty($lista_productos))
            {
    	        for ($i=0; $i < $max; $i++) {
    	            echo "<tr>";
    	            echo "<td>" . $lista_productos[$i]['id_producto'] . "</td>";
    	            echo "<td>" . $lista_productos[$i]['nombre'] . "</td>";
                  echo "<td>" . $lista_productos[$i]['descripcion'] . "</td>";
                  $data = $lista_imagenes[$i]['imagen'];
                  $img = "<img width='20%' src= 'data:image/jpeg;base64, $data' />";
                  echo "<td>" . $img . "</td>";
                  echo "<td>" . $lista_productos[$i]['stock'] . "</td>";
                  echo "<td>" . $lista_productos[$i]['precio'] . "</td>";
                  echo "<td>" . $lista_productos[$i]['id_categoria'] . "</td>";
                  echo "<td>" .
                     " <a style='font-size: 13px;' class='btn btn-primary' role='button' href='./editar.php?id_producto=" . $lista_productos[$i]['id_producto'] . "&nombre= " . $lista_productos[$i]['nombre'] . "&descripcion= " . $lista_productos[$i]['descripcion'] . "&stock= " . $lista_productos[$i]['stock'] . "&precio= " . $lista_productos[$i]['precio'] . "'>Editar</a>".
                     
                     " <a style='font-size: 13px;' class='btn btn-danger' role='button' href='./eliminar.php?id_producto=" . $lista_productos[$i]['id_producto'] . "&nombre= " . $lista_productos[$i]['nombre'] . "&descripcion= " . $lista_productos[$i]['descripcion'] . "&stock= " . $lista_productos[$i]['stock'] . "&precio= " . $lista_productos[$i]['precio'] . "'>Eliminar</a>".
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