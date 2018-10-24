<?php 
$title='Eshop-Registro';
require_once '../db/PgConnection.php';
require_once '../shared/header.php';
require_once '../modelos/Usuario.php';

$nombre = $_POST['nombre'] ?? '';
$apellidos = $_POST['apellidos'] ?? '';
$telefono = $_POST['telefono'] ?? '';
$correo = $_POST['correo'] ?? '';
$direccion = $_POST['direccion'] ?? '';
$rol = $_POST['rol'] ?? '';
$usuario = $_POST['usuario'] ?? '';
$contrasenna = $_POST['contrasenna'] ?? '';
$confirm_contrasenna = $_POST['confirm_contrasenna'] ?? '';
$usuario_modelos = new Usuario();
/*if($usuario_modelos->validarRegistro($nombre, $apellidos, $telefono, $correo, $direccion, $rol, $usuario, $contrasenna, $confirm_contrasenna)){
  echo "Datos completos";
}*/
if($usuario_modelos->validarRegistroUsuarioDisponible($usuario)){
  echo 'Usuario disponible';
}

 ?>






<link rel="stylesheet" type="text/css" href="../assets/css/style_registro.css">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a id="titulo_registro_eshop" class="navbar-brand" href="#">Registro</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
        <?php
	        $menu = [
	          'Login' => './login.php'
	        ];
        ?>
    </ul>
    <ul class="nav navbar-nav navbar-right">
        <?php 
            foreach ($menu as $key => $value) {
            	echo "<li class='nav-item'>
                      	<a id='link_registro_login' class='nav-link' href='$value'>$key</a>
                      </li>";
            }
        ?>
    </ul>
  </div>
</nav>

<form action="./registro.php" method="POST">
<div class="div_tabla_registro">
  <table class="tabla_registro" cellspacing="0" cellpadding="6">
    <tr>
      <td>Nombre: <input type="text" name="nombre" autofocus placeholder="Nombre" value="<?= isset($_POST['nombre']) ? $_POST['nombre'] : ''; ?>"></td>
    </tr>
    <tr>
      <td>Apellidos: <input type="text" name="apellidos" placeholder="Apellidos" value="<?= isset($_POST['apellidos']) ? $_POST['apellidos'] : ''; ?>"></td>
    </tr>
    <tr>
      <td>Telefono: <input type="text" name="telefono" placeholder="Telefono" value="<?= isset($_POST['telefono']) ? $_POST['telefono'] : ''; ?>"></td>
    </tr>
    <tr>
      <td>Correo: <input type="text" name="correo" placeholder="Correo" value="<?= isset($_POST['correo']) ? $_POST['correo'] : ''; ?>"></td>
    </tr>
    <tr>
      <td>Dirección: <input type="text" name="direccion" placeholder="Dirección" value="<?= isset($_POST['direccion']) ? $_POST['direccion'] : ''; ?>"></td>
    </tr>
    <tr>
      <td><input type="hidden" name="rol" value="cliente" value="<?= isset($_POST['rol']) ? $_POST['rol'] : ''; ?>"></td>
    </tr>
    <tr>
      <td>Usuario: <input type="text" name="usuario" placeholder="Usuario" value="<?= isset($_POST['usuario']) ? $_POST['usuario'] : ''; ?>"></td>
    </tr>
    <tr>
      <td>Contraseña: <input type="password" name="contrasenna" placeholder="Contraseña"></td>
    </tr>
     <tr>
      <td>Confirm Contraseña: <input type="password" name="confirm_contrasenna" placeholder="Confirm contraseña"></td>
    </tr>
    <tr>
      <td><button class="btn btn-primary" type="submit">Registrarse</button></td>
    </tr>
  </table>
</div>
</form>

 <?php 
 require_once '../shared/footer.php';
  ?>