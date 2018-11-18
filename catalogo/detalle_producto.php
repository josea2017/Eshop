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
//$id_carro = $carro_modelo->ultimoCarroDeUsuario($_SESSION['usuario']['id_usuario'])['max'] ?? null;
//var_dump($id_carro);
//echo $id_carro['max'];
//echo $id_carro;
$carro_nuevo = $_POST['carro_nuevo'] ?? null;
$agregar_al_carro = $_POST['agregar_al_carro'] ?? null;
if($carro_nuevo){
 $carro_modelo->nuevo_insertar($_SESSION['usuario']['id_usuario']);
 $carroProducto_modelo->eliminarTodo();
}elseif ($agregar_al_carro) {
  $id_carro = $carro_modelo->ultimoCarroDeUsuario($_SESSION['usuario']['id_usuario'])['max'] ?? null;
  if($id_carro)
  {
      //validar si el número de carro existe en ordenes, si existe primero genera automaticamente otro numero de carro y luego permite insetar la linea
      if($orden_modelo->verificarIdCarroDisponible($id_carro))
      {
        if($carroProducto_modelo->validarStock($producto['id_producto']))
        {
          $carroProducto_modelo->insertarLinea($id_carro, $_SESSION['usuario']['id_usuario'], $producto['id_producto']);
          return header('Location: ./index.php');
        }else{/*echo "Lo sentimos, inventario en cero";*/?>
              <div class="alert alert-warning" role="alert">
                Lo sentimos, inventario en cero
              </div>
        
              <?php 
            }
      }else{
        if($carroProducto_modelo->validarStock($producto['id_producto'])){
            $carro_modelo->nuevo_insertar($_SESSION['usuario']['id_usuario']);
            $id_carro = $carro_modelo->ultimoCarroDeUsuario($_SESSION['usuario']['id_usuario'])['max'] ?? null;
            $carroProducto_modelo->insertarLinea($id_carro, $_SESSION['usuario']['id_usuario'], $producto['id_producto']);
            return header('Location: ./index.php');
          }else{?> <div class="alert alert-warning" role="alert">
                        Lo sentimos, inventario en cero
                    </div> 
                 <?php
                }
      }
  }else{
    if($carroProducto_modelo->validarStock($producto['id_producto'])){
        $carro_modelo->nuevo_insertar($_SESSION['usuario']['id_usuario']);
        $id_carro = $carro_modelo->ultimoCarroDeUsuario($_SESSION['usuario']['id_usuario'])['max'] ?? null;
        $carroProducto_modelo->insertarLinea($id_carro, $_SESSION['usuario']['id_usuario'], $producto['id_producto']);
        return header('Location: ./index.php');
      }else{?> 
                <div class="alert alert-warning" role="alert">
                    Lo sentimos, inventario en cero
                </div>

            <?php
          }
  }
  //<div class="div_imagen_producto" style="display: flex; align-items: center; width: 75%; margin-left: 300px;">
   
}

 ?>

 <link rel="stylesheet" type="text/css" href="../assets/css/style_index_producto.css">

<div class="padre" style="width: 100vw; height: 45vh; margin-top: 50px;">
  <div class="hijo1" style="display: inline-block; flex-wrap: wrap; position: absolute; min-width: 50%; left: 43%;">
      <?php
              $data = $lista_imagenes[0]['imagen'];
              $img = "<img width='20%' class='imagen_producto' src='data:image/jpeg;base64, $data' />";
              //echo $img;
              echo $img;

       ?>
  </div>  
</div>

<form method="POST">
<div class="div_tabla_crear_producto" style="margin-top: -8%;">
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
      <td><button class="btn btn-success" type="submit" name="agregar_al_carro" value="agregar_al_carro">Agregar al carro</button></td>
    </tr>
    <tr>
      <td><button class="btn btn-warning" type="submit" name="carro_nuevo" value="carro_nuevo">Carro nuevo</button></td>
      <!--<td><input class="btn btn-warning" type="submit" name="pedido_nuevo" value="Pedido nuevo"></td>-->
    </tr>
  </table>
</div>
</form>

 <?php 
 require_once '../shared/footer.php';
  ?>