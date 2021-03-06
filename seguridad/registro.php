<?php 
$title='Eshop-Registro';
require_once '../shared/header.php';
require_once '../modelos/Usuario.php';
require_once '../shared/db.php';
/*
$nombre = $_POST['nombre'] ?? '';
$apellidos = $_POST['apellidos'] ?? '';
$telefono = $_POST['telefono'] ?? '';
$correo = $_POST['correo'] ?? '';
$direccion = $_POST['direccion'] ?? '';
$rol = $_POST['rol'] ?? '';
$usuario = $_POST['usuario'] ?? '';
$contrasenna = $_POST['contrasenna'] ?? '';
$confirm_contrasenna = $_POST['confirm_contrasenna'] ?? '';

if($contrasenna != '' && $confirm_contrasenna != '')
{
  if($contrasenna == $confirm_contrasenna)
  {
    if($usuario_modelo->validarRegistro($nombre, $apellidos, $telefono, $correo, $direccion, $rol, $usuario, $contrasenna)){
      //echo "<script type='text/javascript' href'./registro.php'>alert('Registro exitoso');</script>";
      ?>
        <div class="alert alert-success" role="alert">
          Registro exitoso <a href="#" class="alert-link"></a>
        </div>
      <?php
    }else{
            //echo "<script type='text/javascript' href'./registro.php'>alert('Datos incompletos y/o usuario ya existe');</script>";
      ?>
      
      <div class="alert alert-danger" role="alert">
          Datos incompletos y/o usuario ya existe <a href="#" class="alert-link"></a>
      </div>
      <?php 
    }
  }else{
    //echo "<script type='text/javascript' href'./registro.php'>alert('Las contraseñas deben ser iguales');</script>";
    ?>
      <div class="alert alert-danger" role="alert">
          Las contraseñas deben ser iguales <a href="#" class="alert-link"></a>
      </div>
    <?php
  }
}
*/
  ?>


<link rel="stylesheet" type="text/css" href="../assets/css/style_registro.css">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a id="titulo_registro_eshop" class="navbar-brand" href="#">Registro</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="caja_login" style="display: flex; position: absolute; margin-top: 6%; margin-left: 49%;">
    <img src="../assets/imagenes/registro_usuario.png">
  </div>
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

<!--<form action="./registro.php" method="POST">-->
<div class="div_tabla_registro" style="margin-top: 110px;">
  <table class="tabla_registro" cellspacing="0" cellpadding="6">
    <tr>
      <td>Nombre: <input type="text" id="nombre" name="nombre" autofocus placeholder="Nombre" value="<?= isset($_POST['nombre']) ? $_POST['nombre'] : ''; ?>"></td>
    </tr>
    <tr>
      <td>Apellidos: <input type="text" id="apellidos" name="apellidos" placeholder="Apellidos" value="<?= isset($_POST['apellidos']) ? $_POST['apellidos'] : ''; ?>"></td>
    </tr>
    <tr>
      <td>Telefono: <input type="text" id="telefono" name="telefono" placeholder="Telefono" value="<?= isset($_POST['telefono']) ? $_POST['telefono'] : ''; ?>"></td>
    </tr>
    <tr>
      <td>Correo: <input type="text" id="correo" name="correo" placeholder="Correo" value="<?= isset($_POST['correo']) ? $_POST['correo'] : ''; ?>"></td>
    </tr>
    <tr>
      <td>Dirección: <input type="text" id="direccion" name="direccion" placeholder="Dirección" value="<?= isset($_POST['direccion']) ? $_POST['direccion'] : ''; ?>"></td>
    </tr>
    <tr>
      <td><input type="hidden" id="rol" name="rol" value="cliente" value="<?= isset($_POST['rol']) ? $_POST['rol'] : ''; ?>"></td>
    </tr>
    <tr>
      <td>Usuario: <input type="text" id="usuario" name="usuario" placeholder="Usuario" value="<?= isset($_POST['usuario']) ? $_POST['usuario'] : ''; ?>"></td>
    </tr>
    <tr>
      <td>Contraseña: <input type="password" id="contrasenna" name="contrasenna" placeholder="Contraseña" value="<?= isset($_POST['contrasenna']) ? $_POST['contrasenna'] : ''; ?>"></td>
    </tr>
     <tr>
      <td>Confirm Contraseña: <input type="password" id="confirm_contrasenna" name="confirm_contrasenna" placeholder="Confirm contraseña" value="<?= isset($_POST['confirm_contrasenna']) ? $_POST['confirm_contrasenna'] : ''; ?>"></td>
    </tr>
    <tr>
      <td><button class="btn btn-primary" id="btn_registro" type="submit">Registrarse</button></td>
    </tr>
  </table>
  <div class="container" id="resultado_registro_negativo" style="display: flex; position: absolute; margin-top: 30%; width: 600px;">
  <div class="container" id="resultado_registro_positivo" style="display: flex; position: absolute; margin-top: 30%; width: 600px;">
</div>
<!--</form>-->

 <?php 
 require_once '../shared/footer.php';
  ?>