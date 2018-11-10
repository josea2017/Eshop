<?php 
$title='Eshop-Carro Compras';
$tituloPagina = 'Carro Compras';
require_once '../shared/header.php';
require_once '../shared/sessions.php';
require_once '../shared/menu.php';
require_once '../seguridad/verificar_session.php';
require_once '../shared/db.php';
$id_carro_productos = $carroProducto_modelo->ultimoCarroDeUsuario($_SESSION['usuario']['id_usuario'])['max'] ?? null;
//echo $id_carro_productos;
$carros_productos = $carroProducto_modelo->listaCarrosProductosPorIdCarro($id_carro_productos) ?? null;
$productos_en_carro = array();
$imagenesArray = array();
//var_dump($carros_productos);
if($carros_productos)
{
foreach ($carros_productos as $carroProducto) 
{
  //echo $carroProducto['id_producto'];
  //array_push($stack, "apple", "raspberry");
  $id_producto = $carroProducto['id_producto'];
  array_push($productos_en_carro, $producto_modelo->listarProductosIdProducto($id_producto));
  array_push($imagenesArray, $producto_modelo->listarImagenesIdProducto($id_producto));
}
}
$id_carro = filter_input(INPUT_GET, 'id_carro', FILTER_SANITIZE_STRING) ?? null;
//echo $id_carro;
if($id_carro)
{
  if($productos_en_carro)
  {
    foreach ($productos_en_carro as $carroProducto) {
      $date = date("Y-m-d H:i:s"); 
      $orden_modelo->insertarLineaOrden($id_carro, $_SESSION['usuario']['id_usuario'], $carroProducto['id_producto'], $carroProducto['precio'], $date);
    }
    $carroProducto_modelo->eliminarCarrosProductosIdCarro($id_carro);
    return header('Location: ./index.php');
  }
}
//var_dump($imagenesArray);
//var_dump($myArray);
 $eliminar_producto_id = filter_input(INPUT_GET, 'id_producto', FILTER_SANITIZE_STRING) ?? null;
if ($eliminar_producto_id) {
    //$vehiculo_model->update($id, $marca, $modelo);
    $carroProducto_modelo->eliminar($id_carro_productos, $eliminar_producto_id);
    //echo 'Esta en eliminar';
    return header('Location: ./index.php');
}
 ?>
 <link rel="stylesheet" type="text/css" href="../assets/css/style_index_producto.css">

<form method="POST">
  <table class="table table-hover table-sm" style="text-align: center; margin-top: 0%;" border="1">
    <thead class="table_head">
        <tr>
          <th>ID PRODUCTO</th>
          <th>NOMBRE</th>
          <th>DESCRIPCIÓN</th>
          <th>IMAGEN</th>
          <th>PRECIO $</th><title><?=$title?></title>
          <!--  " <a style='font-size: 15px;' type='submit' name='id_producto' class='btn btn-danger' role='button' href='./index.php?id_producto=" . $productos_en_carro[$i]['id_producto'] . "'>Eliminar</a>"-->
          <th><a class="btn btn-success" type="submit" name="id_carro" role="button" <?php echo "href='./index.php?id_carro=" . $id_carro_productos . "'"?> >Generar orden</a></th>
        </tr>
    </thead>
        <?php 
            //$lista_imagenes = $producto_modelo->listarTodasImagenes();
  	      	//$lista_productos = $producto_modelo->listarTodosProductos();
            $max = sizeof($productos_en_carro);
            if(!empty($productos_en_carro))
            {
    	        for ($i=0; $i < $max; $i++) {
    	            echo "<tr>";
    	            echo "<td>" . $productos_en_carro[$i]['id_producto'] . "</td>";
    	            echo "<td>" . $productos_en_carro[$i]['nombre'] . "</td>";
                  echo "<td>" . $productos_en_carro[$i]['descripcion'] . "</td>";
                  $data = $imagenesArray[$i]['imagen'];
                  $img = "<img width='20%' src= 'data:image/jpeg;base64, $data' />";
                  echo "<td>" . $img . "</td>";
                  echo "<td>" . $productos_en_carro[$i]['precio'] . "</td>";
                  echo "<td>" .
                     
                     " <a style='font-size: 15px;' type='submit' name='id_producto' class='btn btn-danger' role='button' href='./index.php?id_producto=" . $productos_en_carro[$i]['id_producto'] . "'>Eliminar</a>".
                    "</td>";
    	            echo "</tr>";
                  //<button class="btn btn-warning" type="submit" name="carro_nuevo" value="carro_nuevo">Carro nuevo</button>
    	        }
           }

         ?>
  </table>
</form>

 <?php
 require_once '../shared/footer.php';
  ?>