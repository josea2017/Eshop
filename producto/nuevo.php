<?php 
$title='Eshop-Crear Producto';
$tituloPagina = 'Crear producto';
require_once '../shared/header.php';
require_once '../shared/sessions.php';
require_once '../shared/menu.php';
require_once '../seguridad/verificar_session.php';
require_once '../shared/db.php';
require_once '../seguridad/verificar_permiso.php';
$lista_categorias = $categoria_modelo->listarTodasCategorias();


if(isset($_POST['btn_guardar_producto'])){

  $id_producto = $_POST['id_producto'] ?? '';
  if($producto_modelo->validarCodigoDisponible($id_producto)){
      $nombre = $_POST['nombre'] ?? '';
      $descripcion = $_POST['descripcion'] ?? '';
      //$imagen = $_POST['imagen'] ?? '';
     //Recuperar los datos del archivo
      $nombre_imagen = $_FILES['imagen']['name'] ?? '';
      $tmp = $_FILES['imagen']['tmp_name'] ?? '';
      $folder = './imagenes';
      //Movera el archivo del folder temporal a una nueva ruta
      move_uploaded_file($tmp, $folder.'/'.$nombre_imagen);
      //Extraigo los bytes del archivo
      //echo $bytesArchivo = file_get_contents($folder.'/'.$nombre);
      $bytesArchivo = file_get_contents($folder.'/'.$nombre_imagen);
      //echo $comentario;
      //echo $bytesArchivo;
      //$imagen_model->insertarImagen($comentario, $bytesArchivo);
      $stock = $_POST['stock'] ?? '';
      $precio = $_POST['precio'] ?? '';
      $id_categoria = $_POST['id_categoria'] ?? '';
      //$id_producto, $nombre, $descripcion, $imagen, $stock, $precio, $id_categoria
      $producto_modelo->insertar($id_producto, $nombre, $descripcion, $bytesArchivo, $stock, $precio,  $id_categoria);
      return header("Location: ./index.php");
  }else{
    echo "<script type='text/javascript' href'./nuevo.php'>alert('No se logró, el código ya existe');</script>";
  }
}
 ?>
 <link rel="stylesheet" type="text/css" href="../assets/css/style_index_producto.css">


<form action="./nuevo.php" method="POST" enctype="multipart/form-data">
<div class="div_tabla_crear_producto" style="margin-top: 120px;">
  <table class="tabla_crear_producto" cellspacing="0" cellpadding="6">
    <tr>
      <td>ID PRODUCTO: <input type="text" name="id_producto" autofocus placeholder="Id producto" value="<?= isset($_POST['id_producto']) ? $_POST['id_producto'] : ''; ?>"></td>
    </tr>
    <tr>
      <td>NOMBRE: <input type="text" name="nombre" placeholder="Nombre" value="<?= isset($_POST['nombre']) ? $_POST['nombre'] : ''; ?>"></td>
    </tr>
     <tr>
      <td>DESCRIPCIÓN: <input type="text" name="descripcion" placeholder="Descripción" value="<?= isset($_POST['descripcion']) ? $_POST['descripcion'] : ''; ?>"></td>
    </tr>
    <tr>
      <td>IMAGEN: <div style="display: inline-flex; position: absolute; margin-left: 42px;"><input type="file" name="imagen"></div></td>
    </tr>
    <tr>
      <td>STOCK: <input type="number" name="stock" placeholder="Stock" value="<?= isset($_POST['stock']) ? $_POST['stock'] : ''; ?>"></td>
    </tr>
    <tr>
      <td>PRECIO: <input type="number" name="precio" placeholder="Precio" value="<?= isset($_POST['precio']) ? $_POST['precio'] : ''; ?>"></td>
    </tr>
    <tr>
      <td>ID CATEGORIA: 
          <select name="id_categoria" style="width: 180px;">
            <?php foreach ($lista_categorias as $categoria)
              echo "<option value='$categoria[id_categoria]'>" . $categoria['nombre'] . "</option>";
            ?>
          </select>
      </td>
    </tr>
    <tr>
      <td><button class="btn btn-success" type="submit" name="btn_guardar_producto">Guardar</button></td>
    </tr>
  </table>
</div>
</form>

 <?php 
 /*
 <select name="cars">
    <option value="volvo">Volvo</option>
    <option value="saab">Saab</option>
    <option value="fiat">Fiat</option>
    <option value="audi">Audi</option>
  </select>
  */
 require_once '../shared/footer.php';
  ?>
