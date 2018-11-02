<?php 
$title='Eshop-Eliminar Producto';
$tituloPagina = 'Eliminar producto';
require_once '../shared/header.php';
require_once '../shared/sessions.php';
require_once '../shared/menu.php';
require_once '../seguridad/verificar_session.php';
require_once '../shared/db.php';
require_once '../seguridad/verificar_permiso.php';

$id_producto = $_GET["id_producto"] ?? '';
$nombre = $_GET["nombre"] ?? '';
$descripcion = $_GET['descripcion'] ?? '';
$stock = $_GET['stock'] ?? '';
$precio = $_GET['precio'] ?? '';

if(isset($_POST['btn_eliminar_producto'])){
    $producto_modelo->eliminar($id_producto);
    return header("Location: ./index.php");
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
      <td>NOMBRE: <input type="text" autofocus value="<?= $nombre ?>"></td>
    </tr>
    <tr>
      <td>DESCRIPCIÓN: <input type="text" value="<?= $descripcion ?>"></td>
    </tr>
    <tr>
      <td>STOCK: <input type="number" <?php echo "value=$stock";  ?> ></td>
    </tr>
     <tr>
      <td>PRECIO: <input type="number" <?php echo "value=$precio";  ?> ></td>
    </tr>
    <tr>
      <td><label>¿Esta seguro?</label><button class="btn btn-danger" type="submit" name="btn_eliminar_producto">Eliminar</button></td>
    </tr>
  </table>
</div>
</form>

 <?php 
 require_once '../shared/footer.php';
  ?>