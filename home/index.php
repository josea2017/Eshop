<?php 
$title='Eshop-Home';
$tituloPagina = 'Home';
require_once '../shared/header.php';
require_once '../shared/sessions.php';
require_once '../shared/menu.php';
require_once '../seguridad/verificar_session.php';
 ?>

<div class="card" style="width: 18rem;">
  <img class="card-img-top" src="../assets/imagenes/informacion.png" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">Estadísticas</h5>
    <p class="card-text">Estimad@ <?php echo $_SESSION['usuario']['nombre'] ?>, buscamos mejorar su servicio</p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">Total de productos adquiridos:</li>
    <li class="list-group-item">Monto total en compras:</li>
    <li class="list-group-item" style="text-align: center;"><img src="../assets/imagenes/informacion_pequenno.svg" width="40" height="40" alt=""><strong>Eshop</strong></li>
  </ul>
</div>






 <?php
 require_once '../shared/footer.php';
  ?>