<?php 
$title='Eshop-Editar Categoria';
$tituloPagina = 'Editar categoría';
require_once '../shared/header.php';
require_once '../shared/sessions.php';
require_once '../shared/menu.php';
require_once '../seguridad/verificar_session.php';
require_once '../shared/db.php';
require_once '../seguridad/verificar_permiso.php';
//echo $_GET["id_categoria"];
$id_categoria = $_GET["id_categoria"] ?? '';
$nombre = $_GET["nombre"] ?? '';
$nombre_nuevo = $_POST['nombre_nuevo'] ?? '';

if($id_categoria != '' && $nombre_nuevo != ''){
  $categoria_modelo->editar($id_categoria, $nombre_nuevo);
  return header("Location: ./index.php");
  //header("Location: ./login.php");
}
 ?>

 <link rel="stylesheet" type="text/css" href="../assets/css/style_index_categoria.css">


<form method="POST">
<div class="caja_login" style="display: flex; position: absolute; margin-top: -10%; margin-left: 47%;">
  <img src="../assets/imagenes/editar.png">
</div>
<div class="div_tabla_crear_categoria" style="margin-top: 15%;">
  <table class="tabla_crear_categoria" cellspacing="0" cellpadding="6">
    <tr>
      <td>ID CATEGORIA: <input type="text" disabled="true" name="id_categoria" value="<?= $id_categoria ?>"></td>
    </tr>
    <tr>
      <td>NOMBRE: <input type="text" name="nombre_nuevo" autofocus value="<?= $nombre ?>"></td>
    </tr>
    <tr>
      <td><button class="btn btn-primary" type="submit">Editar</button></td>
    </tr>
  </table>
</div>
</form>

 <?php 
 require_once '../shared/footer.php';
  ?>