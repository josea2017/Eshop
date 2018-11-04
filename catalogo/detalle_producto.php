<?php 
$title='Eshop-Detalle Producto';
$tituloPagina = 'Detalle producto';
require_once '../shared/header.php';
require_once '../shared/sessions.php';
require_once '../shared/menu.php';
require_once '../seguridad/verificar_session.php';
require_once '../shared/db.php';
$id_producto = filter_input(INPUT_GET, 'id_producto', FILTER_SANITIZE_STRING);
$producto = $producto_modelo->encontrarProducto($id_producto);
$lista_imagenes = $producto_modelo->listarImagenesProductosPorIdProducto($id_producto);
/*
  $data = $lista_imagenes[$i]['imagen'];
  $img = "<img width='20%' src= 'data:image/jpeg;base64, $data' />";
  echo "<td>" . $img . "</td>";
*/
  //echo var_dump($lista_imagenes);
 ?>

 <link rel="stylesheet" type="text/css" href="../assets/css/style_index_producto.css">

<div class="div_imagen_producto">
  <?php
          $data = $lista_imagenes[0]['imagen'];
          $img = "<img width='20%' class='imagen_producto' src='data:image/jpeg;base64, $data' />";
          //echo $img;
          echo $img;

   ?>
     <!--<td class="imagen_producto"><?php //echo $img ?></td>-->
</div>

<form method="POST">
<div class="div_tabla_crear_producto">
  <table class="tabla_crear_producto" cellspacing="0" cellpadding="6">
    <tr>
      <td>ID PRODUCTO: <input type="text" disabled="true" name="id_producto" value="<?= $producto['id_producto'] ?>"></td>
    </tr>
    <tr>
      <td>NOMBRE: <input type="text" disabled="true" name="nombre_nuevo" autofocus value="<?= $producto['nombre'] ?>"></td>
    </tr>
    <tr>
      <td>DESCRIPCIÓN: <input type="text" disabled="true" name="descripcion_nuevo" value="<?= $producto['descripcion'] ?>"></td>
    </tr>
    <tr>
      <td>STOCK: <input type="number" disabled="true" name="stock_nuevo" <?php echo "value= '$producto[stock]'";  ?> ></td>
    </tr>
     <tr>
      <td>PRECIO: <input type="number" disabled="true" name="precio_nuevo" <?php echo "value= '$producto[precio]'";  ?> ></td>
    </tr>
    <tr>
      <td><button class="btn btn-success" type="submit" name="agregar_al_carro">Agregar al carro</button></td>
    </tr>
  </table>
</div>
</form>

 <?php 
 require_once '../shared/footer.php';
  ?>