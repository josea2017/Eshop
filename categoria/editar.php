<?php 
$title='Eshop-Editar Categoria';
$tituloPagina = 'Editar Categoría';
require_once '../shared/header.php';
require_once '../shared/sessions.php';
require_once '../shared/menu.php';
require_once '../seguridad/verificar_session.php';
require_once '../shared/db.php';

//$id=$_GET['id'];
$id_categoria = $_POST['id_categoria'] ?? '';
$nombre = $_POST['nombre'] ?? '';
if($id_categoria != '' && $nombre != ''){
	if($categoria_modelo->validarRegistro($id_categoria, $nombre)){
		echo "<script type='text/javascript' href'./registro.php'>alert('Registro exitoso');</script>";

	}else{
		echo "<script type='text/javascript' href'./nuevo.php'>alert('Datos incompletos y/o Id categoria ya existe');</script>";
	}
}


 ?>
 <link rel="stylesheet" type="text/css" href="../assets/css/style_index_categoria.css">


<form action="./editar.php" method="POST">
<div class="div_tabla_crear_categoria">
  <table class="tabla_crear_categoria" cellspacing="0" cellpadding="6">
    <tr>
      <td>ID CATEGORIA: <input type="text" name="id_categoria" autofocus placeholder="Id categoria" value="<?= isset($_POST['id_categoria']) ? $_POST['id_categoria'] : ''; ?>"></td>
    </tr>
    <tr>
      <td>NOMBRE: <input type="text" name="nombre" placeholder="Nombre" value="<?= isset($_POST['nombre']) ? $_POST['nombre'] : ''; ?>"></td>
    </tr>
    <tr>
      <td><button class="btn btn-success" type="submit">Guardar</button></td>
    </tr>
  </table>
</div>
</form>

 <?php 
 require_once '../shared/footer.php';
  ?>