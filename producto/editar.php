<?php 
$title='Eshop-Editar Producto';
$tituloPagina = 'Editar producto';
require_once '../shared/header.php';
require_once '../shared/sessions.php';
require_once '../shared/menu.php';
require_once '../seguridad/verificar_session.php';
require_once '../shared/db.php';

$id_producto = $_GET["id_producto"] ?? '';
$nombre = $_GET["nombre"] ?? '';
$descripcion = $_GET['descripcion'] ?? '';
$stock = $_GET['stock'] ?? '';
$precio = $_GET['precio'] ?? '';

if(isset($_POST['btn_editar_producto'])){
  $nombre_nuevo = $_POST['nombre_nuevo'] ?? '';
  $descripcion_nuevo = $_POST['descripcion_nuevo'] ?? '';
  $stock_nuevo = $_POST['stock_nuevo'] ?? '';
  $precio_nuevo = $_POST['precio_nuevo'] ?? '';
  //editar($id_producto, $nombre, $descripcion, $stock, $precio)
  if($nombre_nuevo != '' && $descripcion_nuevo != '' && $stock_nuevo != '' && $precio_nuevo != ''){
    $producto_modelo->editar($id_producto, $nombre_nuevo, $descripcion_nuevo, $stock_nuevo, $precio_nuevo);
    return header("Location: ./index.php");
  }else{
     echo "<script type='text/javascript' href'./editar.php'>alert('No se logró, todos los campos son requeridos');</script>";
  }
}

 ?>

 <link rel="stylesheet" type="text/css" href="../assets/css/style_index_producto.css">


<form method="POST">
<div class="div_tabla_crear_producto">
  <table class="tabla_crear_producto" cellspacing="0" cellpadding="6">
    <tr>
      <td>ID PRODUCTO: <input type="text" disabled="true" name="id_producto" value="<?= $id_producto ?>"></td>
    </tr>
    <tr>
      <td>NOMBRE: <input type="text" name="nombre_nuevo" autofocus value="<?= $nombre ?>"></td>
    </tr>
    <tr>
      <td>DESCRIPCIÓN: <input type="text" name="descripcion_nuevo" value="<?= $descripcion ?>"></td>
    </tr>
    <tr>
      <td>STOCK: <input type="number" name="stock_nuevo" <?php echo "value=$stock";  ?> ></td>
    </tr>
     <tr>
      <td>PRECIO: <input type="number" name="precio_nuevo" <?php echo "value=$precio";  ?> ></td>
    </tr>
    <tr>
      <td><button class="btn btn-primary" type="submit" name="btn_editar_producto">Editar</button></td>
    </tr>
  </table>
</div>
</form>

 <?php 
 require_once '../shared/footer.php';
  ?>