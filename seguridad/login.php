<?php 
$title='Eshop-Login';
require_once '../shared/header.php';
 ?>
<link rel="stylesheet" type="text/css" href="../assets/css/style_login.css">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a id="titulo_login_eshop" class="navbar-brand" href="#">Login</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
        <?php
	        $menu = [
            'Registrarse' => './registro.php',
	          'Principal' => '../',
	        ];
        ?>
    </ul>
    <ul class="nav navbar-nav navbar-right">
        <?php 
            foreach ($menu as $key => $value) {
            	echo "<li class='nav-item'>
                      	<a id='link_login_registro' class='nav-link' href='$value'>$key</a>
                      </li>";
            }
        ?>
    </ul>
  </div>
</nav>

  <div class="caja_login">
    <img class="imagen_login_avatar" src="../assets/imagenes/login_avatar.png">
  </div>
  <div class="datos_login">
    <label class="label_usuario">Usuario: </label>

    <input class="input_usuario" type="text" name="usuario"  id="usuario" placeholder="Usuario" autofocus  value="<?= isset($_POST['usuario']) ? $_POST['usuario'] : ''; ?>">
    <label class="label_contrasenna">Contraseña: </label>
    <input class="input_contrasenna" type="password" name="contrasenna"  id="contrasenna" placeholder="Contraseña">
    <button id="btn_login" class="btn btn-primary" type="submit">Login</button>
        <div class="container" id="resultado">
  </div>



 <?php 
 require_once '../shared/footer.php';
  ?>