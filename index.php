<?php 
$title='Eshop';
require_once './shared/header.php';
 ?>
 <link rel="stylesheet" type="text/css" href="./assets/css/style_index.css">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a id="titulo_index_eshop" class="navbar-brand" href="#">Eshop</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
        <?php
	        $menu = [
	          'Ingresar' => './seguridad/login.php'
	        ];
        ?>
    </ul>
    <ul class="nav navbar-nav navbar-right">
        <?php 
            foreach ($menu as $key => $value) {
            	echo "<li class='nav-item'>
                      	<a id='link_index_ingresar' class='nav-link' href='$value'>$key</a>
                      </li>";
            }
        ?>
    </ul>
  </div>
</nav>

<div class="caja_fondo_index">
	<img class="imagen_fondo_index" src="./assets/imagenes/fondo_index.png">
</div>



 <?php require_once 'shared/footer.php'; ?>